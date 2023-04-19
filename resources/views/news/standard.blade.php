<h1>Standard</h1>


@forelse ($actus as $itemActu)
    
<h3>{{Str::limit($itemActu->name, 30)}}</h3>
<a href="{{route ('news.standard.detail' , $itemActu)}}">Voir +</a>

@empty
    

<h2>Pas de news</h2>

@endforelse