@extends('layouts.admin')

@section('content')
    @include('admin.blog.categories._nav')

    <form method="POST" action="{{ route('admin.blog.categories.store') }}">
        @csrf

        <div class="form-group">
            <label for="parent" class="col-form-label">Parent</label>
            <select id="parent" class="form-control{{ $errors->has('parent') ? ' is-invalid' : '' }}" name="parent">
                <option value=""></option>
                @foreach ($parents as $parent)
                    <option value="{{ $parent->id }}"{{ $parent->id == old('parent') ? ' selected' : '' }}>
                        @for ($i = 0; $i < $parent->depth; $i++) &mdash; @endfor
                        {{ $parent->name }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('parent'))
                <span class="invalid-feedback"><strong>{{ $errors->first('parent') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="name" class="col-form-label">Name</label>
            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="name" class="col-form-label">Slug</label>
            <input id="name" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug') }}" required>
            @if ($errors->has('slug'))
                <span class="invalid-feedback"><strong>{{ $errors->first('slug') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="title" class="col-form-label">Title</label>
            <input id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}">
            @if ($errors->has('title'))
                <span class="invalid-feedback"><strong>{{ $errors->first('title') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="description" class="col-form-label">Description</label>
            <textarea id="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="10"></textarea>
            @if ($errors->has('description'))
                <span class="invalid-feedback"><strong>{{ $errors->first('description') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection