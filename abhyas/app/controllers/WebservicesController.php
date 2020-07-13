<?php

use \App as App;
use \View as View;
use \Menu as Menu;
use \User as User;
use \Input as Input;
use \Sentry as Sentry;
use \Request as Request;
use \App_user as App_user;
use \Response as Response;
use \Exception as Exception;
use Illuminate\Support\Facades\DB;
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
use \Admin\BaseController as BaseController;
use \Cartalyst\Sentry\Users\UserNotFoundException as UserNotFoundException;
//Load composer's autoloader
require_once dirname(dirname(dirname(__FILE__))).'/public/phpmailer/vendor/autoload.php';

class WebservicesController extends BaseController
{   

    public function __construct()
    {
        //Server settings
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = 0;                 // Enable verbose debug output
        $this->mail->isSMTP();                      // Set mailer to use SMTP
        $this->mail->Host = 'smtp.gmail.com';          // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;               // Enable SMTP authentication
        $this->mail->Username = 'smtp@wishtru.com'; // SMTP username
        $this->mail->Password = 'bX6p2h9%';         // SMTP password
       $this->mail->SMTPSecure = 'ssl';            // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = 25 ;
        //Alternative database connection
        $this->mysqli = new mysqli("localhost", "demo", "deep&*^art", "wishtru");
        parent::__construct();
    }


    /**
     * display list of resource
    */
    public function index()
    {
        

    }


    public function store()
    {


    }

    public function create()
    {

        
    }

    public function edit($id)
    {   

                
    }
    
    public function show($id)
    {   

        
    }

    public function forgetpassword()
    {

        $user = "";
        $input = Input::post();
        $success = 'error';

        if($input['email'] == ''){
             $message[] = 'Warning! Please enter correct (EMAIL) Address.';
        }

        else{

             try{
             
                  $user = App_user::where('email', '=', $input['email'] )->get();

               // DB::table('App_user')->where('email', '=',  $input['email'])->get();
                file_put_contents(dirname(__FILE__)."/getmail.log", print_r($user,true));

                    if(!empty($user->toArray())){

                        $success = 'success';
                        //new password
                        $password = $this->random_password(8);

                        //Recipients
                       /* $this->mail->setFrom('smtp@wishtru.com', 'no-reply');
                        $this->mail->addAddress($input['email']); // Add a recipient
                        //Content
                        $this->mail->isHTML(true); // Set email format to HTML
                        $this->mail->Subject = 'Password Reset for Abhyas';
                        $this->mail->Body    = '<b>Forgot your password? Let\'s get you a new one!</b><br/><br/>You recently requested to change your password. <br/>Your password: '.$password.'<br/>';
                        //$this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                        $this->mail->send();*/






                    $to      = $input['email'];
                    $subject = "Password Reset for Abhyas";
                    $txt     = '<b>Forgot your password? Let\'s get you a new one!</b><br/><br/>You recently requested to change your password. <br/>Your password: '.$password.'<br/>';
                    $headers = "From: monika@fameforme.com \r\n";
                    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
                    $mail    = mail($to, $subject, $txt, $headers);
                        $user_data = $user->toArray();
                        //Get Particular App_user
                        $update_data = App_user::find($user_data[0]['id']);
                        //Update user password
                        $update_data->password = md5($password);
                        //Save function
                        $update_data->save(); 

                        $message[] = 'Thank You! Password has been successfully sent to your email inbox.';
                         file_put_contents(dirname(__FILE__)."/maildata.log", print_r($update_data,true));
                     


                    } else {

                        $success = 'failure';
                        $message[] = 'Failed to Recover your password, try again';

                    }

               }catch (Exception $e){
                    
                    $error = explode(' (SQL',$e->getMessage());
                    $message[] = $error[0];

                }
        }

        $return = array(
            'status'    => $success,
            'data'      => ($user) ? $user->toArray() : $user,
            'message'   => $message,
            'code'      => $success == 'success' ? 200 : 500,
        );

        echo json_encode($return);
    }


     public function change_password()
    {

        $input = Input::post();
        $success = 'error';
        $update_data = "";

        if(!empty($this->checkOldPassword($input['old_password'],$input['id']))){
             $message[] = $this->checkOldPassword($input['old_password'],$input['id']);
        } elseif($input['password'] == ''){
             $message[] = 'Password required';
        } elseif(!empty($this->checkPassword($input['password']))){
             $message[] = $this->checkPassword($input['password']);   
        } elseif($input['c_password'] != $input['password']){
             $message[] = 'Password do not match.';
        } else {

            try{
             
                //Get Particular App_user
                $update_data = App_user::find($input['id']);
                //Update user password
                $update_data->password = md5($input['password']);
                //Save function
                $update_data->save();

                //Recipients
                $this->mail->setFrom('smtp@wishtru.com', 'no-reply');
                $this->mail->addAddress($update_data->email); // Add a recipient
                //Content
                $this->mail->isHTML(true); // Set email format to HTML
                $this->mail->Subject = 'Your WISHtru password was changed successfully!';
                $this->mail->Body    = '<b>Let\'s get you a new one!</b><br/><br/>You recently requested to change your password. <br/>Your password: '.$input['password'].'<br/>';
                //$this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $this->mail->send();

                $success = 'success';
                $message[] = 'Password has been successfully changed';

            }catch (Exception $e){
                    
                $error = explode(' (SQL',$e->getMessage());
                $message[] = $error[0];

            }
        }

        $return = array(
            'status'    => $success,
            'message'   => $message,
            'code'      => $success == 'success' ? 200 : 500,
        );

        echo json_encode($return);
    }

    public function login()
    {

        $input = Input::post();
        $success = 'error';
        $login = "";


        if($input['email'] == ''){
             $message[] = 'Warning! Please enter correct (EMAIL) Address.';
        }

        else{

             try{
             
                $login = App_user::where('email', '=', $input['email'] )->get()->toArray();

	                if(!empty($login)){

                        $user_device = App_device_token::where("user_id", "=", $login[0]['id'])->where("device_token", "=", $input['device_token'])->get()->toArray();

                        if(!empty($user_device)):
                           
                            $token = App_device_token::find($user_device[0]["id"]);
                            $token->device_status = 1;
                            $token->save();

                        else:

                            $token = new App_device_token();
                            $token->user_id      = $login[0]['id'];
                            $token->device_type  = $input['device_type'];
                            $token->device_token = $input['device_token'];
                            $token->uuid         = $input['device_uuid'];
                            $token->device_status = 1;
                            $token->save();

                        endif;

		                $success = 'success';
		                $message[] = 'Logged In';

	                } else {

	                	$success = 'failure';
	                	$message[] = 'Logged Failed';

	                }

                }catch (Exception $e){
                    
                    $error = explode(' (SQL',$e->getMessage());
                    $message[] = $error[0];

                }
        }

        $return = array(
            'status'    => $success,
            'data'      => $login,
            'message'   => $message,
            'code'      => $success == 'success' ? 200 : 500,
        );

    	echo json_encode($return);

    }

