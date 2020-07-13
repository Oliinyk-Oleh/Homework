<?
require_once '../mysqlconnect.php';

$query = $pdo->query('SELECT * FROM `users`');
if(!$query->fetch(PDO::FETCH_OBJ)) {
echo "none";
exit;
}

while($row=$query->fetch(PDO::FETCH_OBJ)) {
echo  '<li id="'.$row->id.'" class="list-group-item list-group-item-primary mb-3 ">'. '<b>Имя: </b>'. $row->name .', '.'<b>логин: </b>'.$row->login .' '.'<button class="btn btn-danger ml-2"  onclick="deleteUser('. $row->id .')">Удалить</button></li>';
}
?>
