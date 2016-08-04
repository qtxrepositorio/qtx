<?php ?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Notice'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->

<br>

<div class="col-md-6">
    <div class="box box-success">
        <div class="box-body">
            <div class="roles form large-9 medium-8 columns content">
            <div align='right'> <?= $this->Html->link(__('Ver Todos'), ['controller'=>'Notices','action'=>'add'])?> </div>
            <legend><?= __('Aviso(s) enviado(s) a mim:') ?></legend>  

                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>                            
                            <th>Assunto:</th>
                            <th>Conteúdo:</th>
                            <th>Criado em:</th>
                            <th>Usuário criador:</th>
                            <th class="actions"><?= __('Ações:') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($noticesUsers as $noticesUser): ?>
                            <tr>
                                
                                <td><?= h($noticesUser->subject) ?></td>
                                <td><?= h($noticesUser->text) ?></td>
                                <td><?= h($noticesUser->created) ?></td>
                                <td><?= $this->Number->format($noticesUser->user_id) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $noticesUser->id]) ?>
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
            <legend><?= __('Aviso(s) enviado(s) ao(s) meu(s) grupo(s):') ?></legend>

                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>                            
                            <th>Assunto:</th>
                            <th>Conteúdo:</th>
                            <th>Criado em:</th>
                            <th>Usuário criador:</th>
                            <th class="actions"><?= __('Ações:') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($noticesRolesArray as $noticesRole): ?>
                            <?php foreach ($noticesRole as $x): ?>
                                <tr>                                    
                                    <td><?= h($x->subject) ?></td>
                                    <td><?= h($x->text) ?></td>
                                    <td><?= h($x->created) ?></td>
                                    <td><?= $this->Number->format($x->user_id) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $x->id]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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
                <div align='right'> <?= $this->Html->link(__('Adicionar Aviso'), ['controller'=>'Notices','action'=>'add'])?> </div>
                    <legend><?= __('Aviso(s) criado(s) por mim:') ?></legend>
                    <div class="box-body" align="center">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('Id:') ?></th>
                                    <th><?= $this->Paginator->sort('Assunto:') ?></th>
                                    <th><?= $this->Paginator->sort('Conteúdo:') ?></th>
                                    <th><?= $this->Paginator->sort('Criado em:') ?></th>
                                    <th><?= $this->Paginator->sort('Modificado em:') ?></th>
                                    <th class="actions"><?= __('Ações:') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($notices as $notice): ?>
                                <tr>
                                    <td><?= $this->Number->format($notice->id) ?></td>
                                    <td><?= h($notice->subject) ?></td>
                                    <td><?= h($notice->text) ?></td>
                                    <td><?= h($notice->created) ?></td>
                                    <td><?= h($notice->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $notice->id]) ?> -
                                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $notice->id]) ?> -
                                        <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $notice->id], ['confirm' => __('Tem certeza de que deseja excluir # {0}?', $notice->id)]) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                        </ul>
                        <p><?= $this->Paginator->counter() ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                 


