@extends('dashboard')

@section('content')
<div class='row'>
  

      <h3>
      Benutzeruebersicht
      </h3>
   <div class="table-responsive">

<table class="table table-striped table-bordered table-hover">
   <thead>
      <tr>
         <th> ID</th>
         <th>
            username
         </th>
         <th>﻿Tasks gesamt!</th>
         <th>erledigte Tasks!</th>
         <th>offene Tasks!</th>
      </tr>
   </thead>
   <tbody>

   @foreach ($users as $user)
      <tr>
         <td>{{ $user->id }} </td>
         <td>
            {{ $user->username }}
         </td>
         <td style="text-align: center"><a href="/tasks/allprojects/alltags/dirk/alltasks">41</a>
         </td>
         <td style="text-align: center"><a href="/tasks/allprojects/alltags/dirk/donetasks">5</a>
         </td>
         <td style="text-align: center"><a href="/tasks/allprojects/alltags/dirk/opentasks">36</a>
         </td>
      </tr>
   @endforeach
      <tr>
         <td>6 </td>
         <td>
            dirk
         </td>
         <td style="text-align: center"><a href="/tasks/allprojects/alltags/dirk/alltasks">41</a>
         </td>
         <td style="text-align: center"><a href="/tasks/allprojects/alltags/dirk/donetasks">5</a>
         </td>
         <td style="text-align: center"><a href="/tasks/allprojects/alltags/dirk/opentasks">36</a>
         </td>
      </tr>
      <tr>
         <td>2 </td>
         <td>
            Neutral
         </td>
         <td style="text-align: center"><a href="/tasks/allprojects/alltags/Neutral/alltasks">57</a>
         </td>
         <td style="text-align: center"><a href="/tasks/allprojects/alltags/Neutral/donetasks">27</a>
         </td>
         <td style="text-align: center"><a href="/tasks/allprojects/alltags/Neutral/opentasks">30</a>
         </td>
      </tr>
      <tr>
         <td>8 </td>
         <td>
            <strong>sven</strong>
         </td>
         <td style="text-align: center"><a href="/tasks/allprojects/alltags/sven/alltasks">155</a>
         </td>
         <td style="text-align: center"><a href="/tasks/allprojects/alltags/sven/donetasks">63</a>
         </td>
         <td style="text-align: center"><a href="/tasks/allprojects/alltags/sven/opentasks">92</a>
         </td>
      </tr>
   </tbody>
</table>

</div>


</div><!-- /.row -->
@endsection