<?php

Route::view('/', 'frontend.landing.index');
Route::view('/pricing', 'frontend.landing.pricing');

Auth::routes();

// Webhooks
Route::webhooks('paypal/webhook', 'paypal');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Prompt
    Route::delete('prompts/destroy', 'PromptController@massDestroy')->name('prompts.massDestroy');
    Route::resource('prompts', 'PromptController');

    // Question
    Route::delete('questions/destroy', 'QuestionController@massDestroy')->name('questions.massDestroy');
    Route::resource('questions', 'QuestionController');

    // Content
    Route::delete('contents/destroy', 'ContentController@massDestroy')->name('contents.massDestroy');
    Route::resource('contents', 'ContentController');

    // Tone
    Route::delete('tones/destroy', 'ToneController@massDestroy')->name('tones.massDestroy');
    Route::resource('tones', 'ToneController');

    // Answer
    Route::delete('answers/destroy', 'AnswerController@massDestroy')->name('answers.massDestroy');
    Route::resource('answers', 'AnswerController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Payment Method
    Route::delete('payment-methods/destroy', 'PaymentMethodController@massDestroy')->name('payment-methods.massDestroy');
    Route::resource('payment-methods', 'PaymentMethodController');

    // Currency
    Route::delete('currencies/destroy', 'CurrencyController@massDestroy')->name('currencies.massDestroy');
    Route::resource('currencies', 'CurrencyController');

    // Plan
    Route::delete('plans/destroy', 'PlanController@massDestroy')->name('plans.massDestroy');
    Route::resource('plans', 'PlanController');

    // Subscription
    Route::delete('subscriptions/destroy', 'SubscriptionController@massDestroy')->name('subscriptions.massDestroy');
    Route::resource('subscriptions', 'SubscriptionController');

    // Payment
    Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentController');

    // Settings
    Route::get('settings/payment', 'SettingsController@payment')->name('settings.payment');
    Route::get('settings/content', 'SettingsController@content')->name('settings.content');
    Route::put('settings', 'SettingsController@update')->name('settings.update');

    // Brand
    Route::post('brands/media', 'BrandController@storeMedia')->name('brands.storeMedia');
    Route::post('brands/ckmedia', 'BrandController@storeCKEditorImages')->name('brands.storeCKEditorImages');
    Route::resource('brands', 'BrandController', ['except' => ['create', 'store', 'show', 'destroy']]);

    // Third Party
    Route::resource('third-parties', 'ThirdPartyController', ['except' => ['create', 'store', 'show', 'destroy']]);

    // Hero
    Route::post('heroes/media', 'HeroController@storeMedia')->name('heroes.storeMedia');
    Route::post('heroes/ckmedia', 'HeroController@storeCKEditorImages')->name('heroes.storeCKEditorImages');
    Route::resource('heroes', 'HeroController', ['except' => ['create', 'store', 'show', 'destroy']]);

    // Partner
    Route::delete('partners/destroy', 'PartnerController@massDestroy')->name('partners.massDestroy');
    Route::post('partners/media', 'PartnerController@storeMedia')->name('partners.storeMedia');
    Route::post('partners/ckmedia', 'PartnerController@storeCKEditorImages')->name('partners.storeCKEditorImages');
    Route::resource('partners', 'PartnerController', ['except' => ['show']]);

    // Landing Page
    Route::resource('landing-pages', 'LandingPageController', ['except' => ['create', 'store', 'show', 'destroy']]);

    // Story
    Route::post('stories/media', 'StoryController@storeMedia')->name('stories.storeMedia');
    Route::post('stories/ckmedia', 'StoryController@storeCKEditorImages')->name('stories.storeCKEditorImages');
    Route::resource('stories', 'StoryController', ['except' => ['create', 'store', 'show', 'destroy']]);

    // Pricing
    Route::resource('pricings', 'PricingController', ['except' => ['create', 'store', 'show', 'destroy']]);

    // Testimonial
    Route::post('testimonials/media', 'TestimonialController@storeMedia')->name('testimonials.storeMedia');
    Route::post('testimonials/ckmedia', 'TestimonialController@storeCKEditorImages')->name('testimonials.storeCKEditorImages');
    Route::resource('testimonials', 'TestimonialController', ['except' => ['create', 'store', 'show', 'destroy']]);

    // Block
    Route::delete('blocks/destroy', 'BlockController@massDestroy')->name('blocks.massDestroy');
    Route::post('blocks/media', 'BlockController@storeMedia')->name('blocks.storeMedia');
    Route::post('blocks/ckmedia', 'BlockController@storeCKEditorImages')->name('blocks.storeCKEditorImages');
    Route::resource('blocks', 'BlockController');

    // Engine
    Route::delete('engines/destroy', 'EngineController@massDestroy')->name('engines.massDestroy');
    Route::resource('engines', 'EngineController');

    // Language
    Route::delete('languages/destroy', 'LanguageController@massDestroy')->name('languages.massDestroy');
    Route::resource('languages', 'LanguageController');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth', 'subscribe.free']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Users
    Route::get('/settings', 'UsersController@settings')->name('settings');
    Route::post('/users', 'UsersController@update')->name('user.update');

    // Prompts
    Route::get('frontend/prompts/json', 'PromptController@indexAsJson')->name('prompts.json');

    // Content
    Route::get('history', 'ContentController@index')->name('contents.index');
    Route::get('content/new', 'ContentController@create')->name('contents.create');
    Route::post('contents', 'ContentController@store')->name('contents.store');
    Route::get('content/{content}', 'ContentController@show')->name('contents.show');

    // Subscription
    Route::get('user/subscribe/{planId}/{paymentFrequency}', 'SubscriptionController@stripeCheckout')->name('subscription.stripe.checkout');
    Route::post('subscriptions/stripe/activate', 'SubscriptionController@activateStripeSubscription')->name('subscription.stripe.activate');
    Route::post('subscriptions/paypal/new', 'SubscriptionController@createPayPalSubscription')->name('subscription.paypal.new');
    Route::post('subscriptions/paypal/activate', 'SubscriptionController@activatePayPalSubscription')->name('subscription.paypal.activate');
    Route::post('subscriptions/cancel', 'SubscriptionController@cancelSubscription')->name('subscription.cancel');
    Route::get('/subscription', 'SubscriptionController@show')->name('subscription');

    // Payment
    Route::get('/payments', 'PaymentController@index')->name('payments');

    // Profile
    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
