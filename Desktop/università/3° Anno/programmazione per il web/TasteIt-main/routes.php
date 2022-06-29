<?php

use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;

use App\Controllers\StatisticController;
use App\Controllers\AuthController;
use App\Controllers\CartController;
use App\Controllers\categoryController;
use App\Controllers\FavouritesController;
use App\Controllers\HomePageController;
use App\Controllers\OrderController;
use App\Controllers\ProductController;
use App\Controllers\RestaurantController;
use App\Controllers\CustomerController;
use App\Controllers\admin\CouponController;
use App\Controllers\admin\CustomerController as AdminCustomerController;
use App\Controllers\admin\CategoryController as AdminCategoryController;
use App\Controllers\admin\ProductController as AdminProductController;
use App\Controllers\admin\OrderController as AdminOrderController;
require_once "Utility.php";

SimpleRouter::redirect("/", "/home");


    SimpleRouter::get("/error404", [AuthController::class, "error404"]);
    SimpleRouter::get("/login", [AuthController::class, "visualizeLogin"])->name('login');
    SimpleRouter::post("/login", [AuthController::class, "login"]);
    SimpleRouter::get("/signup", [AuthController::class, "visualizeSignUp"]);
    SimpleRouter::post("/signup", [AuthController::class, "signUp"]);
    SimpleRouter::get("/logout", [AuthController::class, "logout"]);

    SimpleRouter::get("/home", [HomePageController::class, "visualizeHome"])->name('home');

    SimpleRouter::get("/aboutUs", [HomePageController::class, "about"]);
    SimpleRouter::get("/contact",[RestaurantController::class, "visualizeContactPage"]);

    SimpleRouter::get("/products/{productId}", [ProductController::class, "getProduct"])->name('getProduct');
    SimpleRouter::get("/products", [ProductController::class, "getAll"])->name('products');

    SimpleRouter::get("/categories/{categoryId}/products", [CategoryController::class, "getCategoryProducts"]);



SimpleRouter::group(['middleware' => \App\Controllers\AuthMiddleware::class], function () {


    SimpleRouter::post("/home/products/{productId}/carts/{cartId}", [HomePageController::class, "addToCartFromHome"]);
    SimpleRouter::post("/home/products/{productId}/favourites/{favId}", [HomePageController::class, "addToFavouritesFromHome"]);

    SimpleRouter::post("/products/{productId}/favourites/{favId}",[ProductController::class, "addToFavourites"]);
    SimpleRouter::post("/products/{productId}/carts/{cartId}", [ProductController::class, "addProductToCart"]);
    SimpleRouter::post("/products/{productId}/reviews", [ProductController::class, "createReview"]);

    SimpleRouter::get("/profile", [CustomerController::class, "getProfile"]);

    SimpleRouter::post("/profile/{id}/details", [OrderController::class, "getOrderDetails"]);
    SimpleRouter::post("/profile/{id}", [OrderController::class, "addToCart"]);
    SimpleRouter::post("/profile/{id}/confirm", [OrderController::class, "confirm"]);
    SimpleRouter::get("/cards", [CustomerController::class, "showAddCard"]);
    SimpleRouter::post("/cards", [CustomerController::class, "addCard"]);
    SimpleRouter::get("/address", [CustomerController::class, "showAddAddress"]);
    SimpleRouter::post("/address", [CustomerController::class, "addAddress"]);

    SimpleRouter::post("/cart/checkout/confirmation", [OrderController::class, "createOrder"]);

    SimpleRouter::delete("/carts/{cartId}/products/{productId}", [CartController::class, "destroy"]);
    SimpleRouter::get("/carts/{cartId}/products", [CartController::class, "getProductsOfCart"])->name('productsOfCarts');
    SimpleRouter::put("/carts/{cartId}/products/{productId}",[CartController::class, "updateQuantity"]);

    SimpleRouter::get("/favourites/{favId}",[FavouritesController::class, "getFavouritesProducts"])->name('favourites');
    SimpleRouter::post("/carts/{cartId}/products",[FavouritesController::class, "addToCartFromFav"]);
    SimpleRouter::delete("/favourites/{favId}/products/{productId}",[FavouritesController::class, "deleteProductFromFav"]);
});

SimpleRouter::group(['middleware' => \App\Controllers\AdminMiddleware::class], function () {

    SimpleRouter::get("/admin", [StatisticController::class, "visualizeStatistics"]);
    SimpleRouter::get("/admin/categories", [AdminCategoryController::class, "categoriesAdmin"]);
    SimpleRouter::get("/admin/categories/add", [AdminCategoryController::class, "showAddCategory"]);
    SimpleRouter::post("/admin/categories", [AdminCategoryController::class, "create"]);
    SimpleRouter::post("/admin/categories/{id}/destroy", [AdminCategoryController::class, "destroy"]);
    SimpleRouter::get("/admin/categories/{id}/products", [AdminProductController::class, "productsInCategory"]);
    SimpleRouter::get("/admin/categories/{categoryId}/products/form", [AdminProductController::class, "showCreateProduct"]);
    SimpleRouter::post("/admin/categories/{categoryId}/products", [AdminProductController::class, "store"]);
    SimpleRouter::get("/admin/categories/{categoryId}/products/{productId}/reviews", [AdminProductController::class, "showReviews"]);
    SimpleRouter::get("/admin/categories/{categoryId}/products/{productId}/edit", [AdminProductController::class, "showEditProduct"]);
    SimpleRouter::post("/admin/categories/{categoryId}/products/{productId}/edit", [AdminProductController::class, "update"]);
    SimpleRouter::post("/admin/categories/{categoryId}/products/{productId}", [AdminProductController::class, "destroy"]);
    SimpleRouter::get("/admin/products", [AdminProductController::class, "productsBestSellers"]);

    SimpleRouter::get("/admin/orders", [AdminOrderController::class, "visualizeOrders"]);
    SimpleRouter::get("/admin/orders/{id}", [AdminOrderController::class, "visualizeOrderDetails"]);
    SimpleRouter::post("/admin/orders/{id}/accept", [AdminOrderController::class, "acceptOrder"]);
    SimpleRouter::post("/admin/orders/{id}/refuse", [AdminOrderController::class, "refuseOrder"]);

    SimpleRouter::get("/admin/coupons", [CouponController::class, "index"])->name('showAllCoupons');

    SimpleRouter::get("/admin/customers", [AdminCustomerController::class, "index"])->name('showAllCustomers');
    SimpleRouter::get("/admin/customers/best", [AdminCustomerController::class, "showBest"])->name('showBest');
    SimpleRouter::post("/admin/customers", [AdminCustomerController::class, "sendCoupon"]);
});

SimpleRouter::group(['middleware' => \App\Controllers\OrderMiddleware::class], function () {
    SimpleRouter::get("/cart/checkout", [OrderController::class, "checkout"])->name('checkout');
});



    SimpleRouter::error(function(Request $request, \Exception $exception) {

    if($exception instanceof NotFoundHttpException && $exception->getCode() === 404) {
        response()->redirect("/error404");
    }
});