<section id='topNav'>
    <div class='topnav-section'>
        <div class='top-title-section'>
            <span class="topnav-title">Hi, {{strlen(Auth::user()->name) > 25 ? substr(Auth::user()->name,0,25)."..." : Auth::user()->name}} </span>
        </div>

        <div class='topnav-button'>
            <div class='top-notification-section'>

                <div id="change-lang-bar" class="tour-db top-nav-lang" data-element data-index='2' data-intro="{{translate('tour_topnav_lang_switcher')}}">
                    {{ Form::select('def_lang', getSupportedLocalesNative(), LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale() , null, [], true) , ['class' => 'form-control language-select']) }}
                </div>

                @php($notification = \App\Models\Notification::systemNotification('get'))

                <a href='/account/credit' class='mobile-hide'><button class='btn btn-link tour-db point-icon' id="pointIcon" data-element data-index='3' data-intro="{{translate('tour_topnav_credit_operation')}}"><span>{{getMerchantCredit()}}</span><img src='/img/icon/coin.png' /></button></a>

                <button class='btn btn-link {{($notification->count()>0)?"bell-shake-animation":""}}' id="topNotification"><img id="check-notification-bar" class="tour-db" data-element data-index='4'  data-intro="{{translate('tour_topnav_notification_list')}}" src='/img/icon/notification.png' /> <span>{{$notification->count()>99?99:$notification->count()}}</span></button>

                <!-- Notification Box -->
                <div class="top-notification-wrap">
                    <div class="top-notification popup-ani">
                        <div class='notification-content-box'>
                            <h1>{{translate('notification','Notification')}}.</h1>
                            <p>{{translate('you_have','You have')}} {{$notification->count()}}
                                {{translate('unread_notification','unread notification')}} </p>
                            <button type="button" class="btn close-notification-btn mobile-show" data-dismiss="modal"><i
                                    class='ti-close'></i></button>
                            <div class='notification-list'>
                                @php($loopCount = 0)
                                @foreach($notification as $item)
                                @if($loopCount < 5 ) <a data-href='{{($item->getMeta("url"))??"/social/notification"}}'
                                    class='unread-notification' data-uid="{{$item->uid}}">
                                    <div class='notification-item'>
                                        <div class='background-image-section'
                                            style="background: url('{{($item->getMeta("icon"))??"/img/icon/info.png"}}')">
                                        </div>
                                        <div class='notification-content'>
                                            <h1>{{$item->title}}</h1>
                                            <p>{{$item->description}}</p>
                                        </div>
                                    </div>
                                    </a>
                                    @php($loopCount++)
                                    @endif
                                    @endforeach
                            </div>
                            <div class='notification-footer'>
                                <a href='/account/notification'><button class='btn btn-primary-light rounded'>
                                        {{translate('view_all','View All')}} </button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='top-notification-overlay'></div>

                <!-- Profile Icon -->
                <button class='btn btn-link' id="topProfileIcon">
                    <img id="check-profile-bar" class="tour-db" data-element data-index='5'
            data-intro="{{translate('tour_topnav_profile_dropdown')}}" src='/img/icon/profile.png' />
                </button>
                <div class='topnav-profile'>
                    <div class='profile-topsection'>
                    </div>
                    <div class='profile-item'>
                        <a href='/account'>
                            <i class='ti ti-user'></i>
                            {{translate('my_account','My Account')}}
                        </a>
                        <a href='/account/credit'>
                            <i class='ti ti-money'></i>
                            {{translate('my_credit','My Credit')}}
                        </a>
                        <a href='#feedback' class='feedback-btn mobile' data-toggle="modal" data-target="#feedbackModal">
                            <i class='ti ti-face-smile'></i>
                            {{translate('feedback','Feedback')}}
                        </a>
                        <a href='https://partner.cloudsite.com.my'>
                            <i class='ti ti-game'></i>
                            {{translate('partership_','Partnership')}}
                        </a>
                        <a href='/help'>
                            <i class='ti ti-help-alt'></i>
                            {{translate('help','Help')}}
                        </a>
                        <a href='/logout'>
                            <i class='ti ti-control-skip-backward'></i>
                            {{translate('logout','Logout')}}
                        </a>
                    </div>
                </div>
                <div class='profile-overlay'></div>
            </div>
        </div>
    </div>
</section>