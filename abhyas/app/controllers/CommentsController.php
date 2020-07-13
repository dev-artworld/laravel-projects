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

class CommentsController extends BaseController
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
        $this->data['title'] = 'Comments';
        
        //get all users
        $this->data['comments'] = Comment::join('app_users', 'app_users.id', '=', 'comments.user_id')
        ->join('mathematics', 'mathematics.id', '=', 'comments.page_id')
              ->select('comments.*', 'app_users.first_name','mathematics.title')    
        ->get()
        ->toArray();
        View::display('comments/index.twig', $this->data);
        
    }
   
   
    
}