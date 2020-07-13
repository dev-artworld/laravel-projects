<?php

/* messages/index.twig */
class __TwigTemplate_843a4fe4544166c3b94d7ba27e8c7639c9f99fd2a21ddc5983f44fe6793dbf90 extends Twig_Template
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
         <li class=\"active\">Messages</li>
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
                      <i class=\"fa fa-list-alt\"></i> Category
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
              </ul
              <!-- users -->
               <div id=\"Messages\" class=\"modal fade\" tabindex=\"-1\" data-width=\"450\">
                    <div class=\"modal-header\">
                       <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\"></button>
                       <h4 class=\"modal-title\">Messages</h4>
                    </div>
                    <div class=\"modal-body\">
                       <div class=\"row\">
                          <div class=\"col-sm-12 frame\">
                            <ul></ul>
                          </div>
                       </div>
                    </div>
                    <div class=\"modal-footer\">
                       <button type=\"button\" data-dismiss=\"modal\" class=\"btn btn-outline dark\">Cancel</button>
                    </div>
                 </div>
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
                        <div class=\"caption font-dark\">
                           <i class=\"fa fa-rss\"></i>
                           <span class=\"caption-subject bold uppercase\"> Messages </span>
                        </div>
                     </div>
                     <div class=\"portlet-body\">
                        <table class=\"table table-striped table-bordered table-hover table-checkable order-column\" id=\"sample_1\">
                           <thead>
                              <tr>
                                 <th>
                                    <label class=\"mt-checkbox mt-checkbox-single mt-checkbox-outline\">
                                    <input type=\"checkbox\" class=\"group-checkable\" data-set=\"#sample_1 .checkboxes\" />
                                    <span></span>
                                    </label>
                                 </th>
                                 <th> ID </th>
                                 <th> Wish title </th>
                                 <th> Sender </th>
                                 <th> Receiver </th>
\t\t\t\t\t\t\t\t                 <th> Time </th>
                                 <th> Actions </th>                             
                              </tr>
                           </thead>
                           <tbody>
                              ";
        // line 123
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["messages"]) ? $context["messages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 124
            echo "                              <tr row-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["message"]) ? $context["message"] : null), "id"));
            echo "\" class=\"odd gradeX\">
                                <td>
                                    <label class=\"mt-checkbox mt-checkbox-single mt-checkbox-outline\">
                                    <input type=\"checkbox\" class=\"checkboxes\" value=\"";
            // line 127
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["message"]) ? $context["message"] : null), "id"));
            echo "\" />
                                    <span></span>
                                    </label>
                                 </td>
                                 <td>";
            // line 131
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["message"]) ? $context["message"] : null), "id"));
            echo "</td>
                                 <td>";
            // line 132
            echo $this->getAttribute((isset($context["message"]) ? $context["message"] : null), "chat_wish");
            echo "</td>
                                 <td>";
            // line 133
            echo $this->getAttribute((isset($context["message"]) ? $context["message"] : null), "sender");
            echo "</td>
                                 <td>";
            // line 134
            echo $this->getAttribute((isset($context["message"]) ? $context["message"] : null), "receiver");
            echo "</td>
                                 <td>";
            // line 135
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["message"]) ? $context["message"] : null), "created_at"));
            echo "</td>
                                 <td>
                                    <div class=\"btn-group\">
                                       <button class=\"btn btn-xs green dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-expanded=\"false\"> Actions
                                       <i class=\"fa fa-angle-down\"></i>
                                       </button>
                                       <ul class=\"dropdown-menu pull-left\" role=\"menu\">
                                         <li>
                                             <a href=\"javascript:void(0)\" data-receiver-id=\"";
            // line 143
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["message"]) ? $context["message"] : null), "receiver_id"));
            echo "\" data-wish-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["message"]) ? $context["message"] : null), "chat_wish_id"));
            echo "\" data-sender-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["message"]) ? $context["message"] : null), "sender_id"));
            echo "\" class=\"openMessages\"> <i class=\"fa fa-eye\"></i> View</a>
                                          </li>
                                          <li>
                                             <a class=\"button-message-delete\" data-receiver-id=\"";
            // line 146
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["message"]) ? $context["message"] : null), "receiver_id"));
            echo "\" data-wish-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["message"]) ? $context["message"] : null), "chat_wish_id"));
            echo "\" data-sender-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["message"]) ? $context["message"] : null), "sender_id"));
            echo "\" data-method=\"DELETE\" data-message-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["message"]) ? $context["message"] : null), "id"), "html", null, true);
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 155
        echo "                           </tbody>
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
";
    }

    public function getTemplateName()
    {
        return "messages/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  229 => 155,  208 => 146,  198 => 143,  187 => 135,  183 => 134,  179 => 133,  175 => 132,  171 => 131,  164 => 127,  157 => 124,  153 => 123,  31 => 3,  28 => 2,);
    }
}
