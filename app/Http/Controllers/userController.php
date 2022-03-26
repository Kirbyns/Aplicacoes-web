<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index', compact('data'))->with('i',($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::pluck('name', 'name')->all();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $this->validate($request,['name' =>'required', 'email'=>'required|email|unique:users,email',
    'password' => 'required|same:confirm-password',
    'roles' => 'required']); //validação dos dados enviados
    $input = $request->all();

    $input['password'] = Hash::make($input['password']);
    $user = User::create($input); //cria o usuario

    $user->assignRole($request->input('roles')); //guarda o perfil do usuario

    return redirect()->route('users.index')->with('success','Usuário criado com sucesso'); //redireciona para a tela inicial com sucesso.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', compact('user'));//abri dados de um cliente quando clicado
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit', compact('user', 'roles','userRole'));
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
        $this->validate($request,['name' =>'required', 'email'=>'required|email|unique:users,email',
        'password' => 'required|same:confirm-password',
        'roles' => 'required']);

        $input =$request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);

        }else {
            $input = Arr::except($input,array('password'));
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($requst->input('roles'));

        return redirect()->route('users.index')->with('success', 'Usuario atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success', 'Usuario Removido com Sucesso');
    }
}