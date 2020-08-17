<?php

Route::group(['middleware' => ['auth', 'admin']], function(){
	Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
	Route::get('category', 'CategoryController@category')->name('category');
	Route::get('get/category', 'CategoryController@getcategory')->name('getcategory');
	Route::post('category/store', 'CategoryController@category_store')->name('category.store');
	Route::get('category/edit/{id}', 'CategoryController@category_edit')->name('category.edit');
	Route::post('category/update', 'CategoryController@category_update')->name('category.update');
	Route::get('category/delete/{id}', 'CategoryController@category_delete')->name('category.delete');

	// sub category routes
	Route::get('subcategory', 'CategoryController@subcategory')->name('subcategory');
	
	Route::post('subcategory/store', 'CategoryController@subcategory_store')->name('subcategory.store');
	Route::get('subcategory/list', 'CategoryController@subcategory_index')->name('subcategory.list');
	Route::get('subcategory/edit/{id}', 'CategoryController@subcategory_edit')->name('subcategory.edit');
	Route::post('subcategory/update', 'CategoryController@subcategory_update')->name('subcategory.update');
	Route::get('subcategory/delete/{id}', 'CategoryController@subcategory_delete')->name('subcategory.delete');

	Route::get('get/subcategory/{id}', 'CategoryController@get_subcategory')->name('get_subcategory');

	Route::get('subchild/category', 'CategoryController@subchildcategory')->name('subchildcategory');
	Route::post('subchild/category/store', 'CategoryController@subchildcategory_store')->name('subchildcategory.store');

	Route::get('subchild/category/edit/{id}', 'CategoryController@subchildcategory_edit')->name('subchildcategory.edit');

	Route::post('subchild/category/update', 'CategoryController@subchildcategory_update')->name('subchildcategory.update');
	Route::get('subchild/category/delete/{id}', 'CategoryController@subchildcategory_delete')->name('subchildcategory.delete');
	
		// productAttribute routes
	Route::get('product/attribute', 'ProductAttributeController@attribute_create')->name('productAttribute');
	Route::post('product/attribute/store', 'ProductAttributeController@attribute_store')->name('productAttribute.store');
	Route::get('product/attribute/list', 'ProductAttributeController@attribute_list')->name('productAttribute.list');
	Route::get('product/attribute/edit/{id}', 'ProductAttributeController@attribute_edit')->name('productAttribute.edit');
	Route::post('product/attribute/update', 'ProductAttributeController@attribute_update')->name('productAttribute.update');
	Route::get('product/attribute/delete/{id}', 'ProductAttributeController@attribute_delete')->name('productAttribute.delete');

	// productAttributeValue routes
	Route::get('product/attributevalue/{attribute_slug}/list', 'ProductAttributeController@attributevalue')->name('productAttributeValue');
	Route::post('product/attributevalue/store', 'ProductAttributeController@attributevalue_store')->name('productAttributeValue.store');
	Route::get('product/attributevalue/list', 'ProductAttributeController@attributevalue_list')->name('productAttributeValue.list');
	Route::get('product/attributevalue/edit/{id}', 'ProductAttributeController@attributevalue_edit')->name('productAttributeValue.edit');
	Route::post('product/attributevalue/update', 'ProductAttributeController@attributevalue_update')->name('productAttributeValue.update');
	Route::get('product/attributevalue/delete/{id}', 'ProductAttributeController@attributevalue_delete')->name('productAttributeValue.delete');

	// brand routes
	Route::get('brand', 'BrandController@index')->name('brand');
	Route::post('brand/store', 'BrandController@store')->name('brand.store');
	Route::get('brand/list', 'BrandController@index')->name('brand.list');
	Route::get('brand/edit/{id}', 'BrandController@edit')->name('brand.edit');
	Route::post('brand/update', 'BrandController@update')->name('brand.update');
	Route::get('brand/delete/{id}', 'BrandController@delete')->name('brand.delete');


	// product routes
	Route::get('product/create', 'ProductController@create')->name('product.create');
	Route::post('product/store', 'ProductController@store')->name('product.store');
	Route::get('product/list', 'ProductController@index')->name('product.list');
	Route::get('product/edit/{id}', 'ProductController@edit')->name('product.edit');
	Route::post('product/update', 'ProductController@update')->name('product.update');
	Route::get('product/delete/{id}', 'ProductController@delete')->name('product.delete');
	
	Route::get('product/highlight{id}', 'ProductController@highlight')->name('product.highlight');




	// slider routes
	Route::get('slider/create', 'SliderController@index')->name('slider.create');
	Route::post('slider/store', 'SliderController@store')->name('slider.store');
	Route::get('manage/slider', 'SliderController@index')->name('slider.list');
	Route::get('slider/edit/{id}', 'SliderController@edit')->name('slider.edit');
	Route::post('slider/update', 'SliderController@update')->name('slider.update');
	Route::get('slider/delete/{id}', 'SliderController@delete')->name('slider.delete');



	// page routes
	Route::get('page/create', 'PageController@create')->name('page.create');
	Route::post('page/store', 'PageController@store')->name('page.store');
	Route::get('page/list', 'PageController@index')->name('page.list');
	Route::get('page/{id}/edit', 'PageController@edit')->name('page.edit');
	Route::post('page/update/{id}', 'PageController@update')->name('page.update');
	Route::get('page/delete/{id}', 'PageController@delete')->name('page.delete');	
	Route::get('page/slug/create', 'PageController@getSlug')->name('page.slug');

	Route::get('page/status/{id}', 'PageController@status')->name('page.status');	
	Route::get('page/menu-status/{id}', 'PageController@MenuStatus')->name('page.menuStatus');	

	// user routes
	Route::get('user/create', 'UserController@create')->name('user.create');
	Route::post('user/store', 'UserController@store')->name('user.store');
	Route::get('user/list', 'UserController@index')->name('user.list');
	Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit');
	Route::post('user/update/{id}', 'UserController@update')->name('user.update');
	Route::get('user/delete/{id}', 'UserController@delete')->name('user.delete');

	Route::get('user/profile/{username}', 'UserController@user_profile')->name('user.profile');
	Route::get('user/active', 'UserController@active_user')->name('user.active');
	Route::get('user/inactive', 'UserController@inactive_user')->name('user.inactive');
	Route::get('user/block', 'UserController@block_user')->name('user.block');
	Route::get('user/download', 'UserController@download_user')->name('user.download');

	// designation routes
	Route::get('designation/create', 'DesignationController@create')->name('designation.create');
	Route::post('designation/store', 'DesignationController@store')->name('designation.store');
	Route::get('designation/list', 'DesignationController@index')->name('designation.list');
	Route::get('designation/{id}/edit', 'DesignationController@edit')->name('designation.edit');
	Route::post('designation/update', 'DesignationController@update')->name('designation.update');
	Route::get('designation/delete/{id}', 'DesignationController@delete')->name('designation.delete');	
	
	// staff routes
	Route::get('staff/create', 'StaffController@create')->name('staff.create');
	Route::post('staff/store', 'StaffController@store')->name('staff.store');
	Route::get('staff/list', 'StaffController@index')->name('staff.list');
	Route::get('staff/{id}/edit', 'StaffController@edit')->name('staff.edit');
	Route::post('staff/update', 'StaffController@update')->name('staff.update');
	Route::get('staff/delete/{id}', 'StaffController@delete')->name('staff.delete');	
	// role routes
	Route::get('role/create', 'RoleController@create')->name('role.create');
	Route::post('role/store', 'RoleController@store')->name('role.store');
	Route::get('role/list', 'RoleController@index')->name('role.list');
	Route::get('role/{id}/edit', 'RoleController@edit')->name('role.edit');
	Route::post('role/update', 'RoleController@update')->name('role.update');
	Route::get('role/delete/{id}', 'RoleController@delete')->name('role.delete');

	// banner routes
	Route::get('banner/create', 'BannerController@create')->name('banner.create');
	Route::post('banner/store', 'BannerController@store')->name('banner.store');
	Route::get('banner/list', 'BannerController@index')->name('banner.list');
	Route::get('banner/{id}/edit', 'BannerController@edit')->name('banner.edit');
	Route::post('banner/update', 'BannerController@update')->name('banner.update');
	Route::get('banner/delete/{id}', 'BannerController@delete')->name('banner.delete');
	
	// service routes
	Route::post('service/store', 'ServicesController@store')->name('service.store');
	Route::get('service/list', 'ServicesController@index')->name('service.list');
	Route::get('service/{id}/edit', 'ServicesController@edit')->name('service.edit');
	Route::post('service/update', 'ServicesController@update')->name('service.update');
	Route::get('service/delete/{id}', 'ServicesController@delete')->name('service.delete');

	// coupon routes
	Route::get('coupon', 'CouponController@index')->name('coupon');
	Route::post('coupon/store', 'CouponController@store')->name('coupon.store');
	Route::get('coupon/{id}/edit', 'CouponController@edit')->name('coupon.edit');
	Route::post('coupon/update', 'CouponController@update')->name('coupon.update');
	Route::get('coupon/delete/{id}', 'CouponController@delete')->name('coupon.delete');





});



?>