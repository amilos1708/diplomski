<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingRequest;
use Illuminate\Http\Request;
use App\Models\Listing;


class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request['featured_image'] = 'featured_image';
        $request['image_one_image'] = 'image_one_image';
        $request['image_two_image'] = 'image_two_image';
        $request['image_three_image'] = 'image_three_image';
        $request['slug'] = 'slug';
        $request['user_id'] = '1';
        

        Listing::create($request->all());

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
