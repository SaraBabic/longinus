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

/* themes/custom/longinus/templates/views/views-view-table.html.twig */
class __TwigTemplate_8e4f7c515d6891a15f389f00e4497b568789194f44a734057b6cb26aa688d892 extends \Twig\Template
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
        // line 34
        $context["classes"] = [0 => ("cols-" . twig_length_filter($this->env, $this->sandbox->ensureToStringAllowed(        // line 35
($context["header"] ?? null), 35, $this->source))), 1 => ((        // line 36
($context["responsive"] ?? null)) ? ("responsive-enabled") : ("")), 2 => ((        // line 37
($context["sticky"] ?? null)) ? ("sticky-enabled") : (""))];
        // line 40
        echo "    <table";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 40), 40, $this->source), "html", null, true);
        echo ">
        ";
        // line 41
        if (($context["caption_needed"] ?? null)) {
            // line 42
            echo "            <caption>
                ";
            // line 43
            if (($context["caption"] ?? null)) {
                // line 44
                echo "                    ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["caption"] ?? null), 44, $this->source), "html", null, true);
                echo "
                ";
            } else {
                // line 46
                echo "                    ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 46, $this->source), "html", null, true);
                echo "
                ";
            }
            // line 48
            echo "                ";
            if (( !twig_test_empty(($context["summary"] ?? null)) ||  !twig_test_empty(($context["description"] ?? null)))) {
                // line 49
                echo "                    <details>
                        ";
                // line 50
                if ( !twig_test_empty(($context["summary"] ?? null))) {
                    // line 51
                    echo "                            <summary>";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["summary"] ?? null), 51, $this->source), "html", null, true);
                    echo "</summary>
                        ";
                }
                // line 53
                echo "                        ";
                if ( !twig_test_empty(($context["description"] ?? null))) {
                    // line 54
                    echo "                            ";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["description"] ?? null), 54, $this->source), "html", null, true);
                    echo "
                        ";
                }
                // line 56
                echo "                    </details>
                ";
            }
            // line 58
            echo "            </caption>
        ";
        }
        // line 60
        echo "        ";
        if (($context["header"] ?? null)) {
            // line 61
            echo "            <thead>
            <tr>
                ";
            // line 63
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["header"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                // line 64
                echo "                    ";
                if (twig_get_attribute($this->env, $this->source, $context["column"], "default_classes", [], "any", false, false, true, 64)) {
                    // line 65
                    echo "                        ";
                    // line 66
                    $context["column_classes"] = [0 => "views-field", 1 => ("views-field-" . $this->sandbox->ensureToStringAllowed((($__internal_compile_0 =                     // line 68
($context["fields"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["key"]] ?? null) : null), 68, $this->source))];
                    // line 71
                    echo "                    ";
                }
                // line 72
                echo "                <th";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 72), "addClass", [0 => ($context["column_classes"] ?? null)], "method", false, false, true, 72), "setAttribute", [0 => "scope", 1 => "col"], "method", false, false, true, 72), 72, $this->source), "html", null, true);
                echo ">";
                // line 73
                if (twig_get_attribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 73)) {
                    // line 74
                    echo "<";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 74), 74, $this->source), "html", null, true);
                    echo ">";
                    // line 75
                    if (twig_get_attribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 75)) {
                        // line 76
                        echo "<a href=\"";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 76), 76, $this->source), "html", null, true);
                        echo "\" title=\"";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "title", [], "any", false, false, true, 76), 76, $this->source), "html", null, true);
                        echo "\">";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 76), 76, $this->source), "html", null, true);
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 76), 76, $this->source), "html", null, true);
                        echo "</a>";
                    } else {
                        // line 78
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 78), 78, $this->source), "html", null, true);
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 78), 78, $this->source), "html", null, true);
                    }
                    // line 80
                    echo "</";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 80), 80, $this->source), "html", null, true);
                    echo ">";
                } else {
                    // line 82
                    if (twig_get_attribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 82)) {
                        // line 83
                        echo "<a href=\"";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 83), 83, $this->source), "html", null, true);
                        echo "\" title=\"";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "title", [], "any", false, false, true, 83), 83, $this->source), "html", null, true);
                        echo "\">";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 83), 83, $this->source), "html", null, true);
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 83), 83, $this->source), "html", null, true);
                        echo "</a>";
                    } else {
                        // line 85
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 85), 85, $this->source), "html", null, true);
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 85), 85, $this->source), "html", null, true);
                    }
                }
                // line 88
                echo "</th>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 90
            echo "            </tr>
            </thead>
        ";
        }
        // line 93
        echo "        <tbody>
        ";
        // line 94
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 95
            echo "            <tr";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 95), 95, $this->source), "html", null, true);
            echo ">
                ";
            // line 96
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["row"], "columns", [], "any", false, false, true, 96));
            foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                // line 97
                echo "                    ";
                if (twig_get_attribute($this->env, $this->source, $context["column"], "default_classes", [], "any", false, false, true, 97)) {
                    // line 98
                    echo "                        ";
                    // line 99
                    $context["column_classes"] = [0 => "views-field"];
                    // line 103
                    echo "                        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["column"], "fields", [], "any", false, false, true, 103));
                    foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                        // line 104
                        echo "                            ";
                        $context["column_classes"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["column_classes"] ?? null), 104, $this->source), [0 => ("views-field-" . $this->sandbox->ensureToStringAllowed($context["field"], 104, $this->source))]);
                        // line 105
                        echo "                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 106
                    echo "                    ";
                }
                // line 107
                echo "                <td";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 107), "addClass", [0 => ($context["column_classes"] ?? null)], "method", false, false, true, 107), 107, $this->source), "html", null, true);
                echo ">";
                // line 108
                if (twig_get_attribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 108)) {
                    // line 109
                    echo "<";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 109), 109, $this->source), "html", null, true);
                    echo ">
                        ";
                    // line 110
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 110));
                    foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
                        // line 111
                        echo "                            ";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["content"], "separator", [], "any", false, false, true, 111), 111, $this->source), "html", null, true);
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["content"], "field_output", [], "any", false, false, true, 111), 111, $this->source), "html", null, true);
                        echo "
                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 113
                    echo "                        </";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 113), 113, $this->source), "html", null, true);
                    echo ">";
                } else {
                    // line 115
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 115));
                    foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
                        // line 116
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["content"], "separator", [], "any", false, false, true, 116), 116, $this->source), "html", null, true);
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["content"], "field_output", [], "any", false, false, true, 116), 116, $this->source), "html", null, true);
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                }
                // line 119
                echo "                    </td>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 121
            echo "            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 123
        echo "        </tbody>
    </table>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/views/views-view-table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  277 => 123,  270 => 121,  263 => 119,  255 => 116,  251 => 115,  246 => 113,  236 => 111,  232 => 110,  227 => 109,  225 => 108,  221 => 107,  218 => 106,  212 => 105,  209 => 104,  204 => 103,  202 => 99,  200 => 98,  197 => 97,  193 => 96,  188 => 95,  184 => 94,  181 => 93,  176 => 90,  169 => 88,  164 => 85,  154 => 83,  152 => 82,  147 => 80,  143 => 78,  133 => 76,  131 => 75,  127 => 74,  125 => 73,  121 => 72,  118 => 71,  116 => 68,  115 => 66,  113 => 65,  110 => 64,  106 => 63,  102 => 61,  99 => 60,  95 => 58,  91 => 56,  85 => 54,  82 => 53,  76 => 51,  74 => 50,  71 => 49,  68 => 48,  62 => 46,  56 => 44,  54 => 43,  51 => 42,  49 => 41,  44 => 40,  42 => 37,  41 => 36,  40 => 35,  39 => 34,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for displaying a view as a table.
 *
 * Available variables:
 * - attributes: Remaining HTML attributes for the element.
 *   - class: HTML classes that can be used to style contextually through CSS.
 * - title : The title of this group of rows.
 * - header: The table header columns.
 *   - attributes: Remaining HTML attributes for the element.
 *   - content: HTML classes to apply to each header cell, indexed by
 *   the header's key.
 *   - default_classes: A flag indicating whether default classes should be
 *     used.
 * - caption_needed: Is the caption tag needed.
 * - caption: The caption for this table.
 * - accessibility_description: Extended description for the table details.
 * - accessibility_summary: Summary for the table details.
 * - rows: Table row items. Rows are keyed by row number.
 *   - attributes: HTML classes to apply to each row.
 *   - columns: Row column items. Columns are keyed by column number.
 *     - attributes: HTML classes to apply to each column.
 *     - content: The column content.
 *   - default_classes: A flag indicating whether default classes should be
 *     used.
 * - responsive: A flag indicating whether table is responsive.
 * - sticky: A flag indicating whether table header is sticky.
 *
 * @see template_preprocess_views_view_table()
 */
