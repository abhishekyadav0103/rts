<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ruby Transit Solutions</title>
    <!-- Bootstrap core CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('/vendor/') }}/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> <!-- latest 5.0.13 june 2018, needs update -->
    <!-- Custom styles for this template-->
    <link href="{{ asset('/css/') }}/bootstrap-slider.css" rel="stylesheet">
    <link href="{{ asset('/css/') }}/sb-admin.css" rel="stylesheet">
    <link href="{{ asset('/css/') }}/sh-autocomplete.css" rel="stylesheet">
    <link href="{{ asset('/css/datepicker/') }}/bootstrap-datepicker3.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> 
	 <link href="{{ asset('/css/') }}/bootstrap-toggle.css" rel="stylesheet">
	<style>
	* {
			box-sizing: border-box;
	}

	body {
	  font: 16px Arial;  
	}

/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  /*background-color: #f1f1f1;*/
  width: 100%;
}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}

	#rcorners1 {
	  border-radius: 25px;
	  border: 2px solid #a3238e;
	  padding: 20px;
	  width: 200px;
	  height: 150px;
	}

</style>

</head>

@isset($bodyclass)
    <body class="{{$bodyclass}}/" id="page-top">
@endisset
@empty($bodyclass)
    <body class="fixed-nav sticky-footer bg-dark bg-rts" id="page-top">
@endempty

@yield('content')

@if(Request::is('RXdashboard') || Request::is('rx/rxregister'))
    @include('layouts.rx_nav')
@else	
		@empty($hidenav)
			@include('layouts.nav')
		@endempty
@endif

<script type='text/javascript'>
		var home_url = '<?php echo url('/') ?>';
		var rxsession;
		rxsession='{{ Session::get('rxsession')}}';

</script>

<script src="{{ asset('/js/') }}/app.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->

<!-- Core plugin JavaScript-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.compatibility.js" integrity="sha256-MWsk0Zyox/iszpRSQk5a2iPLeWw0McNkGUAsHOyc/gE=" crossorigin="anonymous"></script>

<!-- Page level plugin JavaScript-->
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js" integrity="sha256-JG6hsuMjFnQ2spWq0UiaDRJBaarzhFbUxiUTxQDA9Lk=" crossorigin="anonymous"></script-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<script src="{{ asset('/vendor/') }}/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('/vendor/') }}/datatables/dataTables.bootstrap4.js"></script>
<script src="{{ asset('/js/') }}/bootstrap-slider.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('/js/') }}/sb-admin.js"></script>

<!-- Custom scripts for this page-->
<script src="{{ asset('/js/') }}/sb-admin-datatables.js"></script>
<!--script src="{{ asset('/js/') }}/sb-admin-charts.js"></script-->

<script src="{{ asset('/js/') }}/masked.js"></script>
<script src="{{ asset('/js/') }}/sh-autocomplete.js"></script>
<script src="{{ asset('/js/') }}/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('/js/') }}/bootstrap-toggle.js"></script>
<script>
    $('.mask-phone').usPhoneFormat({
        format: '(xxx) xxx-xxxx',
    });  
    $('#toggleNavPosition').click(function() {
        $('body').toggleClass('fixed-nav');
        $('nav').toggleClass('fixed-top static-top');
    });

    $('#toggleNavColor').click(function() {
        $('nav').toggleClass('navbar-dark navbar-light');
        $('nav').toggleClass('bg-dark bg-light');
        $('body').toggleClass('bg-dark bg-light');
    });
    /*$('#ex1').slider({
        formatter: function(value) {
            return 'Current value: ' + value;
	}
    });*/
</script>


