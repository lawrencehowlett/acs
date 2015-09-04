<?php

global $project;
$project = 'mysite';

global $database;
$database = 'acsstagi_db';

require_once("conf/ConfigureFromEnv.php");

i18n::set_locale('en_GB');