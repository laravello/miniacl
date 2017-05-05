@extends('dashboard')
@section('content')
<div class='row'>
   
   <h3>
   Benutzerübersicht
   </h3>
   <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
         <thead>
            <tr>
               <th> ID</th>
               <th>﻿Nachname</th>
               <th>
                  username
               </th>
               <th>email</th>
               <th>bestätigt</th>
               <th>aktiviert</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            @foreach ($users as $user)
            <tr>
               <td>{{ $user->id }} </td>
               <td>
                  {{ $user->name }}
               </td>
               <td>
                  {{ $user->username }}
               </td>
               <td>
                  {{ $user->email }}
               </td>
               <td>
                  @if ($user->confirmed == 0)
                  Nein
                  @else
                  Ja
                  @endif
               </td>
               <td>
                  @if ($user->active == 0)
                  Nein
                  @else
                  Ja
                  @endif
               </td>
               <td>
                  <a href="{{ route('edituser') }}/{{ $user->id }}">
                     <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                     <span class="glyphicon glyphicon-pencil"></span>
                     </button>
                  </a>
                  <a href="{{ route('deleteuser') }}/{{ $user->id }}">
                     <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" >
                     <span class="glyphicon glyphicon-trash"></span>
                     </button>
                  </a>
               </td>
            </tr>
            @endforeach
            
         </tbody>
      </table>
      {!! $users->render() !!}
   </div>
   </div><!-- /.row -->
   @endsection