<?php

/* modules/custom/jango_shortcodes/templates/jango-shortcodes-menu.html.twig */
class __TwigTemplate_e1bf2fc87944cbcfe0001cf02d5399287dd48d8d23eaa171c34eaaf873085d45 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("if" => 3, "for" => 10, "set" => 21);
        $filters = array("t" => 122);
        $functions = array("simplify_menu" => 21, "url" => 60);

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if', 'for', 'set'),
                array('t'),
                array('simplify_menu', 'url')
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 1
        echo "<header class=\"c-layout-header ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["class"] ?? null), "html", null, true));
        echo "\" data-minimize-offset=\"80\">
  <input type=\"hidden\" id=\"body-classes\" value=\"";
        // line 2
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["body_classes"] ?? null), "html", null, true));
        echo "\"/>
  ";
        // line 3
        if (($context["header_top"] ?? null)) {
            // line 4
            echo "    <div class=\"c-topbar c-topbar-";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["header_top_class"] ?? null), "html", null, true));
            echo "\">
      <div class=\"container";
            // line 5
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["width"] ?? null), "html", null, true));
            echo "\">
        <!-- BEGIN: INLINE NAV -->
        ";
            // line 7
            if ((($context["header_top_social_menu"] ?? null) != false)) {
                // line 8
                echo "          <nav class=\"c-top-menu c-pull-left\">
            <ul class=\"c-icons c-theme-ul\">
              ";
                // line 10
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["header_top_social_menu"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["htsm_li"]) {
                    // line 11
                    echo "                <li><a href=\"";
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["htsm_li"], 0, array(), "array"), "html", null, true));
                    echo "\" target=\"_blank\"><i class=\"icon-social-";
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["htsm_li"], 1, array(), "array"), "html", null, true));
                    echo "\"></i></a></li>
              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['htsm_li'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 13
                echo "            </ul>
          </nav>
        ";
            }
            // line 16
            echo "        <!-- END: INLINE NAV -->

        <!-- BEGIN: INLINE NAV -->
        <nav class=\"c-top-menu c-pull-right\">
          <ul class=\"c-links c-theme-ul\">
            ";
            // line 21
            $context["items"] = call_user_func_array($this->env->getFunction('simplify_menu')->getCallable(), array(($context["header_top_menu"] ?? null)));
            // line 22
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["items"] ?? null), "menu_tree", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["menu_item"]) {
                // line 23
                echo "
              ";
                // line 24
                if ($this->getAttribute($context["loop"], "last", array())) {
                    // line 25
                    echo "                <li class=\"last\">
                  <a href=\"";
                    // line 26
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["menu_item"], "url", array()), "html", null, true));
                    echo "\" ";
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["menu_item"], "options", array()), "attributes", array()), "html", null, true));
                    echo ">";
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["menu_item"], "text", array()), "html", null, true));
                    echo "</a>
                </li>
              ";
                } else {
                    // line 29
                    echo "                <li>
                  <a href=\"";
                    // line 30
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["menu_item"], "url", array()), "html", null, true));
                    echo "\" ";
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["menu_item"], "options", array()), "attributes", array()), "html", null, true));
                    echo ">";
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["menu_item"], "text", array()), "html", null, true));
                    echo "</a>
                </li>
                <li class=\"c-divider\">|</li>
              ";
                }
                // line 34
                echo "            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu_item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "          </ul>

          ";
            // line 37
            if ((($context["language"] ?? null) != false)) {
                // line 38
                echo "            ";
                if (($context["lang_code"] ?? null)) {
                    // line 39
                    echo "              <ul class=\"c-ext c-theme-ul\">
                <li class=\"c-lang dropdown c-last\">
                  <a href=\"#\">";
                    // line 41
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["lang_code"] ?? null), "html", null, true));
                    echo "</a>
                  <!-- Language list menu -->
                  ";
                    // line 43
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["language"] ?? null), "html", null, true));
                    echo "
                </li>
              </ul>
            ";
                }
                // line 47
                echo "          ";
            }
            // line 48
            echo "
        </nav>
        <!-- END: INLINE NAV -->
      </div>
    </div>
  ";
        }
        // line 54
        echo "
  <div class=\"c-navbar\">
    <div class=\"container";
        // line 56
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["width"] ?? null), "html", null, true));
        echo "\">
      <!-- BEGIN: BRAND -->
      <div class=\"c-navbar-wrapper clearfix\">
        <div class=\"c-brand c-pull-left\">
          <a href=\"";
        // line 60
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("<front>")));
        echo "\" class=\"c-logo\">
            <img src=\"";
        // line 61
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["logo"] ?? null), "html", null, true));
        echo "\" alt=\"";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["site_name"] ?? null), "html", null, true));
        echo "\" class=\"c-desktop-logo\">
            <img src=\"";
        // line 62
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["logo"] ?? null), "html", null, true));
        echo "\" alt=\"";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["site_name"] ?? null), "html", null, true));
        echo "\" class=\"c-desktop-logo-inverse\">
            <img src=\"";
        // line 63
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["logo"] ?? null), "html", null, true));
        echo "\" alt=\"";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["site_name"] ?? null), "html", null, true));
        echo "\" class=\"c-mobile-logo\">
          </a>
          <button class=\"c-hor-nav-toggler\" type=\"button\" data-target=\".c-mega-menu\">
            <span class=\"c-line\"></span>
            <span class=\"c-line\"></span>
            <span class=\"c-line\"></span>
          </button>
          <button class=\"c-topbar-toggler\" type=\"button\">
            <i class=\"fa fa-ellipsis-v\"></i>
          </button>
          ";
        // line 73
        if (($context["search"] ?? null)) {
            // line 74
            echo "            <button class=\"c-search-toggler\" type=\"button\">
              <i class=\"fa fa-search\"></i>
            </button>
          ";
        }
        // line 78
        echo "          ";
        if (($context["cart"] ?? null)) {
            // line 79
            echo "            <button class=\"c-cart-toggler\" type=\"button\">
              <i class=\"icon-handbag\"></i>
              <span class=\"c-cart-number c-theme-bg\">";
            // line 81
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["cart_count"] ?? null), "html", null, true));
            echo "</span>
            </button>
          ";
        }
        // line 84
        echo "        </div>
        ";
        // line 85
        if ((($context["search"] ?? null) && (($context["search_block"] ?? null) != false))) {
            // line 86
            echo "          ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["search_block"] ?? null), "html", null, true));
            echo "
        ";
        }
        // line 88
        echo "
        <!-- Dropdown menu toggle on mobile: c-toggler class can be applied to the link arrow or link itself depending on toggle mode -->
        <nav class=\"c-mega-menu c-pull-right c-mega-menu-";
        // line 90
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["bg_color"] ?? null), "html", null, true));
        echo " c-mega-menu-dark-mobile c-mega-menu-onepage c-fonts-uppercase c-fonts-bold\"
          data-onepage-animation-speed=\"700\">
          <!-- Main Menu -->
          <ul class=\"nav navbar-nav c-theme-nav\">
            ";
        // line 94
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["menu"] ?? null), "html", null, true));
        echo "

            ";
        // line 96
        if (($context["search"] ?? null)) {
            // line 97
            echo "              <li class=\"c-search-toggler-wrapper\">
                <a href=\"#\" class=\"c-btn-icon c-search-toggler\">
                  <i class=\"fa fa-search\"></i>
                </a>
              </li>
            ";
        }
        // line 103
        echo "
            ";
        // line 104
        if (($context["cart"] ?? null)) {
            // line 105
            echo "              <li class=\"c-cart-toggler-wrapper\">
                <a href=\"";
            // line 106
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("commerce_cart.page")));
            echo "\" class=\"c-btn-icon c-cart-toggler\">
                  <i class=\"icon-handbag c-cart-icon\"></i>
                  <span class=\"c-cart-number c-theme-bg\">";
            // line 108
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["cart_count"] ?? null), "html", null, true));
            echo "</span>
                </a>
              </li>
            ";
        }
        // line 112
        echo "
            ";
        // line 113
        if (($context["login"] ?? null)) {
            // line 114
            echo "              <li>
                ";
            // line 115
            if (($context["is_authenticated"] ?? null)) {
                // line 116
                echo "                  ";
                $context["user_menu_title"] = "Account";
                // line 117
                echo "                ";
            } else {
                // line 118
                echo "                  ";
                $context["user_menu_title"] = "Sign In";
                // line 119
                echo "                ";
            }
            // line 120
            echo "                <a href=\"";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("user.page")));
            echo "\"
                   class=\"c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold\">
                  <i class=\"icon-user\"></i> ";
            // line 122
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t(($context["user_menu_title"] ?? null))));
            echo "
                </a>
              </li>
            ";
        }
        // line 126
        echo "
            ";
        // line 127
        if (($context["is_dev_host"] ?? null)) {
            // line 128
            echo "              <li class=\"c-quick-sidebar-toggler-wrapper\">
                <a href=\"#\" class=\"c-quick-sidebar-toggler\">
                  <span class=\"c-line\"></span>
                  <span class=\"c-line\"></span>
                  <span class=\"c-line\"></span>
                </a>
              </li>
            ";
        }
        // line 136
        echo "          </ul>
        </nav>
      </div>

      ";
        // line 140
        if ((($context["cart_block"] ?? null) != false)) {
            // line 141
            echo "        <div";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["attributes"] ?? null), "addClass", array(0 => array(0 => "c-cart-menu")), "method"), "html", null, true));
            echo ">
          <div class=\"c-cart-menu-title\">
            <p class=\"c-cart-menu-float-l c-font-sbold\">";
            // line 143
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["count_text"] ?? null), "html", null, true));
            echo "</p>
            <p class=\"c-cart-menu-float-r c-theme-font c-font-sbold\">";
            // line 144
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["cart_total_price"] ?? null), "html", null, true));
            echo "</p>
          </div>
          ";
            // line 146
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["cart_block"] ?? null), "html", null, true));
            echo "
        </div>
      ";
        }
        // line 149
        echo "
    </div>
  </div>
