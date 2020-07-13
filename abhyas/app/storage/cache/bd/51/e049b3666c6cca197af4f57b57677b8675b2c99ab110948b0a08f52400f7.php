<?php

/* admin/dashboard.twig */
class __TwigTemplate_bd51e049b3666c6cca197af4f57b57677b8675b2c99ab110948b0a08f52400f7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.twig", "admin/dashboard.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
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
        echo "<!-- BEGIN CONTAINER -->
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
        <div class=\"page-content\">
            <!-- BEGIN BREADCRUMBS -->
            <div class=\"breadcrumbs\">
                <h1>Dashboard</h1>
                <ol class=\"breadcrumb\">
                    <li>
                        <a href=\"#\">home</a>
                    </li>
                    <li class=\"active\">Dashboard</li>
                </ol>
            </div>
            <!-- END BREADCRUMBS -->
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class=\"row widget-row\">
                <div class=\"col-md-3\">
                    <!-- BEGIN WIDGET THUMB -->
                    <div class=\"widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered\">
                        <h4 class=\"widget-thumb-heading\">ACTIVE USERS</h4>
                        <div class=\"widget-thumb-wrap\">
                            <i class=\"widget-thumb-icon bg-green icon-bulb\"></i>
                            <div class=\"widget-thumb-body\">
                                <span class=\"widget-thumb-subtitle\"></span>
                                <span class=\"widget-thumb-body-stat\" data-counter=\"counterup\" data-value=\"";
        // line 34
        echo twig_length_filter($this->env, (isset($context["users"]) ? $context["users"] : null));
        echo "\">0</span>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET THUMB -->
                </div>
                <div class=\"col-md-3\">
                    <!-- BEGIN WIDGET THUMB -->
                    <div class=\"widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered\">
                        <h4 class=\"widget-thumb-heading\">PAGES</h4>
                        <div class=\"widget-thumb-wrap\">
                            <i class=\"widget-thumb-icon bg-red icon-layers\"></i>
                            <div class=\"widget-thumb-body\">
                                <span class=\"widget-thumb-subtitle\"></span>
                                <span class=\"widget-thumb-body-stat\" data-counter=\"counterup\" data-value=\"";
        // line 48
        echo twig_length_filter($this->env, (isset($context["wishes"]) ? $context["wishes"] : null));
        echo "\">0</span>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET THUMB -->
                </div>
              
             
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- BEGIN FOOTER -->
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

    public function getTemplateName()
    {
        return "admin/dashboard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 48,  66 => 34,  37 => 8,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'master.twig' %}

{% block body %}
<!-- BEGIN CONTAINER -->
<div class=\"wrapper\">
    <!-- BEGIN HEADER -->
    <header class=\"page-header\">
        {{include('admin/topbar.twig')}}
    </header>
    <!-- END HEADER -->
    <div class=\"container-fluid\">
        <div class=\"page-content\">
            <!-- BEGIN BREADCRUMBS -->
            <div class=\"breadcrumbs\">
                <h1>Dashboard</h1>
                <ol class=\"breadcrumb\">
                    <li>
                        <a href=\"#\">home</a>
                    </li>
                    <li class=\"active\">Dashboard</li>
                </ol>
            </div>
            <!-- END BREADCRUMBS -->
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class=\"row widget-row\">
                <div class=\"col-md-3\">
                    <!-- BEGIN WIDGET THUMB -->
                    <div class=\"widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered\">
                        <h4 class=\"widget-thumb-heading\">ACTIVE USERS</h4>
                        <div class=\"widget-thumb-wrap\">
                            <i class=\"widget-thumb-icon bg-green icon-bulb\"></i>
                            <div class=\"widget-thumb-body\">
                                <span class=\"widget-thumb-subtitle\"></span>
                                <span class=\"widget-thumb-body-stat\" data-counter=\"counterup\" data-value=\"{{users|length}}\">0</span>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET THUMB -->
                </div>
                <div class=\"col-md-3\">
                    <!-- BEGIN WIDGET THUMB -->
                    <div class=\"widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered\">
                        <h4 class=\"widget-thumb-heading\">PAGES</h4>
                        <div class=\"widget-thumb-wrap\">
                            <i class=\"widget-thumb-icon bg-red icon-layers\"></i>
                            <div class=\"widget-thumb-body\">
                                <span class=\"widget-thumb-subtitle\"></span>
                                <span class=\"widget-thumb-body-stat\" data-counter=\"counterup\" data-value=\"{{wishes|length}}\">0</span>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET THUMB -->
                </div>
              
             
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- BEGIN FOOTER -->
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

{% endblock %}", "admin/dashboard.twig", "");
    }
}
