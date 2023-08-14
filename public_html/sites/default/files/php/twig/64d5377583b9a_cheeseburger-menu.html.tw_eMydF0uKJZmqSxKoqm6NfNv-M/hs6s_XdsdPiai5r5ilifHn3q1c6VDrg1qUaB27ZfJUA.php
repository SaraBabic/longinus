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

/* modules/contrib/cheeseburger_menu/templates/cheeseburger-menu.html.twig */
class __TwigTemplate_c3ff64184fd1c9c92a7e05d03a7f9bc3e0a3ae0406ce9af63c60f308114a9186 extends \Twig\Template
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
        $macros["cheesebuger"] = $this->macros["cheesebuger"] = $this;
        // line 2
        if (($context["show_navigation"] ?? null)) {
            // line 3
            echo "\t<div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["side_navigation_menu_attribute"] ?? null), 3, $this->source), "html", null, true);
            echo ">
\t\t<div";
            // line 4
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["side_navigation_trigger_attribute"] ?? null), 4, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["close_icon"] ?? null), 4, $this->source));
            echo "</div>

\t\t";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["tree"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
                // line 7
                echo "      ";
                if ( !twig_get_attribute($this->env, $this->source, $context["menu"], "isNavigationTitleHidden", [], "any", false, false, true, 7)) {
                    // line 8
                    echo "        <div ";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["menu"], "getIdAsAttribute", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
                    echo " ";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["menu"], "navigationItemAttribute", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
                    echo ">
          ";
                    // line 9
                    if (twig_get_attribute($this->env, $this->source, $context["menu"], "hasIcon", [], "any", false, false, true, 9)) {
                        // line 10
                        echo "            ";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["menu"], "icon", [], "any", false, false, true, 10), 10, $this->source));
                        echo "
          ";
                    }
                    // line 12
                    echo "          <span>";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["menu"], "title", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
                    echo "</span>
        </div>
      ";
                }
                // line 15
                echo "\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["menu"], "getNavigationMenuItems", [], "method", false, false, true, 15));
                foreach ($context['_seq'] as $context["_key"] => $context["menu_item"]) {
                    // line 16
                    echo "\t\t\t\t<div ";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["menu"], "navigationItemAttribute", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
                    echo ">
\t\t\t\t\t<a href=\"";
                    // line 17
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["menu_item"], "url", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
                    echo "\">
\t\t\t\t\t\t<span>";
                    // line 18
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["menu_item"], "title", [], "any", false, false, true, 18), 18, $this->source), "html", null, true);
                    echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu_item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 22
                echo "\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            echo "\t</div>
";
        }
        // line 25
        echo "
";
        // line 27
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["main_navigation_attribute"] ?? null), 27, $this->source), "html", null, true);
        echo ">
\t";
        // line 28
        if ((($context["show_navigation"] ?? null) == false)) {
            // line 29
            echo "\t\t<div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["side_navigation_trigger_attribute"] ?? null), 29, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["close_icon"] ?? null), 29, $this->source));
            echo "</div>
\t";
        }
        // line 31
        echo "\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tree"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
            // line 32
            echo "\t\t<div ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["menu"], "getIdAsAttribute", [], "any", false, false, true, 32), 32, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["menu"], "wrapperAttribute", [], "any", false, false, true, 32), 32, $this->source), "html", null, true);
            echo ">
\t\t\t";
            // line 33
            if ( !twig_get_attribute($this->env, $this->source, $context["menu"], "isTitleHidden", [], "any", false, false, true, 33)) {
                // line 34
                echo "\t\t\t\t<div ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["menu"], "titleAttribute", [], "any", false, false, true, 34), 34, $this->source), "html", null, true);
                echo ">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["menu"], "title", [], "any", false, false, true, 34), 34, $this->source), "html", null, true);
                echo "</div>
\t\t\t";
            }
            // line 36
            echo "\t\t\t<ul
\t\t\t\tclass=\"cheeseburger-menu__mainmenu\">
\t\t\t\t";
            // line 39
            echo "\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["menu"]);
            foreach ($context['_seq'] as $context["_key"] => $context["menu_item"]) {
                // line 40
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_call_macro($macros["cheesebuger"], "macro_render_menu_item", [$context["menu_item"], ($context["trigger_icon"] ?? null)], 40, $context, $this->getSourceContext()));
                echo "
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu_item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "\t\t\t</ul>
\t\t</div>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "</div>

