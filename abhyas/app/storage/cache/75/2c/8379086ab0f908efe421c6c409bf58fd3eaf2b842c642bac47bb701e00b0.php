<?php

/* admin/topbar.twig */
class __TwigTemplate_752c8379086ab0f908efe421c6c409bf58fd3eaf2b842c642bac47bb701e00b0 extends Twig_Template
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
                <!-- <img src=\"";
        // line 16
        echo (isset($context["assetUrl"]) ? $context["assetUrl"] : null);
        echo "images/LOGO2.png\" alt=\"Logo\"> </a> -->
                <h2>Abhyas</h2>
            <!-- END LOGO -->
            <!-- BEGIN TOPBAR ACTIONS -->
            <div class=\"topbar-actions\">
                <!-- BEGIN USER PROFILE -->
                <div class=\"btn-group-img btn-group\">
                    <button type=\"button\" class=\"btn btn-sm md-skip dropdown-toggle\" data-toggle=\"dropdown\" data-hover=\"dropdown\" data-close-others=\"true\">
                        <span class=\"profile-user-name\">Hi, ";
        // line 24
        echo (isset($context["first_name"]) ? $context["first_name"] : null);
        echo "</span>
                        <img class=\"profile-user-picture\" src=\"";
        // line 25
        echo (isset($context["user_image"]) ? $context["user_image"] : null);
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
               <!--  <li id=\"users-menu\" class=\"dropdown dropdown-fw dropdown-fw-disabled\">
                    <a href=\"/users\" class=\"text-uppercase\"> -->
                        <!-- <i class=\"fa fa-users\"></i> Users </a> -->
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
                <!-- </li> -->
                <li id=\"wishes-menu\" class=\"dropdown dropdown-fw dropdown-fw-disabled\">
                    <a href=\"/mathematics\" class=\"text-uppercase\">
                        <i class=\"fa fa-book\"></i> Pages </a>
                </li>               
                <li id=\"staff-menu\" class=\"dropdown dropdown-fw dropdown-fw-disabled\">
                    <a href=\"/staff\" class=\"text-uppercase\">
                     <i class=\"fa fa-users\"></i> Experts </a>
                </li>

               <!--  <li id=\"messages-menu\" class=\"dropdown dropdown-fw dropdown-fw-disabled\">
                    <a href=\"/messages\" class=\"text-uppercase\">
                        <i class=\"fa fa-comment\"></i> Messages </a>
                </li>
                  <li id=\"messages-menu\" class=\"dropdown dropdown-fw dropdown-fw-disabled\">
                    <a href=\"/comments\" class=\"text-uppercase\">
                        <i class=\"fa fa-comments-o\"></i> Comments </a>
                </li>
                    <li id=\"messages-menu\" class=\"dropdown dropdown-fw dropdown-fw-disabled\">
                    <a href=\"/categories\" class=\"text-uppercase\">
                        <i class=\"fa fa-list-alt\"></i> Category </a>
                </li> -->
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
        return array (  51 => 25,  47 => 24,  36 => 16,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<nav class=\"navbar mega-menu\" role=\"navigation\">
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
                <!-- <img src=\"{{assetUrl}}images/LOGO2.png\" alt=\"Logo\"> </a> -->
                <h2>Abhyas</h2>
            <!-- END LOGO -->
            <!-- BEGIN TOPBAR ACTIONS -->
            <div class=\"topbar-actions\">
                <!-- BEGIN USER PROFILE -->
                <div class=\"btn-group-img btn-group\">
                    <button type=\"button\" class=\"btn btn-sm md-skip dropdown-toggle\" data-toggle=\"dropdown\" data-hover=\"dropdown\" data-close-others=\"true\">
                        <span class=\"profile-user-name\">Hi, {{first_name}}</span>
                        <img class=\"profile-user-picture\" src=\"{{user_image}}\" alt=\"\"> </button>
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
               <!--  <li id=\"users-menu\" class=\"dropdown dropdown-fw dropdown-fw-disabled\">
                    <a href=\"/users\" class=\"text-uppercase\"> -->
                        <!-- <i class=\"fa fa-users\"></i> Users </a> -->
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
                <!-- </li> -->
                <li id=\"wishes-menu\" class=\"dropdown dropdown-fw dropdown-fw-disabled\">
                    <a href=\"/mathematics\" class=\"text-uppercase\">
                        <i class=\"fa fa-book\"></i> Pages </a>
                </li>               
                <li id=\"staff-menu\" class=\"dropdown dropdown-fw dropdown-fw-disabled\">
                    <a href=\"/staff\" class=\"text-uppercase\">
                     <i class=\"fa fa-users\"></i> Experts </a>
                </li>

               <!--  <li id=\"messages-menu\" class=\"dropdown dropdown-fw dropdown-fw-disabled\">
                    <a href=\"/messages\" class=\"text-uppercase\">
                        <i class=\"fa fa-comment\"></i> Messages </a>
                </li>
                  <li id=\"messages-menu\" class=\"dropdown dropdown-fw dropdown-fw-disabled\">
                    <a href=\"/comments\" class=\"text-uppercase\">
                        <i class=\"fa fa-comments-o\"></i> Comments </a>
                </li>
                    <li id=\"messages-menu\" class=\"dropdown dropdown-fw dropdown-fw-disabled\">
                    <a href=\"/categories\" class=\"text-uppercase\">
                        <i class=\"fa fa-list-alt\"></i> Category </a>
                </li> -->
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
</nav>", "admin/topbar.twig", "");
    }
}
