<x-layout>
    <h1 class="my-16 text-center text-2xl font-medium text-slate-600">
        Forgot your password?
    </h1>

    <x-card class="py-8 px-10 w-3/4 mx-auto">
        @if (session('status'))
          <div class="mb-4 font-medium text-sm text-green-600">
              {{ session('status') }}
          </div>
        @endif
  
        <form action="{{ route('password.email') }}" method="POST">
          @csrf
          <div class="mb-8">
            <label for="email" class="mb-2 block text-md font-medium text-slate-900">E-mail</label>
              <div class="relative">
                  <x-text-input name="email" placeholder="Enter your e-mail" value="{{ old('email') }}" />
                  @error('email') <span class="text-red-400 text-sm my-2">{{ $message }}</span> @enderror
              </div>
          </div>
    
          <x-button class="w-full">Send Password Reset Link</x-button>
        </form>
      </x-card>
</x-layout>