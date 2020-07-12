<?php

Route::get('/', function() {
    return redirect()->route('login');
});

Route::get('mail', function () {
    $lawfirm = App\Models\Lawfirm::find(7);

    return (new App\Notifications\LawFirmActivation($lawfirm))
                ->toMail($lawfirm->email);
});

Route::get('search', 'AutoCompleteController@index');
Route::get('autocomplete', 'AutoCompleteController@search');

######################Login/Forgot Routes###########################
Auth::routes();
############################################################
/**/
##############################Guest Routes##################################
Route::group(['prefix' => 'lawfirm', 'middleware' => 'guest'], function() {
    Route::get('signup', 'LawFirmController@display')->name('signup.display');
    Route::post('signup', 'LawFirmController@save')->name('signup.save');

    Route::get('{id}/user/signup/{token?}', 'LawFirmUserController@display')->name('user.signup.display');
    Route::post('{id}/user/signup', 'LawFirmUserController@save')->name('user.signup.save');
//    //Law Firm User Routes
//    Route::group(['prefix' => 'user'], function() {
//        Route::post('signup', 'LawFirmUserController@save')->name('user.signup.save');
//    });
	
});

Route::group(['prefix' => 'scheduler', 'middleware' => 'guest'], function() {
	Route::get('dump', 'SchedulerController@dumpBillData')->name('download.dumpBillData');
	Route::get('generateBill', 'SchedulerController@generateBill')->name('generateBill.generateBill');
});

Route::group(['prefix' => 'lawfirm', 'middleware' => ['auth']], function() {
    Route::get('{id}/status/active', ['middleware' => 'permission:lawfirm_details,update', 'uses' => 'LawFirmController@status'])->name('lawfirm.status.action');
    Route::get('list', [ 'middleware' => 'permission:lawfirm_details,view','uses' => 'LawFirmController@list'])->name('lawfirm.list');
    Route::get('export/{type}', ['uses' => 'ExportDataController@lawfirmListExport']);
    Route::get('datatable', [ 'middleware' => 'permission:lawfirm_details,view','uses' => 'LawFirmController@datatable'])->name('lawfirm.datatable');
});

Route::group(['prefix' => 'rx', 'middleware' => ['auth']], function() {
     Route::get('rxregister', 'RxController@register')->name('rxregister.register');
     Route::post('rxregister', 'RxController@rxsave')->name('rxregister.rxsave');
});


Route::get('signatures/{filename?}', function ($filename)
{
    $path = '/resources/assets/signatures/' . $filename;
    if (!File::exists(base_path().$path)) {
        abort(404);
    }

    $file = File::get(base_path().$path);
    $type = File::mimeType(base_path().$path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
})->name('signature_path');

##############################################################################
/**/
########################## Authenticted Routes ###########################
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function() {
    Route::get('/', function () {
        return view('lawfirmuser.dashboard');
    });
});

	Route::group(['prefix' => 'RXdashboard', 'middleware' => ['auth']], function() {
		/*Route::get('/', function () {
			return view('rx.dashboard');
		});*/
		Route::get('/', 'RxController@index')->name('index');
	});


	Route::group(['prefix' => 'SESS', 'middleware' => ['auth']], function() {
		/*Route::get('/', function () {
			return view('rx.dashboard');
		});*/
		Route::get('RX', 'RxController@Sess')->name('Sess');
	});

	Route::group(['prefix' => 'SESS', 'middleware' => ['auth']], function() {
		/*Route::get('/', function () {
			return view('rx.dashboard');
		});*/
		Route::get('RTS', 'RxController@Sess')->name('Sess');
	});

