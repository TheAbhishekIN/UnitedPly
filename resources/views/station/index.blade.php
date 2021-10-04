
<x-app-layout>
  <div x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stations') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
            {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> --}}
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                       <button  onclick='Livewire.emit("openModal", "station",@json(["model"=>"create"]))' class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Create Station</button>

                      <div class="w-full overflow-x-auto">
                        <table class="w-full">
                          <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                              <th class="px-4 py-3">Name</th>
                              <th class="px-4 py-3">Belt</th>
                              <th class="px-4 py-3">Date</th>
                              <th class="px-4 py-3">Action</th>
                            </tr>
                          </thead>
                          <tbody class="bg-white">
                            @if(count($stations)>0)
                            @foreach($stations as $s)
                            <tr class="text-gray-700">
                              <td class="px-4 py-3 border">
                                {{$s->station}}
                              </td>
                              <td class="px-4 py-3 border">
                                {{$s->belt_name}}
                              </td>
                              <td class="px-4 py-3 border">
                                {{$s->created_at}}
                              </td>
                               <td class="px-4 py-3 border">
                                <button  onclick='Livewire.emit("openModal", "station",@json(["model"=>"update","id"=>"$s->id"]))' class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Update</button>
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

   
    </div>

</x-app-layout>
