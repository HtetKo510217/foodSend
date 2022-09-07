{{-- @dd($restaurants) --}}
<x-layout>
    <x-wrapper>
    <x-session success="success" />
     <a href="{{route('restaurants_create')}}" class="btn btn-primary mb-3 col-md-3">Restaurant Owner Create</a>
         <table class="table align-middle mb-0 bg-white">
             <thead class="bg-light">
               <tr>
                 <th>ID</th>
                 <th class="w-25">Name</th>
                 <th class="w-25">Email</th>
                 <th class="w-25">Phone</th>
                 <th class="w-25">Address</th>
                 <th class="w-25">Opening_duration</th>
                 <th class="w-25">Township</th>
                 <th class="w-25">Actions</th>
               </tr>
             </thead>
             <tbody>
                 @foreach ($restaurants as $restaurant)
                 {{-- @dd($restaurant->township->name) --}}
                 <tr>
                     <td>
                         {{$id_num}}
                     </td>
                     <td>
                         {{$restaurant->name}}
                     </td>
                      <td>
                         {{$restaurant->email}}
                     </td>
                     <td>
                        {{$restaurant->phone}}
                    </td>
                     <td>
                        {{$restaurant->address}}
                    </td>
                    <td>
                        {{$restaurant->opening_duration}}
                    </td>
                    <td>
                        {{$restaurant->township->name ?? 'none'}}
                    </td>
                     <td class="d-flex ">
                         <a href="{{route('restaurants')}}/edit/{{$restaurant->id}}" class="btn btn-info ">Edit</a>
                        <form action="{{route('restaurants')}}/destory/{{$restaurant->id}}" method="POST" onsubmit="return confirm('Are you sure you want to delete ?')">
                         @csrf
                         <button class="btn btn-danger mx-3" type="submit">Delete</button>
                        </form>
                     </td>
                   </tr>
                   
                 @php
                 $id_num++
                 @endphp
 
                 @endforeach
             </tbody>
           </table>
          <div class="mt-3 col-md-6">
             {{ $restaurants->links() }}
          </div>
    </x-wrapper>
 </x-layout>