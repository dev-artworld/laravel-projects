<?php

/* staff/view.twig */
class __TwigTemplate_1f78d99bf46fa7cbe795aabd921d5c0dd653889963db734224b22e8dc016a842 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/index.twig", "staff/view.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "admin/index.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "<div class=\"page-content\">
    <!-- BEGIN BREADCRUMBS -->
    <div class=\"breadcrumbs\">
        <!--<h1>Campaigns</h1>-->
        <ol class=\"breadcrumb\">
            <li>
                <a href=\"/admin\">Dashboard</a>
            </li>
            <li>
                <a href=\"/beacons\">Beacon</a>
            </li>
            <li class=\"active\">View Beacon</li>
        </ol>
        <!-- Sidebar Toggle Button -->
        <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".page-sidebar\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"toggle-icon\">
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </span>
        </button>
        <!-- Sidebar Toggle Button -->
    </div>
    <!-- END BREADCRUMBS -->
    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
    <div class=\"page-content-container\">
        <div class=\"page-content-row\">
            <!-- BEGIN PAGE SIDEBAR -->
            <div class=\"page-sidebar\">
                <nav class=\"navbar\" role=\"navigation\">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <ul class=\"nav navbar-nav margin-bottom-35\">
                    <h3>Quick Actions</h3>
                     <ul class=\"nav navbar-nav\">
                 <li>
                    <a href=\"/admin\">
                      <i class=\"fa fa-tachometer\"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href=\"/users\">
                    <i class=\"fa fa-users\"></i> Users
                    </a>
                 </li>
                 <li>
                    <a href=\"/profile\">
                      <i class=\"fa fa-user\"></i> Profile 
                    </a>
                 </li>
                  <li>
                    <a href=\"/mathematics\">
                      <i class=\"fa fa-heart\"></i> Pages
                    </a>
                 </li>
                     <li>
                    <a href=\"/categories\">
                      <i class=\"fa fa-heart\"></i> Category
                    </a>
                 </li>
                    <li>
                    <a href=\"/staff \">
                      <i class=\"fa fa-users\"></i> Staff
                    </a>
                 </li>
                     <li>
                    <a href=\"/comments \">
                      <i class=\"fa fa-comments-o\"></i> Comments
                    </a>
                 </li>
              </ul>
                    <!-- beacon -->
 <!--                    <div id=\"beacon\" class=\"modal fade\" tabindex=\"-1\" data-width=\"450\">
                        <div class=\"modal-header\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\"></button>
                                <h4 class=\"modal-title\">Add Beacon</h4>
                        </div>
                        <div class=\"modal-body\">
                            <div class=\"alert alert-danger display-none\">
                                <button class=\"close\" data-dismiss=\"alert\"></button> You have some form errors. Please check below. </div>
                            <div class=\"alert alert-success display-none\">
                                <button class=\"close\" data-dismiss=\"alert\"></button> Your form validation is successful! </div>
                            <div class=\"row\">
                                <div class=\"col-md-12\">
                                    <form method=\"POST\" action=\"#\" name=\"beacon-form\" id=\"BeaconForm\" >
                                        <input type=\"hidden\" name=\"user_id\" value=\"";
        // line 89
        echo ($context["user_id"] ?? null);
        echo "\">
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">Name
                                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <input placeholder=\"Beacon Name\" name=\"beacon_name\" type=\"text\" class=\"form-control\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">ID
                                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <input placeholder=\"Beacon ID\" name=\"beacon_id\" type=\"text\" class=\"form-control\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">Major
                                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <input placeholder=\"Beacon Major\" name=\"beacon_major\" type=\"text\" class=\"form-control\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">Minor
                                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <input placeholder=\"Beacon Minor\" name=\"beacon_minor\" type=\"text\" class=\"form-control\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class=\"modal-footer\">
                            <button type=\"button\" data-dismiss=\"modal\" class=\"btn btn-outline dark\">Cancel</button>
                            <button data-method=\"POST\" id=\"beacon-submit-form\" type=\"button\" class=\"btn green\">Add Beacon</button>
                        </div>
                    </div> -->
                      <!-- location -->
