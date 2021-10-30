function previewImage(file) {
    imgElementCreate(file[0])
}

function imgElementCreate(src) {
    if (src) {
        var reader = new FileReader();

        reader.readAsDataURL(src);
        reader.onload = function() {
            var img = document.createElement("img");
            img.src = reader.result;
            img.className = "p-2 img-sec";
            img.id = "img" + (Math.random() * 100);
            document.getElementById("preimg").appendChild(img);
            var hidden = document.getElementById("imgblob");
            var arr = JSON.parse(hidden.value);
            arr.push({ id: img.id, blob: img.src });
            hidden.value = JSON.stringify(arr);
            $(img).mouseover(function(e) {
                $(this).css("backgroundColor", "rgb(242 108 96)");
            });
            $(img).mouseout(function(e) {
                $(this).css("backgroundColor", "transparent");
            });
            $(img).dblclick(function(e) {
                var id = e.target.id;
                var t = JSON.parse($("#imgblob").val());
                for (const d in t) {
                    if (t[d].id == id) {
                        t[d] = "";
                        $("#imgblob").val(JSON.stringify(t));
                    }
                }
                $(e.target).remove();
            });
        }
    }
}