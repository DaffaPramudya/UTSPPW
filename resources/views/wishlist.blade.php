@extends('components.layout')
@section('title', 'Wishlist')
@section('content')
  <div class="container grid lg:grid-cols-4 mx-auto">
    @foreach($wishlists as $wishlist)
      <div class="w-40 aspect-[3/4]">
      </div>
    @endforeach
  </div>
@endsection