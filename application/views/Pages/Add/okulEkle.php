<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <section class="card col">
            <form action="<?=base_url("Schools/Add")?>" method="POST">
                <div class="card-header">
                    Okul Ekle &nbsp;
                    <button class="btn btn-sm btn-success" type="submit">Kaydet</button>
                    <a href="<?=base_url("Schools")?>"class="btn btn-sm btn-danger">İptal</a>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row py-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row py-2">

                                        <div class="input-group flex-nowrap col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="width:150px">Okul Adı</span>
                                            </div>
                                            <input required  type="text" class="form-control" placeholder="Okul Adı"
                                                name="okulAdi">
                                        </div>

                                    </div>
                                    <div class="row py-2">

                                        <div class="input-group flex-nowrap col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="width:150px">Görev Bölgesi</span>
                                            </div>
                                            <select required name="bolgeId" id="gorevBolgesi" class="form-control" oninput="selectEdit('gorevYerleri','<?=base_url('MissionPlaces/PlaceList')?>',{'key':'bolgeId','value':this.value})">
                                                <option disabled selected>Görev Bölgesi</option>
                                                <?php
                                                    
                                                    foreach ($bolgeler as $key => $bolge) {
                                                        ?>
                                                        <option value="<?=$bolge['id']?>" ><?=$bolge['bolgeAdi']?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row py-2">

                                        <div class="input-group flex-nowrap col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="width:150px">Görev Yeri</span>
                                            </div>
                                            <select required name="yerId" id="gorevYerleri" class="form-control" >
                                               
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row py-2">
                                        <div class="input-group flex-nowrap col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="width:150px">Resimler</span>

                                            </div>
                                            <button class="btn btn-sm btn-outline-info" type="button"
                                                onclick="$('#fileinput').click()">Resim Seç</button><span
                                                class="span mt-3 ml-2"> Çift
                                                tıklayarak yüklediklerinizi silebilirsiniz</span>
                                            <input   type="hidden" value="[]" name="blobs" id="imgblob">
                                            <input   style="display:none" type="file" class="form-control " id="fileinput"
                                                oninput="previewImage(this.files)" accept="image/*">
                                        </div>


                                    </div>
                                    <div class="row py-2" id="preimg">

                                    </div>
                                    <div class="row py-2">
                                        <div class="input-group mb-3 flex-nowrap col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="width:150px">Okulun Türü</span>
                                            </div>
                                            <select class="form-control" name="okulTuru">
                                                <option disabled selected>Okul Türü</option>
                                                <?php
                                                foreach ($okulTurleri as $key => $tur) {
                                                    ?>
                                                    <option value="<?=$tur['id']?>"><?=$tur['turAdi']?></option>
                                                    <?php
                                                }
                                                ?>
                                                
                                                
                                            </select>

                                        </div>


                                    </div>
                                    <div class="row py-2">
                                        <div class="input-group flex-nowrap col">
                                            <div class="input-group-addon">
                                                <span class="input-group-text" style="width:150px">Genel Bilgi</span>
                                            </div>
                                            <textarea name="genelBilgi" class="summernote"></textarea>
                                        </div>


                                    </div>


                                </div>
                            </div>


                        </div>

                    </div>
                    <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="Iletisim-tab" data-toggle="tab" href="#Iletisim">İletişim</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="TOABBilgileri-tab" data-toggle="tab" href="#TOABBilgileri">TOAB
                                Bilgileri</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade" id="Iletisim">
                            <div class="container">
                                <div class="row py-2">
                                    <div class="card w-100">

                                        <div class="card-body container">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="container p-0 m-0">
                                                        <div class="row py-2">
                                                            <div class="input-group flex-nowrap col">
                                                                <div class="input-group-addon">
                                                                    <span class="input-group-text"
                                                                        style="width:150px">Adres</span>
                                                                </div>
                                                                <textarea class="form-control" name="adres"></textarea>
                                                            </div>

                                                        </div>
                                                        <div class="row py-2">
                                                            <div class="input-group flex-nowrap col">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        style="width:150px">Telefon Numarası</span>
                                                                </div>
                                                                <input   type="tel" class="form-control"
                                                                    placeholder="Telefon Numarası" name="telefonNumarasi">
                                                            </div>

                                                        </div>
                                                        <div class="row py-2">
                                                            <div class="input-group flex-nowrap col">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        style="width:150px">Email
                                                                        Adresi</span>
                                                                </div>
                                                                <input   type="email" class="form-control"
                                                                    placeholder="Email Adresi" name=emailAdresi>
                                                            </div>

                                                        </div>
                                                        <div class="row py-2">
                                                            <div class="input-group flex-nowrap col">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        style="width:150px">İnternet Sitesi</span>
                                                                </div>
                                                                <input   type="text" class="form-control"
                                                                    placeholder="İnternet Sitesi" name="webSitesi">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="container p-0 m-0">
                                                        <div class="row py-2">
                                                            <div class="input-group flex-nowrap col">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        style="width:150px">Okul
                                                                        Müdürü</span>
                                                                </div>
                                                                <input   type="text" class="form-control"
                                                                    placeholder="Okul Müdürü" name="okulMuduru">
                                                            </div>

                                                        </div>
                                                        <div class="row py-2">
                                                            <div class="input-group flex-nowrap col">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        style="width:150px">Okul
                                                                        Sekreteri</span>
                                                                </div>
                                                                <input   type="text" class="form-control"
                                                                    placeholder="Okul Sekreteri" name="okulSekreteri">
                                                            </div>

                                                        </div>
                                                        <div class="row py-2">
                                                            <div class="input-group flex-nowrap col">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        style="width:150px">Okul
                                                                        Veli Temsilcisi</span>
                                                                </div>
                                                                <input   type="text" class="form-control"
                                                                    placeholder="Okul Veli Temsilcisi" name="ovt">
                                                            </div>

                                                        </div>
                                                        <div class="row py-2">
                                                            <div class="card w-100">
                                                                <div class="card-header">
                                                                    Okul Veli Temsilcisi İletişim
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row py-2">

                                                                        <div class="input-group flex-nowrap col">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"
                                                                                    style="width:150px">Telefon
                                                                                    Numarası</span>
                                                                            </div>
                                                                            <input   type="tel" class="form-control"
                                                                                placeholder="Telefon Numarası" name="ovtTelefonNumarasi">
                                                                        </div>

                                                                    </div>
                                                                    <div class="row py-2">

                                                                        <div class="input-group flex-nowrap col">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"
                                                                                    style="width:150px">Email
                                                                                    Adresi</span>
                                                                            </div>
                                                                            <input   type="email" class="form-control"
                                                                                placeholder="Email Adresi" name="ovtEmailAdresi">
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>




                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="TOABBilgileri">
                            <div class="container">
                                <div class="row py-2">
                                    <div class="card w-100">

                                        <div class="card-body container p-0 m-0">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row py-2">
                                                        <div class="input-group flex-nowrap col">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" style="width:150px">Kendi
                                                                    Yeri Var Mı?</span>
                                                            </div>
                                                            <div class="form-check m-2 ">
                                                                <input   class="form-check-input" type="radio"
                                                                    name="toabKendiYeri" id="radio1"
                                                                    value="Evet" checked>
                                                                <label class="form-check-label" for="radio1">
                                                                    Evet
                                                                </label>
                                                            </div>
                                                            <div class="form-check m-2 ">
                                                                <input   class="form-check-input" type="radio"
                                                                    name="toabKendiYeri" id="radio2"
                                                                    value="Hayır">
                                                                <label class="form-check-label" for="radio2">
                                                                    Hayır
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row py-2">
                                                        <div class="input-group flex-nowrap col">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                    style="width:150px">Telefon
                                                                    Numarası</span>
                                                            </div>
                                                            <input   type="tel" class="form-control"
                                                                placeholder="Telefon Numarası" name="toabTelefonNumarasi">
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <div class="row py-2">
                                                        <div class="input-group flex-nowrap col">
                                                            <div class="input-group-addon">
                                                                <span class="input-group-text"
                                                                    style="width:150px">Adres</span>
                                                            </div>
                                                            <textarea class="form-control" name="toabAdres"></textarea>
                                                        </div>

                                                    </div>
                                                    <div class="row py-2">

                                                        <div class="input-group flex-nowrap col">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" style="width:200px">Bina
                                                                    Özellikleri &nbsp;</span>


                                                            </div>
                                                            <input   type="text" class="form-control"
                                                                placeholder="Bina Özellikleri" id="ozellik">
                                                            <button type="button"
                                                                onclick="AddToTable('ozellikTable',[$('#ozellik').val()],'ozellikler')"
                                                                class="btn btn-sm btn-success">Ekle</button>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row py-2">
                                                <table class="table my-2" id="ozellikTable">
                                                    <thead>
                                                        <th>Özellik
                                                        </th>
                                                        <th>İşlemler</th>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>

                                            </div>
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
function selectEdit(id,url,data){
    var select = new Select(id);
    select.textPart = "yerAdi";
    select.RemoveAll();
    select.AddWithAjax(url,data);
}
</script>