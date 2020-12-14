




<form method="POST" action=""  enctype="multipart/form-data">
	
<label for="file" name="aula">choose file</label>
<input type="file" name="aula">
@csrf

<button type="submit">upload</button>

    <a href="{{ route('ap1aulac1m1s.index') }}" class="btn btn-default">Cancel</a>
</form>


