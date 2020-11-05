<?php

use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\BalanceCheckAuth;
use App\Http\Middleware\ClubOwnerAuth;
use App\Http\Middleware\DepositAdminAuth;
use App\Http\Middleware\MatchAdminAuth;
use App\Http\Middleware\SuperAdminAuth;
use App\Http\Middleware\WithdrawAdminAuth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/sitesetup', function () {
    $dbMigrate = Artisan::call('schedule:run');
    echo "Schedule task service running<br>";

    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";

    $clearroute = Artisan::call('route:clear');
    echo "Route cleared<br>";

    $storageLink = Artisan::call('storage:link');
    echo "Storage Link Created<br>";

    $dbMigrate = Artisan::call('migrate:refresh');
    echo "Database Migration Complete<br>";

    $dbSeed = Artisan::call('db:seed');
    echo "Database Seed Complete<br>";
});

//Create Auth Routes (login, register, forget password etc)
Auth::routes();

Route::get('/', 'PageController@index')->name('index');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/index/sport/{id}', 'PageController@sport')->name('sport.id');


//Authenticated user or logged in user can access this route s
Route::middleware('auth')->group(function () {
    Route::get('/user/profile', 'HomeController@profile')->name('profile');
    Route::get('/user/profile/edit/{id}', 'HomeController@profileedit')->name('profile.edit');
    Route::post('/user/profile/{id}', 'HomeController@profileupdate')->name('profile.update');
    Route::post('/user/password/{id}', 'HomeController@updatePassword')->name('password.update');
    Route::get('/user/reset/{id}', 'HomeController@passwordReset')->name('reset.password');
    Route::get('/user/deposit/create', 'Admin\DepositController@create')->name('create.deposit');
    Route::post('/user/deposit/store', 'Admin\DepositController@store')->name('store.deposit');
    Route::get('/user/deposit/history', 'Admin\DepositController@depositHistory')->name('deposit.history');
    Route::get('/user/withdraw/history', 'Admin\WithdrawController@withdrawsHistory')->name('withdraw.history');
    Route::get('/user/withdraw/create', 'Admin\WithdrawController@create')->name('create.withdraw');

    Route::get('/user/club/create', 'Admin\ClubController@create')->name('club.create');
    Route::post('/user/club/store', 'Admin\ClubController@store')->name('club.store');
    Route::get('/user/clubs/index/{id}', 'Admin\ClubController@userclubindex')->name('user.club.index');
    Route::get('/clubs/blance/transfer', 'Admin\ClubController@clubbalancetransfer')->name('clubbalancetransfer');

    Route::get('/user/transactions', 'Admin\TransactionController@transactions')->name('transaction.history');
    Route::get('/user/bets', 'Admin\BettingChoiceUserController@bets')->name('betting.history');
    Route::get('/member/bets/{id}', 'Admin\BettingChoiceUserController@memberbets')->name('member.history');
    Route::get('/user/bets/create/{id}', 'Admin\BettingChoiceUserController@create')->name('create.bet');
    Route::get('/bets/betsale/{id}', 'Admin\DashboardController@betsale')->name('bet.sale');
});

//Authenticated user and balance empty user can't access this route
Route::middleware([BalanceCheckAuth::class, 'auth'])->group(function () {
    Route::get('/user/withdraws', 'HomeController@withdraws')->name('withdraws');
    Route::get('/user/withdraws/{id}', 'Admin\WithdrawController@withdrawcancel')->name('withdraw.cancel');
    Route::post('/user/withdraw/store', 'Admin\WithdrawController@store')->name('store.withdraw');
    Route::post('/user/bet/store', 'Admin\BettingChoiceUserController@storebet')->name('store.bet');

});

//Authenticated and Club Owner can access this route
Route::middleware([ClubOwnerAuth::class, 'auth'])->group(function () {
    Route::get('/user/club/{id}', 'Admin\ClubController@clubDetails')->name('club.details');
});


