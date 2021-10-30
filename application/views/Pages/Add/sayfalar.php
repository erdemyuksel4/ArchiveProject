<form action="<?=base_url($location)?>" method="post" id="form">
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Yetki Adı</span>
            </div>
            <select name="yetkiId[]" id="" class="form-control select2" multiple>
                <?php 
                foreach($yetkiler as $yetki){
                    ?>
                    <option value="<?=$yetki["id"]?>"><?=$yetki["yetkiAdi"]?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Sayfa Adı</span>

            </div>
            <input type="text" class="form-control" placeholder="Sayfa Adı" name="sayfaAdi">

        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Sayfa Yolu</span>

            </div>
            <input type="text" name="sayfaYol" id="" class="form-control" placeholder="Sayfa Yolu">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:180px">Ana Sayfa Hariç Engellensin</span>

            </div>
            <input type="checkbox" class="m-2" name="altSayfalar">
        </div>
    </div>
</form>