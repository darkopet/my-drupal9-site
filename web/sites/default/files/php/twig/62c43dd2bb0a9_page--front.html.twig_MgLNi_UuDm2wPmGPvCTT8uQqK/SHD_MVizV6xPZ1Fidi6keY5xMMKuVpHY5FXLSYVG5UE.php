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

/* themes/vani/templates/layout/page--front.html.twig */
class __TwigTemplate_493aa843f786390e712cf1f6085fed1d2a113d5cef9b441ea3e2e7c2eea73555 extends \Twig\Template
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
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "themes/vani/templates/layout/page--front.html.twig"));

        // line 11
        $this->loadTemplate("@vani/template-parts/header.html.twig", "themes/vani/templates/layout/page--front.html.twig", 11)->display($context);
        // line 12
        $this->loadTemplate("@vani/template-parts/highlighted.html.twig", "themes/vani/templates/layout/page--front.html.twig", 12)->display($context);
        // line 13
        echo "<div id=\"main-wrapper\" class=\"main-wrapper\">
  ";
        // line 14
        $this->loadTemplate("@vani/template-parts/content_home.html.twig", "themes/vani/templates/layout/page--front.html.twig", 14)->display($context);
        // line 15
        echo "  <div class=\"container clear\">
    ";
        // line 16
        if (($context["front_sidebar"] ?? null)) {
            // line 17
            echo "      <div class=\"main-container\">
    ";
        }
        // line 19
        echo "    <main id=\"main\" class=\"page-content home-content clear\">
      <a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 21
        echo "      ";
        $this->loadTemplate("@vani/template-parts/content_top.html.twig", "themes/vani/templates/layout/page--front.html.twig", 21)->display($context);
        // line 22
        echo "      ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 22), 22, $this->source), "html", null, true);
        echo "
      ";
        // line 24
        echo "      ";
        $this->loadTemplate("@vani/template-parts/content_bottom.html.twig", "themes/vani/templates/layout/page--front.html.twig", 24)->display($context);
        // line 25
        echo "    </main>
    ";
        // line 26
        if (($context["front_sidebar"] ?? null)) {
            // line 27
            echo "      ";
            $this->loadTemplate("@vani/template-parts/sidebar_left.html.twig", "themes/vani/templates/layout/page--front.html.twig", 27)->display($context);
            // line 28
            echo "      ";
            $this->loadTemplate("@vani/template-parts/sidebar_right.html.twig", "themes/vani/templates/layout/page--front.html.twig", 28)->display($context);
            // line 29
            echo "      </div> ";
            // line 30
            echo "    ";
        }
        // line 31
        echo "  </div> ";
        // line 32
        echo "</div>";
        // line 33
        $this->loadTemplate("@vani/template-parts/footer.html.twig", "themes/vani/templates/layout/page--front.html.twig", 33)->display($context);
        // line 34
        if (($context["slider_show"] ?? null)) {
            // line 35
            echo "  ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("vani/slider"), "html", null, true);
            echo "
";
        }
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "themes/vani/templates/layout/page--front.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 35,  96 => 34,  94 => 33,  92 => 32,  90 => 31,  87 => 30,  85 => 29,  82 => 28,  79 => 27,  77 => 26,  74 => 25,  71 => 24,  66 => 22,  63 => 21,  60 => 19,  56 => 17,  54 => 16,  51 => 15,  49 => 14,  46 => 13,  44 => 12,  42 => 11,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/vani/templates/layout/page--front.html.twig", "/var/www/html/web/themes/vani/templates/layout/page--front.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 11, "if" => 16);
        static $filters = array("escape" => 22);
        static $functions = array("attach_library" => 35);

        try {
            $this->sandbox->checkSecurity(
                ['include', 'if'],
                ['escape'],
                ['attach_library']
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
