jQuery(function($){
    $('.fabs-links').each(function(links){
        $('.category', links).each(function(i, category){
            $('h2', category).click(function(){
                $(category).toggleClass("category-open");
            });
        });
    });
});