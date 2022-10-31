<div class="col-sm-12">
    <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
        <thead>
            <tr>
                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Trabalho</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Arquivo</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Status</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Pontos</th>
            </tr>
        </thead>
        <tbody>
            @php $cont = 1; @endphp
            @foreach($laudo as $value)
            <tr class="odd">
                <td>{{$cont}}</td>
                <td><a target="_blank" href="{{ url('storage/laudo/'.$value->arquivo) }}">{{$value->arquivo}}</a></td>
                <td>{{$value->status}}</td>
                @if ($value->previaponto)
                <td>{{$value->previaponto}}</td>
                @else
                <td align="center">-</td>    
                @endif
            </tr>
            @php $cont++; @endphp
           @endforeach 
        </tbody>
    </table>
</div>