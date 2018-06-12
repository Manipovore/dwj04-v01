<?php
$userTable = App\App::getInstance()->getTable('User');
if(!empty($_POST)){
    $result = $userTable->delete($_POST['id']);
}