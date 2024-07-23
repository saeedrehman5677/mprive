/*==============================================================*/
// Contact Form JS
/*==============================================================*/
(function ($) {
    "use strict"; // Start of use strict
    $("#contactForm").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "Did you fill in the form properly?");
        } else {
            // everything looks good!
            event.preventDefault();
            submitForm();
        }
    });


    function submitForm(){
        // Initiate Variables With Form Content
        var name = $("#name").val();
        var email = $("#email").val();
        var msg_subject = $("#msg_subject").val();
        var phone_number = $("#phone_number").val();
        var message = $("#message").val();
        var spinner = $("#spinner");
        spinner.show();
        $('#btnSubmit').attr('disabled' , true);
        $.ajax({
            type: "POST",
            url: "../api/contact/store",
            data: "full_name=" + name + "&email=" + email + "&phone=" + msg_subject + "&message=" + message + "&property=" + "marina views",
            success : function(response){
                $('#btnSubmit').attr('disabled' , false)
                spinner.hide();
                if (response.status == "success"){
                    formSuccess();
                } else {
                    formError();
                    submitMSG(false,"Please Input All the fields Correctly");
                }
            }
        });
    }

    function formSuccess(){
        $("#contactForm")[0].reset();
        submitMSG(true, "Thank You For Contacting Out Team will get Back to you as soon as Possible")
    }

    function formError(){
        $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(this).removeClass();
        });
    }

    function submitMSG(valid, msg){
        if(valid){
            var msgClasses = "h4 text-left tada animated text-success";
        } else {
            var msgClasses = "h4 text-left text-danger";
        }
        $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
    }
}(jQuery)); // End of use strict
