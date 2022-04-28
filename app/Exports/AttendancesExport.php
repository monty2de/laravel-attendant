<?php

namespace App\Exports;

use App\Attendance;
use App\Status;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class AttendancesExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Attendance::all();
//     }
// }


class AttendancesExport implements FromView
{
    public function view(): View
    {
        return view('attendent.attendant-excel', [
            'statuses' => Status::all()
        ]);
    }
}