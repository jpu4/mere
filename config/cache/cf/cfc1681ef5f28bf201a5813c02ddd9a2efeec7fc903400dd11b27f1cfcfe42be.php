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

/* base.twig */
class __TwigTemplate_d89492494ab36475cb3f570d406095ec950dce5aefb62dbbcb61cb6723953878 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'slider' => [$this, 'block_slider'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>

  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
  <meta name=\"description\" content=\"\">
  <meta name=\"author\" content=\"\">

  <title>";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "name", [], "any", false, false, false, 11), "html", null, true);
        echo "</title>

  <!-- Bootstrap core CSS -->
  <link href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\" rel=\"stylesheet\">

  <!-- Custom styles for this template -->
  <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "path_activetheme", [], "any", false, false, false, 17), "html", null, true);
        echo "/css/modern-business.css\" rel=\"stylesheet\">

</head>

<body>
  <!-- Navigation -->
  <nav class=\"navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top\" style=\"margin-bottom:30px;\">
    <div class=\"container\">
      <a class=\"navbar-brand\" href=\"/\">A Mere Site</a>
      <button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
      <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
        <ul class=\"navbar-nav ml-auto\">
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"/about\">About</a>
          </li>
          <li class=\"nav-item active\">
            <a class=\"nav-link\" href=\"/contact\">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  ";
        // line 42
        $this->displayBlock('slider', $context, $blocks);
        // line 44
        echo "
  
  <!-- Page Content -->
  <div class=\"container\">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class=\"mt-4 mb-3\">";
        // line 50
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "name", [], "any", false, false, false, 50), "html", null, true);
        echo "
      <small>Subheading</small>
    </h1>

    <ol class=\"breadcrumb\">
      <li class=\"breadcrumb-item\">
        <a href=\"/\">Home</a>
      </li>
      <li class=\"breadcrumb-item active\">";
        // line 58
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "name", [], "any", false, false, false, 58), "html", null, true);
        echo "</li>
    </ol>

    ";
        // line 61
        $this->displayBlock('content', $context, $blocks);
        // line 63
        echo "
    
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class=\"py-5 bg-dark\">
    <div class=\"container\">
      <p class=\"m-0 text-center text-white\">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src=\"https://code.jquery.com/jquery-3.4.1.min.js\"></script>
  <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js\"></script>

</body>

</html>
";
    }

    // line 42
    public function block_slider($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 43
        echo "  ";
    }

    // line 61
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 62
        echo "    ";
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 62,  149 => 61,  145 => 43,  141 => 42,  117 => 63,  115 => 61,  109 => 58,  98 => 50,  90 => 44,  88 => 42,  60 => 17,  51 => 11,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.twig", "C:\\dev\\web\\sites\\mere\\themes\\twentytwenty\\base.twig");
    }
}
