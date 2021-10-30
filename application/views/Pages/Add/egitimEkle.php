<form action="<?=base_url($location)?>" method="post"id="form">
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Düzey</span>
            </div>
            <select class="form-control" name="duzey">
                <option value="Lisans">Lisans</option>
                <option value="Yüksek Lisans">Yüksek Lisans</option>
                <option value="Doktora">Doktora</option>
            </select>
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Kurum Adı</span>
            </div>
            <input type="text" class="form-control" placeholder="Kurum Adı" name="kurumAdi">
            <input type="hidden" name="ogretmenId" value="<?=$ogretmenId?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Tez Adı</span>
            </div>
            <input type="text" class="form-control" placeholder="Tez Adı" name="tezAdi">
        </div>
    </div>
</form>