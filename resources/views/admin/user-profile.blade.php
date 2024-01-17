@extends('layout.admin_app') @section('content')


<div class="row">
    <div class="col-lg-6">
        <div class="card-box">
            <h4 class="header-title m-t-0">{{ Auth::user()->name }}</h4>
            <p>Profile</p>
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>
            <form method="post" action="{{ route('profile.update') }}" class="parsley-examples">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="userName">User Name</label>
                    <input id="name" name="name" type="text" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name">
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div class="form-group">
                    <label for="emailAddress">Email address</label>
                    <input id="email" name="email" type="email" class="form-control" :value="old('email', $user->email)" required autocomplete="username" id="emailAddress">
                </div>

                <div class="flex items-center gap-4">
                    <div class="form-group text-right m-b-0">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                            Update
                        </button>
                    </div>

                    @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                    @endif
                </div>


            </form>
        </div> <!-- end card-box -->



    </div>
    <!-- end col -->
    <div class="col-lg-6">
        <div class="card-box">
            <h4 class="header-title m-t-0">Password Change</h4>
            <form method="post" action="{{ route('password.update') }}" class="parsley-examples">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="update_password_current_password" :value="__('Current Password')">current password</label>
                    <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>
                <div class="form-group">
                    <label for="update_password_password" :value="__('New Password')">New Password</label>
                    <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>
                <div class="form-group">
                    <label for="update_password_password_confirmation" :value="__('Confirm Password')">Confirom Password</label>
                    <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center gap-4">
                    <div class="form-group text-right m-b-0">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                            Update
                        </button>
                    </div>

                    @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </div> <!-- end card-box -->



    </div>
</div>
<!-- end row -->

@endsection