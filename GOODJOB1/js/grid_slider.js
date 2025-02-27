$( function() {
    
    // Image Block Manipulator
    var curFirstImage = 0;

    // Get Total # of Images to Scroll
    var numImageBlocks = $(".imgblock").length;
    //alert(numImageBlocks);

    $(".arrow-right").on("click", function() {
        if ( curFirstImage <= numImageBlocks-4 ) {
            curFirstImage += 1;
            move = (curFirstImage*320*-1);
            $("div.imageblock").css("left", move+"px");
        }
    });


    $(".arrow-left").on("click", function() {
        if ( curFirstImage > 0 ) {
            curFirstImage -= 1;
            move = (curFirstImage*320*-1);
            $("div.imageblock").css("left", move+"px");
        }
    });


    $(".imgblock").click( function() {
        var whichimgblock = $(this).index();

        $("#mapDetailBlock").css("display", "block");
        $(".mapdetail").css("display", "none");
        $("#mapDetailBlock > #detail"+whichimgblock).css("display", "block");
    });

    
    $(".closepopup").on("click", function() {
        $("#mapDetailBlock").css("display", "none");
        $(".mapdetail").css("display", "none");
    })


});