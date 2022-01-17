<?php $sms_sender_id = 'CloudWare';//values in this script should be changed by app configureation
$app_domain = $_SERVER['HTTP_HOST'];
$company_name = 'project_app';
$app_name = 'project_app';
$app_slug = 'project_app';
$app_link = $_SERVER['HTTP_HOST'];
$app_domain_root= $_SERVER['HTTP_HOST'];
date_default_timezone_set('Africa/Lagos');


define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB_NAME", "oyostate_project_mgt_v1");
define("FIRST_DAY_OF_YEAR", date('Y-m-d', strtotime('first day of january this year')) );
define("LAST_DAY_OF_YEAR", date('Y-m-d', strtotime('last day of december this year'))  );


$log_directory = 'c:/xampp/htdocs/oyo_project_management_app_v1/';
$project_base_path = 'https://localhost/oyo_project_management_app_v1/';

$files_exception_arr = ['access_denied.php','index.php','404.html','.','..','.browserslistrc','.git','.gitignore','.htaccess','.travis.yml','ajax','telegram_copy.php','algo1.php','create_members_copy.php','testgit22.php','testing.php','testing2.php','youtube_videos2.php','youtube_videos.php','view_files_back.php','telegram_copy.php','telegram.php','tables.php'];


$departments = get_row_count_no_param('departments');
$zones = get_row_count_no_param('zones');
$mdas = get_row_count_no_param('mdas');
$users = get_row_count_one_param('users','role','admin');
$contractors = get_row_count_one_param('users','role','contractor');
$all_projects = get_row_count_no_param('projects');
$over_due_projects = get_row_count_no_param('projects');
$pending_projects = get_row_count_no_param('projects');
$pending_projects = get_row_count_no_param('projects');
$avg_projects_per_zone = get_row_count_no_param('projects');
$projects_completed_this_month = get_row_count_no_param('projects');
$projects_due_next_month = get_row_count_no_param('projects');


// //set timezone
// $report_dir = "report/";
// $report_pre_fix = 'report';

// //NB: Expiry date is in days
// $expiry_date = "60";

// //Country code: NB: Should be a string
// $country_code = "234";

// //flutter public testkey
// $public_key = 'FLWPUBK-047d46ab372585f170bee6d70f65dc7f-X';

// //flutter secret testkey
// $secret_key = 'FLWSECK-e4d8bf253b4be22405decd22616c3337-X';


// // $uploads_path = "C:/wamp64/www/eac/api/";

//sms details
// $username = "adebsholey4real@gmail.com";
// $password = "Pass4adebunmi%%";

$token = "nHVJu7NGqF7DyZYJxJ6jDjrpemVqEvnf80cNuZZd6mCBjFwHLVBRqS0NjTnfMJT8upmvRgKqYG6YLBKkedcgAUaBdyctSMhuZIpy";
$routing = 2;
$sender_id = urlencode("SmartSMS");

?>
