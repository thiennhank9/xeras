<?php

/* themes/custom/jango/templates/user/page--user--login.html.twig */
class __TwigTemplate_8e6097cd8b4287bec5f491a5e8cd61d155b2c7df76fb434477f4484d15c75a80 extends Twig_Template
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
        $tags = array("if" => 56);
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
        echo "
";
        // line 54
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "highlighted", array()), "html", null, true));
        echo "

";
        // line 56
        if ($this->getAttribute(($context["page"] ?? null), "header", array())) {
            // line 57
            echo "  ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "header", array()), "html", null, true));
            echo "
";
        }
        // line 59
        echo "
<div class=\"container contextual-links-region\">
  ";
        // line 61
        if ($this->getAttribute(($context["page"] ?? null), "page_top", array())) {
            // line 62
            echo "    ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "page_top", array()), "html", null, true));
            echo "
  ";
        }
        // line 64
        echo "  <div class=\"row\">
    <div class=\"col-md-12\">
      ";
        // line 66
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "content", array()), "html", null, true));
        echo "
    </div>
    <div class=\"col-md-12\">
      ";
        // line 69
        if ($this->getAttribute(($context["page"] ?? null), "sidebar", array())) {
            // line 70
            echo "        ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "sidebar", array()), "html", null, true));
            echo "
      ";
        }
        // line 72
        echo "    </div>
  </div>
  ";
        // line 74
        if ($this->getAttribute(($context["page"] ?? null), "page_bottom", array())) {
            // line 75
            echo "    ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "page_bottom", array()), "html", null, true));
            echo "
  ";
        }
        // line 77
        echo "  ";
        if ($this->getAttribute(($context["page"] ?? null), "content_full", array())) {
            // line 78
            echo "    ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "content_full", array()), "html", null, true));
            echo "
  ";
        }
        // line 80
        echo "</div>

";
        // line 82
        if ($this->getAttribute(($context["page"] ?? null), "footer", array())) {
            // line 83
            echo "  ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "footer", array()), "html", null, true));
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "themes/custom/jango/templates/user/page--user--login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 83,  114 => 82,  110 => 80,  104 => 78,  101 => 77,  95 => 75,  93 => 74,  89 => 72,  83 => 70,  81 => 69,  75 => 66,  71 => 64,  65 => 62,  63 => 61,  59 => 59,  53 => 57,  51 => 56,  46 => 54,  43 => 53,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/custom/jango/templates/user/page--user--login.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/xeras/sites/drupal/themes/custom/jango/templates/user/page--user--login.html.twig");
    }
}
