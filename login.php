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
            <h3 class="p-3 text-light bg-primary text-center rounded">Login Form </h3>
            <?php
            require_once 'baseDonnee.php';
            $requete = "SELECT * FROM users ";
            $statement = $connected->query($requete);
            $users = $statement->fetchAll(PDO::FETCH_OBJ);
            foreach ($users as $user) {
                $usermail = $user->email;
                $userpass = $user->password;
            }
            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                if (($email == $usermail) && ($password == $userpass)) {
                    header('location:welcome.php');
                } else {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                      Your email or password is incorrect  !!.
                     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
                }
            }

            ?>
            <form class="mt-5" method="post">
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control">
                    <div class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <p class="text-muted fs-7">Do not you have Account ? <a href="createAccount.php">create Account</a></p>

                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>