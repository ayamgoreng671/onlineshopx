<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $payments = Payment::all();
        $paymentUsers = PaymentUser::where("user_id", Auth::id())->get();
        return view("payments.index", [
            "payments" => $payments,
            "payment_users" => $paymentUsers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $payments = Payment::all();
        return view("payments.create", [
            "payments" => $payments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "account" => ["required", "string", "max:255"],
            "payment_id" => ["required", "numeric", "min:0"],
        ]);

        DB::beginTransaction();
        try {
            $newpayment = PaymentUser::create($validated);
            DB::commit();

            return redirect()->route("payments.index")->with("success", "Payment added successfully !");
        } catch (Exception $e) {
            DB::rollBack();

            $error = ValidationException::withMessages([
                "system_error" => ["system_error", $e->getMessage()]
            ]);

            throw $error;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     */
    public function edit(Payment $payment)
    {
        $selected_payment = Payment::where("id", $payment->id)->get();
        return view("payments.edit", [
            "payment" => $selected_payment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     */
    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            "account" => ["required", "string", "max:255"],
        ]);

        DB::beginTransaction();
        try {
            $newpayment = PaymentUser::create($validated);
            $request->update($validated);
            DB::commit();

            return redirect()->route("payments.index")->with("success", "Payment updated successfully !");
        } catch (Exception $e) {
            DB::rollBack();

            $error = ValidationException::withMessages([
                "system_error" => ["system_error", $e->getMessage()]
            ]);

            throw $error;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     */
    public function destroy(Payment $payment)
    {
        
        try {

            $payment->delete();
            return redirect()->route("payments.index")->with("success", "Payment deleted successfully !");


        } catch (Exception $e) {

            $error = ValidationException::withMessages([
                "system_error" => ["system_error", $e->getMessage()]
            ]);

            throw $error;

        }
    }
}
