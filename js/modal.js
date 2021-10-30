$(".getmodal").click(function(e) {
    getmodal(e.target);
})

function delModal() {
    $(".modal").remove();
}
function getmodal(e, ondone){
    $.post(e.getAttribute("data-info"), { modal: 'modal', title: e.getAttribute("data-title"), param: e.getAttribute("data-param") }).done(function(e) {
        $(e).modal();
        $("#SubmitButton").focus();
        $(".modal").on("hidden.bs.modal", function(e) {
            delModal();
        })
    }).done(function(e){
        if (ondone != undefined && typeof(ondone) == "function") {
            ondone();
        }
    })
}


