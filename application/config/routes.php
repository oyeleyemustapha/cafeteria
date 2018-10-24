<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'cafeteria';
$route['404_override'] = 'error404';

$route['translate_uri_dashes'] = FALSE;

$route['login']='cafeteria/login';
$route['logout']='cafeteria/logout';




//ADMINISTRATOR
$route['administrator']="administrator/index";


$route['staff']="administrator/staff";
$route['fetchStafflist']="administrator/fetch_staff_list";
$route['addStaff']="administrator/add_staff";
$route['deleteStaff']="administrator/delete_staff";
$route['fetchStaff']="administrator/fetch_staff_info";
$route['updateStaff']="administrator/update_staff";



$route['logs']="administrator/logs";
$route['fetchLogs']="administrator/fetch_logs";

//PRODUCTS
$route['products']="administrator/products";
$route['addProduct']="administrator/add_product";
$route['fetchProductList']="administrator/fetch_product_list";
$route['fetchProductInfo']="administrator/fetch_product_info";
$route['updateProductInfo']="administrator/update_product_info";

//SALES PRODUCTS
$route['sales-product']="administrator/sales_product";
$route['productListSelect']="administrator/get_product_list_plugin";
$route['addSalesProducts']="administrator/add_sales_products";
$route['fetchSalesProducts']="administrator/fetch_sales_product_list";
$route['fetchSalesProductsCurrent']="administrator/fetch_sales_product_list_current";
$route['salesProductInfo']="administrator/fetch_sales_product_info";
$route['updateSalesProduct']="administrator/update_sales_products";

//SETTINGS
$route['settings']="administrator/settings";
$route['updateCafeteriaName']="administrator/update_cafeteria_name";


//REPORT
$route['reports']="administrator/reports";
$route['dailySalesReport']="administrator/daily_sales_reports";
$route['daily-sales-reports']="administrator/sales_reports_day";
$route['monthly-sales-reports']="administrator/sales_reports_month";
$route['annual-sales-reports']="administrator/sales_reports_annual";


//SALES
$route['sales']="administrator/sales";
$route['daily-sales-reports-staff']="administrator/sales_reports_day_staff";
$route['general-sales-reports-staff']="administrator/sales_reports_day_general";
$route['search-sales']="administrator/sales_records_order_no";
$route['cancel-all-orders']="administrator/cancel_all_orders";


//CASHIER
$route['cashier']="cashier/index";


$route['query']="cashier/query";