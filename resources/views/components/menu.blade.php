 <div class="menu">

 	<ul>
 	@foreach($categories as $category)
 		<li><a href="{{ url($category->slug) }}" title="{{ $category->name}}">{{ $category->name}}</a></li>
    @endforeach
    </ul>
</div>