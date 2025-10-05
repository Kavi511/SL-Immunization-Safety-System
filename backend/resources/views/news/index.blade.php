@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2 class="my-3" style="font-weight: 800; color:#0f172a;">News</h2>
    
    @if (isset($news['articles']) && count($news['articles']) > 0)
        <div class="row">
            @foreach ($news['articles'] as $article)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ $article['urlToImage'] ?? asset('img/placeholder.jpg') }}" class="card-img-top" alt="News Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article['title'] }}</h5>
                            <p class="card-text">
                                {{ \Illuminate\Support\Str::limit($article['description'], 100) }}
                            </p>
                            <a href="{{ $article['url'] }}" target="_blank" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">No news articles found.</p>
    @endif
</div>
@endsection
