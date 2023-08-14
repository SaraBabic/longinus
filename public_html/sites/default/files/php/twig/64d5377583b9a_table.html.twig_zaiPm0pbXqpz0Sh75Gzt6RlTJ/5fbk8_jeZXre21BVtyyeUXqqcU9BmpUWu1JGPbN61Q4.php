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

/* themes/contrib/gin/templates/dataset/table.html.twig */
class __TwigTemplate_91292c39e0eb0ea9cd6c558af32f0f34c3f96020d0fd67e2672f9c1bcb08d3b3 extends \Twig\Template
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
        // line 42
        echo "<div class=\"layer-wrapper gin-layer-wrapper\">
  <div class=\"gin-table-scroll-wrapper\">
    <table";
        // line 44
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 44, $this->source), "html", null, true);
        echo ">
      ";
        // line 45
        if (($context["caption"] ?? null)) {
            // line 46
            echo "        <caption>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["caption"] ?? null), 46, $this->source), "html", null, true);
            echo "</caption>
      ";
        }
        // line 48
        echo "
      ";
        // line 49
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["colgroups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["colgroup"]) {
            // line 50
            echo "        ";
            if (twig_get_attribute($this->env, $this->source, $context["colgroup"], "cols", [], "any", false, false, true, 50)) {
                // line 51
                echo "          <colgroup";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["colgroup"], "attributes", [], "any", false, false, true, 51), 51, $this->source), "html", null, true);
                echo ">
            ";
                // line 52
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["colgroup"], "cols", [], "any", false, false, true, 52));
                foreach ($context['_seq'] as $context["_key"] => $context["col"]) {
                    // line 53
                    echo "              <col";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["col"], "attributes", [], "any", false, false, true, 53), 53, $this->source), "html", null, true);
                    echo " />
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['col'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 55
                echo "          </colgroup>
        ";
            } else {
                // line 57
                echo "          <colgroup";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["colgroup"], "attributes", [], "any", false, false, true, 57), 57, $this->source), "html", null, true);
                echo " />
        ";
            }
            // line 59
            echo "      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['colgroup'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "
      ";
        // line 61
        if (($context["header"] ?? null)) {
            // line 62
            echo "        <thead>
          <tr>
            ";
            // line 64
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["header"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["cell"]) {
                // line 65
                echo "              ";
                if (twig_in_filter("<a", $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, $context["cell"], "content", [], "any", false, false, true, 65))))) {
                    // line 66
                    echo "                ";
                    // line 67
                    $context["cell_classes"] = [0 => "th__item", 1 => ((twig_get_attribute($this->env, $this->source,                     // line 69
$context["cell"], "active_table_sort", [], "any", false, false, true, 69)) ? ("is-active") : (""))];
                    // line 72
                    echo "              ";
                } else {
                    // line 73
                    echo "                ";
                    // line 74
                    $context["cell_classes"] = [0 => ("th__" . \Drupal\Component\Utility\Html::getClass($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,                     // line 75
$context["cell"], "content", [], "any", false, false, true, 75), 75, $this->source)))), 1 => ((twig_get_attribute($this->env, $this->source,                     // line 76
$context["cell"], "active_table_sort", [], "any", false, false, true, 76)) ? ("is-active") : (""))];
                    // line 79
                    echo "              ";
                }
                // line 80
                echo "              <";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cell"], "tag", [], "any", false, false, true, 80), 80, $this->source), "html", null, true);
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cell"], "attributes", [], "any", false, false, true, 80), "addClass", [0 => ($context["cell_classes"] ?? null)], "method", false, false, true, 80), 80, $this->source), "html", null, true);
                echo ">";
                // line 81
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cell"], "content", [], "any", false, false, true, 81), 81, $this->source), "html", null, true);
                // line 82
                echo "</";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cell"], "tag", [], "any", false, false, true, 82), 82, $this->source), "html", null, true);
                echo ">
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cell'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            echo "          </tr>
        </thead>
      ";
        }
        // line 87
        echo "
      ";
        // line 88
        if (($context["rows"] ?? null)) {
            // line 89
            echo "        <tbody>
          ";
            // line 90
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 91
                echo "            ";
                // line 92
                $context["row_classes"] = [0 => (( !                // line 93
($context["no_striping"] ?? null)) ? (twig_cycle([0 => "odd", 1 => "even"], $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, true, 93), 93, $this->source))) : (""))];
                // line 96
                echo "            <tr";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 96), "addClass", [0 => ($context["row_classes"] ?? null)], "method", false, false, true, 96), 96, $this->source), "html", null, true);
                echo ">
              ";
                // line 97
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["row"], "cells", [], "any", false, false, true, 97));
                foreach ($context['_seq'] as $context["_key"] => $context["cell"]) {
                    // line 98
                    echo "                <";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cell"], "tag", [], "any", false, false, true, 98), 98, $this->source), "html", null, true);
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cell"], "attributes", [], "any", false, false, true, 98), 98, $this->source), "html", null, true);
                    echo ">";
                    // line 99
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cell"], "content", [], "any", false, false, true, 99), 99, $this->source), "html", null, true);
                    // line 100
                    echo "</";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cell"], "tag", [], "any", false, false, true, 100), 100, $this->source), "html", null, true);
                    echo ">
              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cell'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 102
                echo "            </tr>
          ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 104
            echo "        </tbody>
      ";
        } elseif (        // line 105
($context["empty"] ?? null)) {
            // line 106
            echo "        <tbody>
          <tr class=\"odd\">
            <td colspan=\"";
            // line 108
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_columns"] ?? null), 108, $this->source), "html", null, true);
            echo "\" class=\"empty message\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["empty"] ?? null), 108, $this->source), "html", null, true);
            echo "</td>
          </tr>
        </tbody>
      ";
        }
        // line 112
        echo "      ";
        if (($context["footer"] ?? null)) {
            // line 113
            echo "        <tfoot>
          ";
            // line 114
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["footer"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 115
                echo "            <tr";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 115), 115, $this->source), "html", null, true);
                echo ">
              ";
                // line 116
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["row"], "cells", [], "any", false, false, true, 116));
                foreach ($context['_seq'] as $context["_key"] => $context["cell"]) {
                    // line 117
                    echo "                <";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cell"], "tag", [], "any", false, false, true, 117), 117, $this->source), "html", null, true);
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cell"], "attributes", [], "any", false, false, true, 117), 117, $this->source), "html", null, true);
                    echo ">";
                    // line 118
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cell"], "content", [], "any", false, false, true, 118), 118, $this->source), "html", null, true);
                    // line 119
                    echo "</";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cell"], "tag", [], "any", false, false, true, 119), 119, $this->source), "html", null, true);
                    echo ">
              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cell'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 121
                echo "            </tr>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 123
            echo "        </tfoot>
      ";
        }
        // line 125
        echo "    </table>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/contrib/gin/templates/dataset/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  287 => 125,  283 => 123,  276 => 121,  267 => 119,  265 => 118,  260 => 117,  256 => 116,  251 => 115,  247 => 114,  244 => 113,  241 => 112,  232 => 108,  228 => 106,  226 => 105,  223 => 104,  208 => 102,  199 => 100,  197 => 99,  192 => 98,  188 => 97,  183 => 96,  181 => 93,  180 => 92,  178 => 91,  161 => 90,  158 => 89,  156 => 88,  153 => 87,  148 => 84,  139 => 82,  137 => 81,  132 => 80,  129 => 79,  127 => 76,  126 => 75,  125 => 74,  123 => 73,  120 => 72,  118 => 69,  117 => 67,  115 => 66,  112 => 65,  108 => 64,  104 => 62,  102 => 61,  99 => 60,  93 => 59,  87 => 57,  83 => 55,  74 => 53,  70 => 52,  65 => 51,  62 => 50,  58 => 49,  55 => 48,  49 => 46,  47 => 45,  43 => 44,  39 => 42,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override to display a table.
 *
 * Available variables:
 * - attributes: HTML attributes to apply to the <table> tag.
 * - caption: A localized string for the <caption> tag.
 * - colgroups: Column groups. Each group contains the following properties:
 *   - attributes: HTML attributes to apply to the <col> tag.
 *     Note: Drupal currently supports only one table header row, see
 *     https://www.drupal.org/node/893530 and
 *     http://api.drupal.org/api/drupal/includes!theme.inc/function/theme_table/7#comment-5109.
 * - header: Table header cells. Each cell contains the following properties:
 *   - tag: The HTML tag name to use; either 'th' or 'td'.
 *   - attributes: HTML attributes to apply to the tag.
 *   - content: A localized string for the title of the column.
 *   - field: Field name (required for column sorting).
 *   - sort: Default sort order for this column (\"asc\" or \"desc\").
 * - sticky: A flag indicating whether to use a \"sticky\" table header.
 * - rows: Table rows. Each row contains the following properties:
 *   - attributes: HTML attributes to apply to the <tr> tag.
 *   - data: Table cells.
 *   - no_striping: A flag indicating that the row should receive no
 *     'even / odd' styling. Defaults to FALSE.
 *   - cells: Table cells of the row. Each cell contains the following keys:
 *     - tag: The HTML tag name to use; either 'th' or 'td'.
 *     - attributes: Any HTML attributes, such as \"colspan\", to apply to the
 *       table cell.
 *     - content: The string to display in the table cell.
 *     - active_table_sort: A boolean indicating whether the cell is the active
         table sort.
 * - footer: Table footer rows, in the same format as the rows variable.
 * - empty: The message to display in an extra row if table does not have
 *   any rows.
 * - no_striping: A boolean indicating that the row should receive no striping.
 * - header_columns: The number of columns in the header.
 *
 * @see template_preprocess_table()
 */
#}
<div class=\"layer-wrapper gin-layer-wrapper\">
  <div class=\"gin-table-scroll-wrapper\">
    <table{{ attributes }}>
      {% if caption %}
        <caption>{{ caption }}</caption>
      {% endif %}

      {% for colgroup in colgroups %}
        {% if colgroup.cols %}
          <colgroup{{ colgroup.attributes }}>
            {% for col in colgroup.cols %}
              <col{{ col.attributes }} />
            {% endfor %}
          </colgroup>
        {% else %}
          <colgroup{{ colgroup.attributes }} />
        {% endif %}
      {% endfor %}

      {% if header %}
        <thead>
          <tr>
            {% for cell in header %}
              {% if '<a' in cell.content|render|render %}
                {%
                  set cell_classes = [
                    'th__item',
                    cell.active_table_sort ? 'is-active',
                  ]
                %}
              {% else %}
                {%
                  set cell_classes = [
                    'th__' ~ cell.content|render|clean_class,
                    cell.active_table_sort ? 'is-active',
                  ]
                %}
              {% endif %}
              <{{ cell.tag }}{{ cell.attributes.addClass(cell_classes) }}>
                {{- cell.content -}}
              </{{ cell.tag }}>
            {% endfor %}
          </tr>
        </thead>
      {% endif %}

      {% if rows %}
        <tbody>
          {% for row in rows %}
            {%
              set row_classes = [
                not no_striping ? cycle(['odd', 'even'], loop.index0),
              ]
            %}
            <tr{{ row.attributes.addClass(row_classes) }}>
              {% for cell in row.cells %}
                <{{ cell.tag }}{{ cell.attributes }}>
                  {{- cell.content -}}
                </{{ cell.tag }}>
              {% endfor %}
            </tr>
          {% endfor %}
        </tbody>
      {% elseif empty %}
        <tbody>
          <tr class=\"odd\">
            <td colspan=\"{{ header_columns }}\" class=\"empty message\">{{ empty }}</td>
          </tr>
        </tbody>
      {% endif %}
      {% if footer %}
        <tfoot>
          {% for row in footer %}
            <tr{{ row.attributes }}>
              {% for cell in row.cells %}
                <{{ cell.tag }}{{ cell.attributes }}>
                  {{- cell.content -}}
                </{{ cell.tag }}>
              {% endfor %}
            </tr>
          {% endfor %}
        </tfoot>
      {% endif %}
    </table>
  </div>
</div>
", "themes/contrib/gin/templates/dataset/table.html.twig", "/var/www/html/web/themes/contrib/gin/templates/dataset/table.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 45, "for" => 49, "set" => 67);
        static $filters = array("escape" => 44, "render" => 65, "clean_class" => 75);
        static $functions = array("cycle" => 93);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for', 'set'],
                ['escape', 'render', 'clean_class'],
                ['cycle']
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
