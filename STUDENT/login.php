<?php

include 'db.php';
    if ($_SERVER['REQUEST_METHOD']==='POST') {
        $name=$_POST['name'];
        $pass=$_POST['password'];
        $sql=$conn->prepare('select password from users where name=?');
        $sql->bind_param('s',$name);
        $sql->execute();
        $sql->bind_result($password);
        $sql->fetch();
        if (password_verify($pass,$password)) {
            $_SESSION['name']=$name;
            header('location:home.php');
        } else {
            echo('Invalid Credentials');
        }
        
    }

?>
<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <h1 class="text-center my-5" >Login To Student Course Management System!!!</h1>
            <div
                class="container col-4 p-5 my-3 border-5 shadow"
            >
              
            <form action="" method="post">
          
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        id="name"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                   
                </div>
                
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                    <input
                        type="password"
                        class="form-control"
                        name="password"
                        id=""
                        aria-describedby="helpId"
                        placeholder=""
                    />
                   
                </div>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    login
                </button>
                
                
            </form>
        </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
