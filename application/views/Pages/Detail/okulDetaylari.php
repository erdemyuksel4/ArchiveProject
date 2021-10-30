<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <section class="card col">
            <div class="card-header">
                Okul Detayları &nbsp;
                <?php
                if(isset($urls["Edit"])){
                    ?>
                    <a href="<?=base_url($urls["Edit"]."/$id")?>" class="btn btn-sm btn-warning">Düzenle</a>
                    <?php
                }
                ?>
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row py-2">

                        <table class="table">
                            <tr>
                                <td>Okul Adı</td>
                                <td><?=$ad?></td>
                            </tr>
                            <tr>
                                <td>Okulun Türü</td>
                                <td><?=$okulTuru?></td>
                            </tr>
                            <tr>
                                <td>Görev Bölgesi</td>
                                <td><?=$bolgeAdi?></td>
                            </tr>
                            <tr>
                                <td>Görev Yeri</td>
                                <td><?=$yerAdi?></td>
                            </tr>
                            <tr>
                                <td>Resimler</td>
                                <td>
                                    <div class="py-2">
                                        <?php 
                                        foreach ($resimler as $i => $resim) {
                                            if(!empty($resim["yol"])){
                                                ?>
                                                <img src="<?=base_url($resim["yol"])?>" class="p-2 img-sec">
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Genel Bilgi</td>
                                <td><?=$genelBilgi?></td>
                            </tr>
                        </table>
                    </div>


                </div>
                <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" id="TTKDSiniflar-tab" data-toggle="tab" href="#TTKDSiniflar">TTKD
                            Sınıfları</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Iletisim-tab" data-toggle="tab" href="#Iletisim">İletişim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="TOABBilgileri-tab" data-toggle="tab" href="#TOABBilgileri">TOAB
                            Bilgileri</a>
                    </li>
                    <?php

                        ?>
                        <li class="nav-item">
                            <a class="nav-link" id="TOAB-OVT-tab" data-toggle="tab" onclick="PageLoader(this)" data-info="<?=base_url("TOABOVT/OVT/".$id)?>" href="#TOAB-OVT">TOAB-OVT Görevli
                                Listesi</a>
                        </li>
                        
                        
                        <?php
                    
                    
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" id="ogretmenGorusleri-tab" data-toggle="tab"
                            href="#ogretmenGorusleri">Öğretmen Görüşleri</a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade active show" id="TTKDSiniflar">
                        <div class="container">
                            <div class="row py-2">

                                <div class="card col-12">

                                    <table class="table" id="siniftable">
                                        <thead>
                                            <th>Sınıf</th>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        foreach($ttkds as $ttkd){
                                            ?>
                                            <tr>
                                                <td><?=$ttkd["sinifAdi"]?></td>
                                            </tr>
                                            <?php
                                        }
                                        
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Iletisim">
                        <div class="container">
                            <div class="row py-2 w-100">
                                <div class="card w-100">

                                    <div class="card-body ">

                                        <table class="table">
                                            <tr>
                                                <td>Adres</td>
                                                <td><?=$adres?></td>
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
                                                <td>İnternet Sitesi</td>
                                                <td><?=$website?></td>
                                            </tr>
                                            <tr>
                                                <td>Okul Müdürü</td>
                                                <td><?=$okulMuduru?></td>
                                            </tr>
                                            <tr>
                                                <td>Okul Sekreteri</td>
                                                <td><?=$okulSekreteri?></td>
                                            </tr>
                                            <tr>
                                                <td>Okul Veli Temsilcisi</td>
                                                <td><?=$okulVeliTemsilcisi?></td>
                                            </tr>
                                            <tr>
                                                <td>OVT Telefon Numarası</td>
                                                <td><?=$okulVeliTemsilcisiTelefon?></td>
                                            </tr>
                                            <tr>
                                                <td>OVT Email Adresi</td>
                                                <td><?=$okulVeliTemsilcisiEmail?></td>
                                            </tr>
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="TOABBilgileri">
                        <div class="container">
                            <div class="row py-2 w-100">
                                <div class="card w-100">

                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <td>Kendi Yeri</td>
                                                <td><?=$toab["kendiYeri"]?></td>
                                            </tr>
                                            <tr>
                                                <td>Telefon Numarası</td>
                                                <td><?=$toab["telefon"]?></td>
                                            </tr>
                                            <tr>
                                                <td>Adres</td>
                                                <td><?=$toab["adres"]?></td>
                                            </tr>

                                            <tr>
                                                <td>Bina Özellikleri</td>
                                                <td><?php
                                                foreach (explode(";",$toab["binaOzellikleri"]) as $key => $value) {
                                                    echo $value."<br/>";
                                                }
                                                ?></td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="TOAB-OVT">
                        
                    </div>
                    <div class="tab-pane fade" id="ogretmenGorusleri">
                        <div class="container">
                            <div class="row py-2">
                                <div class="card w-100">

                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-header">
                                                Tarih : 16.06.2021
                                            </div>
                                            <div class="card-body">
                                                lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod
                                                tempor incididunt ut labore
                                            </div>

                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                Tarih : 16.06.2021
                                            </div>
                                            <div class="card-body">
                                                lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod
                                                tempor incididunt ut labore
                                            </div>

                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                Tarih : 16.06.2021
                                            </div>
                                            <div class="card-body">
                                                lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod
                                                tempor incididunt ut labore
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</div>