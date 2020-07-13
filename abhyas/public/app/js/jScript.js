var map;
var media;
var marker;
var connections = {};

 setTimeout(function() {
      $('#splash').fadeOut(1000);
   }, 2000);


//check user logged-in
if (localStorage.getItem("uid") && localStorage.getItem('login')) {
    // navigator.splashscreen.show();
    

    setTimeout(function() {
        app.router.navigate('/main/') 
    }, 300);
} else {
    setTimeout(function(){
      app.router.navigate('/login-screen/') 
  }, 300)
}

// Wait for device API libraries to load
function onDeviceReady() {

    if (navigator.geolocation) {
        // onSuccess Callback
        // This method accepts a `Position` object, which contains
        // the current GPS coordinates
        function onSuccess(position) {
            //alert('latitude '+ position.coords.latitude + ' longitude '+ position.coords.longitude)
            localStorage.setItem('latitude', position.coords.latitude)
            localStorage.setItem('longitude', position.coords.longitude)
        }

        // onError Callback receives a PositionError object
        function onError(error) {
            console.log('code: ' + error.code + '\n' +
                'message: ' + error.message + '\n');
        }

        // Options: throw an error if no update is received every 30 seconds.
        navigator.geolocation.watchPosition(onSuccess, onError, {
            timeout: 5000
        });
    }

}

// This calls onDeviceReady when Cordova has loaded everything.
document.addEventListener('deviceready', onDeviceReady, false);

function registerUser() {

    if(validateForm(jQuery("#register_email").val()) == true){
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "http://abhyas.retouchingwork.org/webservices/register",
            "method": "POST",
            "headers": {
                "content-type": "application/x-www-form-urlencoded",
                "cache-control": "no-cache",
                "postman-token": "c8cc5656-d092-d8f4-0f0c-26c2e6ef0a87"
            },
            "data": {
                "first_name": jQuery("input[name='first_name']").val(),
                "last_name": jQuery("input[name='last_name']").val(),
                "email": jQuery("input[name='email']").val(),
                "password": jQuery("input[name='password']").val(),
                "c_password": jQuery("input[name='c_password']").val(),
                "user_role": jQuery("select[name='role']").val(),
                "address": jQuery("textarea[name='user_address']").val(),
                "dob": '',
                "gender": jQuery("select[name='gender']").val(),
                "country": '',
                "city": '',
                "picture": localStorage.getItem('signup_profile_picture'),
                "privacy_policy": true,
                "device_token": localStorage.getItem('device_reg_id'),
                "device_uuid": device.uuid,
                "device_type": 'android'
            },
            "beforeSend": function() {
                app.progressbar.show()
            },
            "complete": function() {
                app.progressbar.hide()
            }
        }

        alert(JSON.stringify(settings))
        
        jQuery.ajax(settings).done(function(response) {
            var data = JSON.parse(response);
            if (data.status == "success") {
                localStorage.setItem('uid', data.data.id);
                localStorage.setItem("Email", jQuery("#register_email").val());
                app.router.navigate('/main/')
            } else {
                var toastCenter = app.toast.create({
                  text: data.message,
                  position: 'center',
                  closeTimeout: 2000,
                })
                toastCenter.open()
            }
        });
    }

}

function login() {

    /*save user details in localStorage*/
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "http://abhyas.retouchingwork.org/webservices/login",
        "method": "POST",
        "headers": {
            "content-type": "application/x-www-form-urlencoded",
            "cache-control": "no-cache",
            "postman-token": "f5084bbe-fc8b-a853-2d4a-a908a35dea27"
        },
        "data": {
            "email": jQuery("#loginusername").val(),
            "password": jQuery("#loginpassword").val(),
            "device_token": localStorage.getItem('device_reg_id'),
            "device_uuid": device.uuid,
            "device_type": 'android'
        },
        "beforeSend": function() {
            app.progressbar.show()
        },
        "complete": function() {
            app.progressbar.hide()
        }
    }

    jQuery.ajax(settings).done(function(response) {
        var data = JSON.parse(response);
        if (data.status == "success") {
            localStorage.setItem('login', 'normallogin')
            localStorage.setItem("uid", data.data.id);
            app.router.navigate('/main/')
        } else if (data.status == "error" || data.status == "failure") {
            var toastCenter = app.toast.create({
              text: data.message,
              position: 'center',
              closeTimeout: 2000,
            })
            toastCenter.open()
        }
    });
}

