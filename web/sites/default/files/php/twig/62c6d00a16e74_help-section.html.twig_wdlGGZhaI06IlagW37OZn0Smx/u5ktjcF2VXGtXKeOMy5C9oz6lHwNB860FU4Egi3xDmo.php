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

/* core/themes/claro/templates/classy/misc/help-section.html.twig */
class __TwigTemplate_49043506eedc3ec84555c71bd98927fbf01b4ebf767f3ed1c5399ee3d206a2bf extends \Twig\Template
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
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "core/themes/claro/templates/classy/misc/help-section.html.twig"));

        // line 15
        echo "<div class=\"clearfix\">
  <h2>";
        // line 16
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 16, $this->source), "html", null, true);
        echo "</h2>
  <p>";
        // line 17
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["description"] ?? null), 17, $this->source), "html", null, true);
        echo "</p>
  ";
        // line 18
        if (($context["links"] ?? null)) {
            // line 19
            echo "    ";
            // line 20
            echo "    ";
            $context["size"] = (int) floor((twig_length_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["links"] ?? null), 20, $this->source)) / 4));
            // line 21
            echo "    ";
            if (((($context["size"] ?? null) * 4) < twig_length_filter($this->env, ($context["links"] ?? null)))) {
                // line 22
                echo "      ";
                $context["size"] = (($context["size"] ?? null) + 1);
                // line 23
                echo "    ";
            }
            // line 24
            echo "
    ";
            // line 26
            echo "    ";
            $context["count"] = 0;
            // line 27
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["links"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
                // line 28
                echo "      ";
                if ((($context["count"] ?? null) == 0)) {
                    // line 29
                    echo "        ";
                    // line 30
                    echo "        <div class=\"layout-column layout-column--quarter\"><ul>
      ";
                }
                // line 32
                echo "      <li>";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["link"], 32, $this->source), "html", null, true);
                echo "</li>
      ";
                // line 33
                $context["count"] = (($context["count"] ?? null) + 1);
                // line 34
                echo "      ";
                if ((($context["count"] ?? null) >= ($context["size"] ?? null))) {
                    // line 35
                    echo "        ";
                    // line 36
                    echo "        ";
                    $context["count"] = 0;
                    // line 37
                    echo "        </ul></div>
      ";
                }
                // line 39
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "
    ";
            // line 42
            echo "    ";
            if ((($context["count"] ?? null) > 0)) {
                // line 43
                echo "      </ul></div>
    ";
            }
            // line 45
            echo "  ";
        } else {
            // line 46
            echo "    <p>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["empty"] ?? null), 46, $this->source), "html", null, true);
            echo "</p>
  ";
        }
        // line 48
        echo "</div>
";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "core/themes/claro/templates/classy/misc/help-section.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 48,  127 => 46,  124 => 45,  120 => 43,  117 => 42,  114 => 40,  108 => 39,  104 => 37,  101 => 36,  99 => 35,  96 => 34,  94 => 33,  89 => 32,  85 => 30,  83 => 29,  80 => 28,  75 => 27,  72 => 26,  69 => 24,  66 => 23,  63 => 22,  60 => 21,  57 => 20,  55 => 19,  53 => 18,  49 => 17,  45 => 16,  42 => 15,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/claro/templates/classy/misc/help-section.html.twig", "/var/www/html/web/core/themes/claro/templates/classy/misc/help-section.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 18, "set" => 20, "for" => 27);
        static $filters = array("escape" => 16, "length" => 20);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'for'],
                ['escape', 'length'],
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
