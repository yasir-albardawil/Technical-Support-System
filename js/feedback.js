$(function() {

    $("#feedback input,#feedback textarea, #feedback select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var request_status = $("select#request_status").val();
			var feedback = $("select#feedback").val();
			var date = $("input#date").val();
			var comments = $("textarea#comments").val();
			var ticket_no = $("input#ticket_no").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "request.php?ticket_no="+ticket_no,
                type: "POST",
                data: {
					request_status: request_status,
					feedback: feedback,
					comments: comments,
					date: date,
					feedback1: "feedback"
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successfeedback').html("<div class='alert alert-success'>");
                    $('#successfeedback > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successfeedback > .alert-success')
                        .append("<strong>Your feedback has been sent. </strong>");
                    $('#successfeedback > .alert-success')
                        .append('</div>');
						
						 //clear all fields
	
					$('form#feedback').trigger("reset");
                    $("form#feedback").find("input[type=text], input[type=checkbox],select, textarea").val("");

                },
                error: function() {
                    // Fail message
                    $('#successfeedback').html("<div class='alert alert-danger'>");
                    $('#successfeedback > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successfeedback > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successfeedback > .alert-danger').append('</div>');
					
					 //clear all fields
	
					$('form#feedback').trigger("reset");
                    $("form#feedback").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#successfeedback').html('');
});
