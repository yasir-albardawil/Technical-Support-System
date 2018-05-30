$(function() {

    $("#edit_emp input,#edit_emp textarea, #edit_emp select").jqBootstrapValidation({
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
			var update_no = $("input#update_no").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "edit.php?update="+update_no,
                type: "POST",
                data: {
					emp_no: emp_no,
					first_name: first_name,
					last_name: last_name,
                    username: username,
					pass: pass,
					email: email,
					phone: phone,
					role: role,
					update: "update"	
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successeditemp').html("<div class='alert alert-success'>");
                    $('#successeditemp > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successeditemp > .alert-success')
                        .append("<strong>The employee has been updated. </strong>");
                    $('#successeditemp > .alert-success')
                        .append('</div>');
                },
                error: function() {
                    // Fail message
                    $('#successeditemp').html("<div class='alert alert-danger'>");
                    $('#successeditemp > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successeditemp > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successeditemp > .alert-danger').append('</div>');
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
    $('#successeditemp').html('');
});
