<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Dealer') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-4 px-4">
                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('admin.save_dealer') }}">
                    @csrf
        
                    <div  class="mb-4">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>
                    <div >
                        <x-jet-label for="name" value="{{ __('Firm Name') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="firm_name" :value="old('firm_name')" required autofocus autocomplete="name" />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="mobile" value="{{ __('Phone') }}" />
                        <x-jet-input id="mobile" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="mobile" />
                    </div>
        
                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Dealer Brands') }}" />
                        <select name="dealer_brands" id="" multiple>
                            <option value=""></option>
                        </select>
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>
        
                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>
        
                    <div class="mt-4">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
        
                   
                    <div class="flex items-center justify-end mt-4">
                     
                        <x-jet-button class="ml-4">
                            {{ __('Register') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>