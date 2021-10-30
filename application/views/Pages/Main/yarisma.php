<div class="container">
    <div class="card">
        <div class="card-header">
            Katıldığı Yarışma ve Ödül Bilgisi &nbsp;
            <?php 
            if(isset($ogrenciId)){
                ?>
                <?php
                if (isset($urls["Add"])) {
                        ?>
                    <button class="btn btn-sm btn-success"  onclick="getmodal(this)"data-title="Ödül & Yarışma Bilgisi Ekle" data-info="<?=base_url($urls["Add"])."/".$ogrenciId?>" type="button">+ Ekle</button>
                    <?php   
                    }
                    ?>
                <?php
            }
            ?>
        </div>
        <div class="card-body adv-table">
            
            <table class="table table-bordered table-striped <?=!isset($ogrenciId)?"dataTable":""?>">
                <thead>
                    <tr>
                        <th>Öğrenci Adı</th>
                        <th>Yarışma Adı</th>
                        <th>Tarih</th>
                        <th>Kurum</th>
                        <th>Ödül</th>
                        <th class="hidden-phone">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($bilgiler as $key => $bilgi) {
                        ?>
                        <tr>
                            <td><?=$bilgi["ogrenciAdi"]?></td>
                            <td><?=$bilgi["yarismaAdi"]?></td>
                            <td><?=$bilgi["tarih"]?></td>
                            <td><?=$bilgi["kurum"]?></td>
                            <td><?=$bilgi["odul"]?></td>
                            <td>
                                <?php
                                if(isset($urls["Detail"])){
                                    ?>
                                    <button class="btn btn-sm btn-info "  data-title="Ödül & Yarışma Bilgisi Detayları" data-info="<?=base_url($urls["Detail"]."/".$value["id"])?>" type="button">Detaylar</button>
                                    <?php
                                }
                                if(isset($urls["Edit"])){
                                    ?>
                                    <button class="btn btn-sm btn-warning " data-title="Ödül & Yarışma Bilgisi Düzenle" data-info="<?=base_url($urls["Edit"]."/".$value["id"])?>" type="button">Düzenle</button>
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
</div>