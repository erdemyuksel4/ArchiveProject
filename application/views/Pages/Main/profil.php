<div class="row">

    <aside class="profile-nav col-lg-3">
        <section class="card">
            <div class="user-heading round">
                <a href="javascript:$('#fileinput').click()">
                <form action="<?=base_url("Main/PicAdd")?>" method="post" id="picform">
                <input style="display:none;" type="file" name="resim" id="fileinput" oninput="$('#picform').submit()">
            </form>
                    <?php
                
                if(isset($resim)&&count($resim)>0){
                    ?>
                    <?php 
                ?>
                <?php
                        ?>
                    <?php
                }else{?>
                    <i class="fa fa-user" style="font-size:100px"></i><?php
                }
                ?>
                </a>
                <h1><?=$kullanici["adSoyad"]?></h1>
                <p><?=$kullanici["email"]?></p>
            </div>

            <ul class="nav nav-pills nav-stacked">
                <li class="active nav-item"><a class="nav-link" href="profile.html"> <i class="fa fa-user"></i> Profil</a></li>
                <!--  <li class="nav-item"><a class="nav-link" href="profile-activity.html"> <i class="fa fa-calendar"></i>  <span class="badge badge-danger pull-right r-activity">9</span></a></li> -->
                <li class="nav-item"><a class="nav-link" href="<?=base_url("Main/ProfilEdit")?>"> <i class="fa fa-edit"></i> Profil Düzenle</a></li>
            </ul>

        </section>
    </aside>
    <aside class="profile-info col-lg-9">
        <!-- <section class="card">
            <form>
                <textarea placeholder="Kendinden Bahsetmek İstersen" rows="2" class="form-control input-lg p-text-area"></textarea>
            </form>
            <footer class="card-footer">
                <button class="btn btn-danger float-right">Gönder</button>
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-map-marker"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-camera"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class=" fa fa-film"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-microphone"></i></a>
                    </li>
                </ul>
            </footer>
        </section> -->
        <section class="card">
            <div class="bio-graph-heading">
                Kendin Hakkında...
            </div>
            <div class="card-body bio-graph-info">
                <h1>Biyografi</h1>
                <div class="row">
                    <div class="bio-row">
                        <p><span>Ad Soyad </span>: <?=$kullanici["adSoyad"]?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Kullanıcı Adı </span>: <?=$kullanici["kullaniciAdi"]?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Meslek </span>: <?=$meslek?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Email </span>: <?=$kullanici["email"]?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Telefon </span>: <?=$kullanici["telefon"]?></p>
                    </div>
                    
                    
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <?php
                foreach ($p as $key => $value) {
                    $s = mt_rand(0,3);
                    if($s ==0){
                        
                    
                    ?>
                    
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="bio-chart">
                                    <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="35" data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; background: none; font: bold 20px Arial; text-align: center; color: rgb(224, 107, 125); padding: 0px; appearance: none;"></div>
                                </div>
                                <div class="bio-desk">
                                    <h4 class="red"><?=$value["ad"]?></h4>
                                    <p>Süre : <?=$value["sure"]?></p>
                                    <p>Bütçe : <?=$value["butce"]?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }else if($s==1){?>
                    <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="bio-chart">
                                <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="63" data-fgcolor="#4CC5CD" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; background: none; font: bold 20px Arial; text-align: center; color: rgb(76, 197, 205); padding: 0px; appearance: none;"></div>
                            </div>
                            <div class="bio-desk">
                                <h4 class="terques"><?=$value["ad"]?></h4>
                                <p>Süre : <?=$value["sure"]?></p>
                                <p>Bütçe : <?=$value["butce"]?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else if($s==2){?>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="bio-chart">
                                <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="75" data-fgcolor="#96be4b" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; background: none; font: bold 20px Arial; text-align: center; color: rgb(150, 190, 75); padding: 0px; appearance: none;"></div>
                            </div>
                            <div class="bio-desk">
                                <h4 class="green"><?=$value["ad"]?></h4>
                                <p>Süre : <?=$value["sure"]?></p>
                                <p>Bütçe : <?=$value["butce"]?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else if($s==3){?>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="bio-chart">
                                <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="50" data-fgcolor="#cba4db" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; background: none; font: bold 20px Arial; text-align: center; color: rgb(203, 164, 219); padding: 0px; appearance: none;"></div>
                            </div>
                            <div class="bio-desk">
                                <h4 class="purple"><?=$value["ad"]?></h4>
                                <p>Süre : <?=$value["sure"]?></p>
                                <p>Bütçe : <?=$value["butce"]?></p>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php
                }
            }
                ?>
                
            </div>
        </section>
    </aside>
</div>