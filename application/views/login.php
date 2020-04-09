<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>登入</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body {
            margin: 0px;
        }

        .container {
            width: 400px;
            margin-top: 200px;
        }

        .submitButton {
            display: block;
            margin-left: auto;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="<?= base_url('Login/submit'); ?>" method="post" accept-charset="utf-8">
            <div class="form-group">
                <label>帳號</label>
                <input type="text" class="form-control" name="account">
            </div>
            <div class="form-group">
                <label>密碼</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div style="color: red;">
                <?php
                if (!empty($msg))
                    echo $msg;
                ?>
            </div>
            <button type="submit" class="btn btn-info submitButton">送出</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>