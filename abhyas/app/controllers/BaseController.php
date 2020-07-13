<?php

class BaseController
{

    protected $app;
    protected $data;

    public function __construct()
    {
        $this->app = Slim\Slim::getInstance();
        $this->data = array();

        if(!empty(@$_SESSION['cartalyst_sentry'])):

            $login_data = unserialize(@$_SESSION['cartalyst_sentry']);

            $user = Sentry::findUserById($login_data[0]);

            $user_detail = $user->toArray();

            /*logged user name*/
            $this->data['user_id'] = $user_detail['id'];
            $this->data['first_name'] = $user_detail['first_name'];
            $this->data['last_name']  = $user_detail['last_name'];
            $this->data['company'] = $user_detail['company'];
            $this->data['user_image'] = ($user_detail['user_image']) ? $user_detail['user_image'] : "https://ad.roostio.com/assets/images/default-logo.png";

        endif;

        /** default title */
        $this->data['title'] = '';

        /** meta tag and information */
        $this->data['meta'] = array();

        /** queued css files */
        $this->data['css'] = array(
            'internal'  => array(),
            'external'  => array()
        );

        /** queued js files */
        $this->data['js'] = array(
            'internal'  => array(),
            'external'  => array()
        );

        /** prepared message info */
        $this->data['message'] = array(
            'error'    => array(),
            'info'    => array(),
            'debug'    => array(),
        );

        /** global javascript var */
        $this->data['global'] = array();

        /** base dir for asset file */
        $this->data['baseUrl']  = $this->baseUrl();
        $this->data['assetUrl'] = $this->data['baseUrl'].'assets/';

        $this->loadBaseCss();
        $this->loadBaseJs();

    }

    /**
     * enqueue css asset to be loaded
     * @param  [string] $css     [css file to be loaded relative to base_asset_dir]
     * @param  [array]  $options [location=internal|external, position=first|last|after:file|before:file]
     */
    protected function loadCss($css, $options=array())
    {
        $location = (isset($options['location'])) ? $options['location']:'internal';

        //after:file, before:file, first, last
        $position = (isset($options['position'])) ? $options['position']:'last';

        if(!in_array($css,$this->data['css'][$location])){
            if($position=='first' || $position=='last'){
                $key = $position;
                $file='';
            }else{
                list($key,$file) =  explode(':',$position);
            }

            switch($key){
                case 'first':
                    array_unshift($this->data['css'][$location],$css);
                break;

                case 'last':
                    $this->data['css'][$location][]=$css;
                break;

                case 'before':
                case 'after':
                    $varkey = array_keys($this->data['css'][$location],$file);
                    if($varkey){
                        $nextkey = ($key=='after') ? $varkey[0]+1 : $varkey[0];
                        array_splice($this->data['css'][$location],$nextkey,0,$css);
                    }else{
                        $this->data['css'][$location][]=$css;
                    }
                break;
            }
        }
    }


    /**
     * enqueue js asset to be loaded
     * @param  [string] $js      [js file to be loaded relative to base_asset_dir]
     * @param  [array]  $options [location=internal|external, position=first|last|after:file|before:file]
     */
    protected function loadJs($js, $options=array())
    {
        $location = (isset($options['location'])) ? $options['location']:'internal';

        //after:file, before:file, first, last
        $position = (isset($options['position'])) ? $options['position']:'last';

        if(!in_array($js,$this->data['js'][$location])){
            if($position=='first' || $position=='last'){
                $key = $position;
                $file='';
            }else{
                list($key,$file) =  explode(':',$position);
            }

            switch($key){
                case 'first':
                    array_unshift($this->data['js'][$location],$js);
                break;

                case 'last':
                    $this->data['js'][$location][]=$js;
                break;

                case 'before':
                case 'after':
                    $varkey = array_keys($this->data['js'][$location],$file);
                    if($varkey){
                        $nextkey = ($key=='after') ? $varkey[0]+1 : $varkey[0];
                        array_splice($this->data['js'][$location],$nextkey,0,$js);
                    }else{
                        $this->data['js'][$location][]=$js;
                    }
                break;
            }
        }
    }

