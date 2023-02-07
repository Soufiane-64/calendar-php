document.addEventListener("DOMContentLoaded",function () {

    $("#delete").click(function(e) {
        e.preventDefault();
        var button = $(this);
        $.get(`crud.php?crud=delete&id=${button.attr("value")}`)
            .done(function(data) {
                console.log(data);
                alert("ça marche ...");
                location.href = 'http://localhost/calendar-php%20-%20Copy/public/';
            })
            .fail(function() {
                alert("ça marche pas...");
            });
    });
});