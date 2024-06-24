@php
    $cleint=App\Models\Page::findOrFail(30);
@endphp
@if ($cleint)
    <section class="hm_clnts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="head text-center">
                        <span>{{ $cleint->title }}</span>
                        <h2>{{ $cleint->name }}</h2>
                        <p>{{ $cleint->brief_description }}</p>
                    </div>
                    <div class="hm_clnt owl-carousel owl-theme">
                        @foreach (App\Models\Client::get() as $client)
                            <div class="item"><img src="{{asset($client->logo)}}" alt="{{ $client->title }}"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
