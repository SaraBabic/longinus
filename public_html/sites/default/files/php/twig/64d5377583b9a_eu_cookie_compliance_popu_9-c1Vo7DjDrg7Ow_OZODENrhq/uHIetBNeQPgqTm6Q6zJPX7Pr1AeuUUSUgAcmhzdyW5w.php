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

/* themes/custom/longinus/templates/block/eu_cookie_compliance_popup_info.html.twig */
class __TwigTemplate_fd3ede8f41768cc5b94e122023b4bb957fbba2a8d068fe20fa098f3ad29f3272 extends \Twig\Template
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
        // line 36
        if (($context["privacy_settings_tab_label"] ?? null)) {
            // line 37
            echo "\t<button type=\"button\" class=\"eu-cookie-withdraw-tab\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["privacy_settings_tab_label"] ?? null), 37, $this->source), "html", null, true);
            echo "</button>
";
        }
        // line 39
        $context["classes"] = [0 => "eu-cookie-compliance-banner", 1 => "eu-cookie-compliance-banner-info", 2 => ("eu-cookie-compliance-banner--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 42
($context["method"] ?? null), 42, $this->source)))];
        // line 44
        echo "<div role=\"alertdialog\" aria-labelledby=\"popup-text\" ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 44), 44, $this->source), "html", null, true);
        echo ">
\t<div class=\"popup-content info eu-cookie-compliance-content\">
\t\t<div id=\"popup-text\" class=\"eu-cookie-compliance-message\">
\t\t\t";
        // line 47
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["message"] ?? null), 47, $this->source), "html", null, true);
        echo "
";
        // line 48
        if (($context["cookie_categories"] ?? null)) {
            // line 49
            echo "\t\t<div id=\"eu-cookie-compliance-categories\" class=\"eu-cookie-compliance-categories\">
\t\t\t";
            // line 50
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["cookie_categories"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["category"]) {
                // line 51
                echo "\t\t\t\t<div class=\"eu-cookie-compliance-category item-list__checkbox\">
\t\t\t\t\t<div>
\t\t\t\t\t\t<input type=\"checkbox\" name=\"cookie-categories\" id=\"cookie-category-";
                // line 53
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"], 53, $this->source), "html", null, true);
                echo "\" value=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"], 53, $this->source), "html", null, true);
                echo "\" ";
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["category"], "checkbox_default_state", [], "any", false, false, true, 53), [0 => "checked", 1 => "required"])) {
                    echo " checked ";
                }
                echo " ";
                if ((twig_get_attribute($this->env, $this->source, $context["category"], "checkbox_default_state", [], "any", false, false, true, 53) == "required")) {
                    echo " disabled ";
                }
                echo ">
\t\t\t\t\t\t<label for=\"cookie-category-";
                // line 54
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"], 54, $this->source), "html", null, true);
                echo "\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["category"], "label", [], "any", false, false, true, 54), 54, $this->source), "html", null, true);
                echo "</label>
\t\t\t\t\t</div>
\t\t\t\t\t";
                // line 56
                if (twig_get_attribute($this->env, $this->source, $context["category"], "description", [], "any", false, false, true, 56)) {
                    // line 57
                    echo "\t\t\t\t\t\t<div class=\"eu-cookie-compliance-category-description\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["category"], "description", [], "any", false, false, true, 57), 57, $this->source), "html", null, true);
                    echo "</div>
\t\t\t\t\t";
                }
                // line 59
                echo "\t\t\t\t</div>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            echo "\t\t\t";
            if (($context["save_preferences_button_label"] ?? null)) {
                // line 62
                echo "\t\t\t\t<div class=\"eu-cookie-compliance-categories-buttons\">
\t\t\t\t\t<button type=\"button\" class=\"eu-cookie-compliance-save-preferences-button\">";
                // line 63
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["save_preferences_button_label"] ?? null), 63, $this->source), "html", null, true);
                echo "</button>
\t\t\t\t</div>
\t\t\t";
            }
            // line 66
            echo "\t\t</div>
\t";
        }
        // line 68
        echo "\t\t</div>

\t\t<div id=\"popup-buttons\" class=\"eu-cookie-compliance-buttons";
        // line 70
        if (($context["cookie_categories"] ?? null)) {
            echo " eu-cookie-compliance-has-categories";
        }
        echo "\">
\t\t\t<button type=\"button\" class=\"";
        // line 71
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["primary_button_class"] ?? null), 71, $this->source), "html", null, true);
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["agree_button"] ?? null), 71, $this->source), "html", null, true);
        echo "</button>
\t\t\t<button type=\"button\" class=\"";
        // line 72
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["secondary_button_class"] ?? null), 72, $this->source), "html", null, true);
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["secondary_button_label"] ?? null), 72, $this->source), "html", null, true);
        echo "</button>
\t\t</div>
\t</div>

</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/block/eu_cookie_compliance_popup_info.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 72,  136 => 71,  130 => 70,  126 => 68,  122 => 66,  116 => 63,  113 => 62,  110 => 61,  103 => 59,  97 => 57,  95 => 56,  88 => 54,  74 => 53,  70 => 51,  66 => 50,  63 => 49,  61 => 48,  57 => 47,  50 => 44,  48 => 42,  47 => 39,  41 => 37,  39 => 36,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/longinus/templates/block/eu_cookie_compliance_popup_info.html.twig", "/var/www/html/web/themes/custom/longinus/templates/block/eu_cookie_compliance_popup_info.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 36, "set" => 39, "for" => 50);
        static $filters = array("escape" => 37, "clean_class" => 42);
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
