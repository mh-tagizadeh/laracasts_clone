<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TeamPlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if(!$user->can('user_management'))
        {
            abort(403);
        }

        $plans = TeamPlan::select('id', 'title', 'current_price', 'status', 'duration', 'max_member')->get();

        return Inertia::render('Plans/Index', [
            'team_plans' => $plans
        ]);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeamPlan  $teamPlan
     * @return \Illuminate\Http\Response
     */
    public function show(TeamPlan $teamPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeamPlan  $teamPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamPlan $teamPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeamPlan  $teamPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamPlan $teamPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeamPlan  $teamPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamPlan $teamPlan)
    {
        //
    }
}
