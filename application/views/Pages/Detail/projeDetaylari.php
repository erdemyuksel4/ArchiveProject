<table class="table">
    <tr>
        <td>Proje Adı</td>
        <td><?=$ad?></td>
    </tr>
    <tr>
        <td>Proje Süresi</td>
        <td><?=$sure?></td>
    </tr>
    <tr>
        <td>Proje Bütçesi</td>
        <td><?=$butce?></td>
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