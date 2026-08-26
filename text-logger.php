<?php
require_once 'config/config.php';


$user_id = "root" ?? null;
$user_email = "root" ?? null;

$success = log_Activity($pdo,$user_id,$user_email,'test_activity','success');

if($success){
    echo "Activity Log Insert Success";
}else{
    echo "Failed To Insert Activity Log";
}
?>    