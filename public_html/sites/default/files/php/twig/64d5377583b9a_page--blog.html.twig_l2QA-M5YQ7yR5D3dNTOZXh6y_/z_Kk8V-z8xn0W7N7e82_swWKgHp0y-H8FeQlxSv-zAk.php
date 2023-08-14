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

/* themes/custom/longinus/templates/limited/page--blog.html.twig */
class __TwigTemplate_805779afc0a7b95b5ed8d6fcb6ccb4a2da69da42143380e1d3aa641ea6da5649 extends \Twig\Template
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
        echo "<div id=\"page\" class=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_classes"] ?? null), 1, $this->source), "html", null, true);
        echo "\">
  <header id=\"header\">
    <div class=\"container\">
      ";
        // line 4
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "branding", [], "any", false, false, true, 4)) {
            // line 5
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "branding", [], "any", false, false, true, 5), 5, $this->source), "html", null, true);
            echo "
      ";
        }
        // line 6
        echo " ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_navigation", [], "any", false, false, true, 6)) {
            // line 7
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_navigation", [], "any", false, false, true, 7), 7, $this->source), "html", null, true);
            echo "
      ";
        }
        // line 8
        echo " ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "information", [], "any", false, false, true, 8)) {
            // line 9
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "information", [], "any", false, false, true, 9), 9, $this->source), "html", null, true);
            echo "
      ";
        }
        // line 11
        echo "    </div>
  </header>

  ";
        // line 14
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 14)) {
            // line 15
            echo "  <section id=\"highlighted\">
    <div class=\"container\">
      ";
            // line 17
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
            echo "
    </div>
  </section>
  ";
        }
        // line 21
        echo "
  ";
        // line 22
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "slider", [], "any", false, false, true, 22)) {
            // line 23
            echo "  <section id=\"slider\">
      ";
            // line 24
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "slider", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
            echo "
      ";
            // line 25
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "preface_first", [], "any", false, false, true, 25)) {
                // line 26
                echo "        <section id=\"preface-first\">
          <div class=\"container\">
            ";
                // line 28
                if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "preface_first", [], "any", false, false, true, 28)) {
                    // line 29
                    echo "            ";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "preface_first", [], "any", false, false, true, 29), 29, $this->source), "html", null, true);
                    echo "
            ";
                }
                // line 31
                echo "          </div>
        </section>
      ";
            }
            // line 34
            echo "  </section>
  ";
        }
        // line 36
        echo "
  ";
        // line 37
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "preface_second", [], "any", false, false, true, 37)) {
            // line 38
            echo "  <section id=\"preface-second\">
    <div class=\"container\">
      ";
            // line 40
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "preface_second", [], "any", false, false, true, 40)) {
                // line 41
                echo "      ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "preface_second", [], "any", false, false, true, 41), 41, $this->source), "html", null, true);
                echo "
      ";
            }
            // line 43
            echo "    </div>
  </section>
  ";
        }
        // line 46
        echo "
  <section id=\"content\">

    ";
        // line 49
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 49)) {
            // line 50
            echo "    <div class=\"container\">
        ";
            // line 51
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 51), 51, $this->source), "html", null, true);
            echo "
    </div>
    ";
        }
        // line 54
        echo "  </section>

  ";
        // line 56
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "postfix_first", [], "any", false, false, true, 56)) {
            // line 57
            echo "  <section id=\"postfix-first\">
    <div class=\"container\">
      ";
            // line 59
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "postfix_first", [], "any", false, false, true, 59), 59, $this->source), "html", null, true);
            echo "
    </div>
  </section>
  ";
        }
        // line 63
        echo "
   ";
        // line 64
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "postfix_second", [], "any", false, false, true, 64)) {
            // line 65
            echo "  <section id=\"postfix-second\">
    <div class=\"container\">
      ";
            // line 67
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "postfix_second", [], "any", false, false, true, 67), 67, $this->source), "html", null, true);
            echo "
    </div>
  </section>
  ";
        }
        // line 71
        echo "
  ";
        // line 72
        if (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 72) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 72)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 72))) {
            // line 73
            echo "  <section id=\"pre-footer\">
    <div class=\"container\">
      ";
            // line 75
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 75), 75, $this->source), "html", null, true);
            echo "
      ";
            // line 76
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 76), 76, $this->source), "html", null, true);
            echo "
      ";
            // line 77
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 77), 77, $this->source), "html", null, true);
            echo "
    </div>
  </section>
  ";
        }
        // line 81
        echo "
   ";
        // line 82
        if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fifth", [], "any", false, false, true, 82) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 82))) {
            // line 83
            echo "  <footer id=\"footer\">
    <div class=\"container\">
      ";
            // line 85
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 85), 85, $this->source), "html", null, true);
            echo "
      ";
            // line 86
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fifth", [], "any", false, false, true, 86), 86, $this->source), "html", null, true);
            echo "
    </div>
  </footer>
  ";
        }
        // line 90
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/limited/page--blog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 90,  233 => 86,  229 => 85,  225 => 83,  223 => 82,  220 => 81,  213 => 77,  209 => 76,  205 => 75,  201 => 73,  199 => 72,  196 => 71,  189 => 67,  185 => 65,  183 => 64,  180 => 63,  173 => 59,  169 => 57,  167 => 56,  163 => 54,  157 => 51,  154 => 50,  152 => 49,  147 => 46,  142 => 43,  136 => 41,  134 => 40,  130 => 38,  128 => 37,  125 => 36,  121 => 34,  116 => 31,  110 => 29,  108 => 28,  104 => 26,  102 => 25,  98 => 24,  95 => 23,  93 => 22,  90 => 21,  83 => 17,  79 => 15,  77 => 14,  72 => 11,  66 => 9,  63 => 8,  57 => 7,  54 => 6,  48 => 5,  46 => 4,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"page\" class=\"{{ page_classes }}\">
  <header id=\"header\">
    <div class=\"container\">
      {% if page.branding %}
      {{ page.branding }}
      {% endif %} {% if page.primary_navigation %}
      {{ page.primary_navigation }}
      {% endif %} {% if page.information %}
      {{ page.information }}
      {% endif %}
    </div>
  </header>

  {% if page.highlighted %}
  <section id=\"highlighted\">
    <div class=\"container\">
      {{ page.highlighted }}
    </div>
  </section>
  {% endif %}

  {% if page.slider %}
  <section id=\"slider\">
      {{ page.slider }}
      {% if page.preface_first %}
        <section id=\"preface-first\">
          <div class=\"container\">
            {% if page.preface_first %}
            {{ page.preface_first }}
            {% endif %}
          </div>
        </section>
      {% endif %}
  </section>
  {% endif %}

  {% if page.preface_second %}
  <section id=\"preface-second\">
    <div class=\"container\">
      {% if page.preface_second %}
      {{ page.preface_second }}
      {% endif %}
    </div>
  </section>
  {% endif %}

  <section id=\"content\">

    {% if page.content %}
    <div class=\"container\">
        {{ page.content }}
    </div>
    {% endif %}
  </section>

  {% if page.postfix_first %}
  <section id=\"postfix-first\">
    <div class=\"container\">
      {{ page.postfix_first }}
    </div>
  </section>
  {% endif %}

   {% if page.postfix_second %}
  <section id=\"postfix-second\">
    <div class=\"container\">
      {{ page.postfix_second }}
    </div>
  </section>
  {% endif %}

  {% if page.footer_first or page.footer_second or page.footer_third %}
  <section id=\"pre-footer\">
    <div class=\"container\">
      {{ page.footer_first }}
      {{ page.footer_second }}
      {{ page.footer_third }}
    </div>
  </section>
  {% endif %}

   {% if page.footer_fifth or page.footer_fourth %}
  <footer id=\"footer\">
    <div class=\"container\">
      {{ page.footer_fourth }}
      {{ page.footer_fifth }}
    </div>
  </footer>
  {% endif %}
</div>
", "themes/custom/longinus/templates/limited/page--blog.html.twig", "/var/www/html/web/themes/custom/longinus/templates/limited/page--blog.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 4);
        static $filters = array("escape" => 1);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
