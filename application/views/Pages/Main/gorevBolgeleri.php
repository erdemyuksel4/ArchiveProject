<div class="container callPage PageArea cp-active">
    <div class="row">
    </div>
    <div class="row">
        <section class="card">
            <div class="card-header">
                Görev Bölgeleri &nbsp;
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
                                <th>Bölge Adı</th>
                                <th>Resim</th>
                                <th class="hidden-phone">İşlemler</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($data as $key=> $value){
                                    
                                    ?>
                                    <tr>
                                        <td><?=$value["bolgeAdi"]?></td>
                                        <td>
                                            

                                            
                                            <?php
                                            $resimler = ($value["resimler"]);
                                            
                                            foreach ($resimler as $resim){
                                               if(!empty($resim["yol"])){
                                                ?>
                                                <img src="<?=base_url($resim["yol"])?>" style="max-width:100px;width:auto;height:50px;">
                                                <?php

                                               }

                                                
                                            }
                                            ?>
                                        </td>
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

        </section>
    </div>
</div>