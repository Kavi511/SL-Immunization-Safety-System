<?php

namespace App\Http\Controllers;

use App\Models\AdverseEffect;
use App\Models\AdverseEffectLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdverseEffectController extends Controller
{
    public function index(Request $request)
{
    $query = AdverseEffect::query();

    // Apply filters if provided
    if ($request->has('reported_by') && $request->reported_by != '') {
        $query->where('reported_by', $request->reported_by);
    }

    if ($request->has('severity') && $request->severity != '') {
        $query->where('Severity', $request->severity);
    }

    if ($request->has('start_date') && $request->has('end_date') && $request->start_date && $request->end_date) {
        $query->whereBetween('ReportedDate', [$request->start_date, $request->end_date]);
    }

    // Paginate the results
    $effects = $query->with('user')->paginate(10)->appends($request->all());
    $users = User::all();

    return view('adverse_effects.index', compact('effects', 'users'));
}

    
    public function create()
    {
        $users = User::all();
        return view('adverse_effects.create', compact('users'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'vaccination_records_id' => 'required|integer',
        'Description' => 'required',
        'Severity' => 'required|in:Mild,Moderate,Severe',
        'reported_by' => 'required|integer',
        'ReportedDate' => 'required|date',
    ]);

    $effect = AdverseEffect::create($validated);

    // Log the creation
    AdverseEffectLog::create([
        'effect_id' => $effect->EffectID,
        'action' => 'create',
        'changes' => json_encode($validated),
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('adverse_effects.index')->with('success', 'Adverse Effect reported successfully.');
}

    public function edit($id)
{
    $effect = AdverseEffect::findOrFail($id);
    $users = User::all(); // Fetch all users
    return view('adverse_effects.edit', compact('effect', 'users'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'vaccination_records_id' => 'required|integer',
        'Description' => 'required',
        'Severity' => 'required|in:Mild,Moderate,Severe',
        'reported_by' => 'required|integer',
        'ReportedDate' => 'required|date',
    ]);

    $effect = AdverseEffect::findOrFail($id);
    $originalData = $effect->getOriginal(); // Get the original data before update
    $effect->update($validated);
   
    // Log the update
    AdverseEffectLog::create([
        'effect_id' => $effect->EffectID,
        'action' => 'update',
        'changes' => json_encode([
            'before' => $originalData,
            'after' => $validated,
        ]),
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('adverse_effects.index')->with('success', 'Adverse Effect updated successfully.');
}

public function destroy($id)
{
    $effect = AdverseEffect::findOrFail($id);

    // Log the deletion
    AdverseEffectLog::create([
        'effect_id' => $effect->id,
        'action' => 'delete',
        'changes' => json_encode($effect->toArray()),
        'user_id' => Auth::id(),
    ]);

    $effect->delete();

    return redirect()->route('adverse_effects.index')->with('success', 'Adverse Effect deleted successfully.');
}
}