    public function logout(){

        $input = Input::post();
        $success = 'success';
        $token = "";

        try{

            $user_device = App_device_token::where("user_id", "=", $input['user_id'])->where("device_token", "=", $input['device_token'])->get()->toArray();

            if(!empty($user_device)):
               
                $token = App_device_token::find($user_device[0]["id"]);
                $token->device_status = 0;
                $token->save();

                $success = 'success';
                $message[] = 'Logged Out';

            else:

                //$success = 'failure';
                $message[] = 'Logged Out Failed';

            endif;

        }catch (Exception $e){
                    
            $error = explode(' (SQL',$e->getMessage());
            $message[] = $error[0];

        }

        $return = array(
            'status'    => $success,
            'data'      => $token,
            'message'   => $message,
            'code'      => $success == 'success' ? 200 : 500,
        );

        echo json_encode($return);

    }

    public function register()
    {
        $input = Input::post();
        $success = 'error';

        $address = (isset($input['address'])) ? $input['address'] : '';

        $user = new App_user();
        $user->first_name  = htmlentities($input['first_name']);
        $user->last_name   = htmlentities($input['last_name']);
        $user->email       = $input['email'];
        $user->password    = md5($input['password']);
        $user->dob         = $input['dob'];
        $user->gender      = $input['gender'];
        $user->country     = $input['country'];
        $user->city        = $input['city'];
        $user->address     = $address;
        $user->user_role     = $input['user_role'];
        $user->picture     = ($input['picture']) ? $input['picture'] : $this->defaultPicture();
       
        $user->status      = 1;

        if($input['first_name'] == ''){
             $message[] = 'First name required';
        } elseif($input['email'] == ''){
             $message[] = 'Email required';
        } elseif($input['password'] == ''){
             $message[] = 'Password required';
        } elseif(!empty($this->checkPassword($input['password']))){
             $message[] = $this->checkPassword($input['password']);   
        } elseif($input['c_password'] != $input['password']){
             $message[] = 'Password do not match.';
        } elseif($input['privacy_policy'] == "false"){
             $message[] = 'Privacy policy required';
        } else {

             try{
             
                $user->save();

                $user_device = App_device_token::where("user_id", "=", $user->id)->where("device_token", "=", $input['device_token'])->get()->toArray();

                if(!empty($user_device)):
                   
                    $token = App_device_token::find($user_device[0]["id"]);
                    $token->device_status = 1;
                    $token->save();

                else:

                    $token = new App_device_token();
                    $token->user_id      = $user->id;
                    $token->device_type  = $input['device_type'];
                    $token->device_token = $input['device_token'];
                    $token->uuid         = $input['device_uuid'];
                    $token->device_status = 1;
                    $token->save();

                endif;

                
                $success = 'success';
                $message[] = 'Thank you! You have registred successfully.';
                // send email
                //Recipients
                /*$this->mail->setFrom('smtp@wishtru.com', 'no-reply');
                $this->mail->addAddress($input['email']); // Add a recipient
                //Content
                $this->mail->isHTML(true); // Set email format to HTML
                $this->mail->Subject = 'Welcome. Thank you for joining WISHtru!';
                $this->mail->Body    = 'Thanks for registering for WISHtru. You are on your way of meeting great people and find wonderful wishes. Please click on the following link to confirm your account. <a href="http://api.wishtru.com/'.base64_encode($user->id).'/activate?token='.md5(uniqid(rand(), true)).'">Confirm account</a>';
                //$this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $this->mail->send();
                */
               }catch (Exception $e){
                    
                $error = explode(' (SQL',$e->getMessage());
                $message[] = 'The email address is used already. Please reset your password or use an alternate address.';

            }
        }

        $return = array(
                'status'    => $success,
                'data'      => ($user) ? $user->toArray() : $user,
                'message'   => $message,
                'user_id'   => $user->id,
                'code'      => $success == 'success' ? 200 : 500,
            );

    	echo json_encode($return);
    }

    public function add_wish()
    {
        $input = Input::post();
        $success = 'error';

        $Wish = new Wish();
        $Wish->title        = htmlentities($input['title']);
        $Wish->description  = htmlentities($input['description']);
        $Wish->picture      = ($input['picture']) ? $input['picture'] : $this->defaultPicture();
        $Wish->user_id      = $input['user_id'];
        $Wish->geo_lat      = $input['geo_lat'];
        $Wish->geo_long     = $input['geo_long'];
        $Wish->is_fullfill  = $input['is_fullfill'];
        $Wish->status       = 1;

        if($input['title'] == ''){
             $message[] = 'Required! (Title).';
        } elseif($input['description'] == ''){
             $message[] = 'Required! (Description).';
        } elseif($input['picture'] == ''){
             $message[] = 'Required! (Picture).';
        } else {

             try{
             
                $Wish->save();

                $success = 'success';
                $message[] = 'Thank you! Your wish has added successfully.';
                // send email
                
               }catch (Exception $e){
                    
                    $error = explode(' (SQL',$e->getMessage());
                    $message[] = $error[0];

                }
        }
       
        $return = array(
                'status'    => $success,
                'data'      => ($Wish) ? $Wish->toArray() : $Wish,
                'message'   => $message,
                'code'      => $success == 'success' ? 200 : 500,
            );

        echo json_encode($return);

    }


    public function add_category()
    {
        $input = Input::post();
        $success = 'error';
        
        $Categorie               = new Category();
        $Categor->title         = $input['title'];
        $Categorie->description      = $input['description'];
        $Categorie->slug         = $input['slug'];
    

        if($input['title'] == ''){
             $message[] = 'Required! (name).';
        } elseif($input['content'] == ''){
             $message[] = 'Required! (content).';
        } elseif($input['slug'] == ''){
             $message[] = 'Required! (slug).';
        } else {

             try{
             
                $Categorie->save();

                $success = 'success';
                $message[] = 'Thank you! Your Categorie has added successfully.';
                // send email
                
               }catch (Exception $e){
                    
                    $error = explode(' (SQL',$e->getMessage());
                    $message[] = $error[0];

                }
        }
       
        $return = array(
                'status'    => $success,
                'data'      => ($Categorie) ? $Categorie->toArray() : $Categorie,
                'message'   => $message,
                'code'      => $success == 'success' ? 200 : 500,
            );

        echo json_encode($return);

    }

