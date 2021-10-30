<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <section class="card">
            <div class="card-header">
                Öğretim Dönemleri &nbsp;
                <?php
                if (isset($urls["Add"])) {
                    
                    ?>
                <button class="btn btn-sm btn-success"onclick="getmodal(this)"  data-title="Öğretim Dönemi Ekle" data-info="<?=base_url($urls["Add"])?>" type="button">+ Ekle</button>
                <?php   
                }
                ?>

            </div>
            <div class="card-body">
                <div class="adv-table">
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr>
                                <th>Dönem</th>
                                <th>Aktif Dönem</th>
                                <th class="hidden-phone">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($data as $key=> $value){
                                    
                                    ?>
                                    <tr>
                                        <td><?=$value["donem"]?></td>
                                        <td><?=$value["aktifDonem"]==1?"Aktif":""?></td>
                                        <td>
                                            <?php
                                                
                                                if(isset($urls["Edit"])){
                                                    ?>
                                                    <a class="btn btn-sm btn-warning " onclick="getmodal(this)" data-title="Öğretim Dönemi Düzenle" data-info="<?=base_url($urls["Edit"]."/".$value["id"])?>" type="button">Düzenle</a>
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