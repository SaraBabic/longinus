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

/* themes/custom/longinus/templates/block/block--system-menu-block--main.html.twig */
class __TwigTemplate_9802c88382f4b37082bf4eda33a6841ee0335571c9f41bae6914b114b0fb676d extends \Twig\Template
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
        // line 1
        $context["longinus_block_base"] = ("block block-" . \Drupal\Component\Utility\Html::getClass(twig_first($this->env, twig_split_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 1, $this->source), "__", 2))));
        // line 2
        $context["longinus_block"] = twig_replace_filter($this->sandbox->ensureToStringAllowed(($context["longinus_block_base"] ?? null), 2, $this->source), ["longinus-" => ""]);
        // line 3
        $context["longinus_modifiers"] = twig_slice($this->env, twig_split_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 3, $this->source), "__"), 1);
        // line 5
        $context["classes"] = [0 =>         // line 6
($context["longinus_block"] ?? null)];
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, twig_split_filter($this->env, ($context["id"] ?? null), "__"), 1));
        foreach ($context['_seq'] as $context["_key"] => $context["modifier"]) {
            // line 10
            echo "  ";
            $context["classes"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["classes"] ?? null), 10, $this->source), [0 => (($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 10, $this->source) . "--") . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed($context["modifier"], 10, $this->source)))]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['modifier'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        $context["heading_id"] = ($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "id", [], "any", false, false, true, 12), 12, $this->source) . \Drupal\Component\Utility\Html::getId("-title"));
        // line 13
        echo "<nav aria-labelledby=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["heading_id"] ?? null), 13, $this->source), "html", null, true);
        echo "\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 13), 13, $this->source), "role", "aria-labelledby"), "html", null, true);
        echo ">
  ";
        // line 15
        echo "  ";
        if ( !twig_get_attribute($this->env, $this->source, ($context["configuration"] ?? null), "label_display", [], "any", false, false, true, 15)) {
            // line 16
            echo "    ";
            $context["title_attributes"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["title_attributes"] ?? null), "setAttribute", [0 => "id", 1 => ($context["heading_id"] ?? null)], "method", false, false, true, 16), "addClass", [0 => "visually-hidden"], "method", false, false, true, 16);
            // line 17
            echo "  ";
        }
        // line 18
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 18, $this->source), "html", null, true);
        echo "
  <div";
        // line 19
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", [0 => ($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 19, $this->source) . "__title")], "method", false, false, true, 19), 19, $this->source), "html", null, true);
        echo ">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["configuration"] ?? null), "label", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
        echo "</div>
  ";
        // line 20
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 20, $this->source), "html", null, true);
        echo "

  ";
        // line 23
        echo "  ";
        $this->displayBlock('content', $context, $blocks);
        // line 27
        echo "</nav>
";
    }

    // line 23
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 24
        echo "    ";
        twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "setAttribute", [0 => "longinus_base", 1 => (($context["longinus_block"] ?? null) . "__")], "method", false, false, true, 24);
        // line 25
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 25, $this->source), "html", null, true);
        echo "
  ";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/block/block--system-menu-block--main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 25,  106 => 24,  102 => 23,  97 => 27,  94 => 23,  89 => 20,  83 => 19,  78 => 18,  75 => 17,  72 => 16,  69 => 15,  62 => 13,  60 => 12,  53 => 10,  49 => 9,  47 => 6,  46 => 5,  44 => 3,  42 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set longinus_block_base = 'block block-' ~ id|split('__', 2)|first|clean_class %}
{% set longinus_block = longinus_block_base|replace({'longinus-' : ''}) %}
{% set longinus_modifiers = id|split('__')|slice(1) %}
{%
  set classes = [
    longinus_block
  ]
%}
{% for modifier in id|split('__')|slice(1) %}
  {% set classes = classes|merge([longinus_block ~ '--' ~ modifier|clean_class]) %}
{% endfor %}
{% set heading_id = attributes.id ~ '-title'|clean_id %}
<nav aria-labelledby=\"{{ heading_id }}\"{{ attributes.addClass(classes)|without('role', 'aria-labelledby') }}>
  {# Label. If not displayed, we still provide it for screen readers. #}
  {% if not configuration.label_display %}
    {% set title_attributes = title_attributes.setAttribute('id', heading_id).addClass('visually-hidden') %}
  {% endif %}
  {{ title_prefix }}
  <div{{ title_attributes.addClass(longinus_block ~ '__title') }}>{{ configuration.label }}</div>
  {{ title_suffix }}

  {# Menu. #}
  {% block content %}
    {% do content_attributes.setAttribute('longinus_base', longinus_block ~ '__') %}
    {{ content }}
  {% endblock %}
</nav>
", "themes/custom/longinus/templates/block/block--system-menu-block--main.html.twig", "/var/www/html/web/themes/custom/longinus/templates/block/block--system-menu-block--main.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1, "for" => 9, "if" => 15, "block" => 23, "do" => 24);
        static $filters = array("clean_class" => 1, "first" => 1, "split" => 1, "replace" => 2, "slice" => 3, "merge" => 10, "clean_id" => 12, "escape" => 13, "without" => 13);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for', 'if', 'block', 'do'],
                ['clean_class', 'first', 'split', 'replace', 'slice', 'merge', 'clean_id', 'escape', 'without'],
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
