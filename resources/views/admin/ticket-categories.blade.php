@extends('admin.template')

@section('main')
    <main class="container">
        <x-alert :errors="$errors" :success="session('success') "/>
        <a href="{{ route('admin.ticket-categories.create') }}" class="button">Добавить тему</a>
        <ul>
            @foreach($categories as $category)
            <li>
                <div class="category">
                    <h2>{{ $category->name }}</h2>
                    <ul>
                        <li><a href="{{ route('admin.ticket-categories.edit',['ticket_category'=>$category->id]) }}">Редактировать</a></li>
                        @if($category->deleted_at)
                            <li><a href="{{ route('admin.ticket-categories.restore', ['ticket_category'=>$category->id,'type'=>1]) }}">Показать</a></li>
                        @else
                            <li><a href="{{ route('admin.ticket-categories.delete', ['ticket_category'=>$category->id,'type'=>1]) }}">Скрыть</a></li>
                        @endif
                        <li><a href="{{ route('admin.ticket-categories.delete', ['ticket_category'=>$category->id,'type'=>0]) }}">Удалить</a></li>
                    </ul>
                </div>
            </li>
            @endforeach
        </ul>
    </main>
@endsection
