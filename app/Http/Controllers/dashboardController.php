<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\admin\borrowers_tbl;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
      $borrowers_tbl=borrowers_tbl::orderBy('id', 'desc')->take('5')->get();
    return view('all_files.index')->with(['borrowers_tbl'=>$borrowers_tbl]);}





    //borrowers
    public function borrowers(Request $request){
      $borrowers_tbl=borrowers_tbl::orderBy('id', 'desc')->paginate(30);
    return view('all_files.borrowers.index')->with(['borrowers_tbl'=>$borrowers_tbl]);}

    public function add_borrowers(){
    return view('all_files.borrowers.add_borrowers');}



    public function insert_borrowers(Request $request){
        $validatedData = $request->validate(['name' => 'required|max:191',]);

      $table_name=new borrowers_tbl;
        $table_name->name=$request->input("name");

        $job=$request->input("job");
        if ($job==true) {$table_name->job=true;}
        else {$table_name->job=false;}
        $table_name->monthly_income=$request->input("monthly_income");
        $table_name->job_company_name=$request->input("job_company_name");
        $table_name->job_designation=$request->input("job_designation");
        $table_name->job_description=$request->input("job_description");


        $bank_account=$request->input("bank_account");
        if ($bank_account==true) {$table_name->bank_account=true;}
        else {$table_name->bank_account=false;}
        $table_name->bank_name=$request->input("bank_name");
        $table_name->current_bank_balance=$request->input("current_bank_balance");
        $table_name->bank_description=$request->input("bank_description");

        $table_name->borrower_description=$request->input("borrower_description");
        $table_name->save();

    return redirect('admin/borrowers')->with('status', 'Well done! Added Success!');}



    public function edit_borrowers(Request $request){
      $id=$request->input("id");
      $id=borrowers_tbl::findOrFail($id);
    return view('all_files.borrowers.edit_borrowers')->with(['id'=>$id]);}



    public function update_borrowers(Request $request){
        $validatedData = $request->validate(['name' => 'required|max:191',]);

        $id=$request->input('id');
        $table_name=borrowers_tbl::find($id);
            $table_name->name=$request->input("name");

            $job=$request->input("job");
            if ($job==true) {$table_name->job=true;}
            else {$table_name->job=false;}
            $table_name->monthly_income=$request->input("monthly_income");
            $table_name->job_company_name=$request->input("job_company_name");
            $table_name->job_designation=$request->input("job_designation");
            $table_name->job_description=$request->input("job_description");


            $bank_account=$request->input("bank_account");
            if ($bank_account==true) {$table_name->bank_account=true;}
            else {$table_name->bank_account=false;}
            $table_name->bank_name=$request->input("bank_name");
            $table_name->current_bank_balance=$request->input("current_bank_balance");
            $table_name->bank_description=$request->input("bank_description");

            $table_name->borrower_description=$request->input("borrower_description");
        $table_name->update();
        $id=$request->input('id');
    return back()->with('status', 'Well done! Updated Success!');}


    public function delete_borrowers(Request $request){
      $id=$request->input('id');
      $id=borrowers_tbl::findOrFail($id);
      $id->delete();
    return back()->with('status', 'Data Deleted');}


function action(Request $request){
     if($request->ajax()){
      $output = '';
      $query = $request->get('query');
      if($query != ''){
       $data = DB::table('borrowers_tbl')
         ->select('*')
         ->where('name', 'like', '%'.$query.'%')
         ->Orwhere('id', 'like', '%'.$query.'%')
         ->distinct()
         ->orderBy('id', 'desc')
         ->take(8)->get();}
$x=0;
      $total_row = $data->count();
      if($total_row > 0){
       foreach($data as $data){
        $x=$x+1;
        $output .= "
        <tr class='srcTr'>
         <td class='srcTd'>
          <a class='srcA' href='menu?id=".$data->id."'>{$data->name}
          </a>

                {$data->monthly_income}*12
          </td>
        </tr>
        ";}
      }
      else{
       $output = "
        <tr class='srcTr'>
         <td class='srcTd' colspan='6'>
          <h4>No Data Found</h4>
         </td>
        </tr>
       ";}
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row);
        echo json_encode($data);
     }
}



}
