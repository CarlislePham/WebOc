@extends('master')
@section('content')
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Doanh Thu</h1>
                        <!--<a href="{{route('signin')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Thêm Mới</a>-->
                        <h1 class="h3 mb-0 text-red-800">Tổng tính: <span style="font-weight: bold; color: red">{{number_format($bill->sum('total'))}}</span> VNĐ</h1>
                    </div>

                    
<?php $d1 = isset($_GET["day1"]) ? $_GET["day1"] : ""; ?>
<?php $d2 = isset($_GET["day2"]) ? $_GET["day2"] : ""; ?>

 <form method="get" action="" enctype="multipart/form-data">
  @csrf
<label for="day1">Thời gian</label>
        <div class="input-group">
          <input type="date" name="day1" id="day1" class="input-sm form-control" value='<?php echo $d1; ?>' required>
          <input type="date" name="day2" id="day2" class="input-sm form-control" value='<?php echo $d2; ?>' required>
        </div>
  <button type="submit" formaction="{{route('doanhthutime')}}" class="btn btn-primary">Xem</button>
  <button type="submit" formaction="{{route('export')}}" class="btn btn-success"><i class="fas fa-download fa-sm text-white-50"></i> Export Excel</button>
</form>
<br>



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh Sách</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" data-order="[[ 0, &quot;asc&quot; ]]" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        	<th>Thời gian</th>
                                            <th>Số bàn</th>
                                            <th>Người tạo đơn</th>
                                            <th>Giảm giá (%)</th>
                                            <th>Tổng tiền (VNĐ)</th>
                                            <th>Trạng thái</th>
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






                                            
                                            









                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>




@endsection