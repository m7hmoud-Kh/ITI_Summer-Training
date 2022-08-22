<?php
require_once 'header.php';
require_once './Model_user.php';
 ?>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $user = new User();

    $data = $_POST;
    if($user->store($data)){
        $success = 'Contact Added Successfully';
    }
}
?>

<div class="container">
    <h1 class="mb-4 mt-4">Add New Contact</h1>
    <?php
    if(isset($success)){
        ?>
        <p class="alert alert-success"><?=$success?></p>
        <?php
    }
    ?>
    <form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Job Title:</label>
            <input type="text" name="job_title" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Country:</label>
            <select name="country" name="country" class="form-control"  id="" required>
                <option selected disabled>Select Country</option>
                <option>Egypt</option>
                <option>USA</option>
                <option>India</option>
            </select>
        </div>

        <div class="form-group">
            <label>City:</label>
            <select name="city" name="city" class="form-control"  id="" required>
                <option selected disabled>Select City</option>
                <option>Assuit</option>
                <option>Los Anglos</option>
                <option>Mobay</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Add</button>
        </div>

    </form>

</div>

<?php require_once 'footer.php'; ?>
