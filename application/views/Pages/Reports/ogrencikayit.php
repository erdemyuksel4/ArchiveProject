<div class="container">
    <div class="card">
        <div class="card-header">
            Öğrenci Kayıt Formu
            <button class="btn btn-sm btn-primary btn-yazdir" data-area="#print">Yazdır</button>
        </div>
        <div class="card-body" id="print">
            <div class="pageArea-landscape ">
            
                <h5 class="text-center title-landscape">………………………EĞİTİM BÖLGESİ TÜRKÇE VE TÜRK KÜLTÜRÜ DERSİ ÖĞRENCİ KAYIT FORMU</h5>
            <pre>
            </pre>
                <table >
                    <tr>
                        <td>OKULUN ADI</td>
                        <td>:</td>
                        <td><?=$bilgiler[0]["okulB"]["ad"]?></td>
                    </tr>
                    <tr>
                        <td>AİT OLDUĞU YIL</td>
                        <td>:</td>
                        <td><?=$bilgiler[0]["donemB"]["baslangicYil"]."-".$bilgiler[0]["donemB"]["bitisYil"]?></td>
                    </tr>
                    <tr>
                        <td>DERS YAPILAN GÜNLER </td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>ÖĞRETMENİN ADI-SOYADI</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                </table>
            
                <table class="table-bordered-thin" cellspacing="0">
            
                    <thead>
                        <tr>
                            <th>SIRA NO</th>
                            <th>ÖĞRENCİNİN ADI SOYADI</th>
                            <th>E/K</th>
                            <th>BABA ADI</th>
                            <th>ANA ADI</th>
                            <th>DOĞUM YERİ</th>
                            <th>DOĞUM
                                TARİHİ</th>
                            <th>DEVAM ETTİĞİ ALMAN OKULU</th>
                            <th>ALMAN
                                SINIFI</th>
                            <th>TÜRK
                                SINIFI</th>
                            <th>ÖĞRENCİNİN EV ADRESİ</th>
                            <th>VELİNİN
                                TELEFON NUMARASI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                    for ($i=1; $i <26 ; $i++) { 
                                        # code...
                                    
                                ?>
                        <tr>
                            <td><?=$i?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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