require('./bootstrap');


$(document).ready(function () {

    $("#customSuccess,#customInfo,#customError").delay(4000).fadeToggle(2500);

    $("body").on("click", ".deleteButton", function (event) {
        event.preventDefault();

        var form = $(this).parent();
        $("#confirmDelete").off().on("click", function () {
            form.submit();
        });

    });

});


