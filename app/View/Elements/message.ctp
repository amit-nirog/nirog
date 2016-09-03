<div class="msgglobal" style="display: none;"><div class="msgglobaltxt">
<?php
    $displayMsgJs=false;
    if ($this->Session->check('Message.error')){
            echo $this->Session->flash('error');
            $displayMsgJs=true;
        }
    else if ($this->Session->check('Message.flash')){
        echo $this->Session->flash();
        $displayMsgJs=true;
    }?>
</div></div>

<?php if($displayMsgJs){ ?>

 <script type="text/javascript">
     $(document).ready(function(){
     $('.msgglobal').fadeIn('slow').delay(3000).fadeOut('slow');
     });
     </script>

 <?php }?>