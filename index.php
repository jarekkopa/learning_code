<?php

require 'classes/Database.php';

$database = new Database;

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
if($post['submit']){
    $nameSql = $post['imie'];
    $emailSql = $post['email'];
    $ageSql = $post['age'];

    $database->query('INSERT INTO test (imie, email, age) VALUES(:imie, :email, :age)');
    $database->bind(':imie', $nameSql);
    $database->bind(':email', $emailSql);
    $database->bind(':age', $ageSql);
    $database->execute();
}
$database->query('SELECT * FROM test');
$rows = $database->resultSet();
var_export($rows);
?>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <label>Add name</label></br>
    <input type="text" name="imie" placeholder="Add name"/></br>
    <label>Add email</label></br>
    <input type="text" name="email" placeholder="Add e-mail"/></br>
    <label>Add age</label></br>
    <input type="text" name="age" placeholder="Add age"/></br>
    <input type="submit" name="submit" value="Submit"/>
</form>

