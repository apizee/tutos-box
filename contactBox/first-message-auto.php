<?php
    $boxDomain = "//cloud.apizee.com/";
    if(isset($_GET['domain'])){
        $boxDomain = "//".$_GET['domain']."/";
    }
    $firstMessage = 'Hello world !';
    if(!empty($_POST['firstMessage'])){
        $customJSONData=$_POST['firstMessage'];
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" >
        <link rel="stylesheet" href="../assets/css/doc.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <title>Apizee - Custom Visitor Data</title>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="https://doc.apizee.com/">
                    <img src="https://doc.apizee.com/wp-content/uploads/2018/03/apizee_help_center_60px.png" alt="Apizee" style="min-width:250px;height:38px;"/>
                </a>
            </div>
        </nav>
        <?php include '../menu.php'; ?>
        <div class="container">
            <h1>Custom Visitor Data - tutorial</h1>
            <?php include './../site-key-form.php'; ?>
            <?php
            if(!empty($_GET['siteKey'])){
            ?>
                <div class="card">
                    <div class="card-body">
                    You need to configure your site to open box automatically
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <form method="POST">
                            <div class="form-group">
                                <label for="customVisitorData">First message </label>
                                <textarea class="form-control" name="message" id="message" rows="3"><?= $firstMessage ?></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="submit" class="btn-success" value="Apply"/>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                        <form method="POST">
                            <div class="form-group">
                                <label for="customVisitorData">Example</label>
                                <pre><code>&lt;script type="text/javascript" src="https://cloud.apizee.com/contactBox/loaderIzeeChat.js"/&gt;</code><br /><code>&lt;script type="text/javascript"/&gt;</code><br/><code id="code"></code><br/><code>&lt;/script&gt;</code></pre>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                $(document).ready(function($){
                        const siteKey = "<?=$_GET['siteKey'] ?>";
                        const message = $('#message').val();
                        let textCode ='loaderIzeeChat("'+siteKey+'",{labels:{FirstMessageAuto:"'+message+'"}});';
                        $('#code').text(textCode);
                        loaderIzeeChat(siteKey,{labels:{FirstMessageAuto:message},serverDomainRoot:"<?=$boxDomain?>"});
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



