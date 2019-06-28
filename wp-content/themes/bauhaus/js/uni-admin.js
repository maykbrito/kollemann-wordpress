(function($){
$(function() {

    var $page_template = $('#page_template'),
        $about_metabox = $('#about_meta_box');
        $service_metabox = $('#service_meta_box');

    $about_metabox.hide();

    $page_template.on("change", function() {
        if ( $(this).val() == 'templ-about.php' ) {
            $about_metabox.show();
            $service_metabox.hide();
        } else if ( $(this).val() == 'templ-service.php' ) {
            $service_metabox.show();
            $about_metabox.hide();
        } else {
            $about_metabox.hide();
            $service_metabox.hide();
        }
    }).change();

});
})(jQuery);