     public function all_pages()
    {

      
        $success = 'error';
        $index = 0;

        try{
            
            $pages = array();

            header( 'Content-Type: text/html; charset=utf-8' );

            $_GET['class'] = 10;
            $_GET['medium'] = "punjabi";

            $result = $this->mysqli->query("SELECT `chapter` FROM `mathematics` WHERE `class` = ".$_GET['class']." AND `medium` = '".$_GET['medium']."' GROUP BY `chapter`");
            //print_r($result);

            while ($row = mysqli_fetch_assoc($result)) {
                # code...
                $pages[$index] = $row;
               $index++;
            }

            if(!empty($pages)){

                $success = 'success';
                $message[] = 'Get data';

            } else {

                $success = 'failure';
                $message[] = 'Warning! Failed';

            }

        }catch (Exception $e){
                
            $error = explode(' (SQL',$e->getMessage());
            $message[] = $error[0];

        }

        $return = array(
                'status'    => $success,
                'data'      => $pages,
                'message'   => $message,
                'code'      => $success == 'success' ? 200 : 500,
            );

        echo json_encode($return);

    }

    public function get_one_chapter()
    {

        $input = Input::post();
        $success = 'error';
        $index = 0;

        try{
            
            $chapter = array();

            header( 'Content-Type: text/html; charset=utf-8' );

            $result = $this->mysqli->query("SELECT * from `mathematics` where chapter = '".$input['chapter']."' AND medium = '".$input['medium']."'");
            //print_r($result);

            while ($row = mysqli_fetch_assoc($result)) {
                # code...
                $chapter[$index] = $row;
                $index++;
            }

            if(!empty($chapter)){

                $success = 'success';
                $message[] = 'Get data';

            } else {

                $success = 'failure';
                $message[] = 'Warning! Failed';

            }

        }catch (Exception $e){
                
            $error = explode(' (SQL',$e->getMessage());
            $message[] = $error[0];

        }

        $return = array(
                'status'    => $success,
                'data'      => $chapter,
                'message'   => $message,
                'code'      => $success == 'success' ? 200 : 500,
            );

        echo json_encode($return);

    }

    public function upvote()
    {
        $input = Input::post();
        $success = 'error';
        $wish = "";

        try{

            //Get Particular Wish_upvote
            if(Wish_upvote::find($input['id'])):
                //updation of the wish upvote
                Wish_upvote::where('id', '=', $input['id'])->delete();
                $success = 'discounted';
                $message[] = 'Thanks! Your upvote was discounted!';
            else:
                //insertion of the wish upvote
                $wish = new Wish_upvote();
                $wish->user_id      = $input['user_id'];
                $wish->wish_id      = $input['wish_id'];
                $wish->save();
                $success = 'success';
                $message[] = 'Thank you! Your wish has been upvoted.';
            endif;
               
        }catch (Exception $e){
                    
            $error = explode(' (SQL',$e->getMessage());
            $message[] = $error[0];

        }

        $return = array(
            'status'    => $success,
            'data'      => ($wish) ? $wish->toArray() : $wish,
            'message'   => $message,
            'code'      => $success == 'success' ? 200 : 500,
        );

        echo json_encode($return);

    }

    public function follow()
    {
        $input = Input::post();
        $success = 'error';
        $wish = "";

        try{
            
            //Get Particular Wish_upvote
            if(Wish_follower::find($input['id'])):
                //updation of the wish upvote
                Wish_follower::where('id', '=', $input['id'])->delete();
                $success = 'unfollow';
                $message[] = 'The wish was removed from your list!';
            else:
                //insertion of the wish upvote
                $wish = new Wish_follower();
                $wish->user_id      = $input['user_id'];
                $wish->wish_id      = $input['wish_id'];
                $wish->save();
                $success = 'success';
                $message[] = 'Thank you! Your wish has been followed.';
            endif;
                
        }catch (Exception $e){
                    
            $error = explode(' (SQL',$e->getMessage());
            $message[] = $error[0];

        }

        $return = array(
            'status'    => $success,
            'data'      => ($wish) ? $wish->toArray() : $wish,
            'message'   => $message,
            'code'      => $success == 'success' ? 200 : 500,
        );

        echo json_encode($return);

    }

    public function user_follow()
    {
        $input = Input::post();
        $success = 'error';
        $wish = "";

        try{

            //Get Particular Wish_upvote
            if(User_follower::find($input['id'])):
                //updation of the wish upvote
                User_follower::where('id', '=', $input['id'])->delete();
                $success = 'unfollow';
                $message[] = 'The user was removed from your list!';
            else:
                //insertion of the wish upvote
                $wish = new User_follower();
                $wish->user_id      = $input['user_id'];
                $wish->follower_id  = $input['follower_id'];
                $wish->save();
                $success = 'success';
                $message[] = 'Thank you! user has been followed.';
            endif;
                
        }catch (Exception $e){
                    
            $error = explode(' (SQL',$e->getMessage());
            $message[] = $error[0];

        }

        $return = array(
            'status'    => $success,
            'data'      => ($wish) ? $wish->toArray() : $wish,
            'message'   => $message,
            'code'      => $success == 'success' ? 200 : 500,
        );

        echo json_encode($return);

    }

    public function wish_detail()
    {

        $input = Input::post();
        $success = 'error';
        $wishes = array();
        $wish_chat_users = array();
        $index = 0;

        if($input['id'] == ''){
             $message[] = 'Warning! Please check correct (ID).';
        }

        else{

             try{

                    $result = $this->mysqli->query("SELECT `app_users`.id as user_id,`app_users`.first_name,`app_users`.last_name,`app_users`.picture as user_thumb, `wishes`.*,(SELECT `id` FROM `wish_followers` WHERE wish_id = `wishes`.id AND user_id = ".$input['user_id'].") as followed,(SELECT `id` FROM `wish_upvotes` WHERE wish_id = `wishes`.id AND user_id = ".$input['user_id'].") as upvoted,(SELECT `id` FROM `wish_reviews` WHERE wish_id = `wishes`.id) as review_id, (SELECT COUNT(*) FROM `wish_upvotes` WHERE wish_id = `wishes`.id) as upvotes, (SELECT COUNT(*) FROM `wish_followers` WHERE wish_id = `wishes`.id) as followers FROM `wishes` LEFT JOIN `app_users` ON `app_users`.id =`wishes`.user_id WHERE `wishes`.id = ".$input['id']." ");

                    while ($row = mysqli_fetch_assoc($result)) {
                        # code...
                        $wishes[$index] = $row;
                        $wishes[$index]['time'] = $this->time_elapsed_string($row['created_at']);
                        $wishes[$index]['review'] = Wish_review::where('id', '=', $row['review_id'])->get()->toArray();
                        $index++;
                    }
             
                    if(!empty($wishes)){

                        $success = 'success';
                        $message[] = 'wish information.';

                    } else {

                        $success = 'failure';
                        $message[] = 'Warning!';

                    }

               }catch (Exception $e){
                    
                    $error = explode(' (SQL',$e->getMessage());
                    $message[] = $error[0];

                }
        }

        //get chat users
        $wish_users = $this->mysqli->query("SELECT `wish_messages`.`sender_id`,`app_users`.`first_name`,`app_users`.`last_name`,`app_users`.`picture` FROM `wish_messages` LEFT JOIN `app_users` ON `wish_messages`.`sender_id` = `app_users`.`id` WHERE `chat_wish_id` = ".$input['id']." AND `receiver_id` = ".$input['user_id']."");
        while($wish_user = mysqli_fetch_assoc($wish_users)){
            $wish_chat_users[] = $wish_user;
        }
        $return = array(
            'status'    => $success,
            'data'      => $wishes,
            'users'     => $wish_chat_users,
            'message'   => $message,
            'code'      => $success == 'success' ? 200 : 500,
        );

        echo json_encode($return);

    }

