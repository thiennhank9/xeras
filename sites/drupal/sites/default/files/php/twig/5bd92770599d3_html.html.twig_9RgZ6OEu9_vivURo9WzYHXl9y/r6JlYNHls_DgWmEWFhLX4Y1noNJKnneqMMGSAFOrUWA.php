<?php

/* themes/custom/jango/templates/html.html.twig */
class __TwigTemplate_8d6c59ed345383450f514710bcae9575ce353ea18f15a301370c99de5bf22a00 extends Twig_Template
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
        $tags = array("if" => 53);
        $filters = array("safe_join" => 32, "t" => 43);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if'),
                array('safe_join', 't'),
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

        // line 28
        echo "<!DOCTYPE html>
<html";
        // line 29
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["html_attributes"] ?? null), "html", null, true));
        echo ">
  <head>
    <head-placeholder token=\"";
        // line 31
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["placeholder_token"] ?? null), "html", null, true));
        echo "\">
    <title>";
        // line 32
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->safeJoin($this->env, ($context["head_title"] ?? null), " | ")));
        echo "</title>
    <css-placeholder token=\"";
        // line 33
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["placeholder_token"] ?? null), "html", null, true));
        echo "\">
    <js-placeholder token=\"";
        // line 34
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["placeholder_token"] ?? null), "html", null, true));
        echo "\">
    <script src=\"//maps.googleapis.com/maps/api/js?key=";
        // line 35
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["gmap_key"] ?? null), "html", null, true));
        echo "\" type=\"text/javascript\"></script>
  </head>
  <body";
        // line 37
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["attributes"] ?? null), "html", null, true));
        echo ">
    ";
        // line 42
        echo "    <a href=\"#main-content\" class=\"visually-hidden focusable\">
      ";
        // line 43
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Skip to main content")));
        echo "
    </a>
    ";
        // line 45
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["page_top"] ?? null), "html", null, true));
        echo "
    ";
        // line 46
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["page"] ?? null), "html", null, true));
        echo "
    ";
        // line 47
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["page_bottom"] ?? null), "html", null, true));
        echo "
    <js-bottom-placeholder token=\"";
        // line 48
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["placeholder_token"] ?? null), "html", null, true));
        echo "\">
    <div class=\"c-layout-go2top\" style=\"display: block;\">
      <i class=\"icon-arrow-up\"></i>
    </div>

    ";
        // line 53
        if (($context["dev"] ?? null)) {
            // line 54
            echo "      <nav class=\"c-layout-quick-sidebar\">
        <div class=\"c-header\">
          <button type=\"button\" class=\"c-link c-close\">
            <i class=\"icon-login\"></i>
          </button>
        </div>
        <div class=\"c-content\">
          <div class=\"c-section\">
            <h3>";
            // line 62
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Theme Colors")));
            echo "</h3>
            <div class=\"c-settings\">
              <span class=\"c-color c-default c-active\" data-color=\"default\"></span>
              <span class=\"c-color c-green1\" data-color=\"green1\"></span>
              <span class=\"c-color c-green2\" data-color=\"green2\"></span>
              <span class=\"c-color c-green3\" data-color=\"green3\"></span>
              <span class=\"c-color c-yellow1\" data-color=\"yellow1\"></span>
              <span class=\"c-color c-yellow2\" data-color=\"yellow2\"></span>
              <span class=\"c-color c-yellow3\" data-color=\"yellow3\"></span>
              <span class=\"c-color c-red1\" data-color=\"red1\"></span>
              <span class=\"c-color c-red2\" data-color=\"red2\"></span>
              <span class=\"c-color c-red3\" data-color=\"red3\"></span>
              <span class=\"c-color c-purple1\" data-color=\"purple1\"></span>
              <span class=\"c-color c-purple2\" data-color=\"purple2\"></span>
              <span class=\"c-color c-purple3\" data-color=\"purple3\"></span>
              <span class=\"c-color c-blue1\" data-color=\"blue1\"></span>
              <span class=\"c-color c-blue2\" data-color=\"blue2\"></span>
              <span class=\"c-color c-blue3\" data-color=\"blue3\"></span>
              <span class=\"c-color c-brown1\" data-color=\"brown1\"></span>
              <span class=\"c-color c-brown2\" data-color=\"brown2\"></span>
              <span class=\"c-color c-brown3\" data-color=\"brown3\"></span>
              <span class=\"c-color c-dark1\" data-color=\"dark1\"></span>
              <span class=\"c-color c-dark2\" data-color=\"dark2\"></span>
              <span class=\"c-color c-dark3\" data-color=\"dark3\"></span>
            </div>
          </div>
          <div class=\"c-section\">
            <h3>";
            // line 89
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Header Type")));
            echo "</h3>
            <div class=\"c-settings\">
              <input type=\"button\" class=\"c-setting_header-type btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase active\" data-value=\"boxed\" value=\"boxed\">
              <input type=\"button\" class=\"c-setting_header-type btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase\" data-value=\"fluid\" value=\"fluid\">
            </div>
          </div>
          <div class=\"c-section\">
            <h3>";
            // line 96
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Header Mode")));
            echo "</h3>
            <div class=\"c-settings\">
              <input type=\"button\" class=\"c-setting_header-mode btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase active\" data-value=\"fixed\" value=\"fixed\">
              <input type=\"button\" class=\"c-setting_header-mode btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase\" data-value=\"static\" value=\"static\">
            </div>
          </div>
          <div class=\"c-section\">
            <h3>";
            // line 103
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Mega Menu Style")));
            echo "</h3>
            <div class=\"c-settings\">
              <input type=\"button\" class=\"c-setting_megamenu-style btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase active\" data-value=\"dark\" value=\"dark\">
              <input type=\"button\" class=\"c-setting_megamenu-style btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase\" data-value=\"light\" value=\"light\">
            </div>
          </div>
          <div class=\"c-section\">
            <h3>";
            // line 110
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Font Style")));
            echo "</h3>
            <div class=\"c-settings\">
              <input type=\"button\" class=\"c-setting_font-style btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase active\" data-value=\"default\" value=\"default\">
              <input type=\"button\" class=\"c-setting_font-style btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase\" data-value=\"light\" value=\"light\">
            </div>
          </div>
        </div>
      </nav>
    ";
        }
        // line 119
        echo "
    <!--[if lt IE 9]>
    <script src=\"../assets/global/plugins/excanvas.min.js\"></script>
    <![endif]-->
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango/templates/html.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 119,  176 => 110,  166 => 103,  156 => 96,  146 => 89,  116 => 62,  106 => 54,  104 => 53,  96 => 48,  92 => 47,  88 => 46,  84 => 45,  79 => 43,  76 => 42,  72 => 37,  67 => 35,  63 => 34,  59 => 33,  55 => 32,  51 => 31,  46 => 29,  43 => 28,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/custom/jango/templates/html.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/sites/drupal/themes/custom/jango/templates/html.html.twig");
    }
}
