<?php
    $boxDomain = "//cloud.apizee.com/";
    if(isset($_GET['domain'])){
        $boxDomain = "//".$_GET['domain']."/";
    }
    $customJSONData = '{"pageLocation":"https://apizee.com/","title":"Custom Visitor Data - tutorial"}';
    if(!empty($_POST['customVisitorData'])){
        $customJSONData=$_POST['customVisitorData'];
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta name="robots" content="noindex, nofollow">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" >
        <link rel="stylesheet" href="../assets/css/doc.css" >
        <title>Apizee - Custom Visitor Data</title>
    </head>
    <body>
        <?php include './../include/menu.php'; ?>
        <div class="container">
            <h1>Custom Visitor Data - tutorial</h1>
            <?php include './../include/site-key-form.php'; ?>
            <?php
            if(!empty($_GET['siteKey'])){
            ?>
                <div class="card">
                    <div class="card-body">
                        Add your custom visitor data object to your contactbox loader
                    </div>
                </div>
                <div class="row sample">
                    <div class="col">
                        <form method="POST">
                            <div class="form-group">
                                <label for="customVisitorData">JSON</label>
                                <textarea class="form-control" name="customVisitorData" id="customVisitorData" rows="10"><?= $customJSONData ?></textarea>
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
                        const visitorData = $('#customVisitorData').val();
                        let textCode ='const customVisitorData = '+visitorData+'\n';
                        textCode+='loaderIzeeChat("'+siteKey+'",{customVisitorData:customVisitorData});';
                        $('#code').text(textCode);

                        loaderIzeeChat(siteKey,{customVisitorData:JSON.parse(visitorData),serverDomainRoot:"<?=$boxDomain?>"});
                    });
                </script>
            <?php
                }
            ?>
        </div>
        <script type="text/javascript" src="https://cloud.apizee.com/contactBox/loaderIzeeChat.js"></script>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    </body>
</html>