<header>
    <div class="container-fluid">
       
        <div class="container">

            <a href="#" class="logo"><img src="<?php echo IMG_URL . 'logo.png'; ?>" /></a>
            <div class="right"><?php if($loggedIn == true) {  ?>Hi, 
                <?php  echo $userInfo['User']['first_name'].' '.$userInfo['User']['last_name'];

                if(!empty($userInfo['User']['image'])){
                    echo $this->Html->image(PROFILE_URL.$userInfo['User']['image'],array('class'=>'profile-img  img-round','height'=>'50'));
                 }else{
                        echo $this->Html->image('default-user.jpg',array('class'=>'profile-img  img-round','height'=>'50'));
                }
            }else{ ?>

                <ul>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'signin')); ?>">Login</a></li>  
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'login')); ?>">Signup</a></li>  
                </ul>
                    

            <?php }?>
            </div>
            
            <!--            <ul>
            <?php //if ($loged == true) {  ?>
                                <li><a href="<?php //echo $this->Html->url(array('controller' => 'Users', 'action' => 'logout')); ?>" class="active">Logout</a></li>
                                <li><a href="<?php //echo $this->Html->url(array('controller' => 'Users', 'action' => 'profile'));  ?>" class="active">Profile</a></li>
            <?php //} else {  ?>
                                <li><a href="<?php //echo $this->Html->url(array('controller' => 'Users', 'action' => 'signin')); ?>" class="active">Login</a></li>
                                <li><a href="<?php //echo $this->Html->url(array('controller' => 'Users', 'action' => 'register'));  ?>" class="active">Register</a></li>
<?php // }  ?>
            
                        </ul>-->
        </div>
    </div>
</header>