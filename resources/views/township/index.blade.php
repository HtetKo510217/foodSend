<x-layout>
    <x-wrapper>
     <a href="{{route('township_create')}}" class="btn btn-primary mb-3 col-md-3">Township Create</a>
         <table class="table align-middle mb-0 bg-white">
             <thead class="bg-light">
               <tr>
                 <th>ID</th>
                 <th class="w-25">Name</th>
                 <th class="w-25">Slug</th>
                 <th class="w-25">Actions</th>
               </tr>
             </thead>
             <tbody>
                 @foreach ($townships as $township)
                 <tr>
                     <td>
                         {{$id_num}}
                     </td>
                     <td>
                         {{$township->name}}
                     </td>
                      <td>
                         {{$township->slug}}
                     </td>
                     <td class="d-flex ">
                         <a href="{{route('township')}}/edit/{{$township->id}}" class="btn btn-info ">Edit</a>
                        <form action="{{route('township')}}/destory/{{$township->id}}" method="POST" onsubmit="return confirm('Are you sure you want to delete ?')">
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
             {{ $townships->links() }}
          </div>
    </x-wrapper>
 </x-layout>