";
    }

    // line 47
    public function macro_render_menu_item($__menu_item__ = null, $__trigger_icon__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "menu_item" => $__menu_item__,
            "trigger_icon" => $__trigger_icon__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 48
            echo "\t";
            $macros["render_menu_item"] = $this;
            // line 49
            echo "\t<li ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["menu_item"] ?? null), "attribute", [], "any", false, false, true, 49), 49, $this->source), "html", null, true);
            echo ">
\t\t";
            // line 50
            if (twig_get_attribute($this->env, $this->source, ($context["menu_item"] ?? null), "isLink", [], "method", false, false, true, 50)) {
                // line 51
                echo "\t\t\t<a";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["menu_item"] ?? null), "labelAttribute", [], "any", false, false, true, 51), 51, $this->source), "html", null, true);
                echo " href=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["menu_item"] ?? null), "url", [], "any", false, false, true, 51), 51, $this->source), "html", null, true);
                echo "\">
\t\t\t\t<span>";
                // line 52
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["menu_item"] ?? null), "title", [], "any", false, false, true, 52), 52, $this->source), "html", null, true);
                echo "</span>
\t\t\t</a>
\t\t";
            } else {
                // line 55
                echo "\t\t\t";
                if (twig_get_attribute($this->env, $this->source, ($context["menu_item"] ?? null), "hasChild", [], "any", false, false, true, 55)) {
                    // line 56
                    echo "\t\t\t\t<span";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["menu_item"] ?? null), "labelAttribute", [], "any", false, false, true, 56), 56, $this->source), "html", null, true);
                    echo " data-cheeseburger-parent-trigger>
\t\t\t\t\t<span>";
                    // line 57
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["menu_item"] ?? null), "title", [], "any", false, false, true, 57), 57, $this->source), "html", null, true);
                    echo "</span>
\t\t\t\t</span>
\t\t\t";
                } else {
                    // line 60
                    echo "\t\t\t\t<span";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["menu_item"] ?? null), "labelAttribute", [], "any", false, false, true, 60), 60, $this->source), "html", null, true);
                    echo ">
\t\t\t\t\t<span>";
                    // line 61
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["menu_item"] ?? null), "title", [], "any", false, false, true, 61), 61, $this->source), "html", null, true);
                    echo "</span>
\t\t\t\t</span>
\t\t\t";
                }
                // line 64
                echo "\t\t";
            }
            // line 65
            echo "
\t\t";
            // line 66
            if (twig_get_attribute($this->env, $this->source, ($context["menu_item"] ?? null), "hasChild", [], "any", false, false, true, 66)) {
                // line 67
                echo "\t\t\t<span";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["menu_item"] ?? null), "triggerAttribute", [], "any", false, false, true, 67), 67, $this->source), "html", null, true);
                echo " data-cheeseburger-parent-trigger>";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["trigger_icon"] ?? null), 67, $this->source));
                echo "</span>
\t\t\t<ul class=\"cheeseburger-menu__submenu\">
\t\t\t\t";
                // line 69
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu_item"] ?? null), "children", [], "any", false, false, true, 69));
                foreach ($context['_seq'] as $context["_key"] => $context["child_menu_item"]) {
                    // line 70
                    echo "\t\t\t\t\t";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_call_macro($macros["render_menu_item"], "macro_render_menu_item", [$context["child_menu_item"], ($context["trigger_icon"] ?? null)], 70, $context, $this->getSourceContext()));
                    echo "
\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child_menu_item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 72
                echo "\t\t\t</ul>
\t\t";
            }
            // line 74
            echo "\t</li>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "modules/contrib/cheeseburger_menu/templates/cheeseburger-menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  285 => 74,  281 => 72,  272 => 70,  268 => 69,  260 => 67,  258 => 66,  255 => 65,  252 => 64,  246 => 61,  241 => 60,  235 => 57,  230 => 56,  227 => 55,  221 => 52,  214 => 51,  212 => 50,  207 => 49,  204 => 48,  190 => 47,  184 => 45,  176 => 42,  167 => 40,  162 => 39,  158 => 36,  150 => 34,  148 => 33,  141 => 32,  136 => 31,  128 => 29,  126 => 28,  121 => 27,  118 => 25,  114 => 23,  108 => 22,  98 => 18,  94 => 17,  89 => 16,  84 => 15,  77 => 12,  71 => 10,  69 => 9,  62 => 8,  59 => 7,  55 => 6,  48 => 4,  43 => 3,  41 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import _self as cheesebuger %}
{% if show_navigation %}
\t<div{{side_navigation_menu_attribute}}>
\t\t<div{{side_navigation_trigger_attribute}}>{{ close_icon|raw }}</div>

