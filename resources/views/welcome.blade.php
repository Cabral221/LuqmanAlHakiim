@extends('layouts.user.app',['title' => 'Bienvenue'])

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('text-header')
<!-- Header -->
<header id="headerwrap" class="dark-wrapper backstretched special-max-height no-overlay">
    <div class="container vertical-center">
        <div class="intro-text vertical-center text-center smoothie">
            <h1 class="intro-heading wow fadeIn heading-font" data-wow-delay="0.2s">{{ config('app.name', 'Laravel') }}</h1>
            <div class="intro-sub-heading wow fadeIn secondary-font" data-wow-delay="0.4s">
                <span class="rotate">
                    @foreach ($programs as $program) {{ $program->libele }}, @endforeach
                </span>
            </div>
            <a href="{{ route('user.admission') }}" class="btn btn-primary mt-5"><h4>Préinscrire mon(es) enfant(s)</h4></a>
        </div>
    </div>
</header>
@endsection

@section('content')
{{-- Mot de bienvenue --}}
<div class="white-wrapper py-5">
    <div class="container">
        <div class="word_of m-3">
            <h2> Le Mot du Directeur</h2>
            <div class="row p-4">
                <div class="col-sm-8">
                    {!! $word->content !!}
                </div>
                <div class="col-sm-4 text-center">
                    <div>
                        <img src="{{ asset($word->team->image) }}" alt="Image" srcset="{{ asset($word->team->image) }}" class="word_of_img" />
                    </div>
                    <h4 class="word_of_who">{{ $word->team->firstname }} {{ $word->team->lastname }}</h4>
                    <span>{{ $word->team->job }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Fin du Mot de Bienvenue --}}

<section class="white-wrapper py-5">
    <div class="container">
        <h2 class="section-title text-center">Nos Programmes</h2>
        <div class="row">
            @foreach ($programs as $program)
            <div class="col-sm-4">
                <div class="card card-program">
                    <img src="{{ asset($program->image) }}" alt="image" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $program->libele }}</h5>
                        <p class="card-text">{{ Str::substr($program->description, 0, 90) . ' ...' }}</p>
                        <a href="{{ route('user.programs.show', $program) }}" class="btn btn-primary">Plus...</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



{{-- Old Programs section --}}
{{--
<section class="white-wrapper">
    <div class="py-5">
        <div class="container text-dark">
            <div class="row">
                <div class="col-sm-8">
                    <h2>Programs</h2>
                    <p>Our Mission is to create a first class British university in Senegal, offering British university degrees and solid links with universities in the United Kingdom. With its different streams including English, Business Administration (options: Management, Marketing, Human Resources, or Finance / Banking), Supply Chain Management, your new university wants to facilitate off-site access to British higher degrees. The BBC wants to offer international qualifications (HND 1 & 2, BBA, MBA) at an affordable cost, in order to open up job opportunities for Africans both at home and abroad. To restore hope to those who have been denied a UK visa due to the exorbitant costs of studying and traveling abroad, through two-year postgraduate studies here in Dakar, Senegal leading to a graduate programs in the UK.</p>
                    <div class="pb-3">Click on a program to see our sector <span class="badge badge-pill text-uppercase">+</span></div>
                    @if (isset($programs) && $programs->count() > 0)
                    @foreach ($programs as $program)
                    <button type="button" class="collapsible">
                        <div style="display: inline">
                            <h3 class="col text-left">{{ strtoupper($program->libele) }}</h3>
                            <small class="col text-right mr-5">Degree:
                                @foreach($program->diplomes as $diplome)
                                <span class="text-danger">{{ $diplome->libele }} </span> |
                                @endforeach
                            </small>
                        </div>
                    </button>
                    <div class="content mb-3">
                        <div class="section-inner22 text-white">
                            <div class="row text-center pl-3 pr-3">
                                @if ($program->filieres->count() > 0)
                                @foreach ($program->filieres as $filiere)
                                <div class="p-4 col-sm-4 col-xs-6 wow fadeIn" data-wow-delay="0.2s">
                                    <a href="{{ route('user.programs.show',[$program, $filiere]) }}">
                                        <div class="icon-box-1 match-height mb20">
                                            <img src="{{ asset($filiere->icon) }}" alt="{{ $filiere->libele }}" width="100px" srcset="">
                                        </div>
                                        <div class="text-dark pt-2" style="color:black;">
                                            <h4 class="card-title text-capitalize">{{ $filiere->libele }}</h4>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                @else
                                <p>No class for this program...</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p class="text-dark">Pas de programmes pour le moment...</p>
                    @endif
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="alert alert-info"><h3><span><i class="fas fa-info-circle"></i></span> News</h3></div>
                        <div class="card-body">
                            @foreach ($news as $new)
                            <div class="mt-3 mb-3">
                                <a href="{{route('user.news.show',[$new])}}">
                                    <div class="card">
                                        <div class="card-header">
                                            {{ $new->title }}
                                            <div>
                                                <em>{{ $new->date }}</em>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header"><h4>Books recommended</h4></div>
                        <div class="card-body">
                            @if (isset($books) && $books->count() >= 1)
                            @foreach ($books as $book)
                            <div class="media">
                                <div class="pull-left">
                                    <img class="" width="100px" src="{{ $book->image }}" alt="luqmanee Al Hakiim BOOK {{ $book->title }}">
                                </div>
                                <div class="media-body text-dark">
                                    <div>
                                        <span class="media-heading"> <h6>{{ $book->title }}</h6></span>
                                    </div>
                                    <div>
                                        <small class="muted">by</small> : <strong>{{ $book->auteur }}</strong>
                                    </div>
                                    <small class="muted"> P. {{ Date('Y',strtotime($book->dateOut)) }}</small>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('user.library') }}" class="btn btn-danger btn-sm">Show more +</a>
                        </div>
                    </div>
                </div>
            </div>

            <-- Carousel galery --/>
            <div class="row">
                <div class="col-12">
                    <section class="opaqued light-opaqued parallax">
                        <div class="section-inner2">
                            <div class="container">
                                <div class="row"><h3 class="text-dark text-center">luqmane Al Hakiim en images</h3></div>
                                <div class="row">
                                    @if (isset($galeries) && $galeries->count() > 0)
                                    <div class="col-12">
                                        <ul class="owl-carousel-paged testimonial-owl wow fadeIn list-unstyled" data-items="4" data-items-desktop="[1200,4]" data-items-desktop-small="[980,4]" data-items-tablet="[768,3]" data-items-mobile="[479,2]">
                                            @foreach ($galeries as $galery)
                                            <li>
                                                <img src="{{ $galery->image }}" class="img-responsive" alt="luqmane Al Hakiim SN IMAGE">
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div>
                                        <div class="text-center">
                                            <p><small>left to right or right to left</small></p>
                                            <a href="{{ route('user.library') }}" class="btn btn-primary p-3 mt-3 mb-5">See more +</a>
                                        </div>
                                    </div>
                                    @else
                                    <p class="text-center text-dark">Aucune image de la galerie pour le moment...</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <-- /end Carousel galery --/>
        </div>
    </div>