    public function profile()
    {

        $input = Input::post();
        $success = 'error';
        $user = "";

        if($input['user_id'] == ''){
             $message[] = 'Warning! Please check correct (ID).';
        }

        else{

             try{   

                    $profile = array();
             
                    $userInfo = App_user::where("app_users.id", "=", $input['user_id'])->Leftjoin('wishes', 'wishes.user_id', '=', 'app_users.id')->select('app_users.id as user_id','app_users.first_name','app_users.last_name','app_users.city','app_users.country','app_users.picture as user_picture','app_users.email','app_users.dob','app_users.gender','app_users.language','wishes.*')->get()->toArray();

                    foreach ($userInfo as $key => $value) {
                        # wish...upvote
                        $profile[$key] = $value;
                        $profile[$key]['time'] = $this->time_elapsed_string($value['created_at']);
                        $profile[$key]['reviews_count'] = count(Wish_review::where("wish_fulfilled_user", "=", $value['user_id'])->get()->toArray());
                        $profile[$key]['reviews'] = Wish_review::where("wish_fulfilled_user", "=", $value['user_id'])->get()->toArray();
                        $profile[$key]['upvotes'] = count(Wish_upvote::where("wish_id", "=", $value['id'])->get()->toArray());
                        $profile[$key]['followers'] = count(Wish_follower::where("wish_id", "=", $value['id'])->get()->toArray());
                        if(!empty($input['id'])){
                            $profile[$key]['followed'] = User_follower::where("follower_id", "=", $input['user_id'])->where("user_id", "=", $input['id'])->select('id')->get()->toArray();
                        }
                    }

                    if(!empty($profile)){

                        $success = 'success';

                        $message[] = 'Thank you! current logged in user information.';

                    } else {

                        $success = 'failure';

                        $message[] = 'Warning! Failed';

                    }

               }catch (Exception $e){
                    
                    $error = explode(' (SQL',$e->getMessage());
                    $message[] = $error[0];

                }
        }

        $return = array(
                'status'    => $success,
                'data'      => $profile,
                'message'   => $message,
                'code'      => $success == 'success' ? 200 : 500,
            );

        echo json_encode($return);

    }

    public function search()
    {

        $input = Input::post();
        $success = 'error';
        $search = "";
        $orderBy = "";
        $index = 0;

        try{

            $search = array();

            $result = $this->mysqli->query("SELECT `wishes`.*,(SELECT COUNT(*) FROM `wish_upvotes` WHERE wish_id = wishes.id) as upvotes, (SELECT COUNT(*) FROM `wish_followers` WHERE wish_id = wishes.id) as followers,(3959 * acos(cos(radians(30.7161)) * cos(radians(wishes.geo_lat)) * cos(radians(wishes.geo_long) - radians(76.7193)) + sin(radians(30.7161)) * sin(radians(wishes.geo_lat)))) as radius FROM `wishes` LEFT JOIN `app_users` ON `app_users`.id =`wishes`.user_id WHERE `wishes`.title LIKE  '%".htmlentities($input['search'])."%'");

            while ($row = mysqli_fetch_assoc($result)) {
                # code...
                $search[$index] = $row;
                $search[$index]['time'] = $this->time_elapsed_string($row['created_at']);
                $index++;
            }

            if(!empty($search)){

                $success = 'success';
                $message[] = 'Get data';

            } else {

                $success = 'failure';
                $message[] = 'Warning! Failed';

            }

        }catch (Exception $e){
                
            $error = explode(' (SQL',$e->getMessage());
            $message[] = $error[0];

        }

        $return = array(
                'status'    => $success,
                'data'      => $search,
                'message'   => $message,
                'code'      => $success == 'success' ? 200 : 500,
            );

        echo json_encode($return);

    }

    public function wish_list()
    {

        $input = Input::post();
        $success = 'error';
        $wish_list = "";
        $orderBy = "";
        $index = 0;
        $input['latitude'] = ($input['latitude']) ? $input['latitude'] : 30.7174669;
        $input['longitude'] = ($input['longitude']) ? $input['longitude'] : 76.721066;

        try{

            $wish_list = array();

            if($input['filter'] == 'recent'){
                $orderBy = 'ORDER BY id DESC';
            }
            if($input['filter'] == 'upvote'){
                $orderBy = 'ORDER BY upvotes DESC';
            }
            if($input['filter'] == 'near'){
                $orderBy = 'ORDER BY radius ASC';
            }

            $result = $this->mysqli->query("SELECT `wishes`.*,(SELECT COUNT(*) FROM `wish_upvotes` WHERE wish_id = wishes.id) as upvotes, (SELECT COUNT(*) FROM `wish_followers` WHERE wish_id = wishes.id) as followers,(3959 * acos(cos(radians(".$input['latitude'].")) * cos(radians(wishes.geo_lat)) * cos(radians(wishes.geo_long) - radians(".$input['longitude'].")) + sin(radians(".$input['latitude'].")) * sin(radians(wishes.geo_lat)))) as radius FROM `wishes` LEFT JOIN `app_users` ON `app_users`.id =`wishes`.user_id WHERE `wishes`.status = 1 " . $orderBy . " LIMIT 5");

            while ($row = mysqli_fetch_assoc($result)) {
                # code...
                $wish_list[$index] = $row;
                $wish_list[$index]['time'] = $this->time_elapsed_string($row['created_at']);
                $index++;
            }

            if(!empty($wish_list)){

                $success = 'success';
                $message[] = 'Get data';

            } else {

                $success = 'failure';
                $message[] = 'Warning! Failed';

            }

        }catch (Exception $e){
                
            $error = explode(' (SQL',$e->getMessage());
            $message[] = $error[0];

        }

        $return = array(
                'status'    => $success,
                'data'      => $wish_list,
                'message'   => $message,
                'code'      => $success == 'success' ? 200 : 500,
            );

        echo json_encode($return, JSON_UNESCAPED_UNICODE);

    }

