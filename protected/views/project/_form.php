<?php $form = $this->beginWidget('CActiveForm', array('htmlOptions' => array('class' => 'form-horizontal'))); ?>

  <fieldset>
    <legend>Project Info</legend>

    <div class="control-group">
      <?php echo $form->labelEx($project, 'name', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->textField($project, 'name', array('class' => 'xlarge', 'size' => '30')); ?>
        <?php echo $form->error($project, 'name'); ?>
      </div>
    </div>

    <div class="control-group">
      <?php echo $form->labelEx($project, 'description', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->textArea($project, 'description', array('class' => 'xlarge')); ?>
        <?php echo $form->error($project, 'description'); ?>
      </div>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn btn-primary"><?php echo ($project->isNewRecord ? 'Create Project' : 'Update Project'); ?></button>
      <?php echo CHtml::link('Cancel',
        $project->isNewRecord ? array('project/index') : array('project/view', 'id' => $project->id),
        array('class' => 'btn')); ?>
    </div>
  </fieldset>

<?php $this->endWidget(); ?>
