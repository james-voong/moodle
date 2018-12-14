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
 * Login redirect to idp
 *
 * @package    core
 * @subpackage auth
 * @author     James Voong
 * @copyright  2018 Catalyst IT
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../config.php');

global $SESSION;

$wantsurl = $SESSION->wantsurl;
if (empty($SESSION->wantsurl)) {
    $wantsurl = $CFG->wwwroot;
}

// id is hardcoded because the point of this is to bounce the user straight to the idp.
// Seeing as we are bouncing them straight to the idp, we can assume there are no other services.
// Also, the id is private in the issuer object, so just do the easiest solution.
// I know, I'm not happy about this either.
$params = array('id' => 1,
                'sesskey' => sesskey(),
                'wantsurl' => $wantsurl);

$url = new moodle_url('/auth/oauth2/login.php', $params);
redirect($url);
