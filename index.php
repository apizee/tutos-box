<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="./assets/css/doc.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Apizee - Box tutorials</title>
  </head>
  <body>
  <?php include './menu.php'; ?>

  <div class="container">
        <h1>Box - tutorials</h1>
        <h2>Contact Box</h2>
        <?php include './site-key-form.php'; ?>
        <?php
        if(!empty($_GET['siteKey'])){
        ?>
        <div class="list-group">
            <a href="./contactBox/custom-visitor-data.php?siteKey=<?=$_GET['siteKey']?>" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Custom Visitor Data</h5>
                    <small>21/05/2021</small>
                </div>
                <p class="mb-1">See custom informations on agent side.</p>
                <small>Donec id elit non mi porta.</small>
            </a>
            <a href="./contactBox/overwrite-css.php?siteKey=<?=$_GET['siteKey']?>" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Overwrite CSS</h5>
                    <small>21/05/2021</small>
                </div>
                <p class="mb-1">Customize background chatbox color.</p>
                <small>Donec id elit non mi porta.</small>
            </a>
        </div>
        <?php
            }
        ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="https://cloud.apizee.com/contactBox/loaderIzeeChat.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./assets/js/bootstrap.min.js"></script>
  </body>
</html>