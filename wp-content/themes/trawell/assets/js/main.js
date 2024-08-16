(function($) {

    "use strict";

    var trawell_app = {

        /* Settings */
        settings: {

            admin_bar: {
                height: 0,
                position: ''
            }

        },


        init: function() {

            this.admin_bar_check();
            this.sticky_sidebar();
            this.accordion_widget();
            this.sticky_header();
            this.fit_vids();
            this.sliders();
            this.instagram_slider();
            this.responsive_sidebar();
            this.header_action_search();
            this.init_load_more_click();
            this.init_infinite_scroll();
            this.scroll_push_state();
            this.share();
            this.scroll_animate();
            this.popup();
            this.reverse_menu();
            this.start_kenburns();
            this.object_fit_fix();
            this.popup_image($('.entry-content'));

        },


        resize: function() {

            this.admin_bar_check();
            this.sticky_sidebar();
        },

        scroll: function() {

        },

        /* Check if WP admin bar is set and get its properties */
        admin_bar_check: function() {

            if ($('#wpadminbar').length && $('#wpadminbar').is(':visible')) {
                this.settings.admin_bar.height = $('#wpadminbar').height();
                this.settings.admin_bar.position = $('#wpadminbar').css('position');
            }

        },

        sticky_sidebar: function() {

            if (!$('.trawell-sidebar-sticky').length) {
                return;
            }

            $('body').imagesLoaded(function() {

                var sidebar_sticky = $('.trawell-sidebar-sticky');
                var top_padding = window.matchMedia('(min-width: 1260px)').matches ? 50 : 30;

                sidebar_sticky.each(function() {

                    var match_media_breakpoint = $(this).parent().hasClass('trawell-sidebar-mini') ? 730 : 1024;
                    var sticky_offset = $('.trawell-header-sticky').length && !trawell_js_settings.header_sticky_up ? $('.trawell-header-sticky').outerHeight() : 0;
                    var admin_bar_offset = trawell_app.settings.admin_bar.position == 'fixed' ? trawell_app.settings.admin_bar.height : 0;

                    var offset_top = sticky_offset + admin_bar_offset + top_padding;

                    if (window.matchMedia('(min-width: ' + match_media_breakpoint + 'px)').matches) {

                        $(this).stick_in_parent({
                            inner_scrolling: true,
                            offset_top: offset_top
                        });

                    } else {

                        $(this).css('height', 'auto');
                        $(this).css('min-height', '1px');
                        $(this).trigger("sticky_kit:detach");
                    }

                });
            });


        },

        accordion_widget: function() {


            /* Add Accordion menu arrows */

            $(".widget").each(function() {

                var menu_item = $(this).find('.menu-item-has-children > a, .page_item_has_children > a, .cat-parent > a');
                menu_item.after('<span class="trawell-accordion-nav"><i class="o-angle-down-1"></i></span>');

            });

            /* Accordion menu click functionality*/
            $('.widget').on('click', '.trawell-accordion-nav', function() {
                $(this).next('ul.sub-menu:first, ul.children:first').slideToggle('fast').parent().toggleClass('active');
            });


        },


        responsive_sidebar: function() {

            /* Hidden sidebar */

            $('body').on('click', '.trawell-hamburger', function() {
                $('body').addClass('trawell-sidebar-action-open trawell-lock');
               var top = trawell_app.settings.admin_bar.position == 'fixed' || $(window).scrollTop() == 0 ? trawell_app.settings.admin_bar.height : 0;
               
                $('.trawell-sidebar').css('top', top);

            });

            $('body').on('click', '.trawell-action-close, .trawell-body-overlay', function() {
                $('body').removeClass('trawell-sidebar-action-open trawell-lock');
            });

            $(document).keyup(function(e) {
                if (e.keyCode == 27 && $('body').hasClass('trawell-sidebar-action-open')) {
                    $('body').removeClass('trawell-sidebar-action-open trawell-lock');
                }
            });


            //unwrapp responsive menu widget if all other widgets are unwrapped
            var widgets = $('.trawell-sidebar .widget:not(.trawell-responsive-nav)');
            var widgets_unwrapped = $('.trawell-sidebar .widget.widget-no-padding:not(.trawell-responsive-nav)');

            if (widgets.length == widgets_unwrapped.length && widgets.length != 0) {
                $('.trawell-responsive-nav').addClass('widget-no-padding');
            }

        },

        header_action_search: function() {

            $('body').on('click', '.trawell-action-search span', function() {

                $(this).find('i').toggleClass('o-exit-1', 'o-search-1');
                $(this).closest('.trawell-action-search').toggleClass('active');
                setTimeout(function() {
                    $('.active input[type="text"]').focus();
                }, 150);

            });

            $(document).on('click', function(evt) {
                if (!$(evt.target).is('.trawell-action-search span') && $(window).width() < 580) {

                    $('.trawell-action-search.active .sub-menu').css('width', $(window).width());
                }
            });

        },


        sticky_header: function() {

            var sticky = $('.trawell-header-sticky');

            if (trawell_empty(sticky)) {
                return false;
            }

            var trawell_last_top = 0;


            $(window).scroll(function() {
                var top = $(window).scrollTop();
                var sticky_top = trawell_app.settings.admin_bar.position == 'fixed' ? trawell_app.settings.admin_bar.height : 0;

                if (trawell_js_settings.header_sticky_up) {

                    if (trawell_last_top > top && top >= trawell_js_settings.header_sticky_offset) {
                        trawell_app.show_sticky_header(sticky, sticky_top);
                    } else {
                        trawell_app.hide_sticky_header(sticky);
                    }

                } else {

                    if (top >= trawell_js_settings.header_sticky_offset) {
                        trawell_app.show_sticky_header(sticky, sticky_top);
                    } else {
                        trawell_app.hide_sticky_header(sticky);
                    }
                }
                trawell_last_top = top;

            });

        },

        fit_vids: function() {
            var obj = $('.trawell-entry, .widget, .trawell-cover > .container');
            var iframes = [
                "iframe[src*='www.youtube.com/embed']",
                "iframe[src*='player.vimeo.com/video']",
                "iframe[src*='www.kickstarter.com/projects']",
                "iframe[src*='players.brightcove.net']",
                "iframe[src*='www.hulu.com/embed']",
                "iframe[src*='vine.co/v']",
                "iframe[src*='videopress.com/embed']",
                "iframe[src*='www.dailymotion.com/embed']",
                "iframe[src*='vid.me/e']",
                "iframe[src*='player.twitch.tv']",
                "iframe[src*='facebook.com/plugins/video.php']",
                "iframe[src*='gfycat.com/ifr/']",
                "iframe[src*='liveleak.com/ll_embed']",
                "iframe[src*='media.myspace.com']",
                "iframe[src*='archive.org/embed']",
                "iframe[src*='w.soundcloud.com/player']",
                "iframe[src*='channel9.msdn.com']",
                "iframe[src*='content.jwplatform.com']",
                "iframe[src*='wistia.com']",
                "iframe[src*='vooplayer.com']",
                "iframe[src*='content.zetatv.com.uy']",
                "iframe[src*='embed.wirewax.com']",
                "iframe[src*='eventopedia.navstream.com']",
                "iframe[src*='cdn.playwire.com']",
                "iframe[src*='drive.google.com']",
                "iframe[src*='videos.sproutvideo.com']"
            ];

            obj.fitVids({
                customSelector: iframes.join(',')
            });
        },

        show_sticky_header: function(sticky, sticky_top) {

            if (trawell_empty(sticky_top)) {
                sticky = 0;
            }

            if (!sticky.hasClass('active')) {
                sticky.css('top', sticky_top);
                sticky.addClass('active');
            }
        },

        hide_sticky_header: function(sticky) {

            if (sticky.hasClass('active')) {
                sticky.removeClass('active');
            }

        },


        sliders: function() {
            $('.trawell-cover-gallery .gallery, .trawell-cover-slider, .gallery.gallery-columns-1').each(function() {
                var $elem = $(this);

                if (!$elem.hasClass('owl-carousel')) {
                    $elem.addClass('owl-carousel');
                }

                var columns = $elem.attr('class').match(/gallery-columns-(\d+)/);
                var items = trawell_empty(columns) ? 1 : columns[1];
                var autoplay = false;

                if($elem.hasClass('trawell-cover-slider')){
                    autoplay = trawell_js_settings.home_slider_autoplay ? true : false;
                }

                $elem.owlCarousel({
                    rtl: trawell_js_settings.rtl_mode ? true : false,
                    loop: true,
                    nav: true,
                    autoWidth: false,
                    autoplay: autoplay,
                    autoplayTimeout: parseInt(trawell_js_settings.home_slider_autoplay_time) * 1000,
                    autoplayHoverPause: true,
                    center: false,
                    fluidSpeed: 300,
                    margin: 0,
                    items: items,
                    navText: ['<i class="o-angle-left-1"></i>', '<i class="o-angle-right-1"></i>'],
                    responsive: {
                        0: {
                            items: items == 1 ? 1 : 2,
                        },
                        729: {
                            items: items == 1 ? 1 : 3,
                        },
                        1024: {
                            items: items == 1 ? 1 : 4,
                        },
                        1200: {
                            items: items,
                        },
                    }
                });
            });
        },

        instagram_slider: function() {

            var pre_footer_instagram = $('.trawell-pre-footer .meks-instagram-widget');

            if (!pre_footer_instagram.length) {
                return;
            }

            if (!pre_footer_instagram.hasClass('owl-carousel')) {
                pre_footer_instagram.addClass('owl-carousel');
            }

            pre_footer_instagram.owlCarousel({
                rtl: trawell_js_settings.rtl_mode ? true : false,
                loop: true,
                nav: true,
                autoWidth: false,
                center: true,
                fluidSpeed: 300,
                margin: 0,
                items: 5,
                navText: ['<i class="o-angle-left-1"></i>', '<i class="o-angle-right-1"></i>'],
                lazyLoad: true,
                responsive: {
                    0: {
                        items: 2,
                    },
                    729: {
                        items: 3,
                    },
                    1024: {
                        items: 4,
                    },
                    1200: {
                        items: 5,
                    },
                }
            });

        },

        popup: function() {

            $('body').on('click', '.gallery-item a, a.trawell-popup-img', function(e) {

                e.preventDefault();

                var pswpElement = document.querySelectorAll('.pswp')[0];

                var items = [];
                var index = 0;
                var opener = $(this);
                var is_owl = opener.closest('.gallery').hasClass('owl-carousel') ? true : false;
                var popup_items = [];
                var is_gallery = !opener.hasClass('trawell-popup-img');

                if(is_gallery){
                    popup_items = is_owl ? $(this).closest('.gallery').find('.owl-item:not(.cloned) .gallery-item a') : $(this).closest('.gallery').find('.gallery-item a');
                }else{
                    popup_items = $('a.trawell-popup-img');
                }

                if(trawell_empty(popup_items)){
                    return true;
                }

                $.each(popup_items, function(ind) {

                    if (opener.attr('href') == $(this).attr('href')) {
                        index = ind;
                    }

                    var size = JSON.parse($(this).attr('data-size'));
                    var item = {
                        src: $(this).attr('href'),
                        w: size.w,
                        h: size.h,
                        title: is_gallery ? $(this).closest('.gallery-item').find('figcaption').html() :  $(this).closest('figure.wp-caption').find('figcaption').html()
                    };

                    items.push(item);

                });

                var options = {
                    history: false,
                    index: index,
                    preload: [2, 2],
                    captionEl: true,
                    fullscreenEl: false,
                    zoomEl: false,
                    shareEl: false,
                    preloaderEl: true
                };

                var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
                gallery.init();

            });



        },

        reverse_menu: function() {

            $('.trawell-header').on('mouseenter', 'ul li', function(e) {

                if ($(this).find('ul').length) {

                    var rt = ($(window).width() - ($(this).find('ul').offset().left + $(this).find('ul').outerWidth()));

                    if (rt < 0) {
                        $(this).find('ul').addClass('trawell-rev');
                    }

                }
            });

        },

        init_load_more_click: function() {
            $('body').on('click', '.load-more > a', function(e) {
                e.preventDefault();
                var $this = $(this),
                    url = $this.attr('href');

                if (!trawell_empty(url)) {
                    trawell_app.load_more({
                        url: url,
                        elem_with_new_url: '.load-more > a'
                    }, function() {});
                }
            });
        },

        init_infinite_scroll: function() {

            if (!trawell_empty($('.trawell-pagination .trawell-infinite-scroll'))) {

                var trawell_infinite_allow = true;

                $(window).scroll(function() {
                    var $pagination = $('.trawell-pagination');

                    if (trawell_empty($pagination)) {
                        return;
                    }

                    if (trawell_infinite_allow && ($(this).scrollTop() > ($pagination.offset().top - $(this).height() - 200))) {

                        trawell_infinite_allow = false;

                        var $load_more_button = $('.trawell-pagination .trawell-infinite-scroll a'),
                            url = $load_more_button.attr('href');

                        trawell_app.load_more({
                            url: url,
                            elem_with_new_url: '.trawell-infinite-scroll a'
                        }, function() {
                            trawell_infinite_allow = true;
                        });

                    }
                });
            }
        },

        load_more: function(args, callback) {
            if (trawell_empty(args)) {
                console.error('Args can\'t be empty');
                return;
            }

            trawell_app.toggle_pagination_loader();

            var defaults = {
                    url: window.location.href,
                    container: '.trawell-posts',
                    elem_with_new_url: '.load-more > a',
                    attr_with_new_url: 'href'
                },
                options = $.extend({}, defaults, args);

            if (trawell_empty(options.url)) {
                console.error('You must provide url to next page');
            }

            $("<div>").load(options.url, function() {
                var $this = $(this),
                    new_url = $this.find(options.elem_with_new_url).attr(options.attr_with_new_url),
                    next_title = $this.find('title').text(),
                    $new_posts = $this.find(options.container).children();

                $new_posts.imagesLoaded(function() {

                    $new_posts.hide().appendTo($(options.container)).fadeIn();

                    if (window.location.href !== new_url) {

                        if (!trawell_empty(new_url)) {
                            $(options.elem_with_new_url).attr(options.attr_with_new_url, new_url);
                        } else {
                            $(options.elem_with_new_url).closest('.trawell-pagination').fadeOut('fast').remove();
                        }

                        var push_obj = {
                            prev: window.location.href,
                            next: options.url,
                            offset: $(window).scrollTop(),
                            prev_title: window.document.title,
                            next_title: next_title
                        };

                        trawell_app.push_state(push_obj);

                        if (typeof callback === 'function') {
                            callback(true);
                        }
                    } else {
                        $(options.elem_with_new_url).closest('.trawell-pagination').fadeOut('fast').remove();

                        if (typeof callback === 'function') {
                            callback(false);
                        }
                    }

                    trawell_app.toggle_pagination_loader();
                    trawell_app.sticky_sidebar();
                });
            });
        },

        toggle_pagination_loader: function() {
            $('.trawell-pagination').toggleClass('trawell-loader-active');
        },

        push_state: function(args) {
            var defaults = {
                    prev: window.location.href,
                    next: '',
                    offset: $(window).scrollTop(),
                    prev_title: window.document.title,
                    next_title: window.document.title,
                    increase_counter: true
                },
                push_object = $.extend({}, defaults, args);

            if (push_object.increase_counter) {
                trawell_app.pushes.up++;
                trawell_app.pushes.down++;
            }
            delete(push_object.increase_counter);

            trawell_app.pushes.url.push(push_object);
            window.document.title = push_object.next_title;
            window.history.pushState(push_object, '', push_object.next);
        },

        pushes: {
            url: [],
            up: 0,
            down: 0
        },

        scroll_push_state: function() {

            /* Handling URL on ajax call for load more and infinite scroll case */
            if (!trawell_empty($('.trawell-pagination .load-more a')) || !trawell_empty($('.trawell-pagination .trawell-infinite-scroll'))) {

                trawell_app.push_state({
                    increase_counter: false
                });

                var last_up, last_down = 0;

                $(window).scroll(function() {
                    if (trawell_app.pushes.url[trawell_app.pushes.up].offset !== last_up && $(window).scrollTop() < trawell_app.pushes.url[trawell_app.pushes.up].offset) {
                        last_up = trawell_app.pushes.url[trawell_app.pushes.up].offset;
                        last_down = 0;
                        window.document.title = trawell_app.pushes.url[trawell_app.pushes.up].prev_title;
                        window.history.replaceState(trawell_app.pushes.url, '', trawell_app.pushes.url[trawell_app.pushes.up].prev); //1

                        trawell_app.pushes.down = trawell_app.pushes.up;
                        if (trawell_app.pushes.up !== 0) {
                            trawell_app.pushes.up--;
                        }
                    }
                    if (trawell_app.pushes.url[trawell_app.pushes.down].offset !== last_down && $(window).scrollTop() > trawell_app.pushes.url[trawell_app.pushes.down].offset) {
                        last_down = trawell_app.pushes.url[trawell_app.pushes.down].offset;
                        last_up = 0;

                        window.document.title = trawell_app.pushes.url[trawell_app.pushes.down].next_title;
                        window.history.replaceState(trawell_app.pushes.url, '', trawell_app.pushes.url[trawell_app.pushes.down].next);

                        trawell_app.pushes.up = trawell_app.pushes.down;
                        if (trawell_app.pushes.down < trawell_app.pushes.url.length - 1) {
                            trawell_app.pushes.down++;
                        }

                    }
                });

            }
        },

        share: function() {

            $('body').on('click', '.trawell-share a:not(".prevent-share-popup")', function(e) {
                e.preventDefault();
                trawell_app.share_popup($(this).attr('data-url'));
            });
        },

        share_popup: function(data) {
            window.open(data, "Share", 'height=500,width=760,top=' + ($(window).height() / 2 - 250) + ', left=' + ($(window).width() / 2 - 380) + 'resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0');
        },

        scroll_animate: function() {

            $('body').on('click', '.trawell-scroll-animate', function(e) {

                e.preventDefault();
                var target = this.hash;
                var $target = $(target);
                var offset = trawell_js_settings.header_sticky ? $('.trawell-header-sticky').height() : 0;

                $('html, body').stop().animate({
                    'scrollTop': $target.offset().top - offset
                }, 900, 'swing', function() {
                    window.location.hash = target;
                });

            });
        },

        start_kenburns: function() {

            if( window.matchMedia('(max-width: 439px)').matches ){
                return false;
            }

            $('body').imagesLoaded(function() {
                $('body.trawell-animation-kenburns').addClass('trawell-animation-kenburns-start');
            });

        },
        object_fit_fix: function(){
            $('body').imagesLoaded(function() {
              objectFitImages('.trawell-item a.entry-image img,.trawell-cover img');  
            });
      
        },


        popup_image: function(obj) {

        }

    };

    $(document).ready(function() {
        trawell_app.init();
    });

    $(window).resize(function() {
        trawell_app.resize();
    });

    $(window).scroll(function() {
        trawell_app.scroll();
    });


    /**
     * Checks if variable is empty or not
     *
     * @param variable
     * @returns {boolean}
     */
    function trawell_empty(variable) {

        if (typeof variable === 'undefined') {
            return true;
        }

        if (variable === null) {
            return true;
        }

        if (variable.length === 0) {
            return true;
        }

        if (variable === "") {
            return true;
        }

        if (typeof variable === 'object' && $.isEmptyObject(variable)) {
            return true;
        }

        return false;
    }

})(jQuery);