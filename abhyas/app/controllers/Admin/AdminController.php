<?php

namespace Admin;

use \App as App;
use \View as View;
use \User as User;
use \App_user as App_user;
use \Wish as Wish;
use \Input as Input;
use \Sentry as Sentry;
use \Response as Response;
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use \Cartalyst\Sentry\Users\LoginRequiredException as LoginRequiredException;
//Load composer's autoloader
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/public/phpmailer/vendor/autoload.php';

class AdminController extends BaseController
{   
    //public variable
    //public $mail = new PHPMailer(true);

    public function __construct()
    {   
        //Server settings
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = 2;                 // Enable verbose debug output
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
     * display the admin dashboard
     */
    public function index()
    {

        $this->data['title'] = "Wishtru | Dashboard";
        //get all users
        $this->data['users'] = App_user::where('status', '=', 1)->get()->toArray();
        //get all wishes
        $this->data['wishes'] = Wish::get()->toArray();
        //get all wishes
        $this->data['wishes_pending'] = Wish::where('status', '=', 0)->get()->toArray();
        //get all wishes
        $this->data['wishes_completed'] = Wish::where('is_fullfill', '=', 1)->get()->toArray();
        //send data to view dashboard
        View::display('admin/dashboard.twig', $this->data);
    }

    /**
     * display the login form
     */
    public function login()
    {   

        $this->data['title'] = "Wishtru | Admin";

        if(Sentry::check()){
            Response::redirect('http://abhyas.retouchingwork.org/admin');
        }else{
           $this->data['redirect'] = (Input::get('redirect')) ? base64_decode(Input::get('redirect')) : '';
            View::display('admin/login.twig', $this->data);
        }
    }

    /**
     * display the login form
     */
    public function users()
    {   

        if(Sentry::check()){
            View::display('admin/users.twig', $this->data);
        }else{
           $this->data['redirect'] = (Input::get('redirect')) ? base64_decode(Input::get('redirect')) : '';
           View::display('admin/login.twig', $this->data);
        }
    }

    /**
     * Process the login
     */
    public function doLogin()
    {

            $remember = Input::post('remember', false);
            $email    = Input::post('email');
            $redirect = Input::post('redirect');
            $redirect = ($redirect) ? $redirect : 'dashboard';

            try{
                $credential = array(
                    'email'     => $email,
                    'password'  => Input::post('password')
                );

                // Try to authenticate the user
                $user = Sentry::authenticate($credential, false);
                if($remember){
                    Sentry::loginAndRemember($user);
                }else{
                    Sentry::login($user, false);
                }

                Response::redirect('http://abhyas.retouchingwork.org/admin');
            }catch(\Exception $e){
                App::flash('error', $e->getMessage());
                App::flash('email', $email);
                App::flash('redirect', $redirect);
                App::flash('remember', $remember);
                Response::redirect('http://abhyas.retouchingwork.org/login');
            }
        
    }

    /**
     * Process the login
     */
    public function doForgot()
    {
        
        $email = Input::post('email');
        $users = User::where("email","=",$email)->select("email")->get()->toArray();
        if(empty($users)){
            App::flash('error', 'Warning! Please enter correct email address.');
        } else {
            App::flash('success', 'Success! Please check your email inbox, password sent to you.');
            //new password
            $rand = "";
            $seed = str_split('abcdefghijklmnopqrstuvwxyz'
               .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
               .'0123456789!@#$%^&*()');
            shuffle($seed);
            foreach (array_rand($seed, 10) as $k) $rand .= $seed[$k];
            $user = Sentry::findUserById(33);
            $user->password = $rand;
            $user->save();
            //Recipients
            $this->mail->setFrom('smtp@wishtru.com', 'no-reply');
            $this->mail->addAddress($email); // Add a recipient
            //Content
            $this->mail->isHTML(true);                                  // Set email format to HTML
            $this->mail->Subject = 'Password Reset for WISHtru';
            $this->mail->Body    = '<b>Forgot your password? Let\'s get you a new one!</b><br/><br/>You recently requested to change your password. <br/>Your password: '.$rand.'<br/>';
            //$this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $this->mail->send();
        }
        Response::redirect('http://abhyas.retouchingwork.org/login');
    }
    

    /**
     * Logout the user
     */
    public function logout()
    {
        Sentry::logout();
        Response::redirect("http://abhyas.retouchingwork.org/login");
    }


}
