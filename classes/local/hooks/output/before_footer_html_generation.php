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
 * Hook callback for local_coursearchivingnotification.
 *
 * @package    local_coursearchivingnotification
 * @copyright The Regents of the University of California
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace local_coursearchivingnotification\local\hooks\output;

use local_coursearchivingnotification\output\renderer;

/**
 * Hook callback for local_coursearchivingnotification.
 *
 * @package    local_coursearchivingnotification
 * @copyright The Regents of the University of California
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class before_footer_html_generation {

    /**
     * A callback to add markup to the page's main content area, right before the footer.
     *
     * @param \core\hook\output\before_footer_html_generation $hook The hook for adding HTML content to the footer.
     */
    public static function callback(\core\hook\output\before_footer_html_generation $hook): void {
        global $PAGE;

        // Ignore hook during installation or upgrades.
        if (during_initial_install() || isset($CFG->upgraderunning)) {
            return;
        }

        /** @var renderer $output */
        $output = $PAGE->get_renderer('local_coursearchivingnotification');

        $config = get_config('local_coursearchivingnotification');
        $rhett = '';

        // Only render the notification if we're on a course page,
        // and if the course ID is listed in config.
        if ($PAGE->course
            && isset($config->courseids)) {
            $courseids = explode(',', $config->courseids);
            foreach ($courseids as $courseid) {
                $courseid = trim($courseid);
                if ('' === $courseid  || !is_numeric($courseid)) {
                    continue;
                } else if ((int)$courseid === (int)$PAGE->course->id) {
                    $rhett .= $output->widget();
                }
            }
        }

        $hook->add_html($rhett);
    }
}
