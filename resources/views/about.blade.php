@extends('layout.app') @section('content')
<div class="row tm-row tm-mb-45">
    <div class="col-12">
        <hr class="tm-hr-primary tm-mb-55">
        @foreach($aboutData as $about)
        <img src="{{ $about->image }}" alt="Image" class="">
        @endforeach
    </div>
</div>
<div class="row tm-row tm-mb-40">
    <div class="col-12">
        <div class="mb-4">
            @foreach($aboutData as $about)
            <h2 class="pt-2 tm-mb-40 tm-color-primary tm-post-title">{{ $about->title }}</h2>
            <p>
                {{ $about->description }}
            </p>
            @endforeach
        </div>
    </div>
</div>
<div class="row tm-row tm-mb-60">
    <div class="col-12">
        <hr class="tm-hr-primary  tm-mb-55">
    </div>
    @foreach($teamData as $teams)
    <div class="col-lg-6 tm-mb-60 tm-person-col">
        <div class="media tm-person">
            <img src="{{$teams->image}}" alt="Image" class="img-fluid mr-5">
            <div class="media-body">
                <h2 class="tm-color-primary tm-post-title mb-2">{{$teams->name}}</h2>
                <h3 class="tm-h3 mb-3">{{$teams->jobTitle}}</h3>
                <p class="mb-0 tm-line-height-short">
                    {{$teams->description }}
                </p>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection