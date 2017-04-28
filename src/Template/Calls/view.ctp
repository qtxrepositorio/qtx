<?php //debug($call); ?>

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
                    <p><b>Tempo para realização (HH:MM): </b><?= h($call->category_time) ?></p>
                    <p><b>Status: </b><?= h($call->status) ?></p>
                    <p><b>Atribuído para: </b><?= h($call->user->name) ?></p>
                    <p><b>Criado por: </b><?= h($call->created_by) ?></p>
                    <p><b>Criado em: </b><?= h($call->created) ?></p>
                    <p><b>Modificado em: </b><?= h($call->modified) ?></p>
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
                                                        
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- Conversations are loaded here -->
                        <div id="id" class="direct-chat-messages">

                            <?php foreach ($call['calls_responses'] as $key => $value): ?>

                                <?php if ($value['created_by'] == $call['authenticatedUser']['name']): ?>

                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-right">
                                                <?php echo $value['created_by']; ?>
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

                                <?php else: ?>
                                    
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
                                                              
                                <?php endif ?>                          
                                    
                            <?php endforeach ?>

                        </div>
                        <!--/.direct-chat-messages-->

                        <!-- /.direct-chat-pane -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <?php
                            $x = null;
                            echo $this->Form->create($x,['url' => ['controller'=>'CallsResponses','action' => 'add-chat']]);
                        ?>
                            <div class="input-group">
                                <input type="text" name="text" placeholder="Escreva uma mensagem ..." class="form-control">
                        
                                <?php
                                    echo $this->Form->input('call_id', ['type'=>'hidden', 'default'=> $call['id']]);
                                    echo $this->Form->input('created_by', ['type'=>'hidden', 'default'=> $call['authenticatedUser']['id']]);
                                    echo $this->Form->input('visualized', ['type'=>'hidden', 'default'=> 0]);
                                ?>

                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary btn-flat">Enviar</button>
                                </span>
                            </div>
                        <?php echo $this->Form->end();   ?>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!--/.direct-chat -->
            </div>
            <!-- /.col -->

    </div>

</section>


<script type="text/javascript">
    
    var div = document.getElementById("id");
    div.scrollTop = div.scrollHeight - div.clientHeight;

</script>