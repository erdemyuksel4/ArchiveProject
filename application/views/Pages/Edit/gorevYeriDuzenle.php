<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <section class="card col">
            <form action="<?=base_url("MissionPlaces/Edit")?>" method="POST">
                <div class="card-header">
                    Görev Yeri Düzenle &nbsp;
                    <button class="btn btn-sm btn-success" type="submit">Kaydet</button>
                    <a href="<?=base_url("MissionPlaces")?>" class="btn btn-sm btn-danger" type="button">İptal</a>

                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="input-group flex-nowrap col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width:150px">Görev Yeri Adı</span>
                                </div>
                                <input type="text" class="form-control" name="yerAdi" placeholder="Görev Yeri Adı" value="<?=$yerAdi?>">
                                <input type="hidden"name="id" value="<?=$id?>">
                            </div>

                        </div>
                        <div class="row py-2">
                            <div class="input-group flex-nowrap col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width:150px">Görev Bölgesi</span>
                                </div>
                                <select name="bolgeId" name="bolgeId" class="form-control">
                                    <?php 
                                    foreach ($bolgeler as $key => $value) {
                                        ?>
                                        <option value="<?=$value["id"]?>" <?=($bolgeId==$value["id"])?"selected":""?>><?=$value["bolgeAdi"]?></option>
                                        
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
                                    <img src="<?=base_url($resim["yol"])?>" class="card-img-top p-2" style="width:150px;height:auto"
                                        ondblclick="$('#deletedImg<?=$resim['id']?>').val(0);$(this).remove()"
                                        onmouseover="$(this).css('backgroundColor','green')"
                                        onmouseout="$(this).css('backgroundColor','transparent')">
                                    <?php
                                            }
                                        ?>
                        </div>
                        <div class="row py-2">
                            <div class="input-group flex-nowrap col">
                                <div class="input-group-addon">
                                    <span class="input-group-text" style="width:150px">Açıklama</span>
                                </div>
                                <textarea name="aciklama" class="summernote"><?=$aciklama?></textarea>
                            </div>


                        </div>



                    </div>


                </div>
            </form>
        </section>
    </div>
</div>