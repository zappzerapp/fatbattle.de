<?php

namespace App\Http\Controllers;

use App\Weight;
use Illuminate\Http\Request;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        return view('weight', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Weight::create(['user_id' => auth()->user()->id, 'value' => str_replace(',', '.', $request->weight)]);

        event(\App\Events\WeightUpdated::broadcast());

        return redirect('home');
    }
}
