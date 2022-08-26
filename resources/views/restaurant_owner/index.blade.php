<x-layout>
    <x-wrapper>
     <a href="{{route('owner_create')}}" class="btn btn-primary mb-3 col-md-3">Restaurant Owner Create</a>
         <table class="table align-middle mb-0 bg-white">
             <thead class="bg-light">
               <tr>
                 <th>ID</th>
                 <th class="w-25">Name</th>
                 <th class="w-25">Email</th>
                 <th class="w-25">Address</th>
                 <th class="w-25">Phone</th>
                 <th class="w-25">Actions</th>
               </tr>
             </thead>
             <tbody>
                 @foreach ($owners as $owner)
                 <tr>
                     <td>
                         {{$id_num}}
                     </td>
                     <td>
                         {{$owner->name}}
                     </td>
                      <td>
                         {{$owner->email}}
                     </td>
                     <td>
                        {{$owner->address}}
                    </td>
                     <td>
                        {{$owner->phone}}
                    </td>
                     <td class="d-flex ">
                         <a href="{{route('owner')}}/edit/{{$owner->id}}" class="btn btn-info ">Edit</a>
                        <form action="{{route('owner')}}/destory/{{$owner->id}}" method="POST" onsubmit="return confirm('Are you sure you want to delete ?')">
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
             {{ $owners->links() }}
          </div>
    </x-wrapper>
 </x-layout>