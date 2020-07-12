<div style="width:100%;height:200px;">
    <div style="width:20%;float:left;">
        <img src="{{ asset('/images/') }}/billpdf.png">
    </div>
    <div style="width:60%;float:right;line-height:30px;font-size:18px;padding-top:20px;">
        401 Westheimer Road Suite 103<br />
        Houston, TX 77006<br />
        5129432547<br />
        info@rubytransitsolutions.com<br />
        www.rubytransitsolutions.com
    </div>
</div>
<div class="clearfix">&nbsp;</div>
<div style="width:100%;">
    <div style="width:48%;float:left;font-size:18px;line-height:30px">
        <span style="font-size:20px;">BILL TO</span>
        <br />
        <span>{{ $billTo }}</span>
    </div>
    <div style="width:48%;float:right;line-height:30px;font-size:18px;">
        <span style="font-size:20px;">Invoice# {{ $invoiceId }}</span>
        <br />
        <span style="font-size:20px;">Date</span> <span>{{ $billDate }}</span>
    </div>
</div>
<div class="clearfix">&nbsp;</div>
<hr style="width:100%;margin-top:50px;border:1px solid #612552;">
<table style="width:100%;">
    <thead>
        <tr style="background:#e2b6d7;color:#5d264f;">
            <th style="width:80%;height:35px">DATE OF RIDE -- PICKUP DESCRIPTION -- DROPOFF DESCRIPTION</th>
            <th style="width:20%;">AMOUNT</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataArr as $dataA)
        <tr>
            <td>Date of Trip: {{$dataA['date_of_trip']}} -- Pickup location: {{$dataA['pickup']}} -
- Drop-off location: {{$dataA['dropoff']}}</td>
            <td style="padding-left:30px;">{{$dataA['amount']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr style="border:1px dotted #000;">
<table style="width:100%;">
    <tbody>
        <tr>
            <td style="width:55%;">Thank you for your business and prompt payment. Have
a nice day!</td>
            <td style="width:25%;font-weight:bold;">SUBTOTAL</td>
            <td style="width:20%;padding-left:30px;font-weight:bold;">{{ number_format($subTotalAmount, 2) }}</td>
        </tr>
        <tr style="font-weight:bold;">
            <td></td>
            <td>TAX (8.25%)</td>
            <td style="padding-left:30px;">{{ number_format($taxAmount, 2) }}</td>
        </tr>
        <tr style="font-weight:bold;">
            <td></td>
            <td>TOTAL</td>
            <td style="padding-left:30px;">{{ number_format($totalAmount, 2) }}</td>
        </tr>
        <tr style="font-weight:bold;">
            <td></td>
            <td>BALANCE DUE</td>
            <td style="padding-left:30px;">{{ number_format($totalAmount, 2) }}</td>
        </tr>
    </tbody>
</table>