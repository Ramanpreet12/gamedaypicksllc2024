<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ColorSchemeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TeamPickController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\FrontPagesController;
use App\Http\Controllers\MatchResultController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\JerseyController;
use App\Http\Controllers\GreekStoreController;
use App\Http\Controllers\CloverController;

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AdminSettingController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\FixtureController;
use App\Http\Controllers\Backend\WinnerController;
use App\Http\Controllers\Backend\ColorSettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\SeasonController;
use App\Http\Controllers\Backend\PrizeController;
use App\Http\Controllers\Backend\GeneralController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\TeamResultController;
use App\Http\Controllers\Backend\LeaderboardController;
use App\Http\Controllers\Backend\HomeSettingController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\RegionController;
use App\Http\Controllers\Backend\VacationController;
use App\Http\Controllers\Backend\ScoreboardController;
use App\Http\Controllers\Backend\ContactController;

use App\Http\Controllers\Backend\ReviewsController;
use App\Http\Controllers\Backend\GeneralSettingController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\PreSignUpUsersController;
use App\Http\Controllers\Backend\AdminJerseyController;
use App\Http\Controllers\Backend\ProductController;
// use App\Http\Controllers\Backend\ProductVariationController;
use App\Http\Controllers\Backend\ProductSizeController;
use App\Http\Controllers\Backend\AdminGreekStoreController;

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

//wolf page
Route::get('craftsman-wanted', [HomeController::class, 'wolfPage'])->name('craftsman-wanted');
Route::post('store/craftman_visitors', [HomeController::class, 'storeCraftmanVisitors'])->name('store/craftman_visitors');

//gameday pick visitor count (client change url visitors to landing)
Route::get('visitors', [HomeController::class, 'visitors'])->name('visitors');
Route::post('store/visitors', [HomeController::class, 'store_visitor'])->name('store/visitors');
//gameday pick score card counter (clinet change from score_count to getinthegame)
Route::get('landing', [HomeController::class, 'landing'])->name('landing');

// landing page for sign up for the after school physical education sports (22-02-2024)
Route::get('sign-up-for-the-after-school-physical-education-sports', [HomeController::class, 'AfterSchoolPhysEduSports'])->name('sign-up-for-the-after-school-physical-education-sports');
// Route::middleware('visitors')->group(function () {

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

//user Routes
Route::middleware('guest')->group(function () {
    Route::get('register', [AuthController::class, 'userRegister'])->name('register');
    Route::post('new_reg', [AuthController::class, 'new_reg'])->name('new_reg');
    Route::match(['get', 'post'], 'login', [AuthController::class, 'UserLogin'])->name('login');

    Route::match(['get', 'post'], 'pre-sign-up', [AuthController::class, 'preSignUp'])->name('pre-sign-up');
});
//navbar pages

Route::match(['GET', 'POST'], 'contact', [FrontPagesController::class, 'contact'])->name('contact');
Route::get('about', [FrontPagesController::class, 'about'])->name('about');
Route::get('privacy', [FrontPagesController::class, 'privacy'])->name('privacy');

Route::match(['get', 'post'], 'region-results/{season?}', [FrontPagesController::class, 'regionResults'])->name('region-results');

// Route::match(['get' , 'post'] , 'match-result', [FrontPagesController::class,'matchResult'])->name('match-result');
Route::get('prize', [FrontPagesController::class, 'prize'])->name('prize');
Route::post('reviews', [FrontPagesController::class, 'reviews'])->name('reviews');
Route::get('game-result', [FrontPagesController::class, 'gameResult'])->name('game-result');

//match fixture for front

// fixture data according to season and weeks
Route::get('nfl-battles', [FrontPagesController::class, 'nfl_battles'])->name('nfl-battles');
//pick the team from match fixture page
Route::post('nfl_battles_team_pick', [FrontPagesController::class, 'nfl_battles_team_pick'])->name('nfl_battles_team_pick');
Route::post('check_user_subscribe_for_nfl_battles', [FrontPagesController::class, 'check_user_subscribe_for_nfl_battles'])->name('check_user_subscribe_for_nfl_battles');
//redirect after successfully coupon applied

//payment

Route::get('success', [StripeController::class, 'success'])->name('success');
Route::post('selectTeam', [StripeController::class, 'selectTeam'])->name('selectTeam');
Route::post('clover_charge', [StripeController::class, 'clover_charge'])->name('clover_charge');

