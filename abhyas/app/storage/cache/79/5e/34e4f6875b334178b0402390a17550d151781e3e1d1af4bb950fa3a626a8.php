<?php

/* woe/create.twig */
class __TwigTemplate_795e34e4f6875b334178b0402390a17550d151781e3e1d1af4bb950fa3a626a8 extends Twig_Template
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
        <!--<h1>Campaigns</h1>-->
        <ol class=\"breadcrumb\">
            <li>
                <a href=\"/admin\">Dashboard</a>
            </li>
            <li>
                <a href=\"/beacons\">Mathematics</a>
            </li>
            <li class=\"active\">Add Mathematics Chapter</li>
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
                    <a href=\"/mathematics\">
                      <i class=\"fa fa-book\"></i> Mathematics
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
                 <li>
                    <a href=\"/profile\">
                      <i class=\"fa fa-user\"></i> Profile 
                    </a>
                 </li>
              </ul>
                </nav>
            </div>
            <!-- END PAGE SIDEBAR -->
             <div class=\"page-content-col\">
             <!-- BEGIN PAGE BASE CONTENT -->
             <div class=\"row\">
                <div class=\"col-md-12\">
                   <div class=\"tabbable-line boxless tabbable-reversed\">
                      <div class=\"tab-content\">
                         <div class=\"tab-pane active\" id=\"tab_1\">

                            <div class=\"portlet light bordered\">
                               <div class=\"portlet-title\">
                                  <div class=\"caption\">

                                     <i class=\"icon-equalizer font-blue-hoki\"></i>

                                     <span class=\"caption-subject font-blue-hoki bold uppercase\">Add Woe</span>
                                     <!-- <span class=\"caption-helper\">Add Woe</span> -->
                                  </div>
                                  <div class=\"tools\">
                                     <a title=\"\" data-original-title=\"\" href=\"\" class=\"collapse\"> </a>
                                     <a title=\"\" data-original-title=\"\" href=\"#portlet-config\" data-toggle=\"modal\" class=\"config\"> </a>
                                     <a title=\"\" data-original-title=\"\" href=\"\" class=\"reload\"> </a>
                                     <a title=\"\" data-original-title=\"\" href=\"\" class=\"remove\"> </a>
                                  </div>
                               </div>
                               <div class=\"portlet-body form\">
                                  <!-- BEGIN FORM-->
                      

                                <form method=\"POST\" action=\"http://abhyas.retouchingwork.org/woe\" name=\"wish-form\" id=\"WoeForm\"  enctype=\"multipart/form-data\">
                                <input id=\"wishPicture\" type=\"hidden\" name=\"wish_image\" value=\"\" />
                                <input type=\"hidden\" name=\"x\" id=\"crop_x\" value=\"0\">
                                <input type=\"hidden\" name=\"y\" id=\"crop_y\" value=\"0\">
                                <input type=\"hidden\" name=\"w\" id=\"crop_w\" value=\"600\">
                                <input type=\"hidden\" name=\"h\" id=\"crop_h\" value=\"326\">
                                <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group\">
                                        <label class=\"control-label col-md-12\">Assign wish client
                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                        </label>
                                        <div class=\"col-md-12\">
                                           <select name=\"user_id\" class=\"form-control\">
                                              <option>--select user--</option>
                                              ";
        // line 111
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 112
            echo "                                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id"));
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "first_name"));
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "last_name"));
            echo "</option>
                                              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 114
        echo "                                           </select>
                                        </div>
                                     </div>
                                  </div>
                               </div>

                               <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group\">
                                        <label class=\"control-label col-md-12\">Title
                                        <span class=\"required\" aria-required=\"true\"></span>
                                        </label>
                                        <div class=\"col-md-12\">
                                           <input placeholder=\"Title\" name=\"title\" value=\"\" type=\"text\" class=\"form-control\">
                                        </div>
                                     </div>
                                  </div>
                               </div>

                               <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group\">
                                        <label class=\"control-label col-md-12\">Description
                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                        </label>
                                        <div class=\"col-md-12\">
                                           <textarea class=\"form-control\" placeholder=\"Description\" name=\"description\"></textarea>
                                        </div>
                                     </div>
                                  </div>
                               </div>

                               <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group last password-strength\">
                                        <label class=\"control-label col-md-12\">Wish fulfilled
                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                        </label>
                                        <div class=\"col-md-12\">
                                            <select name=\"is_fullfill\" class=\"form-control\">
                                              <option value=\"0\">No</option>
                                              <option value=\"1\">Yes</option>
                                            </select>
                                        </div>
                                     </div>
                                  </div>
                               </div>

                                <div class=\"row\">
                                  <div class=\"col-md-12\">
                                     <div class=\"form-group last password-strength\">
                                        <label class=\"control-label col-md-12\">Picture
                                        <span class=\"required\" aria-required=\"true\"> * </span>
                                        </label>
                                        <div class=\"col-md-12\">
                                            <div class=\"fileinput fileinput-new\" data-provides=\"fileinput\">
                                              <div class=\"input-group input-large\">
                                                  <div class=\"form-control uneditable-input input-fixed input-medium\" data-trigger=\"fileinput\">
                                                      <i class=\"fa fa-file fileinput-exists\"></i>&nbsp;
                                                      <span class=\"fileinput-filename\"> </span>
                                                  </div>
                                                  <span class=\"input-group-addon btn default btn-file\">
                                                      <span class=\"fileinput-new\"> Select file </span>
                                                      <span class=\"fileinput-exists\"> Change </span>
                                                      <input id=\"wishfileupload\" type=\"file\" name=\"files[]\"> </span>
                                                  <a href=\"javascript:;\" class=\"input-group-addon btn red fileinput-exists\" data-dismiss=\"fileinput\"> Remove </a>
                                              </div>
                                          </div>
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
                              <div class=\"modal-footer\">
                                   <button type=\"button\" data-dismiss=\"modal\" class=\"btn btn-outline dark\">Cancel</button>
                                  <button id=\"woeSubmit\" type=\"submit\" class=\"btn blue\">
                                        <i class=\"fa fa-check\"></i> Save</button>
                                </div>
                                  <!-- END FORM-->
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
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
        return "woe/create.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 114,  145 => 112,  141 => 111,  31 => 3,  28 => 2,);
    }
}
