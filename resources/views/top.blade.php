<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Image Centering</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: black;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        img {
            max-width: 25%;    /* adjust as needed */
            max-height: 25%;   /* adjust as needed */
        }
    </style>
</head>
<body>
    <h1 class="text-center">
        <a class="text-dark main-font-family" href="/">
            <img src="{{ asset('images/top_image02.jpg') }}" alt="Centered Image">
            <br>BASSER
        </a>
    </h1>
</body>
</html>
