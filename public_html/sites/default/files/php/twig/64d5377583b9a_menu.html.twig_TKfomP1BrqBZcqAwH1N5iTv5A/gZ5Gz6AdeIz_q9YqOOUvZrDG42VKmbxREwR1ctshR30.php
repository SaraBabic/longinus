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

/* themes/custom/longinus/templates/navigation/menu.html.twig */
class __TwigTemplate_7f24ae60eba9dde9948a0601c0bac3be708e88c8d69b184899c4c820b1d850d3 extends \Twig\Template
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
        $macros["menus"] = $this->macros["menus"] = $this;
        // line 2
        echo "
";
        // line 7
        echo "
";
        // line 8
        if (twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "longinus_base", [], "any", false, false, true, 8)) {
            // line 9
            echo "  ";
            $context["longinus_base"] = twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "longinus_base", [], "any", false, false, true, 9);
            // line 10
            echo "  ";
            twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "removeAttribute", [0 => "longinus_base"], "method", false, false, true, 10);
        }
        // line 12
        echo "
";
        // line 13
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_call_macro($macros["menus"], "macro_menu_links", [($context["items"] ?? null), ($context["attributes"] ?? null), 0, ($context["longinus_base"] ?? null)], 13, $context, $this->getSourceContext()));
        echo "

";
    }

    // line 15
    public function macro_menu_links($__items__ = null, $__attributes__ = null, $__menu_level__ = null, $__longinus_base__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "items" => $__items__,
            "attributes" => $__attributes__,
            "menu_level" => $__menu_level__,
            "longinus_base" => $__longinus_base__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 16
            echo "  ";
            $macros["menus"] = $this;
            // line 17
            echo "  ";
            if (($context["items"] ?? null)) {
                // line 18
                echo "    ";
                if ((($context["menu_level"] ?? null) == 0)) {
                    // line 19
                    echo "      <ul";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => [0 => ((($context["longinus_base"] ?? null)) ? (($this->sandbox->ensureToStringAllowed(($context["longinus_base"] ?? null), 19, $this->source) . "menu menu")) : (""))]], "method", false, false, true, 19), 19, $this->source), "html", null, true);
                    echo ">
        ";
                    // line 20
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 21
                        echo "          ";
                        // line 22
                        $context["classes"] = [0 => ($this->sandbox->ensureToStringAllowed(                        // line 23
($context["longinus_base"] ?? null), 23, $this->source) . "menu-item menu-item"), 1 => ((twig_get_attribute($this->env, $this->source,                         // line 24
$context["item"], "is_expanded", [], "any", false, false, true, 24)) ? (($this->sandbox->ensureToStringAllowed(($context["longinus_base"] ?? null), 24, $this->source) . "menu-item--expanded")) : ("")), 2 => ((twig_get_attribute($this->env, $this->source,                         // line 25
$context["item"], "is_collapsed", [], "any", false, false, true, 25)) ? (($this->sandbox->ensureToStringAllowed(($context["longinus_base"] ?? null), 25, $this->source) . "menu-item--collapsed")) : ("")), 3 => ((twig_get_attribute($this->env, $this->source,                         // line 26
$context["item"], "in_active_trail", [], "any", false, false, true, 26)) ? (($this->sandbox->ensureToStringAllowed(($context["longinus_base"] ?? null), 26, $this->source) . "menu-item--active-trail")) : (""))];
                        // line 29
                        echo "          <li";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 29), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 29), 29, $this->source), "html", null, true);
                        echo ">
            ";
                        // line 30
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 30), 30, $this->source), $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 30), 30, $this->source), ["class" => [0 => ((($context["longinus_base"] ?? null)) ? (($this->sandbox->ensureToStringAllowed(($context["longinus_base"] ?? null), 30, $this->source) . "menu-item-link")) : (""))]]), "html", null, true);
                        echo "
          ";
                        // line 31
                        if (twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 31)) {
                            // line 32
                            echo "            ";
                            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_call_macro($macros["menus"], "macro_menu_links", [twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 32), ($context["attributes"] ?? null), (($context["menu_level"] ?? null) + 1), ($context["longinus_base"] ?? null)], 32, $context, $this->getSourceContext()));
                            echo "
          ";
                        }
                        // line 34
                        echo "          </li>
        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 36
                    echo "      </ul>
    ";
                } else {
                    // line 38
                    echo "      <ul class=\"";
                    if (($context["longinus_base"] ?? null)) {
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_base"] ?? null), 38, $this->source), "html", null, true);
                        echo "submenu menu";
                    }
                    echo "\">
        ";
                    // line 39
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 40
                        echo "          ";
                        // line 41
                        $context["classes"] = [0 => ($this->sandbox->ensureToStringAllowed(                        // line 42
($context["longinus_base"] ?? null), 42, $this->source) . "submenu-item menu-item"), 1 => ((twig_get_attribute($this->env, $this->source,                         // line 43
$context["item"], "is_expanded", [], "any", false, false, true, 43)) ? (($this->sandbox->ensureToStringAllowed(($context["longinus_base"] ?? null), 43, $this->source) . "submenu-item--expanded")) : ("")), 2 => ((twig_get_attribute($this->env, $this->source,                         // line 44
$context["item"], "is_collapsed", [], "any", false, false, true, 44)) ? (($this->sandbox->ensureToStringAllowed(($context["longinus_base"] ?? null), 44, $this->source) . "submenu-item--collapsed")) : ("")), 3 => ((twig_get_attribute($this->env, $this->source,                         // line 45
$context["item"], "in_active_trail", [], "any", false, false, true, 45)) ? (($this->sandbox->ensureToStringAllowed(($context["longinus_base"] ?? null), 45, $this->source) . "submenu-item--active-trail")) : (""))];
                        // line 48
                        echo "          <li";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 48), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 48), 48, $this->source), "html", null, true);
                        echo ">
            ";
                        // line 49
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 49), 49, $this->source), $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 49), 49, $this->source), ["class" => [0 => ((($context["longinus_base"] ?? null)) ? (($this->sandbox->ensureToStringAllowed(($context["longinus_base"] ?? null), 49, $this->source) . "submenu-item-link")) : (""))]]), "html", null, true);
                        echo "
            ";
                        // line 50
                        if (twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 50)) {
                            // line 51
                            echo "              ";
                            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_call_macro($macros["menus"], "macro_menu_links", [twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 51), ($context["attributes"] ?? null), (($context["menu_level"] ?? null) + 1), ($context["longinus_base"] ?? null)], 51, $context, $this->getSourceContext()));
                            echo "
            ";
                        }
                        // line 53
                        echo "          </li>
        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 55
                    echo "      </ul>
    ";
                }
                // line 57
                echo "  ";
            }

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/navigation/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  184 => 57,  180 => 55,  173 => 53,  167 => 51,  165 => 50,  161 => 49,  156 => 48,  154 => 45,  153 => 44,  152 => 43,  151 => 42,  150 => 41,  148 => 40,  144 => 39,  136 => 38,  132 => 36,  125 => 34,  119 => 32,  117 => 31,  113 => 30,  108 => 29,  106 => 26,  105 => 25,  104 => 24,  103 => 23,  102 => 22,  100 => 21,  96 => 20,  91 => 19,  88 => 18,  85 => 17,  82 => 16,  66 => 15,  59 => 13,  56 => 12,  52 => 10,  49 => 9,  47 => 8,  44 => 7,  41 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import _self as menus %}

