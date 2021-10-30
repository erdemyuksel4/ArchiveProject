<form action="<?=base_url($location)?>" method="post" id="form">
    <div class="row">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Proje Adı</span>
            </div>
            <input name="ad" type="text" class="form-control" placeholder="Proje Adı">
            <input type="hidden" name="ogretmenId" value="<?=$ogretmenId?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Süre</span>

            </div>
            <input type="text" name="sure" class="form-control" placeholder="Süre">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Bütçe</span>

            </div>
            <input type="text" class="form-control" placeholder="Bütçe" name="butce">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Açıklama</span>

            </div>
            <textarea type="text" class="form-control" name="aciklama"></textarea>

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

</form>