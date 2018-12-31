@extends ('layouts.admin')

@section('content')

    <h1>Users </h1>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th>id</th>
              <th>Photo</th>

            <th>Name</th>
            <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created at</th>
              <th>Updated at</th>
          </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
              <td><img height="50px" src=" {{ URL::to('/') }}/images/{{$user->photo ? $user->photo['file']: 'no user photo'}}" alt="no photo"></td>

              <td><a href="{{route('admin.users.edit',$user->id)}}"> {{$user->name}}</a></td>
            <td>{{$user->email}}</td>
              <td>{{$user->role ? $user->role['name']:'user has no roles'}}</td>
              <td>{{$user->is_active ==1 ?
              'Active':'not Active'}}</td>
              <td> {{$user->created_at->diffForHumans()}}</td>
              <td> {{$user->updated_at->diffForHumans()}}</td>
          </tr>
            @endforeach
            @endif

        </tbody>
      </table>
    @stop