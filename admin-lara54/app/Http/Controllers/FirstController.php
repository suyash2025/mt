<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class FirstController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $flights = Post::all();

        //foreach ($flights as $flight) {
        //   echo $flight->name;
        //   }
        // $flights
        return view('first', ['user' => $flights]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //
        $this->validate($request, [

            'detail' => 'required',

        ]);

        $this->validate($request, [
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $imageName = time().'.'.$request->image_file->getClientOriginalExtension();
        $request->image_file->move(public_path('images'), $imageName);
       // return back()
           // ->with('success','You have successfully upload images.')
         //   ->with('image',$imageName);



        $detail=$request->input('detail');

        $dom = new \DomDocument();

        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){

            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);

            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);

            $image_name= "/upload/" . time().$k.'.png';

            $path = public_path() . $image_name;

            file_put_contents($path, $data);

            $img->removeAttribute('src');

            $img->setAttribute('src', $image_name);

        }

        $detail = $dom->saveHTML();

        $flight = new Post;

      //  $flight->name = $detail; // $request->detail;

        $flight->title = $request->title;
        $flight->content = $request->detail;
        $flight->thumbnail = $imageName;
        $flight->tag = 'default tag';

        $flight->save();
        return redirect('first');
      //  return view('first')->with('message', 'success');

       // return \Redirect::route('categories.show',
          //  array($category->id))
           // ->with('message', 'Your category has been created!');

       // dd($detail);



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
        //
        $flights = Post::all();

        //foreach ($flights as $flight) {
        //   echo $flight->name;
        //   }
        // $flights
        return view('first', ['user' => $flights]);

        //  return view('blog', ['user' => Post::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
