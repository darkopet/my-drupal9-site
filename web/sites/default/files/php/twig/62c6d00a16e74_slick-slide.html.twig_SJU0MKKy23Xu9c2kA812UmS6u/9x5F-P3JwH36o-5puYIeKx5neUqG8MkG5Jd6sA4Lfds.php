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

/* modules/contrib/slick/templates/slick-slide.html.twig */
class __TwigTemplate_e3c01c274a43c2631b87ec6c9f1a6906b7dc7221385e2e922df9002fbaa6bf4d extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'slick_slide' => [$this, 'block_slick_slide'],
            'slick_caption' => [$this, 'block_slick_caption'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->extensions["Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension"];
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "modules/contrib/slick/templates/slick-slide.html.twig"));

        // line 21
        $context["classes"] = [0 => ("slide--" . $this->sandbox->ensureToStringAllowed(        // line 22
($context["delta"] ?? null), 22, $this->source)), 1 => ((twig_test_empty(twig_get_attribute($this->env, $this->source,         // line 23
($context["item"] ?? null), "slide", [], "any", false, false, true, 23))) ? ("slide--text") : ("")), 2 => ((twig_get_attribute($this->env, $this->source,         // line 24
($context["settings"] ?? null), "layout", [], "any", false, false, true, 24)) ? (("slide--caption--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "layout", [], "any", false, false, true, 24), 24, $this->source)))) : ("")), 3 => ((twig_get_attribute($this->env, $this->source,         // line 25
($context["settings"] ?? null), "class", [], "any", false, false, true, 25)) ? (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "class", [], "any", false, false, true, 25)) : (""))];
        // line 29
        $context["content_classes"] = [0 => ((twig_get_attribute($this->env, $this->source,         // line 30
($context["settings"] ?? null), "detroy", [], "any", false, false, true, 30)) ? ("slide") : ("")), 1 => (( !twig_get_attribute($this->env, $this->source,         // line 31
($context["settings"] ?? null), "detroy", [], "any", false, false, true, 31)) ? ("slide__content") : (""))];
        // line 35
        $context["caption_classes"] = [0 => "slide__caption"];
        // line 39
        ob_start(function () { return ''; });
        // line 40
        echo "  ";
        $this->displayBlock('slick_slide', $context, $blocks);
        $context["slide"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 48
        echo "
";
        // line 49
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "wrapper", [], "any", false, false, true, 49)) {
            // line 50
            echo "  <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 50), 50, $this->source), "html", null, true);
            echo ">
  ";
            // line 51
            if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "use_ca", [], "any", false, false, true, 51)) {
                echo "<div";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => ($context["content_classes"] ?? null)], "method", false, false, true, 51), 51, $this->source), "html", null, true);
                echo ">";
            }
        }
        // line 53
        echo "
  ";
        // line 54
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "slide", [], "any", false, false, true, 54)) {
            // line 55
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["slide"] ?? null), 55, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 57
        echo "
  ";
        // line 58
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 58)) {
            // line 59
            echo "    ";
            $this->displayBlock('slick_caption', $context, $blocks);
            // line 89
            echo "  ";
        }
        // line 90
        echo "
";
        // line 91
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "wrapper", [], "any", false, false, true, 91)) {
            // line 92
            echo "  ";
            if (twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "grid", [], "any", false, false, true, 92))) {
                echo "</div>";
            }
            // line 93
            echo "  </div>
