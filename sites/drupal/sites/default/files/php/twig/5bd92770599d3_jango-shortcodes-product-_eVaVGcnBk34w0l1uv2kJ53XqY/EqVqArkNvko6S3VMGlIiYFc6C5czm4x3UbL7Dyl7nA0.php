<?php

/* modules/custom/jango_shortcodes/templates/jango-shortcodes-product-filter-availability.html.twig */
class __TwigTemplate_7e742680ae4b636d36d00b667133a48f13d613d162f4711ffc2334f0e2e5e5b0 extends Twig_Template
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
<div class=\"c-checkbox\">
  <input type=\"checkbox\" id=\"checkbox-sidebar-3-1\" class=\"c-check\">
  <label for=\"checkbox-sidebar-3-1\">
    <span class=\"inc\"></span>
    <span class=\"check\"></span>
    <span class=\"box\"></span>
    <p>";
        // line 8
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Not Available")));
        echo "</p>
  </label>
</div>
<div class=\"c-checkbox c-checkbox-height\">
  <input type=\"checkbox\" id=\"checkbox-sidebar-3-2\" class=\"c-check\">
  <label for=\"checkbox-sidebar-3-2\">
    <span class=\"inc\"></span>
    <span class=\"check\"></span>
    <span class=\"box\"></span>
    <p>";
        // line 17
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("In Stock")));
        echo "</p>
  </label>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/jango_shortcodes/templates/jango-shortcodes-product-filter-availability.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 17,  54 => 8,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/custom/jango_shortcodes/templates/jango-shortcodes-product-filter-availability.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/sites/drupal/modules/custom/jango_shortcodes/templates/jango-shortcodes-product-filter-availability.html.twig");
    }
}
