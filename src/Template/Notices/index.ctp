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

<div class="col-md-12">
    <div class="box box-success">
            <div class="box-body">
                <div class="roles form large-9 medium-8 columns content">
                <div align='right'> <?= $this->Html->link(__('Adicionar Notícia'), ['controller'=>'Notices','action'=>'add'])?> </div>
                    <legend><?= __('Lista dos Avisos:') ?></legend>
                    <div class="box-body" align="center">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('Id:') ?></th>
                                    <th><?= $this->Paginator->sort('Assunto:') ?></th>
                                    <th><?= $this->Paginator->sort('Conteúdo:') ?></th>
                                    <th><?= $this->Paginator->sort('Criado em:') ?></th>
                                    <th><?= $this->Paginator->sort('Modificado em:') ?></th>
                                    <th><?= $this->Paginator->sort('Usuário criador:') ?></th>
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
                                    <td><?= $this->Number->format($notice->user_id) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $notice->id]) ?> -
                                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $notice->id]) ?> -
                                        <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $notice->id], ['confirm' => __('
                    Tem certeza de que deseja excluir # {0}?', $notice->id)]) ?>
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


