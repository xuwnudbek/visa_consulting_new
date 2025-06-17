@extends('layouts.client')

@section('content')
    <!-- Login Form Section Start -->
    <div class="contact-form-section my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center mb-5">
                        <h2 class="text-anime-style-3" data-cursor="-opaque">@lang('messages.login_title')</h2>
                    </div>
                    <!-- Login Form Start -->
                    <div class="contact-form">
                        <form action="{{ route('login.submit') }}" method="POST" data-wow-delay="0.4s"> {{-- class="wow fadeInUp" --}}
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="email" class="form-control" id="email" placeholder="@lang('messages.contact_form_email_placeholder')" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4 position-relative">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="@lang('messages.login_form_password_placeholder')" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn-default">@lang('messages.login_submit')</button>
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

    @if ($errors->has('email'))
        <div class="row">
            <div class="col-lg-4 mx-auto alert alert-danger " role="alert">
                {{ $errors->first('email') }}
            </div>
        </div>

        <script>
            setTimeout(function() {
                document.querySelector('.alert').style.display = 'none';
            }, 3000);
        </script>
    @endif
@endsection
