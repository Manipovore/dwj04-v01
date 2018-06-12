<?php
$postTable = App\App::getInstance()->getTable('Post');
if(!empty($_POST)){
    $result = $postTable->delete($_POST['id']);
}