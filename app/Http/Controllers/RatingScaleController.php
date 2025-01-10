<?php

namespace App\Http\Controllers;

use App\Models\RatingScale;
use Illuminate\Http\Request;

class RatingScaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings = RatingScale::all();
        return view('content.rating.rating', ['ratings' => $ratings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'value' => 'required',
            'caption' => 'required',
        ]);

        try {
            RatingScale::create([
                'value' => $request->value,
                'caption' => $request->caption
            ]);

            // Flash success message
            return redirect()->back()->with('success', 'Rating created successfully.');
        } catch (\Exception $e) {
            // Log the error and flash failure message
            \Log::error("Rating creation failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create rating. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RatingScale  $ratingScale
     * @return \Illuminate\Http\Response
     */
    public function show(RatingScale $ratingScale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RatingScale  $ratingScale
     * @return \Illuminate\Http\Response
     */
    public function edit(RatingScale $ratingScale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RatingScale  $ratingScale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RatingScale $ratingScale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RatingScale  $ratingScale
     * @return \Illuminate\Http\Response
     */
    public function destroy(RatingScale $ratingScale)
    {
        // menghapus data rating berdasarkan id yang dipilih
        try {
            RatingScale::destroy($ratingScale->id);
            return redirect()->back()->with('success', 'Rating deleted successfully');
        } catch (\Exception $e) {
            // Log the error and flash failure message
            \Log::error("Rating deletion failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete rating. Please try again.');
        }
    }
}
