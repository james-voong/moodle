<?php
require_once('../config.php');

global $SESSION;

$wantsurl = $SESSION->wantsurl;

// id is hardcoded because the point of this is to bounce the user straight to the idp.
// Seeing as we are bouncing them straight to the idp, we can assume there are no other services.
// Also, the id is private in the issuer object, so just do the easiest solution.
// I know, I'm not happy about this either.
redirect($CFG->wwwroot . '/auth/oauth2/login.php?id=1&wantsurl=' . $wantsurl . '&sesskey=' . sesskey());
