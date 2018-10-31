<?php

/* themes/custom/jango/templates/commerce/commerce-product--teaser.html.twig */
class __TwigTemplate_548db6fb4f44b2b911124dabf9ec208cc919a929d5255ea38e5552521776e03b extends Twig_Template
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
        $tags = array("if" => 42);
        $filters = array("t" => 31, "without" => 63);
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
  <div class=\"item node-product-teaser\">
    <div class=\"c-content-product-2 c-bg-white c-border\">
      <div class=\"c-content-overlay\">
        ";
        // line 26
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["product"] ?? null), "field_sale_label", array()), "html", null, true));
        echo "
        ";
        // line 27
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["product"] ?? null), "field_new_label", array()), "html", null, true));
        echo "
        <div class=\"c-overlay-wrapper\">
          <div class=\"c-overlay-content\">
            <a href=\"";
        // line 30
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["product_url"] ?? null), "html", null, true));
        echo "\" class=\"btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square\">
              ";
        // line 31
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Explore")));
        echo "
            </a>
          </div>
        </div>
        <div class=\"hidden\">
          ";
        // line 36
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["product"] ?? null), "variation_field_images", array(), "array"), 0, array(), "array"), "html", null, true));
        echo "
        </div>
        <div class=\"c-bg-img-center-contain c-overlay-object\" data-height=\"height\" style=\"height: 270px; background-image: url('";
        // line 38
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["image_url"] ?? null), "html", null, true));
        echo "');\"></div>
      </div>
      <div class=\"c-info\">
        <p class=\"c-title c-font-18 c-font-slim\">
          ";
        // line 42
        if ($this->getAttribute(($context["product"] ?? null), "title", array())) {
            // line 43
            echo "            ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["product"] ?? null), "title", array(), "array"), 0, array(), "array"), "html", null, true));
            echo "
          ";
        }
        // line 45
        echo "        </p>
        <p class=\"c-price c-font-16 c-font-slim\">
          ";
        // line 47
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["product"] ?? null), "variation_price", array(), "array"), 0, array(), "array"), "html", null, true));
        echo "
          <span class=\"c-font-16 c-font-line-through c-font-red\">
            ";
        // line 49
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["product"] ?? null), "variation_field_old_price", array(), "array"), 0, array(), "array"), "html", null, true));
        echo "
          </span>
        </p>
      </div>
      <div class=\"btn-group btn-group-justified\" role=\"group\">
        <div class=\"btn-group c-border-top\" role=\"group\">
          <span class=\"flag-outer flag-outer-wishlist\">
            <span class=\"flag-wrapper flag-wishlist\">
              ";
        // line 57
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["product"] ?? null), "flag_wishlist", array()), "html", null, true));
        echo "
            </span>
          </span>
        </div>
        <div class=\"btn-group c-border-left c-border-top extra-components\" role=\"group\">
          <div class=\"field field-name-field-products field-type-commerce-product-reference field-label-hidden\">";
        // line 63
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_without(($context["product"] ?? null), "variation_attributes", "title", "variation_field_images", "field_sale_label", "field_new_label", "variation_price", "variation_field_old_price", "flag_wishlist"), "html", null, true));
        // line 64
        echo "</div>
        </div>
      </div>
    </div>
  </div>
</article>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango/templates/commerce/commerce-product--teaser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 64,  121 => 63,  113 => 57,  102 => 49,  97 => 47,  93 => 45,  87 => 43,  85 => 42,  78 => 38,  73 => 36,  65 => 31,  61 => 30,  55 => 27,  51 => 26,  43 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/custom/jango/templates/commerce/commerce-product--teaser.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/xeras/sites/drupal/themes/custom/jango/templates/commerce/commerce-product--teaser.html.twig");
    }
}
