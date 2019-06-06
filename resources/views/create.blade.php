<!-- create.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Item Into Inventory
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('stocks.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Item Name*:</label>
              <input type="text" class="form-control" name="item_name"/>
          </div>
          <div class="form-group">
              <label for="price">Item Type* :</label>
              <select name="item_type" class="form-control">
                <option value="0"> Select Item</option>
                <option value="1"> Mobiles</option>
                <option value="2">Cars</option>
              </select>
          </div>
          <div class="form-group">
              <label for="quantity">Item Quantity* :</label>
              <input type="text" class="form-control" name="item_quantity"/>
          </div>

          <div class="form-group">
              <label for="quantity">Item Description :</label>
              <textarea class="form-control" name="item_description"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Add Item</button>
      </form>
  </div>
</div>
@endsection