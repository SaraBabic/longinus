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

/* themes/custom/longinus/templates/limited/page--front.html.twig */
class __TwigTemplate_882c2e8d3d2a8f1c8a2bdeba25a6907e41060c2a7c42ef7dbd0e42027dbb59d5 extends \Twig\Template
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
        // line 46
        echo "
<div id=\"page\" class=\"";
        // line 47
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_classes"] ?? null), 47, $this->source), "html", null, true);
        echo "\">
  <header id=\"header\">
    <div class=\"container\">
      ";
        // line 50
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "branding", [], "any", false, false, true, 50)) {
            // line 51
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "branding", [], "any", false, false, true, 51), 51, $this->source), "html", null, true);
            echo "
      ";
        }
        // line 52
        echo " ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_navigation", [], "any", false, false, true, 52)) {
            // line 53
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_navigation", [], "any", false, false, true, 53), 53, $this->source), "html", null, true);
            echo "
      ";
        }
        // line 54
        echo " ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "information", [], "any", false, false, true, 54)) {
            // line 55
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "information", [], "any", false, false, true, 55), 55, $this->source), "html", null, true);
            echo "
      ";
        }
        // line 57
        echo "    </div>
  </header>

  ";
        // line 60
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 60)) {
            // line 61
            echo "  <section id=\"highlighted\">
    <div class=\"container\">
      ";
            // line 63
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 63), 63, $this->source), "html", null, true);
            echo "
    </div>
  </section>
  ";
        }
        // line 67
        echo "
  ";
        // line 68
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "slider", [], "any", false, false, true, 68)) {
            // line 69
            echo "  <section id=\"slider\">
      ";
            // line 70
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "slider", [], "any", false, false, true, 70), 70, $this->source), "html", null, true);
            echo "
      ";
            // line 71
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "preface_first", [], "any", false, false, true, 71)) {
                // line 72
                echo "        <section id=\"preface-first\">
          <div class=\"container\">
            ";
                // line 74
                if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "preface_first", [], "any", false, false, true, 74)) {
                    // line 75
                    echo "            ";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "preface_first", [], "any", false, false, true, 75), 75, $this->source), "html", null, true);
                    echo "
            ";
                }
                // line 77
                echo "          </div>
        </section>
      ";
            }
            // line 80
            echo "  </section>
  ";
        }
        // line 82
        echo "
  ";
        // line 83
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "preface_second", [], "any", false, false, true, 83)) {
            // line 84
            echo "  <section id=\"preface-second\">
      ";
            // line 85
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "preface_second", [], "any", false, false, true, 85)) {
                // line 86
                echo "      ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "preface_second", [], "any", false, false, true, 86), 86, $this->source), "html", null, true);
                echo "
      ";
            }
            // line 88
            echo "  </section>
  ";
        }
        // line 90
        echo "
  <section id=\"content\">
    <div class=\"container\">
      ";
        // line 93
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 93)) {
            // line 94
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 94), 94, $this->source), "html", null, true);
            echo "
      ";
        }
        // line 96
        echo "    </div>
  </section>

  ";
        // line 99
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "postfix_first", [], "any", false, false, true, 99)) {
            // line 100
            echo "  <section id=\"postfix-first\">
    <div class=\"container\">
      ";
            // line 102
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "postfix_first", [], "any", false, false, true, 102), 102, $this->source), "html", null, true);
            echo "
    </div>
  </section>
  ";
        }
        // line 106
        echo "
   ";
        // line 107
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "postfix_second", [], "any", false, false, true, 107)) {
            // line 108
            echo "  <section id=\"postfix-second\">
    <div class=\"container\">
      ";
            // line 110
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "postfix_second", [], "any", false, false, true, 110), 110, $this->source), "html", null, true);
            echo "
    </div>
  </section>
  ";
        }
        // line 114
        echo "
  ";
        // line 115
        if (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 115) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 115)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 115))) {
            // line 116
            echo "  <section id=\"pre-footer\">
    <div class=\"container\">
      ";
            // line 118
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 118), 118, $this->source), "html", null, true);
            echo "
      ";
            // line 119
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 119), 119, $this->source), "html", null, true);
            echo "
      ";
            // line 120
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 120), 120, $this->source), "html", null, true);
            echo "
    </div>
  </section>
  ";
        }
        // line 124
        echo "
   ";
        // line 125
        if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fifth", [], "any", false, false, true, 125) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 125))) {
            // line 126
            echo "  <footer id=\"footer\">
    <div class=\"container\">
      ";
            // line 128
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 128), 128, $this->source), "html", null, true);
            echo "
      ";
            // line 129
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fifth", [], "any", false, false, true, 129), 129, $this->source), "html", null, true);
            echo "
    </div>
  </footer>
  ";
        }
        // line 133
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/limited/page--front.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  238 => 133,  231 => 129,  227 => 128,  223 => 126,  221 => 125,  218 => 124,  211 => 120,  207 => 119,  203 => 118,  199 => 116,  197 => 115,  194 => 114,  187 => 110,  183 => 108,  181 => 107,  178 => 106,  171 => 102,  167 => 100,  165 => 99,  160 => 96,  154 => 94,  152 => 93,  147 => 90,  143 => 88,  137 => 86,  135 => 85,  132 => 84,  130 => 83,  127 => 82,  123 => 80,  118 => 77,  112 => 75,  110 => 74,  106 => 72,  104 => 71,  100 => 70,  97 => 69,  95 => 68,  92 => 67,  85 => 63,  81 => 61,  79 => 60,  74 => 57,  68 => 55,  65 => 54,  59 => 53,  56 => 52,  50 => 51,  48 => 50,  42 => 47,  39 => 46,);
    }

    public function getSourceContext()
    {
        return new Source("{# /** * @file * * The doctype, html, head and body tags are not in this
template. Instead they * can be found in the html.html.twig template normally
located in the * core/modules/system directory. * * Available variables: * *
General utility variables: * - base_path: The base URL path of the Drupal
installation. Will usually be * \"/\" unless you have installed Drupal in a
sub-directory. * - is_front: A flag indicating if the current page is the front
page. * - logged_in: A flag indicating if the user is registered and signed in.
* - is_admin: A flag indicating if the user has permission to access *
administration pages. * * Site identity: * - front_page: The URL of the front
page. Use this instead of base_path when * linking to the front page. This
includes the language domain or prefix. * - logo: The url of the logo image, as
defined in theme settings. * - site_name: The name of the site. This is empty
when displaying the site * name has been disabled in the theme settings. * -
site_slogan: The slogan of the site. This is empty when displaying the site *
slogan has been disabled in theme settings. * - hide_site_name: A flag
indicating if the site name has been toggled off on * the theme settings page.
If hidden, the \"visually-hidden\" class is added * to make the site name visually
hidden, but still accessible. * - hide_site_slogan: A flag indicating if the
site slogan has been toggled off * on the theme settings page. If hidden, the
\"visually-hidden\" class is * added to make the site slogan visually hidden, but
still accessible. * * Navigation: * - main_menu: The Main menu links for the
site, if they have been configured. * - secondary_menu: The Secondary menu links
for the site, if they have been * configured. * - breadcrumb: The breadcrumb
trail for the current page. * * Page content (in order of occurrence in the
default page.html.twig): * - title_prefix: Additional output populated by
modules, intended to be * displayed in front of the main title tag that appears
in the template. * - title: The page title, for use in the actual content. * -
title_suffix: Additional output populated by modules, intended to be * displayed
after the main title tag that appears in the template. * - messages: Status and
error messages. Should be displayed prominently. * - tabs: Tabs linking to any
sub-pages beneath the current page (e.g., the * view and edit tabs when
displaying a node). * - action_links: Actions local to the page, such as \"Add
menu\" on the menu * administration interface. * - feed_icons: All feed icons for
the current page. * - node: Fully loaded node, if there is an
automatically-loaded node * associated with the page and the node ID is the
second argument in the * page's path (e.g. node/12345 and node/12345/revisions,
but not * comment/reply/12345). * * Regions: * - page.header: Items for the
header region. * - page.highlighted: Items for the highlighted content region. *
- page.content: The main content of the current page. * - page.sidebar_first:
Items for the first sidebar. * - page.sidebar_second: Items for the second
sidebar. * - page.footer: Items for the footer region. * * longinus utility
variables * - region_classes.REGION_CONTAINERID - region_classes.main will
render classes like with--sidebar-first on container * * @see
template_preprocess_page() * @see longinus_preprocess_page() * @see
html.html.twig * * @ingroup themeable */ #}

<div id=\"page\" class=\"{{ page_classes }}\">
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
      {% if page.preface_second %}
      {{ page.preface_second }}
      {% endif %}
  </section>
  {% endif %}

  <section id=\"content\">
    <div class=\"container\">
      {% if page.content %}
      {{ page.content }}
      {% endif %}
    </div>
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
", "themes/custom/longinus/templates/limited/page--front.html.twig", "/var/www/html/web/themes/custom/longinus/templates/limited/page--front.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 50);
        static $filters = array("escape" => 47);
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
