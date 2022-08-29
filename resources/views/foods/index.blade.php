{{-- @dd($foods) --}}
<x-layout>
    <x-wrapper>
    <x-session success="success" />
     <a href="{{route('foods_create')}}" class="btn btn-primary mb-3 col-md-3">food Owner Create</a>
         <table class="table align-middle mb-0 bg-white">
             <thead class="bg-light">
               <tr>
                 <th>ID</th>
                 <th class="w-25">Name</th>
                 <th class="w-25">Image</th>
                 <th class="w-25">Price</th>
                 <th class="w-25">Discount</th>
                 <th class="w-25">Category</th>
                 <th class="w-25">Restaurant</th>
                 <th class="w-25">Actions</th>
               </tr>
             </thead>
             <tbody>
                 @foreach ($foods as $food)
                 <tr>
                     <td>
                         {{$id_num}}
                     </td>
                     <td>
                         {{$food->name}}
                     </td>
                     <td>
                       <img src='{{asset("storage/$food->image")}}' alt="" class="w-75">
                    </td>
                      <td>
                         {{$food->price}}
                     </td>
                     <td>
                        {{$food->discount}}
                    </td>
                     <td>
                        {{$food->category->name}}
                    </td>
                    <td>
                        {{$food->restaurant->name}}
                    </td>
                     <td class="d-flex ">
                         <a href="{{route('foods')}}/edit/{{$food->id}}" class="btn btn-info ">Edit</a>
                        <form action="{{route('foods')}}/destory/{{$food->id}}" method="POST" onsubmit="return confirm('Are you sure you want to delete ?')">
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
             {{ $foods->links() }}
          </div>
    </x-wrapper>
 </x-layout>