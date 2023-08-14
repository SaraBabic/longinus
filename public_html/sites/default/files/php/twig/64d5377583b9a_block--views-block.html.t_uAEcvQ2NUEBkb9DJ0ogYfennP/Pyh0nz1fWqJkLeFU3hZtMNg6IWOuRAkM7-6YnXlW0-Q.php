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

/* themes/custom/longinus/templates/block/block--views-block.html.twig */
class __TwigTemplate_178098a07cdd64643fcf9941b7707bf5217160885614ab485c55ff5f8875f774 extends \Twig\Template
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
        ob_start();
        ob_start();
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 12, $this->source), "html", null, true);
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 13
        if (($context["content"] ?? null)) {
            // line 14
            echo "  <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 14), 14, $this->source), "html", null, true);
            echo ">
    ";
            // line 15
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 15, $this->source), "html", null, true);
            echo "
    ";
            // line 16
            if (($context["label"] ?? null)) {
                // line 17
                echo "      <div";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", [0 => ($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 17, $this->source) . "__title block-title")], "method", false, false, true, 17), 17, $this->source), "html", null, true);
                echo ">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 17, $this->source), "html", null, true);
                echo "</div>
    ";
            }
            // line 19
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 19, $this->source), "html", null, true);
            echo "
    ";
            // line 20
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 20, $this->source), "html", null, true);
            echo "
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/block/block--views-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 20,  86 => 19,  78 => 17,  76 => 16,  72 => 15,  67 => 14,  65 => 13,  59 => 12,  52 => 10,  48 => 9,  46 => 6,  45 => 5,  43 => 3,  41 => 2,  39 => 1,);
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
{% set content %}{% spaceless %}{{ content }}{% endspaceless %}{% endset %}
{% if content %}
  <div{{ attributes.addClass(classes) }}>
    {{ title_prefix }}
    {% if label %}
      <div{{ title_attributes.addClass(longinus_block ~ '__title block-title') }}>{{ label }}</div>
    {% endif %}
    {{ title_suffix }}
    {{ content }}
  </div>
{% endif %}
", "themes/custom/longinus/templates/block/block--views-block.html.twig", "/var/www/html/web/themes/custom/longinus/templates/block/block--views-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1, "for" => 9, "spaceless" => 12, "if" => 13);
        static $filters = array("clean_class" => 1, "first" => 1, "split" => 1, "replace" => 2, "slice" => 3, "merge" => 10, "escape" => 12);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for', 'spaceless', 'if'],
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
