<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentExport implements FromCollection, WithHeadings
{
    protected $payments;

    public function __construct($payments)
    {
        $this->payments = $payments;
        
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->payments;
    }

    public function headings(): array
    {
        return [
            'id',
            'rrn', 
            'transaction', 
            'fk_id_user', 
            'total',
            'commission', 
            'bank_commission', 
            'card_name', 
            'card_mask', 
            'name', 
            'email', 
            'phone', 
            'inn', 
            'contract_number', 
            'pay_status', 
            'bank_error_id', 
            'type', 
            'purpose', 
            'created_at',
            'updated_at'
            ];
    }
}
