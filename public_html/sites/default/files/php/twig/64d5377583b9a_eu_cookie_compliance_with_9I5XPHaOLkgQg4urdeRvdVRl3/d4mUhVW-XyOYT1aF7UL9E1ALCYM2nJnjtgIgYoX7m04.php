<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/contrib/eu_cookie_compliance/templates/eu_cookie_compliance_withdraw.html.twig */
class __TwigTemplate_72344f024eebf41e38d6d24a40226f9fa640f74c1e4e3d69d10f56ad633c7dcb extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 22
        echo "<button type=\"button\" class=\"eu-cookie-withdraw-tab\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["withdraw_tab_button_label"] ?? null), 22, $this->source), "html", null, true);
        echo "</button>
<div aria-labelledby=\"popup-text\" class=\"eu-cookie-withdraw-banner\">
  <div class=\"popup-content info eu-cookie-compliance-content\">
    <div id=\"popup-text\" class=\"eu-cookie-compliance-message\" role=\"document\">
      ";
        // line 26
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["message"] ?? null), 26, $this->source), "html", null, true);
        echo "
    </div>
    <div id=\"popup-buttons\" class=\"eu-cookie-compliance-buttons\">
      <button type=\"button\" class=\"eu-cookie-withdraw-button ";
        // line 29
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["olivero_primary_button_classes"] ?? null), 29, $this->source), "html", null, true);
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["withdraw_action_button_label"] ?? null), 29, $this->source), "html", null, true);
        echo "</button>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/eu_cookie_compliance/templates/eu_cookie_compliance_withdraw.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 29,  47 => 26,  39 => 22,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/eu_cookie_compliance/templates/eu_cookie_compliance_withdraw.html.twig", "/var/www/html/web/modules/contrib/eu_cookie_compliance/templates/eu_cookie_compliance_withdraw.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 22);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
