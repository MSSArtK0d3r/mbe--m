<?php

namespace App\Controllers;

use Config\Services;

class Tender extends Security_Controller {

    function __construct() {
        parent::__construct();
        $this->init_permission_checker("tender");
    }

    /* load invoice list view */

    function index() {
        $db = \Config\Database::connect();

        $data['tender_list'] = $db->table('tenders')
            ->select('tenders.*, clients.company_name')
            ->join('clients', 'clients.id = tenders.client_id', 'left') // Left join to include tenders without a client
            ->get()
            ->getResult();
        

        return $this->template->rander("tenders/index", $data);
    }

    function modal_create() {
        
        $db = \Config\Database::connect();
        $data['clients'] = $db->table('clients')->get()->getResult();
        return $this->template->view('tenders/modal_create_tender',$data);
    }

    function modal_edit_tender(){
        $db = \Config\Database::connect();
        $tid = $this->request->getGet('tid');
        $dataTender = $db->table('tenders')->where('tid', $tid)->get()->getRow();
        $data['selected_client_id'] = $dataTender->client_id;
        $data['clients'] = $db->table('clients')->get()->getResult();
        $data['tender_data'] = $dataTender;
        
        return $this->template->view('tenders/modal_edit_tender',$data);
    }

    function save() {
        $db = \Config\Database::connect();
        $data = [
            'tname'     => $this->request->getPost('tname'),
            'tcost'     => $this->request->getPost('tcost'),
            'client_id' => $this->request->getPost('client'),
            'sub_date'  => $this->request->getPost('sub_date'),
            'tstatus'  => 0,
            'isSiteVisit' => 0,
            'isBq' => 0
        ];
    
        $insert = $db->table('tenders')->insert($data);

        
        if ($insert) {
            return redirect()->to(base_url('tender'))->with('success', 'Project saved successfully!');
        } else {
            return redirect()->back()->with('error', 'Error saving project.');
        }
    }

    function edit() {
        $tid = $this->request->getPost('tid');
        $db = \Config\Database::connect();
        $data = [
            'tname'     => $this->request->getPost('tname'),
            'tcost'     => $this->request->getPost('tcost'),
            'client_id' => $this->request->getPost('client'),
            'sub_date'  => $this->request->getPost('sub_date'),
            'tstatus'  => 0,
            'isSiteVisit' => 0,
            'isBq' => 0
        ];
    
        $update = $db->table('tenders')->where('tid', $tid)->update($data);

        
        if ($update) {
            return redirect()->to(base_url('tender/tender_detail?tid='.$tid))->with('success', 'Project saved successfully!');
        } else {
            return redirect()->back()->with('error', 'Error saving project.');
        }
    }
    
    function change_tstatus_done()
    {
        $tid = $this->request->getPost('tid');
        $db = \Config\Database::connect();
        $data = [
            'tstatus'  => 1,
        ];
    
        $update = $db->table('tenders')->where('tid', $tid)->update($data);

        
        if ($update) {
            return redirect()->to(base_url('tender/tender_detail?tid='.$tid))->with('success', 'Project saved successfully!');
            //echo json_encode(array("success" => true, "data" => $tid));
        } else {
            return redirect()->back()->with('error', 'Error saving project.');
            // echo json_encode(array("success" => false));
        }
    }

    function change_isSiteVisit_done()
    {
        $tid = $this->request->getPost('tid');
        $db = \Config\Database::connect();
        $data = [
            'isSiteVisit'  => 1,
        ];
    
        $update = $db->table('tenders')->where('tid', $tid)->update($data);

        
        if ($update) {
            return redirect()->to(base_url('tender/tender_detail?tid='.$tid))->with('success', 'Project saved successfully!');
            //echo json_encode(array("success" => true, "data" => $tid));
        } else {
            return redirect()->back()->with('error', 'Error saving project.');
            // echo json_encode(array("success" => false));
        }
    }

