<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Catalog') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-4 px-4">
                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('admin.save_catalog') }}" enctype="multipart/form-data">
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
                        <x-jet-label for="email" value="{{ __('Brand Name') }}" />
                        <select name="brand" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                                <option value="">Select Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="series" value="{{ __('Series') }}" />
                        <x-jet-input id="series" class="block mt-1 w-full" type="text" name="series" :value="old('series')" required />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="thickness" value="{{ __('Thickness') }}" />
                        <x-jet-input id="thickness" class="block mt-1 w-full" type="text" name="thickness" :value="old('thickness')" required />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="sort_code" value="{{ __('Sort Code') }}" />
                        <x-jet-input id="sort_code" class="block mt-1 w-full" type="text" name="sort_code" :value="old('sort_code')" required />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="item_file" value="{{ __('Item File') }}" />
                        <input type="file" name="item_file" id="item_file" class="block mt-1 w-full">
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