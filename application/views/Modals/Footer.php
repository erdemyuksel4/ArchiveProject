      </div>
      <div class="modal-footer">
        <?php 
          if(!isset($nosubmit)){
            
            if(isset($footerAgreeLocation)){
              ?>
              <a href="<?=base_url($footerAgreeLocation."/".$param)?>" type="button" class="btn btn-primary"><?=$footerButtonText?></a>
              <?php
            }else{/* Form var ise*/
              ?>
              
              <button class="btn btn-primary" id="SubmitButton" type="submit" onclick="SubmitForm('#form',()=>{$('.modal').modal('hide');Refresh()},{name:'page',value:'page'})"><?=$footerButtonText?></button>
              <?php
            }
          }
        ?>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
      </div>
    </div>
  </div>
</div>