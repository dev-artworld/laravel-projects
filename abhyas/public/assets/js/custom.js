$(function(){
/**
 * all response will be in below format
 * {
 *     success : boolean,
 *     data : {resource_object} or null,
 *     message : string,
 *     code : integer
 * }
 */

$('#wish_update').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) {
    jQuery('#wish-update-form').click()
    e.preventDefault();
    return false;
  }
})

$('#submit_password').pwstrength();
var oTable = $('#sample_1.wishes-table').DataTable();

$("#datepicker_from").change(function(){
    minDateFilter = new Date($(this).val()).getTime();
    oTable.draw();
});

$("#datepicker_to").change(function(){
    maxDateFilter = new Date($(this).val()).getTime();
    oTable.draw();
});

// Date range filter
minDateFilter = "";
maxDateFilter = "";

$.fn.dataTableExt.afnFiltering.push(
  function(oSettings, aData, iDataIndex) {
    if (typeof aData._date == 'undefined') {
      aData._date = new Date(aData[5]).getTime();
    }

    if (minDateFilter && !isNaN(minDateFilter)) {
      if (aData._date < minDateFilter) {
        return false;
      }
    }

    if (maxDateFilter && !isNaN(maxDateFilter)) {
      if (aData._date > maxDateFilter) {
        return false;
      }
    }

    return true;
  }
);

if(jQuery(window).width() <= '1190'){
  //console.log(jQuery(window).width())
  setTimeout(function(){
    jQuery('#wishesTable,#sample_1').addClass('responsive')
    jQuery("#wishesTable,#sample_1").dataTable().fnDestroy()
    jQuery("#wishesTable,#sample_1").dataTable()  
  },2000)
  
}

//jQuery("#location-list option[value='21']").attr("selected","selected");


var $loader = $('#loader');
jQuery('.jqte-test').jqte();

$("#location-list").multiSelect();
$("#beacon-list").multiSelect();
var value = jQuery("#campaign-type").val();
//console.log(value);
jQuery(".campaign-type-select").hide(); 
jQuery(".campaign-type-select").find("input").prop("disabled",true);
jQuery(".campaign-type-select").find("textarea").prop("disabled",true);
jQuery("#"+value+"-section").fadeIn("slow");
jQuery("#"+value+"-section").find("input").prop("disabled",false);
jQuery("#"+value+"-section").find("textarea").prop("disabled",false);
/*
* Path, 
* script for active menu
*/

var FrameWorkURL = window.location.pathname.substring(1);
//split the FrameWorkURL with slash
var SplitFrameWorkURL = FrameWorkURL.split("/");
if(SplitFrameWorkURL[0].length == 0){
    jQuery("#navigationMenu").find("#dashboard-menu").addClass("active open selected");
} else {
    if(SplitFrameWorkURL[0] == "subscription" || SplitFrameWorkURL[0] == "invoices"){
        SplitFrameWorkURL[0] = "profile";
    }

    //console.log(SplitFrameWorkURL[0]);

    jQuery("#navigationMenu").find("#"+SplitFrameWorkURL[0]+"-menu").addClass("active open selected");
}

/*
 * DataTables Table plug-in for jQuery
 * CSS: //cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css
 * JS: //cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js
*/

jQuery('#campaign_list').DataTable({
    "aoColumnDefs" : [
 {
   'bSortable' : false,
   'aTargets' : [ 0, 7, 8 ]
 }]
});
//Disabled sorting
jQuery("#checkbox_campaign").removeClass("sorting_asc");


/*
 * updateUserProfile
 * update the user data using Ajax request
*/
/**
 * send POST request to save data to resource server
 * or send PUT request to update data on resource server
 * based on data-method value
*/


$('#btn-user-save').click(function(e){
    e.preventDefault();

    var $button = $(this);
    var $userdata = $('#profile-form-data').serialize();
    var $method = $(this).attr('data-method');
    $url = global.baseUrl+'profile/'+$('#user_id').val();

    $button.prop('disabled', true);
    $button.html('Saving...');
    $loader.show();

    $.ajax({
        url: $url,
        data: $userdata,
        method : $method,
        success: function(resp){

            $(".profile-usertitle-job").text(resp.data.company);
            $(".profile-usertitle-name").text(resp.data.first_name+" "+resp.data.last_name);
            $(".profile-user-name").text("Hi, "+resp.data.first_name);
            $button.prop('disabled', false);
            $button.html('Save Changes');
            $loader.hide();
            App.alert({ message: resp.message });
        }
    });

});

$('#btn-profile-picture-save').click(function(e){
    e.preventDefault();

    var $button = $(this);
    var $userdata = $('#profile-picture-data').serialize();
    var $method = $(this).attr('data-method');
    $url = global.baseUrl+'profile/'+$('#user_id').val();
    console.log($url);
    $button.prop('disabled', true);
    $button.html('Saving...');
    $loader.show();
    //update user name  
    //jQuery(".profile-usertitle-name").text();
    jQuery("#name").val();

    $.ajax({
        url: $url,
        data: $userdata,
        method : $method,
        success: function(resp){
            $button.prop('disabled', false);
            $button.html('Submit');
            $loader.hide();
            jQuery(".profile-usertitle-name").text();
            App.alert({ message: resp.message });
        }
    });

});

$('#btn-user-password-save').click(function(e){
    e.preventDefault();

    var $button = $(this);
    var $userdata = $('#user-password-data').serialize();
    var $method = $(this).attr('data-method');
    $url = global.baseUrl+'profile/'+$('#user_id').val();

    $button.prop('disabled', true);
    $button.html('Saving...');
    $loader.show();

    $.ajax({
        url: $url,
        data: $userdata,
        method : $method,
        success: function(resp){
            $button.prop('disabled', false);
            $button.html('Change Password');
            $loader.hide();
            App.alert({ message: resp.message });
        }
    });

});

