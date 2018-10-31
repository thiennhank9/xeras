<?php

/* modules/contrib/md_slider/templates/frontend/front-layers-render.html.twig */
class __TwigTemplate_0fc669f654ab3727953ab1014fe0e708047b73982e7fb8b48f080f04a381d6e0 extends Twig_Template
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
        $tags = array("if" => 1, "set" => 6);
        $filters = array("raw" => 15);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if', 'set'),
                array('raw'),
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
        if ( !twig_test_empty($this->getAttribute(($context["layer"] ?? null), "opacity", array()))) {
            // line 2
            echo "<div class=\"md-item-opacity\"  style=\"";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["layer"] ?? null), "opacity", array()), "html", null, true));
            echo "\">
";
        }
        // line 4
        echo "    <div class=\"";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["class"] ?? null), "html", null, true));
        echo "\" ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["attributes"] ?? null), "html", null, true));
        echo ">
    ";
        // line 5
        if ($this->getAttribute($this->getAttribute(($context["layer"] ?? null), "link", array()), "target", array())) {
            // line 6
            echo "        ";
            $context["target"] = (("target=\"" . $this->getAttribute($this->getAttribute(($context["layer"] ?? null), "link", array()), "target", array())) . "\"");
            // line 7
            echo "    ";
        }
        // line 8
        echo "    ";
        if (($this->getAttribute(($context["layer"] ?? null), "type", array()) == "text")) {
            // line 9
            echo "
        ";
            // line 10
            if (($context["link"] ?? null)) {
                // line 11
                echo "            <a href=\"";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["link"] ?? null), "html", null, true));
                echo "\" ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["target"] ?? null), "html", null, true));
                echo ">
                ";
                // line 12
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["layer"] ?? null), "title", array()), "html", null, true));
                echo "
            </a>
        ";
            } else {
                // line 15
                echo "            ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->getAttribute(($context["layer"] ?? null), "title", array())));
                echo "
        ";
            }
            // line 17
            echo "
    ";
        } elseif (($this->getAttribute(        // line 18
($context["layer"] ?? null), "type", array()) == "image")) {
            // line 19
            echo "        ";
            if (($context["link"] ?? null)) {
                // line 20
                echo "        <a href=\"";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["link"] ?? null), "html", null, true));
                echo "\" ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["target"] ?? null), "html", null, true));
                echo ">
            <img src=\"";
                // line 21
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["layer"] ?? null), "url", array()), "html", null, true));
                echo "\" alt=\"";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->getAttribute(($context["layer"] ?? null), "title", array())));
                echo "\" />
        </a>
        ";
            } else {
                // line 24
                echo "            <img src=\"";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["layer"] ?? null), "url", array()), "html", null, true));
                echo "\" alt=\"";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->getAttribute(($context["layer"] ?? null), "title", array())));
                echo "\" />
        ";
            }
            // line 26
            echo "    ";
        } elseif (($this->getAttribute(($context["layer"] ?? null), "type", array()) == "video")) {
            // line 27
            echo "        <a title=\"";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->getAttribute(($context["layer"] ?? null), "title", array())));
            echo "\" class=\"md-video\" href=\"";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["layer"] ?? null), "url", array()), "html", null, true));
            echo "\">
            <img src=\"";
            // line 28
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["layer"] ?? null), "thumb", array()), "html", null, true));
            echo "\" alt=\"";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->getAttribute(($context["layer"] ?? null), "title", array())));
            echo "\"/>
            <span class=\"md-playbtn\"></span>
        </a>
    ";
        }
        // line 32
        echo "    </div>
";
        // line 33
        if ( !twig_test_empty($this->getAttribute(($context["layer"] ?? null), "opacity", array()))) {
            // line 34
            echo "</div>
";
        }
    }

    public function getTemplateName()
    {
        return "modules/contrib/md_slider/templates/frontend/front-layers-render.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 34,  146 => 33,  143 => 32,  134 => 28,  127 => 27,  124 => 26,  116 => 24,  108 => 21,  101 => 20,  98 => 19,  96 => 18,  93 => 17,  87 => 15,  81 => 12,  74 => 11,  72 => 10,  69 => 9,  66 => 8,  63 => 7,  60 => 6,  58 => 5,  51 => 4,  45 => 2,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/contrib/md_slider/templates/frontend/front-layers-render.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/xeras/sites/drupal/modules/contrib/md_slider/templates/frontend/front-layers-render.html.twig");
    }
}
