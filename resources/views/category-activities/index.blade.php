@extends('layout')

@section('content')
    <h1 class="title">Category Activities</h1>

    <form method="GET" action="/category-activities/create">
        @csrf

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create</button>
            </div>
        </div>
    </form>

    <div class="content">
        <ol type="1">
            @foreach ($categoryActivities as $categoryActivity)
                <li>
                    <a href="/category-activities/{{ $categoryActivity->id }}">
                        {{ $categoryActivity->name }}
                    </a>
                </li>
            @endforeach
        </ol>
    </div>

@endsection
