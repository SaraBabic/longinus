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

/* core/modules/system/templates/select.html.twig */
class __TwigTemplate_4a9a1ab978cabf281e2f168c6343d9610c76d34a38ee02c481173362827be341 extends \Twig\Template
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
        // line 15
        ob_start();
        // line 16
        echo "  <select";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 16, $this->source), "html", null, true);
        echo ">
    ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["options"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 18
            echo "      ";
            if ((twig_get_attribute($this->env, $this->source, $context["option"], "type", [], "any", false, false, true, 18) == "optgroup")) {
                // line 19
                echo "        <optgroup label=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["option"], "label", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
                echo "\">
          ";
                // line 20
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["option"], "options", [], "any", false, false, true, 20));
                foreach ($context['_seq'] as $context["_key"] => $context["sub_option"]) {
                    // line 21
                    echo "            <option value=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["sub_option"], "value", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
                    echo "\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((twig_get_attribute($this->env, $this->source, $context["sub_option"], "selected", [], "any", false, false, true, 21)) ? (" selected=\"selected\"") : ("")));
                    echo ">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["sub_option"], "label", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
                    echo "</option>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_option'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 23
                echo "        </optgroup>
      ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 24
$context["option"], "type", [], "any", false, false, true, 24) == "option")) {
                // line 25
                echo "        <option value=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["option"], "value", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
                echo "\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((twig_get_attribute($this->env, $this->source, $context["option"], "selected", [], "any", false, false, true, 25)) ? (" selected=\"selected\"") : ("")));
                echo ">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["option"], "label", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
                echo "</option>
      ";
            }
            // line 27
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "  </select>
";
        $___internal_parse_0_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 15
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_spaceless($___internal_parse_0_));
    }

    public function getTemplateName()
    {
        return "core/modules/system/templates/select.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 15,  96 => 28,  90 => 27,  80 => 25,  78 => 24,  75 => 23,  62 => 21,  58 => 20,  53 => 19,  50 => 18,  46 => 17,  41 => 16,  39 => 15,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation for a select element.
 *
 * Available variables:
 * - attributes: HTML attributes for the <select> tag.
 * - options: The <option> element children.
 *
 * @see template_preprocess_select()
 *
 * @ingroup themeable
 */
#}
{% apply spaceless %}
  <select{{ attributes }}>
    {% for option in options %}
      {% if option.type == 'optgroup' %}
        <optgroup label=\"{{ option.label }}\">
          {% for sub_option in option.options %}
            <option value=\"{{ sub_option.value }}\"{{ sub_option.selected ? ' selected=\"selected\"' }}>{{ sub_option.label }}</option>
          {% endfor %}
        </optgroup>
      {% elseif option.type == 'option' %}
        <option value=\"{{ option.value }}\"{{ option.selected ? ' selected=\"selected\"' }}>{{ option.label }}</option>
      {% endif %}
    {% endfor %}
  </select>
{% endapply %}
", "core/modules/system/templates/select.html.twig", "/var/www/html/web/core/modules/system/templates/select.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("apply" => 15, "for" => 17, "if" => 18);
        static $filters = array("escape" => 16, "spaceless" => 15);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['apply', 'for', 'if'],
                ['escape', 'spaceless'],
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
