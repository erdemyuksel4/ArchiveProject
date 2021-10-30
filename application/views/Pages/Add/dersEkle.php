<form action="<?=base_url($location)?>" method="post" id="form">
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Ders Zamanı</span>
            </div>
            <select class="form-control" name="dersZamani">
                <?php
                foreach(["Okul Ders Saatlari İçinde", "Okul Ders Saatleri Dışında", "Çevrimiçi"] as $value){
                    ?>
                    <option value="<?=$value?>"><?=$value?></option>
                    <?php
                }?>
            </select>
            <input type="hidden" value="<?=$sinif?>" name="sinifId">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Saat</span>
            </div>
            <input type="text" class="form-control" placeholder="Saat" name="saat">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Platform</span>
            </div>
            <input type="text" class="form-control" placeholder="Platform" name="platform">
        </div>
    </div>
</form>