<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stocks;
use DB;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        // $search = $request->get('query');
        // //echo "<pre>";
        // //var_dump($request->get('query'));exit();
        // if (is_null($search))
        // {  
        //    $stocks = DB::table('stocks')->paginate(4);
        //   // var_dump($stocks);exit();
        //    return view('index', compact('stocks'));   
        // }
        // else{
        //     $stocks = DB::table('stocks')
        //                ->where('item_name','like','%'.$search.'%')
        //                ->orWhere('item_type','like','%'.$search.'%')
        //                ->orderBy('id','desc') 
        //                ->paginate(4);

        //    // var_dump($stocks);exit();

        //     return view('index', compact('stocks'))->render();   
        // }
        //$stocks = Stocks::all();
        $stocks = DB::table('stocks')->paginate(4);
        // //$stocks = Stocks::search()->orderBy('id')->paginate(4);

        return view('index', compact('stocks'));

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
         'item_name' => 'required|max:255',
         'item_type' => 'required|alpha_num',
         'item_quantity' => 'required|numeric',
         'item_description' => 'max:255',
     ]);
     $stocks = Stocks::create($validatedData);

     return redirect('/stocks')->with('success', 'Item is successfully added into inventory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $item = Stocks::findOrFail($id);

       return view('edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'item_name' => 'required|max:255',
            'item_type' => 'required|alpha_num',
            'item_quantity' => 'required|numeric',
            'item_description' => 'max:255',
        ]);
        Stocks::whereId($id)->update($validatedData);

        return redirect('/stocks')->with('success', 'Item is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Stocks::findOrFail($id);
        $item->delete();

        return redirect('/stocks')->with('success', 'Item is successfully removed from inventory');
    }
    
    /**
     * Seach item from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */

    public function search_data(Request $request){
       //var_dump($request);exit;
       if($request->ajax()){ 
          $query = $request->get('query');
          $page = $request->get('page');
          $query = str_replace(" ", "%", $query);
          $stocks = DB::table('stocks')
                    ->where('item_name', 'like', '%'.$query.'%')
                    ->orWhere('item_type', 'like', '%'.$query.'%')
                    ->orWhere('item_description', 'like', '%'.$query.'%')
                    //->orderBy($sort_by, $sort_type)
                    ->paginate(5);
      return view('item_data', compact('stocks'))->render();
       }
    }
}
