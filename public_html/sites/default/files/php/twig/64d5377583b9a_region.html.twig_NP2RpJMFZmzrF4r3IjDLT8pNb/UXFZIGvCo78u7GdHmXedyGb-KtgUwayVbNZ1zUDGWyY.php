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

/* themes/custom/longinus/templates/layout/region.html.twig */
class __TwigTemplate_aec000bc016803846132d5a41db539c062ed0df19dd4c278c58d98a9a083b82c extends \Twig\Template
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
        $context["longinus_block"] = ("region-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["region"] ?? null), 2, $this->source)));
        // line 5
        $context["classes"] = [0 =>         // line 6
($context["longinus_block"] ?? null)];
        // line 9
        if (($context["content"] ?? null)) {
            // line 10
            echo "  <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 10), 10, $this->source), "html", null, true);
            echo ">
    ";
            // line 11
            $this->displayBlock('content', $context, $blocks);
            // line 14
            echo "  </div>
";
        }
    }

    // line 11
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 12
        echo "      ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 12, $this->source), "html", null, true);
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/layout/region.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 12,  60 => 11,  54 => 14,  52 => 11,  47 => 10,  45 => 9,  43 => 6,  42 => 5,  40 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{%
  set longinus_block = 'region-' ~ region|clean_class
%}
{%
  set classes = [
    longinus_block,
  ]
%}
{% if content %}
  <div{{ attributes.addClass(classes) }}>
    {% block content %}
      {{ content }}
    {% endblock %}
  </div>
{% endif %}
", "themes/custom/longinus/templates/layout/region.html.twig", "/var/www/html/web/themes/custom/longinus/templates/layout/region.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 2, "if" => 9, "block" => 11);
        static $filters = array("clean_class" => 2, "escape" => 10);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
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
