jQuery(document).ready(function ($) {
    "use strict";
    // ajax paginstion
    var total = bauhaus_obj.max_num_pages;
    var ajax = true;
    var count = 2;

    // language swither
    $('.lang_sw a').click(function (e) {

        var myindex = $(this).index();

        jQuery('.lang_sw a').removeClass('active');
        jQuery('.lang_sw li').removeClass('active');
        $(this).addClass('active');
        $('.lang_sw li').eq(myindex).addClass('active');

    });

    $('.lang_sw li').click(function (e) {

        var myindex = $(this).index();


        jQuery('.lang_sw a').removeClass('active');
        jQuery('.lang_sw li').removeClass('active');
        $(this).addClass('active');
        $('.lang_sw a').eq(myindex).addClass('active');
    });


    $('.load-more .btn').click(function () {


        if (ajax) {
            if (count > total + count) {
                return false;
            } else {
                if (jQuery("div").is(".no_posts_1")) return;
                loadArticle(count);
                count++;


            }
            ajax = false;
        }
        return false;


    });


    function loadArticle(pageNumber) {

        var ofset = $(".place_li_cont .post").length;
        var cat = bauhaus_obj.cat;
        var is_sticky = "";
        var tag = bauhaus_obj.tag;
        var year = bauhaus_obj.year;
        var monthnum = bauhaus_obj.monthnum;
        var day = bauhaus_obj.day;
        var s = bauhaus_obj.s;
        var type = bauhaus_obj.type;

        jQuery('.load-more .btn').attr('disabled', true);
        $.ajax({
            async: true,
            url: bauhaus_obj.ajaxurl,
            type: 'POST',

            data: "action=bauhaus_infinite_scroll&page_no=" + pageNumber + "&ofset=" + ofset +
            "&cat=" + cat + '&tag=' + tag + "&is_sticky=" + is_sticky + '&year=' + year + '&monthnum=' + monthnum +
            '&day=' + day + '&s=' + s + '&type=' + type,


            success: function (html) {

                jQuery('.load-more .btn').attr('disabled', false);
                if (type == 'masonry') {


                    var $container = jQuery('#masonry_container');
                    var $moreBlocks = jQuery(html).filter('div.post');
                    $container.append($moreBlocks).isotope('addItems', $moreBlocks);

                    setTimeout(function () {
                        $container.isotope();
                    }, 100);

                } else {


                    jQuery(".place_li_cont").append(html);


                }

                ajax = true;
            }


        });
        return false;
    }

    jQuery(".bauhaus_upload_file").change(function (event) {

        files = this.files;
        event.stopPropagation();
        event.preventDefault();

        //files

        var data2 = new FormData();
        $.each(files, function (key, value) {
            data2.append(key, value);
        });
        data2.append('action', 'bauhaus_fiu_upload_file');

        $.ajax({
            url: bauhaus_obj.ajaxurl,
            type: 'POST',
            data: data2,
            cache: false,
            processData: false, //Don't process the files)
            contentType: false, // this is not string
            success: function (respond, textStatus, jqXHR) {
                if (respond == 1) {
                    $('.success-message').show();
                } else {
                    $('.error-message').show();
                }


            },
            error: function (jqXHR, textStatus, errorThrown) {

                $('.error-message').show();

            }
        });


    });

});

