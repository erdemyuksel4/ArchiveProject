<div class="container p-0 m-0">
    <div class="card">
        <div class="card-header">
            Ara Karne 
            <button type="button" class="btn btn-sm btn-primary btn-yazdir" data-area="#print" data-landscape="true">Yazdır</button>
        </div>
        <div class="card-body" id="print">
            <div class="pageArea-landspace text-size-8 d-flex">
                <?php
                $i =0;
                foreach ($bilgiler as $key => $og) {
                    printKarne($og);
                    if ($i==1) {
                        $i=0;
                            ?>
                            </div>
                            <?php
                        if($bilgiler[array_key_last($bilgiler)]["id"]!=$og["id"]){
                            ?>

                            <div class="pagebreak m-2"></div>
                            <div class="pageArea-landspace text-size-8 d-flex">
                            
                            <?php
                        }else{
                            ?>
                            <div class="col-6 d-flex"></div>
                            <?php
                        }
                        ?>
                        <?php
                    }else{
                        $i++;
                        if($bilgiler[array_key_last($bilgiler)]["id"]==$og["id"]){

                            echo "<div class='col-6 d-flex'></div>";
                        }
                    }?>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>



<?php

function printKarne($og) {
?>

<div class="col-6 marginPrint">
    <div class="karne">

        <div class="karne-cerceve frame">


            <h4>HALBJAHRESZEUGNIS</h4>
            <h5>(Ara Karne)</h5>
            <p></p>

            <h4>MUTTERSPRACHLICHER UNTERRICHT</h4>
            <h5>(Türkçe ve Türk Kültürü Dersi)</h5>

            <table>
                <?php 
                
                $ads = explode(" ",$og["adSoyad"]);
                ?>
                <tbody>
                    <tr>
                        <td><strong>Name</strong> (Soyadı)</td>
                        <td>:</td>
                        <td><?=current($ads)??""?></td>
                    </tr>
                    <tr>
                        <td><strong>Vorname</strong> (Adı)</td>
                        <td>:</td>
                        <td><?=end($ads)??""?></td>
                    </tr>
                    <tr>
                        <td><strong>Schule</strong> (Okulu)</td>
                        <td>:</td>
                        <td><?=$og["okulB"]["ad"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Klasse</strong> (Sınıfı) </td>
                        <td>:</td>
                        <td><?=$og["sinif"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Schuljahr</strong> (Öğretim Yılı) </td>
                        <td>:</td>
                        <td><?=$og["donemB"]["baslangicYil"]."-".$og["donemB"]["bitisYil"]?></td>
                    </tr>
                </tbody>
            </table>




            <p></p>
            <p style="font-size: 12pt; font-style: italic;word-spacing: 6px;text-align: justify;">
                <strong>Bemerkung</strong> (Not) :<br />
                Nach Mitteilung des Türkischen Generalkonsulats in Karlsruhe
                hat die / der Schülerin/Schüler an dem vom Generalkonsulat veranstalteten türkische
                Sprache und
                Kultur
                Unterricht
                teilgenommen und dabei in dem nachfolgenden Fach die
                folgende Note / Punktzahl erzielt :
            </p>
            <p></p>
            <table class="w-100">
                <tr>
                    <td><u><strong> Unterricht /Fach</strong> (Ders) :</u></td>
                    <td><u> <strong>Note</strong> (Not) </u></td>

                </tr>
                <tr>
                    <td><strong>Türkische Muttersprache </strong> <br />
                        Türkçe</td>
                    <td> <?=$og["notB"]["ogrenciNot"]?></td>
                </tr>
            </table>



            <p></p>
            <p></p>

            <p style="text-align: right;font-weight: bold;"><?=date("d / m / Y")?>
            </p>


            <table class="w-100">
                <tr>
                    <td>Schulleiter / in </td>
                    <td style="text-align: right;"> muttersprachlichen Lehrers</td>
                </tr>
                <tr>
                    <td>Sachlich richtig</td>
                    <td style="text-align: right;">Unterschrift des</td>
                </tr>
            </table>

        </div>

        <p style="font-size: 10pt; text-align: justify;">
            Rintheimerstr. 82 &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 76131 Karlsruhe
            &nbsp;&nbsp;&nbsp; Tel: 0721/856128 &nbsp; Faks: 0721/ 858963 <br />
            e- posta : <a href="#">karlsruheegitimateseligi@hotmail.com </a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; www.karlsruhe-meb.de

        </p>
    </div>

</div>


<?php


}