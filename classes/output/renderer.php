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

namespace local_coursearchivingnotification\output;

use plugin_renderer_base;

/**
 * The plugin's output renderer.
 *
 * @package     local_coursearchivingnotification
 * @copyright The Regents of the University of California
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class renderer extends plugin_renderer_base {

    /**
     * Renders and returns the course archiving notification widget.
     * @return string The widget's rendered markup.
     */
    public function widget(): string {
        return $this->render_from_template('local_coursearchivingnotification/widget', []);
    }
}
