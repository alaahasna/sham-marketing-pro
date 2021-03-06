$(document).ready(function (){
	  $('.slider').slider({
	  	indicators: true,
	  	height: 320,
	  	interval: 1500
	  });
	 $('.materialboxed').materialbox();
	 $('.modal').modal();
	 $('.dropdown-button').dropdown({
       inDuration: 300,
       outDuration: 225,
       constrainWidth: false, // Does not change width of dropdown to that of the activator
       hover: false, // Activate on hover
       gutter: 0, // Spacing from edge
       belowOrigin: false, // Displays dropdown below the button
       alignment: 'left', // Displays dropdown with edge aligned to the left of button
       stopPropagation: false // Stops event propagation
     }
   );
	  $('.dropdown-trigger').dropdown({
	      inDuration: 300,
	      outDuration: 600,
	      constrainWidth: false, // Does not change width of dropdown to that of the activator
	      hover: true, // Activate on hover
	      gutter: 0, // Spacing from edge
	      belowOrigin: false, // Displays dropdown below the button
	      alignment: 'left', // Displays dropdown with edge aligned to the left of button
	      stopPropagation: false // Stops event propagation
	    }
	  );

	$('.sidenav').sidenav({
		edge: 'right'
	});
	 $(".owl-one").owlCarousel({
	 	loop: false,
	 	nav: true,
       	items: 4,
	    responsiveClass: true,
	    responsive: {
	        0:{
	          items: 2
	        },
	        480:{
	          items: 3
	        },
	        769:{
	          items: 6
	        }
	    }
	 });

 $(".owl-two").owlCarousel({
	 	loop: false,
       	items: 4,
       	nav: true,
	    responsiveClass: true,
	    responsive: {
	        0:{
	          items: 1
	        },
	        480:{
	          items: 2
	        },
	        769:{
	          items: 4
	        }
	    }
	 });
     $("#username, #password").keyup(function(event){
    	if(event.keyCode === 13){
    		event.preventDefault();
    		$("a[name='login']").click();
    	}
    });
 // 	$(".tab").each(function (){
 // 		var dataActive = $(this).attr("data-trigger");
 // 	 	$(this).click(function(e){
	// 	 	$(".manual_dropdown[data-activate='"+ e.target.dataset.activate +"']").toggle();
	// 		console.log(e.target.dataset.activate);
 // 		});
	// });
});
