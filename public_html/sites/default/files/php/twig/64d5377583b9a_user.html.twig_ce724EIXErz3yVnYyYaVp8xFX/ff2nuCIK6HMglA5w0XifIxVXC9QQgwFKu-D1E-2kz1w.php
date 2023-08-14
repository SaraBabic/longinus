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

/* themes/custom/longinus/templates/content/user.html.twig */
class __TwigTemplate_7a773de15c3eb350e348c68a572c2ec59e191696c1103c8f6920ef2dcd9e2b3a extends \Twig\Template
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
        $context["longinus_block"] = ((($context["longinus_block"] ?? null)) ? (($context["longinus_block"] ?? null)) : (\Drupal\Component\Utility\Html::getClass((("user-" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "bundle", [], "any", false, false, true, 2), 2, $this->source)) . (((($context["view_mode"] ?? null) != "default")) ? (("-" . $this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null), 2, $this->source))) : (""))))));
        // line 5
        $context["classes"] = [0 =>         // line 6
($context["longinus_block"] ?? null), 1 => ((twig_get_attribute($this->env, $this->source,         // line 7
($context["user"] ?? null), "isBlocked", [], "method", false, false, true, 7)) ? (($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 7, $this->source) . "--blocked")) : (""))];
        // line 10
        echo "<article";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 10), 10, $this->source), "html", null, true);
        echo ">
  ";
        // line 11
        $this->displayBlock('content', $context, $blocks);
        // line 16
        echo "</article>
";
    }

    // line 11
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 12
        echo "    ";
        if (($context["content"] ?? null)) {
            // line 13
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 13, $this->source), "html", null, true);
        }
        // line 15
        echo "  ";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/content/user.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 15,  65 => 13,  62 => 12,  58 => 11,  53 => 16,  51 => 11,  46 => 10,  44 => 7,  43 => 6,  42 => 5,  40 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{%
  set longinus_block = longinus_block ?: ('user-' ~ user.bundle ~ (view_mode != 'default' ? '-' ~ view_mode))|clean_class
%}
{%
  set classes = [
    longinus_block,
    user.isBlocked() ? longinus_block ~ '--blocked',
  ]
%}
<article{{ attributes.addClass(classes) }}>
  {% block content %}
    {% if content %}
      {{- content -}}
    {% endif %}
  {% endblock %}
</article>
", "themes/custom/longinus/templates/content/user.html.twig", "/var/www/html/web/themes/custom/longinus/templates/content/user.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 2, "block" => 11, "if" => 12);
        static $filters = array("clean_class" => 2, "escape" => 10);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block', 'if'],
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
