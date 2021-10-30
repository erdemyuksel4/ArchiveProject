<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <section class="card">
            <div class="card-header">
                Öğrenciler &nbsp;
                <?php
                if (isset($urls["Add"])) {
                    
                    ?>
                <a class="btn btn-sm btn-success" href="<?=base_url($urls["Add"])?>" type="button">+ Ekle</a>
                <?php   
                }
                ?>
            </div>
            <div class="card-body">
                <div class="adv-table">
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr>
                                <th>Öğrencinin Adı</th>
                                <th>Okul Adı</th>
                                <th>Sınıf</th>
                                <th>Devam Durumu</th>
                                <th>Mezun</th>
                                <th style="display:none"></th>
                                <th style="display:none"></th>
                                <th style="display:none"></th>
                                <th style="display:none"></th>
                                <th style="display:none"></th>
                                <th class="hidden-phone">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($ogrenciler as $key => $value) {
                                ?>
                                <tr>
                                    <td><?=$value["adSoyad"]?></td>
                                    <td><?=$value["okulB"]["ad"]?></td>
                                    <td><?=$value["sinifB"]["sinifAdi"]?></td>
                                    <td><?=(strlen(trim($value["devamDurumu"]))>0)?"Devamsız":"Devamlı"?></td>
                                    <td><?=$value["Mezun"]?></td>
                                    <td style="display:none"><?=$value["dogumTarihi"]?></td>    
                                    <td style="display:none"><?=$value["dogumYeri"]?></td>
                                    <td style="display:none"><?=$value["ttkdKatilimFormu"]?></td>
                                    <td style="display:none"><?=$value["ebaId"]?></td>
                                    <td style="display:none"><?php
                                    foreach ($value["donemler"] as $k => $v) {
                                        echo $v["donemAdi"]." ";
                                    }
                                    ?></td>
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

        </section>
    </div>
</div>