<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\Contact;
use DB;
use Illuminate\Http\Response;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function apiShow()
    {
        $user=Contact::with('address')
        ->orderBy('name','asc')
        ->get();

        return response()->json($user);

    }

    public function apiShowById(Request $request)
    {
        $user=Contact::with('address')
        ->where('id', $request->id)
        ->get();

        return response()->json($user);
    }


    public function apiCreate(Request $request)
    {
    //     $var= new Contact;
        //====saves in database from postman========
        $newuser = new Contact;
        //$newaddress = new Address;

        $newuser->name=$request->name;
        $newuser->type=$request->type;
        $newuser->save();

         DB::table('addresses')->insert(array(
            array('contacts_id'=>$newuser->id , 'address_type'=>'billing','address'=>$request->billing_address),
            array('contacts_id'=>$newuser->id , 'address_type'=>'shipping','address'=>$request->shipping_address)
         ));

        // ========================================
        return response()->json($request->type);
    }

    public function apiEdit(Request $request)
    {
        $editUser = Contact::find($request->id);
        //$editAddress = Address::find($editUser->id);

        $editUser->name=$request->name;
        $editUser->type=$request->type;
        $editUser->save();


        DB::table('addresses')
        ->where('contacts_id', '=' ,$editUser->id)
        ->where('address_type', '=', 'billing')
        ->update(['address'=>$request->billing_address]);

        $address = DB::table('addresses')
        ->where('contacts_id','=' ,$editUser->id)
        ->where('address_type', '=' ,'shipping')
        ->update(['address'=>$request->shipping_address]);

        return response()->json($request->name);
    }

    public function apiDelete(Request $request)
   {
        $userDelete = Contact::find($request->id)->delete();
        $addressDelete = Address::where('contacts_id', $request->id)->delete();
        return response()->json('successfully deleted');
    }

    public function index()
    {


        //========for api===========

        // $exampleApi = Contact::all();
        // //return response()->json($exampleApi);

        // $var1 = Contact::with('address')
        // ->orderBy('name','asc')
        // ->get();

        // return response()->json($var1);
        //------------------------------

        $num=1;

        //=======needed for session=====
        
        $value = request()->session()->get('key', '0'); 
        if($value==1){
            $var1 = Contact::with('address')
            ->orderBy('name','desc')
            ->get();
        }

        else if($value==0){
            $var1 = Contact::with('address')
            ->orderBy('name','asc')
            ->get();
        }
        $value = request()->session()->put('key', $value ? 0: 1); 
        //-------------------------------------------------

         $num=1;

        return view('contacts.index', compact('var1', 'num', 'name', 'value', 'new'));
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
        $validatedData = $request->validate([
            'name' => 'unique:contacts'
        ]);

         $var = new Contact;
        // $con_id=$var->id;  //takes the current id from contact table and adds 1 to it so that this
        //                   //id can be used as contacts_id in addresses table
        // $con_id+1;=
        // //dd($con_id);



        $var->name=$request->input('name');
        $var->type=$request->input('type');
        $var->save();

        DB::table('addresses')->insert(array(
            array('contacts_id'=>$var->id , 'address_type'=>'billing','address'=>$request->input('billing_address')),
            array('contacts_id'=>$var->id , 'address_type'=>'shipping','address'=>$request->input('shipping_address'))
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
        $contacts = Contact::find($id);
        $addresses = Address::find($contacts->id);



        return view('contacts.edit', compact('contacts', 'addresses'));
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
        $var= Contact::find($id);

        $var->name=$request->input('name');
        $var->type=$request->input('type');
        $var->save();

        $address = DB::table('addresses')
        ->where('contacts_id', '=' ,$var->id)
        ->where('address_type', '=','Billing Address')
        ->update(['address'=>$request->input('billing_address')]);

        $address = DB::table('addresses')
        ->where('contacts_id','=' ,$var->id)
        ->where('address_type', '=' ,'Shipping Address')
        ->update(['address'=>$request->input('shipping_address')]);

        // DB::table('addresses')->update(array(
        //     array('contacts_id'=>$var->id , 'address_type'=>'Billing Address','address'=>$request->input('billing_address')),
        //     array('contacts_id'=>$var->id , 'address_type'=>'Shipping Address','address'=>$request->input('shipping_address'))
        // ));



        return redirect()->route('contacts.index');
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
