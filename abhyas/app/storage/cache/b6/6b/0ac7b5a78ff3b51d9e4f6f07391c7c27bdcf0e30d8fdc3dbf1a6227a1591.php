<?php

/* admin/topbar.twig */
class __TwigTemplate_b66b0ac7b5a78ff3b51d9e4f6f07391c7c27bdcf0e30d8fdc3dbf1a6227a1591 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<nav class=\"navbar mega-menu\" role=\"navigation\">
    <div class=\"container-fluid\">
        <div class=\"clearfix navbar-fixed-top\">
            <!-- Brand and toggle get grouped for better mobile display -->
            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-responsive-collapse\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"toggle-icon\">
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </span>
            </button>
            <!-- End Toggle Button -->
            <!-- BEGIN LOGO -->
            <a id=\"index\" class=\"page-logo\" href=\"/\">
                <img src=\"";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["assetUrl"]) ? $context["assetUrl"] : null), "html", null, true);
        echo "images/LOGO2.png\" alt=\"Logo\"> </a>
            <!-- END LOGO -->
            <!-- BEGIN TOPBAR ACTIONS -->
            <div class=\"topbar-actions\">
                <!-- BEGIN USER PROFILE -->
                <div class=\"btn-group-img btn-group\">
                    <button type=\"button\" class=\"btn btn-sm md-skip dropdown-toggle\" data-toggle=\"dropdown\" data-hover=\"dropdown\" data-close-others=\"true\">
                        <span class=\"profile-user-name\">Hi, ";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["first_name"]) ? $context["first_name"] : null), "html", null, true);
        echo "</span>
                        <img class=\"profile-user-picture\" src=\"";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["user_image"]) ? $context["user_image"] : null), "html", null, true);
        echo "\" alt=\"\"> </button>
                    <ul class=\"dropdown-menu-v2\" role=\"menu\">
                        <li>
                            <a href=\"/profile\">
                                <i class=\"icon-user\"></i> My Profile
                            </a>
                        </li>
                        <li>
                            <a href=\"/logout\">
                                <i class=\"icon-key\"></i> Log Out </a>
                        </li>
                    </ul>
                </div>
                <!-- END USER PROFILE -->
            </div>
            <!-- END TOPBAR ACTIONS -->
        </div>
        <!-- BEGIN HEADER MENU -->
        <div id=\"navigationMenu\" class=\"nav-collapse collapse navbar-collapse navbar-responsive-collapse\">
            <ul class=\"nav navbar-nav\">
                <li id=\"admin-menu\" class=\"dropdown dropdown-fw dropdown-fw-disabled\">
                    <a href=\"/admin\" class=\"text-uppercase\">
                        <i class=\"fa fa-tachometer\"></i> Dashboard </a>
                </li>
                <li id=\"users-menu\" class=\"dropdown dropdown-fw dropdown-fw-disabled\">
                    <a href=\"/users\" class=\"text-uppercase\">
                        <i class=\"fa fa-users\"></i> Users </a>
                   <!--  <ul class=\"dropdown-menu dropdown-menu-fw\">
                        <li>
                            <a class=\"btn default blue-stripe\" data-toggle=\"modal\" href=\"#AddUser\"> <i class=\"fa fa-plus\"></i> Add </a>
                        </li>
                        <li>
                            <a class=\"btn default red-stripe\" href=\"javascript:;\"> <i class=\"fa fa-remove\"></i> Delete </a>
                        </li>
                        <li>
                            <a class=\"btn default dark-stripe\" href=\"javascript:;\"> <i class=\"fa fa-power-off\"></i> Deactivate </a>
                        </li>
                    </ul> -->
                </li>
                <li id=\"wishes-menu\" class=\"dropdown dropdown-fw dropdown-fw-disabled\">
                    <a href=\"/wishes\" class=\"text-uppercase\">
                        <i class=\"fa fa-heart\"></i> Wishes </a>
                </li>
                <li id=\"messages-menu\" class=\"dropdown dropdown-fw dropdown-fw-disabled\">
                    <a href=\"/messages\" class=\"text-uppercase\">
                        <i class=\"fa fa-comment\"></i> Messages </a>
                </li>
                <li id=\"profile-menu\" class=\"dropdown dropdown-fw dropdown-fw-disabled  \">
                    <a href=\"/profile\" class=\"text-uppercase\">
                        <i class=\"fa fa-user\"></i> Account</a>
                    <ul class=\"dropdown-menu dropdown-menu-fw\">
                        <li>
                            <a href=\"/profile\">
                                <i class=\"fa fa-user\"></i> Profile </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END HEADER MENU -->
    </div>
<!--/container-->
</nav>";
    }

    public function getTemplateName()
    {
        return "admin/topbar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 24,  46 => 23,  19 => 1,  149 => 30,  141 => 41,  136 => 40,  125 => 38,  121 => 37,  118 => 36,  109 => 34,  105 => 33,  101 => 31,  99 => 30,  95 => 28,  84 => 26,  80 => 25,  75 => 24,  66 => 22,  54 => 16,  36 => 16,  25 => 4,  20 => 1,  68 => 14,  65 => 13,  62 => 21,  47 => 11,  45 => 12,  38 => 8,  32 => 8,  29 => 3,  466 => 349,  453 => 347,  449 => 346,  436 => 336,  389 => 291,  374 => 283,  367 => 279,  360 => 275,  350 => 267,  346 => 265,  342 => 263,  340 => 262,  335 => 260,  331 => 258,  327 => 257,  323 => 255,  321 => 254,  316 => 252,  310 => 251,  306 => 250,  299 => 246,  292 => 243,  288 => 242,  128 => 84,  115 => 82,  111 => 81,  31 => 3,  28 => 2,);
    }
}
