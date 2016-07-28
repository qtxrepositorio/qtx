<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Notice'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->
<br>

<div class="col-md-9">
    <div class="box box-success">
        <div class="box-body">
            <div class="roles form large-9 medium-8 columns content">
                <div align='right'> <?= $this->Html->link(__('Novo aviso'), ['controller'=>'Roles','action'=>'add'])?> </div>
                    <legend><?= __('Central de avisos:') ?></legend>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('id',['label' => 'Id:']) ?></th>
                                    <th><?= $this->Paginator->sort('subject',['label' => 'Assunto:']) ?></th>
                                    <th><?= $this->Paginator->sort('text',['label' => 'Conteúdo:']) ?></th>
                                    <th><?= $this->Paginator->sort('user_id',['label' => 'Usuário:']) ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($notices as $notice): ?>
                                <tr>
                                    <td><?= $this->Number->format($notice->id) ?></td>
                                    <td><?= h($notice->subject) ?></td>
                                    <td><?= h($notice->text) ?></td>
                                    <td><?= $notice->has('user') ? $this->Html->link($notice->user->name, ['controller' => 'Users', 'action' => 'view', $notice->user->id]) : '' ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $notice->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notice->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notice->id], ['confirm' => __('
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
