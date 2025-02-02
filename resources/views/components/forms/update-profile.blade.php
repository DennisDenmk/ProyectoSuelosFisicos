<form action="{{ route('perfil.actualizarnombre') }}" method="POST" ">
    @csrf
    <h3>Actualizar Perfil</h3>
                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" name="user_nombre" value="{{ Auth::user()->user_nombre }}" maxlength="50"
                        required>
                </div>
                <div class="form-group">
                    <label>Apellido:</label>
                    <input type="text" name="user_apellido" value="{{ Auth::user()->user_apellido }}" maxlength="50"
                        required>
                </div>
                <button type="submit" class="btn">Actualizar Datos</button>
</form>
