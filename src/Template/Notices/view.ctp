<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Notice'), ['action' => 'edit', $notice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notice'), ['action' => 'delete', $notice->id], ['confirm' => __('
Tem certeza de que deseja excluir # {0}?', $notice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notice'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
-->

<br>

<div class="col-md-3" align="center">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Informações sobre a notícia:</b></h3>
        </div>
        <div class="box-body">
            <p><b>Assunto: </b><?= h($notice->subject) ?></p> 
            <p><b>Conteúdo: </b><?= h($notice->text) ?></p>
            <p><b>Id do criador: </b><?= $this->Number->format($notice->user_id) ?></p> 
            <p><b>Criado em: </b><?= h($notice->created) ?></p> 
            <p><b>Modificado em: </b><?=  h($notice->modified)  ?></p> 
            
            <li><?= $this->Html->link(__('Editar Notícia'), ['action'=>'edit', $notice->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Apagar Notícia'), ['action' => 'delete', $notice->id], ['confirm' => __('
Tem certeza de que deseja excluir # {0}?', $notice->id)]) ?> </li>                   
        </div>
    </div>
</div>


<div class="col-md-9">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Usuários Relacionados:</b></h3>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <th><?= __('Name') ?></th>
                        <th><?= __('Cpf') ?></th>
                        <th><?= __('Username') ?></th>
                        <th><?= __('Password') ?></th>
                        <th><?= __('Status') ?></th>
                        <th><?= __('Created') ?></th>
                        <th><?= __('Modified') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($notice->users as $users): ?>
                    <tr>
                        <td><?= h($users->id) ?></td>
                        <td><?= h($users->name) ?></td>
                        <td><?= h($users->cpf) ?></td>
                        <td><?= h($users->username) ?></td>
                        <td>*****</td>
                        <td><?= h($users->status) ?></td>
                        <td><?= h($users->created) ?></td>
                        <td><?= h($users->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('
        Tem certeza de que deseja excluir # {0}?', $users->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </table>
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
                    <?php foreach ($notice->roles as $roles): ?>
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