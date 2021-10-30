<form action="<?=base_url($location) ?>" method="post" id="form">
    <div class="row">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Not</span>
            </div>
            <input type="hidden" name="id" value="<?=$id?>">
            <select name="ogrenciId" class="form-control">
            <?php 
            foreach(["Çok İyi","İyi","Orta","Geçer"] as $key => $value){
                ?>
                <option value="<?=$value?>" <?=$value==$ogrenciNotu?"selected":""?>><?=$value?></option>
                <?php
            }
            
            ?>
            </select>
        </div>
    </div>
</form>