function forgot_pass() {

    if(jQuery('#emailAddress').val()){
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "http://abhyas.retouchingwork.org/webservices/forgetpassword",
            "method": "POST",
            "headers": {
                "content-type": "application/x-www-form-urlencoded",
                "cache-control": "no-cache",
                "postman-token": "18fec86b-7eed-519b-9220-1b3c47485570"
            },
            "data": {
                "action": "forgetPass",
                "email": jQuery('#emailAddress').val()
            },
            "beforeSend": function() {
                app.progressbar.show()
            },
            "complete": function() {
                app.progressbar.hide()
            }
        }

        jQuery.ajax(settings).done(function(response) {
            var data = JSON.parse(response);
            if (data.status == "success") {
                

                var toastCenter = app.toast.create({
                  text: data.message,
                  position: 'center',
                  closeTimeout: 2000,
                })
                toastCenter.open()

                app.router.navigate('/login-screen/')

            } else if (data.status == "error" || data.status == "failure") {
                var toastCenter = app.toast.create({
                  text: data.message,
                  position: 'center',
                  closeTimeout: 2000,
                })
                toastCenter.open()
            }
        });
    } else {
        var toastCenter = app.toast.create({
          text: 'Please check email address!',
          position: 'center',
          closeTimeout: 2000,
        })
        toastCenter.open()
    }
}

function logout() {
    app.panel.left.close()
    var loginType = localStorage.getItem("loginType");
    if (loginType === "facebooklogin") {
        facebookConnectPlugin.logout(successLogout, failureLogout);
    } else if (loginType === "normallogin") {
        successLogout();
    } else {
        successLogout();
    }
}

function successLogout() {
    localStorage.removeItem("uid");
    localStorage.removeItem("loginType");
    localStorage.removeItem("Email");
    app.router.navigate('/login-screen/')
}

function failureLogout() {
    localStorage.removeItem("uid");
    localStorage.removeItem("loginType");
    app.router.navigate('/login-screen/')
}



function update_information() {

    if(jQuery("#profile_password").val()){
        if(jQuery("#profile_password").val() == jQuery("#profile_c_password").val()){
            var settings = {
                "async": true,
                "crossDomain": true,
                "url": "http://ringo.airbuzztechnologies.com/controller.php",
                "method": "POST",
                "headers": {
                    "content-type": "application/x-www-form-urlencoded",
                    "cache-control": "no-cache",
                    "postman-token": "0fe322e6-cc6f-9d04-d6d5-b386147ccf32"
                },
                "data": {
                    "action": "update_user_info",
                    "user_id": localStorage.getItem("uid"),
                    "first_name": jQuery("#profile_first_name").val(),
                    "password": jQuery("#profile_password").val(),
                    "c_password": jQuery("#profile_c_password").val()
                },
                "beforeSend": function() {
                    app.progressbar.show()
                },
                "complete": function() {
                    app.progressbar.hide()
                }
            }

            jQuery.ajax(settings).done(function(response) {
                var data = JSON.parse(response);
                if (data.status == "success") {
                    app.router.navigate('/home-new/')
                }
            });
        } else {
            var toastCenter = app.toast.create({
              text: 'Password does not match please check and re-enter password!',
              position: 'center',
              closeTimeout: 2000,
            })
            toastCenter.open()
        }
    } else{
        if(jQuery("#profile_first_name").val()){
            var settings = {
                "async": true,
                "crossDomain": true,
                "url": "http://ringo.airbuzztechnologies.com/controller.php",
                "method": "POST",
                "headers": {
                    "content-type": "application/x-www-form-urlencoded",
                    "cache-control": "no-cache",
                    "postman-token": "0fe322e6-cc6f-9d04-d6d5-b386147ccf32"
                },
                "data": {
                    "action": "update_user_info",
                    "user_id": localStorage.getItem("uid"),
                    "first_name": jQuery("#profile_first_name").val(),
                    "password": jQuery("#profile_password").val(),
                    "c_password": jQuery("#profile_c_password").val()
                },
                "beforeSend": function() {
                    app.progressbar.show()
                },
                "complete": function() {
                    app.progressbar.hide()
                }
            }

            jQuery.ajax(settings).done(function(response) {
                var data = JSON.parse(response);
                if (data.status == "success") {
                    app.router.navigate('/home-new/')
                }
            });
        } else {
            var toastCenter = app.toast.create({
              text: 'Full Name is required!',
              position: 'center',
              closeTimeout: 2000,
            })
            toastCenter.open()
        }
    }

}

