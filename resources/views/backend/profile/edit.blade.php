@extends('backend.layout')

@section('title')
    <title>{{ config('blog.title') }} | Edit Profile</title>
@stop

@section('content')
    <section id="main">
        @include('backend.partials.sidebar-navigation')
        <section id="content">
            <div class="container container-alt">

                <div class="block-header">
                    <h2>{{ Auth::user()->display_name }}
                        <small>{{ Auth::user()->job }}, {{ Auth::user()->city }}, {{ Auth::user()->state }}</small>
                    </h2>
                </div>

                <div class="card" id="profile-main">
                    <div class="pm-overview c-overflow">

                        <div class="pmo-pic">
                            <div class="p-relative">

                                <img class="img-responsive" src="//www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}?d=identicon&s=500">

                                <div class="dropdown pmop-message">
                                    <a href="mailto:{{ Auth::user()->email }}" target="_blank" class="btn bgm-white btn-float z-depth-1">
                                        <i class="zmdi zmdi-email"></i>
                                    </a>
                                </div>
                            </div>


                            <div class="pmo-stat">
                                <h2 class="m-0 c-white">{{ Auth::user()->first_name }}</h2>
                                Member since {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', Auth::user()->created_at)->format('M d, Y') }}
                            </div>
                        </div>

                        <div class="pmo-block pmo-contact hidden-xs">
                            <h2>Contact</h2>

                            <ul>
                                <li><i class="zmdi zmdi-phone"></i> {{ Auth::user()->phone }}</li>
                                <li><i class="zmdi zmdi-email"></i> {{ Auth::user()->email }}</li>
                                <li><i class="zmdi zmdi-facebook-box"></i> facebook.com/{{ config('blog.facebook') }} </li>
                                <li><i class="zmdi zmdi-twitter"></i> {{ '@' . config('blog.twitter') }}</li>
                                <li>
                                    <i class="zmdi zmdi-pin"></i>
                                    <address class="m-b-0 ng-binding">
                                        {{ Auth::user()->address }},<br>
                                        {{ Auth::user()->city }},<br>
                                        {{ Auth::user()->state }}
                                    </address>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="pm-body clearfix">
                        <ul class="tab-nav tn-justified">
                            <li><a href="/admin/profile">Profile</a></li>
                            <li class="active"><a href="/admin/profile/{{ Auth::user()->id }}/edit">Settings</a></li>
                        </ul>


                        <div class="pmb-block">
                            <div class="pmbb-header">
                                <h2><i class="zmdi zmdi-equalizer m-r-10"></i> Summary</h2>

                                <ul class="actions">
                                    <li class="dropdown">
                                        <a href="" data-toggle="dropdown">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a data-ma-action="profile-edit" href="">Edit</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="pmbb-body p-l-30">
                                <div class="pmbb-view">
                                    Sed eu est vulputate, fringilla ligula ac, maximus arcu. Donec sed felis vel
                                    magna mattis ornare ut non turpis. Sed id arcu elit. Sed nec sagittis tortor.
                                    Mauris ante urna, ornare sit amet mollis eu, aliquet ac ligula. Nullam dolor
                                    metus, suscipit ac imperdiet nec, consectetur sed ex. Sed cursus porttitor leo.
                                </div>

                                <div class="pmbb-edit">
                                    <div class="fg-line">
                                        <textarea class="form-control" rows="5" placeholder="Summary...">Sed eu est vulputate, fringilla ligula ac, maximus arcu. Donec sed felis vel magna mattis ornare ut non turpis. Sed id arcu elit. Sed nec sagittis tortor. Mauris ante urna, ornare sit amet mollis eu, aliquet ac ligula. Nullam dolor metus, suscipit ac imperdiet nec, consectetur sed ex. Sed cursus porttitor leo.</textarea>
                                    </div>
                                    <div class="m-t-10">
                                        <button class="btn btn-primary btn-sm">Save</button>
                                        <button data-ma-action="profile-edit-cancel" class="btn btn-link btn-sm">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pmb-block">
                            <div class="pmbb-header">
                                <h2><i class="zmdi zmdi-account m-r-10"></i> Basic Information</h2>

                                <ul class="actions">
                                    <li class="dropdown">
                                        <a href="" data-toggle="dropdown">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a data-ma-action="profile-edit" href="">Edit</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="pmbb-body p-l-30">
                                <div class="pmbb-view">
                                    <dl class="dl-horizontal">
                                        <dt>Full Name</dt>
                                        <dd>{{ Auth::user()->first_name . Auth::user()->last_name}}</dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Gender</dt>
                                        <dd>Female</dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Birthday</dt>
                                        <dd>June 23, 1990</dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Martial Status</dt>
                                        <dd>Single</dd>
                                    </dl>
                                </div>

                                <div class="pmbb-edit">
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">Full Name</dt>
                                        <dd>
                                            <div class="fg-line">
                                                <input type="text" class="form-control"
                                                       placeholder="eg. Mallinda Hollaway">
                                            </div>

                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">Gender</dt>
                                        <dd>
                                            <div class="fg-line">
                                                <select class="form-control">
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">Birthday</dt>
                                        <dd>
                                            <div class="dtp-container dropdown fg-line">
                                                <input type='text' class="form-control date-picker"
                                                       data-toggle="dropdown" placeholder="Click here...">
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">Martial Status</dt>
                                        <dd>
                                            <div class="fg-line">
                                                <select class="form-control">
                                                    <option>Single</option>
                                                    <option>Married</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                        </dd>
                                    </dl>

                                    <div class="m-t-30">
                                        <button class="btn btn-primary btn-sm">Save</button>
                                        <button data-ma-action="profile-edit-cancel" class="btn btn-link btn-sm">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pmb-block">
                            <div class="pmbb-header">
                                <h2><i class="zmdi zmdi-phone m-r-10"></i> Contact Information</h2>

                                <ul class="actions">
                                    <li class="dropdown">
                                        <a href="" data-toggle="dropdown">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a data-ma-action="profile-edit" href="">Edit</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="pmbb-body p-l-30">
                                <div class="pmbb-view">
                                    <dl class="dl-horizontal">
                                        <dt>Mobile Phone</dt>
                                        <dd>00971 12345678 9</dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Email Address</dt>
                                        <dd>malinda.h@gmail.com</dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Twitter</dt>
                                        <dd>@malinda</dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Skype</dt>
                                        <dd>malinda.hollaway</dd>
                                    </dl>
                                </div>

                                <div class="pmbb-edit">
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">Mobile Phone</dt>
                                        <dd>
                                            <div class="fg-line">
                                                <input type="text" class="form-control"
                                                       placeholder="eg. 00971 12345678 9">
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">Email Address</dt>
                                        <dd>
                                            <div class="fg-line">
                                                <input type="email" class="form-control"
                                                       placeholder="eg. malinda.h@gmail.com">
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">Twitter</dt>
                                        <dd>
                                            <div class="fg-line">
                                                <input type="text" class="form-control" placeholder="eg. @malinda">
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">Skype</dt>
                                        <dd>
                                            <div class="fg-line">
                                                <input type="text" class="form-control"
                                                       placeholder="eg. malinda.hollaway">
                                            </div>
                                        </dd>
                                    </dl>

                                    <div class="m-t-30">
                                        <button class="btn btn-primary btn-sm">Save</button>
                                        <button data-ma-action="profile-edit-cancel" class="btn btn-link btn-sm">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@stop
