var oTable

$(document).ready(function() {
    oTable = $('.dataTable').DataTable({
        "oLanguage": {
            "sDecimal":        ",",
        "sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
        "sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
        "sInfoEmpty":      "Kayıt yok",
        "sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
        "sInfoThousands":  ".",
        "sLengthMenu":     "Sayfada &nbsp;_MENU_ kayıt göster",
        "sLoadingRecords": "Yükleniyor...",
        "sProcessing":     "İşleniyor...",
        "sSearch":         "Ara:",
        "sZeroRecords":    "Eşleşen kayıt bulunamadı",
        "oPaginate": {
            "sFirst":    "İlk",
            "sLast":     "Son",
            "sNext":     "Sonraki",
            "sPrevious": "Önceki"
        },
        "oAria": {
            "sSortAscending":  ": artan sütun sıralamasını aktifleştir",
            "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
        },
        "select": {
            "rows": {
                "_": "%d kayıt seçildi",
                "1": "1 kayıt seçildi"
            }
        },
           
        } ,"stateSave": true,
        "stateSaveCallback": function(settings,data) {
            localStorage.setItem( 'DataTables_' + settings.sInstance, JSON.stringify(data) )
          },
        "stateLoadCallback": function(settings) {
          return JSON.parse( localStorage.getItem( 'DataTables_' + settings.sInstance ) )
          },"stateDuration": -1
       
    });
    
});/* 
table = $('.datatable').DataTable({
           
    aLengthMenu: [
            [25, 50, 100, 200, -1],
            [25, 50, 100, 200, "Hepsi"]
        ],
        iDisplayLength: 100,
        "PaginationType": "bootstrap",
        
    columnDefs : [
    { targets: [1,2], type: 'locale-compare', },
    ],
    language: {
        "sDecimal":        ",",
        "sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
        "sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
        "sInfoEmpty":      "Kayıt yok",
        "sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
        "sInfoThousands":  ".",
        "sLengthMenu":     "Sayfada _MENU_ kayıt göster",
        "sLoadingRecords": "Yükleniyor...",
        "sProcessing":     "İşleniyor...",
        "sSearch":         "Ara:",
        "sZeroRecords":    "Eşleşen kayıt bulunamadı",
        "oPaginate": {
            "sFirst":    "İlk",
            "sLast":     "Son",
            "sNext":     "Sonraki",
            "sPrevious": "Önceki"
        },
        "oAria": {
            "sSortAscending":  ": artan sütun sıralamasını aktifleştir",
            "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
        },
        "select": {
            "rows": {
                "_": "%d kayıt seçildi",
                "1": "1 kayıt seçildi"
            }
        },
       
    },
    stateSave: true,
   

});     */