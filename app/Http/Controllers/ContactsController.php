<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\Contact;
use DB;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('index');

        // $var1=Contact::all();
        // $var2=Address::all();

        //$var = new Contact;
        //$contact_id = $var->id;
        $var1 = Contact::with('address')->get();
        return view('contacts.index', compact('var1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

         $var= new Contact;
        // $con_id=$var->id;  //takes the current id from contact table and adds 1 to it so that this
        //                   //id can be used as contacts_id in addresses table
        // $con_id+1;=
        // //dd($con_id);



        $var->name=$request->input('name');
        $var->type=$request->input('type');
        $var->save();

        DB::table('addresses')->insert(array(
            array('contacts_id'=>$var->id , 'address_type'=>'Billing Address','address'=>$request->input('billing_address')),
            array('contacts_id'=>$var->id , 'address_type'=>'Shipping Address','address'=>$request->input('shipping_address'))
        ));

        return redirect()->route('contacts.index');

        // DB::table('addresses')->insert(array(
        //     array('email' => 'taylor@example.com', 'votes' => 0),
        //     array('email' => 'dayle@example.com', 'votes' => 0),
        // ));






        // $expenses=new Exxpense();
        
        // $expenses->user_id=auth()->user()->id;
        // $expenses->amount=$request->input('amount');
        // $expenses->details=$request->input('details');
        // $expenses->save();

        // return redirect('expenses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        $y=Contact::find($id);
        $x=Address::where('contacts_id', $id)->get();
        //dd($x);
        return view('contacts.show', compact('x', 'y'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $var = Contact::find($id)->delete();
        $var1=Address::where('contacts_id', $id)->delete();
       
        //dd($var1);
        //$var->delete();
        //$var1->delete();
        return redirect()->route('contacts.index');
    }
}
