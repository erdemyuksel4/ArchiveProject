<form action="<?=base_url($location)?>" method="post" id="form">
    <div class="row">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Ad Soyad</span>
            </div>
            <input type="text" class="form-control" placeholder="Ad Soyad" name="adSoyad">
            <input type="hidden" name="ogretmenId" value="<?=$ogretmenId?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Doğum Tarihi</span>
            </div>
            <input type="date" class="form-control" name="dogumTarihi">
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
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Telefon Numarası</span>
            </div>
            <input type="tel" class="form-control" placeholder="Telefon Numarası" name="telefon">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Email Adresi</span>
            </div>
            <input type="email" class="form-control" placeholder="Email Adresi" name="email">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Aşı Durumu</span>
            </div>


        </div>

    </div>
    <div class="row py-2">


        <div class="input-group flex-nowrap col">

            <input type="text" class="form-control" placeholder="Aşı" id="Asi">
            <div class="input-group-prepend">
                <button onclick="AddToTable('asiTablo',[$('#Asi').val()],'asi')" class="btn btn-success" type="button">Ekle</button>
            </div>
        </div>


    </div>
    <div class="row py-2">

        <table class="table table-bordered table-striped col-9 mx-3" id="asiTablo">
            <thead>
                <tr>
                    <th>Aşı</th>
                    <th class="hidden-phone">İşlemler</th>

                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Yakınlık Derecesi</span>
            </div>
            <select name="derece" class="form-control">
                <option value="Eş">Eş</option>
                <option value="Çocuk">Çocuk</option>
            </select>
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">TC Kimlik No</span>
            </div>
            <input type="text" class="form-control" placeholder="TC Kimlik No" name="tckn">
        </div>
    </div>
</form>