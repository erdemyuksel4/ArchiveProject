<form action="<?=base_url($location)?>" method="post" id="form">
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Sınıf</span>
            </div>
            <select class="form-control" name="sinifId">
                <?php
                foreach($siniflar as $value){
                    ?>
                    <option value="<?=$value["id"]?>" ><?=$value["okul"]["ad"]." - ".$value["sinifAdi"]?></option>
                    <?php
                }?>
            </select>
            <input type="hidden" value="<?=$ogretmen["id"]?>" name="ogretmenId">
        </div>
    </div>
</form>