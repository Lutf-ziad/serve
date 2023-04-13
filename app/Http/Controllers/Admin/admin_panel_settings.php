<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Requst_seting;
use App\Models\Admin;
use App\Models\Admin_panel_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class admin_panel_settings extends Controller
{
    public function index(){
         $data=Admin_panel_setting::where('com_code',auth()->guard('admin')->user()->com_code)->first();
       //  $data=get_cols_where_p(new Admin_panel_setting(),array("*"),array("com_code" => auth()->guard()->user()->come_code));
        if(!empty($data)){
            if($data['updated_by'] >0 and $data['updated_by']!=null){
               $data['data_by_admin']=Admin::where('id',$data['updated_by'])->value('name');
            }
        }
        //dd(auth()->guard('admin')->user()->com_code)
   return view('admin.adminPanaleseting.index',['data' => $data]);
    }
    public function edite(){
        $data=Admin_panel_setting::where('com_code',auth()->guard('admin')->user()->com_code)->first();
     return view('admin.adminPanaleseting.edit',['data' =>$data]);
    }

    public function update(Requst_seting $request){
        // return $request;
        try {
            DB::beginTransaction();

 $admin_panel_setting = Admin_panel_setting::where('com_code', auth()->guard('admin')->user()->com_code)->first();
 $admin_panel_setting->system_name = $request->system_name;
 $admin_panel_setting->address = $request->address;
 $admin_panel_setting->phone = $request->phone;
  $admin_panel_setting->general_alert = $request->general_alert;
//  $admin_panel_setting->customer_parent_account_number = $request->customer_parent_account_number;
//  $admin_panel_setting->suppliers_parent_account_number = $request->suppliers_parent_account_number;
//  $admin_panel_setting->delegate_parent_account_number = $request->delegate_parent_account_number;
//  $admin_panel_setting->employees_parent_account_number = $request->employees_parent_account_number;
//  $admin_panel_setting->production_lines_parent_account = $request->production_lines_parent_account;
 $admin_panel_setting->updated_by = auth()->user()->id;
  $admin_panel_setting->updated_at = date("Y-m-d H:i:s");
 $oldphotoPath = $admin_panel_setting->photo;
 if ($request->has('photo')) {
 $request->validate([
 'photo' => 'required|mimes:png,jpg,jpeg|max:2000',
 ]);
 $the_file_path = uploadImage('admin/uploads', $request->photo);
 $admin_panel_setting->photo = $the_file_path;
 if (file_exists('admin/uploads/' . $oldphotoPath) and !empty($oldphotoPath)) {
 unlink('admin/uploads/' . $oldphotoPath);
  }
 }
 $admin_panel_setting->save();
          return redirect()->route('admin.adminPanelSetting.index')->with(['success' => 'تم للتعديل بنجاح']);
           DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.adminPanelSetting.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
