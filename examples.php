<?php
require_once('db/db_operations.php');
$db = new db();

// fetch single data where it's matches

$table_name = 'company_users';
$where = "`email`='$current_user'";

$fetch = $db->fetch($table_name, $where);

if($fetch['success'] == 1){
    $value = $fetch['field_name'];
}

echo $value;


// fetch all data where it's matches ( data will come as array )
$table_name = 'company_users';
$where = "`comp_id`='$current_user'";

$fetch_all = $db->fetch_all($table_name, $where);

if($fetch_all['success'] == 1){
    // do something
}
foreach($fetch_all as $key => $value){
    $field_value = $value['field_name'];
    echo $field_value;
}

// insert example
$table_name = 'company_users';

$fields = "`name`,`surname`,`email`,`comp_name`";
$values = "'$name','$srname','$email','$compname'";

$insert = $db->insert($table_name, $fields, $values);

if($insert == 1){
    // do something
}

// Update example
$table_name = 'company_users';

// $where = "`$table_name`.`page_id`='$page_id'";
$where = "`page_id`='$page_id'";
$values = '`ana_code`'.'='."'".$page_code."'";

$update = $db->update($table_name, $values, $where);

if($update == 1){
    // do something
}

// Delete example
$table_name = 'company_users';
$where = "`comp_id`='$current_user'";

$delete = $db->delete($table_name, $where);

if($delete == 1){
    // do something
}
