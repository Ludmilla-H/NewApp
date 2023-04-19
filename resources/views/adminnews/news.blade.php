@extends('layouts/actu')
@section('main')


@forelse ($actuas as $itemActua ) 

<!-- component -->
<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">

    <div class="py-3 sm:max-w-xl sm:mx-auto">
        <div class="bg-white shadow-lg border-gray-100 max-h-80	 border sm:rounded-3xl p-8 flex space-x-8">

        
        <div class="h-48 overflow-visible w-1/2">

            

            <img class="rounded-3xl shadow-lg" src="{{Storage::url($itemActua->image)}}" alt="">
        </div>
        <div class="flex flex-col w-1/2 space-y-4">
          <div class="flex justify-between items-start">
            <h3 class="text-3xl font-bold">{{$itemActua->name}}</h3>
            <div class="bg-yellow-400 font-bold rounded-xl p-2">7.2</div>
          </div>
          <div>
          
        
          </div>
            <p class=" text-gray-400 max-h-40 overflow-y-hidden ">{{Str::limit( $itemActua->description , 100 )}}</p>
        
        <div class="mb-5">
          
            <a href="{{route('news.detail' , $itemActua->id)}}" class="bg-pink-300 px-8 py-3 text-black rounded-md font-bold">Voir +</a>
            </div>
            </div>
        </div>
    </div>   
  </div>
    
@empty
@endforelse
@endsection



