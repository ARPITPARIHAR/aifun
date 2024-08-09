@extends('frontend.layouts.app')
@section('meta_title',' | '.env('APP_NAME'))
@section('meta_description','Gogra Legal')
@section('content')

<div class="container">
    <h2 style="text-align: center;">Search Results for "{{ $query }}"</h2>

    @if(count($results))
        @foreach($results as $model => $rows)
            <h3>{{ ucfirst($model) }}</h3>
            @if(count($rows))
                <ul>
                    @foreach($rows as $row)
                        <li>
                            @if($model == 'practice_areas')
                                <a href="{{ route('practice-area.show', ['slug' => urlencode($row->slug)]) }}">{{ $row->title }}</a>
                            @elseif($model == 'case_studies')
                                <a href="{{ route('case-studies.show', $row->id) }}">{{ $row->title }}</a>
                            @elseif($model == 'blogs')
                                <a href="{{ route('blog-details', ['slug' => urlencode($row->slug)]) }}">{{ $row->title }}</a>
                            @elseif($model == 'laws')
                                <a href="{{ route('home', $row->id) }}">{{ $row->title }}</a>
                            @elseif($model == 'clients')
                                <a href="{{ route('clients.show', $row->id) }}">{{ $row->name }}</a>
                            @else
                                {{ $row->title ?? $row->name }}
                            @endif
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="no-results">No results found in {{ ucfirst($model) }}</p>
            @endif
        @endforeach
    @else
        <p class="no-results">No results found.</p>
    @endif
</div>

@endsection

@section('modal')
@endsection

@section('scripts')
@endsection

@section('styles')
@endsection