function updateUser() {

    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "http://ringo.airbuzztechnologies.com/controller.php",
        "method": "POST",
        "headers": {
            "content-type": "application/x-www-form-urlencoded",
            "cache-control": "no-cache",
            "postman-token": "0fe322e6-cc6f-9d04-d6d5-b386147ccf32"
        },
        "data": {
            "action": "profile_update",
            "password": jQuery("#pwd").val(),
            "user_id": localStorage.getItem("uid"),
            "c_password": jQuery("#cpwd").val(),
            "first_name": jQuery("#firstname").val(),
            "last_name": jQuery("#lastname").val(),
            "user_email": jQuery("#email").val(),
            "user_image": localStorage.getItem("icon"),
            "user_phone": jQuery("#user_phone").val()
        },
        "beforeSend": function() {
            myApp.showIndicator()
        },
        "complete": function() {
            myApp.hideIndicator()
        }
    }

    $.ajax(settings).done(function(response) {
        mainView.router.loadPage("my-profile.html");
    });
}

function findlocation(latitude, longitude) {
    var geocoder = new google.maps.Geocoder();
    var locaiton = new google.maps.LatLng(latitude, longitude);
    map = new google.maps.Map(document.getElementById('getCurrentLocation'), {
        zoom: 17,
        center: locaiton,
        mapTypeId: 'roadmap',
        zoomControl: false,
        scaleControl: false,
        mapTypeControl: false,
        streetViewControl: false,
        fullscreenControl: false,
        styles: [{
                elementType: 'geometry',
                stylers: [{
                    color: '#242f3e'
                }]
            },
            {
                elementType: 'labels.text.stroke',
                stylers: [{
                    color: '#242f3e'
                }]
            },
            {
                elementType: 'labels.text.fill',
                stylers: [{
                    color: '#746855'
                }]
            },
            {
                featureType: 'administrative.locality',
                elementType: 'labels.text.fill',
                stylers: [{
                    color: '#d59563'
                }]
            },
            {
                featureType: 'poi',
                elementType: 'labels.text.fill',
                stylers: [{
                    color: '#d59563'
                }]
            },
            {
                featureType: 'poi.park',
                elementType: 'geometry',
                stylers: [{
                    color: '#263c3f'
                }]
            },
            {
                featureType: 'poi.park',
                elementType: 'labels.text.fill',
                stylers: [{
                    color: '#6b9a76'
                }]
            },
            {
                featureType: 'road',
                elementType: 'geometry',
                stylers: [{
                    color: '#38414e'
                }]
            },
            {
                featureType: 'road',
                elementType: 'geometry.stroke',
                stylers: [{
                    color: '#212a37'
                }]
            },
            {
                featureType: 'road',
                elementType: 'labels.text.fill',
                stylers: [{
                    color: '#9ca5b3'
                }]
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry',
                stylers: [{
                    color: '#746855'
                }]
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry.stroke',
                stylers: [{
                    color: '#1f2835'
                }]
            },
            {
                featureType: 'road.highway',
                elementType: 'labels.text.fill',
                stylers: [{
                    color: '#f3d19c'
                }]
            },
            {
                featureType: 'transit',
                elementType: 'geometry',
                stylers: [{
                    color: '#2f3948'
                }]
            },
            {
                featureType: 'transit.station',
                elementType: 'labels.text.fill',
                stylers: [{
                    color: '#d59563'
                }]
            },
            {
                featureType: 'water',
                elementType: 'geometry',
                stylers: [{
                    color: '#17263c'
                }]
            },
            {
                featureType: 'water',
                elementType: 'labels.text.fill',
                stylers: [{
                    color: '#515c6d'
                }]
            },
            {
                featureType: 'water',
                elementType: 'labels.text.stroke',
                stylers: [{
                    color: '#17263c'
                }]
            }
        ]
    });

    var image = 'img/marker.png';
    marker = new google.maps.Marker({
        position: locaiton,
        map: map,
        icon: image
    });

    geocoder.geocode({
        latLng: locaiton
    }, function(result, status) {
        if (status == "OK") {
            jQuery(".last-seen-location-address").html(result[0].formatted_address);
            //Create and open InfoWindow.
            var infoWindow = new google.maps.InfoWindow();
            infoWindow.setContent('<p style="width:200px;height:auto;">'+result[0].formatted_address+'</p>');
            infoWindow.open(map, marker);
        } else {
            jQuery(".last-seen-location-address").html("Unknown Location");
        }
    });
}

