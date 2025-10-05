<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdverseEffectLog;
use Illuminate\Http\Request;

class AdverseEffectLogController extends Controller
{
    public function index()
    {
        $logs = AdverseEffectLog::with(['effect', 'user'])->latest()->paginate(10);

        return view('adverse_effects.logs', compact('logs'));
    }
}
