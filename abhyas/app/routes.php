<?php

/**
 * Sample group routing with user check in middleware
 */
Route::group(
    '/admin',
    function(){
        if(!Sentry::check()){

            if(Request::isAjax()){
                Response::headers()->set('Content-Type', 'application/json');
                Response::setBody(json_encode(
                    array(
                        'success'   => false,
                        'message'   => 'Session expired or unauthorized access.',
                        'code'      => 401
                    )
                ));
                App::stop();
            }else{
                $redirect = Request::getResourceUri();
                Response::redirect(App::urlFor('login').'?redirect='.base64_encode($redirect));
            }
        }
    },
    function() use ($app) {
        /** sample namespaced controller */
        Route::get('/', 'Admin\AdminController:index')->name('admin');
    }
);

Route::get('/login', 'Admin\AdminController:login')->name('login');
Route::get('/logout', 'Admin\AdminController:logout')->name('logout');
Route::post('/forgot', 'Admin\AdminController:doForgot');
Route::post('/login', 'Admin\AdminController:doLogin');

/** Route to documentation */
Route::get('/doc(/:page+)', 'DocController:index');

foreach (Module::getModules() as $module) {
    $module->registerPublicRoute();
}

/** default routing */
//Route::get('/', 'HomeController:welcome');
Route::group(
    '/',
    function(){
        if(!Sentry::check()){

            if(Request::isAjax()){
                Response::headers()->set('Content-Type', 'application/json');
                Response::setBody(json_encode(
                    array(
                        'success'   => false,
                        'message'   => 'Session expired or unauthorized access.',
                        'code'      => 401
                    )
                ));
                App::stop();
            }else{
                $redirect = Request::getResourceUri();
                Response::redirect(App::urlFor('login').'?redirect='.base64_encode($redirect));
            }
        }
    },
    function() use ($app) {
        /** sample namespaced controller */
       Route::get('/', 'Admin\AdminController:index');
    }
);
/*
* Manager Prifile
*/

Route::group(
    '/profile',
    function(){
        if(!Sentry::check()){

            if(Request::isAjax()){
                Response::headers()->set('Content-Type', 'application/json');
                Response::setBody(json_encode(
                    array(
                        'success'   => false,
                        'message'   => 'Session expired or unauthorized access.',
                        'code'      => 401
                    )
                ));
                App::stop();
            }else{
                $redirect = Request::getResourceUri();
                Response::redirect(App::urlFor('login').'?redirect='.base64_encode($redirect));
            }
        }
    },
    function() use ($app) {
        /** sample namespaced controller */
        Route::get('/', 'ProfileController:index'); // GET /profile
        Route::post('/', 'ProfileController:store'); // POST /profile
        Route::get('/create', 'ProfileController:create'); // Create form of /profile
        Route::get('/:id', 'ProfileController:show'); // GET /profile/:id
        Route::get('/:id/edit', 'ProfileController:edit'); // GET /profile/:id/edit
        Route::put('/:id', 'ProfileController:update'); // PUT /profile/:id
        Route::delete('/:id', 'ProfileController:destroy'); // DELETE /profile/:id
    }
);

/** Route group to users resource */

Route::group(

    '/users',
    function(){
        if(!Sentry::check()){

            if(Request::isAjax()){
                Response::headers()->set('Content-Type', 'application/json');
                Response::setBody(json_encode(
                    array(
                        'success'   => false,
                        'message'   => 'Session expired or unauthorized access.',
                        'code'      => 401
                    )
                ));
                App::stop();
            }else{
                $redirect = Request::getResourceUri();
                Response::redirect(App::urlFor('login').'?redirect='.base64_encode($redirect));
            }
        }
    },
    function() use ($app) {
        /** sample namespaced controller */
        Route::get('/', 'UsersController:index'); // GET /user
        Route::post('/', 'UsersController:store'); // POST /user
        Route::get('/create', 'UsersController:create'); // Create form of /user
        Route::get('/:id', 'UsersController:show'); // GET /user/:id
        Route::get('/:id/edit', 'UsersController:edit'); // GET /user/:id/edit
        Route::put('/:id', 'UsersController:update'); // PUT /user/:id
        Route::put('/user_deactivate/:id', 'UsersController:user_deactivate'); // PUT /wish/:id
        Route::delete('/:id', 'UsersController:destroy'); // DELETE /user/:id
    }
);

