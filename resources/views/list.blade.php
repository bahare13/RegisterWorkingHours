@extends('app')
@section('content')
@if (empty($message))
<table class="table" id="table">
    <thead>
        <td scope="col" class="form-label">date</td>
        <td scope="col" class="form-label">from time</td>
        <td scope="col" class="form-label">to time</td>
        <td scope="col" class="form-label">diff hour(min)</td>
        <td scope="col" class="form-label">value hours ({{$setting->unit}})</td>
    </thead>
    <tbody">
        @php($sum=0)
        @foreach ($res as $item)
        <tr id="row">
            <td>{{date('Y-m-d',strtotime($item['date']))}}</td>
            <td>{{$item['from_time']}}</td>
            <td>{{$item['to_time']}}</td>
            <td>{{$item['diff_time']}}</td>
            <td>{{number_format((float)$item['diff_time']*$setting['salary_hour']/60)}}</td>
        </tr>
        @php($sum+=($item['diff_time']*$setting['salary_hour'])/60)
        @endforeach
        <tr>
            <td>
                <h4>sum total :</h4>
            </td>
            <td>
                <h5>{{number_format($sum)}}</h5>
            </td>
            <td></td>
        </tr>
        </tbody>
</table>
@else
<h5>first must complete setting</h5>
@endif
@endsection