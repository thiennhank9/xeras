<?php

/* themes/custom/jango/templates/views/view--commerce-cart-form/views-view-unformatted--commerce-cart-form.html.twig */
class __TwigTemplate_95d0d33d173b2ee9289c616566da6aa56510f42f1ffdb60cabe6b34f73eef7d6 extends Twig_Template
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
        $tags = array("if" => 20, "for" => 47, "set" => 49);
        $filters = array("t" => 28);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if', 'for', 'set'),
                array('t'),
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

        // line 20
        if (($context["title"] ?? null)) {
            // line 21
            echo "  <h3>";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true));
            echo "</h3>
";
        }
        // line 23
        echo "
<div class=\"c-shop-cart-page-1\">

  <div class=\"row c-cart-table-title\">
    <div class=\"col-md-2 c-cart-image\">
      <h3 class=\"c-font-uppercase c-font-bold c-font-16 c-font-grey-2\">";
        // line 28
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Image")));
        echo "</h3>
    </div>
    <div class=\"col-md-4 c-cart-desc\">
      <h3 class=\"c-font-uppercase c-font-bold c-font-16 c-font-grey-2\">";
        // line 31
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Description")));
        echo "</h3>
    </div>
    <div class=\"col-md-1 c-cart-ref\">
      <h3 class=\"c-font-uppercase c-font-bold c-font-16 c-font-grey-2\">";
        // line 34
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("SKU")));
        echo "</h3>
    </div>
    <div class=\"col-md-1 c-cart-qty\">
      <h3 class=\"c-font-uppercase c-font-bold c-font-16 c-font-grey-2\">";
        // line 37
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Qty")));
        echo "</h3>
    </div>
    <div class=\"col-md-2 c-cart-price\">
      <h3 class=\"c-font-uppercase c-font-bold c-font-16 c-font-grey-2\">";
        // line 40
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Unit Price")));
        echo "</h3>
    </div>
    <div class=\"col-md-1 c-cart-total\">
      <h3 class=\"c-font-uppercase c-font-bold c-font-16 c-font-grey-2\">";
        // line 43
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Total")));
        echo "</h3>
    </div>
    <div class=\"col-md-1 c-cart-remove\"></div>
  </div>
  ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 48
            echo "    ";
            // line 49
            $context["row_classes"] = array(0 => "row", 1 => "c-cart-table-row", 2 => ((            // line 52
($context["default_row_class"] ?? null)) ? ("views-row") : ("")));
            // line 55
            echo "    <div";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["row"], "attributes", array()), "addClass", array(0 => ($context["row_classes"] ?? null)), "method"), "html", null, true));
            echo ">
      ";
            // line 56
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["row"], "content", array()), "html", null, true));
            echo "
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango/templates/views/view--commerce-cart-form/views-view-unformatted--commerce-cart-form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 59,  109 => 56,  104 => 55,  102 => 52,  101 => 49,  99 => 48,  95 => 47,  88 => 43,  82 => 40,  76 => 37,  70 => 34,  64 => 31,  58 => 28,  51 => 23,  45 => 21,  43 => 20,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/custom/jango/templates/views/view--commerce-cart-form/views-view-unformatted--commerce-cart-form.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/xeras/sites/drupal/themes/custom/jango/templates/views/view--commerce-cart-form/views-view-unformatted--commerce-cart-form.html.twig");
    }
}
