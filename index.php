<head>
    <style>
        /* Style the header */
        header {
            background-color: #666;
            padding: 30px;
            text-align: center;
            font-size: 35px;
            color: white;
        }
        /* Style the footer */
        footer {
            background-color: #777;
            padding: 10px;
            text-align: center;
            color: white;
        }
    </style>
</head>
<body>
<header>
    <h2>Friends book</h2>
</header>

<form action="index.php" method="post">
    Name: <input type="text" name="name">
    <input type="submit" value = "Add new friend">
</form>
<h2>My best friends:</h2>
<?php
$filename = 'friends.txt';
$nameFilter = NULL;
$name=NULL;
$file = fopen("friends.txt","r");
$names  = array();
while(!feof($file))	{
    array_push($names,fgets($file));
}

fclose($file);

if(isset($_POST['name']) && !empty($_POST['name'])){
    $file = fopen("$filename", "a+");
    $name = $_POST['name'];
    array_push($names,$name);
    fwrite($file,  PHP_EOL."$name" );
    fclose($file);
    foreach ($names as $name) {
        echo "<li>".$name."</li>";
    }
}

if (isset($_POST['nameFilter']) && !empty($_POST['nameFilter'])) {
    $nameFilter = $_POST['nameFilter'];
    foreach ($names as $name) {
        if(strlen(strstr($name, $nameFilter)) > 0){
            echo "<li>".$name."</li>";
        }
    }}
else if (empty($_POST['name']) && empty($_POST['nameFilter']))
{
    foreach ($names as $name) {
        echo "<li>".$name."</li>";
    }
}
?>
<form action="index.php" method="post">
    <input type="text" name="nameFilter" value="<?=$nameFilter?>">
    <input type="submit" value='Filter list'>
</form>
<footer>
    <p>Footer</p>
</footer>
</body>
</html>