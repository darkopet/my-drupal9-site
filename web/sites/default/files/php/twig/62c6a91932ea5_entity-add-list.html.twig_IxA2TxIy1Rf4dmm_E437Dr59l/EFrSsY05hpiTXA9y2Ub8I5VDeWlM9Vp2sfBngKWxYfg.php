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

/* @claro/entity-add-list.html.twig */
class __TwigTemplate_56d62a5740aa2347145ef6ff8ac382b20f5789c413537f95c78450741fc40442 extends \Twig\Template
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
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@claro/entity-add-list.html.twig"));

        // line 19
        $context["item_classes"] = [0 => "admin-item"];
        // line 23
        if ( !twig_test_empty(($context["bundles"] ?? null))) {
            // line 24
            echo "  <dl";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => "admin-list"], "method", false, false, true, 24), 24, $this->source), "html", null, true);
            echo ">
    ";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["bundles"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["bundle"]) {
                // line 26
                echo "      ";
                // line 30
                echo "      ";
                $context["bundle_attributes"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["bundle"], "add_link", [], "any", false, false, true, 30), "url", [], "any", false, false, true, 30), "getOption", [0 => "attributes"], "method", false, false, true, 30)) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["bundle"], "add_link", [], "any", false, false, true, 30), "url", [], "any", false, false, true, 30), "getOption", [0 => "attributes"], "method", false, false, true, 30)) : ([]));
                // line 31
                echo "      ";
                $context["link_attributes"] = twig_get_attribute($this->env, $this->source, $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute($this->sandbox->ensureToStringAllowed(($context["bundle_attributes"] ?? null), 31, $this->source)), "addClass", [0 => "admin-item__link"], "method", false, false, true, 31);
                // line 32
                echo "      <div";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["class" => ($context["item_classes"] ?? null)]), "html", null, true);
                echo ">
        <dt class=\"admin-item__title\">
          <a href=\"";
                // line 34
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["bundle"], "add_link", [], "any", false, false, true, 34), "url", [], "any", false, false, true, 34), 34, $this->source), "html", null, true);
                echo "\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["link_attributes"] ?? null), 34, $this->source), "href"), "html", null, true);
                echo ">
            ";
                // line 35
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["bundle"], "add_link", [], "any", false, false, true, 35), "text", [], "any", false, false, true, 35), 35, $this->source), "html", null, true);
                echo "
          </a>
        </dt>
        ";
                // line 39
                echo "        ";
                if (twig_get_attribute($this->env, $this->source, $context["bundle"], "description", [], "any", false, false, true, 39)) {
                    // line 40
                    echo "          <dd class=\"admin-item__description\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["bundle"], "description", [], "any", false, false, true, 40), 40, $this->source), "html", null, true);
                    echo "</dd>
        ";
                }
                // line 42
                echo "      </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bundle'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "  </dl>
";
        } elseif ( !twig_test_empty(        // line 45
($context["add_bundle_message"] ?? null))) {
            // line 46
            echo "  <p>
    ";
            // line 47
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["add_bundle_message"] ?? null), 47, $this->source), "html", null, true);
            echo "
  </p>
";
        }
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "@claro/entity-add-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 47,  102 => 46,  100 => 45,  97 => 44,  90 => 42,  84 => 40,  81 => 39,  75 => 35,  69 => 34,  63 => 32,  60 => 31,  57 => 30,  55 => 26,  51 => 25,  46 => 24,  44 => 23,  42 => 19,);
    }

    public function getSourceContext()
    {
        return new Source("", "@claro/entity-add-list.html.twig", "/var/www/html/web/core/themes/claro/templates/entity-add-list.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 19, "if" => 23, "for" => 25);
        static $filters = array("escape" => 24, "without" => 34);
        static $functions = array("create_attribute" => 31);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for'],
                ['escape', 'without'],
                ['create_attribute']
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