########################## Passenger Request Routes ###########################
Route::group(['prefix' => 'passenger', 'middleware' => ['web', 'auth']], function() {

	Route::get('request/rts', ['middleware' => 'permission:passenger_request,view', 'uses' => 'PassengerRequestController@rts'])->name('passenger_request.rts');

	Route::get('RxRTSSession', ['middleware' => 'permission:passenger_request,view', 'uses' => 'RxController@rx_rts_session'])->name('passenger_request.rx_rts_session');

    Route::get('request', ['middleware' => 'permission:passenger_request,view', 'uses' => 'PassengerRequestController@index'])->name('passenger_request.index');

    Route::any('request/datatable', ['middleware' => 'permission:passenger_request,view', 'uses' => 'PassengerRequestController@datatables'])->name('passenger_request.datatable');
    //for passenger listing

    Route::get('list', ['middleware' => 'permission:passenger_request,view', 'uses' => 'PassengerRequestController@passengerList'])->name('passenger.list');

    Route::get('list/datatable', ['middleware' => 'permission:passenger_request,view', 'uses' => 'PassengerRequestController@listDatatables'])->name('passenger_list.datatable');

    Route::get('export/{type}', ['uses' => 'ExportDataController@passengerListExport']);

    Route::get('request/create', ['middleware' => 'permission:passenger_request,create', 'uses' => 'PassengerRequestController@create'])->name('passenger_request.create');

	Route::get('request/create/rx', ['middleware' => 'permission:passenger_request,create', 'uses' => 'PassengerRequestController@create'])->name('passenger_request.createrx');

    Route::post('request/save/{id?}', ['middleware' => 'permission:passenger_request,create,edit', 'uses' => 'PassengerRequestController@save'])->name('passenger_request.save');

    Route::post('underwritting/save', ['uses' => 'PassengerRequestController@saveUnderWritting'])->name('underwritting.save');

    Route::get('request/{id}/edit', ['middleware' => 'permission:passenger_request,edit', 'uses' => 'PassengerRequestController@edit'])->name('passenger_request.edit');
    //Route::post('request/save', ['middleware' => 'permission:passenger_request,edit', 'uses' => 'PassengerRequestController@save'])->name('passenger_request.save');

    Route::get('request/details/{id}/{status?}/{service?}', ['uses' => 'PassengerRequestController@fetchDetails']);
    Route::get('request/detailsunderwritting/{id}', ['uses' => 'PassengerRequestController@fetchDetailsUnderwritting']);
    Route::get('request/{id}/status/{status}/{service?}', ['uses' => 'PassengerRequestController@status'])->name('passenger_request.status');
//    Route::get('request/read_notification', ['uses' => 'PassengerRequestController@read_notification'])->name('passenger_request.read_notification');
//    Route::get('request/unread_notifications', [ 'uses' => 'PassengerRequestController@unread_notifications'])->name('passenger_request.unread_notifications');
    Route::get('request/read_notification', ['uses' => 'UserNotificationController@read_notification'])->name('user_notifications.read_notification');
    Route::get('request/unread_notifications', [ 'uses' => 'UserNotificationController@unread_notifications'])->name('user_notifications.unread_notifications');
    Route::get('request/signaturepopup/{id}', ['uses' => 'PassengerRequestController@fetchSignatureDetailsPopup']);
    Route::get('details/{id}', ['uses' => 'PassengerRequestController@passengerDetail']);
    Route::post('{passengerId}/addcomment', ['uses' => 'PassengerRequestController@addComment'])->name('passenger.comment');
    Route::get('{id}/details', ['middleware' => 'permission:passenger_details,view', 'uses' => 'UserController@passengerDetails'])->name('admin.passengerdetails');

    Route::get('address/{id}', ['uses' => 'PassengerRequestController@passengerAddressDetails'])->name('passenger.passengeraddressdetails');
});

