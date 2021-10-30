<div class="container ">
    <div class="row ">
        <section class="card w-100">
            <div class="card-header">
                Ebeveyn Bilgileri &nbsp;
                <?php
                if(isset($ogrenciId)){
                    ?>
                    <button data-info="<?=base_url("Parents/ParentAdd/".$ogrenciId)?>" onclick="getmodal(this)" data-title="Ebeveyn Bilgisi Ekle" class="btn btn-sm  btn-success" type="button">Ekle</button>
                    <?php
                }
                ?>
            </div>
            <div class="card-body">
                <div class="adv-table">
                    <table class="table table-bordered table-bordered table-striped <?=(!isset($ogrenciId))?"dataTable":""?>">
                        <thead>
                            <tr>
                                <th>Öğrenci Adı</th>
                                <th>Ebeveyn</th>
                                <th>Doğum Yeri</th>
                                <th>Meslek</th>
                                <th class="hidden-phone">İşlemler</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($bilgiler as $key => $bilgi) {
                                ?>
                            <tr>
                                <td><?=$bilgi["ogrenciAdi"]?></td>
                                <td><?=$bilgi["ebeveyn"]?></td>
                                <td><?=$bilgi["dogumYeri"]?></td>
                                <td><?=$bilgi["meslek"]?></td>
                                <td>
                                    <button onclick="getmodal(this)"data-info="<?=base_url("/Parents/ParentEdit/".$bilgi["id"])?>"
                                        data-title="Ebeveyn Bilgisi Düzenle" class=" btn btn-sm btn-warning"
                                        type="button">Düzenle</button>
                                    <button onclick="getmodal(this)" data-info="<?=base_url("/Parents/ParentDelete/".$bilgi["id"])?>"
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