jQuery("#sample_1").delegate(".button-user-delete", "click", function(e) {
//$('.button-user-delete').click(function(e){
    e.preventDefault();
    var userButton = jQuery(this);
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this User!",
      type: "warning",
      showCancelButton: true,

      confirmButtonClass: 'btn-danger',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if(isConfirm) {
        swal("Deleted!", "User has been deleted.", "success");
        var data_user_id = userButton.attr("data-user-id");
        var $button = $(".button-user-delete");
        var $method = $(".button-user-delete").attr('data-method');
        $url = window.location.origin+'/users/'+data_user_id;
        $button.prop('disabled', true);

        $loader.show();
        var $userid = data_user_id; 
        $('tr[row-id="'+$userid+'"]').remove();   
        $.ajax({
            url: $url,
            data: {user_id: data_user_id},
            method : $method,
            success: function(resp){
                $button.prop('disabled', false);
                $loader.hide();
                App.alert({ message: resp.message });
            }
        });
      } else {
        swal("Cancelled", "Cancelled :)", "error");
      }
    });

});
jQuery("#sample_1").delegate(".button-staff-delete", "click", function(e) {
//$('.button-user-delete').click(function(e){
    e.preventDefault();
    var userButton = jQuery(this);
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this User!",
      type: "warning",
      showCancelButton: true,

      confirmButtonClass: 'btn-danger',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if(isConfirm) {
        swal("Deleted!", "User has been deleted.", "success");
        var data_user_id = userButton.attr("data-user-id");
        var $button = $(".button-staff-delete");
        var $method = $(".button-staff-delete").attr('data-method');
        $url = window.location.origin+'/staff/'+data_user_id;
        $button.prop('disabled', true);

        $loader.show();
        var $userid = data_user_id; 
        $('tr[row-id="'+$userid+'"]').remove();   
        $.ajax({
            url: $url,
            data: {user_id: data_user_id},
            method : $method,
            success: function(resp){
                $button.prop('disabled', false);
                $loader.hide();
                App.alert({ message: resp.message });
            }
        });
      } else {
        swal("Cancelled", "Cancelled :)", "error");
      }
    });

});
/**delete a single page**/
jQuery("#sample_1").delegate(".button-page-delete", "click", function(e) {
//$('.button-user-delete').click(function(e){
    e.preventDefault();
    var userButton = jQuery(this);
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this Page!",
      type: "warning",
      showCancelButton: true,

      confirmButtonClass: 'btn-danger',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if(isConfirm) {
        swal("Deleted!", "Page has been deleted.", "success");
        var data_user_id = userButton.attr("data-page-id");
        var $button = $(".button-page-delete");
        var $method = $(".button-page-delete").attr('data-method');
        $url = window.location.origin+'/mathematics/'+data_user_id;
        $button.prop('disabled', true);

        $loader.show();
        var $userid = data_user_id; 
        $('tr[row-id="'+$userid+'"]').remove();   
        $.ajax({
            url: $url,
            data: {user_id: data_user_id},
            method : $method,
            success: function(resp){
                $button.prop('disabled', false);
                $loader.hide();
                App.alert({ message: resp.message });
            }
        });
      } else {
        swal("Cancelled", "Cancelled :)", "error");
      }
    });
 });

/*
* bulk delete wishes
*/

jQuery('.delete-button-user').click(function(e){
    e.preventDefault();
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover these Users!",
      type: "warning",
      showCancelButton: true,

      confirmButtonClass: 'btn-danger',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if(isConfirm) {
        swal("Deleted!", "Users has been deleted.", "success");
        jQuery('.users-table tbody tr.active').each(function(){
            var data_user_id = jQuery(this).attr('row-id');
            $url = window.location.origin+'/users/'+data_user_id;
            $loader.show();
            var $userid = data_user_id; 
            $('tr[row-id="'+$userid+'"]').remove();   
            $.ajax({
                url: $url,
                data: {user_id: data_user_id},
                method : 'DELETE',
                success: function(resp){
                    $loader.hide();
                    App.alert({ message: resp.message });
                    window.location.href = window.location.origin+'/users';
                }
            });
        })
      } else {
        swal("Cancelled", "Cancelled :)", "error");
      }
    });
});
jQuery('.delete-button-staff').click(function(e){
    e.preventDefault();
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover these Users!",
      type: "warning",
      showCancelButton: true,

      confirmButtonClass: 'btn-danger',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if(isConfirm) {
        swal("Deleted!", "Users has been deleted.", "success");
        jQuery('.users-table tbody tr.active').each(function(){
            var data_user_id = jQuery(this).attr('row-id');
            $url = window.location.origin+'/staff/'+data_user_id;
            $loader.show();
            var $userid = data_user_id; 
            $('tr[row-id="'+$userid+'"]').remove();   
            $.ajax({
                url: $url,
                data: {user_id: data_user_id},
                method : 'DELETE',
                success: function(resp){
                    $loader.hide();
                    App.alert({ message: resp.message });
                    window.location.href = window.location.origin+'/staff';
                }
            });
        })
      } else {
        swal("Cancelled", "Cancelled :)", "error");
      }
    });
});

/*
* bulk deactivate wishes
*/

