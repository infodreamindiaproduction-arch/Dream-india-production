<?php
// This file is embedded in the public Playground Blueprint, never in the theme.
// These intentionally public accounts belong only to the isolated test site.
require '/wordpress/wp-load.php';
$admin = username_exists('hrms_admin');
if (!$admin) {
    $admin = wp_insert_user(array('user_login'=>'hrms_admin', 'user_pass'=>'CheckHRMS2026!', 'display_name'=>'HRMS Admin', 'role'=>'administrator'));
}
if (is_wp_error($admin)) { throw new Exception($admin->get_error_message()); }
wp_set_current_user($admin);
dip_company_install();
list($workspace, $raw) = dip_ref_read();
$data = $workspace['data'];
$data['co']['name'] = 'Dream India Production';
$data['co']['tag'] = 'HR and Payroll';
$data['brand'] = dip_brand_validate(array_merge(dip_brand_defaults(), array('productName'=>'All in One HRMS', 'primary'=>'#16a34a', 'sidebar'=>'dark')));
$employeeId = null;
$maxId = 1000;
foreach ($data['emps'] as $employee) {
    $maxId = max($maxId, (int)$employee['id']);
    if ($employee['code'] === 'TEST001') { $employeeId = (int)$employee['id']; }
}
if ($employeeId === null) {
    $employeeId = $maxId + 1;
    $data['emps'][] = array('id'=>$employeeId, 'code'=>'TEST001', 'name'=>'Test Employee', 'dept'=>'Human Resources', 'des'=>'HR Executive', 'basic'=>15000, 'hra'=>5000, 'oth'=>0, 'pt'=>0, 'tds'=>0, 'pf'=>false, 'esi'=>false, 'doj'=>'2024-01-01', 'exit'=>'', 'ph'=>'');
}
$result = dip_ref_commit($workspace, $raw, dip_ref_validate($data, $workspace['data']));
if (is_wp_error($result)) { throw new Exception($result->get_error_message()); }
$user = username_exists('hrms_employee');
if (!$user) {
    $user = wp_insert_user(array('user_login'=>'hrms_employee', 'user_pass'=>'Employee2026!', 'display_name'=>'Test Employee', 'role'=>'dreampeople_employee'));
}
if (is_wp_error($user)) { throw new Exception($user->get_error_message()); }
global $wpdb;
list($companies, $members) = dip_company_tables();
if ($wpdb->replace($members, array('company_id'=>1, 'user_id'=>$user, 'role'=>'employee', 'employee_id'=>$employeeId), array('%d','%d','%s','%d')) === false) {
    throw new Exception('Could not link the test employee account.');
}
update_user_meta($user, 'hrms_active_company', 1);
update_option('blogname', 'All in One HRMS');
echo 'HRMS administrator and employee test logins configured';
