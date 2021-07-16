@if(isset($categoryChoice))
	<category>
	    <div class="row row-column">
	    	@foreach($categoryChoice as $categoryChoice)
	        <div class="item">
	            <div class="info">
	                <p>{{$categoryChoice->name}}</p>
	                <a href="">shop {{$categoryChoice->name}} <i class="fal fa-long-arrow-right"></i></a>
	            </div>
	        </div>
	        @endforeach
	    </div>
	</category>
@endif