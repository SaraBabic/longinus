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

/* modules/contrib/gin_toolbar/templates/toolbar.html.twig */
class __TwigTemplate_219e0cb5308445b9c7b3e8fe632acfc1daba82f0d63bc78dd521298e160e8196 extends \Twig\Template
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
        // line 7
        $__internal_compile_0 = null;
        try {
            $__internal_compile_0 =             $this->loadTemplate("@gin/navigation/toolbar--gin.html.twig", "modules/contrib/gin_toolbar/templates/toolbar.html.twig", 7);
        } catch (LoaderError $e) {
            // ignore missing template
        }
        if ($__internal_compile_0) {
            $__internal_compile_0->display($context);
        }
        // line 8
        if ((($context["secondary_toolbar_frontend"] ?? null) && (($context["toolbar_variant"] ?? null) != "classic"))) {
            // line 9
            echo "<div class=\"gin-secondary-toolbar gin-secondary-toolbar--frontend\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["toolbar_variant"] ?? null) == "vertical")) ? (" data-offset-top") : ("")));
            echo ">
  <div class=\"gin-secondary-toolbar__layout-container\">
    <div class=\"gin-breadcrumb-wrapper\">
      <div class=\"region-breadcrumb\">
        <nav class=\"gin-breadcrumb\" role=\"navigation\" aria-labelledby=\"gin-system-breadcrumb\">
          <h2 id=\"gin-system-breadcrumb\" class=\"visually-hidden\">";
            // line 14
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Breadcrumb"));
            echo "</h2>
          <ol class=\"gin-breadcrumb__list\">
            <li class=\"gin-breadcrumb__item\">
              ";
            // line 17
            if ((($context["entity_edit_url"] ?? null) && ($context["entity_title"] ?? null))) {
                // line 18
                echo "                <a class=\"gin-breadcrumb__link gin-back-to-admin\" href=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["entity_edit_url"] ?? null), 18, $this->source), "html", null, true);
                echo "\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Edit %title", ["%title" => ($context["entity_title"] ?? null)]));
                echo "</a>
              ";
            } else {
                // line 20
                echo "                <a class=\"gin-breadcrumb__link gin-back-to-admin\" href=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("system.admin_content"));
                echo "\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Back to Administration"));
                echo "</a>
              ";
            }
            // line 22
            echo "            </li>
          </ol>
        </nav>
      </div>
    </div>
    ";
            // line 27
            $__internal_compile_1 = null;
            try {
                $__internal_compile_1 =                 $this->loadTemplate("@gin/navigation/toolbar--gin--secondary.html.twig", "modules/contrib/gin_toolbar/templates/toolbar.html.twig", 27);
            } catch (LoaderError $e) {
                // ignore missing template
            }
            if ($__internal_compile_1) {
                $__internal_compile_1->display($context);
            }
            // line 28
            echo "  </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "modules/contrib/gin_toolbar/templates/toolbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 28,  91 => 27,  84 => 22,  76 => 20,  68 => 18,  66 => 17,  60 => 14,  51 => 9,  49 => 8,  39 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Include toolbar.html.twig template from Gin.
 */
#}
{% include '@gin/navigation/toolbar--gin.html.twig' ignore missing %}
{% if secondary_toolbar_frontend and toolbar_variant != 'classic' %}
<div class=\"gin-secondary-toolbar gin-secondary-toolbar--frontend\"{{ toolbar_variant == 'vertical' ? ' data-offset-top' : '' }}>
  <div class=\"gin-secondary-toolbar__layout-container\">
    <div class=\"gin-breadcrumb-wrapper\">
      <div class=\"region-breadcrumb\">
        <nav class=\"gin-breadcrumb\" role=\"navigation\" aria-labelledby=\"gin-system-breadcrumb\">
          <h2 id=\"gin-system-breadcrumb\" class=\"visually-hidden\">{{ 'Breadcrumb'|t }}</h2>
          <ol class=\"gin-breadcrumb__list\">
            <li class=\"gin-breadcrumb__item\">
              {% if entity_edit_url and entity_title %}
                <a class=\"gin-breadcrumb__link gin-back-to-admin\" href=\"{{ entity_edit_url }}\">{{ 'Edit %title'|t({ '%title': entity_title }) }}</a>
              {% else %}
                <a class=\"gin-breadcrumb__link gin-back-to-admin\" href=\"{{ path('system.admin_content') }}\">{{ 'Back to Administration'|t }}</a>
              {% endif %}
            </li>
          </ol>
        </nav>
      </div>
    </div>
    {% include '@gin/navigation/toolbar--gin--secondary.html.twig' ignore missing %}
  </div>
</div>
{% endif %}
", "modules/contrib/gin_toolbar/templates/toolbar.html.twig", "/var/www/html/web/modules/contrib/gin_toolbar/templates/toolbar.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 7, "if" => 8);
        static $filters = array("t" => 14, "escape" => 18);
        static $functions = array("path" => 20);

        try {
            $this->sandbox->checkSecurity(
                ['include', 'if'],
                ['t', 'escape'],
                ['path']
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
