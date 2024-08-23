<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingRequest;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::where('user_id', auth()->user()->id)->get();

        return view('listings.index', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingRequest $request)
    {

        $feutered_image = $request->file('featured_image')->store('public/listing_images');
        $image_one = $request->file('image_one')->store('public/listing_images');
        $image_two = $request->file('image_two')->store('public/listing_images');
        $image_three = $request->file('image_three')->store('public/listing_images');

        Listing::create([
            'user_id'=> auth()->user()->id,
            'category_id'=> $request->category_id,
            'subcategory_id'=> $request->subcategory_id,
            'childcategory_id'=> $request->childcategory_id,
            'title'=> $request->title,
            'slug'=> Str::slug($request->title),
            'description'=> $request->description,
            'price'=> $request->price,
            'price_negotiable'=> $request->price_negotiable,
            'location'=> $request->location,
            'condition'=> $request->condition,
            'phone_number'=> $request->phone_number,
            'is_published'=> $request->is_published,
            'country_id'=> $request->country_id,
            'state_id'=> $request->state_id,
            'city_id'=> $request->city_id,
            'featured_image'=> $feutered_image,
            'image_one'=> $image_one,
            'image_two'=> $image_two,
            'image_three'=> $image_three,
        ]);

        return redirect()->route('listings.index')->with('message', 'Oglas je uspješno kreiran');
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $listing = Listing::find($id);

        return view('listings.edit', compact('listing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
