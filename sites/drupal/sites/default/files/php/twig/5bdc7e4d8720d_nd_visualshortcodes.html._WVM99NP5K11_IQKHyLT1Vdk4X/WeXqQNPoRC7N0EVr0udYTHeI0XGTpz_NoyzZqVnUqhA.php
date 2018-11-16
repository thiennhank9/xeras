<?php

/* modules/custom/nd_visualshortcodes/templates/nd_visualshortcodes.html.twig */
class __TwigTemplate_ba2856772e1a02dcca2a57a98b04b9de08ccd68c4cdeb8d0c82ab91e3196911f extends Twig_Template
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
        $filters = array("raw" => 4);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array(),
                array('raw'),
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
        echo "<ol class = \"nd_visualshortcodes nd-visualshortcodes-parent";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["live_preview"] ?? null), "html", null, true));
        echo "\">
  <div class = \"nd-visualshortcodes-settings-links nd-visualshortcodes-main-add\"><i class=\"fa fa-plus-square nd_visualshortcodes_add\"></i></div>
  <div class = \"clearfix nd-visualshortcodes-remove\"></div>
  ";
        // line 4
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["output"] ?? null)));
        echo "
  <div class = \"clearfix nd-visualshortcodes-remove end-layout\"></div>
  <div class = \"nd-visualshortcodes-settings-links nd-visualshortcodes-main-add bottom-links\"><i class=\"fa fa-plus-square nd_visualshortcodes_add\"></i></div>
  <div class = \"clearfix nd-visualshortcodes-remove\"></div>
</ol>";
    }

    public function getTemplateName()
    {
        return "modules/custom/nd_visualshortcodes/templates/nd_visualshortcodes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/custom/nd_visualshortcodes/templates/nd_visualshortcodes.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/xeras/sites/drupal/modules/custom/nd_visualshortcodes/templates/nd_visualshortcodes.html.twig");
    }
}
