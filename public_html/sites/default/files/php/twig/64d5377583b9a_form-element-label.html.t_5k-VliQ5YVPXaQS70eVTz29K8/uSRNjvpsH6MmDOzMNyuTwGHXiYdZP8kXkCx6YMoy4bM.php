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

/* themes/custom/longinus/templates/form/form-element-label.html.twig */
class __TwigTemplate_2c77837324521435280bd7c7cc4cff6f49fac3c9c4e840a7728dff863fc2f005 extends \Twig\Template
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
        // line 2
        $context["classes"] = [0 => "form-item__label", 1 => (((        // line 4
($context["title_display"] ?? null) == "after")) ? ("option") : ("")), 2 => (((        // line 5
($context["title_display"] ?? null) == "invisible")) ? ("visually-hidden") : ("")), 3 => ((        // line 6
($context["required"] ?? null)) ? ("js-form-required") : ("")), 4 => ((        // line 7
($context["required"] ?? null)) ? ("form-item__label--required") : (""))];
        // line 10
        if (( !twig_test_empty(($context["title"] ?? null)) || ($context["required"] ?? null))) {
            // line 11
            echo "<label";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 11), 11, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 11, $this->source), "html", null, true);
            echo "</label>";
        }
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/form/form-element-label.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 11,  45 => 10,  43 => 7,  42 => 6,  41 => 5,  40 => 4,  39 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{%
  set classes = [
    'form-item__label',
    title_display == 'after' ? 'option',
    title_display == 'invisible' ? 'visually-hidden',
    required ? 'js-form-required',
    required ? 'form-item__label--required',
  ]
%}
{% if title is not empty or required -%}
  <label{{ attributes.addClass(classes) }}>{{ title }}</label>
{%- endif %}
", "themes/custom/longinus/templates/form/form-element-label.html.twig", "/var/www/html/web/themes/custom/longinus/templates/form/form-element-label.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 2, "if" => 10);
        static $filters = array("escape" => 11);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
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
