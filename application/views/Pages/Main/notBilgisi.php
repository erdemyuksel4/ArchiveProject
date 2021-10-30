<div class="container p-0 m-0">
    <div class="card ">
        <form action="<?=base_url("Grade/GradeEdit")?>" method="post" id="form">
        <div class="card-header">
            Not Bilgisi &nbsp;
            <button class="btn btn-sm btn-success" type="submit">Kaydet</button>
        </div>
        <div class="card-body adv-table">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Öğrenci Adı</th>
                        <th>Öğretim Dönemi</th>
                        <th>Dönem</th>
                        <th>Not</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        
                        if($bilgiler != null && count($bilgiler)>0){
                           
                            foreach ($bilgiler as $key => $bilgi) {
                                foreach ($bilgi["notB"] as $not){
                                ?>
                                <tr>
                                    <td><?=$bilgi["adSoyad"]?></td>
                                    <td><?=$bilgi["donemB"]["baslangicYil"]."-".$bilgi["donemB"]["bitisYil"]?></td>
                                    <td><?=$not["donem"]?>.Dönem</td>
                                    <td>
                                        <input type="hidden" name="notId[]" value="<?=$not["id"]?>">
                                        <select name="ogrenciNot[]" id="" class="custom-select custom-select-sm">
                                            <?php 
                                            foreach (["Çok İyi","İyi","Orta","Geçer",""] as $key => $value) {
                                                ?>
                                            <option value="<?=$value?>" <?=$value==($not["ogrenciNot"])?"selected":""?>><?=$value?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <?php

                                }
                            }
                        }
                            ?>

                </tbody>
            </table>
        </div>
    </form>
    </div>
</div>