<?php 
    $bunners = App\Bunner::getBunners();
    // echo "<pre>"; print_r($bunners);die;
?>
@if(isset($page_name) && $page_name == 'index')
    <div id="carouselBlk">
        <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
                @foreach($bunners as $key => $bunner)
                <div class="item {{$key == 0 ? 'active' : ''}}">
                    <div class="container">
                        <a href="{{ !empty($bunner['link']) ? url($bunner['link']) : 'javascript:void(0)'}}">
                            @if(!empty($bunner['image']))
                                <img
                                    style="width:100%"
                                    src="{{url('images/bunner_images/'.$bunner['image'])}}"
                                    alt="{{$bunner['alt']}}"
                                    title="{{$bunner['title']}}"
                                />
                            @else
                                <img style="width:100%" src="{{url('images/no_image.png')}}" alt="special offers"/>
                            @endif
                        </a>
                        <div class="carousel-caption">
                            <h4>First Thumbnail label</h4>
                            <p>Banner text</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
        </div>
    </div>
@endif