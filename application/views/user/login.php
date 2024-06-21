<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta property="og:title" content="Segera Pesan Sebelum Kehabisan" />
    <meta property="og:description" content="Masak Apa Hari ini?" />
    <meta property="og:image"
        content="https://cdn.glitch.global/71e49bf7-c262-4705-b19f-2aeb98561be6/diary.jpg?v=1697470658204" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <title>E - Surya</title>

</head>

<body>
    <div class="container h-100">
        <!-- jumbotron -->
        <div class="p-5 mb-4 bg-light rounded-3 ">
            <div class="container-fluid py-7 col-md-6 mx-auto">
                <form method="post" action="<?php echo site_url('user/dashboard/'); ?>">
                    <div class="form-group mb-3">
                        <label class="display-6 fw-bold mb-3" for="ID">Login</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                    </div>
                    <button class="btn btn-primary btn-lg" type="submit" name="login"
                        class="btn btn-default">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>