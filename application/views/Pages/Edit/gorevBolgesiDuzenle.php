<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <section class="card col">
            <form method="POST" action="<?=base_url("/MissionAreas/Edit")?>">
                <div class="card-header">
                    Görev Bölgesi Düzenle &nbsp;
                    <button class="btn btn-sm btn-success">Kaydet</button>
                    <a href="<?=base_url("MissionAreas")?>" class="btn btn-sm btn-danger">İptal</a>
                </div>
                <div class="card-body">

                    <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="Area-tab" data-toggle="tab" href="#Area">Görev Bölgesi</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="Area">
                            <div class="container">

                                <div class="row py-2">
                                    <div class="input-group flex-nowrap col">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="width:150px">Görev Bölgesi Adı</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Bölge Adı" name="bolgeAdi" value="<?=$bolgeAdi?>" required>
                                        <input type="hidden" name="id" value="<?=$id?>" required>
                                    </div>

                                </div>
                                <div class="row py-2">
                                    <div class="input-group flex-nowrap col">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="width:150px">Resimler</span>

                                        </div>
                                        <button class="btn btn-sm btn-outline-info" type="button" onclick="$('#fileinput').click()">Resim Seç</button><span class="span mt-3 ml-2"> Çift tıklayarak yüklediklerinizi silebilirsiniz</span>
                                        <input type="hidden" value="[]" name="blobs" id="imgblob">
                                        <input style="display:none" type="file" class="form-control " id="fileinput" oninput="previewImage(this.files)" accept="image/*">
                                    </div>


                                </div>
                                <div class="row py-2" id="preimg">
                                    
                                    <?php 
                                        
                                        foreach($resimler as $i => $resim){
                                            
                                            ?>
                                            <input type="hidden" name="deletedImg[<?=$resim["id"]?>]" id="deletedImg<?=$resim["id"]?>" value="1">
                                            <img src="<?=base_url($resim["yol"])?>" class="card-img-top p-2" style="width:150px;height:auto" ondblclick="$('#deletedImg<?=$resim['id']?>').val(0);$(this).remove()" onmouseover="$(this).css('backgroundColor','green')" onmouseout="$(this).css('backgroundColor','transparent')">
                                            <?php
                                        }
                                    ?>
                                </div>

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
                                        <div class="input-group-addon">
                                            <span class="input-group-text" style="width:150px">Öğrenci Profili</span>
                                        </div>
                                        <textarea class="summernote" name="ogrenciProfili"><?=$ogrenciProfili?></textarea>
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