<!doctype html>
<html lang="en">

<head>
    <title>upload multiple files</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container">
            <div class="row py-3">
                <div class="col-6 mx-auto">
                    <h1>Add Multiple files</h1>
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="fileInput" class="form-label">Choose file</label>
                            <input type="file" class="form-control" name="image[]" multiple id="fileInput">
                            <div class="d-grid gap-2 mt-3">
                                <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- View Database Images -->
                    <?php 
                    require_once('config.php');

                    $sql = "SELECT `id`, `image` FROM `users`";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        ?>
                    <div class="main d-flex flex-direction-row flex-wrap gap-4">
                        <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                        <div data-bs-toggle="modal" data-bs-target="#modal<?php echo $row['id']; ?>">
                            <img src="uploads/<?php echo $row['image']; ?>" class="img-fluid rounded" width="250"
                                height="250" alt="">
                        </div>
                        <!-- Modal -->
                        <div class="modal fade " id="modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog"
                            aria-labelledby="modalTitleId" aria-hidden="true" >
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <img src="uploads/<?php echo $row['image']?>" class="img-fluid rounded mb-3"
                                                alt="">

                                            <hr>
                                            <div class="text-end">
                                                <a href="delete.php?id=<?php echo $row['id']; ?>"
                                                    class="btn btn-danger">Delete</a>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal end -->
                        <?php
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>