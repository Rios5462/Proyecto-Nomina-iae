<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">


                {{-- INICIO: MENÚ DE CONFIGURACIÓN (Alineado a la derecha con ms-auto) --}}
                <div class="dropdown "> 
                    
                    {{-- Título principal del Menú: Configuración --}}
                    <button class="btn btn-dark dropdown-toggle" type="button" 
                            data-bs-toggle="dropdown" aria-expanded="false">
                        ⚙️ Configuración
                    </button>

                    {{-- Contenedor principal del Menú (TODO debe ir aquí dentro) --}}
                    <ul class="dropdown-menu">
                        
                        {{-- Opción 1: Usuarios --}}
                        <li><a class="dropdown-item" href="#">Opción 1: Usuarios</a></li>
                        
                        {{-- Opción 2: Perfiles --}}
                        <li><a class="dropdown-item" href="#">Opción 2: Perfiles</a></li>
                        
                        {{-- SEPARADOR --}}
                        <li><hr class="dropdown-divider"></li>
                        
                        {{-- **OPCIÓN 3: NIVELES FUNCIONALES (CON SUBMENÚ)** --}}
                        <li class="nav-item dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" id="submenuNiveles" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ✨ 3. Niveles Funcionales
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="submenuNiveles">
                                <li><h6 class="dropdown-header">Gestionar Niveles Funcionales</h6></li>
                                <li><a class="dropdown-item" href="{{ route('presupuesto.index') }}">Presupuesto</a></li>
                                <li><a class="dropdown-item" href="{{ route('direcciones.index') }}">Direcciones</a></li>
                                <li><a class="dropdown-item" href="{{ route('departamentos.index') }}">Departamentos</a></li>
                            </ul>
                        </li>

                        {{-- SEPARADOR --}}
                        <li><hr class="dropdown-divider"></li>
                        
                        {{-- **OPCIÓN 4: TIPOS (CON SUBMENÚ)** --}}
                        <li class="nav-item dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" id="submenuTipos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                🏷️ 4. Tipos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="submenuTipos">
                                <li><h6 class="dropdown-header">Gestionar Tipos</h6></li>
                                <li><a class="dropdown-item" href="{{ route('tipo_nominas.index') }}">Tipo de Nóminas</a></li>
                                <li><a class="dropdown-item" href="{{ route('tipo_frecuencia_pagos.index') }}">Tipo de Frecuencias de Pago</a></li>
                                <li><a class="dropdown-item" href="{{ route('tipo_acumulados.index') }}">Tipo de Acumulados</a></li>
                                <li><a class="dropdown-item" href="{{ route('tipo_ausencias.index') }}">Tipo de Ausencias</a></li>
                                <li><a class="dropdown-item" href="{{ route('tipo_prestamos.index') }}">Tipo de Prestamos</a></li>
                                <li><a class="dropdown-item" href="{{ route('tipo_Aumentos.index') }}">Tipo de Aumentos</a></li>
                                <li><a class="dropdown-item" href="{{ route('Guarderias.index') }}">Tipo de Guarderias</a></li>
                                <li><a class="dropdown-item" href="{{ route('tipo_Liquidacion.index') }}">Tipo de Liquidaciones</a></li>
                                <li><a class="dropdown-item" href="{{ route('tipo_ausencias.index') }}">Tipo de Ausencias</a></li>
                            </ul>
                        </li>
                        
                        {{-- SEPARADOR --}}
                        <li><hr class="dropdown-divider"></li>

                        {{-- **OPCIÓN 5: PROFESIONES/CARGOS (CON SUBMENÚ)** --}}
                        <li class="nav-item dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" id="submenuProfesiones" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                🧑‍💼 5. Prof. - Cargos - Cat.
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="submenuProfesiones">
                                <li><h6 class="dropdown-header">Profesiones y Cargos</h6></li>
                                <li><a class="dropdown-item" href="{{ route('profesiones.index') }}">Profesiones y Ocupaciones</a></li>
                                <li><a class="dropdown-item" href="{{ route('cargos.index') }}">Cargos</a></li>
                                <li><a class="dropdown-item" href="{{ route('tabulador_categorias.index') }}">Tabulador para Categorias</a></li>
                                <li><a class="dropdown-item" href="{{ route('categorias.index') }}">Categorias</a></li>
                            </ul>
                        </li>
                        
                        {{-- Opción 6: Monedas --}}
                        <li><a class="dropdown-item" href="#">6. Monedas</a></li>
                        
                        {{-- SEPARADOR --}}
                        <li><hr class="dropdown-divider"></li>
                        
                        {{-- **OPCIÓN 7: BANCOS (CON SUBMENÚ)** --}}
                        <li class="nav-item dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" id="submenuBancos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                🏦 7. Bancos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="submenuBancos">
                                <li><h6 class="dropdown-header">Gestión de Grupos Bancarios</h6></li>
                                <li><a class="dropdown-item" href="{{ route('grupo_bancos.index') }}">Grupos Bancos</a></li>
                                <li><a class="dropdown-item" href="{{ route('bancos.index') }}">Bancos</a></li>
                                <li><a class="dropdown-item" href="{{ route('tasas_interes.index') }}">Tasas de Interés</a></li>
                            </ul>
                        </li>

                        {{-- Opción 8: Países --}}
                        <li><a class="dropdown-item" href="#">8. Países</a></li>
                        
                        {{-- Opción 9: Ciudades --}}
                        <li><a class="dropdown-item" href="#">9. Ciudades</a></li>
                        
                        {{-- Opción 10: Permisos --}}
                        <li><a class="dropdown-item" href="#">10. Permisos</a></li>
                        
                        {{-- Opción 11 (Extra): Logs --}}
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Logs del Sistema</a></li>

                    </ul>
                </div>
                {{-- FIN: MENÚ DE CONFIGURACIÓN --}}
                <a class="navbar-brand" href="{{ url('/empleados') }}">
                    Proyecto Nómina
                </a>

            </div>
        </nav>

        <main class="py-4">
            @yield('content') 
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!--script>
        document.querySelectorAll('.dropdown-menu a.dropdown-toggle').forEach(function(element){
            element.addEventListener('click', function(e) {
                let el = this.nextElementSibling;
                if (el && el.classList.contains('dropdown-menu')) {
                    e.preventDefault();
                    e.stopPropagation(); 
                    if(el.style.display === 'block'){
                        el.style.display = 'none';
                    } else {
                        el.style.display = 'block';
                    }
                }
            });
        });
    </script-->

    <script>
        document.querySelectorAll('.dropdown-menu a.dropdown-toggle').forEach(function(element){

            element.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation(); 

                let el = this.nextElementSibling; // El submenú que queremos abrir/cerrar

                if (el && el.classList.contains('dropdown-menu')) {

                    // --- 1. PASO DE CIERRE GLOBAL (LA CORRECCIÓN) ---
                    // Cierra TODOS los submenús abiertos que no son el que acabamos de clicar.
                    document.querySelectorAll('.dropdown-menu .dropdown-menu').forEach(function(subEl) {
                        // Cierra solo si no es el elemento 'el' (el que queremos abrir)
                        if (subEl !== el) {
                            subEl.style.display = 'none';
                        }
                    });

                    // --- 2. PASO DE TOGGLE (Abrir/Cerrar el menú clicado) ---
                    // Abre o cierra el submenú actual (el que tiene el display === 'block')
                    if(el.style.display === 'block'){
                        el.style.display = 'none'; // Si está abierto, ciérralo
                    } else {
                        el.style.display = 'block'; // Si está cerrado, ábrelo
                    }
                }
            });
        });
    </script>
</body>
</html>

