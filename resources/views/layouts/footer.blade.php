<footer>
    <div class="footer-container flex flex-col md:flex-row max-w-[90%] lg:max-w-[80%] mx-auto gap-y-8">
        <div class="logo flex flex-col align-center gap-y-6 justify-between">
            <a href="{{ route('welcome') }}" class="flex gap-2">
                <x-application-logo class="block fill-current" />
            </a>
            <div class="hidden md:flex justify-center gap-4 social-icons">
                <a href="https://wa.me/34622406965" class="h-10 w-10 aspect-square rounded-md bg-black/5 p-2 ring-1 ring-black/10" target="_blank">
                    <i class="flex text-2xl leading-none fi fi-brands-whatsapp"></i>
                </a>
                <a href="https://www.instagram.com/puntosurfuengirola/?hl=es" class="h-10 w-10 aspect-square rounded-md bg-black/5 p-2 ring-1 ring-black/10" target="_blank">
                    <i class="flex text-2xl leading-none fi fi-brands-instagram"></i>
                </a>
                <a href="https://maps.app.goo.gl/22GUnZ2foJeEYud98" class="h-10 w-10 aspect-square rounded-md bg-black/5 p-2 ring-1 ring-black/10" target="_blank">
                    <i class="flex text-2xl leading-none fi fi-rs-map-marker"></i>
                </a>
            </div>
        </div>
        <div class="flex flex-col text-center sm:flex-row gap-y-8 sm:flex-row sm:justify-between md:text-left md:gap-8 lg:gap-16 footer-menu">
            <div>
                <h4>{{ __('My account') }}</h4>
                <ul>
                    <li>
                        <a href="{{ route('register') }}">
                            {{ __('Login') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">
                            {{ __('Register now') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <h4>{{ __('The company') }}</h4>
                <ul>
                    <li><a href="#">{{ __('About us') }}</a></li>
                    <li><a href="#">{{ __('Work with us') }}</a></li>
                    <li><a href="#">{{ __('Terms & conditions') }}</a></li>
                    <li><a href="#">{{ __('Privacy policy') }}</a></li>
                </ul>
            </div>
            <div>
                <h4>{{ __('Help') }}</h4>
                <ul>
                    <li><a href="#">{{ __('Support') }}</a></li>
                    <li><a href="#">{{ __('Faq') }}</a></li>
                    <li><a href="#">{{ __('Contact us') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="md:hidden flex justify-center gap-6 social-icons">
            <a href="https://wa.me/34622406965" class="h-10 w-10 aspect-square rounded-md bg-black/5 p-2 ring-1 ring-black/10" target="_blank">
                <i class="flex text-2xl leading-none fi fi-brands-whatsapp"></i>
            </a>
            <a href="https://www.instagram.com/puntosurfuengirola/?hl=es" class="h-10 w-10 aspect-square rounded-md bg-black/5 p-2 ring-1 ring-black/10" target="_blank">
                <i class="flex text-2xl leading-none fi fi-brands-instagram"></i>
            </a>
            <a href="https://maps.app.goo.gl/22GUnZ2foJeEYud98" class="h-10 w-10 aspect-square rounded-md bg-black/5 p-2 ring-1 ring-black/10" target="_blank">
                <i class="flex text-2xl leading-none fi fi-rs-map-marker"></i>
            </a>
        </div>
    </div>
    <hr class="h-px border-t-0 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent opacity-50 dark:opacity-100" />
    <div class="post-footer max-w-[90%] lg:max-w-[80%] ">
        <span>{{__('Site design and developed by')}}<a href="https://nicolasgelabert.com.ar"> Nicolás Gelabert</a></span>
        <ul class="flex gap-x-4">
            @foreach (Config::get('languages') as $lang => $language)
                @if ($lang != App::getLocale())
                    <li>
                        <a class="flex items-center gap-x-1 opacity-50" href="{{ route('lang.switch', $lang) }}">
                            <span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span>
                            <span>{{$language['display']}}</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a class="flex items-center gap-x-1" href="{{ route('lang.switch', $lang) }}">
                            <span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span>
                            <span>{{$language['display']}}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</footer>