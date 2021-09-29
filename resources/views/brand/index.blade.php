
<x-app-layout>
  <div x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Brands') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
            {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> --}}
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div>
                          <button type="button" class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full" @click="showModal = true">Create Brand</button>
                        </div>
                      <div class="w-full overflow-x-auto">
                        <table class="w-full">
                          <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                              <th class="px-4 py-3">Name</th>
                              <th class="px-4 py-3">Date</th>
                            </tr>
                          </thead>
                          <tbody class="bg-white">
                            @if(count($catalogs)>0)
                            @foreach($catalogs as $cat)
                            <tr class="text-gray-700">
                              <td class="px-4 py-3 border">
                                {{$cat->name}}
                              </td>
                              <td class="px-4 py-3 border">
                                {{$cat->created_at}}
                              </td>
                           
                            </tr>
                            @endforeach
                            @endif
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </section>
            {{-- </div> --}}
        </div>
    </div>

    
      <section class="flex flex-wrap p-4 h-full items-center">
        <!--Overlay-->
        <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal" :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showModal }">
          <!--Dialog-->
          <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
    
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
              <p class="text-2xl font-bold">Brand</p>
              <div class="cursor-pointer z-50" @click="showModal = false">
                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                  <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
              </div>
            </div>
            
            <form method="POST" action="{{ route('admin.store_brand') }}">
              @csrf
  
              <div  class="mb-4">
                  <x-jet-label for="name" value="{{ __('Name') }}" />
                  <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
              </div>

            <!--Footer-->
              <div class="flex justify-end pt-2">
                <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400" type="submit">Submit</button>
              </div>
          </form>
    
          </div>
          <!--/Dialog -->
        </div><!-- /Overlay -->
    
      </section>
    </div>

</x-app-layout>
