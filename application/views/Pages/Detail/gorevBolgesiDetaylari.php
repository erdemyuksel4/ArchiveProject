<div class="container PageArea callArea cp-active">
    <div class="row">
    </div>
    <div class="row">
        <section class="card col">
            <div class="card-header">
                Görev Bölgesi Detayları &nbsp;
                <?php
                if(isset($urls["Edit"])){
                    ?> 
                    <a class="btn btn-sm btn-warning " href="<?=base_url($urls["Edit"])."/".$data["id"]?>" type="button">Düzenle</a>
                    
                    <?php
                }
                ?>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="Area-tab" data-toggle="tab" href="#Area">Görev Bölgesi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Assignment-tab" data-toggle="tab" href="#Assignments">Görev Yerleri</a>
                    </li>
                   
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="Area">
                        <table class="table">
                            <tr>
                                <td>Görev Bölgesi</td>
                                <td><?=$data["bolgeAdi"]?></td>
                            </tr>
                            <tr>
                                <td>Resimler</td>
                                <td>
                                    <div class="py-2">
                                        
                                            <?php
                                            $resimler = ($data["resimler"]);
                                            
                                            foreach ($resimler as $i => $resim) {
                                                if(!empty($resim["yol"])){
                                                    ?>
                                                    <img src="<?=base_url($resim["yol"])?>" class=" p-2 img-sec" >

                                                    <?php

                                                }
                                            }
                                            ?>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Genel Bilgi</td>
                                <td>
                                    <div class="card">
                                        <div class="card-body">
                                            <?=$data["genelBilgi"]?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Öğrenci Profili</td>
                                <td>
                                    <div class="card">
                                        <div class="card-body">
                                            <?=$data["ogrenciProfili"]?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="Assignments">
                        <table class="table">
                            <thead>
                                <th>Görev Yeri</th>
                                <th>İşlemler</th>
                            </thead>
                            <?php 
                            
                                foreach($data_place as $i => $place){
                                    ?>
                                    <tr>
                                        <td><?=$place["yerAdi"]?></td>    
                                        <td>
                                            <?php
                                            if(isset($urls["Detail"])){
                                                ?>
                                                <a class="btn btn-sm btn-info" href="<?=base_url($urls["Detail"])."/".$place["id"]?>" type="button">Detaylar</a>
                                                <?php
                                            }
                                            if(isset($urls["Edit2"])){
                                                ?>
                                                <a class="btn btn-sm btn-warning " href="<?=base_url($urls["Edit2"])."/".$place["id"]?>" type="button">Düzenle</a>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if(isset($urls["Delete"])){
                                                ?>
                                            <button class="btn btn-sm btn-danger" onclick="getmodal(this)" data-info="<?=base_url($urls["Delete"]."/".$place["id"])?>" data-title="Emin Misiniz?" type="button">Sil</button>
                                                <?php
                                            }
                                            ?>
                                        </td>    
                                    </tr>
                                    <?php
                                }
                            
                            ?>
                        </table>
                    </div>
                </div>


            </div>

        </section>
    </div>
</div>