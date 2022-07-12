@extends('master')
@section('content')
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Danh Mục</h1>







<div class="modal fade" id="modalAddForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Thêm Danh Mục</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<form id="add_form" method="post" action="{{route('category_add')}}" enctype="multipart/form-data">
@csrf
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <input name="newname" type="text" id="defaultForm-name" class="form-control validate" required="" placeholder="Tên">
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


<a href="" data-toggle="modal" data-target="#modalAddForm" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Thêm Mới</a>





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
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tên</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	@foreach($cate as $ct)
                                        <tr>
                                            <td>{{$ct->name}}</td>




<td>
	

<div class="modal fade" id="modalLoginForm{{$ct->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sửa Thông Tin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<form id="my_form" method="post" action="{{route('postcategoryedit',$ct->id)}}" enctype="multipart/form-data">
@csrf
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <input name="name" type="text" id="defaultForm-name" class="form-control validate" required="" value="{{$ct->name}}">
          <label data-error="wrong" data-success="right" for="defaultForm-name">Tên</label>
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
  	<a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalLoginForm{{$ct->id}}">Sửa</a>
</div>










</td>


<td>



<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$ct->id}}">
  Xóa
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$ct->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa Danh Mục?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">{{$ct->name}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{route('delcat',$ct->id)}}"><button type="button" class="btn btn-danger">Xóa</button></a>
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