jQuery('.deactivate-button-user').click(function(e){
    e.preventDefault();
    swal({
      title: "Are you sure?",
      text: "You want to deactivate these Users!",
      type: "warning",
      showCancelButton: true,

      confirmButtonClass: 'btn-danger',
      confirmButtonText: 'Yes, Deactivate it!',
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if(isConfirm) {
        swal("Deactivated!", "Users has been Deactivated.", "success");
        jQuery('.users-table tbody tr.active').each(function(){
            var data_user_id = jQuery(this).attr('row-id');
            $url = window.location.origin+'/users/user_deactivate/'+data_user_id;
            $loader.show();
            var $wishid = data_user_id; 
            //$('tr[row-id="'+$wishid+'"]').remove();   
            $.ajax({
                url: $url,
                data: {user_id: data_user_id},
                method : 'PUT',
                success: function(resp){
                    $loader.hide();
                    App.alert({ message: resp.message });
                    window.location.href = window.location.origin+'/users';
                }
            });
        })
      } else {
        swal("Cancelled", "Cancelled :)", "error");
      }
    });
});


jQuery('.deactivate-button-staff').click(function(e){
    e.preventDefault();
    swal({
      title: "Are you sure?",
      text: "You want to deactivate these Users!",
      type: "warning",
      showCancelButton: true,

      confirmButtonClass: 'btn-danger',
      confirmButtonText: 'Yes, Deactivate it!',
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if(isConfirm) {
        swal("Deactivated!", "Users has been Deactivated.", "success");
        jQuery('.users-table tbody tr.active').each(function(){
            var data_user_id = jQuery(this).attr('row-id');
            $url = window.location.origin+'/staff/user_deactivate/'+data_user_id;
            $loader.show();
            var $wishid = data_user_id; 
            //$('tr[row-id="'+$wishid+'"]').remove();   
            $.ajax({
                url: $url,
                data: {user_id: data_user_id},
                method : 'PUT',
                success: function(resp){
                    $loader.hide();
                    App.alert({ message: resp.message });
                    window.location.href = window.location.origin+'/staff';
                }
            });
        })
      } else {
        swal("Cancelled", "Cancelled :)", "error");
      }
    });
});
/* Show Users
* Edit Users
*/
jQuery("#sample_1").delegate(".ShowEditUser", "click", function(e) {
//$('.ShowEditUser').click(function(e){
    e.preventDefault();
    var $button = $(this);
    $user_id = $(this).attr('data-user-id');
    $modal_id = $(this).attr('data-modal');
    $method = $(this).attr('data-method');
    $button_icon = $(this).attr('data-button-icon');
    $button_name = $(this).attr('data-name');
    $url = window.location.origin+'/users/'+$user_id;

    $button.prop('disabled', true);
    $button.html('<i class="fa '+$button_icon+'"></i> '+$button_name);
    $loader.show();

    $.ajax({
        url: $url,
        method : $method,
        success: function(resp){
            var data = JSON.parse(resp);
            $button.prop('disabled', false);
            $button.html('<i class="fa '+$button_icon+'"></i> '+$button_name);
            $loader.hide();
            jQuery("#"+$modal_id+ " [name='id']").val(data.id);
            jQuery("#"+$modal_id+ " [name='first_name']").val(data.first_name);
            jQuery("#"+$modal_id+ " [name='last_name']").val(data.last_name);
            jQuery("#"+$modal_id+ " [name='email']").val(data.email);
            jQuery("#"+$modal_id+ " [name='dob']").val(data.dob);
            jQuery("#"+$modal_id+ " [name='status']").val(data.status);
        },
        complete:function(){
            jQuery("#"+$modal_id).modal("show");
        }
    });

});
jQuery("#sample_1").delegate(".ShowEditStaff", "click", function(e) {
//$('.ShowEditUser').click(function(e){
    e.preventDefault();
    var $button = $(this);
    $user_id = $(this).attr('data-user-id');
    $modal_id = $(this).attr('data-modal');
    $method = $(this).attr('data-method');
    $button_icon = $(this).attr('data-button-icon');
    $button_name = $(this).attr('data-name');
    $url = window.location.origin+'/staff/'+$user_id+'/edit';
    $button.prop('disabled', true);
    $button.html('<i class="fa '+$button_icon+'"></i> '+$button_name);
    $loader.show();

    $.ajax({
        url: $url,
        method : $method,
        success: function(resp){
            var data = JSON.parse(resp);
            $button.prop('disabled', false);
            $button.html('<i class="fa '+$button_icon+'"></i> '+$button_name);
            $loader.hide();
            jQuery("#"+$modal_id+ " [name='id']").val(data.id);
            jQuery("#"+$modal_id+ " [name='first_name']").val(data.first_name);
            jQuery("#"+$modal_id+ " [name='last_name']").val(data.last_name);
            jQuery("#"+$modal_id+ " [name='email']").val(data.email);        
            jQuery("#"+$modal_id+ " [name='status']").val(data.status);
        },
        complete:function(){
            jQuery("#"+$modal_id).modal("show");
        }
    });

});

