<div>
    <div class="bg-white p-4 sm:px-6 sm:py-4 border-b border-gray-150">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            {{$firm_name}}
        </h3>
    </div>
    <div class="bg-white px-4 sm:p-6">
        <div class="space-y-6">

            <div>
            <img src="{{asset('qr/'.$dealer_id.'/qr_code.png')}}">
            </div>

            <div>
                @if(count($team)>0)
            Team
           <table class="w-full">
               <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                   <th>Name</th>
                   <th>Email</th>
                   <th>Mobile</th>
               </tr>
               @forelse($team as $t)
                <tr class="text-gray-700">
                   <td>{{$t->name}}</td>
                   <td>{{$t->email}}</td>
                   <td>{{$t->phone}}</td>
               </tr>
               @empty
                
               @endforelse
           </table>
           @endif
            </div>
      
        </div>
    </div>

    <div class="bg-white px-4 pb-5 sm:px-4 sm:flex mb-4">
        <button wire:click="$emit('closeModal')" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Close Modal</button>
    </div>

</div>
