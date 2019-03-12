@if(!empty($categories))
<div class="clearfix menu-web relative">
    <ul>
        @foreach($categories as $category)
            <li><a href="{{url('/category/'.$category->slug)}}"><img src="{{$category->white_iconUrl}}" alt="{{$category->title}}" /> <p>{{$category->title}}</p></a></li>

        @endforeach

    </ul>
</div>
@endif
