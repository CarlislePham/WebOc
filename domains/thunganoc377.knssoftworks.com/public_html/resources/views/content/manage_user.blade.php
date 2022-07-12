@extends('master')
@section('content')
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Nhân Viên</h1>
                        <a href="{{route('signin')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Thêm Mới</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh Sách</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tên</th>
                                            <th>SĐT</th>
                                            <th>Tên tài khoản</th>
                                            <th>Ngày tạo</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tên</th>
                                            <th>SĐT</th>
                                            <th>Tên tài khoản</th>
                                            <th>Ngày tạo</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	@foreach($user as $u)
                                        <tr>
                                            <td>{{$u->name}}</td>
                                            <td>{{$u->phone}}</td>
                                            <td>{{$u->username}}</td>
                                            <td>{{$u->created_at->format('d-m-Y')}}</td>


<td>
	

<div class="modal fade" id="modalPassForm{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="myPassModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Đổi Mật Khẩu</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<form id="passform" method="post" action="{{route('changepassuser',$u->id)}}" enctype="multipart/form-data">
@csrf
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <input name="passnew" type="password" id="defaultForm-name" class="form-control validate" required="" placeholder="Ít nhất 6 kí tự">
          <label data-error="wrong" data-success="right" for="defaultForm-name">Mật khẩu mới</label>
        </div>

        <div class="md-form mb-4">
		<input name="repassnew" type="password" id="defaultForm-pass" class="form-control validate" required="" placeholder="Ít nhất 6 kí tự">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Nhập lại mật khẩu</label>
        </div>




      </div>
      <div class="modal-footer d-flex justify-content-center">
      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">OK</button>
      </div>
    </div>
  </div>
</div>
</form>
<div class="text-center">
  	<a href="" class="btn btn-secondary" data-toggle="modal" data-target="#modalPassForm{{$u->id}}">Đổi Pass</a>
</div>










</td>




<td>
	

<div class="modal fade" id="modalLoginForm{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sửa Thông Tin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<form id="my_form" method="post" action="{{route('postadminuseredit',$u->id)}}" enctype="multipart/form-data">
@csrf
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <input name="name" type="text" id="defaultForm-name" class="form-control validate" required="" value="{{$u->name}}">
          <label data-error="wrong" data-success="right" for="defaultForm-name">Tên</label>
        </div>

        <div class="md-form mb-4">
		<input name="phone" type="tel" id="defaultForm-pass" class="form-control validate" pattern="(\+84|0)\d{9,10}" required="" value="{{$u->phone}}">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">SĐT</label>
        </div>



      </div>
      <div class="modal-footer d-flex justify-content-center">
      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">OK</button>
      </div>
    </div>
  </div>
</div>
</form>
<div class="text-center">
  	<a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalLoginForm{{$u->id}}">Sửa</a>
</div>










</td>


<td>


<!--<a href="{{route('deluser',$u->id)}}"><button type="button" class="btn btn-danger">Xóa</button></a>-->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$u->id}}">
  Xóa
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa Nhân Viên?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">{{$u->name}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{route('deluser',$u->id)}}"><button type="button" class="btn btn-danger">Xóa</button></a>
      </div>
    </div>
  </div>
</div>


</td>




                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $er)
                            {{$er}}
                            @endforeach
                        </div>
                    @endif



@endsection