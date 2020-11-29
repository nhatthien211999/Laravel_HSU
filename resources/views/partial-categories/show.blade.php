<div>
    @foreach ($categories as $category)
        <a class="collapse-item" href="{{route('categories.show',$category->id)}}">{{$category->category}}</a>
    @endforeach
</div>