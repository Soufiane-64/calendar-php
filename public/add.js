document.addEventListener("DOMContentLoaded",function () {

    $("#form").submit(function(e) {
        e.preventDefault();
        var $form = $(this);
        console.log($form);
        $.post($form.attr("action"), $form.serialize())
            .done(function(data) {

                alert("ça marche ...");
                location.href = 'http://localhost/calendar-php%20-%20Copy/public/';
            })
            .fail(function() {
                alert("ça marche pas...");
            });
    });
});