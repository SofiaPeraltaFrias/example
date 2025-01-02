<x-layout>
    <x-slot:heading>
        Log In
    </x-slot:heading>
    
    <form method="POST" action="/login">
        @csrf
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
     
            <div class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-6">

                <x-form-field>
                    <x-form-label for='email'>Email</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="email" id="email" placeholder="" required type='email' :value="old('email')"></x-form-input>
                    </div>
                    <div class="mt-1">
                        <x-form-error name='email'/>
                    </div>  
                </x-form-field>

              <x-form-field>
                <x-form-label for='password'>Password</x-form-label>
                <div class="mt-2">
                  <x-form-input name="password" id="password" placeholder="" required type='password'></x-form-input>
                </div>
                <div class="mt-1">
                  <x-form-error name='password'/>
                </div>  
              </x-form-field>      

            </div>
          </div>
      
        </div>
      
        <div class="mt-6 flex items-center justify-end gap-x-6">
          <a href="/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
          <x-form-button>Log In</x-form-button>
        </div>
      </form>
      
</x-layout>