\t\t{% for menu in tree %}
      {% if not menu.isNavigationTitleHidden %}
        <div {{ menu.getIdAsAttribute }} {{ menu.navigationItemAttribute }}>
          {% if menu.hasIcon %}
            {{ menu.icon|raw }}
          {% endif %}
          <span>{{ menu.title }}</span>
        </div>
      {% endif %}
\t\t\t{% for menu_item in menu.getNavigationMenuItems() %}
\t\t\t\t<div {{ menu.navigationItemAttribute }}>
\t\t\t\t\t<a href=\"{{ menu_item.url }}\">
\t\t\t\t\t\t<span>{{ menu_item.title }}</span>
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t{% endfor %}
\t\t{% endfor %}
\t</div>
{% endif %}

{# Each menu #}
<div{{main_navigation_attribute}}>
\t{% if show_navigation == FALSE %}
\t\t<div{{side_navigation_trigger_attribute}}>{{ close_icon|raw }}</div>
\t{% endif %}
\t{% for menu in tree %}
\t\t<div {{ menu.getIdAsAttribute }} {{ menu.wrapperAttribute }}>
\t\t\t{% if not menu.isTitleHidden %}
\t\t\t\t<div {{ menu.titleAttribute }}>{{ menu.title }}</div>
\t\t\t{% endif %}
\t\t\t<ul
\t\t\t\tclass=\"cheeseburger-menu__mainmenu\">
\t\t\t\t{# Each menu item #}
\t\t\t\t{% for menu_item in menu %}
\t\t\t\t\t{{ cheesebuger.render_menu_item(menu_item, trigger_icon) }}
\t\t\t\t{% endfor %}
\t\t\t</ul>
\t\t</div>
\t{% endfor %}
</div>

{% macro render_menu_item(menu_item, trigger_icon) %}
\t{% import _self as render_menu_item %}
\t<li {{ menu_item.attribute }}>
\t\t{% if menu_item.isLink() %}
\t\t\t<a{{menu_item.labelAttribute}} href=\"{{ menu_item.url }}\">
\t\t\t\t<span>{{ menu_item.title }}</span>
\t\t\t</a>
\t\t{% else %}
\t\t\t{% if menu_item.hasChild %}
\t\t\t\t<span{{menu_item.labelAttribute}} data-cheeseburger-parent-trigger>
\t\t\t\t\t<span>{{ menu_item.title }}</span>
\t\t\t\t</span>
\t\t\t{% else %}
\t\t\t\t<span{{menu_item.labelAttribute}}>
\t\t\t\t\t<span>{{ menu_item.title }}</span>
\t\t\t\t</span>
\t\t\t{% endif %}
\t\t{% endif %}

\t\t{% if menu_item.hasChild %}
\t\t\t<span{{menu_item.triggerAttribute}} data-cheeseburger-parent-trigger>{{ trigger_icon|raw }}</span>
\t\t\t<ul class=\"cheeseburger-menu__submenu\">
\t\t\t\t{% for child_menu_item in menu_item.children %}
\t\t\t\t\t{{ render_menu_item.render_menu_item(child_menu_item, trigger_icon) }}
\t\t\t\t{% endfor %}
\t\t\t</ul>
\t\t{% endif %}
\t</li>
{% endmacro %}
", "modules/contrib/cheeseburger_menu/templates/cheeseburger-menu.html.twig", "/var/www/html/web/modules/contrib/cheeseburger_menu/templates/cheeseburger-menu.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("import" => 1, "if" => 2, "for" => 6, "macro" => 47);
        static $filters = array("escape" => 3, "raw" => 4);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['import', 'if', 'for', 'macro'],
                ['escape', 'raw'],
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
