@extends('master')
@section('content')
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Thông Tin Đơn {{$getb->id}} (Bàn {{$getb->id_table}})</h1>
                        
                        <h1 class="h3 mb-0 text-red-800">Tổng tính: <span style="font-weight: bold; color: red">{{number_format(collect($billinfo)->sum('total'))}}</span> VNĐ</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

@if($getb->kh_name != "")
<h6 class="m-0 font-weight-bold text-primary">KH: {{$getb->kh_name}} ({{$getb->kh_phone}})</h6>
@else
<h6 class="m-0 font-weight-bold text-primary">Danh Sách</h6>
@endif      
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tên món</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá (VNĐ)</th>
                                            <th>Tổng (VNĐ)</th>
                                            <th>Ghi chú</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tên món</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá (VNĐ)</th>
                                            <th>Tổng (VNĐ)</th>
                                            <th>Ghi chú</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	@foreach($billinfo as $info)
                                        <tr>
                                            <td>{{$info->name}}</td>
                                            <td>{{$info->quantity}}</td>
                                            <td>{{number_format($info->price)}}</td>
                                            <td>{{number_format($info->total)}}</td>
                                            <td>{{$info->ghichu}}</td>






                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


<a href="{{route('manage_bill')}}" class="btn btn-primary"><i class="fas fa-chevron-left"></i> Quay lại</a>
                </div>




@endsection