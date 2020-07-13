<?php

/* users/index.twig */
class __TwigTemplate_a598225d0622211d2a18869cc3cd897b71b7c4e6fca98a23e651099822220401 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/index.twig", "users/index.twig", 1);
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
         <li class=\"active\">Users</li>
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
                    <a href=\"/wishes\">
                      <i class=\"fa fa-heart\"></i> Wishes 
                    </a>
                 </li>
              </ul>
               <!-- users -->
               <div id=\"AddUser\" class=\"modal fade\" tabindex=\"-1\" data-width=\"450\">
                    <div class=\"modal-header\">
                       <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\"></button>
                       <h4 class=\"modal-title\">Add User</h4>
                    </div>
                    <div class=\"modal-body\">
                       <div class=\"row\">
                          <div class=\"col-md-12\">
                             <form method=\"POST\" action=\"#\" name=\"user-form\" id=\"UserForm\" >
                                
                                <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group\">
                                        <label class=\"control-label col-md-12\">First Name
                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                        </label>
                                        <div class=\"col-md-12\">
                                           <input placeholder=\"First Name\" name=\"first_name\" value=\"\" type=\"text\" class=\"form-control\">
                                        </div>
                                     </div>
                                  </div>
                               </div>

                               <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group\">
                                        <label class=\"control-label col-md-12\">Last Name
                                        <span class=\"required\" aria-required=\"true\"></span>
                                        </label>
                                        <div class=\"col-md-12\">
                                           <input placeholder=\"Last Name\" name=\"last_name\" value=\"\" type=\"text\" class=\"form-control\">
                                        </div>
                                     </div>
                                  </div>
                               </div>

                               <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group\">
                                        <label class=\"control-label col-md-12\">Email Address
                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                        </label>
                                        <div class=\"col-md-12\">
                                           <input placeholder=\"Email Address\" name=\"email\" value=\"\" type=\"text\" class=\"form-control\">
                                        </div>
                                     </div>
                                  </div>
                               </div>

                               <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group\">
                                        <label class=\"control-label col-md-12\">Date of birth
                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                        </label>
                                        <div class=\"col-md-12\">
                                           <input name=\"dob\" type=\"text\" value=\"\" size=\"16\" class=\"form-control form-control-inline date-picker\" placeholder=\"DOB\">
                                        </div>
                                     </div>
                                  </div>
                               </div>

                               <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group last password-strength\">
                                        <label class=\"control-label col-md-12\">Password
                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                        </label>
                                        <div class=\"col-md-12\">
                                           <input id=\"password_strength\" placeholder=\"Password\" name=\"password\" value=\"\" type=\"password\" class=\"form-control\">
                                        </div>
                                     </div>
                                  </div>
                               </div>

                               <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group\">
                                        <label class=\"control-label col-md-12\">Confirm Password
                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                        </label>
                                        <div class=\"col-md-12\">
                                           <input placeholder=\"Confirm Password\" name=\"rpassword\" value=\"\" type=\"password\" class=\"form-control\">
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group\">
                                        <label class=\"control-label col-md-12\">Status
                                        <span class=\"required\" aria-required=\"true\">*</span>
                                        </label>
                                        <div class=\"col-md-12\">
                                           <select class=\"form-control\" name=\"status\">
                                              <option value=\"1\">Active</option>
                                              <option value=\"0\">Inactive</option>
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
                       <button type=\"button\" data-dismiss=\"modal\" class=\"btn btn-outline dark\">Cancel</button>
                       <a data-method=\"POST\" id=\"user-submit-form\" class=\"btn green\" href=\"javascript:;\"> Submit <i class=\"fa fa-user\"></i></a>
                    </div>
                 </div>
             </nav>
         </div>
         <!-- END PAGE SIDEBAR -->
         <div class=\"page-content-col\">
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class=\"row\">
               <div class=\"col-md-12\">
                  <div class=\"action-buttons\" style=\"margin-bottom: 6px;\">
                    <a class=\"btn default blue-stripe\" data-toggle=\"modal\" href=\"#AddUser\"> <i class=\"fa fa-plus\"></i> Add </a>
                    <a class=\"btn default red-stripe delete-button-user\" href=\"javascript:;\"> <i class=\"fa fa-remove\"></i> Delete </a>
                    <a class=\"btn default dark-stripe deactivate-button-user\" href=\"javascript:;\"> <i class=\"fa fa-power-off\"></i> Inactive </a>
                  </div>
                  <!-- BEGIN EXAMPLE TABLE PORTLET-->
                  <div class=\"portlet light bordered\">
                     <div class=\"portlet-title\">
                        <div class=\"caption font-dark\">
                           <i class=\"fa fa-rss\"></i>
                           <span class=\"caption-subject bold uppercase\"> Users </span>
                        </div>
                     </div>
                     <div class=\"portlet-body\">
                        <table class=\"table table-striped table-bordered table-hover table-header-fixed dataTable no-footer users-table\" id=\"sample_1\">
                           <thead>
                              <tr>
                                 <th>
                                    <label class=\"mt-checkbox mt-checkbox-single mt-checkbox-outline\">
                                    <input type=\"checkbox\" class=\"group-checkable\" data-set=\"#sample_1 .checkboxes\" />
                                    <span></span>
                                    </label>
                                 </th>
                                 <th> ID </th>
                                 <th> First name </th>
                                 <th> Last name </th>
                                 <th> Email address </th>
                                 <th> Status </th>
                                 <th> Actions </th>
                              </tr>
                           </thead>
                           <tbody>
                              ";
        // line 208
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 209
            echo "                              <tr row-id=\"";
            echo $this->getAttribute($context["user"], "id", array());
            echo "\" class=\"odd gradeX\">
                                 <td>
                                    <label class=\"mt-checkbox mt-checkbox-single mt-checkbox-outline\">
                                    <input type=\"checkbox\" class=\"checkboxes\" value=\"";
            // line 212
            echo $this->getAttribute($context["user"], "id", array());
            echo "\" />
                                    <span></span>
                                    </label>
                                 </td>
                                 <th> ";
            // line 216
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()));
            echo " </th>
                                 <th> ";
            // line 217
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "first_name", array()));
            echo " </th>
                                 <td> ";
            // line 218
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "last_name", array()));
            echo " </td>
                                 <td> ";
            // line 219
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "email", array()));
            echo " </td>
                                 <td> 
                                    ";
            // line 221
            if ((twig_escape_filter($this->env, $this->getAttribute($context["user"], "status", array())) == "1")) {
                // line 222
                echo "                                    <span class=\"label label-sm label-success\"> Active </span>
                                    ";
            } else {
                // line 224
                echo "                                    <span class=\"label label-sm label-danger\"> Inactive </span>
                                    ";
            }
            // line 226
            echo "                                 </td>
                                 <td>
                                    <div class=\"btn-group\">
                                       <button class=\"btn btn-xs green dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-expanded=\"false\"> Actions
                                       <i class=\"fa fa-angle-down\"></i>
                                       </button>
                                       <ul class=\"dropdown-menu pull-left\" role=\"menu\">
                                         <!-- <li>
                                             <a data-button-icon=\"fa-eye\" data-name=\"View\" data-modal=\"viewBeacon\" data-method=\"GET\" data-user-id=\"";
            // line 234
            echo $this->getAttribute($context["user"], "id", array());
            echo "\" class=\"ShowEditBeacon\" href=\"javascript:void(0)\">
                                             <i class=\"fa fa-eye\"></i>  View  </a>
                                          </li> -->
                                          <li>
                                             <a data-button-icon=\"fa-pencil\" data-name=\"Edit\" data-modal=\"editUser\" data-method=\"GET\" data-user-id=\"";
            // line 238
            echo $this->getAttribute($context["user"], "id", array());
            echo "\" class=\"ShowEditUser\" href=\"javascript:void(0)\">
                                             <i class=\"fa fa-pencil\"></i> Edit </a>
                                          </li>
                                          <li>
                                             <a class=\"button-user-delete\" data-method=\"DELETE\" data-user-id=\"";
            // line 242
            echo $this->getAttribute($context["user"], "id", array());
            echo "\" href=\"javascript:void(0);\">
                                             <i class=\"fa fa-minus-circle\"></i> Delete </a>
                                          </li>
                                       </ul>
                                       <!-- END EXAMPLE TABLE PORTLET-->
                                    </div>
                                 </td>
                              </tr>
                              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 250
        echo "  
                           </tbody>
                        </table>
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
<div class=\"modal fade\" tabindex=\"-1\" data-width=\"450\" id=\"editUser\">
   <div class=\"modal-header\">
      <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\"></button>
      <h4 class=\"modal-title\">Edit User</h4>
   </div>
   <div class=\"modal-body\">
      <div class=\"alert alert-danger display-none\">
         <button class=\"close\" data-dismiss=\"alert\"></button> You have some form errors. Please check below. 
      </div>
      <div class=\"alert alert-success display-none\">
         <button class=\"close\" data-dismiss=\"alert\"></button> Your form validation is successful! 
      </div>
      <div class=\"row\">
         <div class=\"col-md-12\">
            <form method=\"POST\" action=\"#\" id=\"user_update\" name=\"user-form\">
               <input id=\"user_id\" class=\"userid\" type=\"hidden\" name=\"id\" value=\"";
        // line 279
        echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id", array());
        echo "\" />
               <div class=\"row\">
                  <div class=\"col-md-12\">
                     <div class=\"form-group\">
                        <label class=\"control-label col-md-12\">First Name
                        <span class=\"required\" aria-required=\"true\"> * </span>
                        </label>
                        <div class=\"col-md-12\">
                           <input placeholder=\"First Name\" name=\"first_name\" value=\"\" type=\"text\" class=\"form-control\">
                        </div>
                     </div>
                  </div>
               </div>

               <div class=\"row\">
                  <div class=\"col-md-12\">
                     <div class=\"form-group\">
                        <label class=\"control-label col-md-12\">Last Name
                        <span class=\"required\" aria-required=\"true\"></span>
                        </label>
                        <div class=\"col-md-12\">
                           <input placeholder=\"Last Name\" name=\"last_name\" value=\"\" type=\"text\" class=\"form-control\">
                        </div>
                     </div>
                  </div>
               </div>

               <div class=\"row\">
                  <div class=\"col-md-12\">
                     <div class=\"form-group\">
                        <label class=\"control-label col-md-12\">Email Address
                        <span class=\"required\" aria-required=\"true\"> * </span>
                        </label>
                        <div class=\"col-md-12\">
                           <input placeholder=\"Email Address\" name=\"email\" value=\"\" type=\"text\" class=\"form-control\">
                        </div>
                     </div>
                  </div>
               </div>

               <div class=\"row\">
                  <div class=\"col-md-12\">
                     <div class=\"form-group\">
                        <label class=\"control-label col-md-12\">Date of birth
                        <span class=\"required\" aria-required=\"true\"> * </span>
                        </label>
                        <div class=\"col-md-12\">
                           <input name=\"dob\" type=\"text\" value=\"\" size=\"16\" class=\"form-control form-control-inline date-picker\" placeholder=\"DOB\">
                        </div>
                     </div>
                  </div>
               </div>

               <div class=\"row\">
                  <div class=\"col-md-12\">
                     <div class=\"form-group\">
                        <label class=\"control-label col-md-12\">Password
                        <span class=\"required\" aria-required=\"true\"> * </span>
                        </label>
                        <div class=\"col-md-12\">
                           <input id=\"submit_password\" placeholder=\"Password\" name=\"password\" value=\"\" type=\"password\" class=\"form-control\">
                        </div>
                     </div>
                  </div>
               </div>

               <div class=\"row\">
                  <div class=\"col-md-12\">
                     <div class=\"form-group\">
                        <label class=\"control-label col-md-12\">Confirm Password
                        <span class=\"required\" aria-required=\"true\"> * </span>
                        </label>
                        <div class=\"col-md-12\">
                           <input placeholder=\"Confirm Password\" name=\"rpassword\" value=\"\" type=\"password\" class=\"form-control\">
                        </div>
                     </div>
                  </div>
               </div>
               <div class=\"row\">
                  <div class=\"col-md-12\">
                     <div class=\"form-group\">
                        <label class=\"control-label col-md-12\">Status
                        <span class=\"required\" aria-required=\"true\">*</span>
                        </label>
                        <div class=\"col-md-12\">
                           <select class=\"form-control\" name=\"status\">
                              <option value=\"1\">Active</option>
                              <option value=\"0\">Inactive</option>
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
      <button type=\"button\" data-dismiss=\"modal\" class=\"btn btn-outline dark\">Cancel</button>
      <button data-method=\"PUT\" id=\"user-update-form\" type=\"button\" class=\"btn green\">Update User</button>
   </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "users/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  353 => 279,  322 => 250,  307 => 242,  300 => 238,  293 => 234,  283 => 226,  279 => 224,  275 => 222,  273 => 221,  268 => 219,  264 => 218,  260 => 217,  256 => 216,  249 => 212,  242 => 209,  238 => 208,  31 => 3,  28 => 2,  11 => 1,);
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
         <li class=\"active\">Users</li>
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
                    <a href=\"/wishes\">
                      <i class=\"fa fa-heart\"></i> Wishes 
                    </a>
                 </li>
              </ul>
               <!-- users -->
               <div id=\"AddUser\" class=\"modal fade\" tabindex=\"-1\" data-width=\"450\">
                    <div class=\"modal-header\">
                       <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\"></button>
                       <h4 class=\"modal-title\">Add User</h4>
                    </div>
                    <div class=\"modal-body\">
                       <div class=\"row\">
                          <div class=\"col-md-12\">
                             <form method=\"POST\" action=\"#\" name=\"user-form\" id=\"UserForm\" >
                                
                                <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group\">
                                        <label class=\"control-label col-md-12\">First Name
                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                        </label>
                                        <div class=\"col-md-12\">
                                           <input placeholder=\"First Name\" name=\"first_name\" value=\"\" type=\"text\" class=\"form-control\">
                                        </div>
                                     </div>
                                  </div>
                               </div>

                               <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group\">
                                        <label class=\"control-label col-md-12\">Last Name
                                        <span class=\"required\" aria-required=\"true\"></span>
                                        </label>
                                        <div class=\"col-md-12\">
                                           <input placeholder=\"Last Name\" name=\"last_name\" value=\"\" type=\"text\" class=\"form-control\">
                                        </div>
                                     </div>
                                  </div>
                               </div>

                               <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group\">
                                        <label class=\"control-label col-md-12\">Email Address
                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                        </label>
                                        <div class=\"col-md-12\">
                                           <input placeholder=\"Email Address\" name=\"email\" value=\"\" type=\"text\" class=\"form-control\">
                                        </div>
                                     </div>
                                  </div>
                               </div>

                               <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group\">
                                        <label class=\"control-label col-md-12\">Date of birth
                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                        </label>
                                        <div class=\"col-md-12\">
                                           <input name=\"dob\" type=\"text\" value=\"\" size=\"16\" class=\"form-control form-control-inline date-picker\" placeholder=\"DOB\">
                                        </div>
                                     </div>
                                  </div>
                               </div>

                               <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group last password-strength\">
                                        <label class=\"control-label col-md-12\">Password
                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                        </label>
                                        <div class=\"col-md-12\">
                                           <input id=\"password_strength\" placeholder=\"Password\" name=\"password\" value=\"\" type=\"password\" class=\"form-control\">
                                        </div>
                                     </div>
                                  </div>
                               </div>

                               <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group\">
                                        <label class=\"control-label col-md-12\">Confirm Password
                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                        </label>
                                        <div class=\"col-md-12\">
                                           <input placeholder=\"Confirm Password\" name=\"rpassword\" value=\"\" type=\"password\" class=\"form-control\">
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group\">
                                        <label class=\"control-label col-md-12\">Status
                                        <span class=\"required\" aria-required=\"true\">*</span>
                                        </label>
                                        <div class=\"col-md-12\">
                                           <select class=\"form-control\" name=\"status\">
                                              <option value=\"1\">Active</option>
                                              <option value=\"0\">Inactive</option>
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
                       <button type=\"button\" data-dismiss=\"modal\" class=\"btn btn-outline dark\">Cancel</button>
                       <a data-method=\"POST\" id=\"user-submit-form\" class=\"btn green\" href=\"javascript:;\"> Submit <i class=\"fa fa-user\"></i></a>
                    </div>
                 </div>
             </nav>
         </div>
         <!-- END PAGE SIDEBAR -->
         <div class=\"page-content-col\">
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class=\"row\">
               <div class=\"col-md-12\">
                  <div class=\"action-buttons\" style=\"margin-bottom: 6px;\">
                    <a class=\"btn default blue-stripe\" data-toggle=\"modal\" href=\"#AddUser\"> <i class=\"fa fa-plus\"></i> Add </a>
                    <a class=\"btn default red-stripe delete-button-user\" href=\"javascript:;\"> <i class=\"fa fa-remove\"></i> Delete </a>
                    <a class=\"btn default dark-stripe deactivate-button-user\" href=\"javascript:;\"> <i class=\"fa fa-power-off\"></i> Inactive </a>
                  </div>
                  <!-- BEGIN EXAMPLE TABLE PORTLET-->
                  <div class=\"portlet light bordered\">
                     <div class=\"portlet-title\">
                        <div class=\"caption font-dark\">
                           <i class=\"fa fa-rss\"></i>
                           <span class=\"caption-subject bold uppercase\"> Users </span>
                        </div>
                     </div>
                     <div class=\"portlet-body\">
                        <table class=\"table table-striped table-bordered table-hover table-header-fixed dataTable no-footer users-table\" id=\"sample_1\">
                           <thead>
                              <tr>
                                 <th>
                                    <label class=\"mt-checkbox mt-checkbox-single mt-checkbox-outline\">
                                    <input type=\"checkbox\" class=\"group-checkable\" data-set=\"#sample_1 .checkboxes\" />
                                    <span></span>
                                    </label>
                                 </th>
                                 <th> ID </th>
                                 <th> First name </th>
                                 <th> Last name </th>
                                 <th> Email address </th>
                                 <th> Status </th>
                                 <th> Actions </th>
                              </tr>
                           </thead>
                           <tbody>
                              {% for user in users %}
                              <tr row-id=\"{{user.id}}\" class=\"odd gradeX\">
                                 <td>
                                    <label class=\"mt-checkbox mt-checkbox-single mt-checkbox-outline\">
                                    <input type=\"checkbox\" class=\"checkboxes\" value=\"{{user.id}}\" />
                                    <span></span>
                                    </label>
                                 </td>
                                 <th> {{ user.id|e }} </th>
                                 <th> {{ user.first_name|e }} </th>
                                 <td> {{ user.last_name|e }} </td>
                                 <td> {{ user.email|e }} </td>
                                 <td> 
                                    {% if user.status|e == '1' %}
                                    <span class=\"label label-sm label-success\"> Active </span>
                                    {% else %}
                                    <span class=\"label label-sm label-danger\"> Inactive </span>
                                    {% endif %}
                                 </td>
                                 <td>
                                    <div class=\"btn-group\">
                                       <button class=\"btn btn-xs green dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-expanded=\"false\"> Actions
                                       <i class=\"fa fa-angle-down\"></i>
                                       </button>
                                       <ul class=\"dropdown-menu pull-left\" role=\"menu\">
                                         <!-- <li>
                                             <a data-button-icon=\"fa-eye\" data-name=\"View\" data-modal=\"viewBeacon\" data-method=\"GET\" data-user-id=\"{{user.id}}\" class=\"ShowEditBeacon\" href=\"javascript:void(0)\">
                                             <i class=\"fa fa-eye\"></i>  View  </a>
                                          </li> -->
                                          <li>
                                             <a data-button-icon=\"fa-pencil\" data-name=\"Edit\" data-modal=\"editUser\" data-method=\"GET\" data-user-id=\"{{user.id}}\" class=\"ShowEditUser\" href=\"javascript:void(0)\">
                                             <i class=\"fa fa-pencil\"></i> Edit </a>
                                          </li>
                                          <li>
                                             <a class=\"button-user-delete\" data-method=\"DELETE\" data-user-id=\"{{user.id}}\" href=\"javascript:void(0);\">
                                             <i class=\"fa fa-minus-circle\"></i> Delete </a>
                                          </li>
                                       </ul>
                                       <!-- END EXAMPLE TABLE PORTLET-->
                                    </div>
                                 </td>
                              </tr>
                              {% endfor %}  
                           </tbody>
                        </table>
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
<div class=\"modal fade\" tabindex=\"-1\" data-width=\"450\" id=\"editUser\">
   <div class=\"modal-header\">
      <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\"></button>
      <h4 class=\"modal-title\">Edit User</h4>
   </div>
   <div class=\"modal-body\">
      <div class=\"alert alert-danger display-none\">
         <button class=\"close\" data-dismiss=\"alert\"></button> You have some form errors. Please check below. 
      </div>
      <div class=\"alert alert-success display-none\">
         <button class=\"close\" data-dismiss=\"alert\"></button> Your form validation is successful! 
      </div>
      <div class=\"row\">
         <div class=\"col-md-12\">
            <form method=\"POST\" action=\"#\" id=\"user_update\" name=\"user-form\">
               <input id=\"user_id\" class=\"userid\" type=\"hidden\" name=\"id\" value=\"{{ user.id }}\" />
               <div class=\"row\">
                  <div class=\"col-md-12\">
                     <div class=\"form-group\">
                        <label class=\"control-label col-md-12\">First Name
                        <span class=\"required\" aria-required=\"true\"> * </span>
                        </label>
                        <div class=\"col-md-12\">
                           <input placeholder=\"First Name\" name=\"first_name\" value=\"\" type=\"text\" class=\"form-control\">
                        </div>
                     </div>
                  </div>
               </div>

               <div class=\"row\">
                  <div class=\"col-md-12\">
                     <div class=\"form-group\">
                        <label class=\"control-label col-md-12\">Last Name
                        <span class=\"required\" aria-required=\"true\"></span>
                        </label>
                        <div class=\"col-md-12\">
                           <input placeholder=\"Last Name\" name=\"last_name\" value=\"\" type=\"text\" class=\"form-control\">
                        </div>
                     </div>
                  </div>
               </div>

               <div class=\"row\">
                  <div class=\"col-md-12\">
                     <div class=\"form-group\">
                        <label class=\"control-label col-md-12\">Email Address
                        <span class=\"required\" aria-required=\"true\"> * </span>
                        </label>
                        <div class=\"col-md-12\">
                           <input placeholder=\"Email Address\" name=\"email\" value=\"\" type=\"text\" class=\"form-control\">
                        </div>
                     </div>
                  </div>
               </div>

               <div class=\"row\">
                  <div class=\"col-md-12\">
                     <div class=\"form-group\">
                        <label class=\"control-label col-md-12\">Date of birth
                        <span class=\"required\" aria-required=\"true\"> * </span>
                        </label>
                        <div class=\"col-md-12\">
                           <input name=\"dob\" type=\"text\" value=\"\" size=\"16\" class=\"form-control form-control-inline date-picker\" placeholder=\"DOB\">
                        </div>
                     </div>
                  </div>
               </div>

               <div class=\"row\">
                  <div class=\"col-md-12\">
                     <div class=\"form-group\">
                        <label class=\"control-label col-md-12\">Password
                        <span class=\"required\" aria-required=\"true\"> * </span>
                        </label>
                        <div class=\"col-md-12\">
                           <input id=\"submit_password\" placeholder=\"Password\" name=\"password\" value=\"\" type=\"password\" class=\"form-control\">
                        </div>
                     </div>
                  </div>
               </div>

               <div class=\"row\">
                  <div class=\"col-md-12\">
                     <div class=\"form-group\">
                        <label class=\"control-label col-md-12\">Confirm Password
                        <span class=\"required\" aria-required=\"true\"> * </span>
                        </label>
                        <div class=\"col-md-12\">
                           <input placeholder=\"Confirm Password\" name=\"rpassword\" value=\"\" type=\"password\" class=\"form-control\">
                        </div>
                     </div>
                  </div>
               </div>
               <div class=\"row\">
                  <div class=\"col-md-12\">
                     <div class=\"form-group\">
                        <label class=\"control-label col-md-12\">Status
                        <span class=\"required\" aria-required=\"true\">*</span>
                        </label>
                        <div class=\"col-md-12\">
                           <select class=\"form-control\" name=\"status\">
                              <option value=\"1\">Active</option>
                              <option value=\"0\">Inactive</option>
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
      <button type=\"button\" data-dismiss=\"modal\" class=\"btn btn-outline dark\">Cancel</button>
      <button data-method=\"PUT\" id=\"user-update-form\" type=\"button\" class=\"btn green\">Update User</button>
   </div>
</div>
{% endblock %}", "users/index.twig", "");
    }
}