/*
* Users Group
* Add Users Method: POST
*/
//jQuery("#sample_1").delegate("#user-submit-form", "click", function(e) {
$('#user-submit-form').click(function(e){
    e.preventDefault();

    var $button = $(this);
    var $method = $(this).attr('data-method');
    $url = window.location.origin+'/users';

    var form = $('#UserForm');
    var error = $('.modal-body .alert-danger');
    var success = $('.modal-body .alert-success');

    form.validate({
        doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        rules: {
            first_name: {
                minlength: 3,
                required: true
            },
            email: {
                required: true,
                email: true
            },
            dob: {
                required: true
            },
            password: {
                minlength: 8,
                pwcheck: true,
                required: true
            },
            rpassword: {
                minlength: 8,
                required: true,
                equalTo: "#password_strength"
            },
            status: {
                required: true
            }            
        },
        messages: {
            password: {
                pwcheck: "Password must contain uppercase lowercase numeric & special character."
             
            }
        },
        invalidHandler: function (event, validator) { //display error alert on form submit   
            success.hide();
            error.show();
            App.scrollTo(error, -200);
        },

        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function (label) {
            label.addClass('valid') // mark the current input as valid and display OK icon
            .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
        },

        submitHandler: function (form) {
            success.show();
            error.hide();
            $button.prop('disabled', true);
            $button.html('Submit..');
            $loader.show();
            $userdata = $('#UserForm').serialize();
            //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
            $.ajax({
                url: $url,
                data: $userdata,
                method : $method,
                success: function(resp){
                    window.location.href = window.location.origin+'/users';
                }
            });
        }

    });
    $.validator.addMethod("pwcheck", function(value) {
       return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
           && /[a-z]/.test(value) // has a lowercase letter
           && /\d/.test(value) // has a digit
    });
    form.submit();

});
$('#staff-submit-form').click(function(e){
    e.preventDefault();

    var $button = $(this);
    var $method = $(this).attr('data-method');
    $url = window.location.origin+'/staff';

    var form = $('#UserForm');
    var error = $('.modal-body .alert-danger');
    var success = $('.modal-body .alert-success');

    form.validate({
        doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        rules: {
            first_name: {
                minlength: 3,
                required: true
            },
            email: {
                required: true,
                email: true
            },                      
            status: {
                required: true
            }            
        },
         invalidHandler: function (event, validator) { //display error alert on form submit   
            success.hide();
            error.show();
            App.scrollTo(error, -200);
        },

        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function (label) {
            label.addClass('valid') // mark the current input as valid and display OK icon
            .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
        },

        submitHandler: function (form) {
            success.show();
            error.hide();
            $button.prop('disabled', true);
            $button.html('Submit..');
            $loader.show();
            $userdata = $('#UserForm').serialize();
            //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
            $.ajax({
                url: $url,
                data: $userdata,
                method : $method,
                success: function(resp){
                    console.log($url+$method);
                    window.location.href = window.location.origin+'/staff';
                }
            });
        }

    });
       form.submit();

});

/*
* user manager
* Add User Method: PUT
*/
jQuery("#editUser").delegate("#user-update-form", "click", function(e) {
//$('#user-update-form').click(function(e){
    e.preventDefault();

    var $button = $(this);
    var $method = $(this).attr('data-method');
    $url = window.location.origin+'/users/'+$('#user_id').val();

    var form = $('#user_update');
    var error = $('.form-body .alert-danger');
    var success = $('.form-body .alert-success');

    if(jQuery("#submit_password").val().length >= 1 ){
        form.validate({
            doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                first_name: {
                    minlength: 3,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                dob: {
                    required: true
                },
                password: {
                    minlength: 8,
                    pwcheck: true,
                    required: true
                },
                rpassword: {
                    minlength: 8,
                    required: true,
                    equalTo: "#submit_password"
                },
                status: {
                    required: true
                }            
            },
            messages: {
                password: {
                    pwcheck: "Password must contain uppercase lowercase numeric & special character."
                 
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit   
                success.hide();
                error.show();
                App.scrollTo(error, -200);
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label.addClass('valid') // mark the current input as valid and display OK icon
                .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
            },

            submitHandler: function (form) {
                success.show();
                error.hide();
                $button.prop('disabled', true);
                $button.html('Submit..');
                $loader.show();
                $userdata = $('#user_update').serialize();
                //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                $.ajax({
                    url: $url,
                    data: $userdata,
                    method : $method,
                    success: function(resp){
                        $button.prop('disabled', false);
                        $button.html('Update User');
                        $loader.hide();
                        //document.getElementById("BeaconForm").reset();
                        App.alert({ message: resp.message });
                        success.hide();
                        jQuery('#editUser').modal('hide');
                        window.location.href = window.location.origin+'/users';
                    }
                });
            }

        });
        $.validator.addMethod("pwcheck", function(value) {
           return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
               && /[a-z]/.test(value) // has a lowercase letter
               && /\d/.test(value) // has a digit
        });
    } else {
        form.validate({
            doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                first_name: {
                    minlength: 3,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                status: {
                    required: true
                }            
            },

            invalidHandler: function (event, validator) { //display error alert on form submit   
                success.hide();
                error.show();
                App.scrollTo(error, -200);
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label.addClass('valid') // mark the current input as valid and display OK icon
                .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
            },

            submitHandler: function (form) {
                success.show();
                error.hide();
                $button.prop('disabled', true);
                $button.html('Submit..');
                $loader.show();
                $userdata = $('#user_update').serialize();
                //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                $.ajax({
                    url: $url,
                    data: $userdata,
                    method : $method,
                    success: function(resp){
                        $button.prop('disabled', false);
                        $button.html('Update User');
                        $loader.hide();
                        //document.getElementById("BeaconForm").reset();
                        App.alert({ message: resp.message });
                        success.hide();
                        jQuery('#editUser').modal('hide');
                        window.location.href = window.location.origin+'/users';
                    }
                });
            }

        });
    }

    form.submit();

});
jQuery("#editUser").delegate("#staff-update-form", "click", function(e) {
//$('#user-update-form').click(function(e){
    e.preventDefault();

    var $button = $(this);
    var $method = $(this).attr('data-method');
    $url = window.location.origin+'/staff/'+$('#user_id').val();

    var form = $('#user_update');
    var error = $('.form-body .alert-danger');
    var success = $('.form-body .alert-success');

        form.validate({
            doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                first_name: {
                    minlength: 3,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                status: {
                    required: true
                }            
            },

            invalidHandler: function (event, validator) { //display error alert on form submit   
                success.hide();
                error.show();
                App.scrollTo(error, -200);
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label.addClass('valid') // mark the current input as valid and display OK icon
                .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
            },

            submitHandler: function (form) {
                success.show();
                error.hide();
                $button.prop('disabled', true);
                $button.html('Submit..');
                $loader.show();
                $userdata = $('#user_update').serialize();
                //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                $.ajax({
                    url: $url,
                    data: $userdata,
                    method : $method,
                    success: function(resp){
                        $button.prop('disabled', false);
                        $button.html('Update User');
                        $loader.hide();
                        //document.getElementById("BeaconForm").reset();
                        console.log($userdata);
                        App.alert({ message: resp.message });
                        success.hide();
                        jQuery('#editUser').modal('hide');
                       window.location.href = window.location.origin+'/staff';
                    }
                });
            }

        });
    

    form.submit();

});


