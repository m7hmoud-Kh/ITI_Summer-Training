<?php
session_start();
require_once 'header.php';
require './Model_user.php';
$user = new User();
$all_contact = $user->retrive();

?>
<div class="container">
    <h1 class="mb-4 mt-4">Contacts</h1>
    <?php
    alert_message('updated');
    alert_message('delete_contact','danger');
    ?>
    <div>
        <a href="./add_contact.php" class="btn btn-primary mb-4 mt-4">New Contact</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Job Title</th>
                <th scope="col">Country</th>
                <th scope="col">City</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
             foreach ($all_contact as $contact) {
                ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$contact['name']?></td>
                <td><?=$contact['email']?></td>
                <td><?=$contact['job_title']?></td>
                <td><?=$contact['country']?></td>
                <td><?=$contact['city']?></td>
                <td>
                    <a href="./update_contact.php?id=<?=$contact['id']?>" class="btn btn-success">Edit</a>
                    <a href="./delete_contact.php?id=<?=$contact['id']?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php
                $i++;
             }
            ?>
        </tbody>
        <tfoot>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Job Title</th>
            <th scope="col">Country</th>
            <th scope="col">City</th>
            <th scope="col">Action</th>
        </tfoot>
    </table>
</div>
<?php

require_once 'footer.php';

function alert_message($alert,$alert_type = 'success'){
    if(isset($_SESSION[$alert])){
    ?>
    <p class="alert alert-<?=$alert_type?>"><?=$_SESSION[$alert]?></p>
    <?php
        unset($_SESSION[$alert]);
    }
}


?>