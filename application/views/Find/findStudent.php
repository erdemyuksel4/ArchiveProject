<div class="card w-100">
    <div class="card-header">
        Arama
    </div>
    <div class="card-body ">
        <form action="<?=base_url($location)?>" method="get" class="row" id="">
            
            <div class="col-6">Öğretim Yılı  <select name="donemId" id="donemler" class="form-control">
                <?php
                foreach($donemler as $donem){
                    ?>
                    <option value="<?=$donem["id"]?>"<?=$filtre["donemId"]==$donem["id"]?"selected":""?>><?=$donem["baslangicYil"]."-".$donem["bitisYil"]?></option>
                    <?php
                }
                ?>
            </select></div>
            <div class="col-6">Öğretim Dönemi <select required name="donem" id="" class="form-control">
               <option disabled selected></option>
               <option value="1" <?=$filtre["donem"]==1?"selected":""?>>1</option>
               <option value="2" <?=$filtre["donem"]==2?"selected":""?>>2</option>
               <option value="3" <?=$filtre["donem"]==3?"selected":""?>>3</option>
            </select></div>
            <div class="col-6">Görev Bölgeleri  <select name="bolgeId" id="bolgeler" class="form-control"></select></div>
            <div class="col-6">Görev Yerleri  <select name="yerId" id="yerler" class="form-control"></select></div>  
            <div class="col-6">Okullar  <select name="okulId" id="okullar" class="form-control"></select></div> 
            <div class="col-6">Sınıflar  <select name="sinif" id="siniflar" class="form-control"></select></div> 
            <div class="col-6">Öğrenciler  <select name="ogrenciId" id="ogrenciler" class="form-control"></select></div> 
            <div class="col-12 mt-4 text-center">
                <button type="submit" class="btn btn-primary btn-sm">Bul</button>
            </div>
        </form>
    </div>
</div>
<script>
    var filter = JSON.parse("<?php echo addslashes(json_encode($filtre))?>");
    function BodyLoad(e){
        var a = new bolge();
        a.update().then(()=>{
            if(filter["bolgeId"]!= ""){
                a.select.selected(filter["bolgeId"]);
                filter["bolgeId"] = undefined;
                a.onChangeEvent();
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
                    if((filter["yerId"]!= "")){
                        a.select.selected(filter["yerId"]);
                        filter["yerId"]= undefined;
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
    function yer(val){
        this.first = true;
        this.select = new Select("yerler");
        this.select.textPart =  "yerAdi";
        this.select.valuePart =  "id";
        this.update = ()=>{if(val.trim()!=""){
            return this.select.Update("<?=base_url("MissionPlaces/PlaceList")?>",{"key":"bolgeId","value":val});}else{
                return new Promise(()=>{
                    return {};
                });
            }
        }
        this.AddStarter = ()=>{
            this.select.AddStarter("Görev Yeri",false);
        }
        this.onChangeEvent = ()=>{
            reset("yerler");
            if(this.select.select.value != "Görev Yeri"){
                var a = new okul(this.select.select.value);
                a.update().then(()=>{
                    if(filter["okulId"]!= ""){
                        a.select.selected(filter["okulId"]);
                        filter["okulId"] = undefined;
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
            if(val.trim()!=""){
                return this.select.Update("<?=base_url("Schools/SchoolList")?>",{"key":"yerId","value":val});
            }else{
                return new Promise(()=>{
                    return {};
                });
            }
        }
        this.AddStarter = ()=>{
            this.select.AddStarter("Okul",false);
        }
        this.onChangeEvent = ()=>{
            reset("okullar");
            if(this.select.select.value != "Okul"){
                var a = new sinif(this.select.select.value);
                a.update().then(()=>{
                    if(filter["sinif"]!= ""){
                        a.select.selected(filter["sinif"]);
                        filter["sinif"] = undefined;
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
    function sinif(val){
        this.first = true;
        this.select = new Select("siniflar");
        this.select.textPart =  "sinifAdi";
        this.select.valuePart =  "id";
        this.update = ()=>{if(val.trim()!=""){
            return (this.select.Update("<?=base_url("Classes/ClassList")?>",{"key":"okulId","value":val}));}else{
                return new Promise(()=>{
                    return {};
                });
            }
        }
        this.AddStarter = ()=>{
            this.select.AddStarter("Sınıf",false);
        }
        this.onChangeEvent = ()=>{
            reset("siniflar");
            if(this.select.select.value != "Sınıf"){
                var a = new ogrenci(this.select.select.value);
                a.update().then(()=>{
                    if(filter["ogrenciId"]!= ""){
                        a.select.selected(filter["ogrenciId"]);
                        filter["ogrenciId"] = undefined;
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
    function ogrenci(val){
        this.first = true;
        this.select = new Select("ogrenciler");
        this.select.textPart =  "adSoyad";
        this.select.valuePart =  "id";
        this.update = ()=>{if(val.trim()!=""){
            return this.select.Update("<?=base_url("Students/StudentList")?>",{"key":"sinifId","value":val});}else{
                return new Promise(()=>{
                    return {};
                });
            }
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