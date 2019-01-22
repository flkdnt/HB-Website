$(document).ready(function() {
	var emailPattern = /\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b/;

  $("#K9_Sponsor_Button").click(function(){
    $(".K9_Sponsor").css("display", "contents");
    $(".SM_Sponsor").css("display", "none");
    $(".First_Time_Sponsor").css("display", "none");
    $('html, body').animate({ scrollTop: $('#K9_Sponsor').offset().top }, 'fast');
  })
  $("#SM_Sponsor_Button").click(function(){
    $(".K9_Sponsor").css("display", "none");
    $(".SM_Sponsor").css("display", "contents");
    $(".First_Time_Sponsor").css("display", "none");
    $('html, body').animate({ scrollTop: $('#SM_Sponsor').offset().top }, 'fast');
  })
  $("#FirstTime_Sponsor_Button").click(function(){
    $(".K9_Sponsor").css("display", "none");
    $(".SM_Sponsor").css("display", "none");
    $(".First_Time_Sponsor").css("display", "contents");
    $('html, body').animate({ scrollTop: $('#First_Time_Sponsor').offset().top }, 'fast');
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
