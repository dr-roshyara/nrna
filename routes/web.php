<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use \App\Http\Controllers\SmsController;
use \App\Http\Controllers\MessageController;
use \App\Models\User;
use \App\Http\Controllers\UserController;
use \App\Models\Message;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\CandidacyController;
use App\Http\Controllers\VoteController; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/**
 * Add Auth::routes(); so that everything is necessary to see only with login 
 */
// Auth::routes();
Route::get('/', function () {
    /**
     * Just to add the roles 
     */
        /**if(auth()->user()){
            auth()->user()->assignRole('Superadmin');
        }
        $role = Role::findByName('Superadmin');
        $role->givePermissionTo('send code');
        */  $role="User";
            $loggedIn =false;
            if(auth()->user()){
                $loggedIn =true;
                if(auth()->user()->hasRole('Superadmin')){
                    $role =  "Superadmin"; 
                    
                }else {
                    $role ="user";
                }
        }
        #$user->assignRole('writer');
        #$user->givePermissionTo('delete articles');
     //
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'role'=>$role,
        'loggedIn'=>$loggedIn
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])
      ->get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })
        ->name('dashboard');

Route::get('/sms', [SmsController::class, 'index']);  
Route::get('/hello', function (){
    //show all the users name here 
    $users = User::all();
    return Inertia::render('Hello',[
        'users' =>$users
    ]);
});
Route::get('/contact', function (){ 
    return inertia('Contact');
});
Route::get('/message', function (){
    return inertia('Message', [ 
        'messages'=>Message::all()
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])
->get('/messages/index', [MessageController::class, 'index'])->name('messages.index');
// Route::post('messages',[MessageController::class, 'store'])->name('messages.store');
Route::post('/messages', [SmsController::class, 'create']);

// Route::post('/messages', function(Request $request){
//     Message::create(
//             Request::validate([
//                 'from' => ['required', 'max:50'], 
//                 'to' => ['required', 'max:50'],
//                 'message' => ['required', 'max:255'],
//             ])
//         );
//     // //
//     // // public $nexmo      = app('Nexmo\Client');
//     //     $sender     =$request['from']; 
//     //     $receiver   =$request['to'];
//     //  //    
//     //     Nexmo::message()->send([
//     //     'to'   => $this->receiver,
//     //     'from' => $this->sender,
//     //     'text' => 'Using the facade to send a message.'
//     //     ]);
//     //     // echo "message sent!"; 
//         //    Route::get('/sms', [SmsController::class, 'index']); 
        
//         // return Redirect::route('/message'); 
//      return redirect('/messages/index')->with('from', 'to', 'message');
//         // return Redirect::route('Message.Index');

// });
//
// Route::group(['middleware' => ['auth']], function() {
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
//     Route::resource('votes', ProductController::class);
// });
//handel to submit the messages 
// Route::post('/mescreate', function(Request $request){
//         Message::create($request->all());
//          return redirect('/message'); 
//         //dd($request->all()); 
// }); 
/**
 * User Display
 * 
 */
Route::middleware(['auth:sanctum', 'verified']) 
        ->get('/users/index', [UserController::class, 'index'])->name('users.index');
//profile 
Route::middleware(['auth:sanctum', 'verified']) 
        ->get('/users/profile', [UserController::class, 'show'])->name('users.show');

 //Route::group(['middleware' => ['auth']], function() {
        //candidacy 
       
        Route::get('candidacy/create', [CandidacyController::class, 'create'])->name('candidacy.create');
        Route::post('candidacies', [CandidacyController::class, 'store'])->name('candidacy.store');
        Route::get('candidacies/index', [CandidacyController::class, 'index'])->name('candidacy.index');

        // Vote  
        Route::get('vote/create', [VoteController::class, 'create'])->name('vote.create');
         // Route::post('votes', [VoteController::class, 'store'])->name('vote.store');
        Route::get('votes/index', [VoteController::class, 'index'])->name('vote.index');
          Route::get('vote/show', [VoteController::class, 'show'])->name('vote.show');
        //  
        Route::middleware(['auth:sanctum', 'verified'])
            ->get('/election/committee', function () {
                    return Inertia::render('Election/ElectionCommittee');
                })
                ->name('election.committee');
        //
       
        //election 
        Route::middleware(['auth:sanctum', 'verified'])
            ->get('/election/result', function () {
                    return Inertia::render('Election/ElectionResult');
                })
                ->name('election.result');
        //
          Route::middleware(['auth:sanctum', 'verified'])
            ->get('/election/index', function () {
                    return Inertia::render('Election/ElectionIndex');
                })
                ->name('election.committee');
        //
            Route::middleware(['auth:sanctum', 'verified'])
            ->get('/election/committee', function () {
                    return Inertia::render('Election/ElectionCommittee');
                })
                ->name('election.committee');
        //
       
        //finance  
          Route::middleware(['auth:sanctum', 'verified'])
            ->get('/finance/index', function () {
                    return Inertia::render('Finance/FinanceIndex');
                })
                ->name('finance.index');   

//      });

//finance 
   