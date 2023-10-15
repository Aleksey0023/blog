<?php

use App\Http\Controllers\Admin\Category\CreateController;
use App\Http\Controllers\Admin\Category\DestroyController;
use App\Http\Controllers\Admin\Category\EditController;
use App\Http\Controllers\Admin\Category\ShowController;
use App\Http\Controllers\Admin\Category\StoreController;
use App\Http\Controllers\Admin\Category\UpdateController;
use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::name('main.')->group(function () {
    Route::get('/', IndexController::class)->name('index'); // Главная страница в разработке, поэтому пока идёт редирект на страницу блога
});

Route::prefix('posts')->group(function () {
    Route::name('post.')->group(function () {
        Route::get('/', \App\Http\Controllers\Post\IndexController::class)->name('index');
        Route::get('/{post}', \App\Http\Controllers\Post\ShowController::class)->name('show');

        Route::prefix('{post}/comments')->group(function () {
            Route::name('comment.')->group(function () {
                Route::post('/', \App\Http\Controllers\Post\Comment\StoreController::class)->name('store');
            });
        });

        Route::prefix('{post}/likes')->group(function () {
            Route::name('like.')->group(function () {
                Route::post('/', \App\Http\Controllers\Post\Like\StoreController::class)->name('store');
            });
        });
    });
});

Route::prefix('categories/{category}/posts')->group(function () {
    Route::name('category.post.')->group(function () {
        Route::get('/', \App\Http\Controllers\Category\Post\IndexController::class)->name('index');
    });
});

Route::prefix('courses')->group(function () {
    Route::name('course.')->group(function () {
        Route::get('/', \App\Http\Controllers\Course\IndexController::class)->name('index');
        Route::get('/{course}', \App\Http\Controllers\Course\ShowController::class)->name('show');
    });
});

Route::prefix('reviews')->group(function () {
    Route::name('review.')->group(function () {
        Route::get('/', \App\Http\Controllers\Review\IndexController::class)->name('index');
    });
});

Route::prefix('about')->group(function () {
    Route::name('about.')->group(function () {
        Route::get('/', \App\Http\Controllers\About\IndexController::class)->name('index');
    });
});

Route::middleware(['auth', 'verified'])->prefix('personal')->group(function () {
    Route::name('personal.main.')->group(function () {
        Route::get('/', \App\Http\Controllers\Personal\Main\IndexController::class)->name('index');
    });

    Route::prefix('posts')->group(function () {
        Route::name('personal.post.')->group(function () {
            Route::get('/{post}', \App\Http\Controllers\Personal\Post\ShowController::class)->name('show');
        });
    });

    Route::prefix('likes')->group(function () {
        Route::name('personal.liked.')->group(function () {
            Route::get('/', \App\Http\Controllers\Personal\Liked\IndexController::class)->name('index');
            Route::delete('/{post}', \App\Http\Controllers\Personal\Liked\DestroyController::class)->name('destroy');
        });
    });

    Route::prefix('comments')->group(function () {
        Route::name('personal.comment.')->group(function () {
            Route::get('/', \App\Http\Controllers\Personal\Comment\IndexController::class)->name('index');
            Route::get('/{comment}/edit', \App\Http\Controllers\Personal\Comment\EditController::class)->name('edit');
            Route::patch('/{comment}', \App\Http\Controllers\Personal\Comment\UpdateController::class)->name('update');
            Route::delete('/{comment}', \App\Http\Controllers\Personal\Comment\DestroyController::class)->name('destroy');
        });
    });
});

