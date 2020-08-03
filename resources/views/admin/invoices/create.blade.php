@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h4>Autocomplete from database</h4>
            <hr>

            <div class="form-group">
                <label>Product</label>
                <input id="product_id" name="product_id" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label>Name</label>
                <input id="name" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label>Buy Rate</label>
                <input id="buy_rate" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label>Sale Price</label>
                <input id="sale_price" type="text" class="form-control">
            </div>

        </div>
    </div>
</div>


@endsection
