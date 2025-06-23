<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Step definitions for local_coursearchivingnotification.
 *
 * @package   local_coursearchivingnotification
 * @category  test
 * @copyright The Regents of the University of California
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Step definitions for local_coursearchivingnotification.
 *
 * @package   local_coursearchivingnotification
 * @category  test
 * @copyright The Regents of the University of California
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class behat_local_coursearchivingnotification extends behat_base {

    /**
     * Fills in the course ids for the given courses (by title) in the plugin settings form.
     *
     * @Given /^I fill in the course ids for courses "([^"]+)"$/
     * @param string $fullnames A comma-separated list of course full names.
     */
    public function i_fill_in_course_ids_for_courses($fullnames): void {
        global $DB;

        // Look up the course ids by their full names.
        $fullnames = array_map('trim', explode(',', $fullnames));
        [$insql, $inparams] = $DB->get_in_or_equal($fullnames, SQL_PARAMS_NAMED, 'course');
        $records = $DB->get_records_select('course', "fullname $insql", $inparams);

        // Populate the settings form with the course ids.
        $behatforms = behat_context_helper::get('behat_forms');
        $behatforms->i_set_the_field_to('id_s_local_coursearchivingnotification_courseids', implode(',', array_keys($records)));
    }

    /**
     * Asserts that the course archiving banner exists in the page header.
     *
     * @Then /^I should see the course archiving notification banner$/
     */
    public function i_should_see_the_course_archiving_notification_banner(): void {
        $xpath = '//div[contains(@class, "local_coursearchivingnotification-widget")]';
        $this->execute("behat_general::should_exist", [$xpath, "xpath_element"]);
    }

    /**
     * Asserts that the course archiving banner does not exist in the page header.
     *
     * @Then /^I should not see the course archiving notification banner$/
     */
    public function i_should_not_see_the_course_archiving_notification_banner(): void {
        $xpath = '//div[contains(@class, "local_coursearchivingnotification-widget")]';
        $this->execute("behat_general::should_not_exist", [$xpath, "xpath_element"]);
    }
}
