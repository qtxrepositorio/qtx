<?php ?>
<section class="content">
    <div class="box box-success">
        <div class="box-body">
            <div class="roles form large-9 medium-8 columns content">
                    <legend><?= __('Últimos aviso(s) recebidos:') ?></legend>  
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>                            
                                <th>Assunto:</th>
                                <th>Conteúdo:</th>
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
                                        if (strlen($noticesUser->notices['text']) > 45) 
                                        {
                                    ?>        <td><?= h(substr($noticesUser->notices['text'],0,45).' [...]') ?></td>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>        <td><?= h($noticesUser->notices['text']) ?></td>     
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
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'Notices','action' => 'view', $noticesUser->notices['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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