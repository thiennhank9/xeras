<?php

/* themes/custom/jango/templates/commerce/commerce-product.html.twig */
class __TwigTemplate_8c571a2f4a0034a0d26cae8a2619639beef0a9859d93c588c8da7afba4e7b02c extends Twig_Template
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
        $tags = array("if" => 36);
        $filters = array("t" => 47, "without" => 87);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if'),
                array('t', 'without'),
                array()
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

        // line 22
        echo "<article";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["attributes"] ?? null), "html", null, true));
        echo ">
  <div>
    <div class=\"c-shop-product-details-2\">
      <div class=\"row\">
        <div class=\"col-md-6\">
          ";
        // line 27
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["product"] ?? null), "variation_field_images", array()), "html", null, true));
        echo "
        </div>
        <div class=\"col-md-6\">
          <div class=\"c-product-meta\">
            <div class=\"c-content-title-1\">
              <h3 class=\"c-font-uppercase c-font-bold\">";
        // line 32
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["product"] ?? null), "title", array()), "html", null, true));
        echo "</h3>
              <div class=\"c-line-left\"></div>
            </div>
            <div class=\"c-product-badge\">
              ";
        // line 36
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["product"] ?? null), "field_sale_label", array()), 0, array(), "array"), "#markup", array(), "array") != "Off")) {
            // line 37
            echo "                ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["product"] ?? null), "field_sale_label", array()), "html", null, true));
            echo "
              ";
        }
        // line 39
        echo "              ";
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["product"] ?? null), "field_new_label", array()), 0, array(), "array"), "#markup", array(), "array") != "Off")) {
            // line 40
            echo "                ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["product"] ?? null), "field_new_label", array()), "html", null, true));
            echo "
              ";
        }
        // line 42
        echo "            </div>
            <div class=\"c-product-review\">
              ";
        // line 44
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["product"] ?? null), "field_rating", array()), "html", null, true));
        echo "
              <div class=\"c-product-write-review\">
                <a class=\"c-font-red write-review-link\" href=\"#reviews\">
                  ";
        // line 47
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Write a review")));
        echo "
                </a>
              </div>
            </div>
            <div class=\"c-product-price\">
              ";
        // line 52
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["product"] ?? null), "variation_price", array()), "html", null, true));
        echo "
              <span class=\"c-font-16 c-font-line-through c-font-red\">
                ";
        // line 54
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["product"] ?? null), "variation_field_old_price", array()), "html", null, true));
        echo "
              </span>
            </div>
            <div class=\"c-product-short-desc\">
              ";
        // line 58
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["product"] ?? null), "field_short_description", array()), "html", null, true));
        echo "
            </div>
            ";
        // line 60
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["product"] ?? null), "variations", array()), "html", null, true));
        echo "
            <span class=\"flag-outer flag-outer-compare \">
              ";
        // line 62
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["product"] ?? null), "flag_compare", array()), "html", null, true));
        echo "
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</article>

<div class=\"c-content-box c-size-lg pb-0 product-field-groups\">
  <!-- End Product Content -->
  <div class=\"c-shop-product-tab-1 pb-0\">
    <div class=\"nav-justified  bootstrap-nav-wrapper\">
      <ul class=\"nav nav-justified  nav-tabs\">
        <li class=\"nav_item  align-center active\">
          <a href=\"#bootstrap-fieldgroup-nav-item--description\" data-toggle=\"tab\">";
        // line 77
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Description")));
        echo "</a></li>
        <li class=\"nav_item align-center \">
          <a href=\"#bootstrap-fieldgroup-nav-item--additional-information\" data-toggle=\"tab\">";
        // line 79
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Additional Information")));
        echo "</a>
        </li>
        <li class=\"nav_item \">
          <a href=\"#bootstrap-fieldgroup-nav-item--reviews\" class = \"review-toggler\" id = \"reviews\" data-toggle=\"tab\">";
        // line 82
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Reviews")));
        echo "</a></li>
      </ul>

      <div class=\"tab-content nav-justified\">
        <div id=\"bootstrap-fieldgroup-nav-item--description\" class=\"tab-pane active\">";
        // line 87
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_without(($context["product"] ?? null), "variation_attributes", "title", "variation_title", "variation_field_stock_amount", "variation_field_images", "field_product_category", "field_sale_label", "field_new_label", "field_rating", "variation_price", "variations", "flag_compare", "flag_wishlist", "variation_field_old_price", "variation_sku", "field_short_description"), "html", null, true));
        // line 88
        echo "</div>
        <div id=\"bootstrap-fieldgroup-nav-item--additional-information\" class=\"tab-pane \">
          <div class=\"field field-name-field-sizes field-type-list-text field-label-above\">
            ";
        // line 91
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["product"] ?? null), "variation_attributes", array()), "variation_attribute_size", array()), "html", null, true));
        echo "
          </div>
          <div class=\"field field-name-field-colors field-type-list-text field-label-above\">
            ";
        // line 94
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["product"] ?? null), "variation_attributes", array()), "variation_attribute_color", array()), "html", null, true));
        echo "
          </div>
          <div class=\"collapsible bg-full-width c-bg-grey speed-fast effect-none\">
          ";
        // line 97
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["product"] ?? null), "variation_sku", array()), "html", null, true));
        echo "
          ";
        // line 98
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["product"] ?? null), "field_product_category", array()), "html", null, true));
        echo "
          </div>
        </div>
        <div id=\"bootstrap-fieldgroup-nav-item--reviews\" class=\"tab-pane \">
          <h3 class=\"c-font-uppercase c-font-bold c-font-22 c-center c-margin-b-40 c-margin-t-40\">";
        // line 102
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Reviews for")));
        echo " ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["product"] ?? null), "title", array()), "html", null, true));
        echo "</h3>
          <div class=\"c-product-review-input\">
            ";
        // line 104
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["product"] ?? null), "field_reviews", array()), "html", null, true));
        echo "
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango/templates/commerce/commerce-product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  197 => 104,  190 => 102,  183 => 98,  179 => 97,  173 => 94,  167 => 91,  162 => 88,  160 => 87,  153 => 82,  147 => 79,  142 => 77,  124 => 62,  119 => 60,  114 => 58,  107 => 54,  102 => 52,  94 => 47,  88 => 44,  84 => 42,  78 => 40,  75 => 39,  69 => 37,  67 => 36,  60 => 32,  52 => 27,  43 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/custom/jango/templates/commerce/commerce-product.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/sites/drupal/themes/custom/jango/templates/commerce/commerce-product.html.twig");
    }
}
