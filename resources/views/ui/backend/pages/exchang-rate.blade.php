@extends('ui.backend.layouts.default')

@section('title')
    Exchange rate
@endsection

@section('styles')
    <style>
        .table td img {
            width: 30px;
            height: 30px;
            object-fit: cover;
        }
    </style>
@endsection

@section('main-panel')



    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Currencies exchange rates</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Currency</th>
                                    <th>Code</th>
                                    <th>Buying (Taka)</th>
                                    <th>Selling (Taka)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exchanges as $exchange)
                                    @php
                                        $currency = DB::table('currencies')->find($exchange->currency_id);
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ $currency->flag }}"></td>
                                        <td>{{ $currency->name }} ({{ $currency->symbol }})</td>
                                        <td>{{ $currency->code }}</td>
                                        <td>{{ $exchange->buying_rate }}</td>
                                        <td>{{ $exchange->selling_rate }}</td>
                                        <td class="d-flex gap-1">
                                            <form action="{{ route('exchange_rate.edit', $exchange->id) }}" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-warning"><i
                                                        class="fa-solid fa-pen-to-square"></i></button>
                                            </form>
                                            @if (!isset($editExchange))
                                                <a href="{{ route('exchange_rate.destroy', $exchange->id) }}"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')"><i
                                                        class="fa-solid fa-trash"></i></a>
                                            @endif
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
        <div class="col-sm-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ isset($editExchange) ? 'Update exchange rate' : 'Add exchange rate' }}</h4>
                            <hr>
                            <form
                                action="{{ isset($editExchange) ? route('exchange_rate.update', $editExchange->id) : route('exchange_rate.store') }}"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="currency">Currency</label>
                                    @if (isset($editExchange))
                                        @php
                                            $editExchangeCurrency = DB::table('currencies')->find(
                                                $editExchange->currency_id,
                                            );
                                        @endphp
                                        <select name="currency_id" class="form-control">
                                            <option selected disabled>{{ $editExchangeCurrency->name }}
                                                ({{ $editExchangeCurrency->symbol }}) - {{ $editExchangeCurrency->code }}
                                            </option>
                                        </select>
                                    @else
                                        <select name="currency_id" class="form-control">
                                            <option selected disabled>Select Currency</option>
                                            @foreach ($currencies as $currency)
                                                <option value="{{ $currency->id }}"
                                                    {{ isset($editExchange) && $editExchange->currency_id == $currency->id ? 'selected' : '' }}>
                                                    {{ $currency->name }} ({{ $currency->symbol }}) -
                                                    {{ $currency->code }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="buying">Buying Rate</label>
                                    <input type="text" name="buying_rate" class="form-control" id="buying"
                                        value="{{ isset($editExchange) ? $editExchange->buying_rate : '' }}"
                                        placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="selling">Selling Rate</label>
                                    <input type="text" name="selling_rate" class="form-control" id="selling"
                                        value="{{ isset($editExchange) ? $editExchange->selling_rate : '' }}"
                                        placeholder="">
                                </div>
                                @if (isset($editExchange))
                                    <div class="d-flex">
                                        <button type="submit"
                                            class="btn btn-sm btn-primary w-50">{{ isset($editExchange) ? 'Update' : 'Save' }}</button>
                                        <a href="{{ route('exchange_rate') }}"
                                            class="btn btn-sm btn-danger w-50 ms-2">Cancel</a>
                                    </div>
                                @else
                                    <button type="submit"
                                        class="btn btn-sm btn-success w-100">{{ isset($editExchange) ? 'Update' : 'Save' }}</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