/*WISH MANAGER*/

/*
* bulk delete wishes
*/

jQuery('.delete-button').click(function(e){
    e.preventDefault();
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover these Wishes!",
      type: "warning",
      showCancelButton: true,

      confirmButtonClass: 'btn-danger',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if(isConfirm) {
        swal("Deleted!", "Wishes has been deleted.", "success");
        jQuery('.wishes-table tbody tr.active').each(function(){
            var data_wish_id = jQuery(this).attr('row-id');
            $url = window.location.origin+'/wishes/'+data_wish_id;
            $loader.show();
            var $wishid = data_wish_id; 
            $('tr[row-id="'+$wishid+'"]').remove();   
            $.ajax({
                url: $url,
                data: {wish_id: data_wish_id},
                method : 'DELETE',
                success: function(resp){
                    $loader.hide();
                    App.alert({ message: resp.message });
                    window.location.href = window.location.origin+'/wishes';
                }
            });
        })
      } else {
        swal("Cancelled", "Cancelled :)", "error");
      }
    });
});
jQuery('.delete-button-pages').click(function(e){
    e.preventDefault();
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover these pages!",
      type: "warning",
      showCancelButton: true,

      confirmButtonClass: 'btn-danger',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if(isConfirm) {
        swal("Deleted!", "Pages has been deleted.", "success");
        jQuery('.wishes-table tbody tr.active').each(function(){
            var data_wish_id = jQuery(this).attr('row-id');
            $url = window.location.origin+'/mathematics/'+data_wish_id;
            $loader.show();
            var $wishid = data_wish_id; 
            $('tr[row-id="'+$wishid+'"]').remove();   
            $.ajax({
                url: $url,
                data: {wish_id: data_wish_id},
                method : 'DELETE',
                success: function(resp){
                    $loader.hide();
                    App.alert({ message: resp.message });
                    window.location.href = window.location.origin+'/mathematics';
                }
            });
        })
      } else {
        swal("Cancelled", "Cancelled :)", "error");
      }
    });
});

/*
* bulk deactivate wishes
*/

jQuery('.deactivate-button').click(function(e){
    e.preventDefault();
    swal({
      title: "Are you sure?",
      text: "You want to deactivate these wishes Wishes!",
      type: "warning",
      showCancelButton: true,

      confirmButtonClass: 'btn-danger',
      confirmButtonText: 'Yes, Deactivate it!',
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if(isConfirm) {
        swal("Deactivated!", "Wishes has been Deactivated.", "success");
        jQuery('.wishes-table tbody tr.active').each(function(){
            var data_wish_id = jQuery(this).attr('row-id');
            $url = window.location.origin+'/wishes/wish_deactivate/'+data_wish_id;
            $loader.show();
            var $wishid = data_wish_id; 
            //$('tr[row-id="'+$wishid+'"]').remove();   
            $.ajax({
                url: $url,
                data: {wish_id: data_wish_id},
                method : 'PUT',
                success: function(resp){
                    $loader.hide();
                    App.alert({ message: resp.message });
                    window.location.href = window.location.origin+'/wishes';
                }
            });
        })
      } else {
        swal("Cancelled", "Cancelled :)", "error");
      }
    });
});

