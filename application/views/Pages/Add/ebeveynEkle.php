<form action="<?=base_url($location)?>" method="post" id="form">
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Ebeveyn</span>
            </div>
            <select name="ebeveyn" class="form-control">
                <option value="Anne">Anne</option>
                <option value="Baba">Baba</option>
            </select>
            <input type="hidden" name="ogrenciId" value="<?=$ogrenciId?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Meslek</span>
            </div>
            <input type="text" class="form-control" placeholder="Meslek" name="meslek">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Doğum Yeri</span>
            </div>
            <input type="text" class="form-control" placeholder="Doğum Yeri" name="dogumYeri">
        </div>
    </div>
</form>