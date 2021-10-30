<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <section class="card col">
                
                <div class="card-header">
                    Görev Yeri Detayları &nbsp;
                    <a href="<?=base_url("MissionPlaces")?>" class="btn btn-sm btn-success" type="button">Geri</a>
                </div>
                <div class="card-body">
                    <div class="container">
                        <table class="table">
                            <tr>
                                <td>Görev Yeri Adı</td>
                                <td><?=$yerAdi?></td>
                            </tr>
                            <tr>
                                <td>Görev Bölge Adı</td>
                                <td><?=$bolgeAdi?></td>
                            </tr>
                            <tr>
                                <td>Resimler</td>
                                <td><div class="py-2">
                                       <?php
                                foreach ($resimler as $key => $resim) {
                                    ?>
                                    <img src="<?=base_url($resim["yol"])?>" class="p-2 img-sec">

                                    <?php
                                }
                                
                                ?>
                                    </div></td>
                            </tr>
                            <tr>
                                <td>Açıklama</td>
                                <td><?=$aciklama?></td>
                            </tr>
                        </table>
    
    
    
                    </div>
    
    
                </div>
    
            
            </section>

    </div>
</div>