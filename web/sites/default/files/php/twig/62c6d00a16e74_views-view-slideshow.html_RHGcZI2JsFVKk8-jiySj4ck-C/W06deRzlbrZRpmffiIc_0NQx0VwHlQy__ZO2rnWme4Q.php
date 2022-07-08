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

/* modules/views_slideshow/templates/views-view-slideshow.html.twig */
class __TwigTemplate_dcc115486dbc5d9de7d8eb944cd65291fd5e0309d9c45155cf43b4696e9dfac0 extends \Twig\Template
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
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "modules/views_slideshow/templates/views-view-slideshow.html.twig"));

        // line 17
        if (($context["slideshow"] ?? null)) {
            // line 18
            echo "  <div class=\"skin-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["skin"] ?? null), 18, $this->source), "html", null, true);
            echo "\">
    ";
            // line 19
            if (($context["top_widget_rendered"] ?? null)) {
                // line 20
                echo "      <div class=\"views-slideshow-controls-top clearfix\">
        ";
                // line 21
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["top_widget_rendered"] ?? null), 21, $this->source), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 24
            echo "
    ";
            // line 25
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["slideshow"] ?? null), 25, $this->source), "html", null, true);
            echo "

    ";
            // line 27
            if (($context["bottom_widget_rendered"] ?? null)) {
                // line 28
                echo "      <div class=\"views-slideshow-controls-bottom clearfix\">
        ";
                // line 29
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["bottom_widget_rendered"] ?? null), 29, $this->source), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 32
            echo "    </div>
";
        }
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "modules/views_slideshow/templates/views-view-slideshow.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 32,  73 => 29,  70 => 28,  68 => 27,  63 => 25,  60 => 24,  54 => 21,  51 => 20,  49 => 19,  44 => 18,  42 => 17,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/views_slideshow/templates/views-view-slideshow.html.twig", "/var/www/html/web/modules/views_slideshow/templates/views-view-slideshow.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 17);
        static $filters = array("escape" => 18);
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
