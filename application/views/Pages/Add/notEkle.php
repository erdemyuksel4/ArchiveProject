<form action="<?=base_url($location) ?>" method="post" id="form">
    <div class="row">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Not</span>
            </div>
            <input type="hidden" name="ogrenciId" value="<?=$ogrenciId?>">
            <select name="ogrenciNot" class="form-control">
            <?php 
            foreach(["Çok İyi","İyi","Orta","Geçer"] as $key => $value){
                ?>
                <option value="<?=$value?>"><?=$value?></option>
                <?php
            }
            
            ?>
            </select>
        </div>
    </div>
</form>