function SetMarker(latitude, longitude) {
    var geocoder = new google.maps.Geocoder();
    //Remove previous Marker.
    if (marker != null) {
        marker.setMap(null);
    }

    //Set Marker on Map.
    var locaiton = new google.maps.LatLng(latitude, longitude);
    var image = 'img/marker.png';
    marker = new google.maps.Marker({
        position: locaiton,
        map: map,
        icon: image
    });

    map.setCenter(locaiton)
    //Create and open InfoWindow.
    geocoder.geocode({
        latLng: locaiton
    }, function(result, status) {
        if (status == "OK") {
            jQuery(".last-seen-location-address").html(result[0].formatted_address);
            //Create and open InfoWindow.
            var infoWindow = new google.maps.InfoWindow();
            infoWindow.setContent('<p style="width:200px;height:auto;">'+result[0].formatted_address+'</p>');
            infoWindow.open(map, marker);
        } else {
            jQuery(".last-seen-location-address").html("Unknown Location");
        }
    });
};

function editDevice(device_id) {
    localStorage.setItem("editdeviceId", device_id);
    mainView.router.loadPage("updatedevice.html");
}

function device_edit() {
    var editId = localStorage.getItem("editdeviceId");
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "http://ringo.airbuzztechnologies.com/controller.php",
        "method": "POST",
        "headers": {
            "content-type": "application/x-www-form-urlencoded",
            "cache-control": "no-cache",
            "postman-token": "0fe322e6-cc6f-9d04-d6d5-b386147ccf32"
        },
        "data": {
            "action": "editDevice",
            "device_name": jQuery("#device_name").val(),
            "device_id": localStorage.getItem("editdeviceId"),
            "device_icon": localStorage.getItem("device_icon")
        },
        "beforeSend": function() {
            myApp.showIndicator()
        },
        "complete": function() {
            myApp.hideIndicator()
        }
    }

    $.ajax(settings).done(function(response) {
        localStorage.setItem("device_icon", 'img/logo-svg.svg');
        localStorage.setItem("device_name", '');
        mainView.router.loadPage("all-devices.html");
    });

}

function chooseIcon(ele) {
    var a = jQuery(ele).find('img').attr('src');
    localStorage.setItem("sample", a);

    //mainView.router.loadPage("device-add.html");
}

function openlink() {
    window.open('http://puccixp.com/', '_blank', 'location=yes', 'closebuttoncaption=Return');
}

function facebooklogin() {
    document.addEventListener("deviceready", startFbLogin, false);
}

function startFbLogin() {
    // Now safe to use device APIs
    var fbLoginSuccess = function(userData) {
        getFacebookUserInfo(userData);
    }

    facebookConnectPlugin.login(["public_profile", "email"], fbLoginSuccess,
        function loginError(error) {
            console.error(error)
        }
    );
}

