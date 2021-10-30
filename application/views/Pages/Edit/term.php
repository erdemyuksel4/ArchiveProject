<form action="<?=base_url($location)?>" method="post" id="form">
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Başlangıç Yıl</span>
            </div>
            <input type="text" name="baslangicYil" class="form-control" placeholder="Başlangıç Yılı" id="" value="<?=$baslangicYil?>">
            <input type="hidden" name="id" value="<?=$id?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Bitiş Yıl</span>
            </div>
            <input type="text" class="form-control" placeholder="Bitiş Yılı"name="bitisYil"value="<?=$bitisYil?>">
        </div>
    </div>
    <div class="row py-2">
        <div class="input-group flex-nowrap col">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px">Aktif Dönem</span>
            </div>
            <div class="custom-control custom-checkbox">
                <input class="my-2" type="checkbox" name="aktifDonem" id="aktifDonem"<?=($aktifDonem==1)?"checked":""?>>
            </div>
        </div>
    </div>
    
</form>