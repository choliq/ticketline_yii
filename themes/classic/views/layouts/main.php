<!DOCTYPE html>
<html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <?php echo CHtml::link(CHtml::encode(Yii::app()->name), array('/project/index'), array('class' => 'brand')); ?></a>
          <div class="nav-collapse">
            <?php
            $this->widget('zii.widgets.CMenu', array(
              'items' => array(
                array('label' => 'Dashboard', 'url' => array('/project/index')),
                array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                array('label' => 'Contact', 'url' => array('/site/contact')),
                array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Logout ('.Yii::app()->user->name.')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
              ),
              'htmlOptions' => array('class' => 'nav'),
            ));
            ?>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <?php echo $content; ?>
      <hr>
      <div id="footer">Copyright &copy; <?php echo date('Y'); ?> by My Company. All Rights Reserved. <?php echo Yii::powered(); ?></div>
    </div>

  </body>
</html>
