<?php

/* modules/contrib/md_slider/templates/frontend/md-slider.html.twig */
class __TwigTemplate_c492a36b810eee2015708fc3c6f6d8486b3cdd5a783b6a2daf6eae8dbb597a43 extends Twig_Template
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
        $tags = array("for" => 17);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('for'),
                array(),
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
        echo "<div id=\"md-slider-";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["slid"] ?? null), "html", null, true));
        echo "-block\" class=\"md-slide-items\" ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["attributes"] ?? null), "html", null, true));
        echo " >
    <div class=\"wrap-loader-slider animated\">
        <div class=\"wrap-cube\">
            <div class=\"sk-cube-grid\">
                <div class=\"sk-cube sk-cube1\"></div>
                <div class=\"sk-cube sk-cube2\"></div>
                <div class=\"sk-cube sk-cube3\"></div>
                <div class=\"sk-cube sk-cube4\"></div>
                <div class=\"sk-cube sk-cube5\"></div>
                <div class=\"sk-cube sk-cube6\"></div>
                <div class=\"sk-cube sk-cube7\"></div>
                <div class=\"sk-cube sk-cube8\"></div>
                <div class=\"sk-cube sk-cube9\"></div>
            </div>
        </div>
    </div>
    ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["contentSlides"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["contentSlide"]) {
            // line 18
            echo "        ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $context["contentSlide"], "html", null, true));
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contentSlide'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/md_slider/templates/frontend/md-slider.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 20,  69 => 18,  65 => 17,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/contrib/md_slider/templates/frontend/md-slider.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/xeras/sites/drupal/modules/contrib/md_slider/templates/frontend/md-slider.html.twig");
    }
}
