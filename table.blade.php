<div class="table-responsive">
    <table class="table" id="ap1aulac1m1s-table">
        <thead>
            <tr>
                <th>Aula</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ap1aulac1m1s as $ap1aulac1m1)
            <tr>
                 <td>{{ $ap1aulac1m1->aula }}</td>
                <td>
                    {!! Form::open(['route' => ['ap1aulac1m1s.destroy', $ap1aulac1m1->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="" download="{{ $ap1aulac1m1->id }}">Download</a>
                        <a href="{{ route('ap1aulac1m1s.show', [$ap1aulac1m1->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open">Ver</i></a>
                        <a href="{{ route('ap1aulac1m1s.edit', [$ap1aulac1m1->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit">Editar</i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
