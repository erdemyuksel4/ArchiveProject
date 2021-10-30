<div class="container w-100">
    <div class="row">
    </div>
    <div class="row">
        <section class="card w-100">
            <div class="card-header">
                Okullar &nbsp;
                <?php
                if (isset($urls["Add"])) {
                    
                    ?>
                <a class="btn btn-sm btn-success" href="<?=base_url($urls["Add"])?>" type="button">+ Ekle</a>
                <?php   
                }
                ?>

            </div>
            <div class="card-body w-100">
                <div class="adv-table">
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr>
                                <th>Okul Adı</th>
                                <th>Okul Türü</th>
                                <th style="display:none"></th>
                                <th style="display:none"></th>
                                <th style="display:none"></th>
                                <th class="hidden-phone">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            foreach ($okullar as $key => $value) {
                                ?>
                                <tr>
                                    <td><?=$value["ad"]?></td>
                                    <td><?=$value["tur"]["turAdi"]??""?></td>
                                    <td style="display:none"><?=$value["adres"]?></td>
                                    <td style="display:none"><?=$value["telefon"]?></td>
                                    <td style="display:none"><?=$value["email"]?></td>
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