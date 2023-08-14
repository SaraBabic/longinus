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

/* themes/custom/longinus/templates/views/views-view-unformatted--banners--block-1.html.twig */
class __TwigTemplate_9189151b824fbda8f26c3878f314a7dfcf51858353b4d1c6ceb868d7ec66ff63 extends \Twig\Template
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
        // line 39
        echo "    ";
        if (($context["title"] ?? null)) {
            // line 40
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
        if ((twig_length_filter($this->env, ($context["rows"] ?? null)) > 1)) {
            // line 9
            echo "            <div class=\"swiper-container\">
                <div class=\"swiper-wrapper\">

                    ";
            // line 12
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 13
                echo "                        <div class=\"swiper-slide\">
                            ";
                // line 14
                $context["row_classes"] = [0 => ((                // line 15
($context["default_row_class"] ?? null)) ? (($context["longinus_element"] ?? null)) : (""))];
                // line 17
                echo "                            <div";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 17), "addClass", [0 => ($context["row_classes"] ?? null)], "method", false, false, true, 17), 17, $this->source), "html", null, true);
                echo ">
                                ";
                // line 18
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "content", [], "any", false, false, true, 18), 18, $this->source), "html", null, true);
                echo "
                            </div>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "                </div>
                <!-- Add Pagination -->
                <div class=\"view-banners-block-1-swiper-pagination swiper-pagination\"></div>

            </div>
        ";
        } else {
            // line 28
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 29
                echo "                ";
                $context["row_classes"] = [0 => ((                // line 30
($context["default_row_class"] ?? null)) ? (($context["longinus_element"] ?? null)) : (""))];
                // line 32
                echo "                <div";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 32), "addClass", [0 => ($context["row_classes"] ?? null)], "method", false, false, true, 32), 32, $this->source), "html", null, true);
                echo ">
                    ";
                // line 33
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "content", [], "any", false, false, true, 33), 33, $this->source), "html", null, true);
                echo "
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "        ";
        }
        // line 37
        echo "                   
    ";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/views/views-view-unformatted--banners--block-1.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 37,  138 => 36,  129 => 33,  124 => 32,  122 => 30,  120 => 29,  115 => 28,  107 => 22,  97 => 18,  92 => 17,  90 => 15,  89 => 14,  86 => 13,  82 => 12,  77 => 9,  74 => 8,  70 => 7,  64 => 40,  61 => 39,  58 => 7,  51 => 5,  46 => 4,  44 => 3,  42 => 2,  40 => 1,);
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
        {% if rows|length > 1 %}
            <div class=\"swiper-container\">
                <div class=\"swiper-wrapper\">

                    {% for row in rows %}
                        <div class=\"swiper-slide\">
                            {% set row_classes = [
                            default_row_class ? longinus_element,
                            ] %}
                            <div{{ row.attributes.addClass(row_classes) }}>
                                {{ row.content }}
                            </div>
                        </div>
                    {% endfor %}
                </div>
                <!-- Add Pagination -->
                <div class=\"view-banners-block-1-swiper-pagination swiper-pagination\"></div>

            </div>
        {% else %}
            {% for row in rows %}
                {% set row_classes = [
                    default_row_class ? longinus_element,
                ] %}
                <div{{ row.attributes.addClass(row_classes) }}>
                    {{ row.content }}
                </div>
            {% endfor %}
        {% endif %}
                   
    {% endblock %}
    {% if title %}
</div>
{% endif %}
", "themes/custom/longinus/templates/views/views-view-unformatted--banners--block-1.html.twig", "/var/www/html/web/themes/custom/longinus/templates/views/views-view-unformatted--banners--block-1.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1, "if" => 3, "block" => 7, "for" => 12);
        static $filters = array("clean_class" => 1, "escape" => 4, "length" => 8);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block', 'for'],
                ['clean_class', 'escape', 'length'],
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
