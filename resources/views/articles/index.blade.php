
@extends('default')

@section('title')
    Page Index
@endsection

@section('main')

    <h1>Liste articles</h1>

    <form action="" class="form_inline">
         <input type="search" value="{{ request('search') }}" class="form-control" placeholder="Recherche..." name="search">
         <button class="btn btn-warning"><i class="fa fa-search"></i></button>
    </form>

    @forelse ($articles as $article)
    @if($loop->first)
        Premier article
    @endif

    @if($loop->last)
        dernier article
    @endif

    @include('articles._article')

    @empty
        <h3>Pas d'article</h3>
    @endforelse

    {{ $articles->appends(['search'=> request('search')])->links() }}
@endsection


{{-- 

    MastersiiFarhi2
@php
   $var = 10; 
@endphp

@isset($var)
    variable existe
@else
    n'existe pas
@endisset

@empty($var)
    
@endempty --}}



{{-- @if(empty($articles))
    <h3>Pas d'article</h3>
@else
    @foreach ($articles as $article)
        <h4>{{ $article->name }}</h4>
        <p>{{ $article->body }}</p>
        <hr>
    @endforeach
@endif --}}
