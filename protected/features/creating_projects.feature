Feature: creating projects
  In order to have projects to create issues to
  As a user
  I want to be able to create them

  Scenario: creating a project
    Given I am on the homepage

    When I follow "Create a new Project"
    And I fill in "Project name" with "Yii Framework 2"
    And I fill in "Description" with "Yii Framework 2 is the next major version of Yii"
    And I press "Create Project"

    Then I should see "Project has been created."
    And I should be on the page for "project" with "Yii Framework 2" as its "name"
    And I should see "Ticketline - Yii Framework 2" in the "title" element
    And I should see "Yii Framework 2" in the ".project-name" element
    And I should see "Yii Framework 2 is the next major version of Yii" in the ".project-description" element
