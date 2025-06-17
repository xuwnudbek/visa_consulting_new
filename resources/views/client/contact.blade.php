@extends('layouts.client')

@section('content')
    <!-- Page Header Start -->
    <div class="page-header bg-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">@lang('messages.contact_section_title')</h1>
                        <nav class="wow fadeInUp" data-wow-delay="0.25s">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./">home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@lang('messages.contact_section_title')</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Page Contact Us Start -->
    <div class="page-contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <!-- Contact Info Item Start -->
                    <div class="contact-info-item wow fadeInUp">
                        <div class="icon-box">
                            <img src="/client/images/icon-phone.svg" alt="">
                        </div>
                        <div class="contact-info-content">
                            <h3>@lang('messages.contact_section_phone_label')</h3>
                            <p>@lang('messages.contact_section_phone_1')</p>
                            <p>@lang('messages.contact_section_phone_2')</p>
                        </div>
                    </div>
                    <!-- Contact Info Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Contact Info Item Start -->
                    <div class="contact-info-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="icon-box">
                            <img src="/client/images/icon-mail.svg" alt="">
                        </div>
                        <div class="contact-info-content">
                            <h3>@lang('messages.contact_section_email_label')</h3>
                            <p>@lang('messages.contact_section_email_1')</p>
                            <p>@lang('messages.contact_section_email_2')</p>
                        </div>
                    </div>
                    <!-- Contact Info Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Contact Info Item Start -->
                    <div class="contact-info-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="icon-box">
                            <img src="{{ asset('client/images/icon-location.svg') }}" alt="">
                        </div>
                        <div class="contact-info-content">
                            <h3>@lang('messages.contact_section_address_label')</h3>
                            <p>@lang('messages.contact_section_address')</p>
                        </div>
                    </div>
                    <!-- Contact Info Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Contact Info Item Start -->
                    <div class="contact-info-item wow fadeInUp" data-wow-delay="0.6s">
                        <div class="icon-box">
                            <img src="/client/images/icon-watch.svg" alt="">
                        </div>
                        <div class="contact-info-content">
                            <h3>@lang('messages.contact_section_time_label')</h3>
                            <p>@lang('messages.contact_section_time_1')</p>
                            <p>@lang('messages.contact_section_time_2')</p>
                        </div>
                    </div>
                    <!-- Contact Info Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Contact Us End -->

    <!-- Contact Form Section Start -->
    <div class="contact-form-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Content Form Content Start -->
                    <div class="contact-form-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">@lang('messages.contact_form_title')</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">@lang('messages.contact_form_subtitle')</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">@lang('messages.contact_form_description')</p>
                        </div>
                        <!-- Section Title End -->
                    </div>
                    <!-- Content Form Content End -->
                </div>

                <div class="col-lg-6">
                    <!-- Contact Form Start -->
                    <div class="contact-form">
                        <form id="contactForm" action="#" method="POST" data-toggle="validator" class="wow fadeInUp"
                            data-wow-delay="0.4s">
                            <div class="row">
                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="@lang('messages.contact_form_name_placeholder')" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="@lang('messages.contact_form_email_placeholder')" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="phone" class="form-control" id="phone"
                                        placeholder="@lang('messages.contact_form_phone_placeholder')" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-5">
                                    <textarea name="message" class="form-control" id="message" rows="4" placeholder="@lang('messages.contact_form_message_placeholder')"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn-default">@lang('messages.contact_form_submit')</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form Start -->
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form Section End -->

    <!-- Google Map Start -->
    <div class="google-map">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Google Map Start -->
                    <div class="google-map-iframe">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96737.10562045308!2d-74.08535042841811!3d40.739265258395164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1703158537552!5m2!1sen!2sin"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <!-- Google Map End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Google Map End -->
@endsection
