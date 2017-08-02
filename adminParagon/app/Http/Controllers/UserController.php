<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = \App\User::paginate(4);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $user = new User($request->all());
        $user->password = bcrypt($request->password);

        $count = User::where('email', $user->email)->count();
        //dd($count);
        if ($count<=0)  // si no encuentro el mail guardo
        {                       
            if ($user->save()) 
            {
                 flash('El usuario se creo correctamente!')->success();
                 return redirect('users');
            }else
            {
                 flash('Disculpa! el usuario no se pudo crear.')->error();
                 return view('users.create');
            }
        } else
        {   
            flash('El email ingresado ya se encuentra en la base de datos!')->error();
            return view('users.create');
        }
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
        return view('users.edit', ['user' => User::findOrFail($id)]);
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
        $user = User::find($id); 

        $user->name = $request->name;
        $user->email = $request->email;
        $user->sex = $request->sex;

        if (!$request->type) {
           $request->type = 'member';
        }

        $user->type = $request->type;

        if($request->avatar != null or $request->avatar){
            $user->avatar = STAPLER_NULL;
            $user->avatar = $request->avatar;
             
        }
        
        if ($user->save()) {
            flash('El usuario '. $user->name .' se actualizó correctamente!')->success();
            return redirect()->route('users.edit', $user->id);
        }else
        {
             flash('Disculpa! el usuario no se pudo crear.')->error();
             return redirect()->route('users.edit', $user->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->delete()) {
            flash('Usuario eliminado correctamente!')->success();
            return redirect('users');

        } else{
            flash('No se pudo eliminar el usuario!')->error();   
            return redirect('users');
        }
    }
}
