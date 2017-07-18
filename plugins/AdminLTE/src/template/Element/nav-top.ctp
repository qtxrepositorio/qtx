<?php

?>


<?php

$session = new \Cake\Network\Session;
$user = $session->read('Auth.User');

$file = ROOT . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'nav-top.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="active">
                <a>
                    <i class="fa fa-user-circle"></i> <span><?php echo $user['name'] ?></span>
                </a>
            </li>
            <li>
                <a target="_blank" href="http://qualitex.ultralims.com.br/"><i class="fa fa-circle-o text-red"></i> <span>Ultra LIMS</span></a>

            </li>
            <li>
                <a target="_blank" href="http://192.168.0.6:8082"><i class="fa fa-circle-o text-yellow"></i> <span>Protheus WEB</span></a>
            </li>
            <!--
            <li>
                <?php //echo $this->Html->link(__('<i class="fa fa-circle-o text-aqua"></i> <span>Servidor de aquivos</span>'), array('controller'=> 'Pages','action' => 'open'), array('escape' => false, 'data-toggle'=>'tooltip')); ?>
            </li>
            -->
            <li>
                <?php echo $this->Html->link(__('<i class="ion-power"></i>'), array('controller'=> 'Users','action' => 'logout'), array('escape' => false, 'data-toggle'=>'tooltip')); ?>
            </li>
        </ul>
    </div>
</nav>
<?php } ?>
