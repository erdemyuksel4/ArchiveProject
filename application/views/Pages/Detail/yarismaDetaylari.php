<table class="table">
    <tr>
        <td>Yarışma Adı</td>
        <td><?=$yarismaAdi?></td>
    </tr>
    <tr>
        <td>Yarışma Tarihi</td>
        <td><?=$tarih?></td>
    </tr>
    <tr>
        <td>Kurum</td>
        <td><?=$kurum?></td>
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
        <td>Ödül</td>
        <td><?=$odul?></td>
    </tr>
    <tr>
        <td>Açıklama</td>
        <td><?=$aciklama?></td>
    </tr>

</table>