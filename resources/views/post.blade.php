@extends('layout.app') @section('content')

<!-- include alert  -->
@include('layout.alert')

<div class="row tm-row">
    <div class="col-12">
        <hr class="tm-hr-primary tm-mb-55">
        <!-- Video player 1422x800 -->
        <div width="954" height="535" controls class="tm-mb-40">
            <img src="{{asset($blog->image)}}" alt="" width="800" height="500">
        </div>
    </div>
</div>
<div class="row tm-row">
    <div class="col-lg-8 tm-post-col">
        <div class="tm-post-full">
            <div class="mb-4">
                <h2 class="pt-2 tm-color-primary tm-post-title">{{$blog->title}}</h2>
                <p class="tm-mb-40">{{$blog->created_at->format('F d, Y')}}
                    posted by {{$user->name}}</p>
                <p>
                    {!! $blog->description !!}
                </p>
                <span class="d-block text-right tm-color-primary">
                    @foreach($categories as $categorie)
                    <p>{{$categorie->name}}</p>
                    @endforeach
                </span>
            </div>

            <!-- Comments -->
            <div>
                <h2 class="tm-color-primary tm-post-title">Comments</h2>
                <hr class="tm-hr-primary tm-mb-45">
                @foreach($comments as $comment)
                <div class="tm-comment tm-mb-45">

                    <figure class="tm-comment-figure">
                        <!-- <img src="img/comment-1.jpg" alt="Image" class="mb-2 rounded-circle img-thumbnail"> -->
                        <figcaption class="tm-color-primary text-center">{{$comment->name}}</figcaption>
                    </figure>
                    <div>
                        <p>
                            {{$comment->comment}}
                        </p>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="tm-color-primary ">REPLY</a>
                            <span class="tm-color-primary">{{$comment->created_at->format('F d, Y')}}</span>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- give comment -->
                <form action="{{ route('blog.comment', ['id' => $blog->id]) }}" class="mb-5 tm-comment-form" method="post">
                    @csrf
                    <h2 class="tm-color-primary tm-post-title mb-4">Your comment</h2>
                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                    <div class="mb-4">
                        <input class="form-control" name="name" type="text">
                    </div>
                    <div class="mb-4">
                        <input class="form-control" name="email" type="text">
                    </div>
                    <div class="mb-4">
                        <textarea class="form-control" name="comment" rows="6"></textarea>
                    </div>
                    <div class="text-right">
                        <button class="tm-btn tm-btn-primary tm-btn-small">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <aside class="col-lg-4 tm-aside-col">
        <div class="tm-post-sidebar">
            <hr class="mb-3 tm-hr-primary">
            <h2 class="mb-4 tm-post-title tm-color-primary">Categories</h2>
            <ul class="tm-mb-75 pl-5 tm-category-list">
                @foreach($category as $categori)
                <li><a href="#" class="tm-color-primary">{{$categori->name}}</a></li>
                @endforeach
            </ul>
            <hr class="mb-3 tm-hr-primary">
            <h2 class="tm-mb-40 tm-post-title tm-color-primary">Related Posts</h2>
            <a href="#" class="d-block tm-mb-40">
                <figure>
                    <img src="img/img-02.jpg" alt="Image" class="mb-3 ">
                    <figcaption class="tm-color-primary">Duis mollis diam nec ex viverra scelerisque a sit</figcaption>
                </figure>
            </a>
            <a href="#" class="d-block tm-mb-40">
                <figure>
                    <img src="img/img-05.jpg" alt="Image" class="mb-3 ">
                    <figcaption class="tm-color-primary">Integer quis lectus eget justo ullamcorper ullamcorper</figcaption>
                </figure>
            </a>
            <a href="#" class="d-block tm-mb-40">
                <figure>
                    <img src="img/img-06.jpg" alt="Image" class="mb-3 ">
                    <figcaption class="tm-color-primary">Nam lobortis nunc sed faucibus commodo</figcaption>
                </figure>
            </a>
        </div>
    </aside>
</div>
@endsection
