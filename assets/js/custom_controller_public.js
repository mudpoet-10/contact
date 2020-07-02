/* register user */
function register_user() {
  $(document).on("click", "#btn-register", function (e) {
    e.preventDefault();

    var name = $("#name").val();
    var email = $("#email").val();
    var company = $("#company").val();
    var password = $("#password").val();
    var phone = $("#phone").val();
    var confirm_password = $("#confirmPassword").val();

    if (password != confirm_password) {
      Swal({
        title: "Warning!",
        text: "Password and Confirm Password dint Match!",
        type: "warning",
        confirmButtonText: "OK",
        closeOnConfirm: false,
      });
    } else {
      if (email != "" && password != "" && name != "" &&  company != "" && confirm_password != "" && phone != "") {
        var fields = {
          register_user: "register_user",
          name: name,
          email: email,
          company: company,
          password: password,
          confirm_password: confirm_password,
          phone: phone,
        };
 
        jQuery.ajax({
          url: base_url + "controller/register",
          type: "POST",
          dataType: "JSON",
          data: fields,
          success: function (data) {
            if (data.success == true) {
              Swal({
                title: "Success!",
                text: "Register Successfully.",
                type: "success",
                confirmButtonText: "OK",
                closeOnConfirm: false,
              }).then((result) => {
                if (result.value) {
                  window.location.href = base_url + "home";
                }
              });
            } else {
              Swal({
                title: "Error!",
                text: "Email is Already Taken",
                type: "error",
                confirmButtonText: "OK",
                closeOnConfirm: false,
              }).then((result) => {
                if (result.value) {
                  // location.reload();
                }
              });
            }
          },
        });
      } else {
        Swal({
          title: "Warning!",
          text: "Please fill in the selected inputs.",
          type: "warning",
          confirmButtonText: "OK",
          closeOnConfirm: false,
        });
      }
    }
  });
}
/* end of register user */

/* select user */
function login_user(){
  $(document).on("click","#btn-login",function(e) { 
     e.preventDefault();

     var email = $("#email").val();
     var password = $("#password").val();

     if(email!="" && password!=""){

         var fields = {
             login_user:"login_user",
             email:email, 
             password:password
         };

         jQuery.ajax({
             url : base_url+"controller/login",
             type : "POST",
             dataType : "JSON",
             data : fields,
             success : function(data){
                 if(data.success == true){
                     Swal({ 
                         title: "Success!",
                         text: "Login Successfully.",
                         type: "success",
                         confirmButtonText: "OK",
                         closeOnConfirm: false
                     }).then((result) => {
                         if (result.value) {
                             window.location.href = base_url+"home";
                         }
                     })

                 }else{
                     Swal({
                         title: "Error!",
                         text: "Login Failed.",
                         type: "error",
                         confirmButtonText: "OK",
                         closeOnConfirm: false
                     }).then((result) => {
                         if (result.value) {
                             location.reload();
                         }
                     })
                 }
             }
         });

     }else{
         Swal({
             title: "Warning!",
             text: "Please fill in the selected inputs.",
             type: "warning",
             confirmButtonText: "OK",
             closeOnConfirm: false
         })
     }
 });
}

/* end of select user */

/* update user */
function update_user(){ 
  $(document).on("click","#btn-update",function(e) { 
     e.preventDefault();

    var name = $("#name").val();
    var email = $("#email").val();
    var company = $("#company").val();
    var password = $("#password").val();
    var phone = $("#phone").val();
    var uID=$("#uID").val();

     if(email!="" && password!="" && name!="" && company!="" && phone!=""){

         var fields = {
             update_user:"update_user",
             name: name,
             email: email,
             company: company,
             phone: phone,
             password: password,
             uID: uID,
         };

         jQuery.ajax({
             url : base_url+"controller/update",
             type : "POST",
             dataType : "JSON",
             data : fields,
             success : function(data){
                 if(data.success == true){
                     Swal({ 
                         title: "Success!",
                         text: "Updated Successfully.",
                         type: "success",
                         confirmButtonText: "OK",
                         closeOnConfirm: false
                     }).then((result) => {
                         if (result.value) {
                             window.location.href = base_url+"update";
                         }
                     })

                 }else{
                     Swal({
                         title: "Error!",
                         text: "Update Failed(Wrong Password!)",
                         type: "error",
                         confirmButtonText: "OK",
                         closeOnConfirm: false
                     }).then((result) => {
                         if (result.value) {
                             location.reload();
                         }
                     })
                 }
             }
         });

     }else{
         Swal({
             title: "Warning!",
             text: "Please fill in the selected inputs.",
             type: "warning",
             confirmButtonText: "OK",
             closeOnConfirm: false
         })
     }
 });
}
/* end of update user */


