jQuery.noConflict();
jQuery(document).ready( function($) {
    $("ul.dropdown")
        .mouseover( function() {
            $(this).children("ul").css("display","block");
        })
        .mouseout( function() {
            t = setTimeout(function(){
                $(this).children("ul").css("display","none");                        
            }, 100); // adjust your time here
        });
        $(this).children("ul").hover(function(){
            clearTimeout(t);
        },function(){
            t = setTimeout(function(){
                $(this).children("ul").css("display","none");                        
            }, 100); // adjust your time here
        });
});