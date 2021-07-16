<high-lights>
    <div class="container">
        <div class="titlePrimary">
            Xu Hướng Thời Trang  2020
            <p></p>
        </div>
        <div class="row rowWrap">
            @foreach($postChoice as $postChoice)
            <div class="item">
                <p><a href="{{$postChoice->slug}}/post">{{$postChoice->title}}</a></p>
            </div>
            @endforeach
        </div>
    </div>
</high-lights>