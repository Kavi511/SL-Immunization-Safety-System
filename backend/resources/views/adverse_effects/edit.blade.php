@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Edit Adverse Event</h2>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('adverse_effects.update', $effect->EffectID) }}" method="POST">
        @csrf
        @method('PUT') <!-- Required for updating -->

        <div class="mb-3">
            <label for="vaccination_records_id" class="form-label">Vaccine Record ID</label>
            <input type="text" id="vaccination_records_id" name="vaccination_records_id" class="form-control" value="{{ old('vaccination_records_id', $effect->vaccination_records_id) }}" required>
        </div>

        <div class="mb-3">
            <label for="Description" class="form-label">Description</label>
            <textarea id="Description" name="Description" class="form-control" required>{{ old('Description', $effect->Description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="Severity" class="form-label">Severity</label>
            <select id="Severity" name="Severity" class="form-select" required>
                <option value="Mild" {{ $effect->Severity == 'Mild' ? 'selected' : '' }}>Mild</option>
                <option value="Moderate" {{ $effect->Severity == 'Moderate' ? 'selected' : '' }}>Moderate</option>
                <option value="Severe" {{ $effect->Severity == 'Severe' ? 'selected' : '' }}>Severe</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="reported_by" class="form-label">Reported By</label>
            <select id="reported_by" name="reported_by" class="form-select" required>
                <option value="" disabled>Select user</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $effect->reported_by == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="ReportedDate" class="form-label">Reported Date</label>
            <input type="date" id="ReportedDate" name="ReportedDate" class="form-control" value="{{ old('ReportedDate', $effect->ReportedDate) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
