<?php 
$base_url = base_url();
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="logo">Öğrenci Takip
</title>

    <link rel="stylesheet" href="<?=$base_url?>assets/bootstrap/dist/css/bootstrap.css">
    <link href="<?=$base_url?>css/bootstrap-reset.css" rel="stylesheet">

    <link href="<?=$base_url?>css/font-awesome.css" rel="stylesheet" />

    <!--dynamic table-->
    <link href="<?=$base_url?>css/demo_page.css" rel="stylesheet" />
    <link href="<?=$base_url?>css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?=$base_url?>css/DT_bootstrap.css" />
    <!--right slidebar-->
    <link href="<?=$base_url?>css/slidebars.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?=$base_url?>css/style.css" rel="stylesheet">
    <link href="<?=$base_url?>css/style-responsive.css" rel="stylesheet" />
    <link href="<?=$base_url?>css/select2.min.css" rel="stylesheet" />
    <link href="<?=$base_url?>assets/summernote/summernote-bs4.min.css" rel="stylesheet" />
    <link href="<?=$base_url?>reportscss/style.css" rel="stylesheet" />
    <link href="<?=$base_url?>reportscss/print.css" rel="stylesheet" />
</head>

<body>
    <section id="container" class="">
        <!--header start-->
        <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <i class="fa fa-bars"></i>
            </div>
            <!--logo start-->
            <a href="<?=$base_url?>Main" class="logo">Evrak<span>Takip</span></a>

            <!--logo end-->

            <div class="top-nav ">
              <!--search & user info start-->
              <ul class="nav pull-right top-menu">
                  
                  <!-- user login dropdown start-->
                  <li class="btn-group">
                      <a>
                          <i class="fa fa-user"></i>
                          <span class="username"><?=($this->session->userdata('Account')["data"]["adSoyad"])??"Ben"?></span>
                      </a>&nbsp;
                      <a>
                          <i class="fa fa-cogs"></i>
                          <span class="username">Ayarlar</span>
                      </a>&nbsp;
                      <a href="<?=base_url("Account/LogOut")?>">
                            <i class="fa fa-sign-out"></i>
                            <span class="username">Çıkış Yap</span>
                      </a>
                      
                  </li>
                  
                  <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <?php
                    
                    if(isset($urls["Back"])){
?>
                    <li>
                        <a href="<?=$base_url.$urls["Back"]."?Back=Back"?>">
                            <i class="fa fa-arrow-left"></i>
                            <span>Geri</span>
                        </a>
                    </li>
<?php
                    }
                    
                    
                    ?>
                    <li>
                        <a href="<?=$base_url?>Main">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="<?=$base_url?>MissionAreas">
                            <i class=" fa fa-bar-chart-o"></i>
                            <span>Görev Bölgeleri</span>
                        </a>

                    </li>
                    <li class="sub-menu">
                        <a href="<?=$base_url?>MissionPlaces">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Görev Yerleri</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="<?=$base_url?>Schools">
                            <i class="fa fa-th"></i>
                            <span>Okullar</span>
                        </a>

                    </li>
                    <li class="sub-menu">
                        <a href="<?=$base_url?>Classes/Class">
                            <i class="fa fa-th"></i>
                            <span>Sınıflar</span>
                        </a>

                    </li>
                    <li class="sub-menu">
                        <a href="<?=$base_url?>Teachers">
                            <i class="fa fa-tasks"></i>
                            <span>Öğretmenler</span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a href="<?=$base_url?>Teachers">Öğretmenler</a>
                            </li>
                            <li>
                                <a href="<?=$base_url?>Lessons">Ders Programı</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="<?=$base_url?>Students">
                            <i class=" fa fa-envelope"></i>
                            <span>Öğrenciler</span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a href="<?=$base_url?>Students">Öğrenciler</a>
                            </li>
                            <li>
                                <a href="<?=$base_url?>Grade">Not Bilgisi</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?=$base_url?>Users">
                            <i class="fa fa-map-marker"></i>
                            <span>Kullanıcılar </span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a>
                            <i class="fa fa-cogs"></i>
                            <span>Ayarlar</span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a href="<?=$base_url?>ForbiddenPages">Yasak Sayfalar</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    
                    <li class="sub-menu">
                        <a href="<?=$base_url?>Absence">
                            <i class="fa fa-book"></i>
                            <span>Devamsızlık</span>
                        </a>

                    </li>

                    <li class="sub-menu">
                        <a href="<?=$base_url?>SpecificCalender">
                            <i class="fa fa-comments-o"></i>
                            <span>Belirli Günler ve Haftalar</span>
                        </a>

                    </li>
                    
                    <li class="sub-menu">
                        <a href="<?=$base_url?>Term">
                            <i class="fa fa-glass"></i>
                            <span>Öğretim Dönemleri</span>
                        </a>

                    </li>


                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-sitemap"></i>
                            <span>Raporlar</span>
                        </a>
                        <ul class="sub">

                            <li><a href="<?=$base_url?>Reports/SchoolReport">Karne</a></li>
                            <li>
                                <a href="<?=$base_url?>Reports/InterimSchoolReport">
                                    Ara Karne
                                </a>
                            </li>
                            <li>
                                <a href="<?=$base_url?>Reports/CertificateOfParticipiant">Katılım Belgesi</a>
                            </li>

                            <li>
                                <a href="<?=$base_url?>Reports/Permit">
                                    İzin Belgesi
                                </a>
                            </li>
                            <li>
                                <a href="<?=$base_url?>Reports/StudentForm">
                                    Öğrenci Kayıt Formu
                                </a>
                            </li>
                            <li>
                                <a href="<?=$base_url?>Reports/ThreeMonthReport">
                                    3 Aylık Rapor
                                </a>
                            </li>
                            <li>
                                <a href="<?=$base_url?>Reports/YearEndReport">
                                    Sene Sonu Raporu
                                </a>
                            </li>
                            <li>
                                <a href="<?=$base_url?>Reports/TravelAllowance">
                                    Yolluklar
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?=$base_url?>Reports/Projects">
                                    Projeler
                                </a>
                            </li>
                            <li>
                                <a href="<?=$base_url?>Reports/AcademicCalender">
                                    Akademik Takvim
                                </a>
                            </li>
                            <li>
                                <a href="<?=$base_url?>Reports/Attache">
                                    Ataşelik Bilgi Formu
                                </a>
                            </li>
                            <li>
                                <a href="<?=$base_url?>Reports/RecordLesson">
                                    Eğitim Bölgesi Ders Kayıt Formu
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?=$base_url?>Reports/StudentStatics">
                                    Öğrenci İstatistik Formu
                                </a>
                            </li>
                            <li>
                                <a href="<?=$base_url?>Reports/AttendanceList">
                                    Yoklama Listesi
                                </a>
                            </li>
                            <li>
                                <a href="<?=$base_url?>Reports/AnnualTextbook">
                                    Yıllık Ders Defteri
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--multi level menu end-->


                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <section id="main-content">
            <section class="wrapper site-min-height">
                <div class="container p-0 m-0">
                    <div class="row p-0 m-0">