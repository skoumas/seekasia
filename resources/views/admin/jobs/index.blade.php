@extends('layouts.admin')
@section('content')
    <table>
    <tr>
        <th> ID </th>
        <th> Queue </th>
        <th> Payload </th>
        <th> Attempts </th>
    </tr>
    @forEach ($jobs as $job) 
    <tr>
        <td> {{ $job->id }} </td>
        <td> {{ $job->queue }} </td>
        <td> {{ $job->payload }} </td>
        <td> {{ $job->attempts }} </td>
    </tr>
    @endforEach
    </table>
@endsection
