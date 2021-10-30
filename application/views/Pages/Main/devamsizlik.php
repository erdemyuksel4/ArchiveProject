<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <section class="card w-100">
            <?php
            if(isset($urls["Edit"])){
                ?>
            <form action="<?=base_url("Absence/AbsenceEdit")?>" name="durum" method="post">
                <?php
                }
                ?>
                <div class="card-header">
                    Devamsızlık &nbsp;
                    <?php
                        if(isset($urls["Edit"])){
                        ?>
                    <input type="submit" value="Kaydet" class="btn btn-sm btn-success">
                    <?php
                        }
                        ?>
                </div>
               
                <div class="card-body">
                    <input type="date" class="form-control" id="date" value="<?=date("Y-m-d",now())?>"
                        oninput="WriteTable(this.value)">
                    <div class="mt-2">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Öğrenci Adı</th>
                                    <th>Tarih</th>
                                    <th>Durum</th>

                                </tr>
                            </thead>
                            <tbody id="tableData">

                            </tbody>
                        </table>
                    </div>
                </div><?php
                    if(isset($urls["Edit"])){
                        ?>
            </form>
            <?php
                        }
                        ?>
        </section>
    </div>
</div>
<script>
    async function ExtendFunction() {
        BodyLoad();
        var w = WriteTable();
    }

    async function WriteTable() {
        var date = $("#date").val();
        return reqData("<?=base_url("Absence/jsonBringStudent/")?>",{"page":"page","data":{"key":"tarih","value":(new Date(date).getTime() / 1000)}}).then(async (bilgiler) => {
                await $("#tableData").children().remove();
            bilgiler = JSON.parse(bilgiler);
            for (var key in bilgiler) {
                var bilgi = bilgiler[key];
                if (date == bilgi["devamB"][0]["tarih"]) {
                    var str = "<tr><td>" + (bilgi['adSoyad']) + "</td><td>" + bilgi['devamB'][0]["tarih"] +"</td><td><?php if(!isset($urls["Edit"])){?>" + bilgi['devamB'][0]['durum'] +"<?php }else{?><select name='d["+ (bilgi['devamB'][0]['id']) +"]' class='custom-select custom-select-sm'><option " +((bilgi['devamB'][0]["durum"].trim()) == '' ? 'selected' : '') +" disabled></option><option " + (bilgi['devamB'][0]["durum"] == 'Geldi' ? 'selected':'') + " value='Geldi'>Geldi</option><option " + (bilgi['devamB'][0]["durum"] =='Gelmedi' ? 'selected' : '') +" value='Gelmedi'>Gelmedi</option></select><?php }?></td></tr>";
                    $("#tableData").append(str);
                }
            }
        })
    }
</script>