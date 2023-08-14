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

/* themes/custom/longinus/templates/paragraphs/paragraph.html.twig */
class __TwigTemplate_6e14d4b5eaa343f2558b36892a689134d47f416e1218947ad553948652aa2cef extends \Twig\Template
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
        $context["longinus_block"] = ((($context["longinus_block"] ?? null)) ? (($context["longinus_block"] ?? null)) : (\Drupal\Component\Utility\Html::getClass((("paragraph-" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 1), 1, $this->source)) . (((($context["view_mode"] ?? null) != "default")) ? (("-" . $this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null), 1, $this->source))) : (""))))));
        // line 2
        echo "
";
        // line 4
        $context["classes"] = [0 => "paragraph", 1 =>         // line 6
($context["longinus_block"] ?? null)];
        // line 9
        echo "
";
        // line 11
        echo "
<div";
        // line 12
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 12), 12, $this->source), "html", null, true);
        echo "
    data-paragraph-id=\"";
        // line 13
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "id", [], "method", false, false, true, 13), 13, $this->source), "html", null, true);
        echo "\"
    ";
        // line 14
        if (twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_overlay", [], "any", false, false, true, 14))))) {
            echo " data-paragraph-overlay=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_lower_filter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_overlay", [], "any", false, false, true, 14), 14, $this->source))))), "html", null, true);
            echo "\" ";
        }
        // line 15
        echo "    ";
        if (twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_invert", [], "any", false, false, true, 15))))) {
            echo " data-paragraph-invert=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_lower_filter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_invert", [], "any", false, false, true, 15), 15, $this->source))))), "html", null, true);
            echo "\" ";
        }
        // line 16
        echo "    ";
        if (twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_text_alignment", [], "any", false, false, true, 16))))) {
            echo " data-paragraph-text-alignment=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_lower_filter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_text_alignment", [], "any", false, false, true, 16), 16, $this->source))))), "html", null, true);
            echo "\" ";
        }
        // line 17
        echo "    ";
        if (twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_link_type", [], "any", false, false, true, 17))))) {
            echo " data-paragraph-link-type=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_lower_filter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_link_type", [], "any", false, false, true, 17), 17, $this->source))))), "html", null, true);
            echo "\" ";
        }
        // line 18
        echo "    ";
        if (twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_narrow", [], "any", false, false, true, 18))))) {
            echo " data-paragraph-narrow=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_lower_filter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_narrow", [], "any", false, false, true, 18), 18, $this->source))))), "html", null, true);
            echo "\" ";
        }
        // line 19
        echo "    ";
        if (twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_image_position", [], "any", false, false, true, 19))))) {
            echo " data-paragraph-image-position=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_lower_filter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_image_position", [], "any", false, false, true, 19), 19, $this->source))))), "html", null, true);
            echo "\" ";
        }
        // line 20
        echo "    ";
        if (twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_fluid", [], "any", false, false, true, 20))))) {
            echo " data-paragraph-fluid=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_lower_filter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_fluid", [], "any", false, false, true, 20), 20, $this->source))))), "html", null, true);
            echo "\" ";
        }
        // line 21
        echo "    ";
        if (twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_fit", [], "any", false, false, true, 21))))) {
            echo " data-paragraph-fit=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_lower_filter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_fit", [], "any", false, false, true, 21), 21, $this->source))))), "html", null, true);
            echo "\" ";
        }
        // line 22
        echo "
    ";
        // line 23
        if ((twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_background_color", [], "any", false, false, true, 23)))) || twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_background_gradient", [], "any", false, false, true, 23)))))) {
            // line 24
            echo "      style=
        \"
          ";
            // line 26
            if (twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_background_color", [], "any", false, false, true, 26))))) {
                echo " background-color: ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_background_color", [], "any", false, false, true, 26), 26, $this->source)))), "html", null, true);
                echo "; ";
            }
            // line 27
            echo "          ";
            if (twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_background_gradient", [], "any", false, false, true, 27))))) {
                // line 28
                echo "            background: linear-gradient(90deg,
                ";
                // line 29
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, (($__internal_compile_0 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_1 = (($__internal_compile_2 = twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_background_gradient", [], "any", false, false, true, 29)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[0] ?? null) : null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["#taxonomy_term"] ?? null) : null), "field_left_color", [], "any", false, false, true, 29), "getValue", [0 => "field_left_color"], "method", false, false, true, 29)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null), "color", [], "any", false, false, true, 29), 29, $this->source), "html", null, true);
                echo " 0%,
                ";
                // line 30
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, (($__internal_compile_3 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_4 = (($__internal_compile_5 = twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_background_gradient", [], "any", false, false, true, 30)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5[0] ?? null) : null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["#taxonomy_term"] ?? null) : null), "field_right_color", [], "any", false, false, true, 30), "getValue", [0 => "field_right_color"], "method", false, false, true, 30)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[0] ?? null) : null), "color", [], "any", false, false, true, 30), 30, $this->source), "html", null, true);
                echo " 100%
            ); ";
            }
            // line 32
            echo "          ";
            if ((twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_background_image", [], "any", false, false, true, 32)))) && (twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 32) != "text_and_image"))) {
                echo " background-image: ";
                if (twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_overlay", [], "any", false, false, true, 32))))) {
                    echo "linear-gradient(to bottom, rgba(";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_overlay", [], "any", false, false, true, 32), 32, $this->source)))), "html", null, true);
                    echo ", 0.4) 0%, rgba(";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_overlay", [], "any", false, false, true, 32), 32, $this->source)))), "html", null, true);
                    echo ", 0.4) 100%), ";
                }
                echo " url(";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_background_image", [], "any", false, false, true, 32), 32, $this->source)))), "html", null, true);
                echo "); ";
            }
            // line 33
            echo "        \"
    ";
        }
        // line 35
        echo "  >
  ";
        // line 36
        if (twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_margin", [], "any", false, false, true, 36))))) {
            // line 37
            echo "    <style>
      [data-paragraph-id=\"";
            // line 38
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "id", [], "method", false, false, true, 38), 38, $this->source), "html", null, true);
            echo "\"] { margin: calc(";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_margin", [], "any", false, false, true, 38), 38, $this->source)))), "html", null, true);
            echo " / 2) auto !important; }
      @media (min-width: 1024px) { [data-paragraph-id=\"";
            // line 39
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "id", [], "method", false, false, true, 39), 39, $this->source), "html", null, true);
            echo "\"] { margin: ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_margin", [], "any", false, false, true, 39), 39, $this->source)))), "html", null, true);
            echo " auto !important; }}
    </style>
  ";
        }
        // line 42
        echo "
  ";
        // line 43
        if (twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_height", [], "any", false, false, true, 43))))) {
            // line 44
            echo "    <style>
      @media (min-width: 1024px) { [data-paragraph-id=\"";
            // line 45
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "id", [], "method", false, false, true, 45), 45, $this->source), "html", null, true);
            echo "\"] { height: ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_height", [], "any", false, false, true, 45), 45, $this->source)))), "html", null, true);
            echo "; }}
    </style>
  ";
        }
        // line 48
        echo "
