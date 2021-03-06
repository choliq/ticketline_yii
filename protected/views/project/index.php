<div class="page-header">
  <h1>Dashboard</h1>
</div>

<div class="row">
  <div class="span9">
    <?php if (Yii::app()->user->hasFlash('flash')): ?>
      <div class="alert">
        <?php echo Yii::app()->user->getFlash('flash'); ?>
      </div>
    <?php endif; ?>

    <h2>Project</h2>

    <?php
    $this->widget('zii.widgets.CListView', array(
      'dataProvider' => $dataProvider,
      'itemView' => '_view',
      'template' => "{items}\n{pager}",
    ));
    ?>
  </div>

  <div class="span3">

    <div class="well sidebar-nav">
      <ul class="nav nav-list">
        <p><?php echo CHtml::link('Create a new Project', array('/project/create'), array('class' => 'btn btn-primary')); ?></p>
      </ul>
    </div>

  </div>
</div>
