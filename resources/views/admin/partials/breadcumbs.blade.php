 <!-- Content Header (Page header) -->
 <section class="content-header">
     <h1>
        @yield('title')
     </h1>
     <ol class="breadcrumb">
         <li>
             <a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
         </li>
         @foreach($title as $tit)
         <li><a href="{{ route($tit['route']) }}"> {{ $tit['title'] }} </a></li>
         @endforeach
     </ol>
 </section>