/**
 * Main theme scripts
 * 
 * @package Armonia
 * @since 1.0.0
 * 
 */
jQuery(document).ready(function($) {
    const slideArrow = {
      nextArrow: `<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>`,
      prevArrow: `<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>`,
    };
    let isOpened = false;
    let $searchBox = $("#search-box");
    $("#search").on("click", function (e) {
      e.preventDefault();
      if (!isOpened) {
        $searchBox.slideDown();
        isOpened = true;
        $(this).addClass("active");
      } else {
        $searchBox.slideUp();
        isOpened = false;
        $(this).removeClass("active");
      }
    });
    clickOutSideElm($("header"), function () {
      $searchBox.slideUp();
      isOpened = false;
      $("#search").removeClass("active");
    });

    function clickOutSideElm(elm, callback) {
      $(document).mouseup(function (e) {
        var container = $(elm);
        if (!container.is(e.target) && container.has(e.target).length === 0) {
          callback();
        }
      });
    }
    
    /**
     * Masonry Layout
     */
    let $masonry = $(".blog-masonry").masonry({
      itemSelector: ".post-card",
      horizontalOrder: true,
      gutter: 30,
    });
    $masonry.imagesLoaded().progress(function () {
      $masonry.masonry("layout");
    });

    // banner slider layout four
    $(".blog-ocean__slider").each(function() {  
      var _this = $(this);
      _this.slick(Object.assign({
        dots: false,
        infinite: true,
        arrows: false,
        centerMode: true,
        focusOnSelect: true,
        centerPadding: '200px',
        autoplay: false,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '70px',
              slidesToShow: 1
            }
          },
          {
            breakpoint: 525,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '10px',
              slidesToShow: 1
            }
          }
        ]
      }, slideArrow));
    })

    /**
     * Frontpage sections blocks "gallery post format" slider 
     * 
     * 
     */
    var galleryFormatWrapper; 
    if($( ".armonia-frontpage-section" ).length ) {
      galleryFormatWrapper = $( ".armonia-frontpage-section" )
    } else if($( "body.archive" ).length ) {
      galleryFormatWrapper = $( "body.archive" )
    } else if($( "body.blog" ).length ) {
      galleryFormatWrapper = $( "body.blog" )
    } else if($( "body.home.blog" ).length ) {
      galleryFormatWrapper = $( "body.home.blog" )
    } else {
      galleryFormatWrapper = false;
    }
    if(galleryFormatWrapper) {
      galleryFormatWrapper.each(function() {
        var sectionContainer  = $(this),
        sectionWrapper = sectionContainer.find( ".format-gallery .wp-block-gallery ul, .format-gallery .wp-block-gallery.has-nested-images" ), innerSectionContainer
        if(sectionWrapper.length) {
          sectionWrapper.each(function() {
            innerSectionContainer = $(this)
            innerSectionContainer.slick(Object.assign(
              slideArrow
            ))
          })
        }
      })
    }

    // post filter tab layout one
    $(".armonia-frontpage-section .tab-item").on("click", function (e) {
      e.preventDefault();
      $(this).addClass("active").siblings().removeClass("active");
      let getShownTab = $(this).data("for");
      let foundTab = $(this)
        .parents(".news-block__header")
        .siblings(".news-block__tab")
        .find(`[data-tab-name='${getShownTab}']`);
        foundTab.fadeIn(300).addClass("active").siblings().fadeOut(300).removeClass("active");
        // reinit slick slider after tab filter success
        var foundTabsectionWrapper = foundTab.find( ".format-gallery .wp-block-gallery" ), foundTabinnerSectionContainer
        if(foundTabsectionWrapper.length) {
          foundTabsectionWrapper.each(function() {
            foundTabinnerSectionContainer = $(this)
            foundTabinnerSectionContainer.find( "ul" ).slick('unslick').slick('reinit').slick(Object.assign(slideArrow));
          })
        }
    });

    /**
     * Back To Top script
     * 
     */
    if( $( "#armonia-scroll-to-top" ).length ) {
      var scrollContainer = $( "#armonia-scroll-to-top" );
      $(window).scroll(function() {
        if ( $(this).scrollTop() > 800 ) {
          scrollContainer.addClass('show');
        } else {
          scrollContainer.removeClass('show');
        }
      });
      scrollContainer.click(function( event ) {
        event.preventDefault();
        // Animate the scrolling motion.
        jQuery("html, body").animate({
          scrollTop:0
        },"slow");
      });
    }
    
    /**
     * Header Toggle Sidebar handler
     * 
     */
    var header_sidebar_trigger = $( ".header-sidebar-trigger" )
    if( header_sidebar_trigger.length ) {
        header_sidebar_trigger.on( "click", function() {
            $("#page").prepend( '<div class="header-sidebar-overlay"></div>');
            $("body").toggleClass( "header_toggle_sidebar_active" );
            $(this).next(".header-sidebar-content").animate({
              width: "toggle"
            });
        })

        // on close trigger
        $(document).on( "click", ".header-sidebar-content .header-sidebar-trigger-close, .header-sidebar-overlay", function() {
            $("body").toggleClass( "header_toggle_sidebar_active" );
            $("#page .header-sidebar-overlay").remove();
            $("body").find( ".header-sidebar-content" ).animate({
                width: "toggle"
            })
        })
    }

    /**
     * Sticky sidebar
     * 
     */
    if( armoniaThemeObject.stickySidebar ) {
      $( ".primary-section, .secondary-section" ).theiaStickySidebar()
    }

    /**
     * Sticky header
     * 
     */
    if( armoniaThemeObject.stickyHeader ) {
      $('#content').waypoint(function(direction) {  
            $('header.theme-default').toggleClass('fixed_header');
        }, { offset: + 0 });
    }

});