async function reqData(url,data,func=null) {
    return $.post(url,data).done(function(e){
        if(typeof func == "function"){
            func(e);
        }
    });
}