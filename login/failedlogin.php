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
 * Display the text "Failed to login" to the user.
 *
 * @package    core
 * @subpackage auth
 * @author     James Voong
 * @copyright  2018 Catalyst IT
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../config.php');

$PAGE->set_url('/login/failedlogin.php');
$PAGE->set_context(context_system::instance());

$sesskey = optional_param('sesskey', '__notpresent__', PARAM_RAW); // we want not null default to prevent required sesskey warning
$login   = optional_param('loginpage', 0, PARAM_BOOL);

if (isloggedin()) {
    // User is not supposed to be here. Send them to the main page.
    $siteroot = $CFG->wwwroot.'/';
    redirect($siteroot);
}

$PAGE->set_title(get_string('failedlogintitle','auth_oauth2'));
$PAGE->set_heading($SITE->fullname);
echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('faillogintext','auth_oauth2'));
$siteroot = $CFG->wwwroot;
$loggedouttext = get_string('tryagainlink', 'auth_oauth2', $siteroot);
echo $OUTPUT->box($loggedouttext, 'generalbox boxaligncenter');
echo $OUTPUT->footer();
