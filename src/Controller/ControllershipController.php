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

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42103001')
        AND D_E_L_E_T_ != '*'";
        if ($cc != "TO") {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $icms = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42103002')
        AND D_E_L_E_T_ != '*'";
        if ($cc != "TO") {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $iss = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42103003')
        AND D_E_L_E_T_ != '*'";
        if ($cc != "TO") {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $cofins = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42103004')
        AND D_E_L_E_T_ != '*'";
        if ($cc != "TO") {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $pis = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42103005')
        AND D_E_L_E_T_ != '*'";
        if ($cc != "TO") {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $irpj = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42103006')
        AND D_E_L_E_T_ != '*'";
        if ($cc != "TO") {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $csll = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42103007')
        AND D_E_L_E_T_ != '*'";
        if ($cc != "TO") {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $ipva = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42103008')
        AND D_E_L_E_T_ != '*'";
        if ($cc != "TO") {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $iptu = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42103009')
        AND D_E_L_E_T_ != '*'";
        if ($cc != "TO") {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $itbi = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42103010')
        AND D_E_L_E_T_ != '*'";
        if ($cc != "TO") {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $fecoep = $connection->execute($sql)
        ->fetchAll('assoc');

        $this->set(compact('ccpdf','year','icms','iss','cofins','pis','irpj','csll','ipva','iptu','itbi','fecoep'));
        $this->set('_serialize', ['ccpdf','year','icms','iss','cofins','pis','irpj','csll','ipva','iptu','itbi','fecoep']);

        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');

    }

    public function TaxedExpenses(){

        if ($this->request->is('post')) {
            $year = $this->request->data['year'];
        }else{
            $date = getdate();
            $year = $date['year'];
        }

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

    public function InvestmentExpensesPdf (){

        $connection = ConnectionManager::get('baseProtheus');

        $year = $this->request->data['yearPdf'];
        $cc = $this->request->data['ccPdf'];
        $ccpdf = $this->request->data['ccPdf'];
        $cc = substr($cc,0,2);

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('13201001')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $furnitureAndUtensils = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('13201005','13201009','13201010','13201011','13201014')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $machinesAndEquipment = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('13201007','13201008')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $vehicles = $connection->execute($sql)
        ->fetchAll('assoc');

        $this->set(compact('ccpdf','year','furnitureAndUtensils','machinesAndEquipment','vehicles'));
        $this->set('_serialize', ['ccpdf','year','furnitureAndUtensils','machinesAndEquipment','vehicles']);

        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');

    }

    public function InvestmentExpenses(){

        $connection = ConnectionManager::get('baseProtheus');

        if ($this->request->is('post')) {
            $year = $this->request->data['year'];
        }else{
            $date = getdate();
            $year = $date['year'];
        }

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

    public function FinancialExpensesPdf(){

        $connection = ConnectionManager::get('baseProtheus');

        $year = $this->request->data['yearPdf'];

        $cc = $this->request->data['ccPdf'];

        $ccpdf = $this->request->data['ccPdf'];

        $cc = substr($cc,0,2);

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('41103022','42102022')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $rates = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42104001')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $interestCosts = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42104002')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $discountsGiven = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42104003')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $bankExpenses = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42104004')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $fines = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42104005')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $iof = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42104006')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $ioc = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42104007')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $bankInterestRate = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42104008')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $financialCharges = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('42104009')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $irs = $connection->execute($sql)
        ->fetchAll('assoc');

        $this->set(compact('ccpdf','rates','interestCosts','discountsGiven','bankExpenses','fines','iof','ioc','bankInterestRate','financialCharges','irs'));
        $this->set('_serialize', ['ccpdf','rates','interestCosts','discountsGiven','bankExpenses','fines','iof','ioc','bankInterestRate','financialCharges','irs']);

        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');

    }

    public function FinancialExpenses(){

        if ($this->request->is('post')) {
            $year = $this->request->data['year'];
        }else{
            $date = getdate();
            $year = $date['year'];
        }

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

    public function AdministrativeExpensesPdf() {

        $year = $this->request->data['yearPdf'];
        $connection = ConnectionManager::get('baseProtheus');
        $cc = $this->request->data['ccPdf'];
        $ccpdf = $this->request->data['ccPdf'];
        $cc = substr($cc,0,2);

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('41103004','42102002')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $rent = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('41103003','42102003')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $phoneAndInternet = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('41103002','42102029')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $electricity = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('41103001','42102001')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $waterAndSewage = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('41103015','41103047','42102015','42102048')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $officeSupplies = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('41103033','42102035')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $cleaningSupplies = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
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
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $others = $connection->execute($sql)
        ->fetchAll('assoc');


        $this->set(compact('ccpdf','year','rent','phoneAndInternet','electricity','waterAndSewage','officeSupplies','cleaningSupplies','others'));
        $this->set('_serialize', ['ccpdf','year','rent','phoneAndInternet','electricity','waterAndSewage','officeSupplies','cleaningSupplies','others']);

        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
    }

    public function AdministrativeExpenses() {

        if ($this->request->is('post')) {
            $year = $this->request->data['year'];
        }else{
            $date = getdate();
            $year = $date['year'];
        }

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

    public function OperationalExpenses() {

        if ($this->request->is('post')) {
            $year = $this->request->data['year'];
        }else{
            $date = getdate();
            $year = $date['year'];
        }

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

    public function PersonnelExpensesPdf() {

        $connection = ConnectionManager::get('baseProtheus');

        //debug($this->request->data);

        $year = $this->request->data['yearPdf'];
        $cc = $this->request->data['ccPdf'];

        $ccpdf = $this->request->data['ccPdf'];

        $cc = substr($cc,0,2);

        //quadro de pessoal
        $sql = "
        SELECT
        COUNT([RD_PD]) as CONT
        ,[RD_DATARQ]
        ,[RD_CC]
        FROM [SRD010]
        WHERE [SRD010].[D_E_L_E_T_] <> '*'
        AND [RD_PD] = '101'
        AND SUBSTRING([RD_DATARQ],0,5) = '$year'";
        if ($cc != 'TO') {
            $sql .= "AND [RD_CC] = '$cc'";
        }
        $sql .= " GROUP BY [RD_CC],[RD_DATARQ]
        ORDER BY [RD_CC],[RD_DATARQ]";
        $staffPerMonth = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('41101018','41101022','41101023')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $outehs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('41103036','42103036')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $coursesAndTraining = $connection->execute($sql)->fetchAll('assoc');

        //meteriais de segurança
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('41101019','41101020')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $safetyEquipment = $connection->execute($sql)->fetchAll('assoc');

        //assistencia medica
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('41101016','42101016','41101017','42101017')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $medical = $connection->execute($sql)->fetchAll('assoc');

        //tanstporte
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('41101014','42101014','41101021','42101021')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $transport = $connection->execute($sql)->fetchAll('assoc');

        // alimentação
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('41101015','42101015')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $feeding = $connection->execute($sql)->fetchAll('assoc');

        //encargos sociais
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('41101012','41101013','42101012','42101013')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $socialCharges = $connection->execute($sql)->fetchAll('assoc');

        //premios e gratificações
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('41101024','42101024','41101005','42101005')
        AND D_E_L_E_T_ != '*";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $prizesAndGratuities = $connection->execute($sql)->fetchAll('assoc');

        //hora extra
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('41101006','42101006')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $internshipBag = $connection->execute($sql)->fetchAll('assoc');

        //hora extra
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('41101008','42101008')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $extraHour = $connection->execute($sql)->fetchAll('assoc');

        //prolabore
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,4) = '$year'
        AND [CT2_DEBITO] in ('41101004','42101004')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $prolabore = $connection->execute($sql)->fetchAll('assoc');

        //proventos
        $sql = "
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
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = '$cc'";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2)";
        $earnings = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('ccpdf','year','staffPerMonth','outehs','coursesAndTraining','safetyEquipment','medical','transport','feeding','socialCharges','prizesAndGratuities','internshipBag','extraHour','prolabore','earnings'));
        $this->set('_serialize', ['ccpdf','year','staffPerMonth','outehs','coursesAndTraining','safetyEquipment','medical','transport','feeding','socialCharges','prizesAndGratuities','internshipBag','extraHour','prolabore','earnings']);

        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');

    }

    public function PersonnelExpenses() {

        $connection = ConnectionManager::get('baseProtheus');

        if ($this->request->is('post')) {
            $year = $this->request->data['year'];
        }else{
            $date = getdate();
            $year = $date['year'];
        }

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

    public function RevenuesPerCapitaPdf() {

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

    public function RevenuesPerCapita() {

        if ($this->request->is('post')) {
            $year = $this->request->data['year'];
        }else{
            $date = getdate();
            $year = $date['year'];
        }

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

    public function RevenuesMonthByCcPdf() {

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

    public function RevenuesMonthByCc() {

        if ($this->request->is('post')) {
            $year = $this->request->data['year'];
        }else{
            $date = getdate();
            $year = $date['year'];
        }

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
                AND SUBSTRING([RD_DATARQ],0,5) = YEAR(GETDATE())
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
                    AND SUBSTRING([RD_DATARQ],0,5) = YEAR(GETDATE())
                GROUP BY [RD_CC],[RD_DATARQ],[CTT_DESC01]
                ORDER BY [RD_CC],[RD_DATARQ] ")
                ->fetchAll('assoc');

        $this->set(compact('extraHour', 'staffPerMonth'));
        $this->set('_serialize', ['extraHour', 'staffPerMonth']);
    }

    public function PerCapitaExtraHoursCostFilter() {

        $year = $this->request->data['year'];
        $CustoDeHorasExtraPorCentroDeCustoCCS = $this->request->data['CustoDeHorasExtraPorCentroDeCustoCCS'];

        $connection = ConnectionManager::get('baseProtheus');

        $ccsNames = $connection->execute("SELECT
            [CTT_DESC01]
            FROM [SRD010]
            INNER JOIN [CTT010] ON [CTT_CUSTO] = [RD_CC]
                WHERE [SRD010].[D_E_L_E_T_] <> '*'
                AND SUBSTRING([RD_DATARQ],0,5) = YEAR(GETDATE())
                AND [RD_PD] IN('109','117','118','123','157','229')
            GROUP BY [RD_DATARQ],[CTT_DESC01]
            ORDER BY [RD_DATARQ] ASC")->fetchAll('assoc');

        if ($this->request->data['CustoDeHorasExtraPorCentroDeCustoCCS'] == 'TODOS') {

            $extraHour = $connection->execute("SELECT
                SUM([RD_VALOR]) SUM
                ,[RD_DATARQ]
                ,[CTT_DESC01]
                ,[RD_CC]
            FROM [SRD010]
            INNER JOIN [CTT010] ON [CTT_CUSTO] = [RD_CC]
                WHERE [SRD010].[D_E_L_E_T_] <> '*'
                AND SUBSTRING([RD_DATARQ],0,5) = $year
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
                        AND SUBSTRING([RD_DATARQ],0,5) = $year
                    GROUP BY [RD_CC],[RD_DATARQ],[CTT_DESC01]
                    ORDER BY [RD_CC],[RD_DATARQ] ")
                    ->fetchAll('assoc');

        }else{

            $extraHour = $connection->execute("SELECT
                SUM([RD_VALOR]) SUM
                ,[RD_DATARQ]
                ,[CTT_DESC01]
                ,[RD_CC]
            FROM [SRD010]
            INNER JOIN [CTT010] ON [CTT_CUSTO] = [RD_CC]
                WHERE [SRD010].[D_E_L_E_T_] <> '*'
                AND SUBSTRING([RD_DATARQ],0,5) = $year
                AND [RD_PD] IN('109','117','118','123','157','229')
                AND [CTT_DESC01] like '%$CustoDeHorasExtraPorCentroDeCustoCCS%'
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
                        AND SUBSTRING([RD_DATARQ],0,5) = $year
                        AND [CTT_DESC01] like '%$CustoDeHorasExtraPorCentroDeCustoCCS%'
                    GROUP BY [RD_CC],[RD_DATARQ],[CTT_DESC01]
                    ORDER BY [RD_CC],[RD_DATARQ] ")
                    ->fetchAll('assoc');

        }

        $this->set(compact('extraHour', 'staffPerMonth','ccsNames'));
        $this->set('_serialize', ['extraHour', 'staffPerMonth','ccsNames']);
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

        $cc = substr($this->request->data['cc'], 0,2);

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

        // ==== RECEITAS INI ==== //

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCC]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        , [CT2_CREDIT]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_CREDIT] in ('31101001','31101002','31102001','31102002')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCC] = '" . substr($cc, 0,2) ."'";
        }
        $sql .= " GROUP BY [CT2_CCC], SUBSTRING([CT2_DATA],5,2),[CT2_CREDIT] ";
        $revenuesOneRs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCC]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        , [CT2_CREDIT]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_CREDIT] in ('31101001','31101002','31102001','31102002')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCC] = '" . substr($cc, 0,2) ."'";
        }
        $sql .= " GROUP BY [CT2_CCC], SUBSTRING([CT2_DATA],5,2),[CT2_CREDIT] ";
        $revenuesTwoRs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('11204005','11204007','11204008','11204009','11204010')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2) ";
        $revenuesCountDebitOneRs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        , [CT2_CCD]
        , SUBSTRING([CT2_DATA],5,2) AS [CT2_DATA]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('11204005','11204007','11204008','11204009','11204010')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $sql .= " GROUP BY [CT2_CCD], SUBSTRING([CT2_DATA],5,2) ";
        $revenuesCountDebitTwoRs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('31101001','31101002','31101003','31101004')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $cancellationOfTitlesOneRs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('31101001','31101002','31101003','31101004')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $cancellationOfTitlesTwoRs = $connection->execute($sql)->fetchAll('assoc');
        // ==== RECEITAS FIM ==== //

        // ============= RECURSOS HUMANOS DESPESAS INI ============= //

        // outras despesas
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41101018','41101022','41101023')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $othersRHOneRs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41101018','41101022','41101023')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $othersRHTwoRs = $connection->execute($sql)->fetchAll('assoc');

        //higienização
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103012','42102011')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $sanitationOneRs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103012','42102011')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $sanitationTwoRs = $connection->execute($sql)->fetchAll('assoc');

        //cursos e treinamentos
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103036','42103036')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $coursesAndTrainingOneRs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103036','42103036')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $coursesAndTrainingTwoRs = $connection->execute($sql)->fetchAll('assoc');

        //meteriais de segurança
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41101019','41101020')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $safetyEquipmentOneRs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41101019','41101020')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $safetyEquipmentTwoRs = $connection->execute($sql)->fetchAll('assoc');

        //assistencia medica
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41101016','42101016','41101017','42101017')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $medicalOneRs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41101016','42101016','41101017','42101017')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $medicalTwoRs = $connection->execute($sql)->fetchAll('assoc');

        //tanstporte
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41101014','42101014','41101021','42101021')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $transportOneRs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41101014','42101014','41101021','42101021')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $transportTwoRs = $connection->execute($sql)->fetchAll('assoc');

        // alimentação
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41101015','42101015')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $feedingOneRs  = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41101015','42101015')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $feedingTwoRs = $connection->execute($sql)->fetchAll('assoc');

        //encargos sociais
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41101012','41101013','42101012','42101013')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $socialChargesOneRs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41101012','41101013','42101012','42101013')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $socialChargesTwoRs = $connection->execute($sql)->fetchAll('assoc');

        //premios e gratificações
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41101024','42101024','42101005','41101005')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $prizesAndGratuitiesOneRs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41101024','42101024','42101005','41101005')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $prizesAndGratuitiesTwoRs = $connection->execute($sql)->fetchAll('assoc');

        //bolsa estagio
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41101006','42101006')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $internshipBagOneRs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41101006','42101006')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $internshipBagTwoRs = $connection->execute($sql)->fetchAll('assoc');

        //hora extra
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41101008','42101008')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $extraHourOneRs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41101008','42101008')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $extraHourTwoRs = $connection->execute($sql)->fetchAll('assoc');

        //prolabore
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41101004','42101004')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $prolaboreOneRs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41101004','42101004')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $prolaboreTwoRs = $connection->execute($sql)->fetchAll('assoc');

        //proventos
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41101001','41101002','41101003'
        ,'41101009','41101010','41101011','41101025'
        ,'41101026','42101001','42101002','42101003'
        ,'42101009','42101010','42101011','42101007','41101007')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $earningsOneRs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41101001','41101002','41101003'
        ,'41101009','41101010','41101011','41101025'
        ,'41101026','42101001','42101002','42101003'
        ,'42101009','42101010','42101011','42101007','41101007')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $earningsTwoRs = $connection->execute($sql)->fetchAll('assoc');

        // ============= RECURSOS HUMANOS DESPESAS FIM ============= //

        // ============= OPERACIONAL DESPESAS INI =============//

        //manuntenções
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103008','41103035'
        ,'41103031','41103041','41103045'
        ,'42102005','42102027','42102033'
        ,'42103037','42102042')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $maintenanceOneRs = $connection->execute($sql)->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103008','41103035'
        ,'41103031','41103041','41103045'
        ,'42102005','42102027','42102033'
        ,'42103037','42102042')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $maintenanceTwoRs = $connection->execute($sql)->fetchAll('assoc');

        //multas de transito
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103044','42102044')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $finesOfCarsOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103044','42102044')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $finesOfCarsTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        //pneus
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103032','42102034')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $tiresOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103032','42102034')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $tiresTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        // oleos e lubricicantes
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103023','42102023')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $fuelAndLubricantsOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103023','42102023')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $fuelAndLubricantsTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        // alugueis
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103005','42102008','41103006','42102025')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $rentsOprOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103005','42102008','41103006','42102025')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $rentsOprTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        //fretes
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103009','41103014','41103042','42102006','42102014','42102043')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $freightOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103009','41103014','41103042','42102006','42102014','42102043')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $freightTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103027','41103028','41103040'
        ,'41103043','41201001','42102028'
        ,'42102030','42102041')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $materialsOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103027','41103028','41103040'
        ,'41103043','41201001','42102028'
        ,'42102030','42102041')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $materialsTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103017','42102017')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $materialsLabOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103017','42102017')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $materialsLabTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103048')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $analisesLabOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103048')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $analisesLabTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103026')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $descartETratOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103026')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $descartETratTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103030','42102032')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $viagensOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103030','42102032')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $viagensTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103020','41103021','42102020','42102021')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $othersOPROneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103020','41103021','42102020','42102021')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $othersOPRTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');
        // ============= OPERACIONAL DESPESAS FIM =============//

        // ============= administrativo DESPESAS INI =============//

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103004','42102002')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $rentAdmOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103004','42102002')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $rentAdmTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103003','42102003')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $phoneAndInternetOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103003','42102003')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $phoneAndInternetTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103002','42102029')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $electricityOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103002','42102029')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $electricityTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103001','42102001')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $waterAndSewageOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103001','42102001')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $waterAndSewageTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103015','41103047','42102015','42102048')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $officeSuppliesOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103015','41103047','42102015','42102048')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $officeSuppliesTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103033','42102035')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $cleaningSuppliesOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103033','42102035')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $cleaningSuppliesTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103007','41103016','41103018','41103019','41103024','41103037'
        ,'41103038','42102004','42102016','42102018','42102019','42102024'
        ,'42102039','42102045','42102047')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $othersAdmOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103007','41103016','41103018','41103019','41103024','41103037'
        ,'41103038','42102004','42102016','42102018','42102019','42102024'
        ,'42102039','42102045','42102047')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $othersAdmTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        // ============= administrativo DESPESAS FIM =============//

        // ============= FINANCEIRA DESPESAS INI =============//

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('41103022','42102022')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $ratesOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('41103022','42102022')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $ratesTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42104001')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $interestCostsOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42104001')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $interestCostsTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42104002')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $discountsGivenOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42104002')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $discountsGivenTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42104003')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $bankExpensesOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42104003')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $bankExpensesTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42104004')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $finesFinancialOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42104004')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $finesFinancialTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42104005')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $iofOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42104005')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $iofTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42104006')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $iocOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42104006')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $iocTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42104007')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $bankInterestRateOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42104007')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $bankInterestRateTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42104008')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $financialChargesOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42104008')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $financialChargesTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42104009')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $irsOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42104009')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $irsTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        // ============= FINANCEIRA DESPESAS FIM =============//

        // ============= INVESTIMENTOS DESPESAS INI =============//
        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('13201001')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $furnitureAndUtensilsOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('13201001')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $furnitureAndUtensilsTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('13201005','13201009','13201010','13201011','13201014')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $machinesAndEquipmentOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('13201005','13201009','13201010','13201011','13201014')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $machinesAndEquipmentTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('13201007','13201008')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $vehiclesOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('13201007','13201008')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $vehiclesTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        // ============= INVESTIMENTOS DESPESAS FIM =============//

        // ============= TRIBUTOS DESPESAS INI =============//

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42103001')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $icmsOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42103001')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $icmsTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42103002')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $issOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42103002')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $issTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42103003')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $cofinsOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42103003')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $cofinsTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42103004')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $pisOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42103004')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $pisTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42103005')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $irpjOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42103005')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $irpjTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42103006')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $csllOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42103006')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $csllTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42103007')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $ipvaOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42103007')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $ipvaTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42103008')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $iptuOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42103008')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $iptuTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42103009')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $itbiOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42103009')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $itbiTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodOneForFind'
        AND [CT2_DEBITO] in ('42103010')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $fecoepOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        SUM([CT2_VALOR]) AS [CT2_VALOR]
        FROM [CT2010]
        WHERE
        SUBSTRING([CT2_DATA],1,6) = '$periodTwoForFind'
        AND [CT2_DEBITO] in ('42103010')
        AND D_E_L_E_T_ != '*'";
        if ($cc != 'TO') {
            $sql .= "AND [CT2_CCD] = " . substr($cc, 0,2) ."";
        }
        $fecoepTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        // ============= TRIBUTOS DESPESAS FIM =============//

        // ============= QUANTIDADE DE PESSOAL INI =============//

        $sql = "
        SELECT
        COUNT([RD_PD]) as CONT
        FROM [SRD010]
        WHERE [SRD010].[D_E_L_E_T_] <> '*'
        AND [RD_PD] = '101'
        AND SUBSTRING([RD_DATARQ],1,6) = '$periodOneForFind'";
        if ($cc != 'TO') {
            $sql .= "AND [RD_CC] = '" . substr($cc, 0,2) ."'";
        }
        $staffPerMonthOneRs = $connection->execute($sql)
        ->fetchAll('assoc');

        $sql = "
        SELECT
        COUNT([RD_PD]) as CONT
        FROM [SRD010]
        WHERE [SRD010].[D_E_L_E_T_] <> '*'
        AND [RD_PD] = '101'
        AND SUBSTRING([RD_DATARQ],1,6) = '$periodTwoForFind'";
        if ($cc != 'TO') {
            $sql .= "AND [RD_CC] = '" . substr($cc, 0,2) ."'";
        }
        $staffPerMonthTwoRs = $connection->execute($sql)
        ->fetchAll('assoc');

        // ============= QUANTIDADE DE PESSOAL FIM =============//

        $cc = $this->request->data['cc'];

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
