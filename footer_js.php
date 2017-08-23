 <footer class="footer-v1 footer" style=" background:#5B3A10 !important; color:#fff !important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 margin-b-30">
                        <h3>Connect With Us</h3>
                        <p><i class="fa fa-facebook" aria-hidden="true"></i> <a href="https://mobile.twitter.com/UgandaChamber" target="_blank">FaceBook</a></p>
                        <p><i class="fa fa-twitter" aria-hidden="true"></i> <a href="https://mobile.twitter.com/UgandaChamber" target="_blank">Twitter</a></p>
                       <!--  <p><i class="fa fa-google-plus" aria-hidden="true"></i> <a href="#">Google Plus</a></p>
                        <p><i class="fa fa-linkedin" aria-hidden="true"></i> <a href="#">Linkedin</a></p> -->
                        <p><i class="fa fa-youtube" aria-hidden="true"></i> <a href="#">YouTube</a></p>
                    </div>
                    <div class="col-md-4 margin-b-30">
                        <h3>Mission</h3>
                        <p>To Promote, through the collective action of members, 
                            the growth and development of Uganda's mining and petroleum industry,
                             for the benefit of all Ugandans and investors.</p>
                    </div>
                    <div class="col-md-4 margin-b-30">
                        <h3>Visit us</h3>
                        <p><i class="fa fa-home" aria-hidden="true"></i>
                            3rd Floor, Amber House</p>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> Plot 29/33, Kampala Road</p>
                            <p><i class="fa fa-phone" aria-hidden="true"></i>+256(0) 393-516-695, +256(0) 414-976-674</p>
                            <p><i class="fa fa-location-arrow" aria-hidden="true"></i> P.O. Box 71797 Kampala</p>
                            <p><i class="fa fa-envelope-o" aria-hidden="true"></i>  info@ucmp.ug or events@ucmp.ug</p>
                    </div>

                </div>
                <!--<div class="space-30"></div>-->
                <div class="footer-bottom" style="margin-top:-1em;">
                    <div class="space-10"></div>
                    <div class="row">
                        <div class="col-sm-12 text-center text-white">
                            <span>&copy; Copyright 2017 Uganda Chamber of Mines and Petroleum. All Rights Reserved | Powered By: 
                               <a href="http://www.hivetechug.com" target="_blank">Hive Technologies Ltd</a></span>
                        </div>
        
                    </div>
                </div>
            </div>
        </footer>
        <!--back to top-->
        <a href="#" class="scrollToTop"><span class="livicon " data-size="32" data-name="angle-double-up" data-duration="1000"></span></a>
        <!--back to top end-->

        <!-- jQuery plugins-->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="js/jquery-migrate.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/bootstrap-hover-dropdown.min.js"></script>
        <script src="live-icon/raphael-min.js"></script>
        <script src="live-icon/livicons-1.4.min.js"></script>
        <script src="bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js" type="text/javascript" ></script>
        <script src="owl-carousel/owl.carousel.min.js"></script>
        <script src="bower_components/flexslider/jquery.flexslider-min.js"></script>
        <script src="js/jquery.appear.js" type="text/javascript" ></script>
        <script src="js/modernizr.custom.97074.js" type="text/javascript"></script>
        <script src="js/jquery.stellar.min.js" type="text/javascript"></script>
        <script src="js/jquery.BlackAndWhite.js"></script>
        <script src="bower_components/lightbox2/dist/js/lightbox.min.js"></script>
        <script src="js/jquery.hoverdir.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="bower_components/wow/dist/wow.min.js"></script>
        <script src="js/headroom.js"></script>
        <script src="js/versa.js" type="text/javascript"></script>
        <!--page template scripts-->
        <script src="masterslider/masterslider.min.js"></script> 
        <!--cube portfolio-->
        <script src="cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            (function ($) {
                "use strict";
                var slider = new MasterSlider();

                // adds Arrows navigation control to the slider.
                slider.control('arrows');
                slider.control('timebar', {insertTo: '#masterslider'});
                slider.control('bullets');

                slider.setup('masterslider', {
                    width: 1400, // slider standard width
                    height: 600, // slider standard height
                    space: 0,
                    layout: 'fullwidth',
                    loop: true,
                    preload: 0,
                    instantStartLayers: true,
                    autoplay: true
                });
            })(jQuery);
        </script>
        <script>
            (function ($, window, document, undefined) {
                'use strict';

                var gridContainer = jQuery('#grid-container'),
                        filtersContainer = jQuery('#filters-container'),
                        wrap, filtersCallback;


                /*********************************
                 init cubeportfolio
                 *********************************/
                gridContainer.cubeportfolio({
                    layoutMode: 'fullwidth',
                    rewindNav: true,
                    scrollByPage: false,
                    defaultFilter: '*',
                    animationType: 'slideLeft',
                    gapHorizontal: 0,
                    gapVertical: 0,
                    gridAdjustment: 'responsive',
                    mediaQueries: [{
                            width: 800,
                            cols: 3
                        }, {
                            width: 500,
                            cols: 2
                        }, {
                            width: 320,
                            cols: 1
                        }],
                    caption: 'zoom',
                    displayType: 'lazyLoading',
                    displayTypeSpeed: 100
                });


                /*********************************
                 add listener for filters
                 *********************************/
                if (filtersContainer.hasClass('cbp-l-filters-dropdown')) {
                    wrap = filtersContainer.find('.cbp-l-filters-dropdownWrap');

                    wrap.on({
                        'mouseover.cbp': function () {
                            wrap.addClass('cbp-l-filters-dropdownWrap-open');
                        },
                        'mouseleave.cbp': function () {
                            wrap.removeClass('cbp-l-filters-dropdownWrap-open');
                        }
                    });

                    filtersCallback = function (me) {
                        wrap.find('.cbp-filter-item').removeClass('cbp-filter-item-active');
                        wrap.find('.cbp-l-filters-dropdownHeader').text(me.text());
                        me.addClass('cbp-filter-item-active');
                        wrap.trigger('mouseleave.cbp');
                    };
                } else {
                    filtersCallback = function (me) {
                        me.addClass('cbp-filter-item-active').siblings().removeClass('cbp-filter-item-active');
                    };
                }

                filtersContainer.on('click.cbp', '.cbp-filter-item', function () {
                    var me = $(this);

                    if (me.hasClass('cbp-filter-item-active')) {
                        return;
                    }

                    // get cubeportfolio data and check if is still animating (reposition) the items.
                    if (!$.data(gridContainer[0], 'cubeportfolio').isAnimating) {
                        filtersCallback.call(null, me);
                    }

                    // filter the items
                    gridContainer.cubeportfolio('filter', me.data('filter'), function () {
                    });
                });


                /*********************************
                 activate counter for filters
                 *********************************/
                gridContainer.cubeportfolio('showCounter', filtersContainer.find('.cbp-filter-item'), function () {
                    // read from url and change filter active
                    var match = /#cbpf=(.*?)([#|?&]|$)/gi.exec(location.href),
                            item;
                    if (match !== null) {
                        item = filtersContainer.find('.cbp-filter-item').filter('[data-filter="' + match[1] + '"]');
                        if (item.length) {
                            filtersCallback.call(null, item);
                        }
                    }
                });

            })(jQuery, window, document);
        </script>

        <script type="text/javascript">
 $(document).ready(function() {
    $('.thumbnail').click(function(){
      $('.modal-body').empty();
    var title = $(this).parent('a').attr("title");
    $('.modal-title').html(title);
    $($(this).parents('div').html()).appendTo('.modal-body');
    $('#myModal').modal({show:true});
});
});
        </script>


        <script type="text/javascript">

    $(document).ready(function(){
        // -----------------------------------------------------------------------
    $.each($('.nav').find('li'), function() {
        $(this).toggleClass('active', window.location.pathname.indexOf($(this).find('a').attr('href')) > -1);
    });

    });

</script>
    </body>
</html>
