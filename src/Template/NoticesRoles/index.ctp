<?php ?>

<section class="content">



    <div class="box box-success">
        <div class="box-body">
            <div class="roles form large-9 medium-8 columns content">
                <div align='right'><?= $this->Html->link(__('Adicionar Aviso'),['controller'=>'Notices','action'=>'add'])?></div>
                    <legend><?= __('Aviso(s) recebidos(s) em grupo:') ?></legend>
                    <div class="box-body" align="center">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('Assunto:') ?></th>
                                    <th><?= $this->Paginator->sort('Conteúdo:') ?></th>
                                    <th><?= $this->Paginator->sort('Criado em:') ?></th>
                                    <th>Usuário criador:</th>
                                    <th align="center" class="actions"><?= __('Ações:') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($noticesRoles as $notice): ?>
                                        <tr>
                                            <?php 
                                            if (strlen($notice->notices['subject']) > 45) 
                                            {
                                            ?>        <td><?= h(substr($notice->notices['subject'],0,45)). ' [...]' ?></td>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>        <td><?= h($notice->notices['subject']) ?></td>     
                                            <?php
                                                }
                                            ?>                                        

                                            <?php 
                                            if (strlen($notice->notices['text']) > 65) 
                                            {
                                            ?>        <td><?= h(substr($notice->notices['text'],0,65)). ' [...]' ?></td>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>        <td><?= h($notice->notices['text']) ?></td>     
                                            <?php
                                                }
                                            

                                            $dateConvertedForTable = explode("-", $notice->notices['created']);
                                            $day = substr($dateConvertedForTable[2],0,2);
                                            $month = $dateConvertedForTable[1];
                                            $year = $dateConvertedForTable[0];
                                            $dateConvertedForTable = strval($day) . '/' . strval($month) . '/' . strval($year);
                                            ?>
                                            
                                        <td><?= h($dateConvertedForTable) ?></td>
                                        <td><?= h($notice->users['name']) ?></td>
                                        <td align="center" class="actions">
                                                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'Notices', 'action' => 'view', $notice->notices['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                                
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
    </div>
    

</section>