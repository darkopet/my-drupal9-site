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

/* modules/contrib/paragraphs/templates/paragraphs-actions.html.twig */
class __TwigTemplate_38b7043749d96578a08b31b1ec5f3743c4ad4bc8c570071d8f4b6aa6767d3ba9 extends \Twig\Template
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
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "modules/contrib/paragraphs/templates/paragraphs-actions.html.twig"));

        // line 15
        echo "<div class=\"paragraphs-actions\">
  ";
        // line 16
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["actions"] ?? null), 16, $this->source), "html", null, true);
        echo "
  ";
        // line 20
        echo "  ";
        $context["dropdown_actions_output"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["dropdown_actions"] ?? null), 20, $this->source));
        // line 21
        echo "  ";
        if (($context["dropdown_actions_output"] ?? null)) {
            // line 22
            echo "    <div class=\"paragraphs-dropdown\">
      <button class=\"paragraphs-dropdown-toggle\"><span class=\"visually-hidden\">";
            // line 23
            echo t("Toggle Actions", array());
            echo "</span></button>
      <div class=\"paragraphs-dropdown-actions\">
        ";
            // line 25
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["dropdown_actions_output"] ?? null), 25, $this->source), "html", null, true);
            echo "
      </div>
    </div>
  ";
        }
        // line 29
        echo "</div>
";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "modules/contrib/paragraphs/templates/paragraphs-actions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 29,  63 => 25,  58 => 23,  55 => 22,  52 => 21,  49 => 20,  45 => 16,  42 => 15,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/paragraphs/templates/paragraphs-actions.html.twig", "/var/www/html/web/modules/contrib/paragraphs/templates/paragraphs-actions.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 20, "if" => 21, "trans" => 23);
        static $filters = array("escape" => 16);
        static $functions = array("render_var" => 20);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'trans'],
                ['escape'],
                ['render_var']
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
