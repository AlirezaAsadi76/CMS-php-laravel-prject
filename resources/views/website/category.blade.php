@extends('website.templete.master')
@section('content')
<!-- Page Header-->
<header class="masthead" style="background-image: url({{ $category->thumbnail }})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading text text-center">
                    <h1>{{ $category->name }}</h1>

                </div>
            </div>
        </div>
    </div>
</header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    @foreach ($post as $p )

                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{ route('web.post',['slug'=>$p->slug]) }}">
                            <h2 class="post-title">{{ $p->title }}</h2>
                            <h3 class="post-subtitle">{{ $p->sub_title }}</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">{{ $p->user->name }}</a>
                            on {{ date('M d, Y',strtotime($p->created_at)) }}
                            @if (count($p->categories)>0)
                            @foreach ($p->categories as $c)

                            <span class="post-category">
                                Category : <a href="{{ route('web.category',['slug'=>$c->slug]) }}">{{ $c->name }}</a>
                            </span>
                            @endforeach
                            @endif
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    @endforeach
                    <!-- Pager-->
                    <div class="clearfix mt-4">
                       {{ $post->links() }}
                    </div>
                </div>

            </div>
        </div>
@endsection
