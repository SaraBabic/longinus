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

/* themes/custom/longinus/templates/block/block--block-content.html.twig */
class __TwigTemplate_813df76ada32ca00cc910f243c83ff0e80a7391f91b1f06d7b76d190dd78df54 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "block.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("block.html.twig", "themes/custom/longinus/templates/block/block--block-content.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "  ";
        // line 5
        $context["sub_longinus_block"] = ((twig_replace_filter($this->sandbox->ensureToStringAllowed(($context["block_content_bundle"] ?? null), 5, $this->source), ["_" => "-"]) . "-") . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["configuration"] ?? null), "view_mode", [], "any", false, false, true, 5), 5, $this->source)));
        // line 7
        echo "  <div class=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 7, $this->source), "html", null, true);
        echo "__content block-content-";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sub_longinus_block"] ?? null), 7, $this->source), "html", null, true);
        echo "\">
    ";
        // line 8
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 8, $this->source), "html", null, true);
        echo "
  </div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/block/block--block-content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 8,  56 => 7,  54 => 5,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"block.html.twig\" %}

{% block content %}
  {%
    set sub_longinus_block = block_content_bundle|replace({'_': '-'}) ~ '-' ~ configuration.view_mode|clean_class
  %}
  <div class=\"{{ longinus_block }}__content block-content-{{ sub_longinus_block }}\">
    {{ content }}
  </div>
{% endblock %}
", "themes/custom/longinus/templates/block/block--block-content.html.twig", "/var/www/html/web/themes/custom/longinus/templates/block/block--block-content.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 5);
        static $filters = array("replace" => 5, "clean_class" => 5, "escape" => 7);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['replace', 'clean_class', 'escape'],
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
