@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="m-0" style="font-weight: 800; color:#0f172a;">Adverse Effects List</h2>
        <a href="{{ route('adverse_effects.create') }}" class="btn btn-success" style="border-radius:.6rem; padding:.55rem 1rem;">Report New Adverse Event</a>
    </div>

    <!-- Filter Bar -->
    <form action="{{ route('adverse_effects.index') }}" method="GET" class="row g-3 mb-4" style="background: rgba(255,255,255,.7); backdrop-filter: blur(6px); border-radius: .8rem; padding: 1rem; box-shadow: 0 6px 18px rgba(15,23,42,.08); margin-top: 1rem;">
        <div class="col-md-3">
            <label for="reported_by" class="form-label">Reported By</label>
            <select id="reported_by" name="reported_by" class="form-select">
                <option value="">All Users</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ request('reported_by') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label for="severity" class="form-label">Severity</label>
            <select id="severity" name="severity" class="form-select">
                <option value="">All Severities</option>
                <option value="Mild" {{ request('severity') == 'Mild' ? 'selected' : '' }}>Mild</option>
                <option value="Moderate" {{ request('severity') == 'Moderate' ? 'selected' : '' }}>Moderate</option>
                <option value="Severe" {{ request('severity') == 'Severe' ? 'selected' : '' }}>Severe</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" id="start_date" name="start_date" class="form-control" value="{{ request('start_date') }}">
        </div>

        <div class="col-md-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" id="end_date" name="end_date" class="form-control" value="{{ request('end_date') }}">
        </div>

        <div class="col-md-12 text-end">
            <button type="submit" class="btn btn-primary" style="padding:.5rem 1.1rem;">Filter</button>
            <a href="{{ route('adverse_effects.index') }}" class="btn btn-secondary" style="padding:.5rem 1.1rem;">Reset</a>
        </div>
    </form>

    <!-- Adverse Effects Table -->
    <table class="table table-hover" style="background: rgba(255,255,255,.9); border-radius:.6rem; overflow:hidden;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Vaccine Record ID</th>
                <th>Description</th>
                <th>Severity</th>
                <th>Reported By</th>
                <th>Reported Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($effects as $effect)
            <tr>
                <td>{{ $effect->EffectID }}</td>
                <td>{{ $effect->vaccination_records_id }}</td>
                <td>{{ $effect->Description }}</td>
                <td>{{ $effect->Severity }}</td>
                <td>{{ $effect->user->name ?? 'Unknown' }}</td>
                <td>{{ $effect->ReportedDate }}</td>
                <td>
                    <a href="{{ route('adverse_effects.edit', $effect->EffectID) }}" class="btn btn-warning btn-sm" style="border-radius:.4rem;">Edit</a>
                    <form action="{{ route('adverse_effects.destroy', $effect->EffectID) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius:.4rem;">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $effects->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
