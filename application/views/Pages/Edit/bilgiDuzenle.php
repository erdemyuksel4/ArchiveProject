<form action="<?=base_url($location)?>" method="post" id="form"><div class="row">
    <div class="input-group flex-nowrap col">
        <div class="input-group-prepend">
            <span class="input-group-text" style="width:150px">Bilgi / Beceri</span>
        </div>
        <input type="text" class="form-control" placeholder="Bilgi / Beceri" name="bilgiBeceri" value="<?=$bilgiBeceri?>">
        <input type="hidden" name="id" value="<?=$id?>">
    </div>
</div>
<div class="row py-2">
    <div class="input-group flex-nowrap col">
        <div class="input-group-prepend">
            <span class="input-group-text" style="width:150px">Seviye</span>

        </div>
        <input type="text" class="form-control" placeholder="Seviye" name="seviye"value="<?=$seviye?>">
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
</form>