<?php

$file = ROOT . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'sidebar-menu.ctp';

$session = new \Cake\Network\Session;
$user = $session->read('Auth.User');

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
    ?>
    <ul class="sidebar-menu">
        <li class="header">Navegação Principal:</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-calculator"></i> <span>Financeiro</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li>
                    <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa  fa-suitcase"></i> <span>Comercial</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li>
                    <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa  fa-line-chart "></i> <span>Controladoria</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">

                <li>
                    <a href="#"> Receitas e Despesas <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="#"> Receitas <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">

                                <li> <?= $this->Html->link(__('Mensal / Centro de custo'), ['controller' => 'Controllership', 'action' => 'RevenuesMonthByCc']) ?>  </li>
                                <li> <?= $this->Html->link(__('Per Capita Anual'), ['controller' => 'Controllership', 'action' => 'RevenuesPerCapita']) ?>  </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"> Despesas <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">

                                <li> <?= $this->Html->link(__('Despesas Com Pessoal'), ['controller' => 'Controllership', 'action' =>'PersonnelExpenses']) ?>  </li>
                                <li> <?= $this->Html->link(__('Despesas Operacionais'), ['controller' => 'Controllership', 'action' => 'OperationalExpenses']) ?>  </li>

                                <li> <?= $this->Html->link(__('Despesas Administrativas'), ['controller' => 'Controllership', 'action' => 'AdministrativeExpenses']) ?>  </li>

                                <li> <?= $this->Html->link(__('Despesas Financeiras'), ['controller' => 'Controllership', 'action' => 'FinancialExpenses']) ?>  </li>

                                <li> <?= $this->Html->link(__('Desp. com Investimentos'), ['controller' => 'Controllership', 'action' => 'InvestmentExpenses']) ?>  </li>

                                <li> <?= $this->Html->link(__('Despesas Tributadas'), ['controller' => 'Controllership', 'action' => 'TaxedExpenses']) ?>  </li>
                            </ul>
                        </li>
                        <li>
                            <?= $this->Html->link(__('Apuração dos resultados'), ['controller'=>'Controllership', 'action'=>'DeterminationOfResults']) ?>
                        </li>
                    </ul>
                </li>

                <li> <?= $this->Html->link(__('Hora extra x salário'), ['controller' => 'Controllership', 'action' => 'OvertimeVersusPay']) ?>  </li>

                <li> <?= $this->Html->link(__('Custo de horas per capita'), ['controller' => 'Controllership', 'action' => 'PerCapitaExtraHoursCost']) ?>  </li>

                <li> <?= $this->Html->link(__('Custo de horas extras / verba'), ['controller' => 'Controllership', 'action' => 'CostOvertime']) ?>  </li>

                <li> <?= $this->Html->link(__('Quadro de pessoal mensal'), ['controller' => 'Controllership', 'action' => 'StaffPerMonth']) ?>  </li>
            </ul>
        </li>

        <!--
        <li class="treeview">
        <a href="#">
        <i class="fa fa-eyedropper"></i> <span>Laboratório</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
    <li>
    <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
    <li>
    <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
</ul>
</li>
</ul>
</li>
<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
</ul>
</li>


<li class="treeview">
<a href="#">
<i class="fa fa-train"></i> <span>Trem de Amostragem</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
<li>
<a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
<ul class="treeview-menu">
<li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
<li>
<a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
<ul class="treeview-menu">
<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
</ul>
</li>
</ul>
</li>
<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
</ul>
</li>
-->

