<?php

namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;
use Cake\Datasource\ConnectionManager;

class ControllershipController extends AppController {
    
    

    public function index() {}
    
    
    public function expensesVersusRecipesFilter() {

        $connection = ConnectionManager::get('auxiliar');

        $cc = $this->request->data['cc'];
        $yearOne = $this->request->data['yearOne'];

        $ccs = ['01', '03', '06', '07', '08', '11', '12', '13', '14', '15', '16', '18', '20', '22', '23', '28'];

        if ($cc == '') {

            foreach ($ccs as $key => $value) {

                /// -------------ini despesas

                $date = getDate();

                if ($yearOne == $date['year']) {

                    $expensesOne = $connection->execute("
                        SELECT 
                            TOP 1 * 
                                FROM
                                    [Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
                                        WHERE ANO = '$yearOne'
                                              AND [centroDeCusto] = '$value'
                                              AND LEN([codigo]) = 2")
                            ->fetchAll('assoc');

                    if ($expensesOne != [] and $date['mon'] - 2 >= 1) {

                        $monthIniDel = $date['mon'] - 2;
                        $monthFinDel = $date['mon'];

                        $yearOne = $date['year'];

                        $connection->begin();
                        $connection->execute("DELETE FROM
                                [dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
                                    WHERE [centroDeCusto] = '$value' 
                                        AND [MES] BETWEEN $monthIniDel AND $monthFinDel
                                        AND [ANO] = '$yearOne'");
                        $connection->commit();

                        $dtIniOne = strval($yearOne) . $date['mon'] - 2 . '01';
                        $dtFinOne = strval($yearOne) . $date['mon'] . '31';

                        $connection->begin();
                        $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
                                        @CCUSTO = ?, @DT_INICIAL = ?, @DT_FINAL = ?",
                                        [$value, $dtIniOne, $dtFinOne]);
                        $connection->commit();
                        
                    } else {

                        $yearOne = $date['year'];
                        $dtIniOne = strval($yearOne) . '0101';
                        $dtFinOne = strval($yearOne) . '1231';

                        $connection->begin();
                        $connection->execute("DELETE FROM
                        [dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
                        WHERE [centroDeCusto] = '$value' 
                          AND [ANO] = '$yearOne'");
                        $connection->commit();

                        $connection->begin();
                        $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
                                        @CCUSTO = ?,
                                        @DT_INICIAL = ?,
                                        @DT_FINAL = ?", [$value, $dtIniOne, $dtFinOne]);
                        $connection->commit();
                    }
                    
                } else {

                    $expensesOne = $connection->execute("SELECT 
                                TOP 1 * 
                                    FROM [Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
                                        WHERE ANO = '$yearOne'
                                            AND [centroDeCusto] = '$value'
                                            AND LEN([codigo]) = 2")
                                ->fetchAll('assoc');

                    if ($expensesOne != []) {

                        $monthIniDel = 12;
                        $monthFinDel = 12;

                        //$yearOne = $date['year'];

                        $connection->begin();
                        $connection->execute("DELETE FROM
                                [dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
                                WHERE [centroDeCusto] = '$value' 
                                AND [MES] BETWEEN $monthIniDel AND $monthFinDel
                                AND [ANO] = '$yearOne'");
                        $connection->commit();

                        $dtIniOne = strval($yearOne) . '1201';
                        $dtFinOne = strval($yearOne) . '1231';

                        $connection->begin();
                        $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
                                        @CCUSTO = ?,
                                        @DT_INICIAL = ?,
                                        @DT_FINAL = ?", [$value, $dtIniOne, $dtFinOne]);
                        $connection->commit();
                        
                    } else {

                        //$yearOne = $date['year'];
                        $dtIniOne = strval($yearOne) . '0101';
                        $dtFinOne = strval($yearOne) . '1231';

                        $connection->begin();
                        $connection->execute("DELETE FROM
                        [dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
                        WHERE [centroDeCusto] = '$value' 
                          AND [ANO] = '$yearOne'");
                        $connection->commit();

                        $connection->begin();
                        $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
                                        @CCUSTO = ?,
                                        @DT_INICIAL = ?,
                                        @DT_FINAL = ?", [$value, $dtIniOne, $dtFinOne]);
                        $connection->commit();
                    }
                }
            }

            $expensesOne = $connection->execute("SELECT * FROM 
                [Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
                WHERE ANO = '$yearOne'
                AND LEN([codigo]) = 2")
                    ->fetchAll('assoc');

            ///// -------- fin despesas
            ///// -------- ini receitras

            $revenueYearCurrent = $connection->execute("SELECT 
                [COD_CENTRO_DE_CUSTO]
                ,[CENTRO_DE_CUSTO]
                ,[MES]
                ,[ANO]
                ,[VALOR]
                FROM [VW_RECEITAS]
                    WHERE [ANO] = '$yearOne'
                ORDER BY [COD_CENTRO_DE_CUSTO]")
                    ->fetchAll('assoc');


            ///// -------- fin receitras

        } else {

            /// -------------ini despesas

            $date = getDate();

            if ($yearOne == $date['year']) {

                $expensesOne = $connection->execute("SELECT TOP 1 * FROM 
                [Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
                WHERE ANO = '$yearOne'
                AND [centroDeCusto] = '$cc'
                AND LEN([codigo]) = 2")
                        ->fetchAll('assoc');

                if ($expensesOne != [] and $date['mon'] - 2 >= 1) {

                    $monthIniDel = $date['mon'] - 2;
                    $monthFinDel = $date['mon'];

                    $yearOne = $date['year'];

                    $connection->begin();
                    $connection->execute("DELETE FROM
                                [dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
                                WHERE [centroDeCusto] = '$cc' 
                                AND [MES] BETWEEN $monthIniDel AND $monthFinDel
                                AND [ANO] = '$yearOne'");
                    $connection->commit();

                    $dtIniOne = strval($yearOne) . $date['mon'] - 2 . '01';
                    $dtFinOne = strval($yearOne) . $date['mon'] . '31';

                    $connection->begin();
                    $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
                                        @CCUSTO = ?,
                                        @DT_INICIAL = ?,
                                        @DT_FINAL = ?", [$cc, $dtIniOne, $dtFinOne]);
                    $connection->commit();
                    
                } else {

                    $yearOne = $date['year'];
                    $dtIniOne = strval($yearOne) . '0101';
                    $dtFinOne = strval($yearOne) . '1231';

                    $connection->begin();
                    $connection->execute("DELETE FROM
                        [dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
                        WHERE [centroDeCusto] = '$cc' 
                          AND [ANO] = '$yearOne'");
                    $connection->commit();

                    $connection->begin();
                    $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
                                        @CCUSTO = ?,
                                        @DT_INICIAL = ?,
                                        @DT_FINAL = ?", [$cc, $dtIniOne, $dtFinOne]);
                    $connection->commit();
                }
                
            } else {

                $expensesOne = $connection->execute("SELECT TOP 1 * FROM 
                [Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
                WHERE ANO = '$yearOne'
                AND [centroDeCusto] = '$cc'
                AND LEN([codigo]) = 2")
                        ->fetchAll('assoc');

                if ($expensesOne != []) {

                    $monthIniDel = 12;
                    $monthFinDel = 12;

                    //$yearOne = $date['year'];

                    $connection->begin();
                    $connection->execute("DELETE FROM
                                [dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
                                WHERE [centroDeCusto] = '$cc' 
                                AND [MES] BETWEEN $monthIniDel AND $monthFinDel
                                AND [ANO] = '$yearOne'");
                    $connection->commit();

                    $dtIniOne = strval($yearOne) . '1201';
                    $dtFinOne = strval($yearOne) . '1231';

                    $connection->begin();
                    $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
                                        @CCUSTO = ?,
                                        @DT_INICIAL = ?,
                                        @DT_FINAL = ?", [$cc, $dtIniOne, $dtFinOne]);
                    $connection->commit();
                    
                } else {

                    //$yearOne = $date['year'];
                    $dtIniOne = strval($yearOne) . '0101';
                    $dtFinOne = strval($yearOne) . '1231';

                    $connection->begin();
                    $connection->execute("DELETE FROM
                        [dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
                        WHERE [centroDeCusto] = '$cc' 
                          AND [ANO] = '$yearOne'");
                    $connection->commit();

                    $connection->begin();
                    $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
                                        @CCUSTO = ?,
                                        @DT_INICIAL = ?,
                                        @DT_FINAL = ?", [$cc, $dtIniOne, $dtFinOne]);
                    $connection->commit();
                }
            }

            $expensesOne = $connection->execute("SELECT * FROM 
                [Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
                WHERE ANO = '$yearOne'
                AND [centroDeCusto] = '$cc'
                AND LEN([codigo]) = 2")
                    ->fetchAll('assoc');

            ///// -------- fin despesas
            ///// -------- ini receitras

            $revenueYearCurrent = $connection->execute("SELECT 
                [COD_CENTRO_DE_CUSTO]
                ,[CENTRO_DE_CUSTO]
                ,[MES]
                ,[ANO]
                ,[VALOR]
                FROM [VW_RECEITAS]
                    WHERE [ANO] = '$yearOne'
                    AND [COD_CENTRO_DE_CUSTO] = '$cc'
                ORDER BY [COD_CENTRO_DE_CUSTO]")
                    ->fetchAll('assoc');

            ///// -------- fin receitras
        }

        $this->set(compact('expensesOne', 'revenueYearCurrent', 'cc', 'yearOne'));
        $this->set('_serialize', ['expensesOne', 'revenueYearCurrent', 'cc', 'yearOne']);
    }
    
    public function expensesVersusRecipesPdf() {
        
        $blob = $_GET['blob'];
        $year = $_GET['year'];
        $cc = $_GET['cc'];
        
        $connection = ConnectionManager::get('auxiliar');
        
        if ($cc != '') {
            
             $expensesOne = $connection->execute("SELECT * FROM 
                [Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
                WHERE ANO = '$year'
                AND [centroDeCusto] = '$cc'
                AND LEN([codigo]) = 2")
                    ->fetchAll('assoc');

            ///// -------- fin despesas
            ///// -------- ini receitras

            $revenueYearCurrent = $connection->execute("SELECT 
                [COD_CENTRO_DE_CUSTO]
                ,[CENTRO_DE_CUSTO]
                ,[MES]
                ,[ANO]
                ,[VALOR]
                FROM [VW_RECEITAS]
                    WHERE [ANO] = '$year'
                    AND [COD_CENTRO_DE_CUSTO] = '$cc'
                ORDER BY [COD_CENTRO_DE_CUSTO]")
                    ->fetchAll('assoc');
                       
        }else{
            
             $expensesOne = $connection->execute("SELECT * FROM 
                [Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
                WHERE ANO = '$year'
                AND LEN([codigo]) = 2")
                    ->fetchAll('assoc');

            ///// -------- fin despesas
            ///// -------- ini receitras

            $revenueYearCurrent = $connection->execute("SELECT 
                [COD_CENTRO_DE_CUSTO]
                ,[CENTRO_DE_CUSTO]
                ,[MES]
                ,[ANO]
                ,[VALOR]
                FROM [VW_RECEITAS]
                    WHERE [ANO] = '$year'
                ORDER BY [COD_CENTRO_DE_CUSTO]")
                    ->fetchAll('assoc');
            
        }
        
       

        $this->set(compact('expensesOne', 'revenueYearCurrent', 'cc', 'year','blob'));
        $this->set('_serialize', ['expensesOne', 'revenueYearCurrent', 'cc', 'year','blob']);
        
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
        
    }

    public function expensesVersusRecipes() {

        $connection = ConnectionManager::get('auxiliar');

        $cc = '01';

        $date = getDate();

        $yearOne = $date['year'];

        /// -------------ini despesas

        $expensesOne = $connection->execute("SELECT * FROM 
            [Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
            WHERE ANO = '$yearOne'
            AND [centroDeCusto] = '$cc'
            AND LEN([codigo]) = 2")
                ->fetchAll('assoc');

        if ($expensesOne != [] and $date['mon'] - 2 >= 1) {

            $monthIniDel = $date['mon'] - 2;
            $monthFinDel = $date['mon'];

            $yearOne = $date['year'];

            $connection->begin();
            $connection->execute("DELETE FROM
                        [dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
                        WHERE [centroDeCusto] = '$cc' 
                        AND [MES] BETWEEN $monthIniDel AND $monthFinDel
                        AND [ANO] = '$yearOne'");
            $connection->commit();

            $dtIniOne = strval($yearOne) . $date['mon'] - 2 . '01';
            $dtFinOne = strval($yearOne) . $date['mon'] . '31';

            $connection->begin();
            $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
                                @CCUSTO = ?,
                                @DT_INICIAL = ?,
                                @DT_FINAL = ?", [$cc, $dtIniOne, $dtFinOne]);
            $connection->commit();
        } else {

            $yearOne = $date['year'];
            $dtIniOne = strval($yearOne) . '0101';
            $dtFinOne = strval($yearOne) . '1231';

            $connection->begin();
            $connection->execute("DELETE FROM
                [dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
                WHERE [centroDeCusto] = '$cc' 
                  AND [ANO] = '$yearOne'");
            $connection->commit();

            $connection->begin();
            $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
                                @CCUSTO = ?,
                                @DT_INICIAL = ?,
                                @DT_FINAL = ?", [$cc, $dtIniOne, $dtFinOne]);
            $connection->commit();
        }

        $expensesOne = $connection->execute("SELECT * FROM 
            [Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
            WHERE ANO = '$yearOne'
            AND [centroDeCusto] = '$cc'
            AND LEN([codigo]) = 2")
                ->fetchAll('assoc');

        ///// -------- fin despesas
        ///// -------- ini receitras

        $revenueYearCurrent = $connection->execute("SELECT 
            [COD_CENTRO_DE_CUSTO]
            ,[CENTRO_DE_CUSTO]
            ,[MES]
            ,[ANO]
            ,[VALOR]
            FROM [VW_RECEITAS]
                WHERE [ANO] = YEAR(GETDATE())
                AND [COD_CENTRO_DE_CUSTO] = '$cc'
            ORDER BY [COD_CENTRO_DE_CUSTO]")
                ->fetchAll('assoc');

        ///// -------- fin receitras

        $this->set(compact('expensesOne', 'revenueYearCurrent'));
        $this->set('_serialize', ['expensesOne', 'revenueYearCurrent']);
    }

    public function yearlyExpensesGraphicFilter() {

        $connection = ConnectionManager::get('auxiliar');

        $cc = $this->request->data['cc'];
        $yearOne = $this->request->data['yearOne'];
        $yearTwo = $this->request->data['yearTwo'];

        //debug($this->request->data['yearTwo']);

        $date = getdate();

        if ($yearOne == $date['year'] and $yearTwo == $date['year'] - 1) {

            $yearOne = $date['year'];

            $existRefOne = $connection->execute("SELECT * FROM 
				[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
				WHERE ANO = '$yearOne'
				AND [centroDeCusto] = '$cc'
				AND LEN([codigo]) = 2")
                    ->fetchAll('assoc');

            if ($existRefOne != [] and $date['mon'] - 2 >= 1) {

                $monthIniDel = $date['mon'] - 2;
                $monthFinDel = $date['mon'];

                $yearOne = $date['year'];

                $connection->begin();
                $connection->execute("DELETE FROM
					[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
	      			WHERE [centroDeCusto] = '$cc' 
	      			AND [MES] BETWEEN $monthIniDel AND $monthFinDel
					AND [ANO] = '$yearOne'");
                $connection->commit();


                $dtIniOne = strval($yearOne) . $date['mon'] - 2 . '01';
                $dtFinOne = strval($yearOne) . $date['mon'] . '31';

                $connection->begin();
                $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
									@CCUSTO = ?,
									@DT_INICIAL = ?,
									@DT_FINAL = ?", [$cc, $dtIniOne, $dtFinOne]);
                $connection->commit();
            } else {

                $yearOne = $date['year'];
                $dtIniOne = strval($yearOne) . '0101';
                $dtFinOne = strval($yearOne) . '1231';

                $connection->begin();
                $connection->execute("DELETE FROM
					[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
	      			WHERE [centroDeCusto] = '$cc' 
					  AND [ANO] = '$yearOne'");
                $connection->commit();

                $connection->begin();
                $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
									@CCUSTO = ?,
									@DT_INICIAL = ?,
									@DT_FINAL = ?", [$cc, $dtIniOne, $dtFinOne]);
                $connection->commit();
            }

            //////////////////////////////
            //////////////////////////////
            //////////////////////////////

            $yearTwo = $date['year'] - 1;

            $existRefTwo = $connection->execute("SELECT * FROM 
				[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
				WHERE ANO = '$yearTwo'
				AND [centroDeCusto] = '$cc'
				AND LEN([codigo]) = 2")
                    ->fetchAll('assoc');

            $dtIniTwo = strval($yearTwo) . '1201';
            $dtFinTwo = strval($yearTwo) . '1231';

            if ($existRefTwo != []) {

                $connection->begin();
                $connection->execute("DELETE FROM
					[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
	      			WHERE [centroDeCusto] = '$cc' 
	      			AND [MES] = 12
					AND [ANO] = '$yearTwo'");
                $connection->commit();

                $connection->begin();
                $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
									@CCUSTO = ?,
									@DT_INICIAL = ?,
									@DT_FINAL = ?", [$cc, $dtIniTwo, $dtFinTwo]);
                $connection->commit();
            } else {

                $connection->begin();
                $connection->execute("DELETE FROM
					[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
	      			WHERE [centroDeCusto] = '$cc' 
					AND [ANO] = '$yearTwo'");
                $connection->commit();

                $dtIniTwo = strval($yearTwo) . '0101';
                $dtFinTwo = strval($yearTwo) . '1231';

                $connection->begin();
                $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
									@CCUSTO = ?,
									@DT_INICIAL = ?,
									@DT_FINAL = ?", [$cc, $dtIniTwo, $dtFinTwo]);
                $connection->commit();
            }
        } else {

            $existRefOne = $connection->execute("SELECT * FROM 
				[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
				WHERE ANO = '$yearOne'
				AND [centroDeCusto] = '$cc'
				AND LEN([codigo]) = 2")
                    ->fetchAll('assoc');

            if ($existRefOne != []) {

                $connection->begin();
                $connection->execute("DELETE FROM
					[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
	      			WHERE [centroDeCusto] = '$cc' 
	      			AND [MES] = 12
					AND [ANO] = '$yearOne'");
                $connection->commit();


                $dtIniOne = strval($yearOne) . '1201';

                $dtFinOne = strval($yearOne) . '1231';

                $connection->begin();
                $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
									@CCUSTO = ?,
									@DT_INICIAL = ?,
									@DT_FINAL = ?", [$cc, $dtIniOne, $dtFinOne]);
                $connection->commit();
            } else {

                $dtIniOne = strval($yearOne) . '0101';
                $dtFinOne = strval($yearOne) . '1231';

                $connection->begin();
                $connection->execute("DELETE FROM
					[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
	      			WHERE [centroDeCusto] = '$cc' 
					  AND [ANO] = '$yearOne'");
                $connection->commit();

                $connection->begin();
                $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
									@CCUSTO = ?,
									@DT_INICIAL = ?,
									@DT_FINAL = ?", [$cc, $dtIniOne, $dtFinOne]);
                $connection->commit();
            }

            //////////////////////////////
            //////////////////////////////
            //////////////////////////////


            $existRefTwo = $connection->execute("SELECT * FROM 
				[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
				WHERE ANO = '$yearTwo'
				AND [centroDeCusto] = '$cc'
				AND LEN([codigo]) = 2")
                    ->fetchAll('assoc');

            $dtIniTwo = strval($yearTwo) . '1201';
            $dtFinTwo = strval($yearTwo) . '1231';

            if ($existRefTwo != []) {

                $connection->begin();
                $connection->execute("DELETE FROM
					[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
	      			WHERE [centroDeCusto] = '$cc' 
	      			AND [MES] = 12
					AND [ANO] = '$yearTwo'");
                $connection->commit();

                $connection->begin();
                $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
									@CCUSTO = ?,
									@DT_INICIAL = ?,
									@DT_FINAL = ?", [$cc, $dtIniTwo, $dtFinTwo]);
                $connection->commit();
            } else {

                $connection->begin();
                $connection->execute("DELETE FROM
					[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
	      			WHERE [centroDeCusto] = '$cc' 
					AND [ANO] = '$yearTwo'");
                $connection->commit();

                $dtIniTwo = strval($yearTwo) . '0101';
                $dtFinTwo = strval($yearTwo) . '1231';

                $connection->begin();
                $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
									@CCUSTO = ?,
									@DT_INICIAL = ?,
									@DT_FINAL = ?", [$cc, $dtIniTwo, $dtFinTwo]);
                $connection->commit();
            }
        }

        /////////////--------------------------------------------------////////////////
        /////////////--------------------------------------------------////////////////
        /////////////--------------------------------------------------////////////////
        /////////////--------------------------------------------------////////////////
        /////////////--------------------------------------------------////////////////

        $existRefOne = $connection->execute("SELECT * FROM 
			[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
			WHERE ANO = '$yearOne'
			AND [centroDeCusto] = '$cc'
			AND LEN([codigo]) = 2")
                ->fetchAll('assoc');

        $existRefTwo = $connection->execute("SELECT * FROM 
			[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
			WHERE ANO = '$yearTwo'
			AND [centroDeCusto] = '$cc'
			AND LEN([codigo]) = 2")
                ->fetchAll('assoc');

        $this->set(compact('existRefOne', 'existRefTwo', 'cc', 'yearOne', 'yearTwo'));
        $this->set('_serialize', ['existRefOne', 'existRefTwo', 'cc', 'yearOne', 'yearTwo']);
    }

    public function yearlyExpensesGraphic() {

        $connection = ConnectionManager::get('auxiliar');

        $cc = '01';

        $date = getDate();

        $yearOne = $date['year'];

        $existRefOne = $connection->execute("SELECT * FROM 
			[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
			WHERE ANO = '$yearOne'
			AND [centroDeCusto] = '$cc'
			AND LEN([codigo]) = 2")
                ->fetchAll('assoc');

        if ($existRefOne != [] and $date['mon'] - 2 >= 1) {

            $monthIniDel = $date['mon'] - 2;
            $monthFinDel = $date['mon'];

            $yearOne = $date['year'];

            $connection->begin();
            $connection->execute("DELETE FROM
				[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
      			WHERE [centroDeCusto] = '$cc' 
      			AND [MES] BETWEEN $monthIniDel AND $monthFinDel
				AND [ANO] = '$yearOne'");
            $connection->commit();

            $dtIniOne = strval($yearOne) . $date['mon'] - 2 . '01';
            $dtFinOne = strval($yearOne) . $date['mon'] . '31';

            $connection->begin();
            $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
								@CCUSTO = ?,
								@DT_INICIAL = ?,
								@DT_FINAL = ?", [$cc, $dtIniOne, $dtFinOne]);
            $connection->commit();
        } else {

            $yearOne = $date['year'];
            $dtIniOne = strval($yearOne) . '0101';
            $dtFinOne = strval($yearOne) . '1231';

            $connection->begin();
            $connection->execute("DELETE FROM
				[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
      			WHERE [centroDeCusto] = '$cc' 
				  AND [ANO] = '$yearOne'");
            $connection->commit();

            $connection->begin();
            $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
								@CCUSTO = ?,
								@DT_INICIAL = ?,
								@DT_FINAL = ?", [$cc, $dtIniOne, $dtFinOne]);
            $connection->commit();
        }

        //////////////////////////////
        //////////////////////////////
        //////////////////////////////

        $yearTwo = $date['year'] - 1;

        $existRefTwo = $connection->execute("SELECT * FROM 
			[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
			WHERE ANO = '$yearTwo'
			AND [centroDeCusto] = '$cc'
			AND LEN([codigo]) = 2")
                ->fetchAll('assoc');

        $dtIniTwo = strval($yearTwo) . '1201';
        $dtFinTwo = strval($yearTwo) . '1231';

        if ($existRefTwo != []) {

            $connection->begin();
            $connection->execute("DELETE FROM
				[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
      			WHERE [centroDeCusto] = '$cc' 
      			AND [MES] = 12
				AND [ANO] = '$yearTwo'");
            $connection->commit();

            $connection->begin();
            $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
								@CCUSTO = ?,
								@DT_INICIAL = ?,
								@DT_FINAL = ?", [$cc, $dtIniTwo, $dtFinTwo]);
            $connection->commit();
        } else {

            $connection->begin();
            $connection->execute("DELETE FROM
				[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
      			WHERE [centroDeCusto] = '$cc' 
				AND [ANO] = '$yearTwo'");
            $connection->commit();

            $dtIniTwo = strval($yearTwo) . '0101';
            $dtFinTwo = strval($yearTwo) . '1231';

            $connection->begin();
            $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
								@CCUSTO = ?,
								@DT_INICIAL = ?,
								@DT_FINAL = ?", [$cc, $dtIniTwo, $dtFinTwo]);
            $connection->commit();
        }

        $existRefOne = $connection->execute("SELECT * FROM 
			[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
			WHERE ANO = '$yearOne'
			AND [centroDeCusto] = '$cc'
			AND LEN([codigo]) = 2")
                ->fetchAll('assoc');

        $existRefTwo = $connection->execute("SELECT * FROM 
			[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
			WHERE ANO = '$yearTwo'
			AND [centroDeCusto] = '$cc'
			AND LEN([codigo]) = 2")
                ->fetchAll('assoc');

        $this->set(compact('existRefOne', 'existRefTwo', 'cc', 'yearOne', 'yearTwo'));
        $this->set('_serialize', ['existRefOne', 'existRefTwo', 'cc', 'yearOne', 'yearTwo']);
    }

    public function yearlyExpensesTableFilter() {

        $connection = ConnectionManager::get('auxiliar');

        $cc = $this->request->data['cc'];
        $yearOne = $this->request->data['yearOne'];
        $yearTwo = $this->request->data['yearTwo'];

        $date = getdate();

        if ($yearOne == $date['year'] and $yearTwo == $date['year'] - 1) {

            $yearOne = $date['year'];

            $existRefOne = $connection->execute("SELECT * FROM 
				[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
				WHERE ANO = '$yearOne'
				AND [centroDeCusto] = '$cc'
				AND LEN([codigo]) = 2")
                    ->fetchAll('assoc');

            if ($existRefOne != [] and $date['mon'] - 2 >= 1) {

                $monthIniDel = $date['mon'] - 2;
                $monthFinDel = $date['mon'];

                $yearOne = $date['year'];

                $connection->begin();
                $connection->execute("DELETE FROM
					[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
	      			WHERE [centroDeCusto] = '$cc' 
	      			AND [MES] BETWEEN $monthIniDel AND $monthFinDel
					AND [ANO] = '$yearOne'");
                $connection->commit();


                $dtIniOne = strval($yearOne) . $date['mon'] - 2 . '01';
                $dtFinOne = strval($yearOne) . $date['mon'] . '31';

                $connection->begin();
                $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
									@CCUSTO = ?,
									@DT_INICIAL = ?,
									@DT_FINAL = ?", [$cc, $dtIniOne, $dtFinOne]);
                $connection->commit();
            } else {

                $yearOne = $date['year'];
                $dtIniOne = strval($yearOne) . '0101';
                $dtFinOne = strval($yearOne) . '1231';

                $connection->begin();
                $connection->execute("DELETE FROM
					[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
	      			WHERE [centroDeCusto] = '$cc' 
					  AND [ANO] = '$yearOne'");
                $connection->commit();

                $connection->begin();
                $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
									@CCUSTO = ?,
									@DT_INICIAL = ?,
									@DT_FINAL = ?", [$cc, $dtIniOne, $dtFinOne]);
                $connection->commit();
            }

            //////////////////////////////
            //////////////////////////////
            //////////////////////////////

            $yearTwo = $date['year'] - 1;

            $existRefTwo = $connection->execute("SELECT * FROM 
				[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
				WHERE ANO = '$yearTwo'
				AND [centroDeCusto] = '$cc'
				AND LEN([codigo]) = 2")
                    ->fetchAll('assoc');

            $dtIniTwo = strval($yearTwo) . '1201';
            $dtFinTwo = strval($yearTwo) . '1231';

            if ($existRefTwo != []) {

                $connection->begin();
                $connection->execute("DELETE FROM
					[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
	      			WHERE [centroDeCusto] = '$cc' 
	      			AND [MES] = 12
					AND [ANO] = '$yearTwo'");
                $connection->commit();

                $connection->begin();
                $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
									@CCUSTO = ?,
									@DT_INICIAL = ?,
									@DT_FINAL = ?", [$cc, $dtIniTwo, $dtFinTwo]);
                $connection->commit();
            } else {

                $connection->begin();
                $connection->execute("DELETE FROM
					[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
	      			WHERE [centroDeCusto] = '$cc' 
					AND [ANO] = '$yearTwo'");
                $connection->commit();

                $dtIniTwo = strval($yearTwo) . '0101';
                $dtFinTwo = strval($yearTwo) . '1231';

                $connection->begin();
                $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
									@CCUSTO = ?,
									@DT_INICIAL = ?,
									@DT_FINAL = ?", [$cc, $dtIniTwo, $dtFinTwo]);
                $connection->commit();
            }
        } else {

            $existRefOne = $connection->execute("SELECT * FROM 
				[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
				WHERE ANO = '$yearOne'
				AND [centroDeCusto] = '$cc'
				AND LEN([codigo]) = 2")
                    ->fetchAll('assoc');

            if ($existRefOne != []) {

                $connection->begin();
                $connection->execute("DELETE FROM
					[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
	      			WHERE [centroDeCusto] = '$cc' 
	      			AND [MES] = 12
					AND [ANO] = '$yearOne'");
                $connection->commit();


                $dtIniOne = strval($yearOne) . '1201';

                $dtFinOne = strval($yearOne) . '1231';

                $connection->begin();
                $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
									@CCUSTO = ?,
									@DT_INICIAL = ?,
									@DT_FINAL = ?", [$cc, $dtIniOne, $dtFinOne]);
                $connection->commit();
            } else {

                $dtIniOne = strval($yearOne) . '0101';
                $dtFinOne = strval($yearOne) . '1231';

                $connection->begin();
                $connection->execute("DELETE FROM
					[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
	      			WHERE [centroDeCusto] = '$cc' 
					  AND [ANO] = '$yearOne'");
                $connection->commit();

                $connection->begin();
                $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
									@CCUSTO = ?,
									@DT_INICIAL = ?,
									@DT_FINAL = ?", [$cc, $dtIniOne, $dtFinOne]);
                $connection->commit();
            }

            //////////////////////////////
            //////////////////////////////
            //////////////////////////////


            $existRefTwo = $connection->execute("SELECT * FROM 
				[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
				WHERE ANO = '$yearTwo'
				AND [centroDeCusto] = '$cc'
				AND LEN([codigo]) = 2")
                    ->fetchAll('assoc');

            $dtIniTwo = strval($yearTwo) . '1201';
            $dtFinTwo = strval($yearTwo) . '1231';

            if ($existRefTwo != []) {

                $connection->begin();
                $connection->execute("DELETE FROM
					[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
	      			WHERE [centroDeCusto] = '$cc' 
	      			AND [MES] = 12
					AND [ANO] = '$yearTwo'");
                $connection->commit();

                $connection->begin();
                $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
									@CCUSTO = ?,
									@DT_INICIAL = ?,
									@DT_FINAL = ?", [$cc, $dtIniTwo, $dtFinTwo]);
                $connection->commit();
            } else {

                $connection->begin();
                $connection->execute("DELETE FROM
					[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
	      			WHERE [centroDeCusto] = '$cc' 
					AND [ANO] = '$yearTwo'");
                $connection->commit();

                $dtIniTwo = strval($yearTwo) . '0101';
                $dtFinTwo = strval($yearTwo) . '1231';

                $connection->begin();
                $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
									@CCUSTO = ?,
									@DT_INICIAL = ?,
									@DT_FINAL = ?", [$cc, $dtIniTwo, $dtFinTwo]);
                $connection->commit();
            }
        }

        /////////////--------------------------------------------------////////////////
        /////////////--------------------------------------------------////////////////
        /////////////--------------------------------------------------////////////////
        /////////////--------------------------------------------------////////////////
        /////////////--------------------------------------------------////////////////

        $existRefOne = $connection->execute("SELECT * FROM 
			[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
			WHERE ANO = '$yearOne'
			AND [centroDeCusto] = '$cc'
			AND LEN([codigo]) = 2")
                ->fetchAll('assoc');

        $existRefTwo = $connection->execute("SELECT * FROM 
			[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
			WHERE ANO = '$yearTwo'
			AND [centroDeCusto] = '$cc'
			AND LEN([codigo]) = 2")
                ->fetchAll('assoc');

        $this->set(compact('existRefOne', 'existRefTwo', 'cc', 'yearOne', 'yearTwo'));
        $this->set('_serialize', ['existRefOne', 'existRefTwo', 'cc', 'yearOne', 'yearTwo']);
    }

    public function yearlyExpensesTable() {

        $connection = ConnectionManager::get('auxiliar');

        $cc = '01';

        $date = getDate();

        $yearOne = $date['year'];

        $existRefOne = $connection->execute("SELECT * FROM 
			[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
			WHERE ANO = '$yearOne'
			AND [centroDeCusto] = '$cc'
			AND LEN([codigo]) = 2")
                ->fetchAll('assoc');

        if ($existRefOne != [] and $date['mon'] - 2 >= 1) {

            $monthIniDel = $date['mon'] - 2;
            $monthFinDel = $date['mon'];

            $yearOne = $date['year'];

            $connection->begin();
            $connection->execute("DELETE FROM
				[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
      			WHERE [centroDeCusto] = '$cc' 
      			AND [MES] BETWEEN $monthIniDel AND $monthFinDel
				AND [ANO] = '$yearOne'");
            $connection->commit();

            $dtIniOne = strval($yearOne) . $date['mon'] - 2 . '01';
            $dtFinOne = strval($yearOne) . $date['mon'] . '31';

            $connection->begin();
            $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
								@CCUSTO = ?,
								@DT_INICIAL = ?,
								@DT_FINAL = ?", [$cc, $dtIniOne, $dtFinOne]);
            $connection->commit();
        } else {

            $yearOne = $date['year'];
            $dtIniOne = strval($yearOne) . '0101';
            $dtFinOne = strval($yearOne) . '1231';

            $connection->begin();
            $connection->execute("DELETE FROM
				[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
      			WHERE [centroDeCusto] = '$cc' 
				  AND [ANO] = '$yearOne'");
            $connection->commit();

            $connection->begin();
            $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
								@CCUSTO = ?,
								@DT_INICIAL = ?,
								@DT_FINAL = ?", [$cc, $dtIniOne, $dtFinOne]);
            $connection->commit();
        }

        //////////////////////////////
        //////////////////////////////
        //////////////////////////////

        $yearTwo = $date['year'] - 1;

        $existRefTwo = $connection->execute("SELECT * FROM 
			[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
			WHERE ANO = '$yearTwo'
			AND [centroDeCusto] = '$cc'
			AND LEN([codigo]) = 2")
                ->fetchAll('assoc');

        $dtIniTwo = strval($yearTwo) . '1201';
        $dtFinTwo = strval($yearTwo) . '1231';

        if ($existRefTwo != []) {

            $connection->begin();
            $connection->execute("DELETE FROM
				[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
      			WHERE [centroDeCusto] = '$cc' 
      			AND [MES] = 12
				AND [ANO] = '$yearTwo'");
            $connection->commit();

            $connection->begin();
            $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
								@CCUSTO = ?,
								@DT_INICIAL = ?,
								@DT_FINAL = ?", [$cc, $dtIniTwo, $dtFinTwo]);
            $connection->commit();
        } else {

            $connection->begin();
            $connection->execute("DELETE FROM
				[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS]
      			WHERE [centroDeCusto] = '$cc' 
				AND [ANO] = '$yearTwo'");
            $connection->commit();

            $dtIniTwo = strval($yearTwo) . '0101';
            $dtFinTwo = strval($yearTwo) . '1231';

            $connection->begin();
            $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS_MENSAIS] 
								@CCUSTO = ?,
								@DT_INICIAL = ?,
								@DT_FINAL = ?", [$cc, $dtIniTwo, $dtFinTwo]);
            $connection->commit();
        }

        $existRefOne = $connection->execute("SELECT * FROM 
			[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
			WHERE ANO = '$yearOne'
			AND [centroDeCusto] = '$cc'
			AND LEN([codigo]) = 2")
                ->fetchAll('assoc');

        $existRefTwo = $connection->execute("SELECT * FROM 
			[Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA_MENSAIS] 
			WHERE ANO = '$yearTwo'
			AND [centroDeCusto] = '$cc'
			AND LEN([codigo]) = 2")
                ->fetchAll('assoc');

        $this->set(compact('existRefOne', 'existRefTwo', 'cc', 'yearOne', 'yearTwo'));
        $this->set('_serialize', ['existRefOne', 'existRefTwo', 'cc', 'yearOne', 'yearTwo']);
    }

    public function individualExpensesGraphicFilter() {

        $connection = ConnectionManager::get('auxiliar');

        $dayInitial = $this->request->data['dayInitial'];
        $dayFinish = $this->request->data['dayEnd'];
        $month = $this->request->data['month'];
        $yearTableOne = $this->request->data['yearOne'];
        $cc = $this->request->data['cc'];

        $dtIni = strval($yearTableOne) . strval($month) . strval($dayInitial);
        $dtFin = strval($yearTableOne) . strval($month) . strval($dayFinish);

        $connection->begin();
        $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS] 
								@CCUSTO = ?,
								@DT_INICIAL = ?,
								@DT_FINAL = ?", [$cc, $dtIni, $dtFin]);
        $connection->commit();

        $expensesTableOne = $connection->execute("SELECT *
  			FROM [Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA]
  			WHERE LEN([codigo]) = 2
  			ORDER BY [codigo]")
                ->fetchAll('assoc');

        $yearTableTwo = $this->request->data['yearTwo'];
        $dtIni = strval($yearTableTwo) . strval($month) . strval($dayInitial);
        $dtFin = strval($yearTableTwo) . strval($month) . strval($dayFinish);

        $connection->begin();
        $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS] 
								@CCUSTO = ?,
								@DT_INICIAL = ?,
								@DT_FINAL = ?", [$cc, $dtIni, $dtFin]);
        $connection->commit();

        $expensesTableTwo = $connection->execute("SELECT *
  			FROM [Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA]
  			WHERE LEN([codigo]) = 2
  			ORDER BY [codigo]")
                ->fetchAll('assoc');

        $this->set(compact('expensesTableOne', 'expensesTableTwo', 'dayInitial', 'dayFinish', 'month', 'yearTableOne', 'yearTableTwo', 'cc'));
        $this->set('_serialize', ['expensesTableOne', 'expensesTableTwo', 'dayInitial', 'dayFinish', 'month', 'yearTableOne', 'yearTableTwo', 'cc']);
    }

    public function individualExpensesGraphic() {

        $connection = ConnectionManager::get('auxiliar');

        $dayInitial = '01';
        $dayFinish = '31';
        $date = getDate();
        $month = $date['mon'];
        if ($month <= 9) {
            $month = '0' . $month;
        }

        $yearTableOne = $date['year'];
        $dtIni = strval($yearTableOne) . strval($month) . strval($dayInitial);
        $dtFin = strval($yearTableOne) . strval($month) . strval($dayFinish);

        $connection->begin();
        $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS] 
								@CCUSTO = ?,
								@DT_INICIAL = ?,
								@DT_FINAL = ?", ['01', $dtIni, $dtFin]);
        $connection->commit();

        $expensesTableOne = $connection->execute("SELECT *
  			FROM [Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA]
  			WHERE LEN([codigo]) = 2
  			ORDER BY [codigo]")
                ->fetchAll('assoc');

        $yearTableTwo = $yearTableOne - 1;

        $dtIni = strval($yearTableTwo) . strval($month) . strval($dayInitial);
        $dtFin = strval($yearTableTwo) . strval($month) . strval($dayFinish);

        $connection->begin();
        $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS] 
								@CCUSTO = ?,
								@DT_INICIAL = ?,
								@DT_FINAL = ?", ['01', $dtIni, $dtFin]);
        $connection->commit();

        $expensesTableTwo = $connection->execute("SELECT *
  			FROM [Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA]
  			WHERE LEN([codigo]) = 2
  			ORDER BY [codigo]")
                ->fetchAll('assoc');

        $this->set(compact('expensesTableOne', 'expensesTableTwo', 'yearTableOne', 'yearTableTwo'));
        $this->set('_serialize', ['expensesTableOne', 'expensesTableTwo', 'yearTableOne', 'yearTableTwo']);
    }

    public function individualExpensesTableFilter() {

        $connection = ConnectionManager::get('auxiliar');

        $dayInitial = $this->request->data['dayInitial'];
        $dayFinish = $this->request->data['dayEnd'];
        $month = $this->request->data['month'];
        $yearTableOne = $this->request->data['yearOne'];
        $cc = $this->request->data['cc'];

        $dtIni = strval($yearTableOne) . strval($month) . strval($dayInitial);
        $dtFin = strval($yearTableOne) . strval($month) . strval($dayFinish);

        $connection->begin();
        $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS] 
								@CCUSTO = ?,
								@DT_INICIAL = ?,
								@DT_FINAL = ?", [$cc, $dtIni, $dtFin]);
        $connection->commit();

        $yearTableTwo = $this->request->data['yearTwo'];
        $dtIni = strval($yearTableTwo) . strval($month) . strval($dayInitial);
        $dtFin = strval($yearTableTwo) . strval($month) . strval($dayFinish);

        $expensesTableOne = $connection->execute("SELECT *
  			FROM [Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA] ORDER BY [codigo]")
                ->fetchAll('assoc');

        $connection->begin();
        $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS] 
								@CCUSTO = ?,
								@DT_INICIAL = ?,
								@DT_FINAL = ?", [$cc, $dtIni, $dtFin]);
        $connection->commit();

        $expensesTableTwo = $connection->execute("SELECT *
  			FROM [Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA] ORDER BY [codigo]")
                ->fetchAll('assoc');

        $this->set(compact('expensesTableOne', 'expensesTableTwo', 'dayInitial', 'dayFinish', 'month', 'yearTableOne', 'yearTableTwo', 'cc'));
        $this->set('_serialize', ['expensesTableOne', 'expensesTableTwo', 'dayInitial', 'dayFinish', 'month', 'yearTableOne', 'yearTableTwo', 'cc']);
    }

    public function individualExpensesTable() {

        $connection = ConnectionManager::get('auxiliar');

        $dayInitial = '01';
        $dayFinish = '31';
        $date = getDate();
        $month = $date['mon'];
        if ($month <= 9) {
            $month = '0' . $month;
        }

        $yearTableOne = $date['year'];
        $dtIni = strval($yearTableOne) . strval($month) . strval($dayInitial);
        $dtFin = strval($yearTableOne) . strval($month) . strval($dayFinish);

        $connection->begin();
        $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS] 
								@CCUSTO = ?,
								@DT_INICIAL = ?,
								@DT_FINAL = ?", ['01', $dtIni, $dtFin]);
        $connection->commit();

        $yearTableTwo = $yearTableOne - 1;

        $dtIni = strval($yearTableTwo) . strval($month) . strval($dayInitial);
        $dtFin = strval($yearTableTwo) . strval($month) . strval($dayFinish);

        $expensesTableOne = $connection->execute("SELECT *
  			FROM [Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA] ORDER BY [codigo]")
                ->fetchAll('assoc');

        $connection->begin();
        $connection->execute("EXEC [dbo].[SP_TABELADINAMICA_DESPESAS] 
								@CCUSTO = ?,
								@DT_INICIAL = ?,
								@DT_FINAL = ?", ['01', $dtIni, $dtFin]);
        $connection->commit();

        $expensesTableTwo = $connection->execute("SELECT *
  			FROM [Auxiliar].[dbo].[LISTA_DESPESAS_COM_NATUREZA] ORDER BY [codigo]")
                ->fetchAll('assoc');

        $this->set(compact('expensesTableOne', 'expensesTableTwo'));
        $this->set('_serialize', ['expensesTableOne', 'expensesTableTwo']);
    }

    public function RevenueTableFilter() {

        //debug($this->request->data['yearTwo']);

        $oneYear = $this->request->data['yearOne'];
        $twoYear = $this->request->data['yearTwo'];

        $connection = ConnectionManager::get('auxiliar');

        $costCentersNames = $connection->execute("SELECT
			DISTINCT [CENTRO_DE_CUSTO]
			FROM [VW_RECEITAS]
  				WHERE [ANO] BETWEEN '$twoYear' AND '$oneYear'")
                ->fetchAll('assoc');

        $revenueYearCurrent = $connection->execute("SELECT 
			[COD_CENTRO_DE_CUSTO]
      		,[CENTRO_DE_CUSTO]
      		,[MES]
      		,[ANO]
      		,[VALOR]
  			FROM [VW_RECEITAS]
  				WHERE [ANO] = '$oneYear'
  			ORDER BY [COD_CENTRO_DE_CUSTO]")
                ->fetchAll('assoc');

        $revenueYearLast = $connection->execute("SELECT 
			[COD_CENTRO_DE_CUSTO]
      		,[CENTRO_DE_CUSTO]
      		,[MES]
      		,[ANO]
      		,[VALOR]
  			FROM [VW_RECEITAS]
  				WHERE [ANO] = '$twoYear'
  			ORDER BY [COD_CENTRO_DE_CUSTO]")
                ->fetchAll('assoc');

        $this->set(compact('revenueYearLast', 'revenueYearCurrent', 'costCentersNames', 'oneYear', 'twoYear'));
        $this->set('_serialize', ['revenueYearLast', 'revenueYearCurrent', 'costCentersNames', 'oneYear', 'twoYear']);
    }

    public function RevenueTable() {

        $connection = ConnectionManager::get('auxiliar');

        $costCentersNames = $connection->execute("SELECT
			DISTINCT [CENTRO_DE_CUSTO]
			FROM [VW_RECEITAS]
  				WHERE [ANO] BETWEEN YEAR(GETDATE())-1 AND YEAR(GETDATE())")
                ->fetchAll('assoc');

        $revenueYearCurrent = $connection->execute("SELECT 
			[COD_CENTRO_DE_CUSTO]
      		,[CENTRO_DE_CUSTO]
      		,[MES]
      		,[ANO]
      		,[VALOR]
  			FROM [VW_RECEITAS]
  				WHERE [ANO] = YEAR(GETDATE())
  			ORDER BY [COD_CENTRO_DE_CUSTO]")
                ->fetchAll('assoc');

        $revenueYearLast = $connection->execute("SELECT 
			[COD_CENTRO_DE_CUSTO]
      		,[CENTRO_DE_CUSTO]
      		,[MES]
      		,[ANO]
      		,[VALOR]
  			FROM [VW_RECEITAS]
  				WHERE [ANO] = YEAR(GETDATE())-1
  			ORDER BY [COD_CENTRO_DE_CUSTO]")
                ->fetchAll('assoc');

        $this->set(compact('revenueYearLast', 'revenueYearCurrent', 'costCentersNames'));
        $this->set('_serialize', ['revenueYearLast', 'revenueYearCurrent', 'costCentersNames']);
    }

    public function RevenueGraphic() {

        $connection = ConnectionManager::get('auxiliar');

        $costCentersNames = $connection->execute("SELECT
			DISTINCT [CENTRO_DE_CUSTO]
			FROM [VW_RECEITAS]
  				WHERE [ANO] BETWEEN YEAR(GETDATE())-1 AND YEAR(GETDATE())")
                ->fetchAll('assoc');


        $revenueYearCurrent = $connection->execute("SELECT 
			[COD_CENTRO_DE_CUSTO]
      		,[CENTRO_DE_CUSTO]
      		,[MES]
      		,[ANO]
      		,[VALOR]
  			FROM [VW_RECEITAS]
  				WHERE [ANO] = YEAR(GETDATE())
  			ORDER BY [COD_CENTRO_DE_CUSTO]")
                ->fetchAll('assoc');

        $revenueYearLast = $connection->execute("SELECT 
			[COD_CENTRO_DE_CUSTO]
      		,[CENTRO_DE_CUSTO]
      		,[MES]
      		,[ANO]
      		,[VALOR]
  			FROM [VW_RECEITAS]
  				WHERE [ANO] = YEAR(GETDATE())-1
  			ORDER BY [COD_CENTRO_DE_CUSTO]")
                ->fetchAll('assoc');


        $this->set(compact('revenueYearLast', 'revenueYearCurrent', 'costCentersNames'));
        $this->set('_serialize', ['revenueYearLast', 'revenueYearCurrent', 'costCentersNames']);
    }

    public function PerCapitaExtraHoursCost() {

        $connection = ConnectionManager::get('baseProtheus');

        $extraHour = $connection->execute("SELECT 
				SUM([RD_VALOR]) SUM
		     	,[RD_DATARQ]
		  		,[CTT_DESC01] 
		  		,[RD_CC]
			FROM [SRD010] 
			INNER JOIN [CTT010] ON [CTT_CUSTO] = [RD_CC]
				WHERE [SRD010].[D_E_L_E_T_] <> '*' 
				AND SUBSTRING([RD_DATARQ],1,4) = YEAR(GETDATE()) 
				AND [RD_PD] IN('109','117','118','123','157','229')
			GROUP BY [RD_DATARQ],[CTT_DESC01],[RD_CC]
			ORDER BY [RD_DATARQ] ASC")
                ->fetchAll('assoc');

        $staffPerMonth = $connection->execute("SELECT    
		    COUNT([RD_PD]) as CONT      
		    ,[RD_DATARQ]
		    ,[RD_CC]
			,[CTT_DESC01] 
			FROM [SRD010] 
			INNER JOIN [CTT010] ON [CTT_CUSTO] = [RD_CC]
				WHERE [SRD010].[D_E_L_E_T_] <> '*'
					AND SUBSTRING([RD_DATARQ],1,4) = YEAR(GETDATE())
					AND [RD_PD] = '101'
					AND [RD_DATARQ] 
						BETWEEN 
							( substring(convert(varchar(10),DATEADD(m, -12, current_timestamp), 103),7,5) 
							+ substring(convert(varchar(10),DATEADD(m, -12, current_timestamp), 103),4,2) )
							AND 
							( select max([RD_DATARQ]) FROM [SRD010] )
				GROUP BY [RD_CC],[RD_DATARQ],[CTT_DESC01] 
				ORDER BY [RD_CC],[RD_DATARQ] ")
                ->fetchAll('assoc');

        $this->set(compact('extraHour', 'staffPerMonth'));
        $this->set('_serialize', ['extraHour', 'staffPerMonth']);
    }

    public function OvertimeVersusPay() {
        $connection = ConnectionManager::get('baseProtheus');

        $salary = $connection->execute("SELECT 
			  	SUM([RD_VALOR]) SUM
		     	,[RD_DATARQ]
		  		,[CTT_DESC01] 
		  		,[RD_CC]
			FROM [SRD010] 
			INNER JOIN [CTT010] ON [CTT_CUSTO] = [RD_CC]
				WHERE [SRD010].[D_E_L_E_T_] <> '*' 
					AND SUBSTRING([RD_DATARQ],1,4) = YEAR(GETDATE()) 
					AND [RD_PD] IN ('101','102')
			GROUP BY [RD_DATARQ],[CTT_DESC01],[RD_CC]
			ORDER BY [RD_DATARQ] ASC")
                ->fetchAll('assoc');

        $extraHour = $connection->execute("SELECT 
				SUM([RD_VALOR]) SUM
		     	,[RD_DATARQ]
		  		,[CTT_DESC01] 
		  		,[RD_CC]
			FROM [SRD010] 
			INNER JOIN [CTT010] ON [CTT_CUSTO] = [RD_CC]
				WHERE [SRD010].[D_E_L_E_T_] <> '*' 
				AND SUBSTRING([RD_DATARQ],1,4) = YEAR(GETDATE()) 
				AND [RD_PD] IN('109','117','118','123','157','229')
			GROUP BY [RD_DATARQ],[CTT_DESC01],[RD_CC]
			ORDER BY [RD_DATARQ] ASC")
                ->fetchAll('assoc');

        $this->set(compact('salary', 'extraHour'));
        $this->set('_serialize', ['salary', 'extraHour']);
    }

    public function StaffPerMonth() {
        $connection = ConnectionManager::get('baseProtheus');

        $staffPerMonth = $connection->execute("SELECT    
		    COUNT([RD_PD]) as CONT      
		    ,[RD_DATARQ]
		    ,[RD_CC]
			,[CTT_DESC01] 
			FROM [SRD010] 
			INNER JOIN [CTT010] ON [CTT_CUSTO] = [RD_CC]
				WHERE [SRD010].[D_E_L_E_T_] <> '*'
					AND SUBSTRING([RD_DATARQ],1,4) = YEAR(GETDATE())
					AND [RD_PD] = '101'
					AND [RD_DATARQ] 
						BETWEEN 
							( substring(convert(varchar(10),DATEADD(m, -12, current_timestamp), 103),7,5) 
							+ substring(convert(varchar(10),DATEADD(m, -12, current_timestamp), 103),4,2) )
							AND 
							( select max([RD_DATARQ]) FROM [SRD010] )
				GROUP BY [RD_CC],[RD_DATARQ],[CTT_DESC01] 
				ORDER BY [RD_CC],[RD_DATARQ] ")
                ->fetchAll('assoc');

        $this->set(compact('staffPerMonth'));
        $this->set('_serialize', ['staffPerMonth']);
    }

    public function CostOvertime() {

        $connection = ConnectionManager::get('baseProtheus');

        $extraHourYearCurrent = $connection->execute("SELECT 
			SUM([RD_VALOR]) AS SOMA
			,[RD_CC]
			,[RD_PD]
			,[RD_DATARQ] 
			,[CTT_DESC01] 
			FROM [SRD010] 
			INNER JOIN [CTT010] ON [CTT_CUSTO] = [RD_CC]
				WHERE [SRD010].[D_E_L_E_T_] <> '*' 
					AND SUBSTRING([RD_DATARQ],1,4) = YEAR(GETDATE()) 
					AND [RD_PD] IN('109','117','118','123','157','229') 
				GROUP BY [RD_DATARQ],[RD_CC],[RD_PD],[CTT_DESC01]
				ORDER BY [RD_CC],[RD_DATARQ],[RD_PD] ")
                ->fetchAll('assoc');

        $extraHourLastYear = $connection->execute("SELECT 
			SUM([RD_VALOR]) AS SOMA
			,[RD_CC]
			,[RD_PD]
			,[RD_DATARQ] 
			,[CTT_DESC01] 
			FROM [SRD010] 
			INNER JOIN [CTT010] ON [CTT_CUSTO] = [RD_CC]
				WHERE [SRD010].[D_E_L_E_T_] <> '*' 
					AND SUBSTRING([RD_DATARQ],1,4) = YEAR(GETDATE()) -1
					AND [RD_PD] IN('109','117','118','123','157','229') 
				GROUP BY [RD_DATARQ],[RD_CC],[RD_PD],[CTT_DESC01]
				ORDER BY [RD_CC],[RD_DATARQ],[RD_PD] ")
                ->fetchAll('assoc');

        $extraHourLastSixMonths = $connection->execute("SELECT 
			SUM([RD_VALOR]) AS SOMA
			,[RD_CC]
			,[RD_PD]
			,[RD_DATARQ] 
			,[CTT_DESC01] 
			FROM [SRD010] 
			INNER JOIN [CTT010] ON [CTT_CUSTO] = [RD_CC]
				WHERE [SRD010].[D_E_L_E_T_] <> '*' 
					AND [RD_DATARQ] 
						BETWEEN 
							( substring(convert(varchar(10),DATEADD(m, -7, current_timestamp), 103),7,5) 
							+ substring(convert(varchar(10),DATEADD(m, -7, current_timestamp), 103),4,2) )
							AND 
							( select max([RD_DATARQ]) FROM [SRD010] )
					AND [RD_PD] IN('109','117','118','123','157','229') 
				GROUP BY [RD_DATARQ],[RD_CC],[RD_PD],[CTT_DESC01]
				ORDER BY [RD_CC],[RD_DATARQ],[RD_PD]")
                ->fetchAll('assoc');

        $this->set(compact('extraHourYearCurrent', 'extraHourLastSixMonths', 'extraHourLastYear'));
        $this->set('_serialize', ['extraHourYearCurrent', 'extraHourLastSixMonths', 'extraHourLastYear']);
    }

}

?>