$(function() {

    $("#addEmpForm input,#addEmpForm textarea, #addEmpForm select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no").val();
			var first_name = $("input#first_name").val();
			var last_name = $("input#last_name").val();
            var username = $("input#username").val();
			var pass = $("input#password").val();
			var email = $("input#email").val();
			var phone = $("input#phone").val();
			var role = $("select#role").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "administrator.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					first_name: first_name,
					last_name: last_name,
                    username: username,
					pass: pass,
					email: email,
					phone: phone,
					role: role	
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successaddemp').html("<div class='alert alert-success'>");
                    $('#successaddemp > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successaddemp > .alert-success')
                        .append("<strong>Done. </strong>");
                    $('#successaddemp > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('form#addEmpForm').trigger("reset");
                    $("form#addEmpForm").find("input[type=text], input[type=password],input[type=checkbox, input[type=email],input[type=number], textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successaddemp').html("<div class='alert alert-danger'>");
                    $('#successaddemp > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successaddemp > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successaddemp > .alert-danger').append('</div>');
                    //clear all fields
					$('form#addEmpForm').trigger("reset");
                    $("form#addEmpForm").find("input[type=text], input[type=password],input[type=checkbox, input[type=email],input[type=number], textarea").val("");
                },
            });
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

// When clicking on Full hide fail/success boxes
$('#name').focus(function() {
    $('#successaddemp').html('');
});
