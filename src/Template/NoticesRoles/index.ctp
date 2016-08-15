<?php ?>
<br>
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