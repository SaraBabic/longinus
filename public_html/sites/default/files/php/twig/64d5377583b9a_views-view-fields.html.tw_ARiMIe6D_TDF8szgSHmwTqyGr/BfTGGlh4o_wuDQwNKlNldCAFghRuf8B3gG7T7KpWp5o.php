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

/* themes/custom/longinus/templates/views/views-view-fields.html.twig */
class __TwigTemplate_483815a43d8b54ab8d59333670d98316707c0ea8244c583a4aef5bd25ef09d16 extends \Twig\Template
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
        // line 1
        $context["longinus_block"] = ((("view-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["view"] ?? null), "storage", [], "any", false, false, true, 1), "id", [], "method", false, false, true, 1), 1, $this->source))) . "-") . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["view"] ?? null), "current_display", [], "any", false, false, true, 1), 1, $this->source)));
        // line 2
        $context["longinus_element"] = ($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 2, $this->source) . "__item");
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fields"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 4
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["field"], "separator", [], "any", false, false, true, 4), 4, $this->source), "html", null, true);
            // line 5
            if (twig_get_attribute($this->env, $this->source, $context["field"], "wrapper_element", [], "any", false, false, true, 5)) {
                // line 6
                echo "<";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["field"], "wrapper_element", [], "any", false, false, true, 6), 6, $this->source), "html", null, true);
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["field"], "wrapper_attributes", [], "any", false, false, true, 6), "addClass", [0 => (($this->sandbox->ensureToStringAllowed(($context["longinus_element"] ?? null), 6, $this->source) . "-") . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["field"], "class", [], "any", false, false, true, 6), 6, $this->source))], "method", false, false, true, 6), 6, $this->source), "html", null, true);
                echo ">";
            }
            // line 8
            if (twig_get_attribute($this->env, $this->source, $context["field"], "label", [], "any", false, false, true, 8)) {
                // line 9
                if (twig_get_attribute($this->env, $this->source, $context["field"], "label_element", [], "any", false, false, true, 9)) {
                    // line 10
                    echo "<";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["field"], "label_element", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["field"], "label_attributes", [], "any", false, false, true, 10), "addClass", [0 => ((($this->sandbox->ensureToStringAllowed(($context["longinus_element"] ?? null), 10, $this->source) . "-") . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["field"], "class", [], "any", false, false, true, 10), 10, $this->source)) . "-label")], "method", false, false, true, 10), 10, $this->source), "html", null, true);
                    echo ">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["field"], "label", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["field"], "label_suffix", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
                    echo "</";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["field"], "label_element", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
                    echo ">";
                } else {
                    // line 12
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["field"], "label", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["field"], "label_suffix", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
                }
            }
            // line 15
            if (twig_get_attribute($this->env, $this->source, $context["field"], "element_type", [], "any", false, false, true, 15)) {
                // line 16
                echo "<";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["field"], "element_type", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["field"], "element_attributes", [], "any", false, false, true, 16), "addClass", [0 => ((($this->sandbox->ensureToStringAllowed(($context["longinus_element"] ?? null), 16, $this->source) . "-") . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["field"], "class", [], "any", false, false, true, 16), 16, $this->source)) . "-content")], "method", false, false, true, 16), 16, $this->source), "html", null, true);
                echo ">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["field"], "content", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
                echo "</";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["field"], "element_type", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
                echo ">";
            } else {
                // line 18
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["field"], "content", [], "any", false, false, true, 18), 18, $this->source), "html", null, true);
            }
            // line 20
            if (twig_get_attribute($this->env, $this->source, $context["field"], "wrapper_element", [], "any", false, false, true, 20)) {
                // line 21
                echo "</";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["field"], "wrapper_element", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
                echo ">";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/views/views-view-fields.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 21,  92 => 20,  89 => 18,  79 => 16,  77 => 15,  72 => 12,  61 => 10,  59 => 9,  57 => 8,  51 => 6,  49 => 5,  47 => 4,  43 => 3,  41 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set longinus_block = 'view-' ~ view.storage.id()|clean_class ~ '-' ~ view.current_display|clean_class %}
{% set longinus_element = longinus_block ~ '__item' %}
{% for field in fields -%}
    {{ field.separator }}
    {%- if field.wrapper_element -%}
        <{{ field.wrapper_element }}{{ field.wrapper_attributes.addClass(longinus_element ~ '-' ~ field.class) }}>
    {%- endif %}
    {%- if field.label -%}
        {%- if field.label_element -%}
            <{{ field.label_element }}{{ field.label_attributes.addClass(longinus_element ~ '-' ~ field.class ~ '-label') }}>{{ field.label }}{{ field.label_suffix }}</{{ field.label_element }}>
        {%- else -%}
            {{ field.label }}{{ field.label_suffix }}
        {%- endif %}
    {%- endif %}
    {%- if field.element_type -%}
        <{{ field.element_type }}{{ field.element_attributes.addClass(longinus_element ~ '-' ~ field.class ~ '-content') }}>{{ field.content }}</{{ field.element_type }}>
    {%- else -%}
        {{ field.content }}
    {%- endif %}
    {%- if field.wrapper_element -%}
        </{{ field.wrapper_element }}>
    {%- endif %}
{%- endfor %}
", "themes/custom/longinus/templates/views/views-view-fields.html.twig", "/var/www/html/web/themes/custom/longinus/templates/views/views-view-fields.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1, "for" => 3, "if" => 5);
        static $filters = array("clean_class" => 1, "escape" => 4);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for', 'if'],
                ['clean_class', 'escape'],
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
