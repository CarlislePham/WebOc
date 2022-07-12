<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Events\MyEvent;
use App\Bill;
use App\BillInfo;
use App\Category;
use App\Food;
use App\TableFood;
use App\User;
use App\Rules\Captcha;
use DB;
use Session;
use Hash;
use Auth;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function login(){
        return view('login');
    }
    public function postLogin(Request $req){
        $this->validate($req,
            [
                'username'=>'required',
                'pass'=>'required|min:6',
                'g-recaptcha-response'=>'required', new Captcha(),
            ],
            [
                'username.required'=>'Tên đăng nhập trống',
                'pass.required'=>'Vui lòng nhập password',
                'pass.min'=>'Password có ít nhất 6 kí tự',
                'g-recaptcha-response.required'=>'Vui lòng điền Captcha',
            ]);

        $credentials = array('username'=>$req->username,'password'=>$req->pass);
        if(Auth::attempt($credentials)){
            return redirect()->route('index')->with('alert','Đăng nhập thành công'); 
        }
        else {
            return redirect()->back()->with('alert','Tên tài khoản của bạn hoặc Mật khẩu không đúng, vui lòng thử lại');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }





    public function postLoginapp(Request $req){
        $this->validate($req,
            [
                'username'=>'required',
                'pass'=>'required|min:6',
            ],
            [
                'username.required'=>'Tên đăng nhập trống',
                'pass.required'=>'Vui lòng nhập password',
                'pass.min'=>'Password có ít nhất 6 kí tự',
            ]);

        $credentials = array('username'=>$req->username,'password'=>$req->pass);
        if(Auth::attempt($credentials)){
            
            $user = Auth::user();
            return response()->json([
            'success' => true,
            'user' => $user
            ], 200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);

        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Username or Password',
            ], 401);
        }
    }

    
    public function logoutapp(){
        Auth::logout();
        return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
    }






/*    public function index(){
    	$nhanvien=Nhanvien::all();
    	return response()->json($nhanvien, 200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }


    public function add(Request $req){
    	$nhanvien=new Nhanvien;
    	$nhanvien->name=$req->name;
    	$nhanvien->specialty=$req->specialty;
    	$nhanvien->info=$req->info;
    	$nhanvien->save();
    	return response()->json($nhanvien);
    }


    public function update(Request $req,$id){
    	$nhanvien=Nhanvien::where('id',$id)->update(['name' => $req->name,'specialty'=>$req->specialty,'info'=>$req->info]);
    	return response()->json($nhanvien, 200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }


    public function delete($id){
    	$nhanvien=Nhanvien::where('id',$id)->delete();
    	return response()->json($nhanvien);	

    }

*/

    public function loadtable(){
    	$ban=TableFood::all();
    	return response()->json($ban, 200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }
    
    public function showfood(){
    	//$food=Food::where('quantity','>', '0')->get();

$food = DB::table('food')
    ->join('categories', 'categories.id', '=', 'food.id_cat')
    ->select('food.id', 'food.name', 'categories.name as cat_name', 'food.quantity','food.price','food.status','food.img','food.created_at','food.updated_at')
    ->where('quantity','>', '0')
    ->get();

    	return response()->json($food, 200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }


    public function first(){
        //$food=Food::where('quantity','>', '0')->get();
/*
$fi = DB::table('food')
    ->join('categories', 'categories.id', '=', 'food.id_cat')
    ->select('categories.name as cat_name','food.id')
    ->groupBy('cat_name')
    ->orderBy('cat_name', 'ASC')
    ->get();
*/

    $fi = DB::select("CALL GetListCat()");
    $coll = collect($fi)->unique("cat_name");
    $final = $coll->values()->all();


        return response()->json($final, 200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }





    public function getbill($id){
        $bill=DB::select("SELECT bi.id,f.name, bi.quantity, f.price,f.price* bi.quantity AS total FROM bill_info AS bi, bill AS b, food AS f WHERE bi.id_bill = b.id AND bi.id_food = f.id AND b.status = 0 AND b.id_table = :aidi",
        [ ":aidi" => $id ]
    );
        return response()->json($bill, 200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }







    public function addorder(Request $req,$id){


        $billcheck = Bill::where('status','0')->where('id_table',$id)->first();


        if ($billcheck === null) {
        //billcheck doesn't exist
        $bill = new Bill;
        $bill->id_table=$id;
        $bill->bill_maker=$req->id_user;
        $bill->total='0';
        $bill->discount='0';
        $bill->status='0';
        $bill->save();

        $newbillid = $bill->id;
        $billinfo = new BillInfo;
        $billinfo->id_bill = $newbillid;
        $billinfo->id_food = $req->id_food;
        $billinfo->quantity = $req->quantity;
        $billinfo->ghichu = $req->note;
        $billinfo->save();

        $tablestatus=DB::table('tablefood')
            ->where('id', $id)
            ->update(['status' => 'Có Khách']);


        event(new MyEvent($id,'đặt đơn','bg-primary'));


        return response()->json($tablestatus, 200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);

        }

        elseif (BillInfo::where('id_bill', $billcheck->id)->where('id_food', $req->id_food)->exists())
        {   //got nuts

            $updatequantity=BillInfo::where('id_bill', $billcheck->id)->where('id_food', $req->id_food)->increment('quantity', $req->quantity);


        event(new MyEvent($id,'thêm món','bg-warning'));


            return response()->json($updatequantity, 200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
            
        }
        else {  //no nuts

            $addmon = new BillInfo;
            $addmon->id_bill = $billcheck->id;
            $addmon->id_food = $req->id_food;
            $addmon->quantity = $req->quantity;
            $addmon->ghichu = $req->note;
            $addmon->save();


        event(new MyEvent($id,'thêm món','bg-warning'));


            return response()->json($addmon);
            
        }


    }









    public function update(Request $req,$id){
        $info=BillInfo::where('id',$id)->update(['quantity' => $req->quantity]);
        return response()->json($info, 200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }


    public function delete($id){
        $info=BillInfo::where('id',$id)->delete();
        return response()->json($info); 

    }



    public function checkout(Request $req,$id){

        $billcheck = Bill::where('status','0')->where('id_table',$id)->first();

        if ($billcheck === null) {
        //billcheck doesn't exist
        echo 'Cac';

        }
        else{
        $billid = $billcheck->id;
        $discount = '0';
        $total = $req->total;
        $khn = $req->khn;
        $sophone = $req->sophone;

        $bill=Bill::where('id',$billid)->update(['discount' => $discount,'total' => $total,'kh_name' => $khn,'kh_phone' => $sophone]);

        $tablestatus=DB::table('tablefood')
            ->where('id', $id)
            ->update(['status' => 'Chờ Thanh Toán']);

        event(new MyEvent($id,'thanh toán','bg-success'));

        return response()->json($bill,$tablestatus, 200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);


        }


    }





}







/*
{"0":{"id":1,"cat_name":"Hải sản"},
"2":{"id":3,"cat_name":"Lẩu"},
"6":{"id":7,"cat_name":"Món Bò"},
"8":{"id":9,"cat_name":"Món Cơm"},
"10":{"id":11,"cat_name":"Món Gà"},
"11":{"id":12,"cat_name":"Món Heo"},
"13":{"id":14,"cat_name":"Nước giải khát"},
"17":{"id":18,"cat_name":"Special"}}


[{"new_id":1,"cat_name":"Seafood"},
{"new_id":4,"cat_name":"Beef"},
{"new_id":6,"cat_name":"Special"}]

*/



