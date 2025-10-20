<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4Q5lU2jaMAxTvURr',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reset-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LjLNttMVtgJrydHf',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/profile-information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-profile-information.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/confirm-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RhuK6c275oMsz3qe',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/confirmed-password-status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.confirmation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/two-factor-challenge' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'two-factor.login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uYIsL6CKH5cqw9xV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/two-factor-authentication' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'two-factor.enable',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'two-factor.disable',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/confirmed-two-factor-authentication' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'two-factor.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/two-factor-qr-code' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'two-factor.qr-code',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/two-factor-secret-key' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'two-factor.secret-key',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/two-factor-recovery-codes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'two-factor.recovery-codes',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QVGIzndmRwYv4wQi',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.show',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/teams/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teams.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/current-team' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'current-team.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vAM6LWhrypCp1Gev',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/upload-file' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.upload-file',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/livewire.js' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ugxoXhtKg3YRvxzI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/livewire.js.map' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::c3tY5te7Wtj8NuH7',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8RDUacBrEdeOtqaf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OTX49dmQKdHJzWrP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard_uno' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kIGPux7ebEN8pjMf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard_dos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::J5ZWj3yFl2KBqpua',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/actualizar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8P8g4IC7JwpSpXCM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cumpleanos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LOAoWPmLEhm8vbZP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/agenda2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::30Gvj0UVJUhgBM9a',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agenda2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::iqj1SFrfICIGKekp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agenda2/inicio' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LbYqKSvZbneDijLf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agenda2/tablaeventos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UcgVfuJ6FuS98ZWa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agenda2/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::McRtGwrBlIhnY4Dj',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0dZPGNN8q1hJFytS',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agenda2/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ifQzcwyZ672cFT0O',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agenda2/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bL5wJOjjA8pLKKVk',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agenda2/calendario' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DmZDX10TuBcofR83',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agenda2/VerEvento2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PgrRoyqwaj8Jb4He',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agenda2/TraeDias' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VYahr1WowMlbhUgA',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agenda2/TraerDatosAgenda' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jAVUep8tV8W04nra',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agenda2/TraerDatosCita' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::E93bCQrvlU3lWVBs',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agenda2/TraerDatoFechaEspecifica' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::x73tYLIzLRLmeqTM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agenda2/traerHoras' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::F9bsUfEd8kEvNsR5',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agenda2/TraerClienteNum' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::czFP5VAYuTbrASFP',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agenda2/EliminarCita' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::H1QIfW18LHhaaLYs',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agenda2/ExisteCliente' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WeKFMcUKgopVN6cL',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agenda2/AgregarClienteEspera' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jXY63rYrOEuKOTwh',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agenda2/ClienteAgendado' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UpJ8ECdyr1et1SaZ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/usuarios' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::k245lQXqIcdjPr3G',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fZtwoXnIjFA35Hyw',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/tablausuarios' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wWLNBKMWDsaENsJJ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mXrzQSIjxzeF0ZgN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kmRtP3j6btGC2axX',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bcJ1AEzehn8lfd79',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/roles/tablaroles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::I1uW72Aj2HdUyLat',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/roles/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7uX76PFntObob6W0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xnsiP1RYwhf5TvUb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/roles/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QcrdEADuLdb3XjMe',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/permisos/tablapermisos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NxnoOX128rZKdrBw',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/permisos/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::orAH7h0M13xc2bq2',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FhExPbmelvUbgCZl',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/permisos/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UOH4aemdCLxwtHib',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/permisos/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::W1MsAuFzXAHqcjDf',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/permisos/virificarpermiso' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5gj4TDqZsWyFH6u3',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/negocios/tablanegocios' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::g7beeoJw8qjwkU1E',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/negocios/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::i4lWvVtw1mZblsQ1',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fiEq85Tj5oxQuUoM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/negocios/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PzbEac6iSkcwxqc5',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/negocios/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jQHU76sn97hbjRRD',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/archivos/tablaarchivo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7h33mXkwBlDqFaBq',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/archivos/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1cFtxSXqfpsvvXC9',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::T0yOn7dQ2KrChhWP',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/archivos/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YXnKSQoklcgxcfcc',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usuarios/archivos/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9WIvK7SU6bDNfv4S',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/agendas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EkeyVBMyasZDsQSA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MqbBjZEtHAyI9KbO',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/inicio' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LE7TvtokivFYrDWn',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/tablaeventos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LAmhSI3Nv0n6bsI2',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9RYuwUsCNOhSdXV2',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jjdkI2L47aajcWz0',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mIixyA93gE2iNtbT',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pcsK6wcBhjd3ASdo',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/calendario' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kQdMfFqlD7bkSOfm',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/VerEvento2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yizaJrpQom0TtPwM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/TraeDias' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pNCctKGTWOc9Te3a',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/TraerDatosAgenda' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FLXBYmWTWDkLST7l',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/TraerDatosCita' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Kj5GoV0vG2uPNSKP',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/TraerDatoFechaEspecifica' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::P8ZggxAdmJQuOxaF',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/traerHoras' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vaudTZJwOr314rh9',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/TraerClienteNum' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZJoSPvaeV7xGDdgI',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/EliminarCita' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ABXkQ7dRnOeLuXuu',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/ExisteCliente' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wwbpLZs84hzIfR4R',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/guardarPago' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0yJcz63lSh33Hp3C',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/AgregarClienteEspera' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ltuq8XCI123f7xmJ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/ClienteAgendado' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nd0R7aB5SXLZgUUF',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/TraerServicio' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7eZo4sA06G4MjY7c',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/traerCita' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wcE3v29av9PmcAWb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/ExisteCita' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hU6Kq26ZfCzzzIMy',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/TraerProductillos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8YOQED95eOE8mpBx',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agendas/TraerDatosEmpleado' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EA7ZTVGhNRtKaMzl',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/catalogos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Z2E60t8zHDuuoj8N',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/servicios' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UbR0nDqpgcrnndfL',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/servicios/tablaservicios' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UfilpSlPVHfo8q80',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/servicios/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9JCYxPBkPX5ooRF9',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::84z7TTirjBYpJKji',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/servicios/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7uLimxPXZwuhbdgj',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/servicios/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aRldlAeGnqGxoube',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/productos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SL2Gb2iu08BlJBf8',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/productos/tablaproductos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Wg0ivNU9bQwA1zG7',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/productos/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::67ATe9glDa796w33',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lRf3FTswyToTrMDR',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/productos/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::S0TdZbInjBbNfQrj',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/productos/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GdaGvBHR1EcLP3vB',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/listados' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lBbT026NxMgn29UI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/listados/GuardarProductos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::K4LHxNO4TXHERwPy',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/listados/TraerProductos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ce6HZVYlqftR45ne',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/listados/EliminarProductos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gvqS7f3WoUsN3IzA',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/listados/descargarProductos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sLm2WEqCo4koGnxZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/alaciados' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LVDD0visbkDQRUuc',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/alaciados/tablaalaciados' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eNH5sxnu3bNJyeBI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/alaciados/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7Dq9gY8zb2qhhzJy',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wwfWqhfImdEU2k6R',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/alaciados/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IJhiFkiCOkCWOsxl',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/alaciados/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0JdCsesGbv2Wc9Pf',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/cabellos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IPq82Dzw7q5I3YdX',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/cabellos/tablacabellos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VOGApnBdycqUCV0Q',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/cabellos/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hKtvv2P6xlpQTK7Y',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tNgUfOY54xf9gsmW',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/cabellos/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::A4RCviaYlNhe1L1p',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/cabellos/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Gd2LpKBGagtUuwwB',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/fasts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pbVe9KoO6wkf84rg',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/fasts/tablafasts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fQBiC7LRmP8xrbGZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/fasts/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ryt9dIZAtCWvkhP9',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1bGww2Uc1WAlY7c6',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/fasts/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fI7URzvdF7JnUtqQ',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/fasts/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UuViUHwaxoRPh4ro',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/peinados' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jQn5uCS9rKLAMGYv',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/peinados/tablapeinados' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cWAthvjZKHRnjiBk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/peinados/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GWFbZjFFWpgmnJOF',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::72bJM8A1Twi3WLRm',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/peinados/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UVnq68q8TpuhZx1H',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/peinados/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XmcgCSUxfQXwtf2q',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/pestanas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::N7AVFkITmoFn1fKp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/pestanas/tablapestanas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EVT5ngPRquFpx8AV',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/pestanas/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TBgqZawgIa1GR6uM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uInQflMEE9rhRWs0',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/pestanas/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gE5M3CH28YcIS50T',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/pestanas/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jV0D1NrPqabkbvJq',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/servicios_a' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qmqFoOdhXKwSPVvZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/servicios_a/tablaservicios_a' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BXrWwVRgNbooYfK0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/servicios_a/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fFENvPdVlrhIPCYJ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jdqKsc4j8C0NBIZC',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/servicios_a/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vYBqAdYFpRqqpayu',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/servicios_a/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bgXztIVFV3en48ra',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/servicios_ex' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1b2o5MWSBjxaC9YN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/servicios_ex/tablaservicios_ex' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0VeT67y0FKB1jWMl',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/servicios_ex/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HcpOjxeP8mCOlSjj',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kz5qy49pW9DERX2Q',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/servicios_ex/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WjOHFkBhyCvZPGQS',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/servicios_ex/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uzYC8OBTtzzv8Xpu',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/shellacs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CkHXrnjogjVau5Ms',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/shellacs/tablashellacs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5dq33p5StOwX5BYn',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/shellacs/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3AKX1uCVBWDB2Gcu',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KM31A74dqouOomvu',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/shellacs/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Asps6f4gs2CXr1lk',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos/shellacs/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ALZJu59zRYg8dpyp',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/catalogos2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UihUMjfMJaZ4EyII',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fvszn49nbl3g9kdd',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos2/servicios' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JHaTaKRq9kx6QijG',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos2/servicios/tablaservicios' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::22wnkirKJMPK0LFo',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos2/servicios/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vnHrhhNOp1ruSvVi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::P5TfNF3Yd3eDOcUk',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos2/servicios/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aeF7rMMmg61klwl3',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos2/servicios/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JwDrb3I1jJjK5tTN',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos2/productos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rrKukN2jmzjfqOUe',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos2/productos/tablaproductos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AsgIQwzFUGCFnEdK',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos2/productos/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KNuM8xL9xXhHiusN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UWTGra5Mmkssj14j',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos2/productos/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NggoCgjc7xiHLvPz',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos2/productos/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6Mov15hZBI0Sr4eL',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos2/listados' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::B9M127V6YPvrf06r',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos2/listados/GuardarProductos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KycmJb1pepUe8ayz',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos2/listados/TraerProductos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NwU9ZrGHo0SNVBIc',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos2/listados/EliminarProductos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mXOzoZeWvUZIfQB0',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogos2/listados/descargarProductos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uJqkZiob5rbROzaK',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/clientes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GgwFvkWA04SL5F1V',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clientes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oN5MY0Hi09aF40Pe',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clientes/tablaclientes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sPs0ogxXXvjn8q0l',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clientes/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::059rK3KHrKJ5WYkT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8XYk8jdInixqQUIL',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clientes/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DWv1u75uecgSywDN',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clientes/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DwvFaEjJfVgexxrJ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/clientes2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4q3SMZ55hg1BqSQV',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clientes2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3xBxn1J8jbQtZah6',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clientes2/tablaclientes2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::objEoFtSCGcB6YEo',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clientes2/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GstgqO1PJaLdqSmI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eftlqibey5G7eJDg',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clientes2/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XIQ3gSti9y9AbIf3',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clientes2/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cVkSIESgswpfp6Dx',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/empleados' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NsEKTwcAEhqvo2Vz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/empleados' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8kAUmp2CrWItIFYm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/empleados/tablaempleados' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0SEMd3e6otNmyke1',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/empleados/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6ZiYYtJ91z9P5aoW',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::M7WrortM3MoqYje3',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/empleados/createImagen' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xEjgSa2VccJtr5PK',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/empleados/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EoTGACQWEtBqewZS',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/empleados/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BW45XxehgK84hvRv',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/empleados/Crearusuariocajero' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nmPATgawcl0SaZPk',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/empleados/GuardarDias' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1FHrbgILIBr2ai0X',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/empleados/ListAVacaciiones' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TNIwdDznQD0vVOAV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/empleados2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GtiGRL8rEsZN4Tln',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/empleados2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5hXZaO2OcsAOHW04',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/empleados2/tablaempleados2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5LOhqzFEyIySY21N',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/empleados2/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xOx73cTjSV7WU3DB',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fO7MViY6psoDgQIM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/empleados2/createImagen' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CH7DshOPOz6GKgcB',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/empleados2/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zwAiyoH5f4Qrex7L',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/empleados2/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rxroV4yWZfdfxDIe',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/empleados2/Crearusuariocajero' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::X1KUsBwwHOpZlhoW',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/empleados2/GuardarDias' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mIlnVkWoyvISKnl4',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/empleados2/ListAVacaciiones' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HurQBbTbmraGfQUe',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/expedientes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::e5u6MoFjOeHwX7sM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/expedientes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HeTZb0gfg6Go2ckT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/expedientes/tablaexpedientes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hKLOEhuWADF1F90x',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/expedientes/tablaCarpeta' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::d7Xyon1ao3qtmDuw',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/expedientes/tablaServicios' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sNlxI981kKfWbW2C',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/expedientes/TraerServicio' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5nj885VyugUFDOgJ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/expedientes/GuardarExpediente' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cEvOrkEHmGJ8VCa7',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nomina' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kpjJSRReKkm5dYuA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/nomina' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::K1mXedI959Ig0NdP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/nomina/tablanomina' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xdIjRgb0NytgVQ6s',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/nomina/tablahistorial' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Rd3BvuALmDLEroKV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/nomina/BuscarPagos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dp8JaVQz1mynW1Hk',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/nomina/crearHistorial' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6S2b0yxVjC96IbX7',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/nomina/TrerComisionesExtras' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wBjbgGKOZ8FrcptN',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nomina2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eDWSFiUwnlcbr3QA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/nomina2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hwslCEQvTGRFjX7Q',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/nomina2/tablanomina2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sXaVI1sWeCWfVcyY',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/nomina2/tablahistorial' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qiXB0MPm0PzfEWl3',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/nomina2/BuscarPagos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kpDa8synGl76gLvn',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/nomina2/crearHistorial' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WttWiabK8GsibUYw',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/nomina2/TrerComisionesExtras' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4glgUmLrejCfQt0g',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/promociones' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BT7o38wGFGyePjQU',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/promociones' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dukUm3m3fs7o1cHi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/promociones/tablapromociones' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SZgU1C6KLgJKUNnk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/promociones/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::M89hhWTHFeuxV4et',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LzMOoPlhiSYcMnJO',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/promociones/createcumpleanos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5Yr6MuKfOxFvgu4i',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/promociones/creates' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dIkV9JPGwrQaBaIc',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/promociones/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pAbJQJA3WRU6ymH6',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/promociones/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tkYnWrKcyLos2nvG',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/promociones2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gVV6eh8HbeDVIvCQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/promociones2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UAscV1ECG3C5uhss',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/promociones2/tablapromociones2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fCg5rdj9LRegLJHc',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/promociones2/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yg5Fzb4nv5oSbUDk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eFVtmwO27WNABKUP',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/promociones2/createcumpleanos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YCJhQE171TrxM3rZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/promociones2/creates' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3bIO4RFenXn37rMr',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/promociones2/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cYpkH2YyhFO9nQIN',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/promociones2/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ksg3xXJJKbrPrWDH',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/proveedores' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wsiKTK2kOTFfOSgn',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/proveedores' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mH9PUZ8YtOhnEoav',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/proveedores/tablaproveedores' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aPcn38N6mOTS7BHw',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/proveedores/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dWoNAc6UBcltzkKa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7Hy6hJrFh1RPN8e7',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/proveedores/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lUrguqrAkJt43jTK',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/proveedores/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YWluJ1QZkHkM9kuo',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/proveedores2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JM0aU6Emnulol79d',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/proveedores2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9TS2r0JGEgvyNsR0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/proveedores2/tablaproveedores2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oWjklWzuyiNYBsyN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/proveedores2/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CfAQYOrlBIVN0X6r',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5O9Dv3KyuFlM1cTb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/proveedores2/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JUv5L7TlvU9YRcvq',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/proveedores2/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DqCaMG3unkzNICJ8',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/reportes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jRzKqHzF7LdrP8UC',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reportes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bZA5e6YTjE56VvZd',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/reportes2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vTpk5ZohTLtySTUs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reportes2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZGfgONgHoI2xE61m',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/ventas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ocKtWaQyr2a6yYsr',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HL1atovFvVuBsgF5',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/traerTratamiento' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::s3wSAZ5B7oYEd297',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/agregarcliente' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6NK1qmwnatfzOVR6',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/traerProducto' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::h70RZT1iYqOQOQhM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/TraerCupon' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xXwYUhAVLiWznMSd',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DymPtCRufHUaqsOS',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/traerPreventa' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::V4jn0Q1U6Ql9p2bN',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/traerPreventa2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DDNWrcHLVK7ZIKZE',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/preventaPago' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::veN5TzTwUQUNh2cm',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/preventaPago2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WMttHZUHqZWFooev',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/NumerosLetras' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::x7K6UauIBuxACcyq',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/ver_ventas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yq7lwpNlAWtDgRoP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/tablaventas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BXKttapRN2XQiZPT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/preventas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9W2zEUok8mrVL9D0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/tablapreventas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SzEUb1uF3gfKHR1o',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/traerPreventas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::50BTqnCgNizKWVw0',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/tablaliquidaciones' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BGdibsSZgvgO7QxI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/traerLiquidacion' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xng61DMHOf7wpdJb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/abonoPago' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::m81mPakpwFbGEYUs',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/articulos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DtFaPWrC6wzxl2uf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/tablaProductosVenta' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9LFyjYjZeSqk07tA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/traerProductos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::moiO07i2VccC1oDO',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/certificados' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Iy11RZOy3YZlaNWZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/certificados/tablacertificados' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Qi3reUA9unImqcG0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/certificados/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2esphKcpyQXA6ZXl',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kPIW7dbrHOi9bxKL',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/certificados/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zopLtClmhBnXQNuE',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas/certificados/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3JFT4xljpazo2Ll6',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/ventas2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kupJlE5ZW8TTS5zx',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pF3WjBQd0PFU7l6a',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/traerTratamiento' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BPhRWUUGoPuR4S4S',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/agregarcliente' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eDbmADMmkkcHJxXu',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/traerProducto' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OqRejNg6iU2nSFnl',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/TraerCupon' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CspS2djgS5MhFjJ9',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QtfGV0Mt2qGG2nWp',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/traerPreventa' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dVzqNAqv05enHi2A',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/traerPreventa2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Op2oWxNKSpzxQUTs',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/preventaPago' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ojgGoNUQNZXBqR5i',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/preventaPago2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ll784PIuBbxkCXJ6',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/NumerosLetras' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ThcJmC6wYQpdMtZd',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/ver_ventas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::B3b1fMoh599xObno',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/tablaventas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wu9qHsq1qx6NXbo6',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/preventas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MpoiLgeUtd1E8ME4',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/tablapreventas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ebjlnJ9VstgpF4O9',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/traerPreventas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::d664hB5tr4M7uOYq',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/traerProductos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nAhXEwoMsuiekFAX',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/tablaliquidaciones' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9SandsD3FVRLKAZz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/traerLiquidacion' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::K0JSMNbqm7yujj1Z',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/abonoPago' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CeRIym3g4Fwf3nmY',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/articulos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7oDpmhNbrila9VKN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/tablaProductosVenta' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fmsDiSc8u7C0kszZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/certificados' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ncWlIUzA9WEIPwlt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/certificados/tablacertificados' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hEXARV5IYnMfCjuw',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/certificados/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wM5zT2ONZvQrDao3',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NoKY4atktXWo9VN2',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/certificados/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YGJazlRNb8tamElE',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ventas2/certificados/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::g5Z2XXKa9YrM60LX',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/re(?|set\\-password/([^/]++)(*:35)|portes2/reporte(?|Cliente/([^/]++)/([^/]++)/([^/]++)(*:94)|Empleado/([^/]++)/([^/]++)/([^/]++)(*:136)|Totales/([^/]++)/([^/]++)(*:169)))|/team(?|s/([^/]++)(*:197)|\\-invitations/([^/]++)(*:227))|/livewire/(?|message/([^/]++)(*:265)|preview\\-file/([^/]++)(*:295))|/dashboard/([^/]++)(?|(*:326)|/edit(*:339)|(*:347))|/agenda(?|2/(?|([^/]++)/edit(*:384)|vista/([^/]++)(*:406))|s/(?|([^/]++)/edit(*:433)|vista/([^/]++)(*:455)))|/usuarios/(?|([^/]++)(?|/edit(*:494)|(*:502))|a(?|rchivos(?|(*:525)|/(?|([^/]++)/edit(*:550)|documento/([^/]++)(*:576)))|s(*:587)|pi(*:597))|tabla(?|archivos(*:622)|mensaje(*:637))|Eliminar(?|archivos(*:665)|Mensajes(*:681))|loginAs(*:697)|n(?|otificaciones(*:722)|egocios(?|(*:740)|/([^/]++)/edit(*:762)))|enviarnotificacion(*:790)|verMensajes(*:809)|roles(?|(*:825)|/([^/]++)(?|/edit(*:850)|(*:858)))|permisos(?|(*:879)|/([^/]++)/edit(*:901)))|/c(?|atalogos(?|/(?|s(?|ervicios(?|/([^/]++)/edit(*:960)|_(?|a/([^/]++)/edit(*:987)|ex/([^/]++)/edit(*:1011)))|hellacs/([^/]++)/edit(*:1043))|p(?|roductos/([^/]++)/edit(*:1079)|e(?|inados/([^/]++)/edit(*:1112)|stanas/([^/]++)/edit(*:1141)))|alaciados/([^/]++)/edit(*:1175)|cabellos/([^/]++)/edit(*:1206)|fasts/([^/]++)/edit(*:1234))|2/(?|servicios/([^/]++)/edit(*:1272)|productos/([^/]++)/edit(*:1304)))|lientes(?|/([^/]++)/edit(*:1339)|2/([^/]++)/edit(*:1363)))|/e(?|mpleados(?|/(?|([^/]++)/edit(*:1407)|documento/([^/]++)(*:1434))|2/(?|([^/]++)/edit(*:1462)|documento/([^/]++)(*:1489)))|xpedientes/(?|([^/]++)/vista(*:1528)|([^/,]++),([^/]++)/servicios(*:1565)|([^/]++)/(?|show(*:1590)|imprimir(*:1607))))|/nomina(?|/([^/]++)/(?|show(*:1646)|historial(*:1664)|pagos(*:1678))|2/([^/]++)/(?|show(*:1706)|historial(*:1724)|pagos(*:1738)))|/pro(?|mociones(?|/([^/]++)/edit(*:1781)|2/([^/]++)/edit(*:1805))|veedores(?|/([^/]++)/edit(*:1840)|2/([^/]++)/edit(*:1864)))|/ventas(?|/(?|([^/]++)/show_venta(*:1908)|certificados/([^/]++)/(?|edit(*:1946)|imprimir(?|(*:1966)|posterior(*:1984))))|2/(?|([^/]++)/show_venta(*:2020)|certificados/([^/]++)/(?|edit(*:2058)|imprimir(?|(*:2078)|posterior(*:2096))))))/?$}sDu',
    ),
    3 => 
    array (
      35 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      94 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wTAbfpjzKa2Eyu2Y',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'fecha1',
            2 => 'fecha2',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      136 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qJt3Qj9KPtDRQpQM',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'fecha3',
            2 => 'fecha4',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      169 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::iFdGThKvsbbbq5uM',
          ),
          1 => 
          array (
            0 => 'fecha5',
            1 => 'fecha6',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      197 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teams.show',
          ),
          1 => 
          array (
            0 => 'team',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      227 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'team-invitations.accept',
          ),
          1 => 
          array (
            0 => 'invitation',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      265 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.message',
          ),
          1 => 
          array (
            0 => 'name',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      295 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.preview-file',
          ),
          1 => 
          array (
            0 => 'filename',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      326 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.show',
          ),
          1 => 
          array (
            0 => 'dashboard',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      339 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.edit',
          ),
          1 => 
          array (
            0 => 'dashboard',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      347 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.update',
          ),
          1 => 
          array (
            0 => 'dashboard',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.destroy',
          ),
          1 => 
          array (
            0 => 'dashboard',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      384 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3b3ZqXxac98yvRCn',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      406 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NpaWqzCOQ1sw5xCt',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      433 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bQioE3xsmOVQ395R',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      455 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zpX6mqu3h1mcB0aA',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      494 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::puMWr2Pjby2PlHHU',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      502 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NhGUiO5eH69Kvzoa',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      525 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IJGv7RlcniMuDPP9',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EtcwfUZCzbtS6VOd',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      550 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bqXEIAfNSvzBnzjB',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      576 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zzlwTA1PUaINiu0m',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      587 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JBF0dupt2tDLLSAV',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      597 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nCjgDyz2LaaUrtB1',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      622 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nxr1oPtyGjYjDnCm',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      637 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cdEdSfBccMcIvGoA',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      665 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ICg3RxywVEso68lX',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      681 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UGNDKVONXOZmqyu3',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      697 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xpUs73NC4RH6H1eQ',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      722 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NK8f7bJdE06PcpK5',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      740 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9ZzSkKey8J25UsLD',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      762 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CcO2QaTymFuBYDWO',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      790 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VxYr7pLlFmAQAIrp',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      809 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8yuRGrDckm0dsOL0',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      825 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZGMeiPZmEwBtzExQ',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      850 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pTOFtG3B3DJZPZf4',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      858 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tW4qyqEgaJqCxg6P',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      879 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::R3XxBDnkkIMXWuiv',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      901 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::csYbwJKCnWYTeK50',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      960 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lejZi5Qd9IxybmB4',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      987 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uTERqlmKYOrKr1yP',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1011 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1eLBZTnWzOp1aRqz',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1043 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lYJ4itpmnoNrtw7b',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1079 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vyDp1PX4hSb2MNC0',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1112 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xZBUrgHuePizfROy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1141 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SwWMUOhAHsnzmoO8',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1175 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XL1iW8Uk1NwMaHwr',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1206 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nWWeMeKyMexagw8g',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1234 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2OQbNfWLaJnNYVlv',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1272 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lD9T7AfkICJJqX8K',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1304 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nhBLenR2AhHCgva1',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1339 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xRHFgVp8QJvYowVc',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1363 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oSPPVQkY4pVMNeq0',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1407 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::t2CGkzGRXisImHVy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1434 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Kd0rK8rHWmZ9iHEk',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1462 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::p8Yj1KpdOGibeTtP',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1489 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yTNeUjavJo6czsKx',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1528 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ylA4YcLV1SJ2SeqL',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1565 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::igWkDBILAhFfL9UC',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'id_servicio',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1590 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::u8EvgsYtHctmYHF8',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1607 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::62RBrxt6fbx1zbQn',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1646 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JfGVX2dhEhWGJrvs',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1664 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mZBs5t3tgQlT9WuP',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1678 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uZobIgoNRT4gjoJu',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1706 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KeVsT4jWd9MeKne0',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1724 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9N5v9S1beYKj0t6I',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1738 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::E68HXh4cj61n6crE',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1781 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HUszn15VyjvUQyyx',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1805 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tRxzXXMjnzlfdMHW',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1840 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pxc3LpvhA9KtCdzv',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1864 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Y36o8wxbnuGvXmhg',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1908 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::u1ULVn7JFy3QttOl',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1946 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5erIwtqTd1WVcL6f',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1966 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pX6x2FXNs4IaGDJU',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1984 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8maDM7eulq3X0GMN',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2020 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jRnuN6AgEEZRAXKW',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2058 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IMJ8VQa2IBvTQflT',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2078 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3DAfSMST0qW2xzlf',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2096 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XgZhNYd3EjhrTvQI',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:web',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\AuthenticatedSessionController@create',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\AuthenticatedSessionController@create',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4Q5lU2jaMAxTvURr' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:web',
          2 => 'throttle:login',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\AuthenticatedSessionController@store',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\AuthenticatedSessionController@store',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::4Q5lU2jaMAxTvURr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\AuthenticatedSessionController@destroy',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\AuthenticatedSessionController@destroy',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'forgot-password',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:web',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\PasswordResetLinkController@create',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\PasswordResetLinkController@create',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reset-password/{token}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:web',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\NewPasswordController@create',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\NewPasswordController@create',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'forgot-password',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:web',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\PasswordResetLinkController@store',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\PasswordResetLinkController@store',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reset-password',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:web',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\NewPasswordController@store',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\NewPasswordController@store',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:web',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\RegisteredUserController@create',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\RegisteredUserController@create',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LjLNttMVtgJrydHf' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:web',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\RegisteredUserController@store',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\RegisteredUserController@store',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::LjLNttMVtgJrydHf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-profile-information.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'user/profile-information',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\ProfileInformationController@update',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\ProfileInformationController@update',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user-profile-information.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-password.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'user/password',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\PasswordController@update',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\PasswordController@update',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user-password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RhuK6c275oMsz3qe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/confirm-password',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\ConfirmablePasswordController@show',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\ConfirmablePasswordController@show',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::RhuK6c275oMsz3qe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.confirmation' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/confirmed-password-status',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\ConfirmedPasswordStatusController@show',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\ConfirmedPasswordStatusController@show',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.confirmation',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/confirm-password',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\ConfirmablePasswordController@store',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\ConfirmablePasswordController@store',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'two-factor.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'two-factor-challenge',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:web',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\TwoFactorAuthenticatedSessionController@create',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\TwoFactorAuthenticatedSessionController@create',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'two-factor.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uYIsL6CKH5cqw9xV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'two-factor-challenge',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:web',
          2 => 'throttle:two-factor',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\TwoFactorAuthenticatedSessionController@store',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\TwoFactorAuthenticatedSessionController@store',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::uYIsL6CKH5cqw9xV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'two-factor.enable' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/two-factor-authentication',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
          2 => 'password.confirm',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\TwoFactorAuthenticationController@store',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\TwoFactorAuthenticationController@store',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'two-factor.enable',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'two-factor.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/confirmed-two-factor-authentication',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
          2 => 'password.confirm',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\ConfirmedTwoFactorAuthenticationController@store',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\ConfirmedTwoFactorAuthenticationController@store',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'two-factor.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'two-factor.disable' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'user/two-factor-authentication',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
          2 => 'password.confirm',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\TwoFactorAuthenticationController@destroy',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\TwoFactorAuthenticationController@destroy',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'two-factor.disable',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'two-factor.qr-code' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/two-factor-qr-code',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
          2 => 'password.confirm',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\TwoFactorQrCodeController@show',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\TwoFactorQrCodeController@show',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'two-factor.qr-code',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'two-factor.secret-key' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/two-factor-secret-key',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
          2 => 'password.confirm',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\TwoFactorSecretKeyController@show',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\TwoFactorSecretKeyController@show',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'two-factor.secret-key',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'two-factor.recovery-codes' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/two-factor-recovery-codes',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
          2 => 'password.confirm',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\RecoveryCodeController@index',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\RecoveryCodeController@index',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'two-factor.recovery-codes',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QVGIzndmRwYv4wQi' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/two-factor-recovery-codes',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
          2 => 'password.confirm',
        ),
        'uses' => 'Laravel\\Fortify\\Http\\Controllers\\RecoveryCodeController@store',
        'controller' => 'Laravel\\Fortify\\Http\\Controllers\\RecoveryCodeController@store',
        'namespace' => 'Laravel\\Fortify\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::QVGIzndmRwYv4wQi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/profile',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'Laravel\\Jetstream\\Http\\Controllers\\Livewire\\UserProfileController@show',
        'controller' => 'Laravel\\Jetstream\\Http\\Controllers\\Livewire\\UserProfileController@show',
        'namespace' => 'Laravel\\Jetstream\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'profile.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teams.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teams/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
          2 => 'verified',
        ),
        'uses' => 'Laravel\\Jetstream\\Http\\Controllers\\Livewire\\TeamController@create',
        'controller' => 'Laravel\\Jetstream\\Http\\Controllers\\Livewire\\TeamController@create',
        'namespace' => 'Laravel\\Jetstream\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'teams.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teams.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teams/{team}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
          2 => 'verified',
        ),
        'uses' => 'Laravel\\Jetstream\\Http\\Controllers\\Livewire\\TeamController@show',
        'controller' => 'Laravel\\Jetstream\\Http\\Controllers\\Livewire\\TeamController@show',
        'namespace' => 'Laravel\\Jetstream\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'teams.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'current-team.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'current-team',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
          2 => 'verified',
        ),
        'uses' => 'Laravel\\Jetstream\\Http\\Controllers\\CurrentTeamController@update',
        'controller' => 'Laravel\\Jetstream\\Http\\Controllers\\CurrentTeamController@update',
        'namespace' => 'Laravel\\Jetstream\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'current-team.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'team-invitations.accept' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'team-invitations/{invitation}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
          2 => 'verified',
          3 => 'signed',
        ),
        'uses' => 'Laravel\\Jetstream\\Http\\Controllers\\TeamInvitationController@accept',
        'controller' => 'Laravel\\Jetstream\\Http\\Controllers\\TeamInvitationController@accept',
        'namespace' => 'Laravel\\Jetstream\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'team-invitations.accept',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vAM6LWhrypCp1Gev' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::vAM6LWhrypCp1Gev',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.message' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire/message/{name}',
      'action' => 
      array (
        'uses' => 'Livewire\\Controllers\\HttpConnectionHandler@__invoke',
        'controller' => 'Livewire\\Controllers\\HttpConnectionHandler',
        'as' => 'livewire.message',
        'middleware' => 
        array (
          0 => 'web',
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.upload-file' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire/upload-file',
      'action' => 
      array (
        'uses' => 'Livewire\\Controllers\\FileUploadHandler@handle',
        'controller' => 'Livewire\\Controllers\\FileUploadHandler@handle',
        'as' => 'livewire.upload-file',
        'middleware' => 
        array (
          0 => 'web',
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.preview-file' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/preview-file/{filename}',
      'action' => 
      array (
        'uses' => 'Livewire\\Controllers\\FilePreviewHandler@handle',
        'controller' => 'Livewire\\Controllers\\FilePreviewHandler@handle',
        'as' => 'livewire.preview-file',
        'middleware' => 
        array (
          0 => 'web',
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ugxoXhtKg3YRvxzI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/livewire.js',
      'action' => 
      array (
        'uses' => 'Livewire\\Controllers\\LivewireJavaScriptAssets@source',
        'controller' => 'Livewire\\Controllers\\LivewireJavaScriptAssets@source',
        'as' => 'generated::ugxoXhtKg3YRvxzI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::c3tY5te7Wtj8NuH7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/livewire.js.map',
      'action' => 
      array (
        'uses' => 'Livewire\\Controllers\\LivewireJavaScriptAssets@maps',
        'controller' => 'Livewire\\Controllers\\LivewireJavaScriptAssets@maps',
        'as' => 'generated::c3tY5te7Wtj8NuH7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8RDUacBrEdeOtqaf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000a880000000000000000";}";s:4:"hash";s:44:"16CodEynVBHVATST0Tem+BZYpZTksJ+29+Wv6WXhN0s=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::8RDUacBrEdeOtqaf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OTX49dmQKdHJzWrP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:298:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:80:"function () {
    //return view(\'welcome\');
    return \\view(\'auth/login\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000a7f0000000000000000";}";s:4:"hash";s:44:"jFFdowVAct1SjBrx0E0QB+Yh8BTN7+7PXdq3xjkMYwE=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::OTX49dmQKdHJzWrP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
          2 => 'verified',
        ),
        'as' => 'dashboard.index',
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
          2 => 'verified',
        ),
        'as' => 'dashboard.create',
        'uses' => 'App\\Http\\Controllers\\HomeController@create',
        'controller' => 'App\\Http\\Controllers\\HomeController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
          2 => 'verified',
        ),
        'as' => 'dashboard.store',
        'uses' => 'App\\Http\\Controllers\\HomeController@store',
        'controller' => 'App\\Http\\Controllers\\HomeController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/{dashboard}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
          2 => 'verified',
        ),
        'as' => 'dashboard.show',
        'uses' => 'App\\Http\\Controllers\\HomeController@show',
        'controller' => 'App\\Http\\Controllers\\HomeController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/{dashboard}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
          2 => 'verified',
        ),
        'as' => 'dashboard.edit',
        'uses' => 'App\\Http\\Controllers\\HomeController@edit',
        'controller' => 'App\\Http\\Controllers\\HomeController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'dashboard/{dashboard}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
          2 => 'verified',
        ),
        'as' => 'dashboard.update',
        'uses' => 'App\\Http\\Controllers\\HomeController@update',
        'controller' => 'App\\Http\\Controllers\\HomeController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/{dashboard}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
          2 => 'verified',
        ),
        'as' => 'dashboard.destroy',
        'uses' => 'App\\Http\\Controllers\\HomeController@destroy',
        'controller' => 'App\\Http\\Controllers\\HomeController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kIGPux7ebEN8pjMf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard_uno',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
          2 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@dashboard_uno',
        'controller' => 'App\\Http\\Controllers\\HomeController@dashboard_uno',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::kIGPux7ebEN8pjMf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::J5ZWj3yFl2KBqpua' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard_dos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
          2 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@dashboard_dos',
        'controller' => 'App\\Http\\Controllers\\HomeController@dashboard_dos',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::J5ZWj3yFl2KBqpua',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8P8g4IC7JwpSpXCM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'actualizar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
          2 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@actualizar',
        'controller' => 'App\\Http\\Controllers\\HomeController@actualizar',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::8P8g4IC7JwpSpXCM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LOAoWPmLEhm8vbZP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cumpleanos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
          2 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@cumpleanos',
        'controller' => 'App\\Http\\Controllers\\HomeController@cumpleanos',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::LOAoWPmLEhm8vbZP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::30Gvj0UVJUhgBM9a' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/agenda2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000e740000000000000000";}";s:4:"hash";s:44:"KmisBI5Ldjj7XJg6j588RUzmXspIyYCZ7FaDYyPUMkA=";}}',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::30Gvj0UVJUhgBM9a',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::iqj1SFrfICIGKekp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agenda2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@inicio',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@inicio',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::iqj1SFrfICIGKekp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LbYqKSvZbneDijLf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agenda2/inicio',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@inicio',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@inicio',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::LbYqKSvZbneDijLf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UcgVfuJ6FuS98ZWa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agenda2/tablaeventos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@tablaeventos',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@tablaeventos',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::UcgVfuJ6FuS98ZWa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::McRtGwrBlIhnY4Dj' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agenda2/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@create',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@create',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::McRtGwrBlIhnY4Dj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0dZPGNN8q1hJFytS' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agenda2/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@store',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@store',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::0dZPGNN8q1hJFytS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ifQzcwyZ672cFT0O' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'agenda2/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@destroy',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@destroy',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::ifQzcwyZ672cFT0O',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3b3ZqXxac98yvRCn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agenda2/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@edit',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@edit',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::3b3ZqXxac98yvRCn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bL5wJOjjA8pLKKVk' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agenda2/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@update',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@update',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::bL5wJOjjA8pLKKVk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DmZDX10TuBcofR83' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agenda2/calendario',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@datos',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@datos',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::DmZDX10TuBcofR83',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PgrRoyqwaj8Jb4He' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agenda2/VerEvento2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@VerEvento',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@VerEvento',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::PgrRoyqwaj8Jb4He',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VYahr1WowMlbhUgA' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agenda2/TraeDias',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@TraeDias',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@TraeDias',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::VYahr1WowMlbhUgA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jAVUep8tV8W04nra' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agenda2/TraerDatosAgenda',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@TraerDatosAgenda',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@TraerDatosAgenda',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::jAVUep8tV8W04nra',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::E93bCQrvlU3lWVBs' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agenda2/TraerDatosCita',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@TraerDatosCita',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@TraerDatosCita',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::E93bCQrvlU3lWVBs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::x73tYLIzLRLmeqTM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agenda2/TraerDatoFechaEspecifica',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@TraerDatoFechaEspecifica',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@TraerDatoFechaEspecifica',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::x73tYLIzLRLmeqTM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::F9bsUfEd8kEvNsR5' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agenda2/traerHoras',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@traerHoras',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@traerHoras',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::F9bsUfEd8kEvNsR5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::czFP5VAYuTbrASFP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agenda2/TraerClienteNum',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@TraerClienteNum',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@TraerClienteNum',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::czFP5VAYuTbrASFP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::H1QIfW18LHhaaLYs' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agenda2/EliminarCita',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@EliminarCita',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@EliminarCita',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::H1QIfW18LHhaaLYs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WeKFMcUKgopVN6cL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agenda2/ExisteCliente',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@ExisteCliente',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@ExisteCliente',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::WeKFMcUKgopVN6cL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NpaWqzCOQ1sw5xCt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agenda2/vista/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@vistas',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@vistas',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::NpaWqzCOQ1sw5xCt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jXY63rYrOEuKOTwh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agenda2/AgregarClienteEspera',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@AgregarClienteEspera',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@AgregarClienteEspera',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::jXY63rYrOEuKOTwh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UpJ8ECdyr1et1SaZ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agenda2/ClienteAgendado',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@ClienteAgendado',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@ClienteAgendado',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::UpJ8ECdyr1et1SaZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::k245lQXqIcdjPr3G' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/usuarios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000e900000000000000000";}";s:4:"hash";s:44:"zIG659D6qCnMeQZZFBeTo0AYIeMLo8t2EY+fR8HfwiI=";}}',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::k245lQXqIcdjPr3G',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fZtwoXnIjFA35Hyw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@index',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@index',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::fZtwoXnIjFA35Hyw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wWLNBKMWDsaENsJJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/tablausuarios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@tablausuarios',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@tablausuarios',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::wWLNBKMWDsaENsJJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mXrzQSIjxzeF0ZgN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@create',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@create',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::mXrzQSIjxzeF0ZgN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kmRtP3j6btGC2axX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usuarios/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@store',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@store',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::kmRtP3j6btGC2axX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bcJ1AEzehn8lfd79' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'usuarios/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@destroy',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@destroy',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::bcJ1AEzehn8lfd79',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::puMWr2Pjby2PlHHU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@edit',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@edit',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::puMWr2Pjby2PlHHU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NhGUiO5eH69Kvzoa' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'usuarios/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@update',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@update',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::NhGUiO5eH69Kvzoa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IJGv7RlcniMuDPP9' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usuarios/archivos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@archivos',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@archivos',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::IJGv7RlcniMuDPP9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EtcwfUZCzbtS6VOd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/archivos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\ArchivosController@index',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\ArchivosController@index',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/archivos',
        'where' => 
        array (
        ),
        'as' => 'generated::EtcwfUZCzbtS6VOd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nxr1oPtyGjYjDnCm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/tablaarchivos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@tablaarchivos',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@tablaarchivos',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::nxr1oPtyGjYjDnCm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ICg3RxywVEso68lX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usuarios/Eliminararchivos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@Eliminararchivos',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@Eliminararchivos',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::ICg3RxywVEso68lX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JBF0dupt2tDLLSAV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usuarios/as',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@as',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@as',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::JBF0dupt2tDLLSAV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xpUs73NC4RH6H1eQ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usuarios/loginAs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@as2',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@as2',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::xpUs73NC4RH6H1eQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NK8f7bJdE06PcpK5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/notificaciones',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@notificaciones',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@notificaciones',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::NK8f7bJdE06PcpK5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VxYr7pLlFmAQAIrp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usuarios/enviarnotificacion',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@enviarnotificacion',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@enviarnotificacion',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::VxYr7pLlFmAQAIrp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cdEdSfBccMcIvGoA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/tablamensaje',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@tablamensaje',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@tablamensaje',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::cdEdSfBccMcIvGoA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8yuRGrDckm0dsOL0' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usuarios/verMensajes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@verMensajes',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@verMensajes',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::8yuRGrDckm0dsOL0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UGNDKVONXOZmqyu3' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usuarios/EliminarMensajes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@EliminarMensajes',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@EliminarMensajes',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::UGNDKVONXOZmqyu3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nCjgDyz2LaaUrtB1' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usuarios/api',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@api',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@api',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::nCjgDyz2LaaUrtB1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZGMeiPZmEwBtzExQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\RolesController@index',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\RolesController@index',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/roles',
        'where' => 
        array (
        ),
        'as' => 'generated::ZGMeiPZmEwBtzExQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::I1uW72Aj2HdUyLat' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/roles/tablaroles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\RolesController@tablaroles',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\RolesController@tablaroles',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/roles',
        'where' => 
        array (
        ),
        'as' => 'generated::I1uW72Aj2HdUyLat',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7uX76PFntObob6W0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/roles/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\RolesController@create',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\RolesController@create',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/roles',
        'where' => 
        array (
        ),
        'as' => 'generated::7uX76PFntObob6W0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xnsiP1RYwhf5TvUb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usuarios/roles/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\RolesController@store',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\RolesController@store',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/roles',
        'where' => 
        array (
        ),
        'as' => 'generated::xnsiP1RYwhf5TvUb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QcrdEADuLdb3XjMe' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'usuarios/roles/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\RolesController@destroy',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\RolesController@destroy',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/roles',
        'where' => 
        array (
        ),
        'as' => 'generated::QcrdEADuLdb3XjMe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pTOFtG3B3DJZPZf4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/roles/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\RolesController@edit',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\RolesController@edit',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/roles',
        'where' => 
        array (
        ),
        'as' => 'generated::pTOFtG3B3DJZPZf4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tW4qyqEgaJqCxg6P' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'usuarios/roles/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\RolesController@update',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\RolesController@update',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/roles',
        'where' => 
        array (
        ),
        'as' => 'generated::tW4qyqEgaJqCxg6P',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::R3XxBDnkkIMXWuiv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/permisos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\PermisosController@index',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\PermisosController@index',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/permisos',
        'where' => 
        array (
        ),
        'as' => 'generated::R3XxBDnkkIMXWuiv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NxnoOX128rZKdrBw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/permisos/tablapermisos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\PermisosController@tablapermisos',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\PermisosController@tablapermisos',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/permisos',
        'where' => 
        array (
        ),
        'as' => 'generated::NxnoOX128rZKdrBw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::orAH7h0M13xc2bq2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/permisos/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\PermisosController@create',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\PermisosController@create',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/permisos',
        'where' => 
        array (
        ),
        'as' => 'generated::orAH7h0M13xc2bq2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FhExPbmelvUbgCZl' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usuarios/permisos/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\PermisosController@store',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\PermisosController@store',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/permisos',
        'where' => 
        array (
        ),
        'as' => 'generated::FhExPbmelvUbgCZl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UOH4aemdCLxwtHib' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'usuarios/permisos/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\PermisosController@destroy',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\PermisosController@destroy',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/permisos',
        'where' => 
        array (
        ),
        'as' => 'generated::UOH4aemdCLxwtHib',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::csYbwJKCnWYTeK50' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/permisos/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\PermisosController@edit',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\PermisosController@edit',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/permisos',
        'where' => 
        array (
        ),
        'as' => 'generated::csYbwJKCnWYTeK50',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::W1MsAuFzXAHqcjDf' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usuarios/permisos/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\PermisosController@update',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\PermisosController@update',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/permisos',
        'where' => 
        array (
        ),
        'as' => 'generated::W1MsAuFzXAHqcjDf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5gj4TDqZsWyFH6u3' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usuarios/permisos/virificarpermiso',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\PermisosController@virificarpermiso',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\PermisosController@virificarpermiso',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/permisos',
        'where' => 
        array (
        ),
        'as' => 'generated::5gj4TDqZsWyFH6u3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9ZzSkKey8J25UsLD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/negocios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\NegocioController@index',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\NegocioController@index',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/negocios',
        'where' => 
        array (
        ),
        'as' => 'generated::9ZzSkKey8J25UsLD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::g7beeoJw8qjwkU1E' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/negocios/tablanegocios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\NegocioController@tablanegocios',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\NegocioController@tablanegocios',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/negocios',
        'where' => 
        array (
        ),
        'as' => 'generated::g7beeoJw8qjwkU1E',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::i4lWvVtw1mZblsQ1' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/negocios/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\NegocioController@create',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\NegocioController@create',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/negocios',
        'where' => 
        array (
        ),
        'as' => 'generated::i4lWvVtw1mZblsQ1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fiEq85Tj5oxQuUoM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usuarios/negocios/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\NegocioController@store',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\NegocioController@store',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/negocios',
        'where' => 
        array (
        ),
        'as' => 'generated::fiEq85Tj5oxQuUoM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PzbEac6iSkcwxqc5' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'usuarios/negocios/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\NegocioController@destroy',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\NegocioController@destroy',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/negocios',
        'where' => 
        array (
        ),
        'as' => 'generated::PzbEac6iSkcwxqc5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CcO2QaTymFuBYDWO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/negocios/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\NegocioController@edit',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\NegocioController@edit',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/negocios',
        'where' => 
        array (
        ),
        'as' => 'generated::CcO2QaTymFuBYDWO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jQHU76sn97hbjRRD' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usuarios/negocios/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\NegocioController@update',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\NegocioController@update',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/negocios',
        'where' => 
        array (
        ),
        'as' => 'generated::jQHU76sn97hbjRRD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7h33mXkwBlDqFaBq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/archivos/tablaarchivo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\ArchivosController@tablaarchivo',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\ArchivosController@tablaarchivo',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/archivos',
        'where' => 
        array (
        ),
        'as' => 'generated::7h33mXkwBlDqFaBq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1cFtxSXqfpsvvXC9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/archivos/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\ArchivosController@create',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\ArchivosController@create',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/archivos',
        'where' => 
        array (
        ),
        'as' => 'generated::1cFtxSXqfpsvvXC9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::T0yOn7dQ2KrChhWP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usuarios/archivos/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\ArchivosController@store',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\ArchivosController@store',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/archivos',
        'where' => 
        array (
        ),
        'as' => 'generated::T0yOn7dQ2KrChhWP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YXnKSQoklcgxcfcc' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'usuarios/archivos/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\ArchivosController@destroy',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\ArchivosController@destroy',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/archivos',
        'where' => 
        array (
        ),
        'as' => 'generated::YXnKSQoklcgxcfcc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bqXEIAfNSvzBnzjB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/archivos/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\ArchivosController@edit',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\ArchivosController@edit',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/archivos',
        'where' => 
        array (
        ),
        'as' => 'generated::bqXEIAfNSvzBnzjB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9WIvK7SU6bDNfv4S' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usuarios/archivos/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\ArchivosController@update',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\ArchivosController@update',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/archivos',
        'where' => 
        array (
        ),
        'as' => 'generated::9WIvK7SU6bDNfv4S',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zzlwTA1PUaINiu0m' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usuarios/archivos/documento/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\ArchivosController@documento',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\ArchivosController@documento',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'usuarios/archivos',
        'where' => 
        array (
        ),
        'as' => 'generated::zzlwTA1PUaINiu0m',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EkeyVBMyasZDsQSA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/agendas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000ec80000000000000000";}";s:4:"hash";s:44:"xs/SMtKM7tMRBT5s7L6mSdLd1zDKT07wNub/IykxX3k=";}}',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::EkeyVBMyasZDsQSA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MqbBjZEtHAyI9KbO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agendas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@inicio',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@inicio',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::MqbBjZEtHAyI9KbO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LE7TvtokivFYrDWn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agendas/inicio',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@inicio',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@inicio',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::LE7TvtokivFYrDWn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LAmhSI3Nv0n6bsI2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agendas/tablaeventos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@tablaeventos',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@tablaeventos',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::LAmhSI3Nv0n6bsI2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9RYuwUsCNOhSdXV2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agendas/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@create',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@create',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::9RYuwUsCNOhSdXV2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jjdkI2L47aajcWz0' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@store',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@store',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::jjdkI2L47aajcWz0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mIixyA93gE2iNtbT' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'agendas/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@destroy',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@destroy',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::mIixyA93gE2iNtbT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bQioE3xsmOVQ395R' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agendas/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@edit',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@edit',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::bQioE3xsmOVQ395R',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pcsK6wcBhjd3ASdo' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@update',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@update',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::pcsK6wcBhjd3ASdo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kQdMfFqlD7bkSOfm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/calendario',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@datos',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@datos',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::kQdMfFqlD7bkSOfm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yizaJrpQom0TtPwM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/VerEvento2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@VerEvento',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@VerEvento',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::yizaJrpQom0TtPwM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pNCctKGTWOc9Te3a' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/TraeDias',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@TraeDias',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@TraeDias',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::pNCctKGTWOc9Te3a',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FLXBYmWTWDkLST7l' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/TraerDatosAgenda',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@TraerDatosAgenda',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@TraerDatosAgenda',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::FLXBYmWTWDkLST7l',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Kj5GoV0vG2uPNSKP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/TraerDatosCita',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@TraerDatosCita',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@TraerDatosCita',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::Kj5GoV0vG2uPNSKP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::P8ZggxAdmJQuOxaF' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/TraerDatoFechaEspecifica',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@TraerDatoFechaEspecifica',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@TraerDatoFechaEspecifica',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::P8ZggxAdmJQuOxaF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vaudTZJwOr314rh9' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/traerHoras',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@traerHoras',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@traerHoras',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::vaudTZJwOr314rh9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZJoSPvaeV7xGDdgI' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/TraerClienteNum',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@TraerClienteNum',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@TraerClienteNum',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::ZJoSPvaeV7xGDdgI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ABXkQ7dRnOeLuXuu' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/EliminarCita',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@EliminarCita',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@EliminarCita',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::ABXkQ7dRnOeLuXuu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wwbpLZs84hzIfR4R' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/ExisteCliente',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@ExisteCliente',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@ExisteCliente',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::wwbpLZs84hzIfR4R',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0yJcz63lSh33Hp3C' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/guardarPago',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@guardarPago',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@guardarPago',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::0yJcz63lSh33Hp3C',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zpX6mqu3h1mcB0aA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agendas/vista/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@vistas',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@vistas',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::zpX6mqu3h1mcB0aA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Ltuq8XCI123f7xmJ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/AgregarClienteEspera',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@AgregarClienteEspera',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@AgregarClienteEspera',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::Ltuq8XCI123f7xmJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nd0R7aB5SXLZgUUF' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/ClienteAgendado',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@ClienteAgendado',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@ClienteAgendado',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::nd0R7aB5SXLZgUUF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7eZo4sA06G4MjY7c' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/TraerServicio',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@TraerServicio',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@TraerServicio',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::7eZo4sA06G4MjY7c',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wcE3v29av9PmcAWb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/traerCita',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@traerCita',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@traerCita',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::wcE3v29av9PmcAWb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hU6Kq26ZfCzzzIMy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/ExisteCita',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@ExisteCita',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@ExisteCita',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::hU6Kq26ZfCzzzIMy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8YOQED95eOE8mpBx' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/TraerProductillos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@TraerProductillos',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@TraerProductillos',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::8YOQED95eOE8mpBx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EA7ZTVGhNRtKaMzl' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/TraerDatosEmpleado',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@TraerDatosEmpleado',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@TraerDatosEmpleado',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::EA7ZTVGhNRtKaMzl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Z2E60t8zHDuuoj8N' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/catalogos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000eea0000000000000000";}";s:4:"hash";s:44:"0mb6GgpkbCYMLFZ78zSL0iOq4ggritEIlE7/YsEj8yA=";}}',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Z2E60t8zHDuuoj8N',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UbR0nDqpgcrnndfL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/servicios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosController@index',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosController@index',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios',
        'where' => 
        array (
        ),
        'as' => 'generated::UbR0nDqpgcrnndfL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UfilpSlPVHfo8q80' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/servicios/tablaservicios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosController@tablaservicios',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosController@tablaservicios',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios',
        'where' => 
        array (
        ),
        'as' => 'generated::UfilpSlPVHfo8q80',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9JCYxPBkPX5ooRF9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/servicios/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosController@create',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosController@create',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios',
        'where' => 
        array (
        ),
        'as' => 'generated::9JCYxPBkPX5ooRF9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::84z7TTirjBYpJKji' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/servicios/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosController@store',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosController@store',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios',
        'where' => 
        array (
        ),
        'as' => 'generated::84z7TTirjBYpJKji',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7uLimxPXZwuhbdgj' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'catalogos/servicios/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosController@destroy',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosController@destroy',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios',
        'where' => 
        array (
        ),
        'as' => 'generated::7uLimxPXZwuhbdgj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lejZi5Qd9IxybmB4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/servicios/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosController@edit',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosController@edit',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios',
        'where' => 
        array (
        ),
        'as' => 'generated::lejZi5Qd9IxybmB4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aRldlAeGnqGxoube' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/servicios/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosController@update',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosController@update',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios',
        'where' => 
        array (
        ),
        'as' => 'generated::aRldlAeGnqGxoube',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SL2Gb2iu08BlJBf8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/productos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ProductosController@index',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ProductosController@index',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/productos',
        'where' => 
        array (
        ),
        'as' => 'generated::SL2Gb2iu08BlJBf8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Wg0ivNU9bQwA1zG7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/productos/tablaproductos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ProductosController@tablaproductos',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ProductosController@tablaproductos',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/productos',
        'where' => 
        array (
        ),
        'as' => 'generated::Wg0ivNU9bQwA1zG7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::67ATe9glDa796w33' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/productos/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ProductosController@create',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ProductosController@create',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/productos',
        'where' => 
        array (
        ),
        'as' => 'generated::67ATe9glDa796w33',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lRf3FTswyToTrMDR' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/productos/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ProductosController@store',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ProductosController@store',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/productos',
        'where' => 
        array (
        ),
        'as' => 'generated::lRf3FTswyToTrMDR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::S0TdZbInjBbNfQrj' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'catalogos/productos/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ProductosController@destroy',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ProductosController@destroy',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/productos',
        'where' => 
        array (
        ),
        'as' => 'generated::S0TdZbInjBbNfQrj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vyDp1PX4hSb2MNC0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/productos/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ProductosController@edit',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ProductosController@edit',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/productos',
        'where' => 
        array (
        ),
        'as' => 'generated::vyDp1PX4hSb2MNC0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GdaGvBHR1EcLP3vB' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/productos/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ProductosController@update',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ProductosController@update',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/productos',
        'where' => 
        array (
        ),
        'as' => 'generated::GdaGvBHR1EcLP3vB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lBbT026NxMgn29UI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/listados',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ListadosController@index',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ListadosController@index',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/listados',
        'where' => 
        array (
        ),
        'as' => 'generated::lBbT026NxMgn29UI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::K4LHxNO4TXHERwPy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/listados/GuardarProductos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ListadosController@GuardarProductos',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ListadosController@GuardarProductos',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/listados',
        'where' => 
        array (
        ),
        'as' => 'generated::K4LHxNO4TXHERwPy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ce6HZVYlqftR45ne' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/listados/TraerProductos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ListadosController@TraerProductos',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ListadosController@TraerProductos',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/listados',
        'where' => 
        array (
        ),
        'as' => 'generated::ce6HZVYlqftR45ne',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gvqS7f3WoUsN3IzA' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/listados/EliminarProductos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ListadosController@EliminarProductos',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ListadosController@EliminarProductos',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/listados',
        'where' => 
        array (
        ),
        'as' => 'generated::gvqS7f3WoUsN3IzA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sLm2WEqCo4koGnxZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/listados/descargarProductos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ListadosController@DescargarProductos',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ListadosController@DescargarProductos',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/listados',
        'where' => 
        array (
        ),
        'as' => 'generated::sLm2WEqCo4koGnxZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LVDD0visbkDQRUuc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/alaciados',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\AlaciadosController@index',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\AlaciadosController@index',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/alaciados',
        'where' => 
        array (
        ),
        'as' => 'generated::LVDD0visbkDQRUuc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eNH5sxnu3bNJyeBI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/alaciados/tablaalaciados',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\AlaciadosController@tablaalaciados',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\AlaciadosController@tablaalaciados',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/alaciados',
        'where' => 
        array (
        ),
        'as' => 'generated::eNH5sxnu3bNJyeBI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7Dq9gY8zb2qhhzJy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/alaciados/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\AlaciadosController@create',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\AlaciadosController@create',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/alaciados',
        'where' => 
        array (
        ),
        'as' => 'generated::7Dq9gY8zb2qhhzJy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wwfWqhfImdEU2k6R' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/alaciados/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\AlaciadosController@store',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\AlaciadosController@store',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/alaciados',
        'where' => 
        array (
        ),
        'as' => 'generated::wwfWqhfImdEU2k6R',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IJhiFkiCOkCWOsxl' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'catalogos/alaciados/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\AlaciadosController@destroy',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\AlaciadosController@destroy',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/alaciados',
        'where' => 
        array (
        ),
        'as' => 'generated::IJhiFkiCOkCWOsxl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XL1iW8Uk1NwMaHwr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/alaciados/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\AlaciadosController@edit',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\AlaciadosController@edit',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/alaciados',
        'where' => 
        array (
        ),
        'as' => 'generated::XL1iW8Uk1NwMaHwr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0JdCsesGbv2Wc9Pf' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/alaciados/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\AlaciadosController@update',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\AlaciadosController@update',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/alaciados',
        'where' => 
        array (
        ),
        'as' => 'generated::0JdCsesGbv2Wc9Pf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IPq82Dzw7q5I3YdX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/cabellos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\CabellosController@index',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\CabellosController@index',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/cabellos',
        'where' => 
        array (
        ),
        'as' => 'generated::IPq82Dzw7q5I3YdX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VOGApnBdycqUCV0Q' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/cabellos/tablacabellos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\CabellosController@tablacabellos',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\CabellosController@tablacabellos',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/cabellos',
        'where' => 
        array (
        ),
        'as' => 'generated::VOGApnBdycqUCV0Q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hKtvv2P6xlpQTK7Y' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/cabellos/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\CabellosController@create',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\CabellosController@create',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/cabellos',
        'where' => 
        array (
        ),
        'as' => 'generated::hKtvv2P6xlpQTK7Y',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tNgUfOY54xf9gsmW' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/cabellos/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\CabellosController@store',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\CabellosController@store',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/cabellos',
        'where' => 
        array (
        ),
        'as' => 'generated::tNgUfOY54xf9gsmW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::A4RCviaYlNhe1L1p' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'catalogos/cabellos/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\CabellosController@destroy',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\CabellosController@destroy',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/cabellos',
        'where' => 
        array (
        ),
        'as' => 'generated::A4RCviaYlNhe1L1p',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nWWeMeKyMexagw8g' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/cabellos/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\CabellosController@edit',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\CabellosController@edit',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/cabellos',
        'where' => 
        array (
        ),
        'as' => 'generated::nWWeMeKyMexagw8g',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Gd2LpKBGagtUuwwB' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/cabellos/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\CabellosController@update',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\CabellosController@update',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/cabellos',
        'where' => 
        array (
        ),
        'as' => 'generated::Gd2LpKBGagtUuwwB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pbVe9KoO6wkf84rg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/fasts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\FastsController@index',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\FastsController@index',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/fasts',
        'where' => 
        array (
        ),
        'as' => 'generated::pbVe9KoO6wkf84rg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fQBiC7LRmP8xrbGZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/fasts/tablafasts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\FastsController@tablafasts',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\FastsController@tablafasts',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/fasts',
        'where' => 
        array (
        ),
        'as' => 'generated::fQBiC7LRmP8xrbGZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ryt9dIZAtCWvkhP9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/fasts/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\FastsController@create',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\FastsController@create',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/fasts',
        'where' => 
        array (
        ),
        'as' => 'generated::ryt9dIZAtCWvkhP9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1bGww2Uc1WAlY7c6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/fasts/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\FastsController@store',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\FastsController@store',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/fasts',
        'where' => 
        array (
        ),
        'as' => 'generated::1bGww2Uc1WAlY7c6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fI7URzvdF7JnUtqQ' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'catalogos/fasts/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\FastsController@destroy',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\FastsController@destroy',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/fasts',
        'where' => 
        array (
        ),
        'as' => 'generated::fI7URzvdF7JnUtqQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2OQbNfWLaJnNYVlv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/fasts/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\FastsController@edit',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\FastsController@edit',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/fasts',
        'where' => 
        array (
        ),
        'as' => 'generated::2OQbNfWLaJnNYVlv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UuViUHwaxoRPh4ro' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/fasts/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\FastsController@update',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\FastsController@update',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/fasts',
        'where' => 
        array (
        ),
        'as' => 'generated::UuViUHwaxoRPh4ro',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jQn5uCS9rKLAMGYv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/peinados',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\PeinadosController@index',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\PeinadosController@index',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/peinados',
        'where' => 
        array (
        ),
        'as' => 'generated::jQn5uCS9rKLAMGYv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cWAthvjZKHRnjiBk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/peinados/tablapeinados',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\PeinadosController@tablapeinados',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\PeinadosController@tablapeinados',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/peinados',
        'where' => 
        array (
        ),
        'as' => 'generated::cWAthvjZKHRnjiBk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GWFbZjFFWpgmnJOF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/peinados/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\PeinadosController@create',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\PeinadosController@create',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/peinados',
        'where' => 
        array (
        ),
        'as' => 'generated::GWFbZjFFWpgmnJOF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::72bJM8A1Twi3WLRm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/peinados/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\PeinadosController@store',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\PeinadosController@store',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/peinados',
        'where' => 
        array (
        ),
        'as' => 'generated::72bJM8A1Twi3WLRm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UVnq68q8TpuhZx1H' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'catalogos/peinados/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\PeinadosController@destroy',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\PeinadosController@destroy',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/peinados',
        'where' => 
        array (
        ),
        'as' => 'generated::UVnq68q8TpuhZx1H',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xZBUrgHuePizfROy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/peinados/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\PeinadosController@edit',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\PeinadosController@edit',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/peinados',
        'where' => 
        array (
        ),
        'as' => 'generated::xZBUrgHuePizfROy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XmcgCSUxfQXwtf2q' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/peinados/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\PeinadosController@update',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\PeinadosController@update',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/peinados',
        'where' => 
        array (
        ),
        'as' => 'generated::XmcgCSUxfQXwtf2q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::N7AVFkITmoFn1fKp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/pestanas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\PestanasController@index',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\PestanasController@index',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/pestanas',
        'where' => 
        array (
        ),
        'as' => 'generated::N7AVFkITmoFn1fKp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EVT5ngPRquFpx8AV' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/pestanas/tablapestanas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\PestanasController@tablapestanas',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\PestanasController@tablapestanas',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/pestanas',
        'where' => 
        array (
        ),
        'as' => 'generated::EVT5ngPRquFpx8AV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TBgqZawgIa1GR6uM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/pestanas/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\PestanasController@create',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\PestanasController@create',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/pestanas',
        'where' => 
        array (
        ),
        'as' => 'generated::TBgqZawgIa1GR6uM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uInQflMEE9rhRWs0' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/pestanas/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\PestanasController@store',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\PestanasController@store',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/pestanas',
        'where' => 
        array (
        ),
        'as' => 'generated::uInQflMEE9rhRWs0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gE5M3CH28YcIS50T' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'catalogos/pestanas/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\PestanasController@destroy',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\PestanasController@destroy',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/pestanas',
        'where' => 
        array (
        ),
        'as' => 'generated::gE5M3CH28YcIS50T',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SwWMUOhAHsnzmoO8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/pestanas/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\PestanasController@edit',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\PestanasController@edit',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/pestanas',
        'where' => 
        array (
        ),
        'as' => 'generated::SwWMUOhAHsnzmoO8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jV0D1NrPqabkbvJq' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/pestanas/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\PestanasController@update',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\PestanasController@update',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/pestanas',
        'where' => 
        array (
        ),
        'as' => 'generated::jV0D1NrPqabkbvJq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qmqFoOdhXKwSPVvZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/servicios_a',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosAController@index',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosAController@index',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios_a',
        'where' => 
        array (
        ),
        'as' => 'generated::qmqFoOdhXKwSPVvZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BXrWwVRgNbooYfK0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/servicios_a/tablaservicios_a',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosAController@tablaservicios_a',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosAController@tablaservicios_a',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios_a',
        'where' => 
        array (
        ),
        'as' => 'generated::BXrWwVRgNbooYfK0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fFENvPdVlrhIPCYJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/servicios_a/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosAController@create',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosAController@create',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios_a',
        'where' => 
        array (
        ),
        'as' => 'generated::fFENvPdVlrhIPCYJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jdqKsc4j8C0NBIZC' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/servicios_a/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosAController@store',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosAController@store',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios_a',
        'where' => 
        array (
        ),
        'as' => 'generated::jdqKsc4j8C0NBIZC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vYBqAdYFpRqqpayu' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'catalogos/servicios_a/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosAController@destroy',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosAController@destroy',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios_a',
        'where' => 
        array (
        ),
        'as' => 'generated::vYBqAdYFpRqqpayu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uTERqlmKYOrKr1yP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/servicios_a/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosAController@edit',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosAController@edit',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios_a',
        'where' => 
        array (
        ),
        'as' => 'generated::uTERqlmKYOrKr1yP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bgXztIVFV3en48ra' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/servicios_a/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosAController@update',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosAController@update',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios_a',
        'where' => 
        array (
        ),
        'as' => 'generated::bgXztIVFV3en48ra',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1b2o5MWSBjxaC9YN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/servicios_ex',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosEXController@index',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosEXController@index',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios_ex',
        'where' => 
        array (
        ),
        'as' => 'generated::1b2o5MWSBjxaC9YN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0VeT67y0FKB1jWMl' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/servicios_ex/tablaservicios_ex',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosEXController@tablaservicios_ex',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosEXController@tablaservicios_ex',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios_ex',
        'where' => 
        array (
        ),
        'as' => 'generated::0VeT67y0FKB1jWMl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HcpOjxeP8mCOlSjj' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/servicios_ex/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosEXController@create',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosEXController@create',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios_ex',
        'where' => 
        array (
        ),
        'as' => 'generated::HcpOjxeP8mCOlSjj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kz5qy49pW9DERX2Q' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/servicios_ex/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosEXController@store',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosEXController@store',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios_ex',
        'where' => 
        array (
        ),
        'as' => 'generated::kz5qy49pW9DERX2Q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WjOHFkBhyCvZPGQS' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'catalogos/servicios_ex/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosEXController@destroy',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosEXController@destroy',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios_ex',
        'where' => 
        array (
        ),
        'as' => 'generated::WjOHFkBhyCvZPGQS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1eLBZTnWzOp1aRqz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/servicios_ex/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosEXController@edit',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosEXController@edit',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios_ex',
        'where' => 
        array (
        ),
        'as' => 'generated::1eLBZTnWzOp1aRqz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uzYC8OBTtzzv8Xpu' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/servicios_ex/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosEXController@update',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ServiciosEXController@update',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/servicios_ex',
        'where' => 
        array (
        ),
        'as' => 'generated::uzYC8OBTtzzv8Xpu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CkHXrnjogjVau5Ms' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/shellacs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ShellacController@index',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ShellacController@index',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/shellacs',
        'where' => 
        array (
        ),
        'as' => 'generated::CkHXrnjogjVau5Ms',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5dq33p5StOwX5BYn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/shellacs/tablashellacs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ShellacController@tablashellacs',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ShellacController@tablashellacs',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/shellacs',
        'where' => 
        array (
        ),
        'as' => 'generated::5dq33p5StOwX5BYn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3AKX1uCVBWDB2Gcu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/shellacs/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ShellacController@create',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ShellacController@create',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/shellacs',
        'where' => 
        array (
        ),
        'as' => 'generated::3AKX1uCVBWDB2Gcu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KM31A74dqouOomvu' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/shellacs/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ShellacController@store',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ShellacController@store',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/shellacs',
        'where' => 
        array (
        ),
        'as' => 'generated::KM31A74dqouOomvu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Asps6f4gs2CXr1lk' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'catalogos/shellacs/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ShellacController@destroy',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ShellacController@destroy',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/shellacs',
        'where' => 
        array (
        ),
        'as' => 'generated::Asps6f4gs2CXr1lk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lYJ4itpmnoNrtw7b' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos/shellacs/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ShellacController@edit',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ShellacController@edit',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/shellacs',
        'where' => 
        array (
        ),
        'as' => 'generated::lYJ4itpmnoNrtw7b',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ALZJu59zRYg8dpyp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos/shellacs/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos\\Http\\Controllers\\ShellacController@update',
        'controller' => 'Modules\\Catalogos\\Http\\Controllers\\ShellacController@update',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'catalogos/shellacs',
        'where' => 
        array (
        ),
        'as' => 'generated::ALZJu59zRYg8dpyp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UihUMjfMJaZ4EyII' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/catalogos2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000f3c0000000000000000";}";s:4:"hash";s:44:"/6bgFC0iOeFWZTlKi7r1md/xwv4/jI+XFdLASOQmEc0=";}}',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::UihUMjfMJaZ4EyII',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fvszn49nbl3g9kdd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\Catalogos2Controller@index',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\Catalogos2Controller@index',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => '/catalogos2',
        'where' => 
        array (
        ),
        'as' => 'generated::fvszn49nbl3g9kdd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JHaTaKRq9kx6QijG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos2/servicios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ServiciosController@index',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ServiciosController@index',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/servicios',
        'where' => 
        array (
        ),
        'as' => 'generated::JHaTaKRq9kx6QijG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::22wnkirKJMPK0LFo' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos2/servicios/tablaservicios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ServiciosController@tablaservicios',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ServiciosController@tablaservicios',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/servicios',
        'where' => 
        array (
        ),
        'as' => 'generated::22wnkirKJMPK0LFo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vnHrhhNOp1ruSvVi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos2/servicios/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ServiciosController@create',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ServiciosController@create',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/servicios',
        'where' => 
        array (
        ),
        'as' => 'generated::vnHrhhNOp1ruSvVi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::P5TfNF3Yd3eDOcUk' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos2/servicios/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ServiciosController@store',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ServiciosController@store',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/servicios',
        'where' => 
        array (
        ),
        'as' => 'generated::P5TfNF3Yd3eDOcUk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aeF7rMMmg61klwl3' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'catalogos2/servicios/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ServiciosController@destroy',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ServiciosController@destroy',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/servicios',
        'where' => 
        array (
        ),
        'as' => 'generated::aeF7rMMmg61klwl3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lD9T7AfkICJJqX8K' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos2/servicios/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ServiciosController@edit',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ServiciosController@edit',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/servicios',
        'where' => 
        array (
        ),
        'as' => 'generated::lD9T7AfkICJJqX8K',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JwDrb3I1jJjK5tTN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos2/servicios/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ServiciosController@update',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ServiciosController@update',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/servicios',
        'where' => 
        array (
        ),
        'as' => 'generated::JwDrb3I1jJjK5tTN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rrKukN2jmzjfqOUe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos2/productos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ProductosController@index',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ProductosController@index',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/productos',
        'where' => 
        array (
        ),
        'as' => 'generated::rrKukN2jmzjfqOUe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::AsgIQwzFUGCFnEdK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos2/productos/tablaproductos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ProductosController@tablaproductos',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ProductosController@tablaproductos',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/productos',
        'where' => 
        array (
        ),
        'as' => 'generated::AsgIQwzFUGCFnEdK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KNuM8xL9xXhHiusN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos2/productos/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ProductosController@create',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ProductosController@create',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/productos',
        'where' => 
        array (
        ),
        'as' => 'generated::KNuM8xL9xXhHiusN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UWTGra5Mmkssj14j' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos2/productos/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ProductosController@store',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ProductosController@store',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/productos',
        'where' => 
        array (
        ),
        'as' => 'generated::UWTGra5Mmkssj14j',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NggoCgjc7xiHLvPz' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'catalogos2/productos/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ProductosController@destroy',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ProductosController@destroy',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/productos',
        'where' => 
        array (
        ),
        'as' => 'generated::NggoCgjc7xiHLvPz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nhBLenR2AhHCgva1' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos2/productos/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ProductosController@edit',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ProductosController@edit',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/productos',
        'where' => 
        array (
        ),
        'as' => 'generated::nhBLenR2AhHCgva1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6Mov15hZBI0Sr4eL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos2/productos/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ProductosController@update',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ProductosController@update',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/productos',
        'where' => 
        array (
        ),
        'as' => 'generated::6Mov15hZBI0Sr4eL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::B9M127V6YPvrf06r' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos2/listados',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ListadosController@index',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ListadosController@index',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/listados',
        'where' => 
        array (
        ),
        'as' => 'generated::B9M127V6YPvrf06r',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KycmJb1pepUe8ayz' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos2/listados/GuardarProductos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ListadosController@GuardarProductos',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ListadosController@GuardarProductos',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/listados',
        'where' => 
        array (
        ),
        'as' => 'generated::KycmJb1pepUe8ayz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NwU9ZrGHo0SNVBIc' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos2/listados/TraerProductos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ListadosController@TraerProductos',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ListadosController@TraerProductos',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/listados',
        'where' => 
        array (
        ),
        'as' => 'generated::NwU9ZrGHo0SNVBIc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mXOzoZeWvUZIfQB0' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogos2/listados/EliminarProductos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ListadosController@EliminarProductos',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ListadosController@EliminarProductos',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/listados',
        'where' => 
        array (
        ),
        'as' => 'generated::mXOzoZeWvUZIfQB0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uJqkZiob5rbROzaK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogos2/listados/descargarProductos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Catalogos2\\Http\\Controllers\\ListadosController@DescargarProductos',
        'controller' => 'Modules\\Catalogos2\\Http\\Controllers\\ListadosController@DescargarProductos',
        'namespace' => 'Modules\\Catalogos2\\Http\\Controllers',
        'prefix' => 'catalogos2/listados',
        'where' => 
        array (
        ),
        'as' => 'generated::uJqkZiob5rbROzaK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GgwFvkWA04SL5F1V' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/clientes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000f570000000000000000";}";s:4:"hash";s:44:"j2zxB3uzr5AQJvLVRhPpWUR114getdomSOqT7CkCz7s=";}}',
        'namespace' => 'Modules\\Clientes\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::GgwFvkWA04SL5F1V',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::oN5MY0Hi09aF40Pe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Clientes\\Http\\Controllers\\ClientesController@index',
        'controller' => 'Modules\\Clientes\\Http\\Controllers\\ClientesController@index',
        'namespace' => 'Modules\\Clientes\\Http\\Controllers',
        'prefix' => '/clientes',
        'where' => 
        array (
        ),
        'as' => 'generated::oN5MY0Hi09aF40Pe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sPs0ogxXXvjn8q0l' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientes/tablaclientes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Clientes\\Http\\Controllers\\ClientesController@tablaclientes',
        'controller' => 'Modules\\Clientes\\Http\\Controllers\\ClientesController@tablaclientes',
        'namespace' => 'Modules\\Clientes\\Http\\Controllers',
        'prefix' => '/clientes',
        'where' => 
        array (
        ),
        'as' => 'generated::sPs0ogxXXvjn8q0l',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::059rK3KHrKJ5WYkT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientes/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Clientes\\Http\\Controllers\\ClientesController@create',
        'controller' => 'Modules\\Clientes\\Http\\Controllers\\ClientesController@create',
        'namespace' => 'Modules\\Clientes\\Http\\Controllers',
        'prefix' => '/clientes',
        'where' => 
        array (
        ),
        'as' => 'generated::059rK3KHrKJ5WYkT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8XYk8jdInixqQUIL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'clientes/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Clientes\\Http\\Controllers\\ClientesController@store',
        'controller' => 'Modules\\Clientes\\Http\\Controllers\\ClientesController@store',
        'namespace' => 'Modules\\Clientes\\Http\\Controllers',
        'prefix' => '/clientes',
        'where' => 
        array (
        ),
        'as' => 'generated::8XYk8jdInixqQUIL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DWv1u75uecgSywDN' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'clientes/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Clientes\\Http\\Controllers\\ClientesController@destroy',
        'controller' => 'Modules\\Clientes\\Http\\Controllers\\ClientesController@destroy',
        'namespace' => 'Modules\\Clientes\\Http\\Controllers',
        'prefix' => '/clientes',
        'where' => 
        array (
        ),
        'as' => 'generated::DWv1u75uecgSywDN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xRHFgVp8QJvYowVc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientes/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Clientes\\Http\\Controllers\\ClientesController@edit',
        'controller' => 'Modules\\Clientes\\Http\\Controllers\\ClientesController@edit',
        'namespace' => 'Modules\\Clientes\\Http\\Controllers',
        'prefix' => '/clientes',
        'where' => 
        array (
        ),
        'as' => 'generated::xRHFgVp8QJvYowVc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DwvFaEjJfVgexxrJ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'clientes/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Clientes\\Http\\Controllers\\ClientesController@update',
        'controller' => 'Modules\\Clientes\\Http\\Controllers\\ClientesController@update',
        'namespace' => 'Modules\\Clientes\\Http\\Controllers',
        'prefix' => '/clientes',
        'where' => 
        array (
        ),
        'as' => 'generated::DwvFaEjJfVgexxrJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4q3SMZ55hg1BqSQV' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/clientes2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000f650000000000000000";}";s:4:"hash";s:44:"TR1/zPtZ4fp5KcwbAZsDyPwvMGYrUH7JnHzFWdU12zA=";}}',
        'namespace' => 'Modules\\Clientes2\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::4q3SMZ55hg1BqSQV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3xBxn1J8jbQtZah6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientes2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Clientes2\\Http\\Controllers\\Clientes2Controller@index',
        'controller' => 'Modules\\Clientes2\\Http\\Controllers\\Clientes2Controller@index',
        'namespace' => 'Modules\\Clientes2\\Http\\Controllers',
        'prefix' => '/clientes2',
        'where' => 
        array (
        ),
        'as' => 'generated::3xBxn1J8jbQtZah6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::objEoFtSCGcB6YEo' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientes2/tablaclientes2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Clientes2\\Http\\Controllers\\Clientes2Controller@tablaclientes2',
        'controller' => 'Modules\\Clientes2\\Http\\Controllers\\Clientes2Controller@tablaclientes2',
        'namespace' => 'Modules\\Clientes2\\Http\\Controllers',
        'prefix' => '/clientes2',
        'where' => 
        array (
        ),
        'as' => 'generated::objEoFtSCGcB6YEo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GstgqO1PJaLdqSmI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientes2/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Clientes2\\Http\\Controllers\\Clientes2Controller@create',
        'controller' => 'Modules\\Clientes2\\Http\\Controllers\\Clientes2Controller@create',
        'namespace' => 'Modules\\Clientes2\\Http\\Controllers',
        'prefix' => '/clientes2',
        'where' => 
        array (
        ),
        'as' => 'generated::GstgqO1PJaLdqSmI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eftlqibey5G7eJDg' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'clientes2/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Clientes2\\Http\\Controllers\\Clientes2Controller@store',
        'controller' => 'Modules\\Clientes2\\Http\\Controllers\\Clientes2Controller@store',
        'namespace' => 'Modules\\Clientes2\\Http\\Controllers',
        'prefix' => '/clientes2',
        'where' => 
        array (
        ),
        'as' => 'generated::eftlqibey5G7eJDg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XIQ3gSti9y9AbIf3' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'clientes2/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Clientes2\\Http\\Controllers\\Clientes2Controller@destroy',
        'controller' => 'Modules\\Clientes2\\Http\\Controllers\\Clientes2Controller@destroy',
        'namespace' => 'Modules\\Clientes2\\Http\\Controllers',
        'prefix' => '/clientes2',
        'where' => 
        array (
        ),
        'as' => 'generated::XIQ3gSti9y9AbIf3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::oSPPVQkY4pVMNeq0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientes2/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Clientes2\\Http\\Controllers\\Clientes2Controller@edit',
        'controller' => 'Modules\\Clientes2\\Http\\Controllers\\Clientes2Controller@edit',
        'namespace' => 'Modules\\Clientes2\\Http\\Controllers',
        'prefix' => '/clientes2',
        'where' => 
        array (
        ),
        'as' => 'generated::oSPPVQkY4pVMNeq0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cVkSIESgswpfp6Dx' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'clientes2/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Clientes2\\Http\\Controllers\\Clientes2Controller@update',
        'controller' => 'Modules\\Clientes2\\Http\\Controllers\\Clientes2Controller@update',
        'namespace' => 'Modules\\Clientes2\\Http\\Controllers',
        'prefix' => '/clientes2',
        'where' => 
        array (
        ),
        'as' => 'generated::cVkSIESgswpfp6Dx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NsEKTwcAEhqvo2Vz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/empleados',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000f730000000000000000";}";s:4:"hash";s:44:"Rf0nZKCPVjF96Y44meZlUckZCyNJL1sRvg/8cHsbTwI=";}}',
        'namespace' => 'Modules\\Empleados\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::NsEKTwcAEhqvo2Vz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8kAUmp2CrWItIFYm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'empleados',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@index',
        'controller' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@index',
        'namespace' => 'Modules\\Empleados\\Http\\Controllers',
        'prefix' => '/empleados',
        'where' => 
        array (
        ),
        'as' => 'generated::8kAUmp2CrWItIFYm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0SEMd3e6otNmyke1' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'empleados/tablaempleados',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@tablaempleados',
        'controller' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@tablaempleados',
        'namespace' => 'Modules\\Empleados\\Http\\Controllers',
        'prefix' => '/empleados',
        'where' => 
        array (
        ),
        'as' => 'generated::0SEMd3e6otNmyke1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6ZiYYtJ91z9P5aoW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'empleados/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@create',
        'controller' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@create',
        'namespace' => 'Modules\\Empleados\\Http\\Controllers',
        'prefix' => '/empleados',
        'where' => 
        array (
        ),
        'as' => 'generated::6ZiYYtJ91z9P5aoW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xEjgSa2VccJtr5PK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'empleados/createImagen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@createImagen',
        'controller' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@createImagen',
        'namespace' => 'Modules\\Empleados\\Http\\Controllers',
        'prefix' => '/empleados',
        'where' => 
        array (
        ),
        'as' => 'generated::xEjgSa2VccJtr5PK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::M7WrortM3MoqYje3' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'empleados/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@store',
        'controller' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@store',
        'namespace' => 'Modules\\Empleados\\Http\\Controllers',
        'prefix' => '/empleados',
        'where' => 
        array (
        ),
        'as' => 'generated::M7WrortM3MoqYje3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EoTGACQWEtBqewZS' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'empleados/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@destroy',
        'controller' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@destroy',
        'namespace' => 'Modules\\Empleados\\Http\\Controllers',
        'prefix' => '/empleados',
        'where' => 
        array (
        ),
        'as' => 'generated::EoTGACQWEtBqewZS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::t2CGkzGRXisImHVy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'empleados/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@edit',
        'controller' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@edit',
        'namespace' => 'Modules\\Empleados\\Http\\Controllers',
        'prefix' => '/empleados',
        'where' => 
        array (
        ),
        'as' => 'generated::t2CGkzGRXisImHVy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BW45XxehgK84hvRv' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'empleados/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@update',
        'controller' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@update',
        'namespace' => 'Modules\\Empleados\\Http\\Controllers',
        'prefix' => '/empleados',
        'where' => 
        array (
        ),
        'as' => 'generated::BW45XxehgK84hvRv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Kd0rK8rHWmZ9iHEk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'empleados/documento/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@documento',
        'controller' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@documento',
        'namespace' => 'Modules\\Empleados\\Http\\Controllers',
        'prefix' => '/empleados',
        'where' => 
        array (
        ),
        'as' => 'generated::Kd0rK8rHWmZ9iHEk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nmPATgawcl0SaZPk' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'empleados/Crearusuariocajero',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@Crearusuariocajero',
        'controller' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@Crearusuariocajero',
        'namespace' => 'Modules\\Empleados\\Http\\Controllers',
        'prefix' => '/empleados',
        'where' => 
        array (
        ),
        'as' => 'generated::nmPATgawcl0SaZPk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1FHrbgILIBr2ai0X' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'empleados/GuardarDias',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@GuardarDias',
        'controller' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@GuardarDias',
        'namespace' => 'Modules\\Empleados\\Http\\Controllers',
        'prefix' => '/empleados',
        'where' => 
        array (
        ),
        'as' => 'generated::1FHrbgILIBr2ai0X',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TNIwdDznQD0vVOAV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'empleados/ListAVacaciiones',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@ListAVacaciiones',
        'controller' => 'Modules\\Empleados\\Http\\Controllers\\EmpleadosController@ListAVacaciiones',
        'namespace' => 'Modules\\Empleados\\Http\\Controllers',
        'prefix' => '/empleados',
        'where' => 
        array (
        ),
        'as' => 'generated::TNIwdDznQD0vVOAV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GtiGRL8rEsZN4Tln' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/empleados2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000f860000000000000000";}";s:4:"hash";s:44:"QdkG3skhaZLp9RnzTl2LjFpK4fad+FEWM72s7H6miko=";}}',
        'namespace' => 'Modules\\Empleados2\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::GtiGRL8rEsZN4Tln',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5hXZaO2OcsAOHW04' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'empleados2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@index',
        'controller' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@index',
        'namespace' => 'Modules\\Empleados2\\Http\\Controllers',
        'prefix' => '/empleados2',
        'where' => 
        array (
        ),
        'as' => 'generated::5hXZaO2OcsAOHW04',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5LOhqzFEyIySY21N' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'empleados2/tablaempleados2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@tablaempleados2',
        'controller' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@tablaempleados2',
        'namespace' => 'Modules\\Empleados2\\Http\\Controllers',
        'prefix' => '/empleados2',
        'where' => 
        array (
        ),
        'as' => 'generated::5LOhqzFEyIySY21N',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xOx73cTjSV7WU3DB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'empleados2/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@create',
        'controller' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@create',
        'namespace' => 'Modules\\Empleados2\\Http\\Controllers',
        'prefix' => '/empleados2',
        'where' => 
        array (
        ),
        'as' => 'generated::xOx73cTjSV7WU3DB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CH7DshOPOz6GKgcB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'empleados2/createImagen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@createImagen',
        'controller' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@createImagen',
        'namespace' => 'Modules\\Empleados2\\Http\\Controllers',
        'prefix' => '/empleados2',
        'where' => 
        array (
        ),
        'as' => 'generated::CH7DshOPOz6GKgcB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fO7MViY6psoDgQIM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'empleados2/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@store',
        'controller' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@store',
        'namespace' => 'Modules\\Empleados2\\Http\\Controllers',
        'prefix' => '/empleados2',
        'where' => 
        array (
        ),
        'as' => 'generated::fO7MViY6psoDgQIM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zwAiyoH5f4Qrex7L' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'empleados2/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@destroy',
        'controller' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@destroy',
        'namespace' => 'Modules\\Empleados2\\Http\\Controllers',
        'prefix' => '/empleados2',
        'where' => 
        array (
        ),
        'as' => 'generated::zwAiyoH5f4Qrex7L',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::p8Yj1KpdOGibeTtP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'empleados2/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@edit',
        'controller' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@edit',
        'namespace' => 'Modules\\Empleados2\\Http\\Controllers',
        'prefix' => '/empleados2',
        'where' => 
        array (
        ),
        'as' => 'generated::p8Yj1KpdOGibeTtP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rxroV4yWZfdfxDIe' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'empleados2/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@update',
        'controller' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@update',
        'namespace' => 'Modules\\Empleados2\\Http\\Controllers',
        'prefix' => '/empleados2',
        'where' => 
        array (
        ),
        'as' => 'generated::rxroV4yWZfdfxDIe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yTNeUjavJo6czsKx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'empleados2/documento/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@documento',
        'controller' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@documento',
        'namespace' => 'Modules\\Empleados2\\Http\\Controllers',
        'prefix' => '/empleados2',
        'where' => 
        array (
        ),
        'as' => 'generated::yTNeUjavJo6czsKx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::X1KUsBwwHOpZlhoW' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'empleados2/Crearusuariocajero',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@Crearusuariocajero',
        'controller' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@Crearusuariocajero',
        'namespace' => 'Modules\\Empleados2\\Http\\Controllers',
        'prefix' => '/empleados2',
        'where' => 
        array (
        ),
        'as' => 'generated::X1KUsBwwHOpZlhoW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mIlnVkWoyvISKnl4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'empleados2/GuardarDias',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@GuardarDias',
        'controller' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@GuardarDias',
        'namespace' => 'Modules\\Empleados2\\Http\\Controllers',
        'prefix' => '/empleados2',
        'where' => 
        array (
        ),
        'as' => 'generated::mIlnVkWoyvISKnl4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HurQBbTbmraGfQUe' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'empleados2/ListAVacaciiones',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@ListAVacaciiones',
        'controller' => 'Modules\\Empleados2\\Http\\Controllers\\Empleados2Controller@ListAVacaciiones',
        'namespace' => 'Modules\\Empleados2\\Http\\Controllers',
        'prefix' => '/empleados2',
        'where' => 
        array (
        ),
        'as' => 'generated::HurQBbTbmraGfQUe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::e5u6MoFjOeHwX7sM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/expedientes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000f990000000000000000";}";s:4:"hash";s:44:"WEZFpIIWD3O7REpAmwUfQu2Hv7MLqYpbJdla9zY3eik=";}}',
        'namespace' => 'Modules\\Expedientes\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::e5u6MoFjOeHwX7sM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HeTZb0gfg6Go2ckT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'expedientes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@index',
        'controller' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@index',
        'namespace' => 'Modules\\Expedientes\\Http\\Controllers',
        'prefix' => '/expedientes',
        'where' => 
        array (
        ),
        'as' => 'generated::HeTZb0gfg6Go2ckT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hKLOEhuWADF1F90x' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'expedientes/tablaexpedientes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@tablaexpedientes',
        'controller' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@tablaexpedientes',
        'namespace' => 'Modules\\Expedientes\\Http\\Controllers',
        'prefix' => '/expedientes',
        'where' => 
        array (
        ),
        'as' => 'generated::hKLOEhuWADF1F90x',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::d7Xyon1ao3qtmDuw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'expedientes/tablaCarpeta',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@tablaCarpeta',
        'controller' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@tablaCarpeta',
        'namespace' => 'Modules\\Expedientes\\Http\\Controllers',
        'prefix' => '/expedientes',
        'where' => 
        array (
        ),
        'as' => 'generated::d7Xyon1ao3qtmDuw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sNlxI981kKfWbW2C' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'expedientes/tablaServicios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@tablaServicios',
        'controller' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@tablaServicios',
        'namespace' => 'Modules\\Expedientes\\Http\\Controllers',
        'prefix' => '/expedientes',
        'where' => 
        array (
        ),
        'as' => 'generated::sNlxI981kKfWbW2C',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ylA4YcLV1SJ2SeqL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'expedientes/{id}/vista',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@vista',
        'controller' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@vista',
        'namespace' => 'Modules\\Expedientes\\Http\\Controllers',
        'prefix' => '/expedientes',
        'where' => 
        array (
        ),
        'as' => 'generated::ylA4YcLV1SJ2SeqL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::igWkDBILAhFfL9UC' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'expedientes/{id},{id_servicio}/servicios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@servicios',
        'controller' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@servicios',
        'namespace' => 'Modules\\Expedientes\\Http\\Controllers',
        'prefix' => '/expedientes',
        'where' => 
        array (
        ),
        'as' => 'generated::igWkDBILAhFfL9UC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::u8EvgsYtHctmYHF8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'expedientes/{id}/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@show',
        'controller' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@show',
        'namespace' => 'Modules\\Expedientes\\Http\\Controllers',
        'prefix' => '/expedientes',
        'where' => 
        array (
        ),
        'as' => 'generated::u8EvgsYtHctmYHF8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::62RBrxt6fbx1zbQn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'expedientes/{id}/imprimir',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@imprimir',
        'controller' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@imprimir',
        'namespace' => 'Modules\\Expedientes\\Http\\Controllers',
        'prefix' => '/expedientes',
        'where' => 
        array (
        ),
        'as' => 'generated::62RBrxt6fbx1zbQn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5nj885VyugUFDOgJ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'expedientes/TraerServicio',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@TraerServicio',
        'controller' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@TraerServicio',
        'namespace' => 'Modules\\Expedientes\\Http\\Controllers',
        'prefix' => '/expedientes',
        'where' => 
        array (
        ),
        'as' => 'generated::5nj885VyugUFDOgJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cEvOrkEHmGJ8VCa7' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'expedientes/GuardarExpediente',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@GuardarExpediente',
        'controller' => 'Modules\\Expedientes\\Http\\Controllers\\ExpedientesController@GuardarExpediente',
        'namespace' => 'Modules\\Expedientes\\Http\\Controllers',
        'prefix' => '/expedientes',
        'where' => 
        array (
        ),
        'as' => 'generated::cEvOrkEHmGJ8VCa7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kpjJSRReKkm5dYuA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/nomina',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000faa0000000000000000";}";s:4:"hash";s:44:"dSWcR0J12i5SdovHpESd1BmzYScA2jAkRY1wdUKGUyY=";}}',
        'namespace' => 'Modules\\Nomina\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::kpjJSRReKkm5dYuA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::K1mXedI959Ig0NdP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nomina',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@index',
        'controller' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@index',
        'namespace' => 'Modules\\Nomina\\Http\\Controllers',
        'prefix' => '/nomina',
        'where' => 
        array (
        ),
        'as' => 'generated::K1mXedI959Ig0NdP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xdIjRgb0NytgVQ6s' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nomina/tablanomina',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@tablanomina',
        'controller' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@tablanomina',
        'namespace' => 'Modules\\Nomina\\Http\\Controllers',
        'prefix' => '/nomina',
        'where' => 
        array (
        ),
        'as' => 'generated::xdIjRgb0NytgVQ6s',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JfGVX2dhEhWGJrvs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nomina/{id}/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@show',
        'controller' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@show',
        'namespace' => 'Modules\\Nomina\\Http\\Controllers',
        'prefix' => '/nomina',
        'where' => 
        array (
        ),
        'as' => 'generated::JfGVX2dhEhWGJrvs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mZBs5t3tgQlT9WuP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nomina/{id}/historial',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@historial',
        'controller' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@historial',
        'namespace' => 'Modules\\Nomina\\Http\\Controllers',
        'prefix' => '/nomina',
        'where' => 
        array (
        ),
        'as' => 'generated::mZBs5t3tgQlT9WuP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uZobIgoNRT4gjoJu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nomina/{id}/pagos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@pagos',
        'controller' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@pagos',
        'namespace' => 'Modules\\Nomina\\Http\\Controllers',
        'prefix' => '/nomina',
        'where' => 
        array (
        ),
        'as' => 'generated::uZobIgoNRT4gjoJu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Rd3BvuALmDLEroKV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'nomina/tablahistorial',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@tablahistorial',
        'controller' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@tablahistorial',
        'namespace' => 'Modules\\Nomina\\Http\\Controllers',
        'prefix' => '/nomina',
        'where' => 
        array (
        ),
        'as' => 'generated::Rd3BvuALmDLEroKV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dp8JaVQz1mynW1Hk' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'nomina/BuscarPagos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@BuscarPagos',
        'controller' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@BuscarPagos',
        'namespace' => 'Modules\\Nomina\\Http\\Controllers',
        'prefix' => '/nomina',
        'where' => 
        array (
        ),
        'as' => 'generated::dp8JaVQz1mynW1Hk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6S2b0yxVjC96IbX7' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'nomina/crearHistorial',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@crearHistorial',
        'controller' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@crearHistorial',
        'namespace' => 'Modules\\Nomina\\Http\\Controllers',
        'prefix' => '/nomina',
        'where' => 
        array (
        ),
        'as' => 'generated::6S2b0yxVjC96IbX7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wBjbgGKOZ8FrcptN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'nomina/TrerComisionesExtras',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@TrerComisionesExtras',
        'controller' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@TrerComisionesExtras',
        'namespace' => 'Modules\\Nomina\\Http\\Controllers',
        'prefix' => '/nomina',
        'where' => 
        array (
        ),
        'as' => 'generated::wBjbgGKOZ8FrcptN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eDWSFiUwnlcbr3QA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/nomina2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000fba0000000000000000";}";s:4:"hash";s:44:"XAGPkB6OQGm514Jy/C5UoX1Oft8OCQVD2mitApul2TA=";}}',
        'namespace' => 'Modules\\Nomina2\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::eDWSFiUwnlcbr3QA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hwslCEQvTGRFjX7Q' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nomina2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina2\\Http\\Controllers\\Nomina2Controller@index',
        'controller' => 'Modules\\Nomina2\\Http\\Controllers\\Nomina2Controller@index',
        'namespace' => 'Modules\\Nomina2\\Http\\Controllers',
        'prefix' => '/nomina2',
        'where' => 
        array (
        ),
        'as' => 'generated::hwslCEQvTGRFjX7Q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sXaVI1sWeCWfVcyY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nomina2/tablanomina2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina2\\Http\\Controllers\\Nomina2Controller@tablanomina2',
        'controller' => 'Modules\\Nomina2\\Http\\Controllers\\Nomina2Controller@tablanomina2',
        'namespace' => 'Modules\\Nomina2\\Http\\Controllers',
        'prefix' => '/nomina2',
        'where' => 
        array (
        ),
        'as' => 'generated::sXaVI1sWeCWfVcyY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KeVsT4jWd9MeKne0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nomina2/{id}/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina2\\Http\\Controllers\\Nomina2Controller@show',
        'controller' => 'Modules\\Nomina2\\Http\\Controllers\\Nomina2Controller@show',
        'namespace' => 'Modules\\Nomina2\\Http\\Controllers',
        'prefix' => '/nomina2',
        'where' => 
        array (
        ),
        'as' => 'generated::KeVsT4jWd9MeKne0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9N5v9S1beYKj0t6I' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nomina2/{id}/historial',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina2\\Http\\Controllers\\Nomina2Controller@historial',
        'controller' => 'Modules\\Nomina2\\Http\\Controllers\\Nomina2Controller@historial',
        'namespace' => 'Modules\\Nomina2\\Http\\Controllers',
        'prefix' => '/nomina2',
        'where' => 
        array (
        ),
        'as' => 'generated::9N5v9S1beYKj0t6I',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::E68HXh4cj61n6crE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nomina2/{id}/pagos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina2\\Http\\Controllers\\Nomina2Controller@pagos',
        'controller' => 'Modules\\Nomina2\\Http\\Controllers\\Nomina2Controller@pagos',
        'namespace' => 'Modules\\Nomina2\\Http\\Controllers',
        'prefix' => '/nomina2',
        'where' => 
        array (
        ),
        'as' => 'generated::E68HXh4cj61n6crE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qiXB0MPm0PzfEWl3' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'nomina2/tablahistorial',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina2\\Http\\Controllers\\Nomina2Controller@tablahistorial',
        'controller' => 'Modules\\Nomina2\\Http\\Controllers\\Nomina2Controller@tablahistorial',
        'namespace' => 'Modules\\Nomina2\\Http\\Controllers',
        'prefix' => '/nomina2',
        'where' => 
        array (
        ),
        'as' => 'generated::qiXB0MPm0PzfEWl3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kpDa8synGl76gLvn' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'nomina2/BuscarPagos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina2\\Http\\Controllers\\Nomina2Controller@BuscarPagos',
        'controller' => 'Modules\\Nomina2\\Http\\Controllers\\Nomina2Controller@BuscarPagos',
        'namespace' => 'Modules\\Nomina2\\Http\\Controllers',
        'prefix' => '/nomina2',
        'where' => 
        array (
        ),
        'as' => 'generated::kpDa8synGl76gLvn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WttWiabK8GsibUYw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'nomina2/crearHistorial',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina2\\Http\\Controllers\\Nomina2Controller@crearHistorial',
        'controller' => 'Modules\\Nomina2\\Http\\Controllers\\Nomina2Controller@crearHistorial',
        'namespace' => 'Modules\\Nomina2\\Http\\Controllers',
        'prefix' => '/nomina2',
        'where' => 
        array (
        ),
        'as' => 'generated::WttWiabK8GsibUYw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4glgUmLrejCfQt0g' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'nomina2/TrerComisionesExtras',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina2\\Http\\Controllers\\Nomina2Controller@TrerComisionesExtras',
        'controller' => 'Modules\\Nomina2\\Http\\Controllers\\Nomina2Controller@TrerComisionesExtras',
        'namespace' => 'Modules\\Nomina2\\Http\\Controllers',
        'prefix' => '/nomina2',
        'where' => 
        array (
        ),
        'as' => 'generated::4glgUmLrejCfQt0g',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BT7o38wGFGyePjQU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/promociones',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000fca0000000000000000";}";s:4:"hash";s:44:"xfZbjbBNkPQkmTuuY2FUl1q+3U5enJ9lyDm94kai+9I=";}}',
        'namespace' => 'Modules\\Promociones\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::BT7o38wGFGyePjQU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dukUm3m3fs7o1cHi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'promociones',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Promociones\\Http\\Controllers\\PromocionesController@index',
        'controller' => 'Modules\\Promociones\\Http\\Controllers\\PromocionesController@index',
        'namespace' => 'Modules\\Promociones\\Http\\Controllers',
        'prefix' => '/promociones',
        'where' => 
        array (
        ),
        'as' => 'generated::dukUm3m3fs7o1cHi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SZgU1C6KLgJKUNnk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'promociones/tablapromociones',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Promociones\\Http\\Controllers\\PromocionesController@tablapromociones',
        'controller' => 'Modules\\Promociones\\Http\\Controllers\\PromocionesController@tablapromociones',
        'namespace' => 'Modules\\Promociones\\Http\\Controllers',
        'prefix' => '/promociones',
        'where' => 
        array (
        ),
        'as' => 'generated::SZgU1C6KLgJKUNnk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::M89hhWTHFeuxV4et' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'promociones/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Promociones\\Http\\Controllers\\PromocionesController@create',
        'controller' => 'Modules\\Promociones\\Http\\Controllers\\PromocionesController@create',
        'namespace' => 'Modules\\Promociones\\Http\\Controllers',
        'prefix' => '/promociones',
        'where' => 
        array (
        ),
        'as' => 'generated::M89hhWTHFeuxV4et',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5Yr6MuKfOxFvgu4i' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'promociones/createcumpleanos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Promociones\\Http\\Controllers\\PromocionesController@createcumpleanos',
        'controller' => 'Modules\\Promociones\\Http\\Controllers\\PromocionesController@createcumpleanos',
        'namespace' => 'Modules\\Promociones\\Http\\Controllers',
        'prefix' => '/promociones',
        'where' => 
        array (
        ),
        'as' => 'generated::5Yr6MuKfOxFvgu4i',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LzMOoPlhiSYcMnJO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'promociones/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Promociones\\Http\\Controllers\\PromocionesController@store',
        'controller' => 'Modules\\Promociones\\Http\\Controllers\\PromocionesController@store',
        'namespace' => 'Modules\\Promociones\\Http\\Controllers',
        'prefix' => '/promociones',
        'where' => 
        array (
        ),
        'as' => 'generated::LzMOoPlhiSYcMnJO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dIkV9JPGwrQaBaIc' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'promociones/creates',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Promociones\\Http\\Controllers\\PromocionesController@stores',
        'controller' => 'Modules\\Promociones\\Http\\Controllers\\PromocionesController@stores',
        'namespace' => 'Modules\\Promociones\\Http\\Controllers',
        'prefix' => '/promociones',
        'where' => 
        array (
        ),
        'as' => 'generated::dIkV9JPGwrQaBaIc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pAbJQJA3WRU6ymH6' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'promociones/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Promociones\\Http\\Controllers\\PromocionesController@destroy',
        'controller' => 'Modules\\Promociones\\Http\\Controllers\\PromocionesController@destroy',
        'namespace' => 'Modules\\Promociones\\Http\\Controllers',
        'prefix' => '/promociones',
        'where' => 
        array (
        ),
        'as' => 'generated::pAbJQJA3WRU6ymH6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HUszn15VyjvUQyyx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'promociones/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Promociones\\Http\\Controllers\\PromocionesController@edit',
        'controller' => 'Modules\\Promociones\\Http\\Controllers\\PromocionesController@edit',
        'namespace' => 'Modules\\Promociones\\Http\\Controllers',
        'prefix' => '/promociones',
        'where' => 
        array (
        ),
        'as' => 'generated::HUszn15VyjvUQyyx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tkYnWrKcyLos2nvG' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'promociones/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Promociones\\Http\\Controllers\\PromocionesController@update',
        'controller' => 'Modules\\Promociones\\Http\\Controllers\\PromocionesController@update',
        'namespace' => 'Modules\\Promociones\\Http\\Controllers',
        'prefix' => '/promociones',
        'where' => 
        array (
        ),
        'as' => 'generated::tkYnWrKcyLos2nvG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gVV6eh8HbeDVIvCQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/promociones2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000fda0000000000000000";}";s:4:"hash";s:44:"4kNZeGLksROkv9v9O8s1tMz0zuEMlOXZZhul4TYaDFc=";}}',
        'namespace' => 'Modules\\Promociones2\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::gVV6eh8HbeDVIvCQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UAscV1ECG3C5uhss' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'promociones2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Promociones2\\Http\\Controllers\\Promociones2Controller@index',
        'controller' => 'Modules\\Promociones2\\Http\\Controllers\\Promociones2Controller@index',
        'namespace' => 'Modules\\Promociones2\\Http\\Controllers',
        'prefix' => '/promociones2',
        'where' => 
        array (
        ),
        'as' => 'generated::UAscV1ECG3C5uhss',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fCg5rdj9LRegLJHc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'promociones2/tablapromociones2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Promociones2\\Http\\Controllers\\Promociones2Controller@tablapromociones2',
        'controller' => 'Modules\\Promociones2\\Http\\Controllers\\Promociones2Controller@tablapromociones2',
        'namespace' => 'Modules\\Promociones2\\Http\\Controllers',
        'prefix' => '/promociones2',
        'where' => 
        array (
        ),
        'as' => 'generated::fCg5rdj9LRegLJHc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yg5Fzb4nv5oSbUDk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'promociones2/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Promociones2\\Http\\Controllers\\Promociones2Controller@create',
        'controller' => 'Modules\\Promociones2\\Http\\Controllers\\Promociones2Controller@create',
        'namespace' => 'Modules\\Promociones2\\Http\\Controllers',
        'prefix' => '/promociones2',
        'where' => 
        array (
        ),
        'as' => 'generated::yg5Fzb4nv5oSbUDk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YCJhQE171TrxM3rZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'promociones2/createcumpleanos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Promociones2\\Http\\Controllers\\Promociones2Controller@createcumpleanos',
        'controller' => 'Modules\\Promociones2\\Http\\Controllers\\Promociones2Controller@createcumpleanos',
        'namespace' => 'Modules\\Promociones2\\Http\\Controllers',
        'prefix' => '/promociones2',
        'where' => 
        array (
        ),
        'as' => 'generated::YCJhQE171TrxM3rZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eFVtmwO27WNABKUP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'promociones2/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Promociones2\\Http\\Controllers\\Promociones2Controller@store',
        'controller' => 'Modules\\Promociones2\\Http\\Controllers\\Promociones2Controller@store',
        'namespace' => 'Modules\\Promociones2\\Http\\Controllers',
        'prefix' => '/promociones2',
        'where' => 
        array (
        ),
        'as' => 'generated::eFVtmwO27WNABKUP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3bIO4RFenXn37rMr' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'promociones2/creates',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Promociones2\\Http\\Controllers\\Promociones2Controller@stores',
        'controller' => 'Modules\\Promociones2\\Http\\Controllers\\Promociones2Controller@stores',
        'namespace' => 'Modules\\Promociones2\\Http\\Controllers',
        'prefix' => '/promociones2',
        'where' => 
        array (
        ),
        'as' => 'generated::3bIO4RFenXn37rMr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cYpkH2YyhFO9nQIN' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'promociones2/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Promociones2\\Http\\Controllers\\Promociones2Controller@destroy',
        'controller' => 'Modules\\Promociones2\\Http\\Controllers\\Promociones2Controller@destroy',
        'namespace' => 'Modules\\Promociones2\\Http\\Controllers',
        'prefix' => '/promociones2',
        'where' => 
        array (
        ),
        'as' => 'generated::cYpkH2YyhFO9nQIN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tRxzXXMjnzlfdMHW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'promociones2/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Promociones2\\Http\\Controllers\\Promociones2Controller@edit',
        'controller' => 'Modules\\Promociones2\\Http\\Controllers\\Promociones2Controller@edit',
        'namespace' => 'Modules\\Promociones2\\Http\\Controllers',
        'prefix' => '/promociones2',
        'where' => 
        array (
        ),
        'as' => 'generated::tRxzXXMjnzlfdMHW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ksg3xXJJKbrPrWDH' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'promociones2/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Promociones2\\Http\\Controllers\\Promociones2Controller@update',
        'controller' => 'Modules\\Promociones2\\Http\\Controllers\\Promociones2Controller@update',
        'namespace' => 'Modules\\Promociones2\\Http\\Controllers',
        'prefix' => '/promociones2',
        'where' => 
        array (
        ),
        'as' => 'generated::ksg3xXJJKbrPrWDH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wsiKTK2kOTFfOSgn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/proveedores',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000fea0000000000000000";}";s:4:"hash";s:44:"ehnloI0aag1IGilHSCn4VNWXk7odOHNmSD2ZRZqbrVI=";}}',
        'namespace' => 'Modules\\Proveedores\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::wsiKTK2kOTFfOSgn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mH9PUZ8YtOhnEoav' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'proveedores',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Proveedores\\Http\\Controllers\\ProveedoresController@index',
        'controller' => 'Modules\\Proveedores\\Http\\Controllers\\ProveedoresController@index',
        'namespace' => 'Modules\\Proveedores\\Http\\Controllers',
        'prefix' => '/proveedores',
        'where' => 
        array (
        ),
        'as' => 'generated::mH9PUZ8YtOhnEoav',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aPcn38N6mOTS7BHw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'proveedores/tablaproveedores',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Proveedores\\Http\\Controllers\\ProveedoresController@tablaproveedores',
        'controller' => 'Modules\\Proveedores\\Http\\Controllers\\ProveedoresController@tablaproveedores',
        'namespace' => 'Modules\\Proveedores\\Http\\Controllers',
        'prefix' => '/proveedores',
        'where' => 
        array (
        ),
        'as' => 'generated::aPcn38N6mOTS7BHw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dWoNAc6UBcltzkKa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'proveedores/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Proveedores\\Http\\Controllers\\ProveedoresController@create',
        'controller' => 'Modules\\Proveedores\\Http\\Controllers\\ProveedoresController@create',
        'namespace' => 'Modules\\Proveedores\\Http\\Controllers',
        'prefix' => '/proveedores',
        'where' => 
        array (
        ),
        'as' => 'generated::dWoNAc6UBcltzkKa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7Hy6hJrFh1RPN8e7' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'proveedores/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Proveedores\\Http\\Controllers\\ProveedoresController@store',
        'controller' => 'Modules\\Proveedores\\Http\\Controllers\\ProveedoresController@store',
        'namespace' => 'Modules\\Proveedores\\Http\\Controllers',
        'prefix' => '/proveedores',
        'where' => 
        array (
        ),
        'as' => 'generated::7Hy6hJrFh1RPN8e7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lUrguqrAkJt43jTK' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'proveedores/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Proveedores\\Http\\Controllers\\ProveedoresController@destroy',
        'controller' => 'Modules\\Proveedores\\Http\\Controllers\\ProveedoresController@destroy',
        'namespace' => 'Modules\\Proveedores\\Http\\Controllers',
        'prefix' => '/proveedores',
        'where' => 
        array (
        ),
        'as' => 'generated::lUrguqrAkJt43jTK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pxc3LpvhA9KtCdzv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'proveedores/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Proveedores\\Http\\Controllers\\ProveedoresController@edit',
        'controller' => 'Modules\\Proveedores\\Http\\Controllers\\ProveedoresController@edit',
        'namespace' => 'Modules\\Proveedores\\Http\\Controllers',
        'prefix' => '/proveedores',
        'where' => 
        array (
        ),
        'as' => 'generated::pxc3LpvhA9KtCdzv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YWluJ1QZkHkM9kuo' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'proveedores/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Proveedores\\Http\\Controllers\\ProveedoresController@update',
        'controller' => 'Modules\\Proveedores\\Http\\Controllers\\ProveedoresController@update',
        'namespace' => 'Modules\\Proveedores\\Http\\Controllers',
        'prefix' => '/proveedores',
        'where' => 
        array (
        ),
        'as' => 'generated::YWluJ1QZkHkM9kuo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JM0aU6Emnulol79d' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/proveedores2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000ff80000000000000000";}";s:4:"hash";s:44:"V3x0dLd/vNaeDI6t6zBXihsGJcaDVbZPCuSX8VzjFhc=";}}',
        'namespace' => 'Modules\\Proveedores2\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::JM0aU6Emnulol79d',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9TS2r0JGEgvyNsR0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'proveedores2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Proveedores2\\Http\\Controllers\\Proveedores2Controller@index',
        'controller' => 'Modules\\Proveedores2\\Http\\Controllers\\Proveedores2Controller@index',
        'namespace' => 'Modules\\Proveedores2\\Http\\Controllers',
        'prefix' => '/proveedores2',
        'where' => 
        array (
        ),
        'as' => 'generated::9TS2r0JGEgvyNsR0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::oWjklWzuyiNYBsyN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'proveedores2/tablaproveedores2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Proveedores2\\Http\\Controllers\\Proveedores2Controller@tablaproveedores2',
        'controller' => 'Modules\\Proveedores2\\Http\\Controllers\\Proveedores2Controller@tablaproveedores2',
        'namespace' => 'Modules\\Proveedores2\\Http\\Controllers',
        'prefix' => '/proveedores2',
        'where' => 
        array (
        ),
        'as' => 'generated::oWjklWzuyiNYBsyN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CfAQYOrlBIVN0X6r' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'proveedores2/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Proveedores2\\Http\\Controllers\\Proveedores2Controller@create',
        'controller' => 'Modules\\Proveedores2\\Http\\Controllers\\Proveedores2Controller@create',
        'namespace' => 'Modules\\Proveedores2\\Http\\Controllers',
        'prefix' => '/proveedores2',
        'where' => 
        array (
        ),
        'as' => 'generated::CfAQYOrlBIVN0X6r',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5O9Dv3KyuFlM1cTb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'proveedores2/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Proveedores2\\Http\\Controllers\\Proveedores2Controller@store',
        'controller' => 'Modules\\Proveedores2\\Http\\Controllers\\Proveedores2Controller@store',
        'namespace' => 'Modules\\Proveedores2\\Http\\Controllers',
        'prefix' => '/proveedores2',
        'where' => 
        array (
        ),
        'as' => 'generated::5O9Dv3KyuFlM1cTb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JUv5L7TlvU9YRcvq' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'proveedores2/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Proveedores2\\Http\\Controllers\\Proveedores2Controller@destroy',
        'controller' => 'Modules\\Proveedores2\\Http\\Controllers\\Proveedores2Controller@destroy',
        'namespace' => 'Modules\\Proveedores2\\Http\\Controllers',
        'prefix' => '/proveedores2',
        'where' => 
        array (
        ),
        'as' => 'generated::JUv5L7TlvU9YRcvq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Y36o8wxbnuGvXmhg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'proveedores2/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Proveedores2\\Http\\Controllers\\Proveedores2Controller@edit',
        'controller' => 'Modules\\Proveedores2\\Http\\Controllers\\Proveedores2Controller@edit',
        'namespace' => 'Modules\\Proveedores2\\Http\\Controllers',
        'prefix' => '/proveedores2',
        'where' => 
        array (
        ),
        'as' => 'generated::Y36o8wxbnuGvXmhg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DqCaMG3unkzNICJ8' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'proveedores2/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Proveedores2\\Http\\Controllers\\Proveedores2Controller@update',
        'controller' => 'Modules\\Proveedores2\\Http\\Controllers\\Proveedores2Controller@update',
        'namespace' => 'Modules\\Proveedores2\\Http\\Controllers',
        'prefix' => '/proveedores2',
        'where' => 
        array (
        ),
        'as' => 'generated::DqCaMG3unkzNICJ8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jRzKqHzF7LdrP8UC' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/reportes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000010060000000000000000";}";s:4:"hash";s:44:"QmUb5bZI09kEpLBVSbZB6l7albpVFRK5dPc74vqV4OU=";}}',
        'namespace' => 'Modules\\Reportes\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::jRzKqHzF7LdrP8UC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bZA5e6YTjE56VvZd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reportes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Reportes\\Http\\Controllers\\ReportesController@index',
        'controller' => 'Modules\\Reportes\\Http\\Controllers\\ReportesController@index',
        'namespace' => 'Modules\\Reportes\\Http\\Controllers',
        'prefix' => '/reportes',
        'where' => 
        array (
        ),
        'as' => 'generated::bZA5e6YTjE56VvZd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vTpk5ZohTLtySTUs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/reportes2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000000000100e0000000000000000";}";s:4:"hash";s:44:"up5bRWHg/w517HAgpOi/ktjZbcpiVda3iI9QSo9BNdU=";}}',
        'namespace' => 'Modules\\Reportes2\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::vTpk5ZohTLtySTUs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZGfgONgHoI2xE61m' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reportes2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Reportes2\\Http\\Controllers\\Reportes2Controller@index',
        'controller' => 'Modules\\Reportes2\\Http\\Controllers\\Reportes2Controller@index',
        'namespace' => 'Modules\\Reportes2\\Http\\Controllers',
        'prefix' => '/reportes2',
        'where' => 
        array (
        ),
        'as' => 'generated::ZGfgONgHoI2xE61m',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wTAbfpjzKa2Eyu2Y' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reportes2/reporteCliente/{id}/{fecha1}/{fecha2}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Reportes2\\Http\\Controllers\\Reportes2Controller@Clientes',
        'controller' => 'Modules\\Reportes2\\Http\\Controllers\\Reportes2Controller@Clientes',
        'namespace' => 'Modules\\Reportes2\\Http\\Controllers',
        'prefix' => '/reportes2',
        'where' => 
        array (
        ),
        'as' => 'generated::wTAbfpjzKa2Eyu2Y',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qJt3Qj9KPtDRQpQM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reportes2/reporteEmpleado/{id}/{fecha3}/{fecha4}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Reportes2\\Http\\Controllers\\Reportes2Controller@reporteEmpleado',
        'controller' => 'Modules\\Reportes2\\Http\\Controllers\\Reportes2Controller@reporteEmpleado',
        'namespace' => 'Modules\\Reportes2\\Http\\Controllers',
        'prefix' => '/reportes2',
        'where' => 
        array (
        ),
        'as' => 'generated::qJt3Qj9KPtDRQpQM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::iFdGThKvsbbbq5uM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reportes2/reporteTotales/{fecha5}/{fecha6}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Reportes2\\Http\\Controllers\\Reportes2Controller@reporteTotales',
        'controller' => 'Modules\\Reportes2\\Http\\Controllers\\Reportes2Controller@reporteTotales',
        'namespace' => 'Modules\\Reportes2\\Http\\Controllers',
        'prefix' => '/reportes2',
        'where' => 
        array (
        ),
        'as' => 'generated::iFdGThKvsbbbq5uM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ocKtWaQyr2a6yYsr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/ventas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000010190000000000000000";}";s:4:"hash";s:44:"gXa+/MgHh8DxgzRv0kTEnyeWhG7MZaKnyocbZt0zkXQ=";}}',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ocKtWaQyr2a6yYsr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HL1atovFvVuBsgF5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@index',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@index',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::HL1atovFvVuBsgF5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::s3wSAZ5B7oYEd297' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas/traerTratamiento',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@traerTratamiento',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@traerTratamiento',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::s3wSAZ5B7oYEd297',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6NK1qmwnatfzOVR6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas/agregarcliente',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@agregarcliente',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@agregarcliente',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::6NK1qmwnatfzOVR6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::h70RZT1iYqOQOQhM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas/traerProducto',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@traerProducto',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@traerProducto',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::h70RZT1iYqOQOQhM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xXwYUhAVLiWznMSd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas/TraerCupon',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@TraerCupon',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@TraerCupon',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::xXwYUhAVLiWznMSd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DymPtCRufHUaqsOS' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@store',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@store',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::DymPtCRufHUaqsOS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::V4jn0Q1U6Ql9p2bN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas/traerPreventa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@traerPreventa',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@traerPreventa',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::V4jn0Q1U6Ql9p2bN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DDNWrcHLVK7ZIKZE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas/traerPreventa2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@traerPreventa2',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@traerPreventa2',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::DDNWrcHLVK7ZIKZE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::veN5TzTwUQUNh2cm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas/preventaPago',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@preventaPago',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@preventaPago',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::veN5TzTwUQUNh2cm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WMttHZUHqZWFooev' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas/preventaPago2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@preventaPago2',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@preventaPago2',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::WMttHZUHqZWFooev',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::x7K6UauIBuxACcyq' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas/NumerosLetras',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@ConvertirLetras',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@ConvertirLetras',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::x7K6UauIBuxACcyq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yq7lwpNlAWtDgRoP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas/ver_ventas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@ver_ventas',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@ver_ventas',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::yq7lwpNlAWtDgRoP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BXKttapRN2XQiZPT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas/tablaventas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@tablaventas',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@tablaventas',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::BXKttapRN2XQiZPT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::u1ULVn7JFy3QttOl' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas/{id}/show_venta',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@show_venta',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@show_venta',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::u1ULVn7JFy3QttOl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9W2zEUok8mrVL9D0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas/preventas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@preventas',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@preventas',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::9W2zEUok8mrVL9D0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SzEUb1uF3gfKHR1o' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas/tablapreventas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@tablapreventas',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@tablapreventas',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::SzEUb1uF3gfKHR1o',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::50BTqnCgNizKWVw0' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas/traerPreventas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@traerPreventas',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@traerPreventas',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::50BTqnCgNizKWVw0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BGdibsSZgvgO7QxI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas/tablaliquidaciones',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@tablaliquidaciones',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@tablaliquidaciones',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::BGdibsSZgvgO7QxI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xng61DMHOf7wpdJb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas/traerLiquidacion',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@traerLiquidacion',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@traerLiquidacion',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::xng61DMHOf7wpdJb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::m81mPakpwFbGEYUs' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas/abonoPago',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@abonoPago',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@abonoPago',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::m81mPakpwFbGEYUs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DtFaPWrC6wzxl2uf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas/articulos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@tablaarticulos',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@tablaarticulos',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::DtFaPWrC6wzxl2uf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9LFyjYjZeSqk07tA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas/tablaProductosVenta',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@tablaProductosVenta',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@tablaProductosVenta',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::9LFyjYjZeSqk07tA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::moiO07i2VccC1oDO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas/traerProductos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@traerProductos',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\VentasController@traerProductos',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => '/ventas',
        'where' => 
        array (
        ),
        'as' => 'generated::moiO07i2VccC1oDO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Iy11RZOy3YZlaNWZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas/certificados',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\CertificadosController@index',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\CertificadosController@index',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => 'ventas/certificados',
        'where' => 
        array (
        ),
        'as' => 'generated::Iy11RZOy3YZlaNWZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Qi3reUA9unImqcG0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas/certificados/tablacertificados',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\CertificadosController@tablacertificados',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\CertificadosController@tablacertificados',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => 'ventas/certificados',
        'where' => 
        array (
        ),
        'as' => 'generated::Qi3reUA9unImqcG0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2esphKcpyQXA6ZXl' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas/certificados/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\CertificadosController@create',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\CertificadosController@create',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => 'ventas/certificados',
        'where' => 
        array (
        ),
        'as' => 'generated::2esphKcpyQXA6ZXl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kPIW7dbrHOi9bxKL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas/certificados/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\CertificadosController@store',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\CertificadosController@store',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => 'ventas/certificados',
        'where' => 
        array (
        ),
        'as' => 'generated::kPIW7dbrHOi9bxKL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zopLtClmhBnXQNuE' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'ventas/certificados/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\CertificadosController@destroy',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\CertificadosController@destroy',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => 'ventas/certificados',
        'where' => 
        array (
        ),
        'as' => 'generated::zopLtClmhBnXQNuE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5erIwtqTd1WVcL6f' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas/certificados/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\CertificadosController@edit',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\CertificadosController@edit',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => 'ventas/certificados',
        'where' => 
        array (
        ),
        'as' => 'generated::5erIwtqTd1WVcL6f',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pX6x2FXNs4IaGDJU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas/certificados/{id}/imprimir',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\CertificadosController@imprimir',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\CertificadosController@imprimir',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => 'ventas/certificados',
        'where' => 
        array (
        ),
        'as' => 'generated::pX6x2FXNs4IaGDJU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8maDM7eulq3X0GMN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas/certificados/{id}/imprimirposterior',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\CertificadosController@imprimirposterior',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\CertificadosController@imprimirposterior',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => 'ventas/certificados',
        'where' => 
        array (
        ),
        'as' => 'generated::8maDM7eulq3X0GMN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3JFT4xljpazo2Ll6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas/certificados/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas\\Http\\Controllers\\CertificadosController@update',
        'controller' => 'Modules\\Ventas\\Http\\Controllers\\CertificadosController@update',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => 'ventas/certificados',
        'where' => 
        array (
        ),
        'as' => 'generated::3JFT4xljpazo2Ll6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kupJlE5ZW8TTS5zx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/ventas2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000000000103f0000000000000000";}";s:4:"hash";s:44:"rbWK79jJ5SfZHXr9tQoPdYBwu598xhtB2J6IgTjaiPI=";}}',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::kupJlE5ZW8TTS5zx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pF3WjBQd0PFU7l6a' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@index',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@index',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::pF3WjBQd0PFU7l6a',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BPhRWUUGoPuR4S4S' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas2/traerTratamiento',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@traerTratamiento',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@traerTratamiento',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::BPhRWUUGoPuR4S4S',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eDbmADMmkkcHJxXu' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas2/agregarcliente',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@agregarcliente',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@agregarcliente',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::eDbmADMmkkcHJxXu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OqRejNg6iU2nSFnl' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas2/traerProducto',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@traerProducto',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@traerProducto',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::OqRejNg6iU2nSFnl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CspS2djgS5MhFjJ9' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas2/TraerCupon',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@TraerCupon',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@TraerCupon',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::CspS2djgS5MhFjJ9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QtfGV0Mt2qGG2nWp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas2/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@store',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@store',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::QtfGV0Mt2qGG2nWp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dVzqNAqv05enHi2A' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas2/traerPreventa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@traerPreventa',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@traerPreventa',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::dVzqNAqv05enHi2A',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Op2oWxNKSpzxQUTs' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas2/traerPreventa2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@traerPreventa2',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@traerPreventa2',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::Op2oWxNKSpzxQUTs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ojgGoNUQNZXBqR5i' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas2/preventaPago',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@preventaPago',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@preventaPago',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::ojgGoNUQNZXBqR5i',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Ll784PIuBbxkCXJ6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas2/preventaPago2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@preventaPago2',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@preventaPago2',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::Ll784PIuBbxkCXJ6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ThcJmC6wYQpdMtZd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas2/NumerosLetras',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@ConvertirLetras',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@ConvertirLetras',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::ThcJmC6wYQpdMtZd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::B3b1fMoh599xObno' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas2/ver_ventas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@ver_ventas',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@ver_ventas',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::B3b1fMoh599xObno',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wu9qHsq1qx6NXbo6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas2/tablaventas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@tablaventas',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@tablaventas',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::wu9qHsq1qx6NXbo6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jRnuN6AgEEZRAXKW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas2/{id}/show_venta',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@show_venta',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@show_venta',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::jRnuN6AgEEZRAXKW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MpoiLgeUtd1E8ME4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas2/preventas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@preventas',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@preventas',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::MpoiLgeUtd1E8ME4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ebjlnJ9VstgpF4O9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas2/tablapreventas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@tablapreventas',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@tablapreventas',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::ebjlnJ9VstgpF4O9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::d664hB5tr4M7uOYq' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas2/traerPreventas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@traerPreventas',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@traerPreventas',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::d664hB5tr4M7uOYq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nAhXEwoMsuiekFAX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas2/traerProductos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@traerProductos',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@traerProductos',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::nAhXEwoMsuiekFAX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9SandsD3FVRLKAZz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas2/tablaliquidaciones',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@tablaliquidaciones',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@tablaliquidaciones',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::9SandsD3FVRLKAZz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::K0JSMNbqm7yujj1Z' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas2/traerLiquidacion',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@traerLiquidacion',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@traerLiquidacion',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::K0JSMNbqm7yujj1Z',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CeRIym3g4Fwf3nmY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas2/abonoPago',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@abonoPago',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@abonoPago',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::CeRIym3g4Fwf3nmY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7oDpmhNbrila9VKN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas2/articulos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@tablaarticulos',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@tablaarticulos',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::7oDpmhNbrila9VKN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fmsDiSc8u7C0kszZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas2/tablaProductosVenta',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@tablaProductosVenta',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\Ventas2Controller@tablaProductosVenta',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => '/ventas2',
        'where' => 
        array (
        ),
        'as' => 'generated::fmsDiSc8u7C0kszZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ncWlIUzA9WEIPwlt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas2/certificados',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\CertificadosController@index',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\CertificadosController@index',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => 'ventas2/certificados',
        'where' => 
        array (
        ),
        'as' => 'generated::ncWlIUzA9WEIPwlt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hEXARV5IYnMfCjuw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas2/certificados/tablacertificados',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\CertificadosController@tablacertificados',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\CertificadosController@tablacertificados',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => 'ventas2/certificados',
        'where' => 
        array (
        ),
        'as' => 'generated::hEXARV5IYnMfCjuw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wM5zT2ONZvQrDao3' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas2/certificados/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\CertificadosController@create',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\CertificadosController@create',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => 'ventas2/certificados',
        'where' => 
        array (
        ),
        'as' => 'generated::wM5zT2ONZvQrDao3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NoKY4atktXWo9VN2' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas2/certificados/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\CertificadosController@store',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\CertificadosController@store',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => 'ventas2/certificados',
        'where' => 
        array (
        ),
        'as' => 'generated::NoKY4atktXWo9VN2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YGJazlRNb8tamElE' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'ventas2/certificados/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\CertificadosController@destroy',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\CertificadosController@destroy',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => 'ventas2/certificados',
        'where' => 
        array (
        ),
        'as' => 'generated::YGJazlRNb8tamElE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IMJ8VQa2IBvTQflT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas2/certificados/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\CertificadosController@edit',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\CertificadosController@edit',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => 'ventas2/certificados',
        'where' => 
        array (
        ),
        'as' => 'generated::IMJ8VQa2IBvTQflT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3DAfSMST0qW2xzlf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas2/certificados/{id}/imprimir',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\CertificadosController@imprimir',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\CertificadosController@imprimir',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => 'ventas2/certificados',
        'where' => 
        array (
        ),
        'as' => 'generated::3DAfSMST0qW2xzlf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XgZhNYd3EjhrTvQI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ventas2/certificados/{id}/imprimirposterior',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\CertificadosController@imprimirposterior',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\CertificadosController@imprimirposterior',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => 'ventas2/certificados',
        'where' => 
        array (
        ),
        'as' => 'generated::XgZhNYd3EjhrTvQI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::g5Z2XXKa9YrM60LX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ventas2/certificados/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Ventas2\\Http\\Controllers\\CertificadosController@update',
        'controller' => 'Modules\\Ventas2\\Http\\Controllers\\CertificadosController@update',
        'namespace' => 'Modules\\Ventas2\\Http\\Controllers',
        'prefix' => 'ventas2/certificados',
        'where' => 
        array (
        ),
        'as' => 'generated::g5Z2XXKa9YrM60LX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