    /**
     * clear enqueued css asset
     */
    protected function resetCss()
    {
        $this->data['css']         = array(
            'internal'  => array(),
            'external'  => array()
        );
    }

    /**
     * clear enqueued js asset
     */
    protected function resetJs()
    {
        $this->data['js']         = array(
            'internal'  => array(),
            'external'  => array()
        );
    }

    /**
     * remove individual css file from queue list
     * @param  [string] $css [css file to be removed]
     */
    protected function removeCss($css)
    {
        $key=array_keys($this->data['css']['internal'],$css);
        if($key){
            array_splice($this->data['css']['internal'],$key[0],1);
        }

        $key=array_keys($this->data['css']['external'],$css);
        if($key){
            array_splice($this->data['css']['external'],$key[0],1);
        }
    }

    /**
     * remove individual js file from queue list
     * @param  [string] $js [js file to be removed]
     */
    protected function removeJs($js)
    {
        $key=array_keys($this->data['js']['internal'],$js);
        if($key){
            array_splice($this->data['js']['internal'],$key[0],1);
        }

        $key=array_keys($this->data['js']['external'],$js);
        if($key){
            array_splice($this->data['js']['external'],$key[0],1);
        }
    }

    /**
     * addMessage to be viewd in the view file
     */
    protected function message($message, $type='info')
    {
        $this->data['message'][$type] = $message;
    }

    /**
     * register global variable to be accessed via javascript
     */
    protected function publish($key,$val)
    {
        $this->data['global'][$key] =  $val;
    }

    /**
     * remove published variable from registry
     */
    protected function unpublish($key)
    {
        unset($this->data['global'][$key]);
    }

    /**
     * add custom meta tags to the page
     */
    protected function meta($name, $content)
    {
        $this->data['meta'][$name] = $content;
    }

    /**
     * load base css for the template
     */
    protected function loadBaseCss()
    {
        $this->loadCss("global/plugins/font-awesome/css/font-awesome.min.css");
        $this->loadCss("global/plugins/simple-line-icons/simple-line-icons.min.css");
        $this->loadCss("global/plugins/bootstrap/css/bootstrap.min.css");
        $this->loadCss("global/plugins/bootstrap-switch/css/bootstrap-switch.min.css");
        $this->loadCss("global/plugins/bootstrap-fileinput/bootstrap-fileinput.css");
        $this->loadCss("global/plugins/dropzone/dropzone.min.css");
        $this->loadCss("global/plugins/dropzone/basic.min.css");
        $this->loadCss("global/plugins/bootstrap-daterangepicker/daterangepicker.min.css");
        $this->loadCss("global/plugins/jquery-multi-select/css/multi-select.css");
        $this->loadCss("global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css");
        $this->loadCss("global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css");
        $this->loadCss("global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css");
        $this->loadCss("global/plugins/select2/css/select2.min.css");
        $this->loadCss("global/plugins/select2/css/select2-bootstrap.min.css");
        $this->loadCss("global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css");
        $this->loadCss("global/plugins/bootstrap-modal/css/bootstrap-modal.css");
        $this->loadCss("global/plugins/morris/morris.css");
        $this->loadCss("global/plugins/fullcalendar/fullcalendar.min.css");
        $this->loadCss("global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css");
        $this->loadCss("global/plugins/jqvmap/jqvmap/jqvmap.css");
        $this->loadCss("global/plugins/datatables/datatables.min.css");
        $this->loadCss("global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css");
        $this->loadCss("global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css");
        $this->loadCss("global/plugins/cubeportfolio/css/cubeportfolio.css");
        $this->loadCss("pages/css/portfolio.min.css");
        //$this->loadCss("global/plugins/typeahead/typeahead.css");
        $this->loadCss("global/css/components-rounded.min.css");
        $this->loadCss("global/css/plugins.min.css");
        $this->loadCss("global/plugins/bootstrap-sweetalert/sweetalert.css");
        $this->loadCss("global/plugins/jcrop/css/jquery.Jcrop.min.css");
        $this->loadCss("pages/css/image-crop.min.css");
        $this->loadCss("pages/css/profile.min.css");
        $this->loadCss("pages/css/login.min.css");
        $this->loadCss("layouts/layout5/css/layout.min.css");
        $this->loadCss("layouts/layout5/css/custom.min.css");
        //$this->loadCss("layouts/layout5/css/step-two.css");
        $this->loadCss("jquery-te-1.4.0.css");
        //$this->loadCss("custom.css");
    }

