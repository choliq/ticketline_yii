<div class="page-header">
  <h1>Update Project</h1>
</div>

<div class="row">

  <div class="span9">
    <?php if (Yii::app()->user->hasFlash('flash')): ?>
      <div class="alert">
        <?php echo Yii::app()->user->getFlash('flash'); ?>
      </div>
    <?php endif; ?>
    <?php $this->renderPartial('_form', array('project' => $project)); ?>
  </div>

  <div class="span3">
    <div class="well sidebar-nav">
      <ul class="nav nav-list">
        <li class="nav-header">Project</li>
        <li>
          <?php echo CHtml::link('Back', array('/project/view', 'id' => $project->id)); ?>
        </li>
      </ul>
    </div>
  </div>

</div>
