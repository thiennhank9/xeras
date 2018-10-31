<?php

/* themes/custom/jango/templates/user/user-login-form.html.twig */
class __TwigTemplate_20303749191cdb3f62c8c7e56db9514d74d7de9ee39d7dc0886fcd2638e9c7c2 extends Twig_Template
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
        $tags = array("if" => 10);
        $filters = array("t" => 16);
        $functions = array("url" => 24);

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if'),
                array('t'),
                array('url')
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
        echo "<div class=\"c-shop-login-register-1\">
  <div class=\"row\">
    <div class=\"col-md-6\">
      <div class=\"panel panel-default c-panel\">
        <div class=\"panel-body c-panel-body\">
          ";
        // line 6
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["rendered"] ?? null), "html", null, true));
        echo "
        </div>
      </div>
    </div>
    ";
        // line 10
        if (($context["toggle_checkbox"] ?? null)) {
            // line 11
            echo "      <div class=\"col-md-6\">
        <div class=\"panel panel-default c-panel\">
          <div class=\"panel-body c-panel-body\">
            <div class=\"c-content-title-1\">
              <h3 class=\"c-left\">
                <i class=\"icon-user\"></i>";
            // line 16
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Don't have an account yet?")));
            echo "</h3>
              <div class=\"c-line-left c-theme-bg\"></div>
              <p>";
            // line 18
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Join us and enjoy shopping online today.")));
            echo "</p>
            </div>
            <div class=\"c-margin-fix\">
              ";
            // line 21
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["toggle_checkbox"] ?? null), "html", null, true));
            echo "
            </div>
            <div class=\"c-form-register\">
              <a href=\"";
            // line 24
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("user.register")));
            echo "\" class=\"c-theme-link\">";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("User Register Form")));
            echo "</a>.
            </div>
          </div>
        </div>
      </div>
    ";
        }
        // line 30
        echo "  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango/templates/user/user-login-form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 30,  83 => 24,  77 => 21,  71 => 18,  66 => 16,  59 => 11,  57 => 10,  50 => 6,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/custom/jango/templates/user/user-login-form.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/xeras/sites/drupal/themes/custom/jango/templates/user/user-login-form.html.twig");
    }
}
