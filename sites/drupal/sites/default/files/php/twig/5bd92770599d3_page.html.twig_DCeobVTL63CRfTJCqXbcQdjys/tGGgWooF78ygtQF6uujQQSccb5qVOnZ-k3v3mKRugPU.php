<?php

/* themes/custom/jango/templates/page.html.twig */
class __TwigTemplate_f25178085e6890cb6c2a8fac18014f16a2c0f51f77671e1ba8f24d2bc522d996 extends Twig_Template
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
        $tags = array("if" => 54);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if'),
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

        // line 53
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "highlighted", array()), "html", null, true));
        echo "
";
        // line 54
        if (($context["layout_builder_activated"] ?? null)) {
            // line 55
            echo "
  ";
            // line 56
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["nikadevs_page"] ?? null), "html", null, true));
            echo "

";
        } else {
            // line 59
            echo "
  ";
            // line 60
            if ($this->getAttribute(($context["page"] ?? null), "header", array())) {
                // line 61
                echo "    ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "header", array()), "html", null, true));
                echo "
  ";
            }
            // line 63
            echo "  <div class=\"container contextual-links-region\">
    ";
            // line 64
            if ($this->getAttribute(($context["page"] ?? null), "page_top", array())) {
                // line 65
                echo "      ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "page_top", array()), "html", null, true));
                echo "
    ";
            }
            // line 67
            echo "    <div class=\"row\">
      <div class=\"col-md-12\">
        ";
            // line 69
            if ($this->getAttribute(($context["page"] ?? null), "content", array())) {
                // line 70
                echo "          ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "content", array()), "html", null, true));
                echo "
        ";
            }
            // line 72
            echo "      </div>
      <div class=\"col-md-12\">
        ";
            // line 74
            if ($this->getAttribute(($context["page"] ?? null), "sidebar", array())) {
                // line 75
                echo "          ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "sidebar", array()), "html", null, true));
                echo "
        ";
            }
            // line 77
            echo "      </div>
    </div>
    ";
            // line 79
            if ($this->getAttribute(($context["page"] ?? null), "page_bottom", array())) {
                // line 80
                echo "      ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "page_bottom", array()), "html", null, true));
                echo "
    ";
            }
            // line 82
            echo "    ";
            if ($this->getAttribute(($context["page"] ?? null), "content_full", array())) {
                // line 83
                echo "      ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "content_full", array()), "html", null, true));
                echo "
    ";
            }
            // line 85
            echo "  </div>
  ";
            // line 86
            if ($this->getAttribute(($context["page"] ?? null), "footer", array())) {
                // line 87
                echo "    ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "footer", array()), "html", null, true));
                echo "
  ";
            }
            // line 89
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "themes/custom/jango/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 89,  130 => 87,  128 => 86,  125 => 85,  119 => 83,  116 => 82,  110 => 80,  108 => 79,  104 => 77,  98 => 75,  96 => 74,  92 => 72,  86 => 70,  84 => 69,  80 => 67,  74 => 65,  72 => 64,  69 => 63,  63 => 61,  61 => 60,  58 => 59,  52 => 56,  49 => 55,  47 => 54,  43 => 53,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/custom/jango/templates/page.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/sites/drupal/themes/custom/jango/templates/page.html.twig");
    }
}
