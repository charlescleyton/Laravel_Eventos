<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento;
use App\Models\User;

class EventController extends Controller
{
    public function index()
    {
        $search = request('search');
        if ($search) {
            $eventos = Evento::where([
                ['title', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $eventos = Evento::all();
        }
        return view('welcome', ['eventos' => $eventos, 'search' => $search]);
    }

    public function criar()
    {
        return view('eventos.criar');
    }

    public function store(Request $request)
    {

        $evento = new Evento;

        $evento->title = $request->title;
        $evento->date = $request->date;
        $evento->city = $request->city;
        $evento->private = $request->private;
        $evento->description = $request->description;
        $evento->items = $request->items;

        // image upload

        if ($request->hasFile('image') && $request->file('image')->isvalid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/eventos'), $imageName);

            $evento->image = $imageName;
        }

        $user = auth()->user();
        $evento->user_id = $user->id;


        $evento->save();

        return redirect("/")->with('msg', 'Evento Criado com Sucesso');
    }

    public function show($id)
    {
        $evento = Evento::findOrFail($id);

        $eventOwner = User::where('id', $evento->user_id)->first()->toArray();

        return view('eventos.show', ['evento' => $evento, 'eventOwner' => $eventOwner]);
    }

    public function dashboard()
    {

        $user = auth()->user();

        $eventos = $user->eventos;

        return view('eventos.dashboard', ['eventos' => $eventos]);
    }

    public function destroy($id)
    {
        Evento::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
    }

    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        return view('eventos.edit', ['evento' => $evento]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isvalid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/eventos'), $imageName);

            $data['image'] = $imageName;
        }
        Evento::findOrFail($request->id)->update($data);
        return redirect('/dashboard')->with('msg', 'Evento Editado com Sucesso!');
    }
}
