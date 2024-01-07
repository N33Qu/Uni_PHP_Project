<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray dark:text-gray-300 leading-tight">
            {{ __('Appointments') }}
        </h2>
    </x-slot>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">
                    Id
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Last Name
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Phone Number
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Date
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Edit
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Delete
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($appointments as $appointment)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 text-center">{{$appointment->id}}</td>
                    <td class="px-6 py-4 text-center">{{$appointment->name}}</td>
                    <td class="px-6 py-4 text-center">{{$appointment->lastName}}</td>
                    <td class="px-6 py-4 text-center">{{$appointment->phoneNumber}}</td>
                    <td class="px-6 py-4 text-center">{{$appointment->email}}</td>
                    <td class="px-6 py-4 text-center">{{$appointment->date}}</td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{route('appointment.edit', ['appointment' => $appointment])}}">Edit</a>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <form method="post" action="{{route('appointment.delete', ['appointment' => $appointment])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div>
        @if(session()->has('success'))
            <div class="font-semibold text-md-center text-gray dark:text-green-900 leading-tight text-center px-6 py-3">
                {{session('success')}}
            </div>
        @endif
    </div>
</x-app-layout>
