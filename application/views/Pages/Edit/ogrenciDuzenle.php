<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <section class="card col">
            <form action="<?=base_url("Students/Edit")?>" method="post">
                <div class="card-header">
                    Öğrenci Düzenle &nbsp;
                    <button type="submit" class="btn btn-sm btn-success">Kaydet</button>
                    <a href="<?=base_url("Students/")?>" class="btn btn-sm btn-danger">İptal</a>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row py-2">
                            <div class="col">
                                <div class="container p-0 m-0">
                                    <div class="row py-2">
                                        <div class="input-group flex-nowrap col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="width:150px">Ad Soyad</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ad Soyad" name="adSoyad" value="<?=$adSoyad?>">
                                            <input type="hidden" name="id" value="<?=$id?>">
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="input-group flex-nowrap col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="width:150px">Cinsiyet</span>
                                            </div>
                                            <div class="form-check m-2 ">
                                                <input class="form-check-input" type="radio" name="cinsiyet" value="Erkek" <?=($cinsiyet=="Erkek")?"checked":""?>>
                                                <label class="form-check-label" >
                                                    Erkek
                                                </label>
                                            </div>
                                            <div class="form-check m-2 ">
                                                <input class="form-check-input" type="radio" name="cinsiyet" value="Kız"<?=($cinsiyet=="Kız")?"checked":""?>>
                                                <label class="form-check-label">
                                                    Kız
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="container p-0 m-0">
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
                        </div>
                        <div class="row py-2">
                            <div class="input-group flex-nowrap col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width:150px">Devamsız &nbsp;<input type="checkbox" onclick="$('#DevamDurumu').toggle();" name="devamsizOnay" <?=strlen(trim($devamDurumu))>0?"checked":""?>></span>
                                </div>
                                <textarea style="display:<?=strlen(trim($devamDurumu))>0?"block":"none"?>" class="form-control" name="devamDurumu" id="DevamDurumu"><?=$devamDurumu?></textarea>
                            </div>


                        </div>
                        <div class="row py-2">
                            <div class="input-group flex-nowrap col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width:150px;height:28px">Okul</span>
                                </div>
                                <select name="okulId" id="okullar" class="form-control select2" >
                                <?php 
                                    
                                    foreach ($okullar as $key => $value) {
                                        ?>
                                        <option value="<?=$value["id"]?>" <?=($value["id"]==$okulId)?"selected":""?>><?=$value["ad"]?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="input-group flex-nowrap col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width:150px;">Sınıf</span>
                                </div>
                                <select name="sinif" id=""  class="form-control">
                                    <?php
                                    $s = explode("-",$sinifB["sinifAdi"]);
                                    foreach (range(1,12) as $key => $v) {
                                        ?>
                                        <option value="<?=$v?>" <?=$v==$s[0]?"selected":""?>><?=$v?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="input-group flex-nowrap col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width:150px;">Şube</span>
                                </div>
                                <select name="sube" id="" class="form-control">
                                <?php
                                    foreach (range("A","Z") as $key => $v) {
                                        ?>
                                        <option value="<?=$v?>"<?=$v==($s[1]??"")?"selected":""?>><?=$v?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="input-group flex-nowrap col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="prepend-wrapping"style="width:150px">Eba ID</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Eba ID" name="ebaId" value="<?=$ebaId?>">
                            </div>


                        </div>
                        <div class="row py-2">
                            <div class="input-group flex-nowrap col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="prepend-wrapping">Katılım Belgesi No</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Katılım Belgesi No" name="katilimBelgesiNo" value="<?=$katilimBelgesiNo?>">
                            </div>


                        </div>
                        <div class="row py-2">
                            <div class="input-group flex-nowrap col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width:150px">TTKD Katılım Formu</span>
                                </div>
                                <div class="form-check m-2 ">
                                    <input class="form-check-input" type="radio" name="ttkdKatilimFormu" value="Var" <?=($ttkdKatilimFormu=="Var")?"checked":""?>>
                                    <label class="form-check-label" >
                                        Var
                                    </label>
                                </div>
                                <div class="form-check m-2 ">
                                    <input class="form-check-input" type="radio" name="ttkdKatilimFormu" value="Yok" <?=($ttkdKatilimFormu=="Yok")?"checked":""?>>
                                    <label class="form-check-label">
                                        Yok
                                    </label>
                                </div>
                            </div>


                        </div>
                    </div>

                    <ul class="nav nav-tabs my-2" id="myTab" role="tablist">
                        
                        <li class="nav-item">
                            <a class="nav-link" id="Parent-tab" data-toggle="tab" href="#Parent" onclick="PageLoader(this)" data-info="<?=base_url("Parents/Parent/".$id)?>">Ebeveyn Bilgileri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Award-tab" data-toggle="tab" href="#Award" onclick="PageLoader(this)" data-info="<?=base_url("Competition/Competition/".$id)?>">Katıldığı Yarışma ve Ödül
                                Bilgisi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Lesson-tab" data-toggle="tab" href="#Lesson" <?=strlen($sinifB["id"])>0?"onclick='PageLoader(this)'":""?> data-info="<?=base_url("Lessons/LessonDetail/".$sinifB["id"])?>">TTKD Ders Günleri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Graduate-tab" data-toggle="tab" href="#Graduate">Mezun</a>
                        </li>
                    </ul>
                    <div class="container">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade "  id="Parent">
                            </div>
                            <div class="tab-pane fade " id="Award">
                            </div>
                            <div class="tab-pane fade " id="Lesson">
                            </div>
                            <div class="tab-pane fade" id="Graduate">
                                <div class="container">

                                    <div class="row py-2">
                                        <div class="input-group flex-nowrap col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="width:150px">Mezun</span>
                                            </div>
                                            <div class="form-check m-2 ">
                                                <input class="form-check-input" type="radio" name="Mezun" value="Oldu" <?=($Mezun=="Oldu")?"checked":""?>>
                                                <label class="form-check-label" >
                                                    Oldu
                                                </label>
                                            </div>
                                            <div class="form-check m-2 ">
                                                <input class="form-check-input" type="radio" name="Mezun" value="Olmadı"<?=($Mezun=="Olmadı"||$Mezun=="")?"checked":""?>>
                                                <label class="form-check-label">
                                                    Olmadı
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </form>

    </div>

    </section>
</div>
</div>