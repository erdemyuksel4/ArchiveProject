<div class="container p-0 m-0">
    <div class="card">
        <div class="card-header">
            Sınıflar &nbsp;
        </div>
        <div class="card-body adv-table">
            
            <table class="table table-bordered table-striped <?=!isset($sinif)?"dataTable":""?>">
                <thead>
                    <tr>
                        <th>Sınıf Adı</th>
                        <th class="hidden-phone">İşlemler</th>
        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($siniflar as $key => $sinif) {
                        ?>
                        <tr>
                            <td><?=$sinif["sinifAdi"]?></td>
                            <td>
                                <?php
                                if(isset($urls["Detail"])){
                                    ?>
                                    <a href="<?=base_url($urls["Detail"]."/".$sinif["id"])?>" class="btn btn-sm btn-info">Detaylar</a>
                                    <?php
                                }
                                ?>
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