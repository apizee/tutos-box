<?php
    $boxDomain = "//cloud.apizee.com/";
    if(isset($_GET['domain'])){
        $boxDomain = "//".$_GET['domain']."/";
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
        <title>Apizee - Overwrite CSS</title>
        <style>
        #comBoxAll{display:none;}
        </style>
    </head>
    <body>
        <?php include '../menu.php'; ?>
        <div class="container">
            <h1>Click to Call - tutorial</h1>
            <?php include './../site-key-form.php'; ?>
            <?php
            if(!empty($_GET['siteKey'])){
            ?>
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form method="POST">
                        <div class="form-group">
                            <button class="btn btn-call" id="call-button" disabled="disabled">CALL </button>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <form method="POST">
                            <div class="form-group">
                                <label for="customVisitorData">Example</label>
                                <pre><code>&lt;style&gt;</code><br /><code>#comBoxAll{display:none}</code><br /><code>&lt;/style&gt;</code><br /><code>&lt;script&gt;</code><code>const buttonId= 'call-button';\n const clickButton = document.getElementById(buttonId);
//callback from box
const applicationCallback = function(contactBox, type, params) {
    switch (type) {
        case 'init':
            console.info('[ComBox] init', params);
        break;
        case 'newAgentSelected':
            clickButton.removeAttribute('disabled');
        break;
        case 'noAgentAvailable':
            clickButton.setAttribute('disabled',false);
        break;
    }
};

// box loader params
    const customParam = {
        applicationCallback:applicationCallback
};

//video call function
    const call = () =>{
    let contactBox = Apizee.getContactBox();
    let box = Apizee.getComBox();
    if(box && contactBox){
        document.getElementById('comBoxAll').style.display='block';
        box.callVideo(contactBox.publishedAgentId);
    }
}

// close/ hide box
const closeBox = ()=>{
    let contactBox = Apizee.getContactBox();
    let box = Apizee.getComBox();
    if(box && contactBox){
        document.getElementById('comBoxAll').style.display='none';
        box.close(contactBox.publishedAgentId);
}
};

//link call button to call function
clickButton.onclick = call;

// load box
loaderIzeeChat("<?= $_GET['siteKey'] ?>",customParam);</code><br/><code>&lt;script&gt;</code></pre>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                $(document).ready(function($){
                        const buttonId= 'call-button';
                        const clickButton = document.getElementById(buttonId);

                        //callback from box
                        const applicationCallback = function(contactBox, type, params) {
                            switch (type) {
                                case 'init':
                                    console.info('[ComBox] init', params);

                                    break;
                                case 'newAgentSelected':
                                    clickButton.removeAttribute('disabled');
                                    break;
                                case 'noAgentAvailable':
                                    clickButton.setAttribute('disabled',false);
                                    break;
                            }
                        };

                        // box loader params
                        const customParam = {
                        applicationCallback:applicationCallback
                        };

                        //video call function
                        const call = () =>{
                            let contactBox = Apizee.getContactBox();
                            let box = Apizee.getComBox();

                            if(box && contactBox){
                                document.getElementById('comBoxAll').style.display='block';
                                box.callVideo(contactBox.publishedAgentId);
                            }
                        }

                        // close/ hide box
                        const closeBox = ()=>{
                            let contactBox = Apizee.getContactBox();
                            let box = Apizee.getComBox();
                            if(box && contactBox){
                                document.getElementById('comBoxAll').style.display='none';
                                box.close(contactBox.publishedAgentId);
                            }
                        };

                        //link call button to call function
                        clickButton.onclick = call;
                        customParam.serverDomainRoot = "<?=$boxDomain?>";
                        // load box
                        loaderIzeeChat("<?= $_GET['siteKey'] ?>",customParam);
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