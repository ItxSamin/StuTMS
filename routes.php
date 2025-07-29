<?php

require_once __DIR__.'/router.php';

get ('/', 'index.php');
get ('/entry','views/entry_form.php');
get ('/admin_signup', 'views/Admin_signup.php');
get ('/edit_form/$id', 'views/edit_form.php');
get ('/stu_login', 'views/stu_login.php');
get ('/admin_login', 'views/admin_login.php');
get ('/logout','controller/logout.php');
post ('/stu_result', 'views/stu_login.php');
post('/process', 'controller/control.php');

any('/404','views/404.php');
