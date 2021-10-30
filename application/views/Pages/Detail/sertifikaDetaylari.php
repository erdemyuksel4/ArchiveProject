<table class="table">
    <tr>
        <td>Sertifika / Belge Adı</td>
        <td><?=$ad?></td>
    </tr>
    <tr>
        <td>Tarih</td>
        <td><?=$tarih?></td>
    </tr>
    <tr>
        <td>No</td>
        <td><?=$no?></td>
    </tr>
    <tr>
        <td>Kurum</td>
        <td><?=$kurum?></td>
    </tr>
    <tr>
        <td>Süre</td>
        <td><?=$sure?></td>
    </tr>
    <tr>
        <td>Açıklama</td>
        <td><?=$aciklama?></td>
    </tr>
    <tr>
        <td>Resim</td>
        <td>
            <div class="py-2">
                <?php
                foreach ($resimler as $key => $resim) {
                    ?>
                    <img src="<?=base_url($resim["yol"])?>" class="p-2 img-sec">

                    <?php
                }
                
                ?>
            </div>
        </td>
    </tr>
</table>