@local @local_coursearchivingnotification
Feature: Configuring the course archiving notification plugin
  In order to notify course managers about the upcoming archival of their courses
  As admin
  I need to be able to place a notification banner on course pages
  Background:
    Given the following "courses" exist:
      | fullname | shortname |
      | Course 1 | C1        |
      | Course 2 | C2        |
      | Course 3 | C3        |

  @javascript
  Scenario: Configure notification for Course 1 and Course 2, but not Course 3
    When I log in as "admin"
    And I navigate to "Course > Course Archiving Notification" in site administration
    And I fill in the course ids for courses "Course 1, Course 2"
    And I press "Save"
    When I am on "Course 1" course homepage
    Then I should see the course archiving notification banner
    When I am on "Course 2" course homepage
    Then I should see the course archiving notification banner
    When I am on "Course 3" course homepage
    Then I should not see the course archiving notification banner
