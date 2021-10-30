<form action="<?=base_url($location)?>" method="post" id="form">
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Ad</span>
            </div>
            <input type="text" class="form-control" placeholder="Ad" name="ad" >
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Başlangıç</span>
            </div>
            <input type="number" class="form-control" name="baslangicD" placeholder="Gün"  min="1" max="31">
            <input type="number" class="form-control" name="baslangicM"placeholder="Ay" min="1" max="12">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Bitiş</span>
            </div>
            <input type="number" class="form-control" name="bitisD" placeholder="Gün" min="1" max="31">
            <input type="number" class="form-control" name="bitisM" placeholder="Ay"  min="1" max="12">
        </div>
    </div>
</form>