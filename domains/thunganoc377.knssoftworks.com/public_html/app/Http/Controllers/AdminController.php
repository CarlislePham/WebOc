<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use App\Events\TestNew;
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
use PDF;


class AdminController extends Controller
{
    //
    public function index(){
$collection = Bill::where('status','1')->whereNotNull('kh_name')->groupBy('kh_phone')
->selectRaw('count(*) as count, kh_phone, sum(total) as sum')
->get();
    	return view('content.index',compact('collection'));
    }


    public function signin(){
    	return view('signin');
    }

    public function postSignin(Request $req){
        $this->validate($req,
            [
                'username'=>'required|unique:users,username',
                'pass'=>'required|min:6',
                'name'=>'required',
                'repass'=>'required|same:pass',
                'phone'=>'required',
                'g-recaptcha-response'=>'required', new Captcha(),
            ],
            [
                'username.required'=>'Tên đăng nhập trống',
                'username.unique'=>'Đã có tên đăng nhập này',
                'name.required'=>'Vui lòng nhập tên',
                'phone.required'=>'Vui lòng nhập SĐT',
                'pass.required'=>'Vui lòng nhập password',
                'pass.min'=>'Password có ít nhất 6 kí tự',
                'repass.same'=>'Vui lòng nhập đúng mật khẩu',
                'g-recaptcha-response.required'=>'Vui lòng điền Captcha',
            ]);

        $user = new User;
        $user->name = $req->name;
        $user->username = $req->username;
        $user->password = Hash::make($req->pass);
        $user->phone = $req->phone;
        $user->save();
        return redirect()->back()->with('alert','Đã tạo tài khoản thành công, vui lòng đăng nhập');
    }


    public function changepass(){
        return view('changepass');
    }
    public function postChangepass(Request $req){
        $this->validate($req,
            [
                
                
                'passnew'=>'required|min:6',
                'repassnew'=>'required|min:6|same:passnew'
            ],
            [

                
                'passnew.required'=>'Vui lòng nhập password',
                'passnew.min'=>'Password có ít nhất 6 kí tự',
                'repassnew.required'=>'Vui lòng nhập password',
                'repassnew.min'=>'Password có ít nhất 6 kí tự',
                'repassnew.same'=>'Vui lòng nhập lại đúng mật khẩu'
            ]);
        $passnew = Hash::make($req->passnew);

        User::where('id',Auth::user()->id)->update(['password' => $passnew]);
        return redirect()->route('index')->with('alert','Đổi mật khẩu thành công'); 

    }

    public function postChangePassUser(Request $req,$id){
        $this->validate($req,
            [
                
                
                'passnew'=>'required|min:6',
                'repassnew'=>'required|min:6|same:passnew'
            ],
            [

                
                'passnew.required'=>'Vui lòng nhập password',
                'passnew.min'=>'Password có ít nhất 6 kí tự',
                'repassnew.required'=>'Vui lòng nhập password',
                'repassnew.min'=>'Password có ít nhất 6 kí tự',
                'repassnew.same'=>'Vui lòng nhập lại đúng mật khẩu'
            ]);
        $passnew = Hash::make($req->passnew);

        User::where('id',$id)->update(['password' => $passnew]);
        return redirect()->back()->with('alert','Đổi mật khẩu thành công'); 

    }






    public function manage_user(){

    	$user=User::where('type','==', '0')->get();
    	return view('content.manage_user',compact('user'));
    }
    public function postadminuseredit(Request $req,$id){


    	User::where('id',$id)->update(['name' => $req->name,'phone' => $req->phone]);
    	return redirect()->back()->with('alert','Sửa thành công');
    }


    public function deluser($id){
    	User::where('id',$id)->update(['type' => '6']);
    	return redirect()->back()->with('alert','Xóa thành công nhân viên');

    }









