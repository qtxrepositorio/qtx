<section class="content">

    <div class="row">

        <div class="col-md-7"> 
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chamados </h3>(
                            <?= $this->Html->link(__('Ver todos'), ['controller'=>'Calls','action'=>'index'])?>)
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                
                            </div>
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>     
                                            <th>Id:</th>                           
                                            <th>Assunto:</th>
                                            <th>Status:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($calls as $key): ?>
                                            <tr>
                                                <td><?php echo $key['calls']['id']; ?></td>
                                                <td><?php echo $key['calls']['text']; ?></td> 
                                                <td><?php echo $key['calls']['status']; ?></td>
                                                <td class="actions"  align="center">
                                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller'=> 'Calls','action' => 'view', $key['calls']['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                                    </td>
                                            </tr>     
                                        <?php endforeach ?>  
                                    </tbody>
                                </table>                             
                            </ul>
                        </div>
                    </div>
                </div>                
            </div> 

            <div class="row">
                <div class="col-md-6">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Notícias individuais</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="box-body">
                                <div class="row">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>                                
                                                <th>Assunto:</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($noticesUsers as $noticesUser): ?>
                                                <tr> 
                                                    <?php 
                                                        if (strlen($noticesUser->notices['subject']) > 45) 
                                                        {
                                                    ?>        <td><?= h(substr($noticesUser->notices['subject'],0,45).' [...]') ?></td>
                                                    <?php
                                                        }
                                                        else
                                                        {
                                                    ?>        <td><?= h($noticesUser->notices['subject']) ?></td>     
                                                    <?php
                                                        }
                                                    ?>
                                                    <td class="actions"  align="center">
                                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller'=> 'Notices','action' => 'view', $noticesUser->notices['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div align="center">
                                <?= $this->Html->link(__('Ver todos'), ['controller'=>'Notices','action'=>'index'])?>    
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Notícias em grupo</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="box-body">
                                <div class="row">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>                                
                                                <th>Assunto:</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($noticesRoles as $noticesRole): ?>
                                                <tr> 
                                                    <?php 
                                                        if (strlen($noticesRole['subject']) > 45) 
                                                        {
                                                    ?>        <td><?= h(substr($noticesRole['subject'],0,45).' [...]') ?></td>
                                                    <?php
                                                        }
                                                        else
                                                        {
                                                    ?>        <td><?= h($noticesRole['subject']) ?></td>     
                                                    <?php
                                                        }
                                                    ?>
                                                    <td class="actions"  align="center">
                                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller'=>'Notices','action' => 'view', $noticesRole['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                                    </td>
                                                </tr>                        
                                            <?php endforeach; ?>                   
                                        </tbody>
                                    </table>                                
                                </div>
                            </div>
                            <div align="center">
                                <?= $this->Html->link(__('Ver todos'), ['controller'=>'Notices','action'=>'index'])?>    
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
                   
        </div>       

        <div class="col-md-5">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Aniversariantes</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="box-body">
                            <div class="row">
                                <table id="example2" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th><FONT size="2px">DIA:</th>
                                            <th><FONT size="2px">NOME:</th>
                                            <th><FONT size="2px">CC:</th>        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($birthdaysOfTheMonth as $key): ?>
                                        <?php 
                                        $dateBirthday = explode("/", $key['DataDeNascimento']);
                                        $dateCurrent = getdate();
                                        $dayCurrent = $dateCurrent['mday'];
                                        if($dateBirthday[0] == $dayCurrent)
                                        {
                                        ?>
                                        <tr class="success">             
                                            <td><FONT size="2px"><?= $dateBirthday[0] ?></td>  
                                            <td><FONT size="2px"><?= $key['RA_NOME'] ?></td>
                                            <td><FONT size="2px"><?= $key['CTT_DESC01'] ?></td>
                                        </tr>
                                        <?php
                                        }
                                        else
                                        {                                
                                        ?>
                                        <tr>           
                                            <td><FONT size="2px"><?= $dateBirthday[0] ?></td>
                                            <td><FONT size="2px"><?= $key['RA_NOME'] ?></td>
                                            <td><FONT size="2px"><?= $key['CTT_DESC01'] ?></td>
                                        </tr>
                                        <?php 
                                        } 
                                        ?>
                                        <?php endforeach; ?>
                                    <tbody>
                                </table>                        
                            </div>
                        </div>

                    </div>                    
                </div>
            </div>

 
        </div>


</section>
