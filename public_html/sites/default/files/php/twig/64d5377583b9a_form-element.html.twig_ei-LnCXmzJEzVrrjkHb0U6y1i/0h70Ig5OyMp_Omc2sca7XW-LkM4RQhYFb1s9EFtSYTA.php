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

/* themes/custom/longinus/templates/form/form-element.html.twig */
class __TwigTemplate_618ff432b69c4c4e95102ce0b2d6c54ce9839d269417f4dc62b5be2e5bb50ad4 extends \Twig\Template
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
        // line 2
        $context["classes"] = [0 => ((        // line 3
($context["form_id"] ?? null)) ? (((("form-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["form_id"] ?? null), 3, $this->source))) . "__") . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["name"] ?? null), 3, $this->source)))) : ("")), 1 => "js-form-item", 2 => ("js-form-type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 5
($context["type"] ?? null), 5, $this->source))), 3 => ("js-form-item-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 6
($context["name"] ?? null), 6, $this->source))), 4 => "form-item", 5 => ("form-item-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 8
($context["name"] ?? null), 8, $this->source))), 6 => ("form-type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 9
($context["type"] ?? null), 9, $this->source))), 7 => ((!twig_in_filter(        // line 10
($context["title_display"] ?? null), [0 => "after", 1 => "before"])) ? ("form-item--no-label") : ("")), 8 => (((        // line 11
($context["disabled"] ?? null) == "disabled")) ? ("form-item--disabled") : ("")), 9 => ((        // line 12
($context["errors"] ?? null)) ? ("form-item--error") : (""))];
        // line 16
        $context["description_classes"] = [0 => "form-item__description", 1 => (((        // line 18
($context["description_display"] ?? null) == "invisible")) ? ("visually-hidden") : (""))];
        // line 21
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 21), 21, $this->source), "html", null, true);
        echo ">
  ";
        // line 22
        if (twig_in_filter(($context["label_display"] ?? null), [0 => "before", 1 => "invisible"])) {
            // line 23
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 23, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 25
        echo "  ";
        if ( !twig_test_empty(($context["prefix"] ?? null))) {
            // line 26
            echo "    <span class=\"field-prefix\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null), 26, $this->source), "html", null, true);
            echo "</span>
  ";
        }
        // line 28
        echo "  ";
        if (((($context["description_display"] ?? null) == "before") && twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 28))) {
            // line 29
            echo "    <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 29), 29, $this->source), "html", null, true);
            echo ">
      ";
            // line 30
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 30), 30, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 33
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 33, $this->source), "html", null, true);
        echo "
  ";
        // line 34
        if ( !twig_test_empty(($context["suffix"] ?? null))) {
            // line 35
            echo "    <span class=\"field-suffix\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suffix"] ?? null), 35, $this->source), "html", null, true);
            echo "</span>
  ";
        }
        // line 37
        echo "  ";
        if ((($context["label_display"] ?? null) == "after")) {
            // line 38
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 38, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 40
        echo "  ";
        if (($context["errors"] ?? null)) {
            // line 41
            echo "    <div class=\"form-item__error-message\">
      ";
            // line 42
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null), 42, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 45
        echo "  ";
        if ((twig_in_filter(($context["description_display"] ?? null), [0 => "after", 1 => "invisible"]) && twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 45))) {
            // line 46
            echo "    <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 46), "addClass", [0 => ($context["description_classes"] ?? null)], "method", false, false, true, 46), 46, $this->source), "html", null, true);
            echo ">
      ";
            // line 47
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 47), 47, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 50
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/form/form-element.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 50,  130 => 47,  125 => 46,  122 => 45,  116 => 42,  113 => 41,  110 => 40,  104 => 38,  101 => 37,  95 => 35,  93 => 34,  88 => 33,  82 => 30,  77 => 29,  74 => 28,  68 => 26,  65 => 25,  59 => 23,  57 => 22,  52 => 21,  50 => 18,  49 => 16,  47 => 12,  46 => 11,  45 => 10,  44 => 9,  43 => 8,  42 => 6,  41 => 5,  40 => 3,  39 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{%
  set classes = [
    form_id ? 'form-' ~ form_id|clean_class ~ '__' ~ name|clean_class,
    'js-form-item',
    'js-form-type-' ~ type|clean_class,
    'js-form-item-' ~ name|clean_class,
    'form-item',
    'form-item-' ~ name|clean_class,
    'form-type-' ~ type|clean_class,
    title_display not in ['after', 'before'] ? 'form-item--no-label',
    disabled == 'disabled' ? 'form-item--disabled',
    errors ? 'form-item--error',
  ]
%}
{%
  set description_classes = [
    'form-item__description',
    description_display == 'invisible' ? 'visually-hidden',
  ]
%}
<div{{ attributes.addClass(classes) }}>
  {% if label_display in ['before', 'invisible'] %}
    {{ label }}
  {% endif %}
  {% if prefix is not empty %}
    <span class=\"field-prefix\">{{ prefix }}</span>
  {% endif %}
  {% if description_display == 'before' and description.content %}
    <div{{ description.attributes }}>
      {{ description.content }}
    </div>
  {% endif %}
  {{ children }}
  {% if suffix is not empty %}
    <span class=\"field-suffix\">{{ suffix }}</span>
  {% endif %}
  {% if label_display == 'after' %}
    {{ label }}
  {% endif %}
  {% if errors %}
    <div class=\"form-item__error-message\">
      {{ errors }}
    </div>
  {% endif %}
  {% if description_display in ['after', 'invisible'] and description.content %}
    <div{{ description.attributes.addClass(description_classes) }}>
      {{ description.content }}
    </div>
  {% endif %}
</div>
", "themes/custom/longinus/templates/form/form-element.html.twig", "/var/www/html/web/themes/custom/longinus/templates/form/form-element.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 2, "if" => 22);
        static $filters = array("clean_class" => 3, "escape" => 21);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
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
