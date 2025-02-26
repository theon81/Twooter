<?php
namespace App\Services\admin;
use App\Models\Accounts;
use App\Http\Requests\AccountRequest;

class AccountService{
    //get all account service  
    public function getAllAccount(){
        $Accounts = Accounts::all();
        return $Accounts;
    }
    //get account by id service  
    public function getAccountId($id){
        return Accounts::where('id',$id)->first();
    }
    //create account service  (hashing password)
    public function createAccount(AccountRequest $request){
        $newAccount = Accounts::create([
            'username' =>$request->username,
            'password' =>bcrypt($request->password),
            'role' => 1,
        ]);
        return $newAccount;
    }
    //update account service
    public function updateAccount($id,AccountRequest $request){
        $account = Accounts::findOrFail($id);
        $account->update([
            'username' => $request->validated()['username'],
            'password' => bcrypt($request->validated()['password']),
            'role' => $request->input('role'),
        ]);
        return $account;
    }
    //delete account service
    public function deleteAccount($id){
        $account = Accounts::find($id);
        $account->delete();
    }
}
?>