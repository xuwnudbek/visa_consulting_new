@extends('layouts.client')

@section('content')
    <!-- Page Team Single Start -->
    <div class="page-team-single">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <div class="page-single-form">
                        <h3>{{ ucfirst(__('messages.menu')) }}</h3>
                        <div class="row mb-2">
                            <a href="{{ route('client.dashboard.profile') }}" class="btn-default {{ request()->routeIs('client.dashboard.profile') ? 'bg-danger text-white' : '' }}">{{ ucfirst(__('messages.profile')) }}</a>
                        </div>
                        <div class="row">
                            <a href="{{ route('client.dashboard.applications') }}" class="btn-default {{ request()->routeIs('client.dashboard.applications') ? 'bg-danger text-white' : '' }}">{{ ucfirst(__('messages.applications')) }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 align-self-center">
                    @if (request()->routeIs('client.dashboard.profile'))
                        <div class="team-single-content">
                            <div class="team-single-entry">
                                <!-- Team Member Header Start -->
                                <div class="team-member-header">
                                    <!-- Section Title  -->
                                    <div class="section-title">
                                        <h2 class="text-anime-style-3" data-cursor="-opaque" style="perspective: 400px;">
                                            <div style="display: block; text-align: start; position: relative;" class="split-line">
                                                <div style="position:relative;display:inline-block;">
                                                    {{ __('messages.about_me') }}
                                                </div>
                                            </div>
                                        </h2>
                                        <p class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                            {{ __('messages.profile_note') }}
                                        </p>
                                    </div>
                                </div>
                                <!-- Team Member Header End -->

                                <!-- Team Member Body Start -->
                                <div class="team-member-body wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                    <!-- Team Member Box Start -->
                                    <div class="team-contact-box">
                                        <h3>@lang('messages.name')</h3>
                                        <p> {{ auth()->user()->name }}</p>
                                    </div>

                                    <!-- Team Member Box Start -->
                                    <div class="team-contact-box">
                                        <h3>@lang('messages.email')</h3>
                                        <p> {{ auth()->user()->email ?? __('messages.email_not_found') }}</p>
                                    </div>
                                    <!-- Team Member Box End -->

                                    <!-- Team Member Box Start -->
                                    <div class="team-contact-box">
                                        <h3>@lang('messages.phone')</h3>
                                        <p>{{ auth()->user()->phone ?? __('messages.phone_not_found') }}</p>
                                    </div>
                                    <!-- Team Member Box End -->

                                    <!-- Team Member Box Start -->
                                    <div class="team-contact-box">
                                        <h3>@lang('messages.birthday')</h3>
                                        <p>{{ auth()->user()->birthday ?? __('messages.birthday_not_found') }}</p>
                                    </div>
                                    <!-- Team Member Box End -->

                                    <!-- Team Member Box Start -->
                                    <div class="team-contact-box">
                                        <h3>@lang('messages.passport')</h3>
                                        <p>{{ auth()->user()->passport ?? __('messages.passport_not_found') }}</p>
                                    </div>
                                    <!-- Team Member Box End -->
                                </div>
                                <!-- Team Member Body End -->
                            </div>
                        </div>
                    @elseif(request()->routeIs('client.dashboard.applications'))
                        <div class="team-single-content">
                            @if ($applications->isEmpty())
                                {{-- No applications found --}}
                                <div class="team-single-entry card px-4 py-3">
                                    <div class="team-member-header">
                                        <div class="section-title">
                                            <h2 class="text-anime-style-3" data-cursor="-opaque" style="perspective: 400px;">
                                                <div style="display: block; text-align: start; position: relative;" class="split-line">
                                                    {{ __('messages.no_applications_found') }}
                                                </div>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="team-member-body wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                        <p>{{ __('messages.no_applications_description') }}</p>
                                    </div>
                                </div>
                            @else
                                @foreach ($applications as $application)
                                    <div class="team-single-entry card px-4 py-3">
                                        <!-- Team Member Header Start -->
                                        <div class="team-member-header">
                                            <!-- Section Title  -->
                                            <div class="section-title">
                                                <h2 class="text-anime-style-3" data-cursor="-opaque" style="perspective: 400px;">
                                                    <div style="display: block; text-align: start; position: relative;" class="split-line">
                                                        {{ __('messages.application') }} № {{ $application->id }}
                                                    </div>
                                                </h2>
                                            </div>
                                        </div>

                                        <!-- Team Member Header End -->
                                        <div class="team-member-body wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                            <!-- Team Member Box Start -->
                                            <div class="team-contact-box">
                                                <h3>@lang('messages.field_name')</h3>
                                                <p> {{ $application->field->title }}</p>
                                            </div>

                                            <div class="team-contact-box">
                                                <h3>@lang('messages.country')</h3>
                                                <p> {{ $application->country->name }}</p>
                                            </div>

                                            <div class="team-contact-box">
                                                <h3>@lang('messages.status')</h3>
                                                <p>{{ __('messages.' . $application->status) }}</p>
                                            </div>

                                            <div class="team-contact-box">
                                                <h3>@lang('messages.passport')</h3>
                                                <p>{{ auth()->user()->passport ?? __('messages.passport_not_found') }}</p>
                                            </div>

                                            @if ($application->status == 'approved' && $application->document)
                                                <div class="team-contact-box">
                                                    <h3>@lang('messages.document')</h3>
                                                    <p>
                                                        <a href="{{ asset('storage/' . $application->document) }}" target="_blank" class="">
                                                            {{ __('messages.download_document') }}
                                                        </a>
                                                    </p>
                                                </div>
                                                <div class="team-contact-box">
                                                    <h3>@lang('messages.comment')</h3>
                                                    <p>
                                                        {{ $application->comment ?? __('messages.no_comment') }}
                                                    </p>
                                                </div>
                                            @endif

                                        </div>

                                        <!-- Team Member Header Start -->
                                        <div>
                                            <!-- Section Title  -->
                                            <div class="section-title mb-0">
                                                <h4 class="text-anime-style-3" data-cursor="-opaque" style="perspective: 400px;">
                                                    <div style="display: block; text-align: start; position: relative;" class="split-line">
                                                        {{ __('messages.payments') }}
                                                    </div>
                                                </h4>

                                            </div>
                                            <hr />

                                            <table class="table  wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">{{ __('messages.amount') }}</th>
                                                        <th scope="col">{{ __('messages.status') }}</th>
                                                        <th scope="col">{{ __('messages.payment_date') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($application->payments as $payment)
                                                        <tr>
                                                            <th class="col-1">{{ $loop->iteration }}</th>
                                                            <td class="col-5">{{ number_format($payment->amount) }} sum</td>
                                                            <td class="col-2">{{ __('messages.' . $payment->payment_type) }}</td>
                                                            <td class="col-3">{{ $payment->created_at->format('Y-m-d H:i') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>

                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
    <!-- Page Team Single End -->
@endsection
