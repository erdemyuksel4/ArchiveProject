<div class="container w-100 p-0 m-0">
    <div class="row p-0 m-0 ">

    <?php
    $iconList =["","fa-user","fa-building-o","fa-book","fa-user","fa-group","fa-th-large","fa-user","fa-user"];
    foreach ($urls as $key => $value) {
        ?>
        <a href="<?=base_url($value)?>" class="col-lg-2 col-md-3 col-sm-12 col-xs-12 py-3 border" style="margin:1px;height:100px;background-color:#fff" onmouseenter ="hover(this)" >
            <div class="text-center h4"style="color:#000">
                <i class="fa <?=next($iconList)?>"></i>
            </div>
            <div class="text-center h4 text-secondary" style="">
                <?=$key?>
            </div>
        </a>
        
        <?php
    }
    ?>
    </div>
</div>
<script>
    function hover(e){
        $(e).addClass('shadow-pulse');
        $(e).on('animationend', function(){    
                $(e).removeClass('shadow-pulse');
        });
    }
    
</script>