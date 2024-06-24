@php
    $case_study=App\Models\Page::findOrFail(29);
@endphp
@if ($case_study)
    <section class="hm_ltst_updts">
        <div class="container">
            <div class="row   justify-content-center">
                <div class="col-md-12">
                    <div class="head text-center">
                        <span>{{ $case_study->title }}</span>
                        <h2>{{ $case_study->name }}</h2>
                        <p>{{ $case_study->brief_description }}</p>
                    </div>
                </div>
                @foreach (App\Models\CaseStudy::take(3)->latest()->get() as $study)
                <div class="col-lg-4 col-md-6">
                    <div class="updts">
                        <div class="updts_imag"><a href="#"><img src="{{asset($study->thumbnail_img)}}" alt="{{ $study->title }}"></a></div>
                        <div class="updts_txt">
                            <h2><a href="#">{{ $study->brief_description }}</a></h2>
                            {{ $study->description }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
