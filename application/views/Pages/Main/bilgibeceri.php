<div class="container">
    <div class="card">
        <div class="card-header">
            Bilgi ve Beceriler &nbsp;
            <?php 
            if(isset($ogretmenId)){
                ?>
                <button data-info="<?=base_url("/Knowledge/KnowledgeAdd/".$ogretmenId)?>" onclick="getmodal(this)" data-title="Bilgi & Beceri Ekle" class="btn btn-sm btn-success" type="button">Ekle</button>
                <?php
            }
            ?>
        </div>
        <div class="card-body adv-table">
            
            <table class="table table-bordered table-striped <?=!isset($ogretmenId)?"dataTable":""?>">
                <thead>
                    <tr>
                        <th>Öğretmen Adı</th>
                        <th>Bilgi / Beceri</th>
                        <th>Seviye</th>
                        <th>Açıklama</th>
                        <th class="hidden-phone">İşlemler</th>
        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($bilgiler as $key => $bilgi) {
                        ?>
                        <tr>
                            <td><?=$bilgi["ogretmenAdi"]?></td>
                            <td><?=$bilgi["bilgiBeceri"]?></td>
                            <td><?=$bilgi["seviye"]?></td>
                            <td><?=$bilgi["aciklama"]?></td>
                            <td>
                                <button data-info="<?=base_url("/Knowledge/KnowledgeEdit/".$bilgi["id"])?>"onclick="getmodal(this)" data-title="Bilgi & Beceri Düzenle" class="getmodal btn btn-sm btn-warning" type="button">Düzenle</button>
                                <button data-info="<?=base_url("/Knowledge/KnowledgeDelete/".$bilgi["id"])?>" onclick="getmodal(this)"data-title="Emin Misiniz?" class="getmodal btn btn-sm btn-danger" type="button">Sil</button>
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