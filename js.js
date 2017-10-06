$(document).ready(function(){
// 	show mp3 links with play buttons
//	$("a[href$='.mp3']").wrap( "<div class='ui360'></div>" );
});


// swipebox, lightbox for images
$(document).ready(function(){
	// $("img.attachment-thumbnail").parent("a").addClass("swipebox");
	// $("img.size-thumbnail").parent("a").addClass("swipebox");
	// $("img.size-medium").parent("a").addClass("swipebox");
	// $("img.size-large").parent("a").addClass("swipebox");
	// $("img.size-full").parent("a").addClass("swipebox");

	$('a[href$=".gif"], a[href$=".jpg"], a[href$=".png"], a[href$=".bmp"]').addClass("swipebox");
	
	// add title if it exists (alt text from img gets added to title attribute of a tag)
	// $("img.attachment-thumbnail").parent("a").attr("title", function() {
	// 	return $(this).children("img").attr("alt");
	// });
	// $("img.size-thumbnail").parent("a").attr("title", function() {
	// 	return $(this).children("img").attr("alt");
	// });
	// $("img.size-medium").parent("a").attr("title", function() {
	// 	return $(this).children("img").attr("alt");
	// });
	// $("img.size-large").parent("a").attr("title", function() {
	// 	return $(this).children("img").attr("alt");
	// });
	// $("img.size-full").parent("a").attr("title", function() {
	// 	return $(this).children("img").attr("alt");
	// });
	// $("a.imagelink").attr("title", function() {
	// 	return $(this).children("img").attr("alt");
	// });
	// and now we can call swipebox()
	$('.swipebox').swipebox();
});


// make videos full width
$(document).ready(function(){
  // Target your .container, .wrapper, .post, etc.
  $(".entry-content").fitVids();
});



// show/hide search
$(document).ready(function(){
	$("a.search").click(function() {
		// $( "#searchForm" ).slideToggle( "fast", function() {
		// 	// animation complete
		// 	$( "#searchForm input" ).focus();
		// });
        if ($('#searchForm').hasClass('hide')) {
          $('#searchForm').removeClass('hide').addClass('show');
        } 
        else {
          $('#searchForm').removeClass('show').addClass('hide');
        }
	});
});



// show/hide mobile menu
$(document).ready(function(){
    $('a img.menuIcon').click(function(){
        if ($('nav.header').hasClass('hide')) {
          $('nav.header').removeClass('hide').addClass('show');
        } 
        else {
          $('nav.header').removeClass('show').addClass('hide');
        }
    });

  // show/hide mobileMenu
	// $("a img.menuIcon").click(function() {
		// $( "nav.header" ).slideToggle( "fast", function() {
		// 	// animation complete
		// });
		// $( "#searchForm" ).show( "fast", function() {
		// 	// animation complete
		// 	$( "#searchForm input" ).focus();
		// });
		// $("a.search").fadeOut("slow");
	// });
});
// $(window).resize(function() {
// 	var windowWidth = $(window).width();
// 	if (windowWidth < 641) {
// 		$('nav.header').hide();
// 	} else {
// 		$('nav.header').show();
// 		$('#searchForm').hide();
// 	}
// });
