<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <section class="card col">
            <form action="<?=base_url("Students/Add")?>"method="post">
                <div class="card-header">
                    Öğrenci Ekle &nbsp;
                    <button type="submit"class="btn btn-sm btn-success">Kaydet</button>
                    <a type="button" href="<?=base_url("Students/")?>" class="btn btn-sm btn-danger">İptal</a>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="container p-0 m-0">
                                    <div class="row py-2">
                                        <div class="input-group flex-nowrap col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="width:150px">Ad Soyad</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ad Soyad" name="adSoyad">
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="input-group flex-nowrap col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="width:150px">Cinsiyet</span>
                                            </div>
                                            <div class="form-check m-2 ">
                                                <input class="form-check-input" type="radio" name="cinsiyet" value="Erkek" checked="checked">
                                                <label class="form-check-label" >
                                                    Erkek
                                                </label>
                                            </div>
                                            <div class="form-check m-2 ">
                                                <input class="form-check-input" type="radio" name="cinsiyet" value="Kız">
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
                        </div>



                        <div class="row py-2">
                            <div class="input-group flex-nowrap col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width:150px">Devamsız &nbsp;<input type="checkbox" onclick="$('#DevamDurumu').toggle();" name="devamsizOnay"></span>
                                </div>
                                <textarea style="display:none" class="form-control" name="DevamDurumu" id="DevamDurumu"></textarea>
                            </div>


                        </div>
                        <div class="row py-2">
                            <div class="input-group flex-nowrap col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width:150px;height:28px">Okul</span>
                                </div>
                                <select name="okulId" id="okullar" class="form-control select2">
                                    <?php 
                                    
                                    foreach ($okullar as $key => $value) {
                                        if(isset($value["id"])){
                                        ?>
                                        <option value="<?=$value["id"]?>"><?=$value["ad"]?></option>
                                        <?php
                                        }
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
                                    foreach (range(1,12) as $key => $v) {
                                        ?>
                                        <option value="<?=$v?>"><?=$v?></option>
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
                                        <option value="<?=$v?>"><?=$v?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="input-group flex-nowrap col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="prepend-wrapping">Eba ID</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Eba ID" name="ebaId">
                            </div>


                        </div>
                        <div class="row py-2">
                            <div class="input-group flex-nowrap col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="prepend-wrapping">Katılım Belgesi No</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Katılım Belgesi No" name="katilimBelgesiNo">
                            </div>


                        </div>
                        <div class="row py-2">
                            <div class="input-group flex-nowrap col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width:200px">TTKD Katılım Formu</span>
                                </div>
                                <div class="form-check m-2 ">
                                    <input class="form-check-input" type="radio" name="ttkdKatilim" value="Var" checked>
                                    <label class="form-check-label" >
                                        Var
                                    </label>
                                </div>
                                <div class="form-check m-2 ">
                                    <input class="form-check-input" type="radio" name="ttkdKatilim" value="Yok">
                                    <label class="form-check-label">
                                        Yok
                                    </label>
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
<script>

</script>