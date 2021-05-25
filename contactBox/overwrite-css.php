<?php
    $boxDomain = "//cloud.apizee.com/";
    if(isset($_GET['domain'])){
        $boxDomain = "//".$_GET['domain']."/";
    }
    $customCSS = "#comBoxAll .comBoxBanner{ background: blue !important;}\n#comBoxAll .comBox{ border-color: blue !important;}\n#comBoxAll .comBox .comBoxHeader{ background: blue; !important;}\n#comBoxAll .comBox .comBoxHeaderClose{ background:blue; !important;}\n#comBoxAll .comBox .comBoxSendMessage { background-color:blue !important;}\n";
    $color=(!empty($_POST['color']))?$_POST['color']:"#333333";
    $customCSS = str_replace('blue',$color,$customCSS);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" >
        <link rel="stylesheet" href="../assets/css/doc.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <title>Apizee - Overwrite CSS</title>
        <style>
        <?= $customCSS; ?>
        </style>
    </head>
    <body>
    <?php include './../include/menu.php'; ?>
        <div class="container">
            <h1>Overwrite CSS - tutorial</h1>
            <?php include './../include/site-key-form.php'; ?>
            <?php
            if(!empty($_GET['siteKey'])){
            ?>
                <div class="card">
                    <div class="card-body">
                        Minimal CSS class to overwrite for box customisation
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form method="POST">
                        <div class="form-group">
                            <label for="color">Background Color Code</label>
                            <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Color key" aria-label="Color key"  id="color" name="color" value="<?=$color ?>">
                                    <div class="input-group-append">
                                        <input class="btn btn-outline-success" type="submit" value='Apply'>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <form method="POST">
                            <div class="form-group">
                                <label for="customVisitorData">Example</label>
                                <pre><code>&lt;style&gt;</code><br /><code id="code"><?=$customCSS ?></code><code>&lt;/style&gt;</code></pre>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                $(document).ready(function($){
                        loaderIzeeChat("<?= $_GET['siteKey'] ?>",{serverDomainRoot:"<?=$boxDomain?>"});
                    });
                </script>
            <?php
                }
            ?>
        </div>
    <script type="text/javascript" src="https://cloud.apizee.com/contactBox/loaderIzeeChat.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>