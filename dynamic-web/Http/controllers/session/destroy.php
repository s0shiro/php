<?php

//logout user

use Core\Authenticator;

$auth = new Authenticator();

$auth->logut();

redirect('/');