<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Nirog Doctor Registration</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <?php
        echo $this->Html->css(array('bootstrap-min', 'AdminLTE.min.css','_all-skins.min')); ?>
        

       <?php echo $this->Html->script(array('jQuery-2.2.0.min','bootstrap.min','fastclick','app.min','demo','jquery.validate.min'));
        ?>

    </head>
    <body>
        <?php echo $this->element('admin_header'); ?>

        <?php echo $this->fetch('content'); ?>
  
        
        <?php echo $this->element('admin_sidebar'); ?>
        <?php echo $this->element('admin_footer'); ?>

        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>
