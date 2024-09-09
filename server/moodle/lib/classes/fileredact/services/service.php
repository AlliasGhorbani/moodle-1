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

namespace core\fileredact\services;

use stored_file;
/**
 * The interface of the redaction service outlines the necessary methods for each redaction blueprint.
 *
 * @package   core
 * @copyright Meirza <meirza.arson@moodle.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class service {
    /**
     * Class constructor.
     *
     * @param stored_file $storedfile The file record object.
     */
    public function __construct(
        /** @var stored_file $storedfile The file record object. */
        private readonly stored_file $storedfile,
    ) {
    }

    /**
     * Performs redaction on the specified file.
     */
    abstract public function execute(): void;

    /**
     * Returns true if the service is enabled, and false if it is not.
     *
     * @return bool
     */
    abstract public function is_enabled(): bool;

    /**
     * Determines whether a certain mime-type is supported by the service.
     * It will return true if the mime-type is supported, and false if it is not.
     *
     * @param string $mimetype
     * @return bool
     */
    public function is_mimetype_supported(string $mimetype): bool {
        return false;
    }

    /**
     * Adds settings to the provided admin settings page.
     *
     * @param \admin_settingpage $settings The admin settings page to which settings are added.
     */
    abstract public static function add_settings(\admin_settingpage $settings): void;
}
