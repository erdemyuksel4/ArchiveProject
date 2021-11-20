<div class="card w-100">
    <div class="card-header">
        Arama
    </div>
    <div class="card-body ">
        <form action="<?=base_url($location)?>" method="post" class="row" id="">
            
            <div class="col-6">Öğretim Yılı  <select name="donemId" id="donemler" class="form-control">
                <?php 
                
                foreach($donemler as $donem){
                    ?>
                    <option value="<?=$donem["id"]?>"<?=isset($filtre["donemId"])==true?($filtre["donemId"]==$donem["id"]?"selected":""):""?>><?=$donem["baslangicYil"]."-".$donem["bitisYil"]?></option>
                    <?php
                }
                ?>
            </select></div>
            <div class="col-6">Görev Bölgeleri  <select name="bolgeId" id="bolgeler" class="form-control"></select></div>
            <div class="col-6">Görev Yerleri  <select name="yerId" id="yerler" class="form-control"></select></div>  
            <div class="col-6">Okullar  <select name="okulId" id="okullar" class="form-control"></select></div> 
            <div class="col-12 mt-4 text-center">
                <button type="submit" class="btn btn-primary btn-sm">Bul</button>
            </div>
        </form>
    </div>
</div>
<script>
    
    var filtre = <?=json_encode($filtre)?>;
    function BodyLoad(e){
        var a = new bolge();
        a.update().then(()=>{
            if(filtre.length>0){
                if(filtre["bolgeId"]!= ""){
                    a.select.selected(filtre["bolgeId"]);
                    a.onChangeEvent();
                }
            }
        });
        a.AddStarter();
        a.select.select.onchange = ()=>{
            a.onChangeEvent();
        }
    }
    
    function bolge(){
        this.first = true;
        this.select = new Select("bolgeler");
        this.select.textPart =  "bolgeAdi";
        this.select.valuePart =  "id";
        this.update = ()=>{
            return this.select.Update("<?=base_url("MissionAreas/AreaList")?>",{"key":"page","value":"page"});
        }
        this.AddStarter = ()=>{
            this.select.AddStarter("Görev Bölgesi",false);
        }
        this.onChangeEvent = ()=>{
            reset("bolgeler");
            if(this.select.select.value != "Görev Bölgesi"){
                var a = new yer(this.select.select.value);
                a.update().then(()=>{
                    if(filtre.length>0){
                        if(filtre["yerId"]!= ""){
                            a.select.selected(filtre["yerId"]);
                            a.onChangeEvent();
                        }            
                    }
                });
                a.AddStarter();
                a.select.select.onchange = ()=>{
                    a.onChangeEvent();
                }
            }
        }
    }
    function yer(val){
        this.first = true;
        this.select = new Select("yerler");
        this.select.textPart =  "yerAdi";
        this.select.valuePart =  "id";
        this.update = ()=>{
            return this.select.Update("<?=base_url("MissionPlaces/PlaceList")?>",{"key":"bolgeId","value":val});
        }
        this.AddStarter = ()=>{
            this.select.AddStarter("Görev Yeri",false);
        }
        this.onChangeEvent = ()=>{
            reset("yerler");
            if(this.select.select.value != "Görev Yeri"){
                var a = new okul(this.select.select.value);
                a.update().then(()=>{            
                    if(filtre.length>0){
                        if(filtre["okulId"]!= ""){
                            a.select.selected(filtre["okulId"]);
                            a.onChangeEvent();
                        }            
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
        this.first = true;
        this.select = new Select("okullar");
        this.select.textPart =  "ad";
        this.select.valuePart =  "id";
        this.update = ()=>{
            return this.select.Update("<?=base_url("Schools/SchoolList")?>",{"key":"yerId","value":val});
        }
        this.AddStarter = ()=>{
            this.select.AddStarter("Okul",false);
        }
        this.onChangeEvent = ()=>{
            reset("okullar");
        }
    }
    function sinif(val){
        this.first = true;
        this.select = new Select("siniflar");
        this.select.textPart =  "sinif";
        this.select.valuePart =  "sinif";
        this.update = ()=>{
            return this.select.Update("<?=base_url("Classes/ClassList")?>",JSON.stringify([{"key":"okulId","value":val},{"key":"donemId","value":document.getElementById("donemler").value}]));
        }
        this.AddStarter = ()=>{
            this.select.AddStarter("Sınıf",false);
        }
        this.onChangeEvent = ()=>{
            reset("siniflar");
        }
    }
    function ogrenci(val){
        this.first = true;
        this.select = new Select("ogrenciler");
        this.select.textPart =  "adSoyad";
        this.select.valuePart =  "id";
        this.update = ()=>{
            return this.select.Update("<?=base_url("Students/StudentList")?>",val);
        }
        this.AddStarter = ()=>{
            this.select.AddStarter("Öğrenciler",false);
        }
        this.onChangeEvent = ()=>{
            
        }
    }
    function reset(id){
        if(id=="bolgeler"){
            resetyer();
            resetokul();
            resetsinif();
            resetogrenci();
        }else if (id=="yerler"){
            resetokul();
            resetsinif();
            resetogrenci();
        }else if (id=="okullar"){
            resetsinif();
            resetogrenci();
        }else if (id=="siniflar"){
            resetogrenci();
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
    function resetogrenci(){
        new Select("ogrenciler").RemoveAll();
        
    }
</script>