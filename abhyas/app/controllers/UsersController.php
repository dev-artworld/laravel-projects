<?php

use \App;
use \View;
use \Menu;
use \User;
use \Input;
use \Sentry;
use \Request;
use \Response;
use \Exception;
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
use \Admin\BaseController;
use \Cartalyst\Sentry\Users\UserNotFoundException;
//Load composer's autoloader
require_once dirname(dirname(dirname(__FILE__))).'/public/phpmailer/vendor/autoload.php';

class UsersController extends BaseController
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
        $this->data['title'] = 'Users Management';
        //get all users
        $this->data['users'] = App_user::get()->toArray();
        /** render the template */
        View::display('users/index.twig', $this->data);
        
    }
   
    public function store()
    {
        
        $user  = null;
        $message = '';
        $success = false;
        
        try {
            $input = Input::post();
            
            //Define Campaign Model
            $user = new App_user();
            
            $user->first_name   = $input['first_name'];
            $user->last_name    = $input['last_name'];
            $user->email        = $input['email'];
            $user->dob          = date('Y-m-d', strtotime($input['dob']));
            $user->picture      = "img/avatar.png";
            $user->password     = md5($input['password']);
            $user->status       = $input['status'];
            $user->confirm      = 0;

            $user->save();
            //Recipients
            $this->mail->setFrom('smtp@wishtru.com', 'no-reply');
            $this->mail->addAddress($input['email']); // Add a recipient
            //Content
            $this->mail->isHTML(true); // Set email format to HTML
            $this->mail->Subject = 'Welcome. Thank you for joining WISHtru!';
            $this->mail->Body    = 'Thanks for registering for WISHtru. You are on your way of meeting great people and find wonderful wishes. Please click on the following link to confirm your account. click on the below link to confirm your account <a href="http://api.wishtru.com/'.base64_encode($user->id).'/activate?token='.md5(uniqid(rand(), true)).'">Confirm account</a>';
            //$this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $this->mail->send();

            $success = true;
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
            Response::redirect($this->siteUrl('/users'));
        }
        
    }
    
    public function create()
    {
        $this->data['title'] = 'Welcome to users Management';
        App::render('users/create.twig', $this->data);
    }
    
    public function edit($id)
    {
        
                
    }
    
    public function show($id)
    {
        $users = App_user::find($id)->toArray();
        echo json_encode($users);
    }
    
    public function update($id)
    {
        
        $user    = null;
        $message = '';
        $success = false;
        
        try {
            $input  = Input::put();
            //Load Campaign Model
            $user = new App_user();
            
            //Get Particular Campaign
            $user_data = $user->find($id);
            
            //Set Param
            $user_data->first_name   = $input['first_name'];
            $user_data->last_name    = $input['last_name'];
            $user_data->email        = $input['email'];
            $user_data->dob          = date('Y-m-d', strtotime($input['dob']));
            //$user_data->picture      = "img/avatar.png";
            if(!empty($input['password'])):
            $user_data->password     = md5($input['password']);
            endif;
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
            Response::redirect($this->siteUrl('/users'));
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
            $user = new App_user();
            
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
            Response::redirect($this->siteUrl('/users'));
        }
        
    }
    
    public function destroy($id)
    {
        
        $user    = null;
        $message = '';
        $success = false;
        
        try {
            
            App_user::where('id', '=', $id)->delete();
            
            
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
        $this->data['user'] = App_user::find($id)->toArray();

        // print_r($this->data['activate']);
        View::display('users/activate.twig', $this->data);
        
    }

    public function confirm_account($id)
    {
        
        $user    = null;
        $message = '';
        $success = false;
        
        try {
            $input  = Input::put();
            //Load Campaign Model
            $user = new App_user();
            
            //Get Particular Campaign
            $user_data = $user->find($id);
            
            //Set Param
            $user_data->confirm = 1;
            
           //Save function
            $user_data->save();
            
            $success = true;
            $message = 'User confirmed successfully';
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
    
}
