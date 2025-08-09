@extends('layouts.app')

@section('content')
<h2 class="mb-4 text-primary fw-bold">{{ auth()->user()->name }}, Welcome to Techiees Hub</h2>

@foreach(auth()->user()->assignedValues as $val)
    <div class="card mb-3">
        <div class="card-body">Your assigned value is: {{ $val->value }}</div>
    </div>
@endforeach
@endsection
