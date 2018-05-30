$(function() {

    $("#contactForm input,contactForm select, #contactForm textarea, #contactForm select").jqBootstrapValidation({
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
			var ticket_no = $("input#ticket_no").val();
			var lab_no = $("input#lab_no").val();
			var type = $("select#type").val();
			var item1 = $("select#item1").val();
			var cb =  $("input#cb").val();
            var message = $("textarea#message").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					cb: cb, 
                    message: message,
					type: type,
					item1: item1
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    //clear all fields
	
					$('form#contactForm').trigger("reset");
                    $("form#contactForm").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
					$('form#contactForm').trigger("reset");
                    $("form#contactForm").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});


//-------------------------Lab 1230-------------------------

$(function() {

    $("#lab1230 input,#lab1230 textarea, #lab1230 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no1230").val();
			var ticket_no = $("input#ticket_no1230").val();
			var lab_no = $("input#lab_no1230").val();
			var name = $("input#first_name1230").val();
			var type = $("select#type1230").val();
			var item1 = $("select#item1230").val();
            var message = $("textarea#messagelab1230").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
                    message: message,
					type: type,
					item1: item1
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab1230').html("<div class='alert alert-success'>");
                    $('#successlab1230 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1230 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab1230 > .alert-success')
                        .append('</div>');

                     //clear all fields
					 $('form#lab1230').trigger("reset");
					$("form#lab1230").find("input[type=text], input[type=checkbox], textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab1230').html("<div class='alert alert-danger'>");
                    $('#successlab1230 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1230 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab1230 > .alert-danger').append('</div>');
                     //clear all fields
					 $('form#lab1230').trigger("reset");
					$("form#lab1230").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});



//-------------------------Lab 1232-------------------------

$(function() {

    $("#lab1232 input, #lab1232 textarea, #lab1232 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no1232").val();
			var ticket_no = $("input#ticket_no1232").val();
			var lab_no = $("input#lab_no1232").val();
			var name = $("input#first_name1232").val();
			var type = $("select#type1232").val();
			var item1 = $("select#item1232").val();
            var message = $("textarea#messagelab1232").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
				
                    message: message,
						type: type,
					item1: item1
					
					
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab1232').html("<div class='alert alert-success'>");
                    $('#successlab1232 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1232 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab1232 > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('form#lab1232').trigger("reset");
					$("form#lab1232").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab1232').html("<div class='alert alert-danger'>");
                    $('#successlab1232 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1232 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab1232 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab1232').trigger("reset");
					$("form#lab1232").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#successlab1232').html('');
});




//-------------------------Lab 1234-------------------------

$(function() {

    $("#lab1234 input,#lab1234 textarea, #lab1234 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no1234").val();
			var ticket_no = $("input#ticket_no1234").val();
			var lab_no = $("input#lab_no1234").val();
			var name = $("input#first_name1234").val();
			var type = $("select#type1234").val();
			var item1 = $("select#item1234").val();
            var message = $("textarea#messagelab1234").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
			        message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab1234').html("<div class='alert alert-success'>");
                    $('#successlab1234 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1234 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab1234 > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('form#lab1234').trigger("reset");
					$("form#lab1234").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab1234').html("<div class='alert alert-danger'>");
                    $('#successlab1234 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1234 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab1234 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab1234').trigger("reset");
					$("form#lab1234").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});




//-------------------------Lab 1236-------------------------

$(function() {

    $("#lab1236 input,#lab1236 textarea, #lab1236 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no1236").val();
			var ticket_no = $("input#ticket_no1236").val();
			var lab_no = $("input#lab_no1236").val();
			var type = $("select#type1236").val();
			var item1 = $("select#item1236").val();
			var name = $("input#first_name1236").val();
            var message = $("textarea#messagelab1236").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab1236').html("<div class='alert alert-success'>");
                    $('#successlab1236 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1236 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab1236 > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('form#lab1236').trigger("reset");
					$("form#lab1236").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab1236').html("<div class='alert alert-danger'>");
                    $('#successlab1236 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1236 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab1236 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab1236').trigger("reset");
					$("form#lab1236").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});


//-------------------------Lab 1226-------------------------

$(function() {

    $("#lab1226 input,#lab1226 textarea, #lab1226 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no1226").val();
			var ticket_no = $("input#ticket_no1226").val();
			var lab_no = $("input#lab_no1226").val();
			var name = $("input#first_name1226").val();
			var type = $("select#type1226").val();
			var item1 = $("select#item1226").val();
            var message = $("textarea#messagelab1226").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab1226').html("<div class='alert alert-success'>");
                    $('#successlab1226 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1226 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab1226 > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('form#lab1226').trigger("reset");
					$("form#lab1226").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab1226').html("<div class='alert alert-danger'>");
                    $('#successlab1226 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1226 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab1226 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab1226').trigger("reset");
					$("form#lab1226").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});


//-------------------------Lab 1224-------------------------

$(function() {

    $("#lab1224 input,#lab1224 textarea, #lab1224 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no1224").val();
			var ticket_no = $("input#ticket_no1224").val();
			var lab_no = $("input#lab_no1224").val();
			var name = $("input#first_name1224").val();
			var type = $("select#type1224").val();
			var item1 = $("select#item1224").val();
            var message = $("textarea#messagelab1224").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab1224').html("<div class='alert alert-success'>");
                    $('#successlab1224 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1224 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab1224 > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('form#lab1224').trigger("reset");
					$("form#lab1224").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab1224').html("<div class='alert alert-danger'>");
                    $('#successlab1224 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1224 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab1224 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab1224').trigger("reset");
					$("form#lab1224").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});

//-------------------------Lab 1222-------------------------

$(function() {

    $("#lab1222 input,#lab1222 textarea, #lab1222 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no1222").val();
			var ticket_no = $("input#ticket_no1222").val();
			var lab_no = $("input#lab_no1222").val();
			var name = $("input#first_name1222").val();
			var type = $("select#type1222").val();
			var item1 = $("select#item1222").val();
            var message = $("textarea#messagelab1222").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab1222').html("<div class='alert alert-success'>");
                    $('#successlab1222 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1222 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab1222 > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('form#lab1222').trigger("reset");
					$("form#lab1222").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab1222').html("<div class='alert alert-danger'>");
                    $('#successlab1222 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1222 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab1222 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab1222').trigger("reset");
					$("form#lab1222").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});

//-------------------------Lab 1220-------------------------

$(function() {

    $("#lab1220 input,#lab1220 textarea, #lab1220 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no1220").val();
			var ticket_no = $("input#ticket_no1220").val();
			var lab_no = $("input#lab_no1220").val();
			var name = $("input#first_name1220").val();
			var type = $("select#type1220").val();
			var item1 = $("select#item1220").val();
            var message = $("textarea#messagelab1220").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab1220').html("<div class='alert alert-success'>");
                    $('#successlab1220 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1220 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab1220 > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('form#lab1220').trigger("reset");
					$("form#lab1220").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab1220').html("<div class='alert alert-danger'>");
                    $('#successlab1220 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1220 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab1220 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab1220').trigger("reset");
					$("form#lab1220").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});

//-------------------------Lab 1241-------------------------

$(function() {

    $("#lab1241 input,#lab1241 textarea, #lab1241 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no1241").val();
			var ticket_no = $("input#ticket_no1241").val();
			var lab_no = $("input#lab_no1241").val();
			var name = $("input#first_name1241").val();
			var type = $("select#type1241").val();
			var item1 = $("select#item1241").val();
            var message = $("textarea#messagelab1241").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab1241').html("<div class='alert alert-success'>");
                    $('#successlab1241 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1241 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab1241 > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('form#lab1241').trigger("reset");
					$("form#lab1241").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab1241').html("<div class='alert alert-danger'>");
                    $('#successlab1241 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1241 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab1241 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab1241').trigger("reset");
					$("form#lab1241").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});


//-------------------------Lab 1239-------------------------

$(function() {

    $("#lab1239 input,#lab1239 textarea, #lab1239 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no1239").val();
			var ticket_no = $("input#ticket_no1239").val();
			var lab_no = $("input#lab_no1239").val();
			var name = $("input#first_name1239").val();
			var type = $("select#type1239").val();
			var item1 = $("select#item1239").val();
            var message = $("textarea#messagelab1239").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab1239').html("<div class='alert alert-success'>");
                    $('#successlab1239 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1239 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab1239 > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('form#lab1239').trigger("reset");
					$("form#lab1229").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab1239').html("<div class='alert alert-danger'>");
                    $('#successlab1239 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab1239 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab1239 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab1239').trigger("reset");
					$("form#lab1229").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});


//-------------------------Lab 2062-------------------------

$(function() {

    $("#lab2062 input,#lab2062 textarea, #lab2062 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no2062").val();
			var ticket_no = $("input#ticket_no2062").val();
			var lab_no = $("input#lab_no2062").val();
			var name = $("input#first_name2062").val();
			var type = $("select#type1262").val();
			var item1 = $("select#item1262").val();
            var message = $("textarea#messagelab2062").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab2062').html("<div class='alert alert-success'>");
                    $('#successlab2062 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2062 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab2062 > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('form#lab2062').trigger("reset");
					$("form#lab2062").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab2062').html("<div class='alert alert-danger'>");
                    $('#successlab2062 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2062 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab2062 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab2062').trigger("reset");
					$("form#lab2062").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});



//-------------------------Lab 2064-------------------------

$(function() {

    $("#lab2064 input,#lab2064 textarea, #lab2064 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no2064").val();
			var ticket_no = $("input#ticket_no2064").val();
			var lab_no = $("input#lab_no2064").val();
			var name = $("input#first_name2064").val();
			var type = $("select#type1264").val();
			var item1 = $("select#item1264").val();
            var message = $("textarea#messagelab2064").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab2064').html("<div class='alert alert-success'>");
                    $('#successlab2064 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2064 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab2064 > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('form#lab2064').trigger("reset");
					$("form#lab2064").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab2064').html("<div class='alert alert-danger'>");
                    $('#successlab2064 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2064 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab2064 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab2064').trigger("reset");
					$("form#lab2064").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});



//-------------------------Lab 2066-------------------------

$(function() {

    $("#lab2066 input,#lab2066 textarea, #lab2066 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no2066").val();
			var ticket_no = $("input#ticket_no2066").val();
			var lab_no = $("input#lab_no2066").val();
			var name = $("input#first_name2066").val();
			var type = $("select#type1266").val();
			var item1 = $("select#item1266").val();
            var message = $("textarea#messagelab2066").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab2066').html("<div class='alert alert-success'>");
                    $('#successlab2066 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2066 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab2066 > .alert-success')
                        .append('</div>');

                   //clear all fields
                    $('form#lab2066').trigger("reset");
					$("form#lab2066").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab2066').html("<div class='alert alert-danger'>");
                    $('#successlab2066 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2066 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab2066 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab2066').trigger("reset");
					$("form#lab2066").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});



//-------------------------Lab 2068-------------------------

$(function() {

    $("#lab2068 input,#lab2068 textarea, #lab2068 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no2068").val();
			var ticket_no = $("input#ticket_no2068").val();
			var lab_no = $("input#lab_no2068").val();
			var name = $("input#first_name2068").val();
			var type = $("select#type1268").val();
			var item1 = $("select#item1268").val();
            var message = $("textarea#messagelab2068").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab2068').html("<div class='alert alert-success'>");
                    $('#successlab2068 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2068 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab2068 > .alert-success')
                        .append('</div>');

                   //clear all fields
                    $('form#lab2068').trigger("reset");
					$("form#lab2068").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab2068').html("<div class='alert alert-danger'>");
                    $('#successlab2068 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2068 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab2068 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab2068').trigger("reset");
					$("form#lab2068").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});



//-------------------------Lab 2070-------------------------

$(function() {

    $("#lab2070 input,#lab2070 textarea, #lab2070 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no2070").val();
			var ticket_no = $("input#ticket_no2070").val();
			var lab_no = $("input#lab_no2070").val();
			var type = $("select#type2070").val();
			var item1 = $("select#item2070").val();
			var name = $("input#first_name2070").val();
            var message = $("textarea#messagelab2070").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab2070').html("<div class='alert alert-success'>");
                    $('#successlab2070 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2070 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab2070 > .alert-success')
                        .append('</div>');

                   //clear all fields
                    $('form#lab2070').trigger("reset");
					$("form#lab2070").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab2070').html("<div class='alert alert-danger'>");
                    $('#successlab2070 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2070 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab2070 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab2070').trigger("reset");
					$("form#lab2070").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});


//-------------------------Lab 2027-------------------------

$(function() {

    $("#lab2027 input,#lab2027 textarea, #lab2027 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no2027").val();
			var ticket_no = $("input#ticket_no2027").val();
			var lab_no = $("input#lab_no2027").val();
			var name = $("input#first_name2027").val();
			var type = $("select#type2027").val();
			var item1 = $("select#item2027").val();
            var message = $("textarea#messagelab2027").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab2027').html("<div class='alert alert-success'>");
                    $('#successlab2027 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2027 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab2027 > .alert-success')
                        .append('</div>');

                   //clear all fields
                    $('form#lab2027').trigger("reset");
					$("form#lab2027").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab2027').html("<div class='alert alert-danger'>");
                    $('#successlab2027 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2027 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab2027 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab2027').trigger("reset");
					$("form#lab2027").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});




//-------------------------Lab 2029-------------------------

$(function() {

    $("#lab2029 input,#lab2029 textarea, #lab2029 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no2029").val();
			var ticket_no = $("input#ticket_no2029").val();
			var lab_no = $("input#lab_no2029").val();
			var name = $("input#first_name2029").val();
			var type = $("select#type2029").val();
			var item1 = $("select#item2029").val();
            var message = $("textarea#messagelab2029").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab2029').html("<div class='alert alert-success'>");
                    $('#successlab2029 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2029 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab2029 > .alert-success')
                        .append('</div>');

                   //clear all fields
                    $('form#lab2029').trigger("reset");
					$("form#lab2029").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab2029').html("<div class='alert alert-danger'>");
                    $('#successlab2029 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2029 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab2029 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab2029').trigger("reset");
					$("form#lab2029").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});


//-------------------------Lab 2060-------------------------

$(function() {

    $("#lab2060 input,#lab2060 textarea, #lab2060 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no2060").val();
			var ticket_no = $("input#ticket_no2060").val();
			var lab_no = $("input#lab_no2060").val();
			var name = $("input#first_name2060").val();
			var type = $("select#type2060").val();
			var item1 = $("select#item2060").val();
            var message = $("textarea#messagelab2060").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab2060').html("<div class='alert alert-success'>");
                    $('#successlab2060 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2060 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab2060 > .alert-success')
                        .append('</div>');

                   //clear all fields
                    $('form#lab2060').trigger("reset");
					$("form#lab2060").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab2060').html("<div class='alert alert-danger'>");
                    $('#successlab2060 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2060 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab2060 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab2060').trigger("reset");
					$("form#lab2060").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});


//-------------------------Lab 2058-------------------------

$(function() {

    $("#lab2058 input,#lab2058 textarea, #lab2058 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no2058").val();
			var ticket_no = $("input#ticket_no2058").val();
			var lab_no = $("input#lab_no2058").val();
			var name = $("input#first_name2058").val();
			var type = $("select#type2058").val();
			var item1 = $("select#item2058").val();
            var message = $("textarea#messagelab2058").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab2058').html("<div class='alert alert-success'>");
                    $('#successlab2058 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2058 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab2058 > .alert-success')
                        .append('</div>');

                   //clear all fields
                    $('form#lab2058').trigger("reset");
					$("form#lab2058").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab2058').html("<div class='alert alert-danger'>");
                    $('#successlab2058 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2058 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab2058 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab2058').trigger("reset");
					$("form#lab2058").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});



//-------------------------Lab 2019-------------------------

$(function() {

    $("#lab2019 input,#lab2019 textarea, #lab2019 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no2019").val();
			var ticket_no = $("input#ticket_no2019").val();
			var lab_no = $("input#lab_no2019").val();
			var name = $("input#first_name2019").val();
			var type = $("select#type2019").val();
			var item1 = $("select#item2019").val();
            var message = $("textarea#messagelab2019").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab2019').html("<div class='alert alert-success'>");
                    $('#successlab2019 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2019 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab2019 > .alert-success')
                        .append('</div>');

                   //clear all fields
                    $('form#lab2019').trigger("reset");
					$("form#lab2019").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab2019').html("<div class='alert alert-danger'>");
                    $('#successlab2019 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2019 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab2019 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab2019').trigger("reset");
					$("form#lab2019").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});


//-------------------------Lab 2021-------------------------

$(function() {

    $("#lab2021 input,#lab2021 textarea, #lab2021 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no2021").val();
			var ticket_no = $("input#ticket_no2021").val();
			var lab_no = $("input#lab_no2021").val();
			var name = $("input#first_name2021").val();
			var type = $("select#type2021").val();
			var item1 = $("select#item2021").val();
            var message = $("textarea#messagelab2021").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab2021').html("<div class='alert alert-success'>");
                    $('#successlab2021 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2021 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab2021 > .alert-success')
                        .append('</div>');

                   //clear all fields
                    $('form#lab2021').trigger("reset");
					$("form#lab2021").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab2021').html("<div class='alert alert-danger'>");
                    $('#successlab2021 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2021 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab2021 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab2021').trigger("reset");
					$("form#lab2021").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});


//-------------------------Lab 2056-------------------------

$(function() {

    $("#lab2056 input,#lab2056 textarea, #lab2056 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no2056").val();
			var ticket_no = $("input#ticket_no2056").val();
			var lab_no = $("input#lab_no2056").val();
			var name = $("input#first_name2056").val();
			var type = $("select#type2056").val();
			var item1 = $("select#item2056").val();
            var message = $("textarea#messagelab2056").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab2056').html("<div class='alert alert-success'>");
                    $('#successlab2056 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2056 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab2056 > .alert-success')
                        .append('</div>');

                   //clear all fields
                    $('form#lab2056').trigger("reset");
					$("form#lab2056").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab2056').html("<div class='alert alert-danger'>");
                    $('#successlab2056 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2056 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab2056 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab2056').trigger("reset");
					$("form#lab2056").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});




//-------------------------Lab 2054-------------------------

$(function() {

    $("#lab2054 input,#lab2054 textarea, #lab2054 select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
			var emp_no = $("input#emp_no2054").val();
			var ticket_no = $("input#ticket_no2054").val();
			var lab_no = $("input#lab_no2054").val();
			var name = $("input#first_name2054").val();
			var type = $("select#type2054").val();
			var item1 = $("select#item2054").val();
            var message = $("textarea#messagelab2054").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
				url: "index.php",
                type: "POST",
                data: {
					emp_no: emp_no,
					ticket_no: ticket_no,
					lab_no: lab_no,
					type: type,
					item1:item1,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#successlab2054').html("<div class='alert alert-success'>");
                    $('#successlab2054 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2054 > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#successlab2054 > .alert-success')
                        .append('</div>');

                   //clear all fields
                    $('form#lab2054').trigger("reset");
					$("form#lab2054").find("input[type=text], input[type=checkbox],select, textarea").val("");
                },
                error: function() {
                    // Fail message
                    $('#successlab2054').html("<div class='alert alert-danger'>");
                    $('#successlab2054 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successlab2054 > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successlab2054 > .alert-danger').append('</div>');
                    //clear all fields
                    $('form#lab2054').trigger("reset");
					$("form#lab2054").find("input[type=text], input[type=checkbox],select, textarea").val("");
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
    $('#success').html('');
});

