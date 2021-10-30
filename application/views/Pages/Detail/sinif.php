<div class="container p-0 m-0">
    <div class="card ">
        <form action="<?=base_url("Grade/GradeDetailEdit")?>" method="post" id="form">
        <div class="card-header">
            <?=$sinifB["sinifAdi"]?> Sınıfı &nbsp;
            <?php 
                if(null != $urls["Back"]){
                    ?>
                    <a class="btn btn-sm btn-primary" href="<?=base_url($urls["Back"])?>"><i class="fa fa-arrow-left"></i>  Diğer</a>
                    <?php
                }
                    ?>
        </div>
        <div class="card-body adv-table">
            <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="Student-tab" data-toggle="tab" href="#Student">Öğrenciler</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="Lesson-tab" data-toggle="tab" href="#Lesson">Ders Programı</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Curr-tab" data-toggle="tab" href="#Curr" onclick="PageLoader(this)" data-info="<?=base_url("Curriculum/Curriculum/".$sinifB["id"])?>">Öğretim Programı</a>
                </li>
            </ul>
            <div class="container w-100 p-0 m-0 ">
                <div class="tab-content w-100" id="myTabContent">
                    <div class="tab-pane fade w-100"  id="Student">
                        <table class="w-100 p-0 m-0 table table-striped table-bordered">
                            <thead>
                                <th>Ad Soyad</th>
                                <th>Okul Adı</th>
                                <th>İşlemler</th>
                            </thead>
                            <tbody>
                        <?php
                        foreach ($ogrenciler as $key => $ogrenci) {
                            ?>
                            <tr>
                                <td><?=$ogrenci["adSoyad"]?></td>
                                <td><?=$ogrenci["okulB"]["ad"]?></td>
                                <td>
                                    <?php 
                                    if(null != $urls["Detail"]){
                                        ?>
                                        <a class="btn btn-sm btn-info"href="<?=base_url($urls["Detail"])."/".$ogrenci["id"]?>">Detaylar</a>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>    
                            <?php
                        }
                        ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="Lesson">
                        <?php 
                        if(isset($urls["Add"])){
                            ?>
                            <a target="_blank" class="btn btn-sm btn-success my-2" href="<?=base_url($urls["Add"])."/".$sinifB["id"]?>">Ders Ekle</a>
                            <?php
                        }
                        ?>
                        <table class="w-100 p-0 m-0 table table-striped table-bordered">
                            <thead>
                                <th>Ders Zamanı</th>
                                <th>Saat</th>
                                <th>Platform</th>
                                <th>İşlemler</th>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($dersler as $key => $ders) {
                                ?>
                                <tr>
                                    <td><?=$ders["dersZamani"]?></td>
                                    <td><?=$ders["saat"]?></td>
                                    <td><?=$ders["platform"]?></td>
                                    <td></td>
                                </tr>    
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade w-100" id= "Curr"></div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>