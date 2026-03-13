<?php

$pwd = "azerty" ;

$hash = password_hash($pwd, PASSWORD_DEFAULT) ;
echo $hash ;