<div class="container">
    <div class="card">
        <div class="card-header">
            Yasak Sayfalar &nbsp;
            <?php 
                ?>
                <button data-info="<?=base_url("/ForbiddenPages/PageAdd/")?>" onclick="getmodal(this,()=>{callSelect2();})" data-title="Sayfa Ekle" class="btn btn-sm btn-success" type="button">Ekle</button>
                <?php
            
            ?>
        </div>
        <div class="card-body adv-table">
            
            <table class="table table-bordered table-striped <?=!isset($ogretmenId)?"dataTable":""?>">
                <thead>
                    <tr>
                        <th>Yetki Adı</th>
                        <th>Sayfa Adı</th>
                        <th>Sayfa Yolu</th>
                        <th>Engel Türü</th>
                        <th class="hidden-phone">İşlemler</th>
        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($bilgiler as $key => $bilgi) {
                        ?>
                        <tr>
                            <td><?=$bilgi["yetkiAdi"]?></td>
                            <td><?=$bilgi["sayfaAdi"]?></td>
                            <td><?=$bilgi["sayfaYol"]?></td>
                            <td><?=($bilgi["altSayfalar"]==1)?"Alt Sayfalar":"Hepsi"?></td>
                            <td>
                                <button data-info="<?=base_url("/ForbiddenPages/PageEdit/".$bilgi["id"])?>"onclick="getmodal(this,()=>{callSelect2();})" data-title="Sayfa Düzenle" class="btn btn-sm btn-warning" type="button">Düzenle</button>
                                <button data-info="<?=base_url("/ForbiddenPages/PageDelete/".$bilgi["id"])?>" onclick="getmodal(this,()=>{callSelect2();})"data-title="Emin Misiniz?" class="btn btn-sm btn-danger" type="button">Sil</button>
                            </td>
                        </tr>
                        
                        <?php
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>