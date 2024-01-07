<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray dark:text-gray-300 leading-tight">
            {{ __('Make An Appointment') }}
        </h2>
    </x-slot>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form action="{{ route('appointment.store') }}" method="POST">
        @csrf
        @method('post')
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="name" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="text-danger mt-2" />
        </div>

        <div>
            <x-input-label for="lastName" :value="__('Last Name')" />
            <x-text-input id="lastName" class="block mt-1 w-full" type="lastName" name="lastName" :value="old('lastName')" required autofocus autocomplete="lastName" />
            <x-input-error :messages="$errors->get('lastName')" class="text-danger mt-2" />
        </div>

        <div>
            <x-input-label for="phoneNumber" :value="__('Phone Number')" />
            <x-text-input id="phoneNumber" class="block mt-1 w-full" type="phoneNumber" name="phoneNumber" :value="old('phoneNumber')" required autofocus autocomplete="phoneNumber" />
            <x-input-error :messages="$errors->get('phoneNumber')" class="text-danger mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="text-danger mt-2" />
        </div>

        <div>
            <x-input-label for="date" :value="__('Date')" />
            <x-text-input id="date" class="block mt-1 w-full" type="datetime-local" name="date" :value="old('date')" required autofocus autocomplete="date" />
            <x-input-error :messages="$errors->get('date')" class="text-danger mt-2" />
        </div>

        <x-primary-button class="ms-3 bg-primary hover:bg-darkAccent">
            {{ __('Submit') }}
        </x-primary-button>
    </form>
</x-app-layout>
