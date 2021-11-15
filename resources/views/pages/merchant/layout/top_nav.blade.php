<section id='topNav'>
    <div class='topnav-section'>
        <div class='top-title-section'>
            <span class="topnav-title">Hi, {{strlen(Auth::user()->name) > 25 ? substr(Auth::user()->name,0,25)."..." : Auth::user()->name}} </span>
        </div>

        <div class='topnav-button'>
            <div class='top-notification-section'>

                <div id="change-lang-bar" class="tour-db top-nav-lang" data-element data-index='2' data-intro="You can switch the system language here.">
                    {{ Form::select('def_lang', getSupportedLocalesNative(), LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale() , null, [], true) , ['class' => 'form-control language-select']) }}
                </div>

                <a href='/account/credit' class='mobile-hide'><button class='btn btn-link tour-db point-icon' id="pointIcon" data-element data-index='3' data-intro="This is the amount of Cloudsite merchant credit you have."><span>500</span><img src='/img/icon/coin.png' /></button></a>

                <button class='btn btn-link' id="topNotification"><img id="check-notification-bar" class="tour-db" data-element data-index='4'  data-intro="Click here to check your website notifications." src='/img/icon/notification.png' /> <span>0</span></button>

                <!-- Notification Box -->
                <div class="top-notification-wrap">
                    <div class="top-notification popup-ani">
                        <div class='notification-content-box'>
                            <h1>Notification.</h1>
                            <p>You have 0 unread notification </p>
                            <div class='notification-list'>
                            </div>
                            <div class='notification-footer'>
                                <a href='#' class='under-development view-notification' data-title="Dashboard Notification" data-desc="This function is to notify merchants of all important notifications in real time."><button class='btn btn-primary-light rounded'>
                                View All</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='top-notification-overlay'></div>

                <!-- Profile Icon -->
                <button class='btn btn-link' id="topProfileIcon">
                    <img id="check-profile-bar" class="tour-db" data-element data-index='5'
            data-intro="You can manage your profile or access to account settings here." src='/img/icon/profile.png' />
                </button>
                <div class='topnav-profile'>
                    <div class='profile-topsection'>
                    </div>
                    <div class='profile-item'>
                        <a href='#'  class='under-development' data-title='Account' data-desc='This feature allows merchants to set multi-factor authentication settings for security purposes, change account preferences and manage their account details'>
                            <i class='ti ti-user'></i>
                            My Account
                        </a>
                        <a href='/account/credit'>
                            <i class='ti ti-money'></i>
                            My Credit
                        </a>
                        <a href='#partner' class='under-development' data-title='Partnership' data-desc='This feature allows merchants to become part of the Cloudsite community. It acts like a "Master Merchant" inviting merchants, and can earn permanent commissions from the successful transactions of registered merchants.'>
                            <i class='ti ti-game'></i>
                            Partnership
                        </a>
                        <a href='#help' class='under-development' data-title='Help' data-desc='This feature will explain system functions to merchants and allow merchants to seek help for problems encountered '>
                            <i class='ti ti-help-alt'></i>
                            Help
                        </a>
                        <a href='/logout'>
                            <i class='ti ti-control-skip-backward'></i>
                            Logout
                        </a>
                    </div>
                </div>
                <div class='profile-overlay'></div>
            </div>
        </div>
    </div>
</section>