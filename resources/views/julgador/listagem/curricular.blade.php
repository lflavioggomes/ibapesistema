@if($analise->isNotEmpty())
{{$cont = 1}}
@foreach($analise as $analises)
<tr class="odd">
    <td>{{$cont}}</td>
    <td><a target="_blank" data-toggle="modal" data-target="#analisetrabalho" href="{{ url('storage/analise/'.$analises->arquivo) }}">{{$analises->arquivo}}</a></td>
    <td>{{$analises->status}}</td>
    <td></td>
</tr>
{{$cont++}}
@endforeach
@endif