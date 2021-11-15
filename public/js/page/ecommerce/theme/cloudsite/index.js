
window.addEventListener("pageshow", function() {
    setTimeout(function(){
        hideLoader();
    },1000)
}, false);

(function () {
	window.onpageshow = function(event) {
		if (event.persisted) {
			window.location.reload();
		}
	};
})();

$(document).ready(function() {

    //Action button  : Mobile nav toggler 
    $(document).on("click", ".mobile-toggler", function () {
        $("#mobileNav").addClass('active');
    });
    
    //Action button  : Close Mobile nav toggler 
    $(document).on("click", ".close-nav-toggle", function () {
        $("#mobileNav").removeClass('active');
    });

    //Cart button 
    $(document).on('click','.cart-btn',function(){
        $(".cart-section").addClass('active');
        $(".cart-overlay").addClass('active');
        setTimeout(function(){
            $(".cart-box").addClass('active');
        },150)       
    })
    $(document).on('click','.close-cart-btn',function(){
        
        $(".cart-box").removeClass('active');
        setTimeout(function(){
            $(".cart-section").removeClass('active');
            $(".cart-overlay").removeClass('active');
        },150)       
    })
    $(document).mouseup(function(e) 
    {
        var container = $(".cart-box");
        if(container.hasClass('active'))
        {
            if (!container.is(e.target) && container.has(e.target).length === 0) 
            {
                $(".close-cart-btn").click();
            }
        }       
    });


    //Fav button hover effect
    $(document).on("mouseenter", "#favRow .fav-item", function() {
        $(this).addClass('active');
        $("#favRow .fav-item").addClass('hover');

    });    
    $(document).on("mouseleave", "#favRow .fav-item", function() {
        $(this).removeClass('active');
        $("#favRow .fav-item").removeClass('hover');
    });


});

