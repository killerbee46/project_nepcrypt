<x-guest-layout>
    <x-auth-card>


        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
          <center><div><a class="navbar-brand" href="{{ url('/') }}"><div style="width: 100px;background-color: black;padding: 0;"><img width="100%" " src="{{asset('/images/logo.png')}}" alt="NepCrypt"></div></a></div></center>
           
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Contact -->
            <div>
              <x-label for="mobile" :value="__('Moblie')" />

              <x-input id="contact" class="block mt-1 w-full" maxlength="10" minlength="10" type="text" name="mobile" :value="old('mobile')"  />
          </div>

          <!-- role -->

          <div>
            <x-label for="role" :value="__('Role')" />
            User <x-input id="role" class=" mt-1" type="radio" name="role" :value="1" checked />
            Blogger <x-input id="role" class=" mt-1" type="radio" name="role" :value="2"  />
        </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
            <!-- <div class="mt-4">
                <x-label for="mobile" :value="__('Mobile')" name='mobile' />

                <x-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" required />
            </div>
            <div class="input-group mt-4">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="profile_pic">
                  <label class="custom-file-label custom-file" for="inputGroupFile04" name='profile_pic'>Choose file</label>
                </div>
              </div>
              <div class="field mt-4">
                <div class="control">
                <label >Role:</label>
                  <label class="radio">
                    <input type="radio" name="role" value="2">
                    Blogger
                  </label>
                  <label class="radio">
                    <input type="radio" name="role" value="1">
                    Normal User
                  </label>
                </div>
              </div> -->

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
