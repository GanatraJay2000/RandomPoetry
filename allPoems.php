<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Poetry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
    body * {
        font-family: 'Poppins', sans-serif;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Random Poetry</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="allPoems.php">All Poems</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="collection.php">Saved Collection</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="d-flex d-md-none align-items-center justify-content-evenly px-4 py-3 border shadow">
        <a class="nav-item nav-link text-dark" href="#authorsList">Authors</a>
        <a class="nav-item nav-link text-dark" href="#titlesList">Titles</a>
        <a class="nav-item nav-link text-dark" href="#poemContainer">Poem</a>
    </div>

    <div class="mx-3 my-5 rounded d-flex p-0 flex-wrap flex-column-reverse flex-md-row">
        <div class="col-md-3 pt-3 px-3">
            <h4>Authors</h4>
            <div class="list-group" id="authorsList">
            </div>
        </div>
        <div class="col-md-4 pt-3 px-3">
            <h4>Titles</h4>
            <div class="list-group" id="titlesList"></div>
        </div>
        <div class="col-md-5 pt-3 px-3">
            <div id="poemContainer"></div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./allPoems.js"></script>
</body>

</html>