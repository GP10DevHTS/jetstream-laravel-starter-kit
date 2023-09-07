<?php

namespace App\Http\Livewire\Accountings;

use App\Models\Patient;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\PaymentServiceProvider;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ShowAccountingDetailsComponent extends Component
{
    public $patient;
    public Collection $patients;
    public Collection $payment_methods;
    public $payment_service_providers;
    public $test_result;

    public $selectedPaymentMethod       = NULL;
    public $payment_service_provider_id = '';
    public $paymentAmount;
    // public $new_balance;

    public $patient_id;
    public $total_amount_due;

    public bool $isOpenPayBill = FALSE;

    // event listeners
    protected $listeners = [
        'updatedSelectedPaymentMethod' => '$refresh',
    ];
    protected $rules = [
        'selectedPaymentMethod' => 'required',
        'paymentAmount' => 'required|numeric|min:100|max:10000000',
    ];

    public function mount(): void
    {
        $this->patients                  = Patient::latest()->get();
        $this->payment_methods           = PaymentMethod::all();
        $this->payment_service_providers = collect();
    }

    public function updatedSelectedPaymentMethod($payment_method): void
    {
        if (!is_null($payment_method)) {
            $this->payment_service_providers = PaymentServiceProvider::where('payment_method_id', $payment_method)->get();
        }
        $this->emitSelf('updatedSelectedPaymentMethod');
    }

    // open modal for paying lab bills
    public function openPayBillModal($id): void
    {
        $patient = Patient::where('id', $id)->first();

        $this->patient_id   = $id;
        $this->total_amount_due = $patient->test_results->sum('lab_service_price');

        $this->isOpenPayBill = TRUE;
    }

    // close modal
    public function closePayBillModal(): void
    {
        $this->reset('selectedPaymentMethod', 'payment_service_provider_id', 'paymentAmount');
        $this->isOpenPayBill = FALSE;
    }

    // store payments
    public function storePayments(): void
    {
        $this->validate();
        $payment_balance = $this->total_amount_due - $this->paymentAmount;
        Payment::create([
            'patient_id'        => $this->patient_id,
            'payment_method_id' => $this->selectedPaymentMethod,
            'total_amount_due'  => $this->total_amount_due,
            'payment_amount'    => $this->paymentAmount,
            'payment_balance'   => $payment_balance
        ]);

        $patient = Patient::where('id', $this->patient_id)->first();
        $patient->test_results()->update([
            'payment_status' => 'paid',
        ]);
        toastr()->success("{$patient->full_name} has paid {$this->paymentAmount}.");

        $this->reset('payment_method_id', 'payment_amount');
        $this->closePayBillModal();
    }

    public function render()
    {
        return view('livewire.accountings.show-accounting-details-component');
    }
}
