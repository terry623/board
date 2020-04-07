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

        .message-card {
            margin: 20px 0;
        }

        .message-card-body {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .iconButton {
            height: 100%;
            cursor: pointer;
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">留言板</div>
        <form class="message" action="<?= base_url('Main/addMessage'); ?>" method="post" accept-charset="utf-8">
            <input type="text" name="content" class="form-control message-input" placeholder="想留的內容">
            <button type="submit" class="btn btn-info">送出</button>
        </form>
        <hr />
        <?php if (empty($messages)) : ?>
            <div style="text-align: center;">沒有任何留言</div>
        <?php else : ?>
            <?php if (!empty($messages)) foreach (array_reverse($messages) as $item) : ?>
                <div class="card message-card">
                    <div class="card-body message-card-body">
                        <span><?php echo $item['content'] ?></span>
                        <div>
                            <img class="iconButton" src="<?= base_url('images/reply.png'); ?>" data-toggle="modal" data-target="#replyMsgModal" onclick="setCurrentModalId(<?= $item['id'] ?>)">
                            <img class="iconButton" src="<?= base_url('images/cancel.png'); ?>" onclick="deleteMsg(<?= $item['id'] ?>)">
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif; ?>

        <div class="modal fade" id="replyMsgModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="border-bottom: 0px;">
                        <h5 class="modal-title" id="replyModalLabel">回覆內容</h5>
                    </div>
                    <form id="replyForm" action="<?= base_url('Main/addReply'); ?>" method="post" accept-charset="utf-8" onsubmit="return replyMsg();">
                        <div class="modal-body">
                            <input id="curId" name="curId" style="opacity:0" />
                            <textarea class="form-control" type="text" name="content" style="height: 200px;"></textarea>
                        </div>
                        <div class="modal-footer" style="border-top: 0px;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                            <button type="submit" class="btn btn-info">送出</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentModalId = -1;

        function setCurrentModalId(id) {
            currentModalId = id;
        }

        function replyMsg() {
            const curId = document.getElementById('curId');
            curId.value = currentModalId;
        }

        function deleteMsg(id) {
            window.location = "<?= base_url('Main/removeMessage'); ?>/" + id;
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>