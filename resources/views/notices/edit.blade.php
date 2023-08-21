@extends('layouts.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="float-left">
                <h2>{{ $pageTitle }}</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('notices.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('actionMsg'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('actionHead') }}</strong> {{ $message }}
          
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> Please correct following errors<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('notices.update', ['notice' => $notice->id]) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
          <label for="contents">Contents</label>
          <textarea class="form-control" name="contents" id="contents" rows="3" required>{{ $notice->contents }}</textarea>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="link">Link</label>
              <input type="text" class="form-control" name="link" id="link" value="{{ $notice->link }}">
            </div>
            <div class="form-group col-md-4">
              <label for="color">Color <small>(<strong>color name</strong> or <strong>hexa code</strong> as #xxxxxx;)</small></label>
              <input type="text" class="form-control" name="color" id="color" value="{{ $notice->color }}">
            </div>
            <div class="form-group col-md-2">
              <div class="form-check text-right" style="padding-top: 35px;">
                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ $notice->is_active ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">
                  Active?
                </label>
              </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>

    </form>
@endsection