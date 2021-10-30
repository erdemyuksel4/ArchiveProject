<form action="<?= base_url($location) ?>" method="post" id="form">
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Konu Adı</span>
            </div>
            <input type="text" class="form-control" placeholder="Konu Adı" name="konu" value="<?=$b["konu"]?>">
            <input type="hidden" name="id" value="<?=$b["id"]?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Hafta</span>
            </div>
            <input type="number" class="form-control" placeholder="Hafta" name="hafta" value="<?=$b["hafta"]?>">
        </div>
    </div>
</form>