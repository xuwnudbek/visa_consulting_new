<!-- Our Testimonial Section Start -->
<div class="our-testimonial" id="posts">
    <div class="container">
        <div class="row section-row align-items-center">
            <div class="col-lg-6">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">@lang('messages.blog_section_title')</h3>
                    <h2 class="text-anime-style-3" data-cursor="-opaque">@lang('messages.blog_section_subtitle')</h2>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="col-lg-6">
                <!-- Section Title Content Start -->
                <div class="section-title-content wow fadeInUp" data-wow-delay="0.2s">
                    <p>@lang('messages.blog_section_paragraph')</p>
                </div>
                <!-- Section Title Content End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Testimonial Slider Start -->
                <div class="testimonial-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper" data-cursor-text="Drag">
                            @foreach ($fields as $field)
                                <!-- Testimonial Slide Start -->
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-header">
                                            <div class="mb-4">
                                                <figure class="image-anime">
                                                    <img src="{{ asset('storage/' . $field->image) }}" alt="{{ $field->title }}" class="img-fluid">
                                                </figure>
                                            </div>
                                            <div class="author-content">
                                                <h3>{{ $field->title }}</h3>
                                                <p>{{ __('messages.salary') }}: {{ number_format($field->amount) }}$</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-body">
                                            <p>{{ $field->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Testimonial Slide End -->
                            @endforeach

                        </div>
                        <div class="testimonial-pagination"></div>
                    </div>
                </div>
                <!-- Testimonial Slider End -->
            </div>
        </div>
    </div>
</div>
<!-- Our Testimonial Section End -->
