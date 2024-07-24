<x-layout>
    <h1 class="my-16 text-center text-2xl font-medium text-slate-600">
      Sign in to your account
    </h1>
  
    <x-card class="py-8 px-10 w-3/4 mx-auto">
      <form action="{{ route('auth.store') }}" method="POST">
        @csrf
        <div class="mb-8">
          <label for="email" class="mb-2 block text-md font-medium text-slate-900">E-mail</label>
            <div class="relative">
                <x-text-input name="email" placeholder="Enter your e-mail" value="{{ old('email') }}" />
                @error('email') <span class="text-red-400 text-sm my-2">{{ $message }}</span> @enderror
            </div>
        </div>
  
        <div class="mb-20">
          <label for="password" class="mb-2 block text-md font-medium text-slate-900">Password</label>
          <div class="relative">
            <x-text-input id="password" name="password" type="password" placeholder="Enter your password" class="pr-10"/>
            @error('password') <span class="text-red-400 text-sm my-2">{{ $message }}</span> @enderror
          </div>
        </div>
  
        <div class="mb-8 flex justify-between text-sm font-medium">
          <div>
            <div class="flex items-center space-x-2">
              <input type="checkbox" name="remember" class="rounded-sm border border-slate-400" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember">Remember me</label>
            </div>
          </div>
          <div>
            <a href="{{ route('password.request') }}" class="text-indigo-600 hover:underline">
              Forget password?
            </a>
          </div>
        </div>
  
        <x-button class="w-full bg-green-400">Sign In</x-button>
      </form>
    </x-card>

  </x-layout>
  