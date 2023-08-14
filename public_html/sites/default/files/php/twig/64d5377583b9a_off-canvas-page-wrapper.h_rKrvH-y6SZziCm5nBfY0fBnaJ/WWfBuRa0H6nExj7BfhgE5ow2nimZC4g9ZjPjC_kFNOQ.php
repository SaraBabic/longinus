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

/* core/themes/stable9/templates/content/off-canvas-page-wrapper.html.twig */
class __TwigTemplate_79a6cd0328c60eb22172481b2e67d84f03276c07d7f81a45e7c7ace3ee37e9c9 extends \Twig\Template
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
        // line 20
        if (($context["children"] ?? null)) {
            // line 21
            echo "  <div class=\"dialog-off-canvas-main-canvas\" data-off-canvas-main-canvas>
    ";
            // line 22
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 22, $this->source), "html", null, true);
            echo "
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "core/themes/stable9/templates/content/off-canvas-page-wrapper.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 22,  41 => 21,  39 => 20,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for a page wrapper.
 *
 * For consistent wrapping to {{ page }} render in all themes. The
 * \"data-off-canvas-main-canvas\" attribute is required by the off-canvas dialog.
 * This is used by the core/drupal.dialog.off_canvas library to select the
 * \"main canvas\" page element as opposed to the \"off canvas\" which is the dialog
 * itself. The \"main canvas\" element must be resized according to the width of
 * the \"off canvas\" dialog so that no portion of the \"main canvas\" is obstructed
 * by the off-canvas dialog. The off-canvas dialog can vary in width when opened
 * and can be resized by the user. The \"data-off-canvas-main-canvas\" attribute
 * cannot be removed without breaking the off-canvas dialog functionality.
 *
 * Available variables:
 * - children: Contains the child elements of the page.
 */
#}
{% if children %}
  <div class=\"dialog-off-canvas-main-canvas\" data-off-canvas-main-canvas>
    {{ children }}
  </div>
{% endif %}
", "core/themes/stable9/templates/content/off-canvas-page-wrapper.html.twig", "/var/www/html/web/core/themes/stable9/templates/content/off-canvas-page-wrapper.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 20);
        static $filters = array("escape" => 22);
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
