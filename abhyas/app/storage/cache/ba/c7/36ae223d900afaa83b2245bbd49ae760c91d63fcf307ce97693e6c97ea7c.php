<?php

/* wishes/create.twig */
class __TwigTemplate_bac736ae223d900afaa83b2245bbd49ae760c91d63fcf307ce97693e6c97ea7c extends Twig_Template
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
                <a href=\"/beacons\">Beacons</a>
            </li>
            <li class=\"active\">Add Beacons</li>
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
                            <a href=\"/campaigns/create\">
                                <i class=\"fa fa-bullhorn\"></i> + Campaign
                            </a>

                        <li>
                            <a data-toggle=\"modal\" href=\"#beacon\">
                                <i class=\"fa fa-rss\"></i> + Beacon 
                            </a>
                        </li>
                        <li>
                            <a data-toggle=\"modal\" href=\"#location\">
                                <i class=\"fa fa-map-marker\"></i> + Locations
                            </a>
                        </li>
                        <li>
                            <a data-toggle=\"modal\" href=\"upgrade.html\">
                                <i class=\"fa fa-briefcase\"></i> Upgrade Plan
                            </a>
                        </li>
                    </ul>
                    <!-- beacon -->
                    <div id=\"beacon\" class=\"modal fade\" tabindex=\"-1\" data-width=\"450\">
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
        // line 74
        echo twig_escape_filter($this->env, (isset($context["user_id"]) ? $context["user_id"] : null), "html", null, true);
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
                    </div>
                  <!-- location -->
                    <div data-width=\"450\" tabindex=\"-1\" class=\"modal fade\" id=\"location\">
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
        // line 146
        echo twig_escape_filter($this->env, (isset($context["user_id"]) ? $context["user_id"] : null), "html", null, true);
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
                                                        <!--span class=\"required\" aria-required=\"true\"> * </span-->
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
                    </div>
                </nav>
            </div>
            <!-- END PAGE SIDEBAR -->
            <div class=\"page-content-col\">
                <!-- BEGIN PAGE BASE CONTENT -->
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class=\"portlet light bordered\" id=\"form_wizard_1\">
                            <div class=\"portlet-title\">
                                <div class=\"caption\">
                                    <i class=\" fa fa-bullhorn font-green\"></i>
                                    <span class=\"caption-subject font-green bold uppercase\"> Add Campaign
                                    </span>
                                </div>                                                
                            </div>
                            <div class=\"portlet-body form\">
                                <form class=\"form-horizontal\" action=\"#\" id=\"submit_form\" method=\"POST\">
                                  <input id=\"user_id\" type=\"hidden\" name=\"user_id\" value=\"";
        // line 253
        echo twig_escape_filter($this->env, (isset($context["user_id"]) ? $context["user_id"] : null), "html", null, true);
        echo "\" />
                                  <input id=\"campaignPicture\" type=\"hidden\" name=\"campaign_image\">
                                  <input id=\"iPhonePicture\" type=\"hidden\" name=\"iPhone_image\">
                                    <div class=\"form-wizard\">
                                        <div class=\"form-body\">
                                            <ul class=\"nav nav-pills nav-justified steps\">
                                                <li>
                                                    <a href=\"#tab1\" data-toggle=\"tab\" class=\"step\">
                                                        <span class=\"number\"> 1 </span>
                                                        <span class=\"desc\">
                                                            <i class=\"fa fa-check\"></i> Push Notfication </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=\"#tab2\" data-toggle=\"tab\" class=\"step\">
                                                        <span class=\"number\"> 2 </span>
                                                        <span class=\"desc\">
                                                            <i class=\"fa fa-check\"></i> Message </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=\"#tab3\" data-toggle=\"tab\" class=\"step active\">
                                                        <span class=\"number\"> 3 </span>
                                                        <span class=\"desc\">
                                                            <i class=\"fa fa-check\"></i> Target </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=\"#tab4\" data-toggle=\"tab\" class=\"step\">
                                                        <span class=\"number\"> 4 </span>
                                                        <span class=\"desc\">
                                                            <i class=\"fa fa-check\"></i> Deliver </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div id=\"bar\" class=\"progress progress-striped\" role=\"progressbar\">
                                                <div class=\"progress-bar progress-bar-success\"> </div>
                                            </div>
                                            <div class=\"tab-content\">
                                                <div class=\"alert alert-danger display-none\">
                                                    <button class=\"close\" data-dismiss=\"alert\"></button> You have some form errors. Please check below. </div>
                                                <div class=\"alert alert-success display-none\">
                                                    <button class=\"close\" data-dismiss=\"alert\"></button> Your form validation is successful! </div>
                                                <div class=\"tab-pane active\" id=\"tab1\">
                                                    <h3 class=\"block\">Provide the push notification for your campaign.</h3>
                                                        <div class=\"form-group\">
                                                            <label class=\"control-label col-md-3\">Push Notification Message
                                                                <span class=\"required\"> * </span>
                                                            </label>
                                                            <div class=\"col-md-4\">
                                                                <textarea class=\"form-control\" rows=\"3\" name=\"push_notification\"></textarea>
                                                            </div>
                                                        </div>                                                              
                                                </div>
                                                <div class=\"tab-pane\" id=\"tab2\">
                                                    <h3 class=\"block\">Create a message for your campaign</h3>
                                                    <div class=\"form-group\">
                                                        <label class=\"control-label col-md-3\">Campaign Type
                                                            <span class=\"required\"> * </span>
                                                        </label>
                                                        <div class=\"col-md-4\">
                                                            <select name=\"campaign_type\" id=\"campaign-type\" class=\"form-control\">
                                                                <option value=\"\"></option>
                                                                <option value=\"Deals\">Deals</option>
                                                                <option value=\"Annoucement\">Annoucement</option>
                                                                <option value=\"Advertisement\">Advertisement</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class=\"form-group\">
                                                        <label class=\"control-label col-md-3\">Deal Start Date/Time</label>
                                                        <div class=\"col-md-4\">
                                                            <div class=\"input-group date form_meridian_datetime\" data-date=\"2012-12-21T15:25:00Z\">
                                                            <input name=\"campaign_deal_start\" type=\"text\" size=\"16\" class=\"form-control\">
                                                                <span class=\"input-group-btn\">
                                                                        <button class=\"btn default date-reset\" type=\"button\">
                                                                    <i class=\"fa fa-times\"></i>
                                                                    </button>
                                                                    <button class=\"btn default date-set\" type=\"button\">
                                                                    <i class=\"fa fa-calendar\"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=\"form-group\">
                                                        <label class=\"control-label col-md-3\">Deal End Date/Time</label>
                                                        <div class=\"col-md-4\">
                                                            <div class=\"input-group date form_meridian_datetime\" data-date=\"2012-12-21T15:25:00Z\">
                                                            <input name=\"campaign_deal_end\" type=\"text\" size=\"16\" class=\"form-control\">
                                                                <span class=\"input-group-btn\">
                                                                    <button class=\"btn default date-reset\" type=\"button\">
                                                                    <i class=\"fa fa-times\"></i>
                                                                    </button>
                                                                    <button class=\"btn default date-set\" type=\"button\">
                                                                    <i class=\"fa fa-calendar\"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=\"form-group\">
                                                        <label class=\"control-label col-md-3\">Campaign Name
                                                            <span class=\"required\"> * </span>
                                                        </label>
                                                        <div class=\"col-md-4\">
                                                            <input type=\"text\" class=\"form-control\" name=\"campaign_name\" />
                                                        </div>
                                                    </div>
                                                    <div class=\"form-group\">
                                                        <label for=\"exampleInputFile\" class=\"col-md-3 control-label\">Upload Campaign Image</label>
                                                        <div class=\"col-md-4\">
                                                            <div class=\"fileinput fileinput-new\" data-provides=\"fileinput\">
                                                                    <div class=\"input-group input-large\">
                                                                        <div class=\"form-control uneditable-input input-fixed input-medium\" data-trigger=\"fileinput\">
                                                                            <i class=\"fa fa-file fileinput-exists\"></i>&nbsp;
                                                                            <span class=\"fileinput-filename\"> </span>
                                                                        </div>
                                                                        <span class=\"input-group-addon btn default btn-file\">
                                                                            <span class=\"fileinput-new\"> Select file </span>
                                                                            <span class=\"fileinput-exists\"> Change </span>
                                                                            <input id=\"campaignImage\" name=\"files[]\" multiple=\"\" type=\"file\"> </span>
                                                                        <a href=\"javascript:;\" class=\"input-group-addon btn red fileinput-exists\" data-dismiss=\"fileinput\"> Remove </a>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class=\"form-group\">
                                                        <label class=\"control-label col-md-3\">Campaign Headline
                                                            <span class=\"required\"> * </span>
                                                        </label>
                                                        <div class=\"col-md-4\">
                                                            <input type=\"text\" class=\"form-control\" name=\"campaign_headline\" />
                                                        </div>
                                                    </div>
                                                    <div class=\"form-group\">
                                                        <label class=\"col-md-3 control-label\">Action Buttons</label>
                                                            <div class=\"col-md-4\">
                                                                <div class=\"mt-checkbox-inline\">
                                                                    <div class=\"row\">
                                                                        <label class=\"control-label col-md-3\">Label
                                                                            <span class=\"required\"> * </span>
                                                                        </label>
                                                                        <div class=\"col-md-9\">
                                                                        <input type=\"text\" class=\"form-control\" name=\"campaign_button_label\" />
                                                                        </div>
                                                                    </div>
                                                                    <div class=\"row\">
                                                                        <label class=\"control-label col-md-3\">URL
                                                                            <span class=\"required\"> * </span>
                                                                        </label>
                                                                        <div class=\"col-md-9\">
                                                                        <input type=\"text\" class=\"form-control\" name=\"campaign_button_url\" />
                                                                        </div>
                                                                    </div>
                                                                    <div class=\"row\">
                                                                        <label class=\"control-label col-md-3\">Button
                                                                            <span class=\"required\"> * </span>
                                                                        </label>
                                                                        <div class=\"col-md-9\">
                                                                            <div class=\"md-checkbox\">
                                                                                <input name=\"campaign_action_button\" value=\"1\" id=\"campaign_action_button\" class=\"md-check\" type=\"checkbox\">
                                                                                <label for=\"campaign_action_button\">
                                                                                    <span></span>
                                                                                    <span class=\"check\"></span>
                                                                                    <span class=\"box\"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                    </div>
                                                </div>
                                                <div class=\"tab-pane\" id=\"tab3\">
                                                    <h3 class=\"block\">Assign locations & beacons for campaign</h3>
                                                    <div class=\"form-group\">
                                                        <label class=\"control-label col-md-3\">Select Locations
                                                            <span class=\"required\"> * </span>
                                                        </label>
                                                        <div class=\"col-md-4\">
                                                            <select name=\"campaign_location\" id=\"location-list\" class=\"form-control\">
                                                                <option value=\"\"></option>
                                                                ";
        // line 437
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["locations"]) ? $context["locations"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["location"]) {
            // line 438
            echo "                                                                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["location"]) ? $context["location"] : null), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["location"]) ? $context["location"] : null), "nickname"), "html", null, true);
            echo "</option>
                                                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['location'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 440
        echo "                                                            </select>
                                                        </div>
                                                        <span class=\"notice-message-campaign\">Note: Please check you have added the location before submit the campaign, you need to add location firstly, if you have already added ignor that, you have to choose one of them.</span>
                                                    </div>
                                                    <div class=\"form-group\">
                                                        <label class=\"control-label col-md-3\">Select Beacons
                                                            <span class=\"required\"> * </span>
                                                        </label>
                                                        <div class=\"col-md-4\">
                                                            <select name=\"campaign_beacon\" id=\"beacon-list\" multiple class=\"form-control\">
                                                                ";
        // line 450
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["beacons"]) ? $context["beacons"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["beacon"]) {
            // line 451
            echo "                                                                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["beacon"]) ? $context["beacon"] : null), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["beacon"]) ? $context["beacon"] : null), "beacon_name"), "html", null, true);
            echo "</option>
                                                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['beacon'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 453
        echo "                                                            </select>
                                                        </div>
                                                        <span class=\"notice-message-campaign\">Note: Please check you have added the beacon before submit the campaign, you need to add beacons firstly, if you have already added ignor that, you have to choose one of them.</span>
                                                    </div>
                                                </div>
                                                <div class=\"tab-pane\" id=\"tab4\">
                                                    <h3 class=\"block\">Schedule Campaign</h3>
                                                    <div class=\"form-group\">
                                                        <label class=\"col-md-3 control-label\">When should this campaign be activated?</label>
                                                            <div class=\"col-md-9\">
                                                                <div class=\"mt-radio-list\">
                                                                    <label class=\"mt-radio\">
                                                                        <input type=\"radio\" name=\"campaign_schedule\" id=\"campaign-schedule\" value=\"activete_now\"> Activate Immediately
                                                                        <span></span>
                                                                    </label>
                                                                    <label class=\"mt-radio\">
                                                                        <input type=\"radio\" name=\"campaign_schedule\" id=\"campaign-future\" value=\"schedule_future\"> Schedule for the future
                                                                        <span></span>
                                                                    </label>                  
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class=\"form-group\">
                                                        <label class=\"control-label col-md-3\">Campaign Start Date/Time</label>
                                                        <div class=\"col-md-4\">
                                                            <div class=\"input-group date form_meridian_datetime\" data-date=\"2012-12-21T15:25:00Z\">
                                                            <input name=\"campaign_start\" type=\"text\" size=\"16\" class=\"form-control\">
                                                                <span class=\"input-group-btn\">
                                                                    <button class=\"btn default date-reset\" type=\"button\">
                                                                    <i class=\"fa fa-times\"></i>
                                                                    </button>
                                                                    <button class=\"btn default date-set\" type=\"button\">
                                                                    <i class=\"fa fa-calendar\"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=\"form-group\">
                                                        <label class=\"control-label col-md-3\">Campaign End Date/Time</label>
                                                        <div class=\"col-md-4\">
                                                            <div class=\"input-group date form_meridian_datetime\" data-date=\"2012-12-21T15:25:00Z\">
                                                            <input name=\"campaign_end\" type=\"text\" size=\"16\" class=\"form-control\">
                                                                <span class=\"input-group-btn\">
                                                                    <button class=\"btn default date-reset\" type=\"button\">
                                                                    <i class=\"fa fa-times\"></i>
                                                                    </button>
                                                                    <button class=\"btn default date-set\" type=\"button\">
                                                                    <i class=\"fa fa-calendar\"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"form-actions\">
                                            <div class=\"row\">
                                                <div class=\"col-md-offset-3 col-md-9\">
                                                    <a href=\"javascript:;\" class=\"btn default button-previous\">
                                                        <i class=\"fa fa-angle-left\"></i> Back </a>
                                                    <a href=\"javascript:;\" class=\"btn btn-outline green button-next\"> Continue
                                                        <i class=\"fa fa-angle-right\"></i>
                                                    </a>
                                                    <a data-method=\"POST\" href=\"javascript:;\" class=\"btn green button-submit\" id=\"campaign-button-submit\"> Submit
                                                        <i class=\"fa fa-check\"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
        return "wishes/create.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  518 => 453,  507 => 451,  503 => 450,  491 => 440,  480 => 438,  476 => 437,  289 => 253,  179 => 146,  104 => 74,  31 => 3,  28 => 2,);
    }
}
