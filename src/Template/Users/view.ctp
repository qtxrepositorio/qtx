<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('
Tem certeza de que deseja excluir # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Notices'), ['controller' => 'Notices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notice'), ['controller' => 'Notices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
-->

<br>

<div class="col-md-3" align="center">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Informações sobre o usuário:</b></h3>
        </div>
        <div class="box-body">
            <p><b>Nome: </b><?= h($user->name) ?></p> 
            <p><b>CPF: </b><?= h($user->cpf) ?></p>
            <p><b>Usuário: </b><?= h($user->username) ?></p> 
            <p><b>Senha: </b>*****</p> 
            <p><b>Id: </b><?= $this->Number->format($user->id) ?></p> 
            <p><b>Criado em: </b><?= h($user->created) ?></p> 
            <p><b>Modificado em: </b><?=  h($user->modified)  ?></p> 
            <p><b>Ativado: </b><?= $user->status ? __('Sim') : __('Não'); ?></p> 
            <li><?= $this->Html->link(__('Editar Usuário'), ['action'=>'edit', $user->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Apagar Usuário'), ['action' => 'delete', $user->id], ['confirm' => __('
Tem certeza de que deseja excluir # {0}?', $user->id)]) ?> </li>                   
        </div>
    </div>
</div>

<div class="col-md-9">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Grupos relacionados:</b></h3>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><?= __('Id:') ?></th>
                        <th><?= __('Nome:') ?></th>
                        <th><?= __('Descrição:') ?></th>
                        <th class="actions"><?= __('Ações:') ?></th>
                    </tr>
                </thead>    
                <tbody>
                    <?php foreach ($user->roles as $roles): ?>
                        <tr>
                            <td><?= h($roles->id) ?></td>
                            <td><?= h($roles->name) ?></td>
                            <td><?= h($roles->description) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['controller' => 'Roles', 'action' => 'view', $roles->id]) ?> -
                                <?= $this->Html->link(__('Editar'), ['controller' => 'Roles', 'action' => 'edit', $roles->id]) ?> -
                                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Roles', 'action' => 'delete', $roles->id], ['confirm' => __('
Tem certeza de que deseja excluir # {0}?', $roles->id)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
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
                    <?php foreach ($user->notices as $notices): ?>
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
           