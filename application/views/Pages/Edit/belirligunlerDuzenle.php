<form action="<?=base_url($location)?>" method="post" id="form">
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Ad</span>
            </div>
            <input type="text" class="form-control" placeholder="Ad" name="ad" value="<?=$ad?>">
            <input type="hidden" name="id" value="<?=$id?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Başlangıç</span>
            </div>
            <input type="number" class="form-control" name="baslangicD" placeholder="Gün" value="<?=$baslangicD?>" min="1" max="31">
            <input type="number" class="form-control" name="baslangicM"placeholder="Ay" value="<?=$baslangicM?>" min="1" max="12">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Bitiş</span>
            </div>
            <input type="number" class="form-control" name="bitisD" placeholder="Gün" value="<?=$bitisD?>" min="1" max="31">
            <input type="number" class="form-control" name="bitisM" placeholder="Ay" value="<?=$bitisM?>" min="1" max="12">
        </div>
    </div>
</form>