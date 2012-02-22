<?php $this->pageTitle = Yii::app()->name.' - '.$project->name; ?>

<div class="page-header">
  <h1>Project</h1>
</div>

<div class="row">

  <div class="span9">
    <?php if (Yii::app()->user->hasFlash('flash')): ?>
      <div class="alert">
        <?php echo Yii::app()->user->getFlash('flash'); ?>
      </div>
    <?php endif; ?>
    <h1 class="project-name"><?php echo CHtml::encode($project->name); ?></h1>
    <p class="project-description"><?php echo CHtml::encode($project->description); ?></p>
  </div>

  <div class="span3">
    <div class="well sidebar-nav">
      <ul class="nav nav-list">
        <li class="nav-header">Project</li>
        <li><?php echo CHtml::link('Edit Project', array('project/update', 'id' => $project->id)); ?></li>
        <li><?php echo CHtml::link('Delete Project', array('project/delete', 'id' => $project->id)); ?></li>
      </ul>
    </div>
  </div>

</div>