/** Route group to wishes resource */

Route::group(
    '/wishes',
    function(){
        if(!Sentry::check()){

            if(Request::isAjax()){
                Response::headers()->set('Content-Type', 'application/json');
                Response::setBody(json_encode(
                    array(
                        'success'   => false,
                        'message'   => 'Session expired or unauthorized access.',
                        'code'      => 401
                    )
                ));
                App::stop();
            }else{
                $redirect = Request::getResourceUri();
                Response::redirect(App::urlFor('login').'?redirect='.base64_encode($redirect));
            }
        }
    },
    function() use ($app) {
        /** sample namespaced controller */
        Route::get('/', 'WishesController:index'); // GET /wish
        Route::post('/', 'WishesController:store'); // POST /wish
        Route::get('/create', 'WishesController:create'); // Create form of /wish
        Route::get('/:id', 'WishesController:show'); // GET /wish/:id
        Route::get('/:id/edit', 'WishesController:edit'); // GET /wish/:id/edit
        Route::put('/:id', 'WishesController:update'); // PUT /wish/:id
        Route::put('/wish_deactivate/:id', 'WishesController:wish_deactivate'); // PUT /wish/:id
        Route::delete('/:id', 'WishesController:destroy'); // DELETE /wish/:id
    }
);
Route::group(
    '/comments',
    function(){
        if(!Sentry::check()){

            if(Request::isAjax()){
                Response::headers()->set('Content-Type', 'application/json');
                Response::setBody(json_encode(
                    array(
                        'success'   => false,
                        'message'   => 'Session expired or unauthorized access.',
                        'code'      => 401
                    )
                ));
                App::stop();
            }else{
                $redirect = Request::getResourceUri();
                Response::redirect(App::urlFor('login').'?redirect='.base64_encode($redirect));
            }
        }
    },
    function() use ($app) {
        /** sample namespaced controller */
        Route::get('/', 'CommentsController:index'); // GET /wish
        
    }
);

/** Route group to chat resource */

/** Route group to woe resource */
        Route::group(
        '/woe',
        function(){
            if(!Sentry::check()){

                if(Request::isAjax()){
                    Response::headers()->set('Content-Type', 'application/json');
                    Response::setBody(json_encode(
                        array(
                            'success'   => false,
                            'message'   => 'Session expired or unauthorized access.',
                            'code'      => 401
                        )
                    ));
                    App::stop();
                }else{
                    $redirect = Request::getResourceUri();
                    Response::redirect(App::urlFor('login').'?redirect='.base64_encode($redirect));
                }
            }
        },
        function() use ($app) {
            /** sample namespaced controller */
            Route::get('/', 'WoeController:index'); // GET /wish
            Route::post('/', 'WoeController:store'); // POST /wish
            Route::get('/create', 'WoeController:create'); // Create form of /wish
            Route::get('/:id', 'WoeController:show'); // GET /wish/:id
            Route::get('/:id/edit', 'WoeController:edit'); // GET /wish/:id/edit
            Route::put('/:id', 'WoeController:update'); // PUT /wish/:id
            Route::put('/wish_deactivate/:id', 'WoeController:wish_deactivate'); // PUT /wish/:id
            Route::delete('/:id', 'WoeController:destroy'); // DELETE /wish/:id
        }
   );

//  end woe group


/** Route group to Pages resource */