/*
* Edit Wish
*/
jQuery( "#sample_1" ).delegate( ".ShowEditWish", "click", function(e) {
    e.preventDefault();

    var $button = $(this);
    $wish_id = $(this).attr('data-wish-id');
    $modal_id = $(this).attr('data-modal');
    $method = $(this).attr('data-method');
    $button_icon = $(this).attr('data-button-icon');
    $button_name = $(this).attr('data-name');
    $url = window.location.origin+'/wishes/'+$wish_id;

    $button.prop('disabled', true);
    $button.html('<i class="fa '+$button_icon+'"></i> '+$button_name);
    $loader.show();

    $.ajax({
        url: $url,
        method : $method,
        success: function(resp){
            var data = JSON.parse(resp);
            $button.prop('disabled', false);
            $button.html('<i class="fa '+$button_icon+'"></i> '+$button_name);
            $loader.hide();
            jQuery("#"+$modal_id+ " [name='wish_id']").val(data.id);
            jQuery("#"+$modal_id+ " [name='user_id']").val(data.user_id);
            jQuery("#"+$modal_id+ " [name='title']").val($.parseHTML( data.title )[0].textContent);
            jQuery("#"+$modal_id+ " [name='description']").val($.parseHTML( data.description )[0].textContent);
            jQuery("#"+$modal_id+ " [name='is_fullfill']").val(data.is_fullfill);
            jQuery("#"+$modal_id+ " [name='status']").val(data.status);
            jQuery("#"+$modal_id+ " [name='wish_image']").val(data.picture);
            if(data.picture){
                jQuery(".wish_picture").show()
                jQuery(".wish_picture").attr('src',data.picture);
            } else {
                jQuery(".wish_picture").hide();
            }
        },
        complete:function(){
            jQuery("#"+$modal_id).modal("show");
        }
    });

});
jQuery( "#sample_1" ).delegate( ".ShowEditPage", "click", function(e) {
    e.preventDefault();

    var $button = $(this);
    $wish_id = $(this).attr('data-wish-id');
    $modal_id = $(this).attr('data-modal');
    $method = $(this).attr('data-method');
    $button_icon = $(this).attr('data-button-icon');
    $button_name = $(this).attr('data-name');
    $url = window.location.origin+'/mathematics/'+$wish_id;

    $button.prop('disabled', true);
    $button.html('<i class="fa '+$button_icon+'"></i> '+$button_name);
    $loader.show();

    $.ajax({
        url: $url,
        method : $method,
        success: function(resp){
            var data = JSON.parse(resp);
            $button.prop('disabled', false);
            $button.html('<i class="fa '+$button_icon+'"></i> '+$button_name);
            $loader.hide();
            jQuery("#"+$modal_id+ " [name='page_id']").val(data.id);
            jQuery("#"+$modal_id+ " [name='title']").val($.parseHTML( data.title )[0].textContent);
            jQuery("#"+$modal_id+ " [name='description']").val($.parseHTML( data.description )[0].textContent);
            jQuery("#"+$modal_id+ " [name='is_fullfill']").val(data.is_fullfill);
            jQuery("#"+$modal_id+ " [name='chapter']").val(data.chapter);
            jQuery("#"+$modal_id+ " [name='day']").val(data.day);
            jQuery("#"+$modal_id+ " [name='class']").val(data.class);
            jQuery("#"+$modal_id+ " [name='medium']").val(data.medium);   
        },
        complete:function(){
            jQuery("#"+$modal_id).modal("show");
        }
    });

});

/*
* Wishes Group
* Add Wishes Method: POST
*/
jQuery("#wish-submit-form").click(function(e){
    e.preventDefault();

    var $button = $(this);
    var $method = $(this).attr('data-method');
    $url = window.location.origin+'/wishes';

    var form = $('#WishForm');
    var error = $('.modal-body .alert-danger');
    var success = $('.modal-body .alert-success');

    form.validate({
        doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        rules: {
            user_id: {
                required: true,
            },
            title: {
                minlength: 3,
                required: true
            },
            description: {
                required: true,
            },
            status: {
                required: true
            }            
        },

        invalidHandler: function (event, validator) { //display error alert on form submit   
            success.hide();
            error.show();
            App.scrollTo(error, -200);
        },

        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function (label) {
            label.addClass('valid') // mark the current input as valid and display OK icon
            .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
        },

        submitHandler: function (form) {
            success.show();
            error.hide();
            $button.prop('disabled', true);
            $button.html('Submit..');
            $loader.show();
            $userdata = $('#WishForm').serialize();
            //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
            $.ajax({
                url: $url,
                data: $userdata,
                method : $method,
                success: function(resp){
                    //console.log(resp);
                    window.location.href = window.location.origin+'/wishes';
                }
            });
        }

    });

    form.submit();

});

/*
* wish manager
* Add Wish Method: PUT
*/
jQuery("#editWish").delegate("#wish-update-form", "click", function(e) {
//$('#wish-update-form').click(function(e){
    e.preventDefault();

    var $button = $(this);
    var $method = $(this).attr('data-method');
    $url = window.location.origin+'/wishes/'+$('#wish_id').val();

    var form = $('#wish_update');
    var error = $('.form-body .alert-danger');
    var success = $('.form-body .alert-success');

    form.validate({
        doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        rules: {
            user_id: {
                required: true,
            },
            title: {
                minlength: 3,
                required: true
            },
            description: {
                required: true,
            },
            status: {
                required: true
            }             
        },

        invalidHandler: function (event, validator) { //display error alert on form submit   
            success.hide();
            error.show();
            App.scrollTo(error, -200);
        },

        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function (label) {
            label.addClass('valid') // mark the current input as valid and display OK icon
            .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
        },

        submitHandler: function (form) {
            success.show();
            error.hide();
            $button.prop('disabled', true);
            $button.html('Submit..');
            $loader.show();
            $userdata = $('#wish_update').serialize();
            //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
            $.ajax({
                url: $url,
                data: $userdata,
                method : $method,
                success: function(resp){
                    $button.prop('disabled', false);
                    $button.html('Update Wish');
                    $loader.hide();
                    //document.getElementById("BeaconForm").reset();
                    App.alert({ message: resp.message });
                    success.hide();
                    jQuery('#editWish').modal('hide');
                    window.location.href = window.location.origin+'/wishes';
                }
            });
        }

    });

    form.submit();

});
jQuery("#editWish").delegate("#page-update-form", "click", function(e) {
//$('#wish-update-form').click(function(e){
    e.preventDefault();

    var $button = $(this);
    var $method = $(this).attr('data-method');
    $url = window.location.origin+'/mathematics/'+$('#wish_id').val();

    var form = $('#wish_update');
    var error = $('.form-body .alert-danger');
    var success = $('.form-body .alert-success');

    form.validate({
        doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        rules: {
                       title: {
                minlength: 3,
                required: true
            },
            description: {
                required: true,
            }             
        },

        invalidHandler: function (event, validator) { //display error alert on form submit   
            success.hide();
            error.show();
            App.scrollTo(error, -200);
        },

        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function (label) {
            label.addClass('valid') // mark the current input as valid and display OK icon
            .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
        },

        submitHandler: function (form) {
            success.show();
            error.hide();
            $button.prop('disabled', true);
            $button.html('Submit..');
            $loader.show();
            $userdata = $('#wish_update').serialize();
            //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
            $.ajax({
                url: $url,
                data: $userdata,
                method : $method,
                success: function(resp){
                    $button.prop('disabled', false);
                    $button.html('Update Wish');
                    $loader.hide();
                    //document.getElementById("BeaconForm").reset();
                    App.alert({ message: resp.message });
                    success.hide();
                    jQuery('#editWish').modal('hide');
                    window.location.href = window.location.origin+'/mathematics';
                }
            });
        }

    });

    form.submit();

});

