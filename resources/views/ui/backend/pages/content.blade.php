@extends('ui.backend.layouts.default')

@section('title')
    Contents
@endsection

@section('styles')
    <style>
        .table td img {
            width: 150px;
            height: 100px;
            border-radius: 0;
            object-fit: cover;
        }
    </style>
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('create_new_content') }}" class="btn btn-sm btn-primary mb-2"><span class="mdi mdi-server-plus"></span> Create new content</a>
                    <h4 class="card-title">Contents</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Content Type</th>
                                    <th>File</th>
                                    <th>Duration</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contents as $content)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-capitalize">{{ $content->type }}</td>
                                        @if ($content->type == 'image')
                                            <td><img src="{{ $content->image }}"
                                                    alt=""></td>
                                        @elseif($content->type == 'video')
                                            <td>
                                                <video height="100" width="150" controls>
                                                    <source src="{{ $content->video }}" type="video/mp4">
                                                </video>
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                        <td>{{ $content->duration / 1000 }} Seconds</td>
                                        <td>
                                            <div>
                                                <form action="{{ route('content.destroy', $content->id) }}" method="POST">
                                                    @csrf
                                                    <button onclick="return confirm('Are you sure?')" type="submit"
                                                        class="btn btn-sm text-danger"><i
                                                            class="menu-icon mdi mdi-delete-circle-outline"
                                                            style="font-size: 30px;"></i></button>
                                                </form>
                                            </div>
                                            <div>
                                                @if ($content->type != 'video')
                                                    <i class="mdi mdi-clock-edit-outline text-warning ms-3"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal-{{ $content->id }}"
                                                        style="font-size: 30px; cursor: pointer;"></i>
                                                @endif
                                            </div>

                                        </td>

                                        {{-- modal --}}
                                        <div class="modal fade" id="exampleModal-{{ $content->id }}" tabindex="-1"
                                            aria-labelledby="exampleModal-{{ $content->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModal-{{ $content->id }}Label">
                                                            Update content duration</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('content.update_duration', $content->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Duration</label>
                                                                <input type="number"
                                                                    value="{{ $content->duration / 1000 }}" name="duration"
                                                                    class="form-control">
                                                                <small class="text-muted">Write only number of seconds (Eg:
                                                                    30)</small>
                                                            </div>
                                                            <button type="submit" class="btn btn-success">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
