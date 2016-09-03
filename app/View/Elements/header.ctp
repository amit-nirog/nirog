<header>
    <div class="container-fluid">
       
        <div class="container">
            <a href="<?php echo BASEURL;?>" class="logo"><img src="<?php echo IMG_URL . 'logo.png'; ?>" /></a>
            <div class="right"><?php if ($loged == true) {  ?>Hi, 
  <?php  echo $name;
} ?> 
                <?php if ($loged == false) { ?>
                <ul>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'signin')); ?>">Login</a></li>  
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'login')); ?>">Signup</a></li>  
                </ul>
                    
            <?php } else { ?>
                    <img src="<?php echo PROFILE_URL . '/' . $image; ?>" class="profile-img  img-round" height="50" /></div>
            <?php } ?>
           
        </div>
    </div>
</header>