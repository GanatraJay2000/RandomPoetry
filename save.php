<?php
require('conndb.php');
$poem = json_decode($_POST['poem']);
$title = str_replace("'", "/", $poem->title);
$author = $poem->author;
$lines = base64_encode("<ul><li>" . implode("</li><li>", $poem->lines) . "</li></ul>");
$linecount = $poem->linecount;

$select = $conn->query("SELECT title from poems");
if($select->num_rows > 0){
    while($row = $select->fetch_assoc()){
    
        if($title === $row["title"]){    
            header('Location: collection.php');
            exit();
        }
        }
    }
    $insert = "INSERT INTO poems(title, author, poem_lines, line_count) VALUES ('{$title}', '{$author}', '{$lines}', '{$linecount}');";
            $inserting = $conn->query($insert);
            if(!$inserting) {
                echo "Something went WRONG!!!<br />";
                print_r($conn->error);
            }else{
                header('Location: collection.php');
            }
?>