jQuery("#sample_1").delegate(".button-wish-delete", "click", function(e) {
    e.preventDefault();
    var userButton = jQuery(this);
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this Wish!",
      type: "warning",
      showCancelButton: true,

      confirmButtonClass: 'btn-danger',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if(isConfirm) {
        swal("Deleted!", "Wish has been deleted.", "success");
        var data_wish_id = userButton.attr("data-wish-id");
        var $button = $(".button-wish-delete");
        var $method = $(".button-wish-delete").attr('data-method');
        $url = window.location.origin+'/wishes/'+data_wish_id;
        $button.prop('disabled', true);

        $loader.show();
        var $wishid = data_wish_id; 
        $('tr[row-id="'+$wishid+'"]').remove();   
        $.ajax({
            url: $url,
            data: {wish_id: data_wish_id},
            method : $method,
            success: function(resp){
                $button.prop('disabled', false);
                $loader.hide();
                App.alert({ message: resp.message });
            }
        });
      } else {
        swal("Cancelled", "Cancelled :)", "error");
      }
    });

});

/*Messages*/
jQuery("#sample_1").delegate(".openMessages", "click", function(e) {
//$('.ShowEditUser').click(function(e){
    e.preventDefault();
    $("#Messages ul").html('')
    localStorage.setItem('sender_id', jQuery(this).attr('data-sender-id'))
    var control = "";
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "http://api.wishtru.com/webservices/initial_chat",
        "method": "POST",
        "headers": {
            "content-type": "application/x-www-form-urlencoded",
            "cache-control": "no-cache",
            "postman-token": "52630ecc-06ee-b8c0-5c54-a945b9accdc0"
        },
        "data": {
            "sender_id": jQuery(this).attr('data-sender-id'),
            "chat_wish_id": jQuery(this).attr('data-wish-id'),
            "receiver_id": jQuery(this).attr('data-receiver-id')
        }
    }
    $.ajax(settings).done(function (response) {
        var data = JSON.parse(response);
        if (data.status == "success") {
          for (var i = 0; i < data.data.length; i++) {
            if(data.data[i].sender_id == localStorage.getItem('sender_id')){
                control = '<li style="width:100%">' +
                        '<div class="msj macro">' +
                    '<div class="avatar"><img class="img-circle" style="width:100%;" src="'+ data.data[i].message_sent[0].picture +'" /></div>' +
                        '<div class="text text-l">' +
                            '<p>'+data.data[i].message_sent[0].first_name+ ' : ' + data.data[i].message +'</p>' +
                            '<p><small>'+ data.data[i].created_at +'</small></p>' +
                        '</div>' +
                    '</div>' +
                '</li>';
                $("#Messages ul").append(control)
            } else {
                control = '<li style="width:100%;">' +
                    '<div class="msj-rta macro">' +
                        '<div class="text text-r">' +
                            '<p>'+data.data[i].message_sent[0].first_name+ ' : ' + data.data[i].message +'</p>' +
                            '<p><small>'+ data.data[i].created_at +'</small></p>' +
                        '</div>' +
                    '<div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:100%;" src="'+ data.data[i].message_sent[0].picture +'" /></div>' +                                
                '</li>';
                $("#Messages ul").append(control)
            }
          }
        }
    });

    jQuery("#Messages").modal("show");

});

jQuery("#sample_1").delegate(".button-message-delete", "click", function(e) {
    e.preventDefault();
    var userButton = jQuery(this);
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover these Messages!",
      type: "warning",
      showCancelButton: true,

      confirmButtonClass: 'btn-danger',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if(isConfirm) {
        swal("Deleted!", "Messages has been deleted.", "success");
        var data_message_id = userButton.attr("data-message-id");
        var $button = $(".button-message-delete");
        var $method = $(".button-message-delete").attr('data-method');
        $url = window.location.origin+'/messages/'+data_message_id;
        $button.prop('disabled', true);

        $loader.show();
        var $id = data_message_id; 
        $('tr[row-id="'+$id+'"]').remove();   
        $.ajax({
            url: $url,
            data: {message_id: data_message_id},
            method : $method,
            success: function(resp){
                $button.prop('disabled', false);
                $loader.hide();
                App.alert({ message: resp.message });
                window.location.href = window.location.origin+'/messages';
            }
        });
      } else {
        swal("Cancelled", "Cancelled :)", "error");
      }
    });

});

});

/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = 'http://api.wishtru.com/server/php/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            // Store image value
            localStorage.setItem("user_picture", data.result.files[0].url);
            //update user image
            jQuery("#user_picture").attr("src", data.result.files[0].url);
            jQuery(".profile-user-picture").attr("src", data.result.files[0].url);
            //add up the url value in hidden under picture form
            jQuery("#picture").val(data.result.files[0].url);
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});

