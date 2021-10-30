<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <section class="card w-100">
            <div class="card-header">
                Belirli Günler ve Haftalar &nbsp;
                <?php 
                if(isset($urls["Add"])){
                ?>
                <button class="btn btn-sm btn-success" onclick="getmodal(this)" data-info="<?=base_url($urls["Add"])?>" data-title="Yeni Gün veya Hafta Ekle" type="button">+ Ekle</button>
                <?php
                }
                ?>
            </div>
            <div class="card-body">
                <div class="adv-table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Ad</th>
                                <th>Başlangıç(Gün/Ay)</th>
                                <th>Bitiş(Gün/Ay)</th>
                                <th class="hidden-phone">İşlemler</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($bilgiler as $key => $bilgi) {
                                ?>
                                <tr>
                                    <td><?=$bilgi["ad"]?></td>
                                    <td><?=$bilgi["baslangic"]?></td>
                                    <td><?=$bilgi["bitis"]?></td>
                                    <td>
                                        <?php
                                        if(isset($urls["Edit"])){
                                        ?>
                                        <button data-info="<?=base_url($urls["Edit"])."/".$bilgi["id"]?>" onclick="getmodal(this)"data-title="Gün veya Hafta Düzenle" class="btn btn-sm btn-warning">Düzenle</button>
                                        <?php
                                        }
                                        if(isset($urls["Delete"])){
                                        ?>
                                        <button class="btn btn-sm btn-danger" onclick="getmodal(this)" data-info="<?=base_url($urls["Delete"])."/".$bilgi["id"]?>" data-title="Emin Misiniz?" type="button">Sil</button>
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