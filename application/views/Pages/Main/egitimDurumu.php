<div class="container">
    <div class="row ">
        <section class="card w-100">
            <div class="card-header">
                Eğitim Durumu &nbsp;
                <?php
                if(isset($ogretmenId)){
                    ?>
                    <button data-info="<?=base_url("Education/EducationAdd/".$ogretmenId)?>" onclick="getmodal(this)" data-title="Eğitim Durumu Ekle" class="btn btn-sm btn-success" type="button">Ekle</button>
                    <?php
                }
                ?>
            </div>
            <div class="card-body">
                <div class="adv-table">
                    <table class="table table-bordered table-bordered table-striped <?=(!isset($ogretmenId))?"dataTable":""?>">
                        <thead>
                            <tr>
                                <th>Öğretmen Adı</th>
                                <th>Düzey</th>
                                <th>Kurum Adı</th>
                                <th>Tez Adı</th>
                                <th class="hidden-phone">İşlemler</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($bilgiler as $key => $bilgi) {
                                ?>
                            <tr>
                                <td><?=$bilgi["ogretmenAdi"]?></td>
                                <td><?=$bilgi["duzey"]?></td>
                                <td><?=$bilgi["kurumAdi"]?></td>
                                <td><?=$bilgi["tezAdi"]?></td>
                                <td>
                                    <button onclick="getmodal(this)"data-info="<?=base_url("/Education/EducationEdit/".$bilgi["id"])?>"
                                        data-title="Eğitim Durumu Düzenle" class=" btn btn-sm btn-warning"
                                        type="button">Düzenle</button>
                                    <button onclick="getmodal(this)"data-info="<?=base_url("/Education/EducationDelete/".$bilgi["id"])?>"
                                        data-title="Emin Misiniz?" class=" btn btn-sm btn-danger"
                                        type="button">Sil</button>
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