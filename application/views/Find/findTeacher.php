<div class="card w-100">
    <div class="card-header">
        Arama
    </div>
    <div class="card-body ">
        <form action="<?=base_url($location)?>" method="post" class="row" id="">
            <div class="col-6">Görev Bölgeleri  <select name="bolgeId" id="bolgeler" class="form-control"></select></div>
            <div class="col-6">Okullar  <select name="okulId" id="okullar" class="form-control"></select></div> 
            <div class="col-6">Öğretmenler  <select name="ogretmenId" id="ogretmenler" class="form-control"></select></div> 
            <div class="col-12 mt-4 text-center">
                <button type="submit" class="btn btn-primary btn-sm">Bul</button>
            </div>
        </form>
    </div>
</div>
<script>

    function BodyLoad(e){
        var a = new bolge();
        a.update().then(()=>{
            if("<?=$filtre["bolgeId"]?>"!= ""){
                a.select.selected("<?=$filtre["bolgeId"]?>");
                a.onChangeEvent();
            }
        });
        a.AddStarter();
        a.select.select.onchange = ()=>{
            a.onChangeEvent();
        }
    }
    function bolge(){
        this.select = new Select("bolgeler");
        this.select.textPart =  "bolgeAdi";
        this.select.valuePart =  "id";
        this.update = ()=>{
            return this.select.Update("<?=base_url("MissionAreas/AreaList")?>");
        }
        this.AddStarter = ()=>{
            this.select.AddStarter("Görev Bölgesi",false);
        }
        this.onChangeEvent = ()=>{
            if(this.select.select.value != "Görev Bölgesi"){
                var a = new okul(this.select.select.value);
                reset("bolgeler");
                a.update().then(()=>{
                    if(("<?=$filtre["okulId"]?>"!= "")){
                        a.select.selected("<?=$filtre["okulId"]?>");
                        a.onChangeEvent();
                    }
                });
                a.AddStarter();
                a.select.select.onchange = ()=>{
                    a.onChangeEvent();
                }
            }
        }
    }
    function okul(val){
        this.select = new Select("okullar");
        this.select.textPart =  "ad";
        this.select.valuePart =  "id";
        this.update = ()=>{
            return this.select.Update("<?=base_url("Schools/SchoolList")?>",{"key":"bolgeId","value":val});
        }
        this.AddStarter = ()=>{
            this.select.AddStarter("Okul",false);
        }
        this.onChangeEvent = ()=>{
            if(this.select.select.value != "Okul"){
                var a = new ogretmen(this.select.select.value);
                reset("okullar");
                a.update().then(()=>{
                    if("<?=$filtre["ogretmenId"]?>"!= ""){
                        a.select.selected("<?=$filtre["ogretmenId"]?>");
                        a.onChangeEvent();
                    }
                });
                a.AddStarter();
                a.select.select.onchange = ()=>{
                    a.onChangeEvent();
                }
            }
        }
    }
    
    function ogretmen(val){
        this.first = true;
        this.select = new Select("ogretmenler");
        this.select.textPart =  "adSoyad";
        this.select.valuePart =  "id";
        this.update = ()=>{
            return this.select.Update("<?=base_url("Teachers/TeacherList")?>",{"key":"okulId","value":val});
        }
        this.AddStarter = ()=>{
            this.select.AddStarter("Öğretmenler",false);
        }
        this.onChangeEvent = ()=>{
            
        }
    }
    function reset(id){
        if(id=="bolgeler"){
            resetokul();
            resetogretmen();
        }else if (id=="okullar"){
            resetogretmen();
        }
    }
    function resetyer(){
        new Select("yerler").RemoveAll();
    }
    function resetokul(){
        new Select("okullar").RemoveAll();
        
    }
    function resetsinif(){
        
        new Select("siniflar").RemoveAll();
    }
    function resetogretmen(){
        new Select("ogretmenler").RemoveAll();
        
    }
</script>