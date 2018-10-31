<?php

/* modules/custom/nd_visualshortcodes/templates/filtre-popup-list.html.twig */
class __TwigTemplate_a1d75c25455186f64727cb151678e045088cee9cbcc75f98adbc0dd9b668c93c extends Twig_Template
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
        $tags = array("if" => 5, "for" => 9);
        $filters = array("lower" => 5);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if', 'for'),
                array('lower'),
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
        echo "<div class=\"nd_visualshortcodes_enabled_list\">
  <div class=\"nd_visualshortcodes_enabled_list_search\">

    <input type=\"text\"
           class=\"form-control\" ";
        // line 5
        if (($context["value"] ?? null)) {
            echo " value=\"";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_lower_filter($this->env, $this->getAttribute($this->getAttribute(($context["shortcodes"] ?? null), ($context["value"] ?? null), array(), "array"), "title", array())), "html", null, true));
            echo "\" data-exactly=\"1\" ";
        }
        // line 6
        echo "           placeholder=\"Search shortcode\"/></div>
  <div class=\"nd_visualshortcodes_enabled_links\">

    ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["shortcodes"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["shortcode"]) {
            // line 10
            echo "      ";
            if (($this->getAttribute($context["shortcode"], "status", array()) && $this->getAttribute($context["shortcode"], "icon", array()))) {
                // line 11
                echo "        ";
                if (($context["key"] == "a_nd_saved")) {
                    // line 12
                    echo "          ";
                    if (($context["saved"] ?? null)) {
                        // line 13
                        echo "            <a href=\"#\" data-title=\"";
                        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_lower_filter($this->env, $this->getAttribute($context["shortcode"], "title", array())), "html", null, true));
                        echo "\" data-shortcode=\"";
                        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $context["key"], "html", null, true));
                        echo "\"
               class=\"btn btn-md btn-info\">
\t\t\t\t\t <span>
\t\t\t\t\t ";
                        // line 16
                        if ($this->getAttribute($context["shortcode"], "icon", array())) {
                            echo " <i class=\"";
                            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["shortcode"], "icon", array()), "html", null, true));
                            echo "\"></i>  ";
                        }
                        echo " ";
                        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["shortcode"], "title", array()), "html", null, true));
                        echo "</span></a>
          ";
                    }
                    // line 18
                    echo "        ";
                } else {
                    // line 19
                    echo "          <a href=\"#\" data-title=\"";
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_lower_filter($this->env, $this->getAttribute($context["shortcode"], "title", array())), "html", null, true));
                    echo "\" data-shortcode=\"";
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $context["key"], "html", null, true));
                    echo "\" class=\"btn btn-md btn-info\">
\t\t\t\t <span>
\t\t\t\t ";
                    // line 21
                    if ($this->getAttribute($context["shortcode"], "icon", array())) {
                        echo " <i class=\"";
                        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["shortcode"], "icon", array()), "html", null, true));
                        echo "\"></i>  ";
                    }
                    echo " ";
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["shortcode"], "title", array()), "html", null, true));
                    echo "</span></a>
        ";
                }
                // line 23
                echo "      ";
            }
            // line 24
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['shortcode'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/nd_visualshortcodes/templates/filtre-popup-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 25,  118 => 24,  115 => 23,  104 => 21,  96 => 19,  93 => 18,  82 => 16,  73 => 13,  70 => 12,  67 => 11,  64 => 10,  60 => 9,  55 => 6,  49 => 5,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/custom/nd_visualshortcodes/templates/filtre-popup-list.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/sites/drupal/modules/custom/nd_visualshortcodes/templates/filtre-popup-list.html.twig");
    }
}
