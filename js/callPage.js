function Refresh(){
    window.location.reload(true);
}
function PageLoad(area=null, request=null,url=null){
    this.area = area;
    this.data;
    this.request = request;
    this.url = url;
    this.spinner;
    
    this.DataLoad = ()=>{
        this.LoadWaiting();
        reqData(this.url,this.request).then((e)=>{
            loader.OnDone(e);
        });
    }
    this.AppendPage = ()=>{
        this.area.append(this.data);
    }
    this.RemovePage = ()=>{
        this.area.empty();
    }
    this.LoadWaiting = ()=>{
        var id = this.area.attr("id")+"-spin";
        this.area.append("<div class='text-center' id='"+id+"'><div class='spinner-border' role='status'></div></div>");
        this.spinner = $("#"+id);
    }
    this.RemoveWaiting = ()=>{
        this.spinner.empty();
    }
    this.OnDone = (e)=>{
        this.RemoveWaiting();
        this.data = e;
        this.AppendPage();
        return e;
    }
    this.Load = ()=>{
        this.DataLoad();
    }
}
var loader;
function PageLoader(e) {
    if(typeof loader == "object"){
        loader.RemovePage();
    }
    loader = new PageLoad($(e.getAttribute("href")),{page:'page'},e.getAttribute('data-info'));
    loader.Load();
}