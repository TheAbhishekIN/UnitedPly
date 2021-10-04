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



                <form method="POST" action="{{ route('admin.save_invoice') }}" enctype="multipart/form-data">

                    @csrf

        

                    <div class="mt-4">

                        <x-jet-label for="email" value="{{ __('Dealer') }}" />

                        <select name="dealer" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">

                                <option value="">Select Dealer</option>

                            @foreach($dealers as $dealer)

                                <option value="{{$dealer->id}}">{{$dealer->firm_name}}</option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mt-4">

                        <x-jet-label for="number" value="{{ __('Invoice Number') }}" />

                        <x-jet-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number')" required autocomplete="off"/>

                    </div>

                    <div class="mt-4">

                        <x-jet-label for="date" value="{{ __('Invoice Date') }}" />

                        <x-jet-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autocomplete="off"/>

                    </div>



                    <div class="mt-4">

                        <x-jet-label for="invoice_file" value="{{ __('Invoice File') }}" />

                        <input type="file" name="invoice_file" id="invoice_file" class="block mt-1 w-full">

                        {{-- <x-jet-input id="item_file" class="block mt-1 w-full" type="file" name="item_file" :value="old('item_file')" required /> --}}

                    </div>



                   

                    <div class="flex items-center justify-end mt-4">

                     

                        <x-jet-button class="ml-4">

                            {{ __('Save') }}

                        </x-jet-button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>