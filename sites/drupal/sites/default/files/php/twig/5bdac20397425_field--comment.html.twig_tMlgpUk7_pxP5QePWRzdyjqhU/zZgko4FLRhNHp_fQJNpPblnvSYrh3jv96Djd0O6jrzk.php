<?php

/* themes/custom/jango/templates/comment/field--comment.html.twig */
class __TwigTemplate_0512b63bb969f77397a76d05c10e459db78891bb7d0ffa3585ceffa9ac8faa32 extends Twig_Template
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
        $tags = array("set" => 30, "if" => 37);
        $filters = array("t" => 40);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('set', 'if'),
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

        // line 30
        $context["h3_classes"] = array(0 => "c-font-uppercase", 1 => "c-font-bold");
        // line 35
        echo "
<section";
        // line 36
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["attributes"] ?? null), "addClass", array(0 => "c-comments"), "method"), "html", null, true));
        echo ">
  ";
        // line 37
        if (($context["comments"] ?? null)) {
            // line 38
            echo "    <div class=\"c-content-title-1\">
      <h3";
            // line 39
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["title_attributes"] ?? null), "addClass", array(0 => ($context["h3_classes"] ?? null)), "method"), "html", null, true));
            echo ">
        ";
            // line 40
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Comments")));
            echo " ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["element"] ?? null), "#items", array(), "array"), "comment_count", array()), "html", null, true));
            echo "
      </h3>
      <div class=\"c-line-left\"></div>
    </div>
    <div class=\"c-comment-list\">
      ";
            // line 45
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["comments"] ?? null), "html", null, true));
            echo "
    </div>
  ";
        }
        // line 48
        echo "
  ";
        // line 49
        if (($context["comment_form"] ?? null)) {
            // line 50
            echo "    <div class=\"c-content-title-1\">
      <h3";
            // line 51
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content_attributes"] ?? null), "addClass", array(0 => ($context["h3_classes"] ?? null)), "method"), "html", null, true));
            echo ">
        ";
            // line 52
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Leave a Comment")));
            echo "
      </h3>
      <div class=\"c-line-left\"></div>
    </div>
    ";
            // line 56
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["comment_form"] ?? null), "html", null, true));
            echo "
  ";
        }
        // line 58
        echo "</section>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango/templates/comment/field--comment.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 58,  96 => 56,  89 => 52,  85 => 51,  82 => 50,  80 => 49,  77 => 48,  71 => 45,  61 => 40,  57 => 39,  54 => 38,  52 => 37,  48 => 36,  45 => 35,  43 => 30,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/custom/jango/templates/comment/field--comment.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/xeras/sites/drupal/themes/custom/jango/templates/comment/field--comment.html.twig");
    }
}
