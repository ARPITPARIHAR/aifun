

    <section class="hm_clnts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @php
                        $client=App\Models\Page::findOrFail(30);
                    @endphp
                    @if ($client)
                    <div class="head text-center">
                        <span>{{ $client->title }}</span>
                        <h2>{{ $client->name }}</h2>
                        <p>{{ $client->brief_description }}</p>
                    </div>
                    @endif
                    <div class="hm_clnt owl-carousel owl-theme">
                        @foreach (App\Models\Client::where('featured',1)->orderBy('name')->get() as $client)
                            <div class="item">
                                <a href="{{ $client->url ?? '#'}}?website=gogralegal.com" target="_blank" rel="noopener noreferrer">
                                    <img src="{{asset($client->logo)}}" alt="{{ $client->title }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

