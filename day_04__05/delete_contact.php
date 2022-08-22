<?php
session_start();
require_once './Model_user.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])){

    $user = new User();


    $contact_id = $_GET['id'];

    if($user->delete($contact_id)){
        $_SESSION['delete_contact'] = "Contact Deletd...!";
        header('location: index.php');
    }

}