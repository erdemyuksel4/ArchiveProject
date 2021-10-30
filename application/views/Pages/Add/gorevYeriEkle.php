<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <section class="card col">
                <form method="POST" action="<?=base_url("MissionPlaces/Add")?>" >
                <div class="card-header">
                    Görev Yeri Ekle &nbsp;
                    <button class="btn btn-sm btn-success">Kaydet</button>
                    <a href="<?=base_url("MissionPlaces")?>" class="btn btn-sm btn-danger" type="button">İptal</a>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="input-group flex-nowrap col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width:150px">Görev Yeri Adı</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Görev Yeri Adı" name="yerAdi"required>
                            </div>
    
                        </div>
                        <div class="row py-2">
                            <div class="input-group flex-nowrap col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width:150px">Görev Bölgesi</span>
                                </div>
                                <select class="form-control" name="bolgeId">
                                    <?php
                                foreach ($bolgeler as $key => $value) {
                                    ?>
                                    <option value="<?=$value["id"]?>"><?=$value["bolgeAdi"]?></option>
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
    
                        </div>
                        <div class="row py-2">
                            <div class="input-group flex-nowrap col">
                                <div class="input-group-addon">
                                    <span class="input-group-text" style="width:150px">Açıklama</span>
                                </div>
                                <textarea class="summernote" name="aciklama"></textarea>
                            </div>
    
    
                        </div>
    
    
    
                    </div>
    
    
                </div>
    
            </form>
            </section>

    </div>
</div>