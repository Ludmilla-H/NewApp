<x-app-layout>

    <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100">
        @foreach ($categories as $itemCategory)
        
        <li class="text-white">
            <a href="{{route('news.standard.category' , $itemCategory->id )}}">{{$itemCategory->name}}</a>
        </li>
    
        @endforeach
    </ul>

@if (Gate::allows('admin'))
<!-- Si il est admin il laisse passer sinon on ne passe pas -->

    <h1 class='text-white'>Admin</h1>

@else

    <h1 class='text-white'>not admin</h1>

@endif

<h1 class="text-white">Liste des news</h1>

@forelse ($actus as $itemActu)
    
<h3 class="text-white">{{Str::limit($itemActu->name, 30)}}</h3>
<a href="{{route ('news.standard.detail' , $itemActu)}}" class="text-white">Voir +</a>

@empty
    

<h2>Pas de news</h2>

@endforelse
{{$actus->links()}}
</x-app-layout>