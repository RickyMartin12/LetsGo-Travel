(function($) {

    "use strict";

    $(document).ready(function($) {


        /* Image select option */

        $('body').on('click', 'img.trawell-img-select', function(e) {
            e.preventDefault();
            var $this = $(this);
            $this.closest('ul').find('img.trawell-img-select').removeClass('selected');
            $this.addClass('selected');
            $this.closest('ul').find('input').removeAttr('checked');
            $this.closest('li').find('input').attr('checked', 'checked');

            if($this.hasClass('trawell-category-sidebar-position')){
                var val = $this.closest('li').find('input').val(),
                    $postLayouts = $('.trawell-category-posts-display-settings'),
                    $postLayoutsSid = $('.trawell-category-posts-display-settings-sid');

                if(val === 'none'){
                    $postLayouts.removeClass('trawell-hidden-i');
                    $postLayoutsSid.addClass('trawell-hidden-i');
                    return;
                }

                $postLayouts.addClass('trawell-hidden-i');
                $postLayoutsSid.removeClass('trawell-hidden-i');
            }
        });

        $('.trawell-category-settings-type').change(function (){
            var $this = $(this),
                val = $this.val(),
                $displaySettings = $('.trawell-layout-opt');

            if(val === 'inherit'){
                $displaySettings.addClass('trawell-hidden-i');
            }else{
                $displaySettings.removeClass('trawell-hidden-i');
                var $sidebarPosition = $('.trawell-category-sidebar-position.selected ~ input[type="radio"]'),
                    sidebarPosition = $sidebarPosition.val(),
                    $postLayouts = $('.trawell-category-posts-display-settings'),
                    $postLayoutsSid = $('.trawell-category-posts-display-settings-sid');

                $postLayouts.addClass('trawell-hidden-i');
                $postLayoutsSid.addClass('trawell-hidden-i');

                if(sidebarPosition === 'none'){
                    $postLayouts.removeClass('trawell-hidden-i');
                    $postLayoutsSid.addClass('trawell-hidden-i');
                }else{
                    $postLayouts.addClass('trawell-hidden-i');
                    $postLayoutsSid.removeClass('trawell-hidden-i');
                }
            }
        });

        $('body').on('click', '.trawell-cover-layout', function(e) {
            var $this = $(this),
                val = $this.find('~ input[type="radio"]').val(),
                $coverSettings = $('.trawell-cover-map-settings');

            if(val === 'classic'){
                $coverSettings.slideUp(200);
                return true;
            }

            $coverSettings.slideDown(200);
        });

        
        /* Color picker metabox handle */

        if ($('.trawell-colorpicker').length) {

            $('.trawell-colorpicker').wpColorPicker();

             $('body').on('click', 'a.trawell-rec-color', function(e) {
                e.preventDefault();
                $('.trawell-colorpicker').val($(this).attr('data-color'));
                $('.trawell-colorpicker').change();
            });
        }


        /* Color picker toggle */

        trawell_toggle_color_picker();

        $('body').on('click', 'input.color-type', function(e) {
            trawell_toggle_color_picker();
        });


        /* Image upload */
        var meta_image_frame;

        $('body').on('click', '#trawell-image-upload', function(e) {

            e.preventDefault();

            if (meta_image_frame) {
                meta_image_frame.open();
                return;
            }

            meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
                title: 'Choose your image',
                button: {
                    text: 'Set Category image'
                },
                library: {
                    type: 'image'
                }
            });

            meta_image_frame.on('select', function() {

                var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
                $('#trawell-image-url').val(media_attachment.url);
                $('#trawell-image-preview').attr('src', media_attachment.url);
                $('#trawell-image-preview').show();
                $('#trawell-image-clear').show();

            });

            meta_image_frame.open();
        });


        $('body').on('click', '#trawell-image-clear', function(e) {
            $('#trawell-image-preview').hide();
            $('#trawell-image-url').val('');
            $(this).hide();
        });



        function trawell_toggle_color_picker() {
            var picker_value = $('input.color-type:checked').val();
            if (picker_value == 'custom') {
                $('#trawell-color-wrap').show();
            } else {
                $('#trawell-color-wrap').hide();
            }
        }

    });

})(jQuery);