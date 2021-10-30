<div class="container p-0 m-0">
    <div class="card">
        <div class="card-header">
            <?=$sinifB["sinifAdi"]?> Ders Programı &nbsp;
            <?php
            if($urls["Back"]&&trim($urls["Back"])!=""){
                ?>
                <a class="btn btn-sm btn-primary" href="<?=base_url($urls["Back"])?>"><i class="fa fa-arrow-left"></i> Diğer</a>
                <?php
            }
            ?>
            <?php
            if($urls["Add"]&&$sinifB["id"]){
                ?>
                <button class="btn btn-sm btn-success" data-info="<?=base_url("Lessons/LessonAdd/".$sinifB["id"])?>"onclick="getmodal(this)"  data-title="Ders Ekle">+ Ekle</button>
                <?php
            }
            ?>
        </div>
        <div class="card-body adv-table">
            
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sınıf Adı</th>
                        <th>Saat</th>
                        <th>Platform</th>
                        <th class="hidden-phone">İşlemler</th>
        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($bilgiler as $key => $bilgi) {
                        ?>
                        <tr>
                            <td><?=$bilgi["dersZamani"]?></td>
                            <td><?=$bilgi["saat"]?></td>
                            <td><?=$bilgi["platform"]?></td>
                            <td>
                                <?php
                                if(isset($urls["Edit"])){
                                    ?>
                                    <button data-info="<?=base_url("Lessons/LessonEdit/".$bilgi["id"])?>"onclick="getmodal(this)" data-title="Ders Düzenle" class="btn btn-sm btn-warning">Düzenle</button>
                                    <?php
                                }
                                
                                if(isset($urls["Delete"])){
                                    ?>
                                    <button data-info="<?=base_url("Lessons/LessonDelete/".$bilgi["id"])?>"onclick="getmodal(this)"  data-title="Emin Misiniz?" class="btn btn-sm btn-danger">Sil</button>
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