########################## LawFirm/Staff User Routes ###########################
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::get('create', ['middleware' => 'permission:manage_user,create', 'uses' => 'UserController@create'])->name('user.create');
    Route::post('save', ['middleware' => 'permission:manage_user,create', 'uses' => 'UserController@save'])->name('user.save');

    Route::get('lawfirm/view', ['middleware' => 'permission:manage_user,lawfirmuser_view,view', 'uses' => 'UserController@lawfirm'])->name('user.lawfirm.view');
    Route::get('lawfirm/datatable', ['middleware' => 'permission:manage_user,view', 'uses' => 'UserController@lawfirmDatatables'])->name('user.lawfirm.datatable');

    Route::get('lawfirm/userdatatable', ['middleware' => 'permission:lawfirm_details,view', 'uses' => 'UserController@lawfirmUserDatatables'])->name('user.lawfirmuser.datatable');

    Route::get('lawfirm/{id}/details', ['middleware' => 'permission:lawfirm_details,view', 'uses' => 'UserController@lawfirmDetails'])->name('admin.lawfirmdetails');
    Route::get('lawfirm/passenger/{passengerId}', ['middleware' => 'permission:lawfirm_details,view', 'uses' => 'UserController@passengerDetailsOnRowSelect'])->name('admin.lawfirmdetails.passenger');

    Route::get('lawfirm/{id}/userdatatable/{authorized?}', ['middleware' => 'permission:manage_user,view', 'uses' => 'UserController@lawfirmUserDatatables'])->name('user.lawfirm.id.user.datatable');

    Route::get('lawfirm/{id}/request/datatable', ['middleware' => 'permission:passenger_request,view', 'uses' => 'PassengerRequestController@userDatatables'])->name('passenger_request.lawfirm.id.datatable');

    Route::get('lawfirm/{userId}/edit', ['middleware' => 'permission:manage_user,update', 'uses' => 'UserController@editLawFirmUser'])->name('user.lawfirm.edit');
    Route::post('lawfirm/{userId}/edit', ['middleware' => 'permission:manage_user,update', 'uses' => 'UserController@updateLawFirmUser'])->name('user.lawfirm.edit');

    Route::get('lawfirm/details/{id}', ['middleware' => 'permission:manage_user,update', 'uses' => 'UserController@fetchLawFirmUserDetails']);
    //Added by AY START
    Route::get('lawfirm/redpercent/{id}', ['middleware' => 'permission:manage_user,update', 'uses' => 'LawFirmController@getlawFirmUserById']);
    Route::get('lawfirm/detailspopup/{id}', ['uses' => 'UserController@fetchLawFirmUserDetailsPopup']);
    Route::get('lawfirm/export/{type}', ['uses' => 'ExportDataController@lawfirmExport']);
    Route::get('lawfirmlgin/export/{type}', ['uses' => 'ExportDataController@lawfirmLoggedInExport']);
    Route::get('staff/export/{type}/{userType}', ['uses' => 'ExportDataController@staffExport']);
    //Added by AY END
    Route::get('{id}/authorize/{status}', ['middleware' => 'permission:manage_user,update', 'uses' => 'UserController@setUserAuthorized'])->name('user.authorize.action');
    Route::get('lawfirm/{id}/viewBill/{status}', ['middleware' => 'permission:manage_user,update', 'uses' => 'UserController@setBillViewStatus'])->name('user.bill.action');

    Route::get('{userId}/action/{action}/{userType?}', ['middleware' => 'permission:manage_user,update', 'uses' => 'UserController@activateDeactivateUser'])->name('user.status.action');
    Route::post('{userId}/addcomment', ['middleware' => 'permission:manage_user,update', 'uses' => 'UserController@addComment'])->name('user.comment');
    Route::get('myprofile/{userId}', ['uses' => 'UserController@viewProfile'])->name('myprofile');
    Route::post('myprofile/{userId}', ['uses' => 'UserController@updateProfile'])->name('myprofile');


    Route::group(['prefix' => 'staff'], function() {
        Route::get('view/{userType}', ['middleware' => 'permission:manage_user,staff_view', 'uses' => 'StaffUserController@view'])->name('user.staff.view');
        Route::get('datatable/{userType}', ['middleware' => 'permission:manage_user,staff_view', 'uses' => 'StaffUserController@datatables'])->name('user.staff.view.datatable');

        Route::get('create/{userType?}', ['middleware' => 'permission:manage_user,staff_create', 'uses' => 'StaffUserController@create'])->name('user.staff.create');
        Route::post('save', ['middleware' => 'permission:manage_user,staff_create', 'uses' => 'StaffUserController@save'])->name('user.staff.save');

        Route::get('details/{id}', ['middleware' => 'permission:manage_user,staff_update', 'uses' => 'StaffUserController@fetchStaffUserDetails']);
        Route::get('{userId}/edit', ['middleware' => 'permission:manage_user,staff_update', 'uses' => 'StaffUserController@edit'])->name('user.staff.edit');
        Route::post('{userId}/edit', ['middleware' => 'permission:manage_user,staff_update', 'uses' => 'StaffUserController@update'])->name('user.staff.edit');
    });
});


