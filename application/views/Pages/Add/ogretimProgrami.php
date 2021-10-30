<form action="<?=base_url($location)?>" id="form" method="post">
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Konu Adı</span>
            </div>
            <input type="text" name="konu" class="form-control" placeholder="Konu Adı">
            <input type="hidden" name="sinifId" value="<?=$sinifId?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Hafta</span>
            </div>
            <input type="number" name="hafta" class="form-control" placeholder="Hafta">
        </div>
    </div>
</form>