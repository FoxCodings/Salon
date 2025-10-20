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
            '_route' => 'generated::5Vpoj3TCJybvol7U',
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
            '_route' => 'generated::My581Ff3dNScvDgk',
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
            '_route' => 'password.confirm',
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
            '_route' => 'generated::BQ13eTs9AOsoPqsh',
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
            '_route' => 'generated::jz2Cm8Lc5rjO8B0y',
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
            '_route' => 'generated::57YoEkjqIjRjzVyw',
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
            '_route' => 'generated::7M1eIVBwDTfImbF3',
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
            '_route' => 'generated::5lbKURpjErmylc0m',
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
            '_route' => 'generated::wdPgbwujTsYHjXcc',
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
            '_route' => 'generated::hK4HzDZ2oQ9qIayq',
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
            '_route' => 'generated::1cZ0QB1wFhXE1GOh',
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
            '_route' => 'generated::TfhCJ6y23b9UAyOK',
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
            '_route' => 'generated::wjWNsAp4OiiuYSyY',
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
            '_route' => 'generated::cZSbloXYZ9JVWi5m',
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
      '/api/agenda2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pkwsx9ZBEPoVdExj',
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
            '_route' => 'generated::tLeptUFZMUuKRARq',
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
            '_route' => 'generated::sf6EwUufgKuZPA6W',
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
            '_route' => 'generated::H8OqBFl18bI4Q5Qq',
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
            '_route' => 'generated::fnHDkLJfVe3UXM9w',
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
            '_route' => 'generated::XgDi28jeFVCR4XqZ',
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
            '_route' => 'generated::6IQYr76eBpYdIexJ',
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
            '_route' => 'generated::VKopKJ0BEYu6jDey',
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
            '_route' => 'generated::9ZjRj4qWVNnvVtT1',
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
            '_route' => 'generated::0Do1JcqGeLwiBaOF',
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
            '_route' => 'generated::y1s3dxf00GRJDZUl',
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
            '_route' => 'generated::lYtjOLHi5iQFlv9f',
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
            '_route' => 'generated::IS027PYBPU29KkBo',
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
            '_route' => 'generated::P1Xo1u5XvSHF0fua',
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
            '_route' => 'generated::VQLMQrR0c5Er03wn',
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
            '_route' => 'generated::KcUs4N2pBdJNrfsc',
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
      '/agendas/VerEvento' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DMMYMHBQVzp05yy8',
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
            '_route' => 'generated::TOa9NvP8LGmkbdDH',
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
            '_route' => 'generated::iVushAHQNRO2N7PA',
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
            '_route' => 'generated::LbrKNfHoF28bFKT9',
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
            '_route' => 'generated::lQht3HdCxVGBnodC',
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
            '_route' => 'generated::lDQ1LwJZpfUJvuHM',
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
            '_route' => 'generated::jmJ8ZFvVn1HsprjP',
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
            '_route' => 'generated::8xYcoRneh64CY64g',
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
            '_route' => 'generated::HUrxwISX4ZDVTBeh',
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
            '_route' => 'generated::8S2iZAlEwRL6rvjI',
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
            '_route' => 'generated::Q6fpGJgZyYxGv7z7',
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
            '_route' => 'generated::jhritfF2JTaM6Zd9',
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
            '_route' => 'generated::cTKKyAiUokAkfeIr',
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
            '_route' => 'generated::fNqibSZhQcMUbNdv',
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
            '_route' => 'generated::WvAPDiAnCip6cj94',
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
            '_route' => 'generated::rhM6th4o64aUvjEp',
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
            '_route' => 'generated::0dS2M6xaRbHDGfTL',
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
            '_route' => 'generated::xTFdSm420BaNzpC6',
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
            '_route' => 'generated::6jroCKYjo3x7q8cm',
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
            '_route' => 'generated::jZKW7OyOqM9oTv5c',
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
            '_route' => 'generated::XIpJHuqD5Tc2QT3e',
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
            '_route' => 'generated::k8aZWzQ9h1qFZ1Bq',
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
            '_route' => 'generated::VQ7AbfUdxYK6ORxB',
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
            '_route' => 'generated::dJxqUPjOGhDdguE6',
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
            '_route' => 'generated::wUiwDrNuz6bBSFja',
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
            '_route' => 'generated::XatiL14BI1QWfYZx',
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
            '_route' => 'generated::VjILXibHszk9p2Bp',
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
            '_route' => 'generated::ULSMqXgObsPqdPKw',
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
            '_route' => 'generated::x0GqQEYhpjoyW45a',
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
            '_route' => 'generated::aFSUHdZe0yN4go1p',
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
            '_route' => 'generated::1dS11dJ4YsGFqhrV',
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
            '_route' => 'generated::EnE1k05Spq4Etdf7',
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
            '_route' => 'generated::FpOoehn6mEkpIhQJ',
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
            '_route' => 'generated::7ozqiNTnjbCjzkzW',
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
            '_route' => 'generated::iBMslGDyj1O0wZis',
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
            '_route' => 'generated::nZBUkGeh3pSon6eb',
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
            '_route' => 'generated::gKtTD4ThPYh93lKe',
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
            '_route' => 'generated::sSAF3nPlyVNdHW84',
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
            '_route' => 'generated::rgBQ3AXn1KYXNFfo',
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
            '_route' => 'generated::QWxbKQfiDS0w84Pj',
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
            '_route' => 'generated::SyTFYRtX79BjYeYL',
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
            '_route' => 'generated::JRDDXY4jvEPwMegU',
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
            '_route' => 'generated::7Q93FK6ame8Ukz1o',
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
            '_route' => 'generated::fp3dLv3prvsKBv1D',
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
            '_route' => 'generated::IbbzqyQmDUsJZCUJ',
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
            '_route' => 'generated::fCh7sqTzNahgEwgo',
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
            '_route' => 'generated::xzWJdXm69gmC9zu9',
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
            '_route' => 'generated::X8fjtLCx71XzLkUN',
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
            '_route' => 'generated::NzGCNBUYndOa8Z5G',
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
            '_route' => 'generated::ia4hIR8SZHlRovGw',
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
      '/api/clientes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YJkJd3ycpkNpSAH0',
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
            '_route' => 'generated::3o77hwILWWxTAsjx',
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
            '_route' => 'generated::cInGxHuH9DmKHeAG',
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
            '_route' => 'generated::bAvKWkQMxKoUBb5y',
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
            '_route' => 'generated::m6wpIVDyGNNfDOBw',
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
            '_route' => 'generated::eoABPG7hn2hFdl5G',
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
            '_route' => 'generated::J8QNtlOHx9rJXstY',
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
            '_route' => 'generated::Hnc86nY9VNotoonk',
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
            '_route' => 'generated::sVKebZsSvuQpjfdG',
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
            '_route' => 'generated::hxn09lPH33xWXWi7',
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
            '_route' => 'generated::I1O9e1PhuXBJ6CMg',
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
            '_route' => 'generated::RgLBmSWvhWCJeI0i',
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
      '/empleados/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3CmPHKI46QrZVVZx',
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
            '_route' => 'generated::NNnxjHcHOzjvP2zk',
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
            '_route' => 'generated::MYEJLlpg00Eo35tT',
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
            '_route' => 'generated::hDXQGrJFLVMABZyJ',
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
      '/nomina/tablanominas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qLCAo3aHtfggmlRN',
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
      '/nomina/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jBY8csxfubX75DJV',
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
            '_route' => 'generated::ya1ob4Ck0p4RdQ9m',
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
      '/nomina/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::49l5MrhEv0kpi8AI',
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
      '/nomina/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1042sNH8ZBL6PFF0',
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
            '_route' => 'generated::3duUkHro85Ue7riR',
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
            '_route' => 'generated::3nq79e6xyxuKqr9m',
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
            '_route' => 'generated::ocLJghprFC8ikBe2',
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
            '_route' => 'generated::PvrD5cYaFN2txVIl',
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
            '_route' => 'generated::YgMEECcd2htMdk00',
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
            '_route' => 'generated::aTdd4VsohgEeQO5l',
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
            '_route' => 'generated::M2JQxLGT0DLofHfv',
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
            '_route' => 'generated::gu3gO3xUOPr9vQm5',
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
            '_route' => 'generated::Br4HZz5yN9mw9urz',
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
            '_route' => 'generated::LvT76ZE1mXyeEsvt',
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
            '_route' => 'generated::gflACzKngupqBKMf',
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
      '/api/usuarios' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::teIIIJVc25UFu6iw',
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
            '_route' => 'generated::MicfsnBRpL4Gervk',
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
            '_route' => 'generated::fBNEAtkDFciyRSgY',
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
            '_route' => 'generated::XrKvO9QRD53iTBzL',
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
            '_route' => 'generated::3t7e71lhbQdnO0Wp',
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
            '_route' => 'generated::UeXFYdqE060CTQqm',
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
            '_route' => 'generated::2N70QpljW1261TZO',
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
            '_route' => 'generated::hoWCDTL4uuC3zg6f',
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
            '_route' => 'generated::ghOxAWrCdv5Jgzjk',
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
            '_route' => 'generated::DZeLGm6OqSVjuE88',
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
            '_route' => 'generated::QOsFrbdro9rSmZox',
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
            '_route' => 'generated::2CvMMU1WYWKFu2RN',
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
            '_route' => 'generated::j3uq2WQT0xrHR7Kf',
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
            '_route' => 'generated::Q1mp65g7M1vElcE6',
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
            '_route' => 'generated::rxQBunObzT0Fe0El',
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
            '_route' => 'generated::TreiABv9AnqN1oRw',
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
      '/api/ventas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FI3NYa8QnZU3JBZf',
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
            '_route' => 'generated::ibsBSGTXV7OkbSfV',
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
            '_route' => 'generated::w12nnNnPGjOqY0LW',
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
            '_route' => 'generated::23CCgozhSrflkhFn',
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
            '_route' => 'generated::HP7KXZIuY8RKurnh',
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
            '_route' => 'generated::OMALaNnixEPsshcZ',
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
      0 => '{^(?|/reset\\-password/([^/]++)(*:32)|/team(?|s/([^/]++)(*:57)|\\-invitations/([^/]++)(*:86))|/livewire/(?|message/([^/]++)(*:123)|preview\\-file/([^/]++)(*:153))|/dashboard/([^/]++)(?|(*:184)|/edit(*:197)|(*:205))|/agenda(?|2/([^/]++)/edit(*:239)|s/([^/]++)/edit(*:262))|/c(?|atalogos/(?|alaciados/([^/]++)/edit(*:311)|cabellos/([^/]++)/edit(*:341)|fasts/([^/]++)/edit(*:368)|pe(?|inados/([^/]++)/edit(*:401)|stanas/([^/]++)/edit(*:429))|s(?|ervicios_(?|a/([^/]++)/edit(*:469)|ex/([^/]++)/edit(*:493))|hellacs/([^/]++)/edit(*:523)))|lientes/([^/]++)/edit(*:554))|/empleados/([^/]++)/edit(*:587)|/nomina/([^/]++)/edit(*:616)|/promociones/([^/]++)/edit(*:650)|/usuarios/(?|([^/]++)(?|/edit(*:687)|(*:695))|a(?|rchivos(?|(*:718))|s(*:728)|pi(*:738))|tabla(?|archivos(*:763)|mensaje(*:778))|Eliminar(?|archivos(*:806)|Mensajes(*:822))|loginAs(*:838)|notificaciones(*:860)|enviarnotificacion(*:886)|verMensajes(*:905)|roles(?|(*:921)|/([^/]++)(?|/edit(*:946)|(*:954)))|permisos(?|(*:975)|/([^/]++)/edit(*:997))))/?$}sDu',
    ),
    3 => 
    array (
      32 => 
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
      57 => 
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
      86 => 
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
      123 => 
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
      153 => 
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
      184 => 
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
      197 => 
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
      205 => 
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
      239 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bOwTSuqON5FJhU0Q',
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
      262 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xKUxiGYCwy5J0lWC',
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
      311 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QdLlyKevKHJqBNSb',
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
      341 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6nX2Z00crWsL2Fbc',
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
      368 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xtQz2eBkU8vXtkq5',
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
      401 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::irUap6TfLwNsgJ0M',
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
      429 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3LBCfaPNClGujj9h',
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
      469 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Tp2ypiMREAO8wMKm',
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
      493 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ovep9V0Sehjy44qp',
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
      523 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KHwLapGfRDbBjwRG',
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
      554 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XbxvFCpJodz3Auwp',
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
      587 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::C1MoMKuouHkKHsly',
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
      616 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DGl6WH3PHjC5YJ5m',
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
      650 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4PejERnp7fJ9EOz8',
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
      687 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wyBRKvROZMzWRwUk',
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
      695 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZoadmLh9xEj9Ivll',
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
      718 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mSL05CTTUo1iNzHi',
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
            '_route' => 'generated::KrrB9DPW8cEZ5RID',
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
      728 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ahefQIjbOjJmiLR8',
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
      738 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::q0kXK9IaQxlcCIm9',
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
      763 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yY7awPrKbScHhjg4',
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
      778 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jrVQwpalHJdhPP1c',
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
      806 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wokhDLR7ESPqLZNx',
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
      822 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sT5UMcLUN3Pdup9S',
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
      838 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Gnop0lRBbbvY4QNE',
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
      860 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::I7U9vYD8y5xeFcHn',
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
      886 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vObhU0s7RJ1tsnVd',
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
      905 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::A1uK0pBGsZiKYV5x',
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
      921 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DJiilCjAlfFfR71C',
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
      946 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ENzfoki9f8y8v8FM',
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
      954 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RpgBcQJYIUoGzSP1',
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
      975 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5YjVqEGCWkpwWgvF',
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
      997 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qm9TAO2GV3IwDk4F',
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
    'generated::5Vpoj3TCJybvol7U' => 
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
        'as' => 'generated::5Vpoj3TCJybvol7U',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
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
    'generated::My581Ff3dNScvDgk' => 
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
        'as' => 'generated::My581Ff3dNScvDgk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
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
    'password.confirm' => 
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
    'generated::BQ13eTs9AOsoPqsh' => 
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
        'as' => 'generated::BQ13eTs9AOsoPqsh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
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
    'generated::jz2Cm8Lc5rjO8B0y' => 
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
        'as' => 'generated::jz2Cm8Lc5rjO8B0y',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
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
    'generated::57YoEkjqIjRjzVyw' => 
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
        'as' => 'generated::57YoEkjqIjRjzVyw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
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
          2 => 'verified',
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
    'generated::7M1eIVBwDTfImbF3' => 
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
        'as' => 'generated::7M1eIVBwDTfImbF3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
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
    'generated::5lbKURpjErmylc0m' => 
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
        'as' => 'generated::5lbKURpjErmylc0m',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wdPgbwujTsYHjXcc' => 
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
        'as' => 'generated::wdPgbwujTsYHjXcc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hK4HzDZ2oQ9qIayq' => 
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
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000004a49540000000000a4b6659";}";s:4:"hash";s:44:"QeDSyOYTmI/VsUJhDgO3YZZtV46v33iyAcNUEVyv4Ho=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::hK4HzDZ2oQ9qIayq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1cZ0QB1wFhXE1GOh' => 
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
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function () {
    //return view(\'welcome\');
    return \\view(\'auth/login\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000004a49547000000000a4b6659";}";s:4:"hash";s:44:"QSIoOhBOYwC/BLOdvuCBlD/qxAU73N6U7ZhW02dvpl4=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::1cZ0QB1wFhXE1GOh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
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
    'generated::TfhCJ6y23b9UAyOK' => 
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
        'as' => 'generated::TfhCJ6y23b9UAyOK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wjWNsAp4OiiuYSyY' => 
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
        'as' => 'generated::wjWNsAp4OiiuYSyY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cZSbloXYZ9JVWi5m' => 
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
        'as' => 'generated::cZSbloXYZ9JVWi5m',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pkwsx9ZBEPoVdExj' => 
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
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000004a491a9000000000a4b6659";}";s:4:"hash";s:44:"c5qE1APGt25gaWqSACYYLg7QzY8bx9ALtPEsPhIJ+2U=";}}',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::pkwsx9ZBEPoVdExj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tLeptUFZMUuKRARq' => 
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
        'uses' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@index',
        'controller' => 'Modules\\Agenda2\\Http\\Controllers\\Agenda2Controller@index',
        'namespace' => 'Modules\\Agenda2\\Http\\Controllers',
        'prefix' => '/agenda2',
        'where' => 
        array (
        ),
        'as' => 'generated::tLeptUFZMUuKRARq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sf6EwUufgKuZPA6W' => 
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
        'as' => 'generated::sf6EwUufgKuZPA6W',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::H8OqBFl18bI4Q5Qq' => 
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
        'as' => 'generated::H8OqBFl18bI4Q5Qq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fnHDkLJfVe3UXM9w' => 
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
        'as' => 'generated::fnHDkLJfVe3UXM9w',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XgDi28jeFVCR4XqZ' => 
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
        'as' => 'generated::XgDi28jeFVCR4XqZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bOwTSuqON5FJhU0Q' => 
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
        'as' => 'generated::bOwTSuqON5FJhU0Q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6IQYr76eBpYdIexJ' => 
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
        'as' => 'generated::6IQYr76eBpYdIexJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VKopKJ0BEYu6jDey' => 
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
        'as' => 'generated::VKopKJ0BEYu6jDey',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9ZjRj4qWVNnvVtT1' => 
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
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000004a491be000000000a4b6659";}";s:4:"hash";s:44:"XxcSMr9cmdVAdWSnR8Qz3LJCOi9xCbDOOEznAjTULac=";}}',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::9ZjRj4qWVNnvVtT1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0Do1JcqGeLwiBaOF' => 
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
        'uses' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@index',
        'controller' => 'Modules\\Agendas\\Http\\Controllers\\AgendasController@index',
        'namespace' => 'Modules\\Agendas\\Http\\Controllers',
        'prefix' => '/agendas',
        'where' => 
        array (
        ),
        'as' => 'generated::0Do1JcqGeLwiBaOF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::y1s3dxf00GRJDZUl' => 
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
        'as' => 'generated::y1s3dxf00GRJDZUl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lYtjOLHi5iQFlv9f' => 
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
        'as' => 'generated::lYtjOLHi5iQFlv9f',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IS027PYBPU29KkBo' => 
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
        'as' => 'generated::IS027PYBPU29KkBo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::P1Xo1u5XvSHF0fua' => 
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
        'as' => 'generated::P1Xo1u5XvSHF0fua',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xKUxiGYCwy5J0lWC' => 
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
        'as' => 'generated::xKUxiGYCwy5J0lWC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VQLMQrR0c5Er03wn' => 
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
        'as' => 'generated::VQLMQrR0c5Er03wn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KcUs4N2pBdJNrfsc' => 
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
        'as' => 'generated::KcUs4N2pBdJNrfsc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DMMYMHBQVzp05yy8' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agendas/VerEvento',
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
        'as' => 'generated::DMMYMHBQVzp05yy8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TOa9NvP8LGmkbdDH' => 
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
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000004a4914e000000000a4b6659";}";s:4:"hash";s:44:"lssTsYXFJYf7blo9zJ0CZsZZt34zdw7lZb+3cyVW34c=";}}',
        'namespace' => 'Modules\\Catalogos\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::TOa9NvP8LGmkbdDH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::iVushAHQNRO2N7PA' => 
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
        'as' => 'generated::iVushAHQNRO2N7PA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LbrKNfHoF28bFKT9' => 
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
        'as' => 'generated::LbrKNfHoF28bFKT9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lQht3HdCxVGBnodC' => 
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
        'as' => 'generated::lQht3HdCxVGBnodC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lDQ1LwJZpfUJvuHM' => 
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
        'as' => 'generated::lDQ1LwJZpfUJvuHM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jmJ8ZFvVn1HsprjP' => 
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
        'as' => 'generated::jmJ8ZFvVn1HsprjP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QdLlyKevKHJqBNSb' => 
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
        'as' => 'generated::QdLlyKevKHJqBNSb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8xYcoRneh64CY64g' => 
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
        'as' => 'generated::8xYcoRneh64CY64g',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HUrxwISX4ZDVTBeh' => 
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
        'as' => 'generated::HUrxwISX4ZDVTBeh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8S2iZAlEwRL6rvjI' => 
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
        'as' => 'generated::8S2iZAlEwRL6rvjI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Q6fpGJgZyYxGv7z7' => 
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
        'as' => 'generated::Q6fpGJgZyYxGv7z7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jhritfF2JTaM6Zd9' => 
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
        'as' => 'generated::jhritfF2JTaM6Zd9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cTKKyAiUokAkfeIr' => 
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
        'as' => 'generated::cTKKyAiUokAkfeIr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6nX2Z00crWsL2Fbc' => 
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
        'as' => 'generated::6nX2Z00crWsL2Fbc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fNqibSZhQcMUbNdv' => 
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
        'as' => 'generated::fNqibSZhQcMUbNdv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WvAPDiAnCip6cj94' => 
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
        'as' => 'generated::WvAPDiAnCip6cj94',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rhM6th4o64aUvjEp' => 
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
        'as' => 'generated::rhM6th4o64aUvjEp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0dS2M6xaRbHDGfTL' => 
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
        'as' => 'generated::0dS2M6xaRbHDGfTL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xTFdSm420BaNzpC6' => 
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
        'as' => 'generated::xTFdSm420BaNzpC6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6jroCKYjo3x7q8cm' => 
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
        'as' => 'generated::6jroCKYjo3x7q8cm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xtQz2eBkU8vXtkq5' => 
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
        'as' => 'generated::xtQz2eBkU8vXtkq5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jZKW7OyOqM9oTv5c' => 
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
        'as' => 'generated::jZKW7OyOqM9oTv5c',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XIpJHuqD5Tc2QT3e' => 
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
        'as' => 'generated::XIpJHuqD5Tc2QT3e',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::k8aZWzQ9h1qFZ1Bq' => 
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
        'as' => 'generated::k8aZWzQ9h1qFZ1Bq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VQ7AbfUdxYK6ORxB' => 
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
        'as' => 'generated::VQ7AbfUdxYK6ORxB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dJxqUPjOGhDdguE6' => 
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
        'as' => 'generated::dJxqUPjOGhDdguE6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wUiwDrNuz6bBSFja' => 
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
        'as' => 'generated::wUiwDrNuz6bBSFja',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::irUap6TfLwNsgJ0M' => 
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
        'as' => 'generated::irUap6TfLwNsgJ0M',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XatiL14BI1QWfYZx' => 
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
        'as' => 'generated::XatiL14BI1QWfYZx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VjILXibHszk9p2Bp' => 
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
        'as' => 'generated::VjILXibHszk9p2Bp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ULSMqXgObsPqdPKw' => 
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
        'as' => 'generated::ULSMqXgObsPqdPKw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::x0GqQEYhpjoyW45a' => 
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
        'as' => 'generated::x0GqQEYhpjoyW45a',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aFSUHdZe0yN4go1p' => 
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
        'as' => 'generated::aFSUHdZe0yN4go1p',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1dS11dJ4YsGFqhrV' => 
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
        'as' => 'generated::1dS11dJ4YsGFqhrV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3LBCfaPNClGujj9h' => 
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
        'as' => 'generated::3LBCfaPNClGujj9h',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EnE1k05Spq4Etdf7' => 
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
        'as' => 'generated::EnE1k05Spq4Etdf7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FpOoehn6mEkpIhQJ' => 
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
        'as' => 'generated::FpOoehn6mEkpIhQJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7ozqiNTnjbCjzkzW' => 
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
        'as' => 'generated::7ozqiNTnjbCjzkzW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::iBMslGDyj1O0wZis' => 
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
        'as' => 'generated::iBMslGDyj1O0wZis',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nZBUkGeh3pSon6eb' => 
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
        'as' => 'generated::nZBUkGeh3pSon6eb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gKtTD4ThPYh93lKe' => 
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
        'as' => 'generated::gKtTD4ThPYh93lKe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Tp2ypiMREAO8wMKm' => 
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
        'as' => 'generated::Tp2ypiMREAO8wMKm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sSAF3nPlyVNdHW84' => 
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
        'as' => 'generated::sSAF3nPlyVNdHW84',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rgBQ3AXn1KYXNFfo' => 
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
        'as' => 'generated::rgBQ3AXn1KYXNFfo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QWxbKQfiDS0w84Pj' => 
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
        'as' => 'generated::QWxbKQfiDS0w84Pj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SyTFYRtX79BjYeYL' => 
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
        'as' => 'generated::SyTFYRtX79BjYeYL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JRDDXY4jvEPwMegU' => 
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
        'as' => 'generated::JRDDXY4jvEPwMegU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7Q93FK6ame8Ukz1o' => 
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
        'as' => 'generated::7Q93FK6ame8Ukz1o',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Ovep9V0Sehjy44qp' => 
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
        'as' => 'generated::Ovep9V0Sehjy44qp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fp3dLv3prvsKBv1D' => 
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
        'as' => 'generated::fp3dLv3prvsKBv1D',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IbbzqyQmDUsJZCUJ' => 
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
        'as' => 'generated::IbbzqyQmDUsJZCUJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fCh7sqTzNahgEwgo' => 
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
        'as' => 'generated::fCh7sqTzNahgEwgo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xzWJdXm69gmC9zu9' => 
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
        'as' => 'generated::xzWJdXm69gmC9zu9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::X8fjtLCx71XzLkUN' => 
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
        'as' => 'generated::X8fjtLCx71XzLkUN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NzGCNBUYndOa8Z5G' => 
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
        'as' => 'generated::NzGCNBUYndOa8Z5G',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KHwLapGfRDbBjwRG' => 
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
        'as' => 'generated::KHwLapGfRDbBjwRG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ia4hIR8SZHlRovGw' => 
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
        'as' => 'generated::ia4hIR8SZHlRovGw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YJkJd3ycpkNpSAH0' => 
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
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000004a4910f000000000a4b6659";}";s:4:"hash";s:44:"s5urOeStdmOxt486fT+jgMx8bw/qO1PoQPuBs9pNst4=";}}',
        'namespace' => 'Modules\\Clientes\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::YJkJd3ycpkNpSAH0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3o77hwILWWxTAsjx' => 
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
        'as' => 'generated::3o77hwILWWxTAsjx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cInGxHuH9DmKHeAG' => 
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
        'as' => 'generated::cInGxHuH9DmKHeAG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bAvKWkQMxKoUBb5y' => 
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
        'as' => 'generated::bAvKWkQMxKoUBb5y',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::m6wpIVDyGNNfDOBw' => 
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
        'as' => 'generated::m6wpIVDyGNNfDOBw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eoABPG7hn2hFdl5G' => 
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
        'as' => 'generated::eoABPG7hn2hFdl5G',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XbxvFCpJodz3Auwp' => 
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
        'as' => 'generated::XbxvFCpJodz3Auwp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::J8QNtlOHx9rJXstY' => 
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
        'as' => 'generated::J8QNtlOHx9rJXstY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Hnc86nY9VNotoonk' => 
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
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000004a4911d000000000a4b6659";}";s:4:"hash";s:44:"EESXxpmCObgtNiu/COA80gWhHFpKGvENlK/Y8jG9cDo=";}}',
        'namespace' => 'Modules\\Empleados\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Hnc86nY9VNotoonk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sVKebZsSvuQpjfdG' => 
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
        'as' => 'generated::sVKebZsSvuQpjfdG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hxn09lPH33xWXWi7' => 
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
        'as' => 'generated::hxn09lPH33xWXWi7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::I1O9e1PhuXBJ6CMg' => 
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
        'as' => 'generated::I1O9e1PhuXBJ6CMg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RgLBmSWvhWCJeI0i' => 
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
        'as' => 'generated::RgLBmSWvhWCJeI0i',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3CmPHKI46QrZVVZx' => 
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
        'as' => 'generated::3CmPHKI46QrZVVZx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::C1MoMKuouHkKHsly' => 
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
        'as' => 'generated::C1MoMKuouHkKHsly',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NNnxjHcHOzjvP2zk' => 
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
        'as' => 'generated::NNnxjHcHOzjvP2zk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MYEJLlpg00Eo35tT' => 
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
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000004a49113000000000a4b6659";}";s:4:"hash";s:44:"0blg03mbMcCxUPSMl/Xvhf+nJNzRP2vloJLtanNdwek=";}}',
        'namespace' => 'Modules\\Nomina\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::MYEJLlpg00Eo35tT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hDXQGrJFLVMABZyJ' => 
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
        'as' => 'generated::hDXQGrJFLVMABZyJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qLCAo3aHtfggmlRN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nomina/tablanominas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@tablanominas',
        'controller' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@tablanominas',
        'namespace' => 'Modules\\Nomina\\Http\\Controllers',
        'prefix' => '/nomina',
        'where' => 
        array (
        ),
        'as' => 'generated::qLCAo3aHtfggmlRN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jBY8csxfubX75DJV' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nomina/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@create',
        'controller' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@create',
        'namespace' => 'Modules\\Nomina\\Http\\Controllers',
        'prefix' => '/nomina',
        'where' => 
        array (
        ),
        'as' => 'generated::jBY8csxfubX75DJV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ya1ob4Ck0p4RdQ9m' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'nomina/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@store',
        'controller' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@store',
        'namespace' => 'Modules\\Nomina\\Http\\Controllers',
        'prefix' => '/nomina',
        'where' => 
        array (
        ),
        'as' => 'generated::ya1ob4Ck0p4RdQ9m',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::49l5MrhEv0kpi8AI' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'nomina/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@destroy',
        'controller' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@destroy',
        'namespace' => 'Modules\\Nomina\\Http\\Controllers',
        'prefix' => '/nomina',
        'where' => 
        array (
        ),
        'as' => 'generated::49l5MrhEv0kpi8AI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DGl6WH3PHjC5YJ5m' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nomina/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@edit',
        'controller' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@edit',
        'namespace' => 'Modules\\Nomina\\Http\\Controllers',
        'prefix' => '/nomina',
        'where' => 
        array (
        ),
        'as' => 'generated::DGl6WH3PHjC5YJ5m',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1042sNH8ZBL6PFF0' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'nomina/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@update',
        'controller' => 'Modules\\Nomina\\Http\\Controllers\\NominaController@update',
        'namespace' => 'Modules\\Nomina\\Http\\Controllers',
        'prefix' => '/nomina',
        'where' => 
        array (
        ),
        'as' => 'generated::1042sNH8ZBL6PFF0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3duUkHro85Ue7riR' => 
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
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000004a49121000000000a4b6659";}";s:4:"hash";s:44:"zQ0YRuvaEZv5zYt3Uw8sFHr1fTG3X2fr5U4X57UdUyo=";}}',
        'namespace' => 'Modules\\Promociones\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::3duUkHro85Ue7riR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3nq79e6xyxuKqr9m' => 
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
        'as' => 'generated::3nq79e6xyxuKqr9m',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ocLJghprFC8ikBe2' => 
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
        'as' => 'generated::ocLJghprFC8ikBe2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PvrD5cYaFN2txVIl' => 
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
        'as' => 'generated::PvrD5cYaFN2txVIl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aTdd4VsohgEeQO5l' => 
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
        'as' => 'generated::aTdd4VsohgEeQO5l',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YgMEECcd2htMdk00' => 
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
        'as' => 'generated::YgMEECcd2htMdk00',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::M2JQxLGT0DLofHfv' => 
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
        'as' => 'generated::M2JQxLGT0DLofHfv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gu3gO3xUOPr9vQm5' => 
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
        'as' => 'generated::gu3gO3xUOPr9vQm5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4PejERnp7fJ9EOz8' => 
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
        'as' => 'generated::4PejERnp7fJ9EOz8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Br4HZz5yN9mw9urz' => 
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
        'as' => 'generated::Br4HZz5yN9mw9urz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LvT76ZE1mXyeEsvt' => 
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
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000004a49131000000000a4b6659";}";s:4:"hash";s:44:"ucMP97ujwaeQulvkqUykRH22bjwxbYr2+4W1dHpSTjQ=";}}',
        'namespace' => 'Modules\\Reportes\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::LvT76ZE1mXyeEsvt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gflACzKngupqBKMf' => 
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
        'as' => 'generated::gflACzKngupqBKMf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::teIIIJVc25UFu6iw' => 
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
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000004a492c9000000000a4b6659";}";s:4:"hash";s:44:"cTA3P/YNqpYu69uXydBVaY++ul7xlat1gBYnPCzPNLY=";}}',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::teIIIJVc25UFu6iw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MicfsnBRpL4Gervk' => 
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
        'as' => 'generated::MicfsnBRpL4Gervk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fBNEAtkDFciyRSgY' => 
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
        'as' => 'generated::fBNEAtkDFciyRSgY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XrKvO9QRD53iTBzL' => 
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
        'as' => 'generated::XrKvO9QRD53iTBzL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3t7e71lhbQdnO0Wp' => 
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
        'as' => 'generated::3t7e71lhbQdnO0Wp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UeXFYdqE060CTQqm' => 
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
        'as' => 'generated::UeXFYdqE060CTQqm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wyBRKvROZMzWRwUk' => 
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
        'as' => 'generated::wyBRKvROZMzWRwUk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZoadmLh9xEj9Ivll' => 
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
        'as' => 'generated::ZoadmLh9xEj9Ivll',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mSL05CTTUo1iNzHi' => 
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
        'as' => 'generated::mSL05CTTUo1iNzHi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KrrB9DPW8cEZ5RID' => 
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
        'uses' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@archivosview',
        'controller' => 'Modules\\Usuarios\\Http\\Controllers\\UsuariosController@archivosview',
        'namespace' => 'Modules\\Usuarios\\Http\\Controllers',
        'prefix' => '/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::KrrB9DPW8cEZ5RID',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yY7awPrKbScHhjg4' => 
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
        'as' => 'generated::yY7awPrKbScHhjg4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wokhDLR7ESPqLZNx' => 
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
        'as' => 'generated::wokhDLR7ESPqLZNx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ahefQIjbOjJmiLR8' => 
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
        'as' => 'generated::ahefQIjbOjJmiLR8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Gnop0lRBbbvY4QNE' => 
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
        'as' => 'generated::Gnop0lRBbbvY4QNE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::I7U9vYD8y5xeFcHn' => 
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
        'as' => 'generated::I7U9vYD8y5xeFcHn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vObhU0s7RJ1tsnVd' => 
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
        'as' => 'generated::vObhU0s7RJ1tsnVd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jrVQwpalHJdhPP1c' => 
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
        'as' => 'generated::jrVQwpalHJdhPP1c',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::A1uK0pBGsZiKYV5x' => 
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
        'as' => 'generated::A1uK0pBGsZiKYV5x',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sT5UMcLUN3Pdup9S' => 
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
        'as' => 'generated::sT5UMcLUN3Pdup9S',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::q0kXK9IaQxlcCIm9' => 
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
        'as' => 'generated::q0kXK9IaQxlcCIm9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DJiilCjAlfFfR71C' => 
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
        'as' => 'generated::DJiilCjAlfFfR71C',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2N70QpljW1261TZO' => 
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
        'as' => 'generated::2N70QpljW1261TZO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hoWCDTL4uuC3zg6f' => 
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
        'as' => 'generated::hoWCDTL4uuC3zg6f',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ghOxAWrCdv5Jgzjk' => 
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
        'as' => 'generated::ghOxAWrCdv5Jgzjk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DZeLGm6OqSVjuE88' => 
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
        'as' => 'generated::DZeLGm6OqSVjuE88',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ENzfoki9f8y8v8FM' => 
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
        'as' => 'generated::ENzfoki9f8y8v8FM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RpgBcQJYIUoGzSP1' => 
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
        'as' => 'generated::RpgBcQJYIUoGzSP1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5YjVqEGCWkpwWgvF' => 
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
        'as' => 'generated::5YjVqEGCWkpwWgvF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QOsFrbdro9rSmZox' => 
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
        'as' => 'generated::QOsFrbdro9rSmZox',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2CvMMU1WYWKFu2RN' => 
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
        'as' => 'generated::2CvMMU1WYWKFu2RN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::j3uq2WQT0xrHR7Kf' => 
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
        'as' => 'generated::j3uq2WQT0xrHR7Kf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Q1mp65g7M1vElcE6' => 
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
        'as' => 'generated::Q1mp65g7M1vElcE6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qm9TAO2GV3IwDk4F' => 
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
        'as' => 'generated::qm9TAO2GV3IwDk4F',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rxQBunObzT0Fe0El' => 
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
        'as' => 'generated::rxQBunObzT0Fe0El',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TreiABv9AnqN1oRw' => 
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
        'as' => 'generated::TreiABv9AnqN1oRw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FI3NYa8QnZU3JBZf' => 
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
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000004a492e1000000000a4b6659";}";s:4:"hash";s:44:"mmI5gm/Cq46ayQ0tOaArzN6URCtm7Xiw6dtX/FWq+5E=";}}',
        'namespace' => 'Modules\\Ventas\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::FI3NYa8QnZU3JBZf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ibsBSGTXV7OkbSfV' => 
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
        'as' => 'generated::ibsBSGTXV7OkbSfV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::w12nnNnPGjOqY0LW' => 
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
        'as' => 'generated::w12nnNnPGjOqY0LW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::23CCgozhSrflkhFn' => 
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
        'as' => 'generated::23CCgozhSrflkhFn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HP7KXZIuY8RKurnh' => 
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
        'as' => 'generated::HP7KXZIuY8RKurnh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OMALaNnixEPsshcZ' => 
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
        'as' => 'generated::OMALaNnixEPsshcZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
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