<!--                     <div data-width=\"450\" tabindex=\"-1\" class=\"modal fade\" id=\"location\">
                        <div class=\"modal-header\">
                            <button aria-hidden=\"true\" data-dismiss=\"modal\" class=\"close\" type=\"button\"></button>
                                <h4 class=\"modal-title\">Add Location</h4>
                        </div>
                        <div class=\"modal-body\">
                            <div class=\"alert alert-danger display-none\">
                                <button class=\"close\" data-dismiss=\"alert\"></button> You have some form errors. Please check below. </div>
                            <div class=\"alert alert-success display-none\">
                                <button class=\"close\" data-dismiss=\"alert\"></button> Your form validation is successful! </div>
                            <div class=\"row\">
                                <div class=\"col-md-12\">
                                    <form method=\"POST\" action=\"#\" name=\"location-form\" id=\"LocationForm\" >
                                        <input type=\"hidden\" name=\"user_id\" value=\"";
        // line 161
        echo ($context["user_id"] ?? null);
        echo "\">
                                        <input id=\"street_number\" type=\"hidden\" name=\"\">
                                        <input id=\"sublocality\" type=\"hidden\" name=\"\">
                                        <input id=\"administrative_area2\" type=\"hidden\" name=\"\">
                                        <input id=\"country\" type=\"hidden\" name=\"\">
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">Address
                                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <input id=\"autocomplete\" placeholder=\"Enter your address\" onfocus=\"geolocate()\" class=\"form-control\" value=\"\" name=\"address\" autocomplete=\"off\" type=\"text\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">Address 2
                                                       
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <input id=\"route\" placeholder=\"Address 2\" name=\"address_2\" type=\"text\" class=\"form-control\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">City
                                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <input id=\"locality\" placeholder=\"City\" name=\"city\" type=\"text\" class=\"form-control\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">State
                                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <input id=\"administrative_area_level_1\" placeholder=\"State\" name=\"state\" type=\"text\" class=\"form-control\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">Postal Code
                                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <input id=\"postal_code\" placeholder=\"Postal Code\" name=\"postal_code\" type=\"text\" class=\"form-control\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">Status
                                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <select name=\"status\" class=\"form-control\">
                                                            <option value=\"active\">Active</option>
                                                            <option value=\"inactive\">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class=\"modal-footer\">
                            <button class=\"btn btn-outline dark\" data-dismiss=\"modal\" type=\"button\">Cancel</button>
                            <button data-method=\"POST\" id=\"location-submit-form\" class=\"btn green\" type=\"button\">Add Location</button>
                        </div>
                    </div> -->
                </nav>
            </div>
            <!-- END PAGE SIDEBAR -->
            <div class=\"page-content-col\">
                <!-- BEGIN PAGE BASE CONTENT -->
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class=\"portlet light bordered\" id=\"form_wizard_1\">
                        <input id=\"beacon_id\" type=\"hidden\" name=\"id\" value=\"";
        // line 260
        echo $this->getAttribute(($context["beacon"] ?? null), "id", array());
        echo "\" />
                            <div class=\"portlet-title\">
                                <div class=\"caption\">
                                    <i class=\"fa fa-rss\"></i>
                                    <span class=\"caption-subject font-green bold uppercase\"> Staff
                                    </span>
                                </div>                                                
                            </div>
                            <div class=\"row\">
                                <div class=\"caption\">
                                    <label class=\"control-label col-md-12\">Name: 
                                    <span class=\"caption-subject font-green bold uppercase\"> ";
        // line 271
        echo twig_escape_filter($this->env, $this->getAttribute(($context["users"] ?? null), "first_name", array()));
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["users"] ?? null), "last_name", array()));
        echo "
                                    </span></label>
                                </div>                                                
                            </div>
                            <div class=\"row\">
                                <div class=\"caption\">
                                    <label class=\"control-label col-md-12\">Email ID: 
                                    <span class=\"caption-subject font-green bold uppercase\"> ";
        // line 278
        echo twig_escape_filter($this->env, $this->getAttribute(($context["users"] ?? null), "email", array()));
        echo "
                                    </span></label>
                                </div>                                                
                            </div>
                            <div class=\"row\">
                                <div class=\"caption\">
                                    <label class=\"control-label col-md-12\">Subjects: 
                                    <span class=\"caption-subject font-green bold uppercase\">";
        // line 285
        echo twig_escape_filter($this->env, $this->getAttribute(($context["users"] ?? null), "subject", array()));
        echo "
                                    </span></label>
                                </div>                                                
                            </div>
                            <div class=\"row\">
                                <div class=\"caption\">
                                   <label class=\"control-label col-md-12\">Status: 
                                ";
        // line 292
        if ((twig_escape_filter($this->env, $this->getAttribute(($context["users"] ?? null), "status", array())) == "1")) {
            // line 293
            echo "                                    <span class=\"label label-sm label-success\"> Active </span>
                                    ";
        } else {
            // line 295
            echo "                                    <span class=\"label label-sm label-danger\"> Inactive </span>
                                    ";
        }
        // line 297
        echo "                                       </label>
                                </div>                                                
                            </div>
                           
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
                <!-- END PAGE BASE CONTENT -->
            </div>
        </div>
    </div>
    <!-- END SIDEBAR CONTENT LAYOUT -->