</header>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/jango_shortcodes/templates/jango-shortcodes-menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  398 => 149,  392 => 146,  387 => 144,  383 => 143,  377 => 141,  375 => 140,  369 => 136,  359 => 128,  357 => 127,  354 => 126,  347 => 122,  341 => 120,  338 => 119,  335 => 118,  332 => 117,  329 => 116,  327 => 115,  324 => 114,  322 => 113,  319 => 112,  312 => 108,  307 => 106,  304 => 105,  302 => 104,  299 => 103,  291 => 97,  289 => 96,  284 => 94,  277 => 90,  273 => 88,  267 => 86,  265 => 85,  262 => 84,  256 => 81,  252 => 79,  249 => 78,  243 => 74,  241 => 73,  226 => 63,  220 => 62,  214 => 61,  210 => 60,  203 => 56,  199 => 54,  191 => 48,  188 => 47,  181 => 43,  176 => 41,  172 => 39,  169 => 38,  167 => 37,  163 => 35,  149 => 34,  138 => 30,  135 => 29,  125 => 26,  122 => 25,  120 => 24,  117 => 23,  99 => 22,  97 => 21,  90 => 16,  85 => 13,  74 => 11,  70 => 10,  66 => 8,  64 => 7,  59 => 5,  54 => 4,  52 => 3,  48 => 2,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/custom/jango_shortcodes/templates/jango-shortcodes-menu.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/xeras/sites/drupal/modules/custom/jango_shortcodes/templates/jango-shortcodes-menu.html.twig");
    }
}
