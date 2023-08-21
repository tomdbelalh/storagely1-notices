@extends('layouts.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="float-left">
                <h2>Notices</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-link" href="{{ route('notices.create') }}">New</a>
            </div>
        </div>
    </div>
    <hr>

    <div class="table-responsive">
      <table class="table">
        <caption>List of notices</caption>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Notice</th>
              <th scope="col">Link</th>
              <th scope="col">Color</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($notices as $key => $notice)
                <tr>
                  <th scope="row">{{ $key + 1 }}</th>
                  <td>{!! $notice->contents !!}</td>
                  <td>{{ $notice->link }}</td>
                  <td>{{ $notice->color }}</td>
                  <td><a class="btn btn-link" href="{{ route('notices.edit', ['notice' => $notice->id]) }}">Edit</a></td>
                </tr>
            @endforeach
          </tbody>
      </table>
    </div>    
@endsection