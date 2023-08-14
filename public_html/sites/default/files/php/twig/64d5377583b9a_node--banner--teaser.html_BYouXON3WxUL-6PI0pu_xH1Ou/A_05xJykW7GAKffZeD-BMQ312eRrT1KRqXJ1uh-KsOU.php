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

/* themes/custom/longinus/templates/content/node--banner--teaser.html.twig */
class __TwigTemplate_ca19ce5cc71b6d6c8f4913f0835edcf0f03c5c8e80aa554345259246b17eccde extends \Twig\Template
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
        // line 1
        $context["longinus_block"] = ((($context["longinus_block"] ?? null)) ? (($context["longinus_block"] ?? null)) : (\Drupal\Component\Utility\Html::getClass((("node-" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "bundle", [], "any", false, false, true, 1), 1, $this->source)) . (((($context["view_mode"] ?? null) != "default")) ? (("-" . $this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null), 1, $this->source))) : (""))))));
        // line 2
        $context["classes"] = [0 =>         // line 3
($context["longinus_block"] ?? null), 1 => ((twig_get_attribute($this->env, $this->source,         // line 4
($context["node"] ?? null), "isPromoted", [], "method", false, false, true, 4)) ? (($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 4, $this->source) . "--promoted")) : ("")), 2 => ((twig_get_attribute($this->env, $this->source,         // line 5
($context["node"] ?? null), "isSticky", [], "method", false, false, true, 5)) ? (($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 5, $this->source) . "--sticky")) : ("")), 3 => (( !twig_get_attribute($this->env, $this->source,         // line 6
($context["node"] ?? null), "isPublished", [], "method", false, false, true, 6)) ? (($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 6, $this->source) . "--unpublished")) : (""))];
        // line 8
        echo "
<article";
        // line 9
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 9), 9, $this->source), "html", null, true);
        echo ">
    ";
        // line 10
        $this->displayBlock('content', $context, $blocks);
        // line 21
        echo "</article>
";
    }

    // line 10
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 11
        echo "        ";
        if ($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_image_link", [], "any", false, false, true, 11))) {
            // line 12
            echo "            <a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_0 = (($__internal_compile_1 = twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_image_link", [], "any", false, false, true, 12)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["0"] ?? null) : null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["#url"] ?? null) : null), 12, $this->source), "html", null, true);
            echo "\">
        ";
        }
        // line 14
        echo "
        ";
        // line 15
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 15, $this->source), "field_image_link"), "html", null, true);
        echo "

        ";
        // line 17
        if ($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_image_link", [], "any", false, false, true, 17))) {
            // line 18
            echo "            </a>
        ";
        }
        // line 20
        echo "    ";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/content/node--banner--teaser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 20,  85 => 18,  83 => 17,  78 => 15,  75 => 14,  69 => 12,  66 => 11,  62 => 10,  57 => 21,  55 => 10,  51 => 9,  48 => 8,  46 => 6,  45 => 5,  44 => 4,  43 => 3,  42 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set longinus_block = longinus_block ?: ('node-' ~ node.bundle ~ (view_mode != 'default' ? '-' ~ view_mode))|clean_class %}
{% set classes = [
    longinus_block,
    node.isPromoted() ? longinus_block ~ '--promoted',
    node.isSticky() ? longinus_block ~ '--sticky',
    not node.isPublished() ? longinus_block ~ '--unpublished',
] %}

<article{{ attributes.addClass(classes) }}>
    {% block content %}
        {% if content.field_image_link | render %}
            <a href=\"{{ content.field_image_link['0']['#url'] }}\">
        {% endif %}

        {{ content|without('field_image_link') }}

        {% if content.field_image_link | render %}
            </a>
        {% endif %}
    {% endblock %}
</article>
", "themes/custom/longinus/templates/content/node--banner--teaser.html.twig", "/var/www/html/web/themes/custom/longinus/templates/content/node--banner--teaser.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1, "block" => 10, "if" => 11);
        static $filters = array("clean_class" => 1, "escape" => 9, "render" => 11, "without" => 15);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block', 'if'],
                ['clean_class', 'escape', 'render', 'without'],
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
