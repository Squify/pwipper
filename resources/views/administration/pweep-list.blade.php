@extends('administration/base-admin')

@section('content')
    <div class="admin-container">
        <h3 style="text-align: center">Gestion des pweeps</h3>

        <div class="admin-table table-responsive">
            <table class="table table-bordered table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th style="width: 25%" scope="col">Message</th>
                    <th scope="col">Auteur</th>
                    <th style="width: 200px" scope="col">Image(s)</th>
                    <th scope="col">Repweep</th>
                    <th scope="col">Likes</th>
                    <th scope="col">Repweeps</th>
                    <th scope="col">Créé le</th>
                    <th scope="col">Modifié le</th>
                    <th scope="col" style="width: 160px">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pweeps as $pweep)
                    @if($pweep->is_deleted)
                        <tr style="background-color: rgba(139, 0, 0, 0.2);">
                    @else
                        <tr>
                            @endif
                            <th scope="row">{{ $pweep->id }}</th>
                            <td>{{ $pweep->message }}</td>
                            <td>{{ '@' . $pweep->author->pseudo }}</td>
                            <td>
                                @if($pweep->image_path_1 || $pweep->image_path_2 || $pweep->image_path_3 || $pweep->image_path_4)
                                    @if($pweep->image_path_1)
                                        <img style="margin: 10px" src="{{ asset('img/' . $pweep->image_path_1) }}" width="30%" height="30%"/>
                                    @endif
                                    @if($pweep->image_path_2)
                                        <img style="margin: 10px" src="{{ asset('img/' . $pweep->image_path_2) }}" width="30%" height="30%"/>
                                    @endif
                                    @if($pweep->image_path_3)
                                        <img style="margin: 10px" src="{{ asset('img/' . $pweep->image_path_3) }}" width="30%" height="30%"/>
                                    @endif
                                    @if($pweep->image_path_4)
                                        <img style="margin: 10px" src="{{ asset('img/' . $pweep->image_path_4) }}" width="30%" height="30%"/>
                                    @endif
                                @else
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                    </svg>
                                @endif
                            </td>
                            <td>
                                @if($pweep->initial_pweep_id && $pweep->initialAuthor)
                                    {{ '@' . $pweep->initialAuthor->pseudo }} - pweep id {{ $pweep->initial_pweep_id }}
                                @else
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                    </svg>
                                @endif
                            </td>
                            <td style="text-align: center;">{{ $pweep->like_counter }}</td>
                            <td style="text-align: center;">{{ $pweep->repweep_counter }}</td>
                            <td>{{ $pweep->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $pweep->updated_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="#updatePweep{{$pweep->id}}" type="button" class="btn btn-primary"
                                   data-toggle="modal">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd"
                                              d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                                @if(!$pweep->is_deleted)
                                    <a href="#deletePweep{{$pweep->id}}" type="button" class="btn btn-danger"
                                       data-toggle="modal">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash"
                                             fill="currentColor"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd"
                                                  d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </a>
                                @endif
                                <a href="{{ route('detailsPweep', $pweep->id) }}" type="button" class="btn"
                                   style="background-color: #48576b; color: white">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill"
                                         fill="currentColor"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path fill-rule="evenodd"
                                              d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                    </svg>
                                </a>
                                @include('components.modal.edit-pweep', ['pweep' => $pweep])
                                @include('components.modal.remove-pweep', ['pweep' => $pweep])
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
