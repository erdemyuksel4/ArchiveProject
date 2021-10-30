<div class="container">
    <div class="row py-2">
        <div class="card w-100">
            <div class="card-header">
                Okul Veli Temsilcileri Görevli Listesi &nbsp;
                <?php
                
                if(isset($okulId)){
                    ?>
                    <button type="button" class="btn btn-sm btn-success" onclick="getmodal(this)" data-info="<?=base_url('TOABOVT/OVT_Add')?>" data-param="<?=isset($okulId)?$okulId:""?>"
                        data-title="Ekle">+ Ekle</button>
                    
                    <?php
                }
                
                ?>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped dataTable">
                    <thead>
                        <tr>
                            <th>Ad Soyad</th>
                            <th>Meslek</th>
                            <th>Görev</th>
                            <th>İşlemler</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($toab as $key => $value) {
                            ?>
                                <tr>
                                    <td><?=$value["adSoyad"]?></td>
                                    <td><?=$value["meslek"]?></td>
                                    <td><?=$value["gorev"]?></td>
                                    <td>
                                        <?php
                                        if(isset($urls["Detail"])){
                                            ?>
                                            <button class="btn btn-sm btn-info " onclick="getmodal(this)"
                                            data-info="<?=base_url($urls["Detail"].'/'.$value['id'])?>"data-title="Detaylar"
                                            type="button">Detaylar</button>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if(isset($urls["Edit"])){
                                            ?>
                                             <button class="btn btn-sm btn-warning " onclick="getmodal(this)"
                                            data-info="<?=base_url($urls["Edit"].'/'.$value['id'])?>" data-title="Düzenle"
                                            type="button">Düzenle</button>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if(isset($urls["Delete"])){
                                            ?>
                                            <button class="btn btn-sm btn-danger "onclick="getmodal(this)"
                                            data-info="<?=base_url($urls["Delete"].'/'.$value['id'])?>" data-title="Emin Misiniz?"
                                            type="button">Sil</button>
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
        </div>
    </div>
</div>


<script type="text/javascript">  
    function onToabDuzenle(bolgeId,yerId,okulId,urlB,urlY,urlO) {
        var selectB = new Select("bolgeler");
        selectB.textPart = "bolgeAdi";
        selectB.AddWithAjax(urlB,"").then(()=>{
            selectB.selected(bolgeId);
        });
        
        var selectY = new Select("yerler");
        selectY.textPart = "yerAdi";
        selectY.AddWithAjax(urlY,bolgeId).then(()=>{
            selectY.selected(yerId);
        });
        
        var selectO = new Select("okullar");
        selectO.textPart = "ad";
        selectO.AddWithAjax(urlO,yerId).then(()=>{
            selectO.selected(okulId);
        });

        selectB.onChangeEvent((e)=>{
            selectY.Update(urlY,e.target.value);
            selectO.Update(urlO,e.target.value);
        });
        selectY.onChangeEvent((e)=>{
            selectO.Update(urlO,e.target.value);
        });
        
    }
    function onToabEkle(urlB,urlY,urlO) {
        var selectB = new Select("bolgeler");
        selectB.textPart = "bolgeAdi";
        selectB.AddWithAjax(urlB,"")

        var selectY = new Select("yerler");
        selectY.textPart = "yerAdi";
        
        var selectO = new Select("okullar");
        selectO.textPart = "ad";
        

        selectB.onChangeEvent((e)=>{
            selectY.Update(urlY,e.target.value);
            selectO.Update(urlO,e.target.value);
        });
        selectY.onChangeEvent((e)=>{
            selectO.Update(urlO,e.target.value);
        });
        
    }    
</script>