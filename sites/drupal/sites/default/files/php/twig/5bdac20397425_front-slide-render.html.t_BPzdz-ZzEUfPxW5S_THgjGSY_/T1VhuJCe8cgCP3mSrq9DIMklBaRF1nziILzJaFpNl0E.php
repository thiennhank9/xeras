<?php

/* modules/contrib/md_slider/templates/frontend/front-slide-render.html.twig */
class __TwigTemplate_a3bcf79e294f27b07a46fb690339f6e46da94f44efc7ff379147f092ba65298c extends Twig_Template
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
        $tags = array("if" => 1, "for" => 15);
        $filters = array("raw" => 6);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if', 'for'),
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
        if (($this->getAttribute(($context["settings"] ?? null), "disabled", array()) != 1)) {
            // line 2
            echo "<div class=\"md-slide-item ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["index"] ?? null), "html", null, true));
            echo "\" ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["attributes"] ?? null), "html", null, true));
            echo ">
<div class=\"md-main-img\" style=\"";
            // line 3
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["background_style"] ?? null), "html", null, true));
            echo "\">

    ";
            // line 5
            if (($context["background_url"] ?? null)) {
                // line 6
                echo "        <img src=\"";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["background_url"] ?? null), "html", null, true));
                echo "\" alt=\"";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->getAttribute(($context["settings"] ?? null), "background_image_alt", array())));
                echo "\" ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["background_style"] ?? null), "html", null, true));
                echo " />
    ";
            }
            // line 8
            echo "
</div>
";
            // line 10
            if ($this->getAttribute(($context["settings"] ?? null), "background_overlay", array())) {
                // line 11
                echo "<div class=\"md-slider-overlay\" style=\"background: ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["settings"] ?? null), "background_overlay", array()), "html", null, true));
                echo "\">
</div>
";
            }
            // line 14
            echo "<div class=\"md-objects\">
    ";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["contentLayers"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["contentLayer"]) {
                // line 16
                echo "        ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $context["contentLayer"], "html", null, true));
                echo "
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contentLayer'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo "</div>
</div>
";
        }
        // line 21
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/md_slider/templates/frontend/front-slide-render.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 21,  98 => 18,  89 => 16,  85 => 15,  82 => 14,  75 => 11,  73 => 10,  69 => 8,  59 => 6,  57 => 5,  52 => 3,  45 => 2,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/contrib/md_slider/templates/frontend/front-slide-render.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/xeras/sites/drupal/modules/contrib/md_slider/templates/frontend/front-slide-render.html.twig");
    }
}
