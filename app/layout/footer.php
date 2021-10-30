<?php
define('FOOTER_TEMPLATE', 1);
?>
</div>

<?php if($config['site']['show_footer_info']) { ?>
    <hr/>
    <div class="container">
        <footer class="text-center">
            <div class="btn-group large">
                <a href="?page=installation" class="btn btn-default" data-toggle="tooltip" title="Reset Database"><i class="fa fa-bomb" aria-hidden="true"></i></a>
                <a href="https://choosealicense.com/licenses/mit/" target="_blank" class="btn btn-default" data-toggle="tooltip" title="Fritzed is licensed under the MIT License"><i class="fa fa-gavel" aria-hidden="true"></i></a>
                <a href="https://github.com/signifyd/fritzed" target="_blank" class="btn btn-default" data-toggle="tooltip" title="Fritzed on Github"><i class="fa fa-github" aria-hidden="true"></i></a>
                <a href="https://github.com/signifyd/fritzed/issues" target="_blank" class="btn btn-default" data-toggle="tooltip" title="Open an issue"><i class="fa fa-bug" aria-hidden="true"></i></a>
            </div>
        </footer>
    </div>
<?php } ?>

<script src="js/jquery.min.js" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="js/main.js"></script>

</body>
</html>