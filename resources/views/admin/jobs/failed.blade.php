@extends('layouts.admin')
@section('content')
    <table>
    <tr>
        <th> ID </th>
        <th> Queue </th>
        <th> Payload </th>
        <th> Exception </th>
    </tr>
    @forEach ($jobs as $job) 
    <tr>
        <td> {{ $job->id }} </td>
        <td> {{ $job->queue }} </td>
        <td> {{ $job->payload }} </td>
        <td> {{ substr( $job->exception, 0, 200) }} </td>
    </tr>
    @endforEach
    </table>
@endsection
