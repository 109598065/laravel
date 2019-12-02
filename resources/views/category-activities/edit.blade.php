@extends('layout')

@section('content')
    <h1 class="title">Edit</h1>

    <form method="POST" action="/category-activities/{{ $categoryActivity->id }}" enctype="multipart/form-data"
          style="margin-bottom: 1em;">
        @method('PATCH')
        @csrf

        <div class="field">
            <label class="label">Category</label>
            <div class="select">
                <select name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->number.'  '.$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input type="text" name="name" class="input" value="{{ $categoryActivity->name }}"
                       required>
            </div>
        </div>

        <div class="field">
            <input type="file" name="image">
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update</button>
            </div>
        </div>

    </form>

    @include ('errors')

    <form method="POST" action="/category-activities/{{ $categoryActivity->id }}">
        @method('DELETE')
        @csrf

        <div class="field">
            <div class="control">
                <button type="submit" class="button">Delete</button>
            </div>
        </div>
    </form>
@endsection
