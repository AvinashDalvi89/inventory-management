<!-- index.blade.php -->

@extends('layout')
 

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="row" style="margin-top: 20px;">
  <div class="col-12">
    <h2 class="heading">List of items inventory</h2><br>
    <a class="btn btn-primary pull-right" href="{{ route('stocks.create') }}">Add Item</a>
  </div>
</div>
<div class="row" style="margin-top: 30px;">
  <div class="col-6">
    <input type="text" name="search" id="search" class="form-control" placeholder="Search Item" >
  </div>
</div>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead class="table-heading">
        <tr>
          <td>ID</td>
          <td>Item Name</td>
          <td>Item Type</td>
          <td>Item Quantity</td>
          <td>Item Description</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
      @include('item_data')
    </tbody>
  </table>
  
<div>
 <script type="text/javascript">
    $(document).ready(function(){
     function search_item(page = 1,query=''){
        $.ajax({
          url:"/stocks/search-data?page="+page+"&query="+query,
          success:function(data){
            $('tbody').html(data);
          }
        })
     }

     $(document).on('keyup','#search',function(){
          var query = $(this).val();
          var page = $('#hidden_page').val();
          search_item(page,query);
     });
     $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);

        var query = $('#search').val();

        $('li').removeClass('active');
        $(this).parent().addClass('active');
        search_item(page,query);
    });
  });
 </script>
@endsection