//redirect on coupon page from dashboard team pick page
Route::match(['get', 'post'], 'coupon', [StripeController::class, 'couponPage'])->name('coupon');
//redirect after successfully coupon applied
Route::view('coupon_success', 'front.payment.coupon_success')->name('coupon_success');

Route::match(['get', 'post'], 'forget_password', [AuthController::class, 'forgotPassword'])->name('forget_password');
Route::match(['get', 'post'], 'change_password', [AuthController::class, 'changePassword'])->name('change_password');

//pick a team for user
Route::middleware(['auth', 'user'])->group(function () {

    Route::get('payment', [StripeController::class, 'stripe'])->name('payment');
    Route::post('payment/store', [StripeController::class, 'stripePost'])->name('payment.store');

    Route::get('teams', [TeamPickController::class, 'index'])->name('teams');
    Route::post('dashboard_team_pick', [TeamPickController::class, 'dashboard_team_pick'])->name('dashboard_team_pick');
    Route::post('check_user_subscribe', [TeamPickController::class, 'check_user_subscribe'])->name('check_user_subscribe');


    // Route::post('pickTeam', [TeamPickController::class, 'pickTeam'])->name('pickTeam');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('my_selections', [UserDashboardController::class, 'my_selections'])->name('my_selections');

    Route::get('past_selections', [UserDashboardController::class, 'past_selections'])->name('past_selections');
    Route::get('userPayment', [UserDashboardController::class, 'userPayment'])->name('userPayment');
    Route::get('prizes', [UserDashboardController::class, 'prizes'])->name('prizes');
    Route::get('upcomingMatches', [UserDashboardController::class, 'upcomingMatches'])->name('upcomingMatches');
    Route::match(['get', 'put'], 'settings', [UserDashboardController::class, 'settings'])->name('settings');
    Route::match(['get', 'put'], 'update-password', [UserDashboardController::class, 'updatePassword'])->name('update-password');
    Route::get('orderlist', [UserDashboardController::class, 'getAllPreviousOrders'])->name('orderlist');
    Route::get('view-order-detail/{orderId}', [UserDashboardController::class, 'viewOrderDetail']);
    Route::get('download-invoice/{id}', [UserDashboardController::class, 'invoice'])->name('download-invoice');

    // showing the list of greek store orders
    Route::get('greek-store-orders', [UserDashboardController::class, 'getAllGreekStoreOrder'])->name('greek-store-orders');
});

//data according to alphabets
Route::post('alphabets', [HomeController::class, 'getAlphabets']);
Route::get('player-standing/{alphabets}', [HomeController::class, 'playerStanding']);
Route::post('news_alerts', [HomeController::class, 'news_alerts'])->name('news_alerts');



// });
//visitors middleware ends here

//admin routes

