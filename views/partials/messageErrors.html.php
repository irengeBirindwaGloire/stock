<?php if (isset($_SESSION['messageList'])) { ?>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-info"></i> Message</h5>
        <?php foreach ($_SESSION['messageList'] as $key => $value) { ?>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <?= $value ?>
                <li>
            </ul>
        <?php unset($_SESSION['messageList']);
        } ?>
    </div>
<?php } elseif (isset($_SESSION['message'])) { ?>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-info"></i> Message</h5>
        <?= $_SESSION['message']; ?>
    </div>
<?php unset($_SESSION['message']);
} ?>