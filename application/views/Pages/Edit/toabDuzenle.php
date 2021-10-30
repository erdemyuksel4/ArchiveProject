<form action="<?=base_url($location)?>" method="post" id="form">
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Ad Soyad</span>
            </div>
            <input type="text" class="form-control" placeholder="Ad Soyad" name="adSoyad" value="<?=$adSoyad?>" required>
            <input type="hidden" name="id" value="<?=$id?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Meslek</span>
            </div>
            <input type="text" class="form-control" placeholder="Meslek" name="meslek" value="<?=$meslek?>" required>
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Görev</span>
            </div>
            <input type="text" class="form-control" placeholder="Görev" name="gorev" value="<?=$gorev?>" required>
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Telefon Numarası</span>
            </div>
            <input type="tel" class="form-control" placeholder="Telefon Numarası" name="telefon" value="<?=$telefon?>" required>
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Email Adresi</span>
            </div>
            <input type="email" class="form-control" placeholder="Email Adresi" name="email" value="<?=$email?>" required>
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Adres</span>
            </div>
            <textarea class="form-control" name="adres" required><?=$adres?></textarea>
        </div>
    </div>
</form>