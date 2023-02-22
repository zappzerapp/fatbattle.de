<?php

namespace App\Http\Controllers;

use App\Models\Weight;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = auth()->user();

        return view('weight', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Weight::create(['user_id' => auth()->user()->id, 'value' => str_replace(',', '.', $request->weight)]);

        event(\App\Events\WeightUpdated::broadcast());

        return redirect('home');
    }
}
