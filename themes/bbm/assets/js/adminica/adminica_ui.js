
 
 $(function() {

//jQuery UI elements (more info can be found at http://jqueryui.com/demos/)
	
	// Sidenav Accordion Config
		$( "ul#accordion" ).accordion({
			collapsible: true,
			active: '.selected',
			header: 'li a.top_level',
			autoHeight:false,
			icons:false
		});

	// Top Nav Dropdown Accordion Config				
		$( "ul.dropdown" ).accordion({
			collapsible: true,
			active:false,
			header: 'li a.has_slide', // this is the element that will be clicked to activate the accordion 
			autoHeight:false,
			event: 'mousedown',
			icons:false
		});
 	
 	// Content Box Toggle Config 
		$("a.toggle").click(function(){
			$(this).toggleClass("toggle_closed").next().slideToggle("slow");
			return false; //Prevent the browser jump to the link anchor
		});
 	

		$('.popup').popupWindow({ 
			height:500, 
			width:800, 
			centerScreen:1 ,
			scrollbars:1
		}); 

		
				
		
// Other Scripts
	
});
