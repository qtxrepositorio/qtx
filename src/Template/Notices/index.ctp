<?php ?>

<section class="content">
  
      <div class="col-md-6">
        <div class="box box-success">
            <div class="box-body">
                <div class="roles form large-9 medium-8 columns content">
                    <div align='right'> <?= $this->Html->link(__('Ver Todos'), ['controller'=>'NoticesUsers','action'=>'index'])?> </div>
                    <legend><?= __('Últimos aviso(s) recebidos:') ?></legend>  
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>                            
                                <th>Assunto:</th>
                                <th>Criado em:</th>
                                <th>Usuário criador:</th>
                                <th align="center" class="actions"><?= __('Ações:') ?></th>
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
                                    <?php
                                        $dateConvertedForTable = explode("-", $noticesUser->notices['created']);
                                        $day = substr($dateConvertedForTable[2],0,2);
                                        $month = $dateConvertedForTable[1];
                                        $year = $dateConvertedForTable[0];
                                        $dateConvertedForTable = strval($day) . '/' . strval($month) . '/' . strval($year);
                                    ?>   
                                    <td><?= h($dateConvertedForTable) ?></td>
                                    <td><?= h($noticesUser->users['name']) ?></td>
                                    <td align="center" class="actions">
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $noticesUser->notices['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    

      <div class="col-md-6">
        <div class="box box-success">
            <div class="box-body">
                <div class="roles form large-9 medium-8 columns content">
                    <div align='right'> <?= $this->Html->link(__('Ver Todos'), ['controller'=>'Notices','action'=>'add'])?> </div>
                    <legend><?= __('Últimos aviso(s) recebidos em grupo:') ?></legend>

                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>                            
                                <th>Assunto:</th>
                                <th>Criado em:</th>
                                <th>Usuário criador:</th>
                                <th align="center" class="actions"><?= __('Ações:') ?></th>
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
                                    <?php
                                        $dateConvertedForTable = explode("-", $noticesRole['created']);
                                        $day = substr($dateConvertedForTable[2],0,2);
                                        $month = $dateConvertedForTable[1];
                                        $year = $dateConvertedForTable[0];
                                        $dateConvertedForTable = strval($day) . '/' . strval($month) . '/' . strval($year);
                                    ?> 
                                    <td><?= h($dateConvertedForTable) ?></td>
                                    <td><?= h($noticesRole['name']) ?></td>
                                    <td align="center" class="actions">
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $noticesRole['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                    </td>
                                </tr>                        
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    

    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-body">
                <div class="roles form large-9 medium-8 columns content">
                    <div align='right'><?= $this->Html->link(__('Adicionar Aviso'),['controller'=>'Notices','action'=>'add'])?></div>
                        <legend><?= __('Aviso(s) criado(s) por mim:') ?></legend>
                        <div class="box-body" align="center">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('Assunto:') ?></th>
                                        <th><?= $this->Paginator->sort('Conteúdo:') ?></th>
                                        <th><?= $this->Paginator->sort('Criado em:') ?></th>
                                        <th align="center" class="actions"><?= __('Ações:') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($notices as $notice): ?>
                                    <tr>

                                        <?php 
                                        if (strlen($notice->subject) > 45) 
                                        {
                                        ?>        <td><?= h(substr($notice->subject,0,45)). ' [...]' ?></td>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>        <td><?= h($notice->subject) ?></td>     
                                        <?php
                                            }
                                        ?>                                        

                                        <?php 
                                        if (strlen($notice->text) > 65) 
                                        {
                                        ?>        <td><?= h(substr($notice->text,0,65)). ' [...]' ?></td>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>        <td><?= h($notice->text) ?></td>     
                                        <?php
                                            }
                                        ?>
                                        
                                        <td><?= h($notice->created) ?></td>
                                        <td align="center" class="actions">
                                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $notice->id), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $notice->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>
                                            <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $notice->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?',$notice->id))); ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('Próximo') . ' >') ?>
                        </ul>
                        <p><?= $this->Paginator->counter() ?></p>
                    </div>
                </div>
            </div>
        </div></div>
    
    
    
   
   
</section> 

