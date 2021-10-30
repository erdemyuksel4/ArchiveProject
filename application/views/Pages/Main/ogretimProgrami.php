<div class="container w-100">
    <div class="row">
    </div>
    <div class="row">
        <section class="card w-100">
            <div class="card-header">   
                Öğretim Programı &nbsp;
                <?php 
                if(isset($urls["A"])){
                    ?>
                    <a class="btn btn-sm btn-warning" href="<?=base_url($urls["A"])."/".$sinifId?>">Düzenle</a>
                    <?php
                }
                if(isset($urls["Add"])&&!isset($urls["A"])){
                    ?>
                    <button data-info="<?=base_url($urls["Add"])."/".$sinifId?>" data-title="Konu Ekle" onclick="getmodal(this)" class="btn btn-sm btn-success" type="button">Ekle</button>
                    <?php
                }?>
            </div>
            <div class="card-body">
                <div class="adv-table">
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr>
                                <th>Hafta</th>
                                <th>Konu Adı</th><?php
                                if(isset($urls["Edit"])||isset($urls["Delete"])){
                                    ?> 
                                <th class="hidden-phone">İşlemler</th>
                                <?php
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($b as $key => $value) {
                                ?>
                                <tr>
                                    <td><?=$value["hafta"]?>.Hafta</td>
                                    <td><?=$value["konu"]?></td><?php
                                    if(isset($urls["Edit"])||isset($urls["Delete"])){
                                        ?> 
                                    <td>
                                        <?php 
                                        if(isset($urls["Edit"])&&!isset($urls["A"])){
                                            ?>
                                            <button data-info="<?=base_url($urls["Edit"])."/".$value["id"]?>" data-title="Konu Düzenle" onclick="getmodal(this)" class=" btn btn-sm btn-warning" type="button">Düzenle</button>
                                            <?php
                                        }
                                        if(isset($urls["Delete"])&&!isset($urls["A"])){
                                            ?>
                                            <button data-info="<?=base_url($urls["Delete"])."/".$value["id"]?>" data-title="Emin Misiniz?" onclick="getmodal(this)" class=" btn btn-sm btn-danger" type="button">Sil</button>
                                            <?php
                                        }
                                        
                                        ?>
                                    </td>

                                    <?php
                                    }
                                    ?>
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