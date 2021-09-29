<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catalog') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
            {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> --}}
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                      @if(Auth::user()->role == 'admin')
                        <div>
                            <a href="{{route('admin.create_catalog')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Add Catalog</a>
                        </div>
                        @endif
                      <div class="w-full overflow-x-auto">
                        <table class="w-full">
                          <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                              <th class="px-4 py-3">Dealer</th>
                              <th class="px-4 py-3">Item Name</th>
                              <th class="px-4 py-3">Item Code</th>
                              <th class="px-4 py-3">Status</th>
                              <th class="px-4 py-3">View</th>
                              <th class="px-4 py-3">Date</th>
                            </tr>
                          </thead>
                          <tbody class="bg-white">
                            @forelse ($catalogs as $cat)
                              <tr class="text-gray-700">
                                <td class="px-4 py-3 border">{{$cat->dealer}}</td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{$cat->name}}</td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{$cat->sort_code}}</td>
                                <td class="px-4 py-3 text-xs border">
                                  @if($cat->status == 0)
                                    Disabled
                                  @else
                                    Enabled
                                  @endif
                                </td>
                                <td class="px-4 py-3 text-ms font-semibold border">
                                  <button onclick='Livewire.emit("openModal", "view-model",@json(["list_id" => "$cat->id", "model"=>"catalog"]))'>View</button>
                                </td>
                                <td class="px-4 py-3 text-sm border">{{$cat->created_at}}</td>
                              </tr>
                            @empty
                                <tr></tr>
                            @endforelse
                           
                         
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </section>
            {{-- </div> --}}
        </div>
    </div>
</x-app-layout>