</section>
--}}
{{-- END Old Program section --}}




{{-- Testimonial Section --}}
<div class="bg-white text-center pt-5 pb-5">
    <div class="container pt-3">
        <h3>Testimonials</h3>
        @if (isset($attests) && $attests->count() > 0)
        <div class="row text-dark">
            @foreach ($attests as $attest)
            <div class="col-sm-4 col-md-3 col-xs-6 p-3">
                <div class="testi">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title pt-3 pb-3">
                                <h5 style="display:inline" class="header">{{ $attest->author }}</h5>
                            </div>
                            <div class="card-text text-muted">{!! $attest->attest !!}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row text-center text white">
            <a href="{{ route('user.attest') }}" class="btn btn-primary btn-bg-primary p-3 mt-3 mb-2" style="border-radius: 10px;">See more +</a>
        </div>
        @else
        <p class="text-dark">Pas de temoignage poure le moment...</p>
        @endif
    </div>
</div>
{{-- END Testimonial Section --}}

{{-- Document Section --}}
<div class="bg-dark text-white pt-5 pb-5">
    <div class="container">
        <h3 class="text-center">Utils documents</h3>
        @if (isset($docs) && $docs->count() > 0)
        <div class="row pt-5 pb-5 text-white text-bold">
            @foreach ($docs as $doc)
            <div class=" col-sm-6 col-xl-6 text-white p-3">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <span style="font-size: 20px;font-weight:bold">{{ $doc->name }}</span>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <a href="{{ asset($doc->url) }}" class="document">Download <i class="fas fa-download"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $docs->links() }}
        @else
        <p class="text-center">Aucun document pour le moment</p>
        @endif
    </div>
</div>
{{-- End Doc Section --}}

{{-- Followors --}}
<div class="followers bg-primary">
    <div class="container">
        <div class="row row-follow mb-0">
            <div class="col-md-6 mb-0">
                <div class="text-center">
                    <h2>Subscriber on newsLetter</h2>
                    <p>Subscribe to receive news from the institute</p>
                </div>
            </div>
            <div class=" col-md-6 text-center">
                <form action="{{ route('user.networks.store') }}" method="post" id="form-network" style="display:flex;">
                    @csrf
                    <div class="text-center input-group" style="width:100%;display:flex;">
                        <input type="text" name="email" class="form-control text-center @error('email') is-invalid @enderror" style="color:black" id="validationCustomUsername" placeholder="Your email" aria-describedby="inputGroupPrepend" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="input-group-prepend border-0" style="display:inline-block;float:left">
                            <a href="{{ route('user.networks.store') }}" onclick="event.preventDefault();document.getElementById('form-network').submit();" class="btn btn-danger bg-danger ml-1" style="height:40px;">
                                <span class="bg-danger border-0"><i class="fas fa-paper-plane" style="font-size:20px;color:white;"></i></span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end Followers --}}

{{-- Modal Alert --}}
@if($modalWelcome->is_active === 1)
<div class="modal fade" id="newsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Welcome to Daara luqmane Al Hakiim</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <div class="mt-auto mr-auto mb-3 text-center">
                        <img src="{{ asset('images/logo.png') }}" width="100px" alt="Daara luqmane Al Hakiim">
                    </div>
                </div>
                <h3 class="text-center ">{{ $modalWelcome->title }}</h3>
                {!! $modalWelcome->content !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif
{{-- End Modal Alert --}}
@endsection

@section('js')

@if($modalWelcome->is_active === 1)
<script>
    $(window).on('load',function(){
        $('#newsModal').modal('show');
    });
</script>
@endif

<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    }
</script>
@endsection
