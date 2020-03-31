jQuery(document).ready(function($) {

  'use strict';
  
    var top_header = $('.parallax-content');
    var headerheight = $("#header").height();
    $(".page-body").css({"margin-top":headerheight+"px"});
    top_header.css({'background-position':'center center'}); // better use CSS			
				
    $(window).scroll(function () {
    var st = $(this).scrollTop();
    top_header.css({'background-position':'center calc(50% + '+st+'px)'});
    });


    // $('body').scrollspy({ 
    //     target: '#header',
    //     offset: 200
    // });
      
      // smoothscroll on sidenav click

    $.fn.showFlex = function() {
      this.css({'display':'flex'});
      this.css({'flex-direction':'column'});
      this.css({'justify-content':'center'});
    }

    $.fn.hideFlex = function() {
      this.css({'display':'none'});
    }

    $('.tabgroup > div').hideFlex();
    $('.tabgroup > div:first-of-type').showFlex();
    $('.tabs a').click(function(e){
      e.preventDefault();
      var $this = $(this),
      tabgroup = '#'+$this.parents('.tabs').data('tabgroup'),
      others = $this.closest('li').siblings().children('a'),
      target = $this.attr('href');
      others.removeClass('active');
      $this.addClass('active');
      $(tabgroup).children('div').hideFlex();
      $(target).showFlex();
    })

    var owl = $("#owl-testimonials");
    owl.owlCarousel({
      pagination : true,
      paginationNumbers: false,
      autoPlay: 6000, //Set AutoPlay to 3 seconds
      items : 3, //10 items above 1000px browser width
      itemsDesktop : [1000,3], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,2], // betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
    });
});
