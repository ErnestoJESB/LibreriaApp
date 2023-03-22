<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function MiPerfil()
    {
        return view('modulos.MiPerfil');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Indicamos que usaremos todos los registros de la tabla users 
        $usuarios = Usuarios::all();
        return view('modulos.Usuarios')->with('usuarios', $usuarios);
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
        $datos = request()->validate([
            'name' => ['string', 'max:255'],
            'rol' => ['required'],
            'email' => ['email', 'unique:users'],
            'password' => ['string', 'min:3']
            ]);

            Usuarios::create([
                'name' => $datos['name'],
                'rol' => $datos['rol'],
                'email' => $datos['email'],
                'password' => Hash::make($datos['password']),
                'documento' => '',
                'foto' => '',
            ]);
            return redirect('Usuarios')->with('UsuarioCreado','OK');
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuarios)
    {
        //
    }
    
    public function edit(Usuarios $id)
    {
        if(auth()->user()->rol != 'Administrador'){
            return redirect('inicio');
        }
        $usuarios = Usuarios::all();
        $usuario = Usuarios::find($id->id);
        return view('modulos.Usuarios', compact('usuarios', 'usuario'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuarios::find($id);
	
        if($usuario["email"] != request('email')){
           $datos=request()->validate([
            'name' => ['required'],
            'rol' => ['required'],
            'email' => ['required', 'email', 'unique:users']
        ]);
         }else{
        $datos=request()->validate([
          'name' => ['required'],
          'rol' => ['required'],
          'email' => ['required', 'email']
        ]);
        }
        if($usuario["password"]!=request('password')){
        $clave=request("password");
    }else{
        $clave=$usuario["password"];
         }
         DB::table('users')->where('id', $usuario['id'])->update(['name'=>$datos["name"], 'email'=>$datos["email"], 'rol'=>$datos['rol'], 'password'=>Hash::make($clave)]);
         return redirect('Usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuarios::find($id);
        $exp = explode("/", $usuario->foto);

        if(Storage::delete('public/'.$usuario->foto)){
            Storage :: deleteDirectory('public/'.$exp[0].'/'.$exp[1]);
            Usuarios::destroy($id);
        }

        return redirect('Usuarios');
    }

    
//Función que se ejecuta cuando se da click en el botón Guardar perfil 
public function MiPerfilUpdate(Request $request){
    //Verificar si el correo actual es diferente al correo enviado por el formulario.   
    //Lo que significa que se quiere actualizar.    
    if(auth()->user()->email != request('email')){
        //Si se quiere actualizar la contraseña        
        if(request('passwordN')){        
                //Se crea un array con los datos validados,        
                //si los datos no cumplen las reglas de validación no se consideran para actualizar        
                $datos = request()->validate([
                'name'=>['required', 'string', 'max:255'], 
                'email'=>['required', 'email', 'unique users'], 
                'passwordN'=>['required', 'string', 'min:3']
                ]);
        }else{
                $datos = request()->validate([        
                'name' => ['required', 'string', 'max:255'], 
                'email' => ['required', 'email', 'unique:users']            
                ]);
            }
            //Sino se quiere actualizar el correo
        }else{
            if (request('password')){  
            $datos = request()->validate([   
            'name' => [ 'required', 'string', 'max:255'],   
            'email' => [ 'required', 'email'],   
            'passwordN' => [ 'required', 'string', 'min:3']   
            ]);   
            }else{   
            $datos = request()->validate([   
            'name' => [ 'required', 'string', 'max:255'],    
            'email' => [ 'required', 'email']    
            ]);   
            }           
        }
            //Si se quiere actualizar el documento 
            if(request('documento')){
                $documento = $request['documento '];
            }else{
                $documento = auth()->user()->documento;
            }
            //Si se quiere actualizar la foto
        if(request('fotoPerfil')){
            Storage::delete('public/'.auth()->user()->foto);
                $rutaImg = $request['fotoPerfil']->store('usuarios/'.$datos ["name"], 'public');  
            }else{
                $rutaImg = auth()->user()->foto;
            }
        //Si se quiere actualizar la contraseña y cumple con la regla 
        if(isset($datos ["passwordN"])){
            DB::table('users')->where('id', auth()->user()->id)->update(['name' => $datos ["name"], 
            'email' => $datos ["email"], 'documento' => $documento, 'foto' => $rutaImg,
            'password' =>Hash::make(request("passwordN"))]);
            }else{    
            DB::table('users')->where('id', auth()->user()->id)->update(['name' => $datos ["name"], 
            'email' => $datos ["email"], 'documento' => $documento, 'foto'=>$rutaImg]);    
            }
            
            //Después de actualizar redireccionar a la misma vista "MiPerfil" 
            return redirect('MiPerfil');

        }    
}

