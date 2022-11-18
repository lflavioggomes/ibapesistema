@if($laudo->isNotEmpty())
{{$cont = 1}}
@foreach($laudo as $laudos)
<tr class="odd">
    <td>{{$cont}}</td>
    <td><a target="_blank" href="{{ url('storage/laudo/'.$laudos->arquivo) }}">{{$laudos->arquivo}}</a></td>
    <td>{{$laudos->status}}</td>
    <td></td>
</tr>
{{$cont++}}
@endforeach
@endif