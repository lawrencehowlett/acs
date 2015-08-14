<?php

global $project;
$project = 'mysite';

global $database;
$database = 'newedge_acs';

require_once("conf/ConfigureFromEnv.php");

i18n::set_locale('en_GB');