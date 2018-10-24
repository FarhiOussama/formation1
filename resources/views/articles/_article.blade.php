<h4>{{$loop->iteration}} - {!! $article->name !!}</h4>
<p>{!! str_limit($article->body, 100,'<a href="#">...</a>') !!}</p>
<p>Cration par : {{ $article->user->name }}</p>

<p>{!! $article->published_at !!}</p>
<p>{!! $article->user->email !!}</p>
{{-- <p>{{ str_limit($article->body, 100,'[....]') }}</p> --}}
<hr>

@component('component.button')
    lire suite
@endcomponent