<form action="<?=base_url($location)?>" method="post" id="form">
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Başlangıç Yıl</span>
            </div>
            <input type="text" name="baslangicYil" class="form-control" placeholder="Başlangıç Yılı">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Bitiş Yıl</span>
            </div>
            <input type="text" class="form-control" placeholder="Bitiş Yılı"name="bitisYil">
        </div>
    </div>
</form>