";
        }
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    // line 40
    public function block_slick_slide($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->extensions["Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension"];
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "slick_slide"));

        // line 41
        echo "    ";
        if ((twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "split", [], "any", false, false, true, 41) &&  !twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "unslick", [], "any", false, false, true, 41))) {
            // line 42
            echo "      <div class=\"slide__media\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "slide", [], "any", false, false, true, 42), 42, $this->source), "html", null, true);
            echo "</div>
    ";
        } else {
            // line 44
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "slide", [], "any", false, false, true, 44), 44, $this->source), "html", null, true);
            echo "
    ";
        }
        // line 46
        echo "  ";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    // line 59
    public function block_slick_caption($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->extensions["Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension"];
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "slick_caption"));

        // line 60
        echo "      ";
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "fullwidth", [], "any", false, false, true, 60)) {
            echo "<div class=\"slide__constrained\">";
        }
        // line 61
        echo "
        <div";
        // line 62
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["caption_attributes"] ?? null), "addClass", [0 => ($context["caption_classes"] ?? null)], "method", false, false, true, 62), 62, $this->source), "html", null, true);
        echo ">
          ";
        // line 63
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 63), "overlay", [], "any", false, false, true, 63)) {
            // line 64
            echo "            <div class=\"slide__overlay\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 64), "overlay", [], "any", false, false, true, 64), 64, $this->source), "html", null, true);
            echo "</div>
            ";
            // line 65
            if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "data", [], "any", false, false, true, 65)) {
                echo "<div class=\"slide__data\">";
            }
            // line 66
            echo "          ";
        }
        // line 67
        echo "
          ";
        // line 68
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 68), "title", [], "any", false, false, true, 68)) {
            // line 69
            echo "            <h2 class=\"slide__title\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 69), "title", [], "any", false, false, true, 69), 69, $this->source), "html", null, true);
            echo "</h2>
          ";
        }
        // line 71
        echo "
          ";
        // line 72
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 72), "alt", [], "any", false, false, true, 72)) {
            // line 73
            echo "            <p class=\"slide__description\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 73), "alt", [], "any", false, false, true, 73), 73, $this->source), "html", null, true);
            echo "</p>
          ";
        }
        // line 75
        echo "
          ";
        // line 76
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 76), "data", [], "any", false, false, true, 76)) {
            // line 77
            echo "            <div class=\"slide__description\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 77), "data", [], "any", false, false, true, 77), 77, $this->source), "html", null, true);
            echo "</div>
          ";
        }
        // line 79
        echo "
          ";
        // line 80
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 80), "link", [], "any", false, false, true, 80)) {
            // line 81
            echo "            <div class=\"slide__link\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 81), "link", [], "any", false, false, true, 81), 81, $this->source), "html", null, true);
            echo "</div>
          ";
        }
        // line 83
        echo "
          ";
        // line 84
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 84), "overlay", [], "any", false, false, true, 84) && twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "data", [], "any", false, false, true, 84))) {
            echo "</div>";
        }
        // line 85
        echo "        </div>

      ";
        // line 87
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "fullwidth", [], "any", false, false, true, 87)) {
            echo "</div>";
        }
        // line 88
        echo "    ";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "modules/contrib/slick/templates/slick-slide.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  241 => 88,  237 => 87,  233 => 85,  229 => 84,  226 => 83,  220 => 81,  218 => 80,  215 => 79,  209 => 77,  207 => 76,  204 => 75,  198 => 73,  196 => 72,  193 => 71,  187 => 69,  185 => 68,  182 => 67,  179 => 66,  175 => 65,  170 => 64,  168 => 63,  164 => 62,  161 => 61,  156 => 60,  149 => 59,  142 => 46,  136 => 44,  130 => 42,  127 => 41,  120 => 40,  111 => 93,  106 => 92,  104 => 91,  101 => 90,  98 => 89,  95 => 59,  93 => 58,  90 => 57,  84 => 55,  82 => 54,  79 => 53,  72 => 51,  67 => 50,  65 => 49,  62 => 48,  58 => 40,  56 => 39,  54 => 35,  52 => 31,  51 => 30,  50 => 29,  48 => 25,  47 => 24,  46 => 23,  45 => 22,  44 => 21,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/slick/templates/slick-slide.html.twig", "/var/www/html/web/modules/contrib/slick/templates/slick-slide.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 21, "block" => 40, "if" => 49);
        static $filters = array("clean_class" => 24, "escape" => 50);
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
