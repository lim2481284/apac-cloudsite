<aside class="mobile-slidepane">
    <div class="slidepane-header">
        <img src="/img/logo/logo.png" />
        <a class="fg-white sub-action mobile-slidepane-close">
            <i class="icon" data-feather="x"></i>
        </a>
    </div>
    <div class="slidepane-body">
        <div class="slidepane-profile">
            <h5>{{translate('slidepane_hi','Hi User')}}</h5>
            <div class="slidepane-personal-info">
            <a href='/account/credit/topup' class='mobile-hide'>
                <img src='/img/icon/coin.png' />
                <span>{{getMerchantCredit()}}</span>
            </a>
            @php($notification = \App\Models\Notification::systemNotification('get'))
            <button
                class='btn btn-link mobile-notification {{($notification->count()>0)?"bell-shake-animation":""}}'
                id="topNotification"><img src='/img/icon/notification.png' />
                <span>{{$notification->count()>99?99:$notification->count()}}</span></button>
            </div>
        </div>
        <div class="slidepane-lang-menu">
            <span class="slidepane-menu-title">{{translate('slide_language','Language')}}</span>
            {{ Form::select('def_lang', getSupportedLocalesNative(), LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale() , null, [], true) , ['class' => 'form-control language-select']) }}
        </div>
        <div class="slidepane-hr"></div>
        <div class="slidepane-menu">
            <span class="slidepane-menu-title">Main Items</span>
            <div class="slidepane-menu-items">
                <a class="{{isNavActive(['account.index'])?'active':''}}" href="/account">
                    <i class="far fa-user-circle"></i>
                    {{translate('account','Account')}}
                </a>
                <a class="{{isNavActive(['credit.*'])?'active':''}}" href="/account/credit">
                     <i class="far fa-credit-card"></i>
                    {{translate('my_credit','My Credit')}}
                </a>
                <a class="feedback-btn-mobile" href="#feedback" data-toggle="modal" data-target="#feedbackModal">
                    <i class="far fa-comment-dots"></i>
                    {{translate('feedback','Feedback')}}
                </a>
                <a class="{{isNavActive(['help.*'])?'active':''}}" href="/system/help">
                    <i class="far fa-question-circle"></i>
                    {{translate('help','Help')}}
                </a>
                <a href="/logout">
                    <i class="ti ti-control-skip-backward"></i>
                    {{translate('logout','Logout')}}
                </a>
            </div>
        </div>
    </div>
</aside>

<!-- Notification Box -->
<div class="top-notification-wrap mobile-mode">
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
<div class='profile-overlay mobile'></div>