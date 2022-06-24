<?php
include_once 'sms-api.php';
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SEND BULK SMS API!</title>
</head>
<body>
<div class="mx-auto" style="width: 200px; margin-top: 50px;">
    <div class="alert alert-primary" role="alert">

    </div>
    <?php
    if (isset($_POST['btn_send'])) {
        $recipient = $_POST['recipient'];
        $sms = new SMS($recipient);

        if (!$sms->validateForm()) {
            $sms->createFormErrorSessions("All fields are required");
            header("Refresh:0");
            die();
        }

        $msg =$sms->sendMessage($recipient);
        if ($msg) {
            echo "Message was sent successfully";
        } else {
            echo "An error occurred!";
        }
    }
?>
<form method="post" name="input_number" id="input_number" onsubmit="return validateForm()" action="<?=$_SERVER['PHP_SELF']?>">
    <div class="form-group">
        <label for="recipient">Phone Number</label>
        <input type="text" class="form-control" id="recipient" name="recipient" placeholder="Input phone number">
    </div>
    <button type="submit" name="btn_send" class="btn btn-primary">Send Message</button>
</form>
<br>
    <div class="alert alert-primary" role="alert">

    </div>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
