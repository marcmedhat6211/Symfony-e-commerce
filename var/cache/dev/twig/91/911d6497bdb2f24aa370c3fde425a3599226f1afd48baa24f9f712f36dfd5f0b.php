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

/* product/show.html.twig */
class __TwigTemplate_6dccae3dd47bac3517d9dd0b8e3656e6f10787ffdab2db3108a3d05a1598831d extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "product/show.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "product/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "product/show.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/main.css"), "html", null, true);
        echo "\">

<br><br>
<div class=\"column\">
  <div class=\"card\">
    <h2>";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 9, $this->source); })()), "name", [], "any", false, false, false, 9), "html", null, true);
        echo "</h2>
    <h5>\$";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 10, $this->source); })()), "price", [], "any", false, false, false, 10), "html", null, true);
        echo "</h5>
    <br>
    <h6><strong>Product Code: </strong>";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 12, $this->source); })()), "code", [], "any", false, false, false, 12), "html", null, true);
        echo "</h6>
    <h6><strong>Left in stock: </strong>";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 13, $this->source); })()), "stock", [], "any", false, false, false, 13), "html", null, true);
        echo "</h6>
    <br>
    <h3 style=\"text-align: center;\">Accessories</h3>
    ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["accessories"]) || array_key_exists("accessories", $context) ? $context["accessories"] : (function () { throw new RuntimeError('Variable "accessories" does not exist.', 16, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["accessory"]) {
            // line 17
            echo "      <h6><strong>Title: </strong>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["accessory"], "title", [], "any", false, false, false, 17), "html", null, true);
            echo "</h6>
      <h6><strong>Stock: </strong>";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["accessory"], "stock", [], "any", false, false, false, 18), "html", null, true);
            echo "</h6>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['accessory'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "    <br>
    <p>";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 21, $this->source); })()), "description", [], "any", false, false, false, 21), "html", null, true);
        echo "</p>
  </div>
</div>
    <!-- <div class=\"row\"> -->
    ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["images"]) || array_key_exists("images", $context) ? $context["images"] : (function () { throw new RuntimeError('Variable "images" does not exist.', 25, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 26
            echo "    <div class=\"column\">
      <img style=\"height: 70%; width:30%\" src=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("/uploads/" . $context["image"])), "html", null, true);
            echo "\" alt=\"\"
        onclick=\"myFunction(this);\">
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "<!-- </div> -->
<!-- </div> -->

<div class=\"container\">
  <img id=\"expandedImg\" style=\"width:50%\">
  <div id=\"imgtext\"></div>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "product/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 31,  130 => 27,  127 => 26,  123 => 25,  116 => 21,  113 => 20,  105 => 18,  100 => 17,  96 => 16,  90 => 13,  86 => 12,  81 => 10,  77 => 9,  68 => 4,  58 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends('base.html.twig') %}

{% block body %}
<link rel=\"stylesheet\" href=\"{{ asset('css/main.css') }}\">

<br><br>
<div class=\"column\">
  <div class=\"card\">
    <h2>{{ product.name }}</h2>
    <h5>\${{ product.price }}</h5>
    <br>
    <h6><strong>Product Code: </strong>{{ product.code }}</h6>
    <h6><strong>Left in stock: </strong>{{ product.stock }}</h6>
    <br>
    <h3 style=\"text-align: center;\">Accessories</h3>
    {% for accessory in accessories %}
      <h6><strong>Title: </strong>{{ accessory.title }}</h6>
      <h6><strong>Stock: </strong>{{ accessory.stock }}</h6>
    {% endfor %}
    <br>
    <p>{{ product.description }}</p>
  </div>
</div>
    <!-- <div class=\"row\"> -->
    {% for image in images %}
    <div class=\"column\">
      <img style=\"height: 70%; width:30%\" src=\"{{ asset('/uploads/' ~ image) }}\" alt=\"\"
        onclick=\"myFunction(this);\">
    </div>
    {% endfor %}
<!-- </div> -->
<!-- </div> -->

<div class=\"container\">
  <img id=\"expandedImg\" style=\"width:50%\">
  <div id=\"imgtext\"></div>
</div>
{% endblock %}", "product/show.html.twig", "/home/marc/Desktop/Symfony-e-commerce/templates/product/show.html.twig");
    }
}
