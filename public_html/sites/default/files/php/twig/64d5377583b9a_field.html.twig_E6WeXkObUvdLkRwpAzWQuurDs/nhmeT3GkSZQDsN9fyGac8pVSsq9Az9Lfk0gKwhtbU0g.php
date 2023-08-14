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

/* themes/custom/longinus/templates/field/field.html.twig */
class __TwigTemplate_b11da2bba9ef9ca6aa00a51e711bb365f2b20a828366f5bfa7f1830d98540868 extends \Twig\Template
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
            'label' => [$this, 'block_label'],
            'items' => [$this, 'block_items'],
            'item' => [$this, 'block_item'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        if ( !($context["longinus"] ?? null)) {
            // line 2
            echo "  ";
            if ((($context["view_mode"] ?? null) == "_custom")) {
                // line 3
                echo "    ";
                $context["longinus"] = ("field-" . \Drupal\Component\Utility\Html::getClass(twig_replace_filter($this->sandbox->ensureToStringAllowed(($context["field_name"] ?? null), 3, $this->source), ["__" => "-"])));
                // line 4
                echo "    ";
                $context["longinus_element_prefix"] = ($this->sandbox->ensureToStringAllowed(($context["longinus"] ?? null), 4, $this->source) . "__");
                // line 5
                echo "  ";
            } else {
                // line 6
                echo "    ";
                $context["longinus"] = ((\Drupal\Component\Utility\Html::getClass(((($this->sandbox->ensureToStringAllowed(($context["entity_type"] ?? null), 6, $this->source) . "-") . $this->sandbox->ensureToStringAllowed(($context["bundle"] ?? null), 6, $this->source)) . (((($context["view_mode"] ?? null) != "default")) ? (("-" . $this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null), 6, $this->source))) : ("")))) . "__") . \Drupal\Component\Utility\Html::getClass(twig_replace_filter($this->sandbox->ensureToStringAllowed(($context["field_name"] ?? null), 6, $this->source), [($this->sandbox->ensureToStringAllowed(($context["bundle"] ?? null), 6, $this->source) . "__") => ""])));
                // line 7
                echo "  ";
            }
        }
        // line 9
        $context["longinus_element_prefix"] = ((($context["longinus_element_prefix"] ?? null)) ? (($context["longinus_element_prefix"] ?? null)) : (($this->sandbox->ensureToStringAllowed(($context["longinus"] ?? null), 9, $this->source) . "-")));
        // line 11
        $context["classes"] = ((($context["classes"] ?? null)) ? (($context["classes"] ?? null)) : ([0 =>         // line 12
($context["longinus"] ?? null)]));
        // line 16
        $context["title_classes"] = [0 => ($this->sandbox->ensureToStringAllowed(        // line 17
($context["longinus_element_prefix"] ?? null), 17, $this->source) . "label"), 1 => ((        // line 18
($context["label_hidden"] ?? null)) ? ("visually-hidden") : (""))];
        // line 21
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 21), 21, $this->source), "html", null, true);
        echo ">
  ";
        // line 22
        $this->displayBlock('content', $context, $blocks);
        // line 44
        echo "</div>
