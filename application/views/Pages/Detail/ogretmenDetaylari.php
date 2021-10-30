<div class="container ">
    <div class="row">
    </div>
    <div class="row">
        <section class="card col">
            <div class="card-header">
                Öğretmen Detayları &nbsp;
                <a class="btn btn-sm btn-info" href="<?=base_url("Teachers/Teacher")?>">Geri</a>
                <a class="btn btn-sm btn-warning" href="<?=base_url("Teachers/TeacherEdit/".$id)?>">Düzenle</a>
                <button class="btn btn-sm btn-danger" onclick="getmodal(this)" data-title="Emin Misiniz?" data-info="<?=base_url("Teachers/TeacherDelete/".$id)?>">Sil</button>
            </div>
            <div class="card-body">

                <div class="container">
                    <div class="container">
                        <table class="table">
                            <tr>
                                <td>Ad Soyad</td>
                                <td><?=$adSoyad?></td>
                            </tr>
                            <tr>
                                <td>TC Kimlik No</td>
                                <td><?=$tckn?></td>
                            </tr>
                            <tr>
                                <td>Genel Bilgi</td>
                                <td><?=$genelBilgi?></td>
                            </tr>
                            <tr>
                                <td>İnternet Sitesi</td>
                                <td><?=$website?></td>
                            </tr>
                            <tr>
                                <td>Email Adresi</td>
                                <td><?=$email?></td>
                            </tr>
                            <tr>
                                <td>Telefon Numarası</td>
                                <td><?=$telefon?></td>
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
                                <td>Almanya İkametgah</td>
                                <td><?=$almanyaIkametgah?></td>
                            </tr>
                            <tr>
                                <td>Türkiye İkametgah</td>
                                <td><?=$turkiyeIkametgah?></td>
                            </tr>
                            <tr>
                                <td>Yurt Dışı Göreve Başlama Tarihi</td>
                                <td><?=$yurtDisiGorevBaslangic?></td>
                            </tr>
                            <tr>
                                <td>Almanya'da Kayıtlı Olduğu Okul</td>
                                <td><?=$okulAdi?></td>
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
                                <td>Görevde</td>
                                <td><?=$gorevde?></td>
                            </tr>
                            <tr>
                                <td>Yolluk</td>
                                <td><?=$yolluk?></td>
                            </tr>
                        </table>


                    </div>
                    <ul class="nav nav-tabs my-2" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-id="GYK"  id="GYK-tab" data-toggle="tab" href="#GYK">Görevli Olduğu Okullar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-id="Kurum"  id="Kurum-tab" data-toggle="tab" href="#Kurum">Türkiye'de Görevli Olduğu Kurum</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-id="YurtDisi"  id="YurtDisi-tab" data-toggle="tab" href="#YurtDisi">Önceki Yurt Dışı Görev Bilgisi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-id="Vaccine"  id="Vaccine-tab" data-toggle="tab" href="#Vaccine">Aşı Durumu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="PageLoader(this)" data-info="<?=base_url("Education/".$id)?>" target="_blank" data-id="Education"  id="Education-tab" data-toggle="tab" href="#Education">Eğitim Durumu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Lang-tab" data-toggle="tab" href="#Lang">Yabancı Dil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Knowledge-tab" data-toggle="tab" href="#Knowledge" onclick="PageLoader(this)" data-info="<?=base_url("Knowledge/".$id)?>" target="_blank">Bilgi ve Beceri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Certificate-tab" data-toggle="tab" href="#Certificate" onclick="PageLoader(this)" data-info="<?=base_url("Certificate/".$id)?>"target="_blank" >Sertifika ve Belge</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"id="Project-tab" data-toggle="tab" href="#Project" onclick="PageLoader(this)"  data-info="<?=base_url("Project/".$id)?>" target="_blank">Proje Deneyimi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Close-tab" data-toggle="tab" href="#Close" onclick="PageLoader(this)" data-info="<?=base_url("Close/".$id)?>" target="_blank">Yakın Bilgisi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Class-tab" data-toggle="tab" href="#Class" onclick="PageLoader(this)" data-info="<?=base_url("Classes/TeacherClass/".$id)?>" target="_blank">Sınıflar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link "  data-id="License" id="License-tab" data-toggle="tab" href="#License">Ehliyet Bilgisi</a>
                        </li>
                        
                    </ul>
                    <div class="row py-2" style="min-height:500px">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade  active show" id="GYK">
                                        <div class="container">
                                            <table class="table">
                                                
                                            <?php 
                                            
                                            foreach ($gorevYaptigiOkullar as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td><?=$value?></td>
                                                </tr>
                                                <?php
                                            }
                                            
                                            ?>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="Kurum">
                                        <div class="container">
                                            <table class="table">
                                                <tr>
                                                    <td>Adres</td>
                                                    <td><?=$TGOK["adres"]?></td>
                                                </tr>
                                                <tr>
                                                    <td>Telefon Numarası</td>
                                                    <td><?=$TGOK["telefon"]?></td>
                                                </tr>
                                                <tr>
                                                    <td>Email Adresi</td>
                                                    <td><?=$TGOK["email"]?></td>
                                                </tr>
                                                <tr>
                                                    <td>İnternet Sitesi</td>
                                                    <td><?=$TGOK["website"]?></td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="YurtDisi">
                                        <div class="container">


                                            <table class="table table-striped table-bordered" id="YurtDisiTablo">
                                                <thead>
                                                    <th>Ülke</th>
                                                    <th>Yıl</th>
                                                </thead>
                                                <tbody>
                                                    <?php 

                                                    foreach($OYDG as $key => $value){
                                                        ?>
                                                        <tr>
                                                            <td><?=$value["ulke"]?></td>
                                                            <td><?=$value["yil"]?></td>
                                                        </tr>
                                                        <?php
                                                    }

                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="Vaccine">
                                        <div class="container">


                                            <table class="table table-bordered table-striped" id="asitablo">
                                                <thead>
                                                    <tr>
                                                        <th>Aşı</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($Vaccine as $key => $value) {
                                                        ?>
                                                         <tr>
                                                            <td><?=$value["asiAdi"]?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="Lang">
                                        <div class="container">

                                            <table class="table table-bordered table-striped" id="diltablo">
                                                <thead>
                                                    <tr>
                                                        <th>Dil</th>
                                                        <th>Seviye</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    foreach ($Lang as $key => $value) {
                                                        ?>
                                                         <tr>
                                                            <td><?=$value["dil"]?></td>
                                                            <td><?=$value["seviye"]?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="License">
                                        <div class="container">
                                            <table class="table table-bordered ">
                                                <tr>
                                                    <td>Almanya Ehliyeti</td>
                                                    <td><?=$almanyaEhliyeti?></td>
                                                </tr>
                                                <tr>
                                                    <td>Türkiye Ehliyeti</td>
                                                    <td><?=$almanyaEhliyeti?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="Knowledge">
                                    </div>
                                    <div class="tab-pane fade " id="Certificate">
                                    </div>
                                    <div class="tab-pane fade " id="Project">
                                    </div>
                                    <div class="tab-pane fade " id="Close">
                                    </div>
                                    <div class="tab-pane fade " id="Education">
                                    </div>
                                    <div class="tab-pane fade " id="Class">
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