    function change_isBq_done()
    {
        $tid = $this->request->getPost('tid');
        $db = \Config\Database::connect();
        $data = [
            'isBq'  => 1,
        ];
    
        $update = $db->table('tenders')->where('tid', $tid)->update($data);

        
        if ($update) {
            return redirect()->to(base_url('tender/tender_detail?tid='.$tid))->with('success', 'Project saved successfully!');
            //echo json_encode(array("success" => true, "data" => $tid));
        } else {
            return redirect()->back()->with('error', 'Error saving project.');
            // echo json_encode(array("success" => false));
        }
    }

    function modal_bq_save(){

        $db = \Config\Database::connect();
        $tid = $this->request->getGet('tid');
        $data['tid'] = $tid;
        $data['bqData'] = $db->table('tender_bq')->where('tender_id', $tid)->get()->getRow();

        return $this->template->view('tenders/modal_create_tender_bq', $data);
    
    }

    function save_bq() {
        $tid = $this->request->getPost('tid');
        $db = \Config\Database::connect();
        $data = [
            'tender_id' => $this->request->getPost('tid'),
            'bc'        => $this->request->getPost('bc'),
            'amount'    => unformat_currency($this->request->getPost('amount')),
            'bqstatus'  => $this->request->getPost('bqstatus'),
            'bcamount' => $this->request->getPost('bc') * $this->request->getPost('amount') / 100
        ];
    
        $insert = $db->table('tender_bq')->insert($data);
        
        if ($insert) {
            return redirect()->to(base_url('tender/tender_detail?tid='.$tid))->with('success', 'Project saved successfully!');
        } else {
            return redirect()->back()->with('error', 'Error saving project.');
        }
    }

    function modal_bq_edit(){

        $db = \Config\Database::connect();
        $tid = $this->request->getGet('tid');
        $data['tid'] = $tid;
        $data['bqData'] = $db->table('tender_bq')->where('tender_id', $tid)->get()->getRow();

        return $this->template->view('tenders/modal_edit_tender_bq', $data);

    }

    function edit_bq() {
        $tid = $this->request->getPost('tid');
        $db = \Config\Database::connect();
    
        // Convert formatted value to proper decimal numbers
        $amount = sunformat_currency($this->request->getPost('amount')); // Remove commas
        $amount = floatval($amount); // Convert to float (to keep decimals)
    
        $data = [
            'amount' => unformat_currency($amount),
            'bc'        => $this->request->getPost('bc'),
            'bqstatus'  => $this->request->getPost('bqstatus'),
            'bcamount' => ($this->request->getPost('bc') * $amount) / 100
        ];
    
        $update = $db->table('tender_bq')->where('tender_id', $tid)->update($data);
    
        if ($update) {
            return redirect()->to(base_url('tender/tender_detail?tid='.$tid))->with('success', 'Project saved successfully!');
        } else {
            return redirect()->back()->with('error', 'Error saving project.');
        }
    }
    
    

    function modal_add_expenses(){

            $db = \Config\Database::connect();
            $tid = $this->request->getGet('tid');
            $data['tid'] = $tid;

            return $this->template->view('tenders/modal_create_tender_expenses', $data);
        
    }

    function save_expenses() {
        
        $tid = $this->request->getPost('tid');
        $data = [
            'expenses_detail' => $this->request->getPost('expenses_detail'),
            'amount' => unformat_currency($this->request->getPost('amount')),
            'tender_id' => $this->request->getPost('tid'),
            'expenses_date'  => $this->request->getPost('expenses_date'),
            'cat'  => $this->request->getPost('cat')
        ];
        $data2 = ["isSiteVisit" => 0,"isBq" => 0];
        $db = \Config\Database::connect();
        $insert = $db->table('tender_expenses')->insert($data);
        $update = $db->table('tenders')->where('tid', $tid)->update($data2);

        
        if ($insert) {
            return redirect()->to(base_url('tender/tender_detail?tid='.$tid))->with('success', 'Project saved successfully!');
            
        } else {
            return redirect()->back()->with('error', 'Error saving project.');
            
        }
    }

