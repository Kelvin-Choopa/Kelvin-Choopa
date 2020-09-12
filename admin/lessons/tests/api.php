<?php
//session_start();

require_once __DIR__ . '../../../../db/connection.php';

$conn = DBCoonect();

if (isset($_POST['create-one-word-question'])) {
    createOneWordQuestion($conn);
} elseif (isset($_POST['create-true-false-question'])) {
    createTrueFalseQuestion($conn);
} elseif (isset($_POST['createQuestion'])) {
    createQuestion($conn);
} elseif (isset($_POST['createAnswer'])) {
    # code...

    createAnswer($conn);
} elseif (isset($_POST['edit-question'])) {
    # code...
    editQuestion($conn);
}

//FUNCTIONS

function createQuestion($conn)
{
    $type = $_POST['type'];
    $text = $_POST['text'];
    $level = $_POST['level'];

    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $answer = $_POST['answer'];
    $created_by = $_SESSION['user']['name'];

    $sql = "INSERT INTO `questions` (`id`, `type`, `text`, `answer`, `created_by`, `created_at`, `updated_at`,`a`,`b`,`c`,`d`,`level`) 
VALUES (NULL, '$type', '$text', '$answer', '$created_by', current_timestamp(), NULL,'$a','$b','$c','$d','$level');";

    mysqli_query($conn, $sql) or
        header('Location: create.php?msg=' . mysqli_error($conn));

    echo "<script> location.href='create.php?msg=Done'; </script>";
    exit();
}

function createTrueFalseQuestion($conn)
{
    $type = $_POST['type'];
    $text = $_POST['text'];
    $level = $_POST['level'];

    $a = 'null';
    $b = 'null';
    $c = 'null';
    $d = 'null';
    $answer = $_POST['answer'];
    $created_by = $_SESSION['user']['name'];

    $sql = "INSERT INTO `questions` (`id`, `type`, `text`, `answer`, `created_by`, `created_at`, `updated_at`,`a`,`b`,`c`,`d`,`level`) 
VALUES (NULL, '$type', '$text', '$answer', '$created_by', current_timestamp(), NULL,'$a','$b','$c','$d','$level');";

    mysqli_query($conn, $sql) or
        header('Location: create.php?msg=' . mysqli_error($conn));

    echo "<script> location.href='create.php?msg=Done'; </script>";
    exit();
}

function createOneWordQuestion($conn)
{
    $type = 'one-word';
    $text = $_POST['text'];
    $a = null;
    $b = null;
    $c = null;
    $d = null;
    $level = $_POST['level'];

    $answer = $_POST['answer'];
    $created_by = $_SESSION['user']['name'];

    $sql = "INSERT INTO `questions` (`id`, `type`, `text`, `answer`, `created_by`, `created_at`, `updated_at`,`a`,`b`,`c`,`d`,`level`) 
VALUES (NULL, '$type', '$text', '$answer', '$created_by', current_timestamp(), NULL,'$a','$b','$c','$d','$level');";

    mysqli_query($conn, $sql) or
        header('Location: create.php?msg=' . mysqli_error($conn));

    echo "<script> location.href='create.php?msg=Done&type=$type'; </script>";
    exit();
}

function editQuestion($conn)
{
    $text = $_POST['text'];
    $id = $_POST['id'];
    $a = isset($_POST['a']) ? $_POST['a'] : null;
    $b = isset($_POST['b']) ? $_POST['b'] : null;
    $c = isset($_POST['c']) ? $_POST['c'] : null;
    $d = isset($_POST['d']) ? $_POST['d'] : null;

    $level = $_POST['level'];

    $answer = $_POST['answer'];
    $created_by = $_SESSION['user']['name'];

    $sql = "UPDATE  `questions` SET  `text` = '$text', `answer` ='$answer', `created_by` = '$created_by',
         `a` ='$a', `b` = '$b',`c` = '$c',`d`='$d', `level` = '$level' WHERE `id` = '$id' ";

    mysqli_query($conn, $sql) or
        header("Location: edit_test.php?id=$id&msg=" . mysqli_error($conn));

    echo "<script> location.href='edit_test.php?msg=Done&type=$type&id=$id'; </script>";
    exit();
}

function getAnswers()
{
    $conn = DBCoonect();

    $sql = 'SELECT * FROM answers  ';

    $results = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($results)) {
        # code...
        $ans = $row['text'];
        $id = $row['id'];

        echo "
  <option value='$id' > $ans </option>
           
           ";
    }
}

function getQuestion($id)
{
    $conn = DBCoonect();

    $sql = "SELECT * FROM questions WHERE `id` = '$id'";

    $results = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($results);
}
