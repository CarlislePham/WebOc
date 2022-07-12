<?php

namespace App\Exports;

use App\Bill;

use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    protected $date1;
    protected $date2;

    public function __construct($date1,$date2)
    {
       $this->date1 = $date1;
       $this->date2 = $date2;
    }

    public function collection()
    {
        $orders = Bill::where('updated_at', '>=', $this->date1)->where('updated_at', '<=', $this->date2)->where('status','1')->orderBy('updated_at', 'ASC')->get();
        foreach ($orders as $row) {
            $order[] = array(
                '0' => $row->id,
                '1' => $row->id_table,
                '2' => $row->user->name,
                '3' => $row->updated_at->format('d-m-Y / g:i a'),
                '4' => $row->discount,
                '5' => number_format($row->total),
            );
        }

        return (collect($order));
    }




    public function headings(): array
    {
        return [
            'Mã đơn',
            'Số bàn',
            'Người tạo',
            'Thời gian',
            'Giảm giá (%)',
            'Tổng đơn (VNĐ)',
            '',
            date("d-m-Y", strtotime($this->date1)),
            date("d-m-Y", strtotime($this->date2)),
        ];
    }

    
}
