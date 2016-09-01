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
        <title>Nirog Doctor Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        echo $this->Html->css(array('style', 'bootstrap', 'font-awesome.min'));
        echo $this->Html->script(array('jquery-min','bootstrap-min','jquery.plugin','menu','jquery.leanModal.min','jquery.validate.min'));
        ?>

    </head>
    <body>
        <?php echo $this->element('header'); ?>

        <?php echo $this->fetch('content'); ?>

        <?php echo $this->element('footer'); ?>

        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>
