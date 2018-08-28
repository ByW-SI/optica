<!DOCTYPE html>
<html>
	<head>
		<title>pacientes</title>
	</head>
	<body>
		<table border="1">
			<tr>
				<td>nombre</td>
				<td>acciones</td>
			</tr>
			@foreach($pacientes as $paciente)
			<tr>
				<td>$paciente->nombre</td>
				<td><a href=""></a></td>
			</tr>
			@endforeach
		</table>
	</body>
</html>
