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

/* themes/custom/longinus/templates/views/views-mini-pager.html.twig */
class __TwigTemplate_f47887a0985238b4b88b11a7ea5876f09b60ed424cfb0fb94cd80309de15560b extends \Twig\Template
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
        if ((twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 1) || twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 1))) {
            // line 2
            echo "  <nav class=\"pager pager--mini\" aria-labelledby=\"pagination-heading\">
    <h4 class=\"pager__heading visually-hidden\">";
            // line 3
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Pagination"));
            echo "</h4>
    <ul class=\"pager__items js-pager__items\">
       ";
            // line 5
            if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 5)) {
                // line 6
                echo "        <li class=\"pager__item pager__item--previous\">
          <a href=\"";
                // line 7
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 7), "href", [], "any", false, false, true, 7), 7, $this->source), "html", null, true);
                echo "\" title=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to previous page"));
                echo "\" rel=\"prev\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 7), "attributes", [], "any", false, false, true, 7), 7, $this->source), "href", "title", "rel"), "html", null, true);
                echo ">
            <span aria-hidden=\"true\">";
                // line 8
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Previous page"));
                echo "</span>
          </a>
        </li>
        ";
            } else {
                // line 12
                echo "            <li class=\"pager__item pager__item--previous\">
                <span class=\"pager__item--empty\">";
                // line 13
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Previous page"));
                echo "</span>
            </li>
        ";
            }
            // line 16
            echo "
      ";
            // line 17
            if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "current", [], "any", false, false, true, 17)) {
                // line 18
                echo "        <li class=\"pager__item is-active\">
          ";
                // line 19
                echo t("Page @items.current", array("@items.current" => twig_get_attribute($this->env, $this->source,                 // line 20
($context["items"] ?? null), "current", [], "any", false, false, true, 20), ));
                // line 22
                echo "        </li>
      ";
            }
            // line 24
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 24)) {
                // line 25
                echo "        <li class=\"pager__item pager__item--next\">
          <a href=\"";
                // line 26
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 26), "href", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
                echo "\" title=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to next page"));
                echo "\" rel=\"next\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 26), "attributes", [], "any", false, false, true, 26), 26, $this->source), "href", "title", "rel"), "html", null, true);
                echo ">
            <span aria-hidden=\"true\">";
                // line 27
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Next page"));
                echo "</span>
          </a>
        </li>
      ";
            } else {
                // line 31
                echo "          <li class=\"pager__item pager__item--next\">
              <span class=\"pager__item--empty\">";
                // line 32
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Next page"));
                echo "</span>
          </li>
      ";
            }
            // line 35
            echo "    </ul>
  </nav>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/views/views-mini-pager.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 35,  117 => 32,  114 => 31,  107 => 27,  99 => 26,  96 => 25,  93 => 24,  89 => 22,  87 => 20,  86 => 19,  83 => 18,  81 => 17,  78 => 16,  72 => 13,  69 => 12,  62 => 8,  54 => 7,  51 => 6,  49 => 5,  44 => 3,  41 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if items.previous or items.next %}
  <nav class=\"pager pager--mini\" aria-labelledby=\"pagination-heading\">
    <h4 class=\"pager__heading visually-hidden\">{{ 'Pagination'|t }}</h4>
    <ul class=\"pager__items js-pager__items\">
       {% if items.previous %}
        <li class=\"pager__item pager__item--previous\">
          <a href=\"{{ items.previous.href }}\" title=\"{{ 'Go to previous page'|t }}\" rel=\"prev\"{{ items.previous.attributes|without('href', 'title', 'rel') }}>
            <span aria-hidden=\"true\">{{ 'Previous page'|t }}</span>
          </a>
        </li>
        {% else %}
            <li class=\"pager__item pager__item--previous\">
                <span class=\"pager__item--empty\">{{ 'Previous page'|t }}</span>
            </li>
        {% endif %}

      {% if items.current %}
        <li class=\"pager__item is-active\">
          {% trans %}
            Page {{ items.current }}
          {% endtrans %}
        </li>
      {% endif %}
      {% if items.next %}
        <li class=\"pager__item pager__item--next\">
          <a href=\"{{ items.next.href }}\" title=\"{{ 'Go to next page'|t }}\" rel=\"next\"{{ items.next.attributes|without('href', 'title', 'rel') }}>
            <span aria-hidden=\"true\">{{ 'Next page'|t }}</span>
          </a>
        </li>
      {% else %}
          <li class=\"pager__item pager__item--next\">
              <span class=\"pager__item--empty\">{{ 'Next page'|t }}</span>
          </li>
      {% endif %}
    </ul>
  </nav>
{% endif %}
", "themes/custom/longinus/templates/views/views-mini-pager.html.twig", "/var/www/html/web/themes/custom/longinus/templates/views/views-mini-pager.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 1, "trans" => 19);
        static $filters = array("t" => 3, "escape" => 7, "without" => 7);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'trans'],
                ['t', 'escape', 'without'],
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
