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

/* themes/custom/longinus/templates/block/block--system-powered-by-block.html.twig */
class __TwigTemplate_619dd8d9ef30737623569d8977798f97181f2bdbd5a531e7736ad4f16d57b1da extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        $context["longinus_block_base"] = ("block block-" . \Drupal\Component\Utility\Html::getClass(twig_first($this->env, twig_split_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 29, $this->source), "__", 2))));
        // line 30
        $context["longinus_block"] = twig_replace_filter($this->sandbox->ensureToStringAllowed(($context["longinus_block_base"] ?? null), 30, $this->source), ["longinus-" => ""]);
        // line 31
        $context["longinus_modifiers"] = twig_slice($this->env, twig_split_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 31, $this->source), "__"), 1);
        // line 33
        $context["classes"] = [0 =>         // line 34
($context["longinus_block"] ?? null)];
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["longinus_modifiers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["modifier"]) {
            // line 38
            echo "    ";
            $context["classes"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["classes"] ?? null), 38, $this->source), [0 => (($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 38, $this->source) . "--") . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed($context["modifier"], 38, $this->source)))]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['modifier'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 40), 40, $this->source), "html", null, true);
        echo ">
    ";
        // line 41
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 41, $this->source), "html", null, true);
        echo "
    ";
        // line 42
        if (($context["label"] ?? null)) {
            // line 43
            echo "        <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", [0 => ($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 43, $this->source) . "__title block-title")], "method", false, false, true, 43), 43, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 43, $this->source), "html", null, true);
            echo "</div>
    ";
        }
        // line 45
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 45, $this->source), "html", null, true);
        echo "
    ";
        // line 46
        $this->displayBlock('content', $context, $blocks);
        // line 53
        echo "</div>";
    }

    // line 46
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 47
        echo "        <div class=\"block-poweredbydrupal__content\">
        ";
        // line 48
        echo t("<p>Code and Design by <a class=\"block-poweredbydrupal__sara\" href=\"https://www.linkedin.com/in/sara-babic-985807223/\" rel=\"noreferrer\">Sara</a></p>", array());
        // line 51
        echo "        </div>
    ";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/block/block--system-powered-by-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 51,  97 => 48,  94 => 47,  90 => 46,  86 => 53,  84 => 46,  79 => 45,  71 => 43,  69 => 42,  65 => 41,  60 => 40,  53 => 38,  49 => 37,  47 => 34,  46 => 33,  44 => 31,  42 => 30,  40 => 29,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override to display a block.
 *
 * Available variables:
 * - plugin_id: The ID of the block implementation.
 * - label: The configured label of the block if visible.
 * - configuration: A list of the block's configuration values.
 *   - label: The configured label for the block.
 *   - label_display: The display settings for the label.
 *   - module: The module that provided this block plugin.
 *   - cache: The cache settings.
 *   - Block plugin specific settings will also be stored here.
 * - content: The content of this block.
 * - attributes: array of HTML attributes populated by modules, intended to
 *   be added to the main container tag of this template.
 *   - id: A valid HTML ID and guaranteed unique.
 * - title_attributes: Same as attributes, except applied to the main title
 *   tag that appears in the template.
 * - title_prefix: Additional output populated by modules, intended to be
 *   displayed in front of the main title tag that appears in the template.
 * - title_suffix: Additional output populated by modules, intended to be
 *   displayed after the main title tag that appears in the template.
 *
 * @see template_preprocess_block()
 */
#}
{% set longinus_block_base = 'block block-' ~ id|split('__', 2)|first|clean_class %}
{% set longinus_block = longinus_block_base|replace({'longinus-' : ''}) %}
{% set longinus_modifiers = id|split('__')|slice(1) %}
{%
set classes = [
longinus_block
]
%}
{% for modifier in longinus_modifiers %}
    {% set classes = classes|merge([longinus_block ~ '--' ~ modifier|clean_class]) %}
{% endfor %}
<div{{ attributes.addClass(classes) }}>
    {{ title_prefix }}
    {% if label %}
        <div{{ title_attributes.addClass(longinus_block ~ '__title block-title') }}>{{ label }}</div>
    {% endif %}
    {{ title_suffix }}
    {% block content %}
        <div class=\"block-poweredbydrupal__content\">
        {% trans %}
        <p>Code and Design by <a class=\"block-poweredbydrupal__sara\" href=\"https://www.linkedin.com/in/sara-babic-985807223/\" rel=\"noreferrer\">Sara</a></p>
        {% endtrans %}
        </div>
    {% endblock %}
</div>", "themes/custom/longinus/templates/block/block--system-powered-by-block.html.twig", "/var/www/html/web/themes/custom/longinus/templates/block/block--system-powered-by-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 29, "for" => 37, "if" => 42, "block" => 46, "trans" => 48);
        static $filters = array("clean_class" => 29, "first" => 29, "split" => 29, "replace" => 30, "slice" => 31, "merge" => 38, "escape" => 40);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for', 'if', 'block', 'trans'],
                ['clean_class', 'first', 'split', 'replace', 'slice', 'merge', 'escape'],
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
