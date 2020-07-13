<?php

/* admin/index.twig */
class __TwigTemplate_6e7f69d76f29d42e5c17c7f9d8ddb5830fb6085ab77f98a5de5e725d1bf14f0f extends Twig_Template
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
        return array (  68 => 14,  65 => 13,  62 => 12,  47 => 15,  45 => 12,  38 => 8,  32 => 4,  29 => 3,  423 => 340,  376 => 295,  361 => 287,  354 => 283,  347 => 279,  335 => 270,  330 => 268,  326 => 267,  320 => 264,  313 => 260,  306 => 257,  302 => 256,  145 => 101,  132 => 99,  128 => 98,  31 => 3,  28 => 2,);
    }
}
