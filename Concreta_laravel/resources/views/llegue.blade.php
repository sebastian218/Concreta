
<h1>Llegué acá</h1>
@php
use App\User;
use App\Muro;
use App\Mensaje;
use App\Rubro;
use App\Calificacione;
use App\Especialidade;
use App\Zona;
use App\Usuario_zona;
use App\Usuario_especialidades;

  //factory(User::class, 50)->create();
  //factory(Muro::class, 100)->create();
  //factory(Usuario_zona::class, 50)->create();
  factory(Usuario_especialidades::class, 50)->create();
@endphp
<p>LLegué</p>
