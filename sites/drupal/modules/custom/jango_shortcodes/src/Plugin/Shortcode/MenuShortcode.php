<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;
use Drupal\search\Form\SearchBlockForm;
use Drupal\file\Entity\File;
use Drupal\block\Entity\Block;
use Drupal\image\Entity\ImageStyle;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Drupal\Core\Menu\MenuTreeParameters;

// Cart
use Drupal\Core\Cache\CacheableMetadata;
use Drupal\commerce_cart\CartProviderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;

/**
 * @Shortcode(
 *   id = "nd_menu",
 *   title = @Translation("Menu"),
 *   description = @Translation("Render menu"),
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 *   icon = "fa fa-bars"
 * )
 */
class MenuShortcode extends ShortcodeBase implements ContainerFactoryPluginInterface {
  /**
   * The cart provider.
   *
   * @var \Drupal\commerce_cart\CartProviderInterface
   */
  protected $cartProvider;
  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new MenuShortcode.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin ID for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\commerce_cart\CartProviderInterface $cart_provider
   *   The cart provider.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, $cart_provider = NULL, EntityTypeManagerInterface $entity_type_manager = NULL) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->cartProvider = $cart_provider;
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      \Drupal::moduleHandler()->moduleExists('commerce') ? $container->get('commerce_cart.cart_provider') : [],
      $container->get('entity_type.manager')
    );
  }

  /**
   * @return int
   */
  protected function getCartCount() {
    $cachable_metadata = new CacheableMetadata();
    $cachable_metadata->addCacheContexts(['user', 'session']);

    /** @var \Drupal\commerce_order\Entity\OrderInterface[] $carts */
    $carts = $this->cartProvider->getCarts();
    $carts = array_filter($carts, function ($cart) {
      /** @var \Drupal\commerce_order\Entity\OrderInterface $cart */
      // There is a chance the cart may have converted from a draft order, but
      // is still in session. Such as just completing check out. So we verify
      // that the cart is still a cart.
      return $cart->hasItems() && $cart->cart->value;
    });

    $count = 0;
    if (!empty($carts)) {
      foreach ($carts as $cart_id => $cart) {
        foreach ($cart->getItems() as $order_item) {
          $count += (int) $order_item->getQuantity();
        }
        $cachable_metadata->addCacheableDependency($cart);
      }
    }

    return $count;
  }

  /**
   * @return string
   */
  protected function getCartTotalPrice() {
    $cachable_metadata = new CacheableMetadata();
    $cachable_metadata->addCacheContexts(['user', 'session']);

    /** @var \Drupal\commerce_order\Entity\OrderInterface[] $carts */
    $carts = $this->cartProvider->getCarts();
    $carts = array_filter($carts, function ($cart) {
      /** @var \Drupal\commerce_order\Entity\OrderInterface $cart */
      // There is a chance the cart may have converted from a draft order, but
      // is still in session. Such as just completing check out. So we verify
      // that the cart is still a cart.
      return $cart->hasItems() && $cart->cart->value;
    });

    $total_price = 0;
    $currency_code = '';
    if (!empty($carts)) {
      foreach ($carts as $cart_id => $cart) {
        foreach ($cart->getItems() as $order_item) {
          $total_price += (double) $order_item->getTotalPrice()->getNumber();
          $currency_code = $order_item->getTotalPrice()->getCurrencyCode();
        }
        $cachable_metadata->addCacheableDependency($cart);
      }
    }
    return implode(' ', [$currency_code, $total_price]);
  }

  /**
   * @param $menu_name
   * @return mixed
   */
  function render_drop_down($menu_name) {
    $menu_tree = \Drupal::menuTree();
    $parameters = new MenuTreeParameters();
    $parameters->setMaxDepth(2)->onlyEnabledLinks();
    // Load the tree based on this set of parameters.
    $tree = $menu_tree->load($menu_name, $parameters);
    // Transform the tree using the manipulators you want.
    $manipulators = [
      // Only show links that are accessible for the current user.
      ['callable' => 'menu.default_tree_manipulators:checkAccess'],
      // Use the default sorting of menu links.
      ['callable' => 'menu.default_tree_manipulators:generateIndexAndSort'],
    ];
    $tree = $menu_tree->transform($tree, $manipulators);
    // Finally, build a renderable array from the transformed tree.
    $menu = $menu_tree->build($tree);
    $items = isset($menu['#items']) ? $menu['#items'] : [];
    $menu = _jango_shortcodes_simple_menu($items);

    return \Drupal::service('renderer')->render($menu);
  }

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $menu_name = isset($attrs['menu']) ? $attrs['menu'] : 'main';
    $file = isset($attrs['fid']) && !empty($attrs['fid']) ? File::load($attrs['fid']) : '';
    $logo = isset($file->uri) ? file_create_url($file->getFileUri()) : theme_get_setting('logo.url');
    $type = isset($attrs['type']) ? $attrs['type'] : '';

    if ($type == 'menu-drop-down') {
      $output = $this->render_drop_down($menu_name);
    }
    else {
      $attrs['class'] = isset($attrs['font_color']) ? $attrs['font_color'] : '';
      $classes = $type . ' ';
      $classes .= isset($attrs['mobile_color']) ? $attrs['mobile_color'] . ' ' : '';
      $body_classes = 'c-layout-header-fixed c-layout-header-mobile-fixed';
      // @todo: this variant from D7 not works. Too late calls.
//      _jango_shortcodes_body_class('c-layout-header-fixed c-layout-header-mobile-fixed');
      if (isset($attrs['header_top']) && $attrs['header_top']) {
        $body_classes .= ' c-layout-header-topbar c-layout-header-topbar-collapse';
        // @todo: this variant from D7 not works. Too late calls.
//        _jango_shortcodes_body_class('c-layout-header-topbar c-layout-header-topbar-collapse');
      }
      if (!isset($attrs['fixed']) || !$attrs['fixed']) {
        $body_classes .= ' c-header-not-fixed';
        // @todo: this variant from D7 not works. Too late calls.
//        _jango_shortcodes_body_class('c-header-not-fixed');
      }

      // Search.
      $search_block = FALSE;
      if ((isset($attrs['search']) && $attrs['search']) && \Drupal::moduleHandler()->moduleExists('search')) {
        $form = \Drupal::formBuilder()->getForm(SearchBlockForm::class);
        $form['keys']['#attributes']['placeholder'] = t('Type to search...');
        $search_block = render($form);
      }

      // Menu.
      if (\Drupal::moduleHandler()->moduleExists('tb_megamenu')) {
        $tb_megamenu_theme = [
          '#theme' => 'tb_megamenu',
          '#menu_name' => $menu_name,
        ];
        $menu = render($tb_megamenu_theme);;
      }
      else {
        $menu = render_menu($menu_name);
      }

      // BG Color.
      $bg_color = isset($_GET['mega_menu_bg_color']) ? $_GET['mega_menu_bg_color'] : theme_get_setting('mega_menu_bg_color');
      // Clearing the cache due to $bg_color.
      \Drupal::service('page_cache_kill_switch')->trigger();

      // Cart.
      $cart_count = 0;
      $count_text = '';
      $cart_total_price = '';
      $cart_block = FALSE;
      if (\Drupal::moduleHandler()->moduleExists('commerce') && isset($attrs['cart']) && $attrs['cart']) {
        // Get Cart block. Limited in opportunities.
        $cart_count = $this->getCartCount();
        $cart_total_price = $this->getCartTotalPrice();
        $count_text = $cart_count == 1 ? $cart_count . ' item' : $cart_count . ' items';
        $block = Block::load('cart');
        if ($block) {
          $cart_block = \Drupal::entityTypeManager()
            ->getViewBuilder('block')
            ->view($block);
        }
      }

      // Login.
      $is_authenticated = \Drupal::currentUser()->isAuthenticated() ? TRUE : FALSE;

      // Dev Host.
      $is_dev_host = (strpos($_SERVER['HTTP_HOST'], 'nikadevs') !== FALSE || $_SERVER['HTTP_HOST'] == 'development') ? TRUE : FALSE;

      // Header Top Social Menu.
      $header_top_social_menu = FALSE;
      if (isset($attrs['header_top_social_menu']) && !empty(($attrs['header_top_social_menu']))) {
        $htsm_menu_tree = \Drupal::menuTree();
        $htsm_params = $htsm_menu_tree->getCurrentRouteMenuTreeParameters($attrs['header_top_social_menu']);
        // Load the tree based on this set of parameters.
        $htsm_tree = $htsm_menu_tree->load($attrs['header_top_social_menu'], $htsm_params);
        $header_top_social_menu = [];
        foreach ($htsm_tree as $htsm_item) {
          $htsm_link_href = isset($htsm_item->link->pluginDefinition['url']) ? $htsm_item->link->pluginDefinition['url'] : '#';
          $htsm_link_title = isset($htsm_item->link->pluginDefinition['title']) ? $htsm_item->link->pluginDefinition['title'] : '';
          $header_top_social_menu[] = [$htsm_link_href, $htsm_link_title];
        }
      }

      // Sitename.
      $config = \Drupal::config('system.site');
      $site_name = $config->get('name');

      // Language.
      $language = isset($attrs['language']) ? $attrs['language'] : FALSE;
      $lang_code = '';
      if ($language && \Drupal::moduleHandler()->moduleExists('language')) {
        $block = \Drupal::entityTypeManager()->getStorage('block')->load('languageswitcher');
        if(method_exists($block, 'getPlugin')) {
          $block = $block->getPlugin()->build();
          $language = render($block);
          $lang_code = \Drupal::languageManager()->getCurrentLanguage()->getId();
        }
      }

      // Menu template.
      $theme = strpos($type, 'c-layout-header-6') !== FALSE ? 'jango_shortcodes_menu_2' : 'jango_shortcodes_menu';

      // Header Top Menu.
      $header_top_menu = (isset($attrs['header_top_menu']) && !empty(($attrs['header_top_menu']))) ? $attrs['header_top_menu'] : '';

      $theme_array = [
        '#theme' => $theme,
        '#menu' => $menu,
        '#width' => isset($attrs['width']) ? $attrs['width'] : FALSE,
        '#logo' => $logo,
        '#type' => $type,
        '#class' => $classes,
        '#search' => isset($attrs['search']) ? $attrs['search'] : FALSE,
        '#search_block' => $search_block,
        '#bg_color' => $bg_color,
        '#cart' => $cart_block ? TRUE: FALSE,
        '#cart_count' => $cart_count,
        '#count_text' => $count_text,
        '#cart_total_price' => $cart_total_price,
        '#cart_block' => $cart_block,
        '#login' => isset($attrs['login']) ? $attrs['login'] : FALSE,
        '#is_authenticated' => $is_authenticated,
        '#is_dev_host' => $is_dev_host,
        '#header_top' => isset($attrs['header_top']) ? $attrs['header_top'] : FALSE,
        '#header_top_menu' => $header_top_menu,
        '#header_top_class' => isset($attrs['header_top_class']) ? $attrs['header_top_class'] : 'dark',
        '#header_top_social_menu' => $header_top_social_menu,
        '#language' => $language,
        '#lang_code' => $lang_code,
        '#site_name' => $site_name,
        '#body_classes' => $body_classes,
      ];
      $output = $this->render($theme_array);
    }

    $attrs_output = _jango_shortcodes_shortcode_attributes($attrs);
    if ($attrs_output) {
      $output = '<div ' . $attrs_output . '>' . $output . '</div>';
    }

    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $menus = menu_ui_get_menus();
    $form['menu'] = [
      '#type' => 'select',
      '#title' => t('Menu'),
      '#default_value' => isset($attrs['menu']) ? $attrs['menu'] : '',
      '#options' => $menus,
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['width'] = [
      '#type' => 'select',
      '#title' => t('Width'),
      '#default_value' => isset($attrs['width']) ? $attrs['width'] : '',
      '#options' => ['' => t('Default'), '-fluid' => t('Wide')],
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['fid'] = [
      '#type' => 'textfield',
      '#title' => t('Image'),
      '#default_value' => isset($attrs['fid']) ? $attrs['fid'] : '',
      '#attributes' => ['class' => ['image-gallery-upload hidden']],
      '#field_suffix' => '<div class="preview-image"></div><a href="#" class="vc-gallery-images-select button">' . t('Upload Image') . '</a><a href="#" class="gallery-remove button">' . t('Remove Image') . '</a>',
      '#prefix' => '<div class="col-sm-4"><div class="image-gallery-upload ">',
      '#suffix' => '</div></div></div>',
      '#states' => [
        'invisible' => [
          'select[name="type"]' => ['value' => 'menu-drop-down'],
        ],
      ],
    ];
    if (isset($attrs['fid']) && !empty($attrs['fid'])) {
      $file = isset($attrs['fid']) && !empty($attrs['fid']) ? File::load($attrs['fid']) : '';
      if ($file) {
        $filename = $file->getFileUri();
        $filename = ImageStyle::load('medium')->buildUrl($filename);
        $form['fid']['#prefix'] = '<div class="col-sm-4"><div class="image-gallery-upload has_image">';
        $form['fid']['#field_suffix'] = '<div class="preview-image"><img src="' . $filename . '"></div><a href="#" class="vc-gallery-images-select button">' . t('Upload Image') . '</a><a href="#" class="gallery-remove button">' . t('Remove Image') . '</a>';
      }
    }
    // 2nd.
    $types = [
      'menu-drop-down' => t('Simple Menu DropDown List'),
      'c-layout-header-default c-header-transparent-dark' => t('Transparent'),
      'c-layout-header-4 c-bordered c-header-transparent-dark' => t('Transparent - Dark font'),
      'c-layout-header-2 c-header-transparent-dark' => t('White Half Transparent'),
      'c-layout-header-4' => t('White'),
      'c-layout-header-3 c-layout-header-3-custom-menu' => t('Dark'),
      'c-layout-header-5' => t('Dark Wide'),
      'c-layout-header-6' => t('Bottom Menu'),
      'c-layout-header-6 c-navbar-fluid' => t('Bottom Menu Fluid'),
    ];
    $form['type'] = [
      '#type' => 'select',
      '#title' => t('Type'),
      '#options' => $types,
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : 'white',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-4">',
      '#suffix' => '</div>',
    ];
    $types = [
      'c-layout-header-default-mobile' => t('White'),
      'c-layout-header-dark-mobile' => t('Dark'),
    ];
    $form['mobile_color'] = [
      '#type' => 'select',
      '#title' => t('Mobile Color'),
      '#default_value' => isset($attrs['mobile_color']) ? $attrs['mobile_color'] : '',
      '#options' => $types,
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          'select[name="type"]' => ['!value' => 'menu-drop-down'],
          'select[name="type"], .abc' => ['!value' => 'c-layout-header-5'],
        ],
      ],
    ];
    $form['fixed'] = [
      '#type' => 'checkbox',
      '#title' => t('Fixed Position'),
      '#default_value' => isset($attrs['fixed']) ? $attrs['fixed'] : FALSE,
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div></div>',
      '#states' => [
        'invisible' => [
          'select[name="type"]' => ['value' => 'menu-drop-down'],
        ],
      ],
    ];
    // 3rd.
    $form['search'] = [
      '#type' => 'checkbox',
      '#title' => t('Search Form'),
      '#default_value' => isset($attrs['search']) ? $attrs['search'] : FALSE,
      '#prefix' => '<div class="row"><div class="col-sm-4">',
      '#suffix' => '</div>',
      '#states' => [
        'invisible' => [
          'select[name="type"]' => ['value' => 'menu-drop-down'],
        ],
      ],
    ];
    $form['cart'] = [
      '#type' => 'checkbox',
      '#title' => t('Cart Dropdown'),
      '#default_value' => isset($attrs['cart']) ? $attrs['cart'] : FALSE,
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div>',
      '#states' => [
        'invisible' => [
          'select[name="type"]' => ['value' => 'menu-drop-down'],
        ],
      ],
    ];
    $form['login'] = [
      '#type' => 'checkbox',
      '#title' => t('Login Button'),
      '#default_value' => isset($attrs['login']) ? $attrs['login'] : FALSE,
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div></div>',
      '#states' => [
        'invisible' => [
          'select[name="type"]' => ['value' => 'menu-drop-down'],
        ],
      ],
    ];
    // 4th.
    $form['header_top'] = [
      '#type' => 'checkbox',
      '#title' => t('Header Top'),
      '#default_value' => isset($attrs['header_top']) ? $attrs['header_top'] : FALSE,
      '#prefix' => '<div class="row"><div class="col-sm-3">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          'select[name="type"]' => ['!value' => 'menu-drop-down'],
          'select[name="type"], .abc' => ['!value' => 'c-layout-header-5'],
        ],
      ],
    ];
    // 5th.
    $form['header_top_social_menu'] = [
      '#type' => 'select',
      '#title' => t('Header Top Social Menu'),
      '#options' => $menus,
      '#default_value' => isset($attrs['header_top_social_menu']) ? $attrs['header_top_social_menu'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          'input[name="header_top"]' => ['checked' => TRUE],
          'select[name="type"]' => ['!value' => 'menu-drop-down'],
        ],
      ],
    ];
    $form['header_top_menu'] = [
      '#type' => 'select',
      '#title' => t('Header Top Menu'),
      '#options' => $menus,
      '#default_value' => isset($attrs['header_top_menu']) ? $attrs['header_top_menu'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          'input[name="header_top"]' => ['checked' => TRUE],
          'select[name="type"]' => ['!value' => 'menu-drop-down'],
        ],
      ],
    ];
    $form['language'] = [
      '#type' => 'checkbox',
      '#title' => t('Language Box'),
      '#default_value' => isset($attrs['language']) ? $attrs['language'] : FALSE,
      '#prefix' => '<div class="col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          'input[name="header_top"]' => ['checked' => TRUE],
          'select[name="type"]' => ['!value' => 'menu-drop-down'],
        ],
      ],
    ];
    $types = ['light c-solid-bg' => t('White'), 'dark' => t('Dark')];
    $form['header_top_class'] = [
      '#type' => 'select',
      '#title' => t('Header Top BG Color'),
      '#default_value' => isset($attrs['header_top_class']) ? $attrs['header_top_class'] : '',
      '#options' => $types,
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-3">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          'input[name="header_top"]' => ['checked' => TRUE],
          'select[name="type"]' => ['!value' => 'menu-drop-down'],
        ],
      ],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function description($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $value = '';
    if (isset($attrs['admin_url']) && strpos($attrs['admin_url'], 'admin/structure/menu') !== FALSE) {
      $form = MenuShortcode::settings($attrs, $text);
      $link_text = $form['admin_url']['#options'][$attrs['admin_url']];
      $link_url = Url::fromUri('internal:/' . $attrs['admin_url'], ['attributes' => ['target' => '_blank']]);
      $link = Link::fromTextAndUrl($link_text, $link_url)->toString();
      $value = $link->getGeneratedLink();
    }
    return $value;
  }
}
