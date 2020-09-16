@extends('layouts.app')

@section('content')
<div>
    @livewire('todo-form')
    @livewire('todo-list')
</div>
@endsection
