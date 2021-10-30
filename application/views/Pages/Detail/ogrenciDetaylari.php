<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <section class="card col">
            <div class="card-header">
                Öğrenci Detayları &nbsp;
                <?php 
                if(isset($urls["Edit"])){
                    ?>
                    <a href="<?=base_url($urls["Edit"])."/".$id?>" class="btn btn-warning btn-sm">Düzenle</a>
                    <?php
                }
                ?>
                </div>
            <div class="card-body">
                
                <div class="container">
                    <table class="table">
                        <tr>
                            <td>Ad Soyad</td>
                            <td><?=$adSoyad?></td>
                        </tr>
                        <tr>
                            <td>Cinsiyet</td>
                            <td><?=$cinsiyet?></td>
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
                            <td>Okul Adı</td>
                            <td><?=$okulB["ad"]?></td>
                        </tr>
                        <tr>
                            <td>Sınıf Adı</td>
                            <td><?=$sinifB["sinifAdi"]?></td>
                        </tr>
                        <tr>
                            <td>TTKD Katılım Formu</td>
                            <td><?=$ttkdKatilimFormu?></td>
                        </tr>
                        <tr>
                            <td>Eba ID</td>
                            <td><?=$ebaId?></td>
                        </tr>
                        <tr>
                            <td>Katılım Belgesi No</td>
                            <td><?=$katilimBelgesiNo?></td>
                        </tr>
                        <tr>
                            <td>Mezun</td>
                            <td><?=$Mezun?></td>
                        </tr>
                    </table>
                </div>
                <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="Parent-tab" data-toggle="tab" href="#Parent" onclick="PageLoader(this)" data-info="<?=base_url("Parents/Parent/".$id)?>">Ebeveyn Bilgileri</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="Award-tab" data-toggle="tab" href="#Award" onclick="PageLoader(this)" data-info="<?=base_url("Competition/Competition/".$id)?>">Katıldığı Yarışma ve Ödül
                        Bilgisi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Lesson-tab" data-toggle="tab"onclick="PageLoader(this)" href="#Lesson"data-info="<?=base_url("Lessons/LessonDetail/".$sinifB["id"])?>">TTKD Ders Günleri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Grade-tab" data-toggle="tab" href="#Grade"onclick="PageLoader(this)" data-info="<?=base_url("Grade/GradeDetail/".$id)?>">Not Bilgileri</a>
                    </li>
                </ul>
                <div class="container">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade PageArea"  id="Parent">
                        </div>
                        <div class="tab-pane fade PageArea" id="Award">
                        </div>
                        <div class="tab-pane fade PageArea" id="Lesson">
                        </div>
                        <div class="tab-pane fade PageArea" id="Grade" >
                            
                        </div>
                    </div>
                </div>


            </div>

    </div>

    </section>
</div>
</div>