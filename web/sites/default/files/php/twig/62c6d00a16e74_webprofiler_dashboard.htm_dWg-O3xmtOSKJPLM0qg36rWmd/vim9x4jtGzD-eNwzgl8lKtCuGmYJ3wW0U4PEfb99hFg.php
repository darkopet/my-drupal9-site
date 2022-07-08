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

/* modules/devel/webprofiler/templates/Profiler/webprofiler_dashboard.html.twig */
class __TwigTemplate_f93e65c319b6d2a90fe85876eacd9f5d6fbae26c75142c51c0c72cd6b248df1a extends \Twig\Template
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
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "modules/devel/webprofiler/templates/Profiler/webprofiler_dashboard.html.twig"));

        // line 1
        ob_start(function () { return ''; });
        // line 2
        echo "<div id=\"resume\" class=\"resume\">
    <span class=\"resume__subtitle\">
        ";
        // line 4
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_upper_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["profile"] ?? null), "method", [], "any", false, false, true, 4), 4, $this->source)), "html", null, true);
        echo "
        ";
        // line 5
        if (twig_in_filter(twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["profile"] ?? null), "method", [], "any", false, false, true, 5)), [0 => "GET", 1 => "HEAD"])) {
            // line 6
            echo "            <a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["profile"] ?? null), "url", [], "any", false, false, true, 6), 6, $this->source), "html", null, true);
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["profile"] ?? null), "url", [], "any", false, false, true, 6), 6, $this->source), "html", null, true);
            echo "</a>
        ";
        } else {
            // line 8
            echo "            <em>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["profile"] ?? null), "url", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
            echo "</em>
        ";
        }
        // line 10
        echo "    </span>
    <span class=\"resume__time\">
        <em>by ";
        // line 12
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["profile"] ?? null), "ip", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
        echo "</em> at <em>";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["profile"] ?? null), "time", [], "any", false, false, true, 12), 12, $this->source), "r"), "html", null, true);
        echo "</em>
    </span>

    <a id=\"resume-view-all\" class=\"button--flat resume__button\"
       href=\"";
        // line 16
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("webprofiler.admin_list"));
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("View latest"));
        echo "</a>
</div>
";
        $context["resume"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 19
        echo "
<div id=\"webprofiler\">

    ";
        // line 22
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["resume"] ?? null), 22, $this->source), "html", null, true);
        echo "

    <div id=\"collectors\" class=\"collectors panel\">
    </div>

    <div class=\"loader--fixed\" style=\"display: none\">
        <svg class=\"loader__circle\">
            <circle class=\"loader__path\" cx=\"50\" cy=\"50\" r=\"20\" fill=\"none\" stroke-width=\"2\" stroke-miterlimit=\"10\"/>
        </svg>
    </div>

    <script id=\"collector\" type=\"text/template\">
        <a href=\"#<%= id %>\" title=\"<%= summary %>\" class=\"overview__link\">
            <img src=\"data:image/png;base64,<%= icon %>\"
                 class=\"overview__icon\">
            <span class=\"overview__title\"><%= label %></span>
            <% if(typeof(summary) !== \"undefined\") { %>
            <span class=\"overview__subtitle\"><%= summary %></span>
            <% } %>
        </a>
    </script>

    ";
        // line 44
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["panels"] ?? null), 44, $this->source), "html", null, true);
        echo "

    <div class=\"modal js--modal\" style=\"display: none\">
        <div class=\"modal__container\">
            <div class=\"modal__bar\">
                <h3 class=\"modal__title\"></h3>
            </div>
            <div class=\"modal__content\">
                <div class=\"modal__main-data\"></div>
            </div>
            <a class=\"button--flat js--modal-close l-right\">Close</a>
        </div>
    </div>
</div>
";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "modules/devel/webprofiler/templates/Profiler/webprofiler_dashboard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 44,  94 => 22,  89 => 19,  81 => 16,  72 => 12,  68 => 10,  62 => 8,  54 => 6,  52 => 5,  48 => 4,  44 => 2,  42 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/devel/webprofiler/templates/Profiler/webprofiler_dashboard.html.twig", "/var/www/html/web/modules/devel/webprofiler/templates/Profiler/webprofiler_dashboard.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1, "if" => 5);
        static $filters = array("escape" => 4, "upper" => 4, "date" => 12, "t" => 16);
        static $functions = array("url" => 16);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 'upper', 'date', 't'],
                ['url']
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
