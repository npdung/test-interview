@extends('layouts.app')

@section('content')
  <div class="container mx-auto p-4">
    <x-matches-filter :filter="$filter" :liveCount="$liveCount"/>

    <table class="w-full mb-4">
      @foreach($competitions as $competition)
        <x-competition-row :competition="$competition"/>
      @endforeach
    </table>
  </div>
@endsection
