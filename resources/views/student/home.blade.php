@extends('layouts.student.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h4 class="card-title mb-4">Payment List</h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped align-middle table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Transaction ID</th>
                                    <th>Payment Date</th>
                                    <th>Amount</th>
                                    <th>Due Amount</th>
                                    <th>Payment By</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $payment->payment_id }}</td>
                                    <td>{{ $payment->payment_date }}</td>
                                    <td>{{ $payment->amount }}</td>
                                    <td>{{ $payment->due_amount }}</td>
                                    <td>{{ $payment->payment_type == 1 ? 'SSL Commerze' : 'Paypal' }}</td>
                                    <td>
                                        @if($payment->payment_status == 'success')
                                        <span class="badge badge-success"> Success </span>
                                        @else
                                        <span class="badge badge-danger">Cancelled</span>
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
    </div>
</div>
@endsection
