<div class="container callPage PageArea cp-active">
    <div class="row">
    </div>
    <div class="row">
        <section class="card">
            <div class="card-header">
                Görev Yerleri &nbsp;
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
                                <th>Yer Adı</th>
                                <th>Bölge Adı</th>
                                <th>Resim</th>
                                <th class="hidden-phone">İşlemler</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            
                            foreach(@$yerler as $i => $yer){
                                ?>
                                <tr>
                                    <td><?=$yer["yerAdi"]?></td>
                                    <td><?=$yer["bolgeAdi"]?></td>
                                    <td><?php
                                        $i = 0;
                                        foreach ($yer["resimler"] as $k => $v) {
                                            
                                            if($i<5 and !empty($v)){

                                                ?> 
                                            <img style="max-width:100px;height:50px;width:auto" src="<?=base_url($v["yol"])?>">
                                            <?php
                                            }
                                            $i++;
                                        }
                                    
                                    ?></td>
                                    <td>
                                        <?php
                                        if(isset($urls["Detail"])){
                                            ?>
                                            <a class="btn btn-sm btn-info " href="<?=base_url($urls["Detail"]."/".$yer["id"])?>" type="button">Detaylar</a>
                                            <?php
                                        }
                                        if(isset($urls["Edit"])){
                                            ?>
                                            <a class="btn btn-sm btn-warning " href="<?=base_url($urls["Edit"]."/".$yer["id"])?>" type="button">Düzenle</a>
                                            <?php
                                        }
                                        if(isset($urls["Delete"])){
                                            ?>
                                            <button class="btn btn-sm btn-danger " onclick="getmodal(this)" data-info="<?=base_url($urls["Delete"]."/".$yer["id"])?>" data-title="Emin Misiniz?" type="button">Sil</button>
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