<div class="menu">
    <div class="menuDes">
        <nav>
            <ul>
                <li><a href="#">Menu</a>
                    <ul>
                        <form action="{{ url('login') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Iniciar Sesion</button>
                        </form>
                      
                        <li><a href="#">Quimico</a></li>
                        <li><a href="#">Biológico</a></li>
                    </ul>
                </li>
                <li><a href="#">Informacion</a>
                    <ul>
                        <li><a href="{{url('/Informacion')}}">Propiedades Suelo</a></li>
                        <li><a href="{{url('/Vision')}}">Vision</a></li>
                        <li><a href="{{url('/Mision')}}">Mision</a></li>
                    </ul>
                </li>
                <li><a href="#">Forma de Uso</a></li>
                <li><a href="#">Contactos</a>
                    <ul>
                        <li><a href="{{url('/Contactos')}}">Integrantes</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
