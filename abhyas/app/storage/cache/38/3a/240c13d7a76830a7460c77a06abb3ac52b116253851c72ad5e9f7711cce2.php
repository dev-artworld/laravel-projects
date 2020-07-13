<?php

/* pages/index.twig */
class __TwigTemplate_383a240c13d7a76830a7460c77a06abb3ac52b116253851c72ad5e9f7711cce2 extends Twig_Template
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
         <li class=\"active\">Pages</li>
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
                      <i class=\"fa fa-book\"></i> Pages
                    </a>
                 </li>
                
                  <li>
                    <a href=\"/staff \">
                      <i class=\"fa fa-users\"></i> Staff
                    </a>
                   </li>
                   <li>  
                    <a href=\"/profile\">
                      <i class=\"fa fa-user\"></i> Profile 
                    </a>
                   </li>
                  <!--
                   <li>
                    <a href=\"/users\">
                    <i class=\"fa fa-users\"></i> Users
                    </a>
                 </li>
                   <li>
                    <a href=\"/categories\">
                      <i class=\"fa fa-list-alt\"></i> Category
                    </a>
                   </li>
                    <li>
                    <a href=\"/comments \">
                      <i class=\"fa fa-comments-o\"></i> Comments
                    </a>
                   </li> -->
              </ul>
               <!-- users -->
               <div id=\"AddWish\" class=\"modal fade\" tabindex=\"-1\" data-width=\"450\">
                    <div class=\"modal-header\">
                       <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\"></button>
                       <h4 class=\"modal-title\">Add Wish</h4>
                    </div>
                    <div class=\"modal-body\">
                       <div class=\"row\">
                          <div class=\"col-md-12\">
                             <form method=\"POST\" action=\"#\" name=\"wish-form\" id=\"WishForm\" >
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
        // line 98
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 99
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
        // line 101
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
                          </div>
                       </div>
                    </div>
                    <div class=\"modal-footer\">
                       <button type=\"button\" data-dismiss=\"modal\" class=\"btn btn-outline dark\">Cancel</button>
                       <a data-method=\"POST\" id=\"wish-submit-form\" class=\"btn green\" href=\"javascript:;\"> Submit <i class=\"fa fa-heart\"></i></a>
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
                    <a class=\"btn default blue-stripe\" data-toggle=\"modal\" href=\"/mathematics/create\"> <i class=\"fa fa-plus\"></i> Add </a>
                    <a class=\"btn default red-stripe delete-button-pages\" href=\"javascript:;\"> <i class=\"fa fa-remove\"></i> Delete </a>
                                  <!--  <div class=\"form-group\">
                      <label class=\"control-label col-md-3\">Date Range</label>
                      <div class=\"col-md-4\">
                          <div class=\"input-group input-large date-picker input-daterange\" data-date=\"10/11/2012\" data-date-format=\"mm/dd/yyyy\">
                              <input type=\"text\" class=\"form-control\" name=\"from\">
                              <span class=\"input-group-addon\"> to </span>
                              <input type=\"text\" class=\"form-control\" name=\"to\"> </div>
                          <! /input-group -->
                        <!--   <span class=\"help-block\"> Select date range </span>
                      </div>
                  </div> -->
                  </div>
                  <!-- BEGIN EXAMPLE TABLE PORTLET-->
                  <div class=\"portlet light bordered\">
                     <div class=\"portlet-title\">
                        <div class=\"caption font-dark col-md-4\">
                           <i class=\"fa fa-rss\"></i>
                           <span class=\"caption-subject bold uppercase\"> Pages</span>
                        </div>
                        <div class=\"col-md-8\">
                          <div class=\"col-md-4\">
                            <span class=\"uppercase\" style=\"float: left; margin: 7px 0px 0px 15px;\"> Search By Date </span>
                          </div>
                            <div class=\"input-group input-large date-picker input-daterange\" data-date=\"11/20/2017\" data-date-format=\"mm/dd/yyyy\">
                                <input id=\"datepicker_from\" type=\"text\" class=\"form-control\" name=\"from\">
                                <span class=\"input-group-addon\"> to </span>
                                <input id=\"datepicker_to\" type=\"text\" class=\"form-control\" name=\"to\"> 
                            </div>
                            <!-- /input-group -->
                        </div>
                     </div>
                     <div class=\"portlet-body\">
                        <table class=\"table table-striped table-bordered table-hover table-header-fixed dataTable no-footer wishes-table\" id=\"sample_1\">
                           <thead>
                              <tr>
                                 <th>
                                    <label class=\"mt-checkbox mt-checkbox-single mt-checkbox-outline\">
                                    <input type=\"checkbox\" class=\"group-checkable\" data-set=\"#sample_1 .checkboxes\" />
                                    <span></span>
                                    </label>
                                 </th>  
                                 <th> PDF </th>                                          
                                 <th> Title </th>                   
                                 <th> Day </th>   
                                 <th> Date Created </th>
                                 <th> Actions </th>
                              </tr>
                           </thead>
                           <tbody>
                              ";
        // line 256
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["page"]) ? $context["page"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["pages"]) {
            // line 257
            echo "                              <tr row-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pages"]) ? $context["pages"] : null), "id"));
            echo "\" class=\"odd gradeX\">
                                 <td>
                                    <label class=\"mt-checkbox mt-checkbox-single mt-checkbox-outline\">
                                    <input type=\"checkbox\" class=\"checkboxes\" value=\"";
            // line 260
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["wish"]) ? $context["wish"] : null), "id"), "html", null, true);
            echo "\" />
                                    <span></span>
                                    </label>
                                 </td>
                                  <td><a href=\"";
            // line 264
            echo $this->getAttribute((isset($context["pages"]) ? $context["pages"] : null), "pdf_file");
            echo "\" ><i class=\"fa fa-file-pdf-o\" style=\"font-size:28px;color:red\"></i></a>
                                 
                                 </td>
                                 <td> ";
            // line 267
            echo $this->getAttribute((isset($context["pages"]) ? $context["pages"] : null), "title");
            echo " </td>                                
                                 <td> ";
            // line 268
            echo $this->getAttribute((isset($context["pages"]) ? $context["pages"] : null), "day");
            echo " </td>
                                
                                 <td> ";
            // line 270
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["pages"]) ? $context["pages"] : null), "created_at"), "m/d/Y"), "html", null, true);
            echo " </td>
                                 
                                 <td>
                                    <div class=\"btn-group\">
                                       <button class=\"btn btn-xs green dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-expanded=\"false\"> Actions
                                       <i class=\"fa fa-angle-down\"></i>
                                       </button>
                                       <ul class=\"dropdown-menu pull-left\" role=\"menu\">
                                         <!-- <li>
                                             <a data-button-icon=\"fa-eye\" data-name=\"View\" data-modal=\"viewBeacon\" data-method=\"GET\" data-wish-id=\"";
            // line 279
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["wish"]) ? $context["wish"] : null), "id"), "html", null, true);
            echo "\" class=\"ShowEditBeacon\" href=\"javascript:void(0)\">
                                             <i class=\"fa fa-eye\"></i>  View  </a>
                                          </li> -->
                                          <li>
                                             <a data-button-icon=\"fa-pencil\" data-name=\"Edit\" data-modal=\"editWish\" data-method=\"GET\" data-wish-id=\"";
            // line 283
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pages"]) ? $context["pages"] : null), "id"), "html", null, true);
            echo "\" class=\"ShowEditPage\" href=\"javascript:void(0)\">
                                             <i class=\"fa fa-pencil\"></i> Edit </a>
                                          </li>
                                          <li>
                                             <a class=\"button-page-delete\" data-method=\"DELETE\" data-page-id=\"";
            // line 287
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pages"]) ? $context["pages"] : null), "id"), "html", null, true);
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 295
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
<div tabindex=\"-1\" data-width=\"1200\" class=\"modal fade\" id=\"full\" aria-hidden=\"true\">
  <div class=\"modal-body\">
      <img style=\"width: 100%; height: auto;\" id=\"target\" src=\"\">
  </div>
  <div class=\"modal-footer\">
      <a class=\"btn green\" href=\"javascript:zoomPlus();\"> Zoom <i class=\"fa fa-plus\"></i></a>
      <a class=\"btn green\" href=\"javascript:zoomMinus();\"> Zoom <i class=\"fa fa-minus\"></i></a>
      <button class=\"btn btn-outline dark green\" data-dismiss=\"modal\" type=\"button\">Crop Image <i class=\"fa fa-crop\" aria-hidden=\"true\"></i>
