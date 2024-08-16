(function ($) {

    "use strict";

    var WatchForChanges = {

        init: function (){
            var $watchers = $('.trawell-watch-for-changes');

            if(trawell_empty($watchers)){
                return;
            }

            $watchers.each(this.initWatching)
        },

        initWatching: function (i, elem){
            var $elem = $(elem),
                watchedElemClass = $elem.data('watch'),
                forValue = $elem.data('hide-on-value');

            $('body').on('change', '.' + watchedElemClass, hideByValue);

            function hideByValue(){
                var $this = $(this);

                if(!$this.hasClass(watchedElemClass)){
                    $this = $('.' + watchedElemClass + ':checked, ' + '.' + watchedElemClass + ':checked');
                }

                if(trawell_empty($this)){
                    return false;
                }

                var val = $this.val();

                if(val === forValue){
                    $elem.slideUp('fast');
                    return true;
                }

                $elem.slideDown('fast');
                return false;
            }

            hideByValue();
        }

    };

    $(document).ready(function ($) {

        $('body').on('click', 'img.trawell-img-select', function (e) {
            e.preventDefault();
            $(this).closest('ul').find('img.trawell-img-select').removeClass('selected');
            $(this).addClass('selected');
            $(this).closest('ul').find('input').removeAttr('checked');
            $(this).closest('li').find('input').attr('checked', 'checked');
        });

        $("body").on('click', '#trawell_welcome_box_hide',function(e){
            e.preventDefault();
            $(this).parent().fadeOut(300).remove();
            $.post(ajaxurl, {action: 'trawell_hide_welcome'}, function(response) {});
        });

        $("body").on('click', '#trawell_update_box_hide',function(e){
            e.preventDefault();
            $(this).parent().remove();
            $.post(ajaxurl, {action: 'trawell_update_version'}, function(response) {});
        });

        $('body').on('click', '.mks-twitter-share-button', function(e) {
            e.preventDefault();
            var data = $(this).attr('data-url');
            trawell_social_share(data);
        });

        function trawell_social_share(data) {
            window.open(data, "Share", 'height=500,width=760,top=' + ($(window).height() / 2 - 250) + ', left=' + ($(window).width() / 2 - 380) + 'resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0');
        }

        $('#page_template').change(function(e) {
            trawell_template_change();
        });

        function trawell_template_change(){

            var template = $('select#page_template').val();

            if (template === 'template-blank.php') {
                $('#trawell_page_display_layout').fadeOut(300, function (){
                    $('#trawell_blank_page_template').fadeIn(300);
                });
            }else{
                $('#trawell_blank_page_template').fadeOut(300, function (){
                    $('#trawell_page_display_layout').fadeIn(300);
                });
            }
        }

        trawell_template_change();

        WatchForChanges.init();
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

        if (variable === 0 || variable === '0') {
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

        if (variable === false) {
            return true;
        }

        if (typeof variable === 'object' && $.isEmptyObject(variable)) {
            return true;
        }

        return false;
    }

})(jQuery);