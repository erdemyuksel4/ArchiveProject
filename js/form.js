function SubmitForm(id,func,extraVal){
    var url = $(id).attr("action");
    var data = $(id).serializeArray();
    if(extraVal){
        data.push(extraVal);
    }
    $.post(url,data).done(function(e){
        if(typeof SubmitFormDone =="function"){
            SubmitFormDone(e);
            
        }
        func();
    });
}