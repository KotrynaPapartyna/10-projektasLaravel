<?php

namespace App\Http\Controllers;

use App\Owner;
use Illuminate\Http\Request;

use PDF;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $collumnName=$request->collumnname;
        $sortby=$request->sortby;


        if (!$collumnName && !$sortby) {
           $collumnName='id';
            $sortby='asc';
        }

        $owners=Owner::orderBy( $collumnName, $sortby)->paginate(5);

        return view('owner.index', ['owners'=>$owners, 'collumnName'=>$collumnName, 'sortby'=>$sortby]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = Owner::all();
        return view("owner.create", ["owners" => $owners]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $owner = new Owner;

        $validateVar = $request->validate([

            'name' => 'required|min:2|max:15|alpha',
            'surname' => 'required|min:2|max:15|alpha',
            'email' => 'required|email:rfc,dns',
            //'email' => 'required|email|unique:customers,email_address',
            //'phone'=>'required',
            'phone'=>'required|regex:/^(\+\d{1,3}[- ]?)?\d{9}$/',
            //'phone'=>'required|regex:(86|\+3706) \d{3} \d{4}|max:9',
        ]);

        //duomenu bazes lenteles pavadinimas = input/select/texarea laukeliu pavadinimas
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->email = $request->email;
        $owner->phone = $request->phone;

        $owner->save();

        return redirect()->route("owner.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        return view("owner.show", ["owner" => $owner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        $owners = Owner::all();
        return view("owner.edit",["owner"=>$owner, "owners"=>$owners]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {

        $validateVar = $request->validate([

            'name' => 'required|min:2|max:15|alpha',
            'surname' => 'required|min:2|max:15|alpha',
            'email' => 'required|email:rfc,dns',
            //'email' => 'required|email|unique:customers,email_address',
            'phone'=>'required|regex:/^(\+\d{1,3}[- ]?)?\d{9}$/',
            //'phone'=> '(86|\+3706) \d{3} \d{4}',
            //'phone'=>'required|regex:(86|\+3706) \d{3} \d{4}|max:9',
        ]);


        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->email = $request->email;
        $owner->phone = $request->phone;

        $owner->save();

        return redirect()->route("owner.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route("owner.index")->with('success_message', 'The owner was successfully deleted');
    }


    // vienos Owner PDF generavimas
    public function generateOwnerPDF(Owner $owner) {

        view()->share('owner', $owner);

        //sukuria vaizda PFD faile- atvaizduoja
        $pdf = PDF::loadView("pdf_owner_template", $owner);

        return $pdf->download("owner".$owner->id.".pdf");

    }

    // visu Task PDF generavimas
    public function generatePDF() {


        $owners = Owner::all();

        view()->share('owners', $owners);

        $pdf = PDF::loadView("pdf_templateO", $owners);

        // galima pervadinti failo pavadinimus
        return $pdf->download("owners.pdf");

    }


}
