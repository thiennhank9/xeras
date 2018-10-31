<?php

/* modules/contrib/flag/templates/flag.html.twig */
class __TwigTemplate_047722152f5e9b2f20bee9192fa43953f038656305d993e432d88b8820025927 extends Twig_Template
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
        $tags = array("spaceless" => 14, "if" => 19, "set" => 20);
        $filters = array("join" => 36);
        $functions = array("attach_library" => 16);

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('spaceless', 'if', 'set'),
                array('join'),
                array('attach_library')
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

        // line 14
        ob_start();
        // line 16
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->attachLibrary("flag/flag.link"), "html", null, true));
        echo "

";
        // line 19
        if ((($context["action"] ?? null) == "unflag")) {
            // line 20
            echo "    ";
            $context["action_class"] = "action-unflag";
        } else {
            // line 22
            echo "    ";
            $context["action_class"] = "action-flag";
        }
        // line 24
        echo "
";
        // line 26
        $context["classes"] = array(0 => "flag", 1 => ("flag-" . $this->getAttribute(        // line 28
($context["flag"] ?? null), "id", array(), "method")), 2 => ((("flag-" . $this->getAttribute(        // line 29
($context["flag"] ?? null), "id", array(), "method")) . "-") . $this->getAttribute(($context["flaggable"] ?? null), "id", array(), "method")), 3 =>         // line 30
($context["action_class"] ?? null));
        // line 32
        echo "
";
        // line 34
        $context["attributes"] = $this->getAttribute(($context["attributes"] ?? null), "setAttribute", array(0 => "rel", 1 => "nofollow"), "method");
        // line 35
        echo "
<div class=\"";
        // line 36
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_join_filter(($context["classes"] ?? null), " "), "html", null, true));
        echo "\"><a";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["attributes"] ?? null), "html", null, true));
        echo ">";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true));
        echo "</a></div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "modules/contrib/flag/templates/flag.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 36,  73 => 35,  71 => 34,  68 => 32,  66 => 30,  65 => 29,  64 => 28,  63 => 26,  60 => 24,  56 => 22,  52 => 20,  50 => 19,  45 => 16,  43 => 14,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/contrib/flag/templates/flag.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/xeras/sites/drupal/modules/contrib/flag/templates/flag.html.twig");
    }
}