<li class="treeview">
    <a href="#">
        <i class="fa fa-wrench"></i> <span>Operacional</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        <li>
            <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                    <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-users"></i> <span>Recursos Humanos</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li> <?= $this->Html->link(__('Painel'), ['controller' => 'HumanResources', 'action' => 'index']) ?>  </li>
        <li> <?= $this->Html->link(__('Relatórios'), ['controller' => 'HumanResources', 'action' => 'reports']) ?>  </li>
        <li> <?= $this->Html->link(__('Emitir contra cheque'), ['controller' => 'HumanResources', 'action' => 'paycheck', $user['cpf']]) ?>  </li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-medkit"></i> <span>Saúde e Segurança</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        <li>
            <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                    <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-cubes"></i> <span>Almoxarifado</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        <li>
            <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                    <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-laptop"></i> <span>Tecnologia de Informação</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="#"></i> Painel</a></li>
        <li>
            <a href="#"> Usuários <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">

                <li> <?= $this->Html->link(__('Ver Usuários'), ['controller' => 'Users','action' => 'index']) ?>  </li>
                <li> <?= $this->Html->link(__('Adicionar Usuário'), ['controller' => 'Users','action' => 'add']) ?> </li>

            </ul>

        </li>
        <li>
            <a href="#"> Grupos <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li> <?= $this->Html->link(__('Ver Grupos'), ['controller' => 'Roles','action' => 'index']) ?>  </li>
                <li> <?= $this->Html->link(__('Adicionar Grupo'), ['controller' => 'Roles','action' => 'add']) ?> </li>
            </ul>
        </li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-volume-up"></i> <span>Comunicação Externa</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">

        <li>
            <a href="#">Documentos <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li> <?= $this->Html->link(__('Ver documentos'), ['controller' => 'ExternalDocuments','action' => 'index']) ?>  </li>
                <li> <?= $this->Html->link(__('Adicionar documento'), ['controller' => 'ExternalDocuments','action' => 'add']) ?>  </li>
            </ul>
        </li>

        <li>
            <a href="#">Tratamentos <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li> <?= $this->Html->link(__('Ver tratamentos'), ['controller' => 'TreatmentsDocument','action' => 'index']) ?>  </li>
                <li> <?= $this->Html->link(__('Adicionar tratamentos'), ['controller' => 'TreatmentsDocument','action' => 'add']) ?>  </li>
            </ul>
        </li>

        <li>
            <a href="#">Locais <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li> <?= $this->Html->link(__('Ver Locais'), ['controller' => 'LocalsDocument','action' => 'index']) ?>  </li>
                <li> <?= $this->Html->link(__('Adicionar Local'), ['controller' => 'LocalsDocument','action' => 'add']) ?>  </li>
            </ul>
        </li>

        <li>
            <a href="#">Referências <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li> <?= $this->Html->link(__('Ver referências'), ['controller' => 'ReferencesDocument','action' => 'index']) ?>  </li>
                <li> <?= $this->Html->link(__('Adicionar referência'), ['controller' => 'ReferencesDocument','action' => 'add']) ?>  </li>
            </ul>
        </li>

    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa  fa-list"></i> <span>Cental de Avisos</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><?= $this->Html->link(__('Ver Avisos'), ['controller' => 'Notices','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Adicionar Aviso'), ['controller' => 'Notices','action' => 'add']) ?></li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-phone-square"></i> <span>Central de chamados</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li>
            <?php echo $this->Html->link(__('Ver chamados'), array('controller' => 'Calls','action' => 'index')); ?>
        </li>
        <li>
            <?php echo $this->Html->link(__('Adicionar chamado'), array('controller' => 'Calls','action' => 'add')); ?>
        </li>
        <li>
            <?php echo $this->Html->link(__('Painel de indicadores'), array('controller' => 'Calls','action' => 'dashboard')); ?>
        </li>

    </ul>
    <ul class="treeview-menu">
        <li>
            <a href="#">Gerenciamento do módulo <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">

                <li>
                    <?php echo $this->Html->link(__('Áreas'), array('controller' => 'CallsAreas','action' => 'index')); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__('Categorias'), array('controller' => 'CallsCategories','action' => 'index')); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__('Sub Categorias'), array('controller' => 'CallsSubcategories','action' => 'index')); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__('Status'), array('controller' => 'CallsStatus','action' => 'index')); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__('Urgências'), array('controller' => 'CallsUrgency','action' => 'index')); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__('Soluções'), array('controller' => 'CallsSolutions','action' => 'index')); ?>
                </li>

            </ul>
        </li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-cogs"></i> <span>Minha conta</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li>
            <?php echo $this->Html->link(__('Alterar senha'), array('controller' => 'Users','action' => 'changepassword', $user['id'])); ?>
        </li>
    </ul>
</li>

</ul>
<?php } ?>
