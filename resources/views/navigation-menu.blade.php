<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/nav.css')}}">
    <title>โรงพยาบาลมหาวิทยาลัยขอนแก่น (nav)</title>

    <style>
        a:hover {
            text-decoration: none !important;
        }

        .justify-between {
            display: flex;
            justify-content: space-between !important;
        }

        .mr {
            margin-right: 2em;
        }

        .pb-1:active {
            border: none;
        }
    </style>
</head>

<body>
    <nav x-data="{ open: false }" class="border-b border-gray-100" style="background-color:rgb(0, 76, 152); border: 1px solid rgb(0, 76, 152);">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex justify-between">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <!-- <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                        </a> -->
                        @auth
                        <h1 class="link_header_text"><a class="link_header" href="{{route('dashboard')}}">KKU Hospital</a></h1>
                        @else
                        <h1 class="link_header_text"><a class="link_header" href="{{route('home')}}">KKU Hospital</a></h1>
                        @endauth
                    </div>

                </div>

                <div class="hidden sm:flex sm:items-center  sm:ml-6">
                    <!-- Navigation Links -->
                    <div class="flex justify-center">
                        <div class="hidden space-x-8 sm:-my-px mr sm:flex">
                            <x-jet-nav-link class="pb-1" href="{{ route('advertise') }}" :active="request()->routeIs('advertise')">
                                {{ __('ประชาสัมพันธ์') }}
                            </x-jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px mr sm:flex">
                            <x-jet-nav-link class="pb-1" href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                                {{ __('ติดต่อเรา') }}
                            </x-jet-nav-link>
                        </div>
                        @auth
                        @else
                        <div class="hidden space-x-8 sm:-my-px mr sm:flex">
                            <x-jet-nav-link class="pb-1" href="{{ route('login') }}" :active="request()->routeIs('login')">
                                {{ __('Log in') }}
                            </x-jet-nav-link>
                        </div>
                        @endauth
                    </div>

                    <!-- Settings Dropdown -->
                    @auth
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                                @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->username }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                                @endif

                            </x-slot>


                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('จัดการบัญชีผู้ใช้') }}
                                </div>

                                @if(Auth::user()->usertype=="patient")
                                <!-- <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                            {{ __('บัญชีผู้ใช้') }}
                                        </x-jet-dropdown-link> -->

                                <x-jet-dropdown-link href="{{ route('patientProfile') }}">
                                    {{ __('ข้อมูลส่วนตัว') }}
                                </x-jet-dropdown-link>

                                @elseif(Auth::user()->usertype=="doctor")


                                <x-jet-dropdown-link href="{{ route('doctorProfile') }}">
                                    {{ __('ข้อมูลส่วนตัว') }}
                                </x-jet-dropdown-link>


                                @endif

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('ออกจากระบบ') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    @endauth
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-jet-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @auth
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                    @endauth
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-jet-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-jet-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                    <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                        {{ __('Create New Team') }}
                    </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                    <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </nav>

</body>

</html>