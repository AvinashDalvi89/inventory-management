  @foreach($stocks as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->item_name}}</td>
            <td>{{$item->item_type}}</td>
            <td>{{$item->item_quantity}}</td>
            <td>{{$item->item_description}}</td>
            <td><a href="{{ route('stocks.edit',$item->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('stocks.destroy', $item->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

  <tr>
    <td colspan="7" align="center">
      {{ $stocks->links() }}
    </td>
  </tr>