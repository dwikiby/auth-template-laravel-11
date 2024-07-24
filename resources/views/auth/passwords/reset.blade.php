<x-layout>
    <h1 class="my-16 text-center text-2xl font-medium text-slate-600">
      Reset your password
    </h1>
  
    <x-card class="py-8 px-10 w-3/4 mx-auto">
      @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
      @endif

      <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        
        <div class="mb-8">
          <label for="email" class="mb-2 block text-md font-medium text-slate-900">E-mail</label>
            <div class="relative">
                <x-text-input name="email" placeholder="Enter your e-mail" value="{{ $email ?? old('email') }}" type="email" />
                @error('email') <span class="text-red-400 text-sm my-2">{{ $message }}</span> @enderror
            </div>
        </div>
  
        <div class="mb-8">
          <label for="password" class="mb-2 block text-md font-medium text-slate-900">New Password</label>
          <div class="relative">
            <x-text-input id="password" name="password" type="password" placeholder="Enter your new password" />
            @error('password') <span class="text-red-400 text-sm my-2">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="mb-8">
          <label for="password_confirmation" class="mb-2 block text-md font-medium text-slate-900">Confirm New Password</label>
          <div class="relative">
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm your new password" />
            @error('password_confirmation') <span class="text-red-400 text-sm my-2">{{ $message }}</span> @enderror
          </div>
        </div>
  
        <x-button class="w-full bg-green-400">Reset Password</x-button>
      </form>
    </x-card>
</x-layout>
