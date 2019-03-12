<div class="clearfix logo">
    <a href="/"><img alt="Logo" src="{{$logo}}" /></a>
</div>
<div class="clearfix search-box relative float-left">
    <form method="GET" action="{{url('search')}}" class="">
        <div class="clearfix category-box relative">
            <select name="filterIn">
                <option value="all">All Category</option>
                @foreach($categories as $category)
                    <option @if(isset($filterIn))@if($filterIn == $category->slug) selected @endif @endif value="{{$category->slug}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <input class="search" type="text" name="term" placeholder="Enter keyword here . . ." autocomplete="off" @if(isset($term)) value="{{$term}}" @endif>
        <button type="submit" class="animate-default button-hover-red">Search</button>
    </form>
</div>
