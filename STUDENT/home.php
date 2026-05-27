<?php
include 'db.php';
$result=$conn->query('select * from courses');
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $course_name=$_POST['course_name'];
    $description=$_POST['description'];
    $duration=$_POST['duration'];
    $image=$_POST['image'];
    $user_id=$_POST['user_id'];
    $sql=$conn->prepare('insert into courses(course_name,description,duration,image,user_id) values (?,?,?,?,?)');
    $sql->bind_param('ssisi',$course_name,$description,$duration,$image,$user_id);
    if ($sql->execute()) {
        header('location:home.php');
    }
}

?>

<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Home</title>
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
            
            <nav
            class="navbar navbar-expand-sm navbar-light bg-light"
            >
            <div class="container">
                <a class="navbar-brand" href="#"><h1>Helloo <?php echo $_SESSION['name'] ?></h1></a>
                    <button
                    class="navbar-toggler d-lg-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                    >
                                <span class="navbar-toggler-icon"></span>
                    </button>
                
                    <form class="d-flex my-2 my-lg-0">
                        <a
                            name=""
                            id=""
                            class="btn btn-outline-primary"
                            href="home.php"
                            role="button"
                            >Add Course</a
                        >
                         <a
                            name=""
                            id=""
                            class="btn btn-outline-primary"
                            href="home.php"
                            role="button"
                            >View Course</a
                        >
                         <a
                            name=""
                            id=""
                            class="btn btn-outline-success"
                            href="csv.php"
                            role="button"
                            >Export Data</a
                        >
                        <a
                            name=""
                            id=""
                            class="btn btn-outline-danger"
                            href="logout.php"
                            role="button"
                            >Logout</a
                        >
                        
                    </form>
                </div>  
            </div>
         </nav>
        

        
        </header>
        <main>
            <h2 class="text-center my-5" >Add Courses</h2>
            <div
                class="container my-5 border col-4 p-5 shadow"
            >
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Course Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="course_name"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                       
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Duration</label>
                        <input class="form-control" name="duration" id="" ></input>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Course Image</label>
                        <textarea class="form-control" name="image" id="" ></textarea>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Submit
                    </button>
                    
                    
                    
                    
                    
                </form>
            </div>
            

            <div
                class="container"
            >
                <div
                    class="table-responsive rounded"
                >
                    <table
                        class="table table-primary "
                    >
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Course Image</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Action</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row=$result->fetch_assoc()){ ?>
                            <tr>
                                <td><?= $row['id']?></td>
                                <td><?= $row['course_name']?></td>
                                <td><?= $row['description']?></td>
                                <td><?= $row['duration']?></td>
                                <td><?= $row['image']?></td>
                                <td><?= $row['user_id']?></td>
                                <td><a
                                    name=""
                                    id=''
                                    class="btn btn-primary"
                                    href="edit.php?id=<?=$row['id']?>"
                                    role="button"
                                    >Edit</a
                                >
                                </td>
                                <td><a
                                    name=""
                                    id=''
                                    class="btn btn-danger"
                                    href="deletec:\xampp\htdocs\PHP\HW3\file.php.php?id=<?=$row['id']?>"
                                    role="button"
                                    >Delete</a
                                >
                                </td>
                            </tr>
                           <?php } ?>
                        </tbody>
                    </table>
                </div>
                
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
