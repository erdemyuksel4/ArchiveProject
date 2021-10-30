<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <section class="card col">
            <form action="<?=base_url("Teachers/Add")?>" method="post">

            
                <div class="card-header">
                    Öğretmen Ekle &nbsp;
                    <button class="btn btn-sm btn-success">Kaydet</button>
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
                                                <input type="text" class="form-control" name="adSoyad" placeholder="Ad Soyad" required>
                                            </div>

                                        </div>
                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:150px">TC Kimlik No</span>
                                                </div>
                                                <input type="text" class="form-control" name="tckn" placeholder="TC Kimlik No" required>

                                            </div>


                                        </div>
                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:150px">İnternet Sitesi</span>
                                                </div>
                                                <input type="text" class="form-control" name="website" placeholder="İnternet Sitesi">
                                            </div>


                                        </div>
                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:150px">Email Adresi</span>
                                                </div>
                                                <input type="email" class="form-control" name="email" placeholder="Email Adresi">
                                            </div>


                                        </div>
                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"  style="width:150px">Doğum Tarihi</span>
                                                </div>
                                                <input type="date" class="form-control" name="dogumTarihi">
                                            </div>


                                        </div>
                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:150px">Doğum Yeri</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Doğum Yeri" name="dogumYeri">
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
                                                <input type="tel" class="form-control" placeholder="Telefon Numarası" name="telefon">
                                            </div>


                                        </div>

                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:150px">Görev Bölgesi</span>
                                                </div>
                                                <select name="bolgeId" id="bolgeler" class="form-control"></select>
                                            </div>

                                        </div>
                                        <div class="row py-2">

                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:150px">Görev Yeri</span>
                                                </div>
                                                <select name="yerId" id="yerler" class="form-control"></select>
                                            </div>

                                        </div>
                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:250px">Kayıtlı Olduğu Okul</span>
                                                </div>
                                                <select required name="okulId" id="okullar" class="form-control" >
                                    
                                                </select>
                                            </div>


                                        </div>
                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:250px">Yurt Dışı Göreve Başlama Tarihi</span>
                                                </div>
                                                <input type="date" class="form-control" name="yurtDisiGorevBaslangic">
                                            </div>


                                        </div>

                                        <div class="row py-2">
                                            <div class="input-group flex-nowrap col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width:150px">Görevde</span>
                                                </div>
                                                <div class="form-check m-2 ">
                                                    <input class="form-check-input" type="radio" name="gorevde" value="Evet" checked>
                                                    <label class="form-check-label">
                                                        Evet
                                                        </label>
                                                </div>
                                                <div class="form-check m-2 ">
                                                    <input class="form-check-input" type="radio" name="gorevde" value="Hayır">
                                                    <label class="form-check-label">
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
                                                    <input class="form-check-input" type="radio" name="yolluk" value="Var"checked>
                                                    <label class="form-check-label">
                                                        Var
                                                        </label>
                                                </div>
                                                <div class="form-check m-2 ">
                                                    <input class="form-check-input" type="radio" name="yolluk"  value="Yok">
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
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width:150px">Genel Bilgi</span>
                                    </div>
                                    <textarea class="form-control" name="genelBilgi"></textarea>
                                </div>


                            </div>
                            <div class="row py-2">
                                <div class="input-group flex-nowrap col">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width:200px">Almanya İkametgah</span>
                                    </div>
                                    <textarea class="form-control" name="almanyaIkametgah"></textarea>
                                </div>


                            </div>
                            <div class="row py-2">
                                <div class="input-group flex-nowrap col">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width:200px">Türkiye İkametgah</span>
                                    </div>
                                    <textarea class="form-control" name="turkiyeIkametgah"></textarea>
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
    function BodyLoad(e){
       var a = new bolge();
       a.update();
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
            this.select.Update("<?=base_url("MissionAreas/AreaList")?>");
        }
        this.AddStarter = ()=>{
            this.select.AddStarter("Görev Bölgesi");
        }
        this.onChangeEvent = ()=>{
            reset("bolgeler");
            if(this.select.select.value != "Görev Bölgesi"){
                var a = new yer(this.select.select.value);
                a.update();
                a.AddStarter();
                a.select.select.onchange = ()=>{
                    a.onChangeEvent();
                }
            }
        }
    }
    function yer(val){
        this.select = new Select("yerler");
        this.select.textPart =  "yerAdi";
        this.select.valuePart =  "id";
        this.update = ()=>{
            this.select.Update("<?=base_url("MissionPlaces/PlaceList")?>",val);
        }
        this.AddStarter = ()=>{
            this.select.AddStarter("Görev Yeri");
        }
        this.onChangeEvent = ()=>{
            reset("yerler");
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
            this.select.Update("<?=base_url("Schools/SchoolList")?>",val);
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