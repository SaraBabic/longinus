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

/* block.html.twig */
class __TwigTemplate_8bff610b7e5e8f3a985d10d9645c51908e543b28be1f66371ee14997191bee90 extends \Twig\Template
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
        echo "
";
        // line 30
        $context["longinus_block_base"] = ("block block-" . \Drupal\Component\Utility\Html::getClass(twig_first($this->env, twig_split_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 30, $this->source), "__", 2))));
        // line 31
        $context["longinus_block"] = twig_replace_filter($this->sandbox->ensureToStringAllowed(($context["longinus_block_base"] ?? null), 31, $this->source), ["longinus-" => ""]);
        // line 32
        echo "
";
        // line 33
        $context["longinus_modifiers"] = twig_slice($this->env, twig_split_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 33, $this->source), "__"), 1);
        // line 35
        $context["classes"] = [0 =>         // line 36
($context["longinus_block"] ?? null)];
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["longinus_modifiers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["modifier"]) {
            // line 40
            echo "    ";
            $context["classes"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["classes"] ?? null), 40, $this->source), [0 => (($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 40, $this->source) . "--") . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed($context["modifier"], 40, $this->source)))]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['modifier'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 42), 42, $this->source), "html", null, true);
        echo ">
    ";
        // line 43
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 43, $this->source), "html", null, true);
        echo "
    ";
        // line 44
        if (($context["label"] ?? null)) {
            // line 45
            echo "      <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", [0 => ($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 45, $this->source) . "__title block-title")], "method", false, false, true, 45), 45, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 45, $this->source), "html", null, true);
            echo "</div>
    ";
        }
        // line 47
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 47, $this->source), "html", null, true);
        echo "
    ";
        // line 48
        $this->displayBlock('content', $context, $blocks);
        // line 51
        echo "</div>
";
    }

    // line 48
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 49
        echo "        ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 49, $this->source), "html", null, true);
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 49,  97 => 48,  92 => 51,  90 => 48,  85 => 47,  77 => 45,  75 => 44,  71 => 43,  66 => 42,  59 => 40,  55 => 39,  53 => 36,  52 => 35,  50 => 33,  47 => 32,  45 => 31,  43 => 30,  40 => 29,);
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
        {{ content }}
    {% endblock %}
</div>
", "block.html.twig", "themes/custom/longinus/templates/block/block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 30, "for" => 39, "if" => 44, "block" => 48);
        static $filters = array("clean_class" => 30, "first" => 30, "split" => 30, "replace" => 31, "slice" => 33, "merge" => 40, "escape" => 42);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for', 'if', 'block'],
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
