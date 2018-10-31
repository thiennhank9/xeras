<?php

/* modules/custom/jango_shortcodes/templates/jango-shortcodes-testimonial-item-reviews.html.twig */
class __TwigTemplate_671d8cfa73b290dc1bc5c9a22740320aa1ce42ebe30a20513cd024ebb12efe0a extends Twig_Template
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
        echo "<div class=\"item\">
  <div class=\"c-content-testimonial-3 ";
        // line 2
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["bg_type"] ?? null), "html", null, true));
        echo "\">
    <div class=\"c-content\">
      ";
        // line 4
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["text"] ?? null)));
        echo "
    </div>
    <div class=\"c-person\">
      ";
        // line 7
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["img"] ?? null), "html", null, true));
        echo "
      <div class=\"c-person-detail c-font-uppercase\">
        <h4 class=\"c-name\">";
        // line 9
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["name"] ?? null), "html", null, true));
        echo "</h4>
        <p class=\"c-position c-font-bold c-theme-font\">";
        // line 10
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["position"] ?? null), "html", null, true));
        echo "</p>
      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/jango_shortcodes/templates/jango-shortcodes-testimonial-item-reviews.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 10,  62 => 9,  57 => 7,  51 => 4,  46 => 2,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/custom/jango_shortcodes/templates/jango-shortcodes-testimonial-item-reviews.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/xeras/sites/drupal/modules/custom/jango_shortcodes/templates/jango-shortcodes-testimonial-item-reviews.html.twig");
    }
}
