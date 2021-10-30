<?php
if ('post' === strtolower($_SERVER['REQUEST_METHOD']) && isset($_POST)) {
    try {
        if(!include(INSTALLATION_PATH . '/install.php')) {
            die('Error: could not include "install.php".');
        }
    }
    catch(Exception $ex) {
        die('Error: could not include "install.php": ' . $ex->getMessage());
    }
    // output message
    ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success">
                        <p>Fritzed has been setup! <a href="/">Start hacking now</a> :-)</p>
                    </div>
                </div>
            </div>
        </div>

    <?php

    return;
}

// check php version
if (version_compare(phpversion(), '5.6.0', '<')) {
    $requirementsErrors[] = 'Please make sure you use PHP 5.6 or higher. PHP 7 or higher is recommended.';
}

?>
<div class="row">
    <div class="col-lg-12">
    <?php
    if(!$installation) {
        ?>
            <h1>Fritzed Reset</h1>
            <div class="alert alert-danger">
                <p>Your Fritzed seems to be properly installed already. Only proceed if you want to reset Fritzed's database.</p>
            </div>
        <?php
    }
    else {
        ?>
            <h1>Fritzed Setup</h1>
            <div class="alert alert-info">
                <p>This looks like the first time you've run Fritzed. Click the button below to initialize the database.</p>
            </div>
        <?php
    }
    ?>
        <?php
        if(0 === count($requirementsErrors)) {
            ?>
            <form method="post" action="?page=installation" class="<?php echo ($installation ? '' : ' fritzed-reset') ?>">
                <div><input type="submit" class="btn btn-success" value="<?php echo ($installation ? 'Setup' : 'Reset') ?> Fritzed!"/></div>
            </form>
            <?php
        }
        else {
            echo ' <div class="alert alert-danger"><p style="margin-bottom:10px;"><span class="glyphicon glyphicon-warning-sign"></span> <strong>I\'m sorry, not all requirements have been met. Please fix the following <span class="badge">' . count($requirementsErrors) . '</span> issues:</strong></p>';
            echo '<ul class="list-group">';
            foreach ($requirementsErrors as $error) {
                echo '<li class="list-group-item">' . $error . '</li>';
            }
            echo '</ul></div>';
        }
        ?>
    </div>
</div>