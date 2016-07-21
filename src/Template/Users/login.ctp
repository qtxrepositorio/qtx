<?php $this->layout = 'AdminLTE.login'; ?>




<div class="users form" align='center'>
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Informe seu usuário e senha:') ?></legend>
        <?= $this->Form->input('username',['label'=>'Usuário:']) ?>
        <?= $this->Form->input('password',['label'=>'Senha:']) ?>
    </fieldset>
<?= $this->Form->button(__('Conectar')); ?>
<?= $this->Form->end() ?>
</div>