</div>
";
    }

    public function getTemplateName()
    {
        return "staff/view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  352 => 297,  348 => 295,  344 => 293,  342 => 292,  332 => 285,  322 => 278,  310 => 271,  296 => 260,  194 => 161,  119 => 89,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'admin/index.twig' %}
{% block content %}
<div class=\"page-content\">
    <!-- BEGIN BREADCRUMBS -->
    <div class=\"breadcrumbs\">
        <!--<h1>Campaigns</h1>-->
        <ol class=\"breadcrumb\">
            <li>
                <a href=\"/admin\">Dashboard</a>
            </li>
            <li>
                <a href=\"/beacons\">Beacon</a>
            </li>
            <li class=\"active\">View Beacon</li>
        </ol>
        <!-- Sidebar Toggle Button -->
        <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".page-sidebar\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"toggle-icon\">
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </span>
        </button>
        <!-- Sidebar Toggle Button -->
    </div>
    <!-- END BREADCRUMBS -->
    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
    <div class=\"page-content-container\">
        <div class=\"page-content-row\">
            <!-- BEGIN PAGE SIDEBAR -->
            <div class=\"page-sidebar\">
                <nav class=\"navbar\" role=\"navigation\">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <ul class=\"nav navbar-nav margin-bottom-35\">
                    <h3>Quick Actions</h3>
                     <ul class=\"nav navbar-nav\">
                 <li>
                    <a href=\"/admin\">
                      <i class=\"fa fa-tachometer\"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href=\"/users\">
                    <i class=\"fa fa-users\"></i> Users
                    </a>
                 </li>
                 <li>
                    <a href=\"/profile\">
                      <i class=\"fa fa-user\"></i> Profile 
                    </a>
                 </li>
                  <li>
                    <a href=\"/mathematics\">
                      <i class=\"fa fa-heart\"></i> Pages
                    </a>
                 </li>
                     <li>
                    <a href=\"/categories\">
                      <i class=\"fa fa-heart\"></i> Category
                    </a>
                 </li>
                    <li>
                    <a href=\"/staff \">
                      <i class=\"fa fa-users\"></i> Staff
                    </a>
                 </li>
                     <li>
                    <a href=\"/comments \">
                      <i class=\"fa fa-comments-o\"></i> Comments
                    </a>
                 </li>
              </ul>
                    <!-- beacon -->
 <!--                    <div id=\"beacon\" class=\"modal fade\" tabindex=\"-1\" data-width=\"450\">
                        <div class=\"modal-header\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\"></button>
                                <h4 class=\"modal-title\">Add Beacon</h4>
                        </div>
                        <div class=\"modal-body\">
                            <div class=\"alert alert-danger display-none\">
                                <button class=\"close\" data-dismiss=\"alert\"></button> You have some form errors. Please check below. </div>
                            <div class=\"alert alert-success display-none\">
                                <button class=\"close\" data-dismiss=\"alert\"></button> Your form validation is successful! </div>
                            <div class=\"row\">
                                <div class=\"col-md-12\">
                                    <form method=\"POST\" action=\"#\" name=\"beacon-form\" id=\"BeaconForm\" >
                                        <input type=\"hidden\" name=\"user_id\" value=\"{{user_id}}\">
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">Name
                                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <input placeholder=\"Beacon Name\" name=\"beacon_name\" type=\"text\" class=\"form-control\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">ID
                                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <input placeholder=\"Beacon ID\" name=\"beacon_id\" type=\"text\" class=\"form-control\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">Major
                                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <input placeholder=\"Beacon Major\" name=\"beacon_major\" type=\"text\" class=\"form-control\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">Minor
                                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <input placeholder=\"Beacon Minor\" name=\"beacon_minor\" type=\"text\" class=\"form-control\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class=\"modal-footer\">
                            <button type=\"button\" data-dismiss=\"modal\" class=\"btn btn-outline dark\">Cancel</button>
                            <button data-method=\"POST\" id=\"beacon-submit-form\" type=\"button\" class=\"btn green\">Add Beacon</button>
                        </div>
                    </div> -->
                      <!-- location -->
<!--                     <div data-width=\"450\" tabindex=\"-1\" class=\"modal fade\" id=\"location\">
                        <div class=\"modal-header\">
                            <button aria-hidden=\"true\" data-dismiss=\"modal\" class=\"close\" type=\"button\"></button>
                                <h4 class=\"modal-title\">Add Location</h4>
                        </div>
                        <div class=\"modal-body\">
                            <div class=\"alert alert-danger display-none\">
                                <button class=\"close\" data-dismiss=\"alert\"></button> You have some form errors. Please check below. </div>
                            <div class=\"alert alert-success display-none\">
                                <button class=\"close\" data-dismiss=\"alert\"></button> Your form validation is successful! </div>
                            <div class=\"row\">
                                <div class=\"col-md-12\">
                                    <form method=\"POST\" action=\"#\" name=\"location-form\" id=\"LocationForm\" >
                                        <input type=\"hidden\" name=\"user_id\" value=\"{{user_id}}\">
                                        <input id=\"street_number\" type=\"hidden\" name=\"\">
                                        <input id=\"sublocality\" type=\"hidden\" name=\"\">
                                        <input id=\"administrative_area2\" type=\"hidden\" name=\"\">
                                        <input id=\"country\" type=\"hidden\" name=\"\">
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">Address
                                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <input id=\"autocomplete\" placeholder=\"Enter your address\" onfocus=\"geolocate()\" class=\"form-control\" value=\"\" name=\"address\" autocomplete=\"off\" type=\"text\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">Address 2
                                                       
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <input id=\"route\" placeholder=\"Address 2\" name=\"address_2\" type=\"text\" class=\"form-control\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">City
                                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <input id=\"locality\" placeholder=\"City\" name=\"city\" type=\"text\" class=\"form-control\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">State
                                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <input id=\"administrative_area_level_1\" placeholder=\"State\" name=\"state\" type=\"text\" class=\"form-control\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">Postal Code
                                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <input id=\"postal_code\" placeholder=\"Postal Code\" name=\"postal_code\" type=\"text\" class=\"form-control\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"form-group\">
                                                    <label class=\"control-label col-md-12\">Status
                                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                                    </label>
                                                    <div class=\"col-md-12\">
                                                        <select name=\"status\" class=\"form-control\">
                                                            <option value=\"active\">Active</option>
                                                            <option value=\"inactive\">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class=\"modal-footer\">
                            <button class=\"btn btn-outline dark\" data-dismiss=\"modal\" type=\"button\">Cancel</button>
                            <button data-method=\"POST\" id=\"location-submit-form\" class=\"btn green\" type=\"button\">Add Location</button>
                        </div>
                    </div> -->
                </nav>
            </div>
            <!-- END PAGE SIDEBAR -->
            <div class=\"page-content-col\">
                <!-- BEGIN PAGE BASE CONTENT -->
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class=\"portlet light bordered\" id=\"form_wizard_1\">
                        <input id=\"beacon_id\" type=\"hidden\" name=\"id\" value=\"{{ beacon.id }}\" />
                            <div class=\"portlet-title\">
                                <div class=\"caption\">
                                    <i class=\"fa fa-rss\"></i>
                                    <span class=\"caption-subject font-green bold uppercase\"> Staff
                                    </span>
                                </div>                                                
                            </div>
                            <div class=\"row\">
                                <div class=\"caption\">
                                    <label class=\"control-label col-md-12\">Name: 
                                    <span class=\"caption-subject font-green bold uppercase\"> {{ users.first_name|e }} {{ users.last_name|e }}
                                    </span></label>
                                </div>                                                
                            </div>
                            <div class=\"row\">
                                <div class=\"caption\">
                                    <label class=\"control-label col-md-12\">Email ID: 
                                    <span class=\"caption-subject font-green bold uppercase\"> {{ users.email|e }}
                                    </span></label>
                                </div>                                                
                            </div>
                            <div class=\"row\">
                                <div class=\"caption\">
                                    <label class=\"control-label col-md-12\">Subjects: 
                                    <span class=\"caption-subject font-green bold uppercase\">{{ users.subject|e }}
                                    </span></label>
                                </div>                                                
                            </div>
                            <div class=\"row\">
                                <div class=\"caption\">
                                   <label class=\"control-label col-md-12\">Status: 
                                {% if users.status|e == '1' %}
                                    <span class=\"label label-sm label-success\"> Active </span>
                                    {% else %}
                                    <span class=\"label label-sm label-danger\"> Inactive </span>
                                    {% endif %}
                                       </label>
                                </div>                                                
                            </div>
                           
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
                <!-- END PAGE BASE CONTENT -->
            </div>
        </div>
    </div>
    <!-- END SIDEBAR CONTENT LAYOUT -->
</div>
{% endblock %}
", "staff/view.twig", "");
    }
}