/*
* Wish Management
*/
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = 'http://abhyas.retouchingwork.org/server/php/';
    var flag = 0;
    $('#wishfileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            //update user image
            setTimeout(function(){ 
                jQuery.LoadingOverlay("hide"); 
                flag = 0; 
            },3000)
            jQuery("#wishPicture").val(data.result.files[0].url);
            jQuery('#target, .jcrop-holder img').attr('src',data.result.files[0].url);
            $('#target').Jcrop({
              aspectRatio: 600 / 326,
              onSelect: updateCoords,
              setSelect: [ 0, 0, 400, 326 ],
              allowSelect: false,
              allowResize: false
            },function(){
            });
            jQuery('#full').modal('show')
            $('#full').on('show', function () {
               $(this).find('.modal-body').css({
                  width:'auto', //probably not needed
                  height:'auto', //probably not needed 
                  'max-height':'100%'
               });
            });
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
            });
        },
        progressall: function (e, data) {
            //e.preventDefault()
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
            if(flag == 0){
                jQuery.LoadingOverlay("show");
            }
            flag = 1;
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
 
 $(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = 'http://abhyas.retouchingwork.org/server/php/';
    var flag = 0;
    $('#pagefileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            //update user image
            setTimeout(function(){ 
                jQuery.LoadingOverlay("hide"); 
                flag = 0; 
            },3000)
            jQuery("#pageFile").val(data.result.files[0].url);
            jQuery('#target, .jcrop-holder img').attr('src',data.result.files[0].url);
            $('#target').Jcrop({
              aspectRatio: 600 / 326,
              onSelect: updateCoords,
              setSelect: [ 0, 0, 400, 326 ],
              allowSelect: false,
              allowResize: false
            },function(){
            });
            jQuery('#full').modal('show')
            $('#full').on('show', function () {
               $(this).find('.modal-body').css({
                  width:'auto', //probably not needed
                  height:'auto', //probably not needed 
                  'max-height':'100%'
               });
            });
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
            });
        },
        progressall: function (e, data) {
            //e.preventDefault()
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
            if(flag == 0){
                jQuery.LoadingOverlay("show");
            }
            flag = 1;
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});

/*
* Wish edit Management
*/
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = 'http://api.wishtru.com/server/php/';
    var flag = 0;
    $('#wisheditfileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            //update user image
            setTimeout(function(){ 
                jQuery.LoadingOverlay("hide"); 
                flag = 0; 
            },3000)
            jQuery("#wishEditPicture").val(data.result.files[0].url);
            jQuery('#target, .jcrop-holder img, #editWish img.wish_picture').attr('src',data.result.files[0].url);
            $('#target').Jcrop({
              aspectRatio: 600 / 326,
              onSelect: updateEditCoords,
              setSelect: [ 0, 0, 400, 326 ],
              allowSelect: false,
              allowResize: false
            },function(){
            });
            jQuery('#full').modal('show')
            $('#full').on('show', function () {
               $(this).find('.modal-body').css({
                  width:'auto', //probably not needed
                  height:'auto', //probably not needed 
                  'max-height':'100%'
               });
            });
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
            });
        },
        progressall: function (e, data) {
            //e.preventDefault()
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
            if(flag == 0){
                jQuery.LoadingOverlay("show");
            }
            flag = 1;
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});

function validatePassword(password) {
    var errors = '';
    if (password.length < 8) {
        errors = "Your password must be at least 8 characters"; 
    }
    if (password.match(/[A-z]/) == null) {
        errors = "Your password must contain at least one letter.";
    }
    if (password.match(/[A-Z]/) == null) {
        errors = "Your password must contain at least one letter.";
    }
    if (password.match(/\d/) == null) {
        errors = "Your password must contain at least one digit."; 
    }
    if (errors.length > 0) {
        alert(errors);
        return false;
    }
    return true;
}

function updateCoords(c)
{
  $('#crop_x').val(c.x);
  $('#crop_y').val(c.y);
  $('#crop_w').val(c.w);
  $('#crop_h').val(c.h);
};
function updateEditCoords(c)
{
  $('#edit_x').val(c.x);
  $('#edit_y').val(c.y);
  $('#edit_w').val(c.w);
  $('#edit_h').val(c.h);
};

function activateAccount(button){
    setTimeout(function(){
        jQuery(".mt-step-col.last").addClass('done')
    },3000)
    $url = window.location.origin+'/activate/'+jQuery(button).attr('data-id');
    $.ajax({
        url: $url,
        data: {action: 'confirm', confirm: 1, user_id: jQuery(button).attr('data-id')},
        method : "PUT",
        success: function(resp){
            window.location.reload();
        }
    });
}

function zoomPlus(){
    jQuery("#full .jcrop-holder").find('img').width(jQuery("#full .jcrop-holder img").width()*1.2)
    jQuery("#full .jcrop-holder").find('img').height(jQuery("#full .jcrop-holder img").height()*1.2)
}

function zoomMinus(){
    jQuery("#full .jcrop-holder").find('img').width(jQuery("#full .jcrop-holder img").width()/1.2)
    jQuery("#full .jcrop-holder").find('img').height(jQuery("#full .jcrop-holder img").height()/1.2)
}
jQuery("#pageSubmit").click(function(e){
    //e.preventDefault();

    var form = $('#frm_id');
    var error = $('.alert-danger');
    var success = $('.alert-success');


    form.validate({
        doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        rules: {
                       title: {
                minlength: 3,
                required: true
            },
            description: {
                required: true,
            }  ,
            name: {
                required: true,
            } ,
            chapter: {
                required: true,
            },
             day: {
                required: true,
            }
                        
        },

        invalidHandler: function (event, validator) { //display error alert on form submit   
            success.hide();
            error.show();
            App.scrollTo(error, -200);
        },

        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function (label) {
            label.addClass('valid') // mark the current input as valid and display OK icon
            .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
        },

        submitHandler: function (form) {
            success.show();
            error.hide(); 
            form.submit()
            //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
        }

    });
 /*   
  $('#pagefileupload').rules('add', {
        required: true,
        accept: "application/pdf"
    });*/


  form.submit();

    });


