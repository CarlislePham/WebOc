<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UserExport;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportController extends Controller
{
    //

    public function export(Request $req){
        $date1 = $req->day1;
        $date2 = $req->day2;
     return Excel::download(new UserExport($date1,$date2), 'doanhthu.xlsx');
	}

}