";
        // line 50
        echo "
\t<div class=\"";
        // line 51
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 51, $this->source) . "__container"), "html", null, true);
        echo "\">
\t\t";
        // line 52
        $this->displayBlock('content', $context, $blocks);
        // line 284
        echo "\t</div>
</div>
";
    }

    // line 52
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 53
        echo "      ";
        // line 54
        echo "      ";
        if ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 54) == "banner")) {
            // line 55
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_background_image", [], "any", false, false, true, 55), 55, $this->source), "html", null, true);
            echo "
         <div class=\"";
            // line 56
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 56, $this->source), "html", null, true);
            echo "__text\">
           <div class=\"";
            // line 57
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 57, $this->source), "html", null, true);
            echo "__text-wrap\">
            ";
            // line 58
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 58), 58, $this->source), "html", null, true);
            echo "
            ";
            // line 59
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_body", [], "any", false, false, true, 59), 59, $this->source), "html", null, true);
            echo "
            ";
            // line 60
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_links_multiple", [], "any", false, false, true, 60), 60, $this->source), "html", null, true);
            echo "
          </div>
         </div>
         ";
            // line 64
            echo "         ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 64) == "image")) {
            // line 65
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_background_image", [], "any", false, false, true, 65), 65, $this->source), "html", null, true);
            echo "
         <div class=\"";
            // line 66
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 66, $this->source), "html", null, true);
            echo "__text\">
           <div class=\"";
            // line 67
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 67, $this->source), "html", null, true);
            echo "__text-wrap\">
            ";
            // line 68
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 68), 68, $this->source), "html", null, true);
            echo "
            ";
            // line 69
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_body", [], "any", false, false, true, 69), 69, $this->source), "html", null, true);
            echo "
            ";
            // line 70
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_links_multiple", [], "any", false, false, true, 70), 70, $this->source), "html", null, true);
            echo "
          </div>
         </div>
      ";
            // line 74
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 74) == "row")) {
            // line 75
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 75), 75, $this->source), "html", null, true);
            echo "
        ";
            // line 76
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_cards", [], "any", false, false, true, 76), 76, $this->source), "html", null, true);
            echo "
      ";
            // line 78
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 78) == "image")) {
            // line 79
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 79), 79, $this->source), "html", null, true);
            echo "
        ";
            // line 80
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_background_image", [], "any", false, false, true, 80), 80, $this->source), "html", null, true);
            echo "
      ";
            // line 82
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 82) == "gallery")) {
            // line 83
            echo "        ";
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_gallery", [], "any", false, false, true, 83)) {
                // line 84
                echo "        <div id=\"lightGallery\" data-light-gallery>
          ";
                // line 85
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((($__internal_compile_6 = twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_gallery", [], "any", false, false, true, 85)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6["#items"] ?? null) : null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 86
                    echo "            ";
                    $context["image_uri"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "entity", [], "any", false, false, true, 86), "uri", [], "any", false, false, true, 86), "value", [], "any", false, false, true, 86), 86, $this->source));
                    // line 87
                    echo "            <div class=\"image-item\" data-src=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["image_uri"] ?? null), 87, $this->source), "html", null, true);
                    echo "\" >
              <a href=\"\">
                <img src=\"";
                    // line 89
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["image_uri"] ?? null), 89, $this->source), "html", null, true);
                    echo "\" />
              </a>
            </div>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 93
                echo "        </div>
        ";
            }
            // line 95
            echo "      ";
            // line 96
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 96) == "shortcuts")) {
            // line 97
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 97), 97, $this->source), "html", null, true);
            echo "
        <div class=\"";
            // line 98
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 98, $this->source), "html", null, true);
            echo "__content\">
          ";
            // line 99
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_paragraphs", [], "any", false, false, true, 99), 99, $this->source), "html", null, true);
            echo "
          <div>
            ";
            // line 101
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_background_image", [], "any", false, false, true, 101), 101, $this->source), "html", null, true);
            echo "
            ";
            // line 102
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_body", [], "any", false, false, true, 102), 102, $this->source), "html", null, true);
            echo "
          </div>
        </div>
      ";
            // line 106
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 106) == "shortcut")) {
            // line 107
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_icon_svg", [], "any", false, false, true, 107), 107, $this->source), "html", null, true);
            echo "
        ";
            // line 108
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, false, true, 108), 108, $this->source), "html", null, true);
            echo "
      ";
            // line 110
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 110) == "steps")) {
            // line 111
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 111), 111, $this->source), "html", null, true);
            echo "
        ";
            // line 112
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_paragraphs", [], "any", false, false, true, 112), 112, $this->source), "html", null, true);
            echo "
      ";
            // line 114
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 114) == "step")) {
            // line 115
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_icon_svg", [], "any", false, false, true, 115), 115, $this->source), "html", null, true);
            echo "
        ";
            // line 116
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 116), 116, $this->source), "html", null, true);
            echo "
        ";
            // line 117
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_body", [], "any", false, false, true, 117), 117, $this->source), "html", null, true);
            echo "
      ";
            // line 119
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 119) == "carousel")) {
            // line 120
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 120), 120, $this->source), "html", null, true);
            echo "
        ";
            // line 121
            if ((twig_length_filter($this->env, (($__internal_compile_7 = twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_cards", [], "any", false, false, true, 121)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7["#items"] ?? null) : null)) > 2)) {
                // line 122
                echo "          <div class=\"paragraph-carousel paragraph-carousel-";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "id", [], "method", false, false, true, 122), 122, $this->source), "html", null, true);
                echo " paragraph-carousel--";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_lower_filter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_carousel_type", [], "any", false, false, true, 122), 122, $this->source))))), "html", null, true);
                echo "\">
            <div class=\"swiper-container\">
              <div class=\"swiper-wrapper\">
                ";
                // line 125
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((($__internal_compile_8 = twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_cards", [], "any", false, false, true, 125)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8["#items"] ?? null) : null));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["items"]) {
                    // line 126
                    echo "                  <div class=\"swiper-slide\">
                    ";
                    // line 127
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_9 = twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_cards", [], "any", false, false, true, 127)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9[(twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 127) - 1)] ?? null) : null), 127, $this->source), "html", null, true);
                    echo "
                  </div>
                ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['items'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 130
                echo "              </div>

            </div>
             <!-- Add navigation -->
              <div class=\"paragraph-carousel-";
                // line 134
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "id", [], "method", false, false, true, 134), 134, $this->source), "html", null, true);
                echo "-swiper-button swiper-button-prev\"></div>
              <div class=\"paragraph-carousel-";
                // line 135
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "id", [], "method", false, false, true, 135), 135, $this->source), "html", null, true);
                echo "-swiper-button swiper-button-next\"></div>
          </div>
        ";
            }
            // line 138
            echo "      ";
            // line 139
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 139) == "card_with_icons")) {
            // line 140
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_icon_svg", [], "any", false, false, true, 140), 140, $this->source), "html", null, true);
            echo "
        <div class=\"";
            // line 141
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 141, $this->source), "html", null, true);
            echo "__text\">
          ";
            // line 142
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 142), 142, $this->source), "html", null, true);
            echo "
          ";
            // line 143
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_body", [], "any", false, false, true, 143), 143, $this->source), "html", null, true);
            echo "
          ";
            // line 144
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, false, true, 144), 144, $this->source), "html", null, true);
            echo "
        </div>
      ";
            // line 147
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 147) == "card")) {
            // line 148
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_background_image", [], "any", false, false, true, 148), 148, $this->source), "html", null, true);
            echo "
        <div class=\"";
            // line 149
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 149, $this->source), "html", null, true);
            echo "__text\">
          ";
            // line 150
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 150), 150, $this->source), "html", null, true);
            echo "
          ";
            // line 151
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_body", [], "any", false, false, true, 151), 151, $this->source), "html", null, true);
            echo "
          ";
            // line 152
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, false, true, 152), 152, $this->source), "html", null, true);
            echo "
        </div>
      ";
            // line 155
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 155) == "projects")) {
            // line 156
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 156)) {
                // line 157
                echo "        ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 157), 157, $this->source), "html", null, true);
                echo "
      ";
            }
            // line 159
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_project", [], "any", false, false, true, 159)) {
                // line 160
                echo "        ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_project", [], "any", false, false, true, 160), 160, $this->source), "html", null, true);
                echo "
      ";
            }
            // line 162
            echo "      ";
            // line 163
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 163) == "project")) {
            // line 164
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_lead_image", [], "any", false, false, true, 164)) {
                // line 165
                echo "        ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_lead_image", [], "any", false, false, true, 165), 165, $this->source), "html", null, true);
                echo "
      ";
            }
            // line 167
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 167)) {
                // line 168
                echo "        ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 168), 168, $this->source), "html", null, true);
                echo "
      ";
            }
            // line 170
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_body", [], "any", false, false, true, 170)) {
                // line 171
                echo "        ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_body", [], "any", false, false, true, 171), 171, $this->source), "html", null, true);
                echo "
      ";
            }
            // line 173
            echo "      ";
            // line 174
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 174) == "room")) {
            // line 175
            echo "          ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_room_type", [], "any", false, false, true, 175), 175, $this->source), "html", null, true);
            echo "
          ";
            // line 176
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_number_of_rooms", [], "any", false, false, true, 176), 176, $this->source), "html", null, true);
            echo "
      ";
            // line 178
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 178) == "rooms")) {
            // line 179
            echo "          ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_room", [], "any", false, false, true, 179), 179, $this->source), "html", null, true);
            echo "
      ";
            // line 181
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 181) == "form")) {
            // line 182
            echo "        <div class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 182, $this->source), "html", null, true);
            echo "__text\" ";
            if (twig_lower_filter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_anchor", [], "any", false, false, true, 182)))))) {
                echo " id=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_lower_filter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_anchor", [], "any", false, false, true, 182), 182, $this->source))))), "html", null, true);
                echo "\" ";
            }
            echo ">
          ";
            // line 183
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 183), 183, $this->source), "html", null, true);
            echo "
          ";
            // line 184
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_form", [], "any", false, false, true, 184), 184, $this->source), "html", null, true);
            echo "
        </div>
      ";
            // line 187
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 187) == "text_and_image")) {
            // line 188
            echo "        
          ";
            // line 189
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_background_image", [], "any", false, false, true, 189), 189, $this->source), "html", null, true);
            echo "
        
        <div class=\"";
            // line 191
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 191, $this->source), "html", null, true);
            echo "__text\">
          <div class=\"";
            // line 192
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 192, $this->source), "html", null, true);
            echo "__text-wrapper\">
            ";
            // line 193
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 193), 193, $this->source), "html", null, true);
            echo "
            ";
            // line 194
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_body", [], "any", false, false, true, 194), 194, $this->source), "html", null, true);
            echo "
            ";
            // line 195
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, false, true, 195), 195, $this->source), "html", null, true);
            echo "
          </div>
        </div>
      ";
            // line 199
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 199) == "call_to_action")) {
            // line 200
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_subtitle", [], "any", false, false, true, 200), 200, $this->source), "html", null, true);
            echo "
        ";
            // line 201
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 201), 201, $this->source), "html", null, true);
            echo "
        ";
            // line 202
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_body", [], "any", false, false, true, 202), 202, $this->source), "html", null, true);
            echo "
        ";
            // line 203
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, false, true, 203), 203, $this->source), "html", null, true);
            echo "
      ";
            // line 205
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 205) == "text")) {
            // line 206
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_body", [], "any", false, false, true, 206), 206, $this->source), "html", null, true);
            echo "
      ";
            // line 208
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 208) == "video")) {
            // line 209
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 209), 209, $this->source), "html", null, true);
            echo "
        ";
            // line 210
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_video", [], "any", false, false, true, 210), 210, $this->source), "html", null, true);
            echo "
      ";
            // line 212
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 212) == "map_image")) {
            // line 213
            echo "        ";
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 213)) {
                // line 214
                echo "          ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 214), 214, $this->source), "html", null, true);
                echo "
        ";
            }
            // line 216
            echo "        ";
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_map_description", [], "any", false, false, true, 216)) {
                // line 217
                echo "          ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_map_description", [], "any", false, false, true, 217), 217, $this->source), "html", null, true);
                echo "
        ";
            }
            // line 219
            echo "        <a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_map_location", [], "any", false, false, true, 219), 219, $this->source)))), "html", null, true);
            echo "\" target=\"_blank\">
          ";
            // line 220
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_icon_svg", [], "any", false, false, true, 220)) {
                // line 221
                echo "            ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_icon_svg", [], "any", false, false, true, 221), 221, $this->source), "html", null, true);
                echo "
          ";
            }
            // line 223
            echo "        </a>
        ";
            // line 224
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_image", [], "any", false, false, true, 224), 224, $this->source), "html", null, true);
            echo "
      ";
            // line 226
            echo "        ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 226) == "partners")) {
            // line 227
            echo "        ";
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 227)) {
                // line 228
                echo "          ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 228), 228, $this->source), "html", null, true);
                echo "
        ";
            }
            // line 230
            echo "        ";
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_partner", [], "any", false, false, true, 230)) {
                // line 231
                echo "          ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_partner", [], "any", false, false, true, 231), 231, $this->source), "html", null, true);
                echo "
        ";
            }
            // line 233
            echo "      ";
            // line 234
            echo "        ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 234) == "partner")) {
            // line 235
            echo "        <a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_lower_filter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, false, true, 235), 235, $this->source))))), "html", null, true);
            echo "\" target=\"_blank\">
          ";
            // line 236
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_icon_svg", [], "any", false, false, true, 236), 236, $this->source), "html", null, true);
            echo "
        </a>
      ";
            // line 239
            echo "        ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 239) == "paragraphs")) {
            // line 240
            echo "        ";
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_paragraph", [], "any", false, false, true, 240)) {
                // line 241
                echo "          ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_paragraph", [], "any", false, false, true, 241), 241, $this->source), "html", null, true);
                echo "
        ";
            }
            // line 243
            echo "      ";
            // line 244
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 244) == "accordion")) {
            // line 245
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 245, $this->source), "field_margin"), "html", null, true);
            echo "
      ";
            // line 247
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 247) == "quotes")) {
            // line 248
            echo "      <div class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 248, $this->source), "html", null, true);
            echo "__quote\">
        ";
            // line 249
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_body", [], "any", false, false, true, 249)) {
                // line 250
                echo "          ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_body", [], "any", false, false, true, 250), 250, $this->source), "html", null, true);
                echo "
        ";
            }
            // line 252
            echo "      </div>
      ";
            // line 254
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 254) == "accordion_parent")) {
            // line 255
            echo "      <dl class=\"accordion\">
        <dt class=\"";
            // line 256
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 256, $this->source), "html", null, true);
            echo "__accordion-title\">
          <a href=\"#";
            // line 257
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_lower_filter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_anchor", [], "any", false, false, true, 257), 257, $this->source))))), "html", null, true);
            echo "\">
            ";
            // line 258
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 258), 258, $this->source), "html", null, true);
            echo "
          </a>
        </dt>
        <dd class=\"";
            // line 261
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 261, $this->source), "html", null, true);
            echo "__accordion-body\">
          ";
            // line 262
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_body", [], "any", false, false, true, 262), 262, $this->source), "html", null, true);
            echo "
          ";
            // line 263
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_accordion_items", [], "any", false, false, true, 263), 263, $this->source), "html", null, true);
            echo "
        </dd>
      </dl>
      ";
            // line 267
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 267) == "accordion_child")) {
            // line 268
            echo "      <dl class=\"accordion\">
        <dt class=\"";
            // line 269
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 269, $this->source), "html", null, true);
            echo "__accordion-title\">
          <a href=\"#";
            // line 270
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_lower_filter($this->env, twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_anchor", [], "any", false, false, true, 270), 270, $this->source))))), "html", null, true);
            echo "\">
            ";
            // line 271
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 271), 271, $this->source), "html", null, true);
            echo "
          </a>
        </dt>
        <dd class=\"";
            // line 274
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["longinus_block"] ?? null), 274, $this->source), "html", null, true);
            echo "__accordion-body\">
          ";
            // line 275
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_body", [], "any", false, false, true, 275), 275, $this->source), "html", null, true);
            echo "
        </dd>
      </dl>
      ";
            // line 279
            echo "      ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 279) == "file")) {
            // line 280
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 280), 280, $this->source), "html", null, true);
            echo "
        ";
            // line 281
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_file", [], "any", false, false, true, 281), 281, $this->source), "html", null, true);
            echo "
      ";
        }
        // line 283
        echo "\t\t";
    }

    public function getTemplateName()
    {
        return "themes/custom/longinus/templates/paragraphs/paragraph.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  907 => 283,  902 => 281,  897 => 280,  894 => 279,  888 => 275,  884 => 274,  878 => 271,  874 => 270,  870 => 269,  867 => 268,  864 => 267,  858 => 263,  854 => 262,  850 => 261,  844 => 258,  840 => 257,  836 => 256,  833 => 255,  830 => 254,  827 => 252,  821 => 250,  819 => 249,  814 => 248,  811 => 247,  806 => 245,  803 => 244,  801 => 243,  795 => 241,  792 => 240,  789 => 239,  784 => 236,  779 => 235,  776 => 234,  774 => 233,  768 => 231,  765 => 230,  759 => 228,  756 => 227,  753 => 226,  749 => 224,  746 => 223,  740 => 221,  738 => 220,  733 => 219,  727 => 217,  724 => 216,  718 => 214,  715 => 213,  712 => 212,  708 => 210,  703 => 209,  700 => 208,  695 => 206,  692 => 205,  688 => 203,  684 => 202,  680 => 201,  675 => 200,  672 => 199,  666 => 195,  662 => 194,  658 => 193,  654 => 192,  650 => 191,  645 => 189,  642 => 188,  639 => 187,  634 => 184,  630 => 183,  619 => 182,  616 => 181,  611 => 179,  608 => 178,  604 => 176,  599 => 175,  596 => 174,  594 => 173,  588 => 171,  585 => 170,  579 => 168,  576 => 167,  570 => 165,  567 => 164,  564 => 163,  562 => 162,  556 => 160,  553 => 159,  547 => 157,  544 => 156,  541 => 155,  536 => 152,  532 => 151,  528 => 150,  524 => 149,  519 => 148,  516 => 147,  511 => 144,  507 => 143,  503 => 142,  499 => 141,  494 => 140,  491 => 139,  489 => 138,  483 => 135,  479 => 134,  473 => 130,  456 => 127,  453 => 126,  436 => 125,  427 => 122,  425 => 121,  420 => 120,  417 => 119,  413 => 117,  409 => 116,  404 => 115,  401 => 114,  397 => 112,  392 => 111,  389 => 110,  385 => 108,  380 => 107,  377 => 106,  371 => 102,  367 => 101,  362 => 99,  358 => 98,  353 => 97,  350 => 96,  348 => 95,  344 => 93,  334 => 89,  328 => 87,  325 => 86,  321 => 85,  318 => 84,  315 => 83,  312 => 82,  308 => 80,  303 => 79,  300 => 78,  296 => 76,  291 => 75,  288 => 74,  282 => 70,  278 => 69,  274 => 68,  270 => 67,  266 => 66,  261 => 65,  258 => 64,  252 => 60,  248 => 59,  244 => 58,  240 => 57,  236 => 56,  231 => 55,  228 => 54,  226 => 53,  222 => 52,  216 => 284,  214 => 52,  210 => 51,  207 => 50,  204 => 48,  196 => 45,  193 => 44,  191 => 43,  188 => 42,  180 => 39,  174 => 38,  171 => 37,  169 => 36,  166 => 35,  162 => 33,  147 => 32,  142 => 30,  138 => 29,  135 => 28,  132 => 27,  126 => 26,  122 => 24,  120 => 23,  117 => 22,  110 => 21,  103 => 20,  96 => 19,  89 => 18,  82 => 17,  75 => 16,  68 => 15,  62 => 14,  58 => 13,  54 => 12,  51 => 11,  48 => 9,  46 => 6,  45 => 4,  42 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set longinus_block = longinus_block ?: ('paragraph-' ~ paragraph.bundle ~ (view_mode != 'default' ? '-' ~ view_mode))|clean_class %}

{%
  set classes = [
    'paragraph',
    longinus_block
  ]
%}

{# {% set fluid = '{{ content.field_fluid|render|striptags|trim }}' %} #}

<div{{attributes.addClass(classes)}}
    data-paragraph-id=\"{{ paragraph.id() }}\"
    {% if content.field_overlay|render|striptags|trim %} data-paragraph-overlay=\"{{content.field_overlay|render|striptags|trim|lower}}\" {% endif %}
    {% if content.field_invert|render|striptags|trim %} data-paragraph-invert=\"{{content.field_invert|render|striptags|trim|lower}}\" {% endif %}
    {% if content.field_text_alignment|render|striptags|trim %} data-paragraph-text-alignment=\"{{content.field_text_alignment|render|striptags|trim|lower}}\" {% endif %}
    {% if content.field_link_type|render|striptags|trim %} data-paragraph-link-type=\"{{content.field_link_type|render|striptags|trim|lower}}\" {% endif %}
    {% if content.field_narrow|render|striptags|trim %} data-paragraph-narrow=\"{{content.field_narrow|render|striptags|trim|lower}}\" {% endif %}
    {% if content.field_image_position|render|striptags|trim %} data-paragraph-image-position=\"{{content.field_image_position|render|striptags|trim|lower}}\" {% endif %}
    {% if content.field_fluid|render|striptags|trim %} data-paragraph-fluid=\"{{content.field_fluid|render|striptags|trim|lower}}\" {% endif %}
    {% if content.field_fit|render|striptags|trim %} data-paragraph-fit=\"{{content.field_fit|render|striptags|trim|lower}}\" {% endif %}

    {% if (content.field_background_color|render|striptags|trim or content.field_background_gradient|render|striptags|trim ) %}
      style=
        \"
          {% if content.field_background_color|render|striptags|trim %} background-color: {{ content.field_background_color|render|striptags|trim }}; {% endif %}
          {% if content.field_background_gradient|render|striptags|trim %}
            background: linear-gradient(90deg,
                {{content.field_background_gradient[0]['#taxonomy_term'].field_left_color.getValue('field_left_color')[0].color}} 0%,
                {{content.field_background_gradient[0]['#taxonomy_term'].field_right_color.getValue('field_right_color')[0].color}} 100%
            ); {% endif %}
          {% if content.field_background_image|render|striptags|trim and (paragraph.bundle != \"text_and_image\") %} background-image: {% if content.field_overlay|render|striptags|trim %}linear-gradient(to bottom, rgba({{ content.field_overlay|render|striptags|trim }}, 0.4) 0%, rgba({{ content.field_overlay|render|striptags|trim }}, 0.4) 100%), {% endif %} url({{ content.field_background_image|render|striptags|trim }}); {% endif %}
        \"
    {% endif %}
  >
  {% if content.field_margin|render|striptags|trim %}
    <style>
      [data-paragraph-id=\"{{ paragraph.id() }}\"] { margin: calc({{ content.field_margin|render|striptags|trim }} / 2) auto !important; }
      @media (min-width: 1024px) { [data-paragraph-id=\"{{ paragraph.id() }}\"] { margin: {{ content.field_margin|render|striptags|trim }} auto !important; }}
    </style>
  {% endif %}

  {% if content.field_height|render|striptags|trim %}
    <style>
      @media (min-width: 1024px) { [data-paragraph-id=\"{{ paragraph.id() }}\"] { height: {{ content.field_height|render|striptags|trim }}; }}
    </style>
  {% endif %}

{# {% set fluid = '{{ content.field_fluid|render|striptags|trim }}' %} #}

\t<div class=\"{{ longinus_block ~ \"__container\" }}\">
\t\t{% block content %}
      {# BANNER #}
      {% if paragraph.bundle == \"banner\" %}
        {{ content.field_background_image }}
         <div class=\"{{longinus_block}}__text\">
           <div class=\"{{longinus_block}}__text-wrap\">
            {{ content.field_title }}
            {{ content.field_body }}
            {{ content.field_links_multiple }}
          </div>
         </div>
         {# Image #}
         {% elseif paragraph.bundle == \"image\" %}
        {{ content.field_background_image }}
         <div class=\"{{longinus_block}}__text\">
           <div class=\"{{longinus_block}}__text-wrap\">
            {{ content.field_title }}
            {{ content.field_body }}
            {{ content.field_links_multiple }}
          </div>
         </div>
      {# ROW #}
      {% elseif paragraph.bundle == \"row\" %}
        {{ content.field_title }}
        {{ content.field_cards }}
      {# ROW #}
      {% elseif paragraph.bundle == \"image\" %}
        {{ content.field_title }}
        {{ content.field_background_image }}
      {# GALLERY #}
      {% elseif paragraph.bundle == \"gallery\" %}
        {% if content.field_gallery %}
        <div id=\"lightGallery\" data-light-gallery>
          {% for item in content.field_gallery['#items'] %}
            {% set image_uri = file_url(item.entity.uri.value) %}
            <div class=\"image-item\" data-src=\"{{image_uri}}\" >
              <a href=\"\">
                <img src=\"{{image_uri}}\" />
              </a>
            </div>
          {% endfor %}
        </div>
        {% endif %}
      {# SHORTCUTS #}
      {% elseif paragraph.bundle == \"shortcuts\" %}
        {{ content.field_title }}
        <div class=\"{{longinus_block}}__content\">
          {{ content.field_paragraphs }}
          <div>
            {{ content.field_background_image }}
            {{ content.field_body }}
          </div>
        </div>
      {# SHORTCUT #}
      {% elseif paragraph.bundle == \"shortcut\" %}
        {{ content.field_icon_svg }}
        {{ content.field_link }}
      {# STEPS #}
      {% elseif paragraph.bundle == \"steps\" %}
        {{ content.field_title }}
        {{ content.field_paragraphs }}
      {# SHORTCUT #}
      {% elseif paragraph.bundle == \"step\" %}
        {{ content.field_icon_svg }}
        {{ content.field_title }}
        {{ content.field_body }}
      {# CAROUSEL #}
      {% elseif paragraph.bundle == \"carousel\" %}
        {{ content.field_title }}
        {% if content.field_cards['#items']|length > 2 %}
          <div class=\"paragraph-carousel paragraph-carousel-{{ paragraph.id() }} paragraph-carousel--{{ content.field_carousel_type|render|striptags|trim|lower }}\">
            <div class=\"swiper-container\">
              <div class=\"swiper-wrapper\">
                {% for items in content.field_cards['#items'] %}
                  <div class=\"swiper-slide\">
                    {{content.field_cards[loop.index -1]}}
                  </div>
                {% endfor %}
              </div>

            </div>
             <!-- Add navigation -->
              <div class=\"paragraph-carousel-{{ paragraph.id() }}-swiper-button swiper-button-prev\"></div>
              <div class=\"paragraph-carousel-{{ paragraph.id() }}-swiper-button swiper-button-next\"></div>
          </div>
        {% endif %}
      {# CART WITH ICONS #}
      {% elseif paragraph.bundle == \"card_with_icons\" %}
        {{ content.field_icon_svg }}
        <div class=\"{{longinus_block}}__text\">
          {{ content.field_title }}
          {{ content.field_body }}
          {{ content.field_link }}
        </div>
      {# CARD #}
      {% elseif (paragraph.bundle == \"card\") %}
        {{ content.field_background_image }}
        <div class=\"{{longinus_block}}__text\">
          {{ content.field_title }}
          {{ content.field_body }}
          {{ content.field_link }}
        </div>
      {# PROJECTS #}
      {% elseif (paragraph.bundle == \"projects\") %}
      {% if content.field_title %}
        {{ content.field_title }}
      {% endif %}
      {% if content.field_project %}
        {{ content.field_project }}
      {% endif %}
      {# PROJECT #}
      {% elseif (paragraph.bundle == \"project\") %}
      {% if content.field_lead_image %}
        {{ content.field_lead_image }}
      {% endif %}
      {% if content.field_title %}
        {{ content.field_title }}
      {% endif %}
      {% if content.field_body %}
        {{ content.field_body }}
      {% endif %}
      {# ROOM #}
      {% elseif (paragraph.bundle == \"room\") %}
          {{ content.field_room_type}}
          {{ content.field_number_of_rooms }}
      {# ROOMS #}
      {% elseif (paragraph.bundle == \"rooms\") %}
          {{ content.field_room}}
      {# FORM #}
      {% elseif (paragraph.bundle == \"form\") %}
        <div class=\"{{longinus_block}}__text\" {% if content.field_anchor|render|striptags|trim|lower %} id=\"{{ content.field_anchor|render|striptags|trim|lower }}\" {% endif %}>
          {{ content.field_title }}
          {{ content.field_form\t }}
        </div>
      {# Text and Image #}
      {% elseif (paragraph.bundle == \"text_and_image\") %}
        
          {{ content.field_background_image }}
        
        <div class=\"{{longinus_block}}__text\">
          <div class=\"{{longinus_block}}__text-wrapper\">
            {{ content.field_title }}
            {{ content.field_body }}
            {{ content.field_link }}
          </div>
        </div>
      {# Call to Action #}
      {% elseif paragraph.bundle == \"call_to_action\" %}
        {{ content.field_subtitle }}
        {{ content.field_title }}
        {{ content.field_body }}
        {{ content.field_link }}
      {# Text #}
      {% elseif paragraph.bundle == \"text\" %}
        {{ content.field_body }}
      {# VIDEO #}
      {% elseif paragraph.bundle == \"video\" %}
        {{ content.field_title }}
        {{ content.field_video }}
      {# MAP IMAGE #}
      {% elseif paragraph.bundle == \"map_image\" %}
        {% if content.field_title %}
          {{ content.field_title }}
        {% endif %}
        {% if content.field_map_description %}
          {{ content.field_map_description }}
        {% endif %}
        <a href=\"{{ content.field_map_location|render|striptags|trim }}\" target=\"_blank\">
          {% if content.field_icon_svg %}
            {{ content.field_icon_svg }}
          {% endif %}
        </a>
        {{ content.field_image }}
      {# PARTNERS #}
        {% elseif paragraph.bundle == \"partners\" %}
        {% if content.field_title %}
          {{ content.field_title }}
        {% endif %}
        {% if content.field_partner %}
          {{ content.field_partner }}
        {% endif %}
      {# PARTNER #}
        {% elseif paragraph.bundle == \"partner\" %}
        <a href=\"{{ content.field_link|render|striptags|trim|lower }}\" target=\"_blank\">
          {{ content.field_icon_svg }}
        </a>
      {# PARAGRAPHS #}
        {% elseif paragraph.bundle == \"paragraphs\" %}
        {% if content.field_paragraph %}
          {{ content.field_paragraph }}
        {% endif %}
      {# Accordion  #}
      {% elseif paragraph.bundle == \"accordion\" %}
        {{ content|without('field_margin') }}
      {# QUOTE #}
      {% elseif (paragraph.bundle == \"quotes\") %}
      <div class=\"{{longinus_block}}__quote\">
        {% if content.field_body %}
          {{ content.field_body }}
        {% endif %}
      </div>
      {# Accordion Parent #}
      {% elseif paragraph.bundle == \"accordion_parent\" %}
      <dl class=\"accordion\">
        <dt class=\"{{longinus_block}}__accordion-title\">
          <a href=\"#{{ content.field_anchor|render|striptags|trim|lower }}\">
            {{ content.field_title }}
          </a>
        </dt>
        <dd class=\"{{longinus_block}}__accordion-body\">
          {{ content.field_body }}
          {{ content.field_accordion_items }}
        </dd>
      </dl>
      {# Accordion Child #}
      {% elseif paragraph.bundle == \"accordion_child\" %}
      <dl class=\"accordion\">
        <dt class=\"{{longinus_block}}__accordion-title\">
          <a href=\"#{{ content.field_anchor|render|striptags|trim|lower }}\">
            {{ content.field_title }}
          </a>
        </dt>
        <dd class=\"{{longinus_block}}__accordion-body\">
          {{ content.field_body }}
        </dd>
      </dl>
      {# Text #}
      {% elseif paragraph.bundle == \"file\" %}
        {{ content.field_title }}
        {{ content.field_file }}
      {% endif %}
\t\t{% endblock %}
\t</div>
</div>
", "themes/custom/longinus/templates/paragraphs/paragraph.html.twig", "/var/www/html/web/themes/custom/longinus/templates/paragraphs/paragraph.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1, "if" => 14, "block" => 52, "for" => 85);
        static $filters = array("clean_class" => 1, "escape" => 12, "trim" => 14, "striptags" => 14, "render" => 14, "lower" => 14, "length" => 121, "without" => 245);
        static $functions = array("file_url" => 86);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block', 'for'],
                ['clean_class', 'escape', 'trim', 'striptags', 'render', 'lower', 'length', 'without'],
                ['file_url']
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
