<?php ?>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-body">
                    <div class="externalDocuments form large-9 medium-8 columns content">
                        <?= $this->Form->create($externalDocument) ?>
                        <fieldset>
                            <legend><?= __('Adicionar documento') ?></legend>
                            <?php
                            //echo $this->Form->input('number_document');
                            echo $this->Form->input('local_id', ['label'=>'Local: ', 'options' => $localsDocument]);
                            echo $this->Form->input('client_id',['label'=>'Cliente: ', 'options' => [1=>1,2=>2,3=>3]]);
                            echo $this->Form->input('client_name',['label'=>'Nome do cliente: ']);
                            echo $this->Form->input('client_contact',['label'=>'Contato do cliente: ']);
                            echo $this->Form->input('treatment_id', ['label'=>'Tratamento: ', 'options' => $treatmentsDocument]);
                            echo $this->Form->input('reference',['label'=>'Referência: ']);
                            echo $this->Form->input('subject',['label'=>'Assunto:']);
                            echo $this->Form->input('description', ['type'=>'textarea', 'label'=>'Descrição:']);
                            //echo $this->Form->input('user_id', ['type'=>'hidden', 'label'=>'', 'options' => $users, 'defaut'=> $authenticatedUserId]);
                            //echo $this->Form->input('user_function',['type'=>'hidden', 'label'=>'', 'defaut'=>'skoaskpoakspoakspo']);
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
