@include('partials.frontend-header', ['title' => 'TESDA Qualifications', 'css_file' => '/css/tesda_qual.css', 'show_hamburger' => false])
    <div class="container">
        <div class="tesda">
        <h1>TESDA Qualifications</h1>
        <a href="{{route('welcome')}}"><img src="image-website/Polygon 1.png" alt="polygon" class="polygon"></a>
    </div>
        @php
            $num = 0;
        @endphp
        @foreach ($datas as $data)
            <div class="qualification">
                <img src="{{'/assets/img/'.$data->img_name}}" alt="{{$data->img_name}}">
                <div class="qualification-details">
                    <h2 style="width: 50%">{{$data->name}}</h2>
                    <p class="hours">({{$data->hours}} hours)</p>
                    <p>{{$data->caption}}</p>
                    <a href="{{route('see-more', ['id'=>$data->id])}}" class="btn">See more</a>
                </div>
            </div>
        @endforeach
    </div>


@include('partials.frontend-footer')
