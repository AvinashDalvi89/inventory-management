<!-- edit.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Item
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
      <form method="post" action="{{ route('stocks.update', $item->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Item Name:</label>
              <input type="text" class="form-control" name="item_name" value="{{$item->item_name}}"/>
          </div>
          <div class="form-group">
              <label for="price">Item Type :</label>
               <select name="item_type" class="form-control" >
                <option value="0"> Select Item</option>
                <option value="1" <?php echo ($item->item_type == '1') ? 'Selected': '' ?> > Mobiles</option>
                <option value="2" <?php echo ($item->item_type == '2') ?  'Selected': '' ?>>Cars</option>
              </select>
               
          </div>
          <div class="form-group">
              <label for="quantity">Item Quantity:</label>
              <input type="text" class="form-control" name="item_quantity" value="{{$item->item_quantity}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Item Description:</label>
              <textarea class="form-control" name="item_descriptipn">{{$item->item_description}}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update Item</button>
      </form>
  </div>
</div>
@endsection
