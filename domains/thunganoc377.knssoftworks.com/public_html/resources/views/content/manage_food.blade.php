@extends('master')
@section('content')
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Món Ăn</h1>






<div class="modal fade" id="modalAddForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Thêm Món</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<form id="add_form" method="post" action="{{route('food_add')}}" enctype="multipart/form-data">
@csrf
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <input name="newname" type="text" id="defaultForm-name" class="form-control validate" required="" placeholder="Tên món">
          <label data-error="wrong" data-success="right" for="defaultForm-name">Tên</label>
        </div>

        <div class="md-form mb-4">
		<input name="newprice" type="text" id="defaultForm-price" class="form-control validate" required="" placeholder="Giá món">
          <label data-error="wrong" data-success="right" for="defaultForm-price">Đơn giá (VNĐ)</label>
        </div>


        <div class="md-form mb-4">
		<select name="newcategory" id="defaultForm-cat" class="form-control validate">
												@foreach($category as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
												@endforeach
		</select>
          <label data-error="wrong" data-success="right" for="defaultForm-cat">Danh mục</label>
        </div>



        <div class="md-form mb-4">
		<input name="newnewFile" type="file" id="defaultForm-pic" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pic">Hình món</label>
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
                                            <th>Thuộc danh mục</th>
                                            <th>Giá</th>
                                            <th>Tình trạng</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Thuộc danh mục</th>
                                            <th>Giá</th>
                                            <th>Tình trạng</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	@foreach($food as $f)
                                        <tr>
                                            <td>{{$f->name}}</td>
                                            <td>{{$f->category->name}}</td>
                                            <td>{{number_format($f->price)}} đ</td>
                                            @if($f->quantity > 0)
                                            <td style="background-color:#00FF00">Online</td>

<td>


<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$f->id}}">
  Hết món?
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$f->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Đổi tình trạng thành hết món?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">{{$f->name}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{route('fudstatusoff',$f->id)}}"><button type="button" class="btn btn-danger">OK</button></a>
      </div>
    </div>
  </div>
</div>


</td>


                                            @else
                                            <td style="background-color:#FF0000"><p style="color:white;">Offline</p></td>

<td>


<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2{{$f->id}}">
  Có món?
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal2{{$f->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Đổi tình trạng thành có món?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">{{$f->name}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{route('fudstatusonl',$f->id)}}"><button type="button" class="btn btn-success">OK</button></a>
      </div>
    </div>
  </div>
</div>


</td>




                                            @endif







<td>
	

<div class="modal fade" id="modalUpdateForm{{$f->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sửa Thông Tin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<form id="my_form" method="post" action="{{route('postfoodedit',$f->id)}}" enctype="multipart/form-data">
@csrf
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <input name="name" type="text" id="defaultForm-name" class="form-control validate" required="" value="{{$f->name}}">
          <label data-error="wrong" data-success="right" for="defaultForm-name">Tên</label>
        </div>

        <div class="md-form mb-4">
		<input name="price" type="text" id="defaultForm-price" class="form-control validate" required="" value="{{$f->price}}">
          <label data-error="wrong" data-success="right" for="defaultForm-price">Đơn giá (VNĐ)</label>
        </div>


        <div class="md-form mb-4">
		<select name="category" id="defaultForm-cat" class="form-control validate">
												@foreach($category as $cat)
                                                <option value="{{$cat->id}}" {{$f->id_cat==$cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
												@endforeach
		</select>
          <label data-error="wrong" data-success="right" for="defaultForm-cat">Danh mục</label>
        </div>



        <div class="md-form mb-4">
		<img src="source/foodimg/{{$f->img}}" width="250" height="250">
		<input name="newFile" type="file" id="defaultForm-pic" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pic">Hình món</label>
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
  	<a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalUpdateForm{{$f->id}}">Sửa</a>
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