    public function manage_bill(){

    	//$bill=Bill::where('status', '1')->orderBy('updated_at', 'DESC')->get();
    	$bill=Bill::all();
    	return view('content.manage_bill',compact('bill'));
    }
    public function done_bill($id){

    	$getb = Bill::where('id',$id)->first();

    	if($getb->total == '0'){
		return redirect()->back()->with('alert','Đơn đang hoạt động, chưa thể thanh toán');
    	}
    	else{

    	Bill::where('id',$id)->update(['status' => '1']);
    	DB::table('tablefood')
            ->where('id', $getb->id_table)
            ->update(['status' => 'Trống']);
    	return redirect()->back()->with('alert','Thanh toán thành công hóa đơn');
    	}


    }
    public function manage_bill_info($id){
    	$getb = Bill::where('id',$id)->first();
        $billinfo=DB::select("SELECT bi.id,f.name, bi.quantity, bi.ghichu, f.price,f.price* bi.quantity AS total FROM bill_info AS bi, bill AS b, food AS f WHERE bi.id_bill = b.id AND bi.id_food = f.id AND b.id = :aidi",
        [ ":aidi" => $id ]
    );
        return view('content.manage_bill_info',compact('getb','billinfo'));
    }



 	public function pdf($id)
    {
    	$getb = Bill::where('id',$id)->first();
        $billinfo=DB::select("SELECT bi.id,f.name, bi.quantity, bi.ghichu, f.price,f.price* bi.quantity AS total FROM bill_info AS bi, bill AS b, food AS f WHERE bi.id_bill = b.id AND bi.id_food = f.id AND b.id = :aidi",
        [ ":aidi" => $id ]
    );	
    	$pdf = PDF::loadView('content.billpdf',  compact('getb','billinfo'))->setOptions(['defaultFont' => 'sans-serif']);
    	//return $pdf->download('hoadon.pdf'); //stream

    	$output = $pdf->output();
		return new Response($output, 200, [
   		'Content-Type' => 'application/pdf',
  		'Content-Disposition' =>  'inline; filename="hoadon.pdf"',
		]);


    }



    public function postdiscount(Request $req,$id){

    	$getb = Bill::where('id',$id)->first();

    	if($getb->total == '0'){
		return redirect()->back()->with('alert','Đơn đang hoạt động, chưa thể thanh toán');
    	}
    	elseif ($getb->discount != '0') {
    	return redirect()->back()->with('alert','Không thể áp thêm giảm giá');
    	}
    	else{

    	$total = $getb->total;
    	$discount = $req->discount;
    	$math = (100 - $discount)/100;
    	$totalafter = $total * $math;

//Giá x [(100 –  %-giảm)/100]


    	Bill::where('id',$id)->update(['discount' => $discount,'total' => $totalafter]);
    	return redirect()->back()->with('alert','Giảm thành công hóa đơn');

    	}


    }















    public function manage_food(){
    	$food=Food::all();
    	$category=Category::all();
    	return view('content.manage_food',compact('food','category'));
    }
    public function fudstatusoff($id){
    	Food::where('id',$id)->update(['quantity' => '0']);
    	return redirect()->back()->with('alert','Tắt món thành công');
    }
    public function fudstatusonl($id){
    	Food::where('id',$id)->update(['quantity' => '100']);
    	return redirect()->back()->with('alert','Hiện món thành công');
    }







    public function postfoodedit(Request $req,$id){

	$this->validate($req,
            [
                'name'=>'required',
                'price'=>'required',
                'newFile' => 'nullable|mimes:jpeg,png,jpg,svg' //bug mimes fix = .*
            ],
            [
                'name.required'=>'Vui lòng nhập tựa đề',
                'price.required'=>'Vui lòng nhập giá tiền',
                'newFile.mimes'=>'Hình phải là định dạng jpeg,png,jpg,svg'
            ]);

if($req->hasFile('newFile')){

$file= $req->file('newFile');
$filename=$file->getClientOriginalName('newFile');
$file->move('source/foodimg',$filename);

Food::where('id',$id)->update(['name' => $req->name,'id_cat'=>$req->category,'price'=>$req->price,'img'=>$filename]);

	return redirect()->back()->with('alert','Sửa thông tin thành công');
	}
	else
	{
	Food::where('id',$id)->update(['name' => $req->name,'id_cat'=>$req->category,'price'=>$req->price]);
	return redirect()->back()->with('alert','Sửa thông tin thành công');
	}




}





