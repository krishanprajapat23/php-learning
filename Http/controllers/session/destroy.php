<?php

// log out the user

logout();

//after logout redirect the login page
header('location: ./login');
exit();