//User who has role of admin can access this routes
//Create a middleware group for user role check
Route::middleware([MatchAdminAuth::class, 'auth'])->group(function () {
    //Dashboard Controller Routes
    Route::get('/home', 'Admin\DashboardController@home')->name('home');

    //Sport Controller Routes
    Route::get('/sports/index', 'Admin\SportController@index')->name('sport.index');
    Route::post('/sports/create', 'Admin\SportController@create')->name('sport.create');
    Route::post('/sports/store', 'Admin\SportController@store')->name('sport.store');
    Route::get('/sports/{id}', 'Admin\SportController@show')->name('sport.show');
    Route::get('/sports/edit/{id}', 'Admin\SportController@edit')->name('sport.edit');
    Route::post('/sports/update/{id}', 'Admin\SportController@update')->name('sport.update');
    Route::get('/sports/{id}/delete', 'Admin\SportController@destroy')->name('sport.delete');

    //TeamOrPlayer Controller Routes
    Route::get('/teams/index', 'Admin\TeamOrPlayerController@index')->name('team.index');
    Route::post('/teams/create', 'Admin\TeamOrPlayerController@create')->name('team.create');
    Route::post('/teams/store', 'Admin\TeamOrPlayerController@store')->name('team.store');
    Route::get('/teams/{id}', 'Admin\TeamOrPlayerController@show')->name('team.show');
    Route::get('/teams/edit/{id}', 'Admin\TeamOrPlayerController@edit')->name('team.edit');
    Route::post('/teams/update/{id}', 'Admin\TeamOrPlayerController@update')->name('team.update');
    Route::get('/teams/{id}/delete', 'Admin\TeamOrPlayerController@destroy')->name('team.delete');

    //Match Controller Routes
    Route::get('/matches/index', 'Admin\MatchController@index')->name('match.index');
    Route::get('/matches/create/{id}', 'Admin\MatchController@create')->name('match.create');
    Route::post('/matches/store', 'Admin\MatchController@store')->name('match.store');
    Route::get('/matches/{id}', 'Admin\MatchController@show')->name('match.show');
    Route::get('/matches/edit/{id}', 'Admin\MatchController@edit')->name('match.edit');
    Route::post('/matches/update/{id}', 'Admin\MatchController@update')->name('match.update');
    Route::get('/matches/{id}/delete', 'Admin\MatchController@destroy')->name('match.delete');
    Route::get('/matches/sports/{id}', 'Admin\MatchController@matches')->name('sport.matches');

    //BettingQuestion Controller Routes
    Route::get('/bettingQuestions/index', 'Admin\BettingQuestionController@index')->name('bettingQuestion.index');
    Route::get('/bettingQuestions/create/{id}', 'Admin\BettingQuestionController@create')->name('bettingQuestion.create');
    Route::post('/bettingQuestions/store', 'Admin\BettingQuestionController@store')->name('bettingQuestion.store');
    Route::get('/bettingQuestions/{id}', 'Admin\BettingQuestionController@show')->name('bettingQuestion.show');
    Route::get('/bettingQuestions/edit/{id}', 'Admin\BettingQuestionController@edit')->name('bettingQuestion.edit');
    Route::post('/bettingQuestions/update/{id}', 'Admin\BettingQuestionController@update')->name('bettingQuestion.update');
    Route::get('/bettingQuestions/{id}/delete', 'Admin\BettingQuestionController@destroy')->name('bettingQuestion.delete');
    Route::get('/bettingQuestions/choices/{id}', 'Admin\BettingQuestionController@bettingQuestionChoices')->name('bettingQuestion.choices');

    //Betting Choice Controller Routes
    Route::get('/bettingChoices/index', 'Admin\BettingChoiceController@index')->name('bettingChoice.index');
    Route::get('/bettingChoices/create/{id}', 'Admin\BettingChoiceController@create')->name('bettingChoice.create');
    Route::post('/bettingChoices/store', 'Admin\BettingChoiceController@store')->name('bettingChoice.store');
    Route::get('/bettingChoices/{id}', 'Admin\BettingChoiceController@show')->name('bettingChoice.show');
    Route::get('/bettingChoices/edit/{id}', 'Admin\BettingChoiceController@edit')->name('bettingChoice.edit');
    Route::post('/bettingChoices/update/{id}', 'Admin\BettingChoiceController@update')->name('bettingChoice.update');
    Route::get('/bettingChoices/{id}/delete', 'Admin\BettingChoiceController@destroy')->name('bettingChoice.delete');
    Route::get('/bettingChoices/question/{id}', 'Admin\BettingChoiceController@bettingChoice')->name('bettingChoice.bettingChoice');


    Route::middleware([AdminAuth::class, 'auth'])->group(function () {

        //User Controller Routes
        Route::get('/users/index', 'Admin\UserController@index')->name('user.index');

        //Dashboard Controller Routes
        Route::get('/bets', 'Admin\DashboardController@betindex')->name('bet.index');
        Route::get('/bets/calculate', 'Admin\DashboardController@betCalculate')->name('bet.calculate');


        //Transaction Controller Routes
        Route::get('/transactions/index', 'Admin\TransactionController@index')->name('transaction.index');
        Route::get('/transactions/create', 'Admin\TransactionController@create')->name('transaction.create');

        //Club Controller Routes
        Route::get('/clubs/index', 'Admin\ClubController@index')->name('club.index');
        Route::get('/clubs/accept/{id}', 'Admin\ClubController@accept')->name('club.accept');
        Route::get('/clubs/reject/{id}', 'Admin\ClubController@reject')->name('club.reject');
        Route::get('/clubs/edit/{id}', 'Admin\ClubController@edit')->name('club.edit');
        Route::post('/clubs/update/{id}', 'Admin\ClubController@update')->name('club.update');
        Route::get('/clubs/{id}/delete', 'Admin\ClubController@destroy')->name('club.delete');

        //PhoneNumbers Controller Routes
        Route::get('/phone/create', 'Admin\PhoneNumberController@create')->name('create.phone');
        Route::post('/phone/store', 'Admin\PhoneNumberController@store')->name('store.phone');
        Route::post('/method/store', 'Admin\PhoneNumberController@storemethod')->name('store.method');
        Route::get('/phone/edit/{id}', 'Admin\PhoneNumberController@edit')->name('edit.phone');
        Route::post('/phone/update/{id}', 'Admin\PhoneNumberController@update')->name('update.phone');

        // Slider controller routes
        Route::get('/sliders', 'Admin\SliderController@index')->name('slider.index');
        Route::get('/sliders/create', 'Admin\SliderController@create')->name('slider.create');
        Route::get('/sliders/destroy/{id}', 'Admin\SliderController@destroy')->name('slider.destroy');
        Route::get('/sliders/show/{id}', 'Admin\SliderController@show')->name('slider.show');
        Route::get('/sliders/edit/{id}', 'Admin\SliderController@edit')->name('slider.edit');
        Route::post('/sliders/store', 'Admin\SliderController@store')->name('slider.store');
        Route::post('/sliders/update/{id}', 'Admin\SliderController@update')->name('slider.update');

        // Settings Controller Routes
        Route::get('/settings', 'Admin\SettingController@index')->name('setting.index');
        Route::post('/settings/update', 'Admin\SettingController@update')->name('setting.update');
    });

    Route::middleware([DepositAdminAuth::class, 'auth'])->group(function () {
        //Deposit Controller Routes
        Route::get('/deposits/index', 'Admin\DepositController@index')->name('deposit.index');
        Route::get('/deposits/complete/{id}', 'Admin\DepositController@complete')->name('deposit.complete');
    });

    Route::middleware([WithdrawAdminAuth::class, 'auth'])->group(function () {
        //Withdraw Controller Routes
        Route::get('/withdraws/index', 'Admin\WithdrawController@index')->name('withdraw.index');
        Route::get('/withdraws/complete/{id}', 'Admin\WithdrawController@complete')->name('withdraw.complete');
    });

    Route::middleware([SuperAdminAuth::class, 'auth'])->group(function () {
        //User Controller Routes
        Route::post('/users/create', 'Admin\UserController@store')->name('user.create');
        Route::get('/users/{id}', 'Admin\UserController@show')->name('user.show');
        Route::get('/users/edit/{id}', 'Admin\UserController@edit')->name('user.edit');
        Route::post('/users/update/{id}', 'Admin\UserController@update')->name('user.update');
        Route::get('/users/{id}/delete', 'Admin\UserController@destroy')->name('user.delete');


    });

});

