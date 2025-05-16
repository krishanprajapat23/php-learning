<?php

use Core\Authenticator;

// log out the user
(new Authenticator())->logout();

//after logout redirect the login page
header('location: ./login');
exit();