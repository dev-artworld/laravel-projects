<?php

use \App;
use \View;
use \Menu;
use \User;
use \Input;
use \Sentry;
use \Request;
use \App_user;
use \Wish_message;
use \Response;
use \Exception;
use \Admin\BaseController;
use \Cartalyst\Sentry\Users\UserNotFoundException;

class MessagesController extends BaseController
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
        $this->data['title'] = 'Messages Management';
        
        $messages = array();
        
        foreach (Wish_message::get()->toArray() as $key => $value) {
            # code...
            $messages[$key] = $value;
            $messages[$key]['chat_wish'] = $this->get_wish_title($value['chat_wish_id']);
            $messages[$key]['sender'] = $this->get_user($value['sender_id']);
            $messages[$key]['receiver'] = $this->get_user($value['receiver_id']);
        }
        
        $this->data['messages'] = $messages;

        //$this->get_wish_title(29);
        //$this->get_user(11);

		/** render the template */
        View::display('messages/index.twig', $this->data);
        
    }
	
	
    public function user_information($user_id)
    {
	    $user = App_user::where('id', '=', $user_id)->get()->toArray();
		return $user[0]['first_name'].' '.$user[0]['last_name'];
		
    }
	
	public function get_wish_title($wish_id){
        $wish = Wish::where('id', '=', $wish_id)->select('title')->get()->toArray();
        return $wish[0]['title'];
    }
    
    public function get_user($user_id){
        $user = App_user::where('id', '=', $user_id)->select('first_name','last_name')->get()->toArray();
        //return $user[0]['first_name'].' '.$user[0]['last_name'];
    }

   /* public function store()
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
            $user->dob          = $input['dob'];
            $user->password     = $input['password'];
            $user->status       = $input['status'];

            $user->save();

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
        $this->data['title'] = 'Welcome to Slim Starter Application';
        App::render('beacon/create.twig', $this->data);
    }
    
    public function edit($id)
    {
        
        $beacon = new Beacon();
        
        //Set the page Title
        $this->data['title'] = 'Beacons List';
        
        //Get all campaigns Data Using Model
        $this->data['beacon'] = $beacon->find($id)->toArray();
        
        // print_r($this->data['campaign']);        
        
        View::display('beacon/edit.twig', $this->data);
        
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
            $user_data->dob          = $input['dob'];
            $user_data->password     = $input['password'];
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
        
    }*/
    
    public function destroy($id)
    {
        
        $user    = null;
        $message = '';
        $success = false;
        
        try {
            
            $message = Wish_message::where('id', '=', $id)->get()->toArray();

            Wish_chat_messages::where('sender_id', '=', $message[0]['sender_id'])->where('chat_wish_id', '=', $message[0]['chat_wish_id'])->where('receiver_id', '=', $message[0]['receiver_id'])->delete();

            Wish_chat_messages::where('sender_id', '=', $message[0]['receiver_id'])->where('chat_wish_id', '=', $message[0]['chat_wish_id'])->where('receiver_id', '=', $message[0]['sender_id'])->delete();

            Wish_message::where('id', '=', $id)->delete();
            
            $success = true;
            $message = 'Messages deleted successfully';
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
            Response::redirect($this->siteUrl('/messages'));
        }
        
    }

    
}
