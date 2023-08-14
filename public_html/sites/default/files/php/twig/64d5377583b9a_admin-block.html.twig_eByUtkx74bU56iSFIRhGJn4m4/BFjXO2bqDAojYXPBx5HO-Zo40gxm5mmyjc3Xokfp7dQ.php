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

/* themes/contrib/gin/templates/admin/admin-block.html.twig */
class __TwigTemplate_d49586d18668d61451b92de38d9678b853ccc80232b933433a59665d0385b609 extends \Twig\Template
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
        // line 17
        $context["classes"] = [0 => "panel", 1 => "gin-layer-wrapper"];
        // line 22
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 22), 22, $this->source), "html", null, true);
        echo ">
  ";
        // line 23
        if (twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "title", [], "any", false, false, true, 23)) {
            // line 24
            echo "    <h3 class=\"panel__title\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "title", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
            echo "</h3>
  ";
        }
        // line 26
        echo "  ";
        if (twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "content", [], "any", false, false, true, 26)) {
            // line 27
            echo "    <div class=\"panel__content\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "content", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
            echo "</div>
  ";
        } elseif (twig_get_attribute($this->env, $this->source,         // line 28
($context["block"] ?? null), "description", [], "any", false, false, true, 28)) {
            // line 29
            echo "    <div class=\"panel__description\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "description", [], "any", false, false, true, 29), 29, $this->source), "html", null, true);
            echo "</div>
  ";
        }
        // line 31
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/contrib/gin/templates/admin/admin-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 31,  64 => 29,  62 => 28,  57 => 27,  54 => 26,  48 => 24,  46 => 23,  41 => 22,  39 => 17,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for an administrative block.
 *
 * Available variables:
 * - block: An array of information about the block, including:
 *   - show: A flag indicating if the block should be displayed.
 *   - title: The block title.
 *   - content: (optional) The content of the block.
 *   - description: (optional) A description of the block.
 *     (Description should only be output if content is not available).
 * - attributes: HTML attributes for the containing div element.
 */
#}
{%
  set classes = [
    'panel',
    'gin-layer-wrapper',
  ]
%}
<div{{ attributes.addClass(classes) }}>
  {% if block.title %}
    <h3 class=\"panel__title\">{{ block.title }}</h3>
  {% endif %}
  {% if block.content %}
    <div class=\"panel__content\">{{ block.content }}</div>
  {% elseif block.description %}
    <div class=\"panel__description\">{{ block.description }}</div>
  {% endif %}
</div>
", "themes/contrib/gin/templates/admin/admin-block.html.twig", "/var/www/html/web/themes/contrib/gin/templates/admin/admin-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 17, "if" => 23);
        static $filters = array("escape" => 22);
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
