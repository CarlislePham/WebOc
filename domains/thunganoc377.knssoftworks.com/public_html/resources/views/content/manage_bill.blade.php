@extends('master')
@section('content')
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Đơn Món</h1>
                        <!--<a href="{{route('signin')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Thêm Mới</a>-->
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh Sách</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" data-order="[[ 5, &quot;asc&quot; ]]" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        	<th>Thời gian</th>
                                            <th>Số bàn</th>
                                            <th>Người tạo đơn</th>
                                            <th>Giảm giá (%)</th>
                                            <th>Tổng tiền (VNĐ)</th>
                                            <th>Trạng thái</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        	<th>Thời gian</th>
                                            <th>Số bàn</th>
                                            <th>Người tạo đơn</th>
                                            <th>Giảm giá (%)</th>
                                            <th>Tổng tiền (VNĐ)</th>
                                            <th>Trạng thái</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	@foreach($bill as $b)
                                        <tr>
                                        	<td>{{$b->updated_at->format('d-m-Y / g:i a')}}</td>
                                            <td>{{$b->id_table}}</td>
                                            <td>{{$b->user->name}}</td>
                                            <td>{{$b->discount}}</td>
                                            <td>{{number_format($b->total)}}</td>
                                            @if($b->status == 1)
                                            <td style="background-color:#00FF00">Đã thanh toán</td>



<td>


<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Tùy chọn
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{route('manage_bill_info',$b->id)}}"><i class="fas fa-bars"></i> Thông Tin</a>
    <a class="dropdown-item" href="{{route('pdf',$b->id)}}"><i class="fa fa-print" aria-hidden="true"></i> In Đơn</a>
  </div>
</div>


</td>



<td></td>


                                            @else
                                            <td style="background-color:#FF0000"><p style="color:white;">Chưa thanh toán</p></td>



<td>


<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Tùy chọn
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{route('manage_bill_info',$b->id)}}"><i class="fas fa-bars"></i> Thông Tin</a>
    <a class="dropdown-item" href="{{route('pdf',$b->id)}}"><i class="fa fa-print" aria-hidden="true"></i> In Đơn</a>
    <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalLoginForm{{$b->id}}"><i class="fa fa-percent" aria-hidden="true"></i> Áp giảm giá</a>
  </div>
</div>



<div class="modal fade" id="modalLoginForm{{$b->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Áp giảm giá</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<form id="my_form" method="post" action="{{route('postdiscount',$b->id)}}" enctype="multipart/form-data">
@csrf
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <input name="discount" type="number" id="defaultForm-name" class="form-control validate" required="" min="0" oninput="validity.valid||(value='');">
          <label data-error="wrong" data-success="right" for="defaultForm-name">Giảm giá (%)</label>
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




</td>



<td>
<a onclick="return confirm('Chốt đơn?')" href="{{route('done_bill',$b->id)}}" class="btn btn-success">Done</a>
</td>



                                            @endif
                                            









                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>




@endsection