    public function wish_list_infinite()
    {

        $input = Input::post();
        $success = 'error';
        $HomeWishes = "";
        $orderBy = "";
        $index = 0;

        //file_put_contents(dirname(__FILE__).'/limit.log', print_r($input, true));

        try{

            $HomeWishes = array();

            if($input['filter'] == 'recent'){
                $orderBy = 'ORDER BY id DESC';
            }
            if($input['filter'] == 'upvote'){
                $orderBy = 'ORDER BY upvotes DESC';
            }
            if($input['filter'] == 'near'){
                $orderBy = 'ORDER BY radius ASC';
            }

            $result = $this->mysqli->query("SELECT `wishes`.*,(SELECT COUNT(*) FROM `wish_upvotes` WHERE wish_id = wishes.id) as upvotes, (SELECT COUNT(*) FROM `wish_followers` WHERE wish_id = wishes.id) as followers,(3959 * acos(cos(radians(30.7161)) * cos(radians(wishes.geo_lat)) * cos(radians(wishes.geo_long) - radians(76.7193)) + sin(radians(30.7161)) * sin(radians(wishes.geo_lat)))) as radius FROM `wishes` LEFT JOIN `app_users` ON `app_users`.id =`wishes`.user_id WHERE `wishes`.status = 1 " . $orderBy . " LIMIT ".$input['limit']." OFFSET ".$input['offset']."");

            while ($row = mysqli_fetch_assoc($result)) {
                # code...
                $HomeWishes[$index] = $row;
                $HomeWishes[$index]['time'] = $this->time_elapsed_string($row['created_at']);
                $index++;
            }

            if(!empty($HomeWishes)){

                $success = 'success';
                $message[] = 'Get data';

            } else {

                $success = 'failure';
                $message[] = 'Warning! Failed';

            }

        }catch (Exception $e){
                
            $error = explode(' (SQL',$e->getMessage());
            $message[] = $error[0];

        }

        $return = array(
                'status'    => $success,
                'data'      => $HomeWishes,
                'message'   => $message,
                'code'      => $success == 'success' ? 200 : 500,
            );

        echo json_encode($return);

    }

    public function wishes()
    {

        $input = Input::post();
        $success = 'error';
        $index = 0;

        try{
            
            $HomeWishes = array();

            $result = $this->mysqli->query("SELECT `wishes`.*,(SELECT COUNT(*) FROM `wish_upvotes` WHERE wish_id = wishes.id) as upvotes, (SELECT COUNT(*) FROM `wish_followers` WHERE wish_id = wishes.id) as followers FROM `wishes` LEFT JOIN `app_users` ON `app_users`.id =`wishes`.user_id WHERE `wishes`.user_id = ".$input['user_id']." ORDER BY `wishes`.id DESC");

            while ($row = mysqli_fetch_assoc($result)) {
                # code...
                $HomeWishes[$index] = $row;
                $HomeWishes[$index]['time'] = $this->time_elapsed_string($row['created_at']);
                $index++;
            }

            if(!empty($HomeWishes)){

                $success = 'success';
                $message[] = 'Get data';

            } else {

                $success = 'failure';
                $message[] = 'Warning! Failed';

            }

        }catch (Exception $e){
                
            $error = explode(' (SQL',$e->getMessage());
            $message[] = $error[0];

        }

        $return = array(
            'status'    => $success,
            'data'      => $HomeWishes,
            'message'   => $message,
            'code'      => $success == 'success' ? 200 : 500,
        );

        echo json_encode($return);

    }

    public function all_wishes()
    {

        $input = Input::post();
        $success = 'error';
        $index = 0;

        try{
            
            $HomeWishes = array();

            $result = $this->mysqli->query("SELECT `wishes`.*,(SELECT COUNT(*) FROM `wish_upvotes` WHERE wish_id = wishes.id) as upvotes, (SELECT COUNT(*) FROM `wish_followers` WHERE wish_id = wishes.id) as followers FROM `wishes` LEFT JOIN `app_users` ON `app_users`.id =`wishes`.user_id ORDER BY `wishes`.id DESC");

            while ($row = mysqli_fetch_assoc($result)) {
                # code...
                $HomeWishes[$index] = $row;
                $HomeWishes[$index]['title'] = html_entity_decode($row['title']);
                $HomeWishes[$index]['time'] = $this->time_elapsed_string($row['created_at']);
                $index++;
            }

            if(!empty($HomeWishes)){

                $success = 'success';
                $message[] = 'Get data';

            } else {

                $success = 'failure';
                $message[] = 'Warning! Failed';

            }

        }catch (Exception $e){
                
            $error = explode(' (SQL',$e->getMessage());
            $message[] = $error[0];

        }

        $return = array(
                'status'    => $success,
                'data'      => $HomeWishes,
                'message'   => $message,
                'code'      => $success == 'success' ? 200 : 500,
            );

        echo json_encode($return);

    }

    public function wishesbyuser()
    {

        $input = Input::post();
        $success = 'error';

        try{
            
            $HomeWishes = array();

            $wishes = Wish::where("wishes.user_id", "=", $input['user_id'])->Leftjoin('app_users', 'app_users.id', '=', 'wishes.user_id')->select('app_users.id as user_id','wishes.*')->orderBy('id', 'desc')->limit(5)->get()->toArray();

            foreach ($wishes as $key => $value) {
                # wish...upvote
                if($value['id']):
                $HomeWishes[$key] = $value;
                $HomeWishes[$key]['time'] = $this->time_elapsed_string($value['created_at']);
                $HomeWishes[$key]['upvotes'] = count(Wish_upvote::where("wish_id", "=", $value['id'])->get()->toArray());
                $date1 = date_create(date('Y-m-d', strtotime($value['created_at'])));
                $date2 = date_create(date('Y-m-d'));
                $diff=date_diff($date1,$date2);
                $HomeWishes[$key]['recent'] = $diff->format("%a");
                endif;
            }

            if(!empty($HomeWishes)){

                $success = 'success';
                $message[] = 'Get data';

            } else {

                $success = 'failure';
                $message[] = 'Warning! Failed';

            }

        }catch (Exception $e){
                
            $error = explode(' (SQL',$e->getMessage());
            $message[] = $error[0];

        }

        $return = array(
                'status'    => $success,
                'data'      => $HomeWishes,
                'message'   => $message,
                'code'      => $success == 'success' ? 200 : 500,
            );

        echo json_encode($return);

    }