Route::prefix('admin')->group(function () {
    Route::get('login', [AuthController::class, 'loginView'])->name('admin/login.index');
    Route::post('login', [AuthController::class, 'login'])->name('admin/login');
    Route::get('register', [AuthController::class, 'registerView'])->name('register.index');
    Route::post('register', [AuthController::class, 'register'])->name('register.store');
});
Route::prefix('admin')->middleware(['isAdmin'])->group(function () {
    // Route::get('dashboard', [PageController::class, 'dashboardOverview1'])->name('admin/dashboard');
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin/dashboard');
    Route::match(['get', 'post'], 'profile', [AdminSettingController::class, 'profile'])->name('admin/profile');
    // Route::match(['get' , 'post'] , 'password', [AdminSettingController::class, 'changePassword'])->name('admin/password');
    Route::get('password', [AdminSettingController::class, 'password'])->name('admin/password');
    Route::post('update_password', [AdminSettingController::class, 'updatePassword'])->name('admin/update_password');


    Route::get('user', [UserController::class, 'user_management'])->name('admin/user');
    // Route::get('user', [UserController::class, 'user_management'])->name('admin/user');
    Route::post('player_roster/section_heading', [UserController::class, 'section_heading'])->name('admin/player_roster/section_heading');
    Route::get('Userdetails/{id}', [UserController::class, 'user_datails'])->name('admin/Userdetails/{id}');
    Route::get('UserPaymentdetails/{id}', [UserController::class, 'userPayment_datails'])->name('admin/UserPaymentdetails/{id}');
    Route::get('PaymentInvoice/{id}', [UserController::class, 'payment_invoice'])->name('admin/PaymentInvoice');

    // presignup users
    Route::resources(['pre-signup-users' => PreSignUpUsersController::class]);
    Route::get('pre_user_paymentdetails/{id}', [PreSignUpUsersController::class, 'pre_user_paymentdetails'])->name('pre_user_paymentdetails');

    //fixtures
    Route::resources(['fixtures' => FixtureController::class,]);
    // delete using sweetalert
    Route::get('fixture/delete/{id}', [FixtureController::class, 'deleteFixture']);
    Route::post('fixture/section_heading', [FixtureController::class, 'section_heading'])->name('admin/fixture/section_heading');
    //add team scores
    Route::get('scores', [ScoreboardController::class, 'index'])->name('admin/scores');
    Route::post('add_scores/{id}', [ScoreboardController::class, 'add_scores']);
    Route::match(['get', 'post'], 'add_scores/{id}', [ScoreboardController::class, 'add_scores']);

    //results declare by admin
    Route::get('teams/result', [TeamResultController::class, 'index'])->name('admin/teams/result');
    Route::match(['get', 'post'], 'team_result/edit/{id}', [TeamResultController::class, 'edit_teamResult'])->name('admin/team_result/edit');
    Route::post('leaderboard/section_heading', [TeamResultController::class, 'section_heading'])->name('admin/leaderboard/section_heading');

    //color setting
    Route::get('color_setting', [ColorSettingController::class, 'index'])->name('admin/color_setting');
    Route::get('edit_color/{id}', [ColorSettingController::class, 'edit_color'])->name('admin/edit_color/{id}');
    Route::post('update_color/{id}', [ColorSettingController::class, 'update_color'])->name('admin/update_color/{id}');

    Route::get('allPayments', [PaymentController::class, 'getAll'])->name('admin/allPayments');
    Route::get('payments', [PaymentController::class, 'index'])->name('admin/payments');

    // jerseys order payment
    Route::get('get-all-orders', [PaymentController::class, 'getAllOrders'])->name('admin/get-all-orders');
    Route::get('get-all-orders-details/{orderId}/{userId}', [PaymentController::class, 'getAllOrdersDetails'])->name('admin/get-all-orders-details');
    // Route::get('order-payments', [PaymentController::class, 'orderPayment'])->name('admin/order-payments');
    Route::get('order-user-details/{id}', [PaymentController::class, 'orderUserDetails'])->name('admin/order-user-details');


    // Greek jerseys order payment
    Route::get('greek-order-payments', [PaymentController::class, 'greekOrderPayment'])->name('admin/greek-order-payments');
    Route::get('greek-order-user-details/{id}', [PaymentController::class, 'greekOrderUserDetails'])->name('admin/greek-order-user-details');


    Route::resources([
        'season' => SeasonController::class,
    ]);
    // delete using sweetalert
    Route::get('season/delete/{id}', [SeasonController::class, 'deleteSeason']);
    //add teams
    Route::resources([
        'team' => TeamController::class,
    ]);
    // delete using sweetalert
    Route::get('team/delete/{id}', [TeamController::class, 'deleteTeam']);
    Route::resources([
        'reviews' => ReviewsController::class,
    ]);
    // delete using sweetalert
    Route::get('reviews/delete/{id}', [ReviewsController::class, 'deleteReviews']);
    Route::post('reviews/section_heading', [ReviewsController::class, 'section_heading'])->name('admin/reviews/section_heading');

    //Winner rotues
    // Route::get('winner', [WinnerController::class, 'index'])->name('admin/winner');
    Route::resources(['winner' => WinnerController::class]);
    Route::get('winner/assign_prize/{id}', [WinnerController::class, 'assign_prize'])->name('admin/winner/assign_prize');
    Route::post('winner/assigned_prize/{id}', [WinnerController::class, 'assigned_prize_store'])->name('admin/winner/assigned_prize');
    Route::get('view_winners', [WinnerController::class, 'view_winners'])->name('admin/view_winners');
    // delete winner using sweetalert
    Route::get('view_winner/delete/{id}', [WinnerController::class, 'deleteView_winner']);
    //contacts list
    Route::resources([
        'contact' => ContactController::class,
    ]);


    //Coupons management
    Route::resources(['coupons' => CouponController::class]);

    //website setting
    //menu setting
    Route::resources(['menu' => MenuController::class]);
    // delete menu using sweetalert
    Route::get('menu/delete/{id}', [MenuController::class, 'deleteMenu']);

    //general management
    Route::get('general', [GeneralController::class, 'general'])->name('admin/general');
    Route::post('general_post', [GeneralController::class, 'general_update'])->name('admin/general_post');

    Route::resources([
        'banner' => BannerController::class,
    ]);

    // delete using sweetalert
    Route::get('banner/delete/{id}', [BannerController::class, 'deleteBanner']);

    // vacation
    Route::resources(['vacation' => VacationController::class]);
    Route::post('vacation/section_heading', [VacationController::class, 'section_heading'])->name('admin/vacation/section_heading');
    // delete using sweetalert
    Route::get('vacation/delete/{id}', [VacationController::class, 'deleteVacation']);


    //News setting
    Route::resources(['news' => NewsController::class]);
    // delete using sweetalert
    Route::get('news/delete/{id}', [NewsController::class, 'deleteNews']);
    Route::get('news_data/', [NewsController::class, 'news_data'])->name('admin/news_data');
    //   Route::get('news/delete/{id}',[NewsController::class,'destroy']);
    Route::post('news/section_heading', [NewsController::class, 'section_heading'])->name('admin/news/section_heading');

    //Match results settings
    Route::get('match_result', [MatchResultController::class, 'match_result'])->name('admin/match_result');
    Route::post('match_result_edit', [MatchResultController::class, 'match_result_edit'])->name('admin/match_result_edit');

    //Match fixture settings
    Route::get('match_fixture', [GeneralSettingController::class, 'match_fixture'])->name('admin/match_fixture');
    Route::post('match_fixture_edit', [GeneralSettingController::class, 'match_fixture_edit'])->name('admin/match_fixture_edit');

    // prize management
    Route::resources([
        'prize' => PrizeController::class,
    ]);
    Route::post('prize_banner', [GeneralController::class, 'prize_banner'])->name('admin/prize_banner');
    Route::post('prize/section_heading', [PrizeController::class, 'section_heading'])->name('admin/prize/section_heading');
    // delete using sweetalert
    Route::get('prize/delete/{id}', [PrizeController::class, 'deletePrize']);


    //static page
    Route::match(['get', 'put'], 'contact_page', [GeneralSettingController::class, 'contactPage'])->name('admin/contact_page');
    Route::match(['get', 'put'], 'about_page', [GeneralSettingController::class, 'aboutPage'])->name('admin/about_page');
    Route::match(['get', 'put'], 'privacy', [GeneralSettingController::class, 'privacyPage'])->name('admin/privacy');


    // get all the news alerts
    Route::get('news_alerts', [DashboardController::class, 'news_alerts'])->name('admin/news_alerts');
    // Route::post('news_alert/delete/{id}', [DashboardController::class, 'news_alert_delete'])->name('admin/news_alert/delete');
    // delete using sweetalert
    Route::get('news_alerts/delete/{id}', [DashboardController::class, 'deleteNewsAlerts']);


    // regions
    Route::resources(['region' => RegionController::class]);
    Route::get('region/delete/{id}', [RegionController::class, 'deleteRegion']);

    // edit page for pony flag
    Route::match(['get', 'put'], 'edit/pony-express-flag-football', [GeneralSettingController::class, 'editPonyExpressFlagFootball'])->name('admin.edit.pony-express-flag-football');

    //landing count for google and facebook count
    Route::match(['get', 'put'], 'landing_count', [GeneralSettingController::class, 'landing_count'])->name('admin/landing_count');
    Route::get('logout', [AuthController::class, 'Adminlogout'])->name('admin/logout');
    // delete using sweetalert
    // replace jerseys with products
    Route::prefix('products')->group(function () {
        Route::resources(['shop' => ProductController::class]);
        Route::controller(ProductController::class)->group(function () {

            // delete using sweetalert
            Route::get('shop/delete/{id}', 'deleteProducts');
            Route::get('product-image/delete/{id}', 'deleteProductImage');
            //  Route::get('jersey-image/delete/{id}', [AdminJerseyController::class, 'deleteJerseyImage');
            // add variants
            // Route::get('shop/add-variants/{id}', 'addVariant')->name('product.add-variants');

            Route::match(['get', 'post'], 'shop/add-variants/{id}', 'addVariant');
            Route::match(['get', 'put'], 'shop/{product_id}/edit-variants/{variant_id}', 'editVariant');
            Route::get('product-variation/delete/{variant_id}', 'deleteProductVariant');
        });
    });




    // product variations
    // Route::resources(['product-variations' => ProductVariationController::class]);
    Route::resources(['product-sizes' => ProductSizeController::class]);
    // delete using sweetalert
    // Route::get('product-variations/delete/{id}', [ProductVariationController::class, 'deleteProductVariation']);
    Route::get('product-sizes/delete/{id}', [ProductSizeController::class, 'deleteProductSize']);

    // greek store admin
    Route::prefix('products')->group(function () {
        Route::resources(['greek-store' => AdminGreekStoreController::class]);
        Route::controller(AdminGreekStoreController::class)->group(function () {

            Route::get('greek-store/delete/{id}', 'deleteGreekStoreProduct');
            Route::get('greek-store-image/delete/{id}', 'deleteGreekStoreProductImage');

            Route::match(['get', 'post'], 'greek-store/add-variants/{id}', 'addGreekVariant');
            Route::match(['get', 'put'], 'greek-store/{product_id}/edit-variants/{variant_id}', 'editGreekVariant');
            Route::get('greek-store-variation/delete/{variant_id}', 'deleteGreekProductVariant');
        });
    });
});

