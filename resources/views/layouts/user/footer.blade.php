<div class="footer bg-danger mb-0">
    <div class="container text-center pt-3">
        <div style="border-bottom: 2px seashell solid">
            <h2>Partenaires de confiance</h2>
            <div class="logo-partner mb-5 row">
                @if (isset($partners) && $partners->count() > 0)
                    @foreach ($partners as $partner)
                        <a href="{{ $partner->link }}" target="_blank"><img src="{{ asset($partner->logo) }}" class="m-2" width="100px" alt="" srcset=""></a>
                    @endforeach
                @else
                    <p>En négociation</p> 
                @endif
            </div>
        </div>
        <div class="row pb-3 pt-3 h-100">
            <div class="col-md-6 col-sm-6 ">
                <div class="mb-2 text-left my-auto">
                    @foreach (App\Helpers\LinkHelpers::getLink() as $link)
                        <a href="{{ $link->link }} " target="_blank" style="m-2"><i class="fab fa-{{ $link->slug }} m-2" style="font-size:30px;color:white;"></i></a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 col-sm-6 my-auto p-2">
                <p class="text-right my-auto">
                    &copy; Copyright <a href="{{ route('admin.welcome') }}" target="_blank" class="text-primary">{{ config('app.name', 'Laravel') }}</b> </a> 2020 - {{ Date('Y') }} | Developed by <a href="https://github.com/Cabral221" class="text-primary">Cabral221</a>
                </p>
            </div>
        </div>
    </div>
</div>