@extends("layouts.main")

 @section('content')

 @include("contents.viewdetails.viewheader")
 @include("contents.viewdetails.viewtab")

 @if ($view == "Details")
 @include("contents.viewdetails.viewdetails")
 @elseif ($view == "Summary")
 @include("contents.viewdetails.viewsummary")
 @else
     
 @endif


     
 @endsection   
   

    
