<x-layout>
    <x-wrapper>
        <form class="form p-5" action="{{route('category')}}/update/{{$category->id}}" method="POST">
            @csrf
            <div class="form-outline mb-4">
              <label class="form-label" for="name">Category Name</label>
              <input name="name" type="text" id="name" class="form-control"  value="{{$category->name}}"/>
              <x-error name="name" />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="slug">Category Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" value="{{$category->slug}}"/>
                <x-error name="slug" />
            </div>
          
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Update</button>
            <a href="{{route('category')}}" class="btn btn-info">Back</a>
          </form>
    </x-wrapper>
 </x-layout>