#}
{%
set classes = [
'cols-' ~ header|length,
responsive ? 'responsive-enabled',
sticky ? 'sticky-enabled',
]
%}
    <table{{ attributes.addClass(classes) }}>
        {% if caption_needed %}
            <caption>
                {% if caption %}
                    {{ caption }}
                {% else %}
                    {{ title }}
                {% endif %}
                {% if (summary is not empty) or (description is not empty) %}
                    <details>
                        {% if summary is not empty %}
                            <summary>{{ summary }}</summary>
                        {% endif %}
                        {% if description is not empty %}
                            {{ description }}
                        {% endif %}
                    </details>
                {% endif %}
            </caption>
        {% endif %}
        {% if header %}
            <thead>
            <tr>
                {% for key, column in header %}
                    {% if column.default_classes %}
                        {%
                        set column_classes = [
                        'views-field',
                        'views-field-' ~ fields[key],
                        ]
                        %}
                    {% endif %}
                <th{{ column.attributes.addClass(column_classes).setAttribute('scope', 'col') }}>
                    {%- if column.wrapper_element -%}
                        <{{ column.wrapper_element }}>
                        {%- if column.url -%}
                            <a href=\"{{ column.url }}\" title=\"{{ column.title }}\">{{ column.content }}{{ column.sort_indicator }}</a>
                        {%- else -%}
                            {{ column.content }}{{ column.sort_indicator }}
                        {%- endif -%}
                        </{{ column.wrapper_element }}>
                    {%- else -%}
                        {%- if column.url -%}
                            <a href=\"{{ column.url }}\" title=\"{{ column.title }}\">{{ column.content }}{{ column.sort_indicator }}</a>
                        {%- else -%}
                            {{- column.content }}{{ column.sort_indicator }}
                        {%- endif -%}
                    {%- endif -%}
                    </th>
                {% endfor %}
            </tr>
            </thead>
        {% endif %}
        <tbody>
        {% for row in rows %}
            <tr{{ row.attributes }}>
                {% for key, column in row.columns %}
                    {% if column.default_classes %}
                        {%
                        set column_classes = [
                        'views-field'
                        ]
                        %}
                        {% for field in column.fields %}
                            {% set column_classes = column_classes|merge(['views-field-' ~ field]) %}
                        {% endfor %}
                    {% endif %}
                <td{{ column.attributes.addClass(column_classes) }}>
                    {%- if column.wrapper_element -%}
                        <{{ column.wrapper_element }}>
                        {% for content in column.content %}
                            {{ content.separator }}{{ content.field_output }}
                        {% endfor %}
                        </{{ column.wrapper_element }}>
                    {%- else -%}
                        {% for content in column.content %}
                            {{- content.separator }}{{ content.field_output -}}
                        {% endfor %}
                    {%- endif %}
                    </td>
                {% endfor %}
            </tr>
        {% endfor %}
        </tbody>
    </table>
", "themes/custom/longinus/templates/views/views-view-table.html.twig", "/var/www/html/web/themes/custom/longinus/templates/views/views-view-table.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 34, "if" => 41, "for" => 63);
        static $filters = array("length" => 35, "escape" => 40, "merge" => 104);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for'],
                ['length', 'escape', 'merge'],
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
