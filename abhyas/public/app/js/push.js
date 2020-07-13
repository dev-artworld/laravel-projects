/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

var push_ini= 0;
var pushMessage='';
var device_reg_id = 'device_reg_id';
var app = {
    // Application Constructor
    initialize: function() {
        this.bindEvents();
    },
    // Bind Event Listeners
    //
    // Bind any events that are required on startup. Common events are:
    // 'load', 'deviceready', 'offline', and 'online'.
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
    // deviceready Event Handler
    //
    // The scope of 'this' is the event. In order to call the 'receivedEvent'
    // function, we must explicity call 'app.receivedEvent(...);'
    onDeviceReady: function() {
            //alert("device ready");
        var pushNotification = window.plugins.pushNotification;
            pushNotification.register(app.successHandler, app.errorHandler,{"senderID":"1091665373101","ecb":"app.onNotificationGCM"});

    },
    // result contains any message sent from the plugin call
    successHandler: function(result) {
       // alert('Callback Success! Result = '+result)
    },
    errorHandler:function(error) {
        alert(error);
    },
    onNotificationGCM: function(e) {
        //alert(JSON.stringify(e))
        switch( e.event )
        {
            case 'registered':
                if ( e.regid.length > 0 )
                {   
                    localStorage.setItem('device_reg_id',e.regid)
                }
                break;

            case 'message':

            setTimeout(function(){

              if(mainView.url == 'chat.html'){

                var myMessages = myApp.messages('.messages', {
                  autoLayout:true,
                  //newMessagesFirst: true
                });
                    //alert(JSON.stringify(e.payload))
                if(e.payload.chat_wish_id+'_'+e.payload.sender_id == jQuery('#wish_chat_page').attr('data-page-chat')){
                  
                    var settings = {
                      "async": true,
                      "crossDomain": true,
                      "url": "https://api.wishtru.com/webservices/notification",
                      "method": "POST",
                      "headers": {
                        "content-type": "application/x-www-form-urlencoded",
                        "cache-control": "no-cache",
                        "postman-token": "cd7d8ccf-0428-e983-f17e-c924f9c7dc4a"
                      },
                      "data": {
                        "notification_id": e.payload.message_id
                      }
                    }
                    //alert(JSON.stringify(settings))
                    $.ajax(settings).done(function (response) {
                        var data = JSON.parse(response);
                      //  alert(JSON.stringify(data))
                        myMessages.addMessage({
                            // Message text
                            text: autolink(e.message),
                            date: data.data[0].device_time,
                            avatar: data.data[0].picture,
                            name: data.data[0].first_name,
                            type: 'sent'
                        })
                    });

                } else {
                    //alert(JSON.stringify(e))
                    cordova.plugins.notification.local.schedule({
                        title: 'WISHtru Benachrichtigung!',
                        text: e.message,
                        icon: 'http://climberindonesia.com/assets/icon/ionicons-2.0.1/png/512/android-chat.png'
                    })

                    var item = myApp.addNotification({
                        message: e.message,
                        title: 'Wish Benachrichtigung!',
                        onClick: function () {
                            localStorage.setItem('wish_id', e.payload.chat_wish_id)
                            localStorage.setItem('wish_user_id', e.payload.sender_id)
                           // localStorage.setItem('wish_title',e.payload.title)
                            mainView.router.reloadPage("chat.html")
                        }
                    });
                    setTimeout(function() {
                        myApp.closeNotification(item)
                    },2000)

                }

              } else {
            // alert(JSON.stringify(e))
                cordova.plugins.notification.local.schedule({
                    title: 'WISHtru Benachrichtigung!',
                    text: e.message,
                    icon: 'http://climberindonesia.com/assets/icon/ionicons-2.0.1/png/512/android-chat.png',
                })

                var item = myApp.addNotification({
                    message: e.message,
                    title: 'Wish Benachrichtigung!',
                    onClick: function () {
                        localStorage.setItem('wish_id', e.payload.chat_wish_id)
                        localStorage.setItem('wish_user_id', e.payload.sender_id)
                        mainView.router.reloadPage("chat.html");
                       // mainView.router.refreshPage('chat.html')
                    }
                });
                setTimeout(function() {
                  myApp.closeNotification(item)
                },2000)

              }
              localStorage.setItem('reveived_user_id', e.payload.sender_id)
              
            },1000)

              break;

            case 'error':
                //alert('GCM error = '+e.msg);
                break;

            default:
                //alert('An unknown GCM event has occurred');
                break;
        }
    }

};

function autolink(str, attributes)
{
    attributes = attributes || {};
    var attrs = "";
    for(name in attributes)
        attrs += " "+ name +'="'+ attributes[name] +'"';
    
    var reg = new RegExp("(\\s?)((http|https|ftp|www)://[^\\s<]+[^\\s<\.)])", "gim");
    str = str.toString().replace(reg, '$1<a onclick="openBrowser(\'$2\')" href="javascript:void(0)">$2</a>');
    
    return str;
}

app.initialize();