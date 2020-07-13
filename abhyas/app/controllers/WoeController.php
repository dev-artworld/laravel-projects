<?php

use \App as App;
use \View as View;
use \Menu as Menu;
use \User as User;
use \Input as Input;
use \Sentry as Sentry; 
use \Request as Request;
use \Response as Response;
use \Exception as Exception;
use \App_user as App_user;
use \Admin\BaseController;
use \Cartalyst\Sentry\Users\UserNotFoundException;

class WoeController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * display list of resource
     */
    public function index()
    {
        
        //Set the page Title
        $this->data['title'] = 'Woe Management';
        //get all users
        $this->data['users'] = App_user::get()->toArray();
        //get all woe
        $this->data['woes'] = Woe::select('woes.*')->orderBy('id', 'desc')->get()->toArray();
        /** render the template */
        View::display('woe/index.twig', $this->data);
        
    }
   
    public function store()
    {
        
        $woe = null;
        $message = '';
        $success = false;
        $targ_w = 600;
        $targ_h = 326;
        $jpeg_quality = 90;
        $png_quality = 9;
        
        try {
            $input = Input::post();

            //Define Woe Model

            $woe = new Woe();
            $woe->user_id        = $input['user_id'];
            $woe->title          = htmlentities($input['title']);
            $woe->description    = htmlentities($input['description']);
            $woe->is_fullfill    = $input['is_fullfill'];
            $woe->status         = $input['status'];
            $woe->geo_lat        = 30.57855;
            $woe->geo_long       = 76.58585;

            if(!empty($input['wish_image'])):
                //$wish->picture        = $input['wish_image'];
                if(pathinfo($input['wish_image'], PATHINFO_EXTENSION) == "jpg"){
                    $img_r = imagecreatefromjpeg($input['wish_image']);
                    $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
                    imagecopyresampled($dst_r,$img_r,0,0,$input['x'],$input['y'], $targ_w,$targ_h, 600,326);
                    imagejpeg($dst_r,dirname(dirname(dirname(__FILE__))).'/public/assets/wish-thumb/'.time().'.jpg',$jpeg_quality);
                    $wish->picture = "http://api.wishtru.com/assets/wish-thumb/".time().".jpg";
                } else {
                    $img_r = imagecreatefrompng($input['wish_image']);
                    $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
                    imagecopyresampled($dst_r,$img_r,0,0,$input['x'],$input['y'], $targ_w,$targ_h, 600,326);
                    imagepng($dst_r,dirname(dirname(dirname(__FILE__))).'/public/assets/wish-thumb/'.time().'.png',$png_quality);
                    $wish->picture = "http://api.wishtru.com/assets/wish-thumb/".time().".png";
                }
            endif;
            $wish->save();

            $success = true;
            $message = 'Woe added successfully';
        }
        catch (Exception $e) {
            $message = $e->getMessage();
        }
        
        if (Request::isAjax()) {
            Response::headers()->set('Content-Type', 'application/json');
            Response::setBody(json_encode(array(
                'success' => $success,
                'data' => ($woe) ? $wish->toArray() : $woe,
                'message' => $message,
                'code' => $success ? 200 : 500
            )));
        } else {
            Response::redirect($this->siteUrl('/woe'));
        }
        
    }
    
    public function create()
    {
        $this->data['title'] = 'Welcome to Slim Starter Application';
        App::render('woe/create.twig', $this->data);
    }
    
    public function edit($id)
    {
        
        $wish = new Woe();
        
        //Set the page Title
        $this->data['title'] = 'Woe List';
        
        //Get all campaigns Data Using Model
        $this->data['wish'] = $wish->find($id)->toArray();
        
        // print_r($this->data['campaign']);        
        
        View::display('woe/edit.twig', $this->data);
        
    }
    
    public function show($id)
    {
        $woes = Woe::find($id)->toArray();
        echo json_encode($woes);
    }
    
    public function update($id)
    {
        
        $woe    = null;
        $message = '';
        $success = false;
        $targ_w = 600;
        $targ_h = 326;
        $jpeg_quality = 90;
        $png_quality = 9;
        
        try {

            $input  = Input::put();
            //Load Campaign Model
            $woe = new Woe();
            
            //Get Particular Campaign
            $woe_data = $woe->find($id);
            
            //Set Param
            $woe_data->user_id        = $input['user_id'];
            $woe_data->title          = htmlentities($input['title']);
            $woe_data->description    = htmlentities($input['description']);
            $woe_data->is_fullfill    = $input['is_fullfill'];
            $woe_data->status         = $input['status'];
            $woe_data->geo_lat        = 30.57855;
            $woe_data->geo_long       = 76.58585;
            if(!empty($input['wish_image'])):
                //$wish->picture        = $input['wish_image'];
                if(pathinfo($input['wish_image'], PATHINFO_EXTENSION) == "jpg"){
                    $img_r = imagecreatefromjpeg($input['wish_image']);
                    $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
                    imagecopyresampled($dst_r,$img_r,0,0,$input['x'],$input['y'], $targ_w,$targ_h, 600,326);
                    imagejpeg($dst_r,dirname(dirname(dirname(__FILE__))).'/public/assets/wish-thumb/'.time().'.jpg',$jpeg_quality);
                    $woe_data->picture = "http://api.wishtru.com/assets/wish-thumb/".time().".jpg";
                } else {
                    $img_r = imagecreatefrompng($input['wish_image']);
                    $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
                    imagecopyresampled($dst_r,$img_r,0,0,$input['x'],$input['y'], $targ_w,$targ_h, 600,326);
                    imagepng($dst_r,dirname(dirname(dirname(__FILE__))).'/public/assets/wish-thumb/'.time().'.png',$png_quality);
                    $woe_data->picture = "http://api.wishtru.com/assets/wish-thumb/".time().".png";
                }
            endif;
           //Save function
            $woe_data->save();
            
            $success = true;
            $message = 'Wish update successfully';
        }
        catch (Exception $e) {
            $message = $e->getMessage();
        }
        
        if (Request::isAjax()) {
            Response::headers()->set('Content-Type', 'application/json');
            Response::setBody(json_encode(array(
                'success' => $success,
                'data' => ($woe) ? $woe->toArray() : $woe,
                'message' => $message,
                'code' => $success ? 200 : 500
            )));
        } else {
            Response::redirect($this->siteUrl('/woe'));
        }
        
    }

    public function wish_deactivate($id)
    {
        
        $wish    = null;
        $message = '';
        $success = false;
        
        try {
            $input  = Input::put();
            //Load Campaign Model
            $wish = new Wish();
            
            //Get Particular Campaign
            $wish_data = $wish->find($id);
            //Set Param
            $wish_data->status = 0;
            //Save function
            $wish_data->save();
            
            $success = true;
            $message = 'Wish update successfully';
        }
        catch (Exception $e) {
            $message = $e->getMessage();
        }
        
        if (Request::isAjax()) {
            Response::headers()->set('Content-Type', 'application/json');
            Response::setBody(json_encode(array(
                'success' => $success,
                'data' => ($wish) ? $wish->toArray() : $wish,
                'message' => $message,
                'code' => $success ? 200 : 500
            )));
        } else {
            Response::redirect($this->siteUrl('/woe'));
        }
        
    }
    
    public function destroy($id)
    {
        
        $message = '';
        $success = false;
        
        try {
            
            Woe::where('id', '=', $id)->delete();           
            
            $success = true;
            $message = 'Woe deleted successfully';
        }
        catch (Exception $e) {
            $message = $e->getMessage();
        }
        
        if (Request::isAjax()) {
            Response::headers()->set('Content-Type', 'application/json');
            Response::setBody(json_encode(array(
                'success' => $success,
                'message' => $message,
                'code' => $success ? 200 : 500
            )));
        } else {
            Response::redirect($this->siteUrl('/woe'));
        }
        
    }
    
}