Route::group(
    '/mathematics',
    function(){
        if(!Sentry::check()){

            if(Request::isAjax()){
                Response::headers()->set('Content-Type', 'application/json');
                Response::setBody(json_encode(
                    array(
                        'success'   => false,
                        'message'   => 'Session expired or unauthorized access.',
                        'code'      => 401
                    )
                ));
                App::stop();
            }else{
                $redirect = Request::getResourceUri();
                Response::redirect(App::urlFor('login').'?redirect='.base64_encode($redirect));
            }
        }
    },
    function() use ($app) {
        /** sample namespaced controller */
        Route::get('/', 'MathematicsController:index'); // GET / page
        Route::post('/', 'MathematicsController:store'); // POST /page
        Route::get('/create', 'MathematicsController:create'); // Create form of /page
        Route::get('/:id', 'MathematicsController:show'); // GET /page/:id
        Route::get('/:id/edit', 'MathematicsController:edit'); // GET /page/:id/edit
        Route::put('/:id', 'MathematicsController:update'); // PUT /page/:id
        Route::put('/wish_deactivate/:id', 'MathematicsController:wish_deactivate'); // PUT /page/:id
        Route::delete('/:id', 'MathematicsController:destroy'); // DELETE /page/:id
    }
);

/** Route group to chat resource */




/** Route group to Categories resource */

Route::group(
    '/categories',
    function(){
        if(!Sentry::check()){

            if(Request::isAjax()){
                Response::headers()->set('Content-Type', 'application/json');
                Response::setBody(json_encode(
                    array(
                        'success'   => false,
                        'message'   => 'Session expired or unauthorized access.',
                        'code'      => 401
                    )
                ));
                App::stop();
            }else{
                $redirect = Request::getResourceUri();
                Response::redirect(App::urlFor('login').'?redirect='.base64_encode($redirect));
            }
        }
    },
    function() use ($app) {
        /** sample namespaced controller */
        Route::get('/', 'CategorieController:index'); // GET / categorie
        Route::post('/', 'CategorieController:store'); // POST /categorie
        Route::get('/create', 'CategorieController:create'); // Create form of /categorie
        Route::get('/:id', 'CategorieController:show'); // GET /categorie/:id
        Route::get('/:id/edit', 'CategorieController:edit'); // GET /categorie/:id/edit
        Route::put('/:id', 'CategorieController:update'); // PUT /categorie/:id
        Route::delete('/:id', 'CategorieController:destroy'); // DELETE /categorie/:id
    }
);
/** Route group to staff*/
Route::group(
    
    '/staff',
    function(){
        if(!Sentry::check()){

            if(Request::isAjax()){
                Response::headers()->set('Content-Type', 'application/json');
                Response::setBody(json_encode(
                    array(
                        'success'   => false,
                        'message'   => 'Session expired or unauthorized access.',
                        'code'      => 401
                    )
                ));
                App::stop();
            }else{
                $redirect = Request::getResourceUri();
                Response::redirect(App::urlFor('login').'?redirect='.base64_encode($redirect));
            }
        }
    },
    function() use ($app) {
        /** sample namespaced controller */
        Route::get('/', 'StaffController:index'); // GET /user
        Route::post('/', 'StaffController:store'); // POST /user
        Route::get('/create', 'StaffController:create'); // Create form of /user
        Route::get('/:id', 'StaffController:show'); // GET /user/:id
        Route::get('/:id/edit', 'StaffController:edit'); // GET /user/:id/edit
        Route::put('/:id', 'StaffController:update'); // PUT /user/:id
        Route::put('/user_deactivate/:id', 'StaffController:user_deactivate'); // PUT /wish/:id
        Route::delete('/:id', 'StaffController:destroy'); // DELETE /user/:id
    }
);





