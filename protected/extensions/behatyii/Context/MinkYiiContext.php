<?php

use Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Mink\Behat\Context\MinkContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

class MinkYiiContext extends MinkContext {

  protected $app;
  protected $fixtures = false;

  /**
   * Initializes context.
   * Every scenario gets it's own context object.
   *
   * @param   array   $parameters     context parameters (set them up through behat.yml)
   */
  public function __construct() {
    $this->app = Yii::app();

    if (is_array($this->fixtures)) {
      $this->getFixtureManager()->load($this->fixtures);
    }
  }

  public function getApp() {
    return $this->app;
  }

  /**
   * PHP magic method.
   * This method is overridden so that named fixture data can be accessed like a normal property.
   * @param string $name the property name
   * @return mixed the property value
   */
  public function __get($name) {
    if (is_array($this->fixtures) && ($rows = $this->getFixtureManager()->getRows($name)) !== false) {
      return $rows;
    }
    else {
      throw new Exception("Unknown property '$name' for class '".get_class($this)."'.");
    }
  }

  /**
   * PHP magic method.
   * This method is overridden so that named fixture ActiveRecord instances can be accessed in terms of a method call.
   * @param string $name method name
   * @param string $params method parameters
   * @return mixed the property value
   */
  public function __call($name, $params) {
    if (is_array($this->fixtures) && isset($params[0]) && ($record = $this->getFixtureManager()->getRecord($name, $params[0])) !== false) {
      return $record;
    }
    else {
      throw new Exception("Unknown method '$name' for class '".get_class($this)."'.");
    }
  }

  /**
   * @return CDbFixtureManager the database fixture manager
   */
  public function getFixtureManager() {
    return $this->app->getComponent('fixture');
  }

  /**
   * @param string $name the fixture name (the key value in {@link fixtures}).
   * @return array the named fixture data
   */
  public function getFixtureData($name) {
    return $this->getFixtureManager()->getRows($name);
  }

  /**
   * @param string $name the fixture name (the key value in {@link fixtures}).
   * @param string $alias the alias of the fixture data row
   * @return CActiveRecord the ActiveRecord instance corresponding to the specified alias in the named fixture.
   * False is returned if there is no such fixture or the record cannot be found.
   */
  public function getFixtureRecord($name, $alias) {
    return $this->getFixtureManager()->getRecord($name, $alias);
  }

  /**
   * @Given /^I am on the homepage$/
   */
  public function iAmOnTheHomepage() {
    $this->getSession()->visit($this->locatePath($this->getParameter('base_url')));
  }

  /**
   * @Given /^I should be on the page for "(?P<model>[^"]*)" with "(?P<text>[^"]*)" as its "(?P<attribute>[^"]*)"$/
   */
  public function iShouldBeOnThePageForWithInIts($model, $text, $attribute) {
    $obj = $model::model()->findByAttributes(array($attribute => $text));
    $expected = '/'.$model.'/'.$obj->id;
    $this->assertPageAddress($expected);
  }

  /**
   * @Given /^there is a "(?P<model>[^"]*)" with "(?P<text>[^"]*)" as its "(?P<attribute>[^"]*)"$/
   */
  public function thereIsAWithInIts($model, $text, $attribute) {
    $model = ucfirst($model);
    $obj = new $model;
    $obj->$attribute = $text;
    $obj->save();
  }

  /**
   * @Given /^there is a "(?P<model>[^"]*)" with following details:$/
   */
  public function thereIsAWithFollowingDetails($model, TableNode $table) {
    $model = ucfirst($model);

    foreach ($table->getHash() as $row) {
      $obj = new $model;
      $obj->attributes = $row;
      $obj->save();
    }
  }

}
