<div class="left-sidebar col-md-3 col-sm-4 col-xs-12">
    <?php echo $this->Form->create('User', array('type' => 'file', 'url' => 'uploadimg')); ?>

    <div class="img"><img style="height:120px; width:120px;" src="<?php echo PROFILE_URL . '/' . $userDetails['User']['image']; ?>" class="proimg" />

        <input id="upload" name="data[User][image]" class="img" type="file"/>
        <a href="" id="upload_link">Add Profile Pictures<span>*</span></a>

    </div>
    <?php echo $this->Form->end(); ?>
    <ul>
        <li><a href="<?php echo $this->Html->url('/', true) ?>users/personal" <?php if($this->request->params['action']=="personal"){ ?> class="active" <?php } ?> ><i class="fa fa-user"></i> Personal Information</a></li>
        <li><a href="<?php echo $this->Html->url('/', true) ?>users/professional"  <?php if($this->request->params['action']=="professional"){ ?> class="active" <?php } ?>><i class="fa fa-user"></i> Porfessional Information</a></li>
        
        <li><a href="<?php echo $this->Html->url('/', true) ?>users/document" <?php if($this->request->params['action']=="document"){ ?> class="active" <?php } ?>><i class="fa fa-edit"></i> Documents</a></li>
    </ul>
</div>
<style>
    #upload_link{
        text-decoration:none;
    }
    #upload{
        display:none
    }

</style>
<script>
    $(function () {
        $("#upload_link").on('click', function (e) {
            e.preventDefault();
            $("#upload:hidden").trigger('click');
        });
    });
</script>
<?php echo $this->Html->script('jquery.form.min'); ?>

<?php if($this->request->params['action']=="document"){ ?>
<script type="text/javascript">
    $('.img').on("change", function () {
        $('#UserDocumentForm').ajaxSubmit({
            success: function (d) {
                $('.proimg').attr("src", "<?php echo $this->Html->url("/img/"); ?>" + d.img);
            }
        });
    });
</script>
<?php } ?>
<?php if($this->request->params['action']=="professional"){ ?>
<script type="text/javascript">
    $('.img').on("change", function () {
        $('#UserProfessionalForm').ajaxSubmit({
            success: function (d) {
                $('.proimg').attr("src", "<?php echo $this->Html->url("/img/"); ?>" + d.img);
            }
        });
    });
</script>
<?php } ?>
<?php if($this->request->params['action']=="personal"){ ?>
<script type="text/javascript">
    $('.img').on("change", function () {
        $('#UserPersonalForm').ajaxSubmit({
            success: function (d) {
                $('.proimg').attr("src", "<?php echo $this->Html->url("/img/"); ?>" + d.img);
            }
        });
    });
</script>
<?php } ?>