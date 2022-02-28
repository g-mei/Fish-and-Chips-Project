<h1>Category page</h1>

<button type="button" class="openModal" aria-label="add">Add New</button>

<table>
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($categories as $category)
        <tr>
            <th>{{$category->name}}</th>
            <th>
                <button class="openModal" aria-label="edit" data-id="{{$category->id}}">Edit</button>
                <button class="openModal" aria-label="delete" data-id="{{$category->id}}">Delete</button>
            </th>
        </tr>
        @include('admin.categories.modal-edit-delete')
    @endforeach
    </tbody>
</table>

@include('admin.categories.modal-add')
