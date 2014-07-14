(function ($, window, document, undefined) {
    "use strict";
    var pluginName = "aisconverse",
        defaults = {
            sliderFx: 'fade',			        // Slider effect. Can be 'slide' or 'fade'
            sliderInterval: 6000,		        // Interval between image change. Set 0 to disable auto slideshow
            sliderSpeed: 800,			        // Speed of the slider effect in milliseconds
            speedAnimation: 600,                // Default speed of the all animation
            locations: [54.690669, 25.268196],  // Lat-Lng position to center the map on
            zoom : 14,                          // Maps zoom ( 1 <= zoom <= 16 )
            countdownTo: '2014/10/7',          // Change this in the format: 'YYYY/MM/DD'
            infoBoxName: 'Aisconverse',         // Write the actual name in InfoBox
            infoBoxDescription: 'J. Savickio str. 4 Vilnius,<br>'+ 'LT-01108, Lithuania',   // write the actual address in Infobox
            infoBoxUrl: 'http://aisconverse.com/',      // write the actual url in InfoBox
            infoBoxUrlText: 'aisconverse.com',      // write the url text
            successText: 'You have successfully subscribed', // text after successful subscribing
            errorText: 'Please, enter a valid email' // text, if email is invalid
        },
        DOC = $(document),
        WIN = $(window),
        $html = $('html'),
        $overlay = $('.overlay'),
        onMobile = false,
        scrT;

    // The plugin constructor
    function Plugin(element, options) {
        var that = this;
        that.element = $(element);
        that.options = $.extend({}, defaults, options);

        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            onMobile = true;
            WIN.scrollTop(0);
        }

        that.init();

        WIN.load(function(){    // onLoad function
            that.activate();
            that.innerMenu();
            that.headerScroll();
            that.fslider();
            that.slider();
            that.ribbonSlider();
            that.fHei();
            that.fMiddle();
            that.ytVideo();
            that.fNum();

            that.startAnima();

            $.stellar({
                horizontalScrolling: false,
                verticalOffset: 0
            });

            $overlay.height(DOC.height());
        }).resize(function(){   // onResize function
                that.fslider();
                that.slider();
                that.fHei();
                that.fMiddle();
                $overlay.height(DOC.height());
                if (that.contactmap.length > 0 && $('.popup').is(':visible'))
                    that.contactmap.height(WIN.height());
        }).scroll(function(){   // onScroll function
                that.headerScroll();
                that.fNum();
        });

    }

    Plugin.prototype = {
        init: function () {
            this.body = $(document.body);
            this.fullHeight = $('.fullheight');
            this.extendmenu = $('.extendmenu');
            this.wrapper = $('.wrapper');
            this.middle = $('.middle');
            this.header = $('.header');
            this.menu = $('.menu');
            this.sliders = $('.slider');
            this.superslider = $('.superslider');
            this.fullslider = $('.fullslider');
            this.ribbon = $('.ribbon-slider');
            this.slidesCont = $('.slides-container');
            this.internalLinks = $('.internal');
            this.contactmap = $('#contact-map');
            this.timer = $('#countdown');
            this.ytvid = $('.ytvideo');
            this.scrollTop = $('.scrolltop');
            this.num = $('[data-num]');
            this.skillLine = $('.skill-line');
            this.navCurrency = $('.nav-currency');
            this.pricing = $('.pricing');
            this.accordeon = $('.accordeon');
            this.mclose = $('.mclose');
            this.vclose = $('.vclose');
            this.vmute = $('.vmute');
            this.popup = $('.popup');
            this.ytv = $('.pytvideo');
            this.mvPlayer = $('.mobile-player');
            this.portfolio = $('.portfolio');
            this.portfolioImgs = $('.portfolio-images');
            this.pclose = $('.pclose');
            this.overlay = $('.overlay');
            this.contactForm = $('#send-form');
            this.contactFormName = $('#send-form-name');
            this.contactFormEmail = $('#send-form-email');
            this.contactFormMessage = $('#send-form-message');
            this.emailValidationRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            this.newsletter = $('#feedback-form form');
            this.worksNav = $('.works-nav');
            this.worksContainer = $('.works-container');

        },
        activate: function () {
            var instance = this;

            if (instance.menu.length === 1)
                instance.menu.slicknav();

            if (instance.internalLinks.length > 0){
                instance.internalLinks.on('click', function(e){
                    e.preventDefault();
                    var $this = $(this),
                        url = $this.attr('href'),
                        urlTop = $(url).offset().top,
                        docTop = parseInt(instance.wrapper.css('marginTop'));

                    if (instance.extendmenu.is(':visible')){
                        instance.extendmenu.css('height','auto').stop(true,true).fadeOut(instance.options.speedAnimation);
                        $html.css('overflow-y','auto');
                        $('body').removeAttr('style');
                        instance.wrapper.removeAttr('style');
                            $('body, html').stop(true, true)
                                .animate({ scrollTop: (urlTop - docTop) },
                                instance.options.speedAnimation);
                    }

                    $('body, html').stop(true, true)
                        .animate({ scrollTop: (urlTop - docTop) },
                        instance.options.speedAnimation);
                });
            }

            // accordeon
            if (instance.accordeon.length > 0){
                var titl = instance.accordeon.find('.titl'),
                    accWrap = $('.accwrap');

                accWrap.hide();
                titl.filter('.open').next().show();

                titl.on('click', function(){
                    var $this = $(this);

                    $this.toggleClass('open');
                    $this.next().slideToggle(instance.options.speedAnimation);
                });
            }

            $('.menu-btn').on('click', function(e){
                e.preventDefault();
                scrT = DOC.scrollTop();

                $('body').css('position', 'fixed');
                instance.wrapper.css('marginTop', -scrT);
                instance.extendmenu.css('overflow', 'auto').stop(true,true).fadeIn(instance.options.speedAnimation);
            });

            $('.menu-close').on('click', function(e){
                e.preventDefault();
                instance.extendmenu.css({'height': 'auto', 'overflow': 'hidden'}).stop(true,true).fadeOut(instance.options.speedAnimation);
                $html.css('overflow-y','auto');
                $('body').removeAttr('style');
                instance.wrapper.removeAttr('style');
                $('body, html').scrollTop(scrT);
            });

            instance.popup.click(function(e){ e.stopPropagation(); });

            instance.pclose.click(function(e){
                e.preventDefault();
                instance.overlay.fadeOut(instance.options.speedAnimation);
                $(this).parents('.popup').delay(250).fadeOut(instance.options.speedAnimation);
                $html.css('overflow-y','auto');
                $('body').removeAttr('style');
                instance.wrapper.removeAttr('style');
                $('body, html').scrollTop(scrT);
                instance.header.show();

                if ( $('.gallery-popup').is(':visible')){
                    $(".gallery-popup ul").trigger("destroy", true).removeAttr('style');
                    $(".gallery-popup ul").children().removeAttr('style');
                }
            });

            instance.overlay.click(function(e){
                e.preventDefault();
                $(this).fadeOut(instance.options.speedAnimation);
                instance.popup.fadeOut(instance.options.speedAnimation);
                $html.css('overflow-y','auto');
                $('body').removeAttr('style');
                instance.wrapper.removeAttr('style');
            });

            // Activate the slider
            if (instance.superslider.length > 0) {
                instance.superslider.superslides({
                    animation: 'fade',
                    play: instance.options.sliderInterval,
                    animation_speed: instance.options.sliderSpeed
                });
                $('section').css('backgroundColor', '#fff');
            }

            instance.contactFormName.focusout(function(){
                if ($(this).val() == '')
                    $(this).addClass('invalid');
            }).focusin(function(){
                $(this).removeClass('invalid');
            });

            instance.contactFormMessage.focusout(function(){
                if ($(this).val() == '')
                    $(this).addClass('invalid');
            }).focusin(function(){
                $(this).removeClass('invalid');
            });

            instance.contactFormEmail.focusout(function(){
                if (($(this).val() == '') || (!instance.emailValidationRegex.test($(this).val()))) {
                    $(this).addClass('invalid');
                }
            }).focusin(function(){
                $(this).removeClass('invalid');
            });

            instance.contactForm.on('submit', function(){
                var isHaveErrors = false;

                if (instance.contactFormName.val() === '') {
                    isHaveErrors = true;
                    instance.contactFormName.addClass('invalid');
                }

                if (instance.contactFormMessage.val() === '') {
                    isHaveErrors = true;
                    instance.contactFormMessage.addClass('invalid');
                }

                if ((instance.contactFormEmail.val() === '')
                    || (!instance.emailValidationRegex.test(instance.contactFormEmail.val()))) {
                    isHaveErrors = true;
                    instance.contactFormEmail.addClass('invalid');
                }

                if (!isHaveErrors) {
                    $.ajax({
                        type: 'POST',
                        url: '/php/email.php',
                        data: {
                            name: instance.contactFormName.val(),
                            email: instance.contactFormEmail.val(),
                            message: instance.contactFormMessage.val()
                        },
                        dataType: 'json'
                    })
                        .done(function(answer){
                            if ((typeof answer.status != 'undefined') && (answer.status == 'ok')) {
                                $('.succs-msg').fadeIn().css("display","inline-block");
                                instance.contactFormName.val('');
                                instance.contactFormEmail.val('');
                                instance.contactFormMessage.val('');
                            } else {
                                alert('Message was not sent. Server-side error!');
                            }
                        })
                        .fail(function(){
                            alert('Message was not sent. Client error or Internet connection problems.');
                        });
                }

                return false;
            });

            $('.slicknav_btn').click(function(){
                if (instance.header.hasClass('opened')){
                    instance.header.height(DOC.height());
                } else{
                    instance.header.css('height','auto');
                }
            });

            if (instance.ribbon.length > 0){
                instance.ribbon.find('li').each(function(e){
                    $(this).attr('data-index', e+1);
                });
            }

            if (instance.timer.length === 1) {
                instance.timer.countdown(instance.options.countdownTo, function (event) {
                    var $this = $(this);
                    $this.html(event.strftime(
                        '<div><span class="day">%D</span> <ins>day%!D</ins></div>' + '<div><span>%H<i></i></span><ins class="cd1">hour%!D</ins></div>' + '<div><span>%M<i></i></span><ins class="cd2">minute%!D</ins></div>' + '<div><span class="csec">%S</span><ins class="cd3">second%!D</ins></div>'));
                });
            }

            // all about popups
            $('[data-popup]').click(function(e){
                e.preventDefault();
                var that = $(this),
                    popup = that.data('popup'),
                    winTop = WIN.scrollTop(),
                    winHeight = WIN.height(),
                    pHeight;

                if ($('#'+popup).hasClass('portfolio-popup')){
                    instance.overlay.fadeIn(instance.options.speedAnimation);
                    $('#'+popup).fadeIn(instance.options.speedAnimation);
                    instance.portfolioSlider();

                    pHeight = $('#'+popup).outerHeight();

                    $('#'+popup).css('top', winTop + (winHeight - pHeight)/2);

                }

                instance.popup.hide();

                if (instance.contactmap.length === 1) {

                    setTimeout( function(){
                        setTimeout( function(){
                            $html.addClass('hidden');
                        }, instance.options.speedAnimation );
                        instance.mapFunction();
                        instance.contactmap.height(WIN.height());
                    },0);
                }

                if ($('#'+popup).hasClass('video-popup')){
                    $('#'+popup).fadeIn(instance.options.speedAnimation*2);
                    $html.css('overflow','hidden');
                    instance.popupYtVideo(popup);
                    $('#'+popup).find('.slide-img')
                        .css({opacity: 1, 'visibility': 'visible'});

                    $('#'+popup).find(instance.ytv).on("YTPStart",function(){
                        $('#'+popup).find('.slide-img')
                            .css({opacity: 0, 'visibility': 'hidden'});
                    });
                }
                else {
                    $('#'+popup).fadeIn(instance.options.speedAnimation/2);
                }

                if ($('#'+popup).hasClass('work-popup') || $('#'+popup).hasClass('gallery-popup')){

                    var ind = that.parent().data('index');
                    scrT = DOC.scrollTop();

                    $('body').css('position', 'fixed');
                    instance.header.hide();
                    instance.wrapper.css('marginTop', -scrT);
                    instance.gallSlider(ind);

                }

                if ($('#'+popup).hasClass('team-popup')){

                    scrT = DOC.scrollTop();

                    $('body').css('position', 'fixed');
                    instance.header.hide();
                    instance.wrapper.css('marginTop', -scrT);
                }

            });

            if (instance.contactmap.length === 1 && instance.contactmap.is(':visible'))
                instance.mapFunction();

            // video close button
            instance.vclose.on('click', function(e){
                e.preventDefault();
                $(this).parents('.popup').fadeOut(instance.options.speedAnimation/3);
                $(this).parents('.popup').find(instance.ytv).pauseYTP();
                $html.removeAttr('style');
            });

            // video mute button
            instance.vmute.on('click', function(e){
                e.preventDefault();
                $(this).parents('.popup').find(instance.ytv).toggleVolume();
                $(this).toggleClass('selected');
            });

            // Pause the popup video
            instance.ytv.on("YTPPause",function(){
                $('.wrapper, .header, .footer').css({opacity: 1, visibility: "visible"});
                $html.css('overflow','auto');
                instance.vmute.removeClass('selected');
            });

            // scrollTop function
            if (instance.scrollTop.length === 1) {
                instance.scrollTop.click(function(e){
                    $('html, body').stop(true,true).animate({ scrollTop: 0 }, instance.options.speedAnimation);
                    e.preventDefault();
                });
            }

            // portfolio items sortable
            if ( instance.portfolio.length === 1){
                var folio = instance.portfolio[0];
                var msnry = new Masonry( folio, {
                    columnWidth: 300,
                    itemSelector: '.item'
                });
            }

            this.mclose.on('click', function(e){
                e.preventDefault();
                var self = $(this);
                self.parents('.popup').fadeOut(instance.options.speedAnimation/2);
                $html.removeClass('hidden').removeAttr('style');
            });

            // switch currency
            if (instance.navCurrency.length === 1){
                instance.navCurrency.children().on('click', function(e){
                    e.preventDefault();

                    var $this = $(this),
                        cur = $this.data('currency'),
                        lpos = $this.position().left,
                        fill = $this.parent().find('ins');

                    fill.css({'left' : lpos});

                    $this.addClass('selected').siblings().removeClass('selected');


                    instance.pricing.find('.num').each(function(){
                       var self = $(this),
                           pound = self.data('pounds'),
                           dollar = self.data('dollars'),
                           animSp = 200;

                       if (instance.navCurrency.children().eq(0).hasClass('selected')){
                           self.css({'opacity': 0.2});
                           setTimeout( function(){
                               instance.pricing.find('.num > sup').html(cur);
                               self.find('ins').html(pound);
                               self.css({'opacity' : 1});
                           },animSp);
                       } else {
                           self.css({'opacity': 0.2});
                           setTimeout( function(){
                               instance.pricing.find('.num > sup').html(cur);
                               self.find('ins').html(dollar);
                               self.css({'opacity' : 1});
                           },animSp);
                       }
                    });
                });
            }

            // Works category list
            if (instance.worksNav.length === 1){
                instance.worksNav.lavalamp({
                    duration: instance.options.speedAnimation
                });

                var hsh = window.location.hash.replace('#','.'),
                    worksNavArr = [];

                instance.worksNav.find('li').each(function(){
                    worksNavArr.push($(this).children().data('filter'));
                });

                var worksIndex = worksNavArr.indexOf(hsh.replace('#','.')),
                    worksEq;

                if (worksIndex < 0)
                    worksIndex = 0;

                worksEq = instance.worksNav.children('.lavalamp-item').eq(worksIndex);
                instance.worksNav.data('active', worksEq).lavalamp('update');
                instance.worksNav.children().eq(worksEq.index()).addClass('selected').siblings().removeClass('selected');

            }

            $('a.filter').on('click', function(e){
                e.preventDefault();
                var self = $(this),
                    hrf = self.attr('href'),
                    worksIndex = worksNavArr.indexOf(hrf.replace('#','.')),
                    worksEq = instance.worksNav.children('.lavalamp-item').eq(worksIndex);

                if (!$html.hasClass('ie9'))
                    history.pushState(null,null,hrf);
                else {
                    var scrollmem = $('html,body').scrollTop();
                    window.location.hash = hrf;
                    $('html,body').scrollTop(scrollmem);
                }

                instance.worksNav.data('active', worksEq).lavalamp('update');
                instance.worksNav.children().eq(worksEq.index()).addClass('selected').siblings().removeClass('selected');
            });

            if (instance.worksContainer.length > 0){
                var hsh = window.location.hash.replace('#','.');

                if (hsh == '.all')
                    hsh = 'all';

                instance.worksContainer.mixItUp({
                    load: {
                        filter: hsh != '' ? hsh : 'all'
                    }
                });
            }

            // Activate the subscribe form
            if(this.newsletter.length === 1) {
                this.newsletter.find('input[type=email]').on('keyup', function(){
                    var sucBlock = $('.success-block p');
                    if (sucBlock.is(':visible'))
                        sucBlock.css('display','none');
                });

                this.newsletter.validatr({
                    showall: true,
                    location: 'top',
                    template: '<div class="error-email">'+instance.options.errorText+'</div>',
                    valid: function(){
                        var form = instance.newsletter,
                            loader = form.find('.form-loader'),
                            msgwrap = form.next().find('.success-block'),
                            url = form.attr('action'),
                            email = form.find('input[type=email]'),
                            data = form.serialize();

                        url = url.replace('/post?', '/post-json?').concat('&c=?');

                        var data = {};
                        var dataArray = form.serializeArray();

                        $.each(dataArray, function (index, item) {
                            data[item.name] = item.value;
                        });

                        $.ajax({
                            url: url,
                            data: data,
                            success: function(resp){
                                var successText = instance.options.successText;
                                function notHide(){
                                    form.attr('style',' ');
                                }

                                if(resp.result === 'success') {
                                    msgwrap.html('<p class="success">'+successText+'</p>');
                                    setTimeout(notHide, 0);
                                }
                                else {
                                    setTimeout(notHide, 0);
                                    var index = -1;
                                    var msg;
                                    try {
                                        var parts = resp.msg.split(' - ', 2);
                                        if (parts[1] === undefined) {
                                            msg = resp.msg;
                                        } else {
                                            var i = parseInt(parts[0], 10);
                                            if (i.toString() === parts[0]) {
                                                index = parts[0];
                                                msg = parts[1];
                                            } else {
                                                index = -1;
                                                msg = resp.msg;
                                            }
                                        }
                                    }
                                    catch (e) {
                                        index = -1;
                                        msg = resp.msg;
                                    }
                                    msgwrap.html('<p class="error">' + msg + '</p>');
                                }
                                loader.fadeOut();
                                form.slideUp(0,function () {
                                    msgwrap.slideDown();
                                });
                            },
                            dataType: 'jsonp',
                            error: function (resp, text) {
                                alert('Oops! AJAX error: ' + text);
                            }
                        });
                        return false;
                    }
                });
            }

        },
        startAnima: function(){
            var instance = this,
                head = instance.header,
                wrap = instance.wrapper,
                headBlocks = head.find('.container_12 > *'),
                wrapFirst = wrap.children().eq(0),
                sliderFirst = wrapFirst.find('.anima .container_12 *:not(.button)'),
                sliderNav = wrapFirst.find('.slider-navigation');

            sliderFirst.animate({'opacity' : 1}, instance.options.speedAnimation*3);

            headBlocks.animate({'opacity' : 1}, instance.options.speedAnimation*3);

            sliderNav.animate({ opacity: 1}, instance.options.speedAnimation*3);

        },
        fslider: function(){
            var instance = this,
                parallaxSlider = $('.fullslider.parallax');

            if (instance.fullslider.length > 0){
                instance.fullslider.each(function(e){
                    var $this = $(this),
                        sliderFx = $this.data('fx'),
                        sliderAuto = $this.data('auto');

                    $this.attr('id', 'fullslider-'+e);

                    $this.find('ul.sliderwrap').carouFredSel({
                        responsive : true,
                        auto : sliderAuto ? sliderAuto : false,
                        scroll : {
                            fx : sliderFx ? sliderFx : 'crossfade',
                            duration : instance.options.sliderSpeed,
                            timeoutDuration : instance.options.sliderInterval
                        },
                        items : {
                            visible : 1,
                            width : 900
                        },
                        swipe : {
                            onTouch : true,
                            onMouse : false
                        },
                        prev : '#fullslider-'+e+' [class*=-prev]',
                        next : '#fullslider-'+e+' [class*=-next]',
                        pagination : '#fullslider-'+e+' .slide-nav'
                    });

                    $this.find('ul.sliderwrap').children().css('minHeight', WIN.height())
                        .parent().css('minHeight', WIN.height())
                        .parent().css('minHeight', WIN.height());

                    if ($this.parents('.popup').hasClass('work-popup')){

                        $this.find('ul.sliderwrap').children().css('minHeight', WIN.height() - 250)
                            .parent().css('minHeight', WIN.height() - 250)
                            .parent().css('minHeight', WIN.height() - 250);
                        $this.find('ul.sliderwrap li').each(function(){
                            var self = $(this),
                                bgg = self.find('.bgimg'),
                                bgimg = bgg.find('img'),
                                bgAttr = bgimg.attr('src');
                            bgg.attr('style','background-image: url('+bgAttr+')');
                            bgimg.hide();
                        });
                    }
                });
            }

        },
        gallSlider: function(ind){
            var instance = this;

            if (instance.slidesCont.length > 0){
                instance.slidesCont.each(function(e){
                    var $this = $(this),
                        sliderFx = $this.data('fx'),
                        sliderAuto = $this.data('auto');

                    $this.attr('id', 'slides-'+e);

                    $this.find('ul.sliderwrap').carouFredSel({
                        responsive : true,
                        auto : sliderAuto ? sliderAuto : false,
                        scroll : {
                            fx : sliderFx ? sliderFx : 'crossfade',
                            duration : instance.options.sliderSpeed,
                            timeoutDuration : instance.options.sliderInterval
                        },
                        items : {
                            visible : 1,
                            width : 900,
                            start : ind
                        },
                        swipe : {
                            onTouch : true,
                            onMouse : false
                        },
                        prev : '#slides-'+e+' [class*=-prev]',
                        next : '#slides-'+e+' [class*=-next]'
                    });
                    $this.find('ul.sliderwrap').children().css('minHeight', WIN.height())
                        .parent().css('minHeight', WIN.height())
                        .parent().css('minHeight', WIN.height());

                    if ($this.parents('.popup').hasClass('work-popup')){

                        $this.find('ul.sliderwrap').children().css('minHeight', WIN.height() - 250)
                            .parent().css('minHeight', WIN.height() - 250)
                            .parent().css('minHeight', WIN.height() - 250);
                    }
                });
            }

        },
        slider: function(){
            var instance = this;

            if (instance.sliders.length > 0){
                instance.sliders.each(function(e){
                    var $this = $(this),
                        sliderFx = $this.data('fx'),
                        sliderAuto = $this.data('auto');

                    $this.attr('id', 'slider-'+e);

                    if ($(this).parents(instance.sliders.hasClass('pricing'))) {
                        instance.options.sliderSpeed = 300;
                    }

                    $this.find('ul.sliderwrap').carouFredSel({
                        responsive : true,
                        auto : sliderAuto ? sliderAuto : false,
                        height: 'auto',
                        scroll : {
                            fx : sliderFx ? sliderFx : 'crossfade',
                            duration : instance.options.sliderSpeed,
                            timeoutDuration : instance.options.sliderInterval
                        },
                        items : {
                            visible : 1,
                            width : 900
                        },
                        swipe : {
                            onTouch : true,
                            onMouse : false
                        },
                        prev : $('#slider-'+e).parents('section').find('[class*=-prev]'),
                        next : $('#slider-'+e).parents('section').find('[class*=-next]'),
                        pagination: {
                            container: $('#slider-'+e).parents('section').find('.slide-nav'),
                            anchorBuilder: function() {
                                if ($(this).parents(instance.sliders.hasClass('pricing'))) {
                                var per = $(this).data('period');
                                return '<a href="#"><span>'+ per +'</span></a>';
                                }
                        }
                }
                    }).parent().css('margin', 'auto').css('minHeight', 50);
                });
            }

        },
        ribbonSlider: function(){
            var instance = this;

            if (instance.ribbon.length > 0){
                instance.ribbon.each(function(e){
                    var $this = $(this),
                        sliderAuto = $this.data('auto');

                    $this.attr('id', 'ribbonslider-'+e);

                    $this.find('ul.sliderwrap').carouFredSel({
                        circular: true,
                        infinite: true,
                        width: '100%',
                        auto : sliderAuto ? sliderAuto : false,
                        items: {
                            visible: 'odd+2'
                        },
                        scroll: {
                            fx: 'directscroll',
                            items: 2,
                            timeoutDuration: instance.options.sliderInterval
                        },
                        pagination : $('#ribbonslider-'+e).parents('section').find('.slide-nav')
                    }).parent().css('margin', 'auto').width(WIN.width());
                });
            }
        },
        fNum: function(){
            var instance = this,
                numbS;

            if (instance.num.length > 0){

                instance.num.parents('.content').each(function(){
                    var self = $(this),
                        winTop = WIN.scrollTop(),
                        topPos = self.offset().top - WIN.height(),
                        blHeight = self.height() - 100,
                        sectionTop = self.parents('section').offset().top;

                    if (!self.hasClass('target')) {
                        self.find(instance.num).each(function(){
                            var $this = $(this),
                                numb = $this.data('num'),
                                incr = $this.data('increment'),
                                fractional = $this.data('fractional') ? $this.data('fractional') : 0,
                                i = 0,
                                timer;

                            if ( (winTop >= topPos && winTop <= (topPos + blHeight)) && !onMobile || (winTop === sectionTop)){
                                timer = setTimeout(function run() {
                                    if ( i < numb) i+=incr;
                                    else {
                                        i = numb;
                                        $this.text(i.toFixed(fractional).replace('.',',').replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 '));
                                        return i;
                                    }
                                    $this.text(i.toFixed(fractional).replace('.',',').replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 '));

                                    if ( instance.skillLine.length > 0){
                                        $this.parent().prev().find('.num-line ins').animate({'width' : i*10 + '%'}, 17);
                                    }

                                    timer = setTimeout(run, 20);
                                }, 20);

                                $this.parents('.content').addClass('target');
                            }
                            else {
                                numbS = numb.toString().replace('.',',');
                                $this.text(numbS.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 '));
                                if ( instance.skillLine.length > 0){
                                    $this.parent().prev().find('.num-line ins').css('width', numb*10 + '%');
                                }
                            }
                        });
                    }
                });

            }
        },
        fHei: function(){
            this.fullHeight.css({
                'marginTop' : 0,
                'marginBottom' : 0,
                'padding' : 0,
                'minHeight' : WIN.height()
            });

        },
        fMiddle: function(){
            this.middle.each(function(){
                if ( ! $(this).prev().length ){
                    $(this).css({
                        'marginTop' : ($(this).parent().outerHeight() - $(this).outerHeight())/2
                    });
                } else{
                    $(this).css({
                        'marginTop' : ($(this).parent().outerHeight() - $(this).outerHeight())/2 - $(this).prev().css('paddingTop').replace('px','')
                    });
                }

            });
        },
        headerScroll: function(){
            var winTop = WIN.scrollTop(),
                scrTop = $('.scrolltop');

            if (winTop > 10 && this.header.hasClass('fixed') && !this.body.hasClass('loading'))
                this.header.addClass('scrolling');
            else
                this.header.removeClass('scrolling');

            if (winTop > 100)
                scrTop.fadeIn(this.options.speedAnimation);
            else
                scrTop.fadeOut(this.options.speedAnimation);
        },
        innerMenu: function(){
            var instance = this;

            instance.header.find('.slicknav_nav a').on('click', function(e){
                var self = $(this),
                    url = self.attr('href');

                if ( !self.hasClass('external') && !self.parent().hasClass('slicknav_parent') ){
                    e.preventDefault();
                    $('html, body').stop(true, true)
                        .animate({ scrollTop : $(url).offset().top},
                        instance.options.speedAnimation);
                }
                if (self.next().length == 0) {
                    instance.header.removeClass('opened').css('height','auto');
                    $('.slicknav_btn').removeClass('slicknav_open').addClass('slicknav_collapsed');
                    $('.slicknav_nav').addClass('slicknav_hidden');
                }
            });

            this.menu.onePageNav({
                filter: ':not(.external)',
                scrollThreshold: 0.25
            });

            instance.wrapper.on('touchstart mouseenter touchmove touchend', function(){
                if (instance.menu.find('ul').is(':visible')){
                    instance.menu.find('ul').css({
                        'visibility' : 'hidden',
                        'opacity' : 0
                    });
                }
                instance.menu.find('ul').removeAttr('style');
            })

        },
        ytVideo: function(){
            var instance = this;

            if (instance.ytvid.length > 0 && !onMobile){
                instance.ytvid.each(function(){
                    $(this).on("YTPStart",function(){
                        $(this).parents('section').find('.slide-img').show().css({opacity: 1, visibility: "hidden"}).animate({opacity: 0}, instance.options.speedAnimation);
                    });
                    $(this).mb_YTPlayer({
                        containment: 'self',
                        opacity: 1,
                        mute: true,
                        autoPlay: true,
                        loop: true,
                        addRaster: false
                    });
                });

            }
        },
        popupYtVideo: function(popup){
            var instance = this,
                videoNav = $('.video-nav');

            if (instance.ytv.length > 0){

                if( !onMobile ) {
                    instance.ytv.css({
                        'height' : WIN.height(),
                        'width' : WIN.width()
                    });

                    if ($('#'+popup).find(instance.ytv).hasClass('mb_YTVPlayer')) {
                        $('#'+popup).find(instance.ytv).playYTP();
                    } else {

                        $('#'+popup).find(instance.ytv).mb_YTPlayer({
                            containment:'self',
                            opacity: 1,
                            mute: false,
                            loop: true,
                            autoPlay: true
                        });
                    }

                    WIN.resize(function(){
                        instance.ytv.css({
                            'height' : WIN.height(),
                            'width' : WIN.width()
                        });
                    })
                } else {
                    instance.mclose.show();
                    videoNav.hide();
                    instance.mvPlayer.mb_YTPlayer({
                        containment:'self',
                        opacity: 1,
                        mute: false,
                        loop: false,
                        autoPlay: false
                    });
                }

            }
        },
        portfolioSlider: function(){
            var instance = this;
            instance.portfolioImgs.each(function(e){
                var $this = $(this),
                    sliderFx = $this.data('fx');

                $this.parent().parent().attr('id', 'pfolio-'+e);
                $this.carouFredSel({
                    circular : true,
                    infinite : true,
                    auto : false,
                    responsive : true,
                    align : 'center',
                    height: 'variable',
                    items : {
                        visible : 1,
                        width : 1,
                        height: 'variable'
                    },
                    scroll : {
                        fx : sliderFx ? sliderFx : 'crossfade'
                    },
                    swipe : {
                        onTouch : true,
                        onMouse : false
                    },
                    prev : '#pfolio-'+e+' .slide-prev',
                    next : '#pfolio-'+e+' .slide-next',
                    pagination : '#pfolio-'+e+' .slide-nav'
                });
            });

        },
        mapFunction: function(){
            var instance = this,
                map,
                x = instance.options.locations[0],
                y = instance.options.locations[1],
                winWidth = WIN.width();

            if (instance.contactmap.length === 1) {

                var myOptions = {
                    zoom: instance.options.zoom,
                    scrollwheel: false,
                    navigationControl: false,
                    mapTypeControl: false,
                    scaleControl: false,
                    draggable: true,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    center: new google.maps.LatLng(x, y)
                };

                map = new google.maps.Map(document.getElementById('contact-map'), myOptions);


                var image = "images/infopointer.png";

                if (instance.contactmap.hasClass('thinmap'))
                    image = "images/infopointer-dark.png";

                var marker = new google.maps.Marker({
                    position: map.getCenter(),
                    map: map,
                    icon: image
                });

                var boxText = document.createElement("div");
                boxText.innerHTML = "<div class='ib-inner inverse aligned center'>" +
                    "<h3>"+instance.options.infoBoxName+"</h3>"+
                "<p>" + instance.options.infoBoxDescription+"</p>" +
                    "<a href='"+instance.options.infoBoxUrl+"' target='_blank' style='color:#fff !important;'>"+instance.options.infoBoxUrlText+"</a>" +
                    "</div>";

                var infoOpt = {
                    content: boxText,
                    disableAutoPan: false,
                    pixelOffset: new google.maps.Size(0, 0),
                    boxClass: 'map-box',
                    alignBottom: true,
                    closeBoxURL: "images/infoclose.png",
                    pane: "floatPane"
                };

                var ib = new InfoBox(infoOpt);

                ib.open(map, marker);

                google.maps.event.addListener(marker, "click", function() {
                    ib.open(map, marker);
                });

            }
        }
    };

    $.fn[pluginName] = function (options) {
        return this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName,
                    new Plugin(this, options));
            }
        });
    };
})(jQuery, window, document);

