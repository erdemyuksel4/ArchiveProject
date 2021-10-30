function Select(select){
    this.select = document.getElementById(select)
    this.valuePart = "id"
    this.textPart = "ad"
    this.nullSelect = ()=>{
        this.select.value = "";
    }
    this.AddStarter =  (starter,disabled = true)=>{
        var opt = document.createElement("option");
        opt.innerText = starter;
        this.select.appendChild(opt);
        opt.setAttribute("selected", "selected");
        if(disabled==true){
            opt.setAttribute("disabled", "disabled");
        }
        opt.value="";
    }
    this.Add =  (id,data)=>{
        var opt = document.createElement("option");
        opt.value = id;
        opt.innerText = data;
        this.select.appendChild(opt);
    }   
    this.Remove =async (id)=>{
        this.select.children.forEach(e => {
            if(e.value==id){
                e.remove();
            }
        });
    }
    this.RemoveAll =  ()=>{
        if(this.select != null && this.select.children.length>0){
            var child = this.select.firstElementChild;
            while (child) {
                this.select.removeChild(child);
                child = this.select.firstElementChild;
            }

        }
    }
    this.selected =  (selectedValue)=>{
        var childrens = this.select.children;
        for (const children of childrens) {
            if(children.value==selectedValue){
                children.selected = "selected";
            }
        }
    }
    this.AddWithAjax = (url,data)=>{
        return reqData(url,{"data":data,"page":"page"},(e)=>{
            var d = JSON.parse(e);
            for (const i of Object.keys(d)) {
                
                this.Add(d[i][this.valuePart],d[i][this.textPart]);
            }
        });
    }
    this.onChangeEvent = (event)=>{
        this.select.addEventListener("change",(e)=>{
            event(e);
        })
    }
    this.Update = (url,data)=>{
        this.RemoveAll();
        return this.AddWithAjax(url,data).then((e)=>{
            if(this.select.firstElementChild){
                this.select.firstElementChild.selected = "selected";
                return this.select.firstElementChild;
            }
        });
    }
}
function Input(input = undefined){
    this.input = document.getElementById(input),
    this.GetAttribute = (attrName)=>{
        return this.input.getAttribute(attrName);
    }
    this.SetAttribute = (attrName,attrValue)=>{
        this.input.setAttribute(attrName,attrValue);
    }
    this.CreateInput = (place,inputType) => {
        var obj = document.createElement("input");
        obj.setAttribute("type",inputType);
        place.appendChild(obj);
        this.input = obj;
    }
    this.RemoveInput = ()=>{
        document.removeChild(this.input);
    }
    this.AddEvent = (eventType,event) =>{
        this.input.addEventListener(eventType,(e)=>{event(e)});
    }
    this.RemoveEvent = (eventType) =>{
        this.input.removeEventListener(eventType);
    }
}