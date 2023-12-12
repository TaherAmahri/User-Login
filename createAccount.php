<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container p-5 shadow-sm  justify-content-center">
        <div class="col ">
            <h3 class="p-3 text-light bg-success text-center rounded">Create New Account </h3>
            <?php
            require_once 'baseDonnee.php';
            if (isset($_POST['addAccount'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                if (!empty($name) && (!empty($email) && (!empty($password)))) {
                    $requete = "INSERT INTO users VALUES(NULL,?,?,?)";
                    $statement = $connected->prepare($requete);
                    $data = $statement->execute([$name, $email, $password]);
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                       Your Account is Created the succefuly !!
                       <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                 </div>";
                } else {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                     Your Account is not Created , You have an error !!.
                     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
                }
            }
            ?>
            <form class="mt-5" method="post">
                <div class="mb-3">
                    <label class="form-label">Name : </label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email address :</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password :</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" name="addAccount" class="btn btn-success">Creat </button>
                <button type="submit" formaction="login.php" class="btn btn-danger">Close</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>