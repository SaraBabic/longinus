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

/* themes/custom/longinus/templates/content/taxonomy-term.html.twig */
class __TwigTemplate_86fc9621ecd1b38a7b7066a4691adeb2384022f59b83adf59134af9153b80b45 extends \Twig\Template
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
        // line 27
        $context["longinus_block"] = ((($context["longinus_block"] ?? null)) ? (($context["longinus_block"] ?? null)) : (\Drupal\Component\Utility\Html::getClass((("taxonomy-term-" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["term"] ?? null), "bundle", [], "any", false, false, true, 27), 27, $this->source)) . (((($context["view_mode"] ?? null) != "default")) ? (("-" . $this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null), 27, $this->source))) : (""))))));
        // line 30
        $context["classes"] = [0 =>         // line 31
($context["longinus_block"] ?? null), 1 => ((twig_get_attribute($this->env, $this->source,         // line 32
($context["term"] ?? null), "isPromoted", [], "method", false, false, true, 32)) ? (($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 32, $this->source) . "--promoted")) : ("")), 2 => ((twig_get_attribute($this->env, $this->source,         // line 33
($context["term"] ?? null), "isSticky", [], "method", false, false, true, 33)) ? (($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 33, $this->source) . "--sticky")) : (""))];
        // line 36
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "setAttribute", [0 => "id", 1 => ("taxonomy-term-" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["term"] ?? null), "id", [], "any", false, false, true, 36), 36, $this->source))], "method", false, false, true, 36), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 36), 36, $this->source), "html", null, true);
        echo ">
  ";
        // line 37
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 37, $this->source), "html", null, true);
        echo "
  <div class=\"taxonomy-term__content\">
    ";
        // line 39
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 39, $this->source), "html", null, true);
        echo "
  </div>
  ";
        // line 41
        if ((($context["name"] ?? null) &&  !($context["page"] ?? null))) {
            // line 42
            echo "    <h4><a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 42, $this->source), "html", null, true);
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["name"] ?? null), 42, $this->source), "html", null, true);
            echo "</a></h4>
  ";
        }
        // line 44
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 44, $this->source), "html", null, true);
        echo "
 
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/content/taxonomy-term.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 44,  63 => 42,  61 => 41,  56 => 39,  51 => 37,  46 => 36,  44 => 33,  43 => 32,  42 => 31,  41 => 30,  39 => 27,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override to display a taxonomy term.
 *
 * Available variables:
 * - url: URL of the current term.
 * - name: Name of the current term.
 * - content: Items for the content of the term (fields and description).
 *   Use 'content' to print them all, or print a subset such as
 *   'content.description'. Use the following code to exclude the
 *   printing of a given child element:
 *   @code
 *   {{ content|without('description') }}
 *   @endcode
 * - attributes: HTML attributes for the wrapper.
 * - page: Flag for the full page state.
 * - term: The taxonomy term entity, including:
 *   - id: The ID of the taxonomy term.
 *   - bundle: Machine name of the current vocabulary.
 * - view_mode: View mode, e.g. 'full', 'teaser', etc.
 *
 * @see template_preprocess_taxonomy_term()
 */
#}
{%
set longinus_block = longinus_block ?: ('taxonomy-term-' ~ term.bundle ~ (view_mode != 'default' ? '-' ~ view_mode))|clean_class
%}
{%
set classes = [
longinus_block,
term.isPromoted() ? longinus_block ~ '--promoted',
term.isSticky() ? longinus_block ~ '--sticky',
]
%}
<div{{ attributes.setAttribute('id', 'taxonomy-term-' ~ term.id).addClass(classes) }}>
  {{ title_prefix }}
  <div class=\"taxonomy-term__content\">
    {{ content }}
  </div>
  {% if name and not page %}
    <h4><a href=\"{{ url }}\">{{ name }}</a></h4>
  {% endif %}
  {{ title_suffix }}
 
</div>
", "themes/custom/longinus/templates/content/taxonomy-term.html.twig", "/var/www/html/web/themes/custom/longinus/templates/content/taxonomy-term.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 27, "if" => 41);
        static $filters = array("clean_class" => 27, "escape" => 36);
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
