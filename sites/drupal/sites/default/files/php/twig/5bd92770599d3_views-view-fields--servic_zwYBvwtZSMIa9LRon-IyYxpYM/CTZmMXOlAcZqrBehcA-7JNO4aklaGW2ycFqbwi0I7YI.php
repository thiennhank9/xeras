<?php

/* themes/custom/jango/templates/views/view--services-we-do/views-view-fields--services-we-do.html.twig */
class __TwigTemplate_a978b6341e9576a0bca989c48c5d37eb011ab2af1ea5e883c910debeec6cc689 extends Twig_Template
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
        $tags = array("if" => 37);
        $filters = array("trim" => 35, "striptags" => 35, "without" => 104);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if'),
                array('trim', 'striptags', 'without'),
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

        // line 34
        echo "<div class=\"col-md-6\">
  <div class=\"c-content-tile-1 c-bg-";
        // line 35
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "field_background_and_arrow_color", array()), "content", array()))), "html", null, true));
        echo "\">
    <div class=\"row\">
      ";
        // line 37
        if ((twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "field_arrow", array()), "content", array()))) == "right")) {
            // line 38
            echo "        <div class=\"col-sm-6\">
          <div class=\"c-tile-content c-content-v-center\" data-height=\"height\">
            <div class=\"c-wrapper\">
              <div class=\"c-body c-center\">
                <h3 class=\"c-tile-title c-font-25 c-line-height-34 c-font-uppercase c-font-bold c-font-white\">
                  ";
            // line 43
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["fields"] ?? null), "title", array()), "content", array()), "html", null, true));
            echo "
                </h3>
                <p class=\"c-tile-body c-font-";
            // line 45
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "field_text_color", array()), "content", array()))), "html", null, true));
            echo "\">
                  ";
            // line 46
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["fields"] ?? null), "body", array()), "content", array()), "html", null, true));
            echo "
                </p>
                ";
            // line 48
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["fields"] ?? null), "view_node", array()), "content", array()), "html", null, true));
            echo "
              </div>
            </div>
          </div>
        </div>
        <div class=\"col-sm-6\">
          <div class=\"c-tile-content c-arrow-";
            // line 54
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "field_arrow", array()), "content", array()))), "html", null, true));
            echo " c-arrow-";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "field_background_and_arrow_color_1", array()), "content", array()))), "html", null, true));
            echo " c-content-overlay\">
            <div class=\"c-overlay-wrapper\">
              <div class=\"c-overlay-content\">
                <a href=\"";
            // line 57
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "path", array()), "content", array()))), "html", null, true));
            echo "\">
                  <i class=\"icon-link\"></i>
                </a>
                <a href=\"";
            // line 60
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "jango_cms_single_image_url", array()), "content", array()))), "html", null, true));
            echo "\" data-lightbox=\"fancybox\" data-fancybox-group=\"gallery-4\">
                  <i class=\"icon-magnifier\"></i>
                </a>
              </div>
            </div>
            <div class=\"c-image c-overlay-object\" data-height=\"height\" style=\"background-image: url(";
            // line 65
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "jango_cms_single_image_url_1", array()), "content", array()))), "html", null, true));
            echo ")\"></div>
          </div>
        </div>
      ";
        }
        // line 69
        echo "
      ";
        // line 70
        if ((twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "field_arrow", array()), "content", array()))) == "left")) {
            // line 71
            echo "        <div class=\"col-sm-6\">
          <div class=\"c-tile-content c-arrow-";
            // line 72
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "field_arrow", array()), "content", array()))), "html", null, true));
            echo " c-arrow-";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "field_background_and_arrow_color_1", array()), "content", array()))), "html", null, true));
            echo " c-content-overlay\">
            <div class=\"c-overlay-wrapper\">
              <div class=\"c-overlay-content\">
                <a href=\"";
            // line 75
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "path", array()), "content", array()))), "html", null, true));
            echo "\">
                  <i class=\"icon-link\"></i>
                </a>
                <a href=\"";
            // line 78
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "jango_cms_single_image_url", array()), "content", array()))), "html", null, true));
            echo "\" data-lightbox=\"fancybox\" data-fancybox-group=\"gallery-4\">
                  <i class=\"icon-magnifier\"></i>
                </a>
              </div>
            </div>
            <div class=\"c-image c-overlay-object\" data-height=\"height\" style=\"background-image: url(";
            // line 83
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "jango_cms_single_image_url_1", array()), "content", array()))), "html", null, true));
            echo ")\"></div>
          </div>
        </div>
        <div class=\"col-sm-6\">
          <div class=\"c-tile-content c-content-v-center\" data-height=\"height\">
            <div class=\"c-wrapper\">
              <div class=\"c-body c-center\">
                <h3 class=\"c-tile-title c-font-25 c-line-height-34 c-font-uppercase c-font-bold c-font-white\">
                  ";
            // line 91
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["fields"] ?? null), "title", array()), "content", array()), "html", null, true));
            echo "
                </h3>
                <p class=\"c-tile-body c-font-";
            // line 93
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "field_text_color", array()), "content", array()))), "html", null, true));
            echo "\">
                  ";
            // line 94
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["fields"] ?? null), "body", array()), "content", array()), "html", null, true));
            echo "
                </p>
                ";
            // line 96
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["fields"] ?? null), "view_node", array()), "content", array()), "html", null, true));
            echo "
              </div>
            </div>
          </div>
        </div>
      ";
        }
        // line 102
        echo "    </div>
  </div>
  ";
        // line 104
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_without(($context["fields"] ?? null), "field_background_and_arrow_color", "field_background_and_arrow_color_1", "title", "body", "view_node", "jango_cms_single_image_url", "jango_cms_single_image_url_1", "path", "field_text_color", "field_arrow"), "html", null, true));
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango/templates/views/view--services-we-do/views-view-fields--services-we-do.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 104,  176 => 102,  167 => 96,  162 => 94,  158 => 93,  153 => 91,  142 => 83,  134 => 78,  128 => 75,  120 => 72,  117 => 71,  115 => 70,  112 => 69,  105 => 65,  97 => 60,  91 => 57,  83 => 54,  74 => 48,  69 => 46,  65 => 45,  60 => 43,  53 => 38,  51 => 37,  46 => 35,  43 => 34,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/custom/jango/templates/views/view--services-we-do/views-view-fields--services-we-do.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/sites/drupal/themes/custom/jango/templates/views/view--services-we-do/views-view-fields--services-we-do.html.twig");
    }
}
