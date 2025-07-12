@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Please try again:</strong>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container mt-5" style="max-width: 600px;">
    <fieldset class="border p-4 rounded shadow-sm">
        <legend class="w-auto px-3 text-primary fw-bold">Assign Clients</legend>

        <form method="POST" action="{{ route('admin.assign') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Text/Number Value</label>
                <input type="text" name="value" class="form-control" >
            </div>
            <div class="mb-3">
                <label class="form-label">Select Clients</label>
                <select name="user_ids[]" class="form-select" multiple >
                    @foreach(getClientUsers() as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-start gap-2">
                <button type="submit" class="btn btn-primary">Assign</button>
                <a href="{{ route('admin.client.list') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </fieldset>
</div>
@endsection

