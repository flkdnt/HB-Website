$(document).ready(function() {
	var emailPattern = /\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b/;

  $("#K9_Handler_Button").click(function(){
    $(".K9_Handler_Form").css("display", "contents");
    $(".Non_Handler_Form").css("display", "none");
    $(".Deployed_FAQs").css("display", "none");
    $('html, body').animate({ scrollTop: $('#K9_Handler_Form').offset().top }, 'fast');
  })
  $("#SM_Button").click(function(){
    $(".K9_Handler_Form").css("display", "none");
    $(".Non_Handler_Form").css("display", "contents");
    $(".Deployed_FAQs").css("display", "none");
    $('html, body').animate({ scrollTop: $('#Non_Handler_Form').offset().top }, 'fast');
  })
  $("#SM_FAQ_Button").click(function(){
    $(".K9_Handler_Form").css("display", "none");
    $(".Non_Handler_Form").css("display", "none");
    $(".Deployed_FAQs").css("display", "contents");
    $('html, body').animate({ scrollTop: $('#Deployed_FAQs').offset().top }, 'fast');
  })

  $("#submit").click(function(){
/*
		var isValid = true;
		var varrive = $("#arrival-date").val().trim();
		if ( varrive == "") {
			isValid = false;
			$("#arrival-date").next().text("Arrival Date Required");
		} else if ( !datePattern.test(varrive)) {
				isValid = false;
				$("#arrival-date").next().text("Arrival Date Format: MM/DD/YYYY");
		} else if (Date.parse($('#arrival-date').val().trim()) < Date.now()) {
			  isValid = false;
				$("#arrival-date").next().text("Arrival Date must be a future date!");
		}

		var vname = $("#name").val().trim();
		if ( vname == "" ) {
			isValid = false;
			$("#name").next().text("Name Required");
		}

		var vemail = $("#email").val().trim();
		if ( vemail == "" ) {
			isValid = false;
			$("#email").next().text("Email Required");
		} else if( !emailPattern.test(vemail)) {
				isValid = false;
			  $("#email").next().text("Email Format: USER@EMAIL.COM");
		}

		if( isValid == false ) {
			event.preventDefault();
		} */
	});
});
