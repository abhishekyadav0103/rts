@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 p-0" style='width:100%'>
                <h1 class="page_title"></h1>
            </div>
			<div style='width:60%' align='center'>
				<table width='100%' >
					<tr>
						<td width='50%'><h2>&nbsp;</h2></td>									
						<td width='25%'><h2><a href="{{route('passenger_request.rts')}}"><img src='{{ asset("/images/rts.jpg") }}'></a></h2></td>
						<td width='20%'>&nbsp;</td>
						<td width='25%'><h2><a href="{{route('rxregister.register')}}"><img src='{{ asset("/images/rx.png") }}'></a></h2></td>
					</tr>
				</table>
            </div>
        </div>        
    </div>

	<!-- Logout Modal-->
  @include('partials.topnav_modal')

@endsection