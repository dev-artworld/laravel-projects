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

class MathematicsController extends BaseController
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
        $this->data['title'] = 'Chapter Management';
        //get all users
        $this->data['users'] = App_user::get()->toArray();
        //get all wishes
        $this->data['page'] = Mathematic::select('mathematics.*', 'mathematics.title', 'mathematics.description')->orderBy('id', 'desc')->get()->toArray();
        //** render the template 
        View::display('pages/index.twig', $this->data);
        
    }
   
    public function store()
    {
        // $pages  = null;
        $page = '';
        $message = '';
        $success = false;   

        try {

            $input = Input::post();

            $page = new Mathematic();  //Define Mathematic Model
            $page->title          = htmlentities($input['title']);
            $page->chapter        = $input['chapter'];
            $page->class        = $input['class'];
            $page->medium        = $input['medium'];
            $page->day            = htmlentities($input['day']);
            $page->description    = 'Mathematic';
             if(!empty($input['pageFile'])):
                  $page->pdf_file    = $input['pageFile'];
            endif;          
            $page->save();             
            $success = true;
            $message = 'Pages added successfully';

        }
        catch (Exception $e) {
            $message = $e->getMessage();
        }
        
        if (Request::isAjax()) {
            Response::headers()->set('Content-Type', 'application/json');
            Response::setBody(json_encode(array(
                'success' => $success,
                'data' => ($page) ? $page->toArray() : $page,
                'message' => $message,
                'code' => $success ? 200 : 500
            )));
        } else {
            Response::redirect($this->siteUrl('/mathematics'));
        }
        
    }
    
    public function create()
    {   
        $this->data['title'] = 'Welcome to Slim Starter Application';
        App::render('pages/create.twig', $this->data);
    }
    
    public function edit($id)
    {
        
        $page = new Mathematic();
        
        //Set the page Title
        $this->data['title'] = 'Wishes List';
        
        //Get all campaigns Data Using Model
        $this->data['page'] = $page->find($id)->toArray();
        
        // print_r($this->data['campaign']);        
        
        View::display('pages/edit.twig', $this->data);
        
    }
    
    public function show($id)
    {
        $page = Mathematic::find($id)->toArray();
        echo json_encode($page);
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
            
            $page = new Mathematic();
            
            //Get Particular Campaign
            $page_data = $page->find($id);
            
            //Set Param
            $page_data->title          = htmlentities($input['title']);
            $page_data->chapter        = $input['chapter'];
            $page_data->class          = $input['class'];
            $page_data->medium         = $input['medium'];    
            $page_data->day            = htmlentities($input['day']);
            $page_data->description    = htmlentities($input['description']);
        
           //Save function
            $page_data->save();
            
            $success = true;
            $message = 'Page updated successfully';
        }
        catch (Exception $e) {
            $message = $e->getMessage();
        }
        
        if (Request::isAjax()) {
            Response::headers()->set('Content-Type', 'application/json');
            Response::setBody(json_encode(array(
                'success' => $success,
                'data' => ($page) ? $page->toArray() : $page,
                'message' => $message,
                'code' => $success ? 200 : 500
            )));
        } else {
            Response::redirect($this->siteUrl('/mathematics'));
        }
        
    }

    
    
    public function destroy($id)
    {
        
        $message = '';
        $success = false;
        
        try {
            
            Mathematic::where('id', '=', $id)->delete();
            
            
            $success = true;
            $message = 'Page deleted successfully';
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
            Response::redirect($this->siteUrl('/mathematics'));
        }
        
    }
    
}