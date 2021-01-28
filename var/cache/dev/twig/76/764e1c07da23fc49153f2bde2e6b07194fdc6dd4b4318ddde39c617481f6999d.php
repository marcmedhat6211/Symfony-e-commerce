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

/* home/products_categories.html.twig */
class __TwigTemplate_6778e73dee6aaef459ecc2d312613827a54d61fc816f78685cc2bbff36300dd4 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/products_categories.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/products_categories.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "home/products_categories.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 5
        echo "<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/home.css"), "html", null, true);
        echo "\">
<link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/sidenav.css"), "html", null, true);
        echo "\">

<!-- getting the ids to use them in js file -->
";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 9, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 10
            echo "    <div hidden data-product-id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "id", [], "any", false, false, false, 10), "html", null, true);
            echo "\"></div>
    <div hidden data-product-code=\"";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "code", [], "any", false, false, false, 11), "html", null, true);
            echo "\"></div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "
<div class=\"sidenav\">
        <h3 style=\"text-align: center;\">Categories</h3>
        ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 16, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 17
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home.products_category", ["id" => twig_get_attribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 17)]), "html", null, true);
            echo "\" id=\"categories\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 17), "html", null, true);
            echo "</a>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "    </div>
<section id=\"products\" class=\"products\">
    <div class=\"container\">
        <div class=\"section-header\">
            <h2 style=\"text-align: center;\">Our Products</h2>
        </div>
        <!--/.section-header-->
        <div class=\"products-content\">
            <div class=\"row\">
                ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 28, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 29
            echo "                <div class=\"col-md-3 col-sm-4\">
                    <div class=\"single-new-arrival\">
                        <div class=\"single-new-arrival-bg\">
                                <img class=\"test\" src=\"";
            // line 32
            echo twig_escape_filter($this->env, ("/uploads/" . twig_get_attribute($this->env, $this->source, $context["product"], "main_image", [], "any", false, false, false, 32)), "html", null, true);
            echo "\"
                                alt=\"products images\">
                            <div class=\"single-new-arrival-bg-overlay\"></div>
                        </div>
                        <h4><a style=\"text-decoration: none;\" data-product-name=\"";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 36), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("product.show", ["id" => twig_get_attribute($this->env, $this->source, $context["product"], "id", [], "any", false, false, false, 36)]), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 36), "html", null, true);
            echo "</a></h4>
                        <p class=\"arrival-product-price\">\$";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 37), "html", null, true);
            echo "</p>
                    </div>
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "            </div>
        </div>
    </div>
</section>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "home/products_categories.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 41,  151 => 37,  143 => 36,  136 => 32,  131 => 29,  127 => 28,  116 => 19,  105 => 17,  101 => 16,  96 => 13,  88 => 11,  83 => 10,  79 => 9,  73 => 6,  68 => 5,  58 => 4,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}


{% block body %}
<link rel=\"stylesheet\" href=\"{{ asset('css/home.css') }}\">
<link rel=\"stylesheet\" href=\"{{ asset('css/sidenav.css') }}\">

<!-- getting the ids to use them in js file -->
{% for product in products %}
    <div hidden data-product-id=\"{{ product.id }}\"></div>
    <div hidden data-product-code=\"{{ product.code }}\"></div>
{% endfor %}

<div class=\"sidenav\">
        <h3 style=\"text-align: center;\">Categories</h3>
        {% for category in categories %}
            <a href=\"{{ path('home.products_category', {id: category.id}) }}\" id=\"categories\">{{ category.name }}</a>
        {% endfor %}
    </div>
<section id=\"products\" class=\"products\">
    <div class=\"container\">
        <div class=\"section-header\">
            <h2 style=\"text-align: center;\">Our Products</h2>
        </div>
        <!--/.section-header-->
        <div class=\"products-content\">
            <div class=\"row\">
                {% for product in products %}
                <div class=\"col-md-3 col-sm-4\">
                    <div class=\"single-new-arrival\">
                        <div class=\"single-new-arrival-bg\">
                                <img class=\"test\" src=\"{{ '/uploads/' ~ product.main_image }}\"
                                alt=\"products images\">
                            <div class=\"single-new-arrival-bg-overlay\"></div>
                        </div>
                        <h4><a style=\"text-decoration: none;\" data-product-name=\"{{ product.name }}\" href=\"{{ path('product.show', {id: product.id}) }}\">{{ product.name }}</a></h4>
                        <p class=\"arrival-product-price\">\${{ product.price }}</p>
                    </div>
                </div>
                {% endfor %}
            </div>
        </div>
    </div>
</section>
{% endblock %}", "home/products_categories.html.twig", "/home/marc/Desktop/Symfony-e-commerce/templates/home/products_categories.html.twig");
    }
}
