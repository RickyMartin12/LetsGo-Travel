(function($) {
    $(document).ready(function() {

        /* Initialize sortable options */
        trawell_opt_sortable();

        $(document).on('widget-added', function(e) {
            trawell_opt_sortable();
        });

        $(document).on('widget-updated', function(e) {
            trawell_opt_sortable();

        });

        /* Make some options sortable */
        function trawell_opt_sortable() {
            $(".trawell-widget-content-sortable").sortable({
                revert: false,
                cursor: "move"
            });
        }

    });

})(jQuery);