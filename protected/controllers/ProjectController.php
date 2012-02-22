<?php

class ProjectController extends Controller {

  public function actionIndex() {
    $this->render('index');
  }

  public function actionCreate() {
    $project = new Project;

    if (isset($_POST['Project'])) {
      $project->setAttributes($_POST['Project']);
      if ($project->save()) {
        Yii::app()->user->setFlash('flash', 'Project has been created.');
        $this->redirect(array('view', 'id' => $project->id));
      }
      else {
        Yii::app()->user->setFlash(
          'flash', 'Project has not been created.');
      }
    }

    $this->render('create', array('project' => $project));
  }

  public function actionView($id) {
    $project = $this->loadModel('Project', $id);
    $this->render('view', array('project' => $project));
  }

}
