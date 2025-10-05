<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Subtle animated stethoscope emblem -->
        <div class="w-full flex justify-center mb-4">
            <div class="relative w-20 h-20">
                <!-- Gradient ring (slow rotate) -->
                <span class="absolute inset-0 rounded-full bg-[conic-gradient(at_50%_50%,#3b82f6,#06b6d4,#22c55e,#3b82f6)] opacity-80 animate-[spinSlow_12s_linear_infinite]"></span>
                <!-- Inner plate -->
                <div class="absolute inset-1 rounded-full bg-white shadow-2xl"></div>
                <!-- Stethoscope icon -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="absolute inset-0 m-auto w-14 h-14">
                    <g fill="none" stroke="#2563eb" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <!-- earpieces -->
                        <path d="M12 10v6c0 6 5 11 11 11s11-5 11-11v-6"/>
                        <path d="M12 10c0-2 1.5-3.5 3.5-3.5S19 8 19 10"/>
                        <path d="M34 10c0-2-1.5-3.5-3.5-3.5S27 8 27 10"/>
                        <!-- tube to chest piece -->
                        <path d="M23 27v7a6 6 0 0 0 12 0v-2"/>
                        <!-- chest piece -->
                        <circle cx="38" cy="32" r="4" fill="#ffffff"/>
                    </g>
                </svg>
            </div>
        </div>

        <style>
            @keyframes spinSlow { to { transform: rotate(360deg); } }
        </style>

        <!-- Welcome header text -->
        <div class="text-center mb-6">
            <h2 class="text-2xl font-black text-white mb-2 drop-shadow-lg">Join Sri Lankan Vaccine Safety Network</h2>
            <p class="text-white text-opacity-90 text-xs leading-relaxed drop-shadow-md">Create Your account and start Leverage Big Data Analytics for Enhanced Vaccine Safety and Effectiveness Tracking in Public Health</p>
                </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

        <!-- Medical License Number -->
        <div class="mt-4">
            <x-input-label for="medical_license_no" :value="__('Medical License Number')" />
            <x-text-input id="medical_license_no" class="block mt-1 w-full" type="text" name="medical_license_no" :value="old('medical_license_no')" required autocomplete="off" />
                                <x-input-error :messages="$errors->get('medical_license_no')" class="mt-2" />
                            </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>