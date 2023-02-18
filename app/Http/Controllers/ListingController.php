<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index()
    {
        return view('listings.index', [

            'students' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }



    // show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // show create form
    public function create()
    {
        return view('listings.create');
    }

    // store listing data
    public function store(Request $request)
    {
        // dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id']= auth()->id();

        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing created successfully!');

        // Session::flash('message')
    }
    // Show edit form
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }
    
    // store listing data
    public function update(Request $request, Listing $listing)
    {


        // Make sure logged in user in owner
        if($listing->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }
        // dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);
        return back()->with('message', 'Listing updated successfully!');

        // Session::flash('message')
    }
    public function destroy(Listing $listing){
        if($listing->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }
        $listing->delete();
        return redirect('/listings/manage')->with('message','Listing deleted successfully !');

    }

    // Manage listings
    public function manage(){
        return view('listings.manage',['listings'=>auth()->user()->listings()->get()]);
    }
}
/**Quy ước đặt tên
 * index - Show all listings
 * show - Show single listing
 * create - Show form to create new listing
 * store - Store new listing
 * edit - Show form to edit listing
 * update - Update listing
 * detroy - Delete listing
 */
