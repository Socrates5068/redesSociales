<a href="{{ route('comunicados.create') }}" class="btn btn-outline-danger mr-2 text-uppercase font-weight-bold">
    <svg class="icono" viewBox="0 0 512 512" fill="currentColor"><g><path d="m108.913.1-63.536 63.535h63.536z"/><path d="m280.191 325.469c23.957-23.957 55.81-37.151 89.69-37.151 2.103 0 4.199.051 6.285.152v-288.47h-237.253v93.635h-93.635v343.163h199.592c-1.21-7.079-1.83-14.311-1.83-21.639 0-33.88 13.194-65.733 37.151-89.69zm-173.125-193.1h207.313v30h-207.313zm0 63.735h207.313v30h-207.313zm0 63.734h207.313v30h-207.313z"/><path d="m438.358 346.682c-37.819-37.819-99.135-37.819-136.954 0s-37.819 99.135 0 136.954 99.135 37.819 136.954 0 37.819-99.135 0-136.954zm-25.958 83.477h-27.519v27.518h-30v-27.518h-27.518v-30h27.518v-27.519h30v27.519h27.519z"/></g></svg>
    Crear comunicado</a>
<a href="{{ route('perfiles.edit', ['perfil' => Auth::user()->id]) }}" class="btn btn-outline-success mr-2 text-uppercase font-weight-bold">
    <svg class="icono" viewBox="0 0 20 20" fill="currentColor" className="pencil w-6 h-6"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" /></svg>
    Editar perfil</a>
<a href="{{ route('perfiles.show', ['perfil' => Auth::user()->id]) }}" class="btn btn-outline-info mr-2 text-uppercase font-weight-bold">
    <svg class="icono" viewBox="0 0 20 20" fill="currentColor" className="user w-6 h-6"><path fillRule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clipRule="evenodd" /></svg> 
Ver perfil</a>