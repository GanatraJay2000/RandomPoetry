<?php
require('conndb.php');
$data = [];
$select = $conn->query("SELECT title, author, poem_lines, line_count from poems");
if ($select->num_rows > 0) {
    while ($row = $select->fetch_assoc()) {
        $data[] = $row;
    }
}

foreach ($data as $key => $poem) {
    $data[$key]["title"] = str_replace("/", "'", $data[$key]["title"]);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Poetry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body * {
            font-family: 'Poppins', sans-serif;
        }

        li:not(.nav-item) {
            list-style: none;
            line-height: 2em;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Random Poetry</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="allPoems.html">All Poems</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="collection.php">Saved Collection</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row">
            <div class="list-group col-md-3 mx-2 px-0" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <h4>Titles</h4>
                <?php foreach ($data as $key => $poem) {
                    $class = "list-group-item list-group-item-action  shadow-sm";
                    if ($key === 0) {
                        $class .= "  active";
                    } ?>
                    <button class="<?php echo $class; ?>" id="<?php echo "v-pills-" . $key . "-tab"; ?>" data-bs-toggle="pill" data-bs-target="<?php echo "#v-pills-" . $key; ?>" type="button" role="tab" aria-controls="<?php echo "v-pills-" . $key; ?>" aria-selected="true">
                        <?php echo $poem['title']; ?>
                    </button>
                <?php } ?>
            </div>
            <div class="mx-2 col-md-7">
                <h4>Poem</h4>
                <div class="tab-content card px-2 py-4 shadow-sm " id="v-pills-tabContent">
                    <?php foreach ($data as $index => $poem) {
                        $class = "tab-pane fade show";
                        if ($index === 0) {
                            $class .= "  active";
                        } ?>
                        <div class="<?php echo $class ?>" id="<?php echo "v-pills-" . $index; ?>" role="tabpanel" aria-labelledby="<?php echo "v-pills-" . $index . "-tab"; ?>">
                            <div class="mx-4 mb-4 text-secondary fw-light">
                                -Author: <?php echo $poem['author'] ?>
                            </div>
                            <?php echo str_replace("<li></li>", "<br />", base64_decode($poem['poem_lines'])) ?>
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="./collection.js"></script> -->
    <!-- <script>
    const titleClicked = (e) => {
        console.log(e.dataset.value);
        // window.scrollTo(0, 0);
        // var oldActive = document.querySelector("#titlesList .active");
        // oldActive.classList.remove("active");
        // var newActive = document.getElementById("title_" + index);
        // newActive.classList.add("active");

        // var poemContainer = document.getElementById("poemContainer");
        // poemContainer.innerHTML = "";
    }
    </script> -->
</body>

</html>