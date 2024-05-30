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
 * Settings page to display site_announcements plugin in Site administration tree.
 *
 * @package    block_site_announcements
 * @copyright  2024, Sarath P <sarathpoduval8@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    // Announcement one.
    $settings->add(new admin_setting_confightmleditor(
        'block_site_announcements/announcement1',
        get_string('announcement_one', 'block_site_announcements'),
        '',
        ''
    ));
    // Announcement two.
    $settings->add(new admin_setting_confightmleditor(
        'block_site_announcements/announcement2',
        get_string('announcement_two', 'block_site_announcements'),
        '', ''
    ));
    // Announcement three.
    $settings->add(new admin_setting_confightmleditor(
        'block_site_announcements/announcement3',
        get_string('announcement_three', 'block_site_announcements'),
        '',
        ''
    ));
}

