<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dealers') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
            {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> --}}
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                      @if(Auth::user()->role == 'admin')
                        <div>
                            <a href="{{route('admin.create_dealer')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Add Dealer</a>
                        </div>
                      @endif
                      <div class="w-full overflow-x-auto">
                        <table class="w-full">
                          <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                              <th class="px-4 py-3">Name</th>
                              <th class="px-4 py-3">Firm Name</th>
                              <th class="px-4 py-3">Mobile</th>
                              <th class="px-4 py-3">Email</th>
                              <th class="px-4 py-3">Date</th>
                              <th class="px-4 py-3">Action</th>
                            </tr>
                          </thead>
                          <tbody class="bg-white">
                            @forelse($dealers as $dealer)
                            <tr class="text-gray-700">
                              <td class="px-4 py-3 border">
                                <div class="flex items-center text-sm">
                                 
                                  <div>
                                    <p class="font-semibold text-black">{{$dealer->name}}</p>
                              
                                  </div>
                                </div>
                              </td>
                              <td class="px-4 py-3 text-ms font-semibold border">{{$dealer->firm_name}}</td>
                              <td class="px-4 py-3 text-ms font-semibold border">{{$dealer->phone}}</td>
                              <td class="px-4 py-3 text-xs border">
                                {{$dealer->email}}
                              </td>
                              <td class="px-4 py-3 text-sm border">{{$dealer->created_at}}</td>
                              <td class="px-4 py-3 text-sm border">
                                <a href="{{route('admin.add_member',$dealer->id)}}"><span class="bg-green-100 inline-flex items-center justify-center px-2 py-1 text-xs font-bold shadow ">Add Member</span></a>
                              
                                <button class="bg-green-100 inline-flex items-center justify-center px-2 py-1 text-xs font-bold shadow " onclick='Livewire.emit("openModal", "details",@json(["dealer_id" => "$dealer->id"]))'>View</button>
                              </td>
                            </tr>
                            @empty
                            <tr>
                              <td>No data found!</td>
                            </tr>
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
