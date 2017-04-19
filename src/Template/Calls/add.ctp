<?php ?>

<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="box box-success">
                <div class="box-body">
                    <div class="roles form large-9 medium-8 columns content">
                        <?= $this->Form->create($call) ?>
                        <fieldset>
                            <legend><?= __('Adiconar Chamado') ?></legend>
                            <?php
                                echo $this->Form->input('subject', ['label'=>'Assunto:']);
                                echo $this->Form->input('text', ['label'=>'Descrição:', 'type' => 'textarea']);
                                echo $this->Form->input('urgency', ['label'=>'Urgência:','options' => ['Baixa'=>'Baixa',
                                        'Média'=>'Média',
                                        'Alta'=>'Alta'] ]);
                                echo $this->Form->input('category', ['label'=>'Categoria:','options' => ['Manuntenção/elétrica'=>'Manuntenção/elétrica',
                                         'Suporte ao usuário'=>'Suporte ao usuário',
                                         'Costumizações de sistema'=>'Costumizações de sistema',
                                         'Outros'=>'Outros'] ]);
                                echo $this->Form->input('status', ['type'=>'hidden','label'=>'Status:', 'default'=>'Novo']);
                                //debug($authenticatedUser['name']);
                                echo $this->Form->input('created_by', ['type'=>'hidden','label'=>'Criado Por:','default'=>$authenticatedUser['id']]);
                                echo $this->Form->input('attributed_to', ['label'=>'Atribuído para:','options' => $users]);
                                echo $this->Form->input('visualized', ['type'=>'hidden','default' => 0]);
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Salvar')) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content"></section>