<div class="container">
    <div class="card">
        <div class="card-header">
            Sınıflar &nbsp;
            <?php
            
                ?>
                <?php
                if (isset($urls["Add"])) {
                    ?>
                <button class="btn btn-sm btn-success" data-title="Sınıf Ekle"  onclick="getmodal(this)" data-info="<?=base_url($urls["Add"])."/".$ogretmen["id"]?>" type="button">+ Ekle</button>
                <?php   
                }
                ?>
                <?php
            
            ?>
        </div>
        <div class="card-body adv-table">
            
            <table class="table table-bordered table-striped <?=!isset($ogretmenId)?"dataTable":""?>">
                <thead>
                    <tr>
                        <th>Sınıf</th>
                       
                        <th class="hidden-phone">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(is_array($ogretmen["siniflar"])&&count($ogretmen["siniflar"])>0){

                        foreach ($ogretmen["siniflar"] as $key => $sinif) {
                            ?>
                            <tr>
                                <td><?=$sinif["sinifAdi"]?></td>
                                <td>
                                    <?php
                                        if(isset($urls["Detail"])){
                                            ?>
                                            <a class="btn btn-sm btn-info " href="<?=base_url($urls["Detail"]."/".$sinif["id"])?>" type="button">Detaylar</a>
                                            <?php
                                        }
                                        if(isset($urls["Delete"])){
                                            ?>
                                            <button class="btn btn-sm btn-danger " onclick="getmodal(this)" data-info="<?=base_url($urls["Delete"]."/".$ogretmen["id"]."-".$sinif["id"])?>" data-title="Emin Misiniz?" type="button">Sil</button>
                                            <?php
                                        }
                                        ?></td>
                            </tr>
                            
                            <?php
                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>