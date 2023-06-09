(function ($) {
	
	"use strict";

	$(function() {
        $("#tabs").tabs();
    });

	$(window).scroll(function() {
	  var scroll = $(window).scrollTop();
	  var box = $('.header-text').height();
	  var header = $('header').height();

	  if (scroll >= box - header) {
	    $("header").addClass("background-header");
	  } else {
	    $("header").removeClass("background-header");
	  }
	});
	

	$('.schedule-filter li').on('click', function() {
        var tsfilter = $(this).data('tsfilter');
        $('.schedule-filter li').removeClass('active');
        $(this).addClass('active');
        if (tsfilter == 'all') {
            $('.schedule-table').removeClass('filtering');
            $('.ts-item').removeClass('show');
        } else {
            $('.schedule-table').addClass('filtering');
        }
        $('.ts-item').each(function() {
            $(this).removeClass('show');
            if ($(this).data('tsmeta') == tsfilter) {
                $(this).addClass('show');
            }
        });
    });


	// Window Resize Mobile Menu Fix
	mobileNav();


	// Scroll animation init
	window.sr = new scrollReveal();
	

	// Menu Dropdown Toggle
	if($('.menu-trigger').length){
		$(".menu-trigger").on('click', function() {	
			$(this).toggleClass('active');
			$('.header-area .nav').slideToggle(200);
		});
	}


	function onScroll(event){
	    var scrollPos = $(document).scrollTop();
	    $('.nav a').each(function () {
	        var currLink = $(this);
	        var refElement = $(currLink.attr("href"));
	        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
	            $('.nav ul li a').removeClass("active");
	            currLink.addClass("active");
	        }
	        else{
	            currLink.removeClass("active");
	        }
	    });
	}


	// Page loading animation
	 $(window).on('load', function() {

        $('#js-preloader').addClass('loaded');

    });


	// Window Resize Mobile Menu Fix
	$(window).on('resize', function() {
		mobileNav();
	});


	// Window Resize Mobile Menu Fix
	function mobileNav() {
		var width = $(window).width();
		$('.submenu').on('click', function() {
			if(width < 767) {
				$('.submenu ul').removeClass('active');
				$(this).find('ul').toggleClass('active');
			}
		});
	}


})(window.jQuery);



function myFun(){
	var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

	if (document.getElementById("pass").value.length <=7){
		alert("Password must be atleast 8 characters!");
	 }

		else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("email").value))
		 {
		  location.href='assets/dashboard/index.php';
			alert("Login Success!");
		  
		   
		 }
		 
		 else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("email").value))){
			alert("You have entered an invalid email address!");
		 }
		     	   
	}

// Show modal
$('#itemModal').on('show.bs.modal', function (e) {
	var button = $(e.relatedTarget)
	var name = button.data('name')
	var type = button.data('type')
	var price = button.data('price')
	var modal = $(this)
	modal.find('#item-name').text(name)
	modal.find('#item-type').text(type)
	modal.find('#item-price').text(price)
	modal.find('#item-img').attr("src","assets/prodimg/"+name+".jpg");
})

// Reset modal data on close
$('#itemModal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
})

// Add/subtract quantity
$(document).ready(function(){

	var quantity=0;
	$('.quantity-right-plus').click(function(e){
			
			e.preventDefault();
			var quantity = parseInt($('#quantity').val());
				$('#quantity').val(quantity + 1);
		});
	
		$('.quantity-left-minus').click(function(e){
			e.preventDefault();
			var quantity = parseInt($('#quantity').val());
				if(quantity>0){
				$('#quantity').val(quantity - 1);
				}
		});
		
	});