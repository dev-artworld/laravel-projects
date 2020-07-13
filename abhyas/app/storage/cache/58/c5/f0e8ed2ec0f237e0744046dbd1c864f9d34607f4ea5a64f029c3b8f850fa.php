<?php

/* admin/login.twig */
class __TwigTemplate_58c5f0e8ed2ec0f237e0744046dbd1c864f9d34607f4ea5a64f029c3b8f850fa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.twig", "admin/login.twig", 1);
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
        echo "
<div class=\"c-layout-page login\">
   <!-- BEGIN LOGO -->
   <div class=\"logo\">
      <a href=\"index.html\">
          <!-- <img src=\"/assets/images/LOGO2.png\" alt=\"\" /> --> 
          <h2>Abhyas</h2></a>
   </div>
   <!-- END LOGO -->
   <!-- BEGIN LOGIN -->
   <div style=\"margin-top: 10px;\" class=\"content\">
      <!-- BEGIN LOGIN FORM -->
      ";
        // line 16
        if ($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "error", array())) {
            // line 17
            echo "      <div class=\"alert alert-danger alert-dismissable\" style=\"margin-top: 25px\">
          <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
          ";
            // line 19
            echo $this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "error", array());
            echo "
      </div>
      ";
        }
        // line 22
        echo "      ";
        if ($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "success", array())) {
            // line 23
            echo "      <div class=\"alert alert-success alert-dismissable\" style=\"margin-top: 25px\">
          <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
          ";
            // line 25
            echo $this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "success", array());
            echo "
      </div>
      ";
        }
        // line 28
        echo "      <form name=\"loginform\" method=\"post\" class=\"c-form-login login-form\" action=\"http://abhyas.retouchingwork.org/login\">
          <h3 class=\"form-title font-green\">Sign In</h3>
          <div class=\"alert alert-danger display-hide\">
              <button class=\"close\" data-close=\"alert\"></button>
              <span> Enter username and password. </span>
          </div>
             <div class=\"form-group\">
                 <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                 <label class=\"control-label visible-ie8 visible-ie9\">Username</label>
                 <input class=\"form-control form-control-solid placeholder-no-fix\" type=\"email\" autocomplete=\"off\" placeholder=\"Email Address\" name=\"email\" /> 
             </div>
             <div class=\"form-group\">
                 <label class=\"control-label visible-ie8 visible-ie9\">Password</label>
                 <input class=\"form-control form-control-solid placeholder-no-fix\" type=\"password\" autocomplete=\"off\" placeholder=\"Password\" name=\"password\" /> 
             </div>
             <div class=\"form-actions\">
                 <button type=\"submit\" class=\"btn green uppercase\">Login</button>
                 <label class=\"rememberme check mt-checkbox mt-checkbox-outline\">
                     <input type=\"checkbox\" name=\"remember\" value=\"1\" />Remember
                     <span></span>
                 </label>
                 <a href=\"javascript:;\" id=\"forget-password\" class=\"forget-password\">Forgot Password?</a>
             </div>
      </form>
      <!-- END LOGIN FORM -->
      <!-- BEGIN FORGOT PASSWORD FORM -->
      <form class=\"forget-form\" action=\"http://api.wishtru.com/forgot\" method=\"post\">
          <h3 class=\"font-green\">Forget Password ?</h3>
          <p> Enter your e-mail address below to reset your password. </p>
          <div class=\"form-group\">
              <input class=\"form-control placeholder-no-fix\" type=\"email\" autocomplete=\"off\" placeholder=\"Email\" name=\"email\" /> </div>
          <div class=\"form-actions\">
              <button type=\"button\" id=\"back-btn\" class=\"btn green btn-outline\">Back</button>
              <button type=\"submit\" class=\"btn btn-success uppercase pull-right\">Submit</button>
          </div>
      </form>
      <!-- END FORGOT PASSWORD FORM -->
   </div>
   <div class=\"copyright\"> 2017 © WISHtru. Admin Dashboard. </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "admin/login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 28,  64 => 25,  60 => 23,  57 => 22,  51 => 19,  47 => 17,  45 => 16,  31 => 4,  28 => 3,  11 => 1,);
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

<div class=\"c-layout-page login\">
   <!-- BEGIN LOGO -->
   <div class=\"logo\">
      <a href=\"index.html\">
          <!-- <img src=\"/assets/images/LOGO2.png\" alt=\"\" /> --> 
          <h2>Abhyas</h2></a>
   </div>
   <!-- END LOGO -->
   <!-- BEGIN LOGIN -->
   <div style=\"margin-top: 10px;\" class=\"content\">
      <!-- BEGIN LOGIN FORM -->
      {% if flash.error %}
      <div class=\"alert alert-danger alert-dismissable\" style=\"margin-top: 25px\">
          <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
          {{ flash.error }}
      </div>
      {% endif %}
      {% if flash.success %}
      <div class=\"alert alert-success alert-dismissable\" style=\"margin-top: 25px\">
          <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
          {{ flash.success }}
      </div>
      {% endif %}
      <form name=\"loginform\" method=\"post\" class=\"c-form-login login-form\" action=\"http://abhyas.retouchingwork.org/login\">
          <h3 class=\"form-title font-green\">Sign In</h3>
          <div class=\"alert alert-danger display-hide\">
              <button class=\"close\" data-close=\"alert\"></button>
              <span> Enter username and password. </span>
          </div>
             <div class=\"form-group\">
                 <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                 <label class=\"control-label visible-ie8 visible-ie9\">Username</label>
                 <input class=\"form-control form-control-solid placeholder-no-fix\" type=\"email\" autocomplete=\"off\" placeholder=\"Email Address\" name=\"email\" /> 
             </div>
             <div class=\"form-group\">
                 <label class=\"control-label visible-ie8 visible-ie9\">Password</label>
                 <input class=\"form-control form-control-solid placeholder-no-fix\" type=\"password\" autocomplete=\"off\" placeholder=\"Password\" name=\"password\" /> 
             </div>
             <div class=\"form-actions\">
                 <button type=\"submit\" class=\"btn green uppercase\">Login</button>
                 <label class=\"rememberme check mt-checkbox mt-checkbox-outline\">
                     <input type=\"checkbox\" name=\"remember\" value=\"1\" />Remember
                     <span></span>
                 </label>
                 <a href=\"javascript:;\" id=\"forget-password\" class=\"forget-password\">Forgot Password?</a>
             </div>
      </form>
      <!-- END LOGIN FORM -->
      <!-- BEGIN FORGOT PASSWORD FORM -->
      <form class=\"forget-form\" action=\"http://api.wishtru.com/forgot\" method=\"post\">
          <h3 class=\"font-green\">Forget Password ?</h3>
          <p> Enter your e-mail address below to reset your password. </p>
          <div class=\"form-group\">
              <input class=\"form-control placeholder-no-fix\" type=\"email\" autocomplete=\"off\" placeholder=\"Email\" name=\"email\" /> </div>
          <div class=\"form-actions\">
              <button type=\"button\" id=\"back-btn\" class=\"btn green btn-outline\">Back</button>
              <button type=\"submit\" class=\"btn btn-success uppercase pull-right\">Submit</button>
          </div>
      </form>
      <!-- END FORGOT PASSWORD FORM -->
   </div>
   <div class=\"copyright\"> 2017 © WISHtru. Admin Dashboard. </div>
</div>

{% endblock %}", "admin/login.twig", "");
    }
}
