<?php

namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;
use Cake\Datasource\ConnectionManager;

class ControllershipController extends AppController {

    public function index() {}

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
							+ substring(convert(varchar(10),DATEADD(m, -6, current_timestamp), 103),4,2) )
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