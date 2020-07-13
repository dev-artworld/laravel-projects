<?php

/* users/activate.twig */
class __TwigTemplate_bf10dfbc0592f97ea344a0018b21083e3636a9935f3db2bd9168891fa142a17f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/index-activate.twig", "users/activate.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "admin/index-activate.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "<div style=\"padding-top: 30px;\" class=\"page-content\">
   <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
   <div class=\"page-content-container\">
      <div class=\"page-content-row\">
         <div style=\"padding-left: 0px;\" class=\"page-content-col\">
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class=\"row\">
               <div class=\"col-md-12\">
                  <!-- BEGIN EXAMPLE TABLE PORTLET-->
                  <div class=\"portlet light portlet-fit bordered\">
                      <div class=\"portlet-title\">
                          <div class=\"caption\">
                              <i class=\" icon-users font-green\"></i>
                              <span class=\"caption-subject font-green bold uppercase\">Activate Your Account</span>
                          </div>
                      </div>
                      <div class=\"portlet-body\">
                          <div class=\"mt-element-step\">
                              <div class=\"row step-line\">

                                  <div class=\"col-md-4 mt-step-col first done\">
                                      <div class=\"mt-step-number bg-white\">1</div>
                                      <div class=\"mt-step-title uppercase font-grey-cascade\">Registration</div>
                                      <div class=\"mt-step-content font-grey-cascade\">Registered account</div>
                                  </div>
                                  <div class=\"col-md-4 mt-step-col error\">
                                      <div class=\"mt-step-number bg-white\">2</div>
                                      <div class=\"mt-step-title uppercase font-grey-cascade\">Verification</div>
                                      <div class=\"mt-step-content font-grey-cascade\">Completed your account verification</div>
                                  </div>
                                  <div class=\"col-md-4 mt-step-col last ";
        // line 33
        if ((twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "confirm", array())) == "1")) {
            echo " done ";
        }
        echo "\">
                                      <div class=\"mt-step-number bg-white\">3</div>
                                      <div class=\"mt-step-title uppercase font-grey-cascade\">Confirmation</div>
                                      <div class=\"mt-step-content font-grey-cascade\">Received your email confirmation</div>
                                  </div>
                              </div>
                          </div>
                          <table data-module=\"Activate Your Account\" data-bgcolor=\"Main BG\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#333333\" align=\"center\" class=\"currentTable\">
                            <tr>
                              <td align=\"center\">
                                <table class=\"display-width\" data-bgcolor=\"Section BG-1\" width=\"680\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#42C0D3\" align=\"center\">
                                  <tr>
                                    <td align=\"center\">
                                      <table class=\"display-width\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">
                                        <tr>
                                          <td style=\"padding:0 30px;\" align=\"center\" class=\"editable\">
                                            <table class=\"display-width\" style=\"border-radius:5px\" data-bgcolor=\"Section BG-2\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\">
                                              <tr>
                                                <td height=\"30\">
                                                </td>
                                              </tr>
                                              <tr>
                                                <td align=\"center\">
                                                  <table class=\"display-width\" width=\"80%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">
                                                    <tr>
                                                      <td class=\"caption-subject font-green bold uppercase\" style=\"color:#333333;font-family:'Segoe UI',sans-serif,Arial,Helvetica,Lato;font-size:20px;font-weight:900;letter-spacing:1px;line-height:35px;text-transform:capitalize;\" data-color=\"Title-1\" data-size=\"Title-1\" data-min=\"12\" data-max=\"48\" align=\"center\">
                                                        Activate Your Account
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td height=\"20\">
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td class=\"MsoNormal\" style=\"color:#666666;font-family:'Segoe UI',sans-serif,Arial,Helvetica,Lato;font-size:14px;line-height:24px;\" data-color=\"Content\" data-size=\"Content\" data-min=\"12\" data-max=\"34\" align=\"center\">
                                                        I prefer to think of this as something sent as a confirmation of something (password change confirmation). You can say that the email is to confirm the user's email address.
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td height=\"20\">
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td class=\"button-width\" align=\"center\">
                                                        <table class=\"display-button\" style=\"border-radius:5px;\" data-bgcolor=\"Button BG\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#f44202\" align=\"center\">
                                                          <!-- USING TABLE AS BUTTON -->
                                                          <tr>
                                                            <td class=\"MsoNormal\" style=\"color:#ffffff;font-family:'Segoe UI',sans-serif,Arial,Helvetica,Lato;font-size:13px;font-weight:bold;letter-spacing:1px;padding:7px 15px;text-transform:uppercase;\" valign=\"middle\" align=\"center\">
                                                               ";
        // line 81
        if ((twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "confirm", array())) == "0")) {
            // line 82
            echo "                                                               <button onclick=\"activateAccount(this)\" data-id=\"";
            echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id", array());
            echo "\" class=\"btn btn-success mt-sweetalert\" data-title=\"Account Activation\" data-message=\"";
            echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "first_name", array());
            echo " your account confirmation has been received, Now you can login with the application, Thank you!\" data-type=\"success\" data-allow-outside-click=\"true\" data-confirm-button-class=\"btn-success\">Activate</button>
                                                               ";
        } else {
            // line 84
            echo "                                                               <button class=\"btn btn-success mt-sweetalert\">Account Confirmed</button>
                                                               ";
        }
        // line 86
        echo "                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td height=\"20\">
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td class=\"MsoNormal\" style=\"color:#666666;font-family:'Segoe UI',sans-serif,Arial,Helvetica,Lato;font-size:14px;line-height:24px;\" align=\"center\">
                                                         <span data-color=\"Content-1\" data-size=\"Content-1\" data-min=\"12\" data-max=\"34\">To contact us, please visit</span> <span style=\"color:#42C0D3; text-decoration: underline; \"><a href=\"mailto:admin@wishtru.com\" style=\"color:#42C0D3;\" data-color=\"Content-2\" data-size=\"Content-2\" data-min=\"12\" data-max=\"34\">http://support.wishtru.com</a></span>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td height=\"15\">
                                                      </td>
                                                    </tr>
                                                  </table>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td height=\"30\">
                                                </td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
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
        return "users/activate.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 86,  126 => 84,  118 => 82,  116 => 81,  63 => 33,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'admin/index-activate.twig' %}
{% block content %}
<div style=\"padding-top: 30px;\" class=\"page-content\">
   <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
   <div class=\"page-content-container\">
      <div class=\"page-content-row\">
         <div style=\"padding-left: 0px;\" class=\"page-content-col\">
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class=\"row\">
               <div class=\"col-md-12\">
                  <!-- BEGIN EXAMPLE TABLE PORTLET-->
                  <div class=\"portlet light portlet-fit bordered\">
                      <div class=\"portlet-title\">
                          <div class=\"caption\">
                              <i class=\" icon-users font-green\"></i>
                              <span class=\"caption-subject font-green bold uppercase\">Activate Your Account</span>
                          </div>
                      </div>
                      <div class=\"portlet-body\">
                          <div class=\"mt-element-step\">
                              <div class=\"row step-line\">

                                  <div class=\"col-md-4 mt-step-col first done\">
                                      <div class=\"mt-step-number bg-white\">1</div>
                                      <div class=\"mt-step-title uppercase font-grey-cascade\">Registration</div>
                                      <div class=\"mt-step-content font-grey-cascade\">Registered account</div>
                                  </div>
                                  <div class=\"col-md-4 mt-step-col error\">
                                      <div class=\"mt-step-number bg-white\">2</div>
                                      <div class=\"mt-step-title uppercase font-grey-cascade\">Verification</div>
                                      <div class=\"mt-step-content font-grey-cascade\">Completed your account verification</div>
                                  </div>
                                  <div class=\"col-md-4 mt-step-col last {% if user.confirm|e == '1' %} done {% endif %}\">
                                      <div class=\"mt-step-number bg-white\">3</div>
                                      <div class=\"mt-step-title uppercase font-grey-cascade\">Confirmation</div>
                                      <div class=\"mt-step-content font-grey-cascade\">Received your email confirmation</div>
                                  </div>
                              </div>
                          </div>
                          <table data-module=\"Activate Your Account\" data-bgcolor=\"Main BG\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#333333\" align=\"center\" class=\"currentTable\">
                            <tr>
                              <td align=\"center\">
                                <table class=\"display-width\" data-bgcolor=\"Section BG-1\" width=\"680\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#42C0D3\" align=\"center\">
                                  <tr>
                                    <td align=\"center\">
                                      <table class=\"display-width\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">
                                        <tr>
                                          <td style=\"padding:0 30px;\" align=\"center\" class=\"editable\">
                                            <table class=\"display-width\" style=\"border-radius:5px\" data-bgcolor=\"Section BG-2\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\">
                                              <tr>
                                                <td height=\"30\">
                                                </td>
                                              </tr>
                                              <tr>
                                                <td align=\"center\">
                                                  <table class=\"display-width\" width=\"80%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">
                                                    <tr>
                                                      <td class=\"caption-subject font-green bold uppercase\" style=\"color:#333333;font-family:'Segoe UI',sans-serif,Arial,Helvetica,Lato;font-size:20px;font-weight:900;letter-spacing:1px;line-height:35px;text-transform:capitalize;\" data-color=\"Title-1\" data-size=\"Title-1\" data-min=\"12\" data-max=\"48\" align=\"center\">
                                                        Activate Your Account
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td height=\"20\">
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td class=\"MsoNormal\" style=\"color:#666666;font-family:'Segoe UI',sans-serif,Arial,Helvetica,Lato;font-size:14px;line-height:24px;\" data-color=\"Content\" data-size=\"Content\" data-min=\"12\" data-max=\"34\" align=\"center\">
                                                        I prefer to think of this as something sent as a confirmation of something (password change confirmation). You can say that the email is to confirm the user's email address.
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td height=\"20\">
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td class=\"button-width\" align=\"center\">
                                                        <table class=\"display-button\" style=\"border-radius:5px;\" data-bgcolor=\"Button BG\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#f44202\" align=\"center\">
                                                          <!-- USING TABLE AS BUTTON -->
                                                          <tr>
                                                            <td class=\"MsoNormal\" style=\"color:#ffffff;font-family:'Segoe UI',sans-serif,Arial,Helvetica,Lato;font-size:13px;font-weight:bold;letter-spacing:1px;padding:7px 15px;text-transform:uppercase;\" valign=\"middle\" align=\"center\">
                                                               {% if user.confirm|e == '0' %}
                                                               <button onclick=\"activateAccount(this)\" data-id=\"{{user.id}}\" class=\"btn btn-success mt-sweetalert\" data-title=\"Account Activation\" data-message=\"{{user.first_name}} your account confirmation has been received, Now you can login with the application, Thank you!\" data-type=\"success\" data-allow-outside-click=\"true\" data-confirm-button-class=\"btn-success\">Activate</button>
                                                               {% else %}
                                                               <button class=\"btn btn-success mt-sweetalert\">Account Confirmed</button>
                                                               {% endif %}
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td height=\"20\">
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td class=\"MsoNormal\" style=\"color:#666666;font-family:'Segoe UI',sans-serif,Arial,Helvetica,Lato;font-size:14px;line-height:24px;\" align=\"center\">
                                                         <span data-color=\"Content-1\" data-size=\"Content-1\" data-min=\"12\" data-max=\"34\">To contact us, please visit</span> <span style=\"color:#42C0D3; text-decoration: underline; \"><a href=\"mailto:admin@wishtru.com\" style=\"color:#42C0D3;\" data-color=\"Content-2\" data-size=\"Content-2\" data-min=\"12\" data-max=\"34\">http://support.wishtru.com</a></span>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td height=\"15\">
                                                      </td>
                                                    </tr>
                                                  </table>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td height=\"30\">
                                                </td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
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
{% endblock %}", "users/activate.twig", "");
    }
}