</button>
  </div>
</div>
<div class=\"modal fade\" tabindex=\"-1\" data-width=\"450\" id=\"editWish\">
   <div class=\"modal-header\">
      <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\"></button>
      <h4 class=\"modal-title\">Edit Page</h4>
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
            <form method=\"POST\" action=\"#\" id=\"wish_update\" name=\"wish-form\">
              <input id=\"wishEditPicture\" type=\"hidden\" name=\"wish_image\" value=\"\" />
               <input type=\"hidden\" name=\"x\" id=\"edit_x\" value=\"0\">
               <input type=\"hidden\" name=\"y\" id=\"edit_y\" value=\"0\">
               <input type=\"hidden\" name=\"w\" id=\"edit_w\" value=\"600\">
               <input type=\"hidden\" name=\"h\" id=\"edit_h\" value=\"326\">
              <input id=\"wish_id\" class=\"wishid\" type=\"hidden\" name=\"page_id\" value=\"";
        // line 340
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pages"]) ? $context["pages"] : null), "id"), "html", null, true);
        echo "\" /> 

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
           <br>  
          <div class=\"row\">
              <div class=\"col-md-12\">
                 <div class=\"form-group\">
                    <label class=\"control-label col-md-2\">Subjects
                      </label>
                    <div class=\"col-md-10\">                         
                         <select class=\"form-control\" tabindex=\"1\" name=\"medium\">
                            <option value=\"punjabi\">Mathematics-Punjabi</option>
                            <option value=\"english\">Mathematics-English</option>
                         </select>                    </div>
                 </div>
              </div>
           </div>  
             <div class=\"row\">
              <div class=\"col-md-12\">
                 <div class=\"form-group\">
                    <label class=\"control-label col-md-2\">Class
                      </label>
                    <div class=\"col-md-10\">                         
                         <select class=\"form-control\" tabindex=\"1\" name=\"class\">
                            <option value=\"10\">10th</option>
                             <option value=\"12\">12th</option>
                         </select>
                      </div>
                 </div>
              </div>
           </div>
            <div class=\"row\">
              <div class=\"col-md-12\">
                 <div class=\"form-group\">
                    <label class=\"control-label col-md-2\">Chapter
                      </label>
                    <div class=\"col-md-10\">
                       <select name=\"chapter\" class=\"form-control\">
                                                    <option value=\"Real Numbers\">Real Numbers</option>
                                                    <option value=\"Polynomials\">Polynomials</option>
                                                    <option value=\"Pair of Linear Equations in Two Variables\">Pair of Linear Equations in Two Variables</option>
                                                    <option value=\"Quadratic Equations\">Quadratic Equations</option>
                                                    <option value=\"Arithmetic Progressions\">Arithmetic Progressions</option>
                                                    <option value=\"Triangles\">Triangles</option>
                                                    <option value=\"Coordinate Geometry\">Coordinate Geometry</option>
                                                    <option value=\"Introduction to Trigonometry\">Introduction to Trigonometry</option>
                                                    <option value=\"Some Applications of Trigonometry\">Some Applications of Trigonometry</option>
                                                    <option value=\"Circles\">Circles</option>
                                                    <option value=\"Construction\">Constructions</option>
                                                    <option value=\"Areas Related to Circles\">Areas Related to Circles</option>
                                                    <option value=\"Surface Areas and Volumes\">Surface Areas and Volumes</option>
                                                    <option value=\"Statistics\">Statistics</option>
                                                    <option value=\"Probability\">Probability</option>
                                                 </select>
                    </div>
                 </div>
              </div>
           </div>    
           <div class=\"row\">
              <div class=\"col-md-12\">
                 <div class=\"form-group\">
                    <label class=\"control-label col-md-2\">Days
                      </label>
                    <div class=\"col-md-10\">
                         <select name=\"day\" class=\"form-control\">
                                                    <option value=\"Day 1\">Day 1</option>
                                                    <option value=\"Day 2\">Day 2</option>
                                                    <option value=\"Day 3\">Day 3</option>
                                                    <option value=\"Day 4\">Day 4</option>
                                                    <option value=\"Day 5\">Day 5</option>
                                                    <option value=\"Day 6\">Day 6</option>
                                                    <option value=\"Day 7\">Day 7</option>
                                                    <option value=\"Day 8\">Day 8</option>
                                                    <option value=\"Day 9\">Day 9</option>
                                                    <option value=\"Day 10\">Day 10</option>
                                                    <option value=\"Day 11\">Day 11</option>
                                                    <option value=\"Day 12\">Day 12</option>
                                                    <option value=\"Day 13\">Day 13</option>
                                                    <option value=\"Day 14\">Day 14</option>
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
      <button data-method=\"PUT\" id=\"page-update-form\" type=\"button\" class=\"btn green\">Update</button>
   </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "pages/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  423 => 340,  376 => 295,  361 => 287,  354 => 283,  347 => 279,  335 => 270,  330 => 268,  326 => 267,  320 => 264,  313 => 260,  306 => 257,  302 => 256,  145 => 101,  132 => 99,  128 => 98,  31 => 3,  28 => 2,);
    }
}
