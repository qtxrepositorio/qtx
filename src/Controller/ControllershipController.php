<?php

namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;
use Cake\Datasource\ConnectionManager;

class ControllershipController extends AppController {
    
    public function TaxedExpensesPdf(){
        
        $connection = ConnectionManager::get('baseProtheus');
        
        $year = $this->request->data['yearPdf'];
              
        $cc = $this->request->data['ccPdf']; 
        
        $ccpdf = $this->request->data['ccPdf']; 
        
        $cc = substr($cc,0,2);
        
        if ($cc != 'TO'){
            
            $icms = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42103001') 
                    AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
            $iss = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42103002') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $cofins = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42103003') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $pis = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42103004') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $irpj = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42103005') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $csll = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42103006') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $ipva = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42103007') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $iptu = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42103008') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $itbi = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42103009') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $fecoep = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42103010') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');     
            
        }else{
            $icms = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42103001') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
            $iss = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42103002') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $cofins = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42103003') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $pis = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42103004') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $irpj = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42103005') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $csll = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42103006') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $ipva = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42103007') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $iptu = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42103008') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $itbi = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42103009') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $fecoep = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42103010') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');            
        }
        
        $this->set(compact('ccpdf','year','icms','iss','cofins','pis','irpj','csll','ipva','iptu','itbi','fecoep'));
        $this->set('_serialize', ['ccpdf','year','icms','iss','cofins','pis','irpj','csll','ipva','iptu','itbi','fecoep']);
                
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
        
    }
    
    public function TaxedExpensesFilter(){
        
        $year = $this->request->data['year'];
        
        $connection = ConnectionManager::get('baseProtheus');
        
        $icms = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42103001') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $iss = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42103002') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $cofins = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42103003') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $pis = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42103004') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $irpj = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42103005') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $csll = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42103006') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $ipva = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42103007') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $iptu = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42103008') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $itbi = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42103009') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $fecoep = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42103010') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $this->set(compact('year','icms','iss','cofins','pis','irpj','csll','ipva','iptu','itbi','fecoep'));
        $this->set('_serialize', ['year','icms','iss','cofins','pis','irpj','csll','ipva','iptu','itbi','fecoep']);
        
    }
    
    public function TaxedExpenses(){
        
        $connection = ConnectionManager::get('baseProtheus');
        
        $icms = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42103001') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $iss = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42103002') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $cofins = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42103003') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $pis = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42103004') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $irpj = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42103005') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $csll = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42103006') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $ipva = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42103007') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $iptu = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42103008') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $itbi = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42103009') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $fecoep = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42103010') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $this->set(compact('icms','iss','cofins','pis','irpj','csll','ipva','iptu','itbi','fecoep'));
        $this->set('_serialize', ['icms','iss','cofins','pis','irpj','csll','ipva','iptu','itbi','fecoep']);
        
    }
    
    public function InvestmentExpensesPdf (){
        
        $connection = ConnectionManager::get('baseProtheus');
        
        $year = $this->request->data['yearPdf'];
              
        $cc = $this->request->data['ccPdf']; 
        
        $ccpdf = $this->request->data['ccPdf']; 
        
        $cc = substr($cc,0,2);
        
        if ($cc != 'TO'){
            
            $furnitureAndUtensils = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('13201001') 
                    AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
            
            $machinesAndEquipment = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('13201005','13201009','13201010','13201011','13201014') 
                    AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
            
            $vehicles = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('13201007','13201008') 
                    AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
            
        }else{
            
            $furnitureAndUtensils = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('13201001') 
                    AND D_E_L_E_T_ != '*' 
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
            
            $machinesAndEquipment = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('13201005','13201009','13201010','13201011','13201014') 
                    AND D_E_L_E_T_ != '*' 
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
            
            $vehicles = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('13201007','13201008') 
                    AND D_E_L_E_T_ != '*' 
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
                     
        }
        
        $this->set(compact('ccpdf','year','furnitureAndUtensils','machinesAndEquipment','vehicles'));
        $this->set('_serialize', ['ccpdf','year','furnitureAndUtensils','machinesAndEquipment','vehicles']);
                
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
        
        
    }
    
    public function InvestmentExpensesFilter (){
        
        $connection = ConnectionManager::get('baseProtheus');
        
        $year = $this->request->data['year'];
        
        $furnitureAndUtensils = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('13201001') 
                    AND D_E_L_E_T_ != '*' 
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
            
        $machinesAndEquipment = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('13201005','13201009','13201010','13201011','13201014') 
                    AND D_E_L_E_T_ != '*' 
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
            
        $vehicles = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('13201007','13201008') 
                    AND D_E_L_E_T_ != '*' 
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $this->set(compact('year','furnitureAndUtensils','machinesAndEquipment','vehicles'));
        $this->set('_serialize', ['year','furnitureAndUtensils','machinesAndEquipment','vehicles']);
        
    }
    
    public function InvestmentExpenses (){
        
        $connection = ConnectionManager::get('baseProtheus');
        
        $furnitureAndUtensils = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('13201001') 
                    AND D_E_L_E_T_ != '*' 
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
            
        $machinesAndEquipment = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('13201005','13201009','13201010','13201011','13201014') 
                    AND D_E_L_E_T_ != '*' 
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
            
        $vehicles = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('13201007','13201008') 
                    AND D_E_L_E_T_ != '*' 
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $this->set(compact('furnitureAndUtensils','machinesAndEquipment','vehicles'));
        $this->set('_serialize', ['furnitureAndUtensils','machinesAndEquipment','vehicles']);
        
    }

    public function FinancialExpensesPdf(){
        
        $connection = ConnectionManager::get('baseProtheus');
        
        $year = $this->request->data['yearPdf'];
              
        $cc = $this->request->data['ccPdf']; 
        
        $ccpdf = $this->request->data['ccPdf']; 
        
        $cc = substr($cc,0,2);
        
        if ($cc != 'TO'){
            
            $rates = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103022','42102022') 
                    AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
            $interestCosts = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42104001') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $discountsGiven = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42104002') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $bankExpenses = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42104003') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');  

            $fines = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42104004') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc'); 

            $iof = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42104005') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc'); 

            $ioc = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42104006') 
                        AND D_E_L_E_T_ != '*'  AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc'); 

            $bankInterestRate = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42104007') 
                        AND D_E_L_E_T_ != '*'  AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc'); 

            $financialCharges = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42104008') 
                        AND D_E_L_E_T_ != '*'  AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc'); 

            $irs = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42104009') 
                        AND D_E_L_E_T_ != '*'  AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');
            
        }else{
            
           $rates = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103022','42102022') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
            $interestCosts = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42104001') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $discountsGiven = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42104002') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');

            $bankExpenses = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42104003') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');  

            $fines = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42104004') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc'); 

            $iof = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42104005') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc'); 

            $ioc = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42104006') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc'); 

            $bankInterestRate = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42104007') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc'); 

            $financialCharges = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42104008') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc'); 

            $irs = $connection->execute("
                    SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('42104009') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                                ->fetchAll('assoc');
            
        }
        
        $this->set(compact('ccpdf','rates','interestCosts','discountsGiven','bankExpenses','fines','iof','ioc','bankInterestRate','financialCharges','irs'));
        $this->set('_serialize', ['ccpdf','rates','interestCosts','discountsGiven','bankExpenses','fines','iof','ioc','bankInterestRate','financialCharges','irs']);
      
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
        
    }
    
    public function FinancialExpensesFilter(){
        
        $year = $this->request->data['year'];
        
        $connection = ConnectionManager::get('baseProtheus');
        
        $rates = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103022','42102022') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $interestCosts = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42104001') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $discountsGiven = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42104002') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $bankExpenses = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42104003') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');  
        
        $fines = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42104004') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc'); 
        
        $iof = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42104005') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc'); 
        
        $ioc = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42104006') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc'); 
        
        $bankInterestRate = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42104007') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc'); 
       
        $financialCharges = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42104008') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc'); 
        
        $irs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('42104009') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc'); 
        
        $this->set(compact('year','rates','interestCosts','discountsGiven','bankExpenses','fines','iof','ioc','bankInterestRate','financialCharges','irs'));
        $this->set('_serialize', ['year','rates','interestCosts','discountsGiven','bankExpenses','fines','iof','ioc','bankInterestRate','financialCharges','irs']);
               
    }
    
    public function FinancialExpenses(){
        
        $connection = ConnectionManager::get('baseProtheus');
        
        $rates = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('41103022','42102022') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $interestCosts = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42104001') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $discountsGiven = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42104002') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');
        
        $bankExpenses = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42104003') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');  
        
        $fines = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42104004') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc'); 
        
        $iof = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42104005') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc'); 
        
        $ioc = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42104006') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc'); 
        
        $bankInterestRate = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42104007') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc'); 
       
        $financialCharges = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42104008') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc'); 
        
        $irs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('42104009') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc'); 
        
        $this->set(compact('rates','interestCosts','discountsGiven','bankExpenses','fines','iof','ioc','bankInterestRate','financialCharges','irs'));
        $this->set('_serialize', ['rates','interestCosts','discountsGiven','bankExpenses','fines','iof','ioc','bankInterestRate','financialCharges','irs']);
       
        
    }

    public function AdministrativeExpensesPdf() {
        
        $year = $this->request->data['yearPdf'];
              
        $connection = ConnectionManager::get('baseProtheus');
        
        $cc = $this->request->data['ccPdf']; 
        
        $ccpdf = $this->request->data['ccPdf']; 
        
        $cc = substr($cc,0,2);
        
        if ($cc != 'TO'){
        
            $rent = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103004','42102002') 
                    AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');

            $phoneAndInternet = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103003','42102003') 
                    AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');

            $electricity = $connection->execute("
                SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41103002','42102029') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');

            $waterAndSewage = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103001','42102001') 
                    AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');

            $officeSupplies = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103015','41103047','42102015','42102048') 
                    AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');

            $cleaningSupplies = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103033','42102035') 
                    AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');

            $others = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103007','41103016','41103018','41103019','41103024','41103037'
                                        ,'41103038','42102004','42102016','42102018','42102019','42102024'
                                        ,'42102039','42102045','42102047') 
                    AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
            ->fetchAll('assoc');
            
        }else{
            
            $rent = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103004','42102002') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');

            $phoneAndInternet = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103003','42102003') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');

            $electricity = $connection->execute("
                SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41103002','42102029') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');

            $waterAndSewage = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103001','42102001') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');

            $officeSupplies = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103015','41103047','42102015','42102048') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');

            $cleaningSupplies = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103033','42102035') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                            ->fetchAll('assoc');

            $others = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103007','41103016','41103018','41103019','41103024','41103037'
                                        ,'41103038','42102004','42102016','42102018','42102019','42102024'
                                        ,'42102039','42102045','42102047') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
            ->fetchAll('assoc');
            
        }
        
        $this->set(compact('ccpdf','year','rent','phoneAndInternet','electricity','waterAndSewage','officeSupplies','cleaningSupplies','others'));
        $this->set('_serialize', ['ccpdf','year','rent','phoneAndInternet','electricity','waterAndSewage','officeSupplies','cleaningSupplies','others']);
       
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
    }
    
    public function AdministrativeExpensesFilter() {
        
        $year = $this->request->data['year'];
              
        $connection = ConnectionManager::get('baseProtheus');
        
        $rent = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = '$year'
                AND [CT2_DEBITO] in ('41103004','42102002') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                        ->fetchAll('assoc');
        
        $phoneAndInternet = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = '$year'
                AND [CT2_DEBITO] in ('41103003','42102003') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                        ->fetchAll('assoc');
        
        $electricity = $connection->execute("
            SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103002','42102029') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                        ->fetchAll('assoc');
        
        $waterAndSewage = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = '$year'
                AND [CT2_DEBITO] in ('41103001','42102001') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                        ->fetchAll('assoc');
        
        $officeSupplies = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = '$year'
                AND [CT2_DEBITO] in ('41103015','41103047','42102015','42102048') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                        ->fetchAll('assoc');
        
        $cleaningSupplies = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = '$year'
                AND [CT2_DEBITO] in ('41103033','42102035') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                        ->fetchAll('assoc');
        
        $others = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = '$year'
                AND [CT2_DEBITO] in ('41103007','41103016','41103018','41103019','41103024','41103037'
                                    ,'41103038','42102004','42102016','42102018','42102019','42102024'
                                    ,'42102039','42102045','42102047') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
        ->fetchAll('assoc');
        
        $this->set(compact('year','rent','phoneAndInternet','electricity','waterAndSewage','officeSupplies','cleaningSupplies','others'));
        $this->set('_serialize', ['year','rent','phoneAndInternet','electricity','waterAndSewage','officeSupplies','cleaningSupplies','others']);
       
        
    }
   
    public function AdministrativeExpenses() {
      
        $connection = ConnectionManager::get('baseProtheus');
        
        $rent = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                AND [CT2_DEBITO] in ('41103004','42102002') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                        ->fetchAll('assoc');
        
        $phoneAndInternet = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                AND [CT2_DEBITO] in ('41103003','42102003') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                        ->fetchAll('assoc');
        
        $electricity = $connection->execute("
            SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('41103002','42102029') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                        ->fetchAll('assoc');
        
        $waterAndSewage = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                AND [CT2_DEBITO] in ('41103001','42102001') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                        ->fetchAll('assoc');
        
        $officeSupplies = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                AND [CT2_DEBITO] in ('41103015','41103047','42102015','42102048') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                        ->fetchAll('assoc');
        
        $cleaningSupplies = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                AND [CT2_DEBITO] in ('41103033','42102035') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                        ->fetchAll('assoc');
        
        $others = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                AND [CT2_DEBITO] in ('41103007','41103016','41103018','41103019','41103024','41103037'
                                    ,'41103038','42102004','42102016','42102018','42102019','42102024'
                                    ,'42102039','42102045','42102047') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
        ->fetchAll('assoc');
        
        $this->set(compact('rent','phoneAndInternet','electricity','waterAndSewage','officeSupplies','cleaningSupplies','others'));
        $this->set('_serialize', ['rent','phoneAndInternet','electricity','waterAndSewage','officeSupplies','cleaningSupplies','others']);
       
        
    }
    
    
    public function OperationalExpensesPdf() {
        
        $year = $this->request->data['yearPdf'];
        
        $connection = ConnectionManager::get('baseProtheus');
        
        
        $cc = $this->request->data['ccPdf']; 
        
        $ccpdf = $this->request->data['ccPdf']; 
        
        $cc = substr($cc,0,2);
        
        if ($cc != 'TO'){
        
            $maintenance = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103008','41103035'
                                        ,'41103031','41103041','41103045'
                                        ,'42102005','42102027','42102033'
                                        ,'42103037','42102042') 
                    AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                        ->fetchAll('assoc'); 

            $fines = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41103044','42102044') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                        ->fetchAll('assoc'); 

            $tires = $connection->execute("SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103032','42102034') 
                    AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                ->fetchAll('assoc'); 

            $fuelAndLubricants = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41103023','42102023') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                ->fetchAll('assoc'); 

            $rents = $connection->execute("SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103005','42102008','41103006','42102025') 
                    AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                ->fetchAll('assoc'); 

            $freight = $connection->execute("
                SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103009','41103014','41103042','42102006','42102014','42102043') 
                    AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                ->fetchAll('assoc'); 

            $materials = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41103017','41103027','41103028','41103040'
                                            ,'41103043','41201001','42102017','42102028'
                                            ,'42102030','42102041') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                ->fetchAll('assoc');

            $various = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103020','41103021','42102020','42102021') 
                    AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                ->fetchAll('assoc');
        }else{
            
            $maintenance = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103008','41103035'
                                        ,'41103031','41103041','41103045'
                                        ,'42102005','42102027','42102033'
                                        ,'42103037','42102042') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                        ->fetchAll('assoc'); 

            $fines = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41103044','42102044') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                        ->fetchAll('assoc'); 

            $tires = $connection->execute("SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103032','42102034') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                ->fetchAll('assoc'); 

            $fuelAndLubricants = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41103023','42102023') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                ->fetchAll('assoc'); 

            $rents = $connection->execute("SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103005','42102008','41103006','42102025') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                ->fetchAll('assoc'); 

            $freight = $connection->execute("
                SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103009','41103014','41103042','42102006','42102014','42102043') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                ->fetchAll('assoc'); 

            $materials = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41103017','41103027','41103028','41103040'
                                            ,'41103043','41201001','42102017','42102028'
                                            ,'42102030','42102041') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                ->fetchAll('assoc');

            $various = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103020','41103021','42102020','42102021') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                ->fetchAll('assoc');
            
        }

        $this->set(compact('ccpdf','year','maintenance','fines','tires','fuelAndLubricants','rents','freight','materials','various'));
        $this->set('_serialize', ['ccpdf','year','maintenance','fines','tires','fuelAndLubricants','rents','freight','materials','various']);
       
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
    }
    
    public function OperationalExpensesFilter() {
        
        $year = $this->request->data['year'];
        
        $connection = ConnectionManager::get('baseProtheus');
        
        $maintenance = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = '$year'
                AND [CT2_DEBITO] in ('41103008','41103035'
                                    ,'41103031','41103041','41103045'
                                    ,'42102005','42102027','42102033'
                                    ,'42103037','42102042') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                    ->fetchAll('assoc'); 
        
        $fines = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103044','42102044') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                    ->fetchAll('assoc'); 
        
        $tires = $connection->execute("SELECT 
            SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = '$year'
                AND [CT2_DEBITO] in ('41103032','42102034') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
            ->fetchAll('assoc'); 
        
        $fuelAndLubricants = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103023','42102023') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
            ->fetchAll('assoc'); 
        
        $rents = $connection->execute("SELECT 
            SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = '$year'
                AND [CT2_DEBITO] in ('41103005','42102008','41103006','42102025') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
            ->fetchAll('assoc'); 
        
        $freight = $connection->execute("
            SELECT 
            SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = '$year'
                AND [CT2_DEBITO] in ('41103009','41103014','41103042','42102006','42102014','42102043') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
            ->fetchAll('assoc'); 
        
        $materials = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = '$year'
                    AND [CT2_DEBITO] in ('41103017','41103027','41103028','41103040'
                                        ,'41103043','41201001','42102017','42102028'
                                        ,'42102030','42102041') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
            ->fetchAll('assoc');
        
        $various = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = '$year'
                AND [CT2_DEBITO] in ('41103020','41103021','42102020','42102021') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
            ->fetchAll('assoc');
        
        $this->set(compact('year','maintenance','fines','tires','fuelAndLubricants','rents','freight','materials','various'));
        $this->set('_serialize', ['year','maintenance','fines','tires','fuelAndLubricants','rents','freight','materials','various']);
        
    }
    
    public function OperationalExpenses() {
        
        $connection = ConnectionManager::get('baseProtheus');
        
        $maintenance = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                AND [CT2_DEBITO] in ('41103008','41103035'
                                    ,'41103031','41103041','41103045'
                                    ,'42102005','42102027','42102033'
                                    ,'42103037','42102042') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                    ->fetchAll('assoc'); 
        
        $fines = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('41103044','42102044') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
                    ->fetchAll('assoc'); 
        
        $tires = $connection->execute("SELECT 
            SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                AND [CT2_DEBITO] in ('41103032','42102034') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
            ->fetchAll('assoc'); 
        
        $fuelAndLubricants = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('41103023','42102023') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
            ->fetchAll('assoc'); 
        
        $rents = $connection->execute("SELECT 
            SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                AND [CT2_DEBITO] in ('41103005','42102008','41103006','42102025') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
            ->fetchAll('assoc'); 
        
        $freight = $connection->execute("
            SELECT 
            SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                AND [CT2_DEBITO] in ('41103009','41103014','41103042','42102006','42102014','42102043') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
            ->fetchAll('assoc'); 
        
        $materials = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                    AND [CT2_DEBITO] in ('41103017','41103027','41103028','41103040'
                                        ,'41103043','41201001','42102017','42102028'
                                        ,'42102030','42102041') 
                    AND D_E_L_E_T_ != '*'
                GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
            ->fetchAll('assoc');
        
        $various = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            , [CT2_CCD]
            , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                AND [CT2_DEBITO] in ('41103020','41103021','42102020','42102021') 
                AND D_E_L_E_T_ != '*'
            GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")
            ->fetchAll('assoc');
        
        $this->set(compact('maintenance','fines','tires','fuelAndLubricants','rents','freight','materials','various'));
        $this->set('_serialize', ['maintenance','fines','tires','fuelAndLubricants','rents','freight','materials','various']);
        
        
    }
    
    public function PersonnelExpensesPdf() {
        
        $connection = ConnectionManager::get('baseProtheus');
        
        //debug($this->request->data);
        
        $year = $this->request->data['yearPdf']; 
        $cc = $this->request->data['ccPdf']; 
        
        $ccpdf = $this->request->data['ccPdf']; 
        
        $cc = substr($cc,0,2);
        
        if ($cc != 'TO'){
            
             //quadro de pessoal
            $staffPerMonth = $connection->execute("
                SELECT  
                    COUNT([RD_PD]) as CONT      
                    ,[RD_DATARQ]
                    ,[RD_CC]            
                    FROM [SRD010]
                        WHERE [SRD010].[D_E_L_E_T_] <> '*'
                            AND [RD_PD] = '101'
                            AND SUBSTRING([RD_DATARQ],0,5) = '$year'
                            AND [RD_CC] = '$cc'
                        GROUP BY [RD_CC],[RD_DATARQ]
                        ORDER BY [RD_CC],[RD_DATARQ]")
                    ->fetchAll('assoc');   
            
            $outehs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101018','41101022','41101023') 
                            AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');  


            $coursesAndTraining = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41103036','42103036') 
                            AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');


            //meteriais de segurança
            $safetyEquipment = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101019','41101020') 
                            AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');   

            //assistencia medica
            $medical = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101016','42101016','41101017','42101017') 
                            AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');     

            //tanstporte
            $transport = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101014','42101014','41101021','42101021') 
                            AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');         

            // alimentação
            $feeding = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101015','42101015') 
                            AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc'); 

            //encargos sociais
            $socialCharges = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101012','41101013','42101012','42101013') 
                            AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc'); 

            //premios e gratificações
            $prizesAndGratuities = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101024','42101024','41101005','42101005') 
                            AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc'); 

            //hora extra
            $internshipBag = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101006','42101006') 
                            AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                ")->fetchAll('assoc'); 

            //hora extra
            $extraHour = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101008','42101008') 
                            AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                ")->fetchAll('assoc'); 

            //prolabore
            $prolabore = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101004','42101004') 
                            AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                ")->fetchAll('assoc'); 

            //proventos        
            $earnings = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101001','41101002','41101003'
                                                ,'41101009','41101010','41101011','41101025'
                                                ,'41101026','42101001','42101002','42101003'
                                                ,'42101009','42101010','42101011','41101007','42101007') 
                            AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                        ")->fetchAll('assoc'); 
        
        }else{
            
            //quadro de pessoal
            $staffPerMonth = $connection->execute("
                SELECT  
                    COUNT([RD_PD]) as CONT      
                    ,[RD_DATARQ]
                    ,[RD_CC]            
                    FROM [SRD010]
                        WHERE [SRD010].[D_E_L_E_T_] <> '*'
                            AND [RD_PD] = '101'
                            AND SUBSTRING([RD_DATARQ],0,5) = '$year'
                        GROUP BY [RD_CC],[RD_DATARQ]
                        ORDER BY [RD_CC],[RD_DATARQ]")
                    ->fetchAll('assoc');   
            
            $outehs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101018','41101022','41101023') 
                            AND D_E_L_E_T_ != '*' 
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');  


            $coursesAndTraining = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41103036','42103036') 
                            AND D_E_L_E_T_ != '*' 
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');


            //meteriais de segurança
            $safetyEquipment = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101019','41101020') 
                            AND D_E_L_E_T_ != '*' 
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');   

            //assistencia medica
            $medical = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101016','42101016','41101017','42101017') 
                            AND D_E_L_E_T_ != '*' 
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');     

            //tanstporte
            $transport = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101014','42101014','41101021','42101021') 
                            AND D_E_L_E_T_ != '*' 
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');         

            // alimentação
            $feeding = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101015','42101015') 
                            AND D_E_L_E_T_ != '*' 
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc'); 

            //encargos sociais
            $socialCharges = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101012','41101013','42101012','42101013') 
                            AND D_E_L_E_T_ != '*' 
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc'); 

            //premios e gratificações
            $prizesAndGratuities = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101024','42101024','41101005','42101005') 
                            AND D_E_L_E_T_ != '*' 
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc'); 

            //hora extra
            $internshipBag = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101006','42101006') 
                            AND D_E_L_E_T_ != '*' 
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                ")->fetchAll('assoc'); 

            //hora extra
            $extraHour = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101008','42101008') 
                            AND D_E_L_E_T_ != '*' 
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                ")->fetchAll('assoc'); 

            //prolabore
            $prolabore = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101004','42101004') 
                            AND D_E_L_E_T_ != '*'
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                ")->fetchAll('assoc'); 

            //proventos        
            $earnings = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCD]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,4) = '$year'
                            AND [CT2_DEBITO] in ('41101001','41101002','41101003'
                                                ,'41101009','41101010','41101011','41101025'
                                                ,'41101026','42101001','42101002','42101003'
                                                ,'42101009','42101010','42101011','41101007','42101007') 
                            AND D_E_L_E_T_ != '*' 
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                        ")->fetchAll('assoc'); 
        
            
        }
       
        $this->set(compact('ccpdf','year','staffPerMonth','outehs','coursesAndTraining','safetyEquipment','medical','transport','feeding','socialCharges','prizesAndGratuities','internshipBag','extraHour','prolabore','earnings'));
        $this->set('_serialize', ['ccpdf','year','staffPerMonth','outehs','coursesAndTraining','safetyEquipment','medical','transport','feeding','socialCharges','prizesAndGratuities','internshipBag','extraHour','prolabore','earnings']);
        
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
        
    }
    
    public function PersonnelExpensesFilter() {
        
        $connection = ConnectionManager::get('baseProtheus');
        
        $year = $this->request->data['year']; 
        
        //quadro de pessoal
        $staffPerMonth = $connection->execute("
            SELECT  
                COUNT([RD_PD]) as CONT      
                ,[RD_DATARQ]
                ,[RD_CC]            
                FROM [SRD010]
                    WHERE [SRD010].[D_E_L_E_T_] <> '*'
                        AND [RD_PD] = '101'
                        AND SUBSTRING([RD_DATARQ],0,5) = '$year'                
                    GROUP BY [RD_CC],[RD_DATARQ]
                    ORDER BY [RD_CC],[RD_DATARQ]")
                ->fetchAll('assoc');      
        
        //outras despesas
        $outehs = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41101018','41101022','41101023') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');  
        
        //cursos e treinamentos
        $coursesAndTraining = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41103036','42103036') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');

        
        //meteriais de segurança
        $safetyEquipment = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41101019','41101020') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');   
        
        //assistencia medica
        $medical = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41101016','42101016','41101017','42101017') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');     
        
        //tanstporte
        $transport = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41101014','42101014','41101021','42101021') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');         
        
        // alimentação
        $feeding = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41101015','42101015') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc'); 
        
        //encargos sociais
        $socialCharges = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41101012','41101013','42101012','42101013') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc'); 
        
        //premios e gratificações
        $prizesAndGratuities = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41101005','41101024','42101005','42101024') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc'); 
        
        //hora extra
        $internshipBag = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41101006','42101006') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
            ")->fetchAll('assoc'); 
        
        //hora extra
        $extraHour = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41101008','42101008') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
            ")->fetchAll('assoc'); 
        
        //prolabore
        $prolabore = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41101004','42101004') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
            ")->fetchAll('assoc'); 
        
        //proventos        
        $earnings = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('41101001','41101002','41101003','41101007'
                                            ,'41101009','41101010','41101011','41101025'
                                            ,'41101026','42101001','42101002','42101003'
                                            ,'42101007','42101009','42101010','42101011') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                    ")->fetchAll('assoc'); 
       
        $this->set(compact('staffPerMonth','year','outehs','coursesAndTraining','safetyEquipment','medical','transport','feeding','socialCharges','prizesAndGratuities','internshipBag','extraHour','prolabore','earnings'));
        $this->set('_serialize', ['staffPerMonth','year','outehs','coursesAndTraining','safetyEquipment','medical','transport','feeding','socialCharges','prizesAndGratuities','internshipBag','extraHour','prolabore','earnings']);
        
    }
    
    public function PersonnelExpenses() {
        
        $connection = ConnectionManager::get('baseProtheus');
        
        //quadro de pessoal
        $staffPerMonth = $connection->execute("
            SELECT  
                COUNT([RD_PD]) as CONT      
                ,[RD_DATARQ]
                ,[RD_CC]            
                FROM [SRD010]
                    WHERE [SRD010].[D_E_L_E_T_] <> '*'
                        AND [RD_PD] = '101'
                        AND SUBSTRING([RD_DATARQ],0,5) = YEAR(GETDATE())                
                    GROUP BY [RD_CC],[RD_DATARQ]
                    ORDER BY [RD_CC],[RD_DATARQ]")
                ->fetchAll('assoc');        
        
        // outras despesas
        $outehs = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                        AND [CT2_DEBITO] in ('41101018','41101022','41101023') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');  
                
        //cursos e treinamentos
        $coursesAndTraining = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                        AND [CT2_DEBITO] in ('41103036','42103036')
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');
        
        //meteriais de segurança
        $safetyEquipment = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                        AND [CT2_DEBITO] in ('41101019','41101020') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');   
        
        //assistencia medica
        $medical = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                        AND [CT2_DEBITO] in ('41101016','42101016','41101017','42101017') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');     
        
        //tanstporte
        $transport = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                        AND [CT2_DEBITO] in ('41101014','42101014','41101021','42101021') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc');         
        
        // alimentação
        $feeding = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                        AND [CT2_DEBITO] in ('41101015','42101015') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc'); 
        
        //encargos sociais
        $socialCharges = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                        AND [CT2_DEBITO] in ('41101012','41101013','42101012','42101013') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc'); 
        
        //premios e gratificações
        $prizesAndGratuities = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                        AND [CT2_DEBITO] in ('41101005','41101024','42101005','42101024') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)")->fetchAll('assoc'); 
        
        //bolsa estagio
        $internshipBag = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                        AND [CT2_DEBITO] in ('41101006','42101006') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
            ")->fetchAll('assoc'); 
        
        //hora extra
        $extraHour = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                        AND [CT2_DEBITO] in ('41101008','42101008') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
            ")->fetchAll('assoc'); 
        
        //prolabore
        $prolabore = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                        AND [CT2_DEBITO] in ('41101004','42101004') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
            ")->fetchAll('assoc'); 
        
        //proventos        
        $earnings = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                        AND [CT2_DEBITO] in ('41101001','41101002','41101003','41101007'
                                            ,'41101009','41101010','41101011','41101025'
                                            ,'41101026','42101001','42101002','42101003'
                                            ,'42101007','42101009','42101010','42101011') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                    ")->fetchAll('assoc'); 
       
        $this->set(compact('staffPerMonth','outehs','coursesAndTraining','safetyEquipment','medical','transport','feeding','socialCharges','prizesAndGratuities','internshipBag','extraHour','prolabore','earnings'));
        $this->set('_serialize', ['staffPerMonth','outehs','coursesAndTraining','safetyEquipment','medical','transport','feeding','socialCharges','prizesAndGratuities','internshipBag','extraHour','prolabore','earnings']);
        
    }
    
    public function RevenuesPerCapitaPdf() {
        
        //debug($this->request->data);
        
        $year = $this->request->data['yearPdf']; 
        
        $connection = ConnectionManager::get('baseProtheus');
        
        $revenuesCountCredit = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCC]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                       SUBSTRING([CT2_DATA],1,4) = '$year'
                       AND [CT2_CREDIT] in ('31101001','31101002','31102001','31102002') 
                       AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCC], SUBSTRING([CT2_DATA],5,2)
                   ")->fetchAll('assoc');
        
        $revenuesCountDebit = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('11204005','11204007','11204008','11204009','11204010','11204011') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                ")->fetchAll('assoc');
        
        $staffPerMonth = $connection->execute("
            SELECT  
                COUNT([RD_PD]) as CONT      
                ,[RD_DATARQ]
                ,[RD_CC]            
                FROM [SRD010]
                    WHERE [SRD010].[D_E_L_E_T_] <> '*'
                        AND [RD_PD] = '101'
                        AND SUBSTRING([RD_DATARQ],0,5) = '$year'                    
                    GROUP BY [RD_CC],[RD_DATARQ]
                    ORDER BY [RD_CC],[RD_DATARQ]")
                ->fetchAll('assoc');
        
        $this->set(compact('year','revenuesCountCredit', 'revenuesCountDebit', 'staffPerMonth'));
        $this->set('_serialize', ['year','revenuesCountCredit', 'revenuesCountDebit', 'staffPerMonth']);
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
    }
    
    public function RevenuesPerCapitaFilter() {
        
        $year = $this->request->data['year']; 
        
        $connection = ConnectionManager::get('baseProtheus');
        
        $revenuesCountCredit = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCC]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                       SUBSTRING([CT2_DATA],1,4) = '$year'
                       AND [CT2_CREDIT] in ('31101001','31101002','31102001','31102002') 
                       AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCC], SUBSTRING([CT2_DATA],5,2)
                   ")->fetchAll('assoc');
        
        $revenuesCountDebit = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('11204005','11204007','11204008','11204009','11204010','11204011') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                ")->fetchAll('assoc');
        
        $staffPerMonth = $connection->execute("
            SELECT  
                COUNT([RD_PD]) as CONT      
                ,[RD_DATARQ]
                ,[RD_CC]            
                FROM [SRD010]
                    WHERE [SRD010].[D_E_L_E_T_] <> '*'
                        AND [RD_PD] = '101'
                        AND SUBSTRING([RD_DATARQ],0,5) = '$year'                
                    GROUP BY [RD_CC],[RD_DATARQ]
                    ORDER BY [RD_CC],[RD_DATARQ]")
                ->fetchAll('assoc');

        $this->set(compact('staffPerMonth','revenuesCountCredit', 'revenuesCountDebit','year'));
        $this->set('_serialize', ['staffPerMonth','revenuesCountCredit', 'revenuesCountDebit','year']);
            
    }
    
    public function RevenuesPerCapita() {
        
        $connection = ConnectionManager::get('baseProtheus');
        
        $revenuesCountCredit = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCC]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                       SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                       AND [CT2_CREDIT] in ('31101001','31101002','31102001','31102002') 
                       AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCC], SUBSTRING([CT2_DATA],5,2)
                   ")->fetchAll('assoc');
        
        $revenuesCountDebit = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                        AND [CT2_DEBITO] in ('11204005','11204007','11204008','11204009','11204010','11204011') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                ")->fetchAll('assoc');
        
        $staffPerMonth = $connection->execute("
            SELECT  
                COUNT([RD_PD]) as CONT      
                ,[RD_DATARQ]
                ,[RD_CC]            
                FROM [SRD010]
                    WHERE [SRD010].[D_E_L_E_T_] <> '*'
                        AND [RD_PD] = '101'
                        AND SUBSTRING([RD_DATARQ],0,5) = YEAR(GETDATE())                    
                    GROUP BY [RD_CC],[RD_DATARQ]
                    ORDER BY [RD_CC],[RD_DATARQ]")
                ->fetchAll('assoc');

        $this->set(compact('staffPerMonth','revenuesCountCredit', 'revenuesCountDebit'));
        $this->set('_serialize', ['staffPerMonth','revenuesCountCredit', 'revenuesCountDebit']);
            
    }

    public function RevenuesMonthByCcPdf() {
        
        //debug($this->request->data);
        
        $year = $this->request->data['yearPdf']; 
        
        $connection = ConnectionManager::get('baseProtheus');
        
        $revenuesCountCredit = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCC]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                       SUBSTRING([CT2_DATA],1,4) = '$year'
                       AND [CT2_CREDIT] in ('31101001','31101002','31102001','31102002') 
                       AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCC], SUBSTRING([CT2_DATA],5,2)
                   ")->fetchAll('assoc');
        
        $revenuesCountDebit = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('11204005','11204007','11204008','11204009','11204010','11204011') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                ")->fetchAll('assoc');
        
        $this->set(compact('year','revenuesCountCredit', 'revenuesCountDebit'));
        $this->set('_serialize', ['year','revenuesCountCredit', 'revenuesCountDebit']);
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
    }
    
    public function RevenuesMonthByCcFilter() {
        
        $year = $this->request->data['year']; 
        
        $connection = ConnectionManager::get('baseProtheus');
                
        $revenuesCountCredit = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCC]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                       SUBSTRING([CT2_DATA],1,4) = '$year'
                       AND [CT2_CREDIT] in ('31101001','31101002','31102001','31102002') 
                       AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCC], SUBSTRING([CT2_DATA],5,2)
                   ")->fetchAll('assoc');
        
        $revenuesCountDebit = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('11204005','11204007','11204008','11204009','11204010','11204011') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                ")->fetchAll('assoc');
        
        $this->set(compact('revenuesCountCredit', 'revenuesCountDebit','year'));
        $this->set('_serialize', ['revenuesCountCredit', 'revenuesCountDebit','year']);
        
    }
    
    public function RevenuesMonthByCc() {
        
        $connection = ConnectionManager::get('baseProtheus');
                
        $revenuesCountCredit = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCC]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                       SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                       AND [CT2_CREDIT] in ('31101001','31101002','31102001','31102002') 
                       AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCC], SUBSTRING([CT2_DATA],5,2)
                   ")->fetchAll('assoc');
        
        $revenuesCountDebit = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = YEAR(GETDATE())
                        AND [CT2_DEBITO] in ('11204005','11204007','11204008','11204009','11204010','11204011') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                ")->fetchAll('assoc');
        
        $this->set(compact('revenuesCountCredit', 'revenuesCountDebit','revenuesCountCreditByCount', 'revenuesCountDebitByCount'));
        $this->set('_serialize', ['revenuesCountCredit', 'revenuesCountDebit','revenuesCountCreditByCount', 'revenuesCountDebitByCount']);
        
    }
    
    public function RevenuesFilter() {
        
        $year = $this->request->data['year']; 
        
        $connection = ConnectionManager::get('baseProtheus');
        
        $revenuesCountCreditByCount = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCC]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                , [CT2_CREDIT]
                FROM [CT2010] 
                    WHERE 
                       SUBSTRING([CT2_DATA],1,4) = '$year'
                       AND [CT2_CREDIT] in ('31101001','31101002','31102001','31102002') 
                       AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCC], SUBSTRING([CT2_DATA],5,2), [CT2_CREDIT]
                   ")->fetchAll('assoc');
        
        $revenuesCountDebitByCount = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                , [CT2_DEBITO]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,4) = '$year'
                        AND [CT2_DEBITO] in ('11204005','11204007','11204008','11204009','11204010','11204011') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2), [CT2_DEBITO]
                ")->fetchAll('assoc');       
        
        
        $this->set(compact('revenuesCountCreditByCount', 'revenuesCountDebitByCount','year'));
        $this->set('_serialize', ['revenuesCountCreditByCount', 'revenuesCountDebitByCount','year']);
        
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
                AND [RD_DATARQ] 
                        BETWEEN 
                            ( substring(convert(varchar(10),DATEADD(m, -12, current_timestamp), 103),7,5) 
                            + substring(convert(varchar(10),DATEADD(m, -12, current_timestamp), 103),4,2) )
                            AND 
                            ( select max([RD_DATARQ]) FROM [SRD010] )
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
                    AND [RD_DATARQ] 
                        BETWEEN 
                            ( substring(convert(varchar(10),DATEADD(m, -12, current_timestamp), 103),7,5) 
                            + substring(convert(varchar(10),DATEADD(m, -12, current_timestamp), 103),4,2) )
                            AND 
                            ( select max([RD_DATARQ]) FROM [SRD010] )
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
                AND [RD_DATARQ] 
                        BETWEEN 
                            ( substring(convert(varchar(10),DATEADD(m, -12, current_timestamp), 103),7,5) 
                            + substring(convert(varchar(10),DATEADD(m, -12, current_timestamp), 103),4,2) )
                            AND 
                            ( select max([RD_DATARQ]) FROM [SRD010] )
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
                    AND [RD_DATARQ] 
                        BETWEEN 
                            ( substring(convert(varchar(10),DATEADD(m, -12, current_timestamp), 103),7,5) 
                            + substring(convert(varchar(10),DATEADD(m, -12, current_timestamp), 103),4,2) )
                            AND 
                            ( select max([RD_DATARQ]) FROM [SRD010] )
                    AND [RD_PD] IN('109','117','118','123','157','229') 
                GROUP BY [RD_DATARQ],[RD_CC],[RD_PD],[CTT_DESC01]
                ORDER BY [RD_CC],[RD_DATARQ],[RD_PD] ")
                ->fetchAll('assoc');

        /*
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
         * 
         */

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
                            + substring(convert(varchar(10),DATEADD(m, -5, current_timestamp), 103),4,2) )
                            AND 
                            ( select max([RD_DATARQ]) FROM [SRD010] )
                    AND [RD_PD] IN('109','117','118','123','157','229') 
                GROUP BY [RD_DATARQ],[RD_CC],[RD_PD],[CTT_DESC01]
                ORDER BY [RD_CC],[RD_DATARQ],[RD_PD]")
                ->fetchAll('assoc');

        $this->set(compact('extraHourYearCurrent', 'extraHourLastSixMonths', 'extraHourLastYear'));
        $this->set('_serialize', ['extraHourYearCurrent', 'extraHourLastSixMonths', 'extraHourLastYear']);
    }

    public function DeterminationOfResultsMonthly() {
        
        $connection = ConnectionManager::get('baseProtheus');
        
        $yearOne = $this->request->data['yearOne'];
        $yearTwo = $this->request->data['yearTwo'];
        $monthly = $this->request->data['monthly'];
        $cc = $this->request->data['cc'];
        
        $periodOneForFind = '';
        $periodTwoForFind = '';
        
        if ($monthly == 'JANEIRO'){
            $periodOneForFind = $yearOne . '01';   
            $periodTwoForFind = $yearTwo . '01';   
        }elseif ($monthly == 'FEVEREIRO') {
            $periodOneForFind = $yearOne . '02';   
            $periodTwoForFind = $yearTwo . '02';
        }elseif ($monthly == 'MARÇO') {
            $periodOneForFind = $yearOne . '03';   
            $periodTwoForFind = $yearTwo . '03';
        }elseif ($monthly == 'ABRIL') {
            $periodOneForFind = $yearOne . '04';   
            $periodTwoForFind = $yearTwo . '04';
        }elseif ($monthly == 'MAIO') {
            $periodOneForFind = $yearOne . '05';   
            $periodTwoForFind = $yearTwo . '05';
        }elseif ($monthly == 'JUNHO') {
            $periodOneForFind = $yearOne . '06';   
            $periodTwoForFind = $yearTwo . '06';
        }elseif ($monthly == 'JULHO') {
            $periodOneForFind = $yearOne . '07';   
            $periodTwoForFind = $yearTwo . '07';
        }elseif ($monthly == 'AGOSTO') {
            $periodOneForFind = $yearOne . '08';   
            $periodTwoForFind = $yearTwo . '08';
        }elseif ($monthly == 'SETEMBRO') {
            $periodOneForFind = $yearOne . '09';   
            $periodTwoForFind = $yearTwo . '09';
        }elseif ($monthly == 'OUTUBRO') {
            $periodOneForFind = $yearOne . '10';   
            $periodTwoForFind = $yearTwo . '10';
        }elseif ($monthly == 'NOVEMBRO') {
            $periodOneForFind = $yearOne . '11';   
            $periodTwoForFind = $yearTwo . '11';
        }elseif ($monthly == 'DEZEMBRO') {
            $periodOneForFind = $yearOne . '12';   
            $periodTwoForFind = $yearTwo . '12';
        }
        
        if($cc == 'TODOS'){
            // ==== RECEITAS INI ==== //
            $revenuesOneRs = $connection->execute(" 
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCC]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    , [CT2_CREDIT]
                    FROM [CT2010] 
                        WHERE 
                           SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                           AND [CT2_CREDIT] in ('31101001','31101002','31102001','31102002') 
                           AND D_E_L_E_T_ != '*'
                        GROUP BY [CT2_CCC], SUBSTRING([CT2_DATA],5,2),[CT2_CREDIT] ")->fetchAll('assoc');
            
            $revenuesTwoRs = $connection->execute(" 
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCC]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    , [CT2_CREDIT]
                    FROM [CT2010] 
                        WHERE 
                           SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                           AND [CT2_CREDIT] in ('31101001','31101002','31102001','31102002') 
                           AND D_E_L_E_T_ != '*'
                        GROUP BY [CT2_CCC], SUBSTRING([CT2_DATA],5,2),[CT2_CREDIT] ")->fetchAll('assoc');

            $revenuesCountDebitOneRs = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('11204005','11204007','11204008','11204009','11204010') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                ")->fetchAll('assoc');

            $revenuesCountDebitTwoRs = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('11204005','11204007','11204008','11204009','11204010') 
                        AND D_E_L_E_T_ != '*'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                ")->fetchAll('assoc');

            $cancellationOfTitlesOneRs = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('31101001','31101002','31101003','31101004') 
                        AND D_E_L_E_T_ != '*'
                ")->fetchAll('assoc');

            $cancellationOfTitlesTwoRs = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('31101001','31101002','31101003','31101004') 
                        AND D_E_L_E_T_ != '*'
                ")->fetchAll('assoc');
            // ==== RECEITAS FIM ==== //

            // ============= RECURSOS HUMANOS DESPESAS INI ============= //

            // outras despesas
            $othersRHOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101018','41101022','41101023') 
                            AND D_E_L_E_T_ != '*'
                        ")->fetchAll('assoc');  

            $othersRHTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101018','41101022','41101023') 
                            AND D_E_L_E_T_ != '*'
                        ")->fetchAll('assoc'); 

            //higienização
            $sanitationOneRs = $connection->execute("
                SELECT
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41103012','42102011')
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc');

            $sanitationTwoRs = $connection->execute("
                SELECT
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41103012','42102011')
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc'); 
                    
            //cursos e treinamentos
            $coursesAndTrainingOneRs = $connection->execute("
                SELECT
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41103036','42103036')
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc');

            $coursesAndTrainingTwoRs = $connection->execute("
                SELECT
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41103036','42103036')
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc');
            
            //meteriais de segurança
            $safetyEquipmentOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101019','41101020') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc'); 

            $safetyEquipmentTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101019','41101020') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc');   
            
            //assistencia medica
            $medicalOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101016','42101016','41101017','42101017') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc');     

            $medicalTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101016','42101016','41101017','42101017') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc'); 
            
            //tanstporte
            $transportOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101014','42101014','41101021','42101021') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc');  

            $transportTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101014','42101014','41101021','42101021') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc');       
            
            // alimentação
            $feedingOneRs  = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101015','42101015') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc'); 

            $feedingTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101015','42101015') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc'); 
            
            //encargos sociais
            $socialChargesOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101012','41101013','42101012','42101013') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc'); 

            $socialChargesTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101012','41101013','42101012','42101013') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc');
            
            //premios e gratificações
            $prizesAndGratuitiesOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101024','42101024','42101005','41101005') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc'); 

            $prizesAndGratuitiesTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101024','42101024','42101005','41101005') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc');
            
            //bolsa estagio
            $internshipBagOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101006','42101006') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc'); 

            $internshipBagTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101006','42101006') 
                            AND D_E_L_E_T_ != '*'
                ")->fetchAll('assoc'); 
            
            //hora extra
            $extraHourOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101008','42101008') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc'); 

            $extraHourTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101008','42101008') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc'); 
            
            //prolabore
            $prolaboreOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101004','42101004') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc'); 

            $prolaboreTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101004','42101004') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc'); 
            
            //proventos        
            $earningsOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101001','41101002','41101003'
                                                ,'41101009','41101010','41101011','41101025'
                                                ,'41101026','42101001','42101002','42101003'
                                                ,'42101009','42101010','42101011','42101007','41101007') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc'); 

            $earningsTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101001','41101002','41101003'
                                                ,'41101009','41101010','41101011','41101025'
                                                ,'41101026','42101001','42101002','42101003'
                                                ,'42101009','42101010','42101011','42101007','41101007') 
                            AND D_E_L_E_T_ != '*'")->fetchAll('assoc'); 

            // ============= RECURSOS HUMANOS DESPESAS FIM ============= //

            // ============= OPERACIONAL DESPESAS INI =============//
            
            //manuntenções
            $maintenanceOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103008','41103035'
                                        ,'41103031','41103041','41103045'
                                        ,'42102005','42102027','42102033'
                                        ,'42103037','42102042') 
                    AND D_E_L_E_T_ != '*'")
                        ->fetchAll('assoc'); 

            $maintenanceTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103008','41103035'
                                        ,'41103031','41103041','41103045'
                                        ,'42102005','42102027','42102033'
                                        ,'42103037','42102042') 
                    AND D_E_L_E_T_ != '*'")
                        ->fetchAll('assoc'); 
        
            //multas de transito
            $finesOfCarsOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('41103044','42102044') 
                        AND D_E_L_E_T_ != '*'")
                        ->fetchAll('assoc'); 

            $finesOfCarsTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('41103044','42102044') 
                        AND D_E_L_E_T_ != '*'")
                        ->fetchAll('assoc'); 
            
            //pneus
            $tiresOneRs = $connection->execute("SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103032','42102034') 
                    AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc'); 

            $tiresTwoRs = $connection->execute("SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103032','42102034') 
                    AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc'); 
            
            // oleos e lubricicantes
            $fuelAndLubricantsOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('41103023','42102023') 
                        AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc'); 

            $fuelAndLubricantsTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('41103023','42102023') 
                        AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc');     
            
            // alugueis    
            $rentsOprOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103005','42102008','41103006','42102025') 
                    AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc'); 

            $rentsOprTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103005','42102008','41103006','42102025') 
                    AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc');
            
            //fretes
            $freightOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103009','41103014','41103042','42102006','42102014','42102043') 
                    AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc'); 

            $freightTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103009','41103014','41103042','42102006','42102014','42102043') 
                    AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc'); 
            
            $materialsOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('41103027','41103028','41103040'
                                            ,'41103043','41201001','42102028'
                                            ,'42102030','42102041') 
                        AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc');

            $materialsTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('41103027','41103028','41103040'
                                            ,'41103043','41201001','42102028'
                                            ,'42102030','42102041') 
                        AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc');
            
            $materialsLabOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('41103017','42102017') 
                        AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc');

            $materialsLabTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('41103017','42102017') 
                        AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc');

            $analisesLabOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('41103048') 
                        AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc');

            $analisesLabTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('41103048') 
                        AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc');

            $descartETratOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('41103026') 
                        AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc');

            $descartETratTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('41103026') 
                        AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc');

            $viagensOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('41103030','42102032') 
                        AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc');

            $viagensTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('42102032') 
                        AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc');


            $othersOPROneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103020','41103021','42102020','42102021') 
                    AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc');

            $othersOPRTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103020','41103021','42102020','42102021') 
                    AND D_E_L_E_T_ != '*'")
                ->fetchAll('assoc');    
             // ============= OPERACIONAL DESPESAS FIM =============//

            // ============= administrativo DESPESAS INI =============//

            $rentAdmOneRs = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                AND [CT2_DEBITO] in ('41103004','42102002') 
                AND D_E_L_E_T_ != '*'")
                        ->fetchAll('assoc');

            $rentAdmTwoRs = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                AND [CT2_DEBITO] in ('41103004','42102002') 
                AND D_E_L_E_T_ != '*'")
                        ->fetchAll('assoc');  

            $phoneAndInternetOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103003','42102003') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');          
        
            $phoneAndInternetTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103003','42102003') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');
            
            $electricityOneRs = $connection->execute("
                SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('41103002','42102029') 
                        AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

            $electricityTwoRs = $connection->execute("
                SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('41103002','42102029') 
                        AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');                
            
            $waterAndSewageOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103001','42102001') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

            $waterAndSewageTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103001','42102001') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');
            
            $officeSuppliesOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103015','41103047','42102015','42102048') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

            $officeSuppliesTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103015','41103047','42102015','42102048') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');
            
            $cleaningSuppliesOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                     SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103033','42102035') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

            $cleaningSuppliesTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                     SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103033','42102035') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');
            
            $othersAdmOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103007','41103016','41103018','41103019','41103024','41103037'
                                        ,'41103038','42102004','42102016','42102018','42102019','42102024'
                                        ,'42102039','42102045','42102047') 
                    AND D_E_L_E_T_ != '*'")
            ->fetchAll('assoc');

            $othersAdmTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103007','41103016','41103018','41103019','41103024','41103037'
                                        ,'41103038','42102004','42102016','42102018','42102019','42102024'
                                        ,'42102039','42102045','42102047') 
                    AND D_E_L_E_T_ != '*'")
            ->fetchAll('assoc');
        
        // ============= administrativo DESPESAS FIM =============//

        // ============= FINANCEIRA DESPESAS INI =============//    

        $ratesOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103022','42102022') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

        $ratesTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103022','42102022') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');
        
        $interestCostsOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42104001') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

        $interestCostsTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42104001') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');                            
        
        $discountsGivenOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42104002') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

        $discountsGivenTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42104002') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');
        
        $bankExpensesOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42104003') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');  

        $bankExpensesTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42104003') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc'); 
        
        $finesFinancialOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42104004') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc'); 

        $finesFinancialTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42104004') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');
        
        $iofOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42104005') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc'); 

        $iofTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42104005') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc'); 
        
        $iocOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42104006') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc'); 

        $iocTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42104006') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc'); 
        
        $bankInterestRateOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42104007') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc'); 

        $bankInterestRateTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42104007') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc'); 
       
        $financialChargesOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42104008') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc'); 

        $financialChargesTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42104008') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc'); 
        
        $irsOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42104009') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc'); 

        $irsTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42104009') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');    

        // ============= FINANCEIRA DESPESAS FIM =============//   

        // ============= INVESTIMENTOS DESPESAS INI =============// 
                            
        $furnitureAndUtensilsOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('13201001') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

        $furnitureAndUtensilsTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('13201001') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');
            
        $machinesAndEquipmentOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('13201005','13201009','13201010','13201011','13201014') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

        $machinesAndEquipmentTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('13201005','13201009','13201010','13201011','13201014') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');
            
        $vehiclesOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('13201007','13201008') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');     

        $vehiclesTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('13201007','13201008') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');   

        // ============= INVESTIMENTOS DESPESAS FIM =============//   

        // ============= TRIBUTOS DESPESAS INI =============//   

        $icmsOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103001') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

        $icmsTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103001') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');
        
        $issOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103002') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

        $issTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103002') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');
        
        $cofinsOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103003') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

        $cofinsTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103003') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');
        
        $pisOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103004') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

        $pisTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103004') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');
        
        $irpjOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103005') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

        $irpjTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103005') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');
        
        $csllOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103006') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

        $csllTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103006') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');
        
        $ipvaOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103007') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

        $ipvaTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103007') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');
        
        $iptuOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103008') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

        $iptuTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103008') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');
        
        $itbiOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103009') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

        $itbiTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103009') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');
        
        $fecoepOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103010') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

        $fecoepTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103010') 
                    AND D_E_L_E_T_ != '*'")
                            ->fetchAll('assoc');

         // ============= TRIBUTOS DESPESAS FIM =============//   
         
         // ============= QUANTIDADE DE PESSOAL INI =============// 

        $staffPerMonthOneRs = $connection->execute("
                SELECT  
                    COUNT([RD_PD]) as CONT      
                    FROM [SRD010]
                        WHERE [SRD010].[D_E_L_E_T_] <> '*'
                            AND [RD_PD] = '101'
                            AND SUBSTRING([RD_DATARQ],1,6) = '$periodOneForFind'")
                    ->fetchAll('assoc'); 

        $staffPerMonthTwoRs = $connection->execute("
                SELECT  
                    COUNT([RD_PD]) as CONT      
                    FROM [SRD010]
                        WHERE [SRD010].[D_E_L_E_T_] <> '*'
                            AND [RD_PD] = '101'
                            AND SUBSTRING([RD_DATARQ],1,6) = '$periodTwoForFind'")
                    ->fetchAll('assoc');  

         // ============= QUANTIDADE DE PESSOAL FIM =============//                       


        // 888888888888888888888888888
        // 888888888888888888888888888
        // 888888888888888888888888888        
        }else{
        // 888888888888888888888888888
        // 888888888888888888888888888
        // 888888888888888888888888888
            $ccParte = substr($cc, 0,2);
            // ==== RECEITAS INI ==== //
            $revenuesOneRs = $connection->execute(" 
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCC]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    , [CT2_CREDIT]
                    FROM [CT2010] 
                        WHERE 
                           SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                           AND [CT2_CREDIT] in ('31101001','31101002','31102001','31102002') 
                           AND D_E_L_E_T_ != '*' AND [CT2_CCC] = '$ccParte'
                        GROUP BY [CT2_CCC], SUBSTRING([CT2_DATA],5,2),[CT2_CREDIT] ")->fetchAll('assoc');
            
            $revenuesTwoRs = $connection->execute(" 
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    , [CT2_CCC]
                    , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                    , [CT2_CREDIT]
                    FROM [CT2010] 
                        WHERE 
                           SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                           AND [CT2_CREDIT] in ('31101001','31101002','31102001','31102002') 
                           AND D_E_L_E_T_ != '*' AND [CT2_CCC] = '$ccParte'
                        GROUP BY [CT2_CCC], SUBSTRING([CT2_DATA],5,2),[CT2_CREDIT] ")->fetchAll('assoc');

            $revenuesCountDebitOneRs = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('11204005','11204007','11204008','11204009','11204010') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$ccParte'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                ")->fetchAll('assoc');

            $revenuesCountDebitTwoRs = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                , [CT2_CCD]
                , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('11204005','11204007','11204008','11204009','11204010') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$ccParte'
                    GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                ")->fetchAll('assoc');

            $cancellationOfTitlesOneRs = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('31101001','31101002','31101003','31101004') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$ccParte'
                ")->fetchAll('assoc');

            $cancellationOfTitlesTwoRs = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                    WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('31101001','31101002','31101003','31101004') 
                        AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$ccParte'
                ")->fetchAll('assoc');
            // ==== RECEITAS FIM ==== //

            // ============= RECURSOS HUMANOS DESPESAS INI ============= //
            // outras despesas
            $othersRHOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101018','41101022','41101023') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');  

            $othersRHTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101018','41101022','41101023') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');  
                    
                        //higienização
            $sanitationOneRs  = $connection->execute("
                SELECT
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41103012','42102011')
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

            $sanitationTwoRs = $connection->execute("
                SELECT
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41103012','42102011')
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc'); 

            //cursos e treinamentos
            $coursesAndTrainingOneRs = $connection->execute("
                SELECT
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41103036','42103036')
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

            $coursesAndTrainingTwoRs = $connection->execute("
                SELECT
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41103036','42103036')
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
            
            //meteriais de segurança
            $safetyEquipmentOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101019','41101020') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc'); 

            $safetyEquipmentTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101019','41101020') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');   
            
            //assistencia medica
            $medicalOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101016','42101016','41101017','42101017') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');     

            $medicalTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101016','42101016','41101017','42101017') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc'); 
            
            //tanstporte
            $transportOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101014','42101014','41101021','42101021') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');  

            $transportTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101014','42101014','41101021','42101021') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');       
            
            // alimentação
            $feedingOneRs  = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101015','42101015') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc'); 

            $feedingTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101015','42101015') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc'); 
            
            //encargos sociais
            $socialChargesOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101012','41101013','42101012','42101013') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc'); 

            $socialChargesTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101012','41101013','42101012','42101013') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
            
            //premios e gratificações
            $prizesAndGratuitiesOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101024','42101024','42101005','41101005') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc'); 

            $prizesAndGratuitiesTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101024','42101024','42101005','41101005') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
            
            //bolsa estagio
            $internshipBagOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101006','42101006') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc'); 

            $internshipBagTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101006','42101006') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc'); 
            
            //hora extra
            $extraHourOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101008','42101008') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc'); 

            $extraHourTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101008','42101008') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc'); 
            
            //prolabore
            $prolaboreOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101004','42101004') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc'); 

            $prolaboreTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101004','42101004') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc'); 
            
            //proventos        
            $earningsOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                            AND [CT2_DEBITO] in ('41101001','41101002','41101003'
                                                ,'41101009','41101010','41101011','41101025'
                                                ,'41101026','42101001','42101002','42101003'
                                                ,'42101009','42101010','42101011','42101007','41101007') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc'); 

            $earningsTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                        WHERE 
                            SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                            AND [CT2_DEBITO] in ('41101001','41101002','41101003'
                                                ,'41101009','41101010','41101011','41101025'
                                                ,'41101026','42101001','42101002','42101003'
                                                ,'42101009','42101010','42101011','42101007','41101007') 
                            AND D_E_L_E_T_ != '*'
                            AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc'); 

            // ============= RECURSOS HUMANOS DESPESAS FIM ============= //

            // ============= OPERACIONAL DESPESAS INI =============//
            
            //manuntenções
            $maintenanceOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103008','41103035'
                                        ,'41103031','41103041','41103045'
                                        ,'42102005','42102027','42102033'
                                        ,'42103037','42102042') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                        ->fetchAll('assoc'); 

            $maintenanceTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103008','41103035'
                                        ,'41103031','41103041','41103045'
                                        ,'42102005','42102027','42102033'
                                        ,'42103037','42102042') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                        ->fetchAll('assoc'); 
        
            //multas de transito
            $finesOfCarsOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('41103044','42102044') 
                        AND D_E_L_E_T_ != '*'
                        AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                        ->fetchAll('assoc'); 

            $finesOfCarsTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('41103044','42102044') 
                        AND D_E_L_E_T_ != '*'")
                        ->fetchAll('assoc'); 
            
            //pneus
            $tiresOneRs = $connection->execute("SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103032','42102034') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc'); 

            $tiresTwoRs = $connection->execute("SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103032','42102034') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc'); 
            
            // oleos e lubricicantes
            $fuelAndLubricantsOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('41103023','42102023') 
                        AND D_E_L_E_T_ != '*'
                        AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc'); 

            $fuelAndLubricantsTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('41103023','42102023') 
                        AND D_E_L_E_T_ != '*'
                        AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc');     
            
            // alugueis    
            $rentsOprOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103005','42102008','41103006','42102025') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc'); 

            $rentsOprTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103005','42102008','41103006','42102025') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc');
            
            //fretes
            $freightOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103009','41103014','41103042','42102006','42102014','42102043') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc'); 

            $freightTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103009','41103014','41103042','42102006','42102014','42102043') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc'); 
            
            $materialsOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('41103027','41103028','41103040'
                                            ,'41103043','41201001','42102028'
                                            ,'42102030','42102041') 
                        AND D_E_L_E_T_ != '*'
                        AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc');

            $materialsTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('41103027','41103028','41103040'
                                            ,'41103043','41201001','42102028'
                                            ,'42102030','42102041') 
                        AND D_E_L_E_T_ != '*'
                        AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc');

            $materialsLabOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('41103017','42102017') 
                        AND D_E_L_E_T_ != '*'
                        AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc');

            $materialsLabTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('41103017','42102017') 
                        AND D_E_L_E_T_ != '*'
                        AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc');    

            $analisesLabOneRs  = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('41103048') 
                        AND D_E_L_E_T_ != '*'
                        AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc');

            $analisesLabTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('41103048') 
                        AND D_E_L_E_T_ != '*'
                        AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc');
            
            $othersOPROneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103020','41103021','42102020','42102021') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc');

            $descartETratOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('41103026') 
                        AND D_E_L_E_T_ != '*'
                        AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc');

            $descartETratTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('41103026') 
                        AND D_E_L_E_T_ != '*'
                        AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc');

            $viagensOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('41103030','42102032') 
                        AND D_E_L_E_T_ != '*'
                        AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc');

            $viagensTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('41103030','42102032') 
                        AND D_E_L_E_T_ != '*'
                        AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc');

            $othersOPRTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103020','41103021','42102020','42102021') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")
                ->fetchAll('assoc');    
             // ============= OPERACIONAL DESPESAS FIM =============//

            // ============= administrativo DESPESAS INI =============//

            $rentAdmOneRs = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                AND [CT2_DEBITO] in ('41103004','42102002') 
                AND D_E_L_E_T_ != '*'
                AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

            $rentAdmTwoRs = $connection->execute("
            SELECT 
                SUM([CT2_VALOR]) AS [CT2_VALOR]
            FROM [CT2010] 
                        WHERE 
                SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                AND [CT2_DEBITO] in ('41103004','42102002') 
                AND D_E_L_E_T_ != '*'
                AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc'); 

            $phoneAndInternetOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103003','42102003') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');          
        
            $phoneAndInternetTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103003','42102003') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
            
            $electricityOneRs = $connection->execute("
                SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                        AND [CT2_DEBITO] in ('41103002','42102029') 
                        AND D_E_L_E_T_ != '*'
                        AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

            $electricityTwoRs = $connection->execute("
                SELECT 
                        SUM([CT2_VALOR]) AS [CT2_VALOR]
                    FROM [CT2010] 
                                WHERE 
                        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                        AND [CT2_DEBITO] in ('41103002','42102029') 
                        AND D_E_L_E_T_ != '*'
                        AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');               
            
            $waterAndSewageOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103001','42102001') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

            $waterAndSewageTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103001','42102001') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
            
            $officeSuppliesOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103015','41103047','42102015','42102048') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

            $officeSuppliesTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103015','41103047','42102015','42102048') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
            
            $cleaningSuppliesOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                     SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103033','42102035') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

            $cleaningSuppliesTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                     SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103033','42102035') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
            
            $othersAdmOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103007','41103016','41103018','41103019','41103024','41103037'
                                        ,'41103038','42102004','42102016','42102018','42102019','42102024'
                                        ,'42102039','42102045','42102047') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

            $othersAdmTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103007','41103016','41103018','41103019','41103024','41103037'
                                        ,'41103038','42102004','42102016','42102018','42102019','42102024'
                                        ,'42102039','42102045','42102047') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
        
        // ============= administrativo DESPESAS FIM =============//    

        // ============= FINANCEIRA DESPESAS INI =============//    

        $ratesOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('41103022','42102022') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $ratesTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('41103022','42102022') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
        
        $interestCostsOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42104001') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $interestCostsTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42104001') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');                         
        
        $discountsGivenOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42104002') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $discountsGivenTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42104002') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
        
        $bankExpensesOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42104003') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $bankExpensesTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42104003') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
        
        $finesFinancialOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42104004') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $finesFinancialTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42104004') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
        
        $iofOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42104005') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $iofTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42104005') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
        
        $iocOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42104006') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $iocTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42104006') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
        
        $bankInterestRateOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42104007') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $bankInterestRateTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42104007') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
       
        $financialChargesOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42104008') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $financialChargesTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42104008') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $irsOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42104009') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc'); 

        $irsTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42104009') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');    

        // ============= FINANCEIRA DESPESAS FIM =============//  

        // ============= INVESTIMENTOS DESPESAS INI =============// 
                            
        $furnitureAndUtensilsOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('13201001') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $furnitureAndUtensilsTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('13201001') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
            
        $machinesAndEquipmentOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('13201005','13201009','13201010','13201011','13201014') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $machinesAndEquipmentTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('13201005','13201009','13201010','13201011','13201014') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $vehiclesOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('13201007','13201008') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');  

        $vehiclesTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('13201007','13201008') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');  

        // ============= INVESTIMENTOS DESPESAS FIM =============// 

        // ============= TRIBUTOS DESPESAS INI =============//   

        $icmsOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103001') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $icmsTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103001') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $issOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103002') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $issTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103002') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
        
        $cofinsOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103003') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $cofinsTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103003') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
        
        $pisOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103004') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $pisTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103004') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
        
        $irpjOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103005') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $irpjTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103005') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
        
        $csllOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103006') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $csllTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103006') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
        
        $ipvaOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103007') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $ipvaTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103007') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
        
        $iptuOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103008') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $iptuTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103008') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
        
        $itbiOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103009') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $itbiTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103009') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');
        
        $fecoepOneRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
                    AND [CT2_DEBITO] in ('42103010') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

        $fecoepTwoRs = $connection->execute("
                SELECT 
                    SUM([CT2_VALOR]) AS [CT2_VALOR]
                FROM [CT2010] 
                            WHERE 
                    SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
                    AND [CT2_DEBITO] in ('42103010') 
                    AND D_E_L_E_T_ != '*'
                    AND [CT2_CCD] = " . substr($cc, 0,2) . "")->fetchAll('assoc');

         // ============= TRIBUTOS DESPESAS FIM =============// 

         // ============= QUANTIDADE DE PESSOAL INI =============// 

        $staffPerMonthOneRs = $connection->execute("
                SELECT  
                    COUNT([RD_PD]) as CONT      
                    FROM [SRD010]
                        WHERE [SRD010].[D_E_L_E_T_] <> '*'
                            AND [RD_PD] = '101'
                            AND SUBSTRING([RD_DATARQ],1,6) = '$periodOneForFind'
                            AND [RD_CC] = '$ccParte'")
                    ->fetchAll('assoc'); 

        $staffPerMonthTwoRs = $connection->execute("
                SELECT  
                    COUNT([RD_PD]) as CONT      
                    FROM [SRD010]
                        WHERE [SRD010].[D_E_L_E_T_] <> '*'
                            AND [RD_PD] = '101'
                            AND SUBSTRING([RD_DATARQ],1,6) = '$periodTwoForFind'
                            AND [RD_CC] = '$ccParte'")
                    ->fetchAll('assoc');  

         // ============= QUANTIDADE DE PESSOAL FIM =============//    

        }
        
        $this->set(compact('cc','monthly','yearOne','yearTwo','revenuesOneRs','revenuesTwoRs'
                                ,'revenuesCountDebitTwoRs','revenuesCountDebitOneRs'
                                ,'cancellationOfTitlesTwoRs','cancellationOfTitlesOneRs'
                             //Quadro de pessoal
                             ,'staffPerMonthTwoRs','staffPerMonthOneRs'   
                             //Dados de pessoal:
                             , 'sanitationOneRs' ,'sanitationTwoRs'
                             ,'othersRHOneRs','coursesAndTrainingOneRs','safetyEquipmentOneRs','medicalOneRs'
                             ,'transportOneRs','feedingOneRs','socialChargesOneRs','prizesAndGratuitiesOneRs'
                             ,'internshipBagOneRs','extraHourOneRs','prolaboreOneRs','earningsOneRs'
                             ,'othersRHTwoRs','coursesAndTrainingTwoRs','safetyEquipmentTwoRs','medicalTwoRs'
                             ,'transportTwoRs','feedingTwoRs','socialChargesTwoRs','prizesAndGratuitiesTwoRs'
                             ,'internshipBagTwoRs','extraHourTwoRs','prolaboreTwoRs','earningsTwoRs'
                             // Dados de operacional:
                             ,'maintenanceOneRs','finesOfCarsOneRs','tiresOneRs','fuelAndLubricantsOneRs'
                             ,'rentsOprOneRs','freightOneRs','materialsOneRs','othersOPROneRs','maintenanceTwoRs'
                             ,'finesOfCarsTwoRs','tiresTwoRs','fuelAndLubricantsTwoRs','rentsOprTwoRs','freightTwoRs'
                             ,'materialsTwoRs','othersOPRTwoRs', 'materialsLabOneRs', 'materialsLabTwoRs','analisesLabOneRs','analisesLabTwoRs','descartETratOneRs','descartETratTwoRs','viagensOneRs','viagensTwoRs'
                             // Dados do adm:
                             ,'rentAdmOneRs','phoneAndInternetOneRs'
                             ,'electricityOneRs','waterAndSewageOneRs','officeSuppliesOneRs','cleaningSuppliesOneRs'
                             ,'othersAdmOneRs','rentAdmTwoRs','phoneAndInternetTwoRs','electricityTwoRs'
                             ,'waterAndSewageTwoRs','officeSuppliesTwoRs','cleaningSuppliesTwoRs','othersAdmTwoRs'
                             // Dados Financeiros
                             ,'ratesOneRs','interestCostsOneRs','discountsGivenOneRs','bankExpensesOneRs'
                             ,'finesFinancialOneRs'
                             ,'iofOneRs','iocOneRs','bankInterestRateOneRs','financialChargesOneRs','irsOneRs'
                             ,'ratesTwoRs','interestCostsTwoRs','discountsGivenTwoRs','bankExpensesTwoRs'
                             ,'finesFinancialTwoRs'
                             ,'iofTwoRs','iocTwoRs','bankInterestRateTwoRs','financialChargesTwoRs','irsTwoRs'
                             // Dados investimentos
                             ,'furnitureAndUtensilsOneRs','furnitureAndUtensilsTwoRs','machinesAndEquipmentOneRs'
                             ,'machinesAndEquipmentTwoRs','vehiclesOneRs','vehiclesTwoRs'
                             // Dados tributos
                             ,'icmsOneRs','icmsTwoRs','issOneRs','issTwoRs','cofinsOneRs','cofinsTwoRs','pisOneRs'
                             ,'pisTwoRs','irpjOneRs','irpjTwoRs','csllOneRs','csllTwoRs','ipvaOneRs','ipvaTwoRs'
                             ,'iptuOneRs','iptuTwoRs','itbiOneRs','itbiTwoRs','fecoepOneRs','fecoepTwoRs'
                             //Dados apuração   

                    ));
        
        $this->set('_serialize', ['cc','monthly','yearOne','yearTwo','revenuesOneRs','revenuesTwoRs'
                                ,'revenuesCountDebitTwoRs','revenuesCountDebitOneRs'
                                ,'cancellationOfTitlesTwoRs','cancellationOfTitlesOneRs'
                              //Quadro de pessoal
                             ,'staffPerMonthTwoRs','staffPerMonthOneRs'  
                             //Dados de pessoal:
                             , 'sanitationOneRs' ,'sanitationTwoRs'
                             ,'othersRHOneRs','coursesAndTrainingOneRs','safetyEquipmentOneRs','medicalOneRs'
                             ,'transportOneRs','feedingOneRs','socialChargesOneRs','prizesAndGratuitiesOneRs'
                             ,'internshipBagOneRs','extraHourOneRs','prolaboreOneRs','earningsOneRs'
                             ,'othersRHTwoRs','coursesAndTrainingTwoRs','safetyEquipmentTwoRs','medicalTwoRs'
                             ,'transportTwoRs','feedingTwoRs','socialChargesTwoRs','prizesAndGratuitiesTwoRs'
                             ,'internshipBagTwoRs','extraHourTwoRs','prolaboreTwoRs','earningsTwoRs'
                             // Dados de operacional:
                             ,'maintenanceOneRs','finesOfCarsOneRs','tiresOneRs','fuelAndLubricantsOneRs'
                             ,'rentsOprOneRs','freightOneRs','materialsOneRs','othersOPROneRs','maintenanceTwoRs'
                             ,'finesOfCarsTwoRs','tiresTwoRs','fuelAndLubricantsTwoRs','rentsOprTwoRs','freightTwoRs'
                             ,'materialsTwoRs','othersOPRTwoRs', 'materialsLabOneRs', 'materialsLabTwoRs','analisesLabOneRs','analisesLabTwoRs','descartETratOneRs','descartETratTwoRs','viagensOneRs','viagensTwoRs'
                             // Dados do adm:
                             ,'rentAdmOneRs','phoneAndInternetOneRs'
                             ,'electricityOneRs','waterAndSewageOneRs','officeSuppliesOneRs','cleaningSuppliesOneRs'
                             ,'othersAdmOneRs','rentAdmTwoRs','phoneAndInternetTwoRs','electricityTwoRs'
                             ,'waterAndSewageTwoRs','officeSuppliesTwoRs','cleaningSuppliesTwoRs','othersAdmTwoRs'
                             // Dados Financeiros
                             ,'ratesOneRs','interestCostsOneRs','discountsGivenOneRs','bankExpensesOneRs'
                             ,'finesFinancialOneRs'
                             ,'iofOneRs','iocOneRs','bankInterestRateOneRs','financialChargesOneRs','irsOneRs'
                             ,'ratesTwoRs','interestCostsTwoRs','discountsGivenTwoRs','bankExpensesTwoRs'
                             ,'finesFinancialTwoRs'
                             ,'iofTwoRs','iocTwoRs','bankInterestRateTwoRs','financialChargesTwoRs','irsTwoRs'
                             // Dados investimentos
                             ,'furnitureAndUtensilsOneRs','furnitureAndUtensilsTwoRs','machinesAndEquipmentOneRs'
                             ,'machinesAndEquipmentTwoRs','vehiclesOneRs','vehiclesTwoRs'
                             // Dados tributos
                             ,'icmsOneRs','icmsTwoRs','issOneRs','issTwoRs','cofinsOneRs','cofinsTwoRs','pisOneRs'
                             ,'pisTwoRs','irpjOneRs','irpjTwoRs','csllOneRs','csllTwoRs','ipvaOneRs','ipvaTwoRs'
                             ,'iptuOneRs','iptuTwoRs','itbiOneRs','itbiTwoRs','fecoepOneRs','fecoepTwoRs'
                             //Dados apuração

                    ]);
    }
    
    public function DeterminationOfResults(){}

}

?>