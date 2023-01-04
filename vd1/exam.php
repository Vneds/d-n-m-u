<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="card.css" />
  <script src="dataTest.js" async></script>
  <title>Final Exam</title>
  <style></style>
</head>

<body>
  <div id="board">
    <?php
    $host ="localhost";
    $username = "root";
    $password = "123456";

    $conn = new PDO("mysql:host=$host;dbname=fifa", $username, $password);

    
    $goldenBootRace = [
      "Kylian Mbappe_France_5_img/Kylian Mbappe.png",
      "Goncalo Ramos_Portugal_3_img/Goncalo Ramos.png",
      "Lionel Messi_Argentina_3_img/Lionel Messi.png",
      "Ritsu Doan_Japan_2_img/Ritsu Doan.png",
      "Cho Geu-sung_South Korea_2_img/Cho Geu-sung.png"
    ];

    $player = [];
    for ($i = 0; $i < count($goldenBootRace); $i++) {
      $player[$i] = explode("_", $goldenBootRace[$i]);

    }
    $sql = "INSERT INTO player (`name`, `country`, `goals`, `img`) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    try {
      $conn->beginTransaction();
      foreach ($player as $row) {
        $stmt->execute($row);
      }
      $conn->commit();
    } catch (Exception $e) {
      $conn->rollback();
      throw $e;
      }
  
    ?>
    <?php 
    $stmt = $conn->query("select * from player");
    $result = $stmt->fetchAll(PDO::FETCH_NUM);
    

    foreach ($result as $row) {
    ?>
    <div class="card">
      <img id="imgCard" src="<?php echo $row[4]?>" alt="" />
      <h1><?php echo $row[1]?></h1>
      <p class="title"><?php echo $row[2]?></p>
      <p><?php echo $row[3]?> Goals</p>
      <div style="margin: 24px 0">
        <a href="#"><i class="fa fa-dribbble"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-facebook"></i></a>
      </div>
      <p><button>Vote</button></p>
    </div>
    <?php }?>
  </div>
</body>

</html>