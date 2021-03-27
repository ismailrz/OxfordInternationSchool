<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\financialOrganization;
use Illuminate\Http\Request;
use Validator;
class BankAccountController extends Controller
{
    public function getAccounts()
    {
        $accounts = BankAccount::all();
        return  response()->json(['accounts' => $accounts]);
    }
    public function getOrganizations()
    {
        $organizations = financialOrganization::all();
        return  response()->json(['organizations' => $organizations]);
    }
    public function getEditAccount($id)
    {
        $account = BankAccount::find($id);
        if($account){
            $result['response'] = 'success';
            $result['account'] = $account;
        }else{
            $result['response'] = 'error';
            $result['message'] = 'Sorry! data not Found!';
        }
         return response()->json($result);
    }
    public function deleteAccount($id)
    {
        $account = BankAccount::find($id);
        if($account->delete()){
            $result['response'] = 'success';
            $result['message'] = 'Delete success';
        }else{
            $result['response'] = 'error';
            $result['message'] = 'Sorry! data not Found!';
        }
         return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newAccount(Request $request)
    {
        $result['response'] = 'success';
         $validator = Validator::make($request->all(), [
             'account_name' => 'required',
             'account_no' => 'required',
             'financial_organization_id' => 'required',
             'branch' => 'required',
             'swift_code' => 'required',
             'route_no' => 'required',
             'account_type' => 'required',
         ]);
         if ($validator->fails()) {
             $result['response'] = 'error';
             $result['message'] = $validator->errors();
             return response()->json($result);
         }
       
         $account = new BankAccount();
         $account->account_name = $request->account_name;
         $account->account_no = $request->account_no;
         $account->financial_organization_id = $request->financial_organization_id;
         $account->branch = $request->branch;
         $account->swift_code = $request->swift_code;
         $account->account_type = $request->account_type;
         $account->route_no = $request->route_no;
         if($account->save()){
            $result['message'] = 'Great!, account created sucessful.';
        }else{
            $result['response'] = 'error';
            $result['message'] = 'Sorry, action failed! Please try again.';
        }
         return response()->json($result);
    }
    public function updateAccount(Request $request)
    {
        $result['response'] = 'success';
         $validator = Validator::make($request->all(), [
             'account_name' => 'required',
             'account_no' => 'required',
             'financial_organization_id' => 'required',
             'branch' => 'required',
             'swift_code' => 'required',
             'route_no' => 'required',
             'account_type' => 'required',
         ]);
         if ($validator->fails()) {
             $result['response'] = 'error';
             $result['message'] = $validator->errors();
             return response()->json($result);
         }

         $account = BankAccount::find($request->id);
         $account->account_name = $request->account_name;
         $account->account_no = $request->account_no;
         $account->financial_organization_id = $request->financial_organization_id;
         $account->branch = $request->branch;
         $account->swift_code = $request->swift_code;
         $account->route_no = $request->route_no;
         $account->account_type = $request->account_type;
         if($account->update()){
            $result['message'] = 'Great!, Account updated sucessful.';
        }else{
            $result['response'] = 'error';
            $result['message'] = 'Sorry, action failed! Please try again.';
        }
         return response()->json($result);
    }
}