(function ($) {
    $(document.body).aisconverse();

    $(window).load(function() {
        $('#status').fadeOut();
        $('#preloader').delay(350).fadeOut();
    });

    $('#alert-hide').fadeOut(8000);

    // palette actions
    var palette = $('#palette'),
        speedAnima = 500;

    palette.addClass('open').delay(speedAnima*2)
        .animate({ 'left' : 0 }, speedAnima, 'easeInCubic');
    palette.delay(speedAnima*2)
        .animate({'left' : -150}, speedAnima, 'easeInOutQuart', function(){
            $(this).removeClass('open');
        });
    palette.find('> a').click(function(e){
        if (palette.hasClass('open')){
            palette.removeClass('open').stop(true,true)
                .animate({ 'left' : -150 }, speedAnima, 'easeInOutQuart');
        } else {
            palette.addClass('open').stop(true,true)
                .animate({ 'left' : 0 }, speedAnima, 'easeInCubic');
        }
        e.preventDefault();
    });
    palette.mouseenter(function(){
        $(this).clearQueue();
    });
    palette.find('nav a').click(function(e){
        e.preventDefault();
        var $this = $(this),
            skin = $this.attr('id');
        $this.addClass('selected').siblings().removeClass('selected');
        $('body').removeClass().addClass(skin);
        if ( $this.hasClass('default'))
            $('body').removeClass();
    });


})(jQuery);