Route::group(
    '/messages',
    function(){
        if(!Sentry::check()){

            if(Request::isAjax()){
                Response::headers()->set('Content-Type', 'application/json');
                Response::setBody(json_encode(
                    array(
                        'success'   => false,
                        'message'   => 'Session expired or unauthorized access.',
                        'code'      => 401
                    )
                ));
                App::stop();
            }else{
                $redirect = Request::getResourceUri();
                Response::redirect(App::urlFor('login').'?redirect='.base64_encode($redirect));
            }
        }
    },
    function() use ($app) {
        /** sample namespaced controller */
        Route::get('/', 'MessagesController:index'); // GET /chat
        Route::post('/', 'MessagesController:store'); // POST /chat
        Route::get('/create', 'MessagesController:create'); // Create form of /chat
        Route::get('/:id', 'MessagesController:show'); // GET /chat/:id
        Route::get('/:id/edit', 'MessagesController:edit'); // GET /chat/:id/edit
        Route::put('/:id', 'MessagesController:update'); // PUT /chat/:id
        Route::delete('/:id', 'MessagesController:destroy'); // DELETE /chat/:id
    }
);

/*
* App webservices
*/
Route::post('/webservices/register', 'WebservicesController:register'); // POST Register 
Route::post('/webservices/login', 'WebservicesController:login'); // POST User
Route::post('/webservices/logout', 'WebservicesController:logout'); // POST User
Route::post('/webservices/forgetpassword', 'WebservicesController:forgetpassword'); // POST Password
Route::post('/webservices/wish_detail', 'WebservicesController:wish_detail'); // POST wish Detail
Route::post('/webservices/profile', 'WebservicesController:profile'); // POST wish Detail
Route::post('/webservices/change_password', 'WebservicesController:change_password'); //POST 
Route::post('/webservices/add_wish', 'WebservicesController:add_wish'); // POST wish Detail
Route::post('/webservices/edit_profile', 'WebservicesController:edit_profile'); // POST wish Detail
Route::post('/webservices/wish_list', 'WebservicesController:wish_list'); // POST wishes
Route::post('/webservices/wish_list_infinite', 'WebservicesController:wish_list_infinite'); // POST wishes
Route::post('/webservices/chat_module', 'WebservicesController:chat_module'); // POST chat module
Route::post('/webservices/wishesbyuser', 'WebservicesController:wishesbyuser'); // POST wishes
Route::post('/webservices/wishes', 'WebservicesController:wishes'); // POST wishes
Route::post('/webservices/all_wishes', 'WebservicesController:all_wishes'); // POST all_wishes
Route::post('/webservices/initial_chat', 'WebservicesController:initial_chat'); //  wish chat
Route::post('/webservices/upvote', 'WebservicesController:upvote'); //  wish upvote
Route::post('/webservices/follow', 'WebservicesController:follow'); //  wish follow
Route::post('/webservices/user_follow', 'WebservicesController:user_follow'); //  user follow
Route::post('/webservices/wishfollower', 'WebservicesController:wishfollower'); //  wish follow
Route::post('/webservices/userfollowers', 'WebservicesController:userfollowers'); //  user follow
Route::post('/webservices/user_device_token', 'WebservicesController:user_device_token'); //Device Token
Route::post('/webservices/chat_notification', 'WebservicesController:chat_notification'); //Chat
Route::post('/webservices/search', 'WebservicesController:search'); // POST search
Route::post('/webservices/chat_init', 'WebservicesController:chat_init'); // POST chat_init
Route::post('/webservices/messages', 'WebservicesController:messages'); // POST messages
Route::post('/webservices/wish_fulfilled', 'WebservicesController:wish_fulfilled'); // POST wish_fulfilled

Route::get('/webservices/all_pages', 'WebservicesController:all_pages'); // POST wish_fulfilled
Route::post('/webservices/get_one_chapter', 'WebservicesController:get_one_chapter');

/*
* Account email confirmation
*/
Route::get('/:id/activate', 'UsersController:activate'); //  user_activate_email
Route::put('/activate/:id', 'UsersController:confirm_account'); // PUT /user/:id