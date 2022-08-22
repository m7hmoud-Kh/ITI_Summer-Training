<?php
session_start();
require_once 'header.php';
require './Model_user.php';


if(isset($_GET['id']) && is_numeric($_GET['id'])){

    $user = new User();


    $contact_id = $_GET['id'];

    $contact = $user->get_contact_by_id($contact_id);

    function selected_or_not($column_db,$option){
        if($column_db == $option){
            return 'selected';
        }
    }

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $data = $_POST;
    if($user->update($data)){
        $_SESSION['updated'] = "Contact Updated Successfully";
        header('location: index.php');
    }
}
?>

<div class="container">
    <h1 class="mb-4 mt-4">Update Contact</h1>
    <form method="post" action="<?= $_SERVER["PHP_SELF"] ?>?id=<?=$contact['id']?>">
    <input type="hidden" name="id" value="<?=$contact['id']?>">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control"
            value="<?=$contact['name']?>" required
            >
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control"
            value="<?=$contact['email']?>" required>
        </div>

        <div class="form-group">
            <label>Job Title:</label>
            <input type="text" name="job_title" class="form-control"
            value="<?=$contact['job_title']?>" required>
        </div>

        <div class="form-group">
            <label>Country:</label>
            <select name="country" class="form-control"  id="" required>
                <option
                <?= selected_or_not($contact['country'],'Egypt')
                ?>>Egypt</option>
                <option
                <?= selected_or_not($contact['country'],'USA')
                ?>>USA</option>
                <option
                <?= selected_or_not($contact['country'],'India')
                ?>>India</option>
            </select>
        </div>

        <div class="form-group">
            <label>City:</label>
            <select name="city" class="form-control"  id="" required>
                <option
                <?= selected_or_not($contact['city'],'Assuit')
                ?>
                >Assuit</option>
                <option
                <?= selected_or_not($contact['city'],'Los Anglos')
                ?>
                >Los Anglos</option>
                <option
                <?= selected_or_not($contact['city'],'Mobay')
                ?>
                >Mobay</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Update</button>
        </div>

    </form>

</div>

<?php

require_once 'footer.php';
}
?>
