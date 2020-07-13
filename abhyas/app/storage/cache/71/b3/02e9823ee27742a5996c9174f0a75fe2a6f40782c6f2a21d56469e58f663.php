<?php

/* @usergroup/profile/index.twig */
class __TwigTemplate_71b302e9823ee27742a5996c9174f0a75fe2a6f40782c6f2a21d56469e58f663 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("admin/index.twig");

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
        <ol class=\"breadcrumb\">
            <li><a href=\"/admin\">Dashboard</a></li>
            <li><a href=\"javascript:void(0)\">Account</a></li>
            <li class=\"active\">Profile</li>
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
            <div class=\"page-content-col\">
                <!-- BEGIN PAGE BASE CONTENT -->
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <!-- BEGIN PROFILE SIDEBAR -->
                        <div class=\"profile-sidebar\">
                            <!-- PORTLET MAIN -->
                            <div class=\"portlet light profile-sidebar-portlet bordered\">
                                <!-- SIDEBAR USERPIC -->
                                <div class=\"profile-userpic\">
                                    <img id=\"user_picture\" src=\"";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["user_image"]) ? $context["user_image"] : null), "html", null, true);
        echo "\" class=\"img-responsive\" alt=\"\"> </div>
                                <!-- END SIDEBAR USERPIC -->
                                <!-- SIDEBAR USER TITLE -->
                                <div class=\"profile-usertitle\">
                                    <div class=\"profile-usertitle-name\"> ";
        // line 40
        echo twig_escape_filter($this->env, (isset($context["first_name"]) ? $context["first_name"] : null), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["last_name"]) ? $context["last_name"] : null), "html", null, true);
        echo " </div>
                                    <div class=\"profile-usertitle-job\"> ";
        // line 41
        echo twig_escape_filter($this->env, (isset($context["company"]) ? $context["company"] : null), "html", null, true);
        echo " </div>
                                </div>
                                <!-- END SIDEBAR USER TITLE -->
                            </div>
                            <!-- END PORTLET MAIN -->
                        </div>
                        <!-- END BEGIN PROFILE SIDEBAR -->
                        <!-- BEGIN PROFILE CONTENT -->
                        <div class=\"profile-content\">
                            <div class=\"row\">
                                <div class=\"col-md-12\">
                                    <div class=\"portlet light bordered\">
                                        <div class=\"portlet-title tabbable-line\">
                                            <div class=\"caption caption-md\">
                                                <i class=\"icon-globe theme-font hide\"></i>
                                                <span class=\"caption-subject font-blue-madison bold uppercase\">Account Information</span>
                                            </div>
                                            <ul class=\"nav nav-tabs\">
                                                <li class=\"active\">
                                                    <a href=\"#tab_1_1\" data-toggle=\"tab\">Personal Info</a>
                                                </li>
                                                <li>
                                                    <a href=\"#tab_1_2\" data-toggle=\"tab\">Change Logo</a>
                                                </li>
                                                <li>
                                                    <a href=\"#tab_1_3\" data-toggle=\"tab\">Change Password</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class=\"portlet-body\">
                                            <div class=\"tab-content\">
                                                <!-- PERSONAL INFO TAB -->
                                                <div class=\"tab-pane active\" id=\"tab_1_1\">
                                                    <form role=\"form\" id=\"profile-form-data\" method=\"POST\" action=\"https://slim.matchease.com/admin/profile\">
                                                        <input type=\"hidden\" name=\"\" id=\"street_number\" />
                                                        <input type=\"hidden\" name=\"\" id=\"sublocality\" />
                                                        <input type=\"hidden\" name=\"\" id=\"administrative_area2\" />
                                                        <input type=\"hidden\" name=\"\" id=\"country\" />
                                                        <input id=\"user_id\" type=\"hidden\" name=\"id\" value=\"";
        // line 79
        echo twig_escape_filter($this->env, (isset($context["user_id"]) ? $context["user_id"] : null), "html", null, true);
        echo "\" />
                                                        <input type=\"hidden\" name=\"action\" value=\"user_info\" />
                                                        <div class=\"form-group\">
                                                            <label class=\"control-label\">First Name</label>
                                                            <input type=\"text\" id=\"name\" placeholder=\"John\" class=\"form-control\" value=\"";
        // line 83
        echo twig_escape_filter($this->env, (isset($context["first_name"]) ? $context["first_name"] : null), "html", null, true);
        echo "\" name=\"first_name\" /> </div>
                                                        <div class=\"form-group\">
                                                            <label class=\"control-label\">Last Name</label>
                                                            <input type=\"text\" placeholder=\"Doe\" class=\"form-control\" value=\"";
        // line 86
        echo twig_escape_filter($this->env, (isset($context["last_name"]) ? $context["last_name"] : null), "html", null, true);
        echo "\" name=\"last_name\" /> </div>
                                                        <div class=\"form-group\">
                                                            <label class=\"control-label\">Company</label>
                                                            <input type=\"text\" placeholder=\"Google, Inc.\" class=\"form-control\" value=\"";
        // line 89
        echo twig_escape_filter($this->env, (isset($context["company"]) ? $context["company"] : null), "html", null, true);
        echo "\" name=\"company\" /> </div>
                                                        <div class=\"form-group\">
                                                            <label class=\"control-label\">Address</label>
                                                            <input type=\"text\" id=\"autocomplete\" placeholder=\"Enter your address\" onFocus=\"geolocate()\" class=\"form-control\" value=\"";
        // line 92
        echo twig_escape_filter($this->env, (isset($context["address"]) ? $context["address"] : null), "html", null, true);
        echo "\" name=\"address\" />
                                                        </div>
                                                        <div class=\"form-group\">
                                                            <label class=\"control-label\">Address 2</label>
                                                            <input type=\"text\" placeholder=\"Ste#1234\" class=\"form-control\" value=\"";
        // line 96
        echo twig_escape_filter($this->env, (isset($context["address_2"]) ? $context["address_2"] : null), "html", null, true);
        echo "\" id=\"route\" name=\"address_2\" /> </div>
                                                        <div class=\"form-group\">
                                                            <label class=\"control-label\">City</label>
                                                            <input type=\"text\" placeholder=\"Austin\" class=\"form-control\" value=\"";
        // line 99
        echo twig_escape_filter($this->env, (isset($context["city"]) ? $context["city"] : null), "html", null, true);
        echo "\" id=\"locality\" name=\"city\" /> </div>
                                                        <div class=\"form-group\">
                                                            <label class=\"control-label\">State</label>
                                                            <input type=\"text\" placeholder=\"IND\" class=\"form-control\" value=\"";
        // line 102
        echo twig_escape_filter($this->env, (isset($context["state"]) ? $context["state"] : null), "html", null, true);
        echo "\" id=\"administrative_area_level_1\" name=\"state\" />
                                                        </div>
                                                        <div class=\"form-group\">
                                                            <label class=\"control-label\">Postal code / Zip</label>
                                                            <input type=\"text\" placeholder=\"78626\" class=\"form-control\" value=\"";
        // line 106
        echo twig_escape_filter($this->env, (isset($context["zip_code"]) ? $context["zip_code"] : null), "html", null, true);
        echo "\" id=\"postal_code\" name=\"zip_code\" /> </div>
                                                        <div class=\"form-group\">
                                                            <label class=\"control-label\">Phone</label>
                                                            <input type=\"text\" placeholder=\"+1 646 580 DEMO (6284)\" class=\"form-control\" value=\"";
        // line 109
        echo twig_escape_filter($this->env, (isset($context["phone"]) ? $context["phone"] : null), "html", null, true);
        echo "\" name=\"phone\" /> </div>                                                                        
                                                        <div class=\"form-group\">
                                                            <label class=\"control-label\">Website Url</label>
                                                            <input type=\"text\" placeholder=\"https://www.mywebsite.com\" class=\"form-control\" value=\"";
        // line 112
        echo twig_escape_filter($this->env, (isset($context["website"]) ? $context["website"] : null), "html", null, true);
        echo "\" name=\"website\" /> </div>
                                                        <div class=\"margiv-top-10\">
                                                            <a data-method=\"PUT\" href=\"javascript:void(0);\" class=\"btn green\" id=\"btn-user-save\"> Save Changes </a>
                                                            <a href=\"/admin\" class=\"btn default\"> Cancel </a>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- END PERSONAL INFO TAB -->
                                                <!-- CHANGE AVATAR TAB -->
                                                <div class=\"tab-pane\" id=\"tab_1_2\">
                                                    <p> Upload your company logo.  This logo will be use for your campaigns. </p>
                                                    <form id=\"profile-picture-data\" action=\"\" role=\"form\" enctype=\"multipart/form-data\">
                                                        <input id=\"user_id\" type=\"hidden\" name=\"id\" value=\"";
        // line 124
        echo twig_escape_filter($this->env, (isset($context["user_id"]) ? $context["user_id"] : null), "html", null, true);
        echo "\" />
                                                        <input id=\"picture\" type=\"hidden\" name=\"user_image\" value=\"\" />
                                                        <input type=\"hidden\" name=\"action\" value=\"user_pic\" />
                                                        <div class=\"form-group\">
                                                            <div class=\"fileinput fileinput-new\" data-provides=\"fileinput\">
                                                                <div class=\"fileinput-new thumbnail\" style=\"width: 200px; height: 150px;\">
                                                                    <img src=\"https://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image\" alt=\"\" /> </div>
                                                                <div class=\"fileinput-preview fileinput-exists thumbnail\" style=\"max-width: 200px; max-height: 150px;\"> </div>
                                                                <div>
                                                                    <span class=\"btn default btn-file\">
                                                                        <span class=\"fileinput-new\"> Select image </span>
                                                                        <span class=\"fileinput-exists\"> Change </span>
                                                                        <!-- The file input field used as target for the file upload widget -->
                                                                        <input id=\"fileupload\" type=\"file\" name=\"files[]\" multiple> </span>
                                                                    <a href=\"javascript:;\" class=\"btn default fileinput-exists\" data-dismiss=\"fileinput\"> Remove </a>
                                                                </div>
                                                            </div>
                                                            <!-- <div class=\"clearfix margin-top-10\">
                                                                <span class=\"label label-danger\">NOTE! </span><br>
                                                                <span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                            </div> -->
                                                        </div>
                                                        <div class=\"margin-top-10\">
                                                            <a data-method=\"PUT\" href=\"javascript:void(0);\" id=\"btn-profile-picture-save\" class=\"btn green\"> Submit </a>
                                                            <a href=\"/admin\" class=\"btn default\"> Cancel </a>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- END CHANGE AVATAR TAB -->
                                                <!-- CHANGE PASSWORD TAB -->
                                                <div class=\"tab-pane\" id=\"tab_1_3\">
                                                    <form role=\"form\" id=\"user-password-data\" method=\"POST\" action=\"https://slim.matchease.com/admin/profile\">
                                                        <input id=\"user_id\" type=\"hidden\" name=\"id\" value=\"";
        // line 156
        echo twig_escape_filter($this->env, (isset($context["user_id"]) ? $context["user_id"] : null), "html", null, true);
        echo "\" />
                                                        <div class=\"form-group\">
                                                            <label class=\"control-label\">Current Password</label>
                                                            <input type=\"password\" class=\"form-control\" /> </div>
                                                        <div class=\"form-group\">
                                                            <label class=\"control-label\">New Password</label>
                                                            <input name=\"password\" type=\"password\" class=\"form-control\" /> </div>
                                                        <div class=\"form-group\">
                                                            <label class=\"control-label\">Re-type New Password</label>
                                                            <input type=\"password\" class=\"form-control\" name=\"confirm_password\" /> </div>
                                                        <div class=\"margin-top-10\">
                                                            <a data-method=\"PUT\" href=\"javascript:void(0);\" id=\"btn-user-password-save\" class=\"btn green\"> Change Password </a>
                                                            <a href=\"/admin\" class=\"btn default\"> Cancel </a>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- END CHANGE PASSWORD TAB -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE CONTENT -->
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
        return "@usergroup/profile/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  233 => 156,  198 => 124,  183 => 112,  177 => 109,  171 => 106,  164 => 102,  158 => 99,  152 => 96,  145 => 92,  139 => 89,  133 => 86,  127 => 83,  120 => 79,  79 => 41,  73 => 40,  66 => 36,  31 => 3,  28 => 2,);
    }
}
