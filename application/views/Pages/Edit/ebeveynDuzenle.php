<form action="<?=base_url($location)?>" method="post" id="form">
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Ebeveyn</span>
            </div>
            <select name="ebeveyn" class="form-control">
                <option value="Anne" <?=$ebeveyn=="Anne"?"selected":""?>>Anne</option>
                <option value="Baba" <?=$ebeveyn=="Baba"?"selected":""?>>Baba</option>
            </select>
            <input type="hidden" name="id" value="<?=$id?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Meslek</span>
            </div>
            <input type="text" class="form-control" placeholder="Meslek" name="meslek" value="<?=$meslek?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Doğum Yeri</span>
            </div>
            <input type="text" class="form-control" placeholder="Doğum Yeri" name="dogumYeri" value="<?=$dogumYeri?>">
        </div>
    </div>
</form>