########################## Billing Routes ###########################
Route::group(['prefix' => 'bill', 'middleware' => 'auth'], function() {
    Route::get('outstanding', ['middleware' => 'permission:outstanding_bill,view', 'uses' => 'BillingController@outstandingBills'])->name('bill.outstanding');
    Route::get('outstanding/datatable', ['middleware' => 'permission:outstanding_bill,view', 'uses' => 'BillingController@outstandingBillDatatable'])->name('bill.outstanding.datatable');
    Route::post('{id}/outstanding/update', ['middleware' => 'permission:outstanding_bill,update', 'uses' => 'BillingController@updateOutstandingBill'])->name('bill.outstanding.update');

    Route::get('reducebill/{id}', ['middleware' => 'permission:outstanding_bill,view', 'uses' => 'BillingController@reduceBills'])->name('bill.reducebill');
    Route::post('reducebill', ['middleware' => 'permission:outstanding_bill,view', 'uses' => 'BillingController@reduceBillsComments'])->name('bill.reducebillcomment');

    Route::get('paid', ['middleware' => 'permission:paid_bill,view', 'uses' => 'BillingController@paidBills'])->name('bill.paid');
    Route::get('paid/datatable', ['middleware' => 'permission:paid_bill,view', 'uses' => 'BillingController@paidBillDatatable'])->name('bill.paid.datatable');

    Route::get('reduction', ['middleware' => 'permission:amount_reduction,create', 'uses' => 'BillingController@amountReduction'])->name('bill.reduction');
    Route::get('reduction/request', ['middleware' => 'permission:amount_reduction,create', 'uses' => 'BillingController@getReductionRequest'])->name('bill.reduction.request');
    Route::get('reduction/request/datatable', ['middleware' => 'permission:amount_reduction,create', 'uses' => 'BillingController@getReductionRequestDatatable'])->name('bill.reduction.request.datatable');
    Route::post('reduction', ['middleware' => 'permission:amount_reduction,create', 'uses' => 'BillingController@saveAmountReduction'])->name('bill.reduction.save');
    //Added By AY Start
    Route::get('outstanding/export/{type}', ['uses' => 'ExportDataController@outstandingBillExport']);
    Route::get('paid/export/{type}', ['uses' => 'ExportDataController@paidBillExport']);

    Route::get('outstanding/pdf/{billid}', ['uses' => 'ExportDataController@generatePDFBill'])->name('outstanding.pdf.download');
    //Added By AY End
});

Route::group(['middleware' => 'auth'], function() {
    //Route::get('paywithpaypal', array('as' => 'payment.paywithpaypal', 'uses' => 'PaymentController@payWithPaypal'));
    Route::post('paypal/{billId?}', ['middleware' => 'permission:paid_bill,create', 'uses' => 'PaymentController@postPaymentWithpaypal'])->name('payment.paypal');
    Route::post('paypal/validate/{billId?}', ['middleware' => 'permission:paid_bill,create', 'uses' => 'PaymentController@paymentValidate'])->name('payment.validate');
    Route::get('paypal', ['middleware' => 'permission:paid_bill,create', 'uses' => 'PaymentController@getPaymentStatus'])->name('payment.status');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('address', ['uses' => 'FrequentAddressController@index'])->name('address.index');
    Route::post('address/datatable', ['uses' => 'FrequentAddressController@datatables'])->name('address.datatable');
    Route::get('address/{passengerId}/datatable', ['uses' => 'FrequentAddressController@datatables'])->name('address.passenger.datatable');
    Route::post('address/datatablepost', ['uses' => 'FrequentAddressController@datatablepost'])->name('address.datatablepost');
    Route::post('address/create', ['uses' => 'FrequentAddressController@create'])->name('address.create');
    Route::post('address/autofill', ['uses' => 'FrequentAddressController@autofill'])->name('address.autofill');
    Route::post('address/autofilldetail', ['uses' => 'FrequentAddressController@autofilldetail'])->name('address.autofilldetail');
    Route::get('address/export/{type}', ['uses' => 'ExportDataController@frequentAddressExport']);
});

