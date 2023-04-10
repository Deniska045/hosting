@extends('admin.index')

@section('title', 'Товары')

@section('content')
    <a href="{{route('admin.items.createPage')}}" class="btn btn-success b-2 mt-2" style="margin-left: 40%"">Создать товар</a>

    <div class="d-flex flex-wrap">
        @forelse($items as $item)
            <div class="card me-2" style="width: 18rem;">
                <img src="{{$item->image}}" class="card-img-top" alt="{{$item->name}}">
                <div class="card-body ">
                    <h5 class="card-title">{{$item->name}}</h5>
                    <p class="card-text">{{$item->quantity}} шт.</p>
                    <a href="{{route('admin.items.updatePage', $item)}}" class="btn btn-primary">Редактировать</a>
                    <a href="{{route('admin.items.delete', $item)}}" class="btn btn-danger">Удалить</a>
                </div>
            </div>
        @empty
            <div class="alert alert-primary" role="alert">
                Товаров нет
            </div>
        @endforelse
    </div>
@endsection
