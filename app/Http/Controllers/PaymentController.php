<?php

namespace App\Http\Controllers;

use App\Exports\PaymentExport;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PaymentController extends Controller
{
    protected $model;

    public function __construct(Payment $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $users = User::get(['id', 'name']);
        return view('payments', compact('users'));
    }

    public function excelExport(Request $request)
    {
        $request->validate([
            'user_id'=> 'required'
        ]);
        $user_id = $request->input('user_id');
        $min_total = $request->input('min_total');
        $max_total = $request->input('max_total');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $payments = DB::select("CALL SelectPayments(?, ?, ?, ?, ?)", [
            $user_id,
            $min_total ?? NULL,
            $max_total ?? NULL,
            $start_date ?? NULL,
            $end_date ?? NULL,
        ]);
        return Excel::download(new PaymentExport(collect($payments)), 'payment.xlsx');
    }
}
