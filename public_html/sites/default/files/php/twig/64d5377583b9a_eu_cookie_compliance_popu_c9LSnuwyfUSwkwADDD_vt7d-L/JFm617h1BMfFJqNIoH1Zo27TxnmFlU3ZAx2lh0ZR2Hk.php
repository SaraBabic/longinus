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

/* modules/contrib/eu_cookie_compliance/templates/eu_cookie_compliance_popup_info.html.twig */
class __TwigTemplate_92cf315636291fb862ca74be7f4f51d3061c0e87ed276d3ff4cbd6e8c574078b extends \Twig\Template
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
        // line 40
        echo "
";
        // line 41
        if (($context["privacy_settings_tab_label"] ?? null)) {
            // line 42
            echo "  <button type=\"button\" class=\"eu-cookie-withdraw-tab\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["privacy_settings_tab_label"] ?? null), 42, $this->source), "html", null, true);
            echo "</button>
";
        }
        // line 44
        $context["classes"] = [0 => "eu-cookie-compliance-banner", 1 => "eu-cookie-compliance-banner-info", 2 => ("eu-cookie-compliance-banner--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 47
($context["method"] ?? null), 47, $this->source)))];
        // line 49
        echo "<div aria-labelledby=\"popup-text\" ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 49), 49, $this->source), "html", null, true);
        echo ">
  <div class=\"popup-content info eu-cookie-compliance-content\">
    ";
        // line 51
        if (($context["close_button_enabled"] ?? null)) {
            // line 52
            echo "      <button class=\"eu-cookie-compliance-close-button\">Close</button>
    ";
        }
        // line 54
        echo "    <div id=\"popup-text\" class=\"eu-cookie-compliance-message\" role=\"document\">
      ";
        // line 55
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["message"] ?? null), 55, $this->source), "html", null, true);
        echo "
      ";
        // line 56
        if (($context["more_info_button"] ?? null)) {
            // line 57
            echo "        <button type=\"button\" class=\"find-more-button eu-cookie-compliance-more-button\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["more_info_button"] ?? null), 57, $this->source), "html", null, true);
            echo "</button>
      ";
        }
        // line 59
        echo "    </div>

    ";
        // line 61
        if (($context["cookie_categories"] ?? null)) {
            // line 62
            echo "      <div id=\"eu-cookie-compliance-categories\" class=\"eu-cookie-compliance-categories\">
        ";
            // line 63
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["cookie_categories"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["category"]) {
                // line 64
                echo "          <div class=\"eu-cookie-compliance-category\">
            <div>
              <input type=\"checkbox\" name=\"cookie-categories\" class=\"eu-cookie-compliance-category-checkbox\" id=\"cookie-category-";
                // line 66
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"], 66, $this->source), "html", null, true);
                echo "\"
                     value=\"";
                // line 67
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"], 67, $this->source), "html", null, true);
                echo "\"
                     ";
                // line 68
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["category"], "checkbox_default_state", [], "any", false, false, true, 68), [0 => "checked", 1 => "required"])) {
                    echo " checked ";
                }
                // line 69
                echo "                     ";
                if ((twig_get_attribute($this->env, $this->source, $context["category"], "checkbox_default_state", [], "any", false, false, true, 69) == "required")) {
                    echo " disabled ";
                }
                echo " >
              <label for=\"cookie-category-";
                // line 70
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"], 70, $this->source), "html", null, true);
                echo "\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["category"], "label", [], "any", false, false, true, 70), 70, $this->source), "html", null, true);
                echo "</label>
            </div>
            ";
                // line 72
                if (twig_get_attribute($this->env, $this->source, $context["category"], "description", [], "any", false, false, true, 72)) {
                    // line 73
                    echo "              <div class=\"eu-cookie-compliance-category-description\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["category"], "description", [], "any", false, false, true, 73), 73, $this->source), "html", null, true);
                    echo "</div>
            ";
                }
                // line 75
                echo "          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            echo "        ";
            if (($context["save_preferences_button_label"] ?? null)) {
                // line 78
                echo "          <div class=\"eu-cookie-compliance-categories-buttons\">
            <button type=\"button\"
                    class=\"eu-cookie-compliance-save-preferences-button ";
                // line 80
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["olivero_secondary_button_classes"] ?? null), 80, $this->source), "html", null, true);
                echo "\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["save_preferences_button_label"] ?? null), 80, $this->source), "html", null, true);
                echo "</button>
          </div>
        ";
            }
            // line 83
            echo "      </div>
    ";
        }
        // line 85
        echo "
    <div id=\"popup-buttons\" class=\"eu-cookie-compliance-buttons";
        // line 86
        if (($context["cookie_categories"] ?? null)) {
            echo " eu-cookie-compliance-has-categories";
        }
        echo "\">
      ";
        // line 87
        if (($context["tertiary_button_label"] ?? null)) {
            // line 88
            echo "        <button type=\"button\" class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["tertiary_button_class"] ?? null), 88, $this->source), "html", null, true);
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["tertiary_button_label"] ?? null), 88, $this->source), "html", null, true);
            echo "</button>
      ";
        }
        // line 90
        echo "      <button type=\"button\" class=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["primary_button_class"] ?? null), 90, $this->source), "html", null, true);
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["agree_button"] ?? null), 90, $this->source), "html", null, true);
        echo "</button>
      ";
        // line 91
        if (($context["secondary_button_label"] ?? null)) {
            // line 92
            echo "        <button type=\"button\" class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["secondary_button_class"] ?? null), 92, $this->source), "html", null, true);
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["secondary_button_label"] ?? null), 92, $this->source), "html", null, true);
            echo "</button>
      ";
        }
        // line 94
        echo "    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/eu_cookie_compliance/templates/eu_cookie_compliance_popup_info.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 94,  185 => 92,  183 => 91,  176 => 90,  168 => 88,  166 => 87,  160 => 86,  157 => 85,  153 => 83,  145 => 80,  141 => 78,  138 => 77,  131 => 75,  125 => 73,  123 => 72,  116 => 70,  109 => 69,  105 => 68,  101 => 67,  97 => 66,  93 => 64,  89 => 63,  86 => 62,  84 => 61,  80 => 59,  74 => 57,  72 => 56,  68 => 55,  65 => 54,  61 => 52,  59 => 51,  53 => 49,  51 => 47,  50 => 44,  44 => 42,  42 => 41,  39 => 40,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/eu_cookie_compliance/templates/eu_cookie_compliance_popup_info.html.twig", "/var/www/html/web/modules/contrib/eu_cookie_compliance/templates/eu_cookie_compliance_popup_info.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 41, "set" => 44, "for" => 63);
        static $filters = array("escape" => 42, "clean_class" => 47);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'for'],
                ['escape', 'clean_class'],
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
