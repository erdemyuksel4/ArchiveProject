<table class="table">
    <tr>
        <td>Ad Soyad</td>
        <td><?=$adSoyad?></td>
    </tr>
    <tr>
        <td>Doğum Tarihi</td>
        <td><?=$dogumTarihi?></td>          
    </tr>
    <tr>
        <td>Doğum Yeri</td>
        <td><?=$dogumYeri?></td>
    </tr>
    <tr>
        <td>Telefon Numarası</td>
        <td><?=$telefon?></td>
    </tr>
    <tr>
        <td>Email Adresi</td>
        <td><?=$email?></td>
    </tr>
    <tr>
        <td>Aşı Durumu</td>
        <td>
            <?php
            foreach ($asi==null?$asi=[]:$asi=$asi as $key => $value) {
                echo $value."<br>";
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>Yakınlık Derecesi</td>
        <td><?=$derece?></td>
    </tr>
    <tr>
        <td>TC Kimlik No</td>
        <td><?=$tckn?></td>
    </tr>
</table>