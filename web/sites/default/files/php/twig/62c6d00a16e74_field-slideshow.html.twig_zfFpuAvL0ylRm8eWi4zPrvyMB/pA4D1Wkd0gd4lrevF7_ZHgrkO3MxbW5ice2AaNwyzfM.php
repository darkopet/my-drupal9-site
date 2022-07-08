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

/* modules/contrib/field_slideshow/templates/field-slideshow.html.twig */
class __TwigTemplate_ef50cab6f4923f36566dbce402362205e555dc880533de8ecd76e8522114cc74 extends \Twig\Template
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
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->extensions["Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension"];
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "modules/contrib/field_slideshow/templates/field-slideshow.html.twig"));

        // line 6
        echo "
";
        // line 7
        $context["classes"] = [0 => "field-slideshow", 1 => ("field-slideshow-" . $this->sandbox->ensureToStringAllowed(        // line 9
($context["id"] ?? null), 9, $this->source))];
        // line 11
        echo "
<div";
        // line 12
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 12), 12, $this->source), "html", null, true);
        echo ">
  <div class=\"field-slideshow-wrapper\">

    ";
        // line 15
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["pager"] ?? null), "pager", [], "any", false, false, true, 15), "before", [], "any", false, false, true, 15)) {
            // line 16
            echo "      <div class=\"cycle-pager-before cycle-pager-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 16, $this->source), "html", null, true);
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["pager"] ?? null), "pager_type", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
            echo "</div>
    ";
        }
        // line 18
        echo "
    <div id=\"";
        // line 19
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 19, $this->source), "html", null, true);
        echo "\" class=\"field-slideshow-items\">
      ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 21
            echo "        <div class=\"field-slideshow-item\">
          ";
            // line 22
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["item"], 22, $this->source), "html", null, true);
            echo "
        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "    </div>

    ";
        // line 27
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["pager"] ?? null), "pager", [], "any", false, false, true, 27), "after", [], "any", false, false, true, 27)) {
            // line 28
            echo "      <div class=\"cycle-pager-after cycle-pager-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 28, $this->source), "html", null, true);
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["pager"] ?? null), "pager_type", [], "any", false, false, true, 28), 28, $this->source), "html", null, true);
            echo "</div>
    ";
        }
        // line 30
        echo "
    ";
        // line 31
        if (twig_get_attribute($this->env, $this->source, ($context["pager"] ?? null), "controls", [], "any", false, false, true, 31)) {
            // line 32
            echo "      <a class=\"cycle-controls cycle-controls-prev cycle-controls-prev-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 32, $this->source), "html", null, true);
            echo "\" href=\"#\">";
            echo t("Prev", array());
            echo "</a>
      <a class=\"cycle-controls cycle-controls-next cycle-controls-next-";
            // line 33
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 33, $this->source), "html", null, true);
            echo "\" href=\"#\">";
            echo t("Next", array());
            echo "</a>
    ";
        }
        // line 35
        echo "
  </div>
</div>
";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "modules/contrib/field_slideshow/templates/field-slideshow.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 35,  116 => 33,  109 => 32,  107 => 31,  104 => 30,  96 => 28,  94 => 27,  90 => 25,  81 => 22,  78 => 21,  74 => 20,  70 => 19,  67 => 18,  59 => 16,  57 => 15,  51 => 12,  48 => 11,  46 => 9,  45 => 7,  42 => 6,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/field_slideshow/templates/field-slideshow.html.twig", "/var/www/html/web/modules/contrib/field_slideshow/templates/field-slideshow.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 7, "if" => 15, "for" => 20, "trans" => 32);
        static $filters = array("escape" => 12);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for', 'trans'],
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
