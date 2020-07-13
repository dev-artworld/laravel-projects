<?php

/* staff/index.twig */
class __TwigTemplate_b7e08a4774712614034e2a08ea3b9b3fe4c4d6ce59682cebf269b7ee298be53e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/index.twig", "staff/index.twig", 1);
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
                    <a href=\"/mathematics\">
                      <i class=\"fa fa-book\"></i> Pages
                    </a>
                 </li>
                  
                    <li>
                    <a href=\"/staff \">
                      <i class=\"fa fa-users\"></i> Experts
                    </a>
                 </li>

                  <li>  
                    <a href=\"/profile\">
                      <i class=\"fa fa-user\"></i> Profile 
                    </a>
                 </li>
                     <!--
                      <li>
                    <a href=\"/categories\">
                      <i class=\"fa fa-list-alt\"></i> Category
                    </a>
                 </li>
                          <li>
                    <a href=\"/users\">
                    <i class=\"fa fa-users\"></i> Users
                    </a>
                 </li>
                      <li>
                    <a href=\"/comments \">
                      <i class=\"fa fa-comments-o\"></i> Comments
                    </a>
                 </li> -->
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
                       <a data-method=\"POST\" id=\"staff-submit-form\" class=\"btn green\" href=\"javascript:;\"> Submit <i class=\"fa fa-user\"></i></a>
                    </div>
                 </div>
             </nav>
         </div>
         <!-- END PAGE SIDEBAR -->
         <div class=\"page-content-col\">
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class=\"portfolio-content portfolio-1\">
                <div id=\"js-filters-juicy-projects\" class=\"cbp-l-filters-button\">
                    <div data-filter=\"*\" class=\"cbp-filter-item-active cbp-filter-item btn dark btn-outline uppercase\"> All
                        <div class=\"cbp-filter-counter\"></div>
                    </div>
                   <!--  <div data-filter=\".identity\" class=\"cbp-filter-item btn dark btn-outline uppercase\"> Identity
                        <div class=\"cbp-filter-counter\"></div>
                    </div>
                    <div data-filter=\".web-design\" class=\"cbp-filter-item btn dark btn-outline uppercase\"> Web Design
                        <div class=\"cbp-filter-counter\"></div>
                    </div>
                    <div data-filter=\".graphic\" class=\"cbp-filter-item btn dark btn-outline uppercase\"> Graphic
                        <div class=\"cbp-filter-counter\"></div>
                    </div>
                    <div data-filter=\".logos\" class=\"cbp-filter-item btn dark btn-outline uppercase\"> Logo
                        <div class=\"cbp-filter-counter\"></div>
                    </div> -->
                </div>
                <div id=\"js-grid-juicy-projects\" class=\"cbp\">
                    <div class=\"cbp-item graphic\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/images/rimpel%20kumar.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project1.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"../assets/global/img/portfolio/1200x900/57.jpg\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase\" data-title=\"Dashboard<br>by Paul Flavius Nechita\">view larger</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center uppercase text-center\">Rimpel Kumar
                        </div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center uppercase text-center\">Math Master, GSSS Ladhuka, Distt Fazilka<br>
                      (Active role in Math teacher trainings) </div>
                    </div>
                    <div class=\"cbp-item web-design logos\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/images/charan%20singh.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project2.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"../assets/global/img/portfolio/1200x900/50.jpg\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase\" data-title=\"World Clock Widget<br>by Paul Flavius Nechita\">view larger</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Charan Singh</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\"> math master, GSSS Loombriwala,<br> Distt Ferozpur <br>(block mentor and written PSEB <br>books for primary classes)</div>
                    </div>
                    <div class=\"cbp-item graphic logos\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/images/jagroop singh.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project1.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"http://vimeo.com/14912890\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase\" data-title=\"To-Do Dashboard<br>by Tiberiu Neamu\">view video</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Jagroop Singh</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">Math Master, GSSS Mandi Gobindgarh <br>
     ( Distt Mentor, active role <br> in teacher trainings from last  many years <br>and part of PSEB books authors panel <br>for secondary classes)</div>
                    </div>
                    <div class=\"cbp-item web-design graphic\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/images/jatinder kumar.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project2.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/4900333&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true\"
                                            class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase\" data-title=\"Events and  More<br>by Tiberiu Neamu\">view sound</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Jatinder Kumar</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">Math Master, GSSS Giana, Distt Bathinda <br>(Block mentor and active role <br>from last years in teachers training <br>as MRP and part of PSEB books <br>authors panelfor primary <br> and  secondary classes)</div>
                    </div>
                    <div class=\"cbp-item identity web-design\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/images/kirandeep singh.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project1.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"../assets/global/img/portfolio/1200x900/4.jpg\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase\" data-title=\"WhereTO App<br>by Tiberiu Neamu\">view larger</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Kirandeep Singh</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">Math Master, GSSS Sihora, Distt Ludhiana<br>(State awardee, part of PSEB books authors <br> panel for secondary classes and <br> got Malti Gyan Peeth<br> Award from Hon'ble Vice President <br> of INDIA in 2018)</div>
                    </div>
                    <div class=\"cbp-item identity web-design\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/images/rupinder singh.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project2.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"../assets/global/img/portfolio/1200x900/7.jpg\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase\" data-title=\"Ski * Buddy<br>by Tiberiu Neamu\">view larger</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Rupinder Singh</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">
                          Math master, Gsss Khiala Kalan, Distt Mansa.<br>
                        (Distt Mentor, active role in teacher <br>trainings from last many years)</div>
                    </div>
                    <div class=\"cbp-item graphic logos\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/images/mangat rai sachdeva.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project1.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"../assets/global/img/portfolio/1200x900/60.jpg\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase\" data-title=\"Seemple* Music for iPad<br>by Tiberiu Neamu\">view sound</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center uppercase text-center\">
                          Mangat Rai Sachdeva
                        </div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">Math Master, GSSS Malsian, Distt Jalandhar <br>
                        (Active role in Math teacher trainings)</div>
                    </div>
                    <div class=\"cbp-item identity graphic\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/images/Varun Bansal.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project2.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"http://www.youtube.com/watch?v=Bu9OiDmxCrQ\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase\" data-title=\"Remind~Me More<br>by Tiberiu Neamu\">view video</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Varun Bansal</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">Math Master, Distt Fatehgarh<br>
                        (12 years experience as <br> PGT Math in chandigarh)
                        </div>
       
                    </div>
                  <!--   <div class=\"cbp-item web-design graphic\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/global/img/portfolio/600x600/81.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project1.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"https://www.ted.com/talks/andrew_bastawrous_get_your_next_eye_exam_on_a_smartphone\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase\" data-title=\"Workout Buddy<br>by Tiberiu Neamu\">view video</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Workout Buddy</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">Web Design / Graphic</div>
                    </div>
                    <div class=\"cbp-item identity web-design\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/global/img/portfolio/600x600/87.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project2.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"https://www.youtube.com/watch?v=3wbvpOIIBQA\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase\" data-title=\"Bills Bills Bills<br>by Cosmin Capitanu\">view video</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Bills Bills Bills</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">Identity / Web Design</div>
                    </div>
                    <div class=\"cbp-item identity logos\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/global/img/portfolio/600x600/102.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project1.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"../assets/global/img/portfolio/1200x900/92.jpg\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase\" data-title=\"Generic Apps<br>by Cosmin Capitanu\">view video</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                 <!--        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Generic Apps</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">Identity / Logo</div>
                    </div>
                    <div class=\"cbp-item graphic web-design\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/global/img/portfolio/600x600/96.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project2.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/26519543&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true\"
                                            class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase\" data-title=\"Speed Detector<br>by Cosmin Capitanu\">view sound</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Speed Detector</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">Graphic / Web Design</div>
                    </div>
                </div>
                <div id=\"js-loadMore-juicy-projects\" class=\"cbp-l-loadMore-button\">
                    <a href=\"../assets/global/plugins/cubeportfolio/ajax/loadMore.html\" class=\"cbp-l-loadMore-link btn grey-mint btn-outline\" rel=\"nofollow\">
                        <span class=\"cbp-l-loadMore-defaultText\">LOAD MORE</span>
                        <span class=\"cbp-l-loadMore-loadingText\">LOADING...</span>
                        <span class=\"cbp-l-loadMore-noMoreLoading\">NO MORE WORKS</span>
                    </a>
                </div> -->
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
      <h4 class=\"modal-title\">Edit Teacher</h4>
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
        // line 411
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
      <button data-method=\"PUT\" id=\"staff-update-form\" type=\"button\" class=\"btn green\">Update User</button>
   </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "staff/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  441 => 411,  31 => 3,  28 => 2,  11 => 1,);
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
                    <a href=\"/mathematics\">
                      <i class=\"fa fa-book\"></i> Pages
                    </a>
                 </li>
                  
                    <li>
                    <a href=\"/staff \">
                      <i class=\"fa fa-users\"></i> Experts
                    </a>
                 </li>

                  <li>  
                    <a href=\"/profile\">
                      <i class=\"fa fa-user\"></i> Profile 
                    </a>
                 </li>
                     <!--
                      <li>
                    <a href=\"/categories\">
                      <i class=\"fa fa-list-alt\"></i> Category
                    </a>
                 </li>
                          <li>
                    <a href=\"/users\">
                    <i class=\"fa fa-users\"></i> Users
                    </a>
                 </li>
                      <li>
                    <a href=\"/comments \">
                      <i class=\"fa fa-comments-o\"></i> Comments
                    </a>
                 </li> -->
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
                       <a data-method=\"POST\" id=\"staff-submit-form\" class=\"btn green\" href=\"javascript:;\"> Submit <i class=\"fa fa-user\"></i></a>
                    </div>
                 </div>
             </nav>
         </div>
         <!-- END PAGE SIDEBAR -->
         <div class=\"page-content-col\">
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class=\"portfolio-content portfolio-1\">
                <div id=\"js-filters-juicy-projects\" class=\"cbp-l-filters-button\">
                    <div data-filter=\"*\" class=\"cbp-filter-item-active cbp-filter-item btn dark btn-outline uppercase\"> All
                        <div class=\"cbp-filter-counter\"></div>
                    </div>
                   <!--  <div data-filter=\".identity\" class=\"cbp-filter-item btn dark btn-outline uppercase\"> Identity
                        <div class=\"cbp-filter-counter\"></div>
                    </div>
                    <div data-filter=\".web-design\" class=\"cbp-filter-item btn dark btn-outline uppercase\"> Web Design
                        <div class=\"cbp-filter-counter\"></div>
                    </div>
                    <div data-filter=\".graphic\" class=\"cbp-filter-item btn dark btn-outline uppercase\"> Graphic
                        <div class=\"cbp-filter-counter\"></div>
                    </div>
                    <div data-filter=\".logos\" class=\"cbp-filter-item btn dark btn-outline uppercase\"> Logo
                        <div class=\"cbp-filter-counter\"></div>
                    </div> -->
                </div>
                <div id=\"js-grid-juicy-projects\" class=\"cbp\">
                    <div class=\"cbp-item graphic\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/images/rimpel%20kumar.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project1.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"../assets/global/img/portfolio/1200x900/57.jpg\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase\" data-title=\"Dashboard<br>by Paul Flavius Nechita\">view larger</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center uppercase text-center\">Rimpel Kumar
                        </div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center uppercase text-center\">Math Master, GSSS Ladhuka, Distt Fazilka<br>
                      (Active role in Math teacher trainings) </div>
                    </div>
                    <div class=\"cbp-item web-design logos\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/images/charan%20singh.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project2.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"../assets/global/img/portfolio/1200x900/50.jpg\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase\" data-title=\"World Clock Widget<br>by Paul Flavius Nechita\">view larger</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Charan Singh</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\"> math master, GSSS Loombriwala,<br> Distt Ferozpur <br>(block mentor and written PSEB <br>books for primary classes)</div>
                    </div>
                    <div class=\"cbp-item graphic logos\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/images/jagroop singh.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project1.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"http://vimeo.com/14912890\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase\" data-title=\"To-Do Dashboard<br>by Tiberiu Neamu\">view video</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Jagroop Singh</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">Math Master, GSSS Mandi Gobindgarh <br>
     ( Distt Mentor, active role <br> in teacher trainings from last  many years <br>and part of PSEB books authors panel <br>for secondary classes)</div>
                    </div>
                    <div class=\"cbp-item web-design graphic\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/images/jatinder kumar.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project2.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/4900333&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true\"
                                            class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase\" data-title=\"Events and  More<br>by Tiberiu Neamu\">view sound</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Jatinder Kumar</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">Math Master, GSSS Giana, Distt Bathinda <br>(Block mentor and active role <br>from last years in teachers training <br>as MRP and part of PSEB books <br>authors panelfor primary <br> and  secondary classes)</div>
                    </div>
                    <div class=\"cbp-item identity web-design\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/images/kirandeep singh.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project1.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"../assets/global/img/portfolio/1200x900/4.jpg\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase\" data-title=\"WhereTO App<br>by Tiberiu Neamu\">view larger</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Kirandeep Singh</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">Math Master, GSSS Sihora, Distt Ludhiana<br>(State awardee, part of PSEB books authors <br> panel for secondary classes and <br> got Malti Gyan Peeth<br> Award from Hon'ble Vice President <br> of INDIA in 2018)</div>
                    </div>
                    <div class=\"cbp-item identity web-design\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/images/rupinder singh.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project2.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"../assets/global/img/portfolio/1200x900/7.jpg\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase\" data-title=\"Ski * Buddy<br>by Tiberiu Neamu\">view larger</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Rupinder Singh</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">
                          Math master, Gsss Khiala Kalan, Distt Mansa.<br>
                        (Distt Mentor, active role in teacher <br>trainings from last many years)</div>
                    </div>
                    <div class=\"cbp-item graphic logos\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/images/mangat rai sachdeva.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project1.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"../assets/global/img/portfolio/1200x900/60.jpg\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase\" data-title=\"Seemple* Music for iPad<br>by Tiberiu Neamu\">view sound</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center uppercase text-center\">
                          Mangat Rai Sachdeva
                        </div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">Math Master, GSSS Malsian, Distt Jalandhar <br>
                        (Active role in Math teacher trainings)</div>
                    </div>
                    <div class=\"cbp-item identity graphic\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/images/Varun Bansal.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project2.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"http://www.youtube.com/watch?v=Bu9OiDmxCrQ\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase\" data-title=\"Remind~Me More<br>by Tiberiu Neamu\">view video</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Varun Bansal</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">Math Master, Distt Fatehgarh<br>
                        (12 years experience as <br> PGT Math in chandigarh)
                        </div>
       
                    </div>
                  <!--   <div class=\"cbp-item web-design graphic\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/global/img/portfolio/600x600/81.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project1.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"https://www.ted.com/talks/andrew_bastawrous_get_your_next_eye_exam_on_a_smartphone\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase\" data-title=\"Workout Buddy<br>by Tiberiu Neamu\">view video</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Workout Buddy</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">Web Design / Graphic</div>
                    </div>
                    <div class=\"cbp-item identity web-design\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/global/img/portfolio/600x600/87.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project2.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"https://www.youtube.com/watch?v=3wbvpOIIBQA\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase\" data-title=\"Bills Bills Bills<br>by Cosmin Capitanu\">view video</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Bills Bills Bills</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">Identity / Web Design</div>
                    </div>
                    <div class=\"cbp-item identity logos\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/global/img/portfolio/600x600/102.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project1.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"../assets/global/img/portfolio/1200x900/92.jpg\" class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase\" data-title=\"Generic Apps<br>by Cosmin Capitanu\">view video</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                 <!--        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Generic Apps</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">Identity / Logo</div>
                    </div>
                    <div class=\"cbp-item graphic web-design\">
                        <div class=\"cbp-caption\">
                            <div class=\"cbp-caption-defaultWrap\">
                                <img src=\"../assets/global/img/portfolio/600x600/96.jpg\" alt=\"\"> </div>
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
                                        <a href=\"../assets/global/plugins/cubeportfolio/ajax/project2.html\" class=\"cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase\" rel=\"nofollow\">more info</a>
                                        <a href=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/26519543&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true\"
                                            class=\"cbp-lightbox cbp-l-caption-buttonRight btn red uppercase\" data-title=\"Speed Detector<br>by Cosmin Capitanu\">view sound</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"cbp-l-grid-projects-title uppercase text-center\">Speed Detector</div>
                        <div class=\"cbp-l-grid-projects-desc uppercase text-center\">Graphic / Web Design</div>
                    </div>
                </div>
                <div id=\"js-loadMore-juicy-projects\" class=\"cbp-l-loadMore-button\">
                    <a href=\"../assets/global/plugins/cubeportfolio/ajax/loadMore.html\" class=\"cbp-l-loadMore-link btn grey-mint btn-outline\" rel=\"nofollow\">
                        <span class=\"cbp-l-loadMore-defaultText\">LOAD MORE</span>
                        <span class=\"cbp-l-loadMore-loadingText\">LOADING...</span>
                        <span class=\"cbp-l-loadMore-noMoreLoading\">NO MORE WORKS</span>
                    </a>
                </div> -->
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
      <h4 class=\"modal-title\">Edit Teacher</h4>
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
      <button data-method=\"PUT\" id=\"staff-update-form\" type=\"button\" class=\"btn green\">Update User</button>
   </div>
</div>
{% endblock %}", "staff/index.twig", "");
    }
}