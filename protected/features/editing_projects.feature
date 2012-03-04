Feature: Editing Projects
  In order to update project information
  As a user
  I want to be able to do that through an interface

  Background:
    Given there is a "project" with following details:
      | name            | description                                      |
      | Yii Framework 2 | Yii Framework 2 is the next major version of Yii |
    And I am on the homepage
    When I follow "Yii Framework 2"
    And I follow "Edit Project"

  Scenario: cancel editing project
    And I follow "Cancel"
    Then I should be on the page for "project" with "Yii Framework 2" as its "name"

  Scenario: Updating a project
    And I fill in "Project name" with "Yii Framework 2 beta"
    And I fill in "Description" with "Yii Framework 2 beta is the next major version of Yii"
    And I press "Update Project"
    Then I should see "Project has been updated."
    And I should be on the page for "project" with "Yii Framework 2 beta" as its "name"
    And I should see "Yii Framework 2 beta"
    And I should see "Yii Framework 2 beta is the next major version of Yii"

  Scenario: Updating a project with invalid attributes is bad
    And I fill in "Project name" with ""
    And I fill in "Description" with ""
    And I press "Update Project"
    Then I should see "Project has not been updated."
    And I should see "Project name cannot be blank."
    And I should see "Description cannot be blank."
