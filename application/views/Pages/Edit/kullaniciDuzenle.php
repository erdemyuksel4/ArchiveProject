<form action="<?=base_url($location)?>" id="form" method="post">
    <?php
    if(isset($locationA)&&isset($locationAText)){
        ?>
        <div class="row py-2">
            <span class="mx-2"><a class="btn btn-sm btn-info" href="<?=base_url($locationA)?>"><?=$locationAText?></a></span>
        </div>
        
        <?php
    }
    ?>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Rol</span>
            </div>
            <select class="form-control" name="yetkiId">
                <?php
                
                foreach ($perms as $key => $perm) {
                    ?>
                    <option value="<?=$perm["id"]?>" <?=$yetkiId==$perm["id"]?"selected":""?>><?=$perm["yetkiAdi"]?></option>
                    <?php
                }
                
                ?>
            </select>
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Ad Soyad</span>

            </div>
            <input type="text" class="form-control" placeholder="Ad Soyad" name="adSoyad" value="<?=$adSoyad?>">
            <input type="hidden" name="id" value="<?=$id?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Kullanıcı Adı</span>

            </div>
            <input type="text" class="form-control" placeholder="Kullanıcı Adı" name="kullaniciAdi" value="<?=$kullaniciAdi?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Email Adresi</span>

            </div>
            <input type="email" class="form-control" placeholder="Email Adresi" name="email" value="<?=$email?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Telefon Numarası</span>

            </div>
            <input type="tel" class="form-control" placeholder="Telefon Numarası" name="telefon" value="<?=$telefon?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Şifre</span>

            </div>
            <input type="password" class="form-control" placeholder="Şifre" name="sifre" >
        </div>
    </div>
</form>