";
    }

    // line 22
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 23
        echo "    ";
        $this->displayBlock('label', $context, $blocks);
        // line 28
        echo "    ";
        $this->displayBlock('items', $context, $blocks);
        // line 43
        echo "  ";
    }

    // line 23
    public function block_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 24
        echo "      ";
        if ( !($context["label_hidden"] ?? null)) {
            // line 25
            echo "        <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", [0 => ($context["title_classes"] ?? null)], "method", false, false, true, 25), 25, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 25, $this->source), "html", null, true);
            echo "</div>
      ";
        }
        // line 27
        echo "    ";
    }

    // line 28
    public function block_items($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "      ";
        ob_start();
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_attributes"] ?? null), 29, $this->source), "html", null, true);
        $context["content_attributes_not_empty"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 30
        echo "      ";
        if (((($context["multiple"] ?? null) &&  !($context["label_hidden"] ?? null)) || ($context["content_attributes_not_empty"] ?? null))) {
            // line 31
            echo "        <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => ($this->sandbox->ensureToStringAllowed(($context["longinus_element_prefix"] ?? null), 31, $this->source) . "items")], "method", false, false, true, 31), 31, $this->source), "html", null, true);
            echo ">
      ";
        }
        // line 33
        echo "      ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 34
            echo "        ";
            $this->displayBlock('item', $context, $blocks);
            // line 38
            echo "      ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "      ";
        if (((($context["multiple"] ?? null) &&  !($context["label_hidden"] ?? null)) || ($context["content_attributes_not_empty"] ?? null))) {
            // line 40
            echo "        </div>
      ";
        }
        // line 42
        echo "    ";
    }

    // line 34
    public function block_item($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 35
        echo "          ";
        ob_start();
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "attributes", [], "any", false, false, true, 35), 35, $this->source), "html", null, true);
        $context["item_attributes_not_empty"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 36
        echo "          <div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "attributes", [], "any", false, false, true, 36), "addClass", [0 => ($this->sandbox->ensureToStringAllowed(($context["longinus_element_prefix"] ?? null), 36, $this->source) . "item")], "method", false, false, true, 36), 36, $this->source), "html", null, true);
        echo ">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "content", [], "any", false, false, true, 36), 36, $this->source), "html", null, true);
        echo "</div>
        ";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/field/field.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 36,  186 => 35,  182 => 34,  178 => 42,  174 => 40,  171 => 39,  157 => 38,  154 => 34,  136 => 33,  130 => 31,  127 => 30,  122 => 29,  118 => 28,  114 => 27,  106 => 25,  103 => 24,  99 => 23,  95 => 43,  92 => 28,  89 => 23,  85 => 22,  80 => 44,  78 => 22,  73 => 21,  71 => 18,  70 => 17,  69 => 16,  67 => 12,  66 => 11,  64 => 9,  60 => 7,  57 => 6,  54 => 5,  51 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if not longinus %}
  {% if view_mode == '_custom' %}
    {% set longinus = 'field-' ~ field_name|replace({'__': '-'})|clean_class %}
    {% set longinus_element_prefix = longinus ~ '__' %}
  {% else %}
    {% set longinus = (entity_type ~ '-' ~ bundle ~ (view_mode != 'default' ? '-' ~ view_mode))|clean_class ~ '__' ~ field_name|replace({(bundle ~ '__'): ''})|clean_class %}
  {% endif %}
{% endif %}
{% set longinus_element_prefix = longinus_element_prefix ?: longinus ~ '-' %}
{%
  set classes = classes ?: [
    longinus
  ]
%}
{%
  set title_classes = [
    longinus_element_prefix ~ 'label',
    label_hidden ? 'visually-hidden',
  ]
%}
<div{{ attributes.addClass(classes) }}>
  {% block content %}
    {% block label %}
      {% if not label_hidden %}
        <div{{ title_attributes.addClass(title_classes) }}>{{ label }}</div>
      {% endif %}
    {% endblock %}
    {% block items %}
      {% set content_attributes_not_empty -%}{{ content_attributes }}{%- endset %}
      {% if (multiple and not label_hidden) or content_attributes_not_empty %}
        <div{{ content_attributes.addClass(longinus_element_prefix ~ 'items') }}>
      {% endif %}
      {% for item in items %}
        {% block item %}
          {% set item_attributes_not_empty -%}{{ item.attributes }}{%- endset %}
          <div{{ item.attributes.addClass(longinus_element_prefix ~ 'item') }}>{{- item.content -}}</div>
        {% endblock %}
      {% endfor %}
      {% if (multiple and not label_hidden) or content_attributes_not_empty %}
        </div>
      {% endif %}
    {% endblock %}
  {% endblock %}
</div>
", "themes/custom/longinus/templates/field/field.html.twig", "/var/www/html/web/themes/custom/longinus/templates/field/field.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 1, "set" => 3, "block" => 22, "for" => 33);
        static $filters = array("clean_class" => 3, "replace" => 3, "escape" => 21);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'block', 'for'],
                ['clean_class', 'replace', 'escape'],
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