    public function wishfollower()
    {

        $input = Input::post();
        $success = 'error';

        try{
            
            $HomeWishes = array();

            $wishes = Wish_follower::where("wish_followers.user_id", "=", $input['user_id'])->Leftjoin('app_users', 'app_users.id', '=', 'wish_followers.user_id')->Leftjoin('wishes', 'wishes.id', '=', 'wish_followers.wish_id')->select('app_users.id as user_id','wishes.*')->orderBy('id', 'desc')->limit(5)->get()->toArray();

            foreach ($wishes as $key => $value) {
                # wish...upvote
                if($value['id']):
                $HomeWishes[$key] = $value;
                $HomeWishes[$key]['time'] = $this->time_elapsed_string($value['created_at']);
                $HomeWishes[$key]['upvotes'] = count(Wish_upvote::where("wish_id", "=", $value['id'])->get()->toArray());
                $HomeWishes[$key]['followers'] = count(Wish_follower::where("wish_id", "=", $value['id'])->get()->toArray());
                endif;
            }

            if(!empty($HomeWishes)){

                $success = 'success';
                $message[] = 'Get data';

            } else {

                $success = 'failure';
                $message[] = 'Warning! Failed';

            }

        }catch (Exception $e){
                
            $error = explode(' (SQL',$e->getMessage());
            $message[] = $error[0];

        }

        $return = array(
                'status'    => $success,
                'data'      => $HomeWishes,
                'message'   => $message,
                'code'      => $success == 'success' ? 200 : 500,
            );

        echo json_encode($return);

    }



    public function userfollowers()
    {

        $input = Input::post();
        $success = 'error';

        try{
            
            $followed = array();

            $users = User_follower::where("user_followers.user_id", "=", $input['user_id'])->Leftjoin('app_users', 'app_users.id', '=', 'user_followers.follower_id')->select('user_followers.id as follow_id','user_followers.follower_id','app_users.*')->orderBy('user_followers.id', 'desc')->get()->toArray();

            foreach ($users as $key => $value) {
                # wish...upvote
                $followed[$key] = $value;
                $followed[$key]['time'] = date('h:i A',strtotime($value['created_at']));
                $followed[$key]['wishes'] = count(Wish::where("user_id", "=", $value['follower_id'])->get()->toArray());
            }

            if(!empty($followed)){

                $success = 'success';
                $message[] = 'Get data';

            } else {

                $success = 'failure';
                $message[] = 'Warning! Failed';

            }

        }catch (Exception $e){
                
            $error = explode(' (SQL',$e->getMessage());
            $message[] = $error[0];

        }

        $return = array(
                'status'    => $success,
                'data'      => $followed,
                'message'   => $message,
                'code'      => $success == 'success' ? 200 : 500,
            );

        echo json_encode($return);

    }

    public function edit_profile()
    {

        $input = Input::post();
        $success = 'error';

        file_put_contents(dirname(__FILE__).'/profile.log', print_r($input, true));

        if($input['fname'] == ''){
             $message[] = 'First name required';
        } elseif($input['dob'] == ''){
             $message[] = 'DOB required';
        } else {

             try{
             
                    //Get Particular User
                    $user_data = App_user::find($input['id']);

                    if(!empty($user_data->toArray())){

                        $user_data->first_name  = htmlentities($input['fname']);
                        $user_data->last_name   = htmlentities($input['lname']);
                        $user_data->country     = $input['country'];
                        $user_data->dob         = $input['dob'];
                        $user_data->city        = $input['city'];
                        $user_data->gender      = $input['gender'];
                        $user_data->language    = $input['language'];
                        if($input['picture']):
                            $user_data->picture     = $input['picture'];
                        endif;

                        //Save function
                        $user_data->save(); 

                        $success = 'success';
                        $message[] = 'Thank you! Your profile information has been successfully updated.';

                    } else {

                        $success = 'failure';
                        $message[] = 'Warning! Failed';

                    }

               }catch (Exception $e){
                    
                    $error = explode(' (SQL',$e->getMessage());
                    $message[] = $error[0];

                }
        }

        $return = array(
                'status'    => $success,
                'data'      => ($user_data) ? $user_data->toArray() : $user_data,
                'message'   => $message,
                'code'      => $success == 'success' ? 200 : 500,
            );

        echo json_encode($return);

    }

    public function user_device_token()
    {

        $input = Input::post();

        $user_device = App_device_token::where("user_id", "=", $input['user_id'])->where("device_token", "=", $input['device_token'])->get()->toArray();

        if(!empty($user_device)):
           
            $logged_user_device = App_device_token::find($user_device[0]["id"]);
            $logged_user_device->user_id      = $input['user_id'];
            $logged_user_device->device_type  = $input['device_type'];
            $logged_user_device->device_token = $input['device_token'];
            $logged_user_device->uuid         = $input['uuid'];
            $logged_user_device->save();

        else:

            $_device_token = new App_device_token();
            $_device_token->user_id      = $input['user_id'];
            $_device_token->device_type  = $input['device_type'];
            $_device_token->device_token = $input['device_token'];
            $_device_token->uuid         = $input['uuid'];
            $_device_token->save();

        endif;

    }

    public function initial_chat()
    {
        $input = Input::post();
        $success = 'error';
        $key = 0;

        try{

            //define chat array()
            $chat = array();
            
            $result = $this->mysqli->query("SELECT `wish_chat_messages`.*, `wishes`.`title` FROM `wish_chat_messages` LEFT JOIN `wishes` ON `wish_chat_messages`.chat_wish_id = `wishes`.`id` WHERE ((`sender_id` = ".$input['sender_id']." AND `receiver_id` = ".$input['receiver_id'].") OR (`sender_id` = ".$input['receiver_id']." AND `receiver_id` = ".$input['sender_id'].")) AND (`chat_wish_id` = ".$input['chat_wish_id'].")");

            while ($value = mysqli_fetch_assoc($result)) {
                # wish...upvote
                $chat[$key] = $value;
                $chat[$key]['message_sent'] = App_user::where('id','=',$value['sender_id'])->select('first_name','last_name','picture')->get()->toArray();
                $chat[$key]['message_received'] = App_user::where('id','=',$value['receiver_id'])->select('first_name','last_name','picture')->get()->toArray();
                $key++;              
            }

            if(!empty($chat)){

                $success = 'success';
                $message[] = 'Get data';

            } else {

                $success = 'failure';
                $message[] = 'Warning! Failed';

            }

        }catch (Exception $e){
                
            $error = explode(' (SQL',$e->getMessage());
            $message[] = $error[0];

        }

        $return = array(
                'status'    => $success,
                'data'      => $chat,
                'message'   => $message,
                'code'      => $success == 'success' ? 200 : 500,
            );

        echo json_encode($return);
    }

