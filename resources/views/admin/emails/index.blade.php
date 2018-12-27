@extends('layouts.admin')
@section('content')
    <table>
    <tr>
        <th> ID </th>
        <th> User </th>
        <th> Body </th>
        <th> Send At </th>
    </tr>
    @forEach ($emails as $email) 
    <tr>
        <td> {{ $email->id }} </td>
        <td> {{ $email->user->email }} </td>
        <td> {{ $email->body }} </td>
        <td> {{ $email->send_at }} </td>
    </tr>
    @endforEach
    </table>
@endsection
