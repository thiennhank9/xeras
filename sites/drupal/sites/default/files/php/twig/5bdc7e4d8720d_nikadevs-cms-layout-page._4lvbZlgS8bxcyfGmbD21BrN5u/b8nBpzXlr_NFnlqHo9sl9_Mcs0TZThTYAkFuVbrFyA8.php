<?php

/* modules/custom/nikadevs_cms/templates/nikadevs-cms-layout-page.html.twig */
class __TwigTemplate_9891ade3109ce870a1d197e18ead9c3851a364a6cf7ec4adafb6b7edf26c9ec6 extends Twig_Template
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
        $tags = array("for" => 1, "if" => 3, "set" => 5);
        $filters = array("join" => 14);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('for', 'if', 'set'),
                array('join'),
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["layout"] ?? null), "rows", array()));
        foreach ($context['_seq'] as $context["id"] => $context["row"]) {
            // line 2
            echo "
    ";
            // line 3
            if ($this->getAttribute($this->getAttribute($context["row"], "settings", array(), "any", false, true), "tag", array(), "any", true, true)) {
                // line 4
                echo "      ";
                if (($this->getAttribute($this->getAttribute($context["row"], "settings", array()), "tag", array()) == "none")) {
                    // line 5
                    echo "          ";
                    $context["tag"] = "";
                    // line 6
                    echo "      ";
                } else {
                    // line 7
                    echo "          ";
                    $context["tag"] = $this->getAttribute($this->getAttribute($context["row"], "settings", array()), "tag", array());
                    // line 8
                    echo "      ";
                }
                // line 9
                echo "    ";
            } else {
                // line 10
                echo "        ";
                $context["tag"] = "";
                // line 11
                echo "    ";
            }
            // line 12
            echo "
    ";
            // line 13
            if (($context["tag"] ?? null)) {
                // line 14
                echo "        <";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["tag"] ?? null), "html", null, true));
                echo " class=\"";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_join_filter($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "wrap", array()), "attributes", array()), "class", array()), " "), "html", null, true));
                echo "\" style=\"";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "wrap", array()), "attributes", array()), "style", array()), "html", null, true));
                echo "\">
    ";
            }
            // line 16
            echo "
    ";
            // line 17
            if ($this->getAttribute($this->getAttribute($context["row"], "settings", array(), "any", false, true), "full_width", array(), "any", true, true)) {
                // line 18
                echo "        ";
                $context["container_class"] = "-fluid";
                // line 19
                echo "    ";
            } else {
                // line 20
                echo "        ";
                $context["container_class"] = "";
                // line 21
                echo "    ";
            }
            // line 22
            echo "
      <div class=\"container";
            // line 23
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["container_class"] ?? null), "html", null, true));
            echo "\">

        <div id=\"";
            // line 25
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["row"], "attributes", array()), "id", array()), "html", null, true));
            echo "\" class=\"";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_join_filter($this->getAttribute($this->getAttribute($context["row"], "attributes", array()), "class", array()), " "), "html", null, true));
            echo " ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_join_filter($this->getAttribute($this->getAttribute($context["row"], "settings", array()), "class", array()), " "), "html", null, true));
            echo "\">

          ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["layout"] ?? null), "regions", array()));
            foreach ($context['_seq'] as $context["region_key"] => $context["region"]) {
                // line 28
                echo "
            ";
                // line 29
                if ((($context["id"] == $this->getAttribute($context["region"], "row_id", array())) &&  !twig_test_empty($this->getAttribute($context["region"], "content", array())))) {
                    // line 30
                    echo "
              ";
                    // line 31
                    if ($this->getAttribute($this->getAttribute($context["region"], "settings", array()), "tag", array())) {
                        // line 32
                        echo "                <";
                        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["region"], "settings", array()), "tag", array()), "html", null, true));
                        echo " id=\"";
                        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["region"], "attributes", array()), "id", array()), "html", null, true));
                        echo "\" class=\"";
                        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_join_filter($this->getAttribute($this->getAttribute($context["region"], "attributes", array()), "class", array()), " "), "html", null, true));
                        echo "\" style=\"";
                        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["region"], "attributes", array()), "style", array()), "html", null, true));
                        echo "\">
              ";
                    }
                    // line 34
                    echo "
                ";
                    // line 35
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["region"], "content", array()), "html", null, true));
                    echo "

              ";
                    // line 37
                    if ($this->getAttribute($this->getAttribute($context["region"], "settings", array()), "tag", array())) {
                        // line 38
                        echo "                </";
                        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["region"], "settings", array()), "tag", array()), "html", null, true));
                        echo ">
              ";
                    }
                    // line 40
                    echo "
            ";
                }
                // line 42
                echo "
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['region_key'], $context['region'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "
        </div>

      </div>

    ";
            // line 49
            if (($context["tag"] ?? null)) {
                // line 50
                echo "        </";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["tag"] ?? null), "html", null, true));
                echo ">
    ";
            }
            // line 52
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "modules/custom/nikadevs_cms/templates/nikadevs-cms-layout-page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 52,  187 => 50,  185 => 49,  178 => 44,  171 => 42,  167 => 40,  161 => 38,  159 => 37,  154 => 35,  151 => 34,  139 => 32,  137 => 31,  134 => 30,  132 => 29,  129 => 28,  125 => 27,  116 => 25,  111 => 23,  108 => 22,  105 => 21,  102 => 20,  99 => 19,  96 => 18,  94 => 17,  91 => 16,  81 => 14,  79 => 13,  76 => 12,  73 => 11,  70 => 10,  67 => 9,  64 => 8,  61 => 7,  58 => 6,  55 => 5,  52 => 4,  50 => 3,  47 => 2,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/custom/nikadevs_cms/templates/nikadevs-cms-layout-page.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/xeras/sites/drupal/modules/custom/nikadevs_cms/templates/nikadevs-cms-layout-page.html.twig");
    }
}
