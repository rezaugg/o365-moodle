<?php

/*
 * Get Onenote token and call the home page
 * Needed to add the parameter authprovider in order to identify the authentication provider
 */
require('../../config.php');
//echo $_GET['access_token'];exit;
$code = optional_param('access_token', '', PARAM_TEXT);

if (empty($code)) {
    throw new moodle_exception('onenote_failure');
}

$loginurl = '/my/'; // TODO: What should be this url to allow user to add the block on other pages?
if (!empty($CFG->alternateloginurl)) {
    $loginurl = $CFG->alternateloginurl;
}

$url = new moodle_url($loginurl, array('code' => $code, 'authprovider' => 'onenote'));
redirect($url);

?>
