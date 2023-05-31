
    <!-- Seu código da página de edição aqui -->


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Profile') }}
        </h2>
    </x-slot>


@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
