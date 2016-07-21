<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
-->

<br>

<div class="col-md-4" align="center">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Informações sobre o usuário:</b></h3>
        </div>
        <div class="box-body">
            <p><b>Id do usuário: </b><?= h($user->id) ?></p> 
            <p><b>Usuário: </b><?= h($user->username) ?></p>
            <p><b>Senha: </b>*****</p>
            <p><b>Criado em: </b><?= h($user->created) ?></p>
            <p><b>Modificado em: </b><?= h($user->modified) ?></p>



            <li><?= $this->Html->link(__('Editar Usuário'), ['action'=>'edit', $user->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Apagar Usuário'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>                   
        </div>
    </div>
</div>



<div class="col-md-8">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Grupos relacionados:</b></h3>
        </div>
        <div class="box-body">
             <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>

                    <?php foreach ($user->roles as $roles): ?>
                        <tr>
                            <td><?= h($roles->id) ?></td>
                            <td><?= h($roles->description) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['controller' => 'Roles', 'action' => 'view', $roles->id]) ?> -
                                <?= $this->Html->link(__('Editar'), ['controller' => 'Roles', 'action' => 'edit', $roles->id]) ?> -
                                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Roles', 'action' => 'delete', $roles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roles->id)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
              </table>
        </div>
    </div>
</div>



<!--

<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Roles') ?></h4>
        <?php if (!empty($user->roles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->roles as $roles): ?>
            <tr>
                <td><?= h($roles->id) ?></td>
                <td><?= h($roles->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Roles', 'action' => 'view', $roles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Roles', 'action' => 'edit', $roles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Roles', 'action' => 'delete', $roles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

-->