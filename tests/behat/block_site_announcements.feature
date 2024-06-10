@block @block_site_announcements @javascript
Feature: Ensure Site Announcements block works correctly
  Background:
    Given the following "users" exist:
      | username | firstname | lastname | email                |
      | student1 | Student   | 1        | student1@example.com |

  Scenario: Admin adds Site Announcements block and sets announcements
    Given I log in as "admin"
    And I navigate to "Appearance > Default Dashboard page" in site administration
    And I turn editing mode on
    And I add the "Site announcements" block
    Then I should see "Site announcements"
    And I press "Reset Dashboard for all users"
    And I navigate to "Plugins > Blocks > Site announcements" in site administration
    And I set the following fields to these values:
      | Announcement one   | Hello 1 |
      | Announcement two   | Hello 2 |
      | Announcement three | Hello 3 |
    And I press "Save changes"
    Then I should see "Changes saved"
    When I log out
    When I log in as "student1"
    And I wait "5" seconds
    Then I should see "Site announcements"