    /**
     * load base js for the template
     */
    protected function loadBaseJs()
    {
        $this->loadJs("global/plugins/jquery.min.js");
        $this->loadJs("global/plugins/bootstrap/js/bootstrap.min.js");
        $this->loadJs("global/plugins/js.cookie.min.js");
        $this->loadJs("global/plugins/jquery-slimscroll/jquery.slimscroll.min.js");
        $this->loadJs("global/plugins/jquery.blockui.min.js");
        $this->loadJs("global/plugins/bootstrap-switch/js/bootstrap-switch.min.js");
        $this->loadJs("global/plugins/bootstrap-fileinput/bootstrap-fileinput.js");
        $this->loadJs("jquery.ui.widget.js");
        $this->loadJs("jquery.fileupload.js");
        $this->loadJs("global/plugins/moment.min.js");
        $this->loadJs("global/plugins/bootstrap-daterangepicker/daterangepicker.min.js");
        $this->loadJs("global/plugins/dropzone/dropzone.min.js");
        $this->loadJs("global/plugins/jquery-repeater/jquery.repeater.js");
        $this->loadJs("global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js");
        $this->loadJs("global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js");
        $this->loadJs("global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js");
        $this->loadJs("global/plugins/select2/js/select2.full.min.js");
        $this->loadJs("global/plugins/jquery-validation/js/jquery.validate.min.js");
        $this->loadJs("global/plugins/jquery-validation/js/additional-methods.min.js");
        $this->loadJs("global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js");
        $this->loadJs("global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js");
        $this->loadJs("global/plugins/bootstrap-modal/js/bootstrap-modal.js");
        $this->loadJs("global/plugins/morris/morris.min.js");
        $this->loadJs("global/plugins/morris/raphael-min.js");
        $this->loadJs("global/plugins/counterup/jquery.waypoints.min.js");
        $this->loadJs("global/plugins/counterup/jquery.counterup.min.js");
        $this->loadJs("global/plugins/amcharts/amcharts/amcharts.js");
        $this->loadJs("global/plugins/amcharts/amcharts/serial.js");
        $this->loadJs("global/plugins/amcharts/amcharts/pie.js");
        $this->loadJs("global/plugins/amcharts/amcharts/radar.js");
        $this->loadJs("global/plugins/amcharts/amcharts/themes/light.js");
        $this->loadJs("global/plugins/amcharts/amcharts/themes/patterns.js");
        $this->loadJs("global/plugins/amcharts/amcharts/themes/chalk.js");
        $this->loadJs("global/plugins/amcharts/ammap/ammap.js");
        $this->loadJs("global/plugins/amcharts/ammap/maps/js/worldLow.js");
        $this->loadJs("global/plugins/amcharts/amstockcharts/amstock.js");
        $this->loadJs("global/plugins/fullcalendar/fullcalendar.min.js");
        $this->loadJs("global/plugins/horizontal-timeline/horizontal-timeline.js");
        $this->loadJs("global/plugins/flot/jquery.flot.min.js");
        $this->loadJs("global/plugins/flot/jquery.flot.resize.min.js");
        $this->loadJs("global/plugins/flot/jquery.flot.categories.min.js");
        $this->loadJs("global/plugins/jquery-easypiechart/jquery.easypiechart.min.js");
        $this->loadJs("global/plugins/jquery.sparkline.min.js");
        $this->loadJs("global/plugins/jqvmap/jqvmap/jquery.vmap.js");
        $this->loadJs("global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js");
        $this->loadJs("global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js");
        $this->loadJs("global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js");
        $this->loadJs("global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js");
        $this->loadJs("global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js");
        $this->loadJs("global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js");
        $this->loadJs("global/scripts/app.min.js");
        $this->loadJs("global/scripts/datatable.js");
        $this->loadJs("global/plugins/datatables/datatables.min.js");
        $this->loadJs("global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js");
        $this->loadJs("global/plugins/bootstrap-markdown/js/bootstrap-markdown.js");
        $this->loadJs("global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js");
        $this->loadJs("global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js");
        $this->loadJs("global/plugins/bootstrap-select/js/bootstrap-select.min.js");
        $this->loadJs("global/plugins/jquery-multi-select/js/jquery.multi-select.js");
        $this->loadJs("global/plugins/bootstrap-markdown/lib/markdown.js");
        $this->loadJs("global/plugins/jquery-validation/js/jquery.validate.min.js");
        $this->loadJs("global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js");
        $this->loadJs("global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js");
        $this->loadJs("global/plugins/bootstrap-sweetalert/sweetalert.min.js");
        $this->loadJs("global/plugins/ckeditor/ckeditor.js");
        $this->loadJs("global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js");
        $this->loadJs("pages/scripts/portfolio-1.min.js");
        $this->loadJs("global/plugins/jcrop/js/jquery.color.js");
        $this->loadJs("global/plugins/jcrop/js/jquery.Jcrop.min.js");
        $this->loadJs("pages/scripts/form-image-crop.min.js");
        //$this->loadJs("global/plugins/typeahead/handlebars.min.js");
        //$this->loadJs("global/plugins/typeahead/typeahead.bundle.min.js");
        $this->loadJs("pages/scripts/dashboard.min.js");
        $this->loadJs("pages/scripts/profile.min.js");
        $this->loadJs("pages/scripts/login.min.js");
        $this->loadJs("pages/scripts/form-dropzone.min.js");
        $this->loadJs("pages/scripts/form-wizard.min.js");
	    $this->loadJs("pages/scripts/form-wizard.js");
        //$this->loadJs("pages/scripts/form-validation.min.js");
        $this->loadJs("pages/scripts/ui-extended-modals.min.js");
        $this->loadJs("pages/scripts/components-date-time-pickers.min.js");
        //$this->loadJs("pages/scripts/components-editors.min.js");
        //$this->loadJs("pages/scripts/components-typeahead.min.js");
        $this->loadJs("pages/scripts/table-datatables-managed.min.js");
        $this->loadJs("pages/scripts/form-repeater.min.js");
        $this->loadJs("pages/scripts/ui-sweetalert.min.js");
        $this->loadJs("pages/scripts/ui-sweetalert.js");
        $this->loadJs("pages/scripts/components-multi-select.min.js");
        $this->loadJs("pages/scripts/components-form-tools.min.js");
        $this->loadJs("layouts/layout5/scripts/layout.min.js");
        $this->loadJs("layouts/global/scripts/quick-sidebar.min.js");
        $this->loadJs("layouts/global/scripts/quick-nav.min.js");
        $this->loadJs("jquery-te-1.4.0.min.js");
        $this->loadJs("custom.js");
    }

    /**
     * generate base URL
     */
    protected function baseUrl()
    {
        $path       = dirname($_SERVER['SCRIPT_NAME']);
        $path       = trim($path, '/');
        $baseUrl    = Request::getUrl();
        $baseUrl    = trim($baseUrl, '/');
        return $baseUrl.'/'.$path.( $path ? '/' : '' );
    }

    /**
     * generate siteUrl
     */
    protected function siteUrl($path, $includeIndex = false)
    {
        $path = trim($path, '/index.php');
        return $this->data['baseUrl'].$path;
    }
}
