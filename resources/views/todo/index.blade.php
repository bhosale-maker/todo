@extends('layouts.app')
@section('title','todo')
@section('content')
    <div class="row" >
        <div class="col">
            <div class="d-flex justify-content-between">
                <div>
                    <h3>Todo List</h3>
                </div>
                <div>
                    <a href="{{ route('todo.create') }}" class='btn btn-lg btn-success'><i class="fas fa-plus"></i></a>
                </div>
            </div>
            <div class="btn-group" role="group">
            </div>
            <table class="table" id="todoTable" style="">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">priority</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">action</th>
                </tr>
                </thead>

                <tbody>
                @forelse ($todo as $todo)
                    <tr>
                        
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->description }}</td>
                        <td>{{ $todo->date }}</td>
                        <td>{{ $todo->priority }}</td>
                        <td> @if ($todo->image)
                            <img src="{{ asset('images/' . $todo->image) }}" alt="Todo Image" width="300" height="100">
                        @else
                            <p>No image available</p>
                        @endif</td>
                        <td class='{{ $todo->status == 1 ? 'text-success' : 'text-primary' }}'>
                            {{ $todo->status == 1 ? 'Completed' : 'Pending' }}
                        </td>
                        <td>
                            @if ($todo->status != 1 )
                            <div class='btn-group'>
                                <button href="" class="btn {{ $todo->complete ? 'btn-warning' : 'btn-success' }} btn-sm" onclick="markAsDone( {{ $todo->id }} )" >
                                    <i class="material-icons">{{ $todo->complete ? 'cancel' : 'done' }}</i>
                                </button>
                            </div>
                            @endif
                        </td>
                        
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">No todo items available.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

<script>
function markAsDone(id) {
    console.log("id ==> " + id);
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
        type: 'POST', // Use 'type' instead of 'method'
        url: '{{ route('markasdone') }}', // Correct syntax for echoing in Blade views
        data: {'id': id},
        success: function(response) {
            if (response.status == 200) {
                location.reload();
            }
        },
    });
}

</script>