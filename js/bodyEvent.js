window.onload= (e)=>{
    if(typeof(ExtendFunction)!="function"){
        if(typeof(BodyLoad)=="function"){
            BodyLoad(e)
        }

    }else{
        ExtendFunction();
    }
    $("#"+localStorage.getItem("activeTab")).click();
}

$(".nav-link").on('shown.bs.tab', function (event) {
    localStorage.setItem("activeTab",event.target.id);
})