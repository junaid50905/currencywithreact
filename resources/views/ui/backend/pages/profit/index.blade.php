@extends('ui.backend.layouts.default')

@section('title')
    Profit
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <!-- Button to trigger Add Modal -->
                    <button class="btn btn-primary btn-sm rounded" data-bs-toggle="modal" data-bs-target="#addModal">Add Profit</button>
                    <h4 class="card-title">Profits</h4>
                    <div class="table-responsive">
                        <!-- Profits Table -->
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profits as $profit)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $profit->title }}</td>
                                        <td>
                                            <a href="{{ route('profit.destroy', $profit->id) }}"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')"><i
                                                        class="fa-solid fa-trash"></i></a>
                                            <a href="{{ route('profit.rates', $profit->id) }}"
                                                    class="btn btn-sm btn-success">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Profit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('profit.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm">Add profit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
