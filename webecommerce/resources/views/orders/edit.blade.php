@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Order</h2>

        <form action="{{ route('orders.update', $order->id_order) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id_user">User</label>
                <input type="text" id="id_user" class="form-control" value="{{ $order->user->fullname }}" disabled>
            </div>

            <div class="form-group">
                <label for="order_date">Order Date</label>
                <input type="date" id="order_date" class="form-control" value="{{ $order->order_date }}" disabled>
            </div>

            <div class="form-group">
                <label for="total_amount">Total Amount</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="text" id="formatted_total_amount" class="form-control" value="{{ number_format($order->total_amount, 0, ',', '.') }}" disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <button type="submit" class="btn btn-pink">Update Status</button>
        </form>
    </div>

   
@endsection
