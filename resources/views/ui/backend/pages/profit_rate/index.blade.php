@extends('ui.backend.layouts.default')

@section('title')
    {{ $profit->title }}
@endsection


@section('main-panel')



    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $profit->title }}</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Rate</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profit_rates as $profit_rate)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $profit_rate->title }}</td>
                                    <td>{{ $profit_rate->rate }}</td>
                                    <td>
                                        <a href="{{ route('profit_rate.destroy', [$profit->id, $profit_rate->id]) }}"
                                                    class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                    <i class="fa-solid fa-trash"></i>
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

        <!-- Add or Edit form -->
        <div class="col-sm-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add new</h4>
                            <hr>
                            <form action="{{ route('add.profit_rate', $profit->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Rate</label>
                                    <input type="text" name="rate" class="form-control" required>
                                </div>
                                <button class="btn btn-sm btn-success w-100" type="submit">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
