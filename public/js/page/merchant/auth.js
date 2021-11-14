$(document).ready(function() {


    // T&C action 
    $("#term-register-check").prop("checked", false);
    $(".agree-modal-term-btn").click(function() {
        $("#term-register-check").prop("checked", true);
        $(".signinbtn button").removeAttr("disabled");
    });

    // Ref code detection 
    var ref = $.urlParam('ref');
    if(ref) $("[name='ref']").val(ref);

});


$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null) {
       return null;
    }
    return decodeURI(results[1]) || 0;
}