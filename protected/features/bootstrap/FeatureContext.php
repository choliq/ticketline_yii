<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

require_once 'mink/autoload.php';
require_once __DIR__.'/../../framework/yiit.php';

Yii::$enableIncludePath = false;
Yii::createWebApplication(__DIR__.'/../../config/dev.php');
Yii::import('ext.behatyii.Context.MinkYiiContext');

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends MinkYiiContext {
  protected $fixtures = array('project' => 'Project');

  /**
    * Initializes context.
    * Every scenario gets it's own context object.
    *
    * @param   array   $parameters     context parameters (set them up through behat.yml)
    */
  public function __construct(array $parameters) {
    parent::__construct();
  }

}
