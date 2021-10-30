function BodyLoad(e) {
    var a = new bolge();
    a.update();
    a.AddStarter();
    a.select.select.onchange = () => {
        a.onChangeEvent();
    }
}
function sortSelect(selElem) {
    var tmpAry = new Array();
    for (var i=0;i<selElem.options.length;i++) {
        tmpAry[i] = new Array();
        tmpAry[i][0] = selElem.options[i].text;
        tmpAry[i][1] = selElem.options[i].value;
    }
    tmpAry.sort();
    while (selElem.options.length > 0) {
        selElem.options[0] = null;
    }
    for (var i=0;i<tmpAry.length;i++) {
        var op = new Option(tmpAry[i][0], tmpAry[i][1]);
        selElem.options[i] = op;
    }
    return;
}
/*     function bolge() {
        this.select = new Select("bolgeler");
        this.select.textPart = "bolgeAdi";
        this.select.valuePart = "id";
        this.update = () => {
            this.select.Update("<?=base_url("MissionAreas/AreaLis")?>");
        }
        this.AddStarter = () => {
            this.select.AddStarter("Görev Bölgesi");
        }
        this.onChangeEvent = () => {
            reset("bolgeler");
            if (this.select.select.value != "Görev Bölgesi") {
                var a = new yer(this.select.select.value);
                a.update();
                a.AddStarter();
                a.select.select.onchange = () => {
                    a.onChangeEvent();
                }
            }
        }
    }

    function yer(val) {
        this.select = new Select("yerler");
        this.select.textPart = "yerAdi";
        this.select.valuePart = "id";
        this.update = () => {
            this.select.Update("<?=base_url("
                MissionPlaces / PlaceList ")?>", val);
        }
        this.AddStarter = () => {
            this.select.AddStarter("Görev Yeri");
        }
        this.onChangeEvent = () => {
            reset("yerler");
            if (this.select.select.value != "Görev Yeri") {
                var a = new okul(this.select.select.value);
                a.update();
                a.AddStarter();
                a.select.select.onchange = () => {
                    a.onChangeEvent();
                }
            }
        }
    }

    function okul(val) {
        this.select = new Select("okullar");
        this.select.textPart = "ad";
        this.select.valuePart = "id";
        this.update = () => {
            this.select.Update("<?=base_url("
                Schools / SchoolList ")?>", val);
        }
        this.AddStarter = () => {
            this.select.AddStarter("Okul");
        }
        this.onChangeEvent = () => {
            reset("okullar");
            if (this.select.select.value != "Okul") {
                var a = new sinif(this.select.select.value);
                a.update();
                a.AddStarter();
                a.select.select.onchange = () => {
                    a.onChangeEvent();
                }
            }
        }
    }

    function sinif(val) {
        this.select = new Select("siniflar");
        this.select.textPart = "sinifAdi";
        this.select.valuePart = "id";
        this.update = () => {
            this.select.Update("<?=base_url("
                Schools / ClassList ")?>", val);
        }
        this.AddStarter = () => {
            this.select.AddStarter("Sınıf");
        }
        this.onChangeEvent = () => {
            reset("yerler");
            if (this.select.select.value != "Sınıf") {
                var a = new ogrenci(this.select.select.value);
                a.update();
                a.AddStarter();
                a.select.select.onchange = () => {
                    a.onChangeEvent();
                }
            }
        }
    }

    function ogrenci(val) {
        this.select = new Select("ogrenciler");
        this.select.textPart = "adSoyad";
        this.select.valuePart = "id";
        this.update = () => {
            this.select.Update("<?=base_url("
                Students / StudentList ")?>", val);
        }
        this.AddStarter = () => {
            this.select.AddStarter("Öğrenciler");
        }
        this.onChangeEvent = () => {

        }
    }

    function reset(id) {
        if (id == "bolgeler") {
            resetyer();
            resetokul();
            resetsinif();
            resetogrenci();
        } else if (id == "yerler") {
            resetokul();
            resetsinif();
            resetogrenci();
        } else if (id == "okullar") {
            resetsinif();
            resetogrenci();
        } else if (id == "siniflar") {
            resetogrenci();
        }
    }

    function resetyer() {

    }

    function resetokul() {

    }

    function resetsinif() {

    }

    function resetogrenci() {

    } */