@extends('administration/base-admin')

@section('content')
    <div class="admin-container">
        <div class="floating-button">
            <a href="#createUser" type="button" class="btn btn-success" data-toggle="modal"
               style="margin-right: 10px; border-radius: 90%">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </a>
        </div>
        @include('components.modal.create-user')

        <h3 style="text-align: center">Gestion des utilisateurs</h3>

        <div class="admin-table table-responsive">
            <table class="table table-bordered table-dark" style="margin-top: 15px">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Nom</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Description</th>
                    <th scope="col">Créé le</th>
                    <th scope="col">Modifié le</th>
                    <th scope="col" style="width: 160px">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        @if($user->isAdmin)
                            <td style="text-align: center;">
                                <svg style="color: darkgreen" width="1em" height="1em" viewBox="0 0 16 16"
                                     class="bi bi-check-circle-fill" fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>
                            </td>
                        @else
                            <td style="text-align: center;">
                                <svg style="color: darkred" width="1em" height="1em" viewBox="0 0 16 16"
                                     class="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                            </td>
                        @endif
                        <td>{{ $user->name }}</td>
                        <td><a href="mailto:{{$user->email}}">{{ $user->email }}</a></td>
                        <td>
                            <picture>
                                @if($user->image_path)
                                    <img src="{{ asset('storage/' . $user->image_path) }}"
                                         class="profile_pic_nav img-fluid rounded-circle img-thumbnail">
                                @else
                                    <img src="{{ asset('storage/img/no_profile_pic.png') }}"
                                         class="profile_pic_nav img-fluid rounded-circle img-thumbnail">
                                @endif
                            </picture>
                        </td>
                        <td>{{ '@' . $user->pseudo }}</td>
                        <td>
                            @if($user->description)
                                {{ $user->description }}
                            @else
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                </svg>
                            @endif
                        </td>
                        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $user->updated_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('updateProfile', $user->pseudo) }}" type="button" class="btn btn-primary">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd"
                                          d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                            <a href="#deleteUser{{$user->id}}" type="button" class="btn btn-danger" data-toggle="modal">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash"
                                     fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd"
                                          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </a>
                            @include('components.modal.remove-user', ['user' => $user])
                            <a href="{{ route('profile', $user->pseudo) }}" type="button" class="btn"
                               style="background-color: #48576b; color: white">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill"
                                     fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path fill-rule="evenodd"
                                          d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
