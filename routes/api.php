<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Events\ResetPassword;
use App\Models\City;
use App\Models\Country;
use App\Models\Post;
use App\Models\State;
use App\Models\User;
use App\Http\Controllers\RelationshipController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'prefix'=>'relationship'
], function($route){
    $route->get('hasManyThrough', [RelationshipController::class, 'has_many_through']);
    $route->get('hasOneThrough', [RelationshipController::class, 'has_one_through']);
    $route->get('hasOneOfMany', [RelationshipController::class, 'has_one_of_many']);
    $route->get('oneToManyInverse', [RelationshipController::class, 'one_to_many_inverse']);
    $route->get('oneToManyRelationship', [RelationshipController::class, 'one_to_many_rel']);
    $route->get('oneToOneInverse', [RelationshipController::class, 'one_to_one_inverse']);
    $route->get('oneToOneRel', [RelationshipController::class, 'one_to_one_rel']);
});

Route::get('queryBelongTo', function(){
    $state = State::take(5)->first();
    $cities = City::whereBelongsTo($state, 'state')->get();
    // $state = json_decode(json_encode($state));
    print_r($cities->toArray());
});
Route::get('collection', function(Request $request){

    $result = City::orderBy('id', 'desc')->get()->toArray();
    print_r(array_chunk($result,2)[0]);
    // return $result;
    // $result = City::get();
    // $result = $result->last();
    print_r(json_decode(json_encode($result)));


    die;
    /* BelongsTo relationship of city to state and country */
    $city = City::find(2);
    $city->state = $city->state;
    $city->country = $city->country;
    print_r($city->toArray());
    die;
    /* Belongs to relationship between state and country */
    $state = State::find(1);
    $state->country = $state->country;
    print_r($state->toArray());

    die;
    /* One to many relationship between country and states */
    $country = Country::find(101);
    $country->states = $country->states;
    print_r($country->toArray());
    die;
    /* Collection Practice */
    $data = collect(['hello', 'this','is ', 'midnal','midnal',  'sharma', null, '']);
    $newData = $data->map(function($raw){
        return strtoupper($raw);
    })->reject(fn($raw) => empty($raw))->unique()->chunk(2);
    print_r($newData->toArray());

});
Route::get('/resetPassword', function (Request $request){
    $allPosts = Post::get();
    // print_r($allPosts);
    // die;
    $comments = $allPosts[4]->comment;
    $comments[0]->post = $comments[0]->post->toArray();
    print_r($comments[0]->toArray());
    die;
    print_r($allPosts[4]->comment->toArray());
    die;
    foreach($allPosts as $post){
        $post->comment = $post->comment->toArray();
    }
    print_r($allPosts->toArray());
    /* Sorting algorith */
    // $sort = function(array $array){
    //     $length = count($array);
    //     for($i=0; $i<$length; $i++){
    //         $low = $i;
    //         for($j = $i+1; $j<$length; $j++){
    //             if($array[$j]<$array[$low]){
    //                 $low = $j;
    //             }
    //         }
    //         /* Swaping the number */
    //         if($array[$i]> $array[$low]){
    //             $temp = $array[$i];
    //             $array[$i] = $array[$low];
    //             $array[$low] = $temp;
    //         }
    //     }
    //     return $array;
    // };
    // print_r($sort([45,23,34567,2,0,435,234]));
    // $allPost = Post::get();
    // foreach($allPost as $post){
    //     $post->user = $post->user->toArray();
    // }
    // print_r($allPost[0]->user);
    // $allUsers = User::get();
    // foreach($allUsers as $raw){
    //     $raw->hellpost = $raw->post->toArray();
    //     print_r($raw->toArray());
    // }
    
});