    function generate_project(){
        $tid = $this->request->getGet('tid');
        $db = \Config\Database::connect();
        $tenderData = $db->table('tenders')->where('tid', $tid)->get()->getRow();
        $tenderPrice = $db->table('tender_bq')->where('tender_id', $tid)->get()->getRow();
        $data['tid'] = $tid;
        $data['tender_data'] = $tenderData;
        $data['tender_price'] = $tenderPrice;

        return $this->template->view('tenders/modal_create_project', $data);
    }

    function save_project(){
        $tid = $this->request->getPost('tid');
        $db = \Config\Database::connect();
        $data = [
            'title' => $this->request->getPost('title'),
            'project_type' => 'client_project',
            'start_date' => $this->request->getPost('start_date'),
            'deadline' => $this->request->getPost('deadline'),
            'client_id' => $this->request->getPost('client_id'),
            'created_by' => 1,
            'created_date' => date('Y-m-d'),
            'status' => 'open',
            'status_id' => 1,
            'price' => $this->request->getPost('price'),
            'pb' => $this->request->getPost('pb'),
            'status_id' => 1,
            'starred_by' => '',
            'tender_id' => $this->request->getPost('tid')
            ];

        $insert = $db->table('projects')->insert($data);
        $newPId = $db->insertID();
        
        $tender_doc_cost = $db->table('tenders')->select('tcost')->where('tid', $tid)->get()->getRow();
        $dataExpensesSum = $db->table('tender_expenses')
        ->selectSum('amount') // Select category and sum of amount
        ->where('tender_id', $tid)
        ->get()
        ->getRow();
        $tenderCost = $tender_doc_cost->tcost + $dataExpensesSum->amount;

        $dataExpenses = [
            'expense_date' => date('Y-m-d'),
            'category_id' => 8,
            'amount' => unformat_currency($tenderCost),
            'Title' =>'Tender Expenses '. $this->request->getPost('title'),
            'project_id' => $newPId,


        ];

        $insertExpenses = $db->table('expenses')->where('project_id', $newPId)->insert($dataExpenses);


        if ($insert) {
            return redirect()->to(base_url('tender/tender_detail?tid='.$tid))->with('success', 'Project saved successfully!');
            
        } else {
            return redirect()->back()->with('error', 'Error saving project.');
            
        }

    }

    function tender_detail(){
        $tid = $this->request->getGet('tid');
        if (!is_numeric($tid)) {
            return redirect()->to('/tender')->with('error', 'Invalid Tender ID');
        }

        $db = \Config\Database::connect();
        $builder = $db->table('tenders'); // Select the table
        $query = $builder->where('tid', $tid)->get(); // Add condition and execute query
        $result = $query->getRow();

        $clientData = $db->table('clients')->where('id', $result->client_id)->get()->getRow();
        $dataExpenses = $db->table('tender_expenses')->where('tender_id', $tid)->get()->getResult();
        $dataExpensesSummary = $db->table('tender_expenses')
        ->select('cat, SUM(amount) as total_amount') // Select category and sum of amount
        ->where('tender_id', $tid)
        ->groupBy('cat') // Group by category
        ->get()
        ->getResult();
        $bqData = $db->table('tender_bq')->where('tender_id', $tid)->get()->getRow();
        $totalExpensesSum = array_sum(array_column($dataExpensesSummary, 'total_amount'));
        $tenderProject = $db->table('projects')->where('tender_id', $tid)->get()->getRow();
        
        
        if ($result == null) {
            return redirect()->to('/tender');
        }

        $data['tender_data'] = $result;
        $data['client_data'] = $clientData;
        $data['tender_expenses'] = $dataExpenses;
        $data['tender_expenses_summary'] = $dataExpensesSummary;
        $data['total_expenses'] = $totalExpensesSum;
        $data['bqData'] = $bqData;
        $data['tender_project'] = $tenderProject;
        return $this->template->rander('tenders/tender_overview',$data); 
    }

    function expense_delete(){
        $id = $this->request->getGet('id');
        $tid = $this->request->getGet('tid');
        $db = \Config\Database::connect();
        $delete_expenses = $db->table('tender_expenses')->where('texp_id', $id)->delete();

        if ($delete_expenses) {
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Error saving project.');
            
        }
    }


    
}

/* End of file invoices.php */
/* Location: ./app/controllers/invoices.php */