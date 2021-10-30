<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <section class="card">
            <div class="card-header">
                Kullanıcılar &nbsp;
                <button data-info="<?=base_url("Users/UserAdd")?>" data-title="Kullanıcı Ekle" onclick="getmodal(this)" class="btn btn-sm btn-success">Ekle</button>
            </div>
            <div class="card-body">
                <div class="adv-table" >
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr>
                                <th>Rol</th>
                                <th>Ad Soyad</th>
                                <th>Kullanıcı Adı</th>
                                <th>Email</th>
                                <th>Telefon</th>
                                <th>Onaylı</th>
                                <th class="hidden-phone">İşlemler</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($users as $user){
                                ?>
                                <tr>
                                    <td><?=$user["yetkiAdi"]?></td>
                                    <td><?=$user["adSoyad"]?></td>
                                    <td><?=$user["kullaniciAdi"]?></td>
                                    <td><?=$user["email"]?></td>
                                    <td><?=$user["telefon"]?></td>
                                    <td><?=($user["onay"]==1)?"Onaylı":"-"?></td>
                                    <td>
                                        <button data-info="<?=base_url("Users/UserEdit/".$user["id"])?>" data-title="Kullanıcı Düzenle" onclick="getmodal(this)" class="btn btn-sm btn-warning" type="button">Düzenle</button>
                                        <button data-info="<?=base_url("Users/UserDelete/".$user["id"])?>"  data-title="Emin Misiniz?"onclick="getmodal(this)"  class="btn btn-sm btn-danger" type="button">Sil</button>
                                        <a href="<?=base_url("Account/PassControl/".$user["id"])?>"  class="btn btn-sm btn-primary" type="button">Kullanıcı Değiştir</a>
                                        <?php
                                        if($user["onay"]!=1){
                                            ?>
                                            <button data-info="<?=base_url("Verify/Verify/".$user["id"])?>" onclick="verify(this)" class="btn btn-sm btn-primary" type="button">Onayla</button>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                
                                <?php
                            }?>
                        </tbody>
                    </table>

                </div>

            </div>

        </section>
    </div>
</div>
<script>
    function verify(e){
        var a = reqData(e.getAttribute("data-info"),{page:"page"},()=>{
            Refresh();
        });
    }
</script>