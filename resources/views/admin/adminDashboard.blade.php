@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">       
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">Dashboard</h1>
            </div>
        </div>
        <!-- Icon Cards-->
		<table cellspacing=2 cellpadding=2 border=0 width='80%' align='center'>
			<tr>
				<td>
					<p id="rcorners1" align='center'><b>${{$lawFirmTotalOutstanding}}<br /><br />Total Outstanding Amount</b></p>
				</td>
				<td>
					<p id="rcorners1" align='center'><b>${{$lawFirmTotalPaid}}<br /><br />Total Paid Amount</b></p>
				</td>
				<td>
					<p id="rcorners1" align='center'><b>{{$activePassengers}}<br /><br />No. of active passengers</b></p>
				</td>
			</tr>
			<tr>
				<td>
					<p id="rcorners1" align='center'><b>{{$passenegersInLastThirtyDays}}<br /><br /># of new passengers in last 30 days</b></p>
				</td>
				<td>
					<p id="rcorners1" align='center'><b>${{$AverageInitialBudget}}<br /><br />Average initial budget</b></p>
				</td>
				<td>
					<p id="rcorners1" align='center'><b>${{$AveragePaidAmount}}<br /><br />Average paid amount</b></p>
				</td>
			</tr>

			<tr>
				<td>
					<p id="rcorners1" align='center'><b>{{$AveragePerReduction}}<br /><br />Average % reduction</b></p>
				</td>
				<td>
					<p id="rcorners1" align='center'><b>Average % dropped</b></p>
				</td>
				<td>
					<p id="rcorners1" align='center'><b>Top drugs by volume</b></p>
				</td>
			</tr>

			<tr>
				<td>
					<p id="rcorners1" align='center'><b>Top drugs by cost</b></p>
				</td>
				<td>
					<p id="rcorners1" align='center'><b>Rejected drug list</b></p>
				</td>
				<td>
					<p id="rcorners1" align='center'></p>
				</td>
			</tr>

		</table>
        <div class="row">			
        </div>
    </div>
    	<!-- Logout Modal-->
  @include('partials.topnav_modal')

@endsection