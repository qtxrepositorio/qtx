<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __('
Tem certeza de que deseja excluir # {0}?', $role->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Notices'), ['controller' => 'Notices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notice'), ['controller' => 'Notices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
-->

<br>

<div class="col-md-3" align="center">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Informações sobre o grupo:</b></h3>
        </div>
        <div class="box-body">
            <p><b>Id do grupo: </b><?= $this->Number->format($role->id) ?></p> 
            <p><b>Nome: </b><?= h($role->name) ?></p> 
            <p><b>Descrição: </b><?= h($role->description) ?></p>

            <li><?= $this->Html->link(__('Editar Grupo'), ['action'=>'edit', $role->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Apagar Grupo'), ['action' => 'delete', $role->id], ['confirm' => __('Tem certeza de que deseja excluir # {0}?', $role->id)]) ?> </li>                   
        </div>
    </div>
</div>

<div class="col-md-9">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Usuários relacionados:</b></h3>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Id:</th>
                    <th>Name:</th>
                    <th>Usuário:</th>
                    <th>Ativo:</th>
                    <th>Criado em:</th>
                    <th>Modificado em:</th>
                    <th>Ações:</th>
                </tr>
                </thead>
                <tbody>

                    <?php if (!empty($role->users)): ?>
                    
                        <?php foreach ($role->users as $users): ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->name) ?></td>
                            <td><?= h($users->username) ?></td>
                            <td><?= $users->status ? __('Sim') : __('Não'); ?></td>
                            <td><?= h($users->created) ?></td>
                            <td><?= h($users->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?> -
                                <?= $this->Html->link(__('Editar'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?> -
                                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Você, realmente, deseja apagar o usuário # {0}?', $users->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Notícias relacionadas:</b></h3>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><?= __('Id:') ?></th>
                        <th><?= __('Assunto:') ?></th>
                        <th><?= __('Conteúdo:') ?></th>
                        <th><?= __('Criado em:') ?></th>
                        <th><?= __('Modificado em:') ?></th>
                        <th><?= __('Criado Por:') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($role->notices as $notices): ?>
                    <tr>
                        <td><?= h($notices->id) ?></td>
                        <td><?= h($notices->subject) ?></td>
                        <td><?= h($notices->text) ?></td>
                        <td><?= h($notices->created) ?></td>
                        <td><?= h($notices->modified) ?></td>
                        <td><?= h($notices->user_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Ver'), ['controller' => 'Notices', 'action' => 'view', $notices->id]) ?> -
                            <?= $this->Html->link(__('Editar'), ['controller' => 'Notices', 'action' => 'edit', $notices->id]) ?> -
                            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Notices', 'action' => 'delete', $notices->id], ['confirm' => __('Tem certeza de que deseja excluir # {0}?', $notices->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <thead>
            </table>
        </div>
    </div>
</div>