<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        	<div class="bg-white overflow-hidden">
                	<form method="POST" action="{{ route('admin.store_station') }}">
                    <div class="w-full mb-8 overflow-hidden rounded-lg">

                      <div class="w-full overflow-x-auto">
		                    @csrf
		                    <div class="mb-4">
		                        <x-jet-label for="email" value="{{ __('Belt') }}" />
		                        <select name="belt_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" required>
		                            <option value="">Select Belt</option>
		                            @foreach($belts as $belt)
		                            <option value="{{$belt->id}}" @if($b == $belt->id) selected @endif>{{$belt->belt_name}}</option>
		                            @endforeach
		                        </select>
		                    </div>
		                    <div>
		                        <x-jet-label for="name" value="{{ __('Name') }}"/>
		                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="station" :value="{{$station}}" required autocomplete="off"/>
		                    </div>
                      </div>
                    </div>
                     <div  class="mb-4">
		                        <x-jet-button class="ml-4">
		                            {{ __('Save') }}
		                        </x-jet-button>
		                    </div>
                     </form>
        </div>
        </div>
    </div>
</div>
