<!-- Stored in resources/views/child.blade.php -->
@extends('templates/article')

@section('titre')
    Les articles
@endsection

@section('contenu')
    <p>C'est l'article n° {{ $numero }}</p>
@endsection