<div class="profile-nav col-lg-3 mx-auto">
    <section class="card">
        <div class="user-heading round">
            <a href="">
            <?php
            
            if(isset($resim)&&count($resim)>0){
                ?>

                <img src="<?=base_url($resim["yol"])?>" alt="">
                <?php
            }else{?>
                <i class="fa fa-user" style="font-size:100px"></i><?php
            }
            ?>
            </a>

        </div>

        <ul class="nav nav-pills nav-stacked">
            <li class="active nav-item"></li>
           
        </ul>

    </section>
</div>