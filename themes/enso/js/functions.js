(function($){

	"use strict";

	$(function(){

		// Imágen de fondo en home
		$('#intro').css('height', $(window).height());
		$('#intro').backstretch("http://www.ensoenergia.com/wp-content/themes/enso/images/back03.png");

		// Validar emails
		validarEmail();

		// toggle menu
		$(".nav_icon").on("click", function(e) {
			e.preventDefault();
			muestraMenu();
		});
		$(".nav_close").on("click", function(e) {
			e.preventDefault();
			escondeMenu();
		});

		// toggle info secciones
		$("a.flecha").on('click', function(e){
			e.preventDefault();
			if($(this).parent().parent().find('p').css('display') == 'none'){
				$(this).parent().parent().find('p').slideDown('slow');
				$(this).find('i').addClass('rotar');
			} else {	
				$(this).parent().parent().find('p').slideUp('fast');
				$(this).find('i').removeClass('rotar');
			}
		});

		// scroll a secciones del menu
		$(".main_nav_menu a, #intro a").click(function(e) {
			e.preventDefault();
			var id = $(this).attr('href');
		   	scrollToAnchor(id);
		});
		// revela menú al scrollear
		esconderMenuScroll();

		// Google Maps
		creaMapa();

		// Placeholders flotantes en contacto
		$(".floating-placeholder input").keydown(updateText);
  		$(".floating-placeholder input").change(updateText);

  		$.each($('.cover'), function(i){
  			var id = '#' + covers[i]['category'] + '-bg';
  			var category = covers[i]['url'];
  			setCoverImage(id, category);
  		});

  		$("input[type=file]").nicefileinput({ 
			label : 'Subir Archivo' // Spanish label
		});

		// checar si se subió algún archivo
		$('.NFI-button').click(function(){
			console.log('nifa');
			//$(this).find('#filename').click();
			/*if(document.getElementById("uploadBox").value != "") {
			   // you have a file
			   console.log(1);
			}*/
		});
		
	
	});	
	
	// Funciones
	function muestraMenu(){
		$('.main_nav_menu').fadeIn(250);
		$('.nav_icon').hide();
		$('.nav_close').show();
	}
	function escondeMenu(){
		$('.main_nav_menu').fadeOut(250);
		$('.nav_icon').show();
		$('.nav_close').hide();
	}
	function esconderMenuScroll(){
		var opacity = 0;
		var limit = 400;
		var isLimit = false;
		$(window).scroll(function(){
		    var st = $(this).scrollTop();

		    if(st > limit) {
		    	$('header').css('opacity','1');
		    	isLimit = true;
		    }
		    else if(st < limit && isLimit) {
		    	$('header').css('opacity','-=0.1');
		       	opacity -= 0.1;
		    } 
		    else {
		    	$('header').css('opacity','+=0.1');
		       	opacity += 0.1;
		    }

		    if(st < 20) {
		    	$('header').css('opacity','0');
		    	isLimit = false;
		    	escondeMenu();
		    } 
		});

	}
	function scrollToAnchor(id){
	    var aTag = $("div "+ id);
	    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
	}

	function validarEmail(){
		window.validateEmail = function (email) {
			var regExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return regExp.test(email);
		};
	}

	function creaMapa(){
		var map = void 0;

		var initialize = function() {
		  var mapColors, mapOptions, marker;
		  mapColors = [
		    {
		      "stylers": [
		        {
		          "saturation": -100
		        }, {
		          "gamma": 0.8
		        }, {
		          "lightness": 4
		        }, {
		          "visibility": "on"
		        }
		      ]
		    }
		  ];
		  mapOptions = {
		    zoom: 15,
		    center: new google.maps.LatLng(25.5496, -103.4464),
		    mapTypeId: google.maps.MapTypeId.ROADMAP,
		    scrollwheel: false,
		    zoomControl: true,
		    zoomControlOptions: {
		      style: google.maps.ZoomControlStyle.SMALL,
		      position: google.maps.ControlPosition.TOP_RIGHT
		    },
		    panControl: false,
		    mapTypeControl: false,
		    streetViewControl: false,
		    styles: mapColors
		  };
		  map = new google.maps.Map(document.getElementById("mapa"), mapOptions);
		  return marker = new google.maps.Marker({
		    position: new google.maps.LatLng(25.5496, -103.4464),
		    map: map,
		    icon: "http://www.ensoenergia.com/wp-content/themes/enso/images/pin.png"
		  });
		};

		google.maps.event.addDomListener(window, "load", initialize);
	}
	function procesaContacto(){
		$('.contacto input[type="submit"]').on('click', function(e){
			var nombre = $('input[name="name"').val();
			var telefono = $('input[name="phone"').val();
			var email = $('input[name="email"').val();
			var ciudad = $('input[name="city"').val();
			var consumo = $('input[name="consumo"').val();

			e.preventDefault();
			$.ajax({
			  	type: 'POST',
			  	url: ajax_url,
			  	data: {
			  		nombre: nombre,
			  		email: email,
			  		telefono: telefono, 
			  		ciudad: ciudad, 
			  		consumo: consumo,
			  		action: "procesa_contacto"
			  	},
			  	success: function(data){
			  		var json = $.parseJSON(data);
			  		$('form').html('<p>Gracias por contactarnos '+json.nombre+', en breve nos pondremos en contacto contigo.</p>');
			  	}
			});
		});
	}

	function toggleTexto(section){
		$(section + " .flecha").on('click', function(){
			$(this).parent().parent().find('p').slideDown('slow');
		});
	}

	function updateText(event){
	    var input=$(this);
	    setTimeout(function(){
	      	var val=input.val();
	      	if(val!="")
	        	input.parent().addClass("floating-placeholder-float");
	      	else
	        	input.parent().removeClass("floating-placeholder-float");
	    },1)
	}

	function setCoverImage(id, url){
		$(id).css('background-image', 'url('+url+')');
	}


})(jQuery);