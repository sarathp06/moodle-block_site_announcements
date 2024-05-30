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
 * Block definition class for the block_site_announcements plugin.
 *
 * @package   block_site_announcements
 * @copyright 2024, Sarath P <sarathpoduval8@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Block definition class for the block_site_announcements plugin.
 */
class block_site_announcements extends block_base {

    /**
     * Initialises the block.
     *
     * @return void
     */
    public function init() {
        $this->title = get_string('pluginname', 'block_site_announcements');
    }

    /**
     * Gets the block contents.
     *
     * @return string The block HTML.
     */
    public function get_content() {

        global $OUTPUT;

        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->footer = '';

        // Get the messages from the block configuration using get_config.
        $announcement1 = get_config('block_site_announcements', 'announcement1');
        $announcement2 = get_config('block_site_announcements', 'announcement2');
        $announcement3 = get_config('block_site_announcements', 'announcement3');

        // Format the messages if they are not empty.
        $formattedannouncement1 = !empty($announcement1) ? format_text($announcement1, FORMAT_HTML) : '';
        $formattedannouncement2 = !empty($announcement2) ? format_text($announcement2, FORMAT_HTML) : '';
        $formattedannouncement3 = !empty($announcement3) ? format_text($announcement3, FORMAT_HTML) : '';

        $data = [];
        $data['messages'] = array_values(
            array_filter(
                [
                    $formattedannouncement1,
                    $formattedannouncement2,
                    $formattedannouncement3,
                ],
                function ($value) {
                    return !empty($value);
                }
            )
        );

        // Check if all messages are empty.
        if (empty($formattedannouncement1) && empty($formattedannouncement2) && empty($formattedannouncement3)) {
            $data['no_announcements'] = get_string('no_announcements', 'block_site_announcements');
        }
        $this->content->text = $OUTPUT->render_from_template('block_site_announcements/content', $data);

        return $this->content;
    }

    /**
     * Defines in which pages this block can be added.
     *
     * @return array of the pages where the block can be added.
     */
    public function applicable_formats() {
        return [
            'admin' => false,
            'site-index' => false,
            'course-view' => false,
            'mod' => false,
            'my' => true,
        ];
    }
    /**
     * Check if the configuration is present.
     * @return bool True if the configuration is present, false otherwise.
     */
    public function has_config() {
        return true;
    }
}