    public function productAdd(Request $req){

			$this->validate($req,
            [
                'newname'=>'required',
                'newprice'=>'required',
                'newnewFile' => 'required|mimes:jpeg,png,jpg,svg'
            ],
            [
                'newname.required'=>'Vui lòng nhập tựa đề',
                'newprice.required'=>'Vui lòng nhập giá tiền',
                'newnewFile.required'=>'Vui lòng thêm hình',
                'newnewFile.mimes'=>'Hình phải là jpeg,png,jpg,svg'
            ]);

				$file= $req->file('newnewFile');
	    		$filename=$file->getClientOriginalName('newnewFile');
	    		$file->move('source/foodimg',$filename);
		    	$pro=new Food;
		    	$pro->name=$req->newname;
		    	$pro->id_cat=$req->newcategory;
		    	$pro->price=$req->newprice;
	    		$pro->img = $filename;
		    	$pro->save();
	    		return redirect()->back()->with('alert','Thêm món thành công');
    }









    public function manage_category(){

    	$cate=Category::all();
    	return view('content.manage_category',compact('cate'));
    }
    public function categoryAdd(Request $req){

			$this->validate($req,
            [
                'newname'=>'required|unique:categories,name',
            ],
            [
                'newname.unique'=>'Đã có tên mục này',
                'newname.required'=>'Vui lòng nhập tên',
            ]);

				
		    	$cat=new Category;
		    	$cat->name=$req->newname;
		    	$cat->save();
		    	event(new TestNew($cat));
		    	//event(new MyEvent(1,'abc','bg-success'));
	    		return redirect()->back()->with('alert','Thêm danh mục thành công');
    }
    public function postcategoryedit(Request $req,$id){
			$this->validate($req,
            [
                'name'=>'unique:categories,name',
            ],
            [
                'name.unique'=>'Đã có tên mục này',
            ]);
    	Category::where('id',$id)->update(['name' => $req->name]);
    	return redirect()->back()->with('alert','Sửa thành công');
    }


    public function delcat($id){
    	$check=Food::where('id_cat',$id)->exists();
    	if($check){
    	return redirect()->back()->with('alert','Không được xóa do còn món thuộc danh mục');	
    	}
    	else {
    	Category::where('id',$id)->delete();
    	return redirect()->back()->with('alert','Xóa thành công');	
    	}
    	

    }










    public function manage_table(){

    	$table=TableFood::all();
    	return view('content.manage_table',compact('table'));
    }
    public function tableAdd(Request $req){

			$this->validate($req,
            [
                'newname'=>'required|unique:tablefood,name',
            ],
            [
                'newname.unique'=>'Đã có bàn này',
                'newname.required'=>'Vui lòng nhập tên',
            ]);

				
		    	$table=new TableFood;
		    	$table->name=$req->newname;
		    	$table->save();
	    		return redirect()->back()->with('alert','Thêm bàn thành công');
    }
    public function posttableedit(Request $req,$id){
			$this->validate($req,
            [
                'name'=>'unique:tablefood,name',
            ],
            [
                'name.unique'=>'Đã có bàn này',
            ]);
    	TableFood::where('id',$id)->update(['name' => $req->name]);
    	return redirect()->back()->with('alert','Sửa thành công');
    }


    public function deltable($id){
    	$check=Bill::where('id_table',$id)->exists();
    	if($check){
    	return redirect()->back()->with('alert','Không được xóa do còn hóa đơn thuộc bàn');	
    	}
    	else {
    	TableFood::where('id',$id)->delete();
    	return redirect()->back()->with('alert','Xóa thành công');	
    	}
    	

    }

















    public function manage_dt(){
        $bill=Bill::where('status', '1')->orderBy('updated_at', 'ASC')->get();
        return view('content.doanhthu',compact('bill'));
    }

    public function doanhthutime(Request $req){
        $date1 = $req->day1;
        $date2 = $req->day2;
        $bill = Bill::where('updated_at', '>=', $date1)->where('updated_at', '<=', $date2)->where('status','1')->orderBy('updated_at', 'ASC')->get();
        return view('content.doanhthu',compact('bill'));
    }














}
