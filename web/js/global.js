$(document).ready(function() {
    $(document).on("click", "#Agregarpacientes", function() {
        let select = $("#copy").html;

        $("#ingredientes").append(
            "<div class='col-md-4 row'>"
                + "<div class='col-md-10>"
                    +select
                +"</div>"
                +"<div class='col-md-2 mt-4'>"
                    +"<button type='button' class='btn btn-danger'>-</button>"
                +"</div>"
            +"</div>"
        );
    });




});