function getFacebookUserInfo(userData) {
    var successFacebookUserInfo = function(response) {

        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "http://ringo.airbuzztechnologies.com/controller.php",
            "method": "POST",
            "headers": {
                "content-type": "application/x-www-form-urlencoded",
                "cache-control": "no-cache",
                "postman-token": "c8cc5656-d092-d8f4-0f0c-26c2e6ef0a87"
            },
            "data": {
                "action": "register",
                "fname": response.first_name,
                "lname": response.last_name,
                "email": response.email,
                "password": response.id,
                "c_password": response.id,
                "age": "",
                "gender": ""
            },
            "beforeSend": function() {
                myApp.showIndicator()
            },
            "complete": function() {
                myApp.hideIndicator()
            }
        }

        jQuery.ajax(settings).done(function(response) {
            var data = JSON.parse(response);
            localStorage.setItem('login', 'facebooklogin')
            localStorage.setItem("uid", data.data.id);
            app.initialize();
            localStorage.setItem("Email", data.data.user_email);
            localStorage.setItem("user_name", data.data.first_name);
            mainView.router.loadPage("home.html");

        });

    }
    var faliureFacebookUserInfo = function(response) {
        //alert(JSON.stringify(response));
    }
    facebookConnectPlugin.api("me/?fields=id,email,first_name,last_name", ["public_profile", "email"], successFacebookUserInfo, faliureFacebookUserInfo);
}

function _goToBackPage() {
    // Now safe to use device APIs
    if (localStorage.getItem("uid")) {
        localStorage.setItem("view", "");
        // navigator.splashscreen.show();
        setTimeout(function() {
            mainView.router.loadPage("home.html")
        }, 1000);
    } else {
        setTimeout(function() {
            mainView.router.loadPage("login-screen-page.html")
        }, 1000);
    }
}

function safezone(button) {
    if (jQuery(button).find("input[type='checkbox']").prop("checked")) {
        localStorage.setItem(localStorage.getItem('connection'), 'alert_off')
        evothings.ble.loseFlagOff(localStorage.getItem('device_address'), function() {
            console.log("flag on success")
        }, function() {
            console.log("flag on error")
        });
    } else {
        localStorage.setItem(localStorage.getItem('connection'), 'alert_on')
        evothings.ble.loseFlagOn(localStorage.getItem('device_address'), function() {
            console.log("flag on success")
        }, function() {
            console.log("flag on error")
        });
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "http://ringo.airbuzztechnologies.com/controller.php",
            "method": "POST",
            "headers": {
                "content-type": "application/x-www-form-urlencoded",
                "authorization": "Basic YXJ0d29ybGQ6YWRtaW4hQCMxMjM5Nw==",
                "cache-control": "no-cache",
                "postman-token": "91a63454-3779-ba0a-08c2-564285d7da20"
            },
            "data": {
                "user_id": localStorage.getItem("uid"),
                "device_id": localStorage.getItem('device_address'),
                "connection": localStorage.getItem('connection'),
                "safe_zone": "1",
                "action": "safezone"
            }
        }

        $.ajax(settings).done(function(response) {
            console.log(response);
        });
    }
}

function validateForm(email) {
    var x = email;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        var toastCenter = app.toast.create({
          text: 'Not a valid e-mail address',
          position: 'center',
          closeTimeout: 2000,
        })
        toastCenter.open()
        return false;
    } else {
        return true;
    }
}

function edit_more_information(button){
    jQuery('.edit-profile-block').find('form').toggle(500)
}
function address_change(role)
{
    if(role.value=='student')
  {
      jQuery('#address').attr("placeholder", "Address");
  }
  else
  {
      jQuery('#address').attr("placeholder", "Posting");

  }
}

function readPDFDocument(button){
    localStorage.setItem('medium', jQuery(button).attr('data-medium'))
    localStorage.setItem('class', jQuery(button).attr('data-class'))
    app.router.navigate('/list/')
}

function viewPdfDocument(pdf){


    // If absolute URL from the remote server is provided, configure the CORS
    localStorage.setItem('document', jQuery(pdf).attr('data-pdf'))
    /*app.router.navigate('/content-block/')*/
    //window.open()
    window.open("http://abhyas.retouchingwork.org/mobile-viewer/viewer.html?pdf="+jQuery(pdf).attr('data-pdf')+"", "_blank", "toolbar=no,scrollbars=yes,resizable=yes,width=400,height=4000");
}

function openNotification(attr){

    // Create center toast
    var toastCenter = app.toast.create({
      text: 'English medium section will be coming soon..',
      position: 'center',
      closeTimeout: 2000,
    });
    toastCenter.open();
}