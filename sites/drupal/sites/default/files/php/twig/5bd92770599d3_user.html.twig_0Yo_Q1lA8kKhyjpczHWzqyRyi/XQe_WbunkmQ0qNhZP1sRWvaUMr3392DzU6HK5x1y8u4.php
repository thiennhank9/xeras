<?php

/* themes/custom/jango/templates/user/user.html.twig */
class __TwigTemplate_e4ed18fbc369bb9e11b1db2fcefa97e027ce1a59b48d85f15ebb048320e55b35 extends Twig_Template
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
        $tags = array("set" => 22, "if" => 25);
        $filters = array("t" => 29, "without" => 44);
        $functions = array("url" => 22, "path" => 23);

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('set', 'if'),
                array('t', 'without'),
                array('url', 'path')
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

        // line 21
        echo "
";
        // line 22
        $context["current"] = $this->getAttribute($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("<current>"), "#markup", array(), "array");
        // line 23
        $context["user_page"] = $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getPath("entity.user.canonical", array("user" => $this->getAttribute(($context["user"] ?? null), "id", array())));
        // line 24
        echo "
";
        // line 25
        if (twig_in_filter(($context["user_page"] ?? null), ($context["current"] ?? null))) {
            // line 26
            echo "
  ";
            // line 27
            $context["username"] = $this->getAttribute($this->getAttribute(($context["user"] ?? null), "name", array()), "value", array());
            // line 28
            echo "  <div class=\"c-content-title-1\">
    <h3 class=\"c-font-uppercase c-font-bold\">";
            // line 29
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("My Dashboard")));
            echo "</h3>
    <div class=\"c-line-left\"></div>
    <p>
      ";
            // line 32
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Hello")));
            echo "
      <a href=\"";
            // line 33
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getPath("entity.user.canonical", array("user" => $this->getAttribute(($context["user"] ?? null), "id", array()))), "html", null, true));
            echo "\" class=\"c-theme-link\">";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["username"] ?? null), "html", null, true));
            echo "</a>
      (";
            // line 34
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("not")));
            echo "
      <a href=\"";
            // line 35
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getPath("entity.user.canonical", array("user" => $this->getAttribute(($context["user"] ?? null), "id", array()))), "html", null, true));
            echo "\" class=\"c-theme-link\">";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["username"] ?? null), "html", null, true));
            echo "</a>?
      <a href=\"";
            // line 36
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("user.logout")));
            echo "\" class=\"c-theme-link\">";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Sign out")));
            echo "</a>).
      <br>
    </p>
  </div>
  <article";
            // line 40
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["attributes"] ?? null), "addClass", array(0 => "profile", 1 => "row"), "method"), "html", null, true));
            echo ">
    <div class=\"col-md-6 col-sm-6 col-xs-12 c-margin-b-20\">
      <h3 class=\"c-font-uppercase c-font-bold\">";
            // line 42
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["username"] ?? null), "html", null, true));
            echo "</h3>
      ";
            // line 43
            if (($context["content"] ?? null)) {
                // line 44
                echo "        ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_without(($context["content"] ?? null), "user_picture", "member_for"), "html", null, true));
                echo "
      ";
            }
            // line 46
            echo "    </div>
  </article>

";
        } else {
            // line 50
            echo "
  <article";
            // line 51
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["attributes"] ?? null), "html", null, true));
            echo ">
    ";
            // line 52
            if (($context["content"] ?? null)) {
                // line 53
                echo "      <div style=\"width: 50px;\">";
                // line 54
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["content"] ?? null), "html", null, true));
                // line 55
                echo "</div>
    ";
            }
            // line 57
            echo "  </article>

";
        }
    }

    public function getTemplateName()
    {
        return "themes/custom/jango/templates/user/user.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 57,  134 => 55,  132 => 54,  130 => 53,  128 => 52,  124 => 51,  121 => 50,  115 => 46,  109 => 44,  107 => 43,  103 => 42,  98 => 40,  89 => 36,  83 => 35,  79 => 34,  73 => 33,  69 => 32,  63 => 29,  60 => 28,  58 => 27,  55 => 26,  53 => 25,  50 => 24,  48 => 23,  46 => 22,  43 => 21,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/custom/jango/templates/user/user.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/sites/drupal/themes/custom/jango/templates/user/user.html.twig");
    }
}
