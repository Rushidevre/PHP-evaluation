<?php
include 'db.php';
if (isset($_GET['course_name'])) {
    $course_name=$_GET['course_name'];
    $sql=$conn->prepare('select * from courses where course_name=?');
    $sql->bind_param('s',$course_name);
    $sql->execute();
    $user=$sql->get_result()->fetch_assoc();
}
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $course_name=$_POST['course_name'];
    $description=$_POST['description'];
    $duration=$_POST['duration'];
    $image=$_POST['image'];
    $user_id=$_POST['user_id'];
    $sql=$conn->prepare('update courses set course_name=?,description=?,duration=?,image=?,user_id=? where course_name=?');
    $sql->bind_param('ssisi',$course_name,$description,$duration,$image,$user_id,$course_name);
    if ($sql->execute()) {
        header('location:home.php');
    }
}

?>
<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Edit</title>
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
            <h2 class="text-center my-5">You want to Edit?</h2>
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
                            value="<?=$user['course_name']?>"
                        />
                       
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                         <input
                            type="text"
                            class="form-control"
                            name="description"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                            value="<?=$user['description']?>"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Duration</label>
                        <input class="form-control" name="duration" id="duration" value="<?=$user['duration']?>" >
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Course Image</label>
                        <textarea class="form-control" name="image" id="image" ></textarea>
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Submit
                    </button>
                    
                    
                    
                    
                    
                </form>
            </div>
            
        </main>
        <footer>
            
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
