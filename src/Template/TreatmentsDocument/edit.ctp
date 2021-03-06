<?php ?>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-body">
                    <div class="roles form large-9 medium-8 columns content">
                        <div class="treatmentsDocument form large-9 medium-8 columns content">
                            <?= $this->Form->create($treatmentsDocument) ?>
                            <fieldset>
                                <legend><?= __('Editar Tratamento') ?></legend>
                                <?php
                                echo $this->Form->input('description', ['label'=>'Descrição:']);
                                echo $this->Form->input('status', ['label'=>'Status:']);
                                ?>
                            </fieldset>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?= $this->Html->link(__('Voltar'), ['action' => 'index'], array('class' => 'btn btn-primary')) ?>
                                    </div>
                                    <div align="right" class="col-md-6">
                                        <?= $this->Form->button(__('Salvar'), ['align'=>'center','class' => 'form-group']) ?>

                                    </div>
                                </div>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
