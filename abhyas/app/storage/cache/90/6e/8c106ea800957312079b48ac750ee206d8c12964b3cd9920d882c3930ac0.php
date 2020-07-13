<?php

/* admin/index.twig */
class __TwigTemplate_906e8c106ea800957312079b48ac750ee206d8c12964b3cd9920d882c3930ac0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("master.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "master.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <!-- BEGIN CONTAINER -->
    <div class=\"wrapper\">
        <!-- BEGIN HEADER -->
        <header class=\"page-header\">
            ";
        // line 8
        echo twig_include($this->env, $context, "admin/topbar.twig");
        echo "
        </header>
        <!-- END HEADER -->
        <div class=\"container-fluid\">
            ";
        // line 12
        $this->displayBlock('content', $context, $blocks);
        // line 15
        echo "            <!-- BEGIN FOOTER -->
            <p class=\"copyright\"> 2017 &copy; 
                <a target=\"_blank\" href=\"javascript:void(0)\">WISHTRU</a> 
            </p>
            <a href=\"#index\" class=\"go2top\">
                <i class=\"icon-arrow-up\"></i>
            </a>
            <!-- END FOOTER -->
        </div>
    </div>
    <!-- END CONTAINER -->
";
    }

    // line 12
    public function block_content($context, array $blocks = array())
    {
        // line 13
        echo "                ";
        $this->env->loadTemplate("admin/dashboard.twig")->display($context);
        // line 14
        echo "            ";
    }

    public function getTemplateName()
    {
        return "admin/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 14,  65 => 13,  62 => 12,  47 => 15,  45 => 12,  38 => 8,  32 => 4,  29 => 3,  466 => 349,  453 => 347,  449 => 346,  436 => 336,  389 => 291,  374 => 283,  367 => 279,  360 => 275,  350 => 267,  346 => 265,  342 => 263,  340 => 262,  335 => 260,  331 => 258,  327 => 257,  323 => 255,  321 => 254,  316 => 252,  310 => 251,  306 => 250,  299 => 246,  292 => 243,  288 => 242,  128 => 84,  115 => 82,  111 => 81,  31 => 3,  28 => 2,);
    }
}
