@extends('layouts.user.app', ['title' => $program->libele])

<!-- Header -->
@section('text-header')
<section class="dark-wrapper opaqued parallax" data-parallax="scroll" data-image-src="{{asset($program->image)}}" data-speed="0.7">
    <div class="section-inner pad-top-200">
        <div class="container vertical-center">
            <div class="intro-text vertical-center text-center smoothie">
                <div class="intro-heading wow fadeIn heading-font" data-wow-delay="0.2s"><h2> {{$program->libele}}</h2></div>
                <div class="intro-sub-heading wow fadeIn secondary-font" data-wow-delay="0.4s">
                    <span class="rotate">
                        Memorisation du Saint Coran,
                        Alphabétisation,
                        Franco-islamique
                    </span>
                </div>
                <a href="{{ route('user.admission') }}" class="btn btn-primary mt-5"><h4>Admission</h4></a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row text-dark">
                        <div class="col-m-8">
                            <img
                            src="{{ asset($program->image) }}"
                            class="img-responsive img-circle"
                            style="bg-white: max-width:100px"
                            alt="logo program {{$program->image}}"/>
                        </div>
                        <div class="col-md-8">
                            <h3>{{ $program->libele }}</h3>
                            {{-- <p>{!! $filiere->describe !!}</p> --}}
                        </div>
        </div>
    </div>
</section>
{{--
<section>
    <div class="container">
        <div class="row text-dark">
            <div>
                <div class="pl-5 pr-5" style="border-left: none;">

                    <div><h3>Course Learning Details</h3></div>
                    <div>{!! $filiere->outCome !!}</div>
                    <hr>

                    <div><h3>Course Duration</h3></div>
                    <div>{!! $filiere->duration !!}</div>
                    <hr>

                    <div><h3>Admission Requirements and mode of assessments</h3></div>
                    <div>{!! $filiere->requirement !!}</div>
                    <hr>

                    <div><h3>Modules</h3></div>
                    <div>
                        <p>Modules that has been included</p>
                            @if ($filiere->modules != null)
                                <div class="row">
                                    @foreach ($filiere->modules as $module)
                                        <div class="col-sm-6 col-xs-12 col-md-4 my-1">
                                            <button class="btn-sm btn-outline-danger text-bold" disabled>{{ $module->libele }}</button>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>Aucun module pour ce filiere...</p>
                            @endif
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</section>
@if (isset($filiere->specialites) && $filiere->specialites->count() > 0)
    <div class="row bg-primary">
        <div class="container">
            <h2 class="text-center">Specialization</h2>
            @foreach ($filiere->specialites as $specialite)
            <diV class="card mb-4 text-center text-dark col-sm-2 col-xs-2 col-md-2 col-lg-2">
                <h4 class="card-body">{{ $specialite->libele }}</h4>
            </diV>
            @endforeach
        </div>
    </div>
@endif
 --}}
@endsection