    public function chat_module()
    {

        $input = Input::post();
        $success = 'error';

        try{
            $ChatHistory = array();
            
            $this->data['users'] = App_user::get()->toArray();
            $chats = wish_chat_messages::join('app_users', 'wish_chat_messages.user_id', '=', 'app_users.id')->select('wish_chat_messages.*', 'app_users.first_name', 'app_users.last_name')->orderBy('id', 'desc')->get()->toArray();

            foreach ($chats as $key => $value) {
                # wish...upvote
                $ChatHistory[$key] = $value;
                $HomeWishes[$key]['time'] = $this->time_elapsed_string($value['created_at']);
                
            }
           if(!empty($ChatHistory)){

                $success = 'success';
                $message[] = 'Get data';

            } else {

                $success = 'failure';
                $message[] = 'Warning! Failed';

            }

        }catch (Exception $e){
                
            $error = explode(' (SQL',$e->getMessage());
            $message[] = $error[0];

        }

        $return = array(
                'status'    => $success,
                'data'      => $ChatHistory,
                'message'   => $message,
                'code'      => $success == 'success' ? 200 : 500,
            );

        echo json_encode($return);

    }

    public function messages()
    {

        $input = Input::post();
        $success = 'error';
        $messages = "";

        try{

            $receiver = Wish_message::where('receiver_id', '=', $input['user_id'])->join('app_users', 'wish_messages.sender_id', '=', 'app_users.id')->join('wishes', 'wish_messages.chat_wish_id', '=', 'wishes.id')->select('wish_messages.id','wish_messages.sender_id as chat','app_users.first_name', 'app_users.last_name','app_users.picture','wishes.title','wishes.id as wish_id','wish_messages.device_time')->get()->toArray();

            /*print_r($receiver);*/

            $sender = Wish_message::where('sender_id', '=', $input['user_id'])->join('app_users', 'wish_messages.receiver_id', '=', 'app_users.id')->join('wishes', 'wish_messages.chat_wish_id', '=', 'wishes.id')->select('wish_messages.id','wish_messages.receiver_id as chat','app_users.first_name', 'app_users.last_name','app_users.picture','wishes.title','wishes.id as wish_id','wish_messages.device_time')->get()->toArray();

            /*print_r($sender);

            die();*/

            $messages = array_merge($receiver,$sender);

            if(!empty($messages)){

                $success = 'success';
                $message[] = 'Get data';

            } else {

                $success = 'failure';
                $message[] = 'Warning! Failed';

            }

        }catch (Exception $e){
                
            $error = explode(' (SQL',$e->getMessage());
            $message[] = $error[0];

        }

        $return = array(
                'status'    => $success,
                'data'      => $messages,
                'message'   => $message,
                'code'      => $success == 'success' ? 200 : 500,
            );

        echo json_encode($return);

    }

    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'Year',
            'm' => 'Month',
            'w' => 'Week',
            'd' => 'Day',
            'h' => 'Hour',
            'i' => 'Minute',
            's' => 'Second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    public function random_password( $length = 8 ) {
        $chars = "abcdefghijkmnopqrstuvwxyzABCDEFGHIJKMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }

    public function checkPassword($pwd) {
        
        $errors = "";

        if (strlen($pwd) < 5) {
            $errors = "Password too short!";
        }
 
        return $errors;
    }

    function checkOldPassword($pwd,$id){

        $previous = App_user::where('id','=', $id)->get()->toArray();

        $errors = "";

        if (strlen($pwd) < 1) {
            $errors = "Previous Password required!";
        } elseif (strcmp(md5($pwd),$previous[0]['password'])) {
            $errors = "Password do not match with your Previous password!";
        }
        
        return $errors;

    }

    public function defaultPicture(){

        $image = 'img/avatar.png';
        return $image;

    }

