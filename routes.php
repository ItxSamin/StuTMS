<?php

require_once __DIR__.'/router.php';

get ('/', 'index.php');
get ('/entry','views/entry_form.php');
get ('/admin_signup', 'views/Admin_signup.php');
get ('/edit_form', 'views/edit_form.php');
post('/process', 'controller/control.php');

any('/404','views/404.php');
