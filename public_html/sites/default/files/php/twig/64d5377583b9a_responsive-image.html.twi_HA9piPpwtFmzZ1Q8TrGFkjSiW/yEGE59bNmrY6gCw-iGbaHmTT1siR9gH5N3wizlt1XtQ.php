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

/* core/themes/stable9/templates/field/responsive-image.html.twig */
class __TwigTemplate_7ec849d18059ef67098b0d35bb782114cd078e87f0d66a05b98a50b47d1aa870 extends \Twig\Template
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
        // line 16
        if (($context["output_image_tag"] ?? null)) {
            // line 17
            echo "  ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["img_element"] ?? null), 17, $this->source), "html", null, true);
            echo "
";
        } else {
            // line 19
            echo "  <picture>
    ";
            // line 20
            if (($context["sources"] ?? null)) {
                // line 21
                echo "      ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["sources"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["source_attributes"]) {
                    // line 22
                    echo "        <source";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["source_attributes"], 22, $this->source), "html", null, true);
                    echo "/>
      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['source_attributes'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 24
                echo "    ";
            }
            // line 25
            echo "    ";
            // line 26
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["img_element"] ?? null), 26, $this->source), "html", null, true);
            echo "
  </picture>
";
        }
    }

    public function getTemplateName()
    {
        return "core/themes/stable9/templates/field/responsive-image.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 26,  69 => 25,  66 => 24,  57 => 22,  52 => 21,  50 => 20,  47 => 19,  41 => 17,  39 => 16,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override of a responsive image.
 *
 * Available variables:
 * - sources: The attributes of the <source> tags for this <picture> tag.
 * - img_element: The controlling image, with the fallback image in srcset.
 * - output_image_tag: Whether or not to output an <img> tag instead of a
 *   <picture> tag.
 *
 * @see template_preprocess()
 * @see template_preprocess_responsive_image()
 */
#}
{% if output_image_tag %}
  {{ img_element }}
{% else %}
  <picture>
    {% if sources %}
      {% for source_attributes in sources %}
        <source{{ source_attributes }}/>
      {% endfor %}
    {% endif %}
    {# The controlling image, with the fallback image in srcset. #}
    {{ img_element }}
  </picture>
{% endif %}
", "core/themes/stable9/templates/field/responsive-image.html.twig", "/var/www/html/web/core/themes/stable9/templates/field/responsive-image.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 16, "for" => 21);
        static $filters = array("escape" => 17);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
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
