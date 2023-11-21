<?php
$host = 'sql112.infinityfree.com';
$username = 'if0_35467943';
$password = '4gSZICaQ8dfu';
$dbname = 'if0_35467943_world';


$country = $_GET['country'];
$city = isset($_GET['lookup']) ? isset($_GET['lookup']): "";

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);



if(isset($_GET['lookup']))
{

  $stmt = $conn->query("SELECT * FROM countries as c join cities as cs on c.code = cs.country_code WHERE c.name LIKE '%$country%';");

}
else{

  $stmt = $conn->query("SELECT * FROM countries as c WHERE name LIKE '%$country%';");

}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);




?>


<?php if ((isset($_GET['lookup']))): ?>
  
  <table>
  <thead>
    <th>Name</th>
    <th>District</th>
    <th>Population</th>
  </thead>
  <tbody>
    <?php foreach ($results as $result): ?>
    <tr>
      <td><?= $result['name']; ?></td>
      <td><?= $result['district']; ?></td>
      <td><?= $result['population']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


<?php else: ?>

  
  <table>
  <thead>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence</th>
    <th>Head of state</th>
  </thead>
  <tbody>
    <?php foreach ($results as $result): ?>
    <tr>
      <td><?= $result['name']; ?></td>
      <td><?= $result['continent']; ?></td>
      <td><?= $result['independence_year']; ?></td>
      <td><?= $result['head_of_state']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>




