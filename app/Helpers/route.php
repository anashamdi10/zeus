<?php

if(! function_exists('prefixActive')){
	function prefixActive($prefixName)
	{ 
		return	request()->route()->getPrefix() == $prefixName ? 'active' : '';
	}
}

if(! function_exists('prefixBlock')){
	function prefixBlock($prefixName)
	{ 
		return	request()->route()->getPrefix() == $prefixName ? 'block' : 'none';
	}
}

if(! function_exists('routeActive')){
	function routeActive($routeName)
	{ 
		return	request()->routeIs($routeName) ? 'active' : '';
	}
}


/*get some cols row table */
function get_cols_where_row($model, $columns_names = array(), $where = array())
{
	$data = $model::select($columns_names)->where($where)->first();
	return $data;
}


function get_field_value($model, $field_name, $where = array())
{
	$data = $model::where($where)->value($field_name);
	return $data;
}

function delete($model = null, $where = array())
{
	$flag = $model::where($where)->delete();
	return $flag;
}

function get_cols_where($model, $columns_names = array(), $where = array(), $order_field = 'id', $order_type = 'DESC')
{
	$data = $model::select($columns_names)->where($where)->orderby($order_field, $order_type)->get();
	return $data;
}

function update($model, $data_to_update, $where = array())
{
	$flag = $model::where($where)->update($data_to_update);
	return $flag;
}




