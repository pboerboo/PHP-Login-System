$("#verdwijnButton").mouseout(function(){
   $("div#verdwijn").slideUp(1000, function(){
        $("div#verschijn").show(2000);
    });
});
$("div#verschijn").mouseenter(function(){
   $(this).hide(500, function(){
        $("div#verdwijn").show();
    });
});

$("#verdwijnButton").click(function(){
    var div2 = $("#verschijn");
    div2.html("En nu is het weer wat anders");
});
//btnl1.click

$("#textarea").keypress(function(e){
   var keycode = (e.keyCode ? e.keyCode : e.which);
   if (keycode==13) {
   alert(keycode + " is de keycode voor 'Enter'");
   }
   else {
       $("#span1").toggle();
   }
});
$("div#verschijn").css("background-color", "green");
$("div#verschijn").css("border", "112px dashed blue");

$("#box1").hover(function()
    {
    $(this).animate(
        {
        width: "200px",
        height: "200px",
        borderWidth: "12",
        fontSize: "48px"
        },
        2500, 
        function()
            {
            $(this).css("background-color", "blue");
            }
    )
    },
function(){
    $(this).animate(
        {
        width: "100px",
        height: "100px",
        borderWidth: "1",
        fontSize: "12"
        }, 
        2500, 
        function()
            {
            $(this).css("background-color", "white");
            }
    )   
});
var ttl = $("#span1");
ttl.click(function(){
    var titel = ttl.attr("title");
    alert(titel + " is de titel van het ding");
    })
var elem = $("#verdwijn");
elem.click(function(){
    var dtel = elem.data("element");
    alert(dtel)
});