/* update user listing */
function update_user_listing(){ 
  $(document).on("click","#btn-listing",function(e) { 
     e.preventDefault();

     var user_id = $(this).attr("user-id");
     var name=$("#name_"+user_id).val();
     var email=$("#email_"+user_id).val();
     var company=$("#company_"+user_id).val();
     var phone=$("#phone_"+user_id).val();
     var uID=$("#uID_"+user_id).val();

     if(email!="" && name!="" && company!="" && phone!=""){

         var fields = {
             update_user_listing:"update_user_listing",
             name: name,
             email: email,
             company: company,
             phone: phone,
             uID: uID,
         }; 

         jQuery.ajax({
          url: base_url + "controller/user-listing",
             type : "POST",
             dataType : "JSON",
             data : fields,
             success : function(data){
                 if(data.success == true){
                     Swal({ 
                         title: "Success!",
                         text: "Updated Successfully.",
                         type: "success",
                         confirmButtonText: "OK",
                         closeOnConfirm: false
                     }).then((result) => {
                         if (result.value) {
                             window.location.href = base_url+"home";
                         }
                     })

                 }else{
                     Swal({
                         title: "Error!",
                         text: "Update Failed",
                         type: "error",
                         confirmButtonText: "OK",
                         closeOnConfirm: false
                     }).then((result) => {
                         if (result.value) {
                             location.reload();
                         }
                     })
                 }
             }
         });

     }else{
         Swal({
             title: "Warning!",
             text: "Please fill in the selected inputs.",
             type: "warning",
             confirmButtonText: "OK",
             closeOnConfirm: false
         })
     }
 });
}
/* end of update user listing */

/* delete user listing */
function delete_user(){ 
  $(document).on("click",".btn-delete",function(e) { 
     e.preventDefault();

     var btnDelete=$(this).val();

     if(btnDelete!=""){

         var fields = {
             delete_user: "delete_user",
             btnDelete: btnDelete
         };

         Swal.fire({
           title: 'Are you sure?',
           text: "You won't be able to revert this!",
           type: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
           if (result.value) {
                 jQuery.ajax({
                 url : base_url+"controller/user-delete",
                 type : "POST",
                 dataType : "JSON",
                 data : fields,
                 success : function(data){
                     Swal.fire({
                         title: "Deleted!",
                         text: "Account has been deleted.",
                         type: "success",
                         timer: 3000
                     }).then((result) => {
                       window.location.href = base_url+"home";
                     }) 
                 }, 
             });
           }
         })
          
     }else{
         Swal.fire({
             title: "Warning!",
             text: "Please fill in the selected inputs.",
             type: "warning",
             confirmButtonText: "OK",
             closeOnConfirm: false
         })
     }
 });
}
/* end of delete user listing */

/* add user listing */
function add_user() {
  $(document).on("click", "#btn-add-user", function (e) {
    e.preventDefault();

    var name = $("#name").val();
    var email = $("#email").val();
    var company = $("#company").val();
    var phone = $("#phone").val();
    var password = $("#password").val();
    var confirm_password = $("#confirmPassword").val();

    if (password != confirm_password) {
      Swal({
        title: "Warning!",
        text: "Password and Confirm Password dint Match!",
        type: "warning",
        confirmButtonText: "OK",
        closeOnConfirm: false,
      });
    } else {
      if (email != "" && password != "" && name != "" &&  company != "" &&  phone != "" && confirm_password != "") {
        var fields = {
          add_user: "add_user",
          name: name,
          email: email,
          phone: phone,
          company: company,
          password: password,
          confirm_password: confirm_password,
        };

        jQuery.ajax({
          url: base_url + "controller/add-user", 
          type: "POST",
          dataType: "JSON",
          data: fields,
          success: function (data) {
            if (data.success == true) {
              Swal({
                title: "Success!",
                text: "Added User.",
                type: "success",
                confirmButtonText: "OK",
                closeOnConfirm: false,
              }).then((result) => {
                if (result.value) {
                  window.location.href = base_url + "home";
                }
              });
            } else {
              Swal({
                title: "Error!",
                text: "Email is Already Taken",
                type: "error",
                confirmButtonText: "OK",
                closeOnConfirm: false,
              }).then((result) => {
                if (result.value) {
                  // location.reload();
                }
              });
            }
          },
        });
      } else {
        Swal({
          title: "Warning!",
          text: "Please fill in the selected inputs.",
          type: "warning",
          confirmButtonText: "OK",
          closeOnConfirm: false,
        });
      }
    }
  });
}
/* end of add user listing */

/* delete user account */
function delete_user_account(){ 
  $(document).on("click",".btn-delete-account",function(e) { 
     e.preventDefault();

     var btnDeleteAccount=$(this).val();

     if(btnDeleteAccount!=""){

         var fields = {
             delete_user_account: "delete_user_account",
             btnDeleteAccount: btnDeleteAccount
         };

         Swal.fire({
           title: 'Are you sure?',
           text: "You won't be able to revert this!",
           type: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
           if (result.value) {
                 jQuery.ajax({
                 url : base_url+"controller/account-delete",
                 type : "POST",
                 dataType : "JSON",
                 data : fields,
                 success : function(data){
                     Swal.fire({
                         title: "Deleted!",
                         text: "Your Account has been deleted.",
                         type: "success",
                         timer: 3000
                     }).then((result) => {
                       window.location.href = base_url+"logout";
                     }) 
                 }, 
             });
           }
         })
          
     }else{
         Swal.fire({
             title: "Warning!",
             text: "Please fill in the selected inputs.",
             type: "warning",
             confirmButtonText: "OK",
             closeOnConfirm: false
         })
     }
 });
}
/* end of delete user account */

jQuery(function () {
  register_user();
  login_user();
  update_user();
  update_user_listing();
  delete_user();
  add_user();
  delete_user_account();
});
