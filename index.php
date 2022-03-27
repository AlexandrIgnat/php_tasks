<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
include_once (ROOT."/connectData.php");
if (isset($_GET['page'])) {
    $start = $_GET['page'] * 5;
    $page = $_GET['page'];
} else {
    $start = 0;
    $page = 0;
}

$author = $_REQUEST['login'] ?? false;
$end = $start + 5; 

$sql = "SELECT * FROM comments";
$statement = $pdo->prepare($sql);
$statement->execute();
$allProduct = $statement->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM comments WHERE `id` > $start AND  `id` <= $end";
$statement = $pdo->prepare($sql);
$statement->execute();
$table = $statement->fetchAll(PDO::FETCH_ASSOC);

$allPages = ceil(count($allProduct) / 5);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task One</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script defer src="libs/inputmask.min.js"></script>
    <script defer src="libs/just-validate3.3.3.min.js"></script>
    <script defer src="js/script-new.js"></script>
</head>
<body>
<div class="container">
  <div class="row justify-content-md-center">
  <div class="col-md-4">
  <img width="300px" src="/21.jpg" alt="Небо">
  </div>
    <details class="container" style="width: 100%; transition: all .3s ease">
    <summary>Оставить отзыв</summary>
        <form action="/handler.php" id="form" class="container" method="post">
        <div class="col-sm-3">
            <div class="col-sm">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control input-name" data-validate-field="name">
            </div>
            <div class="col-sm">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control input-mail" data-validate-field="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="col-sm">
                <label for="exampleInputEmail1" class="form-label">Comment</label>
                <input type="text" name="text" class="form-control input-text">
                </div>
            <div class="col-sm">
                <label for="exampleInputEmail1" class="form-label select">Оценка</label>
                <select name="mark" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
            <button type="submit" class="btn btn-primary sub">Submit</button>
        </form>
    </details> 
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Время коммента</th>
                <th scope="col">Оценка</th>
                <th scope="col">Текст</th>
            </tr>
        </thead>
        <tbody>
        <?foreach ($table as $array => $valueArr) {?>
            <tr>
                <th scope="row"><?php  echo $valueArr['name']?></th>
                <td><?php echo $valueArr['time']?></td>       
                <td><?php echo $valueArr['mark']?></td>
                <td><?php echo $valueArr['text']?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
    <div class="col col-lg-2">
    <?php for ($i = 0; $i < $allPages; $i++) {?>
    <a href="/?page=<?php echo $i?>" class="btn btn-primary" role="button">
        <?php if ($i == $page) {
            echo "Активная";       
        } else {?>
       <?php echo  $i + 1;}?>
    </a>
    <?}?>
    </div>
  </div>
</div>
</body>
</html>
