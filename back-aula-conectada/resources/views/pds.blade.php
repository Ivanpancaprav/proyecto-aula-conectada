@if ($message = Session::get('success'))
<strong>{{ $message }}</strong>  <!-- muestra el mensaje flash en caso de ser cierto-->
@endif

@if (count($errors) > 0)
<div>
    <strong>Uppss!</strong> Hay algunos problemas en la subida.<br><br>
  
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
  
</div>
@endif

<form action="{{ route('subidoFicheroPost')}}" method="post" enctype="multipart/form-data">
    @csrf

    <input type="text" name="nombre">
 
    

        <input type="file" name="archivo" id="exampleInputFile" aria-describedby="fileHelp">
        <small id="fileHelp">El tamaño del fichero no debe ser superior a 2 MB.</small>

        <select name="extension">
            <option value="video">Video</option>
            <option value="pdf">Pdf</option>
        </select>
        <input type="hidden" name="id_bloque" value="1">
    <button type="submit">Subir</button>

</form>