Route::get('pony-express-flag-football', [AuthController::class, 'ponyFlagFootball'])->name('pony-express-flag-football');
Route::get('pony-express-flag-football-shop', [ShopController::class, 'ponyFlagFootballShop'])->name('pony-express-flag-football-shop');
Route::get('pony-express-flag-football-shop/{jersey?}/{jersey_id?}', [ShopController::class, 'ponyFlagFootballJersey'])->name('show-kid-jersey');

// shop section (show all the jerseys )
Route::get('shop', [ShopController::class, 'index'])->name('shop');

// route to show data on base on tab click by the user
Route::post('tabcontent', [ShopController::class, 'showCategoryProduct'])->name('tabcontent');

// show only particular jersey (on click )
Route::get('shop/{productUrl?}', [ShopController::class, 'showProduct'])->name('show-product');
// Route::get('shop/{product?}/{product_id?}', [ShopController::class, 'showProduct'])->name('show-product');
Route::post('/get-product-price', [ShopController::class, 'getProductPrice'])->name('get-product-price');
// user buy jersey from buynow button
Route::post('shop-product', [ShopController::class, 'shopProduct'])->name('shop-product');
Route::get('proceed-to-checkout', [ShopController::class, 'proceedToCheckout'])->name('proceed-to-checkout');
Route::post('place_order', [ShopController::class, 'placeOrder'])->name('place_order');

