<?php
session_start();

require_once "include/db.php"; 


$thisfile = basename($_SERVER["SCRIPT_FILENAME"]) ;

$table ="tb_";
$db = new Database();

if (isset($_POST['submit'])){
    if ($_POST['submit']=='Toevoegen') { // create    
        $dataSet=array(
            ":naam"         =>$_POST["naam"],
            ":achternaam"   =>$_POST["aNaam"],
        );
        $sql="INSERT INTO $table (naam, anaam) VALUES (:naam,:achternaam)";
        $result=$db->getData($sql, $dataSet);

        $_SESSION["added"] = "1";

        header('Location: create.php');
        exit;
    }
};

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update</title>
</head>
<body>
    <form action="<?php $thisFile ?>" method="post">
        <label for='input1'>Naam</label>
        <br />
        <input type="text" name="input1" id="input1">
        <br />
        <label for='input2'>Achternaam</label>
        <br />
        <input type="text" name="input2" id="input2">
        <br />
        <input type='submit' name='submit' value='Toevoegen'/>
    </form>
</body>
</html>
