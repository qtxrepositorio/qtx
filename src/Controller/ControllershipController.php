<?php

namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;
use Cake\Datasource\ConnectionManager;

class ControllershipController extends AppController {
    
    public function PersonnelExpensesPdf() {
        
        $connection = ConnectionManager::get('baseProtheus');
        
        //debug($this->request->data);
        
        $year = $this->request->data['yearPdf']; 
        $cc = $this->request->data['ccPdf']; 
        
        $ccpdf = $this->request->data['ccPdf']; 
        
        $cc = substr($cc,0,2);
        
        //quadro de pessoal
        $staffPerMonth = $connection->execute("
            SELECT  
                COUNT([RD_PD]) as CONT      
                ,[RD_DATARQ]
                ,[RD_CC]			
                FROM [SRD010]
                    WHERE [SRD010].[D_E_L_E_T_] <> '*'
                        AND [RD_PD] = '101'
                        AND SUBSTRING([RD_DATARQ],0,5) = '2016'					
                    GROUP BY [RD_CC],[RD_DATARQ]
                    ORDER BY [RD_CC],[RD_DATARQ]")
                ->fetchAll('assoc');        
        
        if ($cc != 'TO'){
            
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
                            AND [CT2_DEBITO] in ('41101007','41101024','42101007','42101024') 
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
                            AND [CT2_DEBITO] in ('41101001','41101002','41101003','41101005'
                                                ,'41101009','41101010','41101011','41101025'
                                                ,'41101026','42101001','42101002','42101003'
                                                ,'42101005','42101009','42101010','42101011') 
                            AND D_E_L_E_T_ != '*' AND [CT2_CCD] = '$cc'
                        GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)
                        ")->fetchAll('assoc'); 
        
        }else{
            
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
                            AND [CT2_DEBITO] in ('41101007','41101024','42101007','42101024') 
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
                            AND [CT2_DEBITO] in ('41101001','41101002','41101003','41101005'
                                                ,'41101009','41101010','41101011','41101025'
                                                ,'41101026','42101001','42101002','42101003'
                                                ,'42101005','42101009','42101010','42101011') 
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
                        AND SUBSTRING([RD_DATARQ],0,5) = '2016'					
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
                        AND [CT2_DEBITO] in ('41101007','41101024','42101007','42101024') 
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
                        AND [CT2_DEBITO] in ('41101001','41101002','41101003','41101005'
                                            ,'41101009','41101010','41101011','41101025'
                                            ,'41101026','42101001','42101002','42101003'
                                            ,'42101005','42101009','42101010','42101011') 
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
                        AND SUBSTRING([RD_DATARQ],0,5) = '2016'					
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
                        AND [CT2_DEBITO] in ('41101007','41101024','42101007','42101024') 
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
                        AND [CT2_DEBITO] in ('41101001','41101002','41101003','41101005'
                                            ,'41101009','41101010','41101011','41101025'
                                            ,'41101026','42101001','42101002','42101003'
                                            ,'42101005','42101009','42101010','42101011') 
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

}

?>