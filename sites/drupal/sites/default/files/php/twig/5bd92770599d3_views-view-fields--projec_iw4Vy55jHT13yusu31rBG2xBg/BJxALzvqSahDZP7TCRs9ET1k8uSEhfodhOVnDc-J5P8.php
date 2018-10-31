<?php

/* themes/custom/jango/templates/views/view--project/page-3/views-view-fields--project--page-3.html.twig */
class __TwigTemplate_f2e8181c2dd037ce53eb89694b93d51283634aad2eee4e205dac7cbe76e95933 extends Twig_Template
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
        $tags = array("set" => 34, "if" => 53);
        $filters = array("trim" => 34, "striptags" => 34, "number_format" => 45, "t" => 58);
        $functions = array("create_attribute" => 51);

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('set', 'if'),
                array('trim', 'striptags', 'number_format', 't'),
                array('create_attribute')
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
        $context["data_id"] = (((((($this->getAttribute($this->getAttribute(($context["view"] ?? null), "element", array()), "#name", array(), "array") . "-") . $this->getAttribute($this->getAttribute(($context["view"] ?? null), "element", array()), "#display_id", array(), "array")) . "-") . twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "nid", array()), "content", array())))) . "-") . twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "jango_cms_single_image_fid", array()), "content", array()))));
        // line 35
        $context["counter_delay"] = ($this->getAttribute(($context["row"] ?? null), "index", array()) / 10);
        // line 36
        $context["jango_isotope_gallery"] = $this->getAttribute(($context["options"] ?? null), "jango_isotope_gallery", array());
        // line 37
        echo "
";
        // line 39
        $context["class"] = array(0 => "c-content-isotope-item", 1 => "wow", 2 => "animate", 3 => "zoomIn", 4 => (((twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(        // line 44
($context["fields"] ?? null), "jango_cms_user_access", array()), "content", array()))) == "TRUE")) ? ("contextual-links-region") : ("")), 5 => (((twig_number_format_filter($this->env, $this->getAttribute(        // line 45
($context["jango_isotope_gallery"] ?? null), ($context["data_id"] ?? null), array(), "array"), 0) == 2)) ? ("c-item-size-double") : ("")));
        // line 48
        echo "
";
        // line 49
        $context["src"] = twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "jango_cms_single_image_url", array()), "content", array())));
        // line 50
        echo "
<div";
        // line 51
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->env->getExtension('Drupal\Core\Template\TwigExtension')->createAttribute(), "addClass", array(0 => ($context["class"] ?? null)), "method"), "html", null, true));
        echo " data-wow-delay=\"";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["counter_delay"] ?? null), "html", null, true));
        echo "s\">

  ";
        // line 53
        if ((twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "jango_cms_user_access", array()), "content", array()))) == "TRUE")) {
            // line 54
            echo "    <div class=\"contextual-links-wrapper\">
      <div class=\"item-list\">
        <ul class=\"contextual-links isotope-gallery-action\" data-id=\"";
            // line 56
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["data_id"] ?? null), "html", null, true));
            echo "\">
          <li>
            <a href=\"#\" data-id=\"1\">1 ";
            // line 58
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("column")));
            echo "</a>
          </li>
          <li>
            <a href=\"#\" data-id=\"2\">2 ";
            // line 61
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("columns")));
            echo "</a>
          </li>
        </ul>
      </div>
    </div>
  ";
        }
        // line 67
        echo "
  <div class=\"c-content-isotope-image-container\">
    ";
        // line 69
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["fields"] ?? null), "field_images", array()), "content", array()), "html", null, true));
        echo "
    <div class=\"c-content-isotope-overlay c-ilightbox-image-1\" href=\"";
        // line 70
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["src"] ?? null), "html", null, true));
        echo "\" data-options=\"thumbnail:'";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["src"] ?? null), "html", null, true));
        echo "'\" data-caption=\"<h4>";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "title", array()), "content", array()))), "html", null, true));
        echo "</h4>";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(strip_tags($this->getAttribute($this->getAttribute(($context["fields"] ?? null), "body", array()), "content", array()))), "html", null, true));
        echo "\">
      <div class=\"c-content-isotope-overlay-icon\">
        <i class=\"fa fa-plus c-font-white\"></i>
      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango/templates/views/view--project/page-3/views-view-fields--project--page-3.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 70,  101 => 69,  97 => 67,  88 => 61,  82 => 58,  77 => 56,  73 => 54,  71 => 53,  64 => 51,  61 => 50,  59 => 49,  56 => 48,  54 => 45,  53 => 44,  52 => 39,  49 => 37,  47 => 36,  45 => 35,  43 => 34,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/custom/jango/templates/views/view--project/page-3/views-view-fields--project--page-3.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/sites/drupal/themes/custom/jango/templates/views/view--project/page-3/views-view-fields--project--page-3.html.twig");
    }
}