{#
  We call a macro which calls itself to render the full tree.
  @see http://twig.sensiolabs.org/doc/tags/macro.html
#}

{% if attributes.longinus_base %}
  {% set longinus_base = attributes.longinus_base %}
  {% do attributes.removeAttribute('longinus_base') %}
{% endif %}

{{ menus.menu_links(items, attributes, 0, longinus_base) }}

{% macro menu_links(items, attributes, menu_level, longinus_base) %}
  {% import _self as menus %}
  {% if items %}
    {% if menu_level == 0 %}
      <ul{{ attributes.addClass([longinus_base ? longinus_base ~ 'menu menu']) }}>
        {% for item in items %}
          {%
            set classes = [
              longinus_base ~ 'menu-item menu-item',
              item.is_expanded ? longinus_base ~ 'menu-item--expanded',
              item.is_collapsed ? longinus_base ~ 'menu-item--collapsed',
              item.in_active_trail ? longinus_base ~ 'menu-item--active-trail',
            ]
          %}
          <li{{ item.attributes.addClass(classes) }}>
            {{ link(item.title, item.url, { 'class': [longinus_base ? longinus_base ~ 'menu-item-link'] }) }}
          {% if item.below %}
            {{ menus.menu_links(item.below, attributes, menu_level + 1, longinus_base) }}
          {% endif %}
          </li>
        {% endfor %}
      </ul>
    {% else %}
      <ul class=\"{% if longinus_base %}{{ longinus_base }}submenu menu{% endif %}\">
        {% for item in items %}
          {%
            set classes = [
              longinus_base ~ 'submenu-item menu-item',
              item.is_expanded ? longinus_base ~ 'submenu-item--expanded',
              item.is_collapsed ? longinus_base ~ 'submenu-item--collapsed',
              item.in_active_trail ? longinus_base ~ 'submenu-item--active-trail',
            ]
          %}
          <li{{ item.attributes.addClass(classes) }}>
            {{ link(item.title, item.url, { 'class': [longinus_base ? longinus_base ~ 'submenu-item-link'] }) }}
            {% if item.below %}
              {{ menus.menu_links(item.below, attributes, menu_level + 1, longinus_base) }}
            {% endif %}
          </li>
        {% endfor %}
      </ul>
    {% endif %}
  {% endif %}
{% endmacro %}
", "themes/custom/longinus/templates/navigation/menu.html.twig", "/var/www/html/web/themes/custom/longinus/templates/navigation/menu.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("import" => 1, "if" => 8, "set" => 9, "do" => 10, "macro" => 15, "for" => 20);
        static $filters = array("escape" => 19);
        static $functions = array("link" => 30);

        try {
            $this->sandbox->checkSecurity(
                ['import', 'if', 'set', 'do', 'macro', 'for'],
                ['escape'],
                ['link']
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
