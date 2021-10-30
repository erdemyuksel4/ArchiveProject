<div class="container">
    <div class="card">
        <div class="card-header">
            Yakın Bilgisi &nbsp;
            <?php 
            if(isset($ogretmenId)){
                ?>
                <?php
                if (isset($urls["Add"])) {
                    
                    ?>
                <a class="btn btn-sm btn-success" href="<?=base_url($urls["Add"])?>" type="button">+ Ekle</a>
                <?php   
                }
                ?>
                <?php
            }
            ?>
        </div>
        <div class="card-body adv-table">
            
            <table class="table table-bordered table-striped <?=!isset($ogretmenId)?"dataTable":""?>">
                <thead>
                    <tr>
                        <th>Öğretmen Adı</th>
                        <th>Ad Soyad</th>
                        <th>Derece</th>
                        <th>Email</th>
                        <th class="hidden-phone">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    foreach ($bilgiler as $key => $bilgi) {
                        ?>
                        <tr>
                            <td><?=$bilgi["ogretmenAdi"]?></td>
                            <td><?=$bilgi["adSoyad"]?></td>
                            <td><?=$bilgi["derece"]?></td>
                            <td><?=$bilgi["email"]?></td>
                            <td>
                                <?php
                                                if(isset($urls["Detail"])){
                                                    ?>
                                                    <a class="btn btn-sm btn-info " href="<?=base_url($urls["Detail"]."/".$value["id"])?>" type="button">Detaylar</a>
                                                    <?php
                                                }
                                                if(isset($urls["Edit"])){
                                                    ?>
                                                    <a class="btn btn-sm btn-warning " href="<?=base_url($urls["Edit"]."/".$value["id"])?>" type="button">Düzenle</a>
                                                    <?php
                                                }
                                                if(isset($urls["Delete"])){
                                                    ?>
                                                    <button class="btn btn-sm btn-danger " onclick="getmodal(this)" data-info="<?=base_url($urls["Delete"]."/".$value["id"])?>" data-title="Emin Misiniz?" type="button">Sil</button>
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