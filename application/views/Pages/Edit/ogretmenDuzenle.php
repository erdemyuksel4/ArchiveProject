<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <section class="card col">
            <form action="<?=base_url("Teachers/Edit/".$id)?>" method="post">
                <div class="card-header">
                    Öğretmen Düzenle &nbsp;
                    <button type="submit" class="btn-sm btn btn-success">Kaydet</button>
                    <a href="<?=base_url("Teachers/")?>" class="btn btn-sm btn-danger">İptal</a>
                </div>
                <div class="card-body">

                    <div class="container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="container p-0 m-0">
                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:150px">Ad Soyad</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Ad Soyad" name="adSoyad" value="<?=$adSoyad?>">
                                            </div>

                                        </div>
                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:150px">TC Kimlik No</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="TC Kimlik No" name="tckn" value="<?=$tckn?>">

                                            </div>


                                        </div>
                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:150px">İnternet Sitesi</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="İnternet Sitesi" name="website" value="<?=$website?>">
                                            </div>


                                        </div>
                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:150px">Email Adresi</span>
                                                </div>
                                                <input type="email" class="form-control" placeholder="Email Adresi" name="email" value="<?=$email?>">
                                            </div>


                                        </div>
                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:150px">Doğum Tarihi</span>
                                                </div>
                                                <input type="date" class="form-control" name="dogumTarihi" value="<?=$dogumTarihi?>">
                                            </div>


                                        </div>
                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:150px">Doğum Yeri</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Doğum Yeri" name="dogumYeri" value="<?=$dogumYeri?>">
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="container p-0 m-0">


                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:150px">Telefon Numarası</span>
                                                </div>
                                                <input type="tel" class="form-control" placeholder="Telefon Numarası" name="telefon" value="<?=$telefon?>">
                                            </div>


                                        </div>


                                        <div class="row py-2">

                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:150px">Görev Bölgesi</span>
                                                </div>
                                                <select required name="bolgeId" id="bolgeler" class="form-control"></select>
                                            </div>

                                        </div>
                                        <div class="row py-2">

                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:150px">Görev Yeri</span>
                                                </div>
                                                <select required name="yerId" id="yerler" class="form-control" ></select>
                                            </div>

                                        </div>
                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:250px">Kayıtlı Olduğu Okul</span>
                                                </div>
                                                <select required name="okulId" id="okullar" class="form-control" ></select>
                                            </div>


                                        </div>
                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:250px">Yurt Dışı Göreve Başlama Tarihi</span>
                                                </div>
                                                <input type="date" class="form-control" name="yurtDisiGorevBaslangic" value="<?=$yurtDisiGorevBaslangic?>">
                                            </div>


                                        </div>

                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:150px">Görevde</span>
                                                </div>
                                                <div class="form-check m-2 ">
                                                    <input class="form-check-input" type="radio"  name="gorevde" value="Evet" <?=($gorevde=="Evet")?"checked":""?>>
                                                    <label class="form-check-label">
                                                        Evet
                                                        </label>
                                                </div>
                                                <div class="form-check m-2 ">
                                                    <input class="form-check-input" type="radio"  iname="gorevde" value="Hayır" <?=($gorevde=="Hayır")?"checked":""?>>
                                                    <label class="form-check-label" >
                                                        Hayır
                                                        </label>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:150px">Yolluk</span>
                                                </div>
                                                <div class="form-check m-2 ">
                                                    <input class="form-check-input" type="radio" name="yolluk"  value="Var" <?=($yolluk=="Var")?"checked":""?>>
                                                    <label class="form-check-label" >
                                                        Var
                                                        </label>
                                                </div>
                                                <div class="form-check m-2 ">
                                                    <input class="form-check-input" type="radio" name="yolluk" value="Yok" <?=($yolluk=="Yok")?"checked":""?>>
                                                    <label class="form-check-label">
                                                        Yok
                                                        </label>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row py-2">
                                <div class="input-group flex-nowrap col">
                                    <div class="input-group-addon">
                                        <span class="input-group-text" style="width:150px">Genel Bilgi</span>
                                    </div>
                                    <textarea class="summernote" name="genelBilgi"><?=$genelBilgi?></textarea>
                                </div>


                            </div>
                            <div class="row py-2">
                                <div class="input-group flex-nowrap col">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width:200px">Almanya İkametgah</span>
                                    </div>
                                    <textarea class="form-control" name="almanyaIkametgah"><?=$almanyaIkametgah?></textarea>
                                </div>


                            </div>
                            <div class="row py-2">
                                <div class="input-group flex-nowrap col">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width:200px">Türkiye İkametgah</span>
                                    </div>
                                    <textarea class="form-control" name="turkiyeIkametgah"><?=$turkiyeIkametgah?></textarea>
                                </div>


                            </div>

                        </div>
                        <ul class="nav nav-tabs my-2" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-id="GYK"  id="GYK-tab" data-toggle="tab" href="#GorevliOlduguKurumlar">Görevli Olduğu Okullar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-id="Kurum"  id="Kurum-tab" data-toggle="tab" href="#Kurum">Türkiye'de Görevli Olduğu Kurum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-id="YurtDisi"  id="YurtDisi-tab" data-toggle="tab" href="#YurtDisi">Önceki Yurt Dışı Görev Bilgisi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-id="Vaccine"  id="Vaccine-tab" data-toggle="tab" href="#Vaccine">Aşı Durumu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="PageLoader(this)" data-info="<?=base_url("Education/".$id)?>" target="_blank" data-id="Education"  id="Education-tab" data-toggle="tab" href="#Education">Eğitim Durumu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Lang-tab" data-toggle="tab" href="#Lang">Yabancı Dil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Knowledge-tab" data-toggle="tab" href="#Knowledge" onclick="PageLoader(this)" data-info="<?=base_url("Knowledge/".$id)?>" target="_blank">Bilgi ve Beceri</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Certificate-tab" data-toggle="tab" href="#Certificate" onclick="PageLoader(this)" data-info="<?=base_url("Certificate/".$id)?>"target="_blank" >Sertifika ve Belge</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"id="Project-tab" data-toggle="tab" href="#Project" onclick="PageLoader(this)"  data-info="<?=base_url("Project/".$id)?>" target="_blank">Proje Deneyimi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Close-tab" data-toggle="tab" href="#Close" onclick="PageLoader(this)" data-info="<?=base_url("Close/".$id)?>" target="_blank">Yakın Bilgisi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link "  data-id="License" id="License-tab" data-toggle="tab" href="#License">Ehliyet Bilgisi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Class-tab" data-toggle="tab" href="#Class" onclick="PageLoader(this)" data-info="<?=base_url("Classes/TeacherClass/".$id)?>" target="_blank">Sınıflar</a>
                            </li>
                        </ul>
                        <div class="row py-2" style="min-height:500px">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" id="GorevliOlduguKurumlar">
                                            <div class="container p-0 m-0">
                                                <div class="row py-2">
                                                    <div class="input-group flex-nowrap col">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" style="width:150px">Okullar</span>
                                                        </div>
                                                        <select class="form-control selectGOO" name="GorevliOlduguOkullar[]" id="GOO" multiple="multiple">
                                                        
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        <div class="tab-pane fade" id="Kurum">
                                            <div class="container p-0 m-0">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="container p-0 m-0">
                                                            <div class="row py-2">
                                                                <div class="input-group flex-nowrap col">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" style="width:150px">Telefon Numarası</span>
                                                                    </div>
                                                                    <input type="tel" class="form-control" placeholder="Telefon Numarası" name="TGOKTelefon" value="<?=$TGOK["telefon"]?>">
                                                                </div>

                                                            </div>
                                                            <div class="row py-2">
                                                                <div class="input-group flex-nowrap col">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" style="width:150px">Email Adresi</span>
                                                                    </div>
                                                                    <input type="email" class="form-control" placeholder="Email Adresi"name="TGOKEmail" value="<?=$TGOK["email"]?>">
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col">
                                                        <div class="container p-0 m-0">

                                                            <div class="row py-2">
                                                                <div class="input-group flex-nowrap col">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" style="width:150px">İnternet Sitesi</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" placeholder="İnternet Sitesi" name="TGOKWebsite"value="<?=$TGOK["website"]?>">
                                                                </div>

                                                            </div>
                                                            <div class="row py-2">
                                                                <div class="input-group flex-nowrap col">
                                                                    <div class="input-group-addon">
                                                                        <span class="input-group-text" style="width:150px">Adres</span>
                                                                    </div>
                                                                    <textarea class="form-control"name="TGOKAdres"><?=$TGOK["adres"]?></textarea>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            </div>
                                        <div class="tab-pane fade" id="YurtDisi">
                                                <div class="container">
                                                    <div class="row py-2">
                                                        <div class="input-group flex-nowrap col">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" style="width:150px">Ülke</span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Ülke" id="ulkebilgisi">
                                                        </div>
                                                        <div class="input-group flex-nowrap col">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" style="width:150px">Yıl</span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Yıl" id="yilbilgisi">
                                                        </div>
                                                    </div>
                                                    <button type="button" onclick="AddToTable('YurtDisiTablo',[$('#ulkebilgisi').val(),$('#yilbilgisi').val()],'OYDG')" class="btn btn-success  btn-sm mb-2">Ekle</button>

                                                    <table class="table table-striped table-bordered" id="YurtDisiTablo">
                                                        <thead>
                                                            <th>Ülke</th>
                                                            <th>Yıl</th>
                                                            <th class="hidden-phone">İşlemler</th>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <div class="tab-pane fade" id="Vaccine">
                                                <div class="container">
                                                    <div class="row py-2">
                                                        <div class="input-group flex-nowrap col">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" style="width:150px">Aşı Adı</span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Aşı" id="asi">
                                                            <div class="input-group-prepend">
                                                                <button type="button"onclick="AddToTable('asitablo',[$('#asi').val()],'Asi')" class="btn btn-sm btn-success">Ekle</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <table class="table table-bordered table-striped" id="asitablo">
                                                        <thead>
                                                            <tr>
                                                                <th>Aşı</th>
                                                                <th class="hidden-phone">İşlemler</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <div class="tab-pane fade" id="Lang">
                                            <div class="container">
                                                <div class="row py-2">
                                                    <div class="input-group flex-nowrap col">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" style="width:150px">Dil</span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Dil" id="dil">


                                                    </div>

                                                </div>
                                                <div class="row py-2">
                                                    <div class="input-group flex-nowrap col">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" style="width:150px">Seviye</span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Seviye" id="seviye">

                                                    </div>
                                                    <div class="input-group-prepend">
                                                        <button type="button" onclick="AddToTable('diltablo',[$('#dil').val(),$('#seviye').val()],'dil')" class="btn btn-sm btn-success">Ekle</button>
                                                    </div>

                                                </div>
                                                <table class="table table-bordered table-striped" id="diltablo">
                                                    <thead>
                                                        <tr>
                                                            <th>Dil</th>
                                                            <th>Seviye</th>
                                                            <th class="hidden-phone">İşlemler</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade " id="Knowledge">
                                        </div>
                                        <div class="tab-pane fade " id="Certificate">
                                        </div>
                                        <div class="tab-pane fade " id="Project">
                                        </div>
                                        <div class="tab-pane fade " id="Close">
                                        </div>
                                        <div class="tab-pane fade " id="Education"></div>
                                        <div class="tab-pane fade " id="License">
                                            <div class="container">
                                                <div class="row py-2">
                                                    <div class="input-group flex-nowrap col">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><input type="checkbox" name="turkiyeEhliyeti" value="Var" <?=$turkiyeEhliyeti=="Var"?"checked":""?>> &nbsp;Türkiye Ehliyeti</span>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row py-2">
                                                    <div class="input-group flex-nowrap col">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><input type="checkbox" name="almanyaEhliyeti" value="Var" <?=$almanyaEhliyeti=="Var"?"checked":""?>> &nbsp;Almanya Ehliyeti</span>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade " id="Class">
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>
            </form>
        </section>
    </div>
