<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray dark:text-gray-300 leading-tight">
            {{ __('Edit An Appointment') }}
        </h2>
    </x-slot>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form id="editForm" action="{{ route('appointment.update', ['appointment' => $appointment]) }}" method="POST">
        @csrf
        @method('put')
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="name" name="name" value="{{$appointment->name}}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('name')" class="text-danger mt-2" />
        </div>

        <div>
            <x-input-label for="lastName" :value="__('Last Name')" />
            <x-text-input id="lastName" class="block mt-1 w-full" type="lastName" name="lastName" value="{{$appointment->lastName}}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('lastName')" class="text-danger mt-2" />
        </div>

        <div>
            <x-input-label for="phoneNumber" :value="__('Phone Number')" />
            <x-text-input id="phoneNumber" class="block mt-1 w-full" type="phoneNumber" name="phoneNumber" value="{{$appointment->phoneNumber}}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('phoneNumber')" class="text-danger mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$appointment->email}}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="text-danger mt-2" />
        </div>

        <div>
            <x-input-label for="date" :value="__('Date')" />
            <x-text-input id="date" class="block mt-1 w-full" type="datetime-local" name="date" value="{{$appointment->date}}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('date')" class="text-danger mt-2" />
        </div>

        <x-primary-button class="ms-3 bg-primary hover:bg-darkAccent">
            {{ __('Update') }}
        </x-primary-button>
    </form>
    <script>
        document.getElementById('editForm').addEventListener('submit', function (event) {
            let name = document.getElementById('name').value;
            let lastName = document.getElementById('lastName').value;
            let phoneNumber = document.getElementById('phoneNumber').value;
            let email = document.getElementById('email').value;
            let date = document.getElementById('date').value;

            const nameRegex = /^[a-zA-Z]+$/;
            const phoneRegex = /^[1-9]\d{8}$/;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const dateRegex = /^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/

            if (!nameRegex.test(name)) {
                alert('Wprowadź poprawne imie.');
                event.preventDefault();
            }

            if (!nameRegex.test(lastName)) {
                alert('Wprowadź poprawne nazwisko.');
                event.preventDefault();
            }

            if (!phoneRegex.test(phoneNumber)) {
                alert('Wprowadź poprawny numer telefonu.');
                event.preventDefault();
            }

            if (!emailRegex.test(email)) {
                alert('Wprowadź poprawny adres email.');
                event.preventDefault();
            }

            if (dateRegex.test(date)) {
                alert('Wprowadź poprawną datę.');
                event.preventDefault();
            }
        });
    </script>
</x-app-layout>
