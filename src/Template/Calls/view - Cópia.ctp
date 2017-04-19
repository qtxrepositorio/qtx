<?php 

//debug($call);

$callsResponse = 0; 

 ?>
<section class="content">

    <div class="row">

        <div class="col-md-5" align="center">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Informações sobre o chamado:</b></h3>
                </div>
                <div class="box-body">

                    <p><b>Id do Chamado: </b><?= $this->Number->format($call->id) ?></p> 
                    <p><b>Assunto: </b><?= h($call->subject) ?></p> 
                    <p><b>Descrição: </b><?= h($call->text) ?></p>
                    <p><b>Urgência: </b><?= h($call->urgency) ?></p>
                    <p><b>Categoria: </b><?= h($call->category) ?></p>
                    <p><b>Status: </b><?= h($call->status) ?></p>
                    <p><b>Atribuído para: </b><?= h($call->user->name) ?></p>
                    <p><b>Criado por: </b><?= h($call->created_by) ?></p>
                    <p><b>Criado em: </b><?= h($call->created) ?></p>
                    <p><b>Modificado em: </b><?= h($call->modified) ?></p>
                    <p><b>Criado por: </b><?= h($call->created_by) ?></p>
                    <p><b>Vizualidado pelo técnico: </b><?= $call->visualized ? __('Sim') : __('Não'); ?></p>

                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $call->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>

                    <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $call->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $call->id))); ?>

                </div>
            </div>
        </div>

        <div class="col-md-7">

            
            <div class="col-md-12">
                <!-- DIRECT CHAT PRIMARY -->
                <div class="box box-primary direct-chat direct-chat-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Acompanhamento do chamado</h3>

                        <div class="box-tools pull-right">
                            <span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3 atualizações</span>
                            
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- Conversations are loaded here -->
                        <div class="direct-chat-messages">

                            <?php foreach ($call['calls_responses'] as $key => $value): ?>

                                <?php if ($value['created_by'] != $call['created_by']): ?>
                                    
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-left">
                                                <?php echo $value['created_by']; ?></span>
                                            <span class="direct-chat-timestamp pull-right">
                                                <?php echo $value['created']; ?>
                                            </span>
                                        </div>
                                        <?php //echo $this->Html->image('user1-128x128.jpg', ['alt' => 'Message User Image', 'class' => 'direct-chat-img']); ?>
                                        <div class="direct-chat-text">
                                            <?php echo $value['text']; ?></span>
                                        </div>
                                    </div>

                                <?php else: ?>
                                    
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-right">
                                                <?php echo $value['created_by']; ?></span>
                                            </span>
                                            <span class="direct-chat-timestamp pull-left">
                                                <?php echo $value['created']; ?>
                                            </span>   
                                        </div>
                                        <?php //echo $this->Html->image('user3-128x128.jpg', ['alt' => 'Message User Image', 'class' => 'direct-chat-img']); ?>
                                        <div class="direct-chat-text">
                                            <?php echo $value['text']; ?></span>
                                        </div>
                                    </div>
                                                              
                                <?php endif ?>                          
                                    
                            <?php endforeach ?>

                        </div>
                        <!--/.direct-chat-messages-->

                        <!-- /.direct-chat-pane -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                            <div class="input-group">

                                <div class="callsResponses form large-9 medium-8 columns content">
                                    <?= $this->Form->create($callsResponse) ?>
                                    <fieldset>
                                        <?php
                                            echo $this->Form->input('text',
                                                ["type"=>"text", 
                                                 "name"=>"text",
                                                 "placeholder"=>"Escreva uma mensagem ...",
                                                 "class"=>"form-control"]);
                                            echo $this->Form->input('created_by', ['type'=>'hidden']);
                                            echo $this->Form->input('call_id', ['type'=>'hidden']);
                                            echo $this->Form->input('visualized', ['type'=>'hidden']);
                                        ?>
                                    </fieldset>
                                    
                                    
                                        <?= $this->Form->button(__('Submit')) ?>
                                                               
                                </div>

                                <?= $this->Form->end() ?>

                            </div>

                    </div>
                    <!-- /.box-footer-->
                </div>
                <!--/.direct-chat -->
            </div>
            <!-- /.col -->

            

    </div>

</section>


