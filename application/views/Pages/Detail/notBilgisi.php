<div class="container p-0 m-0">
    <div class="card ">
        <form action="<?=base_url("Grade/GradeDetailEdit")?>" method="post" id="form">
        <div class="card-header">
            Not Bilgisi &nbsp;
            <button class="btn btn-sm btn-success" type="submit">Kaydet</button>
        </div>
        <div class="card-body adv-table">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Ders</th>
                        <th>Öğretim Yılı</th>
                        <th>Öğretim Dönemi</th>
                        <th>Not</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        if($bilgiler != null && count($bilgiler)>0){
                            foreach ($bilgiler["notB"] as $key => $bilgi) {
                                ?>
                                <tr>
                                    <td><?=$bilgi["dersAdi"]?></td>
                                    <td><?=$bilgi["yil"]?></td>
                                    <td><?=$bilgi["donem"]?>.Dönem</td>
                                    <td>
                                        <input type="hidden" name="notId[]" value="<?=$bilgi["id"]?>">
                                        <select name="ogrenciNot[]" id="" class="custom-select custom-select-sm">
                                            <?php 
                                            foreach (["Çok İyi","İyi","Orta","Geçer",""] as $key => $value) {
                                                ?>
                                            <option value="<?=$value?>" <?=$value==($bilgi["ogrenciNot"])?"selected":""?>><?=$value?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                            ?>

                </tbody>
            </table>
        </div>
    </form>
    </div>
</div>