<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
   <script>
    $(document).ready(function () {
    $('#lawfirm').validate({ // initialize the plugin
        rules: {

            name: {
                required: true
            },

            firstname: {
                required: true
            },

            lastname: {
                required: true
            },

            email: {
                required: true,
                email: true
            },

            contact_number: {
                required: true
            },

            address1: {
                required: true
            },

            city: {
                required: true
            },

            state: {
                required: true
            },

            zip: {
                required: true
            },

            agree: {
                required: true
            },
        }
    });


    $('#lawfirmuser').validate({ // initialize the plugin
        rules: {

            password: {
                required: true
            },

            email: {
                required: true,
                email: true
            },

            cpassword: {
                required: true
            },

            password: {
                required: true
            },

            title: {
                required: true
            },

            /*license_issuance_state: {
                required: true
            },*/

            agree: {
                required: true
            },
        }
    });

    $('#login').validate({ // initialize the plugin
        rules: {
            
            email: {
                required: true,
                email: true
            },
            
            password: {
                required: true
            },

            agree: {
                required: true
            },
        }
    });

    $('#update_profile').validate({ // update profile
        rules : {
            password : {
                minlength : 8,
            },
            cpassword : {
                equalTo : "#password"
            }
        }
    });

    $(document).on("change", "#user_title", function(){
        if($(this).val() == 'Other'){
            $("#other_title").show();
        } else {
            $("#other_title").val('');
            $("#other_title").hide();
        }
    });

    jQuery(document).on("change", "#lawfirm_reduction", function(){
        var lawfirmId = jQuery(this).val(); 
        $.ajax({
            url:  '<?php echo url('user/lawfirm/redpercent') ?>/'+lawfirmId,
            type: 'get',
            success: function(data){
                var obj = JSON.parse(data);
                var curPerent = (obj.default_reduction_percentage) ? obj.default_reduction_percentage : 10;
                jQuery("#defaultsetpercentage").val(curPerent);
            }
        });
    });

});
</script>

<!------------------------- Pusher Notification ---------------------------->
<script>
    $(document).ready(function(){
        getNotifications();
    });
    
    function notifyPassengerRequest(data) {
        if (data) {
            getNotifications();
        }
    }
    
    function getNotifications(){
        $.ajax({
            url: '<?php echo route('user_notifications.unread_notifications') ?>',
            type: 'get',
            success: function(data){
                data = JSON.parse(data);                
                $('#alertsDropdown .msgCount').html(data.unreadCount);
                var html = '';
                for(var i=0; i<data.notifications.length; i++){
                    if (data.notifications[i].entity_type == 'passenger_request') {
                        var details_url = '<?php echo url('/') ?>' + '/passenger/' + data.notifications[i].entity_id + '/details';
                        html += '<div class="dropdown-divider"></div>';
                        html += '<a class="dropdown-item" href="' + details_url + '"><div class="dropdown-message small">' + data.notifications[i].message + '</div><span class="text-warning">';

                        if(data.notifications[i].status == 'Active'){
                            html += "<span class='badge badge-success badge_active'>" + data.notifications[i].status + "</span>";
                        }else if(data.notifications[i].status == 'Denied'){
                            html += "<span class='badge badge-danger badge_denied'>" + data.notifications[i].status + "</span>"
                        }else if(data.notifications[i].status == 'Closed Paid'){
                            html += "<span class='badge badge-secondary badge_clpaid'>" + data.notifications[i].status + "</span>";
                        }else {
                            html += '<span class="badge badge-warning badge_clpending">' + data.notifications[i].status + '</span>';
                        }
                        html += '</span>';
                        html += '<div class="small text-muted">' + data.notifications[i].created_at + '</div>';
                        html += '</a>';
                    } else if(data.notifications[i].entity_type == 'outstanding_bill'){
                        var details_url = '<?php echo url('/') ?>' + '/bill/outstanding';
                        html += '<div class="dropdown-divider"></div>';
                        html += '<a class="dropdown-item" href="' + details_url + '"><div class="dropdown-message small">' + data.notifications[i].message + '</div><span class="text-warning">';
                        html += '<span class="badge badge-warning badge_clpending">' + data.notifications[i].status + '</span>';
                        html += '</span>';
                        html += '<div class="small text-muted">' + data.notifications[i].created_at + '</div>';
                        html += '</a>';                    }
                }    
                $('#notificationList').html(html);
            }
        });
    }
    
    $('#alertsDropdown').closest('li.nav-item').on('show.bs.dropdown', function (e) {
        readNotifications();
    });
    
    function readNotifications(){
        $.ajax({
            url:  '<?php echo route('user_notifications.read_notification') ?>',
            type: 'get',
            success: function(data){
                $('#alertsDropdown .msgCount').html(data);
            }
        });
    }
</script>
<!------------------------- Pusher Notification ---------------------------->

@yield('custom_scripts')

</body>
</html>