    public function chat_init(){

        $input = Input::post();
        $success = 'error';
        $message_display = array();
        $result = "";

        try{

            $init_chat = Wish_chat_messages::where('sender_id', '=', $input['sender_id'])->where('chat_wish_id', '=', $input['chat_wish_id'])->where('receiver_id', '=', $input['receiver_id'])->select('id')->get()->toArray();

            if(!empty($init_chat)){

                // insert data into database
                $chat_messages = new Wish_chat_messages();
                $chat_messages->sender_id      = $input['sender_id'];
                $chat_messages->chat_wish_id   = $input['chat_wish_id'];
                $chat_messages->receiver_id    = $input['receiver_id'];
                $chat_messages->message        = htmlentities($input['message']);
                $chat_messages->device_time    = $input['time'];
                $chat_messages->save();

                $success = 'success';
                $message_display[] = 'push notification sent!';

            } else {

                $user_result = $this->mysqli->query("SELECT * FROM `wish_messages` WHERE ((`sender_id` = ".$input['sender_id']." AND `receiver_id` = ".$input['receiver_id'].") OR (`receiver_id` = ".$input['sender_id']." AND `sender_id` = ".$input['receiver_id'].")) AND (`chat_wish_id` = ".$input['chat_wish_id'].")");

                if(empty(mysqli_fetch_assoc($user_result))):
                
                    $messages = new Wish_message();
                    $messages->sender_id      = $input['sender_id'];
                    $messages->chat_wish_id   = $input['chat_wish_id'];
                    $messages->receiver_id    = $input['receiver_id'];
                    $messages->message        = htmlentities($input['message']);
                    $messages->device_time    = $input['time'];
                    $messages->save();

                endif;

                // insert data into database
                $chat_messages = new Wish_chat_messages();
                $chat_messages->sender_id      = $input['sender_id'];
                $chat_messages->chat_wish_id   = $input['chat_wish_id'];
                $chat_messages->receiver_id    = $input['receiver_id'];
                $chat_messages->message        = htmlentities($input['message']);
                $chat_messages->device_time    = $input['time'];
                $chat_messages->save();

                $success = 'success';
                $message_display[] = 'push notification sent!';

            }

            $device_token = App_device_token::where('user_id', '=', $input['receiver_id'])->select('device_token','device_type')->where('device_status', '=', 1)->get()->toArray();

            //get user data
            $user = App_user::where('id','=', $input['sender_id'])->get()->toArray();

            if($device_token[0]['device_token'] && $device_token[0]['device_type'] == 'android'){

                $msg = array
                (
                    'message' => htmlentities($input["message"]),
                    'user_name' => $user[0]['first_name'],
                    'user_avatar' => $user[0]['picture'],
                    'chat_time' => date('l, M j h:i'),
                    'sender_id' => $input["sender_id"],
                    'chat_wish_id' => $input["chat_wish_id"],
                    'receiver_id' => $input["receiver_id"],
                    'title'   => $user[0]['first_name'].' | '.$this->get_wish_title($input["chat_wish_id"]),
                    'vibrate' => 1,
                    'sound'   => 1,
                    'delay_while_idle' => true,
                    "notId" => rand(0,5), // the highest priority
                );

                $fields = array
                (
                    'registration_ids' => array($device_token[0]['device_token']),
                    'data' => $msg
                );

                $headers = array
                (
                    'Authorization: key=AAAA_ixTp60:APA91bE3AQm1S21oyVN313mxqBlWpD7gelnk5arMWUANbDVmc_KAjWRCQCbXKRao__WpB4OcdUPn-OtUju6vNa_XMy1Vv4UayjtJ5HQbWohEL6ExULvgUZxXcHjLCwepGZWOxV8UmTB0',
                    'Content-Type: application/json'
                );

                $ch = curl_init();
                curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
                curl_setopt( $ch,CURLOPT_POST, true );
                curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
                curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
                curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
                curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
                $result = curl_exec($ch );
                curl_close( $ch );
            } else if($device_token[0]['device_token'] && $device_token[0]['device_type'] == 'ios'){

                #Apple Device Token
                $apple_device_tokens[0] = $device_token[0]['device_token'];

                #Apple Push Notification Message
                $msg_to_sent = htmlentities($input["message"]);

                #Apple certificate ID
                $userkey = "wishtru";

                #Apple Notification ID
                $notification_id = "1030";

                // Adjust to your timezone
                date_default_timezone_set('America/New_York');

                // Report all PHP errors
                error_reporting(-1);

                // Using Autoload all classes are loaded on-demand
                require_once dirname(__FILE__).'/ApnsPHP/Autoload.php';

                // Instanciate a new ApnsPHP_Push object
                $push = new ApnsPHP_Push(
                    ApnsPHP_Abstract::ENVIRONMENT_PRODUCTION,
                    dirname(__FILE__)."/".$userkey."_Certificates.pem"
                    //dirname(__FILE__)."/common/union_Certificates.pem"
                    
                );

                // Set the Root Certificate Autority to verify the Apple remote peer
                $push->setRootCertificationAuthority(dirname(__FILE__).'/'.$userkey.'_entrust_root_certification_authority.pem');

                // Connect to the Apple Push Notification Service
                $push->connect();

                foreach ($apple_device_tokens as $apple_device_token) {

                // Instantiate a new Message with a single recipient
                $message = new ApnsPHP_Message($apple_device_token);

                // Set a custom identifier. To get back this identifier use the getCustomIdentifier() method
                // over a ApnsPHP_Message object retrieved with the getErrors() message.
                $message->setCustomIdentifier("Message-Badge-3");

                // Set badge icon to "3"
                $message->setBadge(1);

                // Set a simple welcome text
                //$message->setText('Hello APNs-enabled device!');
                $message->setText($msg_to_sent);

                // Play the default sound
                $message->setSound();

                // Set a custom property
                $message->setCustomProperty('notification_id', $notification_id);
                $message->setCustomProperty('user_name', $user[0]['first_name']);
                $message->setCustomProperty('user_avatar', $user[0]['picture']);
                //$message->setCustomProperty('chat_time', date('l, M j h:i'));
                $message->setCustomProperty('sender_id', $input["sender_id"]);
                $message->setCustomProperty('chat_wish_id', $input["chat_wish_id"]);
                $message->setCustomProperty('receiver_id', $input["receiver_id"]);

                // Set another custom property
                //$message->setCustomProperty('acme3', array('bing', 'bong'));

                // Set the expiry value to 30 seconds
                $message->setExpiry(3600);

                // Add the message to the message queue
                $push->add($message);

                // Send all messages in the message queue
                $push->send();

                }

                // Disconnect from the Apple Push Notification Service
                $push->disconnect();

                // Examine the error message container
                $aErrorQueue = $push->getErrors();
                if (!empty($aErrorQueue)) {
                    var_dump($aErrorQueue);
                }

            } else {
                $message_display[] = mysqli_error();
            }

        }catch (Exception $e){
                
            $error = explode(' (SQL',$e->getMessage());
            $message[] = $error[0];

        }

        $return = array(
            'status'    => $success,
            'data'      => ($result) ? $result : "",
            'message'   => $message_display,
            'code'      => $success == 'success' ? 200 : 500,
        );

        echo json_encode($return); 

    }

    public function wish_fulfilled()
    {

        $input = Input::post();
        $success = 'error';
        $wish_data = "";

        $wish = Wish::where('id', '=', $input['wish_id'])->where('is_fullfill', '=', 1)->get()->toArray();

        if(!empty($wish)){
            $success = 'fulfilled';
            $message[] = 'Wish already fulfilled.';
        }

        else{

             try{
                    
                    // insert data into database
                    if(empty($input['wish_fulfilled_user'])){

                        $success = 'error';
                        $message[] = 'You can\'t fulfill the wish without choose initial chat user!';

                    } else {

                        //Get Particular wish
                        $wish_data = Wish::find($input['wish_id']);
                        $wish_data->is_fullfill = 1;
                        $wish_data->save();

                        //adding review data to database
                        $review = new Wish_review();
                        $review->user_id            = $input['user_id'];
                        $review->wish_id            = $input['wish_id'];
                        $review->wish_fulfilled_user  = $input['wish_fulfilled_user'];
                        $review->wish_review        = $input['wish_review'];
                        $review->review_description = htmlentities($input['review_description']);
                        $review->save();
                        $success = 'success';
                        $message[] = 'Thank You! You have successfully fulfilled this wish.';

                    }

               }catch (Exception $e){
                        
                    $error = explode(' (SQL',$e->getMessage());
                    $success = 'failure';
                    $message[] = $error[0];

                }
        }

        $return = array(
            'status'    => $success,
            'data'      => $wish_data,
            'message'   => $message,
            'code'      => $success == 'success' ? 200 : 500,
        );

        echo json_encode($return);
    }

    public function get_wish_title($wish_id){
        $wish = Wish::where('id','=',$wish_id)->select('title')->get()->toArray();
        return $wish[0]['title'];
    }
}