########################### Ride Routes #################################
Route::group(['prefix' => 'ride', 'middleware' => 'auth'], function() {
    Route::post('save', ['middleware' => 'permission:schedule_personal_ride,view', 'uses' => 'RideController@save'])->name('ride.save');
    Route::get('update/{rideId}', ['middleware' => 'permission:schedule_personal_ride,view','uses' => 'RideController@update'])->name('ride.update');
    Route::get('bills', ['uses' => 'RideController@generateBills'])->name('ride.bills');
    Route::get('{passengerId}/datatable', ['middleware' => 'permission:ride_details,view', 'uses' => 'RideController@passengerWiseDatatable'])->name('ride.passenger.datatable');
    Route::get('{passengerId}/invoicedatatable', ['middleware' => 'permission:ride_details,view', 'uses' => 'RideController@passengerWiseInvoiceDatatable'])->name('ride.passengerinvoice.datatable');
});

Route::post('ride/uber/webhook', ['uses' => 'RideController@uberWebhook']);

Route::get('uber/oauth', ['uses' => 'RideController@uberOauth'])->name('uber.oauth');
Route::post('uber/rides', ['middleware' => 'permission:schedule_personal_ride,view', 'uses' => 'RideController@getRideTypes'])->name('uber.ridetypes');
Route::post('uber/schedule/{productId?}', ['middleware' => 'permission:schedule_personal_ride,view', 'uses' => 'RideController@scheduleUber'])->name('uber.schedule');
//Route::get('uber/status', ['middleware' => 'permission:schedule_personal_ride,view', 'uses' => 'RideController@status']);
//Route::get('uber/delete/{id}', ['middleware' => 'permission:schedule_personal_ride,view', 'uses' => 'RideController@delete']);

######################## Email Settings route ############################
Route::get('email/settings', ['middleware' => 'permission:email_setting,create', 'uses' => 'EmailSettingController@index'])->name('email_settings.index');
Route::post('email/settings', ['middleware' => 'permission:email_setting,create', 'uses' => 'EmailSettingController@save'])->name('email_settings.save');

######################## History Logs route ############################
Route::get('history-logs', ['middleware' => 'permission:history_logs,view', 'uses' => 'ActivityLogController@index'])->name('history_logs.index');

Route::get('history-logs/export/{type}', ['middleware' => 'permission:history_logs,view', 'uses' => 'ExportDataController@historyLog']);

Route::get('admin-dashboard', ['middleware' => 'permission:history_logs,view', 'uses' => 'AdminDashboardController@index'])->name('admin_dashboard.index');

Route::get('history-logs/datatable', ['middleware' => 'permission:history_logs,view', 'uses' => 'ActivityLogController@datatable'])->name('history_logs.datatable');

Route::get('history-logs/{passengerId}/datatable', ['middleware' => 'permission:history_logs,passenger', 'uses' => 'ActivityLogController@passengerWiseDatatable'])->name('history_logs.passenger.datatable');

###################### Static Pages ######################################
Route::get('terms', function () {
        return view('static.terms');
});

Route::get('rxterms', function () {
        return view('static.rxterms');
});

// Temporary Routes
Route::get('address/{id}/coordinates', ['uses' => 'FrequentAddressController@getCoordinates']);
