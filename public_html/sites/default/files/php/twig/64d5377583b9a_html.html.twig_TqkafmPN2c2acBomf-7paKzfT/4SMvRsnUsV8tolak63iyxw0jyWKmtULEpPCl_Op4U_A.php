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

/* themes/custom/longinus/templates/layout/html.html.twig */
class __TwigTemplate_c8ea324eb622d17d99cf00c6f7de7fee90fa5b733a1d0169db0afdcabc451572 extends \Twig\Template
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
        // line 28
        $context["body_classes"] = [0 => ((        // line 29
($context["logged_in"] ?? null)) ? ("user-logged-in") : ("")), 1 => ((        // line 30
($context["is_admin"] ?? null)) ? ("is_admin") : ("")), 2 => (( !        // line 31
($context["root_path"] ?? null)) ? ("path-frontpage") : (("path-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["root_path"] ?? null), 31, $this->source))))), 3 => ((        // line 32
($context["node_type"] ?? null)) ? (("node--type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["node_type"] ?? null), 32, $this->source)))) : ("")), 4 => ((        // line 33
($context["db_offline"] ?? null)) ? ("db-offline") : ("")), 5 => ((        // line 34
($context["path_alias"] ?? null)) ? (($context["path_alias"] ?? null)) : ("")), 6 => ((        // line 35
($context["current_path"] ?? null)) ? (("context" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["current_path"] ?? null), 35, $this->source)))) : ("")), 7 => (((twig_get_attribute($this->env, $this->source,         // line 36
($context["page"] ?? null), "sidebar", [], "any", false, false, true, 36) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "facets", [], "any", false, false, true, 36))) ? ("with-sidebar-or-facets") : ("")), 8 => ((twig_get_attribute($this->env, $this->source,         // line 37
($context["page"] ?? null), "sidebar", [], "any", false, false, true, 37)) ? ("with-sidebar") : ("")), 9 => ((twig_get_attribute($this->env, $this->source,         // line 38
($context["page"] ?? null), "facets", [], "any", false, false, true, 38)) ? ("with-facets") : ("")), 10 => (((twig_get_attribute($this->env, $this->source,         // line 39
($context["page"] ?? null), "sidebar", [], "any", false, false, true, 39) && twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "facets", [], "any", false, false, true, 39))) ? ("with-facets-and-sidebar") : ("")), 11 => ((twig_get_attribute($this->env, $this->source,         // line 40
($context["page"] ?? null), "footer_first", [], "any", false, false, true, 40)) ? ("") : ("")), 12 => ((        // line 41
($context["language"] ?? null)) ? (("lang-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["language"] ?? null), 41, $this->source)))) : ("")), 13 => "preload"];
        // line 45
        echo "<!DOCTYPE html>

<html";
        // line 47
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["html_attributes"] ?? null), 47, $this->source), "html", null, true);
        echo ">
    <head>
        <head-placeholder token=\"";
        // line 49
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 49, $this->source));
        echo "\">
        <title>";
        // line 50
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->safeJoin($this->env, $this->sandbox->ensureToStringAllowed(($context["head_title"] ?? null), 50, $this->source), " | "));
        echo "</title>
        <css-placeholder token=\"";
        // line 51
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 51, $this->source));
        echo "\">
        <js-placeholder token=\"";
        // line 52
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 52, $this->source));
        echo "\">
    </head>

    <body";
        // line 55
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["body_classes"] ?? null)], "method", false, false, true, 55), 55, $this->source), "html", null, true);
        echo ">
        <a href=\"#main-content\" class=\"visually-hidden focusable\">
            ";
        // line 57
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Skip to main content"));
        echo "
        </a>
        ";
        // line 59
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_top"] ?? null), 59, $this->source), "html", null, true);
        echo "
        ";
        // line 60
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page"] ?? null), 60, $this->source), "html", null, true);
        echo "
        ";
        // line 61
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_bottom"] ?? null), 61, $this->source), "html", null, true);
        echo "
        <js-bottom-placeholder token=\"";
        // line 62
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 62, $this->source));
        echo "\">
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/layout/html.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 62,  99 => 61,  95 => 60,  91 => 59,  86 => 57,  81 => 55,  75 => 52,  71 => 51,  67 => 50,  63 => 49,  58 => 47,  54 => 45,  52 => 41,  51 => 40,  50 => 39,  49 => 38,  48 => 37,  47 => 36,  46 => 35,  45 => 34,  44 => 33,  43 => 32,  42 => 31,  41 => 30,  40 => 29,  39 => 28,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation for the basic structure of a single Drupal page.
 *
 * Variables:
 * - logged_in: A flag indicating if user is logged in.
 * - root_path: The root path of the current page (e.g., node, admin, user).
 * - node_type: The content type for the current node, if the page is a node.
 * - head_title: List of text elements that make up the head_title variable.
 *   May contain or more of the following:
 *   - title: The title of the page.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site.
 * - page_top: Initial rendered markup. This should be printed before 'page'.
 * - page: The rendered page markup.
 * - page_bottom: Closing rendered markup. This variable should be printed after
 *   'page'.
 * - db_offline: A flag indicating if the database is offline.
 * - placeholder_token: The token for generating head, css, js and js-bottom
 *   placeholders.
 *
 * @see template_preprocess_html()
 *
 * @ingroup themeable
 */
#}
{% set body_classes = [
    logged_in ? 'user-logged-in',
    is_admin ? 'is_admin',
    not root_path ? 'path-frontpage' : 'path-' ~ root_path|clean_class,
    node_type ? 'node--type-' ~ node_type|clean_class,
    db_offline ? 'db-offline',
    path_alias ? path_alias,
    current_path ? 'context' ~ current_path|clean_class,
    page.sidebar or page.facets ? 'with-sidebar-or-facets',
    page.sidebar ? 'with-sidebar',
    page.facets ? 'with-facets',
    page.sidebar and page.facets ? 'with-facets-and-sidebar',
    page.footer_first ? '',
    language ? 'lang-' ~ language|clean_class,
    'preload',
    ]
%}
<!DOCTYPE html>

<html{{ html_attributes }}>
    <head>
        <head-placeholder token=\"{{ placeholder_token|raw }}\">
        <title>{{ head_title|safe_join(' | ') }}</title>
        <css-placeholder token=\"{{ placeholder_token|raw }}\">
        <js-placeholder token=\"{{ placeholder_token|raw }}\">
    </head>

    <body{{ attributes.addClass(body_classes) }}>
        <a href=\"#main-content\" class=\"visually-hidden focusable\">
            {{ 'Skip to main content'|t }}
        </a>
        {{ page_top }}
        {{ page }}
        {{ page_bottom }}
        <js-bottom-placeholder token=\"{{ placeholder_token|raw }}\">
    </body>
</html>
", "themes/custom/longinus/templates/layout/html.html.twig", "/var/www/html/web/themes/custom/longinus/templates/layout/html.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 28);
        static $filters = array("clean_class" => 31, "escape" => 47, "raw" => 49, "safe_join" => 50, "t" => 57);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['clean_class', 'escape', 'raw', 'safe_join', 't'],
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
