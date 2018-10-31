<?php

/* themes/custom/jango/templates/views/view--commerce-cart-form/views-view-fields--commerce-cart-form.html.twig */
class __TwigTemplate_1972e3469eba5a39087b3c8c6c8704778912df3cefceab69cdd6d2d04dc9aee4 extends Twig_Template
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
        $tags = array();
        $filters = array("trim" => 42, "striptags" => 42, "t" => 48);
        $functions = array("path" => 42);

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array(),
                array('trim', 'striptags', 't'),
                array('path')
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

        // line 34
        echo "<h2 class=\"c-font-uppercase c-font-bold c-theme-bg c-font-white c-cart-item-title c-cart-item-first\">
  ";
        // line 35
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["fields"] ?? null), "title", array()), "content", array()), "html", null, true));
        echo "
</h2>
<div class=\"col-md-2 col-sm-3 col-xs-5 c-cart-image\">
  ";
        // line 38
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["fields"] ?? null), "field_images", array()), "content", array()), "html", null, true));
        echo "
</div>
<div class=\"col-md-4 col-sm-9 col-xs-7 c-cart-desc\">
  <h3>
    <a href=\"";
        // line 42
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getPath("entity.commerce_product.canonical", array("commerce_product" => twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "product_id", array()), "content", array()))))), "html", null, true));
        echo "\" class=\"c-font-bold c-theme-link c-font-22 c-font-dark\">
      ";
        // line 43
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["fields"] ?? null), "title", array()), "content", array()), "html", null, true));
        echo "
    </a>
  </h3>
</div>
<div class=\"col-md-1 col-sm-3 col-xs-6 c-cart-ref\">
  <p class=\"c-cart-sub-title c-theme-font c-font-uppercase c-font-bold\">";
        // line 48
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("SKU")));
        echo "</p>
  <p>";
        // line 49
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["fields"] ?? null), "sku", array()), "content", array()), "html", null, true));
        echo "</p>
</div>
<div class=\"col-md-1 col-sm-3 col-xs-6 c-cart-qty\">
  <p class=\"c-cart-sub-title c-theme-font c-font-uppercase c-font-bold\">";
        // line 52
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("QTY")));
        echo "</p>
  ";
        // line 53
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["fields"] ?? null), "edit_quantity", array()), "content", array()), "html", null, true));
        echo "
</div>
<div class=\"col-md-2 col-sm-3 col-xs-6 c-cart-price\">
  <p class=\"c-cart-sub-title c-theme-font c-font-uppercase c-font-bold\">";
        // line 56
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Unit Price")));
        echo "</p>
  <p class=\"c-cart-price c-font-bold\">";
        // line 57
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["fields"] ?? null), "unit_price__number", array()), "content", array()), "html", null, true));
        echo "</p>
</div>
<div class=\"col-md-1 col-sm-3 col-xs-6 c-cart-total\">
  <p class=\"c-cart-sub-title c-theme-font c-font-uppercase c-font-bold\">";
        // line 60
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Total")));
        echo "</p>
  <p class=\"c-cart-price c-font-bold\">";
        // line 61
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["fields"] ?? null), "total_price__number", array()), "content", array()), "html", null, true));
        echo "</p>
</div>
<div class=\"col-md-1 col-sm-12 c-cart-remove\">
  <a href=\"#\" class=\"c-theme-link c-cart-remove-desktop\">×</a>
  <a href=\"#\" class=\"c-cart-remove-mobile btn c-btn c-btn-md c-btn-square c-btn-red c-btn-border-1x c-font-uppercase\">
    ";
        // line 66
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Remove item from Cart")));
        echo "
  </a>
  ";
        // line 68
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["fields"] ?? null), "remove_button", array()), "content", array()), "html", null, true));
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango/templates/views/view--commerce-cart-form/views-view-fields--commerce-cart-form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 68,  113 => 66,  105 => 61,  101 => 60,  95 => 57,  91 => 56,  85 => 53,  81 => 52,  75 => 49,  71 => 48,  63 => 43,  59 => 42,  52 => 38,  46 => 35,  43 => 34,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/custom/jango/templates/views/view--commerce-cart-form/views-view-fields--commerce-cart-form.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/sites/drupal/themes/custom/jango/templates/views/view--commerce-cart-form/views-view-fields--commerce-cart-form.html.twig");
    }
}
