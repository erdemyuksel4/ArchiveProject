<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <section class="card col">
            <form action="<?=base_url('Schools/Edit')?>" method="post">
                <div class="card-header">
                    Okul Düzenle &nbsp;
                    <button type="submit" class="btn btn-sm btn-success">Kaydet</button>
                    <a href="<?=base_url('Schools')?>" class="btn btn-sm btn-danger">İptal</a>
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
                                            <input type="text" class="form-control" placeholder="Okul Adı" name="okulAdi" value="<?=$ad?>">
                                            <input type="hidden" name="id" value="<?=$id?>">
                                        </div>

                                    </div>
                                    <div class="row py-2">

                                        <div class="input-group flex-nowrap col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="width:150px">Görev Bölgesi</span>
                                            </div>
                                            <select required name="bolgeId" id="gorevBolgesi" class="form-control" oninput="selectEdit('gorevYerleri','<?=base_url('MissionPlaces/PlaceList')?>',{'key':'bolgeId','value':this.value})">
                                                <?php
                                                    
                                                    foreach ($bolgeler as $key => $bolge) {
                                                        ?>
                                                        <option value="<?=$bolge['id']?>"><?=$bolge['bolgeAdi']?></option>
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
                                        <div class="input-group mb-3 flex-nowrap col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="width:150px">Okulun Türü</span>
                                            </div>
                                            <select class="form-control" name="okulTuru">
                                                <option disabled selected>Okul Türü</option>
                                                <?php
                                                foreach ($okulTurleri as $key => $okulTuru) {
                                                    ?>
                                                    <option value="<?=$okulTuru['id']?>" <?=($okulTuru['id']==$tur)?"selected":""?>><?=$okulTuru['turAdi']?></option>
                                                    <?php
                                                }
                                                ?>
                                                
                                                
                                            </select>

                                        </div>


                                    </div>
                                    <div class="row py-2">
                                        <div class="input-group flex-nowrap col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="width:150px">Resimler</span>

                                            </div>
                                            <button class="btn btn-sm btn-outline-info" type="button"
                                                onclick="$('#fileinput').click()">Resim Seç</button><span class="span mt-3 ml-2"> Çift
                                                tıklayarak yüklediklerinizi silebilirsiniz</span>
                                            <input type="hidden" value="[]" name="blobs" id="imgblob">
                                            <input style="display:none" type="file" class="form-control " id="fileinput"
                                                oninput="previewImage(this.files)" accept="image/*">
                                        </div>


                                </div>
                                <div class="row py-2" id="preimg">

                                    <?php 
                                    
                                    foreach($resimler as $i => $resim){
                                        
                                        ?>
                                        <input type="hidden" name="deletedImg[<?=$resim["id"]?>]" id="deletedImg<?=$resim["id"]?>"
                                            value="1">
                                            <img src="<?=base_url($resim["yol"])?>" class="p-2 img-sec" 
                                            ondblclick="$('#deletedImg<?=$resim['id']?>').val(0);$(this).remove()"
                                            onmouseover="$(this).css('backgroundColor','green')"
                                            onmouseout="$(this).css('backgroundColor','transparent')">
                                        <?php
                                                }
                                            ?>
                                </div>
                                <div class="row py-2">
                                    <div class="input-group mb-3 flex-nowrap col">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="width:150px">Okulun Türü</span>
                                        </div>
                                        <select class="form-control">
                                            <option selected disabled>Okulun Türü</option>
                                            <?php
                                            foreach ($okulTurleri as $key => $t) {
                                                ?>
                                                <option value="<?=$t['id']?>" <?=($t['id']==$tur)?'selected':""?>><?=$t['turAdi']?></option>
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
                                        <textarea  class="summernote" name="genelBilgi"><?=$genelBilgi?></textarea>
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
                            <a class="nav-link" id="TOABBilgileri-tab" data-toggle="tab" href="#TOABBilgileri" >TOAB Bilgileri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="TOAB-OVT-tab" data-toggle="tab" onclick="PageLoader(this)" data-info="<?=base_url("TOABOVT/OVT/".$id)?>" href="#TOAB-OVT">TOAB-OVT Görevli
                                Listesi</a>
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
                                                                    <span class="input-group-text" style="width:150px">Adres</span>
                                                                </div>
                                                                <textarea class="form-control" name="adres"><?=$adres?></textarea>
                                                            </div>

                                                        </div>
                                                        <div class="row py-2">
                                                            <div class="input-group flex-nowrap col">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" style="width:150px">Telefon Numarası</span>
                                                                </div>
                                                                <input type="tel" class="form-control" placeholder="Telefon Numarası" name="telefonNumarasi" value="<?=$telefon?>">
                                                            </div>

                                                        </div>
                                                        <div class="row py-2">
                                                            <div class="input-group flex-nowrap col">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" style="width:150px">Email
                                                                        Adresi</span>
                                                                </div>
                                                                <input type="email" class="form-control" placeholder="Email Adresi" name="emailAdresi" value="<?=$email?>">
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
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="container p-0 m-0">
                                                        <div class="row py-2">
                                                            <div class="input-group flex-nowrap col">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" style="width:150px">Okul
                                                                        Müdürü</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="Okul Müdürü" name="okulMuduru" value="<?=$okulMuduru?>">
                                                            </div>

                                                        </div>
                                                        <div class="row py-2">
                                                            <div class="input-group flex-nowrap col">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" style="width:150px">Okul
                                                                        Sekreteri</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="Okul Sekreteri" name="okulSekreteri" value="<?=$okulSekreteri?>">
                                                            </div>

                                                        </div>
                                                        <div class="row py-2">
                                                            <div class="input-group flex-nowrap col">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" style="width:150px">Okul
                                                                        Veli Temsilcisi</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="Okul Veli Temsilcisi" name="ovt" value="<?=$okulVeliTemsilcisi?>">
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
                                                                                <span class="input-group-text" style="width:150px">Telefon
                                                                                    Numarası</span>
                                                                            </div>
                                                                            <input type="tel" class="form-control" placeholder="Telefon Numarası" name="ovtTelefonNumarasi" value="<?=$okulVeliTemsilcisiTelefon?>">
                                                                        </div>

                                                                    </div>
                                                                    <div class="row py-2">

                                                                        <div class="input-group flex-nowrap col">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text" style="width:150px">Email Adresi</span>
                                                                            </div>
                                                                            <input type="email" class="form-control" placeholder="Email Adresi" name="ovtEmailAdresi" value="<?=$okulVeliTemsilcisiEmail?>">
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
                                                                <input class="form-check-input" type="radio" name="toabKendiYeri"  value="Evet" <?=($toab["kendiYeri"]=="Evet")?"checked":""?>>
                                                                <label class="form-check-label">
                                                                    Evet
                                                                </label>
                                                            </div>
                                                            <div class="form-check m-2 ">
                                                                <input class="form-check-input" type="radio" name="toabKendiYeri"  value="Hayır" <?=($toab["kendiYeri"]=="Hayır")?"checked":""?>>
                                                                <label class="form-check-label" >
                                                                    Hayır
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row py-2">
                                                        <div class="input-group flex-nowrap col">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" style="width:150px">Telefon
                                                                    Numarası</span>
                                                            </div>
                                                            <input type="tel" class="form-control" placeholder="Telefon Numarası" name="toabTelefonNumarasi" value="<?=$toab['telefon']?>">
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <div class="row py-2">
                                                        <div class="input-group flex-nowrap col">
                                                            <div class="input-group-addon">
                                                                <span class="input-group-text" style="width:150px">Adres</span>
                                                            </div>
                                                            <textarea class="form-control" name="toabAdres"><?=$toab["adres"]?></textarea>
                                                        </div>

                                                    </div>
                                                    <div class="row py-2">

                                                        <div class="input-group flex-nowrap col">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" style="width:200px">Bina
                                                                    Özellikleri &nbsp;</span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Bina Özellikleri" id="ozellik">
                                                            <button type="button" onclick="AddToTable('ozellikTable',[$('#ozellik').val()],'ozellikler')" class="btn btn-sm btn-success">Ekle</button>

                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-sm m-3" id="ozellikTable">
                                                    <thead>
                                                        <th>Özellik
                                                        </th>
                                                        <th>İşlemler</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $ozellikler = array_filter(explode(";",$toab["binaOzellikleri"]??";"));
                                                        if(count($ozellikler)>0){
                                                            foreach ($ozellikler as $key => $value) {
                                                                ?>
                                                                <tr>
                                                                    <td><?=$value?>
                                                                    <input type="hidden" name="ozellikler[]" value="<?=$value?>"></td>
                                                                    <td><button type='button' onclick='parentKiller($(this).parent())' class='btn btn-sm btn-danger'>Sil</button></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="tab-pane fade" id="TOAB-OVT">
                        
                    </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
<script>
function BodyLoad(){
    var sel = new Select("gorevBolgesi");
    sel.selected(<?=$bolgeId?>);

    var sel2 = new Select("gorevYerleri");
    sel2.textPart = "yerAdi";
    sel2.AddWithAjax("<?=base_url("MissionPlaces/PlaceList")?>",{"key":"bolgeId","value":"<?=$bolgeId?>"}).then(()=>{
        sel2.selected(<?=$yerId?>);
    })
}
function selectEdit(id,url,data){
    var select = new Select(id);
    select.textPart = "yerAdi";
    select.RemoveAll();
    select.AddWithAjax(url,data);
    return select;
}
</script>