<?php

/* themes/custom/jango/templates/form/fieldset.html.twig */
class __TwigTemplate_0cb28d4aa2add92b4d4b0189134237edaf91b77e1fa05c242691579554a53287 extends Twig_Template
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
        $tags = array("set" => 24, "if" => 46);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('set', 'if'),
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

        // line 24
        $context["classes"] = array(0 => "js-form-item", 1 => "form-item", 2 => "js-form-wrapper", 3 => "form-wrapper", 4 => "form-group", 5 => "webform-container-inline");
        // line 33
        echo "<fieldset";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["attributes"] ?? null), "addClass", array(0 => ($context["classes"] ?? null)), "method"), "html", null, true));
        echo ">
  ";
        // line 35
        $context["legend_span_classes"] = array(0 => "fieldset-legend", 1 => ((        // line 37
($context["required"] ?? null)) ? ("js-form-required") : ("")), 2 => ((        // line 38
($context["required"] ?? null)) ? ("form-required") : ("")));
        // line 41
        echo "  ";
        // line 42
        echo "  <legend";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["legend"] ?? null), "attributes", array()), "html", null, true));
        echo ">
    <span";
        // line 43
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["legend_span"] ?? null), "attributes", array()), "addClass", array(0 => ($context["legend_span_classes"] ?? null)), "method"), "html", null, true));
        echo ">";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["legend"] ?? null), "title", array()), "html", null, true));
        echo "</span>
  </legend>
  <div class=\"fieldset-wrapper\">
    ";
        // line 46
        if (($context["errors"] ?? null)) {
            // line 47
            echo "      <div>
        ";
            // line 48
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["errors"] ?? null), "html", null, true));
            echo "
      </div>
    ";
        }
        // line 51
        echo "
    ";
        // line 52
        if ((($this->getAttribute($this->getAttribute(($context["legend"] ?? null), "title", array()), "#markup", array(), "array") == "Checkbox") || ($this->getAttribute($this->getAttribute(($context["legend"] ?? null), "title", array()), "#markup", array(), "array") == "Radio Buttons"))) {
            // line 53
            echo "      <label>";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["legend"] ?? null), "title", array()), "html", null, true));
            echo "</label>
    ";
        }
        // line 55
        echo "
    ";
        // line 56
        if (($context["prefix"] ?? null)) {
            // line 57
            echo "      <span class=\"field-prefix\">";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["prefix"] ?? null), "html", null, true));
            echo "</span>
    ";
        }
        // line 59
        echo "    ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["children"] ?? null), "html", null, true));
        echo "
    ";
        // line 60
        if (($context["suffix"] ?? null)) {
            // line 61
            echo "      <span class=\"field-suffix\">";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["suffix"] ?? null), "html", null, true));
            echo "</span>
    ";
        }
        // line 63
        echo "    ";
        if ($this->getAttribute(($context["description"] ?? null), "content", array())) {
            // line 64
            echo "      <div";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["description"] ?? null), "attributes", array()), "addClass", array(0 => "description"), "method"), "html", null, true));
            echo ">";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["description"] ?? null), "content", array()), "html", null, true));
            echo "</div>
    ";
        }
        // line 66
        echo "  </div>
</fieldset>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango/templates/form/fieldset.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 66,  118 => 64,  115 => 63,  109 => 61,  107 => 60,  102 => 59,  96 => 57,  94 => 56,  91 => 55,  85 => 53,  83 => 52,  80 => 51,  74 => 48,  71 => 47,  69 => 46,  61 => 43,  56 => 42,  54 => 41,  52 => 38,  51 => 37,  50 => 35,  45 => 33,  43 => 24,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/custom/jango/templates/form/fieldset.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/sites/drupal/themes/custom/jango/templates/form/fieldset.html.twig");
    }
}
