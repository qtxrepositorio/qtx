<?php ?>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-body">
                    <div class="externalDocuments form large-9 medium-8 columns content">
                        <?= $this->Form->create($externalDocument) ?>
                        <fieldset>
                            <legend><?= __('Add External Document') ?></legend>
                            <?php
                            echo $this->Form->input('number_document');
                            echo $this->Form->input('local_id');
                            echo $this->Form->input('client_id');
                            echo $this->Form->input('client_name');
                            echo $this->Form->input('client_contact');
                            echo $this->Form->input('treatment_id', ['options' => $treatmentsDocument]);
                            echo $this->Form->input('reference_id', ['options' => $referencesDocument]);
                            echo $this->Form->input('subject');
                            echo $this->Form->input('user_id', ['options' => $users]);
                            echo $this->Form->input('user_function');
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
</section>
