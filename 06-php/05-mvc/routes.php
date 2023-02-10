<?php 
/* 
    Cette fois ci nos routes sont un peu plus complexe.
    Elles vont être liées à la fois à un controller
    Mais aussi à une fonction.
*/
const ROUTES = [
    "05-mvc"=>[
        "controller"=>"userController.php",
        "fonction"=>"readUsers"
    ],
    "05-mvc/inscription"=>[
        "controller"=>"userController.php",
        "fonction"=>"createUser"
    ],
    "05-mvc/user/update"=>[
        "controller"=>"userController.php",
        "fonction"=>"updateUser"
    ],
    "05-mvc/user/delete"=>[
        "controller"=>"userController.php",
        "fonction"=>"deleteUser"
    ],

];
?>