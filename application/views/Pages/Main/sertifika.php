
<div class="container">
    <div class="card">
        <div class="card-header">
            Sertifika ve Belge Bilgisi &nbsp;
            <?php 
            if(isset($ogretmenId)){
                ?>
                <?php
                if (isset($urls["Add"])) {
                    
                    ?>
                <a class="btn btn-sm btn-success" href="<?=base_url($urls["Add"])?>" type="button">+ Ekle</a>
                <?php   
                }
                
            }
            ?>
        </div>
        <div class="card-body adv-table">
            
            <table class="table table-bordered table-striped <?=!isset($ogretmenId)?"dataTable":""?>">
                <thead>
                    <tr>
                        <th>Öğretmen Adı</th>
                        <th>No</th>
                        <th>Kurum Adı</th>
                        <th>Süre</th>
                        <th>Tarih</th>
                        <th class="hidden-phone">İşlemler</th>
        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    foreach ($bilgiler as $key => $bilgi) {
                        ?>
                        <tr>
                            <td><?=$bilgi["ogretmenAdi"]?></td>
                            <td><?=$bilgi["no"]?></td>
                            <td><?=$bilgi["kurum"]?></td>
                            <td><?=$bilgi["sure"]?></td>
                            <td><?=$bilgi["tarih"]?></td>
                            <td>
                                <?php
                                if(isset($urls["Detail"])){
                                    ?>
                                    <a class="btn btn-sm btn-info " href="<?=base_url($urls["Detail"]."/".$bilgi["id"])?>" type="button">Detaylar</a>
                                    <?php
                                }
                                if(isset($urls["Edit"])){
                                    ?>
                                    <a class="btn btn-sm btn-warning " href="<?=base_url($urls["Edit"]."/".$bilgi["id"])?>" type="button">Düzenle</a>
                                    <?php
                                }
                                if(isset($urls["Delete"])){
                                    ?>
                                    <button class="btn btn-sm btn-danger " onclick="getmodal(this)" data-info="<?=base_url($urls["Delete"]."/".$bilgi["id"])?>" data-title="Emin Misiniz?" type="button">Sil</button>
                                    <?php
                                }
                                ?></td>
                        </tr>
                        
                        <?php
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>