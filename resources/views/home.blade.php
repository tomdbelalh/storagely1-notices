@extends('layouts.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    @foreach ($notices as $notice)
        <div class="alert alert-warning alert-dismissible fade show" style="{{ isset($notice->color) ? 'background: ' . $notice->color : '';  }}" role="alert">
            @if ($notice->link)
                <a href="{{ $notice->link }}">{!! $notice->contents !!}</a>
            @else
                {!! $notice->contents !!}
            @endif
          
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endforeach
    
@endsection