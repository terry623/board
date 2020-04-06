<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>留言板</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body {
            margin: 0px;
        }

        .title {
            text-align: center;
            background: gray;
            color: white;
            width: 100%;
            padding: 12px;
        }

        .message {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }

        .message-input {
            width: 90%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">留言板</div>
        <div class="message">
            <input type="text" class="form-control message-input" placeholder="想留言的內容">
            <button type="button" id="sendButton" class="btn btn-info" onclick="window.location.href='<?= base_url('Main/addMessage'); ?>'">送出</button>
        </div>
        <hr />
        <?php foreach ($messages as $messages_item) : ?>
            <div>id: <?php echo $messages_item['id'] ?></div>
            <div>content: <?php echo $messages_item['content'] ?></div>
            <br/>
        <?php endforeach ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>