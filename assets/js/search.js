jQuery(function($)
{
    var parent = $(".search_input");
    parent.find("button").click(function(){
        var string = parent.find("#key").val();
        if(string != ""){
            var cat = $(".selected-inner").html();
            parent.parent().submit();
        }
        return false;
    });
});