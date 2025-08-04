<?php

require_once __DIR__.'/router.php';

get ('/', 'index.php');
get ('/entry','views/entry_form.php');
get ('/admin_signup', 'views/Admin_signup.php');
get ('/edit_form/$id', 'views/edit_form.php');
get ('/stu_login', 'views/stu_login.php');
get ('/admin_login', 'views/admin_login.php');
get ('/teacher_login', 'views/teach_login.php');
get ('/teacher_control', 'views/teach_control.php');
get ('/admin_control', 'views/admin_control.php');
get ('/logout','controller/logout.php');
get ('/add_stu', 'views/add_stu.php');
get ('/add_tea', 'views/add_tea.php');
post ('/stu_result', 'views/stu_login.php');
post('/process', 'controller/control.php');

any('/404','views/404.php');
