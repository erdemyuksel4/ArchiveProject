<form action="<?=base_url($location)?>" method="post" id="form">
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Yarışma Adı</span>
            </div>
            <input type="text" class="form-control" placeholder="Yarışma Adı" name="yarismaAdi"value="<?=$yarismaAdi?>">
            <input type="hidden" value="<?=$id?>" name="id">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Tarih</span>
            </div>
            <input type="date" class="form-control" name="tarih" value="<?=$tarih?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Kurum</span>
            </div>
            <input type="text" class="form-control" placeholder="Kurum" name="kurum" value="<?=$kurum?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Ödül</span>
            </div>
            <select name="odul" class="form-control">
                <option value="Aldı" <?=$odul=="Aldı"?"selected":""?>>Aldı</option>
                <option value="Almadı"<?=$odul=="Almadı"?"selected":""?>>Almadı</option>
            </select>
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Açıklama</span>
            </div>
            <textarea class="form-control" name="aciklama"><?=$aciklama?></textarea>
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
</form>