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
use \Admin\BaseController as BaseController;
use \Cartalyst\Sentry\Users\UserNotFoundException as UserNotFoundException;

class CategorieController extends BaseController
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
        $this->data['title'] = 'Wishes Management';
        //get all users
        $this->data['users'] = App_user::get()->toArray();
        //get all wishes
        $this->data['wishes'] = Wish::join('app_users', 'wishes.user_id', '=', 'app_users.id')->select('wishes.*', 'app_users.first_name', 'app_users.last_name')->orderBy('id', 'desc')->get()->toArray();
        /** render the template */
        View::display('categories/index.twig', $this->data);        
    }
   
    public function store()
    {
        // categories tb name   

        $categories  = null;
        $message = '';
        $success = false;
        // $targ_w = 600;
        // $targ_h = 326;
        // $jpeg_quality = 90;
        // $png_quality = 9;
        
        try {
            $input = Input::post();        

            //Define Categorie Model
            $categories = new Category();
            
            $categories->title          = htmlentities($input['title']);
            $categories->slug           = $input['slug'];
            $categories->description    = htmlentities($input['description']);
          
            $categories->save();

            $success = true;
            $message = 'Categorie added successfully';
        }
        catch (Exception $e) {
            $message = $e->getMessage();
        }
        
        if (Request::isAjax()) {
            Response::headers()->set('Content-Type', 'application/json');
            Response::setBody(json_encode(array(
                'success' => $success,
                'data' => ($categories) ? $categories->toArray() : $categories,
                'message' => $message,
                'code' => $success ? 200 : 500
            )));
        } else {
            Response::redirect($this->siteUrl('/categories'));
        }
        
    }
    
    public function create()
    {
        $this->data['title'] = 'Welcome to Slim Starter Application';
        App::render('categories/create.twig', $this->data);
    }
    
    public function edit($id)
    {
        
        $wish = new Wish();
        
        //Set the page Title
        $this->data['title'] = 'Wishes List';
        
        //Get all campaigns Data Using Model
        $this->data['wish'] = $wish->find($id)->toArray();
        
        // print_r($this->data['campaign']);        
        
        View::display('wishes/edit.twig', $this->data);
        
    }
    
    public function show($id)
    {
        $wishes = Wish::find($id)->toArray();
        echo json_encode($wishes);
    }
    
    public function update($id)
    {
        
        $wish    = null;
        $message = '';
        $success = false;
        $targ_w = 600;
        $targ_h = 326;
        $jpeg_quality = 90;
        $png_quality = 9;
        
        try {
            $input  = Input::put();
            //Load Campaign Model
            $wish = new Wish();
            
            //Get Particular Campaign
            $wish_data = $wish->find($id);
            
            //Set Param
            $wish_data->user_id        = $input['user_id'];
            $wish_data->title          = htmlentities($input['title']);
            $wish_data->description    = htmlentities($input['description']);
            $wish_data->is_fullfill    = $input['is_fullfill'];
            $wish_data->status         = $input['status'];
            $wish_data->geo_lat        = 30.57855;
            $wish_data->geo_long       = 76.58585;
            if(!empty($input['wish_image'])):
                //$wish->picture        = $input['wish_image'];
                if(pathinfo($input['wish_image'], PATHINFO_EXTENSION) == "jpg"){
                    $img_r = imagecreatefromjpeg($input['wish_image']);
                    $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
                    imagecopyresampled($dst_r,$img_r,0,0,$input['x'],$input['y'], $targ_w,$targ_h, 600,326);
                    imagejpeg($dst_r,dirname(dirname(dirname(__FILE__))).'/public/assets/wish-thumb/'.time().'.jpg',$jpeg_quality);
                    $wish_data->picture = "http://api.wishtru.com/assets/wish-thumb/".time().".jpg";
                } else {
                    $img_r = imagecreatefrompng($input['wish_image']);
                    $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
                    imagecopyresampled($dst_r,$img_r,0,0,$input['x'],$input['y'], $targ_w,$targ_h, 600,326);
                    imagepng($dst_r,dirname(dirname(dirname(__FILE__))).'/public/assets/wish-thumb/'.time().'.png',$png_quality);
                    $wish_data->picture = "http://api.wishtru.com/assets/wish-thumb/".time().".png";
                }
            endif;
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
            Response::redirect($this->siteUrl('/wishes'));
        }
        
    }

    
    
    public function destroy($id)
    {
        
        $message = '';
        $success = false;
        
        try {
            
            Wish::where('id', '=', $id)->delete();
            
            
            $success = true;
            $message = 'Wish deleted successfully';
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
            Response::redirect($this->siteUrl('/wishes'));
        }
        
    }
    
}