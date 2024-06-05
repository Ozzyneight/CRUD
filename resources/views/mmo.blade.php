@extends('layouts.app')
@section('content')
    <h2>Воин</h2>
    <div>
        {{ $warrior->heal() }}<br>
        {{ $warrior->rest(10) }}<br>
        {{ $warrior->hit() }}<br>
    </div>
    <h2>Лучник</h2>
    <div>
        {{ $archer->heal() }}<br>
        {{ $archer->rest(1) }}<br>
        {{ $archer->hit() }}<br>
    </div>
@endsection
