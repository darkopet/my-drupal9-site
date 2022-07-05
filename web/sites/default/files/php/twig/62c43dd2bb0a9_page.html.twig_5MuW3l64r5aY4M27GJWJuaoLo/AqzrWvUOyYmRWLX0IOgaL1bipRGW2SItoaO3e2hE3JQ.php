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

/* themes/vani/templates/layout/page.html.twig */
class __TwigTemplate_8975bd48dc2b59f1d0d35249f7abbb859350d5b24b3a63dd0b01ebe6a136e3f3 extends \Twig\Template
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
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "themes/vani/templates/layout/page.html.twig"));

        // line 52
        $this->loadTemplate("@vani/template-parts/header.html.twig", "themes/vani/templates/layout/page.html.twig", 52)->display($context);
        // line 53
        $this->loadTemplate("@vani/template-parts/highlighted.html.twig", "themes/vani/templates/layout/page.html.twig", 53)->display($context);
        // line 54
        echo "<div id=\"main-wrapper\" class=\"main-wrapper\">
  <div class=\"container clear\">
  <div class=\"main-container\">
    <main id=\"main\" class=\"page-content\">
      <a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 59
        echo "      ";
        $this->loadTemplate("@vani/template-parts/content_top.html.twig", "themes/vani/templates/layout/page.html.twig", 59)->display($context);
        // line 60
        echo "      <div class=\"node-content\">
        ";
        // line 61
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 61), 61, $this->source), "html", null, true);
        echo "
      </div>
      ";
        // line 63
        $this->loadTemplate("@vani/template-parts/content_bottom.html.twig", "themes/vani/templates/layout/page.html.twig", 63)->display($context);
        // line 64
        echo "    </main>
    ";
        // line 65
        $this->loadTemplate("@vani/template-parts/sidebar_left.html.twig", "themes/vani/templates/layout/page.html.twig", 65)->display($context);
        // line 66
        echo "    ";
        $this->loadTemplate("@vani/template-parts/sidebar_right.html.twig", "themes/vani/templates/layout/page.html.twig", 66)->display($context);
        // line 67
        echo "  </div> ";
        // line 68
        echo "  </div> ";
        // line 69
        echo "</div>";
        // line 70
        $this->loadTemplate("@vani/template-parts/footer.html.twig", "themes/vani/templates/layout/page.html.twig", 70)->display($context);
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "themes/vani/templates/layout/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 70,  77 => 69,  75 => 68,  73 => 67,  70 => 66,  68 => 65,  65 => 64,  63 => 63,  58 => 61,  55 => 60,  52 => 59,  46 => 54,  44 => 53,  42 => 52,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/vani/templates/layout/page.html.twig", "/var/www/html/web/themes/vani/templates/layout/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 52);
        static $filters = array("escape" => 61);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include'],
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
