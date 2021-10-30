<div class="container w-100">
    <div class="row">
    </div>
    <div class="row">
        <section class="card w-100">
            <div class="card-header">
                Öğretmenler &nbsp;
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
                                <th>Ad Soyad</th>
                                <th>Görev Bölgesi</th>
                                <th>Okul</th>
                                <th class="hidden-phone">İşlemler</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($ogretmenler as $key => $ogretmen) {
                                ?>
                                <tr>
                                    <td><?=$ogretmen["adSoyad"]?></td>
                                    <td><?=$ogretmen["gorevBolgesi"]?></td>
                                    <td><?=$ogretmen["okulAdi"]?></td>
                                    <td>
                                        <?php
                                                if(isset($urls["Detail"])){
                                                    ?>
                                                    <a class="btn btn-sm btn-info " href="<?=base_url($urls["Detail"]."/".$ogretmen["id"])?>" type="button">Detaylar</a>
                                                    <?php
                                                }
                                                if(isset($urls["Edit"])){
                                                    ?>
                                                    <a class="btn btn-sm btn-warning " href="<?=base_url($urls["Edit"]."/".$ogretmen["id"])?>" type="button">Düzenle</a>
                                                    <?php
                                                }
                                                if(isset($urls["Delete"])){
                                                    ?>
                                                    <button class="btn btn-sm btn-danger " onclick="getmodal(this)" data-info="<?=base_url($urls["Delete"]."/".$ogretmen["id"])?>" data-title="Emin Misiniz?" type="button">Sil</button>
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