<!-- External JavaScripts -->

<script src="{{ asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('vendors/bootstrap/js/popper.min.js')}}"></script>
<script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('vendors/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
<!--<script src="{{ asset('vendors/magnific-popup/magnific-popup.js')}}"></script>-->
<script src="{{ asset('vendors/counter/waypoints-min.js')}}"></script>
<script src="{{ asset('vendors/counter/counterup.min.js')}}"></script>
<script src="{{ asset('vendors/imagesloaded/imagesloaded.js')}}"></script>
<script src="{{ asset('vendors/masonry/masonry.js')}}"></script>
<script src="{{ asset('vendors/masonry/filter.js')}}"></script>
<script src="{{ asset('vendors/owl-carousel/owl.carousel.js')}}"></script>
<script src="{{ asset('js/functions.js')}}"></script>
<script src="{{ asset('js/contact.js')}}"></script>
<!--<script src="{{ asset('vendors/switcher/switcher.js')}}"></script>-->
<!-- Revolution JavaScripts Files -->
<script src="{{ asset('vendors/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{ asset('vendors/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<script src="{{asset('js/components-collapse.js')}}"></script>
<script type="text/javascript" src="{{ asset('common' )}}/jquery.form-validaton-min.js"></script>
<script>
    $.validate({
        lang:'en'
    });
</script>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('common' )}}/jquery-video-modal.min.js"></script>
<script>
	$(".video-play").modalVideo();
	$(".video-play1").modalVideo();
</script>
<script type="text/javascript" src="{{ asset('venobox') }}/venobox/venobox.min.js"></script>
<script>
	$(document).ready(function(){
		$('.venobox').venobox({
			closeColor: '#f4f4f4',
			spinColor: '#f4f4f4',
			arrowsColor: '#f4f4f4',
			closeBackground: '#17191D',
			overlayColor: 'rgba(23,25,29,0.8)'
		});
	});
</script>

<script src="{{ asset('common') }}/sweetalert2@8.js"></script>
<script type="text/javascript" src="{{ asset('backend') }}/lib/toastr/toastr.min.js"></script>

<script>
  @if(Session::has('message'))
	var type ="{{Session::get('alert-type','info')}}"
	switch(type){
		case 'info':
			toastr.info(" {{Session::get('message')}} ");
			break;
		case 'success':
			toastr.success(" {{Session::get('message')}} ");
			break;
		case 'warning':
			toastr.warning(" {{Session::get('message')}} ");
			break;
		case 'error':
			toastr.error(" {{Session::get('message')}} ");
			break;
	}
@endif
</script>




<script src="{{ asset('js/jquery.scroller.js')}}"></script>





<script>
jQuery(document).ready(function() {
	var ttrevapi;
	var tpj =jQuery;
	if(tpj("#rev_slider_486_1").revolution == undefined){
		revslider_showDoubleJqueryError("#rev_slider_486_1");
	}else{
		ttrevapi = tpj("#rev_slider_486_1").show().revolution({
			sliderType:"standard",
			jsFileLocation:"assets/vendors/revolution/js/",
			sliderLayout:"fullwidth",
			dottedOverlay:"none",
			delay:9000,
			navigation: {
				keyboardNavigation:"on",
				keyboard_direction: "horizontal",
				mouseScrollNavigation:"off",
				mouseScrollReverse:"default",
				onHoverStop:"on",
				touch:{
					touchenabled:"on",
					swipe_threshold: 75,
					swipe_min_touches: 1,
					swipe_direction: "horizontal",
					drag_block_vertical: false
				}
				,
				arrows: {
					style: "uranus",
					enable: true,
					hide_onmobile: false,
					hide_onleave: false,
					tmp: '',
					left: {
						h_align: "left",
						v_align: "center",
						h_offset: 10,
						v_offset: 0
					},
					right: {
						h_align: "right",
						v_align: "center",
						h_offset: 10,
						v_offset: 0
					}
				},

			},
			viewPort: {
				enable:true,
				outof:"pause",
				visible_area:"80%",
				presize:false
			},
			responsiveLevels:[1240,1024,778,480],
			visibilityLevels:[1240,1024,778,480],
			gridwidth:[1240,1024,778,480],
			gridheight:[768,600,600,600],
			lazyType:"none",
			parallax: {
				type:"scroll",
				origo:"enterpoint",
				speed:400,
				levels:[5,10,15,20,25,30,35,40,45,50,46,47,48,49,50,55],
				type:"scroll",
			},
			shadow:0,
			spinner:"off",
			stopLoop:"off",
			stopAfterLoops:-1,
			stopAtSlide:-1,
			shuffle:"off",
			autoHeight:"off",
			hideThumbsOnMobile:"off",
			hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			debugMode:false,
			fallbacks: {
				simplifyAll:"off",
				nextSlideOnWindowFocus:"off",
				disableFocusListener:false,
			}
		});
	}
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stack('scripts')
