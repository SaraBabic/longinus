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

/* themes/custom/longinus/templates/views/views-view.html.twig */
class __TwigTemplate_72bc245e950881f51241376a44686757a2507816707d1f50b1ba38958af7485e extends \Twig\Template
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
        $context["longinus_block"] = ((("view-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 2, $this->source))) . "-") . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["display_id"] ?? null), 2, $this->source)));
        // line 5
        $context["classes"] = [0 =>         // line 6
($context["longinus_block"] ?? null), 1 => ((        // line 7
($context["dom_id"] ?? null)) ? (("js-view-dom-id-" . $this->sandbox->ensureToStringAllowed(($context["dom_id"] ?? null), 7, $this->source))) : (""))];
        // line 10
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 10), 10, $this->source), "html", null, true);
        echo ">
  ";
        // line 11
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 11, $this->source), "html", null, true);
        echo "
  ";
        // line 12
        if (($context["title"] ?? null)) {
            // line 13
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 13, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 15
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 15, $this->source), "html", null, true);
        echo "
  ";
        // line 16
        if (($context["header"] ?? null)) {
            // line 17
            echo "    <div class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 17, $this->source), "html", null, true);
            echo "__header\">
      ";
            // line 18
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header"] ?? null), 18, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 21
        echo "  ";
        if (($context["exposed"] ?? null)) {
            // line 22
            echo "    <div class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 22, $this->source), "html", null, true);
            echo "__filters\">
      ";
            // line 23
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["exposed"] ?? null), 23, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 26
        echo "  ";
        if (($context["attachment_before"] ?? null)) {
            // line 27
            echo "    <div class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 27, $this->source), "html", null, true);
            echo "__attachment ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 27, $this->source), "html", null, true);
            echo "__attachment--before\">
      ";
            // line 28
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attachment_before"] ?? null), 28, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 31
        echo "
  ";
        // line 32
        if (($context["rows"] ?? null)) {
            // line 33
            echo "    <div class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 33, $this->source), "html", null, true);
            echo "__content\">
      ";
            // line 34
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["rows"] ?? null), 34, $this->source), "html", null, true);
            echo "
    </div>
  ";
        } elseif (        // line 36
($context["empty"] ?? null)) {
            // line 37
            echo "    <div class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 37, $this->source), "html", null, true);
            echo "__content ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 37, $this->source), "html", null, true);
            echo "__content--empty\">
      ";
            // line 38
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["empty"] ?? null), 38, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 41
        echo "
  ";
        // line 42
        if (($context["pager"] ?? null)) {
            // line 43
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["pager"] ?? null), 43, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 45
        echo "  ";
        if (($context["attachment_after"] ?? null)) {
            // line 46
            echo "    <div class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 46, $this->source), "html", null, true);
            echo "__attachment ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 46, $this->source), "html", null, true);
            echo "__attachment--after\">
      ";
            // line 47
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attachment_after"] ?? null), 47, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 50
        echo "  ";
        if (($context["more"] ?? null)) {
            // line 51
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["more"] ?? null), 51, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 53
        echo "  ";
        if (($context["footer"] ?? null)) {
            // line 54
            echo "    <div class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 54, $this->source), "html", null, true);
            echo "__footer\">
      ";
            // line 55
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer"] ?? null), 55, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 58
        echo "  ";
        if (($context["feed_icons"] ?? null)) {
            // line 59
            echo "    <div class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 59, $this->source), "html", null, true);
            echo "__feed-icons\">
      ";
            // line 60
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["feed_icons"] ?? null), 60, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 63
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/views/views-view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 63,  198 => 60,  193 => 59,  190 => 58,  184 => 55,  179 => 54,  176 => 53,  170 => 51,  167 => 50,  161 => 47,  154 => 46,  151 => 45,  145 => 43,  143 => 42,  140 => 41,  134 => 38,  127 => 37,  125 => 36,  120 => 34,  115 => 33,  113 => 32,  110 => 31,  104 => 28,  97 => 27,  94 => 26,  88 => 23,  83 => 22,  80 => 21,  74 => 18,  69 => 17,  67 => 16,  62 => 15,  56 => 13,  54 => 12,  50 => 11,  45 => 10,  43 => 7,  42 => 6,  41 => 5,  39 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{%
  set longinus_block = 'view-' ~ id|clean_class ~ '-' ~ display_id|clean_class
%}
{%
  set classes = [
    longinus_block,
    dom_id ? 'js-view-dom-id-' ~ dom_id,
  ]
%}
<div{{ attributes.addClass(classes) }}>
  {{ title_prefix }}
  {% if title %}
    {{ title }}
  {% endif %}
  {{ title_suffix }}
  {% if header %}
    <div class=\"{{ longinus_block }}__header\">
      {{ header }}
    </div>
  {% endif %}
  {% if exposed %}
    <div class=\"{{ longinus_block }}__filters\">
      {{ exposed }}
    </div>
  {% endif %}
  {% if attachment_before %}
    <div class=\"{{ longinus_block }}__attachment {{ longinus_block }}__attachment--before\">
      {{ attachment_before }}
    </div>
  {% endif %}

  {% if rows %}
    <div class=\"{{ longinus_block }}__content\">
      {{ rows }}
    </div>
  {% elseif empty %}
    <div class=\"{{ longinus_block }}__content {{ longinus_block }}__content--empty\">
      {{ empty }}
    </div>
  {% endif %}

  {% if pager %}
    {{ pager }}
  {% endif %}
  {% if attachment_after %}
    <div class=\"{{ longinus_block }}__attachment {{ longinus_block }}__attachment--after\">
      {{ attachment_after }}
    </div>
  {% endif %}
  {% if more %}
    {{ more }}
  {% endif %}
  {% if footer %}
    <div class=\"{{ longinus_block }}__footer\">
      {{ footer }}
    </div>
  {% endif %}
  {% if feed_icons %}
    <div class=\"{{ longinus_block }}__feed-icons\">
      {{ feed_icons }}
    </div>
  {% endif %}
</div>
", "themes/custom/longinus/templates/views/views-view.html.twig", "/var/www/html/web/themes/custom/longinus/templates/views/views-view.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 2, "if" => 12);
        static $filters = array("clean_class" => 2, "escape" => 10);
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
