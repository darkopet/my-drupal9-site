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

/* core/themes/claro/templates/views/views-ui-expose-filter-form.html.twig */
class __TwigTemplate_77215ef1714eda42420982ae9ada8f2eef8ba75c39d198c486cbc4c164eaf710 extends \Twig\Template
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
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "core/themes/claro/templates/views/views-ui-expose-filter-form.html.twig"));

        // line 22
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "form_description", [], "any", false, false, true, 22), 22, $this->source), "html", null, true);
        echo "
";
        // line 23
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "expose_button", [], "any", false, false, true, 23), 23, $this->source), "html", null, true);
        echo "
";
        // line 24
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "required", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
        echo "
";
        // line 25
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "group_button", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
        echo "
";
        // line 26
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "label", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
        echo "
";
        // line 27
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "description", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
        echo "

";
        // line 29
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "operator", [], "any", false, false, true, 29), 29, $this->source), "html", null, true);
        echo "
";
        // line 30
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "value", [], "any", false, false, true, 30), 30, $this->source), "html", null, true);
        echo "

";
        // line 32
        if (twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "use_operator", [], "any", false, false, true, 32)) {
            // line 33
            echo "  <div class=\"views-config-group-region\">
    <div class=\"views-group-box\">
      ";
            // line 35
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "use_operator", [], "any", false, false, true, 35), 35, $this->source), "html", null, true);
            echo "
      ";
            // line 36
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "operator_limit_selection", [], "any", false, false, true, 36), 36, $this->source), "html", null, true);
            echo "
      ";
            // line 37
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "operator_list", [], "any", false, false, true, 37), 37, $this->source), "html", null, true);
            echo "
      ";
            // line 38
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "operator_id", [], "any", false, false, true, 38), 38, $this->source), "html", null, true);
            echo "
    </div>
";
        }
        // line 41
        echo "
";
        // line 46
        $context["remaining_form"] = $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 46, $this->source), "form_description", "expose_button", "group_button", "required", "label", "description", "operator", "value", "use_operator", "more", "admin_label", "operator_limit_selection", "operator_list", "operator_id");
        // line 63
        echo "
";
        // line 67
        if ((($__internal_compile_0 = twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "operator", [], "any", false, false, true, 67)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["#type"] ?? null) : null)) {
            // line 68
            echo "    <div class=\"views-group-box\">
      ";
            // line 69
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["remaining_form"] ?? null), 69, $this->source), "html", null, true);
            echo "
    </div>
";
        } else {
            // line 72
            echo "  ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["remaining_form"] ?? null), 72, $this->source), "html", null, true);
            echo "
";
        }
        // line 74
        echo "
";
        // line 75
        if (twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "use_operator", [], "any", false, false, true, 75)) {
            // line 76
            echo "  </div>
";
        }
        // line 78
        echo "


";
        // line 81
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "admin_label", [], "any", false, false, true, 81), 81, $this->source), "html", null, true);
        echo "

";
        // line 83
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "more", [], "any", false, false, true, 83), 83, $this->source), "html", null, true);
        echo "
";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "core/themes/claro/templates/views/views-ui-expose-filter-form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 83,  139 => 81,  134 => 78,  130 => 76,  128 => 75,  125 => 74,  119 => 72,  113 => 69,  110 => 68,  108 => 67,  105 => 63,  103 => 46,  100 => 41,  94 => 38,  90 => 37,  86 => 36,  82 => 35,  78 => 33,  76 => 32,  71 => 30,  67 => 29,  62 => 27,  58 => 26,  54 => 25,  50 => 24,  46 => 23,  42 => 22,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/claro/templates/views/views-ui-expose-filter-form.html.twig", "/var/www/html/web/core/themes/claro/templates/views/views-ui-expose-filter-form.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 32, "set" => 46);
        static $filters = array("escape" => 22, "without" => 46);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set'],
                ['escape', 'without'],
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
