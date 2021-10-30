    
    <?php 
    
    $base_url = base_url();
    ?>
    </div>
    </div>
    </div>
</section>
</section>
    <!-- Right Slidebar start -->
     
      <!-- Right Slidebar end -->

      <!--footer start-->
     
      <!--footer end-->
  </section>
    <script src="<?=$base_url?>js/jquery-3.5.1.min.js"></script>
    <script src="<?=$base_url?>js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<?=$base_url?>js/popper.min.js"></script>
    <script src="<?=$base_url?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="<?=$base_url?>js/cookie.min.js"></script>
    <script class="include" type="text/javascript" src="<?=$base_url?>js/jquery.dcjqaccordion.2.7.min.js"></script>
    <script src="<?=$base_url?>js/jquery.scrollTo.min.js"></script>
    <script src="<?=$base_url?>js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?=$base_url?>js/jquery.animate-shadow-min.js"></script>
    <script src="<?=$base_url?>assets/summernote/summernote-bs4.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?=$base_url?>js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?=$base_url?>js/DT_bootstrap.js"></script>
    <script src="<?=$base_url?>js/slidebars.min.js"></script>
    <script src="<?=$base_url?>js/respond.min.js"></script>
    <script src="<?=$base_url?>js/dynamic_table_init.js"></script>
    <script src="<?=$base_url?>js/common-scripts.js"></script>
    <script src="<?=$base_url?>js/select2.min.js"></script>
    <script src="<?=$base_url?>js/modal.js"></script>
    <script src="<?=$base_url?>js/callPage.js"></script>
    <script src="<?=$base_url?>js/form.js"></script>
    <script src="<?=$base_url?>js/postAjax.js"></script>
    <script src="<?=$base_url?>js/bodyEvent.js"></script>
    <script src="<?=$base_url?>js/formFunction.js"></script>
    <script src="<?=$base_url?>js/imageUpload.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $(".form-control.select-multiple").select2({
                tags: true,
            });
            $(".form-control.select2").select2({
                tags: true,
            });

            $(".summernote").summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color','backcolor']],
                    ['para', ['style','ul', 'ol', 'paragraph']],
                ],
                tooltip: false
            });

            

        });
        function callSelect2(selector = ".form-control.select2") {
            $(selector).select2({
                tags: true,
            });
        }
        function TimeConvert(timestamp){
            var dat = new Date(timestamp);
            return dat.getDate()+"-"+(dat.getMonth()+1)+"-"+dat.getFullYear()
        }
        function DateConvert(date){
            var dat = new Date(date);
            return dat.getDate()+"-"+dat.getMonth()+"-"+dat.getFullYear()
        }

        function AciklamaGoster(e) {
            var id = "#" + e.value;
            $(id).removeClass("d-none");
            $(id).addClass("d-block");
            $(id).siblings().addClass("d-none");
            $(id).siblings().removeClass("d-block");
        }
        function AddToTable(tableID,val,input,extra="<button type='button' onclick='parentKiller($(this).parent())' class='btn btn-sm btn-danger'>Sil</button>"){
            var tr = document.createElement("tr");
            val.forEach(e => {
                var td = document.createElement("td");
                td.innerText = e;
                td.innerHTML += "<input type='hidden' name='"+input+"[]' value='"+e+"'>";
                tr.appendChild(td);
            });
            var td2 = document.createElement("td");
            td2.innerHTML = extra;
            tr.appendChild(td2);
            document.getElementById(tableID).appendChild(tr);
        }
        function parentKiller(e){
            $(e).parent().remove();
        }
        function callData(select,url,data){
            reqData(url,{data,page:"page"},(e)=>{
                var sel = new Select(select);
                
                sel.RemoveAll().then(()=>{
                    sel.AddStarter("Görev Yeri");
                    JSON.parse(e).forEach(a=>{
                        sel.Add(a.id,a.yerAdi);
                    })

                });
            });
        }
        function selectCallData(select,url,data,starter = "",ad,selected){
            return reqData(url,{data,page:"page"},(e)=>{
                var sel = new Select(select);
                
                sel.RemoveAll().then(()=>{
                    if(starter){
                        sel.AddStarter(starter);
                    }
                    JSON.parse(e).forEach(a=>{
                        sel.Add(a.id,a[ad]);
                    })
                    
                }).then(()=>{
                    if(selected){
                        sel.selected(selected);
                    }
                });
            });
        }

