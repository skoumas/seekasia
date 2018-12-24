@extends('layouts.admin')
@section('content')
    <table>
    <tr>
        <th> ID </th>
        <th> Name </th>
        <th> Email </th>
        <th> Status </th>
        <th> Last Login </th>
        <th> Last Email </th>
        
        <th> Actions </th>
    </tr>
    @forEach ($users as $user) 
    <tr>
        <td> {{ $user->id }} </td>
        <td> {{ $user->name }} </td>
        <td> {{ $user->email }} </td>
        <td> {{ $user->status }} </td>
        <td> {{ $user->last_login }} </td>
        <td> {{ $user->last_email }} </td>
        
        <td> <a href="">Email history</a> | <a href="/admin/users/{{ $user->id }}/test_email">Send Daily Email</a>  </td>
    </tr>
    @endforEach
    </table>
@endsection
