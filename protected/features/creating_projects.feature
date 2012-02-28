Feature: creating projects
  In order to have projects to create issues to
  As a user
  I want to be able to create them

  Background:
    Given I am on the homepage
    When I follow "Create a new Project"

  Scenario: creating a valid project
    And I fill in "Project name" with "Yii Framework 2"
    And I fill in "Description" with "Yii Framework 2 is the next major version of Yii"
    And I press "Create Project"
    Then I should see "Project has been created."
    And I should be on the page for "project" with "Yii Framework 2" as its "name"
    And I should see "Ticketline - Yii Framework 2" in the "title" element
    And I should see "Yii Framework 2" in the ".project-name" element
    And I should see "Yii Framework 2 is the next major version of Yii" in the ".project-description" element

  Scenario: creating project with empty attributes fails
    And I fill in "Project name" with ""
    And I fill in "Description" with ""
    And I press "Create Project"
    Then I should see "Project has not been created."
    And I should see "Project name cannot be blank."
    And I should see "Description cannot be blank."
    And I should not see "Ticketline - Yii Framework 2"
    And I should not see "Yii Framework 2"
    And I should not see "Yii Framework 2 is the next major version of Yii"
