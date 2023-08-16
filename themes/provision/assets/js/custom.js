jQuery(window).on("load", function () {
    
    if(window.location.href.split("#")[1]){
        var urlHash = window.location.href.split("#")[1];
        jQuery('html,body').animate({
            scrollTop: jQuery('#' + urlHash).offset().top - jQuery('header.site-header').outerHeight()
        }, 150);
    }
});

jQuery( document ).ready(function($) {

//    jQuery('.disablestate').find('.ginput_container').find('#input_5_22').attr('disabled','disabled');
//    jQuery('.sel-radio').on('click',function(e){
//        e.preventDefault();
//        var $this = jQuery(this);
//        jQuery('#sel_plan_btn').removeAttr('disabled');
//        if(jQuery(this).parent().parent().find("input[name^='plan']").is(':checked')){
//            jQuery(this).parent().parent().find("input[name^='plan']").prop("checked", false);
//            $this.parents('.steps-widgets-two').find('.widget').removeClass('selected');
//        }else{
//            jQuery(this).parent().parent().find("input[name^='plan']").prop("checked", true);
//            $this.parents('.steps-widgets-two').find('.widget').removeClass('selected');
//            $this.parents('.widget').addClass('selected');
//        }
//    });

    
    
    
    

/*    jQuery('.term-and-condition a.form-link').magnificPopup({
        type: 'iframe'
        // other options
    });*/
    
    
    
    
    
    

    
     
    
});

