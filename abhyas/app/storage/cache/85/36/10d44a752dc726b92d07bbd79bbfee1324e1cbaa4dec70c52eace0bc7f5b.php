<?php

/* comments/index.twig */
class __TwigTemplate_853610d44a752dc726b92d07bbd79bbfee1324e1cbaa4dec70c52eace0bc7f5b extends Twig_Template
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
                      <i class=\"fa fa-book\"></i> Pages
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
               <!-- users -->
              
             </nav>
         </div>
         <!-- END PAGE SIDEBAR -->
         <div class=\"page-content-col\">
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class=\"row\">
               <div class=\"col-md-12\">
                  <!-- BEGIN EXAMPLE TABLE PORTLET-->
                  <div class=\"portlet light bordered\">
                     <div class=\"portlet-title\">
                        <div class=\"caption font-dark col-md-4\">
                           <i class=\"fa fa-rss\"></i>
                           <span class=\"caption-subject bold uppercase\"> Reveiws</span>
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
                                 <th> ID </th>                              
                                 <th> Comment </th> 
                                 <th> Page </th>                          
                                 <th> Posted By </th>
                                 <th> Posted At </th>
                              
                                <!--  <th> Actions </th> -->
                              </tr>
                           </thead>
                           <tbody>
                              ";
        // line 114
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["comments"]) ? $context["comments"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["comments"]) {
            // line 115
            echo "                              <tr row-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pages"]) ? $context["pages"] : null), "id"));
            echo "\" class=\"odd gradeX\">
                                 
                                 <td> ";
            // line 117
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comments"]) ? $context["comments"] : null), "id"));
            echo " </td>
                                 <td> ";
            // line 118
            echo $this->getAttribute((isset($context["comments"]) ? $context["comments"] : null), "comment");
            echo " </td>
                            
                                 <td> ";
            // line 120
            echo $this->getAttribute((isset($context["comments"]) ? $context["comments"] : null), "title");
            echo " </td>
                                 <td> 
                                  ";
            // line 122
            echo $this->getAttribute((isset($context["comments"]) ? $context["comments"] : null), "first_name");
            echo "
                                 </td>
                                 <td> ";
            // line 124
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["comments"]) ? $context["comments"] : null), "created_at"), "m/d/Y"), "html", null, true);
            echo " </td>
                                <!--  <td>
                                    <div class=\"btn-group\">
                                       <button class=\"btn btn-xs green dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-expanded=\"false\"> Actions
                                       <i class=\"fa fa-angle-down\"></i>
                                       </button>
                                       <ul class=\"dropdown-menu pull-left\" role=\"menu\">
                                         <!-- <li>
                                             <a data-button-icon=\"fa-eye\" data-name=\"View\" data-modal=\"viewBeacon\" data-method=\"GET\" data-wish-id=\"";
            // line 132
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["wish"]) ? $context["wish"] : null), "id"), "html", null, true);
            echo "\" class=\"ShowEditBeacon\" href=\"javascript:void(0)\">
                                             <i class=\"fa fa-eye\"></i>  View  </a>
                                          </li>
                                          <li>
                                             <a data-button-icon=\"fa-pencil\" data-name=\"Edit\" data-modal=\"editWish\" data-method=\"GET\" data-wish-id=\"";
            // line 136
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pages"]) ? $context["pages"] : null), "id"), "html", null, true);
            echo "\" class=\"ShowEditPage\" href=\"javascript:void(0)\">
                                             <i class=\"fa fa-pencil\"></i> Edit </a>
                                          </li>
                                          <li>
                                             <a class=\"button-page-delete\" data-method=\"DELETE\" data-page-id=\"";
            // line 140
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pages"]) ? $context["pages"] : null), "id"), "html", null, true);
            echo "\" href=\"javascript:void(0);\">
                                             <i class=\"fa fa-minus-circle\"></i> Delete </a>
                                          </li>
                                       </ul>
                                       
                                    </div>
                                 </td> -->
                              </tr>
                              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comments'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 148
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

";
    }

    public function getTemplateName()
    {
        return "comments/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  213 => 148,  198 => 140,  191 => 136,  184 => 132,  173 => 124,  168 => 122,  163 => 120,  158 => 118,  154 => 117,  148 => 115,  144 => 114,  31 => 3,  28 => 2,);
    }
}
