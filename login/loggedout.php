<?php

/**
 * Display the text "You are logged out" to the user.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../config.php');

$PAGE->set_url('/login/loggedout.php');
$PAGE->set_context(context_system::instance());

$sesskey = optional_param('sesskey', '__notpresent__', PARAM_RAW); // we want not null default to prevent required sesskey warning
$login   = optional_param('loginpage', 0, PARAM_BOOL);

if (isloggedin()) {
    // User is not supposed to be here. Send them to the main page.
    $siteroot = $CFG->wwwroot.'/';
    redirect($siteroot);
}
$PAGE->set_title(get_string('loggedouttitle','auth_oauth2'));
$PAGE->set_heading($SITE->fullname);
echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('youareloggedout','auth_oauth2'));
$siteroot = $CFG->wwwroot;
$loggedouttext = get_string('loggedoutlong', 'auth_oauth2', $siteroot);
echo $OUTPUT->box($loggedouttext, 'generalbox boxaligncenter');
echo $OUTPUT->footer();

