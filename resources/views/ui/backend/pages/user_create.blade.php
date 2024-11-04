@extends('ui.backend.layouts.default')

@section('title')
    Create user
@endsection



@section('main-panel')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('users') }}" class="btn btn-sm btn-dark float-end mb-2"><span class="mdi mdi-keyboard-backspace"></span> Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Add new user</h4> <hr>
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label>Name <abbr title="required" class="text-danger">*</abbr></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-2">
                            <label>Email <abbr title="required" class="text-danger">*</abbr></label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-2">
                            <label>Password <abbr title="required" class="text-danger">*</abbr></label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-2">
                            <label>Role <abbr title="required" class="text-danger">*</abbr></label>
                            <select name="role" class="form-control" required>
                                <option selected disabled>Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Editor">Editor</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <button type="submit" class="btn btn-success w-100">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