Route::middleware(['auth', 'admin', 'verified'])->prefix('admin')->group(function () {
    Route::name('admin.main.')->group(function () {
        Route::get('/', \App\Http\Controllers\Admin\Main\IndexController::class)->name('index');
    });

    Route::prefix('categories')->group(function () {
        Route::name('admin.category.')->group(function () {
            Route::get('/', \App\Http\Controllers\Admin\Category\IndexController::class)->name('index');
            Route::get('/create', CreateController::class)->name('create');
            Route::post('/', StoreController::class)->name('store');
            Route::get('/{category}', ShowController::class)->name('show');
            Route::get('/{category}/edit', EditController::class)->name('edit');
            Route::patch('/{category}', UpdateController::class)->name('update');
            Route::delete('/{category}', DestroyController::class)->name('destroy');
        });
    });

    Route::prefix('tags')->group(function () {
        Route::name('admin.tag.')->group(function () {
            Route::get('/', \App\Http\Controllers\Admin\Tag\IndexController::class)->name('index');
            Route::get('/create', \App\Http\Controllers\Admin\Tag\CreateController::class)->name('create');
            Route::post('/', \App\Http\Controllers\Admin\Tag\StoreController::class)->name('store');
            Route::get('/{tag}', \App\Http\Controllers\Admin\Tag\ShowController::class)->name('show');
            Route::get('/{tag}/edit', \App\Http\Controllers\Admin\Tag\EditController::class)->name('edit');
            Route::patch('/{tag}', \App\Http\Controllers\Admin\Tag\UpdateController::class)->name('update');
            Route::delete('/{tag}', \App\Http\Controllers\Admin\Tag\DestroyController::class)->name('destroy');
        });
    });

    Route::prefix('posts')->group(function () {
        Route::name('admin.post.')->group(function () {
            Route::get('/', \App\Http\Controllers\Admin\Post\IndexController::class)->name('index');
            Route::get('/create', \App\Http\Controllers\Admin\Post\CreateController::class)->name('create');
            Route::post('/', \App\Http\Controllers\Admin\Post\StoreController::class)->name('store');
            Route::get('/{post}', \App\Http\Controllers\Admin\Post\ShowController::class)->name('show');
            Route::get('/{post}/edit', \App\Http\Controllers\Admin\Post\EditController::class)->name('edit');
            Route::patch('/{post}', \App\Http\Controllers\Admin\Post\UpdateController::class)->name('update');
            Route::delete('/{post}', \App\Http\Controllers\Admin\Post\DestroyController::class)->name('destroy');
        });
    });

    Route::prefix('users')->group(function () {
        Route::name('admin.user.')->group(function () {
            Route::get('/', \App\Http\Controllers\Admin\User\IndexController::class)->name('index');
            Route::get('/create', \App\Http\Controllers\Admin\User\CreateController::class)->name('create');
            Route::post('/', \App\Http\Controllers\Admin\User\StoreController::class)->name('store');
            Route::get('/{user}', \App\Http\Controllers\Admin\User\ShowController::class)->name('show');
            Route::get('/{user}/edit', \App\Http\Controllers\Admin\User\EditController::class)->name('edit');
            Route::patch('/{user}', \App\Http\Controllers\Admin\User\UpdateController::class)->name('update');
            Route::delete('/{user}', \App\Http\Controllers\Admin\User\DestroyController::class)->name('destroy');
        });
    });

    Route::prefix('courses')->group(function () {
        Route::name('admin.course.')->group(function () {
            Route::get('/', \App\Http\Controllers\Admin\Course\IndexController::class)->name('index');
            Route::get('/create', \App\Http\Controllers\Admin\Course\CreateController::class)->name('create');
            Route::post('/', \App\Http\Controllers\Admin\Course\StoreController::class)->name('store');
            Route::get('/{course}', \App\Http\Controllers\Admin\Course\ShowController::class)->name('show');
            Route::get('/{course}/edit', \App\Http\Controllers\Admin\Course\EditController::class)->name('edit');
            Route::patch('/{course}', \App\Http\Controllers\Admin\Course\UpdateController::class)->name('update');
            Route::delete('/{course}', \App\Http\Controllers\Admin\Course\DestroyController::class)->name('destroy');
        });
    });

    Route::prefix('reviews')->group(function () {
        Route::name('admin.review.')->group(function () {
            Route::get('/', \App\Http\Controllers\Admin\Review\IndexController::class)->name('index');
            Route::get('/create', \App\Http\Controllers\Admin\Review\CreateController::class)->name('create');
            Route::post('/', \App\Http\Controllers\Admin\Review\StoreController::class)->name('store');
            Route::get('/{review}', \App\Http\Controllers\Admin\Review\ShowController::class)->name('show');
            Route::get('/{review}/edit', \App\Http\Controllers\Admin\Review\EditController::class)->name('edit');
            Route::patch('/{review}', \App\Http\Controllers\Admin\Review\UpdateController::class)->name('update');
            Route::delete('/{review}', \App\Http\Controllers\Admin\Review\DestroyController::class)->name('destroy');
        });
    });
});

Auth::routes(['verify' => true]);
