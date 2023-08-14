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

/* themes/custom/longinus/templates/content/node.html.twig */
class __TwigTemplate_9dacd5e1e264100eaab2956a78d6a13871eae342bb17c602059ccae0d044cba0 extends \Twig\Template
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
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        $context["longinus_block"] = ((($context["longinus_block"] ?? null)) ? (($context["longinus_block"] ?? null)) : (\Drupal\Component\Utility\Html::getClass((("node-" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "bundle", [], "any", false, false, true, 2), 2, $this->source)) . (((($context["view_mode"] ?? null) != "default")) ? (("-" . $this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null), 2, $this->source))) : (""))))));
        // line 5
        $context["classes"] = [0 =>         // line 6
($context["longinus_block"] ?? null), 1 =>         // line 7
($context["longinus_blockss"] ?? null), 2 => ((twig_get_attribute($this->env, $this->source,         // line 8
($context["node"] ?? null), "isPromoted", [], "method", false, false, true, 8)) ? (($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 8, $this->source) . "--promoted")) : ("")), 3 => ((twig_get_attribute($this->env, $this->source,         // line 9
($context["node"] ?? null), "isSticky", [], "method", false, false, true, 9)) ? (($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 9, $this->source) . "--sticky")) : ("")), 4 => (( !twig_get_attribute($this->env, $this->source,         // line 10
($context["node"] ?? null), "isPublished", [], "method", false, false, true, 10)) ? (($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 10, $this->source) . "--unpublished")) : (""))];
        // line 13
        echo "
<article";
        // line 14
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 14), 14, $this->source), "html", null, true);
        echo " id=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "id", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
        echo "\">
    ";
        // line 15
        $this->displayBlock('content', $context, $blocks);
        // line 35
        echo "</article>
";
    }

    // line 15
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 16
        echo "        ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 16, $this->source), "html", null, true);
        echo "
        ";
        // line 17
        if ( !($context["page"] ?? null)) {
            // line 18
            echo "          <h2";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", [0 => ($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 18, $this->source) . "__title")], "method", false, false, true, 18), 18, $this->source), "html", null, true);
            echo ">
            <a class=\"";
            // line 19
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 19, $this->source), "html", null, true);
            echo "__title-link\" href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 19, $this->source), "html", null, true);
            echo "\" rel=\"bookmark\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 19, $this->source), "html", null, true);
            echo "</a>
          </h2>
        ";
        }
        // line 22
        echo "        ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 22, $this->source), "html", null, true);
        echo "

      <div";
        // line 24
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => ($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 24, $this->source) . "__content")], "method", false, false, true, 24), 24, $this->source), "html", null, true);
        echo ">
          
          ";
        // line 26
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 26, $this->source), "links"), "html", null, true);
        echo "
      </div>

        ";
        // line 29
        if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "links", [], "any", false, false, true, 29)) {
            // line 30
            echo "          <div class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 30, $this->source), "html", null, true);
            echo "__links\">
              ";
            // line 31
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "links", [], "any", false, false, true, 31), 31, $this->source), "html", null, true);
            echo "
          </div>
        ";
        }
        // line 34
        echo "    ";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/content/node.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 34,  115 => 31,  110 => 30,  108 => 29,  102 => 26,  97 => 24,  91 => 22,  81 => 19,  76 => 18,  74 => 17,  69 => 16,  65 => 15,  60 => 35,  58 => 15,  52 => 14,  49 => 13,  47 => 10,  46 => 9,  45 => 8,  44 => 7,  43 => 6,  42 => 5,  40 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{%
set longinus_block = longinus_block ?: ('node-' ~ node.bundle ~ (view_mode != 'default' ? '-' ~ view_mode))|clean_class
%}
{%
set classes = [
longinus_block,
longinus_blockss,
node.isPromoted() ? longinus_block ~ '--promoted',
node.isSticky() ? longinus_block ~ '--sticky',
not node.isPublished() ? longinus_block ~ '--unpublished',
]
%}

<article{{ attributes.addClass(classes) }} id=\"{{ node.id }}\">
    {% block content %}
        {{ title_prefix }}
        {% if not page %}
          <h2{{ title_attributes.addClass(longinus_block ~ '__title') }}>
            <a class=\"{{ longinus_block }}__title-link\" href=\"{{ url }}\" rel=\"bookmark\">{{ label }}</a>
          </h2>
        {% endif %}
        {{ title_suffix }}

      <div{{ content_attributes.addClass(longinus_block ~ '__content') }}>
          
          {{ content|without('links') }}
      </div>

        {% if content.links %}
          <div class=\"{{ longinus_block }}__links\">
              {{ content.links }}
          </div>
        {% endif %}
    {% endblock %}
</article>
", "themes/custom/longinus/templates/content/node.html.twig", "/var/www/html/web/themes/custom/longinus/templates/content/node.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 2, "block" => 15, "if" => 17);
        static $filters = array("clean_class" => 2, "escape" => 14, "without" => 26);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block', 'if'],
                ['clean_class', 'escape', 'without'],
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
