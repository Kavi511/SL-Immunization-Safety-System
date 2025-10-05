@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Adverse Effect Logs</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Effect ID</th>
                <th>Action</th>
                <th>Changes</th>
                <th>User</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            <tr>
                <td>{{ $log->id }}</td>
                <td>{{ $log->effect_id }}</td>
                <td>{{ $log->action }}</td>
                <td>
                    <pre>{{ json_encode(json_decode($log->changes), JSON_PRETTY_PRINT) }}</pre>
                </td>
                <td>{{ $log->user->name ?? 'System' }}</td>
                <td>{{ $log->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $logs->links() }}
    </div>
</div>
@endsection
