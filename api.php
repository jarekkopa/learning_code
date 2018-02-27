<?php

declare(strict_types = 1);

require 'ConectDb.php';

$database = new ConectDb;
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
if($post['submit']){
    $nameSql = $post['name'];
    $categorySql = $post['category'];
    $priceSql = $post['price'];

    $database->query('INSERT INTO grocery (name, category, price) VALUES(:name, :category, :price)');
    $database->bind(':name', $nameSql);
    $database->bind(':category', $categorySql);
    $database->bind(':price', $priceSql);
    $database->execute();
}

$table = $database->query('SELECT * FROM grocery');
// $rows = $database->resultSet();
var_export($rows);
?>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <label>Dodaj nazwę towaru</label></br>
    <input type="text" name="name"/></br>
    <label>Wybierz rodzaj towaru - Warzywa, owoce, pieczywo, nabiał</label></br>
    <input type="text" name="category"/></br>
    <label>Podaj cenę towaru</label></br>
    <input type="text" name="price"/></br>
    <input type="submit" name="submit" value="Submit"/>
</form>
<?php 
echo '<table>';
foreach($table->fetchAll() as $value){
    echo '<tr>';
        echo '<td>' . $value['name'] . '<td>';
        echo '<td>' . $value['category'] . '<td>';
        echo '<td>' . $value['price'] . '<td>';
    echo '<tr>';
}
echo '</table>';