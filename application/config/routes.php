<?php

//url=>controller/action
return array(
//Main
		'' => 'main/index',

		'about' => 'main/about',

		'contacts' => 'main/contacts',

//Workers

		'workers([?{1}])page=([0-9]+)&([a-z_]+)=([0-9]+)' => 'workers/workers_category/$4/$2',
		
		'workers([?]{1})page=([0-9]+)&([a-z_]+)=([0-9]+)&([a-z_]+)=([0-9]+)' => 'workers/workers_subcategory/$4/$6/$2',

		'worker/([a-zA-Z0-9-_]+)' => 'workers/worker/$1',

		'worker_rate/add' => 'workers/rate_add',

		'worker_rate/minus' => 'workers/rate_minus',

		'workers' => 'workers/index',

//News

		'news/id=([0-9]+)' => 'news/one/$1',

		'news([?{1}]+)page=([0-9]+)' => 'news/index/$2',

//Profile	
	
		'profile/registration' => 'profile/registration',

		'profile/settings([?{1}])skill' => 'profile/settings_skill',

		'profile/settings([?{1}])data' => 'profile/settings_data',

		'profile/settings([?{1}])page=([0-9]+)_work' => 'profile/settings_work/$2',

		'profile/settings/create([?{1}])order' => 'profile/create_order',

		'profile/edit([?{1}])([a-z]{4,5})' => 'profile/edit/$2',

		'profile/login' => 'profile/login',

		'profile/logout' => 'profile/logout',

		'profile/forgot_password' => 'profile/forgot_password',

		'profile' => 'profile/index',

		'deny_order' => 'profile/deny_order',

		'deny_order_employer' => 'profile/deny_order_employer',

		'confirm_order' => 'profile/confirm_order',
//Employer

		'employers/order/id=([0-9]+)' => 'employers/order_id/$1',

		'employers/order_add/([0-9]+)' => 'employers/order_add/$1',

		'employers/orders([?{1}])page=([0-9]+)' => 'employers/index/$2',

		'employers/orders([?{1}])page=([0-9]+)&category_id=([0-9]+)' =>'employers/orders_category/$2/$3',

		'employer/([a-zA-Z0-9-_]+)' => 'employers/employer/$1',

		'employer_rate/add' => 'employers/rate_add',

		'employer_rate/minus' => 'employers/rate_minus',


//Admin

		'admin([?{1}])[$]2y[$]10[$]oZEQOveeOwZXu7EJuSaJR.BJuZDwhhaljOCqRxK8uZT9FIAX7O4P.' => 'admin/index',
		//admin?$2y$10$oZEQOveeOwZXu7EJuSaJR.BJuZDwhhaljOCqRxK8uZT9FIAX7O4P.

		'admin/login([?{1}])[$]2y[$]10[$]SuOyyp4VOFqVs05J/Do6BeWLxMElUT7zHo9nA.Jb6j/SuWQ2fmGb2' => 'admin/login',
		//admin/login?$2y$10$SuOyyp4VOFqVs05J/Do6BeWLxMElUT7zHo9nA.Jb6j/SuWQ2fmGb2

		'admin/logout' => 'admin/logout',

		'admin/settings' => 'admin/settings',

		'admin/settings_update' => 'admin/update_settings',

		'admin/category' => 'admin/category',

		'admin/category_update/([0-9]+)' =>'admin/update_category/$1',

		'admin/category_delete' =>'admin/delete_category',

		'admin/category_add' =>'admin/add_category',

		'admin/subcategory([?{1}])page=([0-9]+)' => 'admin/subcategory/$2',

		'admin/subcategory_update/([0-9]+)' =>'admin/update_subcategory/$1',

		'admin/subcategory_delete' =>'admin/delete_subcategory',

		'admin/subcategory_add' =>'admin/add_subcategory',

		'admin/workers([?{1}])page=([0-9]+)' => 'admin/workers/$2',

		'admin/workers_update/([0-9]+)' => 'admin/update_workers/$1',

		'admin/workers_delete' => 'admin/delete_workers',

		'admin/employers([?{1}])page=([0-9]+)' => 'admin/employers/$2',

		'admin/employers_update/([0-9]+)' => 'admin/update_employers/$1',

		'admin/employers_delete' => 'admin/delete_employers',

		'admin/orders([?{1}])page=([0-9]+)' => 'admin/orders/$2',

		'admin/order_delete' => 'admin/delete_order',

		'admin/order_update/([0-9]+)' => 'admin/update_order/$1',

		'admin/news([?{1}])page=([0-9]+)' => 'admin/news/$2',

		'admin/news_update/([0-9]+)' => 'admin/update_news/$1',

		'admin/news_delete' => 'admin/delete_news',

		'admin/news_add' => 'admin/add_news',

);
