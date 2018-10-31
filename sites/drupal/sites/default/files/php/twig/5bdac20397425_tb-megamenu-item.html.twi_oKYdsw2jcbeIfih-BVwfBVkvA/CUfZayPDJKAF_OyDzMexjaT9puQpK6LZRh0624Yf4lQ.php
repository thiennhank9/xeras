<?php

/* themes/custom/jango/templates/tb-megamenu/tb-megamenu-item.html.twig */
class __TwigTemplate_ae9dbe662ce5aa9db6b901d93fafa7ff392ed4864f19f3e91ca86717586d577f extends Twig_Template
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
        $tags = array("set" => 1, "if" => 3);
        $filters = array("t" => 13);
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

        // line 1
        $context["local_class"] = (((is_string($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = $this->getAttribute(($context["link"] ?? null), "url", array(), "array")) && is_string($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = "#") && ('' === $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a || 0 === strpos($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5, $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a)))) ? (" c-onepage-link") : (""));
        // line 2
        echo "
";
        // line 3
        if ($this->getAttribute(($context["item_config"] ?? null), "caption", array(), "array")) {
            // line 4
            echo "  <li class=\"mega-caption\"><h3>";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["item_config"] ?? null), "caption", array(), "array"), "html", null, true));
            echo "</h3></li>
";
        }
        // line 6
        echo "
<li ";
        // line 7
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["attributes"] ?? null), "addClass", array(0 => array(0 => ($context["local_class"] ?? null), 1 => ($context["trail_class"] ?? null))), "method"), "html", null, true));
        echo " >
  <a href=\"";
        // line 8
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["link"] ?? null), "url", array(), "array"), "html", null, true));
        echo "\" ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["link"] ?? null), "attributes", array(), "array"), "addClass", array(0 => ($context["depth_class"] ?? null)), "method"), "html", null, true));
        echo ">
    ";
        // line 9
        if ($this->getAttribute(($context["item_config"] ?? null), "xicon", array(), "array")) {
            // line 10
            echo "      <i class=\"";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["item_config"] ?? null), "xicon", array(), "array"), "html", null, true));
            echo "\"></i>
    ";
        }
        // line 12
        echo "
    ";
        // line 13
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t($this->getAttribute(($context["link"] ?? null), "title_translate", array()))));
        echo "

    ";
        // line 15
        if ((($context["submenu"] ?? null) && $this->getAttribute(($context["block_config"] ?? null), "auto-arrow", array(), "array"))) {
            // line 16
            echo "      <span class=\"c-arrow c-toggler\"></span>
    ";
        }
        // line 18
        echo "  </a>
  ";
        // line 19
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["submenu"] ?? null), "html", null, true));
        echo "
</li>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango/templates/tb-megamenu/tb-megamenu-item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 19,  91 => 18,  87 => 16,  85 => 15,  80 => 13,  77 => 12,  71 => 10,  69 => 9,  63 => 8,  59 => 7,  56 => 6,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/custom/jango/templates/tb-megamenu/tb-megamenu-item.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/xeras/sites/drupal/themes/custom/jango/templates/tb-megamenu/tb-megamenu-item.html.twig");
    }
}
