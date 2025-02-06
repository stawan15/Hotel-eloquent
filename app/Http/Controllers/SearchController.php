<?php

namespace App\Http\Controllers;


use App\Models\StudentSystem;
use App\Models\Student;
use App\Models\HotelCustomer;
use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Response;
use Inertia\Inertia;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        $query = $request->input('search');
        $sortColumn = $request->input('sort', 'hotel_customer_id');
        $sortDirection = $request->input('direction', 'asc');

        $showdatabase = DB::table('hotel_customers')
            ->where('name', 'like','%'. $query.'%')
            ->orderBy($sortColumn, $sortDirection)
            ->paginate(100);

        return Inertia::render('Show/Index', [
            'showdatabase' => $showdatabase,
            'query' => $query,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Search $search)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Search $search)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Search $search)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Search $search)
    {
        //
    }
}
