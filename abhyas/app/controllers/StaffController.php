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
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
use \Admin\BaseController;
use \Cartalyst\Sentry\Users\UserNotFoundException;
//Load composer's autoloader
require_once dirname(dirname(dirname(__FILE__))).'/public/phpmailer/vendor/autoload.php';

class StaffController extends BaseController
{

    public function __construct()
    {
        //Server settings
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = 0;                 // Enable verbose debug output
        $this->mail->isSMTP();                      // Set mailer to use SMTP
        $this->mail->Host = 'wishtru.com';          // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;               // Enable SMTP authentication
        $this->mail->Username = 'smtp@wishtru.com'; // SMTP username
        $this->mail->Password = 'bX6p2h9%';         // SMTP password
        //$this->mail->SMTPSecure = 'ssl';            // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = 25;
        parent::__construct();
    }
    
    /**
     * display list of resource
     */
    public function index()
    {
        
        //Set the page Title
        $this->data['title'] = 'Staff Management';
        //get all users
        $this->data['users'] = Staff::get()->toArray();
        /** render the template */
        View::display('staff/index.twig', $this->data);
        
    }
   
    public function store()
    {
        
        $user  = null;
        $message = '';
        $success = false;
        
        try {
            $input = Input::post();

            //Define Campaign Model
            $user = new Staff();
            
            $user->first_name   = $input['first_name'];
            $user->last_name    = $input['last_name'];
            $user->email        = $input['email'];
            $user->user_image      = "img/avatar.png";
            $user->status       = $input['status'];
            $user->save();

            //Recipients
            // $this->mail->setFrom('smtp@wishtru.com', 'no-reply');
            // $this->mail->addAddress($input['email']); // Add a recipient
            // //Content
            // $this->mail->isHTML(true); // Set email format to HTML
            // $this->mail->Subject = 'Welcome. Thank you for joining WISHtru!';
            // $this->mail->Body    = 'Thanks for registering for WISHtru. You are on your way of meeting great people and find wonderful wishes. Please click on the following link to confirm your account. click on the below link to confirm your account <a href="http://api.wishtru.com/'.base64_encode($user->id).'/activate?token='.md5(uniqid(rand(), true)).'">Confirm account</a>';
            // //$this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            // $this->mail->send();

            // $success = true;
            $message = 'User added successfully';
        }
        catch (Exception $e) {
            $message = $e->getMessage();
        }
        
        if (Request::isAjax()) {
            Response::headers()->set('Content-Type', 'application/json');
            Response::setBody(json_encode(array(
                'success' => $success,
                'data' => ($user) ? $user->toArray() : $user,
                'message' => $message,
                'code' => $success ? 200 : 500
            )));
        } else {
            Response::redirect($this->siteUrl('/staff'));
        }
        
    }
    
    public function create()
    {
        $this->data['title'] = 'Welcome to users Management';
        App::render('staff/create.twig', $this->data);
    }
    
    public function edit($id)
    {
       $this->data['users'] = Staff::find($id)->toArray();
        echo json_encode($this->data['users']); 
                
    }
    
    public function show($id)
    {
       $this->data['users'] = Staff::find($id)->toArray();
        //echo json_encode($users);
        App::render('staff/view.twig', $this->data);
    }
    
    public function update($id)
    {
        
        $user    = null;
        $message = '';
        $success = false;
        
        try {
            $input  = Input::put();
            //Load Campaign Model
            $user = new Staff();
            
            //Get Particular Campaign
            $user_data = $user->find($id);
            
            //Set Param
            $user_data->first_name   = $input['first_name'];
            $user_data->last_name    = $input['last_name'];
            $user_data->email        = $input['email'];
            $user_data->status       = $input['status'];
            
           //Save function
            $user_data->save();
            
            $success = true;
            $message = 'User update successfully';
        }
        catch (Exception $e) {
            $message = $e->getMessage();
        }
        
        if (Request::isAjax()) {
            Response::headers()->set('Content-Type', 'application/json');
            Response::setBody(json_encode(array(
                'success' => $success,
                'data' => ($user) ? $user->toArray() : $user,
                'message' => $message,
                'code' => $success ? 200 : 500
            )));
        } else {
            Response::redirect($this->siteUrl('/staff'));
        }
        
    }

    public function user_deactivate($id)
    {
        
        $user    = null;
        $message = '';
        $success = false;
        
        try {
            $input  = Input::put();
            //Load Campaign Model
            $user = new Staff();
            
            //Get Particular Campaign
            $user_data = $user->find($id);
            //Set Param
            $user_data->status = 0;
           //Save function
            $user_data->save();
            
            $success = true;
            $message = 'User update successfully';
        }
        catch (Exception $e) {
            $message = $e->getMessage();
        }
        
        if (Request::isAjax()) {
            Response::headers()->set('Content-Type', 'application/json');
            Response::setBody(json_encode(array(
                'success' => $success,
                'data' => ($user) ? $user->toArray() : $user,
                'message' => $message,
                'code' => $success ? 200 : 500
            )));
        } else {
            Response::redirect($this->siteUrl('/staff'));
        }
        
    }
    
    public function destroy($id)
    {
        
        $user    = null;
        $message = '';
        $success = false;
        
        try {
            
            Staff::where('id', '=', $id)->delete();
            
            
            $success = true;
            $message = 'User Deleted Successfully';
        }
        catch (Exception $e) {
            $message = $e->getMessage();
        }
        
        if (Request::isAjax()) {
            Response::headers()->set('Content-Type', 'application/json');
            Response::setBody(json_encode(array(
                'success' => $success,
                'data' => ($user) ? $user->toArray() : $user,
                'message' => $message,
                'code' => $success ? 200 : 500
            )));
        } else {
            Response::redirect($this->siteUrl('/users'));
        }
        
    }

    public function activate($id)
    {
        $id = base64_decode($id);
        //Set the page Title
        $this->data['title'] = 'Confirm the account';
        
        //Get user Data Using Model
        $this->data['user'] =Staff::find($id)->toArray();

        // print_r($this->data['activate']);
        View::display('users/activate.twig', $this->data);
        
    }

  
    
}