//shop cart
Route::get('cart', [ShopController::class, 'cartJersey'])->name('cart');
// checkout from cart
Route::get('proceed_to_checkout', [ShopController::class, 'proceed_to_checkout'])->name('proceed_to_checkout');
Route::post('proceed_to_checkout_from_cart', [ShopController::class, 'proceed_to_checkout_from_cart'])->name('proceed_to_checkout_from_cart');
// Route::get('remove-cart-item/{jersey_id}' , [ShopController::class , 'removeCartItem'])->name('remove-cart-item');
// Route::get('remove-cart-item/{jersey_id}' , [ShopController::class , 'removeCartItem'])->name('remove-cart-item');

Route::delete('remove-from-cart', [ShopController::class, 'removeCartItem']);
Route::get('remove_all_items_from_cart', [ShopController::class, 'remove_all_items_from_cart'])->name('remove_all_items_from_cart');

// payment for jersey from buy now button
Route::get('proceed_to_buy_jersey/{order_id}', [ShopController::class, 'proceed_to_buy_jersey'])->name('proceed_to_buy_jersey.order_id');
Route::post('buy_jersey/{order_id}', [ShopController::class, 'buy_jersey'])->name('buy_jersey');

// add to cart using ajax
Route::post('reserve-jersey', [JerseyController::class, 'reserveJersey'])->name('reserve-jersey');

// greek store(front)

Route::controller(GreekStoreController::class)->group(function () {
    Route::get('greek-store', 'list')->name('greek-store');
    // route to show data on base on tab click by the user
    Route::post('greektabcontent', 'listProductType')->name('greektabcontent');

    // show only particular jersey (on click )
    Route::get('greek-store/{productUrl?}', 'showGreekProduct')->name('show-greek-product');
    Route::post('/get-greek-product-price', 'getGreekProductPrice')->name('get-greek-product-price');

    // payment page on
    Route::get('payment-success', function () {
        return view('front.payment.product_payment_success');
    })->name('payment-success');
});

// Order Mail
Route::get('order-mail', function () {

    return view('orderMail');
});

// Route::fallback(function () {
//     return view('main-error-page');
//  });

Route::get('no-product-found',function(){
    return view('no_product_found');
})->name('no-product-found');

Route::get('orders' , function(){
    return view('orders');
});

// get tax
Route::get('get-tax', [CloverController::class, 'getTaxRates'])->name('get-tax');
