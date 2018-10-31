<?php

/* modules/custom/jango_shortcodes/templates/jango-shortcodes-product-filter-price-from-to-textfields.html.twig */
class __TwigTemplate_6b85bdb707a336db040cb726a9f620eed4414078a690b4f2aba8dd9e77659ffd extends Twig_Template
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
        $filters = array("t" => 1);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array(),
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

        // line 1
        echo "<label class=\"control-label c-font-uppercase c-font-bold\">";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t(($context["title"] ?? null))));
        echo "</label>
<div class=\"c-price-range-box input-group\">
  <div class=\"c-price input-group col-md-6 pull-left\">
    <span class=\"input-group-addon c-square c-theme\">";
        // line 4
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["currency"] ?? null), "html", null, true));
        echo "</span>
    <input type=\"text\" name=\"from_textfield\" class=\"form-control c-square c-theme\" placeholder=\"";
        // line 5
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("from")));
        echo "\"></div>
  <div class=\"c-price input-group col-md-6 pull-left\">
    <span class=\"input-group-addon c-square c-theme\">";
        // line 7
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["currency"] ?? null), "html", null, true));
        echo "</span>
    <input type=\"text\" name=\"to_textfield\" class=\"form-control c-square c-theme\" placeholder=\"";
        // line 8
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("to")));
        echo "\"></div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/jango_shortcodes/templates/jango-shortcodes-product-filter-price-from-to-textfields.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 8,  59 => 7,  54 => 5,  50 => 4,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/custom/jango_shortcodes/templates/jango-shortcodes-product-filter-price-from-to-textfields.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/sites/drupal/modules/custom/jango_shortcodes/templates/jango-shortcodes-product-filter-price-from-to-textfields.html.twig");
    }
}