</div>
<script>
    function b_okulLoad(){
        var sel = new Select("GOO");
        callSelect2(sel.select);
        $(sel.select).val(null);
        $(sel.select).trigger("change");
        sel.Update("<?=base_url("Schools/SchoolListWithArea")?>",<?=$bolgeId?>).then(()=>{
            $(sel.select).val(<?=json_encode(array_filter(explode(";",$gorevYaptigiOkullar)))?>);
            $(sel.select).trigger("change");
        });
    }
    function BodyLoad(e){
        var a = new bolge();
        b_okulLoad();
        a.update().then(()=>{
            if(<?=$bolgeId?>!=0){
                a.Selected(<?=$bolgeId?>);
            }
            var sel =  yerLoad(<?=$yerId?>);
            sel.select.select.onchange = ()=>{
                sel.onChangeEvent();
            };
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
            this.select.AddStarter("Görev Bölgesi");
        }
        this.Selected = (val)=>{
            this.select.selected(val);
        }
        this.onChangeEvent = ()=>{
            resetokul();
            var sel = new Select("GOO");
            if(this.select.select.value != "Görev Bölgesi"){
                sel.Update("<?=base_url("Schools/SchoolListWithArea")?>",this.select.select.value);
                $(sel.select).val(null).trigger("change");
                var a = new yer(this.select.select.value);
                a.update();
                a.AddStarter();
                a.select.select.onchange = ()=>{
                    a.onChangeEvent();
                }
                
            }
        }
    }
    function yerLoad(val){
        var sel = new yer(<?=$bolgeId?>);
        sel.update().then(()=>{
            if(val!=0){
                sel.Selected(val);
            }
            okulLoad(<?=$okulId?>);
        });
        sel.AddStarter();
        return sel;
    }
    function okulLoad(val){
        var sel = new okul(<?=$yerId?>);
        sel.update().then(()=>{
            if(val!=0){
                sel.Selected(val);
            }
        });
        sel.AddStarter();
    }
    function yer(val){
        this.select = new Select("yerler");
        this.select.textPart =  "yerAdi";
        this.select.valuePart =  "id";
        this.update = ()=>{
            return this.select.Update("<?=base_url("MissionPlaces/PlaceList")?>",{"key":"bolgeId","value":val});
        }
        this.AddStarter = ()=>{
            this.select.AddStarter("Görev Yeri");
        }
        this.Selected = (val)=>{
            this.select.selected(val);
        }
        this.onChangeEvent = ()=>{
            if(this.select.select.value != "Görev Yeri"){
                var a = new okul(this.select.select.value);
                a.update();
                a.AddStarter();
            }
        }
    }
    function okul(val){
        this.select = new Select("okullar");
        this.select.textPart =  "ad";
        this.select.valuePart =  "id";
        this.update = ()=>{
            return this.select.Update("<?=base_url("Schools/SchoolList")?>",{"key":"yerId","value":val});
        }
        this.Selected = (val)=>{
            this.select.selected(val);
        }
        this.AddStarter = ()=>{
            this.select.AddStarter("Okul");
        }
        
    }
    function reset(id){
        if(id=="bolgeler"){
            resetyer();
            resetokul();
        }else if (id=="yerler"){
            resetokul();
        }
    }
    function resetyer(){
        var sel = new Select("yerler");
        sel.RemoveAll();
    }
    function resetokul(){
        var sel = new Select("okullar");
        sel.RemoveAll();
        
    }
</script>