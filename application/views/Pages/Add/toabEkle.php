<form action="<?= base_url($location) ?>" method="post" id="form">
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Ad Soyad</span>
            </div>
            <input type="text" class="form-control" placeholder="Ad Soyad" name="ovtadSoyad" required>
            <input type="hidden" name="okulId" value="<?= $okulId ?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Meslek</span>
            </div>
            <input type="text" class="form-control" placeholder="Meslek" name="ovtmeslek" required>
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Görev</span>
            </div>
            <input type="text" class="form-control" placeholder="Görev" name="ovtgorev" required>
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Telefon Numarası</span>
            </div>
            <input type="tel" class="form-control" placeholder="Telefon Numarası" name="ovttelefonnumarasi" required>
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Email Adresi</span>
            </div>
            <input type="email" class="form-control" placeholder="Email Adresi" name="ovtemailadresi" required>
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Adres</span>
            </div>
            <textarea class="form-control" name="ovtadres" required></textarea>
        </div>
    </div>
</form>