///////////////////////////////////////////////////////////////////////////////////////////////

        var reports = [
    {
        id : 1,
        title : 'EK-1-Haftalık Ders Programı',
        file : 'ogrenciistatistikformu.html',
        orientation : 'landscape',
    },
    {
        id : 8,
        title : 'Ek-8-Türkçe Dersleri Öğrenci Kayıt Formu',
        file : 'kayitformu.php',
        orientation : 'landscape',
    },
    {
        id : 9,
        title : 'Ek-9-Öğrenci İstatistik Formu',
        file : 'ogrenciistatistikformu.html',
        orientation : 'landscape',
    },
    {
        id : 10,
        title : 'Ek-10.Türkçe Dersleri Yoklama Listesi ',
        file : 'yoklamalistesi.html',
        orientation : '',
    },
    {
        id : 18,
        title : 'Ek-18 Ders defteri ',
        file : 'dersdefteri.html',
        orientation : '',
    },
    {
        id : 101,
        title : 'Ara karne ',
        file : 'arakarne.html',
        orientation : '',
    },
    {
        id : 102,
        title : 'Sene Sonu Karne ',
        file : 'senesonukarne.html',
        orientation : 'landscape',
    },
    {
        id : 103,
        title : 'Katılım Belgesi Teslim Tutanağı ',
        file : 'katilimbelgesiteslimtutanagi.html',
        orientation : '',
    },
    

];

function findReport(id) {

    for (let i = 0; i < reports.length; i++) {
        const element = reports[i];
        if (element.id == id)
        return element;
    }

    return null;
}

$(document).ready(function () {

    $('#reportList').empty();

    reports.forEach(element => {
        $('#reportList').append(`<option value='${element.id}'>${element.title}</option>`);
    });


    $('#reportList').on("change",function(){

        let id = $(this).val();

        let report = findReport(id);

        if (report != null && report.file != '') {
            $.get({url:report.file,cache:false}).done(function(d) {
                
                $('#printArea').removeClass();
                if (report.orientation === '')
                    $('#printArea').addClass("printArea-a4");
                else
                    $('#printArea').addClass("printArea-a4-landscape");
                $('#printArea').html(d);
    
            });
        }
        


    });

/*     $('.btn-yazdir').printPreview({
        obj2print:'#printArea',
        width:'810'
    }); */

    $('.btn-yazdir').on("click",function() {
        openWindow($(this).data("area"),$(this).data("landscape"));
        //$.printPreview.loadPrintPreview();
        //printJS("printArea", 'html')
    });

    // $('.btn-yazdir').printPreview({
    //     obj2print:'#main',
    // });

    
});

function openWindow(a,landscape=true) {
    var printW = window.open("");
    printW.document.write('<html><head>');
    printW.document.write('<title><\/title>');   
    printW.document.write('<link rel="stylesheet" href="<?=$base_url?>reportscss/print.css">');
    if(landscape==true){
        printW.document.write('<link rel="stylesheet" href="<?=$base_url?>reportscss/print_landscape.css">');
    }
    printW.document.write('<link rel="stylesheet" href="<?=$base_url?>reportscss/style.css">');
    printW.document.write('</head><body>');
    
    var html = $(a).html();
    printW.document.write(html);    
    printW.document.write('<\/body><\/html>');
    printW.document.close();

    printW.focus();
    setTimeout(() => {
        printW.print();
        printW.close();
    }, 10);

    
}





    </script>
    </body>

    </html>