 $(document).ready(function(){
     function search_item(query=''){
        $.ajax({
          url:"{{ route('stocks.search')}}",
          method: 'GET',
          data : {query:query},
          dataType: 'json',
          success: function(data){
            $('tbody').html(data.table_data);
          }
        })
     }

     $(document).on('keyup','#search',function(){
          var query = $(this).val();
          search_item(query);
     });
  });