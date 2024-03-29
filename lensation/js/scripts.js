var pflag=0;
function hideshow(kyathi)
{
    
    if(pflag==0)
    {
        if(kyathi=="login")    
        {
            document.getElementById('lpassword').setAttribute("type","text");
        }
        else if(kyathi=="rnpass")
        {
            document.getElementById('rnpassword').setAttribute("type","text");
        }
        else if(kyathi=="rcpass")
        {
            document.getElementById('rcpassword').setAttribute("type","text");
        }
        else if(kyathi=="curpassword")
        {
            document.getElementById('currentpass').setAttribute("type","text");
        }
        else if(kyathi=="newpassword")
        {
            document.getElementById('newpass').setAttribute("type","text");
        }
        else if(kyathi=="conpassword")
        {
            document.getElementById('conpass').setAttribute("type","text");
        }
        else if(kyathi=="showpassword")
        {
            document.getElementById('showpass').setAttribute("type","text");
        }
        else if(kyathi=="copypassword")
        {
            document.getElementById('copypass').setAttribute("type","text");
        }
        pflag=1;
    }
    else
    {
        if(kyathi=="login")
        {
            document.getElementById('lpassword').setAttribute("type","password");  
        }
        else if(kyathi=="rnpass")
        {
            document.getElementById('rnpassword').setAttribute("type","password");
        }
        else if(kyathi=="rcpass")
        {
            document.getElementById('rcpassword').setAttribute("type","password");
        }
        else if(kyathi=="curpassword")
        {
            document.getElementById('currentpass').setAttribute("type","password");
        }
        else if(kyathi=="newpassword")
        {
            document.getElementById('newpass').setAttribute("type","password");
        }
        else if(kyathi=="conpassword")
        {
            document.getElementById('conpass').setAttribute("type","password");
        }
        else if(kyathi=="showpassword")
        {
            document.getElementById('showpass').setAttribute("type","password");
        }
        else if(kyathi=="copypassword")
        {
            document.getElementById('copypass').setAttribute("type","password");
        }
        pflag=0;
    }
}

function checkpass()
{
    npass=document.getElementById('rnpassword').value;
    cpass=document.getElementById('rcpassword').value;
    uc=document.getElementById('usercaptcha').value;
    sc=document.getElementById('systemcaptcha').value;

    if(npass==cpass && uc===sc )
    {
        return true;
    }
    else
    {
        return false;
    }
}

function checkps()
{
    npass=document.getElementById('rnpassword').value;
    cpass=document.getElementById('rcpassword').value;
    if(npass==cpass)
    {
        return true;
    }
    else
    {
        return false;
    }
}









$(function() {
    "use strict";
    var wind = $(window);
    
    // Main footer 
    var footer = $("footer").outerHeight();
    $("main").css("marginBottom", footer);
    
    // ScrollIt
    $.scrollIt({
      upKey: 38,                // key code to navigate to the next section
      downKey: 40,              // key code to navigate to the previous section
      easing: 'swing',          // the easing function for animation
      scrollTime: 600,          // how long (in ms) the animation takes
      activeClass: 'active',    // class given to the active nav element
      onPageChange: null,       // function(pageIndex) that is called when page is changed
      topOffset: -70            // offste (in px) for fixed top navigation
    });
    
    // Navbar scrolling background
    wind.on("scroll",function () {
        var bodyScroll = wind.scrollTop(),
            navbar = $(".navbar"),
            logo = $(".navbar .logo> img");
        if(bodyScroll > 100){
            navbar.addClass("nav-scroll");
            logo.attr('src', 'img/logo-dark.png');
        }else{
            navbar.removeClass("nav-scroll");
            logo.attr('src', 'img/logo-light.png');
        }
    });
    // Close navbar-collapse when a  clicked
    $(".navbar-nav .dropdown-item a").on('click', function () {
        $(".navbar-collapse").removeClass("show");
    });
    
    // Sections background image from data background
    var pageSection = $(".bg-img, section");
    pageSection.each(function(indx){
        if ($(this).attr("data-background")){
            $(this).css("background-image", "url(" + $(this).data("background") + ")");
        }
    });

    // Animations
    var contentWayPoint = function () {
        var i = 0;
        $('.animate-box').waypoint(function (direction) {
            if (direction === 'down' && !$(this.element).hasClass('animated')) {
                i++;
                $(this.element).addClass('item-animate');
                setTimeout(function () {
                    $('body .animate-box.item-animate').each(function (k) {
                        var el = $(this);
                        setTimeout(function () {
                            var effect = el.data('animate-effect');
                            if (effect === 'fadeIn') {
                                el.addClass('fadeIn animated');
                            }
                            else if (effect === 'fadeInLeft') {
                                el.addClass('fadeInLeft animated');
                            }
                            else if (effect === 'fadeInRight') {
                                el.addClass('fadeInRight animated');
                            }
                            else {
                                el.addClass('fadeInUp animated');
                            }
                            el.removeClass('item-animate');
                        }, k * 200, 'easeInOutExpo');
                    });
                }, 100);
            }
        }, {
            offset: '85%'
        });
    };
    $(function () {
        contentWayPoint();
    });
    
    // Testimonials owlCarousel
    $('.testimonails .owl-carousel').owlCarousel({
        items:1,
        loop:true,
        margin: 15,
        mouseDrag:false,
        autoplay:false,
        smartSpeed:500
    });

    
    // Team owlCarousel
    $('.team .owl-carousel').owlCarousel({
        loop: true
        , margin: 30
        , dots: false
        , mouseDrag: true
        , autoplay: false
        , responsiveClass: true
        , responsive: {
            0: {
                items: 1
            }
            , 600: {
                items: 2
            }
            , 1000: {
                items: 3
            }
        }
    });

    // Services owlCarousel
    $('.proto-services .owl-carousel').owlCarousel({
        loop: true
        , margin: 30
        , mouseDrag: true
        , autoplay: false
        , dots: true
        , nav: false
        , responsiveClass: true
        , responsive: {
            0: {
                items: 1
            , }
            , 600: {
                items: 2
            }
            , 1000: {
                items: 3
            }
        }
    });

});

// Loading
$(window).on("load",function (){
    var wind = $(window);
    // Preloader
    $(".loading").fadeOut(500);
    // stellar
    wind.stellar();
});

// Slider 
$(document).ready(function() {
    var owl = $('.header .owl-carousel');
    // Slider owlCarousel
    $('.slider .owl-carousel').owlCarousel({
        items: 1,
        dots: false,
        loop:true,
        margin: 0,
        autoplay: true,
        smartSpeed:500,
         nav: true,
         navText: ['<i class="ti-arrow-right" aria-hidden="true"></i>', '<i class="ti-angle-right" aria-hidden="true"></i>']
    });
    // Slider owlCarousel
    $('.slider-fade .owl-carousel').owlCarousel({
        items: 1,
        loop:true,
        dots: false,
        margin: 0,
        autoplay: true,
        smartSpeed:500,
        animateOut: 'fadeOut',
        nav: true,
        navText: ['<i class="ti-angle-left" aria-hidden="true"></i>', '<i class="ti-angle-right" aria-hidden="true"></i>']
    });
    owl.on('changed.owl.carousel', function(event) {
        var item = event.item.index - 2;     // Position of the current item
        $('h4').removeClass('animated fadeInUp');
        $('h1').removeClass('animated fadeInUp');
        $('p').removeClass('animated fadeInUp');
        $('.butn').removeClass('animated zoomIn');
        $('.owl-item').not('.cloned').eq(item).find('h4').addClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('h1').addClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('p').addClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('.butn').addClass('animated zoomIn');
    });
});


