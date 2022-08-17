@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    @guest
                    {{ __('Log in to access your notes.') }}
                    @else
                    <h3>
                        Notes
                    </h3>
                    <table class="table table-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Text</th>
                            <th>Options</th>
                        </tr>
                        @foreach ($notes as $note) 
                        <tr>
                            <td>{{ $note->id }}</td>
                            <td>{{ $note->title }}</td>
                            <td>{{ $note->text }}</td>
                            <td><a class="btn btn-danger" href="{{ route('notes.delete', ['id' => $note->id]) }}">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                    <a href="{{ route('notes.add') }}" class="btn btn-primary">Add new</a>
                    @endguest
             </div>
          </div>
        </div>
    </div>
</div>
@endsection
