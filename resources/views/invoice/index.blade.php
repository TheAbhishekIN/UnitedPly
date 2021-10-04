<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            {{ __('Inoive') }}

        </h2>

        

    </x-slot>



    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                

                <section class="container mx-auto p-6 font-mono">

                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">

                      @if(Auth::user()->role == 'admin')

                        <div>

                            <a href="{{route('admin.create_invoice')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Add Invoice</a>

                        </div>

                      @endif

                      <div class="w-full overflow-x-auto">

                        <table class="w-full">

                          <thead>

                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">

        

                              <th class="px-4 py-3">Firm Name</th>

                              <th class="px-4 py-3">Invoice Number</th>

                              <th class="px-4 py-3">Invoice Date</th>

                              <th class="px-4 py-3">Status</th>

                              <th class="px-4 py-3">View</th>

                              <th class="px-4 py-3">Date</th>

                            </tr>

                          </thead>

                          <tbody class="bg-white">

                            @foreach($invoices as $inv)

                            <tr class="text-gray-700">

                              <td class="px-4 py-3 border">

                                {{$inv->firm_name}}

                              </td>

                              <td class="px-4 py-3 border">

                                {{$inv->invoice_number}}

                              </td>

                              <td class="px-4 py-3 border">

                                {{$inv->invoice_date}}

                              </td>

                              <td class="px-4 py-3 text-ms font-semibold border">

                                @if($inv->status == 1)

                                Active

                                @else

                                Inactive

                                @endif

                              </td>

                              <td class="px-4 py-3 text-ms font-semibold border">

                                <button onclick='Livewire.emit("openModal", "view-model",@json(["list_id" => "$inv->id","model"=>"invoice"]))'>View</button>

                              </td>

                              <td class="px-4 py-3 text-xs border">

                                {{$inv->created_at}}

                              </td>

                            </tr>

                            @endforeach

                         

                          </tbody>

                        </table>

                      </div>

                    </div>

                  </section>

            {{-- </div> --}}

        </div>

    </div>

</x-app-layout>

