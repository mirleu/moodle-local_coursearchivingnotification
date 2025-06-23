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
 * The plugin's version file.
 *
 * @package    local_coursearchivingnotification
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright  The Regents of the University of California
 */

defined('MOODLE_INTERNAL') || die();

$plugin->version   = 2025062300;
$plugin->requires  = 2024100700;
$plugin->component = 'local_coursearchivingnotification';
$plugin->release = 'v4.5';
$plugin->supported = [405, 405];
$plugin->maturity = MATURITY_STABLE;
