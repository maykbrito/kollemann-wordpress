jQuery(document).ready(function($) {
    'use strict';


    var wordpress_ver =  bauhaus_admin_obj.version, upload_button;
    $(".bauhaus_upload_image_button").click(function(event) {

        upload_button = $(this);
        var frame;
        if (wordpress_ver >= "3.5") {
            event.preventDefault();
            if (frame) {
                frame.open();
                return;
            }
            frame = wp.media();
            frame.on( "select", function() {
                // Grab the selected attachment.
                var attachment = frame.state().get("selection").first();
                frame.close();
                if (upload_button.parent().prev().children().hasClass("tax_list")) {
                    upload_button.parent().prev().children().val(attachment.attributes.url);
                    upload_button.parent().prev().prev().children().attr("src", attachment.attributes.url);
                }
                else
                    $("#taxonomy_image").val(attachment.attributes.url);
            });
            frame.open();
        }
        else {
            tb_show("", "media-upload.php?type=image&amp;TB_iframe=true");
            return false;
        }
    });

    $(".bauhaus_remove_image_button").click(function() {
        $(".taxonomy-image").attr("src", "' . bauhaus_IMAGE_PLACEHOLDER . '");
        $("#taxonomy_image").val("");
        $(this).parent().siblings(".title").children("img").attr("src","' . bauhaus_IMAGE_PLACEHOLDER . '");
        $(".inline-edit-col :input[name=\'taxonomy_image\']").val("");
        return false;
    });

    if (wordpress_ver < "3.5") {
        window.send_to_editor = function(html) {
            var imgurl = $("img",html).attr("src");
            if (upload_button.parent().prev().children().hasClass("tax_list")) {
                upload_button.parent().prev().children().val(imgurl);
                upload_button.parent().prev().prev().children().attr("src", imgurl);
            }
            else
                $("#taxonomy_image").val(imgurl);
            tb_remove();
        }
    }

    $(".editinline").click(function() {
        var tax_id = $(this).parents("tr").attr("id").substr(4);
        var thumb = $("#tag-"+tax_id+" .thumb img").attr("src");

        if (thumb != "' . bauhaus_IMAGE_PLACEHOLDER . '") {
            $(".inline-edit-col :input[name=\'taxonomy_image\']").val(thumb);
        } else {
            $(".inline-edit-col :input[name=\'taxonomy_image\']").val("");
        }

        $(".inline-edit-col .title img").attr("src",thumb);
    });




    // Uploading files
    var file_frame;

    jQuery.fn.upload_bauhaus_image = function( button ) {
        var button_id = button.attr('id');
        var field_id = button_id.replace( '_button', '' );

        // If the media frame already exists, reopen it.
        if ( file_frame ) {
            file_frame.open();
            return;
        }

        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
            title: jQuery( this ).data( 'uploader_title' ),
            button: {
                text: jQuery( this ).data( 'uploader_button_text' ),
            },
            multiple: false
        });

        // When an image is selected, run a callback.
        file_frame.on( 'select', function() {
            var attachment = file_frame.state().get('selection').first().toJSON();
            jQuery("#"+field_id).val(attachment.id);
            jQuery("#bauhausimagediv img").attr('src',attachment.url);
            jQuery( '#bauhausimagediv img' ).show();
            jQuery( '#' + button_id ).attr( 'id', 'remove_bauhaus_image_button' );
            jQuery( '#remove_bauhaus_image_button' ).text( 'Remove bauhaus image' );
        });

        // Finally, open the modal
        file_frame.open();
    };

    jQuery('#bauhausimagediv').on( 'click', '#upload_bauhaus_image_button', function( event ) {
        event.preventDefault();
        jQuery.fn.upload_bauhaus_image( jQuery(this) );
    });

    jQuery('#bauhausimagediv').on( 'click', '#remove_bauhaus_image_button', function( event ) {
        event.preventDefault();
        jQuery( '#upload_bauhaus_image' ).val( '' );
        jQuery( '#bauhausimagediv img' ).attr( 'src', '' );
        jQuery( '#bauhausimagediv img' ).hide();
        jQuery( this ).attr( 'id', 'upload_bauhaus_image_button' );
        jQuery( '#upload_bauhaus_image_button' ).text( 'Set bauhaus image' );
    });

});