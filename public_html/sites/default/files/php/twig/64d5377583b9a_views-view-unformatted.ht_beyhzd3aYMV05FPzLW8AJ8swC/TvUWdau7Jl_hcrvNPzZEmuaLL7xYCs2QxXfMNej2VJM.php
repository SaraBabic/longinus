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

/* themes/custom/longinus/templates/views/views-view-unformatted.html.twig */
class __TwigTemplate_ca17c606f41edc3e1fc37aca60536e2665e665e8bb1e73225f4b170af0f8c0af extends \Twig\Template
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
        $context["longinus_block"] = ((($context["longinus_block"] ?? null)) ? (($context["longinus_block"] ?? null)) : (\Drupal\Component\Utility\Html::getClass(((("view-" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["view"] ?? null), "storage", [], "any", false, false, true, 1), "id", [], "method", false, false, true, 1), 1, $this->source)) . "-") . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["view"] ?? null), "current_display", [], "any", false, false, true, 1), 1, $this->source)))));
        // line 2
        $context["longinus_element"] = ($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 2, $this->source) . "__row");
        // line 3
        if (($context["title"] ?? null)) {
            // line 4
            echo "<div class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 4, $this->source), "html", null, true);
            echo "__rows\">
    <h3 class=\"";
            // line 5
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 5, $this->source), "html", null, true);
            echo "__rows-title\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 5, $this->source), "html", null, true);
            echo "</h3>
    ";
        }
        // line 7
        echo "    ";
        $this->displayBlock('content', $context, $blocks);
        // line 17
        echo "    ";
        if (($context["title"] ?? null)) {
            // line 18
            echo "</div>
";
        }
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 9
            echo "            ";
            $context["row_classes"] = [0 => ((            // line 10
($context["default_row_class"] ?? null)) ? (($context["longinus_element"] ?? null)) : (""))];
            // line 12
            echo "            <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 12), "addClass", [0 => ($context["row_classes"] ?? null)], "method", false, false, true, 12), 12, $this->source), "html", null, true);
            echo ">
                ";
            // line 13
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "content", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "    ";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/views/views-view-unformatted.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 16,  88 => 13,  83 => 12,  81 => 10,  79 => 9,  74 => 8,  70 => 7,  64 => 18,  61 => 17,  58 => 7,  51 => 5,  46 => 4,  44 => 3,  42 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set longinus_block = longinus_block ?: ('view-' ~ view.storage.id() ~ '-' ~ view.current_display)|clean_class %}
{% set longinus_element = longinus_block ~ '__row' %}
{% if title %}
<div class=\"{{ longinus_block }}__rows\">
    <h3 class=\"{{ longinus_block }}__rows-title\">{{ title }}</h3>
    {% endif %}
    {% block content %}
        {% for row in rows %}
            {% set row_classes = [
            default_row_class ? longinus_element,
            ] %}
            <div{{ row.attributes.addClass(row_classes) }}>
                {{ row.content }}
            </div>
        {% endfor %}
    {% endblock %}
    {% if title %}
</div>
{% endif %}
", "themes/custom/longinus/templates/views/views-view-unformatted.html.twig", "/var/www/html/web/themes/custom/longinus/templates/views/views-view-unformatted.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1, "if" => 3, "block" => 7, "for" => 8);
        static $filters = array("clean_class" => 1, "escape" => 4);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block', 'for'],
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
