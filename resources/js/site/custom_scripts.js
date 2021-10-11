$(document).ready(function(){
    // Loader
    setTimeout(function () {
        $(".overlay").css({ display: "none" });
    }, 2000);
    setTimeout(function () {
        $(".overlay, body").addClass("loaded");
    }, 60000);
});
