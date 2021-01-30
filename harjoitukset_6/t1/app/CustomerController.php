<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Tuodaan Customer-luokka nimiavaruuksineen käyttöön
use App\Customer;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::all();
        return view('customers/index')->with('customers', $customers);
    }

    // show
    public function show($id) {
        //$customer = Customer::find($id);
        // Kokeile myös usein parempaa
        $customer = Customer::findOrFail($id);
        return view('customers/show')->with('customer', $customer);
    }

    // create
    public function create() {
        return view('customers/create');
    }

    // save
    public function store() {

        $customer = new Customer();
    
        $customer->name = request('name');
        $customer->birth_date = request('birth_date');
    
        $customer->save();
    
        /* // tinkerin käsky meni näin
        Customer::create([
          'name' => request('name'),
          'birth_date' => request('birth_date')
        ]);
        */
    
        return redirect('/customers');
    }

    // edit
    public function edit($id) {
        $customer = Customer::find($id);
        return view('customers/edit')->with('customer', $customer);
    }

    // update
    public function update($id) {

        $customer = Customer::find($id);
    
        $customer->name = request('name');
        $customer->birth_date = request('birth_date');
    
        $customer->save();
    
        return redirect('/customers');
    }

    // delete
    public function destroy($id) {
        Customer::find($id)->delete();
        return redirect('/customers');
    }
}
