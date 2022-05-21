<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(auth()->user()->is_admin == 1)
                    <h1>Admin dashbord</h1>
                    <div class="btn btn-primary"><a href="{{ url('employee/add') }}">add employee</a></div>
                    @else
                    <h1>User dashbord</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
