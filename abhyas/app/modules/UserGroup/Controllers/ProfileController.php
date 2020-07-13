<?php

namespace UserGroup\Controllers;
use \App;
use \View;
use \Menu;
use \User;
use \Input;
use \Sentry;
use \Request;
use \Response;
use \Exception;
use \Admin\BaseController;
use \Cartalyst\Sentry\Users\UserNotFoundException;

class ProfileController extends BaseController {

    public function __construct() {
        parent::__construct();
        Menu::get('admin_sidebar')->setActiveMenu('profile');
    }
    /**
     * display list of resource
     */
    public function index($page = 1) {
        $user = Sentry::getUser();
        $this->data['user_id'] = $user->id;
        $this->data['company'] = $user->company;
        $this->data['address'] = $user->address;
        $this->data['address_2'] = $user->address_2;
        $this->data['city'] = $user->city;
        $this->data['state'] = $user->state;
        $this->data['zip_code'] = $user->zip_code;
        $this->data['phone'] = $user->phone;
        $this->data['website'] = $user->website;
        $this->data['first_name'] = $user->first_name;
        $this->data['last_name'] = $user->last_name;
        //Get Logged User Detail
        $this->data['user_image'] = (!empty($user->user_image)) ? $user->user_image : "../assets/pages/media/profile/profile_user.jpg";
        $this->data['title'] = 'Profile';
        $this->data['users'] = User::where('id', '<>', $user->id)->get()->toArray();
        /** load the user.js app */
        $this->loadJs('app/user.js');
        /** publish necessary js  variable */
        $this->publish('baseUrl', $this->data['baseUrl']);
        /** render the template */
        View::display('@usergroup/profile/index.twig', $this->data);
    }
    /**
     * update resource with specific id
     */
    public function update($id) {
        $success = false;
        $message = '';
        $user = null;
        $code = 0;
        try {
            $input = Input::put();
            /** in case request come from post http form */
            $input = is_null($input) ? Input::post() : $input;
            $user = Sentry::findUserById($id);
            if (!empty($input['action']) && $input['action'] == "user_info"):
                $user->first_name = $input['first_name'];
                $user->last_name = $input['last_name'];
                $user->company = $input['company'];
                $user->address = $input['address'];
                $user->address_2 = $input['address_2'];
                $user->city = $input['city'];
                $user->state = $input['state'];
                $user->zip_code = $input['zip_code'];
                $user->phone = $input['phone'];
                $user->website = $input['website'];
		        $message = 'User was successfully updated.';
                //Get Logged User Detail
            elseif (!empty($input['action']) && $input['action'] == "user_pic"):
                $user->user_image = $input['user_image'];
		        $message = 'Logo was successfully updated.';
            else:
                if ($input['password'] != $input['confirm_password']) {
                    throw new Exception("Current password and new password does not match. Please verify and try again.", 1);
                }
                if ($input['password']) {
                    $user->password = $input['password'];
                    wp_set_password( $input['password'], $WPuser->ID );
		            $message = 'Password was successfully updated.';
                }
            endif;
            $success = $user->save();
            $code = 200;            
        }
        catch(UserNotFoundException $e) {
            $message = $e->getMessage();
            $code = 404;
        }
        catch(Exception $e) {
            $message = $e->getMessage();
            $code = 500;
        }
        if (Request::isAjax()) {
            Response::headers()->set('Content-Type', 'application/json');
            Response::setBody(json_encode(array('success' => $success, 'data' => ($user) ? $user->toArray() : $user, 'message' => $message, 'code' => $code)));
        } else {
            Response::redirect($this->siteUrl('admin/user/' . $id . '/edit'));
        }
    }
    /**
     * Update user Picture with specific id
     */
    public function updateUserPicture() {
        echo "string";
        print_r($_REQUEST);
    }
}
